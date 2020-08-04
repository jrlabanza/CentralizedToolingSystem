<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
$db_handle = new DBController();
$perPage = new PerPage();

if (empty($_SESSION['line'])){
	$sql = "SELECT * from spanker ORDER BY id DESC";
}else{
	$sql = "SELECT * FROM spanker WHERE line = '$_SESSION[line]' ORDER BY id DESC";
}

$paginationlink = "models/delItems/delResSpanker.php?page=";
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

// if(!empty($perpageresult)) {
	$output = '<nav aria-label="..."><button id="bttnDel" class="btn btn-danger" style="margin-left: 20px;" data-toggle="modal" data-target="#bd-example-modal-md">DELETE</button><br/><br/><ul class="pagination">' . $perpageresult . '</ul></nav>';
	$output .= '';
// }else{
// 	$output = '';
// }

$output .= '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
		<tr>
			<th scope="col" class="col-sm-0"></th>
			<th scope="col" class="col-sm-0">BOX NO.</th>	
			<th scope="col" class="col-sm-0">NOZZLE PART NO.</th>
			<th scope="col" class="col-sm-0">ALTERNATIVE NOZZLE</th>
			<th scope="col" class="col-sm-0">NOZZLE TYPE</th>			
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
	<tbody id="tbody2">';

if ($_GET["rowcount"] > 0){
	foreach($faq as $k=>$v) {
		$output .= '
				<tr>
					<td class="tblID" scope=""><input type="checkbox" name="cbox" value="'.$faq[$k]['id'].'"></td>
					<td class="lbID">' . $faq[$k]['box_no'] . '</td>		
					<td class="srID">' . $faq[$k]['nozzle_partno'] . '</td>
					<td class="prtNo">' . $faq[$k]['altrntv_nozzle'] . '</td>
					<td class="pckgType">' . $faq[$k]['package'] . '</td>
					<td class="stats">' . $faq[$k]['status'] . '</td>
					<td class="tst">' . $faq[$k]['machine_model'] . '</td>
					<td class="tstID">' . $faq[$k]['machine_id'] . '</td>
					<td class="ShotCnt">' . $faq[$k]['shots'] . '</td>
					<td class="mShotCnt">' . $faq[$k]['max_shots'] . '</td>
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
$output .= '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul></nav><button id="bttnDel" class="btn btn-danger" style="margin-left: 20px;" data-toggle="modal" data-target="#bd-example-modal-md">DELETE</button>';
}
print $output;
?>
