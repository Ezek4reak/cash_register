<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6" style="background:white; border-radius:5px; box-shadow: 3px 3px 5px gray;">
        <form name ="price_form" method="post" action="<?php echo ROOT_URL;?>account/addNew">
            <div class="row">
                <div class="modal-header">
                    <h4 class="modal-title">Enter Details of the new Account</h4>
                </div>
            </div><br>
           <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">Account Code</span>
                        <input class="form-control input-sm" placeholder="e.g RTA for Red Tacoma Account" autocomplete="off" type="text" name="account_name" 
                            value="<?php echo isset($_POST['account_name']) ? $_POST['account_name'] : '';?>" style="width:320px;" required/>
                    </div>
                </div>
            </div>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">Account Name</span>
                        <input class="form-control input-sm" placeholder="e.g Red Tacoma Account" autocomplete="off" type="text" name="account_desc" 
                            value="<?php echo isset($_POST['account_desc']) ? $_POST['account_desc'] : '';?>" style="width:320px;" required/>
                    </div>
                </div>
            </div>
            <br>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12 " style="display:flex; justify-content:center;"><button style="width:500px;"class="btn btn-success btn-md" type="submit" name="submit_account" default ><span class="glyphicon glyphicon-save"></span> <b>Save</b></button></div>
            </div><br>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>