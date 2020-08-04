<?php
// require('../dbcon/dbcon.php');
require('../../frameworks/ajaxConn.php');
//
if($_POST['id']){
	$id=$_POST['id'];
	$result = $conn->query('SELECT * FROM socket WHERE package_type LIKE "%'.$id.'%" OR socket_id LIKE "%'.$id.'%" OR handler_id LIKE "%'.$id.'%" OR package_type LIKE "%'.$id.'%" OR status LIKE "%'.$id.'%" OR family LIKE "%'.$id.'%" ORDER BY last_update DESC');
	while ($row = $result->fetch_assoc()) {

		echo '<tr style="cursor: pointer;">
            <td class="lbID">' . $row['socket_id'] . '</td>
            <td class="fam">' . $row['family'] . '</td>
            <td class="pckgType">' . $row['package_type'] . '</td>
            <td class="prtNo">' . $row['part_no'] . '</td>
            <td class="tst">' . $row['tst_pf'] . '</td>
            <td class="stats">' . $row['status'] . '</td>
            <td class="tstID">' . $row['tester_id'] . '</td>
            <td class="hdID">' . $row['handler_id'] . '</td>
            <td class="loc">' . $row['loc'] . '</td>
            <td class="strg">' . $row['storage'] . '</td>
            <td class="ven">' . $row['vendor'] . '</td>
            <td class="line">' . $row['line'] . '</td>
            <td class="pinType">' . $row['pin_type'] . '</td>
            <td class="pinCount">' . $row['pin_count'] . '</td>
            <td class="ShotCnt">' . $row['shotcount'] . '</td>
            <td class="mShotCnt">' . $row['max_shotcount'] . '</td>
            <td class="site">' . $row['site'] . '</td>
            <td class="gsCode">' . $row['gs_code'] . '</td>
            <td class="remarks">' . $row['remarks'] . '</td>
            <td class="updated">' . $row['last_update'] . '</td>
        </tr>';
	}
}
mysqli_close($conn);
?>
