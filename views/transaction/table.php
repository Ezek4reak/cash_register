        <div class="row noprint">
            <div class="col-md-12" style="display:flex; justify-content:center">
                <form method="post" action="<?php echo ROOT_URL;?>transaction/filter">
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
                                   <button class="btn btn-primary btn-sm" style="width:100%;" type="submit" name="filter_transaction" default >Filter</button>
                                </div>
                        </div>
                    </div>
                </form>
             </div>
        </div>
        <hr>
<div class="row" >
    <div class="col-md-12">
        <table class="table-bordered table-responsive table-rounded">
            <tr>
                <th> S/N </th>
                <th>TYPE</th>
                <th>ACCOUNT AFFECTED</th>
                <th> TRANS. DATE</th>
                <th>DESCRIPTION </th>
                <th>AMOUNT (&#8358;)</th>
                <th>BAL. BEFORE (&#8358;)</th>
                <th>BAL. AFTER (&#8358;)</th>
            </tr>
            <?php
            $sn =1;
            $total_received = 0;
            $total_paid = 0;
            foreach($data as $result)
            {
                echo '
                   <tr>
                    <td style="text-align:center">'.$sn.'</td>
                    <td >'.$result["trans_type"].'</td>
                    <td >'.$result["account_type"].'</td>
                    <td >'.$result["trans_date"].'</td>
                    <td >'.$result["description"].'</td>
                    <td class="cash">'.number_format($result["amount"],2).'</td>
                    <td class="cash">'.number_format($result["old_balance"],2).'</td>
                    <td class="cash">'.number_format($result["new_balance"],2).'</td>';

                $sn +=1;
                if ($result["account_type"]==='Account Receivable') {
                    $total_received += $result["amount"];
                }else{
                    $total_paid += $result["amount"];
                }

            }
            $difference = $total_received - $total_paid;
        ?>
        </table>
    </div>
    <div class='row bottom-row'>
        <div class='col-md-4'></div>
        <div class="col-md-4" style="display:flex; justify-content:center;">
            <table class="table-bordered table-responsive table-rounded">
            <?php
            print("<tr><th>TOTAL CREDIT</th><th>TOTAL DEBIT</th><th>BALANCE</th></tr>");
            print("<tr><td class='cash'>".number_format($total_received, 2)."</td><td class='cash'>".number_format($total_paid, 2)."</td><td class='cash'>".number_format($difference, 2)."</td></tr>");
            ?>
            </table>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

