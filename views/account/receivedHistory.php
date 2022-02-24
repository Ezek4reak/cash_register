<div class="row noprint">
    <div class="col-md-12" style="display:flex; justify-content:center">
        <form method="post" action="<?php echo ROOT_URL;?>account/receivedHistory">
            <div class="row" style="text-align:center; color:#900C3F;">
                <b>FILTER BETWEEN TWO DATES</b>
            </div>
            <div class="row" style="display:flex; justify-content:center; overflow:none;">
                <div class="col-md-6" style="display:flex; justify-content:center;">
                        <div class="input-group col-sm-4">
                            <span class="input-group-addon">Between</span>
                            <input class="form-control input-sm" style="width:180px;" placeholder="12-07-2020" autocomplete="off" type="date" name="start_date" required/>
                        </div>
                  
                        <div class="input-group col-sm-4">
                            <span class="input-group-addon">And</span>
                            <input class="form-control input-sm" style="width:180px;" placeholder="12-07-2020"  autocomplete="off" type="date" name="end_date" required/>
                        </div>
                        <div class="input-group-btn " style="width:100px;">
                           <button class="btn btn-primary btn-sm" style="width:100%;" type="submit" name="filter_received" default >Filter</button>
                        </div>
                </div>
            </div> 
        </form>
     </div>
</div>
<hr>
<div style="overflow:auto;">
<table>
    <tr>
        <th> S/N </th>
        <th>DATE</th>
        <th>AMOUNT RECEIVED(&#8358;)</th>
        <th>DESCRIPTION </th>
        <th>ACCOUNT AFFECTED</th>
    </tr>
    <?php
    $sn =1;
    $total = 0;
    foreach($data as $result)
    {
        echo '  
           <tr>
            <td style="text-align:center">'.$sn.'</td>
            <td >'.$result["trans_date"].'</td>
            <td id="cash">'.number_format($result["amount"],2).'</td>
            <td >'.$result["description"].'</td>
            <td >'.$result["account_type"].'</td>';
            
        $sn +=1;
        $total += (float)$result['amount'];

    }
     print("<tr style='background: #107ca8;'><td colspan='2' style='color:white; font-size:1.1em'>
        <b>TOTAL </b></td>
        <td style='color:white; font-size:1.1em; font-weight:bold;text-align:right;'>&#8358;"
        .number_format($total, 2)."</td><td colspan='2'></td></tr>");
    ?>
</table>
</div>