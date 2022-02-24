<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6" style="background:white; border-radius:5px; box-shadow: 3px 3px 5px gray;">
        <form  method="post" autocomplete="off" action="<?php echo ROOT_URL;?>user/addUser" name="userForm">
            <div class="row">
                <div class="modal-header">
                    <h3 class="modal-title">CREATE NEW USER AND ASSIGN ROLE TO HIM/HER</h3>
                </div><br>
            </div>
            <div class="row">
                <div class="col-md-4" style="text-align:right;"><label id="full-input" >Assign Role: </label></div><div class="col-md-8"><select name="role" id="full-input" required><option value="">--Select Role--</option><option value="general">Public User</option><option value="admin">Admin</option><option value="account">Accountant</option><option value="cashier">Cashier</option></select></div>
            </div>
            <div class="row">
                <div class="col-md-4" style="text-align:right;"><label id="full-input" >Username: </label></div><div class="col-md-8"><input autocomplete="off" type="text" id="full-input" name="user_name" required
                                                                                                                                             data-bv-notempty="true"
                                                                                                                                             data-bv-notempty-message="The username is required and cannot be empty"

                                                                                                                                             data-bv-stringlength="true"
                                                                                                                                             data-bv-stringlength-min="6"
                                                                                                                                             data-bv-stringlength-max="30"
                                                                                                                                             data-bv-stringlength-message="The username must be more than 6 and less than 30 characters long"

                                                                                                                                             data-bv-regexp="true"
                                                                                                                                             data-bv-regexp-regexp="^[a-zA-Z0-9]+$"
                                                                                                                                             data-bv-regexp-message="The username can only consist of alphabetical and number"

                                                                                                                                             data-bv-different="true"
                                                                                                                                             data-bv-different-field="password"
                                                                                                                                             data-bv-different-message="The username and password cannot be the same as each other"/></div>
            </div>
            <div class="row">
                <div class="col-md-4" style="text-align:right;"><label id="full-input" >Password: </label></div><div class="col-md-8"><input autocomplete="off" type="password" id="full-input" name="password"required
                                                                                                                                             data-bv-notempty="true"
                                                                                                                                             data-bv-notempty-message="The password is required and cannot be empty"

                                                                                                                                             data-bv-stringlength="true"
                                                                                                                                             data-bv-stringlength-min="8"
                                                                                                                                             data-bv-stringlength-message="The password must have at least 8 characters"

                                                                                                                                             data-bv-different="true"
                                                                                                                                             data-bv-different-field="username"
                                                                                                                                             data-bv-different-message="The password cannot be the same as username"/></div>
            </div>
            <div class="row">
                <div class="col-md-4" style="text-align:right;"><label id="full-input" >Confirm Password: </label></div><div class="col-md-8"><input autocomplete="off" type="password" id="full-input" name="verify_password" required
                                                                                                                                                     data-bv-notempty="true"
                                                                                                                                                     data-bv-notempty-message="The password is required and cannot be empty"

                                                                                                                                                     data-bv-stringlength="true"
                                                                                                                                                     data-bv-stringlength-min="8"
                                                                                                                                                     data-bv-stringlength-message="The password must have at least 8 characters"

                                                                                                                                                     data-bv-identical="true"
                                                                                                                                                     data-bv-identical-field="password"
                                                                                                                                                     data-bv-identical-message="The password and its confirmation are not the same" /></div>
            </div>

            <div class="row">
                <div class="col-md-12"><button class="btn btn-success btn-md" id="full-btn" type="submit" name="userForm" default ><span class="glyphicon glyphicon-user"></span> <b>Submit Form</b></button></div>
            </div><br>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#userForm').bootstrapValidator();
    });
</script>