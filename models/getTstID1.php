<?php
require('../frameworks/ajaxConn.php');
//
// echo '<select id="getTstID" name="tstID" onchange="showfield(this.options[this.selectedIndex].value)" type="text" class="form-control mb-2" required="">';
// echo '<select id="getTstID" name="tstID" type="text" class="form-control mb-2" required="">';
// if(empty($_POST['id']) || $_POST['id'] == 'ANY' || $_POST['id'] == 'ALL TESTERS'){
// 	echo '<option value="N/A">N/A</option>';
// 	$result = $conn->query('SELECT tester_id,current_lb,max_lb FROM testers');
// 	while ($row = $result->fetch_assoc()) {
// 		// $tstID=$row['tester_id'];
// 		// $current_lb = $row['current_lb'];
// 		// $maxLB=$row['max_lb'];
// 		echo '<option value="'.$tstID.'">'.$tstID.'</option>';
// 	}
// }else{
// 	$id=$_POST['id'];
// 	echo '<option value="N/A">N/A</option>';
// 	$result = $conn->query('SELECT tester_id,current_lb,max_lb FROM testers WHERE tst_pf="'.$id.'"');
// 	while ($row = $result->fetch_assoc()) {
// 		$tstID = $row['tester_id'];
// 		$current_lb = $row['current_lb'];
// 		$maxLB = $row['max_lb'];

// 		// if($current_lb == $maxLB){
// 		// 	echo '<option value="'.$tstID.'" disabled style="background-color: #cccccc;">'.$tstID." MAX OUT".'</option>';
// 		// }else{
// 			echo '<option value="'.$tstID.'">'.$tstID.'</option>';
// 		//}
// 	}
// }

echo '<select id="getTstID" name="tstID" type="text" class="form-control mb-2" required="">';
if(empty($_POST['id']) || $_POST['id'] == 'ANY' || $_POST['id'] == 'N/A' || $_POST['id'] == 'NA'){
	echo $connMchnList;
	echo '<option value="N/A">N/A</option>';
	
	// $result = $connMchnList->query('SELECT tester_id FROM testers ORDER BY tester_id ASC');SELECT tester_id FROM testers WHERE tst_pf="WL25V" ORDER BY tester_id ASC
	$result = $connMchnList->query('SELECT tester_id FROM testers WHERE cents_pf="ALL TESTER" ORDER BY tester_id ASC');
	while ($row = $result->fetch_assoc()) {
		echo '<option value="'.$row['tester_id'].'">'.$row['tester_id'].'</option>';
	}
}else{
	$id=$_POST['id'];
	echo '<option value="N/A">N/A</option>';
	$result = $connMchnList->query('SELECT tester_id FROM testers WHERE cents_pf="'.$id.'" ORDER BY tester_id ASC');
	
	$count = $row->rowCount();

	if ($count > 0){
		while ($row = $result->fetch_assoc()) {
			echo '<option value="'.$row['tester_id'].'">'.$row['tester_id'].'</option>';
		}
	}else{
		$result = $connMchnList->query('SELECT tester_id FROM testers WHERE cents_pf="ALL TESTER" ORDER BY tester_id ASC');
		while ($row = $result->fetch_assoc()) {
			echo '<option value="'.$row['tester_id'].'">'.$row['tester_id'].'</option>';
		}
	}
}

echo '</select>';
mysqli_close($connMchnList);
?>