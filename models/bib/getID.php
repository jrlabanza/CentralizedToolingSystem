<?php
// require('../dbcon/dbcon.php');
require('../../frameworks/ajaxConn.php');
//
if($_POST['id']){
	$id=$_POST['id'];
	$result = $conn->query('SELECT * FROM bib WHERE barcode LIKE "%'.$id.'%" OR serial_id LIKE "%'.$id.'%"');
	while ($row = $result->fetch_assoc()) {

      echo "<tr style='cursor: pointer;'>
        <td class='bibBarcode'>$row[barcode]</td>
        <td class='fam'>$row[family]</td>
        <td class='bibID'>$row[bib_id]</td>
				<td class='srID' scope='row'>$row[serial_id]</td>
        <td class='stats'>$row[status]</td>
        <td class='loc'>$row[loc]</td>
        <td class='strg'>$row[storage]</td>
        <td class='line'>$row[line]</td>        
        <td class='date_up'>$row[date_time]</td>
        <td class='updated'>$row[last_update]</td>
        <td class='clerk'>$row[clerk]</td>
        <td class='line'>$row[remarks]</td>
      </tr>";
		}
}
mysqli_close($conn);
?>
