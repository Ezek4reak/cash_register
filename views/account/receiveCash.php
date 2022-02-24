<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6" style="background:white; border-radius:5px; box-shadow: 3px 3px 5px gray;">
        <form name ="price_form" method="post" action="<?php echo ROOT_URL;?>account/receiveCash">
            <div class="row">
                <div class="modal-header">
                    <h4 class="modal-title">Enter Amount Received Today</h4>
                </div>
            </div><br>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;"> Account Receivable</span>
                        <input class="form-control input-sm" placeholder="Account Receivable" autocomplete="off" type="text" name="account_type" style="width:320px;" value="Account Receivable" readonly='readonly'/>
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
                            foreach($data as $row)
                                echo '<option value="'.$row["bank_id"].'">'.$row["bank_name"].' ('.$row["account_number"]. ')</option>';
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
                        <span class="input-group-addon" style="width:180px;">Description/Source</span>
                        <input class="form-control input-sm" placeholder="e.g Diesel For The Yard or From Project Maneger" autocomplete="off" type="text" name="desc" style="width:320px;" required/>
                    </div>
                </div>
            </div>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">Amount Received</span>
                        <input class="form-control input-sm" placeholder="e.g 5000.50" autocomplete="off" type="text" name="amount_received" style="width:320px;" required/>
                    </div>
                </div>
            </div>
            <br>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12 " style="display:flex; justify-content:center;"><button style="width:500px;"class="btn btn-success btn-md" type="submit" name="submit_cash" default ><span class="glyphicon glyphicon-save"></span> <b>Save</b></button></div>
            </div><br>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>