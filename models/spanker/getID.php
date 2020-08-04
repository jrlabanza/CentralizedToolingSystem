<?php
// require('../dbcon/dbcon.php');
require('../../frameworks/ajaxConn.php');
//
if($_POST['id']){
	$id=$_POST['id'];
	$result = $conn->query('SELECT * FROM spanker WHERE package LIKE "%'.$id.'%" OR box_no LIKE "%'.$id.'%" OR nozzle_partno LIKE "%'.$id.'%" OR machine_model LIKE "%'.$id.'%" OR machine_id LIKE "%'.$id.'%" OR package LIKE "%'.$id.'%"' );
	while ($row = $result->fetch_assoc()) {

            echo '<tr style="cursor: pointer;">
            <td class="lbID">' . $row['box_no'] . '</td>		
            <td class="srID">' . $row['nozzle_partno'] . '</td>
            <td class="prtNo">' . $row['altrntv_nozzle'] . '</td>
            <td class="pckgType">' . $row['package'] . '</td>
            <td class="stats">' . $row['status'] . '</td>
            <td class="loc">' . $row['loc'] . '</td>
            <td class="tst">' . $row['machine_model'] . '</td>
            <td class="tstID">' . $row['machine_id'] . '</td>
            <td class="ShotCnt">' . $row['shots'] . '</td>
            <td class="mShotCnt">' . $row['max_shots'] . '</td>
            <td class="">' . $row['remarks'] . '</td>
            <td class="line">' . $row['line'] . '</td>
            <td class="">' . $row['last_update'] . '</td>
        </tr>';
	}
}
mysqli_close($conn);
?>
