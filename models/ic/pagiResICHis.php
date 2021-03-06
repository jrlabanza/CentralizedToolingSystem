<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
$db_handle = new DBController();
$perPage = new PerPage();

$sql = "SELECT * FROM ic_history ORDER BY date_time DESC";
$paginationlink = "models/ic/pagiResICHis.php?page=";
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
			<th scope="col" class="col-sm-0">LF NAME</th>
			<th scope="col" class="col-sm-0">PACKAGE</th>
			<th scope="col" class="col-sm-0">MACHINE MODEL</th>
			<th scope="col" class="col-sm-0">MACHINE ID</th>
			<th scope="col" class="col-sm-0">DRA</th>
			<th scope="col" class="col-sm-0">INSERT SN</th>	
			<th scope="col" class="col-sm-0">CLAMP SN.</th>
			<th scope="col" class="col-sm-0">OUT COUNT</th>			
			<th scope="col" class="col-sm-0">STATUS</th>
			<th scope="col" class="col-sm-0">SHOTS</th>
			<th scope="col" class="col-sm-0">MAX SHOTS</th>
			<th scope="col" class="col-sm-0">REMARKS</th>
			<th scope="col" class="col-sm-0">CLIENT</th>
			<th scope="col" class="col-sm-0">CUSTODIAN</th>
			<th scope="col" class="col-sm-0">LINE</th>
			<th scope="col" class="col-sm-0">LAST UPDATE</th>
		</tr>
	</thead>
	<tbody class="">';

	if ($_GET["rowcount"] > 0){
		foreach($faq as $k=>$v) {
			$output .= '
					<tr>	
						<td class="lbID">' . $faq[$k]['box_no'] . '</td>		
						<td class="srID">' . $faq[$k]['lf_name'] . '</td>
						<td class="pckgType">' . $faq[$k]['package'] . '</td>
						<td class="tst">' . $faq[$k]['machine_model'] . '</td>
						<td class="tstID">' . $faq[$k]['machine_id'] . '</td>
						<td class="stats">' . $faq[$k]['dra'] . '</td>
						<td class="stats">' . $faq[$k]['insert_sn'] . '</td>
						<td class="stats">' . $faq[$k]['clamp_sn'] . '</td>
						<td class="stats">' . $faq[$k]['out_count'] . '</td>
						<td class="stats">' . $faq[$k]['status'] . '</td>
						<td class="ShotCnt">' . $faq[$k]['shots'] . '</td>
						<td class="mShotCnt">' . $faq[$k]['max_shots'] . '</td>
						<td class="">' . $faq[$k]['remarks'] . '</td>
						<td class="">' . $faq[$k]['client'] . '</td>
						<td class="">' . $faq[$k]['clerk'] . '</td>
						<td class="line">' . $faq[$k]['line'] . '</td>
						<td class="">' . $faq[$k]['date_time'] . '</td>
					</tr>';
			// $output .= '<div class="question"><input type="hidden" id="rowcount" name="rowcount" value="' . $_GET["rowcount"] . '" />' . $faq[$k]["lb_id"] . '</div>';
			// $output .= '<div class="answer">' . $faq[$k]["family"] . '</div>';
		}
	}else{
		$output .= '
		<tr style="cursor: pointer;">
			<td colspan="17" class="text-center bg-warning"><strong>EMPTY RESULTS<strong></td>
		</tr>';
	}

$output .= '</tbody>
</table>';
if(!empty($perpageresult)) {
$output .= '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul></nav>';
}
print $output;
?>
