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
	$result = $conn->query('SELECT serial_id,family,tst_pf,status,loc,storage,line,vendor,tester_id,handler_id,borrower,clerk,date_time,sFile,remarks FROM bib_history WHERE serial_id LIKE "%'.$filter[0].'%" AND date_time between "'.$from.'" AND "'.$to.'" ORDER BY id DESC');
}elseif (!empty($filter[1]) && !empty($filter[2])) {
	$result = $conn->query('SELECT serial_id,family,tst_pf,status,loc,storage,line,vendor,tester_id,handler_id,borrower,clerk,date_time,sFile,remarks FROM bib_history WHERE date_time between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" ORDER BY id DESC');
}elseif (!empty($filter[1])){
	$result = $conn->query('SELECT serial_id,family,tst_pf,status,loc,storage,line,vendor,tester_id,handler_id,borrower,clerk,date_time,sFile,remarks FROM bib_history WHERE date_time >= "'.$from.'" ORDER BY id DESC');
}else {
	$result = $conn->query('SELECT serial_id,family,tst_pf,status,loc,storage,line,vendor,tester_id,handler_id,borrower,clerk,date_time,sFile,remarks FROM bib_history WHERE serial_id LIKE "%'.$filter[0].'%" AND line LIKE "%'.$_SESSION['line'].'%" ORDER BY id DESC');
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
			<th scope="col" class="col-sm-0">TST PF</th>
			<th scope="col" class="col-sm-0">STATUS</th>
			<th scope="col" class="col-sm-0">TST ID</th>
			<th scope="col" class="col-sm-0">HD ID</th>
			<th scope="col" class="col-sm-0">LOCATION</th>
			<th scope="col" class="col-sm-0">STORAGE</th>
			<th scope="col" class="col-sm-0">VENDOR</th>
			<th scope="col" class="col-sm-0">REMARKS</th>
			<th scope="col" class="col-sm-0">LINE</th>
			<th scope="col" class="col-sm-0">CLIENT</th>
			<th scope="col" class="col-sm-0">HW PERSONNEL</th>
			<th scope="col" class="col-sm-0">S FILE</th>
		</tr>
	</thead>
	<tbody class="">';

	while ($row = $result->fetch_assoc()) {
		echo '<tr>
			<td class="" scope="row">' . $row['date_time'] . '</td>
			<td class="srID" scope="row">' . $row['serial_id'] . '</td>
			<td class="fam">' . $row['family'] . '</td>
			<td class="tst">' . $row['tst_pf'] . '</td>
			<td class="stats">' . $row['status'] . '</td>
			<td class="tstID">' . $row['tester_id'] . '</td>
			<td class="hdID">' . $row['handler_id'] . '</td>
			<td class="loc">' . $row['loc'] . '</td>
			<td class="strg">' . $row['storage'] . '</td>
			<td class="ven">' . $row['vendor'] . '</td>
			<td class="line">' . $row['remarks'] . '</td>
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
