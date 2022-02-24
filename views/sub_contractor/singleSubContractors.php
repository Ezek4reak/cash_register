<table>
    <tr>
        <th >SN </th>
        <th>SUB CONTRACTOR NAME</th>
        <th>COMPANY NAME</th>
        <th> ADDRESS </th>
        <th>TELEPHONE</th>
        <th>SERVICES</th>
        <th>ACCOUNT BALANCE</th>
    </tr>
    <?php
    $i = 1;
           $tel = $data["sc_tel"];
           $bal = $data["account"];
            print("<tr>");
            print("<td style='text-align:center'>{$i}</td>");
            print("<td>{$data["sc_name"]}</td>");
            print("<td>{$data["company_name"]}</td>");
            print("<td>{$data["sc_address"]}</td>");
            print("<td style='text-align:center'><a href='tel:$tel'>{$tel}</a></td>");
            print("<td>{$data["sc_service"]}</td>");
            print("<td id='cash'>&#8358;".number_format($bal, 2)."</td>");
            print("</tr>");
    ?>
</table>