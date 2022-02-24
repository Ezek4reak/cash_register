<?php
class Sub_contractorController extends Controller
{
	public function addNew(){
		$this->authenticate();//user must be logged in to execute this action
		if ($_SERVER["REQUEST_METHOD"] == "GET")
        {
        	$this->setTitle('Add New Sub-Contractor');
            $this->setView(VIEW_PATH.'sub_contractor/newSubContractor.php');
        }
        elseif($_SERVER["REQUEST_METHOD"] == "POST") 
        {
        	$newSubContractor = new Sub_contractorModel;
        	$new = $newSubContractor->addNew();
        	if(is_array($new)){
        		App::setMsg('Sub Contractor Successfully Registered', 'success');
        		$this->setData($new);
	        	$this->setTitle('Sub Contractor\'s list');
	            $this->setView(VIEW_PATH.'sub_contractor/singleSubContractors.php');

        	}else{//return to the same page
        		App::setMsg($new, 'error');
	        	$this->setTitle('Add New Sub-Contractor');
	            $this->setView(VIEW_PATH.'sub_contractor/newSubContractor.php');
        	}
        }
	}

	public function addNewContract(){
		$this->authenticate();//user must be logged in to execute this action
		if($_SERVER["REQUEST_METHOD"] == "GET"){
			$contractors = new Sub_contractorModel;
			$all = $contractors->list();
			$this->setData($all);
	       	$this->setTitle('New Contract');
	        $this->setView(VIEW_PATH.'sub_contractor/newContract.php');
		}elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
			$contract = new Sub_contractorModel;
			$addContract = $contract->addNewContract();
			if ($addContract === true) {
				# code...
				App::setMsg('Contract Successfully Added', 'success');
			}else{
				App::setMsg($addContract, 'error');
				$this->setTitle('New Contract');
	        	$this->setView(VIEW_PATH.'sub_contractor/newContract.php');
			}
		}
	}

	public function transactions(){
		$this->authenticate();//user must be logged in to execute this action
		$transactions = new Sub_contractorModel;
		$data = $transactions->transactions();
		$this->setData($data);
	    $this->setTitle('transactions Table');
	   	$this->setView(VIEW_PATH.'sub_contractor/transactions.php');
	}


	public function edit(){

	}

	public function pay(){
		$this->authenticate();//user must be logged in to execute this action
		if($_SERVER["REQUEST_METHOD"] == "GET"){
			$contractors = new Sub_contractorModel;
			$all = $contractors->list();
			$accouts = new AccountModel;
			$data2 = $accouts->getAccounts();
			$data3 = $accouts->getBanks();
			$this->setData($all);
			$this->setData2($data2);
			$this->setData3($data3);
	       	$this->setTitle('Pay Contractor');
	        $this->setView(VIEW_PATH.'sub_contractor/pay.php');
		}elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
			$transactions = new Sub_contractorModel;
			$payment = $transactions->pay();
			if($payment === true){
				App::setMsg('payment Successfully Registered', 'success');
				$newSubContractor = new Sub_contractorModel;
        		$data = $newSubContractor->getSingle($_POST['sc_id']);
        		$this->setData($data);
	        	$this->setTitle('Sub Contractor\'s Balance');
	            $this->setView(VIEW_PATH.'sub_contractor/singleSubContractors.php');
			}else{
				App::setMsg($payment, 'error');
				$this->setTitle('Pay Contractor');
	        	$this->setView(VIEW_PATH.'sub_contractor/pay.php');
			}
		}
	}
	public function list(){
		$this->authenticate();//user must be logged in to execute this action
		$contractors = new Sub_contractorModel;
		$all = $contractors->list();
		$this->setData($all);
	    $this->setTitle('Sub Contractor\'s list');
	    $this->setView(VIEW_PATH.'sub_contractor/allSubContractors.php');
	}

	public function single(){//singleSubContractorTransactions
		$this->authenticate();//user must be logged in to execute this action
		if($_SERVER["REQUEST_METHOD"] == "GET"){
			$contractors = new Sub_contractorModel;
			$all = $contractors->list();
			$this->setData($all);
	       	$this->setTitle('Contractor To View');
	        $this->setView(VIEW_PATH.'sub_contractor/single.php');
		}elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
			$SubContractorTransactions = new Sub_contractorModel;
	        $data = $SubContractorTransactions->singleSubContractorTransactions($_POST['sc_id']);
	        $this->setData($data);
	        $this->setTitle('transactions Table');
		   	$this->setView(VIEW_PATH.'sub_contractor/transactions.php');
	   }

	}





}