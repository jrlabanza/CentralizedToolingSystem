<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
$db_handle = new DBController();
$perPage = new PerPage();

if (empty($_SESSION['line'])){
	$sql = "SELECT * from nozzle WHERE box_no LIKE 'DN%' ORDER BY last_update DESC";
}else{
	$sql = "SELECT * FROM nozzle WHERE line = '$_SESSION[line]' AND box_no LIKE 'DN%' ORDER BY last_update DESC";
}

$paginationlink = "models/nozzle/pagiResNozzle.php?page=";
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
	$output = '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul><button type="button" class="btn btn-link" onclick=location.href="models/nozzle/exportInventory.php">Download Inventory</button>';
	$output .= '';
}else{
	$output = '';
}

$output .= '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
		<tr>
			<th scope="col" class="col-sm-0">BAG NO.</th>	
			<th scope="col" class="col-sm-0">NOZZLE TYPE</th>
			<th scope="col" class="col-sm-0">ALTERNATIVE NOZZLE</th>
			<th scope="col" class="col-sm-0">NOZZLE PART NO.</th>
			<th scope="col" class="col-sm-0">STATUS</th>
			<th scope="col" class="col-sm-0">LOCATION</th>
			<th scope="col" class="col-sm-0">MACHINE ID</th>
			<th scope="col" class="col-sm-0">MAX SHOTS</th>
			<th scope="col" class="col-sm-0">SHOTS</th>
			<th scope="col" class="col-sm-0">REMARKS</th>
			<th scope="col" class="col-sm-0">LAST UPDATE</th>
		</tr>
	</thead>
	<tbody class="tbody">';

	if ($_GET["rowcount"] > 0){
		foreach($faq as $k=>$v) {
			$output .= '
					<tr style="cursor: pointer;">
						<td class="lbID">' . $faq[$k]['box_no'] . '</td>	
						<td class="pckgType">' . $faq[$k]['package'] . '</td>
						<td class="prtNo">' . $faq[$k]['altrntv_nozzle'] . '</td>
						<td class="srID">' . $faq[$k]['nozzle_partno'] . '</td>
						<td class="stats">' . $faq[$k]['status'] . '</td>
						<td class="stats">' . $faq[$k]['loc'] . '</td>
						<td class="tstID">' . $faq[$k]['machine_id'] . '</td>
						<td class="mShotCnt">' . $faq[$k]['max_shots'] . '</td>
						<td class="ShotCnt">' . $faq[$k]['shots'] . '</td>
						<td class="">' . $faq[$k]['remarks'] . '</td>
						<td class="">' . $faq[$k]['last_update'] . '</td>
						<td class="line" hidden>' . $faq[$k]['line'] . '</td>
					</tr>';
			// $output .= '<div class="question"><input type="hidden" id="rowcount" name="rowcount" value="' . $_GET["rowcount"] . '" />' . $faq[$k]["lb_id"] . '</div>';
			// $output .= '<div class="answer">' . $faq[$k]["family"] . '</div>';
		}
	}else{
		$output .= '
		<tr style="cursor: pointer;">
			<td colspan="11" class="text-center"><strong>EMPTY RESULTS<strong></td>
		</tr>';
	}
$output .= '</tbody>
</table>';
if(!empty($perpageresult)) {
$output .= '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul></nav>';
}
print $output;
?>
