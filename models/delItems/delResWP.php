<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
$db_handle = new DBController();
$perPage = new PerPage();

if (empty($_SESSION['line'])){
	$sql = "SELECT * from wp ORDER BY id DESC";
}else{
	$sql = "SELECT * FROM wp WHERE line = '$_SESSION[line]' ORDER BY id DESC";
}

$paginationlink = "models/delItems/delResWP.php?page=";
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
	$output = '<nav aria-label="..."><button id="bttnDel" class="btn btn-danger" style="margin-left: 20px;" data-toggle="modal" data-target="#bd-example-modal-md">DELETE</button><br/><br/><ul class="pagination">' . $perpageresult . '</ul></nav>';
	$output .= '';
}else{
	$output = '';
}

$output .= '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
		<tr>
			<th scope="col" class="col-sm-0"></th>
			<th scope="col" class="col-sm-0">SERIAL ID</th>
			<th scope="col" class="col-sm-0">PACKAGE TYPE</th>
			<th scope="col" class="col-sm-0">PART NO</th>
			<th scope="col" class="col-sm-0">DUT REQ</th>
			<th scope="col" class="col-sm-0">MATERIAL</th>
			<th scope="col" class="col-sm-0">STATUS</th>
			<th scope="col" class="col-sm-0">TESTER MODEL</th>
			<th scope="col" class="col-sm-0">TESTER ID</th>
			<th scope="col" class="col-sm-0">HANDLER MODEL</th>
			<th scope="col" class="col-sm-0">HANDLER ID</th>
			<th scope="col" class="col-sm-0">LOCATION</th>
			<th scope="col" class="col-sm-0">RACK</th>
			<th scope="col" class="col-sm-0">SHOT COUNT</th>
			<th scope="col" class="col-sm-0">MAX COUNT</th>
			<th scope="col" class="col-sm-0">VENDOR</th>
			<th scope="col" class="col-sm-0">LINE</th>
			<th scope="col" class="col-sm-0">REMARKS</th>
			<th scope="col" class="col-sm-0">GS CODE</th>
			<th scope="col" class="col-sm-0">TRANSACT DATE</th>
		</tr>
	</thead>
	<tbody id="tbody2">';

	if ($_GET["rowcount"] > 0){
		foreach($faq as $k=>$v) {
			$output .= '
					<tr>
					<td class="tblID" scope=""><input type="checkbox" name="cbox" value="'.$faq[$k]['id'].'"></td>
					<td class="td1">' . $faq[$k]['serial_id'] . '</td>
					<td class="td2">' . $faq[$k]['package_type'] . '</td>
					<td class="td3">' . $faq[$k]['part_no'] . '</td>
					<td class="td4">' . $faq[$k]['dut_req'] . '</td>
					<td class="td5">' . $faq[$k]['material'] . '</td>
					<td class="stats">' . $faq[$k]['status'] . '</td>
					<td class="tst">' . $faq[$k]['tst_model'] . '</td>
					<td class="td12">' . $faq[$k]['tester_id'] . '</td>
					<td class="td9">' . $faq[$k]['hd_model'] . '</td>
					<td class="td13">' . $faq[$k]['handler_id'] . '</td>
					<td class="loc">' . $faq[$k]['loc'] . '</td>
					<td class="strg">' . $faq[$k]['rack'] . '</td>
					<td class="td11">' . $faq[$k]['shot_count'] . '</td>
					<td class="td10">' . $faq[$k]['max_shot_count'] . '</td>
					<td class="td6">' . $faq[$k]['vendor'] . '</td>
					<td class="line">' . $faq[$k]['line'] . '</td>
					<td class="">' . $faq[$k]['remarks'] . '</td>
					<td class="td7">' . $faq[$k]['gs_code'] . '</td>
					<td class="td15">' . $faq[$k]['last_update'] . '</td>

					</tr>';
			// $output .= '<div class="question"><input type="hidden" id="rowcount" name="rowcount" value="' . $_GET["rowcount"] . '" />' . $faq[$k]["lb_id"] . '</div>';
			// $output .= '<div class="answer">' . $faq[$k]["family"] . '</div>';
		}
	}else{
		$output .= '
		<tr style="cursor: pointer;">
			<td colspan="21" class="text-center"><strong>EMPTY RESULTS<strong></td>
		</tr>';
	}

$output .= '</tbody>
</table>';
if(!empty($perpageresult)) {
$output .= '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul></nav><button id="bttnDel" class="btn btn-danger" style="margin-left: 20px;" data-toggle="modal" data-target="#bd-example-modal-md">DELETE</button>';
}
print $output;
?>
