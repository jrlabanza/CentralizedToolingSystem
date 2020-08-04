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
	$result = $conn->query('SELECT * FROM center_board_history WHERE date_time between "'.$from.'" AND "'.$to.'" AND serial_id LIKE "%'.$filter[0].'%" OR family LIKE "%'.$filter[0].'%" OR type LIKE "%'.$filter[0].
	'%" OR tst_pf LIKE "%'.$filter[0].'%" OR status LIKE "%'.$filter[0].'%" OR tester_id LIKE "%'.$filter[0].'%" OR handler_id LIKE "%'.$filter[0].'%" 
	OR hd_pf LIKE "%'.$filter[0].'%" OR loc LIKE "%'.$filter[0].'%" OR storage LIKE "%'.$filter[0].'%" OR line LIKE "%'.$filter[0].'%" OR vendor LIKE "%'.$filter[0].'%" 
	OR borrower LIKE "%'.$filter[0].'%" OR clerk LIKE "%'.$filter[0].'%" ORDER BY date_time DESC');
}elseif (!empty($filter[1]) && !empty($filter[2])) {
	$result = $conn->query('SELECT * FROM center_board_history WHERE date_time between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" ORDER BY date_time DESC');
}elseif (!empty($filter[1])){
	$result = $conn->query('SELECT * FROM center_board_history WHERE date_time >= "'.$from.'" ORDER BY date_time DESC');
}else {
	$result = $conn->query('SELECT * FROM center_board_history WHERE serial_id LIKE "%'.$filter[0].'%" OR family LIKE "%'.$filter[0].'%" OR type LIKE "%'.$filter[0].
	'%" OR tst_pf LIKE "%'.$filter[0].'%" OR status LIKE "%'.$filter[0].'%" OR tester_id LIKE "%'.$filter[0].'%" OR handler_id LIKE "%'.$filter[0].'%" 
	OR hd_pf LIKE "%'.$filter[0].'%" OR loc LIKE "%'.$filter[0].'%" OR storage LIKE "%'.$filter[0].'%" OR line LIKE "%'.$filter[0].'%" OR vendor LIKE "%'.$filter[0].'%" 
	OR borrower LIKE "%'.$filter[0].'%" OR clerk LIKE "%'.$filter[0].'%" ORDER BY date_time DESC');
}


//$num_rows = mysql_num_rows($result);
// $row_cnt = $result->num_rows;
// if ($row_cnt == 0){
// }


echo '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
		<tr>
			<th scope="col" class="col-sm-0">DATE / TIME</th>
			<th scope="col" class="col-sm-0">SERIAL ID</th>
			<th scope="col" class="col-sm-0">FAMILY</th>
			<th scope="col" class="col-sm-0">TYPE</th>
			<th scope="col" class="col-sm-0">TST PF</th>
			<th scope="col" class="col-sm-0">STATUS</th>
			<th scope="col" class="col-sm-0">TST ID</th>
			<th scope="col" class="col-sm-0">HD ID</th>
			<th scope="col" class="col-sm-0">LOCATION</th>
			<th scope="col" class="col-sm-0">STORAGE</th>
			<th scope="col" class="col-sm-0">VENDOR</th>
			<th scope="col" class="col">REMARKS</th>
			<th scope="col" class="col-sm-0">LINE</th>
			<th scope="col" class="col-sm-0">CLIENT</th>
			<th scope="col" class="col-sm-0">CUSTODIAN</th>
			<th scope="col" class="col-sm-0">S FILE</th>
		</tr>
	</thead>
	<tbody class="">';

	while ($row = $result->fetch_assoc()) {
		echo '<tr>
			<td class="lbID" scope="row">' . $row['date_time'] . '</td>
			<td class="srID">' . $row['serial_id'] . '</td>
			<td class="fam">' . $row['family'] . '</td>
			<td class="lbID">' . $row['type'] . '</td>
			<td class="tst">' . $row['tst_pf'] . '</td>
			<td class="stats">' . $row['status'] . '</td>
			<td class="tstID">' . $row['tester_id'] . '</td>
			<td class="hdID">' . $row['handler_id'] . '</td>
			<td class="loc">' . $row['loc'] . '</td>
			<td class="strg">' . $row['storage'] . '</td>
			<td class="ven">' . $row['vendor'] . '</td>
			<td class="">' . $row['remarks'] . '</td>
			<td class="line">' . $row['line'] . '</td>
			<td class="updated">' . $row['borrower'] . '</td>
			<td class="updated">' . $row['clerk'] . '</td>
			<td class="btn-link"><a href="uploads/'. $row['sFile'] .'" target="_blank">'. $row['sFile'] .'</a></td>
		</tr>';
	}
	echo '</tbody>
	</table>';

mysqli_close($conn);
?>
