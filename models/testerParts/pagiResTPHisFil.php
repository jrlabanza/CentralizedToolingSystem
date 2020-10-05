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
	$result = $conn->query('SELECT * FROM tstpartstrck_history WHERE srl_no LIKE "%'.$filter[0].'%" OR srl_no LIKE "%'.$filter[0].'%" AND date_time between "'.$from.'" AND "'.$to.'" ORDER BY date_time DESC');
}elseif (!empty($filter[1]) && !empty($filter[2])) {
	$result = $conn->query('SELECT * FROM tstpartstrck_history WHERE date_time between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" ORDER BY date_time DESC');
}elseif (!empty($filter[1])){
	$result = $conn->query('SELECT * FROM tstpartstrck_history WHERE date_time >= "'.$from.'" ORDER BY date_time DESC');
}else {
	$result = $conn->query('SELECT * FROM tstpartstrck_history WHERE srl_no LIKE "%'.$filter[0].'%" ORDER BY date_time DESC');
}


//$num_rows = mysql_num_rows($result);
// $row_cnt = $result->num_rows;
// if ($row_cnt == 0){
// }


echo '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
<thead id="thead" class="thead-light">
	<tr>
	<th scope="col" class="col-sm-0">ITEM NAME</th>
	<th scope="col" class="col-sm-0">QUANTITY</th>
	<th scope="col" class="col-sm-0">PART NAME</th>
	<th scope="col" class="col-sm-0">PART NUMBER</th>
	<th scope="col" class="col-sm-0">SERIAL NUMBER</th>
	<th scope="col" class="col-sm-0">VENDOR</th>
	<th scope="col" class="col-sm-0">TESTER PLATFORM</th>
	<th scope="col" class="col-sm-0">STATUS</th>
	<th scope="col" class="col-sm-0">LOCATION</th>
	<th scope="col" class="col-sm-0">REMARKS</th>
	<th scope="col" class="col-sm-0">COST($)</th>
	<th scope="col" class="col-sm-0">PERSONEL</th>
	<th scope="col" class="col-sm-0">DATE /TIME</th>
	<th scope="col" class="col-sm-0">INSTALLED TO</th>
	</tr>
</thead>
<tbody class="">';

	while ($row = $result->fetch_assoc()) {
		echo '
		<tr>
		<td class="itm_nm">' . $row['itm_nm'] . '</td>
		<td class="quantity">' . $row['quantity'] . '</td>
		<td class="dscrptn">' . $row['dscrptn'] . '</td>
		<td class="prt_no">' . $row['prt_no'] . '</td>
		<td class="srl_no">' . $row['srl_no'] . '</td>
		<td class="vendor">' . $row['vendor'] . '</td>
		<td class="mchn_model">' . $row['mchn_model'] . '</td>
		<td class="status">' . $row['status'] . '</td>
		<td class="lction">' . $row['lction'] . '</td>
		<td class="remarks">' . $row['remarks'] . '</td>
		<td class="installedTo">' . $row['srl_no'] . '</td>
		<td class="prson">' . $row['prson'] . '</td>
		<td class="date_time">' . $row['date_time'] . '</td>
		<td class="installedTo">' . $row['installedTo'] . '</td>
		</tr>';
	}
	echo '</tbody>
	</table>';

mysqli_close($conn);
?>
