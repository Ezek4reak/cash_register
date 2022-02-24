<?php
abstract class Model{
	protected $dbh;
	protected $stmt;

	public function __construct(){
		//$this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
		$this->dbh = new PDO("sqlite:./accounting_db.sqlite3");
		$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		$this->dbh->setAttribute(PDO::ATTR_PERSISTENT, TRUE);
		//$this->dbh->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND , "SET NAMES utf8");
	}


	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}

	//Binds the prep statement
	public function bind($param, $value, $type = null){
 		if (is_null($type)) {
  			switch (true) {
    			case is_int($value):
      				$type = PDO::PARAM_INT;
      				break;
    			case is_bool($value):
      				$type = PDO::PARAM_BOOL;
      				break;
    			case is_null($value):
      				$type = PDO::PARAM_NULL;
      				break;
    				default:
      				$type = PDO::PARAM_STR;
  			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute(){
		if($this->stmt->execute()){
		    return true;
        }else{
		    return false;
        }
	}
	

	public function resultSet(){
		if($this->execute()){
		    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
		    return false;
        }
	}

	public function lastInsertId(){
		return $this->dbh->lastInsertId();
	}

    public function errorMsg(){
	    return $this->dbh->errorInfo();
    }

	public function single(){
        if($this->execute()){
		    return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
	}

    public function delete($file)
    {
        return (unlink($file) ? true : false);
	}

    function __destruct() {
    }
  
}