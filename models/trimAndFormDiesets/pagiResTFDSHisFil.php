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
	$result = $conn->query('SELECT * FROM tfd_history WHERE (status LIKE "%'.$filter[0].'%" OR dieset_number LIKE "%'.$filter[0].'%" OR dieset_serial_number LIKE "%'.$filter[0].'%" OR package LIKE "%'.$filter[0].'%") AND (date_time between "'.$from.'" AND "'.$to.'") ORDER BY date_time DESC');
}elseif (!empty($filter[1]) && !empty($filter[2])) {
	$result = $conn->query('SELECT * FROM tfd_history WHERE date_time between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" ORDER BY date_time DESC');
}elseif (!empty($filter[1])){
	$result = $conn->query('SELECT * FROM tfd_history WHERE date_time >= "'.$from.'" ORDER BY date_time DESC');
}else {
	$result = $conn->query('SELECT * FROM tfd_history WHERE status LIKE "%'.$filter[0].'%" OR dieset_number LIKE "%'.$filter[0].'%" OR dieset_serial_number LIKE "%'.$filter[0].'%" OR package LIKE "%'.$filter[0].'%" ORDER BY date_time DESC');
}


//$num_rows = mysql_num_rows($result);
// $row_cnt = $result->num_rows;
// if ($row_cnt == 0){
// }	

echo '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
		<tr>
			<th scope="col" class="col-sm-1">DIESET NUMBER</th>
			<th scope="col" class="col-sm-1">PACKAGE</th>	
			<th scope="col" class="col-sm-1">STATUS</th>
			<th scope="col" class="col-sm-1">MOLD DIE ID</th>
			<th scope="col" class="col-sm-1">MACHINE PF</th>
			<th scope="col" class="col-sm-1">MACHINE ID</th>
			<th scope="col" class="col-sm-3">REMARKS</th>
			<th scope="col" class="col-sm-1">CLIENT</th>
			<th scope="col" class="col-sm-1">CUSTODIAN</th>
			<th scope="col" class="col-sm-1">LINE</th>
			<th scope="col" class="col-sm-1">S FILE</th>
			<th scope="col" class="col-sm-1">DATE / TIME</th>
		</tr>
	</thead>
	<tbody class="">';

	while ($row = $result->fetch_assoc()) {
		echo '<tr>
			<td class="srID">' . $row['dieset_number'] . '</td>
			<td class="prtNo">' . $row['package'] . '</td>
			<td class="stats">' . $row['status'] . '</td>
			<td class="stats">' . $row['dieset_serial_number'] . '</td>
			<td class="tst">' . $row['machine_pf'] . '</td>
			<td class="tstID">' . $row['machine_id'] . '</td>
			<td class="">' . $row['remarks'] . '</td>
			<td class="">' . $row['client'] . '</td>
			<td class="">' . $row['clerk'] . '</td>
			<td class="line">' . $row['line'] . '</td>
			<td class="btn-link"><a href="uploads/'. $row['sFile'] .'" target="_blank">'. $row['sFile'] .'</a></td>
			<td class="td11">' . $row['date_time'] . '</td>
		</tr>';
	}
	echo '</tbody>
	</table>';

mysqli_close($conn);
?>
