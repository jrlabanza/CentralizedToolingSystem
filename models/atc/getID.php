<?php
// require('../dbcon/dbcon.php');
require('../../frameworks/ajaxConn.php');
//
if($_POST['id']){
	$id=$_POST['id'];
	$result = $conn->query('SELECT * FROM atc WHERE serial_id LIKE "%'.$id.'%" AND line LIKE "%'.$_SESSION['line'].'%" ORDER BY id DESC');
	while ($row = $result->fetch_assoc()) {

		echo '<tr style="cursor: pointer;">
                        <td class="srID">' . $row['serial_id'] . '</td>
                        <td class="fam">' . $row['family'] . '</td>
                        <td class="">' . $row['package_type'] . '</td>
                        <td class="testType">' . $row['acu_need'] . '</td>
                        <td class="">' . $row['acu_id'] . '</td>
                        <td class="">' . $row['tester_id'] . '</td>
                        <td class="tst">' . $row['tst_pf'] . '</td>
                        <td class="">' . $row['pcb_board'] . '</td>
                        <td class="tstID">' . $row['bare_devices'] . '</td>
                        <td class="hdID">' . $row['adap_board'] . '</td>
                        <td class="stats">' . $row['status'] . '</td>
                        <td class="loc">' . $row['loc'] . '</td>
                        <td class="strg">' . $row['storage'] . '</td>
                        <td class="">' . $row['remarks'] . '</td>
                        <td class="line">' . $row['line'] . '</td>
                        <td class="">' . $row['last_update'] . '</td>

        </tr>';
	}
}else if($_POST['id'] == ""){
	$id=$_POST['id'];
	$result = $conn->query('SELECT * FROM atc');
	while ($row = $result->fetch_assoc()) {

            echo '<tr style="cursor: pointer;">
                        <td class="srID">' . $row['serial_id'] . '</td>
                        <td class="fam">' . $row['family'] . '</td>
                        <td class="">' . $row['package_type'] . '</td>
                        <td class="testType">' . $row['acu_need'] . '</td>
                        <td class="">' . $row['acu_id'] . '</td>
                        <td class="">' . $row['tester_id'] . '</td>
                        <td class="tst">' . $row['tst_pf'] . '</td>
                        <td class="">' . $row['pcb_board'] . '</td>
                        <td class="tstID">' . $row['bare_devices'] . '</td>
                        <td class="hdID">' . $row['adap_board'] . '</td>
                        <td class="stats">' . $row['status'] . '</td>
                        <td class="loc">' . $row['loc'] . '</td>
                        <td class="strg">' . $row['storage'] . '</td>
                        <td class="">' . $row['remarks'] . '</td>
                        <td class="line">' . $row['line'] . '</td>
                        <td class="">' . $row['last_update'] . '</td>
      </tr>';
	}
}
mysqli_close($conn);
?>
