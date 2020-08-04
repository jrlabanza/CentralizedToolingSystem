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
	$result = $conn->query('SELECT * FROM ck_history WHERE serial_id LIKE "%'.$filter[0].'%" OR serial_id LIKE "%'.$filter[0].'%" AND date_time between "'.$from.'" AND "'.$to.'" ORDER BY date_time DESC');
}elseif (!empty($filter[1]) && !empty($filter[2])) {
	$result = $conn->query('SELECT * FROM ck_history WHERE date_time between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" ORDER BY date_time DESC');
}elseif (!empty($filter[1])){
	$result = $conn->query('SELECT * FROM ck_history WHERE date_time >= "'.$from.'" ORDER BY date_time DESC');
}else {
	$result = $conn->query('SELECT * FROM ck_history WHERE serial_id LIKE "%'.$filter[0].'%" ORDER BY date_time DESC');
}


//$num_rows = mysql_num_rows($result);
// $row_cnt = $result->num_rows;
// if ($row_cnt == 0){
// }


echo '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
		<tr>
		<th scope="col" class="col-sm-0">SERIAL ID</th>
		<th scope="col" class="col-sm-0">CATEGORY</th>
		<th scope="col" class="col-sm-0">HANDLER PLATFORM</th>
		<th scope="col" class="col-sm-0">TESTER PLATFORM</th>
		<th scope="col" class="col-sm-0">STORAGE</th>
		<th scope="col" class="col-sm-0">PACKAGE TYPE</th>
		<th scope="col" class="col-sm-0">STATUS</th>
		<th scope="col" class="col-sm-0">SIZE</th>
		<th scope="col" class="col-sm-0">FINAL RESULT</th>
		<th scope="col" class="col">REMARKS</th>
		<th scope="col" class="col-sm-0">LINE</th>
		<th scope="col" class="col-sm-0">DATE TIME</th>
		<th scope="col" class="col-sm-0">LAST UPDATE</th>
		<th scope="col" class="col">CLIENT</th>
		<th scope="col" class="col-sm-0">S FILE</th>
		</tr>
	</thead>
	<tbody class="">';

	while ($row = $result->fetch_assoc()) {
		echo '<tr>
		<td class="srID">' . $row['serial_id'] . '</td>
		<td class="cat">' . $row['category'] . '</td>
		<td class="hdPF">' . $row['handler_pf'] . '</td>
		<td class="tst">' . $row['tester_pf'] . '</td>
		<td class="strg">' . $row['storage'] . '</td>
		<td class="pkgType">' . $row['package_type'] . '</td>
		<td class="pkgType">' . $row['status'] . '</td>
		<td class="size">' . $row['size'] . '</td>
		<td class="ckResult">' . $row['ckResult'] . '</td>
		<td class="">' . $row['remarks'] . '</td>
		<td class="ckResult">' . $row['line'] . '</td>
		<td class="date">' . $row['date_time'] . '</td>
		<td class="updated">' . $row['last_update'] . '</td>
		<td class="">' . $row['custodian'] . '</td>
		<td class="btn-link"><a href="uploads/'. $row['sFile'] .'" target="_blank">'. $row['sFile'] .'</a></td>
		</tr>';
	}
	echo '</tbody>
	</table>';

mysqli_close($conn);
?>
