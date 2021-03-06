<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
$db_handle = new DBController();
$perPage = new PerPage();

if (empty($_SESSION['line'])){
	$sql = "SELECT * from socket ORDER BY last_update DESC";
}else{
	$sql = "SELECT * FROM socket WHERE line = '$_SESSION[line]' ORDER BY last_update DESC";
}

$paginationlink = "models/socket/pagiResSocket.php?page=";
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
	$output = '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul><button type="button" class="btn btn-link" onclick=location.href="models/socket/exportInventory.php">Download Inventory</button></nav>';
	$output .= '';
}else{
	$output = '';
}

$output .= '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
		<tr>
			<th scope="col" class="col-sm-0">SOCKET ID</th>
			<th scope="col" class="col-sm-0">FAMILY</th>
			<th scope="col" class="col-sm-0">PACKAGE TYPE</th>
			<th scope="col" class="col-sm-0">PART NO</th>
			<th scope="col" class="col-sm-0">TST PF</th>
			<th scope="col" class="col-sm-0">STATUS</th>
			<th scope="col" class="col-sm-0">TST ID</th>
			<th scope="col" class="col-sm-0">HD ID</th>
			<th scope="col" class="col-sm-0">LOCATION</th>
			<th scope="col" class="col-sm-0">STORAGE</th>
			<th scope="col" class="col-sm-0">VENDOR</th>
			<th scope="col" class="col-sm-0">LINE</th>
			<th scope="col" class="col-sm-0">PIN TYPE</th>
			<th scope="col" class="col-sm-0">PIN COUNT</th>
			<th scope="col" class="col-sm-0">SHOT COUNT</th>
			<th scope="col" class="col-sm-0">MAX COUNT</th>
			<th scope="col" class="col-sm-0">SITE</th>
			<th scope="col" class="col-sm-0">GS CODE</th>
			<th scope="col" class="col-sm-0">REMARKS</th>
			<th scope="col" class="col-sm-0">UPDATED</th>
		</tr>
	</thead>
	<tbody class="tbody">';

	if ($_GET["rowcount"] > 0){
		foreach($faq as $k=>$v) {
			$output .= '
					<tr style="cursor: pointer;">
							<td class="lbID td1">' . $faq[$k]['socket_id'] . '</td>
							<td class="fam td2">' . $faq[$k]['family'] . '</td>
							<td class="pckgType td11">' . $faq[$k]['package_type'] . '</td>
							<td class="prtNo td12">' . $faq[$k]['part_no'] . '</td>
							<td class="tst td7">' . $faq[$k]['tst_pf'] . '</td>
							<td class="stats">' . $faq[$k]['status'] . '</td>
							<td class="tstID">' . $faq[$k]['tester_id'] . '</td>
							<td class="hdID">' . $faq[$k]['handler_id'] . '</td>
							<td class="loc">' . $faq[$k]['loc'] . '</td>
							<td class="strg td5">' . $faq[$k]['storage'] . '</td>
							<td class="ven td3">' . $faq[$k]['vendor'] . '</td>
							<td class="line td9">' . $faq[$k]['line'] . '</td>
							<td class="pinType td4">' . $faq[$k]['pin_type'] . '</td>
							<td class="pinCount td8">' . $faq[$k]['pin_count'] . '</td>
							<td class="ShotCnt">' . $faq[$k]['shotcount'] . '</td>
							<td class="mShotCnt td13">' . $faq[$k]['max_shotcount'] . '</td>
							<td class="site td10">' . $faq[$k]['site'] . '</td>
							<td class="gsCode td6">' . $faq[$k]['gs_code'] . '</td>
							<td class="remarks td14">' . $faq[$k]['remarks'] . '</td>
							<td class="updated">' . $faq[$k]['last_update'] . '</td>
						</tr>';
			// $output .= '<div class="question"><input type="hidden" id="rowcount" name="rowcount" value="' . $_GET["rowcount"] . '" />' . $faq[$k]["lb_id"] . '</div>';
			// $output .= '<div class="answer">' . $faq[$k]["family"] . '</div>';
		}
	}else{
		$output .= '
		<tr style="cursor: pointer;">
			<td colspan="14" class="text-center bg-warning"><strong>EMPTY RESULTS<strong></td>
		</tr>';
	}

$output .= '</tbody>
</table>';
if(!empty($perpageresult)) {
$output .= '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul></nav>';
}
print $output;
?>
