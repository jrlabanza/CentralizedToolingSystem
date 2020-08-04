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
	$result = $conn->query('SELECT * FROM socket_board_history WHERE socket_id WHERE lb_id LIKE "%'.$filter[0].'%" OR handler_id LIKE "%'.$filter[0].'%" OR package_type LIKE "%'.$filter[0].'%" AND date_time between "'.$from.'" AND "'.$to.'" ORDER BY date_time DESC');
}elseif (!empty($filter[1]) && !empty($filter[2])) {
	$result = $conn->query('SELECT * FROM socket_board_history WHERE date_time between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" ORDER BY date_time DESC');
}elseif (!empty($filter[1])){
	$result = $conn->query('SELECT * FROM socket_board_history WHERE date_time >= "'.$from.'" ORDER BY date_time DESC');
}else {
	$result = $conn->query('SELECT * FROM socket_board_history WHERE socket_id LIKE "%'.$filter[0].'%" OR handler_id LIKE "%'.$filter[0].'%" OR package_type LIKE "%'.$filter[0].'%" ORDER BY date_time DESC');
}


//$num_rows = mysql_num_rows($result);
// $row_cnt = $result->num_rows;
// if ($row_cnt == 0){
// }	


echo '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
		<tr>
			<th scope="col" class="col-sm-1">SOCKET BOARD ID</th>
			<th scope="col" class="col-sm-1">FAMILY</th>
			<th scope="col" class="col-sm-1">TEMP</th>
			<th scope="col" class="col-sm-1">PACKAGE TYPE</th>
			<th scope="col" class="col-sm-1">PART NO</th>
			<th scope="col" class="col-sm-1">TST PF</th>
			<th scope="col" class="col-sm-1">STATUS</th>
			<th scope="col" class="col-sm-1">TST ID</th>
			<th scope="col" class="col-sm-1">HD ID</th>
			<th scope="col" class="col-sm-1">LOCATION</th>
			<th scope="col" class="col-sm-1">STORAGE</th>
			<th scope="col" class="col-sm-1">VENDOR</th>
			<th scope="col" class="col-sm-1">LINE</th>
			<th scope="col" class="col-sm-1">SHOT COUNT</th>
			<th scope="col" class="col-sm-1">MAX COUNT</th>
			<th scope="col" class="col-sm-1">SITE</th>
			<th scope="col" class="col">REMARKS</th>
			<th scope="col" class="col-sm-0">S FILE</th>
			<th scope="col" class="col-sm-0">CLIENT</th>
			<th scope="col" class="col-sm-0">CLERK</th>
			<th scope="col" class="col-sm-0">TRANSACT DATE</th>
		</tr>
	</thead>
	<tbody class="">';

	while ($row = $result->fetch_assoc()) {
		echo '<tr>
				<td class="lbID">' . $row['socket_id'] . '</td>
				<td class="fam">' . $row['family'] . '</td>
				<td class="td1">' . $row['temp'] . '</td>
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
				<td class="ShotCnt">' . $row['shotcount'] . '</td>
				<td class="mShotCnt">' . $row['max_shotcount'] . '</td>
				<td class="site">' . $row['site'] . '</td>
				<td class="remarks">' . $row['remarks'] . '</td>
				<td class="btn-link"><a href="uploads/'. $row['sFile'] .'" target="_blank">'. $row['sFile'] .'</a></td>
				<td class="remarks">' . $row['client'] . '</td>
				<td class="remarks">' . $row['clerk'] . '</td>
				<td class="updated">' . $row['date_time'] . '</td>
		</tr>';
	}
	echo '</tbody>
	</table>';

mysqli_close($conn);
?>
