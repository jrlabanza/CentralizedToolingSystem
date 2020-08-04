<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
date_default_timezone_set("Asia/Manila");
$datetime = date("Y-m-d H:i:s");

$db_handle = new DBController();
$perPage = new PerPage();

if (empty($_SESSION['line'])){
	$sql = "SELECT * from gng ORDER BY last_update DESC";
	//$sql = "SELECT * from gng ORDER BY last_update DESC";
}else{
	$sql = "SELECT * FROM gng WHERE line = '$_SESSION[line]' ORDER BY last_update DESC";
}

$paginationlink = "models/gng/pagiResGNG.php?page=";
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
	$output = '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul><button type="button" class="btn btn-link" onclick=location.href="models/gng/exportInventory.php">Download Inventory</button></nav>';
	$output .= '';
}else{
	$output = '';
}

$output .= '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
		<tr>
			<th scope="col" class="col-sm-0">SERIAL ID</th>
			<th scope="col" class="col-sm-0">FAMILY</th>
			<th scope="col" class="col-sm-0">PACKAGE TYPE</th>
			<th scope="col" class="col-sm-0">TST PF</th>
			<th scope="col" class="col-sm-0">TEST TYPE</th>
			<th scope="col" class="col-sm-0">STATUS</th>
			<th scope="col" class="col-sm-0">TST ID</th>
			<th scope="col" class="col-sm-0">HD ID</th>
			<th scope="col" class="col-sm-0">GOOD QTY</th>
			<th scope="col" class="col-sm-0">NOGOOD QTY</th>
			<th scope="col" class="col-sm-0">LOCATION</th>
			<th scope="col" class="col-sm-0">STORAGE</th>
			<th scope="col" class="col-sm-0">REMARKS</th>
			<th scope="col" class="col-sm-0">COLLECTION DATE</th>
			<th scope="col" class="col-sm-0">EXPIRATION DATE</th>
			<th scope="col" class="col-sm-0">QA STAMP DATE</th>
			<th scope="col" class="col-sm-0">AREA</th>
			<th scope="col" class="col-sm-0">LINE</th>
			<th scope="col" class="col-sm-0">TRANSACT DATE</th>
			<th scope="col" class="col-sm-0">DATALOG DATE/FILE</th>
		</tr>
	</thead>
	<tbody class="tbody">';

	if ($_GET["rowcount"] > 0){
		foreach($faq as $k=>$v) {
			//$expDate = $faq[$k]['expired_date'];
			
			$expDate = new DateTime($faq[$k]['expired_date']);
			$dateToday = new DateTime($datetime);
			$dateDif = $dateToday->diff($expDate);//;
			//$dueDate = $dateDif->format('%a days %h hours');
			$dueDate = $dateDif->format('%a');

			if ($dateToday >= $expDate){ // red
				$style = 'style="cursor: pointer; color: white;" class="bg-danger"';
			}else if ($dueDate <= 30){ // yellow
				$style = 'style="cursor: pointer; background-color: #ffff80;"';
			}else{
				$style = 'class=""';
			}

			$output .= '
					<tr '.$style.'>
							<td class="srID">' . $faq[$k]['serial_id'] . '</td>
							<td class="fam">' . $faq[$k]['family'] . '</td>
							<td class="">' . $faq[$k]['package_type'] . '</td>
							<td class="tst">' . $faq[$k]['tst_pf'] . '</td>
							<td class="testType">' . $faq[$k]['test_type'] . '</td>
							<td class="stats">' . $faq[$k]['status'] . '</td>
							<td class="tstID">' . $faq[$k]['tester_id'] . '</td>
							<td class="hdID">' . $faq[$k]['handler_id'] . '</td>
							<td class="goodQty">' . $faq[$k]['good_qty'] . '</td>
							<td class="noGoodQty">' . $faq[$k]['nogood_qty'] . '</td>
							<td class="loc">' . $faq[$k]['loc'] . '</td>
							<td class="strg">' . $faq[$k]['storage'] . '</td>
							<td class="">' . $faq[$k]['remarks'] . '</td>
							<td class="td13">' . $faq[$k]['collection_date'] . '</td>
							<td class="expDate">' . $faq[$k]['expired_date'] . '</td>
							<td class="">' . $faq[$k]['qa_stamp_date'] . '</td>
							<td class="td14">' . $faq[$k]['area'] . '</td>
							<td class="line">' . $faq[$k]['line'] . '</td>
							<td class="">' . $faq[$k]['last_update'] . '</td>
							<td class="btn-link"><a class="file" href="uploads/'. $faq[$k]['sFile'] .'" target="_blank">'. $faq[$k]['sFile'] .'</a></td>
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
