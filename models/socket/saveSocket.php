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

    $socketid = $_POST['socketid'];
    $family = $_POST['family'];
    // $dut_req = $_POST['dutReq'];
    $tst_pf = $_POST['tstPf'];
    $tstID = $_POST['tstID'];
    $hdID = $_POST['hdID'];
    $status = $_POST['status'];
    $loc = $_POST['loc'];
    $storage = $_POST['storage'];
    $line = $_POST['line'];
    $vendor = $_POST['vendor'];
    $track = $_POST['track'];
    $client = $_POST['client'];

    $gsCode = $_POST['gsCode'];
    $pckgType = $_POST['pckgType'];
    $prtNo = $_POST['prtNo'];
    $pinType = $_POST['pinType'];
    $pinCnt = $_POST['pinCnt'];
    $mShot = $_POST['mShot'];
    $crrntShotCnt = $_POST['crrntShotCnt'];
    $shotCnt = $_POST['shotCnt'];
    $site = $_POST['site'];
    $remarks = $_POST['remarks'];
    $resetCount = $_POST['changePin'];

    $shotCnt += $crrntShotCnt;

    if ($resetCount == "0"){
        $shotCnt = 0;
    }

    //$clerk = $_POST['clerk'];


    // $db = Db::getInstance();

    $conn->query("UPDATE socket set status='".$status."',tester_id='".$tstID."',handler_id='".$hdID."',loc='".$loc."',shotcount='".$shotCnt."',site='".$site."',remarks='".$remarks."',sFile='".$fileName."' WHERE socket_id = '".$socketid."'");

    $conn->query("INSERT INTO socket_history(socket_id,family,package_type,part_no,tst_pf,status,tester_id,handler_id,loc,storage,vendor,line,pin_type,pin_count,shotcount,max_shotcount,site,gs_code,remarks,sFile,client,clerk)
    VALUES('".$socketid."','".$family."','".$pckgType."','".$prtNo."','".$tst_pf."','".$status."','".$tstID."','".$hdID."','".$loc."','".$storage."','".$vendor."','".$line."','".$pinType."','".$pinCnt."','".$shotCnt."','".$mShot."','".$site."','".$gsCode."','".$remarks."','".$fileName."','".$client."','".$_SESSION['userEmail']."')");

    // header('Location: ?controller=pages&action=socketPagination');
            mysqli_close($conn);
?>