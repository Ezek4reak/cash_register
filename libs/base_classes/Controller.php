<?php
/**
 * Created by PhpStorm.
 * User: Ezekiel
 * Date: 02-May-18
 * Time: 3:31 PM
 */
abstract class Controller
{
    protected $action;
    protected $params;
    protected $data = array();
    protected $data2 = array();
    protected $data3 = array();
    protected $title;
    protected $view;

    public function __construct($action, $params)
    {
        $this->action = $action;
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    public function executeAction(){
        if(sizeof($this->params) > 0 && (!empty($this->params[0]))){
            return $this->{$this->action}($this->params);
        }
        else
        {
            return $this->{$this->action}();
        }
    }
    public function redirect($url){
        header('Location: '.ROOT_URL.$url);
    }

    /**
     *
     */
    public function authenticate(){
        if(!isset($_SESSION['loggedin'])){
            header('Location: '.ROOT_URL.'user/login');
        }
    }
    /**
     * @param $text
     */
    public function setTitle($text){
        $this->title = $text;
    }

    /**
     * @return mixed
     */
    public function getTitle(){
        return $this->title;
    }

    public function setData($array){
        $this->data = $array;
    }
    public function getData(){
        return $this->data;
    }

    public function setData2($array){
        $this->data2 = $array;
    }
    public function getData2(){
        return $this->data2;
    }

    public function setData3($array){
        $this->data3 = $array;
    }
    public function getData3(){
        return $this->data3;
    }

    /**
     * @param $file
     */
    public function setView($file){
        $this->view = $file;
    }

    /**
     *
     */
    public  function getView(){
        return $this->view;
    }

    function __destruct() {
    }
}