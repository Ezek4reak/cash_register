<?php
class BankModel extends Model{
    /**
     * @return mixed
     */
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