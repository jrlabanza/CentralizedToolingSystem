<?php
// require('../dbcon/dbcon.php');
require('../../frameworks/ajaxConn.php');
date_default_timezone_set("Asia/Manila");
$datetime = date("Y-m-d H:i:s");
//
if($_POST['id']){
	$id=$_POST['id'];
	$result = $conn->query('SELECT * FROM program WHERE serial_id LIKE "%'.$id.'%" OR family LIKE "%'.$id.'%" OR lb_id LIKE "%'.$id.'%" OR status LIKE "%'.$id.'%" OR tst_pf LIKE "%'.$id.'%" OR tester_id LIKE "%'.$id.'%" OR loc LIKE "%'.$id.'%" OR handler_id LIKE "%'.$id.'%" OR line LIKE "%'.$id.'%"');
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
			<td class='lbID'>" . $row['lb_id'] . "</td>
			<td class='fam'>" . $row['family'] . "</td>
			<td class='nplus'>" . $row['n_plus'] . "</td>
			<td class='tst'>" . $row['tst_pf'] . "</td>
			<td class='stats'>" . $status . "</td>
			<td class='tstID'>" . $row['tester_id'] . "</td>
			<td class='hdID'>" . $row['handler_id'] . "</td>
			<td class='loc'>" . $row['loc'] . "</td>
			<td class='strg'>" . $row['storage'] . "</td>
			<td class='ven'>" . $row['vendor'] . "</td>
			<td class=''>" . $row['remarks'] . "</td>
			<td class=''>". $row['main_board_1'] ."</td>
			<td class=''>". $row['main_board_2'] ."</td>
			<td class='line'>" . $row['line'] . "</td>
			<td class='updated'>" . $row['last_update'] . "</td>
			</tr>";
		}
}
mysqli_close($conn);
?>
