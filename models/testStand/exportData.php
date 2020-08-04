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

if (!empty($_POST['serialID']) && !empty($_POST['from']) && !empty($_POST['to'])) {
	$result = $conn->query('SELECT serial_id,family,tst_pf,status,tester_id,handler_id,hd_pf,loc,rack,line,vendor,sFile,client,clerk,remarks,date_time FROM test_stand_history WHERE date_time between "'.$from.'" AND "'.$to.'" AND status LIKE "%'.$_POST['serialID'].'%" OR serial_id LIKE "%'.$_POST['serialID'].'%" OR family LIKE "%'.$_POST['serialID'].'%" ORDER BY id DESC');
}elseif (!empty($_POST['from']) && !empty($_POST['to'])) {
	$result = $conn->query('SELECT serial_id,family,tst_pf,status,tester_id,handler_id,hd_pf,loc,rack,line,vendor,sFile,client,clerk,remarks,date_time FROM test_stand_history WHERE date_time between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" ORDER BY id DESC');
}elseif (!empty($_POST['from'])){
	$result = $conn->query('SELECT serial_id,family,tst_pf,status,tester_id,handler_id,hd_pf,loc,rack,line,vendor,sFile,client,clerk,remarks,date_time FROM test_stand_history WHERE date_time >= "'.$from.'" ORDER BY id DESC');
}else {
	$result = $conn->query('SELECT serial_id,family,tst_pf,status,tester_id,handler_id,hd_pf,loc,rack,line,vendor,sFile,client,clerk,remarks,date_time FROM test_stand_history WHERE status LIKE "%'.$_POST['serialID'].'%" OR serial_id LIKE "%'.$_POST['serialID'].'%" OR family LIKE "%'.$_POST['serialID'].'%" ORDER BY date_time DESC');
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
echo "SERIAL ID".$sep."FAMILY".$sep."TESTER PF".$sep."STATUS".$sep."TESTER ID".$sep."HANDLER ID".$sep."HANDLER PF".$sep."LOCATION".$sep."RACK".$sep."LINE".$sep."VENDOR".$sep."ATTACHMENT".$sep."CLIENT".$sep."CUSTODIAN".$sep."REMARKS".$sep."DATE / TIME";
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
