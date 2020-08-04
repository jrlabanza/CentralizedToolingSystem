<?php
session_start();
require('../../frameworks/ajaxConn.php');
date_default_timezone_set("Asia/Manila");

$dates=(date("y.m.d Hi "));

// $spID = $_POST["spID"];
$status = $_POST["status"];

if($status == "IN"){
    $quantity = $_POST["current-quantity"] + $_POST["quantity"];
}
else if($status == "OUT"){
    $quantity = $_POST["current-quantity"] - $_POST["quantity"];
}

$description = $_POST["description"];
$parts_code = $_POST["parts_code"];
$maker = $_POST["maker"];
$client = $_POST["client"];

$location = $_POST["location"];
$machine = $_POST["machine"];
$remarks = $_POST["remarks"];
$custodian = $_SESSION['userEmail'];

$checkLineQuery = "SELECT line from spare_parts WHERE (parts_code = '$parts_code' AND location = '$location') AND isDeleted = 0";
$checkLineRes = $conn->query($checkLineQuery);

while ($row1 = $checkLineRes->fetch_assoc())
{
    $lineCheck = $row1['line'];
}

if($_SESSION['line'] != $lineCheck && $status == "IN"){
    echo "<script type='text/javascript'>alert('UNAUTHORIZED ACTION! AREA MISMATCH FOUND!');</script>";
}
else{
    if($_POST["current-quantity"] == ""){
        echo "<script type='text/javascript'>alert('RACK AND PARTS CODE DOES NOT EXIST');</script>";
    }
    else if($machine == "" && $status == "OUT"){
        echo "<script type='text/javascript'>alert('PLEASE INPUT MACHINE');</script>";
    }
    else{
    
        $updateSQL ="UPDATE spare_parts set current_qty='$quantity',status ='$status',personnel='$client',custodian='$custodian', remarks='$remarks' WHERE location = '$location' AND parts_code = '$parts_code'";
    
        $insertSQL = "INSERT INTO spare_parts_history(description,parts_code,current_qty,maker,personnel,machine,remarks,date_updated,status,custodian,location) VALUES('$description','$parts_code','$quantity','$maker','$client','$machine','$remarks',current_timestamp,'$status','$custodian','$location')";
        
        $conn->query($updateSQL);
        
        $conn->query($insertSQL);
        //header('Location: ?controller=pages&action=trkLB');
    
        echo "<script type='text/javascript'>location.reload();</script>";
        mysqli_close($conn);
    }
}


?>