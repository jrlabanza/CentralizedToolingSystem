<?php
session_start();
// require('../dbcon/dbcon.php');
// require('../../frameworks/ajaxConn.php');
require('../../frameworks/connection.php');
date_default_timezone_set("Asia/Manila");
//
$db = Db::getInstance();

$cat = $_POST['cat'];
$td1 = isset($_POST['td1']) ? $_POST['td1'] : "";
$td2 = isset($_POST['td2']) ? $_POST['td2'] : "";
$td3 = isset($_POST['td3']) ? $_POST['td3'] : "";
$td4 = isset($_POST['td4']) ? $_POST['td4'] : "";
$td5 = isset($_POST['td5']) ? $_POST['td5'] : "";
$td6 = isset($_POST['td6']) ? $_POST['td6'] : "";
$td7 = isset($_POST['td7']) ? $_POST['td7'] : "";
$td8 = isset($_POST['td8']) ? $_POST['td8'] : "";
$td9 = isset($_POST['td9']) ? $_POST['td9'] : "";
$td10 = isset($_POST['td10']) ? $_POST['td10'] : "";
$td11 = isset($_POST['td11']) ? $_POST['td11'] : "";
$td12 = isset($_POST['td12']) ? $_POST['td12'] : "";
$td13 = isset($_POST['td13']) ? $_POST['td13'] : "";
$td14 = isset($_POST['td14']) ? $_POST['td14'] : "";
$td15 = isset($_POST['td15']) ? $_POST['td15'] : "";
$td16 = isset($_POST['td16']) ? $_POST['td16'] : "";
$td17 = isset($_POST['td17']) ? $_POST['td17'] : "";
$td18 = isset($_POST['td18']) ? $_POST['td18'] : "";
$td19 = isset($_POST['td19']) ? $_POST['td19'] : "";
$td20 = isset($_POST['td20']) ? $_POST['td20'] : "";
$td21 = isset($_POST['td21']) ? $_POST['td21'] : "";
$td22 = isset($_POST['td22']) ? $_POST['td22'] : "";
$td23 = isset($_POST['td23']) ? $_POST['td23'] : "";
$td24 = isset($_POST['td24']) ? $_POST['td24'] : "";
$td25 = isset($_POST['td25']) ? $_POST['td25'] : "";
$td26 = isset($_POST['td26']) ? $_POST['td26'] : "";
$td27 = isset($_POST['td27']) ? $_POST['td27'] : "";
$td28 = isset($_POST['td28']) ? $_POST['td28'] : "";
$td29 = isset($_POST['td29']) ? $_POST['td29'] : "";
$td30 = isset($_POST['td30']) ? $_POST['td30'] : "";
$td31 = isset($_POST['td31']) ? $_POST['td31'] : "";
$td32 = isset($_POST['td32']) ? $_POST['td32'] : "";
$td33 = isset($_POST['td33']) ? $_POST['td33'] : "";
$td34 = isset($_POST['td34']) ? $_POST['td34'] : "";
$td35 = isset($_POST['td35']) ? $_POST['td35'] : "";
$td36 = isset($_POST['td36']) ? $_POST['td36'] : "";
$td37 = isset($_POST['td37']) ? $_POST['td37'] : "";
$td38 = isset($_POST['td38']) ? $_POST['td38'] : "";
$td39 = isset($_POST['td39']) ? $_POST['td39'] : "";
$td40 = isset($_POST['td40']) ? $_POST['td40'] : "";
$td41 = isset($_POST['td41']) ? $_POST['td41'] : "";
$file = isset($_POST['file']) ? $_POST['file'] : "";

