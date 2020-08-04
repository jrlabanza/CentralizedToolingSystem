<?php
// require('../dbcon/dbcon.php');
require('../../frameworks/ajaxConn.php');
date_default_timezone_set("Asia/Manila");
$datetime = date("Y-m-d H:i:s");
//

if($_POST['id']){
	$id=$_POST['id'];
	$result = $conn->query('SELECT * FROM tstpartstrck WHERE itm_nm LIKE "%'.$id.'%" OR dscrptn LIKE "%'.$id.'%" OR vendor LIKE "%'.$id.'%" OR mchn_type LIKE "%'.$id.'%" OR 
	mchn_model LIKE "%'.$id.'%" OR prt_no LIKE "%'.$id.'%" OR srl_no LIKE "%'.$id.'%" OR status LIKE "%'.$id.'%" OR lction LIKE "%'.$id.'%" OR 
	remarks LIKE "%'.$id.'%" OR prson LIKE "%'.$id.'%" OR installedTo LIKE "%'.$id.'%"');
	while ($row = $result->fetch_assoc()) {

    $status = $row['status'];
			$style = 'class="style="cursor: pointer;"';

			if ($row["status"] == "OUT"){}
			else{
				echo "<tr ".$style." data-tester-parts='$row[id]' data-current-quantity='$row[quantity]'>
				<td class='itm_nm'>$row[itm_nm]</td>
				<td class='quantity'>$row[quantity]</td>
				<td class='dscrptn'>$row[dscrptn]</td>
				<td class='prt_no'>$row[prt_no]</td>
				<td class='srl_no'>$row[srl_no]</td>
				<td class='vendor'>$row[vendor]</td>
				<td class='mchn_model'>$row[mchn_model]</td>
				<td class='status'>$row[status]</td>
				<td class='lction'>$row[lction]</td>
				<td class='remarks'>$row[remarks]</td>
				<td class='installedTo'>$row[installedTo]</td>
				<td class='prson'>$row[prson]</td>
				<td class='date_time'>$row[date_time]</td>
		  </tr>";

			}

	  
		}
}
mysqli_close($conn);
?>
