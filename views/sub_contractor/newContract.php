<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6" style="background:white; border-radius:5px; box-shadow: 3px 3px 5px gray;">
        <form name ="price_form" method="post" action="<?php echo ROOT_URL;?>sub_contractor/addNewContract">
            <div class="row">
                <div class="modal-header">
                    <h4 class="modal-title">Enter Details of the new contract</h4>
                </div>
            </div><br>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">Select Sub Contractor</span>
                        <select class="form-control input-sm"  name="sc_id" style="width:320px;" required>
                            <option value="">Select Which Contractor</option>
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
                        <span class="input-group-addon" style="width:180px;">Contract Description</span>
                        <input class="form-control input-sm" placeholder="required" autocomplete="off" type="text" name="trans_desc" 
                            value="<?php echo isset($_POST['sc_name']) ? $_POST['trans_desc'] : '';?>" style="width:320px;" required/>
                    </div>
                </div>
            </div>
           <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12" style="display:flex; justify-content:center;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" style="width:180px;">Contract Value/Amount</span>
                        <input class="form-control input-sm" placeholder="required" autocomplete="off" type="text" name="trans_amount" 
                            value="<?php echo isset($_POST['company_name']) ? $_POST['trans_amount'] : '';?>" style="width:320px;" required/>
                    </div>
                </div>
            </div>
            <br>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12 " style="display:flex; justify-content:center;"><button style="width:500px;"class="btn btn-success btn-md" type="submit" name="submit_contract" default ><span class="glyphicon glyphicon-save"></span> <b>Save</b></button></div>
            </div><br>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>