if (empty($td7)){
    $td7 = 0;
}
switch ($cat)
{
	case "LOADBOARD":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td5) || empty($td6) || empty($td7)
        || empty($td8) || empty($td9)){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
        }else{
            
            $row = $db->prepare("SELECT * From loadboard WHERE serial_ID = '$td1'");
            $row->execute();
            $count = $row->rowCount();

            if ($count > 0) {
                echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Socket ID already exist!</b></div>';
            }else{
                $db->query("INSERT INTO loadboard(serial_ID,lb_id,family,tst_pf,storage,vendor,line,n_plus,remarks,clerk,loc,status)
                VALUES('".$td1."','".$td2."','".$td3."','".$td4."','".$td5."','".$td6."','".$td7."','".$td8."','".$td9."','".$_SESSION['userEmail']."','HARDWARE','IN-FOR QUAL')");

                echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
            }    
        }
		break;
	case "SOCKET":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td5) || empty($td6) || empty($td7)
        || empty($td8) || empty($td9) || empty($td10) || empty($td11) || empty($td12) || empty($td13)){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
        }else{
            
            $row = $db->prepare("SELECT * From socket WHERE socket_id = '$td1'");
            $row->execute();
            $count = $row->rowCount();

            if ($count > 0) {
                echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Socket ID already exist!</b></div>';
            }else{
                $db->query("INSERT INTO socket(socket_id,family,vendor,tst_pf,gs_code,storage,max_shotcount,site,package_type,part_no,pin_type,pin_count,line,remarks,sFile,status,loc,clerk)
                VALUES('".$td1."','".$td2."','".$td3."','".$td4."','".$td5."','".$td6."','".$td7."','".$td8."','".$td9."','".$td10."','".$td11."','".$td12."','".$td13."','".$td14."','".$td15."','IN-FOR QUAL','HARDWARE','".$_SESSION['userEmail']."')");

                $db->query("INSERT INTO socket_history(socket_id,family,vendor,tst_pf,gs_code,storage,max_shotcount,site,package_type,part_no,pin_type,pin_count,line,remarks,sFile,status,loc,clerk)
                VALUES('".$td1."','".$td2."','".$td3."','".$td4."','".$td5."','".$td6."','".$td7."','".$td8."','".$td9."','".$td10."','".$td11."','".$td12."','".$td13."','".$td14."','".$td15."','IN-FOR QUAL','HARDWARE','".$_SESSION['userEmail']."')");

                echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
            }    
        }
		break;
	case "GNG":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td5) || empty($td6) || empty($td7) || ($td8 == "")
        || empty($td9) || empty($td10) || empty($td11) || empty($td13) || empty($td14)){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
            echo $cat."|".$td1."|".$td2."|".$td3."|".$td4."|".$td5."|".$td6."|".$td7."|".$td8."|".$td9."|".$td10."|".$td11."|".$td12."|".$td13."|".$td14;
        }else{
            $td9 = new DateTime($td9);
            $td10 = new DateTime($td10);

            $td9 = date_format($td9, 'Y-m-d');
            $td10 = date_format($td10, 'Y-m-d');
            
            $row = $db->prepare("SELECT * From gng WHERE serial_ID = '$td1'");
            $row->execute();
            $count = $row->rowCount();

            if ($count > 0) {
                echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Serial ID already exist!</b></div>';
            }else{
                if ($td11 == ''){
                    $db->query("INSERT INTO gng(serial_ID,tst_pf,test_type,good_qty,family,line,storage,nogood_qty,collection_date,expired_date,qa_stamp_date,remarks,package_type,clerk,loc,status,area)
                                VALUES('".$td1."','".$td2."','".$td3."','".$td4."','".$td5."','".$td6."','".$td7."','".$td8."','".$td9."','".$td10."',null,'".$td12."','".$td13."','".$_SESSION['userEmail']."','HARDWARE','IN-FOR QUAL','".$td14."')");
                }else{
                    $td11 = new DateTime($td11);
                    $td11 = date_format($td11, 'Y-m-d');
                    $db->query("INSERT INTO gng(serial_ID,tst_pf,test_type,good_qty,family,line,storage,nogood_qty,collection_date,expired_date,qa_stamp_date,remarks,package_type,clerk,loc,status,area)
                                VALUES('".$td1."','".$td2."','".$td3."','".$td4."','".$td5."','".$td6."','".$td7."','".$td8."','".$td9."','".$td10."','".$td11."','".$td12."','".$td13."','".$_SESSION['userEmail']."','HARDWARE','IN-FOR QUAL','".$td14."')");
                }
                echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
            }    
        }
		break;
	case "BIB":
        if (empty($td1) || empty($td2) || empty($td4) || empty($td6)){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
        }else{            
            $row = $db->prepare("SELECT * From bib WHERE serial_ID = '$td1'");
            $row->execute();
            $count = $row->rowCount();

            if ($count > 0) {
                echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>BOX Number already exist!</b></div>';
            }else{
                $db->query("INSERT INTO bib(serial_ID,family,storage,line,remarks,clerk,loc,status,barcode,bib_id)
                VALUES('".$td1."','".$td2."','".$td4."','".$td6."','".$td7."','".$_SESSION['userEmail']."','HARDWARE','IN-FOR QUAL','".$td8."','".$td9."')");

                echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
            }    
        }
		break;
    case "NOZZLE":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td5) || empty($td6) || empty($td7) ){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
        }else{            
            $row = $db->prepare("SELECT * From nozzle WHERE box_no = '$td2'");
            $row->execute();
            $count = $row->rowCount();

            if ($count > 0) {
                echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>BOX Number already exist!</b></div>';
            }else{
                $db->query("INSERT INTO nozzle(nozzle_partno,box_no,package,altrntv_nozzle,machine_model,line,max_shots,remarks,status)
                VALUES('".$td1."','".$td2."','".$td3."','".$td4."','".$td6."','".$td5."','".$td7."','".$td8."','IN-FOR QUAL')");

                echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
            }    
        }
        break;
    case "CHIPMOUNT NOZZLE":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td5) || empty($td6) || empty($td7) ){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
        }else{            
            $row = $db->prepare("SELECT * From nozzle WHERE box_no = '$td2'");
            $row->execute();
            $count = $row->rowCount();

            if ($count > 0) {
                echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>BOX Number already exist!</b></div>';
            }else{
                $db->query("INSERT INTO chipmount_nozzle(nozzle_partno,box_no,package,altrntv_nozzle,machine_model,line,max_shots,remarks,status)
                VALUES('".$td1."','".$td2."','".$td3."','".$td4."','".$td6."','".$td5."','".$td7."','".$td8."','IN-FOR QUAL')");

                echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
            }    
        }
        break;    
    case "IC":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td5) || empty($td6) || empty($td7) || empty($td8) || empty($td9)){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
        }else{
            $row = $db->prepare("SELECT * From ic WHERE box_no = '$td2'");
            $row->execute();
            $count = $row->rowCount();

            if ($count > 0) {
                echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>BOX Number already exist!</b></div>';
            }else{
                $db->query("INSERT INTO ic(lf_name,box_no,package,insert_sn,line,machine_model,max_shots,dra,clamp_sn,remarks,loc,status)
                VALUES('".$td1."','".$td2."','".$td3."','".$td4."','".$td5."','".$td6."','".$td7."','".$td8."','".$td9."','".$td10."','TOOLING','IN-FOR QUAL')");

                echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
            }
        }
        break;
    case "MC":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td5) || empty($td6) || empty($td7) || empty($td8)){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
        }else{
            $row = $db->prepare("SELECT * From mc WHERE serial_id = '$td1'");
            $row->execute();
            $count = $row->rowCount();

            if ($count > 0) {
                echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Serial ID already exist!</b></div>';
            }else{
                $db->query("INSERT INTO mc(serial_id,package,vendor,mold_die_id,die_model,line,machine_pf,rack,remarks,loc,status)
                VALUES('".$td1."','".$td2."','".$td3."','".$td4."','".$td5."','".$td6."','".$td7."','".$td8."','".$td9."','TOOLING','IN-FOR QUAL')");

                echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
            }
        }
        break;
    case "WP":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td5) || empty($td6) || empty($td7) || empty($td8)){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
        }else{
            $row = $db->prepare("SELECT * From wp WHERE serial_id = '$td1'");
            $row->execute();
            $count = $row->rowCount();

            if ($count > 0) {
                echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Serial ID already exist!</b></div>';
            }else{
                $db->query("INSERT INTO wp(serial_id, package_type, part_no, dut_req, material, status, tst_model, hd_model, loc, rack, max_shot_count, line, vendor, clerk, remarks, gs_code) 
                VALUES ('".$td1."', '".$td2."', '".$td3."', '".$td4."', '".$td5."', 'IN-FOR QUAL', '".$td7."', '".$td8."', 'HARDWARE', '".$td10."', '".$td9."', '".$td12."', '".$td6."', '".$_SESSION['userEmail']."', '".$td13."', '".$td11."')");

                echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
            }
        }
        break;
    case "SB":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td6) || empty($td5) || empty($td7) || empty($td9) || empty($td10) || empty($td13)){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
        }else{
            $row = $db->prepare("SELECT * From socket_board WHERE socket_id = '$td1'");
            $row->execute();
            $count = $row->rowCount();

            if ($count > 0) {
                echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Socket ID already exist!</b></div>';
            }else{
                $db->query("INSERT INTO socket_board(socket_id, family, vendor, tst_pf, temp, storage, max_shotcount, package_type, part_no, line,remarks, status, loc, clerk) 
                VALUES ('".$td1."','".$td2."','".$td3."','".$td4."','".$td5."','".$td6."','".$td7."','".$td9."','".$td10."','".$td13."', '".$td14."','IN-FOR QUAL','HARDWARE','".$_SESSION['userEmail']."')");

                echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
            }
        }
        break;
    case "ATC":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td6) || empty($td5) || empty($td7) || empty($td8) || empty($td9) || empty($td10)){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
        }else{
            $row = $db->prepare("SELECT * From atc WHERE serial_id = '$td1'");
            $row->execute();
            $count = $row->rowCount();

            if ($count > 0) {
                echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Socket ID already exist!</b></div>';
            }else{
                $db->query("INSERT INTO atc(serial_id, tst_pf, family, package_type, line, acu_need, bare_devices, pcb_board, adap_board, storage, remarks, status, loc, clerk) 
                VALUES ('".$td1."','".$td2."','".$td3."','".$td4."','".$td5."','".$td6."','".$td7."','".$td8."','".$td9."','".$td10."','".$td11."','IN-FOR QUAL','HARDWARE','".$_SESSION['userEmail']."')");
                echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
            }
        }
        break;
    case "CK":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td5) || empty($td6) || empty($td7)
        || empty($td8) || empty($td9) || empty($td10) || empty($td11) || empty($td12) || empty($td13) || empty($td14)
        || empty($td15) || empty($td16) || empty($td17) || empty($td18) || empty($td19) || empty($td20) || empty($td21)
        || empty($td22) || empty($td23) || empty($td24) || empty($td25) || empty($td26) || empty($td27) || empty($td28)
        || empty($td29) || empty($td30) || empty($td31) || empty($td32) || empty($td33) || empty($td34) || empty($td35)
        || empty($td36) || empty($td37) || empty($td38) || empty($td39) || empty($td40) || empty($td41)
        ){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>'.$td40.$td41;
        }else{
            
            $row = $db->prepare("SELECT * From ck WHERE serial_id = '$td1'");
            $row->execute();
            $count = $row->rowCount();

            if ($count > 0) {
                echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Socket ID already exist!</b></div>';
            }else{
                $db->query("INSERT INTO ck(serial_id,handler_pf,storage,category,size,workPress,workPressAssembly,inputShuttle,outputShuttle,trayPlate,trayPokayoke,coolingShuttle,soakBoat,rotatorLoader,rotatorUnloader,peaker,chuck,hotPlate,unloaderMagazineNGLane,unloaderPlasticGoodLane,nozzle,loader,loaderMagazine,centeringJig,contactor,stabilizer,unloaderMagazine,total,preheatPlate,loaderGoodMagazine,package_type,leadGuide,testSite,basePlate,poolChute,socketJig,pusher,ckResult,freeTestChute,custodian,line,tester_pf)
                VALUES('".$td1."','".$td2."','".$td3."','".$td4."','".$td5."','".$td6."','".$td7."','".$td8."','".$td9."','".$td10."','".$td11."','".$td12."','".$td13."','".$td14."','".$td15."','".$td16."','".$td17."','".$td18."','".$td19."','".$td20."','".$td21."','".$td22."','".$td23."','".$td24."','".$td25."','".$td26."','".$td27."','".$td28."','".$td29."','".$td30."','".$td31."','".$td32."','".$td33."','".$td34."','".$td35."','".$td36."','".$td37."','".$td38."','".$td39."','".$_SESSION['userEmail']."','".$td40."','".$td41."')");

                echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
            }    
        }
        break;
    case "TP":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td5) || empty($td6) || empty($td7)
        || empty($td8) || empty($td9) || empty($td10) ){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
        }else{
            
            // $row = $db->prepare("SELECT * From ck WHERE serial_id = '$td1'");
            // $row->execute();
            // $count = $row->rowCount();

            $db->query("INSERT INTO tstpartstrck(itm_nm,dscrptn,prt_no,srl_no,vendor,mchn_model,status,lction,remarks,quantity,prson,date_time)
            VALUES('".$td1."','".$td2."','".$td3."','".$td4."','".$td5."','".$td6."','".$td7."','".$td8."','".$td9."','".$td10."', '".$_SESSION['userEmail']."', current_timestamp)");

            echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
             
        }
        break;
    case "CB":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td5) || empty($td6) || empty($td7)
        || empty($td9)){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
        }else{
            
            $row = $db->prepare("SELECT * From center_board WHERE serial_ID = '$td1'");
            $row->execute();
            $count = $row->rowCount();

            if ($count > 0) {
                echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Serial ID already exist!</b></div>';
            }else{
                $db->query("INSERT INTO center_board(serial_ID,type,family,tst_pf,storage,vendor,line,remarks,clerk,loc,status)
                VALUES('".$td1."','".$td2."','".$td3."','".$td4."','".$td5."','".$td6."','".$td7."','".$td9."','".$_SESSION['userEmail']."','HARDWARE','IN-FOR QUAL')");

                echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
            }    
        }
        break;
    case "TFD":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td5) || empty($td6) || empty($td7) || empty($td8)){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
        }else{
            $row = $db->prepare("SELECT * From tfd WHERE dieset_number = '$td1'");
            $row->execute();
            $count = $row->rowCount();

            if ($count > 0) {
                echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Serial ID already exist!</b></div>';
            }else{
                $db->query("INSERT INTO tfd(dieset_number,package,vendor,dieset_serial_number,die_model,line,machine_pf,rack,remarks,loc,status)
                VALUES('".$td1."','".$td2."','".$td3."','".$td4."','".$td5."','".$td6."','".$td7."','".$td8."','".$td9."','TOOLING','IN-FOR QUAL')");

                echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
            }
        }
        break;
    case "RC":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td5) || empty($td6) || empty($td7)
        || empty($td8) || empty($td9)  ){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
        }else{
            
            // $row = $db->prepare("SELECT * From ck WHERE serial_id = '$td1'");
            // $row->execute();
            // $count = $row->rowCount();

            $db->query("INSERT INTO rubber_collet(rubber_tip_no,package,box,mchn_model,mchn_id,status,lction,quantity,line,custodian,transaction_date)
            VALUES('".$td1."','".$td2."','".$td3."','".$td4."','".$td5."','".$td6."','".$td7."','".$td8."','".$td9."','".$_SESSION['userEmail']."', current_timestamp)");

            echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
                
        }
        break;
    case "SP":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td5) || empty($td6) || empty($td7)
        || empty($td8)){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
        }else{
            
            // $row = $db->prepare("SELECT * From ck WHERE serial_id = '$td1'");
            // $row->execute();
            // $count = $row->rowCount();

            $db->query("INSERT INTO spare_parts(description,parts_code,current_qty,maker,location,machine,line,status,custodian,date_requested)
            VALUES('".$td1."','".$td2."','".$td3."','".$td4."','".$td5."','".$td6."','".$td7."','".$td8."','".$_SESSION['userEmail']."', current_timestamp)");

            echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
                
        }
        break;
    case "PG":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td5) || empty($td6) || empty($td7)
        || empty($td8) || empty($td9)){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
        }else{
            
            $row = $db->prepare("SELECT * From program WHERE serial_id = '$td1'");
            $row->execute();
            $count = $row->rowCount();

            if ($count > 0) {
                echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Socket ID already exist!</b></div>';
            }else{
                $db->query("INSERT INTO program(serial_ID,disc_no,pkg_type,fam_name,test_type,tester_name,program,clerk)
                VALUES('".$td1."','".$td4."','".$td2."','".$td3."','".$td5."','".$td8."','".$td6."','".$_SESSION['userEmail']."')");

                echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
            }    
        }
        break;
    case "CABLE":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td5) || empty($td6) || empty($td7) || empty($td8) || empty($td9) || empty($td10)){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
        }else{
            $row = $db->prepare("SELECT * From cable WHERE serial_ID = '$td1'");
            $row->execute();
            $count = $row->rowCount();

            if ($count > 0) {
                echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Socket ID already exist!</b></div>';
            }else{
                $db->query("INSERT INTO cable(serial_id,tst_pf,hd_pf,storage,line,conn_type,tester_id,handler_id,loc,remarks)
                VALUES('".$td1."','".$td2."','".$td3."','".$td4."','".$td5."','".$td6."','".$td7."','".$td8."','".$td9."','".$td10."')");

                echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
            }
        }
        break; 
    case "COLLET":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td5) || empty($td6) || empty($td7) ){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
        }else{            
            $row = $db->prepare("SELECT * From collet WHERE box_no = '$td2'");
            $row->execute();
            $count = $row->rowCount();

            if ($count > 0) {
                echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>BOX Number already exist!</b></div>';
            }else{
                $db->query("INSERT INTO collet(nozzle_partno,box_no,package,altrntv_nozzle,machine_model,line,max_shots,remarks,status)
                VALUES('".$td1."','".$td2."','".$td3."','".$td4."','".$td6."','".$td5."','".$td7."','".$td8."','IN-FOR QUAL')");

                echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
            }    
        }
        break;  
    case "SPANKER":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td5) || empty($td6) || empty($td7) ){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
        }else{            
            $row = $db->prepare("SELECT * From spanker WHERE box_no = '$td2'");
            $row->execute();
            $count = $row->rowCount();

            if ($count > 0) {
                echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>BOX Number already exist!</b></div>';
            }else{
                $db->query("INSERT INTO spanker(nozzle_partno,box_no,package,altrntv_nozzle,machine_model,line,max_shots,remarks,status)
                VALUES('".$td1."','".$td2."','".$td3."','".$td4."','".$td6."','".$td5."','".$td7."','".$td8."','IN-FOR QUAL')");

                echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
            }    
        }
        break;
    case "TT":
        if (empty($td1) || empty($td2) || empty($td3) || empty($td4) || empty($td5) || empty($td6)){
            echo '<div class="alert alert-warning" role="alert" id="message" for="name"><b>Incomplete fill up</b></div>';
        }else{
            
            $row = $db->prepare("SELECT * From test_stand WHERE serial_id = '$td1'");
            $row->execute();
            $count = $row->rowCount();

            if ($count > 0) {
                echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Socket ID already exist!</b></div>';
            }else{
                $db->query("INSERT INTO test_stand(serial_id,family,tst_pf,line,rack,remarks,clerk)
                VALUES('".$td1."','".$td2."','".$td3."','".$td4."','".$td5."','".$td6."','".$_SESSION['userEmail']."')");

                echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Item added successfully!</b></div>';
            }    
        }
        break;              
	default:
		break;
}

?>
