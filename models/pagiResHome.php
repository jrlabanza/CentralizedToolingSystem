<?php
require_once("../frameworks/dbpagination.php");
require_once("post.php");
$db_handle = new DBController();
$perPage = new PerPage();

$sql = "SELECT * from summary ORDER BY id ASC";

$paginationlink = "models/loadboard/pagiResLB.php?page=";
// $pagination_setting = $_GET["pagination_setting"];
$pagination_setting = "all-links";

$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

// $query =  $sql . " limit " . $start . "," . $perPage->perpage;
$query =  $sql;
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
// 	$output = '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul></nav>';
// 	$output .= '';
// }else{
	$output = '';
// }

$output .= '<table id="keywords" class="table table-bordered table-sm-responsive">
	<thead id="thead" class="thead-light">
		<tr>
			<th scope="col" class="col-sm-0">CATEGORY</th>
			<th scope="col" class="col-sm-0">LINE</th>
			<th scope="col" class="col-sm-0">PRODUCTION</th>
			<th scope="col" class="col-sm-0">GOOD</th>
			<th scope="col" class="col-sm-0">REPAIR</th>
			<th scope="col" class="col-sm-0">PM</th>
			<th scope="col" class="col-sm-0">NEW</th>
			<th scope="col" class="col-sm-0">ENGG</th>
			<th scope="col" class="">END OF LIFE</th>
			<th scope="col" class="col-sm-0">SCRAP</th>
			<th scope="col" class="col-sm-0">TOTAL</th>
		</tr>
	</thead>
	<tbody class="">';

	if ($_GET["rowcount"] > 0){
		$output .= '<tr>
			<th scope="row" rowspan="2" style="vertical-align:middle;">LOADBOARD</th>';
			foreach($faq as $k=>$v) {
				$total = $faq[$k]['prod'] + $faq[$k]['good'] + $faq[$k]['repair'] + $faq[$k]['pm'] + $faq[$k]['qual'] + $faq[$k]['endOfLife'];
				if ($faq[$k]['category'] == "LOADBOARD"){
					$output .= '
					<td class=""><strong>' . $faq[$k]['line'] . '</strong></td>
					<td class="alert-success">' . $faq[$k]['prod'] . '</td>
					<td class="alert-primary">' . $faq[$k]['good'] . '</td>
					<td class="alert-danger">' . $faq[$k]['repair'] . '</td>
					<td class="alert-info">' . $faq[$k]['pm'] . '</td>
					<td class="alert-warning">' . $faq[$k]['qual'] . '</td>
					<td class="alert-warning">' . $faq[$k]['eng'] . '</td>
					<td class="alert-dark">' . $faq[$k]['endOfLife'] . '</td>
					<td class="alert-dark">' . $faq[$k]['scrap'] . '</td>
					<td class=""><strong>' . $total . '</strong></td>
				</tr>';
				}
		}
		$output .= '<tr >
			<th scope="row" rowspan="2" style="vertical-align:middle;">SOCKET</th>';
			foreach($faq as $k=>$v) {
				$total = $faq[$k]['prod'] + $faq[$k]['good'] + $faq[$k]['repair'] + $faq[$k]['pm'] + $faq[$k]['qual'] + $faq[$k]['endOfLife'];
				if ($faq[$k]['category'] == "SOCKET"){
					$output .= '
					<td class=""><strong>' . $faq[$k]['line'] . '</strong></td>
					<td class="alert-success">' . $faq[$k]['prod'] . '</td>
					<td class="alert-primary">' . $faq[$k]['good'] . '</td>
					<td class="alert-danger">' . $faq[$k]['repair'] . '</td>
					<td class="alert-info">' . $faq[$k]['pm'] . '</td>
					<td class="alert-warning">' . $faq[$k]['qual'] . '</td>
					<td class="alert-warning">' . $faq[$k]['eng'] . '</td>
					<td class="alert-dark">' . $faq[$k]['endOfLife'] . '</td>
					<td class="alert-dark">' . $faq[$k]['scrap'] . '</td>
					<td class=""><strong>' . $total . '</strong></td>
				</tr>';
				}
		}
		$output .= '<tr >
			<th scope="row" style="vertical-align:middle;">GONOGO</th>';
			foreach($faq as $k=>$v) {
				$total = $faq[$k]['prod'] + $faq[$k]['good'] + $faq[$k]['repair'] + $faq[$k]['pm'] + $faq[$k]['qual'] + $faq[$k]['endOfLife'];
				if ($faq[$k]['category'] == "GONOGO"){
					$output .= '
					<td class=""><strong>' . $faq[$k]['line'] . '</strong></td>
					<td class="alert-success">' . $faq[$k]['prod'] . '</td>
					<td class="alert-primary">' . $faq[$k]['good'] . '</td>
					<td class="alert-danger">' . $faq[$k]['repair'] . '</td>
					<td class="alert-info">' . $faq[$k]['pm'] . '</td>
					<td class="alert-warning">' . $faq[$k]['qual'] . '</td>
					<td class="alert-warning">' . $faq[$k]['eng'] . '</td>
					<td class="alert-dark">' . $faq[$k]['endOfLife'] . '</td>
					<td class="alert-dark">' . $faq[$k]['scrap'] . '</td>
					<td class=""><strong>' . $total . '</strong></td>
				</tr>';
				}
		}
		$output .= '<tr >
			<th scope="row" style="vertical-align:middle;">BIB</th>';
			foreach($faq as $k=>$v) {
				$total = $faq[$k]['prod'] + $faq[$k]['good'] + $faq[$k]['repair'] + $faq[$k]['pm'] + $faq[$k]['qual'] + $faq[$k]['endOfLife'];
				if ($faq[$k]['category'] == "BIB"){
					$output .= '
					<td class=""><strong>' . $faq[$k]['line'] . '</strong></td>
					<td class="alert-success">' . $faq[$k]['prod'] . '</td>
					<td class="alert-primary">' . $faq[$k]['good'] . '</td>
					<td class="alert-danger">' . $faq[$k]['repair'] . '</td>
					<td class="alert-info">' . $faq[$k]['pm'] . '</td>
					<td class="alert-warning">' . $faq[$k]['qual'] . '</td>
					<td class="alert-warning">' . $faq[$k]['eng'] . '</td>
					<td class="alert-dark">' . $faq[$k]['endOfLife'] . '</td>
					<td class="alert-dark">' . $faq[$k]['scrap'] . '</td>
					<td class=""><strong>' . $total . '</strong></td>
				</tr>';
				}
		}
		$output .= '<tr >
			<th scope="row" style="vertical-align:middle;">NOZZLE</th>';
			foreach($faq as $k=>$v) {
				$total = $faq[$k]['prod'] + $faq[$k]['good'] + $faq[$k]['repair'] + $faq[$k]['pm'] + $faq[$k]['qual'] + $faq[$k]['endOfLife'];
				if ($faq[$k]['category'] == "NOZZLE"){
					$output .= '
					<td class=""><strong>' . $faq[$k]['line'] . '</strong></td>
					<td class="alert-success">' . $faq[$k]['prod'] . '</td>
					<td class="alert-primary">' . $faq[$k]['good'] . '</td>
					<td class="alert-danger">' . $faq[$k]['repair'] . '</td>
					<td class="alert-info">' . $faq[$k]['pm'] . '</td>
					<td class="alert-warning">' . $faq[$k]['qual'] . '</td>
					<td class="alert-warning">' . $faq[$k]['eng'] . '</td>
					<td class="alert-dark">' . $faq[$k]['endOfLife'] . '</td>
					<td class="alert-dark">' . $faq[$k]['scrap'] . '</td>
					<td class=""><strong>' . $total . '</strong></td>
				</tr>';
				}
		}
		$output .= '<tr >
			<th scope="row" style="vertical-align:middle;">INSERT & CLAMP</th>';
			foreach($faq as $k=>$v) {
				$total = $faq[$k]['prod'] + $faq[$k]['good'] + $faq[$k]['repair'] + $faq[$k]['pm'] + $faq[$k]['qual'] + $faq[$k]['endOfLife'];
				if ($faq[$k]['category'] == "INSERT & CLAMP"){
					$output .= '
					<td class=""><strong>' . $faq[$k]['line'] . '</strong></td>
					<td class="alert-success">' . $faq[$k]['prod'] . '</td>
					<td class="alert-primary">' . $faq[$k]['good'] . '</td>
					<td class="alert-danger">' . $faq[$k]['repair'] . '</td>
					<td class="alert-info">' . $faq[$k]['pm'] . '</td>
					<td class="alert-warning">' . $faq[$k]['qual'] . '</td>
					<td class="alert-warning">' . $faq[$k]['eng'] . '</td>
					<td class="alert-dark">' . $faq[$k]['endOfLife'] . '</td>
					<td class="alert-dark">' . $faq[$k]['scrap'] . '</td>
					<td class=""><strong>' . $total . '</strong></td>
				</tr>';
				}
		}
		$output .= '<tr >
			<th scope="row" style="vertical-align:middle;">AUTO CORR</th>';
			foreach($faq as $k=>$v) {
				$total = $faq[$k]['prod'] + $faq[$k]['good'] + $faq[$k]['repair'] + $faq[$k]['pm'] + $faq[$k]['qual'] + $faq[$k]['endOfLife'];
				if ($faq[$k]['category'] == "AUTO CORR"){
					$output .= '
					<td class=""><strong>' . $faq[$k]['line'] . '</strong></td>
					<td class="alert-success">' . $faq[$k]['prod'] . '</td>
					<td class="alert-primary">' . $faq[$k]['good'] . '</td>
					<td class="alert-danger">' . $faq[$k]['repair'] . '</td>
					<td class="alert-info">' . $faq[$k]['pm'] . '</td>
					<td class="alert-warning">' . $faq[$k]['qual'] . '</td>
					<td class="alert-warning">' . $faq[$k]['eng'] . '</td>
					<td class="alert-dark">' . $faq[$k]['endOfLife'] . '</td>
					<td class="alert-dark">' . $faq[$k]['scrap'] . '</td>
					<td class=""><strong>' . $total . '</strong></td>
				</tr>';
				}
		}
		$output .= '<tr >
			<th scope="row" style="vertical-align:middle;">TEST CABLE</th>';
			foreach($faq as $k=>$v) {
				$total = $faq[$k]['prod'] + $faq[$k]['good'] + $faq[$k]['repair'] + $faq[$k]['pm'] + $faq[$k]['qual'] + $faq[$k]['endOfLife'];
				if ($faq[$k]['category'] == "TEST CABLE"){
					$output .= '
					<td class=""><strong>' . $faq[$k]['line'] . '</strong></td>
					<td class="alert-success">' . $faq[$k]['prod'] . '</td>
					<td class="alert-primary">' . $faq[$k]['good'] . '</td>
					<td class="alert-danger">' . $faq[$k]['repair'] . '</td>
					<td class="alert-info">' . $faq[$k]['pm'] . '</td>
					<td class="alert-warning">' . $faq[$k]['qual'] . '</td>
					<td class="alert-warning">' . $faq[$k]['eng'] . '</td>
					<td class="alert-dark">' . $faq[$k]['endOfLife'] . '</td>
					<td class="alert-dark">' . $faq[$k]['scrap'] . '</td>
					<td class=""><strong>' . $total . '</strong></td>
				</tr>';
				}
		}
		$output .= '<tr >
			<th scope="row" style="vertical-align:middle;">SOCKET BOARD</th>';
			foreach($faq as $k=>$v) {
				$total = $faq[$k]['prod'] + $faq[$k]['good'] + $faq[$k]['repair'] + $faq[$k]['pm'] + $faq[$k]['qual'] + $faq[$k]['endOfLife'];
				if ($faq[$k]['category'] == "SOCKET BOARD"){
					$output .= '
					<td class=""><strong>' . $faq[$k]['line'] . '</strong></td>
					<td class="alert-success">' . $faq[$k]['prod'] . '</td>
					<td class="alert-primary">' . $faq[$k]['good'] . '</td>
					<td class="alert-danger">' . $faq[$k]['repair'] . '</td>
					<td class="alert-info">' . $faq[$k]['pm'] . '</td>
					<td class="alert-warning">' . $faq[$k]['qual'] . '</td>
					<td class="alert-warning">' . $faq[$k]['eng'] . '</td>
					<td class="alert-dark">' . $faq[$k]['endOfLife'] . '</td>
					<td class="alert-dark">' . $faq[$k]['scrap'] . '</td>
					<td class=""><strong>' . $total . '</strong></td>
				</tr>';
				}
		}
		$output .= '<tr >
		<th scope="row" rowspan="4" style="vertical-align:middle;">SPARE PARTS</th>';
		foreach($faq as $k=>$v) {
			$total = $faq[$k]['prod'] + $faq[$k]['good'] + $faq[$k]['repair'] + $faq[$k]['pm'] + $faq[$k]['qual'] + $faq[$k]['endOfLife'];
			if ($faq[$k]['category'] == "SPARE PARTS"){
				$output .= '
				<td class=""><strong>' . $faq[$k]['line'] . '</strong></td>
				<td class="alert-success">' . $faq[$k]['prod'] . '</td>
				<td class="alert-primary">' . $faq[$k]['good'] . '</td>
				<td class="alert-danger">' . $faq[$k]['repair'] . '</td>
				<td class="alert-info">' . $faq[$k]['pm'] . '</td>
				<td class="alert-warning">' . $faq[$k]['qual'] . '</td>
				<td class="alert-warning">' . $faq[$k]['eng'] . '</td>
				<td class="alert-dark">' . $faq[$k]['endOfLife'] . '</td>
				<td class="alert-dark">' . $faq[$k]['scrap'] . '</td>
				<td class=""><strong>' . $total . '</strong></td>
			</tr>';
			}
		}
		$output .= '<tr >
		<th scope="row" style="vertical-align:middle;">RUBBER COLLET</th>';
		foreach($faq as $k=>$v) {
			$total = $faq[$k]['prod'] + $faq[$k]['good'] + $faq[$k]['repair'] + $faq[$k]['pm'] + $faq[$k]['qual'] + $faq[$k]['endOfLife'];
			if ($faq[$k]['category'] == "RUBBER COLLET"){
				$output .= '
				<td class=""><strong>' . $faq[$k]['line'] . '</strong></td>
				<td class="alert-success">' . $faq[$k]['prod'] . '</td>
				<td class="alert-primary">' . $faq[$k]['good'] . '</td>
				<td class="alert-danger">' . $faq[$k]['repair'] . '</td>
				<td class="alert-info">' . $faq[$k]['pm'] . '</td>
				<td class="alert-warning">' . $faq[$k]['qual'] . '</td>
				<td class="alert-warning">' . $faq[$k]['eng'] . '</td>
				<td class="alert-dark">' . $faq[$k]['endOfLife'] . '</td>
				<td class="alert-dark">' . $faq[$k]['scrap'] . '</td>
				<td class=""><strong>' . $total . '</strong></td>
			</tr>';
			}
		}
		$output .= '<tr >
		<th scope="row" style="vertical-align:middle;">PROGRAM</th>';
		foreach($faq as $k=>$v) {
			$total = $faq[$k]['prod'] + $faq[$k]['good'] + $faq[$k]['repair'] + $faq[$k]['pm'] + $faq[$k]['qual'] + $faq[$k]['endOfLife'];
			if ($faq[$k]['category'] == "PROGRAM"){
				$output .= '
				<td class=""><strong>' . $faq[$k]['line'] . '</strong></td>
				<td class="alert-success">' . $faq[$k]['prod'] . '</td>
				<td class="alert-primary">' . $faq[$k]['good'] . '</td>
				<td class="alert-danger">' . $faq[$k]['repair'] . '</td>
				<td class="alert-info">' . $faq[$k]['pm'] . '</td>
				<td class="alert-warning">' . $faq[$k]['qual'] . '</td>
				<td class="alert-warning">' . $faq[$k]['eng'] . '</td>
				<td class="alert-dark">' . $faq[$k]['endOfLife'] . '</td>
				<td class="alert-dark">' . $faq[$k]['scrap'] . '</td>
				<td class=""><strong>' . $total . '</strong></td>
			</tr>';
			}
		}
		$output .= '<tr >
		<th scope="row" rowspan="2" style="vertical-align:middle;">METAL / VESPEL COLLET</th>';
		foreach($faq as $k=>$v) {
			$total = $faq[$k]['prod'] + $faq[$k]['good'] + $faq[$k]['repair'] + $faq[$k]['pm'] + $faq[$k]['qual'] + $faq[$k]['endOfLife'];
			if ($faq[$k]['category'] == "COLLET"){
				$output .= '
				<td class=""><strong>' . $faq[$k]['line'] . '</strong></td>
				<td class="alert-success">' . $faq[$k]['prod'] . '</td>
				<td class="alert-primary">' . $faq[$k]['good'] . '</td>
				<td class="alert-danger">' . $faq[$k]['repair'] . '</td>
				<td class="alert-info">' . $faq[$k]['pm'] . '</td>
				<td class="alert-warning">' . $faq[$k]['qual'] . '</td>
				<td class="alert-warning">' . $faq[$k]['eng'] . '</td>
				<td class="alert-dark">' . $faq[$k]['endOfLife'] . '</td>
				<td class="alert-dark">' . $faq[$k]['scrap'] . '</td>
				<td class=""><strong>' . $total . '</strong></td>
			</tr>';
			}
		}
		$output .= '<tr >
		<th scope="row" style="vertical-align:middle;">SPANKER</th>';
		foreach($faq as $k=>$v) {
			$total = $faq[$k]['prod'] + $faq[$k]['good'] + $faq[$k]['repair'] + $faq[$k]['pm'] + $faq[$k]['qual'] + $faq[$k]['endOfLife'];
			if ($faq[$k]['category'] == "SPANKER"){
				$output .= '
				<td class=""><strong>' . $faq[$k]['line'] . '</strong></td>
				<td class="alert-success">' . $faq[$k]['prod'] . '</td>
				<td class="alert-primary">' . $faq[$k]['good'] . '</td>
				<td class="alert-danger">' . $faq[$k]['repair'] . '</td>
				<td class="alert-info">' . $faq[$k]['pm'] . '</td>
				<td class="alert-warning">' . $faq[$k]['qual'] . '</td>
				<td class="alert-warning">' . $faq[$k]['eng'] . '</td>
				<td class="alert-dark">' . $faq[$k]['endOfLife'] . '</td>
				<td class="alert-dark">' . $faq[$k]['scrap'] . '</td>
				<td class=""><strong>' . $total . '</strong></td>
			</tr>';
			}
		}
	}else{
		$output .= '
		<tr style="cursor: pointer;">
			<td colspan="4" class="text-center bg-warning"><strong>EMPTY RESULTS<strong></td>
		</tr>';
	}

$output .= '</tbody>
</table>';
if(!empty($perpageresult)) {
// $output .= '<nav aria-label="..."><ul class="pagination">' . $perpageresult . '</ul></nav>';
}
print $output;
?>
