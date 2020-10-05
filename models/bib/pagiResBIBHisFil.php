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
	$result = $conn->query('SELECT barcode,bib_id,serial_id,family,status,loc,storage,line,date_time,last_update,clerk,remarks FROM bib_history WHERE serial_id LIKE "%'.$filter[0].'%" AND date_time between "'.$from.'" AND "'.$to.'" ORDER BY id DESC');
}elseif (!empty($filter[1]) && !empty($filter[2])) {
	$result = $conn->query('SELECT barcode,bib_id,serial_id,family,status,loc,storage,line,date_time,last_update,clerk,remarks FROM bib_history WHERE date_time between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" ORDER BY id DESC');
}elseif (!empty($filter[1])){
	$result = $conn->query('SELECT barcode,bib_id,serial_id,family,status,loc,storage,line,date_time,last_update,clerk,remarks FROM bib_history WHERE date_time >= "'.$from.'" ORDER BY id DESC');
}else {
	$result = $conn->query('SELECT barcode,bib_id,serial_id,family,status,loc,storage,line,date_time,last_update,clerk,remarks FROM bib_history WHERE serial_id LIKE "%'.$filter[0].'%" AND line LIKE "%'.$_SESSION['line'].'%" ORDER BY id DESC');
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
			<th scope="col" class="col-sm-0">BARCODE</th>
			<th scope="col" class="col-sm-0">BIB ID</th>
			<th scope="col" class="col-sm-0">FAMILY</th>
			<th scope="col" class="col-sm-0">STATUS</th>
			<th scope="col" class="col-sm-0">LOCATION</th>
			<th scope="col" class="col-sm-0">STORAGE</th>
			<th scope="col" class="col-sm-0">REMARKS</th>
			<th scope="col" class="col-sm-0">LINE</th>
			<th scope="col" class="col-sm-0">CLERK</th>
		</tr>
	</thead>
	<tbody class="">';

	while ($row = $result->fetch_assoc()) {
		echo '<tr>
			<td class="" scope="row">' . $row['date_time'] . '</td>
			<td class="srID" scope="row">' . $row['serial_id'] . '</td>
			<td class="fam">' . $row['barcode'] . '</td>
			<td class="tst">' . $row['bib_id'] . '</td>
			<td class="stats">' . $row['family'] . '</td>
			<td class="tstID">' . $row['status'] . '</td>
			<td class="loc">' . $row['loc'] . '</td>
			<td class="strg">' . $row['storage'] . '</td>
			<td class="line">' . $row['remarks'] . '</td>
			<td class="line">' . $row['line'] . '</td>
			<td class="updated">' . $row['clerk'] . '</td>
		</tr>';
	}
	echo '</tbody>
	</table>';

mysqli_close($conn);
?>
