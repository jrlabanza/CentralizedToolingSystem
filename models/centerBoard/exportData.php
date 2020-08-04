<?php
require('../../frameworks/ajaxConn.php');
date_default_timezone_set("Asia/Manila");
$dates=(date("y.m.d"));

$Keyword = $_POST['serialID'];

if (!empty($_POST['from'])) {
	$from = new DateTime($_POST['from']);
	$from =  date_format($from, 'Y-m-d');
}
if (!empty($_POST['to'])) {
	$to = new DateTime($_POST['to']);
	$to =  date_format($to, 'Y-m-d');
}

if (!empty($Keyword) && !empty($from) && !empty($to)) {
	$result = $conn->query('SELECT date_time,serial_id,family,`type`,tst_pf,`status`,tester_id,handler_id,loc,storage,vendor,remarks,`line`,borrower,clerk,sFile FROM center_board_history WHERE date_time between "'.$from.'" AND "'.$to.'" AND serial_id LIKE "%'.$Keyword.'%" OR family LIKE "%'.$Keyword.'%" OR type LIKE "%'.$Keyword.
	'%" OR tst_pf LIKE "%'.$Keyword.'%" OR status LIKE "%'.$Keyword.'%" OR tester_id LIKE "%'.$Keyword.'%" OR handler_id LIKE "%'.$Keyword.'%" 
	OR hd_pf LIKE "%'.$Keyword.'%" OR loc LIKE "%'.$Keyword.'%" OR storage LIKE "%'.$Keyword.'%" OR line LIKE "%'.$Keyword.'%" OR vendor LIKE "%'.$Keyword.'%" 
	OR borrower LIKE "%'.$Keyword.'%" OR clerk LIKE "%'.$Keyword.'%" ORDER BY date_time DESC');
}elseif (!empty($from) && !empty($to)) {
	$result = $conn->query('SELECT date_time,serial_id,family,`type`,tst_pf,`status`,tester_id,handler_id,loc,storage,vendor,remarks,`line`,borrower,clerk,sFile FROM center_board_history WHERE date_time between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" ORDER BY date_time DESC');
}elseif (!empty($from)){
	$result = $conn->query('SELECT date_time,serial_id,family,`type`,tst_pf,`status`,tester_id,handler_id,loc,storage,vendor,remarks,`line`,borrower,clerk,sFile FROM center_board_history WHERE date_time >= "'.$from.'" ORDER BY date_time DESC');
}else {
	$result = $conn->query('SELECT date_time,serial_id,family,`type`,tst_pf,`status`,tester_id,handler_id,loc,storage,vendor,remarks,`line`,borrower,clerk,sFile FROM center_board_history WHERE serial_id LIKE "%'.$Keyword.'%" OR family LIKE "%'.$Keyword.'%" OR type LIKE "%'.$Keyword.
	'%" OR tst_pf LIKE "%'.$Keyword.'%" OR status LIKE "%'.$Keyword.'%" OR tester_id LIKE "%'.$Keyword.'%" OR handler_id LIKE "%'.$Keyword.'%" 
	OR hd_pf LIKE "%'.$Keyword.'%" OR loc LIKE "%'.$Keyword.'%" OR storage LIKE "%'.$Keyword.'%" OR line LIKE "%'.$Keyword.'%" OR vendor LIKE "%'.$Keyword.'%" 
	OR borrower LIKE "%'.$Keyword.'%" OR clerk LIKE "%'.$Keyword.'%" ORDER BY date_time DESC');
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
echo "DATE_TIME".$sep."SERIAL ID".$sep."FAMILY".$sep."TYPE".$sep."TESTER PF".$sep."STATUS".$sep."TESTER ID".$sep."HANDLER ID".$sep."LOCATION".$sep."STORAGE".$sep."VENDOR".$sep."REMARKS".$sep."LINE".$sep."CLIENT".$sep."CLERK".$sep."S FILE";
print("\n");
//end of printing column names
//start while loop to get data
    while($row = mysqli_fetch_row($result))
    {
        $schema_insert = "";
        for($j=0; $j<mysqli_num_fields($result);$j++)
        {
            if ($j == 15){
                $url = "http://phsm01ws012/cents/uploads/";
                //$url = "http://127.0.0.1/cents/uploads/";
            }else{
                $url = "";
            }
            
            if(!isset($row[$j])){
                $schema_insert .= "N/A".$sep;
            }elseif ($row[$j] == ""){
                $schema_insert .= "N/A".$sep;
            }elseif ($row[$j] != ""){
                $schema_insert .= $url."$row[$j]".$sep;
                //$schema_insert .= "$row[$j]".$sep;
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
