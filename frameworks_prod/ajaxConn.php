<?php
session_start();

$servername = "phsm01ws012";
$username = "cents";
$password = "cents_user01";
// $servername = "localhost";
// $username = "root";
// $password = "root_admin01";
$dbname="cents";
//
// try {
//     $conn = new PDO("mysql:host=$servername;dbname=cents", $username, $password);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     //echo "Connected successfully";
//     }
// catch(PDOException $e)
//     {
//     echo "Connection failed: " . $e->getMessage();
//     }
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
     // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
	
$machineServername = "phsm01ws011";
$machineUsername = "web3";
$machinePassword = "web3";
$machineDB="p1_equipt_db";

    $connMchnList = new mysqli($machineServername, $machineUsername, $machinePassword, $machineDB);
     // Check connection
      if ($connMchnList->connect_error) {
        die("Connection failed: " . $connMchnList->connect_error);
    }

$assyServername = "phsm01ws013";
$assyUsername = "automation";
$assyPassword = "automation_APPs2017!";
$assyEqpDB="promis_assy";

    $connMchnAssyList = new mysqli($assyServername, $assyUsername, $assyPassword, $assyEqpDB);
     // Check connection
      if ($connMchnAssyList->connect_error) {
        die("Connection failed: " . $connMchnAssyList->connect_error);
    }

$userServername = "phsm01ws012";
$userUsername = "usercheecker";
$userPassword = "usercheecker01";
$userDB="userlookup";

    $connUserList = new mysqli($userServername, $userUsername, $userPassword, $userDB);
        // Check connection
        if ($connUserList->connect_error) {
        die("Connection failed: " . $connUserList->connect_error);
    }
?>
