<?php
require('../../frameworks/ajaxConn.php');
date_default_timezone_set("Asia/Manila");
$dates=(date("y.m.d"));

$result = $conn->query('SELECT socket_id, family, package_type, part_no, dut_req, tst_pf, status, tester_id, handler_id, loc, storage, line, vendor, clerk, sFile, pin_type, pin_count, shotcount, max_shotcount, site, remarks, gs_code, n_plus, date_time, last_update FROM socket ORDER BY socket_id ASC');
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
echo "SOCKET ID".$sep."FAMILY".$sep."PACKAGE TYPE".$sep."PART NO".$sep."DUT REQ".$sep."TESTER PF".$sep."STATUS".$sep."TESTER ID".$sep."HANDLER ID".$sep."LOCATION".$sep."STORAGE".$sep."LINE".$sep."VENDOR".$sep."CUSTODIAN".$sep."S FILE".$sep."PIN TYPE".$sep."PIN COUNT".$sep."SHOT COUNT".$sep."MAX SHOUT COUNT".$sep."SITE".$sep."REMARKS".$sep."GS CODE".$sep."DATE ADDED".$sep."TRANSACT DATE";
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
