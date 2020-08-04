<?php
require('../frameworks/connection.php');
$db = Db::getInstance();

$tstID = $_POST['id'];
$cat = $_POST['cat'];
if ($tstID == 'NA' || $tstID == 'N/A'){
    echo '0';
}else{
    switch ($cat)
    {
        case "LOADBOARD":
            $checkID = '';
            $query = $db->prepare("SELECT * FROM loadboard WHERE tester_id = '".$tstID."'");
                $query->execute();
                $count = $query->rowCount();    
            
                if ($count > 0){
                    echo $count;
                }else{
                    echo '0';
                }
        break;
        case "SOCKET":
            $checkID = '';
                $query = $db->prepare("SELECT * FROM socket WHERE tester_id = '".$tstID."'");
                $query->execute();
                $count = $query->rowCount();    
            
                if ($count > 0){
                    echo $count;
                }else{
                    echo '0';
                }
        break;
        case "GONOGO":
            $checkID = '';
                $query = $db->prepare("SELECT * FROM gng WHERE tester_id = '".$tstID."'");
                $query->execute();
                $count = $query->rowCount();    
            
                if ($count > 0){
                    echo $count;
                }else{
                    echo '0';
                }
        break;
        case "AUTO CORR":
            $checkID = '';
                $query = $db->prepare("SELECT * FROM atc WHERE tester_id = '".$tstID."'");
                $query->execute();
                $count = $query->rowCount();    
            
                if ($count > 0){
                    echo $count;
                }else{
                    echo '0';
                }
        break;
        case "CABLE":
            $checkID = '';
                $query = $db->prepare("SELECT * FROM cable WHERE tester_id = '".$tstID."'");
                $query->execute();
                $count = $query->rowCount();    
            
                if ($count > 0){
                    echo $count;
                }else{
                    echo '0';
                }
        break;
        case "TEST STAND":
            $checkID = '';
                $query = $db->prepare("SELECT * FROM test_stand WHERE tester_id = '".$tstID."'");
                $query->execute();
                $count = $query->rowCount();    
            
                if ($count > 0){
                    echo $count;
                }else{
                    echo '0';
                }
        break;
        // case "BURN IN BOARD":
        //     $checkID = '';
        //         $query = $db->prepare("SELECT * FROM bib WHERE tester_id = '".$tstID."'");
        //         $query->execute();
        //         $count = $query->rowCount();    
            
        //         if ($count > 0){
        //             echo $count;
        //         }else{
        //             echo '0';
        //         }
        // break;
        case "SOCKET BOARD":
            $checkID = '';
                $query = $db->prepare("SELECT * FROM socket_board WHERE tester_id = '".$tstID."'");
                $query->execute();
                $count = $query->rowCount();    
            
                if ($count > 0){
                    echo $count;
                }else{
                    echo '0';
                }
        break;
        case "WORK PRESS":
            $checkID = '';
                $query = $db->prepare("SELECT * FROM wp WHERE tester_id = '".$tstID."'");
                $query->execute();
                $count = $query->rowCount();    
            
                if ($count > 0){
                    echo $count;
                }else{
                    echo '0';
                }
        break;
        case "NOZZLE":
            $checkID = '';
                $query = $db->prepare("SELECT * FROM nozzle WHERE machine_id = '".$tstID."'");
                $query->execute();
                $count = $query->rowCount();    
            
                if ($count > 0){
                    echo $count;
                }else{
                    echo '0';
                }
        break;
        case "INSERT & CLAMP":
            $checkID = '';
                $query = $db->prepare("SELECT * FROM ic WHERE machine_id = '".$tstID."'");
                $query->execute();
                $count = $query->rowCount();    
            
                if ($count > 0){
                    echo $count;
                }else{
                    echo '0';
                }
        break;
        case "MOLD CHASE":
            $checkID = '';
                $query = $db->prepare("SELECT * FROM mc WHERE machine_id = '".$tstID."'");
                $query->execute();
                $count = $query->rowCount();    
            
                if ($count > 0){
                    echo $count;
                }else{
                    echo '0';
                }
        break;
        case "CHANGE KIT":
            $checkID = '';
            $query = $db->prepare("SELECT * FROM ck WHERE tester_id = '".$tstID."'");
            $query->execute();
            $count = $query->rowCount();    
        
            if ($count > 0){
                echo $count;
            }else{
                echo '0';
            }
        break;

        default:
		break;
        
    }
}
?>
