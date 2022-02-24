<?php

class TransactionModel extends Model
{

	public function all($value='')
	{
		$this->query('SELECT * FROM transactions ORDER BY trans_id DESC');
		$data = $this->resultSet();
		return $data;
	}


	public function filter()
	{
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	    $start = $post['start_date'];
	    $end = $post['end_date'];
	    $this->query('SELECT * FROM transactions WHERE trans_date >= :start AND trans_date <=:end');
	    $this->bind(':start', $start);
	    $this->bind(':end', $end);
	    $data = $this->resultSet();
	    if($data){
	    	return $data;
	    }else{
	    	return $this->errorMsg();
	    }
	}

	public function thisMonth()
	{
		# code...
		$m = date('m');
		$y = date('Y');
		$this->query('SELECT * FROM transactions WHERE month = :month AND year = :year');
	    $this->bind(':month', $m);
	    $this->bind(':year', $y);
	    $data = $this->resultSet();
	    if(empty($data)){
	    	return "No Data for This Month Yet!";
	    }else{
	    	return $data;
	    }
	}

    /**
     * @return array|bool
     */
    public function makeExpense()
	{
		$this->query('SELECT * FROM system_account WHERE system_account_id = :id');
		$sys_acct_id = 1;
        $this->bind(':id', $sys_acct_id);
        $data = $this->single();

        $balance = $data['account_receivable'];


		if(isset($_POST['submit_expense'])){
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
            $trans_amount = (float)$post['trans_amount'];
            $day = date('d');
            $month = date('m');
            $year = date('Y');
            $date = date('Y-m-d');
            $trans_type = 'Debit';
            $id = 1;
                
            $this->query("INSERT INTO transactions (trans_date, ticket_no, bank_id, trans_type, account_type, amount, description, day, month, year, old_balance, new_balance, trans_datetime )
                                        VALUES(:trans_date, :ticket_no, :bank_id, :trans_type, :account_type, :amount, :description, :day, :month, :year, :old_balance, :new_balance, DATETIME('now') )");
            $this->bind(':trans_date', $date);
            $this->bind(':ticket_no', $post['ticket_no']);
            $this->bind(':bank_id', $post['bank_id']);
		$this->bind(':trans_type', $trans_type);
            $this->bind(':account_type', $post['account_type']);///continue from here
            $this->bind(':amount', $trans_amount);
            $this->bind(':description', $post['trans_desc']);
            $this->bind(':day', $day);
            $this->bind(':month', $month);
            $this->bind(':year', $year);
            $this->bind(':old_balance', $balance);
            $this->bind(':new_balance', $balance - $trans_amount);
            if($this->execute()){
                $this->query("UPDATE system_account SET account_receivable = account_receivable - :amount_r, account_payable = account_payable + :amount_p WHERE system_account_id = :id");
                $this->bind(':id', $id);
                $this->bind(':amount_r', $post['trans_amount']);
                $this->bind(':amount_p', $post['trans_amount']);
                if($this->execute()){
                	return true;
                }else{
                	return $this->errorMsg();
                }   
            }else{
            	return $this->errorMsg();
            }
        }
	}

    /**
     * @return bool
     */
    public function getStatement()
	{//INNER JOIN transactions USING ("bank_id")
	//, bank.bank_name, bank.account_number
		if(isset($_POST['bank'])){
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	        	$this->query('SELECT transactions.*, bank.bank_name, account_number FROM transactions INNER JOIN bank USING ("bank_id")  WHERE trans_date >= :start AND trans_date <= :end AND bank_id = :bank_id');
	        	$this->bind(':bank_id', $post['bank_id']);
	        	$this->bind(':start', $post['start']);
	        	$this->bind(':end', $post['end']);
	        	$data = $this->resultSet();
	        	return $data;
		}
	}
}