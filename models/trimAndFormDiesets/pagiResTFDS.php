<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
$db_handle = new DBController();
$perPage = new PerPage();

if (empty($_SESSION['line'])){
	$sql = "SELECT * from tfd ORDER BY last_update DESC";
}else{
	$sql = "SELECT * FROM tfd WHERE line = '$_SESSION[line]' ORDER BY last_update DESC";
}

$paginationlink = "models/trimAndFormDiesets/pagiResTFDS.php?page=";
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
	$output = '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul><button type="button" class="btn btn-link" onclick=location.href="models/moldchase/exportInventory.php">Download Inventory</button>';
	$output .= '';
}else{
	$output = '';
}

$output .= '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
		<tr>
			<th scope="col" class="col-sm-0">DIESET NUMBER</th>	
			<th scope="col" class="col-sm-1">PACKAGE</th>
			<th scope="col" class="col-sm-1">SERIAL NUMBER</th>
			<th scope="col" class="col-sm-1">DIE MODEL</th>
			<th scope="col" class="col-sm-1">STATUS</th>
			<th scope="col" class="col-sm-1">MACHINE MODEL</th>
			<th scope="col" class="col-sm-1">MACHINE ID</th>
			<th scope="col" class="col-sm-1">RACK</th>
			<th scope="col" class="col-sm-1">VENDOR</th>
			<th scope="col" class="col-sm-4">REMARKS</th>
			<th scope="col" class="col-sm-0">LINE</th>
			<th scope="col" class="col-sm-0">S FILE</th>
			<th scope="col" class="col-sm-1">LAST UPDATE</th>
		</tr>
	</thead>
	<tbody class="tbody">';

	if ($_GET["rowcount"] > 0){
		foreach($faq as $k=>$v) {
			$output .= '
					<tr style="cursor: pointer;">
						<td class="td1">' . $faq[$k]['dieset_number'] . '</td>		
						<td class="td2">' . $faq[$k]['package'] . '</td>
						<td class="td3">' . $faq[$k]['dieset_serial_number'] . '</td>
						<td class="td4">' . $faq[$k]['die_model'] . '</td>
						<td class="stats">' . $faq[$k]['status'] . '</td>
						<td class="td5">' . $faq[$k]['machine_pf'] . '</td>
						<td class="td8">' . $faq[$k]['machine_id'] . '</td>
						<td class="td6">' . $faq[$k]['rack'] . '</td>
						<td class="td7">' . $faq[$k]['vendor'] . '</td>
						<td class="">' . $faq[$k]['remarks'] . '</td>
						<td class="line">' . $faq[$k]['line'] . '</td>
						<td class="btn-link"><a href="uploads/'. $faq[$k]['sFile'] .'" target="_blank">'. $faq[$k]['sFile'] .'</a></td>
						<td class="">' . $faq[$k]['last_update'] . '</td>
					</tr>';
			// $output .= '<div class="question"><input type="hidden" id="rowcount" name="rowcount" value="' . $_GET["rowcount"] . '" />' . $faq[$k]["lb_id"] . '</div>';
			// $output .= '<div class="answer">' . $faq[$k]["family"] . '</div>';
		}
	}else{
		$output .= '
		<tr style="cursor: pointer;">
			<td colspan="8" class="text-center"><strong>EMPTY RESULTS<strong></td>
		</tr>';
	}
$output .= '</tbody>
</table>';
if(!empty($perpageresult)) {
$output .= '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul></nav>';
}
print $output;
?>
