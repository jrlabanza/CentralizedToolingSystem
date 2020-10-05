<?php
// require('../dbcon/dbcon.php');
require('../../frameworks/ajaxConn.php');
//
if($_POST['id']){
	$id=$_POST['id'];
      $result = $conn->query('SELECT * FROM ic WHERE package LIKE "%'.$id.'%" OR lf_name LIKE "%'.$id.'%" OR 
      box_no LIKE "%'.$id.'%" OR insert_sn LIKE "%'.$id.'%" OR clamp_sn LIKE "%'.$id.'%" OR machine_model LIKE "%'.$id.'%" OR machine_id LIKE "%'.$id.'%"');
	while ($row = $result->fetch_assoc()) {

            $status = $row['status'];
            $interval = new DateTime($row['last_update']);
            $interval->add(new DateInterval('P3D'));
            $interval = $interval->format('y:m:d');
            $datetime = date("Y-m-d");

            $dateToday = new DateTime($datetime);
            $dateToday =  $dateToday->format('y:m:d');

            if ($status == 'OUT-PROD'){
                  if ($dateToday >= $interval){ // red
                        //if ($dueDate >= 3){ // red
                              $style = 'style="cursor: pointer; color: white;" class="bg-danger"';
                        //}else{
                              //$style = 'class=""';
                        //}
                  }
            }else{
                  $style = 'class=""';
            }

		echo '<tr '.$style.'>
            <td class="lbID">' . $row['box_no'] . '</td>		
            <td class="srID">' . $row['lf_name'] . '</td>
            <td class="pckgType">' . $row['package'] . '</td>
            <td class="tst">' . $row['machine_model'] . '</td>
            <td class="tstID">' . $row['machine_id'] . '</td>
            <td class="ven">' . $row['dra'] . '</td>
            <td class="pinType">' . $row['insert_sn'] . '</td>
            <td class="prtNo">' . $row['clamp_sn'] . '</td>
            <td class="stats">' . $row['status'] . '</td>

            <td class="loc">' . $row['loc'] . '</td>
            <td class="pinCount">' . $row['out_count'] . '</td>
            <td class="mShotCnt">' . $row['max_shots'] . '</td>

            <td class="ShotCnt">' . $row['shots'] . '</td>
            <td class="">' . $row['remarks'] . '</td>
            <td class="line" hidden>' . $row['line'] . '</td>
            <td class="">' . $row['last_update'] . '</td>
        </tr>';
	}
}
mysqli_close($conn);
?>
