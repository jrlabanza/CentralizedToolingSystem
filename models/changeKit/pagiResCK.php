<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
date_default_timezone_set("Asia/Manila");
$datetime = date("Y-m-d H:i:s");

$db_handle = new DBController();
$perPage = new PerPage();

if (empty($_SESSION['line'])){
	$sql = "SELECT * from ck ORDER BY last_update DESC";
}else{
	$sql = "SELECT * FROM ck WHERE line = '$_SESSION[line]' ORDER BY last_update DESC";
}

$paginationlink = "models/changeKit/pagiResCK.php?page=";
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
			<th scope="col" class="col-sm-0">SERIAL ID</th>
			<th scope="col" class="col-sm-0">CATEGORY</th>
			<th scope="col" class="col-sm-0">HANDLER ID</th>
			<th scope="col" class="col-sm-0">HANDLER PLATFORM</th>
			<th scope="col" class="col-sm-0">TESTER ID</th>
			<th scope="col" class="col-sm-0">TESTER PLATFORM</th>
			<th scope="col" class="col-sm-0">STORAGE</th>
			<th scope="col" class="col-sm-0">PACKAGE TYPE</th>
			<th scope="col" class="col-sm-0">STATUS</th>
			<th scope="col" class="col-sm-0">SIZE</th>
			<th scope="col" class="col-sm-0">FINAL RESULT</th>
			<th scope="col" class="col">REMARKS</th>
			<th scope="col" class="col-sm-0">LINE</th>
			<th scope="col" class="col-sm-0">DATE TIME</th>
			<th scope="col" class="col-sm-0">LAST UPDATE</th>
		</tr>
	</thead>
	<tbody class="tbody">';

	if ($_GET["rowcount"] > 0){
		foreach($faq as $k=>$v) {

			// $status = $faq[$k]['status'];

			$dateTransact = new DateTime($faq[$k]['last_update']);
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

			$output .= '
					<tr '.$style.' data-change-kit='. $faq[$k]['id'] .'>
							<td class="srID">' . $faq[$k]['serial_id'] . '</td>
							<td class="cat">' . $faq[$k]['category'] . '</td>
							<td class="tst">' . $faq[$k]['handler_id'] . '</td>
							<td class="hdPF">' . $faq[$k]['handler_pf'] . '</td>
							<td class="tst">' . $faq[$k]['tester_id'] . '</td>
							<td class="tst">' . $faq[$k]['tester_pf'] . '</td>
							<td class="strg">' . $faq[$k]['storage'] . '</td>
							<td class="pkgType">' . $faq[$k]['package_type'] . '</td>
							<td class="stats">' . $faq[$k]['status'] . '</td>
							<td class="size">' . $faq[$k]['size'] . '</td>
							<td class="ckResult">' . $faq[$k]['ckResult'] . '</td>
							<td class="">' . $faq[$k]['remarks'] . '</td>
							<td class="line">' . $faq[$k]['line'] . '</td>
							<td class="date">' . $faq[$k]['date_time'] . '</td>
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
