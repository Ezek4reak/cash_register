<?php
/**
 * Created by PhpStorm.
 * User: Ezekiel
 * Date: 02-May-18
 * Time: 3:48 PM
 */
class HomeController extends Controller{
    protected function index(){
    	$this->authenticate();//user must be logged in to execute this action
        $this->setTitle('Rheez 1.0.1');
        $this->setView(VIEW_PATH.'home/home.php');
    }


    public function accountantHome()
    {
        $this->authenticate();//user must be logged in to execute this action
        $transactions = new transactionModel;
        $data = $transactions->thisMonth();
        $system = new AccountModel;
        $data2 = $system->system_account();
        if(is_array($data)){
            $this->setData($data);
            $this->setData2($data2);
            $this->setTitle('Accountant Dashboard');
            $this->setView(VIEW_PATH.'home/accountantHome.php');            
        }else{
            $this->setData(NULL);
            $this->setData2($data2);
            App::setMsg($data, 'error');
            $this->setTitle('Accountant Dashboard');
            $this->setView(VIEW_PATH.'home/accountantHome.php');
        }

    }
}