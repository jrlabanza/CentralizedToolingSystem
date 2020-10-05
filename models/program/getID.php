<?php
// require('../dbcon/dbcon.php');
require('../../frameworks/ajaxConn.php');
date_default_timezone_set("Asia/Manila");
$datetime = date("Y-m-d H:i:s");
//
if($_POST['id']){
	$id=$_POST['id'];
	$result = $conn->query('SELECT * FROM program WHERE serial_id LIKE "%'.$id.'%" OR pkg_type LIKE "%'.$id.'%" OR fam_name LIKE "%'.$id.'%" OR test_type LIKE "%'.$id.'%" OR tester_name LIKE "%'.$id.'%" OR program LIKE "%'.$id.'%" OR status LIKE "%'.$id.'%" OR loc LIKE "%'.$id.'%" OR storage LIKE "%'.$id.'%" OR line LIKE "%'.$id.'%"');
	while ($row = $result->fetch_assoc()) {

    $status = $row['status'];

			$dateTransact = new DateTime($row['last_update']);
			$dateToday = new DateTime($datetime);
			$dateDif = $dateToday->diff($dateTransact);//;
			//$dueDate = $dateDif->format('%a days %h hours');
			$dueDate = $dateDif->format('%a');

			// if ($dateToday >= $dateTransact){ // red
			// 	$style = 'style="cursor: pointer; color: white;" class="bg-danger"';
			// }else if ($dueDate <= 30){ // yellow
			// 	$style = 'style="cursor: pointer; background-color: #ffff80;"';
			// }else{
			//  	$style = 'class="style="cursor: pointer;"';
			// }
			$style = 'class="style="cursor: pointer;"';
			
			if ($status == "OUT-REPAIR" || $status == "OUT-ENGG"){
				if ($dueDate >= 1){ // yellow
					$style = 'style="cursor: pointer; color: white;" class="bg-danger"';
				}
			 }

			 if($row['uploadImage'] == "")
			 {
				 $imageUpload = "noimage.jpg"; 
			 }
			 else{
				 $imageUpload = $row['uploadImage'];
			 }
      
			echo "<tr ".$style.">
			<td class='image'><a href='uploads/program/". $imageUpload  ." target='_blank'><img class='img-responsive' src='uploads/program/". $imageUpload ." style='width:100%'></a> </td>
			<td class='srID'>" . $row['serial_id'] . "</td>
			<td class='disc_no'>" . $row['disc_no'] . "</td>
			<td class='pkg_type'>" . $row['pkg_type'] . "</td>
			<td class='fam_name'>" . $row['fam_name'] . "</td>
			<td class='test_type'>" . $row['test_type'] . "</td>
			<td class='tester_name'>" . $row['tester_name'] . "</td>
			<td class='handler_id'>" . $row['handler_id'] . "</td>
			<td class='program'>". $row['program'] ."</td>
			<td class='stats'>" . $status . "</td>
			<td class='loc'>" . $row['loc'] . "</td>
			<td class='strg'>" . $row['storage'] . "</td>
			<td class=''>" . $row['remarks'] . "</td>
			<td class='line'>" . $row['line'] . "</td>
			<td class='updated'>" . $row['last_update'] . "</td>
			</tr>";
		}
}
mysqli_close($conn);
?>
