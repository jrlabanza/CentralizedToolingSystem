<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
$db_handle = new DBController();
$perPage = new PerPage();

if (empty($_SESSION['line'])){
	$sql = "SELECT * from cable WHERE isDeleted = 0 ORDER BY last_update DESC";
}else{
	$sql = "SELECT * FROM cable WHERE isDeleted = 0 AND line = '$_SESSION[line]' ORDER BY last_update DESC";
}

$paginationlink = "models/cable/pagiResCable.php?page=";
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
	$output = '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul><button type="button" class="btn btn-link" onclick=location.href="models/cable/exportInventory.php">Download Inventory</button></nav>';
	$output .= '';
}else{
	$output = '';
}

$output .= '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
		<tr>
			<th scope="col" class="col-sm-1">SERIAL ID</th>
			<th scope="col" class="col-sm-1">CONNECTION TYPE</th>
			<th scope="col" class="col-sm-1">STATUS</th>
			<th scope="col" class="col-sm-1">TESTER ID</th>
			<th scope="col" class="col-sm-1">TESTER PF</th>
			<th scope="col" class="col-sm-1">LOCATION</th>
			<th scope="col" class="col-sm-1">RACK</th>
			<th scope="col" class="col">REMARKS</th>
			<th scope="col" class="col-sm-1">LINE</th>
			<th scope="col" class="col-sm-1">TRANSACT DATE</th>
		</tr>
	</thead>
	<tbody class="tbody">';

	if ($_GET["rowcount"] > 0){
		foreach($faq as $k=>$v) {
			$output .= '
					<tr style="cursor: pointer;">
							<td class="srID">' . $faq[$k]['serial_id'] . '</td>
							<td class="fam">' . $faq[$k]['conn_type'] . '</td>
							<td class="stats">' . $faq[$k]['status'] . '</td>
							<td class="">' . $faq[$k]['tester_id'] . '</td>
							<td class="tst">' . $faq[$k]['tst_pf'] . '</td>
							<td class="loc">' . $faq[$k]['loc'] . '</td>
							<td class="strg">' . $faq[$k]['storage'] . '</td>
							<td class="">' . $faq[$k]['remarks'] . '</td>
							<td class="line">' . $faq[$k]['line'] . '</td>
							<td class="">' . $faq[$k]['last_update'] . '</td>
						</tr>';
			// $output .= '<div class="question"><input type="hidden" id="rowcount" name="rowcount" value="' . $_GET["rowcount"] . '" />' . $faq[$k]["lb_id"] . '</div>';
			// $output .= '<div class="answer">' . $faq[$k]["family"] . '</div>';
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
