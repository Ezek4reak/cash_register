<?php
/**
 * Created by PhpStorm.
 * User: Ezekiel
 * Date: 02-May-18
 * Time: 11:16 PM
 */
App::msgType();
?>
<div class="row">
    <div class="col-md-5"></div>
        <div class="col-md-2">
            <button class="btn btn-success" onclick="goBack()">
                <span class="glyphicon glyphicon-backward"></span> Back To Previous Page? </button>
        </div>
    <div class="col-md-5"></div>
</div>

<script>
    function goBack() {
        window.history.back();
    }
</script>

