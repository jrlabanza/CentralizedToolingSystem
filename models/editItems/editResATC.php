<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
$db_handle = new DBController();
$perPage = new PerPage();

if (empty($_SESSION['line'])){
	$sql = "SELECT * from atc ORDER BY id DESC";
}else{
	$sql = "SELECT * FROM atc WHERE line = '$_SESSION[line]' ORDER BY id DESC";
}

$paginationlink = "models/gng/pagiResATC.php?page=";
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
			<th scope="col" class="col-sm-0">DEVICE NAME</th>
			<th scope="col" class="col-sm-0">PACKAGE TYPE</th>
			<th scope="col" class="col-sm-0">ACU NEED</th>
			<th scope="col" class="col-sm-0">ACU ID</th>
			<th scope="col" class="col-sm-0">TESTER ID</th>
			<th scope="col" class="col-sm-0">TESTER PF</th>
			<th scope="col" class="col-sm-0">PCB BOARD</th>
			<th scope="col" class="col-sm-0">BARE DEVICES</th>
			<th scope="col" class="col-sm-0">ADAP BOARD</th>
			<th scope="col" class="col-sm-0">STATUS</th>
			<th scope="col" class="col-sm-0">LOCATION</th>
			<th scope="col" class="col-sm-0">RACK</th>
			<th scope="col" class="col-sm-10">REMARKS</th>
			<th scope="col" class="col-sm-0">LINE</th>
			<th scope="col" class="col-sm-0">TRANSACT DATE</th>
		</tr>
	</thead>
	<tbody class="tbody">';

	if ($_GET["rowcount"] > 0){
		foreach($faq as $k=>$v) {
			$output .= '
					<tr style="cursor: pointer;">
						<td class="td0" scope="row" style="display: none;">' . $faq[$k]['id'] . '</td>
						<td class="td1">' . $faq[$k]['serial_id'] . '</td>
						<td class="td3">' . $faq[$k]['family'] . '</td>
						<td class="td4">' . $faq[$k]['package_type'] . '</td>
						<td class="td6">' . $faq[$k]['acu_need'] . '</td>
						<td class="">' . $faq[$k]['acu_id'] . '</td>
						<td class="">' . $faq[$k]['tester_id'] . '</td>
						<td class="td2">' . $faq[$k]['tst_pf'] . '</td>
						<td class="td8">' . $faq[$k]['pcb_board'] . '</td>
						<td class="td7">' . $faq[$k]['bare_devices'] . '</td>
						<td class="td9">' . $faq[$k]['adap_board'] . '</td>
						<td class="stats">' . $faq[$k]['status'] . '</td>
						<td class="loc">' . $faq[$k]['loc'] . '</td>
						<td class="td10">' . $faq[$k]['storage'] . '</td>
						<td class="">' . $faq[$k]['remarks'] . '</td>
						<td class="td5">' . $faq[$k]['line'] . '</td>
						<td class="">' . $faq[$k]['last_update'] . '</td>
						</tr>';
			// $output .= '<div class="question"><input type="hidden" id="rowcount" name="rowcount" value="' . $_GET["rowcount"] . '" />' . $faq[$k]["lb_id"] . '</div>';
			// $output .= '<div class="answer">' . $faq[$k]["family"] . '</div>';
		}

	}else{
		$output .= '
		<tr style="cursor: pointer;">
			<td colspan="21" class="text-center"><strong>ZERO RESULTS<strong></td>
		</tr>';
	}

$output .= '</tbody>
</table>';
if(!empty($perpageresult)) {
$output .= '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul></nav>';
}
print $output;
?>
