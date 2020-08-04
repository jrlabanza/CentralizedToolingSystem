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
	$result = $conn->query('SELECT * FROM nozzle_history WHERE box_no LIKE "%'.$filter[0].'%" OR nozzle_partno LIKE "%'.$filter[0].'%" OR package LIKE "%'.$filter[0].'%" AND date_time between "'.$from.'" AND "'.$to.'" ORDER BY date_time DESC');
}elseif (!empty($filter[1]) && !empty($filter[2])) {
	$result = $conn->query('SELECT * FROM nozzle_history WHERE date_time between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" ORDER BY date_time DESC');
}elseif (!empty($filter[1])){
	$result = $conn->query('SELECT * FROM nozzle_history WHERE date_time >= "'.$from.'" ORDER BY date_time DESC');
}else {
	$result = $conn->query('SELECT * FROM nozzle_history WHERE box_no LIKE "%'.$filter[0].'%" OR nozzle_partno LIKE "%'.$filter[0].'%" OR package LIKE "%'.$filter[0].'%" OR machine_id LIKE "%'.$filter[0].'%" ORDER BY date_time DESC');
}


//$num_rows = mysql_num_rows($result);
// $row_cnt = $result->num_rows;
// if ($row_cnt == 0){
// }	


echo '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
		<tr>
		<th scope="col" class="col-sm-0">BAG NO.</th>
		<th scope="col" class="col-sm-0">NOZZLE TYPE</th>
		<th scope="col" class="col-sm-0">ALTERNATIVE NOZZLE</th>	
		<th scope="col" class="col-sm-0">NOZZLE PART NO.</th>
		<th scope="col" class="col-sm-0">STATUS</th>
		<th scope="col" class="col-sm-0">LOCATION</th>
		<th scope="col" class="col-sm-0">MACHINE ID</th>
		<th scope="col" class="col-sm-0">MAX SHOTS</th>
		<th scope="col" class="col-sm-0">SHOTS</th>
		<th scope="col" class="col-sm-0">CUSTODIAN</th>
		<th scope="col" class="col-sm-0">CLIENT</th>
		<th scope="col" class="col-sm-0">REMARKS</th>
		<th scope="col" class="col-sm-0">DATE / TIME</th>
		</tr>
	</thead>
	<tbody class="">';

	while ($row = $result->fetch_assoc()) {
		echo '<tr>
		<td class="lbID">' . $row['box_no'] . '</td>
		<td class="pckgType">' . $row['package'] . '</td>
		<td class="prtNo">' . $row['altrntv_nozzle'] . '</td>
		<td class="srID">' . $row['nozzle_partno'] . '</td>
		<td class="stats">' . $row['status'] . '</td>
		<td class="stats">' . $row['loc'] . '</td>
		<td class="tstID">' . $row['machine_id'] . '</td>
		<td class="mShotCnt">' . $row['max_shots'] . '</td>
		<td class="ShotCnt">' . $row['shots'] . '</td>
		<td class="">' . $row['clerk'] . '</td>
		<td class="">' . $row['client'] . '</td>
		<td class="">' . $row['remarks'] . '</td>
		<td class="td11">' . $row['date_time'] . '</td>
		</tr>';
	}
	echo '</tbody>
	</table>';

mysqli_close($conn);
?>
