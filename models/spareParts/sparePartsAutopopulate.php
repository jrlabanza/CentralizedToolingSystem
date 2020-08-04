<?php

require('../../frameworks/ajaxConn.php');
date_default_timezone_set("Asia/Manila");

$rack = $_POST['rack'];
$parts_code = $_POST['parts_code'];

//$conn = new mysqli($serverName, $username, $password, $database);
	
mysqli_set_charset($conn, 'utf8');
date_default_timezone_set("Asia/Manila");


function get_Array($result){
	$data = array();

	if (is_object($result) && !empty($result->num_rows)) {
		while ($row = $result->fetch_assoc()) {
			foreach($row as $col => $value){
				$data[$col] = $value;
			}
		}
		$result->free();
	}

	return $data;
}

$query = "SELECT * from spare_parts WHERE (parts_code = '$parts_code' AND location = '$rack') AND isDeleted = 0";
$result = $conn-> query($query);

echo json_encode(get_Array($result));

?>