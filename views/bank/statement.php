<table class="table-bordered table-responsive" >
    <tr>
        <th >SN </th>
        <th>DATE</th>
        <th>TICKET NO.</th>
        <th>BANK</th>
        <th>MODE</th>
        <th>DESCRIPTION</th>
        <th>AMOUNT IN (&#8358;)</th>
    </tr>
    <?php
    $total_credit=0;
    $total_debit=0;
    $i = 1;
        foreach($data as $result)
        {
            print("<tr>");
            print("<td style='text-align:center'>{$i}</td>");
            print("<td style='white-space: nowrap;'>{$result['trans_date']}</td>");
            print("<td>{$result['ticket_no']}</td>");
            print("<td>{$result['bank_name']} ({$result['account_number']})</td>");
            print("<td>{$result['trans_type']}</td>");
            print("<td>{$result['description']}</td>");
            print("<td id='cash'>".number_format($result['amount'], 2)."</td>");
            if($result['trans_type'] ==='Credit'){
                $total_credit=$total_credit+$result['amount'];
            }else{
                $total_debit=$total_debit+$result['amount'];
            }
            print("</tr>");
            $i+=1;
        }
    print("<tr style='background:;'><td colspan='3' style='visibility:hidden;'></td><td colspan='2' style='color:#107ca8; padding:3px; text-align: center; background:'>
            <b>TOTAL CREDIT</b></td>
            <td id='cash' style='padding:3px; color: #107ca8;' colspan='2'><b>&#8358; "
            .number_format($total_credit, 2)."</b></td></tr>");
    print("<tr style='background: ;'><td colspan='3' style='visibility:hidden;'></td><td colspan='2' style='color:turquoise; padding:3px; text-align: center; background:'>
            <b>TOTAL DEBIT</b></td>
            <td id='cash' style='padding:3px; color:turquoise ;' colspan='2'><b>&#8358; "
            .number_format($total_debit, 2)."</b></td></tr>");
    print("<tr style='background: ;'><td colspan='3' style='visibility:hidden;'></td><td colspan='2' style='color:tomato; padding:3px; text-align: center; background:'>
            <b>DIFFERENCE</b></td>
            <td id='cash' style='padding:3px; color:tomato ;' colspan='2'><b>&#8358; "
            .number_format($total_credit - $total_debit, 2)."</b></td></tr>");
    ?>
</table>
