<?php
$pizza = $_POST['pizza'];

$serverName = "phsm01ws012";
$username = "cents";
$password = "cents_user01";
$database = "cents";

$conn = new mysqli($serverName, $username, $password, $database);
	
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

$query = "SELECT dut_board_name from pizza_dut WHERE dut_board_name = '$pizza'";
$result = $conn-> query($query);

echo json_encode(get_Array($result));

?>