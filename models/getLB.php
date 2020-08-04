<?php
require('../frameworks/ajaxConn.php');
require_once("../frameworks/dbpagination.php");
require_once("post.php");
$db_handle = new DBController();
$perPage = new PerPage();

$id=$_POST['id'];
$sql = 'SELECT lb_id,family,dut_req,tst_pf,status,loc,storage,line,vendor,tester_id,handler_id,lastupdate FROM loadboard WHERE lb_id LIKE "%'.$id.'%"';
$paginationlink = "models/getLB.php?page=";
$pagination_setting = $_GET["pagination_setting"];

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
}

$output .= '';
$output .= '<table id="keywords" class="table table-sm-responsive table-hover">
	<thead id="thead" class="thead-light">
		<tr>
			<th scope="col" class="col-sm-1">LB ID</th>
			<th scope="col" class="col-sm-1">FAMILY</th>
			<th scope="col" class="col-sm-1">DUT REQ.</th>
			<th scope="col" class="col-sm-1">TST PF</th>
			<th scope="col" class="col-sm-1">STATUS</th>
			<th scope="col" class="col-sm-1">TST ID</th>
			<th scope="col" class="col-sm-1">HD ID</th>
			<th scope="col" class="col-sm-1">LOCATION</th>
			<th scope="col" class="col-sm-1">STORAGE</th>
			<th scope="col" class="col-sm-1">VENDOR</th>
			<th scope="col" class="col-sm-1">LINE</th>
			<th scope="col" class="col-sm-1">UPDATED</th>
		</tr>
	</thead>
	<tbody class="tbody">';
foreach($faq as $k=>$v) {
	$output .= '
			<tr style="cursor: pointer;">
					<th class="lbID" scope="row">' . $faq[$k]['lb_id'] . '</th>
					<td class="fam">' . $faq[$k]['family'] . '</td>
					<td class="dut">' . $faq[$k]['dut_req'] . '</td>
					<td class="tst">' . $faq[$k]['tst_pf'] . '</td>
					<td class="stats">' . $faq[$k]['status'] . '</td>
					<td class="tstID">' . $faq[$k]['tester_id'] . '</td>
					<td class="hdID">' . $faq[$k]['handler_id'] . '</td>
					<td class="loc">' . $faq[$k]['loc'] . '</td>
					<td class="strg">' . $faq[$k]['storage'] . '</td>
					<td class="ven">' . $faq[$k]['vendor'] . '</td>
					<td class="line">' . $faq[$k]['line'] . '</td>
					<td class="updated">' . $faq[$k]['clerk'] . '</td>
				</tr>';
	// $output .= '<div class="question"><input type="hidden" id="rowcount" name="rowcount" value="' . $_GET["rowcount"] . '" />' . $faq[$k]["lb_id"] . '</div>';
	// $output .= '<div class="answer">' . $faq[$k]["family"] . '</div>';
}
$output .= '</tbody>
</table>';
if(!empty($perpageresult)) {
$output .= '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul></nav>';
}
print $output;
?>
