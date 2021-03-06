<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
$db_handle = new DBController();
$perPage = new PerPage();

if (empty($_SESSION['line'])){
	$sql = "SELECT * from ck ORDER BY id DESC";
}else{
	$sql = "SELECT * FROM ck WHERE line = '$_SESSION[line]' ORDER BY id DESC";
}

$paginationlink = "models/delItems/delResCK.php?page=";
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
	$output = '<nav aria-label="..."><button id="bttnDel" class="btn btn-danger" style="margin-left: 20px;" data-toggle="modal" data-target="#bd-example-modal-md">DELETE</button><br/><br/><ul class="pagination">' . $perpageresult . '</ul></nav>';
	$output .= '';
}else{
	$output = '';
}

$output .= '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
		<tr>
			<th scope="col" class="col-sm-0"></th>
			<th scope="col" class="col-sm-0">SERIAL ID</th>
			<th scope="col" class="col-sm-0">HANDLER PLATFORM</th>
			<th scope="col" class="col-sm-0">PACKAGE TYPE</th>
			<th scope="col" class="col-sm-0">CATEGORY</th>
			<th scope="col" class="col-sm-0">STORAGE</th>
			<th scope="col" class="col-sm-0">SIZE</th>
			<th scope="col" class="col-sm-0">FINAL RESULT</th>
			<th scope="col" class="col-sm-0">DATE TIME</th>
			<th scope="col" class="col-sm-0">LAST UPDATE</th>
			<th scope="col" class="col">REMARKS</th>
		</tr>
	</thead>
	<tbody id="tbody2">';

	if ($_GET["rowcount"] > 0){
		foreach($faq as $k=>$v) {
			$output .= '
					<tr>
						<td class="tblID" scope=""><input type="checkbox" name="cbox" value="'.$faq[$k]['id'].'"></td>
						<td class="srID">' . $faq[$k]['serial_id'] . '</td>
						<td class="hdPF">' . $faq[$k]['handler_pf'] . '</td>
						<td class="pkgType">' . $faq[$k]['package_type'] . '</td>
						<td class="cat">' . $faq[$k]['category'] . '</td>
						<td class="strg">' . $faq[$k]['storage'] . '</td>
						<td class="size">' . $faq[$k]['size'] . '</td>
						<td class="ckResult">' . $faq[$k]['ckResult'] . '</td>
						<td class="date">' . $faq[$k]['date_time'] . '</td>
						<td class="updated">' . $faq[$k]['last_update'] . '</td>
						<td class="">' . $faq[$k]['remarks'] . '</td>
					</tr>';
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
