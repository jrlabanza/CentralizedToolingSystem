<?php

$serverName = "phsm01ws011";
$username = "web3";
$password = "web3";
$database = "p1_equipt_db";

$conn = new mysqli($serverName, $username, $password, $database);

    $result = $conn->query("SELECT TesterID FROM testers");

    while ($row = $result->fetch_assoc()) {
			echo '<option value="'. $row['TesterID'] .'">'.$row['TesterID'].'</option>';
	}
   mysqli_close($conn);


?>