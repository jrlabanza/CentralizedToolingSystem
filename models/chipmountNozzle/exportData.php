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
	$result = $conn->query('SELECT box_no,package,nozzle_partno,altrntv_nozzle,status,machine_model,machine_id,shots,max_shots,remarks,client,clerk,date_time FROM chipmount_nozzle_history WHERE box_no LIKE "%'.$_POST['serialID'].'%" OR nozzle_partno LIKE "%'.$_POST['serialID'].'%" OR package LIKE "%'.$_POST['serialID'].'%" AND date_time between "'.$from.'" AND "'.$to.'" ORDER BY id DESC');
}elseif (!empty($filter[1]) && !empty($filter[2])) {
	$result = $conn->query('SELECT box_no,package,nozzle_partno,altrntv_nozzle,status,machine_model,machine_id,shots,max_shots,remarks,client,clerk,date_time FROM chipmount_nozzle_history WHERE date_time between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" ORDER BY id DESC');
}elseif (!empty($filter[1])){
	$result = $conn->query('SELECT box_no,package,nozzle_partno,altrntv_nozzle,status,machine_model,machine_id,shots,max_shots,remarks,client,clerk,date_time FROM chipmount_nozzle_history WHERE date_time >= "'.$from.'" ORDER BY id DESC');
}else {
	$result = $conn->query('SELECT box_no,package,nozzle_partno,altrntv_nozzle,status,machine_model,machine_id,shots,max_shots,remarks,client,clerk,date_time FROM chipmount_nozzle_history WHERE box_no LIKE "%'.$_POST['serialID'].'%" OR nozzle_partno LIKE "%'.$_POST['serialID'].'%" OR package LIKE "%'.$_POST['serialID'].'%" ORDER BY id DESC');
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
echo "BOX NO".$sep."NOZZLE TYPE".$sep."NOZZLE PART NO".$sep."ALTERNATIVE NOZZLE".$sep."STATUS".$sep."MACHINE MODEL".$sep."MACHINE ID".$sep."MAX SHOTS".$sep."SHOTS".$sep."REMARKS".$sep."CLIENT".$sep."CLERK".$sep."DATE / TIME";
print("\n");
//end of printing column names
//start while loop to get data
    while($row = mysqli_fetch_row($result))
    {
        $schema_insert = "";
        for($j=0; $j<mysqli_num_fields($result);$j++)
        {
            // if ($j == 22){
            //     //$url = "http://phsm01ws012/cents/uploads/";
            //     $url = "http://127.0.0.1/cents/uploads/";
            // }else{
            //     $url = "";
            // }
            
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
