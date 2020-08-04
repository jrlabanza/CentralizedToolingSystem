<?php
session_start();
require('../../frameworks/ajaxConn.php');
date_default_timezone_set("Asia/Manila");

$dates=(date("y.m.d Hi "));

$rcID = $_POST["rcID"];
$quantity = $_POST["current-quantity"] - $_POST["quantity"];
$installedTo = $_POST["installedTo"];
$rubber_tip = $_POST["rubber-tip"];
$package = $_POST["package"];
$box = $_POST["box"];
$machine_model = $_POST["machine-model"];
$line = $_POST["line"];
$client = $_POST["client"];
$machine_id = $_POST["machine-id"];
$status = $_POST["status"];
$location = $_POST["location"];
$remarks = $_POST["remarks"];
$custodian = $_SESSION['userEmail'];



$updateSQL ="UPDATE rubber_collet set quantity='$quantity',status ='$status',client='$client',custodian='$custodian', remarks='$remarks', transaction_date=current_timestamp WHERE id = '$rcID'";

$insertSQL = "INSERT INTO rubber_collet_history(rubber_tip_no,package,box,mchn_model,mchn_id,status,lction,quantity,line,transaction_date,client,custodian,remarks) VALUES('$rubber_tip','$package','$box','$machine_model','$machine_id','$status','$location','$quantity','$line',current_timestamp,'$client','$custodian','$remarks')";

$conn->query($updateSQL);

$conn->query($insertSQL);
//header('Location: ?controller=pages&action=trkLB');
mysqli_close($conn);
?>