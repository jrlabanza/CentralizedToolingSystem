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
	$result = $conn->query('SELECT * FROM cable_history WHERE serial_id LIKE "%'.$filter[0].'%" AND date_time between "'.$from.'" AND "'.$to.'" ORDER BY date_time DESC');
}elseif (!empty($filter[1]) && !empty($filter[2])) {
	$result = $conn->query('SELECT * FROM cable_history WHERE date_time between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" ORDER BY date_time DESC');
}elseif (!empty($filter[1])){
	$result = $conn->query('SELECT * FROM cable_history WHERE date_time >= "'.$from.'" ORDER BY date_time DESC');
}else {
	$result = $conn->query('SELECT * FROM cable_history WHERE serial_id LIKE "%'.$filter[0].'%" ORDER BY date_time DESC');
}


//$num_rows = mysql_num_rows($result);
// $row_cnt = $result->num_rows;
// if ($row_cnt == 0){
// }


echo '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
		<tr>
		<th scope="col" class="col-sm-1">SERIAL ID</th>
		<th scope="col" class="col-sm-1">CONNECTION TYPE</th>
		<th scope="col" class="col-sm-1">STATUS</th>
		<th scope="col" class="col-sm-1">TESTER ID</th>
		<th scope="col" class="col-sm-1">TESTER PF</th>
		<th scope="col" class="col-sm-1">LOCATION</th>
		<th scope="col" class="col-sm-1">RACK</th>
		<th scope="col" class="col">REMARKS</th>
		<th scope="col" class="col-sm-1">LINE</th>
		<th scope="col" class="col-sm-0">CLIENT</th>
		<th scope="col" class="col-sm-0">CUSTODIAN</th>
		<th scope="col" class="col-sm-0">TRANSACT DATE</th>
		</tr>
	</thead>
	<tbody class="">';

	while ($row = $result->fetch_assoc()) {
		echo '<tr>
			<td class="srID">'.$row['serial_id'].'</td>
			<td class="fam">'.$row['conn_type'].'</td>
			<td class="stats">'.$row['status'].'</td>
			<td class="">'.$row['tester_id'].'</td>
			<td class="tst">'.$row['tst_pf'].'</td>
			<td class="loc">'.$row['loc'].'</td>
			<td class="strg">'.$row['storage'].'</td>
			<td class="">'.$row['remarks'].'</td>
			<td class="line">'.$row['line'].'</td>
			<td class="">'.$row['client'].'</td>
			<td class="">'.$row['clerk'].'</td>
			<td class="">'.$row['date_time'].'</td>
		</tr>';
	}
	echo '</tbody>
	</table>';

mysqli_close($conn);
?>
