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
	$result = $conn->query('SELECT * FROM wp_history WHERE (serial_id WHERE lb_id LIKE "%'.$filter[0].'%") AND date_time between "'.$from.'" AND "'.$to.'" ORDER BY date_time DESC');
}elseif (!empty($filter[1]) && !empty($filter[2])) {
	$result = $conn->query('SELECT * FROM wp_history WHERE date_time between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" ORDER BY date_time DESC');
}elseif (!empty($filter[1])){
	$result = $conn->query('SELECT * FROM wp_history WHERE date_time >= "'.$from.'" ORDER BY date_time DESC');
}else {
	$result = $conn->query('SELECT * FROM wp_history WHERE (serial_id LIKE "%'.$filter[0].'%") ORDER BY date_time DESC');
}


//$num_rows = mysql_num_rows($result);
// $row_cnt = $result->num_rows;
// if ($row_cnt == 0){
// }	


echo '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
		<tr>
			<th scope="col" class="col-sm-0">SERIAL ID</th>
			<th scope="col" class="col-sm-0">PACKAGE TYPE</th>
			<th scope="col" class="col-sm-0">PART NO</th>
			<th scope="col" class="col-sm-0">DUT REQ</th>
			<th scope="col" class="col-sm-0">MATERIAL</th>
			<th scope="col" class="col-sm-0">STATUS</th>
			<th scope="col" class="col-sm-0">TESTER MODEL</th>
			<th scope="col" class="col-sm-0">TESTER ID</th>
			<th scope="col" class="col-sm-0">HANDLER MODEL</th>
			<th scope="col" class="col-sm-0">HANDLER ID</th>
			<th scope="col" class="col-sm-0">LOCATION</th>
			<th scope="col" class="col-sm-0">RACK</th>
			<th scope="col" class="col-sm-0">SHOT COUNT</th>
			<th scope="col" class="col-sm-0">MAX COUNT</th>
			<th scope="col" class="col-sm-0">VENDOR</th>
			<th scope="col" class="col-sm-0">LINE</th>
			<th scope="col" class="col-sm-0">S FILE</th>
			<th scope="col" class="col-sm-0">REMARKS</th>
			<th scope="col" class="col-sm-0">CLIENT</th>
			<th scope="col" class="col-sm-0">CLERK</th>
			<th scope="col" class="col-sm-0">GS CODE</th>
			<th scope="col" class="col-sm-0">TRANSACT DATE</th>
		</tr>
	</thead>
	<tbody class="">';

	while ($row = $result->fetch_assoc()) {
		echo '<tr>
				<td class="td1">' . $row['serial_id'] . '</td>
				<td class="td2">' . $row['package_type'] . '</td>
				<td class="td3">' . $row['part_no'] . '</td>
				<td class="td4">' . $row['dut_req'] . '</td>
				<td class="td5">' . $row['material'] . '</td>
				<td class="stats">' . $row['status'] . '</td>
				<td class="tst">' . $row['tst_model'] . '</td>
				<td class="td12">' . $row['tester_id'] . '</td>
				<td class="td9">' . $row['hd_model'] . '</td>
				<td class="td13">' . $row['handler_id'] . '</td>
				<td class="loc">' . $row['loc'] . '</td>
				<td class="strg">' . $row['rack'] . '</td>
				<td class="td11">' . $row['shot_count'] . '</td>
				<td class="td10">' . $row['max_shot_count'] . '</td>
				<td class="td6">' . $row['vendor'] . '</td>
				<td class="line">' . $row['line'] . '</td>
				<td class="btn-link"><a href="uploads/'. $row['sFile'] .'" target="_blank">'. $row['sFile'] .'</a></td>
				<td class="">' . $row['remarks'] . '</td>
				<td class="">' . $row['client'] . '</td>
				<td class="">' . $row['clerk'] . '</td>
				<td class="td7">' . $row['gs_code'] . '</td>
				<td class="td15">' . $row['date_time'] . '</td>
		</tr>';
	}
	echo '</tbody>
	</table>';

mysqli_close($conn);
?>
