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
$username = $_SESSION['userEmail'];
$conCheck = $_POST['status'];
$mb1_check = $_POST['mb1'];
$mb2_check = $_POST['mb2'];

$srid = $_POST['srid'];
$lb_id = $_POST['lbid'];
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

$result = $conn->query("SELECT dut_board_name, main_board_1, main_board_2 from pizza_dut WHERE main_board_1 = '$mb1_check'");
while ($row = $result->fetch_assoc()) {
    $mb1_res = $row['dut_board_name'];
    $mb1_exist = $row['main_board_1'];
    $mb2_exist = $row['main_board_2'];
}

$result2 = $conn->query("SELECT dut_board_name from pizza_dut WHERE main_board_2 = '$mb2_check'");
while ($row2 = $result2->fetch_assoc()) {
    $mb2_res = $row2['dut_board_name'];
}

$result3 = $conn->query("SELECT dut_board_name from pizza_dut WHERE lb_ID = '$srid'");
while ($row3 = $result3->fetch_assoc()) {
    $sr_validity = $row3['dut_board_name'];
}

if($conCheck == "OUT-PROD"){
    if($mb1_check != "N/A"){ // check if mainboard 1 has data
        if($sr_validity != $mb1_res){ // check serial ID validity
            echo "<script type='text/javascript'>alert('ERROR! SERIAL ID INVALID FOR MAINBOARD SPECS');</script>";
        }
        else{
            if($mb1_res == ""){ // if mainboard 1 is empty, cancel
                echo "<script type='text/javascript'>alert('ERROR! MAIN BOARD 1 DOES NOT MATCH DATA');</script>";
            }
            else{
                if($mb2_check == ""){ //if true. proceed to only board 1 data
                    if(($mb1_exist != $mb1_check)  && ($mb2_exist != "")){ //if data 2 has data, data mismatch error
                        echo "<script type='text/javascript'>alert('ERROR! MAIN BOARD 1 DOES NOT MATCH DATA');</script>";
                    }
                    else{ //data 2 is optional so proceed

                        echo "<script type='text/javascript'>alert('SUCCESS! MAIN BOARD 1 MATCH');</script>";

                        $updateQuery = "UPDATE loadboard SET status='$status',tester_id='$tstID',handler_id='$hdID', loc='$loc', remarks='$remarks', last_update='$lastUpdate', main_board_1='$mb1_check' ";
                        $updateQuery .= "WHERE serial_id = '$srid'";
                        $conn->query($updateQuery);

                        $query = "INSERT INTO lb_history(serial_id,lb_id,family,tst_pf,status,tester_id,handler_id,loc,storage,line,vendor,borrower,clerk,sfile,remarks,main_board_1)";
                        $query .=" VALUES('$srid','$lb_id','$family','$tst_pf','$status','$tstID','$hdID','$loc','$storage','$line','$vendor','$borrower','$username','$fileName','$remarks','$mb1_check')";
                        $conn->query($query);

                        echo "<script type='text/javascript'>location.reload();</script>";
                    }
                }
                else{
                    if($mb1_res == $mb2_res){
                        echo "<script type='text/javascript'>alert('SUCCESS! MAIN BOARD 1 AND 2 MATCH');</script>";
                        $conn->query("UPDATE loadboard set status='$status',tester_id='$tstID',handler_id='$hdID', loc='$loc', remarks='$remarks', last_update='$lastUpdate', main_board_1='$mb1_check', main_board_2='$mb2_check' WHERE serial_id = '$srid'");

                        $query = "INSERT INTO lb_history(serial_id,lb_id,family,tst_pf,status,tester_id,handler_id,loc,storage,line,vendor,borrower,clerk,sfile,remarks,main_board_1,main_board_2)"
                        $query .=" VALUES('$srid','$lb_id','$family','$tst_pf','$status','$tstID','$hdID','$loc','$storage','$line','$vendor','$borrower','$username','$fileName','$remarks','$mb1_check', '$mb2_check')";
                        $conn->query($query);
                        
                        echo "<script type='text/javascript'>location.reload();</script>";

                    }
                    else{
                        echo "<script type='text/javascript'>alert('ERROR! MAIN BOARD 1 AND 2 DOES NOT MATCH DATA');</script>";
                    }
                }
            }

        }

    }

    else{

        echo "<script type='text/javascript'>alert('Default Updating');</script>";
        $conn->query("UPDATE loadboard set status='$status',tester_id='$tstID',handler_id='$hdID', loc='$loc', remarks='$remarks', last_update='$lastUpdate' WHERE serial_id = '$srid'");

        $query = "INSERT INTO lb_history(serial_id,lb_id,family,tst_pf,status,tester_id,handler_id,loc,storage,line,vendor,borrower,clerk,sfile,remarks";
        $query .= " VALUES('$srid','$lb_id','$family','$tst_pf','$status','$tstID','$hdID','$loc','$storage','$line','$vendor','$borrower','$username','$fileName','$remarks')";
        $conn->query($query);

        echo "<script type='text/javascript'>location.reload();</script>";

    }

}
else{
    echo "<script type='text/javascript'>alert('Default Updating');</script>";
    $conn->query("UPDATE loadboard set status='$status',tester_id='$tstID',handler_id='$hdID', loc='$loc', remarks='$remarks', last_update='$lastUpdate' WHERE serial_id = '$srid'");

    $query = "INSERT INTO lb_history(serial_id,lb_id,family,tst_pf,status,tester_id,handler_id,loc,storage,line,vendor,borrower,clerk,sfile,remarks";
    $query .= " VALUES('$srid','$lb_id','$family','$tst_pf','$status','$tstID','$hdID','$loc','$storage','$line','$vendor','$borrower','$username','$fileName','$remarks')";
    $conn->query($query);
    echo "<script type='text/javascript'>location.reload();</script>";
}

mysqli_close($conn);
?>
