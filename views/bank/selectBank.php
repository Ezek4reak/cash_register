<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6" style="background:white; border-radius:5px; box-shadow: 3px 3px 5px gray;">
        <form name ="price_form" method="post" action="<?php echo ROOT_URL;?>transaction/bankStatement">
            <div class="row">
                <div class="modal-header">
                    <h4 class="modal-title">Select Which Bank's Statement You Want</h4>
                </div>
            </div><br>
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
                        <span class="input-group-addon" style="width:180px;">Start Date</span>
                        <input class="form-control input-sm" placeholder="required" autocomplete="off" type="date" name="start" 
                            value="<?php echo isset($_POST['start']) ? $_POST['start'] : '';?>" style="width:320px;" required/>
                    </div>
                </div>
            </div>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">End Date</span>
                        <input class="form-control input-sm" placeholder="required" autocomplete="off" type="date" name="end" 
                            value="<?php echo isset($_POST['end']) ? $_POST['end'] : '';?>" style="width:320px;" required/>
                    </div>
                </div>
            </div>
            <br>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12 " style="display:flex; justify-content:center;"><button style="width:500px;"class="btn btn-success btn-md" type="submit" name="bank" default > <b>Get Statement</b></button></div>
            </div><br>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>