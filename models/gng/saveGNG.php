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
            $srid = $_POST['srid'];
            $family = $_POST['family'];
            $tst_pf = $_POST['tstPf'];
            $tstID = $_POST['tstID'];
            $hdID = $_POST['hdID'];
            $status = $_POST['status'];
            $loc = $_POST['loc'];
            $storage = $_POST['storage'];
            $line = $_POST['line'];
            $vendor = $_POST['vendor'];
            $track = $_POST['track'];
            $borrower = $_POST['borrower'];
            $remarks = $_POST['remarks'];
            $goodQty = $_POST['goodQty'];
            $noGoodQty = $_POST['noGoodQty'];
            //$clerk = $_POST['clerk'];
            //$db = Db::getInstance();

            if (empty($fileName)){
                $conn->query("UPDATE gng set status='".$status."',tester_id='".$tstID."',handler_id='".$hdID."', loc='".$loc."',remarks='".$remarks."',good_qty='".$goodQty."',nogood_qty='".$noGoodQty."' WHERE serial_id = '".$srid."'");
            }else{
                $conn->query("UPDATE gng set status='".$status."',tester_id='".$tstID."',handler_id='".$hdID."', loc='".$loc."',remarks='".$remarks."',good_qty='".$goodQty."',nogood_qty='".$noGoodQty."',sFile='".$fileName."' WHERE serial_id = '".$srid."'");
            }
            

            $conn->query("INSERT INTO gng_history (serial_id,family,package_type,test_type,dut_req,tst_pf,status,tester_id,handler_id,hd_pf,loc,storage,good_qty,nogood_qty,line,client,clerk,sFile,remarks,collection_date,expired_date,qa_stamp_date,area) 
            SELECT serial_id,family,package_type,test_type,dut_req,tst_pf,status,tester_id,handler_id,hd_pf,loc,storage,good_qty,nogood_qty,line,'".$borrower."','".$_SESSION['userEmail']."',sFile,remarks,collection_date,expired_date,qa_stamp_date,area FROM gng WHERE serial_id = '".$srid."'");

            // $conn->query("INSERT INTO gng_history (serial_id,family,tst_pf,status,tester_id,handler_id,loc,storage,line,vendor,borrower,clerk,sfile,remarks)
            // VALUES('".$srid."','".$family."','".$tst_pf."','".$status."','".$tstID."','".$hdID."','".$loc."','".$storage."','".$line."',
            // '".$vendor."','".$borrower."','".$_SESSION['userEmail']."','".$fileName."','".$remarks."')");

            //header('Location: ?controller=pages&action=trkLB');
            mysqli_close($conn);
?>