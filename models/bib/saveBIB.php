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
            $barcode = $_POST['barcode'];
            $srid = $_POST['srid'];
            $family = $_POST['family'];
            $bib = $_POST['bib_id'];
            $status = $_POST['status'];
            $loc = $_POST['loc'];
            $storage = $_POST['storage'];
            $line = $_POST['line'];
            // $vendor = $_POST['vendor'];
            // $track = $_POST['track'];
            $borrower = $_POST['borrower'];
            $remarks = $_POST['remarks'];
            //$clerk = $_POST['clerk'];
            //$db = Db::getInstance();

            $conn->query("UPDATE bib set barcode = '".$barcode."',status='".$status."', loc='".$loc."', remarks='".$remarks."' WHERE serial_id = '".$srid."'");

            $conn->query("INSERT INTO bib_history (barcode,bib_id,serial_id,family,status,loc,storage,line,clerk,remarks)
            VALUES('".$barcode."','".$bib."','".$srid."','".$family."','".$status."','".$loc."','".$storage."','".$line."',
            '".$_SESSION['userEmail']."','".$remarks."')");

            mysqli_close($conn);
?>