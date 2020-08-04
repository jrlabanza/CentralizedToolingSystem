<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
$db_handle = new DBController();
$perPage = new PerPage();

if (empty($_SESSION['line'])){
	$sql = "SELECT * from spare_parts WHERE status = 'IN' AND isDeleted = 0 ORDER BY id DESC";
}else{
	$sql = "SELECT * FROM spare_parts WHERE line = '$_SESSION[line]' AND status = 'IN' AND isDeleted = 0 ORDER BY id DESC";
}

$paginationlink = "models/editItems/editResSP.php?page=";
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
		<th scope="col" class="col-sm-0" style="width:15%;">IMAGE</th>
		<th scope="col" class="col-sm-0">DESCRIPTION</th>
		<th scope="col" class="col-sm-0">PARTS CODE</th>
		<th scope="col" class="col-sm-0">CURRENT QTY</th>
		<th scope="col" class="col-sm-0">UPDATED QTY</th>
		<th scope="col" class="col-sm-0">MAKER</th>
		<th scope="col" class="col-sm-0">LOCATION</th>
		<th scope="col" class="col-sm-0">REQUESTING PERSONNEL</th>
		<th scope="col" class="col-sm-0">LINE</th>
		<th scope="col" class="col-sm-0">STATUS</th>
		<th scope="col" class="col-sm-0">MACHINE</th>
		<th scope="col" class="col-sm-0">DATE REQUESTED</th>
		<th scope="col" class="col-sm-0">REMARKS</th>
	</tr>
	</thead>
	<tbody class="tbody">';

	if ($_GET["rowcount"] > 0){
		foreach($faq as $k=>$v) {
			if($faq[$k]['uploadImage'] == "")
			{
				$imageUpload = "noimage.jpg"; 
			}
			else{
				$imageUpload = $faq[$k]['uploadImage'];
			}
			$output .= '<tr '.$style.' data-tester-parts='. $faq[$k]['id']. '>
			<td class="image"><a href="uploads/spareParts/'. $imageUpload  .'" target="_blank"><img class="img-responsive" src="uploads/spareParts/'. $imageUpload .'" style="width:100%"></a> </td>
			<td class="description">' . $faq[$k]['description'] . '</td>
			<td class="parts_code">' . $faq[$k]['parts_code'] . '</td>
			<td class="quantity">' . $faq[$k]['current_qty'] . '</td>
			<td class="updated_qty">' . $faq[$k]['updated_qty'] . '</td>
			<td class="maker">' . $faq[$k]['maker'] . '</td>
			<td class="lction">' . $faq[$k]['location'] . '</td>
			<td class="requesting_personnel">' . $faq[$k]['personnel'] . '</td>
			<td class="line">' . $faq[$k]['line'] . '</td>
			<td class="status">' . $faq[$k]['status'] . '</td>
			<td class="machine">' . $faq[$k]['machine'] . '</td>
			<td class="date_requested">' . $faq[$k]['date_requested'] . '</td>
			<td class="remarks">' . $faq[$k]['remarks'] . '</td>
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
