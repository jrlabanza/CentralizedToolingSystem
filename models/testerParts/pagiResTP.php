<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
date_default_timezone_set("Asia/Manila");
$datetime = date("Y-m-d H:i:s");

$db_handle = new DBController();
$perPage = new PerPage();

if (empty($_SESSION['line'])){
	$sql = "SELECT * from tstpartstrck WHERE status = 'IN' ORDER BY date_time DESC";
}else{
	$sql = "SELECT * FROM tstpartstrck WHERE line = '$_SESSION[line]' AND status = 'IN' ORDER BY date_time DESC";
}

$paginationlink = "models/testerParts/pagiResTP.php?page=";
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
	$output = '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul><button type="button" class="btn btn-link" onclick=location.href="models/changeKit/exportInventory.php">Download Inventory</button></nav>';
	$output .= '';
}else{
	$output = '';
}

$output .= '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
		<tr>
			<th scope="col" class="col-sm-0">ITEM NAME</th>
			<th scope="col" class="col-sm-0">PART NAME</th>
			<th scope="col" class="col-sm-0">PART NUMBER</th>
			<th scope="col" class="col-sm-0" hidden>SERIAL NUMBER</th>
			<th scope="col" class="col-sm-0">QUANTITY</th>
			<th scope="col" class="col-sm-0">COST($)</th>
			<th scope="col" class="col-sm-0">MAKER</th>
			<th scope="col" class="col-sm-0">TESTER PLATFORM</th>
			<th scope="col" class="col-sm-0">LOCATION</th>
			<th scope="col" class="col-sm-0">STATUS</th>
			<th scope="col" class="col-sm-0">PERSONEL</th>
			<th scope="col" class="col-sm-0">DATE /TIME</th>
		</tr>
	</thead>
	<tbody class="tbody">';

	if ($_GET["rowcount"] > 0){
		foreach($faq as $k=>$v) {

			// $status = $faq[$k]['status'];

			$dateTransact = new DateTime($faq[$k]['date_time']);
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
			$output .= '<tr '.$style.' data-tester-parts='. $faq[$k]['id'] .' data-current-quantity='. $faq[$k]['quantity'] .'>
							<td class="itm_nm">' . $faq[$k]['itm_nm'] . '</td>
							<td class="dscrptn">' . $faq[$k]['dscrptn'] . '</td>
							<td class="prt_no">' . $faq[$k]['prt_no'] . '</td>
							<td class="quantity">' . $faq[$k]['quantity'] . '</td>
							<td class="srl_no">' . $faq[$k]['srl_no'] . '</td>
							<td class="cost" hidden>' . $faq[$k]['srl_no'] . '</td>
							<td class="vendor">' . $faq[$k]['vendor'] . '</td>
							<td class="mchn_model">' . $faq[$k]['mchn_model'] . '</td>
							<td class="lction">' . $faq[$k]['lction'] . '</td>
							<td class="status">' . $faq[$k]['status'] . '</td>
							<td class="prson">' . $faq[$k]['prson'] . '</td>
							<td class="date_time">' . $faq[$k]['date_time'] . '</td>
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
