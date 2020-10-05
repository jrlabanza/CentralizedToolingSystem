<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
$db_handle = new DBController();
$perPage = new PerPage();

if (empty($_SESSION['line'])){
	$sql = "SELECT * from test_stand ORDER BY id DESC";
}else{
	$sql = "SELECT * FROM test_stand WHERE line = '$_SESSION[line]' ORDER BY id DESC";
}

$paginationlink = "models/editItems/editResTT.php?page=";
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
$style = 'style="cursor: pointer;"';
$output .= '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
	<tr>
		<th scope="col" class="col-sm-0">SERIAL ID</th>
		<th scope="col" class="col-sm-0">FAMILY</th>
		<th scope="col" class="col-sm-0">TESTER PLATFORM</th>
		<th scope="col" class="col-sm-0">STATUS</th>
		<th scope="col" class="col-sm-0">TESTER ID</th>
		<th scope="col" class="col-sm-0">HANDLER ID</th>
		<th scope="col" class="col-sm-0">HANDLER PLATFORM</th>
		<th scope="col" class="col-sm-0">LOCATION</th>
		<th scope="col" class="col-sm-0">RACK</th>
		<th scope="col" class="col-sm-0">LINE</th>
		<th scope="col" class="col-sm-0">PERSONEL</th>
		<th scope="col" class="col-sm-0">DATE /TIME</th>
	</tr>
	</thead>
	<tbody class="tbody">';

	if ($_GET["rowcount"] > 0){
		foreach($faq as $k=>$v) {
	
			$output .= '<tr '.$style.' data-tester-parts='. $faq[$k]['id'] .'>
							<td class="srl_no">'. $faq[$k]['serial_id'] .'</td>
							<td class="fam">' . $faq[$k]['family'] . '</td>
							<td class="tst_pf">' . $faq[$k]['tst_pf'] . '</td>
							<td class="status">' . $faq[$k]['status'] . '</td>
							<td class="tester_id">' . $faq[$k]['tester_id'] . '</td>
							<td class="handler_id">' . $faq[$k]['handler_id'] . '</td>
							<td class="hd_pf">' . $faq[$k]['hd_pf'] . '</td>
							<td class="loc">' . $faq[$k]['loc'] . '</td>
							<td class="rack">' . $faq[$k]['rack'] . '</td>
							<td class="line">' . $faq[$k]['line'] . '</td>
							<td class="clerk">' . $faq[$k]['clerk'] . '</td>
							<td class="date_time">' . $faq[$k]['date_time'] . '</td>
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
$output .= '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul></nav>';
}
print $output;
?>
