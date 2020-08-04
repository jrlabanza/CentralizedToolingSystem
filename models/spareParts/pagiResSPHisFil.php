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
	$result = $conn->query('SELECT * FROM spare_parts_history WHERE parts_code LIKE "%'.$filter[0].'%" OR description LIKE "%'.$filter[0].'%" AND date_updated between "'.$from.'" AND "'.$to.'" ORDER BY date_updated DESC');
}elseif (!empty($filter[1]) && !empty($filter[2])) {
	$result = $conn->query('SELECT * FROM spare_parts_history WHERE date_updated between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" ORDER BY date_updated DESC');
}elseif (!empty($filter[1])){
	$result = $conn->query('SELECT * FROM spare_parts_history WHERE date_updated >= "'.$from.'" ORDER BY date_updated DESC');
}else {
	$result = $conn->query('SELECT * FROM spare_parts_history WHERE parts_code LIKE "%'.$filter[0].'%" ORDER BY date_updated DESC');
}


//$num_rows = mysql_num_rows($result);
// $row_cnt = $result->num_rows;
// if ($row_cnt == 0){
// }


echo '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
<thead id="thead" class="thead-light">
	<tr>
		<th scope="col" class="col-sm-0">DESCRIPTION</th>
		<th scope="col" class="col-sm-0">PARTS CODE</th>
		<th scope="col" class="col-sm-0">CURRENT QTY</th>
		<th scope="col" class="col-sm-0">UPDATED QTY</th>
		<th scope="col" class="col-sm-0">MAKER</th>
		<th scope="col" class="col-sm-0">LOCATION</th>
		<th scope="col" class="col-sm-0">REQUESTING PERSONNEL</th>
		<th scope="col" class="col-sm-0">STATUS</th>
		<th scope="col" class="col-sm-0">MACHINE</th>
		<th scope="col" class="col-sm-0">DATE REQUESTED</th>
		<th scope="col" class="col-sm-0">CUSTODIAN</th>
		<th scope="col" class="col-sm-0">REMARKS</th>
	</tr>
</thead>
<tbody class="">';

	while ($row = $result->fetch_assoc()) {
		echo '
		<tr>
			<td class="description">' . $row['description'] . '</td>
			<td class="parts_code">' . $row['parts_code'] . '</td>
			<td class="quantity">' . $row['current_qty'] . '</td>
			<td class="updated_qty">' . $row['updated_qty'] . '</td>
			<td class="maker">' . $row['maker'] . '</td>
			<td class="lction">' . $row['location'] . '</td>
			<td class="requesting_personnel">' . $row['personnel'] . '</td>
			<td class="status">' . $row['status'] . '</td>
			<td class="machine">' . $row['machine'] . '</td>
			<td class="date_requested">' . $row['date_requested'] . '</td>
			<td class="date_requested">' . $row['custodian'] . '</td>
			<td class="remarks">' . $row['remarks'] . '</td>
		</tr>';
	}
	echo '</tbody>
	</table>';

mysqli_close($conn);
?>
