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
	$result = $conn->query('SELECT serial_id, family, package_type, acu_need, acu_id, tester_id, tst_pf, handler_id, pcb_board, bare_devices, adap_board, status, loc, storage, line, client, clerk, remarks, date_time FROM atc_history WHERE status LIKE "%'.$_POST['serialID'].'%" OR serial_id LIKE "%'.$_POST['serialID'].'%" OR package_type LIKE "%'.$_POST['serialID'].'%" AND date_time between "'.$from.'" AND "'.$to.'" ORDER BY id DESC');
}elseif (!empty($filter[1]) && !empty($filter[2])) {
	$result = $conn->query('SELECT serial_id, family, package_type, acu_need, acu_id, tester_id, tst_pf, handler_id, pcb_board, bare_devices, adap_board, status, loc, storage, line, client, clerk, remarks, date_time FROM atc_history WHERE date_time between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" ORDER BY id DESC');
}elseif (!empty($filter[1])){
	$result = $conn->query('SELECT serial_id, family, package_type, acu_need, acu_id, tester_id, tst_pf, handler_id, pcb_board, bare_devices, adap_board, status, loc, storage, line, client, clerk, remarks, date_time FROM atc_history WHERE date_time >= "'.$from.'" ORDER BY id DESC');
}else {
	$result = $conn->query('SELECT serial_id, family, package_type, acu_need, acu_id, tester_id, tst_pf, handler_id, pcb_board, bare_devices, adap_board, status, loc, storage, line, client, clerk, remarks, date_time FROM atc_history WHERE status LIKE "%'.$_POST['serialID'].'%" OR serial_id LIKE "%'.$_POST['serialID'].'%" OR package_type LIKE "%'.$_POST['serialID'].'%" ORDER BY date_time DESC');
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
echo "SERIAL ID".$sep."FAMILY".$sep."PACKAGE TYPE".$sep."ACU NEED".$sep."ACU ID".$sep."TESTER ID".$sep."TESTER PF".$sep."HANDLER ID".$sep."PCB BOARD".$sep."BARE DEVICES".$sep."ADAP BOARD".$sep."STATUS".$sep."LOCATION".$sep."STORAGE".$sep."LINE".$sep."CLIENT".$sep."CUSTODIAN".$sep."REMARKS".$sep."DATE / TIME";
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
