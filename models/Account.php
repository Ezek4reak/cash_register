<?php
/**
 * Created by PhpStorm.
 * User: Ezekiel
 * Date: 25-July-2020
 * Time: 10:22 PM
 */
class AccountModel extends Model{
    /**
     * @return mixed
     */
    public function getAccounts(){
    	$this->query('SELECT * FROM accounts');
        $data = $this->resultSet();
        return $data; 
    }


    public function receiveCash(){
    	if(isset($_POST['submit_cash'])){

            $day = date('d');
            $month = date('m');
            $year = date('Y');
            $date = date('Y-m-d');
            $id = 1;



            $this->query("SELECT * FROM system_account");
            $sys_account = $this->single();
            $balance = $sys_account['account_receivable'];
            

            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
            if($post['account_type'] === "" || $post['amount_received'] === ""  || $post['desc'] === "" ){
                return "One or more fields empty!";
            }

            $trans_type = $post['bank_id'] == 1 ? 'Credit' : 'Debit';

            $this->query("UPDATE system_account SET account_receivable = :amount_r WHERE system_account_id = :id");
            $this->bind(':amount_r', $balance + $post['amount_received']);
            $this->bind(':id', $id);
            if( $this->execute()){

                $this->query("INSERT INTO transactions (trans_date, ticket_no, bank_id, trans_type, account_type, amount, description, day, month, year, old_balance, new_balance, trans_datetime )
                                            VALUES(:trans_date, :ticket_no, :bank_id, :trans_type, :account_type, :amount, :description, :day, :month, :year, :old_balance, :new_balance, DATETIME('now') )");
                $this->bind(':trans_date', $date);
                $this->bind(':ticket_no', $post['ticket_no']);
                $this->bind(':bank_id', $post['bank_id']);
                $this->bind(':trans_type', $trans_type);
                $this->bind(':account_type', $post['account_type']);
                $this->bind(':amount', $post['amount_received']);
                $this->bind(':description', $post['desc']);
                $this->bind(':day', $day);
                $this->bind(':month', $month);
                $this->bind(':year', $year);
                $this->bind(':old_balance', $balance);
                $this->bind(':new_balance', $balance + $post['amount_received']);
                if($this->execute())
                {
                        return true;
                }
                else
                {
                    return $this->errorMsg();
                }

            }
            else
            {
                return $this->errorMsg();
            }
        }
    }


    public function getHistory(){
        $this->query('SELECT * FROM transactions');
        $data = $this->resultSet();
        return $data; 
    }

    public function getReceivedHistory(){
        $this->query('SELECT * FROM transactions WHERE account_type = :account_type');
        $this->bind(':account_type', "Account Receivable");
        $data = $this->resultSet();
        return $data; 
    }

    public function getFilteredReceivedHistory(){
        if(isset($_POST['filter_received'])){
            if(empty($_POST['start_date']) || empty($_POST['end_date'])){
                return "One or more fields empty!";
            }else{
                $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $start = $post['start_date'];
                $end = $post['end_date'];
                $this->query('SELECT * FROM transactions WHERE trans_date BETWEEN :start AND :end And account_type = :account_type');
                $this->bind(':start', $start);
                $this->bind(':end', $end);
                $this->bind(':account_type', "Account Receivable");
                $data = $this->resultSet();
                return $data;
            }
        } 
    }

    public function addNew(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $this->query('SELECT * FROM accounts WHERE account_name = :account_name');
        $this->bind(':account_name', $post['account_name']);
        $account = $this->single();
        if(isset($account['account_name'])){
            return "Account with the code {$account['account_name']} already exist in your database, try different code";
        }else{
            $this->query('INSERT INTO accounts (account_name, account_desc) VALUES (:account_name, :account_desc)');
            $this->bind(':account_name', $post['account_name']);
            $this->bind(':account_desc', $post['account_desc']);
            if($this->execute()){
                return true;
            }else{
                return $this->errorMsg();
            }
        }
    }



    public function system_account($value='')
    {
        $this->query("SELECT * FROM system_account");
            $sys_account = $this->single();
            return $sys_account;
    }

    //bank queries
    public function newBank(){
        if (isset($_POST['submit_bank'])) {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->query('SELECT * FROM bank WHERE account_number = :account_number');//check if acct. No. already exists
            $this->bind(':account_number', $post['account_number']);
            $account = $this->single();
            if(isset($account['account_number'])){
                return "Account with the {$account['bank_name']}, {$account['account_number']} already exist in your database!";
            }else{
                $account_manager =  isset($post['account_manager']) ? $post['account_manager'] : 'NA';
                $account_manager_tel =  isset($post['account_manager_tel']) ? $post['account_manager_tel'] : 'NA';

                $this->query('INSERT INTO bank (bank_name, account_number, account_manager, account_manager_tel) VALUES (:bank_name, :account_number, :account_manager, :account_manager_tel)');
                $this->bind(':bank_name', $post['bank_name']);
                $this->bind(':account_number', $post['account_number']);
                $this->bind(':account_manager', $account_manager);
                $this->bind(':account_manager_tel', $account_manager_tel);
                if($this->execute()){
                    return true;
                }else{
                    return $this->errorMsg();
                }
            }
        }
    }

    public function getBanks(){
        $this->query('SELECT * FROM bank');
        $result = $this->resultSet();
        return $result; 
    }


}