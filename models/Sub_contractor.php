<?php
class Sub_contractorModel extends Model
{
	public function addNew(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
        if($post['sc_name'] === "" || 
        	$post['sc_address'] === ""  ||
        	$post['sc_tel'] === ""  ||
        	$post['sc_service'] === "" ){
            return "Sorry! One or more fields empty!";
        }

        $this->query('SELECT * FROM Sub_contractors WHERE sc_tel = :tel');
	    $this->bind(':tel', $post['sc_tel']);
	    $phone = $this->single();
	    if(is_array($phone)){
	    	return "A Sub Contractor \"{$phone['sc_name']}\" is already registered with the submited phone number";
	    }    

        $this->query("INSERT INTO sub_contractors (sc_name, company_name, sc_address, sc_tel, sc_service, account ) VALUES(:sc_name, :company_name, :sc_address, :sc_tel, :sc_service, :account)");
            $this->bind(':sc_name', $post['sc_name']);
            $this->bind(':company_name', $post['company_name']);
            $this->bind(':sc_address', $post['sc_address']);
            $this->bind(':sc_tel', $post['sc_tel']);
            $this->bind(':sc_service', $post['sc_service']);
            $this->bind(':account', 0.00);
            $this->execute();
            $sc_id = $this->lastInsertId();

            $this->query('SELECT * FROM sub_contractors WHERE sc_id = :id');
	        $this->bind(':id', $sc_id);
	        $data = $this->single();    
           	if($data){
           		return $data;
           	}
            else
            {
                return $this->errorMsg();
            }
	}

	public function addNewContract(){
		if(isset($_POST['submit_contract'])){
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
			$contract_amount = (float)$post['trans_amount'];
			$day = date('d');
            $month = date('m');
            $year = date('Y');
            $date = date('Y-m-d');
            $trans_type = 'New';

            $this->query('SELECT * FROM sub_contractors WHERE sc_id = :id');
            $this->bind(':id', $post['sc_id']);
            $data = $this->single(); 
            $sc_bal = $data['account']; 
            $new_balance = $sc_bal + $contract_amount;  

			$this->query("INSERT INTO Sub_contractor_transactions (sc_id, trans_date, trans_type, trans_desc, trans_amount, balance, day, month, year) VALUES(:sc_id, :trans_date, :trans_type, :trans_desc, :trans_amount, :balance, :day, :month, :year)");
			$this->bind(':sc_id', $post['sc_id']);
			$this->bind(':trans_date', $date);
			$this->bind(':trans_type', $trans_type);
            $this->bind(':trans_desc', $post['trans_desc']);
            $this->bind(':trans_amount', $contract_amount);
            $this->bind(':balance', $new_balance);
            $this->bind(':day', $day);
            $this->bind(':month', $month);
            $this->bind(':year', $year);
            if($this->execute()){
            	$this->query("UPDATE Sub_contractors SET account = account + :contract_amount WHERE sc_id = :id");
				$this->bind(':id', $post['sc_id']);
				$this->bind(':contract_amount', $contract_amount);
				$this->execute();
				return true;
            }else{
                return $this->errorMsg();
            }
		}else{
			return "Oop! Something Went Wrong, Please fill and re-submit";
		}
	}

	public function transactions(){
        $this->query('SELECT Sub_contractor_transactions.*, Sub_contractors.sc_name FROM Sub_contractor_transactions INNER JOIN Sub_contractors USING ("sc_id")');
        $data = $this->resultSet();
        return $data;
	}


	public function edit(){

	}

	public function pay(){
        $this->query('SELECT * FROM sub_contractors WHERE sc_id = :id');
        $this->bind(':id', $_POST['sc_id']);
        $data = $this->single();

        $balance = $data['account'];
        $name = $data['sc_name'];

        if(isset($_POST['submit_payment'])){
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
            $trans_amount = (float)$post['trans_amount'];
            $day = date('d');
            $month = date('m');
            $year = date('Y');
            $date = date('Y-m-d');
            $trans_type = 'Dabit';
            $id = 1;

            $trans_desc = $post['trans_desc'].' ('.$name.')';
            $new_balance = $balance - $trans_amount;
            $this->query("INSERT INTO Sub_contractor_transactions (sc_id, trans_date, trans_type, trans_desc, trans_amount, balance, day, month, year) VALUES(:sc_id, :trans_date, :trans_type, :trans_desc, :trans_amount, :balance, :day, :month, :year)");
            $this->bind(':sc_id', $post['sc_id']);
            $this->bind(':trans_date', $date);
            $this->bind(':trans_type', $trans_type);
            $this->bind(':trans_desc', $post['trans_desc']);
            $this->bind(':trans_amount', $trans_amount);
            $this->bind(':balance', $new_balance);
            $this->bind(':day', $day);
            $this->bind(':month', $month);
            $this->bind(':year', $year);
            if($this->execute()){

                $this->query("INSERT INTO transactions (trans_date, ticket_no, bank_id, trans_type, account_type, amount, description, day, month, year, old_balance, new_balance, trans_datetime )
                                            VALUES(:trans_date, :ticket_no, :bank_id, :trans_type, :account_type, :amount, :description, :day, :month, :year, :old_balance, :new_balance, DATETIME('now') )");
                $this->bind(':trans_date', $date);
                $this->bind(':ticket_no', $post['ticket_no']);
                $this->bind(':bank_id', $post['bank_id']);
                $this->bind(':trans_type', $trans_type);
                $this->bind(':account_type', $post['account_type']);///continue from here
                $this->bind(':amount', $post['trans_amount']);
                $this->bind(':description', $trans_desc);
                $this->bind(':day', $day);
                $this->bind(':month', $month);
                $this->bind(':year', $year);
                $this->bind(':old_balance', $balance);
                $this->bind(':new_balance', $new_balance);
                if($this->execute()){
                    $this->query("UPDATE Sub_contractors SET account = account - :trans_amount WHERE sc_id = :id");
                    $this->bind(':id', $post['sc_id']);
                    $this->bind(':trans_amount', $trans_amount);
                    $this->execute();
                    
                    $this->query("UPDATE system_account SET account_receivable = account_receivable - :amount_r, account_payable = account_payable + :amount_p WHERE system_account_id = :id");
                    $this->bind(':id', $id);
                    $this->bind(':amount_r', $post['trans_amount']);
                    $this->bind(':amount_p', $post['trans_amount']);
                    $this->execute();
                    return true;
                }else{
                    return $this->errorMsg();
                }

            }
        }
	}

    public function getSingle($sc_id){
        $this->query('SELECT * FROM sub_contractors WHERE sc_id = :id');
        $this->bind(':id', $sc_id);
        $data = $this->single();    
        if($data){
            return $data;
        }
        else
        {
            return $this->errorMsg();
        }
    }

	
	public function list(){
		$this->query('SELECT * FROM Sub_contractors');
        $data = $this->resultSet();
        return $data;
	}

        public function singleSubContractorTransactions($id){
        $this->query('SELECT Sub_contractor_transactions.*, Sub_contractors.sc_name FROM Sub_contractor_transactions INNER JOIN Sub_contractors USING ("sc_id") WHERE Sub_contractor_transactions.sc_id = :sc_id');
        $this->bind(':sc_id', $id);
        $data = $this->resultSet();
        return $data;
    }

}