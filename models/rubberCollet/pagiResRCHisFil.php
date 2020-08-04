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
	$result = $conn->query('SELECT * FROM rubber_collet_history WHERE rubber_tip_no LIKE "%'.$filter[0].'%" OR rubber_tip_no LIKE "%'.$filter[0].'%" AND transaction_date between "'.$from.'" AND "'.$to.'" ORDER BY transaction_date DESC');
}elseif (!empty($filter[1]) && !empty($filter[2])) {
	$result = $conn->query('SELECT * FROM rubber_collet_history WHERE transaction_date between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" ORDER BY transaction_date DESC');
}elseif (!empty($filter[1])){
	$result = $conn->query('SELECT * FROM rubber_collet_history WHERE transaction_date >= "'.$from.'" ORDER BY transaction_date DESC');
}else {
	$result = $conn->query('SELECT * FROM rubber_collet_history WHERE rubber_tip_no LIKE "%'.$filter[0].'%" ORDER BY transaction_date DESC');
}


//$num_rows = mysql_num_rows($result);
// $row_cnt = $result->num_rows;
// if ($row_cnt == 0){
// }


echo '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
<thead id="thead" class="thead-light">
	<tr>
	<th scope="col" class="col-sm-0">RUBBERTIP NO.</th>
	<th scope="col" class="col-sm-0">PACKAGE</th>
	<th scope="col" class="col-sm-0">BOX</th>
	<th scope="col" class="col-sm-0">MACHINE MODEL</th>
	<th scope="col" class="col-sm-0">MACHINE ID</th>
	<th scope="col" class="col-sm-0">STATUS</th>
	<th scope="col" class="col-sm-0">LOCATION</th>
	<th scope="col" class="col-sm-0">LINE</th>
	<th scope="col" class="col-sm-0">QTY</th>
	<th scope="col" class="col-sm-0">TRANSACTION DATETIME</th>
	<th scope="col" class="col-sm-0">CLIENT</th>
	<th scope="col" class="col-sm-0">CUSTODIAN</th>
	<th scope="col" class="col-sm-0">REMARKS</th>
	</tr>
</thead>
<tbody class="">';

	while ($row = $result->fetch_assoc()) {
		echo '
		<tr>
		<td class="rubber_tip_no">' . $row['rubber_tip_no'] . '</td>
		<td class="package">' . $row['package'] . '</td>
		<td class="box">' . $row['box'] . '</td>
		<td class="mchn_model">' . $row['mchn_model'] . '</td>
		<td class="mchn_id">' . $row['mchn_id'] . '</td>
		<td class="status">' . $row['status'] . '</td>
		<td class="lction">' . $row['lction'] . '</td>
		<td class="line">' . $row['line'] . '</td>
		<td class="quantity">' . $row['quantity'] . '</td>
		<td class="transaction_date">' . $row['transaction_date'] . '</td>
		<td class="client">' . $row['client'] . '</td>
		<td class="custodian">' . $row['custodian'] . '</td>
		<td class="remarks">' . $row['remarks'] . '</td>
		</tr>';
	}
	echo '</tbody>
	</table>';

mysqli_close($conn);
?>
