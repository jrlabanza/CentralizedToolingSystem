<?php
// require('../dbcon/dbcon.php');
require('../../frameworks/ajaxConn.php');
//
if($_POST['id']){
	$id=$_POST['id'];
	$result = $conn->query('SELECT * FROM tfd WHERE package LIKE "%'.$id.'%" OR dieset_serial_number LIKE "%'.$id.'%" OR dieset_number LIKE "%'.$id.'%" OR machine_pf LIKE "%'.$id.'%" OR machine_id LIKE "%'.$id.'%" OR status LIKE "%'.$id.'%"' );
	while ($row = $result->fetch_assoc()) {

            echo '<tr style="cursor: pointer;">
            <td class="td1">' . $row['dieset_number'] . '</td>		
            <td class="td2">' . $row['package'] . '</td>
            <td class="td3">' . $row['dieset_serial_number'] . '</td>
            <td class="td4">' . $row['die_model'] . '</td>
            <td class="stats">' . $row['status'] . '</td>
            <td class="td5">' . $row['machine_pf'] . '</td>
            <td class="td8">' . $row['machine_id'] . '</td>
            <td class="td6">' . $row['rack'] . '</td>
            <td class="td7">' . $row['vendor'] . '</td>
            <td class="">' . $row['remarks'] . '</td>
            <td class="line">' . $row['line'] . '</td>
            <td class="btn-link"><a href="uploads/'. $row['sFile'] .'" target="_blank">'. $row['sFile'] .'</a></td>
            <td class="">' . $row['last_update'] . '</td>
        </tr>';
	}
}
mysqli_close($conn);
?>
