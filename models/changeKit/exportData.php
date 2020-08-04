<?php
require('../../frameworks/ajaxConn.php');
date_default_timezone_set("Asia/Manila");
$dates=(date("y.m.d"));

if (!empty($_POST['from'])) {
	$from = new DateTime($_POST['from']);
	$from =  date_format($from, 'Y-m-d');
}
if (!empty($_POST['to'])) {
	$to = new DateTime($_POST['to']);
	$to =  date_format($to, 'Y-m-d');
}

if (!empty($filter[0]) && !empty($filter[1]) && !empty($filter[2])) {
	$result = $conn->query('SELECT serial_id, category, handler_pf, storage, package_type, size, workPress, workPressAssembly, inputShuttle, outputShuttle, coolingShuttle, socketJig, trayPlate, trayPokayoke, hotPlate, basePlate, soakBoat, rotatorLoader, rotatorUnloader, nozzle, preheatPlate, peaker, chuck, centeringJig, poolChute, unloaderMagazineNGLane, unloaderPlasticGoodLane, loader,pusher,loaderMagazine, unloaderMagazine, loaderGoodMagazine, leadGuide, contactor, stabilizer, testSite, freeTestChute, total, ckResult, date_time, last_update, borrower, custodian, tester_id, handler_id, status, loc, remarks,line,tester_pf FROM ck_history WHERE status LIKE "%'.$_POST['serialID'].'%" OR serial_id LIKE "%'.$_POST['serialID'].'%" OR package_type LIKE "%'.$_POST['serialID'].'%" OR category LIKE "%'.$_POST['serialID'].'%" AND date_time between "'.$from.'" AND "'.$to.'" ORDER BY id DESC');
}elseif (!empty($filter[1]) && !empty($filter[2])) {
	$result = $conn->query('SELECT serial_id, category, handler_pf, storage, package_type, size, workPress, workPressAssembly, inputShuttle, outputShuttle, coolingShuttle, socketJig, trayPlate, trayPokayoke, hotPlate, basePlate, soakBoat, rotatorLoader, rotatorUnloader, nozzle, preheatPlate, peaker, chuck, centeringJig, poolChute, unloaderMagazineNGLane, unloaderPlasticGoodLane, loader,pusher,loaderMagazine, unloaderMagazine, loaderGoodMagazine, leadGuide, contactor, stabilizer, testSite, freeTestChute, total, ckResult, date_time, last_update, borrower, custodian, tester_id, handler_id, status, loc, remarks,line,tester_pf FROM ck_history WHERE date_time between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" ORDER BY id DESC');
}elseif (!empty($filter[1])){
	$result = $conn->query('SELECT serial_id, category, handler_pf, storage, package_type, size, workPress, workPressAssembly, inputShuttle, outputShuttle, coolingShuttle, socketJig, trayPlate, trayPokayoke, hotPlate, basePlate, soakBoat, rotatorLoader, rotatorUnloader, nozzle, preheatPlate, peaker, chuck, centeringJig, poolChute, unloaderMagazineNGLane, unloaderPlasticGoodLane, loader,pusher,loaderMagazine, unloaderMagazine, loaderGoodMagazine, leadGuide, contactor, stabilizer, testSite, freeTestChute, total, ckResult, date_time, last_update, borrower, custodian, tester_id, handler_id, status, loc, remarks,line,tester_pf FROM ck_history WHERE date_time >= "'.$from.'" ORDER BY id DESC');
}else {
	$result = $conn->query('SELECT serial_id, category, handler_pf, storage, package_type, size, workPress, workPressAssembly, inputShuttle, outputShuttle, coolingShuttle, socketJig, trayPlate, trayPokayoke, hotPlate, basePlate, soakBoat, rotatorLoader, rotatorUnloader, nozzle, preheatPlate, peaker, chuck, centeringJig, poolChute, unloaderMagazineNGLane, unloaderPlasticGoodLane, loader,pusher,loaderMagazine, unloaderMagazine, loaderGoodMagazine, leadGuide, contactor, stabilizer, testSite, freeTestChute, total, ckResult, date_time, last_update, borrower, custodian, tester_id, handler_id, status, loc, remarks,line,tester_pf FROM ck_history WHERE status LIKE "%'.$_POST['serialID'].'%" OR serial_id LIKE "%'.$_POST['serialID'].'%" OR package_type LIKE "%'.$_POST['serialID'].'%" OR category LIKE "%'.$_POST['serialID'].'%" ORDER BY date_time DESC');
}

//$result = $conn->query('SELECT lb_id,family FROM lb_history ORDER BY id DESC');
$file_ending = "xls";
//header info for browser
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$dates.xls");
header("Pragma: no-cache");
header("Expires: 0");
/*******Start of Formatting for Excel*******/
//define separator (defines columns in excel & tabs in word)
$sep = "\t"; //tabbed character
//start of printing column names as names of MySQL fields
//for ($i = 0; $i < mysqli_num_fields($result); $i++) {
//echo mysqli_field_name($result,$i) . "\t";
//}
echo "SERIAL ID".$sep."CATEGORY".$sep."HANDLER PLATFORM".$sep."STORAGE".$sep."PACKAGE TYPE".$sep."SIZE".$sep."WORK PRESS".$sep."WORK PRESS ASSEMBLY".$sep."INPUT SHUTTLE".$sep."OUTPUT SHUTTLE".$sep."COOLING SHUTTLE".$sep."SOCKET JIG".$sep."TRAY PLATE".$sep."TRAY POKAYOKE".$sep."HOT PLATE".$sep."BASE PLATE".$sep."SOAK BOAT".$sep."ROTATOR LOADER".$sep."ROTATOR UNLOADER".$sep."NOZZLE".$sep."PREHEAT PLATE".$sep."PEAKER".$sep."CHUCK".$sep."CENTERING JIG".$sep."POOL CHUTE".$sep."UNLOADER MAGAIZNE NG LANE".$sep."UNLOADER PLASTIC GOOD LANE".$sep."LOADER".$sep."PUSHER".$sep."LOADER MAGAZINE".$sep."UNLOADER MAGAZINE".$sep."LOADER GOOD MAGAZINE".$sep."LEAD GUIDE".$sep."CONTACTOR".$sep."STABILIZER".$sep."TEST SITE".$sep."FREE TEST CHUTE".$sep."TOTAL".$sep."CK RESULT".$sep."DATE TIME".$sep."LAST UPDATE".$sep."BORROWER".$sep."CUSTODIAN".$sep."TESTER ID".$sep."HANDLER ID".$sep."STATUS".$sep."LOCATION".$sep."REMARKS".$sep."LINE".$sep."TESTER PF";
print("\n");
//end of printing column names
//start while loop to get data
    while($row = mysqli_fetch_row($result))
    {
        $schema_insert = "";
        for($j=0; $j<mysqli_num_fields($result);$j++)
        {
            if ($j == 22){
                //$url = "http://phsm01ws012/cents/uploads/";
                $url = "http://127.0.0.1/cents/uploads/";
            }else{
                $url = "";
            }
            
            if(!isset($row[$j])){
                $schema_insert .= "N/A".$sep;
            }elseif ($row[$j] == ""){
                $schema_insert .= "N/A".$sep;
            }elseif ($row[$j] != ""){
                // $schema_insert .= $url."$row[$j]".$sep;
                $schema_insert .= "$row[$j]".$sep;
            }else{
                $schema_insert .= "".$sep;
            }
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    }
?>
