<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6" style="background:white; border-radius:5px; box-shadow: 3px 3px 5px gray;">
        <form name ="price_form" method="post" action="<?php echo ROOT_URL;?>sub_contractor/addNew">
            <div class="row">
                <div class="modal-header">
                    <h4 class="modal-title">Enter Details of the new sub-contractor</h4>
                </div>
            </div><br>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">Sub Contractor's Name</span>
                        <input class="form-control input-sm" placeholder="required" autocomplete="off" type="text" name="sc_name" 
                            value="<?php echo isset($_POST['sc_name']) ? $_POST['sc_name'] : '';?>" style="width:320px;" required/>
                    </div>
                </div>
            </div>
           <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">Company Name</span>
                        <input class="form-control input-sm" placeholder="Optional" autocomplete="off" type="text" name="company_name" 
                            value="<?php echo isset($_POST['company_name']) ? $_POST['company_name'] : '';?>" style="width:320px;"/>
                    </div>
                </div>
            </div>
           <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">Sub Contractor's Address</span>
                        <input class="form-control input-sm" placeholder="required" autocomplete="off" type="text" name="sc_address" 
                            value="<?php echo isset($_POST['sc_address']) ? $_POST['sc_address'] : '';?>" style="width:320px;" required/>
                    </div>
                </div>
            </div>
           <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">Sub Contractor's Telephone</span>
                        <input class="form-control input-sm" placeholder="required" autocomplete="off" type="text" name="sc_tel" 
                            value="<?php echo isset($_POST['sc_tel']) ? $_POST['sc_tel'] : '';?>" style="width:320px;" required/>
                    </div>
                </div>
            </div>
           <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">Sub Contractor's Services</span>
                        <input class="form-control input-sm" placeholder="required" autocomplete="off" type="text" name="sc_service" 
                            value="<?php echo isset($_POST['sc_service']) ? $_POST['sc_service'] : '';?>" style="width:320px;" required/>
                    </div>
                </div>
            </div>
            <br>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12 " style="display:flex; justify-content:center;"><button style="width:500px;"class="btn btn-success btn-md" type="submit" name="submit_sc" default ><span class="glyphicon glyphicon-save"></span> <b>Save</b></button></div>
            </div><br>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>