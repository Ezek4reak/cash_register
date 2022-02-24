<table class="table-bordered table-responsive" >
    <tr>
        <th >SN </th>
        <th>SUB CONTRACTOR NAME</th>
        <th>TRANSACTION DATE</th>
        <th>TRANSACTION TYPE </th>
        <th>DESCRIPTION</th>
        <th>AMOUNT IN (&#8358;)</th>
        <th>BALANCE IN (&#8358;)</th>
    </tr>
    <?php
    $i = 1;
        foreach($data as $result)
        {
           $amount = $result["trans_amount"];
           $balance = $result["balance"];
           $type = $result["trans_type"] === "New" ? "New Contract" : "Payment";
            print("<tr>");
            print("<td style='text-align:center'>{$i}</td>");
            print("<td>{$result["sc_name"]}</td>");
            print("<td>{$result["trans_date"]}</td>");
            print("<td>{$type}</td>");
            print("<td>{$result["trans_desc"]}</td>");
            print("<td id='cash'>".number_format($amount, 2)."</td>");
            print("<td id='cash'>".number_format($balance, 2)."</td>");
            print("</tr>");
            $i+=1;
        }
    ?>
</table>