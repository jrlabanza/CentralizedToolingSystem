<?php
require('../frameworks/ajaxConn.php');
//

	echo '<option value="N/A">N/A</option>';
	// $result = $connMchnList->query('SELECT Equipt_ID FROM testers ORDER BY Equipt_ID ASC');SELECT Equipt_ID FROM testers WHERE tst_pf="WL25V" ORDER BY Equipt_ID ASC
	$result = $connMchnList->query('SELECT Equipt_ID FROM equipt_list ORDER BY Equipt_ID ASC');
	while ($row = $result->fetch_assoc()) {
		echo '<option value="'.$row['Equipt_ID'].'">'.$row['Equipt_ID'].'</option>';
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
