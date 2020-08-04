<?php
// require('../dbcon/dbcon.php');
require('../../frameworks/ajaxConn.php');
date_default_timezone_set("Asia/Manila");
$datetime = date("Y-m-d H:i:s");
//
if($_POST['id']){
	$id=$_POST['id'];
	$result = $conn->query('SELECT * FROM ck WHERE serial_id LIKE "%'.$id.'%" OR category LIKE "%'.$id.'%" OR handler_id LIKE "%'.$id.'%" OR status LIKE "%'.$id.'%" OR 
	handler_pf LIKE "%'.$id.'%" OR tester_id LIKE "%'.$id.'%" OR tester_pf LIKE "%'.$id.'%" OR storage LIKE "%'.$id.'%" OR package_type LIKE "%'.$id.'%" OR 
	size LIKE "%'.$id.'%" OR ckResult LIKE "%'.$id.'%" OR remarks LIKE "%'.$id.'%" OR line LIKE "%'.$id.'%"');
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
      
			echo "<tr ".$style." data-change-kit=". $row['id'] .">
				<td class='srID'>$row[serial_id]</td>
				<td class='cat'>$row[category]</td>
				<td class='tst'>$row[handler_id]</td>
				<td class='hdPF'>$row[handler_pf]</td>
				<td class='tst'>$row[tester_id]</td>
				<td class='tst'>$row[tester_pf]</td>
				<td class='strg'>$row[storage]</td>
				<td class='pkgType'>$row[package_type]</td>
				<td class='stats'>$row[status]</td>
				<td class='size'>$row[size]</td>
				<td class='ckResult'>$row[ckResult]</td>
				<td class=''>$row[remarks]</td>
				<td class='line'>$row[line]</td>
	  </tr>";
	  
		}
}
mysqli_close($conn);
?>
