<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6" style="background:white; border-radius:5px; box-shadow: 3px 3px 5px gray;">
        <form name ="price_form" method="post" action="<?php echo ROOT_URL;?>sub_contractor/single">
            <div class="row">
                <div class="modal-header">
                    <h4 class="modal-title">Select The Sub Contractor</h4>
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
            <br>
            <div class="row" style="display:flex; justify-content:center;">
                <div class="col-md-12 " style="display:flex; justify-content:center;"><button style="width:500px;"class="btn btn-success btn-md" type="submit" name="single_sc" default > <b>Look Him/Her up</b></button></div>
            </div><br>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>