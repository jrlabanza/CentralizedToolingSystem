<?php
// require('../dbcon/dbcon.php');
require('../../frameworks/ajaxConn.php');
date_default_timezone_set("Asia/Manila");
$datetime = date("Y-m-d H:i:s");
$rackLoc = "";
//

if($_POST['id']){
	$id=$_POST['id'];
	$result = $conn->query('SELECT DISTINCT description, parts_code, uploadImage, maker FROM spare_parts WHERE (description LIKE "%'.$id.'%" OR parts_code LIKE "%'.$id.'%" OR updated_qty LIKE "%'.$id.'%" OR 
	maker LIKE "%'.$id.'%") AND isDeleted = 0');
	while ($row = $result->fetch_assoc()) {
			$totalQuantityQuery = "SELECT SUM(current_qty) AS overall FROM spare_parts WHERE parts_code ='". $row['parts_code'] ."' AND isDeleted = 0";
			$totalQuantityRes = $conn->query($totalQuantityQuery);
			$rackLocationQuery = "SELECT DISTINCT location FROM spare_parts WHERE parts_code ='". $row['parts_code'] ."' AND isDeleted = 0";
			$rackLocationRes = $conn->query($rackLocationQuery);
	
			while ($row1 = $totalQuantityRes->fetch_assoc())
			{
				$overall = $row1['overall'];
			}

			while ($row2 = $rackLocationRes->fetch_assoc())
			{
				$rackLoc .= $row2['location']."<br>";
			}
			$style = 'class="style="cursor: pointer;"';

			// if ($row["status"] == "OUT"){}
			// else{
				if($row['uploadImage'] == "")
				{
					$imageUpload = "noimage.jpg"; 
				}
				else{
					$imageUpload = $row['uploadImage'];
				}
				echo '<tr>
				<td class="image"><a href="uploads/spareParts/'. $imageUpload  .'" target="_blank"><img class="img-responsive" src="uploads/spareParts/'. $imageUpload .'" style="width:100%"></a> </td>
				<td class="parts_code">' . $row['parts_code'] . '</td>
				<td class="location">' . $rackLoc . '</td>
				<td class="curret_qty">' . $overall . '</td>
				<td class="description">' . $row['description'] . '</td>
				<td class="maker">' . $row['maker'] . '</td>
			</tr>';
			$rackLoc = "";	
			// }

	  
		}
}
mysqli_close($conn);
?>
