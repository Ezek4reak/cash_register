<div style="overflow-y:auto;">
<table class='table-bordered table-responsive'>
    <tr><th colspan='3' style='background:midnightblue;'>LIST OF ACCOUNTS</th></tr>
    <tr>
        <th> S/N </th>
        <th>ACCOUNT CODE </th>
        <th>ACCOUNT NAME</th>
    </tr>
    <?php
    $sn =1;
    foreach($data as $result)
    {
        echo '  
           <tr>
            <td style="text-align:center">'.$sn.'</td>
            <td >'.$result["account_name"].'</td>
            <td >'.$result["account_desc"].'</td>';
            
        $sn +=1;

    }
?>
</table>
</div>