<?php
require('../../frameworks/ajaxConn.php');
date_default_timezone_set("Asia/Manila");
$dates=(date("y.m.d Hi "));

if(!empty($_FILES)){
    if(is_uploaded_file($_FILES['sfile']['tmp_name'])){
        sleep(1);
        $source_path = $_FILES['sfile']['tmp_name'];
        $fileName=$dates.$_FILES['sfile']['name'];
        $fileName = preg_replace("/[^a-zA-Z0-9.]/", "_", $fileName);
        $target_path = 'uploads/' . $fileName;
        if(move_uploaded_file($source_path, '../../uploads/'.$fileName)){
            // echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record successfully save</b></div>';
        }
    }
}

if(empty($fileName)){
    $fileName = '';
}

    $moldChaseNo = $_POST['moldChaseNo'];
    $package = $_POST['package'];
    $moldDieID = $_POST['moldDieID'];
    $die_model = $_POST['dieModel'];
    $vendor = $_POST['vendor'];
    $client = $_POST['client'];
    $machineModel = $_POST['machineModel'];
    $machineID = $_POST['machineID'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];
    $line = $_POST['line'];
    $loc = $_POST['loc'];

    //$clerk = $_POST['clerk'];
    date_default_timezone_set("Asia/Manila");
    $dates=(date("y.m.d H:i"));

    // $folder="uploads/";
    // $imagename=$_FILES['sfile']['name'];
    // if ($imagename == ""){
    // }else{
    //   $file_name = preg_replace("/[^a-zA-Z0-9.]/", "", $dates.$imagename);
    //   move_uploaded_file($_FILES['sfile']['tmp_name'], "$folder".$file_name);
    // }

    $conn->query("UPDATE mc set status='".$status."',machine_id='".$machineID."',loc='".$loc."',remarks='".$remarks."',sFile='".$fileName."' WHERE serial_id = '".$moldChaseNo."'");

    $conn->query("INSERT INTO mc_history(serial_id,package,mold_die_id,die_model,machine_pf,machine_id,status,remarks,clerk,client,line,vendor,loc,sFile)
    VALUES('".$moldChaseNo."','".$package."','".$moldDieID."','".$die_model."','".$machineModel."','".$machineID."','".$status."','".$remarks."','".$_SESSION['userEmail']."','".$client."','".$line."','".$vendor."','".$loc."','".$fileName."')");
    
    mysqli_close($conn);
?>