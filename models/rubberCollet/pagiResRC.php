<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
date_default_timezone_set("Asia/Manila");
$datetime = date("Y-m-d H:i:s");

$db_handle = new DBController();
$perPage = new PerPage();

if (empty($_SESSION['line'])){
	$sql = "SELECT * from rubber_collet WHERE status = 'IN-GOOD' ORDER BY transaction_date DESC";
}else{
	$sql = "SELECT * FROM rubber_collet WHERE line = '$_SESSION[line]' AND status = 'IN-GOOD' ORDER BY transaction_date DESC";
}

$paginationlink = "models/rubberCollet/pagiResRC.php?page=";
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
	$output = '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul><button type="button" class="btn btn-link" onclick=location.href="models/rubberCollet/exportInventory.php">Download Inventory</button></nav>';
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
			<th scope="col" class="col-sm-0" hidden>MACHINE ID</th>
			<th scope="col" class="col-sm-0" hidden>STATUS</th>
			<th scope="col" class="col-sm-0" hidden>LOCATION</th>
			<th scope="col" class="col-sm-0">LINE</th>
			<th scope="col" class="col-sm-0">QTY</th>
			<th scope="col" class="col-sm-0">TRANSACTION DATETIME</th>
			<th scope="col" class="col-sm-0" hidden>CLIENT</th>
			<th scope="col" class="col-sm-0" hidden>CUSTODIAN</th>
			<th scope="col" class="col-sm-0" hidden>REMARKS</th>
		</tr>
	</thead>
	<tbody class="tbody">';

	if ($_GET["rowcount"] > 0){
		foreach($faq as $k=>$v) {

			// $status = $faq[$k]['status'];

			$dateTransact = new DateTime($faq[$k]['transaction_date']);
			$dateToday = new DateTime($datetime);
			$dateDif = $dateToday->diff($dateTransact);//;
			//$dueDate = $dateDif->format('%a days %h hours');
			$dueDate = $dateDif->format('%a');

			// if ($dateToday >= $dateTransact){ // red
			// 	$style = 'style="cursor: pointer; color: white;" class="bg-danger"';
			// }else if ($dueDate <= 30){ // yellow
			// 	$style = 'style="cursor: pointer; background-color: #ffff80;"';
			// }else{
			//  	$style = 'class="style="cursor: pointer;"';
			// }
			$style = 'style="cursor: pointer;"';
			
			// if ($status == "OUT-REPAIR" || $status == "OUT-ENGG"){
			// 	if ($dueDate >= 1){ // yellow
			// 		$style = 'style="cursor: pointer; color: white;" class="bg-danger"';
			// 	}
			// }

			if ($faq[$k]["status"] == "OUT"){}
				else{
					$output .= '<tr '.$style.' data-tester-parts='. $faq[$k]['id']. '>
									<td class="rubber_tip_no">' . $faq[$k]['rubber_tip_no'] . '</td>
									<td class="package">' . $faq[$k]['package'] . '</td>
									<td class="box">' . $faq[$k]['box'] . '</td>
									<td class="mchn_model">' . $faq[$k]['mchn_model'] . '</td>
									<td class="mchn_id" hidden>' . $faq[$k]['mchn_id'] . '</td>
									<td class="status" hidden>' . $faq[$k]['status'] . '</td>
									<td class="lction" hidden>' . $faq[$k]['lction'] . '</td>
									<td class="line">' . $faq[$k]['line'] . '</td>
									<td class="quantity">' . $faq[$k]['quantity'] . '</td>
									<td class="transaction_date">' . $faq[$k]['transaction_date'] . '</td>
									<td class="client" hidden>' . $faq[$k]['client'] . '</td>
									<td class="custodian" hidden>' . $faq[$k]['custodian'] . '</td>
									<td class="remarks" hidden>' . $faq[$k]['remarks'] . '</td>
								</tr>';
				}
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
