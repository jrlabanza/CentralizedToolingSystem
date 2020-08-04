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

    $nozzlePrtNO = $_POST['nozzlePrtNO'];
    $boxNo = $_POST['boxNo'];
    $package = $_POST['package'];
    // $outCount = $_POST['outCount'];
    $mShot = $_POST['mShot'];
    $crrntShotCnt = $_POST['crrntShotCnt'];
    $shotCnt = $_POST['shotCnt'];
    $borrower = $_POST['borrower'];
    $machineModel = $_POST['machineModel'];
    $machineID = $_POST['machineID'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];
    $line = $_POST['line'];
    $altrntvSocket = $_POST['altrntvSocket'];
    $loc = $_POST['loc'];

    $shotCnt += $crrntShotCnt;

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

    $conn->query("UPDATE chipmount_nozzle set status='".$status."',machine_id='".$machineID."',shots='".$shotCnt."',remarks='".$remarks."',loc='".$loc."' WHERE box_no = '".$boxNo."'");

    $conn->query("INSERT INTO chipmount_nozzle_history (box_no, package, nozzle_partno, altrntv_nozzle, line, machine_model, machine_id, out_count, status, loc, max_shots, shots, remarks, client, clerk) 
            SELECT box_no, package, nozzle_partno, altrntv_nozzle, line, machine_model, machine_id, out_count, status, loc, max_shots, shots, remarks,'$borrower','".$_SESSION['userEmail']."' FROM nozzle WHERE box_no = '".$boxNo."'");
    // $conn->query("INSERT INTO nozzle_history(nozzle_partno,box_no,package,machine_model,machine_id,status,max_shots,shots,remarks,clerk,client,line,altrntv_nozzle,loc)
    // VALUES('".$nozzlePrtNO."','".$boxNo."','".$package."','".$machineModel."','".$machineID."','".$status."','".$mShot."','".$shotCnt."','".$remarks."','".$_SESSION['userEmail']."','".$client."','".$line."','".$altrntvSocket."','".$loc."')");
    
    mysqli_close($conn);
?>