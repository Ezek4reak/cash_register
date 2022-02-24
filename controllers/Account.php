<?php
/**
 * Created by PhpStorm.
 * User: Ezekiel
 * Date: 02-May-18
 * Time: 3:48 PM
 */
class AccountController extends Controller
{

    public function receiveCash()
    {
        $this->authenticate();//user must be logged in to execute this action
    	if ($_SERVER["REQUEST_METHOD"] == "GET")
        {
        	$account = new AccountModel();
        	$data = $account->getBanks();
        	$this->setData($data); 
        	$this->setTitle('Receive New Cash');
            $this->setView(VIEW_PATH.'account/receiveCash.php');
        }
        elseif($_SERVER["REQUEST_METHOD"] == "POST") 
        {
	        $pay = new AccountModel();
	    	$receipt = $pay->receiveCash();

	    	if($receipt === true)
	    	{
	    		App::setMsg('Ammount Received Successful!!!', 'success');
	    	}
	    	else
	    	{
	    		App::setMsg($receipt, 'error');
	    	}
        }
    }

    public function receivedHistory(){
        $this->authenticate();//user must be logged in to execute this action
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $hist = new AccountModel();
            $data = $hist->getReceivedHistory();
            $this->setData($data); 
            $this->setTitle('Receive History');
            $this->setView(VIEW_PATH.'account/receivedHistory.php');
        }elseif($_SERVER["REQUEST_METHOD"] == "POST"){
            $history = new AccountModel();
            $filteredData = $history->getFilteredReceivedHistory();
            $this->setData($filteredData); 
            $this->setTitle('Receive History');
            $this->setView(VIEW_PATH.'account/receivedHistory.php');
        }
    }

    public function addNew(){
        $this->authenticate();//user must be logged in to execute this action
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $this->setTitle('Add New Account');
            $this->setView(VIEW_PATH.'account/new.php');
        }elseif($_SERVER["REQUEST_METHOD"] == "POST"){
            $account = new AccountModel();
            $result = $account->addNew();
            if ($result === true) {
                App::setMsg('Account Added Successful!!!', 'success');
            }else{
                App::setMsg($result, 'error');
                $this->setTitle('Add New Account');
                $this->setView(VIEW_PATH.'account/new.php');
            }
        }
    }

    public function list(){
        $this->authenticate();//user must be logged in to execute this action
        $account = new AccountModel();
        $result = $account->getAccounts();
        $this->setData($result); 
        $this->setTitle('List Of All Accounts');
        $this->setView(VIEW_PATH.'account/list.php');
    }

    public function newBank(){
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $this->setTitle('Add New Bank Account');
            $this->setView(VIEW_PATH.'bank/new.php');
        }elseif($_SERVER["REQUEST_METHOD"] == "POST"){
            $account = new AccountModel();
            $result = $account->newBank();
            if ($result === true) {
                App::setMsg('Account Added Successful!!!', 'success');
            }else{
                App::setMsg($result, 'error');
                $this->setTitle('Add New Bank Account');
                $this->setView(VIEW_PATH.'bank/new.php');
            }
        }  
    }

    public function templete(){
        if($_SERVER["REQUEST_METHOD"] == "GET"){

        }elseif($_SERVER["REQUEST_METHOD"] == "POST"){
            
        }
    }
}