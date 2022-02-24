<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6" style="background:white; border-radius:5px; box-shadow: 3px 3px 5px gray;">
        <form name ="price_form" method="post" action="<?php echo ROOT_URL;?>account/newBank">
            <div class="row">
                <div class="modal-header">
                    <h4 class="modal-title">Enter Details of the new Bank Account</h4>
                </div>
            </div><br>
           <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">Bank Name</span>
                        <input class="form-control input-sm" placeholder="e.g Zenith Bank" autocomplete="off" type="text" name="bank_name"
                            value="<?php echo isset($_POST['bank_name']) ? $_POST['bank_name'] : '';?>" style="width:320px;" required/>
                    </div>
                </div>
            </div>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">Account Number</span>
                        <input class="form-control input-sm" placeholder="e.g 1002010024" autocomplete="off" type="text" name="account_number"
                            value="<?php echo isset($_POST['account_number']) ? $_POST['account_number'] : '';?>" style="width:320px;" required/>
                    </div>
                </div>
            </div>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">Account Manager Name</span>
                        <input class="form-control input-sm" placeholder="Optional" autocomplete="off" type="text" name="account_manager"
                            value="<?php echo isset($_POST['account_manager']) ? $_POST['account_manager'] : '';?>" style="width:320px;"/>
                    </div>
                </div>
            </div>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">Account Manager Number</span>
                        <input class="form-control input-sm" placeholder="e.g 08052187634 (Optional)" autocomplete="off" type="text" name="account_manager_tel"
                            value="<?php echo isset($_POST['account_manager_tel']) ? $_POST['account_manager_tel'] : '';?>" style="width:320px;"/>
                    </div>
                </div>
            </div>
            <br>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12 " style="display:flex; justify-content:center;"><button style="width:500px;"class="btn btn-success btn-md" type="submit" name="submit_bank" default ><span class="glyphicon glyphicon-save"></span> <b>Save</b></button></div>
            </div><br>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
