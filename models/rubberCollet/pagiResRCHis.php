<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
$db_handle = new DBController();
$perPage = new PerPage();

$sql = "SELECT * FROM rubber_collet_history ORDER BY transaction_date DESC";
$paginationlink = "models/rubberCollet/pagiResRCHis.php?page=";
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

	if ($_GET["rowcount"] > 0){
		foreach($faq as $k=>$v) {
			$output .= '<tr data-tester-parts='. $faq[$k]['id']. '>
			<td class="rubber_tip_no">' . $faq[$k]['rubber_tip_no'] . '</td>
			<td class="package">' . $faq[$k]['package'] . '</td>
			<td class="box">' . $faq[$k]['box'] . '</td>
			<td class="mchn_model">' . $faq[$k]['mchn_model'] . '</td>
			<td class="mchn_id">' . $faq[$k]['mchn_id'] . '</td>
			<td class="status">' . $faq[$k]['status'] . '</td>
			<td class="lction">' . $faq[$k]['lction'] . '</td>
			<td class="line">' . $faq[$k]['line'] . '</td>
			<td class="quantity">' . $faq[$k]['quantity'] . '</td>
			<td class="transaction_date">' . $faq[$k]['transaction_date'] . '</td>
			<td class="client">' . $faq[$k]['client'] . '</td>
			<td class="custodian">' . $faq[$k]['custodian'] . '</td>
			<td class="remarks">' . $faq[$k]['remarks'] . '</td>
		</tr>';
			// $output .= '<div class="question"><input type="hidden" id="rowcount" name="rowcount" value="' . $_GET["rowcount"] . '" />' . $faq[$k]["lb_id"] . '</div>';
			// $output .= '<div class="answer">' . $faq[$k]["family"] . '</div>';
		}
	}else{
		$output .= '
		<tr style="cursor: pointer;">
			<td colspan="21" class="text-center bg-warning"><strong>EMPTY RESULTS<strong></td>
		</tr>';
	}

$output .= '</tbody>
</table>';
if(!empty($perpageresult)) {
$output .= '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul></nav>';
}
print $output;
?>
