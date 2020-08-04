<?php
require('../frameworks/ajaxConn.php');
//

	echo '<option value="N/A">N/A</option>';
	// $result = $connMchnList->query('SELECT Equipt_ID FROM testers ORDER BY Equipt_ID ASC');SELECT Equipt_ID FROM testers WHERE tst_pf="WL25V" ORDER BY Equipt_ID ASC
	// $result = $connMchnAssyList->query('SELECT Tester_ID FROM testers ORDER BY Tester_ID ASC');
	// while ($row = $result->fetch_assoc()) {
	// 	echo '<option value="'.$row['Tester_ID'].'">'.$row['Tester_ID'].'</option>';
	// }

	If ($_SESSION['line'] == 'QFN-ASSY'){
		$result = $conn->query('SELECT machine_id FROM machine_list WHERE process ="WBOND" ORDER BY machine_id ASC');
		while ($row = $result->fetch_assoc()) {
			echo '<option value="'.$row['machine_id'].'">'.$row['machine_id'].'</option>';
		}
	}else{
		$result = $conn->query('SELECT Tester_ID FROM testers ORDER BY Tester_ID ASC');
		while ($row = $result->fetch_assoc()) {
			echo '<option value="'.$row['Tester_ID'].'">'.$row['Tester_ID'].'</option>';
		}
	}

	// if(empty($_POST['id']) || $_POST['id'] == 'ANY' || $_POST['id'] == 'N/A' || $_POST['id'] == 'NA'){
	// 	echo '<option value="N/A" disabled selected></option>';
	// 	// $result = $connMchnList->query('SELECT Equipt_ID FROM testers ORDER BY Equipt_ID ASC');SELECT Equipt_ID FROM testers WHERE tst_pf="WL25V" ORDER BY Equipt_ID ASC
	// 	$result = $connMchnList->query('SELECT Equipt_ID FROM equipt_list ORDER BY Equipt_ID ASC');
	// 	while ($row = $result->fetch_assoc()) {
	// 		echo '<option value="'.$row['Equipt_ID'].'">'.$row['Equipt_ID'].'</option>';
	// 	}
	// }else{
	// 	$id=$_POST['id'];
	// 	echo '<option value="N/A" disabled selected></option>';
	// 	$result = $connMchnList->query('SELECT Equipt_ID FROM equipt_list WHERE cents_pf="'.$id.'" ORDER BY Equipt_ID ASC');
	
	// 	if (mysqli_num_rows($result) > 	0) {
	// 		while ($row = $result->fetch_assoc()) {
	// 			echo '<option value="'.$row['Equipt_ID'].'">'.$row['Equipt_ID'].'</option>';
	// 		}
	// 	}else{
	// 		$result = $connMchnList->query('SELECT Equipt_ID FROM equipt_list ORDER BY Equipt_ID ASC');
	// 		while ($row = $result->fetch_assoc()) {
	// 			echo '<option value="'.$row['Equipt_ID'].'">'.$row['Equipt_ID'].'</option>';
	// 		}
	// 	}
	
		
	// }

mysqli_close($conn);
?>
