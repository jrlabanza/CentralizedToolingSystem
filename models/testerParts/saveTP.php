<?php
session_start();
require('../../frameworks/ajaxConn.php');
date_default_timezone_set("Asia/Manila");

$dates=(date("y.m.d Hi "));

$tpID = $_POST["tpID"];
$installedTo = $_POST["installedTo"];
$prson = $_SESSION['userEmail'];
$remarks = $_POST["remarks"];
$itm_nm = $_POST["itm_nm"];
$dcsrptn = $_POST["dscrptn"];
$vendor = $_POST["vendor"];
$mchn_model = $_POST["mchn_model"];
$prt_no = $_POST["prt_no"];
$srl_no = $_POST["srl_no"];
$status = $_POST["status"];
$lction = $_POST["lction"];

if($status == "IN"){
    $quantity = $_POST["current-quantity"] + $_POST["quantity"];
}
else if($status == "OUT"){
    $quantity = $_POST["current-quantity"] - $_POST["quantity"];
}

$previous_quantity = $_POST["quantity"];

$updateSQL ="UPDATE tstpartstrck set quantity='$quantity',installedTo='$installedTo',prson='$prson', remarks='$remarks', date_time=current_timestamp WHERE id = '$tpID'";

$insertSQL = "INSERT INTO tstpartstrck_history(itm_nm,dscrptn,vendor,mchn_model,prt_no,srl_no,status,lction,prson,date_time,quantity,installedTo) VALUES('$itm_nm','$dcsrptn','$vendor','$mchn_model','$prt_no','$remarks','$status','$lction','$prson',current_timestamp,'$previous_quantity','$installedTo')";

$conn->query($updateSQL);

$conn->query($insertSQL);
//header('Location: ?controller=pages&action=trkLB');
mysqli_close($conn);
?>