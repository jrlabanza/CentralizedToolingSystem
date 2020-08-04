<?php
// require('../dbcon/dbcon.php');
require('../../frameworks/ajaxConn.php');
//
if($_POST['id']){
	$id=$_POST['id'];
	$filter = explode("|", $id);

	$sql = 'DELETE FROM loadboard WHERE id="'.$filter[0].'"';

	if (mysqli_query($conn, $sql)) {
		 echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
	} else {
		 echo "Error updating record: " . mysqli_error($conn);
	}

mysqli_close($conn);
}
?>
