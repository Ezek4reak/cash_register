<?php
/**
 * Created by PhpStorm.
 * User: Ezekiel
 * Date: 02-May-18
 * Time: 2:05 PM
 */
class Router{
    protected $request;
    protected $controller;
    protected $action;
    protected $params = array();

    /**
     * Router constructor.
     * @param $request
     */
    public function __construct($request)
    {
        //get rid of whitespace, preceding and trailing slash
        $url = trim(ltrim(rtrim($request,"/"),'/'));
        if($url==''){
            $url='home/index';
        }

        $exploded_url = explode('/', $url);
        //var_dump($exploded_url);
        if(sizeof($exploded_url) > 0){
            $this->controller = ucfirst(array_shift($exploded_url)).'Controller';
        }else{
            $this->controller = 'Home';
        }
        if(sizeof($exploded_url) > 0){
            $this->action = array_shift($exploded_url);
        }else{
            $this->action = 'index';
        }

        if(sizeof($exploded_url) > 0){
            $this->params = $exploded_url;
        }

    }

    public function createController(){
        if(class_exists($this->controller))
        {
            if(method_exists($this->controller, $this->action))
            {
                return new $this->controller($this->action, $this->params);
            }
            else {
                App::setMsg('Requested "'.$this->action.'" Method Not Found!','error');
            }
        }
        else {
            App::setMsg('Requested "'.$this->controller.'" Class Not Found!','error');
        }
    }

    function __destruct() {

    }
}