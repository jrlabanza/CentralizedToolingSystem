<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
$db_handle = new DBController();
$perPage = new PerPage();

if (empty($_SESSION['line'])){
	$sql = "SELECT * from program WHERE isDeleted = 0 ORDER BY id DESC";
}else{
	$sql = "SELECT * FROM program WHERE isDeleted = 0 AND line = '$_SESSION[line]' ORDER BY id DESC";
}

$paginationlink = "models/editItems/editResPG.php?page=";
// $pagination_setting = $_GET["pagination_setting"];
$pagination_setting = "all-links";

$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

$query =  $sql . " limit " . $start . "," . $perPage->perpage;
$faq = $db_handle->runQuery($query);

if(empty($_GET["rowcount"])) {
$_GET["rowcount"] = $db_handle->numRows($sql);
}

if($pagination_setting == "prev-next") {
	$perpageresult = $perPage->getPrevNext($_GET["rowcount"], $paginationlink,$pagination_setting);
} else {
	$perpageresult = $perPage->getAllPageLinks($_GET["rowcount"], $paginationlink,$pagination_setting);
}

if(!empty($perpageresult)) {
	$output = '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul></nav>';
	$output .= '';
}else{
	$output = '';
}

$output .= '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
		<tr>
			<th scope="col" class="col-sm-0">SERIAL ID</th>
			<th scope="col" class="col-sm-0">DISC NO</th>
			<th scope="col" class="col-sm-0">PACKAGE TYPE</th>
			<th scope="col" class="col-sm-0">FAMILY NAME</th>
			<th scope="col" class="col-sm-0">TEST TYPE</th>
			<th scope="col" class="col-sm-0">TESTER NAME</th>
			<th scope="col" class="col-sm-0">PROGRAM</th>
			<th scope="col" class="col-sm-0">STATUS</th>
			<th scope="col" class="col-sm-0">LOCATION</th>
			<th scope="col" class="col-sm-0">LINE</th>
			<th scope="col" class="col-sm-0">REMARKS</th>
			<th scope="col" class="col-sm-0">CUSTODIAN</th>
			<th scope="col" class="col-sm-0">UPDATED</th>
		</tr>
	</thead>
	<tbody class="tbody">';

	if ($_GET["rowcount"] > 0){
		foreach($faq as $k=>$v) {
			$output .= '
					<tr style="cursor: pointer;">
							<td class="td0" scope="row" style="display: none;">' . $faq[$k]['id'] . '</td>
							<td class="td1">' . $faq[$k]['serial_id'] . '</td>
							<td class="td2">' . $faq[$k]['disc_no'] . '</td>
							<td class="td3">' . $faq[$k]['pkg_type'] . '</td>
							<td class="td4">' . $faq[$k]['fam_name'] . '</td>
							<td class="td5">' . $faq[$k]['test_type'] . '</td>
							<td class="td6">' . $faq[$k]['tester_name'] . '</td>
							<td class="td7">' . $faq[$k]['program'] . '</td>
							<td class="">' . $faq[$k]['status'] . '</td>
							<td class="">' . $faq[$k]['loc'] . '</td>
							<td class="td10">' . $faq[$k]['line'] . '</td>
							<td class="td9">' . $faq[$k]['remarks'] . '</td>
							<td class="">' . $faq[$k]['clerk'] . '</td>
							<td class="">' . $faq[$k]['last_update'] . '</td>					
						</tr>';
		}
	}else{
		$output .= '
		<tr style="cursor: pointer;">
			<td colspan="15" class="text-center"><strong>EMPTY RESULTS<strong></td>
		</tr>';
	}

$output .= '</tbody>
</table>';
if(!empty($perpageresult)) {
$output .= '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul></nav>';
}
print $output;
?>
