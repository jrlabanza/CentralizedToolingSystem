<?php
require('../../frameworks/ajaxConn.php');
date_default_timezone_set("Asia/Manila");
$dates=(date("y.m.d Hi "));
$lastUpdate = date("y/m/d H:i");

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
            $srid = $_POST['srid'];
            //$lb_id = $_POST['lbid'];
            $family = $_POST['family'];
            $tst_pf = $_POST['tstPf'];
            $tstID = $_POST['tstID'];
            $hdID = $_POST['hdID'];
            $status = $_POST['status'];
            $loc = $_POST['loc'];
            $storage = $_POST['storage'];
            $line = $_POST['line'];
            //$vendor = $_POST['vendor'];
            $track = $_POST['track'];
            $borrower = $_POST['borrower'];
            $remarks = $_POST['remarks'];
            //$clerk = $_POST['clerk'];
            //$db = Db::getInstance();

            $conn->query("UPDATE test_stand set status='".$status."',tester_id='".$tstID."',handler_id='".$hdID."', loc='".$loc."', remarks='".$remarks."', last_update='".$lastUpdate."' WHERE serial_id = '".$srid."'");

            $conn->query("INSERT INTO test_stand_history (serial_id, family, tst_pf, status, tester_id, handler_id, hd_pf, loc, rack, line, vendor, sFile, client, clerk, remarks) 
            SELECT serial_id, family, tst_pf, status, tester_id, handler_id, hd_pf, loc, rack, line, vendor, sFile, '".$borrower."','".$_SESSION['userEmail']."',remarks FROM test_stand WHERE serial_id = '".$srid."'");

            //header('Location: ?controller=pages&action=trkLB');
            mysqli_close($conn);
?>