<?php
$cid = $_POST['cid'];

$serverName = "phsm01ws012";
$username = "usercheecker";
$password = "usercheecker01";
$database = "userlookup";

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

$query = "SELECT firstName, lastName from employeeinfos WHERE cidNum = $cid";
$result = $conn-> query($query);

echo json_encode(get_Array($result));

?>
