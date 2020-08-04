<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
$db_handle = new DBController();
$perPage = new PerPage();

if (empty($_SESSION['line'])){
	$sql = "SELECT * from collet ORDER BY id DESC";
}else{
	$sql = "SELECT * from collet WHERE line = '$_SESSION[line]' ORDER BY id DESC";
}

$paginationlink = "models/editItems/editResCollet.php?page=";
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
			<th scope="col" class="col-sm-0">BOX NO.</th>	
			<th scope="col" class="col-sm-0">COLLET PART NO.</th>
			<th scope="col" class="col-sm-0">ALTERNATIVE COLLET</th>
			<th scope="col" class="col-sm-0">COLLET TYPE</th>			
			<th scope="col" class="col-sm-0">STATUS</th>
			<th scope="col" class="col-sm-0">MACHINE MODEL</th>
			<th scope="col" class="col-sm-0">MACHINE ID</th>
			<th scope="col" class="col-sm-0">SHOTS</th>
			<th scope="col" class="col-sm-0">MAX SHOTS</th>
			<th scope="col" class="col-sm-0">REMARKS</th>
			<th scope="col" class="col-sm-0">LINE</th>
			<th scope="col" class="col-sm-0">LAST UPDATE</th>
		</tr>
	</thead>
	<tbody class="tbody">';

if ($_GET["rowcount"] > 0){
	foreach($faq as $k=>$v) {
		$output .= '
				<tr style="cursor: pointer;">
						<td class="td0" scope="row" style="display: none;">' . $faq[$k]['id'] . '</td>
						<td class="td2">' . $faq[$k]['box_no'] . '</td>		
						<td class="td1">' . $faq[$k]['nozzle_partno'] . '</td>
						<td class="td7">' . $faq[$k]['altrntv_nozzle'] . '</td>
						<td class="td3">' . $faq[$k]['package'] . '</td>
						<td class="">' . $faq[$k]['status'] . '</td>
						<td class="td4">' . $faq[$k]['machine_model'] . '</td>
						<td class="">' . $faq[$k]['machine_id'] . '</td>
						<td class="ShotCnt">' . $faq[$k]['shots'] . '</td>
						<td class="td5">' . $faq[$k]['max_shots'] . '</td>
						<td class="">' . $faq[$k]['remarks'] . '</td>
						<td class="td8">' . $faq[$k]['line'] . '</td>
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
