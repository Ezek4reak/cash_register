<?php

class TransactionController extends Controller
{
	public function all(){
        $this->authenticate();//user must be logged in to execute this action
		$transactions = new TransactionModel;
		$data = $transactions->all();
		$this->setData($data);
        $this->setTitle('transactions Table');
        $this->setView(VIEW_PATH.'transaction/table.php');
	}

    public function filter()
    {
        $this->authenticate();//user must be logged in to execute this action
        $transactions = new TransactionModel;
        $data = $transactions->filter();
        if(is_array($data)){
            $this->setData($data);
            $this->setTitle('transactions Table');
            $this->setView(VIEW_PATH.'transaction/table.php');
        }else{
            App::setMsg($data, 'error');
        }

    }

    public function majorExpense(){
        $this->authenticate();//user must be logged in to execute this action
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $accouts = new AccountModel;
            $data = $accouts->getAccounts();
            $data2 = $accouts->getBanks();
            $this->setData($data);
            $this->setData2($data2);
            $this->setTitle('Major Expenses Form');
            $this->setView(VIEW_PATH.'transaction/majorExpense.php');
        }elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            $transactions = new TransactionModel;
            $expense = $transactions->makeExpense();
            if($expense === true){
                App::setMsg('Successfully Registered', 'success');
                $this->all();
            }else{
                App::setMsg($expense, 'error');
                $this->setTitle('Major Expenses Form');
                $this->setView(VIEW_PATH.'transaction/majorExpense.php');
            }
        }
    }

    public function pettyCashExpense(){
        $this->authenticate();//user must be logged in to execute this action
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $banks = new AccountModel;
            $data = $banks->getBanks();
            $this->setData($data);
            $this->setTitle('Petty Cash Expenses Form');
            $this->setView(VIEW_PATH.'transaction/pettyCash.php');
        }elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            $transactions = new TransactionModel;
            $expense = $transactions->makeExpense();
            if($expense === true){
                App::setMsg('Successfully Registered', 'success');
                $this->all();
            }else{
                App::setMsg($expense, 'error');
                $this->setTitle('Major Expenses Form');
                $this->setView(VIEW_PATH.'transaction/pettyCash.php');
            }
        }
    }

    public function bankStatement()
    {
        $this->authenticate();//user must be logged in to execute this action
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $banks = new AccountModel;
            $data = $banks->getBanks();
            $this->setData($data);
            $this->setTitle('Select bank Account');
            $this->setView(VIEW_PATH.'bank/selectBank.php');
        }elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            $banks = new TransactionModel;
            $statement = $banks->getStatement();
            $this->setData($statement);
            $this->setTitle('Bank statement');
            $this->setView(VIEW_PATH.'bank/statement.php');
        }
    }

    public function calculator()
    {
        $this->setTitle('calculator');
        $this->setView(VIEW_PATH.'calculator/calculator.php');
    }
}
