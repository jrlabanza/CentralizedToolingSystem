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
            echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record successfully save</b></div>';
        }
    }
}

if(empty($fileName)){
    $fileName = '';
}

    $serialID = $_POST['serialID'];
    $pckgType = $_POST['pckgType'];
    $prtNo = $_POST['prtNo'];
    $dut_req = $_POST['dutReq'];
    $material = $_POST['material'];
    $vendor = $_POST['vendor'];
    $gsCode = $_POST['gsCode'];
    $tst_pf = $_POST['tstPf'];
    $hdPf = $_POST['hdPf'];
    $mShot = $_POST['mShot'];
    $line = $_POST['line'];
    $storage = $_POST['storage'];

    $client = $_POST['client'];
    $tstID = $_POST['tstID'];
    $hdID = $_POST['hdID'];
    $status = $_POST['status'];
    $loc = $_POST['loc'];
    $shotCnt = $_POST['shotCnt'];     

    $remarks = $_POST['remarks'];

    $crrntShotCnt = $_POST['crrntShotCnt'];
    $shotCnt += $crrntShotCnt;

    if ($resetCount == "0"){
        $shotCnt = 0;
    }

    //$clerk = $_POST['clerk'];


    // $db = Db::getInstance();

    $conn->query("UPDATE wp set status='".$status."',tester_id='".$tstID."',handler_id='".$hdID."',loc='".$loc."',shot_count='".$shotCnt."',remarks='".$remarks."',sFile='".$fileName."' WHERE serial_id = '".$serialID."'");

    $conn->query("INSERT INTO wp_history(serial_id, package_type, part_no, dut_req, material, status, tst_model, tester_id, hd_model, handler_id, loc, rack, shot_count, max_shot_count, line, vendor, client, clerk, sFile, remarks, gs_code) 
    VALUES ('".$serialID."', '".$pckgType."', '".$prtNo."', '".$dut_req."', '".$material."', '".$status."', '".$tst_pf."', '".$tstID."', '".$hdPf."', '".$hdID."', '".$loc."', '".$rack."', '".$shotCnt."', '".$mShot."', '".$line."', '".$vendor."', '".$client."', '".$_SESSION['userEmail']."', '".$fileName."', '".$remarks."', '".$gsCode."')");

    // header('Location: ?controller=pages&action=socketPagination');
mysqli_close($conn);
?>