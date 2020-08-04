<?php
// require('../dbcon/dbcon.php');
require('../../frameworks/ajaxConn.php');
//
if($_POST['id']){
	$id=$_POST['id'];
	$result = $conn->query('SELECT * FROM wp WHERE package_type LIKE "%'.$id.'%" OR serial_id LIKE "%'.$id.'%" OR status LIKE "%'.$id.'%" OR tst_model LIKE "%'.$id.'%" OR part_no LIKE "%'.$id.'%"');
	while ($row = $result->fetch_assoc()) {

		echo '<tr style="cursor: pointer;">
            <td class="td1">'.$row['serial_id'].'</td>
            <td class="td2">'.$row['package_type'].'</td>
            <td class="td3">'.$row['part_no'].'</td>
            <td class="td4">'.$row['dut_req'].'</td>
            <td class="td5">'.$row['material'].'</td>
            <td class="stats">'.$row['status'].'</td>
            <td class="tst">'.$row['tst_model'].'</td>
            <td class="td12">'.$row['tester_id'].'</td>
            <td class="td9">'.$row['hd_model'].'</td>
            <td class="td13">'.$row['handler_id'].'</td>
            <td class="loc">'.$row['loc'].'</td>
            <td class="strg">'.$row['rack'].'</td>
            <td class="td11">'.$row['shot_count'].'</td>
            <td class="td10">'.$row['max_shot_count'].'</td>
            <td class="td6">'.$row['vendor'].'</td>
            <td class="line">'.$row['line'].'</td>
            <td class="btn-link"><a href="uploads/'. $row['sFile'] .'" target="_blank">'. $row['sFile'] .'</a></td>
            <td class="">'.$row['remarks'].'</td>
            <td class="td7">'.$row['gs_code'].'</td>
            <td class="td15">'.$row['last_update'].'</td>

        </tr>';
	}
}
mysqli_close($conn);
?>
