<?php
// require('../dbcon/dbcon.php');
require('../../frameworks/ajaxConn.php');
//
if($_POST['id']){
	$id=$_POST['id'];
      $result = $conn->query('SELECT * FROM cable WHERE serial_id LIKE "%'.$id.'%" OR conn_type LIKE "%'.$id.'%" OR status LIKE "%'.$id.'%" OR 
      tester_id LIKE "%'.$id.'%" OR tst_pf LIKE "%'.$id.'%" OR loc LIKE "%'.$id.'%" OR storage LIKE "%'.$id.'%" AND line LIKE "%'.$_SESSION['line'].'%" ORDER BY id DESC');
	while ($row = $result->fetch_assoc()) {

		echo '<tr style="cursor: pointer;">
                        <td class="srID">' . $row['serial_id'] . '</td>
                        <td class="fam">' . $row['conn_type'] . '</td>
                        <td class="stats">' . $row['status'] . '</td>
                        <td class="">' . $row['tester_id'] . '</td>
                        <td class="tst">' . $row['tst_pf'] . '</td>
                        <td class="loc">' . $row['loc'] . '</td>
                        <td class="strg">' . $row['storage'] . '</td>
                        <td class="">' . $row['remarks'] . '</td>
                        <td class="line">' . $row['line'] . '</td>
                        <td class="">' . $row['last_update'] . '</td>
                  </tr>';
	}
}else if($_POST['id'] == ""){
	$id=$_POST['id'];
	$result = $conn->query('SELECT * FROM cable');
	while ($row = $result->fetch_assoc()) {

            echo '<tr style="cursor: pointer;">
                        <td class="srID">' . $row['serial_id'] . '</td>
                        <td class="fam">' . $row['conn_type'] . '</td>
                        <td class="stats">' . $row['status'] . '</td>
                        <td class="">' . $row['tester_id'] . '</td>
                        <td class="tst">' . $row['tst_pf'] . '</td>
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
