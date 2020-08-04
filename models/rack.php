<?php
$serverName = "phsm01ws012";
$username = "cents";
$password = "cents_user01";
$database = "cents";

$parts_code = $_POST["parts_code"];

$conn = new mysqli($serverName, $username, $password, $database);

   if(isset($parts_code)){
      $result = $conn->query("SELECT DISTINCT(location) FROM spare_parts WHERE parts_code = '".$parts_code."'");
   }
   else{
      $result = $conn->query("SELECT DISTINCT(location) FROM spare_parts");
   }

    while ($row = $result->fetch_assoc()) {
			echo '<option value="'. $row['location'] .'">'.$row['location'].'</option>';
	}
   mysqli_close($conn);


?>