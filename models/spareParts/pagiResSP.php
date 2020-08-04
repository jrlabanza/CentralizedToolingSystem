<?php
require_once("../../frameworks/dbpagination.php");
require_once("../post.php");
date_default_timezone_set("Asia/Manila");
$datetime = date("Y-m-d H:i:s");
$rackLoc = "";
$db_handle = new DBController();
$perPage = new PerPage();

if (empty($_SESSION['line'])){
	$sql = "SELECT DISTINCT description, parts_code, uploadImage, maker from spare_parts WHERE isDeleted = 0";
}else{
	$sql = "SELECT DISTINCT description, parts_code, uploadImage, maker FROM spare_parts WHERE line = '$_SESSION[line]' AND isDeleted = 0";
}

$paginationlink = "models/spareParts/pagiResSP.php?page=";
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
	$output = '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul><button type="button" class="btn btn-link" onclick=location.href="models/spareParts/exportInventory.php">Download Inventory</button></nav>';
	$output .= '';
}else{
	$output = '';
}

$output .= '<table id="keywords" class="table table-bordered table-sm-responsive table-hover">
<thead id="thead" class="thead-light">
	<tr>
		<th scope="col" class="col-sm-0" style="width:15%;">IMAGE</th>
		<th scope="col" class="col-sm-0">PARTS CODE</th>
		<th scope="col" class="col-sm-0">RACKS AVAILABLE</th>
		<th scope="col" class="col-sm-0">TOTAL QUANTITY</th>
		<th scope="col" class="col-sm-0">DESCRIPTION</th>
		<th scope="col" class="col-sm-0">MAKER</th>
		
	</tr>
</thead>
<tbody class="tbody">';

$style = 'style="cursor: pointer;"';
if ($_GET["rowcount"] > 0){
	foreach($faq as $k=>$v) {
		$totalQuantityQuery = "SELECT SUM(current_qty) AS overall FROM spare_parts WHERE parts_code ='". $faq[$k]['parts_code'] ."' AND isDeleted = 0";
		$totalQuantityRes = $db_handle->runQuery($totalQuantityQuery);
		$rackLocationQuery = "SELECT DISTINCT location FROM spare_parts WHERE parts_code ='". $faq[$k]['parts_code'] ."' AND isDeleted = 0";
		$rackLocationRes = $db_handle->runQuery($rackLocationQuery);

		foreach($totalQuantityRes as $counKey => $counValue)
		{
			$overall = $totalQuantityRes[$counKey]['overall'];
		}

		foreach($rackLocationRes as $counKey2 => $counValue2)
		{
			$rackLoc .= $rackLocationRes[$counKey2]['location']."<br>";
			
		}
		
			if($faq[$k]['uploadImage'] == "")
			{
				$imageUpload = "noimage.jpg"; 
			}
			else{
				$imageUpload = $faq[$k]['uploadImage'];
			}

			$output .= '<tr '.$style.' data-tester-parts=>
							<td class="image"><a href="uploads/spareParts/'. $imageUpload  .'" target="_blank"><img class="img-responsive" src="uploads/spareParts/'. $imageUpload .'" style="width:100%"></a> </td>
							<td class="parts_code">' . $faq[$k]['parts_code'] . '</td>
							<td class="location">' . $rackLoc . '</td>
							<td class="current_qty">' . $overall . '</td>
							<td class="description">' . $faq[$k]['description'] . '</td>
							<td class="maker">' . $faq[$k]['maker'] . '</td>
						</tr>';
						$rackLoc = "";
	}
}
else{
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
