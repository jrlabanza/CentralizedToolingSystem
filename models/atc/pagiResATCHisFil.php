<?php
// require('../dbcon/dbcon.php');
require('../../frameworks/ajaxConn.php');
//
$id=$_POST['id'];
$filter = explode("|", $id);

if (!empty($filter[1])) {
	$from = new DateTime( $filter[1]);
	$from =  date_format($from, 'Y-m-d');
}
if (!empty($filter[2])) {
	$to = new DateTime( $filter[2]);
	$to =  date_format($to, 'Y-m-d');
}

if (!empty($filter[0]) && !empty($filter[1]) && !empty($filter[2])) {
	$result = $conn->query('SELECT * FROM atc_history WHERE serial_id LIKE "%'.$filter[0].'%" AND date_time between "'.$from.'" AND "'.$to.'" ORDER BY date_time DESC');
}elseif (!empty($filter[1]) && !empty($filter[2])) {
	$result = $conn->query('SELECT * FROM atc_history WHERE date_time between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" ORDER BY date_time DESC');
}elseif (!empty($filter[1])){
	$result = $conn->query('SELECT * FROM atc_history WHERE date_time >= "'.$from.'" ORDER BY date_time DESC');
}else {
	$result = $conn->query('SELECT * FROM atc_history WHERE serial_id LIKE "%'.$filter[0].'%" ORDER BY date_time DESC');
}


//$num_rows = mysql_num_rows($result);
// $row_cnt = $result->num_rows;
// if ($row_cnt == 0){
// }


echo '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
		<tr>
			<th scope="col" class="col-sm-0">SERIAL ID</th>
			<th scope="col" class="col-sm-0">DEVICE NAME</th>
			<th scope="col" class="col-sm-0">PACKAGE TYPE</th>
			<th scope="col" class="col-sm-0">TST PF</th>
			<th scope="col" class="col-sm-0">ACU NEED</th>
			<th scope="col" class="col-sm-0">ACU ID</th>
			<th scope="col" class="col-sm-0">PCB BOARD</th>
			<th scope="col" class="col-sm-0">BARE DEVICES</th>
			<th scope="col" class="col-sm-0">ADAP BOARD</th>
			<th scope="col" class="col-sm-0">STATUS</th>
			<th scope="col" class="col-sm-0">LOCATION</th>
			<th scope="col" class="col-sm-0">RACK</th>
			<th scope="col" class="col-sm-0">REMARKS</th>
			<th scope="col" class="col-sm-0">LINE</th>
			<th scope="col" class="col-sm-0">CLIENT</th>
			<th scope="col" class="col-sm-0">CUSTODIAN</th>
			<th scope="col" class="col-sm-0">TRANSACT DATE</th>
		</tr>
	</thead>
	<tbody class="">';

	while ($row = $result->fetch_assoc()) {
		echo '<tr>
			<td class="srID">' . $row['serial_id'] . '</td>
			<td class="fam">' . $row['family'] . '</td>
			<td class="">' . $row['package_type'] . '</td>
			<td class="tst">' . $row['tst_pf'] . '</td>
			<td class="testType">' . $row['acu_need'] . '</td>
			<td class="testType">' . $row['acu_id'] . '</td>
			<td class="">' . $row['pcb_board'] . '</td>
			<td class="tstID">' . $row['bare_devices'] . '</td>
			<td class="hdID">' . $row['adap_board'] . '</td>
			<td class="stats">' . $row['status'] . '</td>
			<td class="loc">' . $row['loc'] . '</td>
			<td class="strg">' . $row['storage'] . '</td>
			<td class="">' . $row['remarks'] . '</td>
			<td class="line">' . $row['line'] . '</td>
			<td class="">' . $row['client'] . '</td>
			<td class="">' . $row['clerk'] . '</td>
			<td class="">' . $row['date_time'] . '</td>
		</tr>';
	}
	echo '</tbody>
	</table>';

mysqli_close($conn);
?>
