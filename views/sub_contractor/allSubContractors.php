<table class="table-bordered table-responsive" >
    <tr>
        <th >SN </th>
        <th>SUB CONTRACTOR NAME</th>
        <th>COMPANY NAME</th>
        <th> ADDRESS </th>
        <th>TELEPHONE</th>
        <th>SERVICES</th>
        <th>BALANCE IN (&#8358;)</th>
    </tr>
    <?php
    $total_value=0;
    $i = 1;
        foreach($data as $result)
        {
           $tel = $result["sc_tel"];
           $bal = $result["account"];
            print("<tr>");
            print("<td style='text-align:center'>{$i}</td>");
            print("<td>{$result["sc_name"]}</td>");
            print("<td style='white-space: nowrap;'>{$result["company_name"]}</td>");
            print("<td>{$result["sc_address"]}</td>");
            print("<td style='text-align:center'><a href='tel:$tel'>{$tel}</a></td>");
            print("<td>{$result["sc_service"]}</td>");
            print("<td id='cash'>".number_format($bal, 2)."</td>");
            $total_value=$total_value+$bal;
            print("</tr>");
            $i+=1;
        }
    print("<tr style='background: #107ca8;'><td colspan='3' style='color:white; padding:3px;'>
            <b>CONTRACTORS TOTAL BALANCE</b></td>
            <td id='cash' style='padding:3px; color: gold;' colspan='4'><b>&#8358;"
            .number_format($total_value, 2)."</b></td></tr>");
    ?>
</table>