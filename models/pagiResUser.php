<?php
require_once("../frameworks/dbpagination.php");
require_once("post.php");
$db_handle = new DBController();
$perPage = new PerPage();

$sql = "SELECT * from users WHERE line !='N/A' ORDER BY id DESC";
$paginationlink = "models/pagiResUser.php?page=";
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
			<th scope="col" class="col-sm-2">AD ACCOUNT</th>
			<th scope="col" class="col-sm-2">LEVEL</th>
			<th scope="col" class="col-sm-2">ADDED BY</th>
			<th scope="col" class="col-sm-2">LINE</th>
			<th scope="col" class="col-sm-2">STATUS</th>			
		</tr>
	</thead>
	<tbody class="userList">';
foreach($faq as $k=>$v) {
	if ($faq[$k]['level'] == 0){
		$level = 'CUSTODIAN';
	}else if($faq[$k]['level'] == 1){
		$level = 'TECHNICIAN';
	}else if($faq[$k]['level'] == 2){
		$level = 'POWER USER';
	}else{
		$level = 'ADMIN';
	}
	$output .= '
            <tr style="cursor: pointer;">
                <td class="id" style="display: none;">' . $faq[$k]['id'] . '</td>
                <td class="ad_accnt">' . $faq[$k]['ad_accnt'] . '</td>
                <td class="level">' . $level . '</td>
                <td class="added_by">' . $faq[$k]['added_by'] . '</td>
                <td class="line">' . $faq[$k]['line'] . '</td>
                <td class="stats">' . $faq[$k]['date_added'] . '</td>
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
