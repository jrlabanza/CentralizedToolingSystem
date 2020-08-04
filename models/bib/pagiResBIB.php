<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
$db_handle = new DBController();
$perPage = new PerPage();

if (empty($_SESSION['line'])){
	$sql = "SELECT * from bib ORDER BY last_update DESC";
}else{
	$sql = "SELECT * FROM bib WHERE line = '$_SESSION[line]' ORDER BY last_update DESC";
}

$paginationlink = "models/bib/pagiResBIB.php?page=";
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
	$output = '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul><button type="button" class="btn btn-link" onclick=location.href="models/bib/exportInventory.php">Download Inventory</button></nav>';
	$output .= '';
}else{
	$output = '';
}

$output .= '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
		<tr>
			<th scope="col" class="col-sm-0">BARCODE</th>
			<th scope="col" class="col-sm-0">FAMILY</th>
			<th scope="col" class="col-sm-0">BIB ID</th>
			<th scope="col" class="col-sm-0">SERIAL ID</th>
			<th scope="col" class="col-sm-0">STATUS</th>
			<th scope="col" class="col-sm-0">LOCATION</th>
			<th scope="col" class="col-sm-0">STORAGE</th>
			<th scope="col" class="col-sm-0">LINE</th>
			<th scope="col" class="col-sm-0">DATE ADDED</th>
			<th scope="col" class="col-sm-0">LAST UPDATE</th>
			<th scope="col" class="col-sm-0">CLERK</th>
			<th scope="col" class="col-sm-0">REMARKS</th>
		</tr>
	</thead>
	<tbody class="tbody">';

	if ($_GET["rowcount"] > 0){
		foreach($faq as $k=>$v) {
			$output .= '
					<tr style="cursor: pointer;">
							<td class="bibBarcode">' . $faq[$k]['barcode'] . '</td>
							<td class="fam">' . $faq[$k]['family'] . '</td>
							<td class="bibID">' . $faq[$k]['bib_id'] . '</td>
							<td class="srID">' . $faq[$k]['serial_id'] . '</td>
							<td class="stats">' . $faq[$k]['status'] . '</td>
							<td class="loc">' . $faq[$k]['loc'] . '</td>
							<td class="strg">' . $faq[$k]['storage'] . '</td>
							<td class="line">' . $faq[$k]['line'] . '</td>
							<td class="date_up">' . $faq[$k]['date_time'] . '</td>
							<td class="updated">' . $faq[$k]['last_update'] . '</td>
							<td class="clerk">' . $faq[$k]['clerk'] . '</td>
							<td class="line">' . $faq[$k]['remarks'] . '</td>
						</tr>';
			// $output .= '<div class="question"><input type="hidden" id="rowcount" name="rowcount" value="' . $_GET["rowcount"] . '" />' . $faq[$k]["lb_id"] . '</div>';
			// $output .= '<div class="answer">' . $faq[$k]["family"] . '</div>';
		}

	}else{
		$output .= '
		<tr style="cursor: pointer;">
			<td colspan="15" class="text-center"><strong>ZERO RESULTS<strong></td>
		</tr>';
	}

$output .= '</tbody>
</table>';
if(!empty($perpageresult)) {
$output .= '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul></nav>';
}
print $output;
?>
