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
            $disk_no = $_POST['disk_no'];
            $family = $_POST['family'];
            $tester_name = $_POST['tester_name'];
            $program = $_POST['program'];
            $pkg_type = $_POST['pkg_type'];
            $status = $_POST['status'];
            $loc = $_POST['loc'];
            $line = $_POST['line'];
            $remarks = $_POST['remarks'];
            $test_type = $_POST['test_type'];
            $tstID = $_POST['tstID'];
            $hdID = $_POST['hdID'];
            //$clerk = $_POST['clerk'];
            //$db = Db::getInstance();

            $conn->query("UPDATE program set status='".$status."', loc='".$loc."', remarks='".$remarks."', last_update='".$lastUpdate."', handler_id = '".$hdID."' WHERE serial_id = '".$srid."'");

            $conn->query("INSERT INTO program_history(serial_id,disc_no,pkg_type,fam_name,test_type,tester_name,program,status,loc,line,clerk,sfile,remarks,handler_id)
            VALUES('".$srid."','".$disk_no."','".$pkg_type."','".$family."','".$test_type."','".$tester_name."','".$program."','".$status."''".$loc."','".$line."',
              '".$_SESSION['userEmail']."','".$fileName."','".$remarks."', '".$hdID."')");

            //header('Location: ?controller=pages&action=trkLB');
            mysqli_close($conn);
?>