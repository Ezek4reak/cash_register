<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6" style="background:white; border-radius:5px; box-shadow: 3px 3px 5px gray;">
        <form name ="price_form" method="post" action="<?php echo ROOT_URL;?>sub_contractor/pay">
            <div class="row">
                <div class="modal-header">
                    <h4 class="modal-title">Enter Record of Payment to This Sub Contractor</h4>
                </div>
            </div><br>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">Select Sub Contractor</span>
                        <select class="form-control input-sm"  name="sc_id" style="width:320px;" required>
                            <option value="">Select Which Contractor You Paid</option>
                            <?php
                            foreach($data as $row)
                                echo '<option value="'.$row["sc_id"].'">'.$row["sc_name"].'</option>';
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">Select Account To Pay From</span>
                        <select class="form-control input-sm"  name="account_type" style="width:320px;" required>
                            <option value="">From Account</option>
                            <?php
                            foreach($data2 as $result)
                                echo '<option value="'.$result["account_desc"].'">'.$result["account_desc"].'</option>';
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">Select Bank Account</span>
                        <select class="form-control input-sm"  name="bank_id" style="width:320px;" required>
                            <option value="">Select Which Bank Account</option>
                            <?php
                            foreach($data3 as $bank)
                                echo '<option value="'.$bank["bank_id"].'">'.$bank["bank_name"].' ('.$bank["account_number"]. ')</option>';
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">Ticket Number</span>
                        <input class="form-control input-sm" placeholder="e.g 2300453" autocomplete="off" type="text" name="ticket_no" style="width:320px;" required autofocus value="<?php echo isset($_POST['ticket_no']) ? $_POST['ticket_no'] : '';?>"/>
                    </div>
                </div>
            </div>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">Comment/Remark</span>
                        <input class="form-control input-sm" placeholder=" e.g Mobilization Fee" autocomplete="off" type="text" name="trans_desc" 
                            value="<?php echo isset($_POST['trans_desc']) ? $_POST['trans_desc'] : '';?>" style="width:320px;" required/>
                    </div>
                </div>
            </div>
           <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">Amount You Paid Him/Her</span>
                        <input class="form-control input-sm" placeholder="e.g 5000.50" autocomplete="off" type="text" name="trans_amount" 
                            value="<?php echo isset($_POST['trans_amount']) ? $_POST['trans_amount'] : '';?>" style="width:320px;" required/>
                    </div>
                </div>
            </div>
            <br>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12 " style="display:flex; justify-content:center;"><button style="width:500px;"class="btn btn-success btn-md" type="submit" name="submit_payment" default ><span class="glyphicon glyphicon-save"></span> <b>Save Payment</b></button></div>
            </div><br>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>