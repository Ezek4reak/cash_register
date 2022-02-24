<?php
            $total_received = 0;
            $total_paid = 0;
            $bank_credit = 0;
            $bank_debit = 0;
            if(isset($data)){
	            foreach($data as $result)
	            {
	                if ($result["account_type"]==='Account Receivable' and $result['bank_id'] == 1) {//general amount received either cash
	                    $total_received += $result["amount"];
	                }else if($result["account_type"]==='Account Receivable' and $result['bank_id'] != 1){// amount received from bank only
	                	$bank_debit += $result["amount"];
	                	$total_received += $result["amount"];//still update total received
	                }else if($result['bank_id'] == 1 and $result["account_type"] !== 'Account Receivable' ){
	                	$total_paid += $result["amount"];
	            	}else{
	            		$bank_debit += $result['amount'];
	            	}
	            }
            }
            $difference = $total_received - $total_paid;
?>
<style type="text/css">
	.modal-header, .modal-header{
		background: transparent;
	}
	.modal-header{
		padding:9px 9px 4px 9px;
		border: none;
	}

	.modal-title{
		font-weight: bolder;
		color: white;
		border: none;
		-webkit-text-stroke: 0.5px blue;
		text-shadow: 0px 2px 4px black;
	}

	.item{
		 color:white; 
		 border: 6px solid silver;
		 border-radius:50% !important; 
		 box-shadow: 3px 3px 5px gray; 
		 margin:8px;
		 min-height: 160px;
		 min-width: 280px;
		 padding: 5px 12px;
	}
	.itemContent{
		color: white; 
		font-size:1.5em; 
		font-weight:bold;
		font-style: italic;
		-webkit-text-stroke: 0.7px black;
	}
	.myBox{
		display:flex; 
		flex-wrap: wrap;
		justify-content: center;
	}
	@media only screen and (max-width: 1024px){
		.myBox{
			display:flex; 
			flex-wrap: wrap;
			justify-content: space-around;
		}
	}
</style>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="row " style=" font-size:2em; font-weight:bold; text-align: center; -webkit-text-stroke: 0.7px black; color:peru; font-style: italic; text-shadow: 0px 2px 4px black;
">ACCOUNTANT DASHBOARD</div>
		<HR>
		<div class="row myBox">
			<div class="item" style="background:royalblue;">
				<div class="row">
	                <div class="modal-header">
	                    <h4 class="modal-title">Month Received</h4><hr>
	                </div>
	            </div>
	           <div class="row" style="display:flex; justify-content:center;">
	                <div class="col-md-12" style="display:flex; justify-content:center;">
						<div class="itemContent">&#8358; <?php echo number_format($total_received,2); ?></div>
	                </div>
	            </div><hr>
	            <div class="row" style="display:flex; justify-content:center; margin-top: 6px;">
	                <div class="col-md-12" style="display:flex; justify-content:center;">
	                	<div>Both Bank And Cash</div>
	                </div>
	            </div>
			</div>
			<div class="item" style="background:seagreen;">
				<div class="row">
	                <div class="modal-header">
	                    <h4 class="modal-title">Month Paid</h4><hr>
	                </div>
	            </div>
	           <div class="row" style="display:flex; justify-content:center;">
	                <div class="col-md-12" style="display:flex; justify-content:center;">
						<div class="itemContent">&#8358; <?php echo number_format($total_paid,2); ?></div>
	                </div>
	            </div><hr>
	            <div class="row" style="display:flex; justify-content:center; margin-top: 6px;">
	                <div class="col-md-12" style="display:flex; justify-content:center;">
	                	<div>Cash Only</div>
	                </div>
	            </div>
			</div>
			<div class="item" style="background: peru;">
				<div class="row">
	                <div class="modal-header">
	                    <h4 class="modal-title">Month Balance</h4><hr>
	                </div>
	            </div>
	           <div class="row" style="display:flex; justify-content:center;">
	                <div class="col-md-12" style="display:flex; justify-content:center;">
	                	<div class="itemContent">&#8358; <?php echo number_format($difference,2); ?></div>
	                </div>
	            </div><hr>
	            <div class="row" style="display:flex; justify-content:center; margin-top: 6px;">
	                <div class="col-md-12" style="display:flex; justify-content:center;">
	                	<div> </div>
	                </div>
	            </div>
			</div>
			<div class="item" style="background:indianred;">
				<div class="row">
	                <div class="modal-header">
	                    <h4 class="modal-title">Bank Credit</h4><hr>
	                </div>
	            </div>
	           <div class="row" style="display:flex; justify-content:center;">
	                <div class="col-md-12" style="display:flex; justify-content:center;">
						<div class="itemContent">&#8358; <?php echo number_format($bank_credit,2); ?></div>
	                </div>
	            </div><hr>
	            <div class="row" style="display:flex; justify-content:center;">
	                <div class="col-md-12" style="display:flex; justify-content:center;">
	                </div>
	            </div>
			</div>
			<div class="item" style="background:maroon;">
				<div class="row">
	                <div class="modal-header">
	                    <h4 class="modal-title">Bank Debit</h4><hr>
	                </div>
	            </div>
	           <div class="row" style="display:flex; justify-content:center;">
	                <div class="col-md-12" style="display:flex; justify-content:center;">
						<div class="itemContent">&#8358; <?php echo number_format($bank_debit,2); ?></div>
	                </div>
	            </div><hr>
	            <div class="row" style="display:flex; justify-content:center; margin-top: 6px;">
	                <div class="col-md-12" style="display:flex; justify-content:center;">
	                	<div>Received/Paid From Bank</div>
	                </div>
	            </div>
			</div>
			<div class="item" style="background:navy;">
				<div class="row">
	                <div class="modal-header">
	                    <h4 class="modal-title">Bank Difference</h4><hr>
	                </div>
	            </div>
	           <div class="row" style="display:flex; justify-content:center;">
	                <div class="col-md-12" style="display:flex; justify-content:center;">
						<div class="itemContent">&#8358; <?php echo number_format(abs($bank_credit - $bank_debit),2); ?></div>
	                </div>
	            </div><hr>
	            <div class="row" style="display:flex; justify-content:center;">
	                <div class="col-md-12" style="display:flex; justify-content:center;">
	                	<div>Credit - Debit</div>
	                </div>
	            </div>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
