<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
$db_handle = new DBController();
$perPage = new PerPage();

if (empty($_SESSION['line'])){
	$sql = "SELECT * from tstpartstrck WHERE status = 'IN' ORDER BY id DESC";
}else{
	$sql = "SELECT * FROM tstpartstrck WHERE line = '$_SESSION[line]' AND status = 'IN' ORDER BY id DESC";
}

$paginationlink = "models/editItems/editResTP.php?page=";
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
$style = 'style="cursor: pointer;"';
$output .= '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
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
		<th scope="col" class="col-sm-0">INSTALLED TO</th>
		<th scope="col" class="col-sm-0">PERSONEL</th>
		<th scope="col" class="col-sm-0">DATE /TIME</th>
	</tr>
	</thead>
	<tbody class="tbody">';

	if ($_GET["rowcount"] > 0){
		foreach($faq as $k=>$v) {
	
			$output .= '<tr '.$style.' data-tester-parts='. $faq[$k]['id'] .' data-current-quantity='. $faq[$k]['quantity'] .'>
							<td class="itm_nm">'. $faq[$k]['itm_nm'] .'</td>
							<td class="quantity">' . $faq[$k]['quantity'] . '</td>
							<td class="dscrptn">' . $faq[$k]['dscrptn'] . '</td>
							<td class="prt_no">' . $faq[$k]['prt_no'] . '</td>
							<td class="srl_no">' . $faq[$k]['srl_no'] . '</td>
							<td class="vendor">' . $faq[$k]['vendor'] . '</td>
							<td class="mchn_model">' . $faq[$k]['mchn_model'] . '</td>
							<td class="status">' . $faq[$k]['status'] . '</td>
							<td class="lction">' . $faq[$k]['lction'] . '</td>
							<td class="remarks">' . $faq[$k]['remarks'] . '</td>
							<td class="installedTo">' . $faq[$k]['installedTo'] . '</td>
							<td class="prson">' . $faq[$k]['prson'] . '</td>
							<td class="date_time">' . $faq[$k]['date_time'] . '</td>
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
