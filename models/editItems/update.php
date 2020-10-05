<?php
session_start();
// require('../dbcon/dbcon.php');
// require('../../frameworks/ajaxConn.php');
require('../../frameworks/connection.php');
date_default_timezone_set("Asia/Manila");
//
$db = Db::getInstance();

$cat = $_POST['cat'];
$td0 = isset($_POST['td0']) ? $_POST['td0'] : "";
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
		$query = $db->prepare("SELECT id,serial_id From loadboard WHERE serial_id = '$td1'");
		$query->execute();
		$count = $query->rowCount();
		while ($row = $query->fetch(PDO::FETCH_ASSOC))
		{
			$checkID = $row['id'];
			$checkSID = $row['serial_id'];
		}

		if ($checkID == $td0 && $checkSID == $td1){
			$update = $db->prepare("UPDATE loadboard set serial_id='".$td1."',lb_id='".$td2."',family='".$td3."',vendor='".$td4."',tst_pf='".$td5."',n_plus='".$td6."',line='".$td7."',storage='".$td8."',remarks='".$td9."',clerk='".$_SESSION['userEmail']."' WHERE id='".$td0."'");
	
			if ($update->execute()) {
				echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}else{
			if ($count >= 1) {
				echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Serial ID already exist!</b></div>';
			}else{
				$update = $db->prepare("UPDATE loadboard set serial_id='".$td1."',lb_id='".$td2."',family='".$td3."',vendor='".$td4."',tst_pf='".$td5."',n_plus='".$td6."',line='".$td7."',storage='".$td8."',remarks='".$td9."',clerk='".$_SESSION['userEmail']."' WHERE id='".$td0."'");
		
				if ($update->execute()) {
					echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}
			}
		}
		break;
	case "SOCKET":
		$query = $db->prepare("SELECT id,socket_id From socket WHERE socket_id = '$td1'");
		$query->execute();
		$count = $query->rowCount();
		while ($row = $query->fetch(PDO::FETCH_ASSOC))
		{
			$checkID = $row['id'];
			$checkSID = $row['socket_id'];
		}

		if ($checkID == $td0 && $checkSID == $td1){
			$update = $db->prepare("UPDATE socket set socket_id='".$td1."',family='".$td2."',vendor='".$td3."',pin_type='".$td4."',storage='".$td5."',gs_code='".$td6."',tst_pf='".$td7."',pin_count='".$td8."',line='".$td9."',site='".$td10."',package_type='".$td11."',part_no='".$td12."',max_shotcount='".$td13."',remarks='".$td14."',clerk='".$_SESSION['userEmail']."' WHERE id='".$td0."'");
	
			if ($update->execute()) {
				echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}else{
			if ($count >= 1) {
				echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Serial ID already exist!</b></div>';
			}else{
				$update = $db->prepare("UPDATE socket set socket_id='".$td1."',family='".$td2."',vendor='".$td3."',pin_type='".$td4."',storage='".$td5."',gs_code='".$td6."',tst_pf='".$td7."',pin_count='".$td8."',line='".$td9."',site='".$td10."',package_type='".$td11."',part_no='".$td12."',max_shotcount='".$td13."',remarks='".$td14."',clerk='".$_SESSION['userEmail']."' WHERE id='".$td0."'");
		
				if ($update->execute()) {
					echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}
			}
		}
		break;
	case "GNG":
		$td9 = new DateTime($td9);
		$td10 = new DateTime($td10);

		$td9 = date_format($td9, 'Y-m-d');
		$td10 = date_format($td10, 'Y-m-d');
		
		$query = $db->prepare("SELECT id,serial_id From gng WHERE serial_id = '$td1'");
		$query->execute();
		$count = $query->rowCount();
		while ($row = $query->fetch(PDO::FETCH_ASSOC))
		{
			$checkID = $row['id'];
			$checkSID = $row['serial_id'];
		}

		if ($checkID == $td0 && $checkSID == $td1){
			if ($td11 == ''){
				$update = $db->prepare("UPDATE gng set serial_id='".$td1."',tst_pf='".$td2."',test_type='".$td3."',good_qty='".$td4."',family='".$td5."',line='".$td6."',storage='".$td7."',nogood_qty='".$td8."',collection_date='".$td9."',expired_date='".$td10."',qa_stamp_date=NULL,remarks='".$td12."',package_type='".$td13."',area='".$td14."',clerk='".$_SESSION['userEmail']."' WHERE id='".$td0."'");
			}else{
				$td11 = new DateTime($td11);
				$td11 = date_format($td11, 'Y-m-d');
				$update = $db->prepare("UPDATE gng set serial_id='".$td1."',tst_pf='".$td2."',test_type='".$td3."',good_qty='".$td4."',family='".$td5."',line='".$td6."',storage='".$td7."',nogood_qty='".$td8."',collection_date='".$td9."',expired_date='".$td10."',qa_stamp_date='".$td11."',remarks='".$td12."',package_type='".$td13."',area='".$td14."',clerk='".$_SESSION['userEmail']."' WHERE id='".$td0."'");
			}

			if ($update->execute()) {
				echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}else{
			if ($count >= 1) {
				echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Serial ID already exist!</b></div>';
			}else{		
				if ($td11 == ''){
					$update = $db->prepare("UPDATE gng set serial_id='".$td1."',tst_pf='".$td2."',test_type='".$td3."',good_qty='".$td4."',family='".$td5."',line='".$td6."',storage='".$td7."',nogood_qty='".$td8."',collection_date='".$td9."',expired_date='".$td10."',qa_stamp_date=NULL,remarks='".$td12."',package_type='".$td13."',clerk='".$_SESSION['userEmail']."' WHERE id='".$td0."'");
				}else{
					$td11 = new DateTime($td11);
					$td11 = date_format($td11, 'Y-m-d');
					$update = $db->prepare("UPDATE gng set serial_id='".$td1."',tst_pf='".$td2."',test_type='".$td3."',good_qty='".$td4."',family='".$td5."',line='".$td6."',storage='".$td7."',nogood_qty='".$td8."',collection_date='".$td9."',expired_date='".$td10."',qa_stamp_date='".$td11."',remarks='".$td12."',package_type='".$td13."',clerk='".$_SESSION['userEmail']."' WHERE id='".$td0."'");
				}

				if ($update->execute()) {
					echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}
			}
		}
		break;
	case "BIB":
		$query = $db->prepare("SELECT id,serial_id From bib WHERE serial_id = '$td1'");
		$query->execute();
		$count = $query->rowCount();
		while ($row = $query->fetch(PDO::FETCH_ASSOC))
		{
			$checkID = $row['id'];
			$checkSID = $row['serial_id'];
		}

		if ($checkID == $td0 && $checkSID == $td1){
			$update = $db->prepare("UPDATE bib set serial_id='".$td1."',family='".$td2."',storage='".$td4."',line='".$td5."',remarks='".$td7."',clerk='".$_SESSION['userEmail']."',barcode='".$td8."',bib_id='".$td9."' WHERE id='".$td0."'");
	
			if ($update->execute()) {
				echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}else{
			if ($count >= 1) {
				echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Serial ID already exist!</b></div>';
			}else{
				$update = $db->prepare("UPDATE bib set serial_id='".$td1."',family='".$td2."',storage='".$td4."',line='".$td5."',remarks='".$td7."',clerk='".$_SESSION['userEmail']."',barcode='".$td8."',bib_id='".$td9."' WHERE id='".$td0."'");
		
				if ($update->execute()) {
					echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}
			}
		}
		break;
    case "NOZZLE":
		$query = $db->prepare("SELECT id,box_no From nozzle WHERE box_no = '$td2'");
		$query->execute();
		$count = $query->rowCount();
		while ($row = $query->fetch(PDO::FETCH_ASSOC))
		{
			$checkID = $row['id'];
			$checkSID = $row['box_no'];
		}

		if ($checkID == $td0 && $checkSID == $td2){
			$update = $db->prepare("UPDATE nozzle set nozzle_partno='".$td1."',box_no='".$td2."',package='".$td3."',machine_model='".$td4."',max_shots='".$td5."',remarks='".$td6."',altrntv_nozzle='".$td7."',line='".$td8."' WHERE id='".$td0."'");
	
			if ($update->execute()) {
				echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}else{
			if ($count >= 1) {
				echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Nozzle Part No already exist!</b></div>';
			}else{
				$update = $db->prepare("UPDATE nozzle set nozzle_partno='".$td1."',box_no='".$td2."',package='".$td3."',machine_model='".$td4."',max_shots='".$td5."',remarks='".$td6."',altrntv_nozzle='".$td7."',line='".$td8."' WHERE id='".$td0."'");
		
				if ($update->execute()) {
					echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}
			}
		}
		break;
	case "CHIPMOUNT NOZZLE":
		$query = $db->prepare("SELECT id,box_no From chipmount_nozzle WHERE box_no = '$td2'");
		$query->execute();
		$count = $query->rowCount();
		while ($row = $query->fetch(PDO::FETCH_ASSOC))
		{
			$checkID = $row['id'];
			$checkSID = $row['box_no'];
		}

		if ($checkID == $td0 && $checkSID == $td2){
			$update = $db->prepare("UPDATE chipmount_nozzle set nozzle_partno='".$td1."',box_no='".$td2."',package='".$td3."',machine_model='".$td4."',max_shots='".$td5."',remarks='".$td6."',altrntv_nozzle='".$td7."',line='".$td8."' WHERE id='".$td0."'");
	
			if ($update->execute()) {
				echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}else{
			if ($count >= 1) {
				echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Nozzle Part No already exist!</b></div>';
			}else{
				$update = $db->prepare("UPDATE chipmount_nozzle set nozzle_partno='".$td1."',box_no='".$td2."',package='".$td3."',machine_model='".$td4."',max_shots='".$td5."',remarks='".$td6."',altrntv_nozzle='".$td7."',line='".$td8."' WHERE id='".$td0."'");
		
				if ($update->execute()) {
					echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}
			}
		}
		break;	
	case "IC":
		$query = $db->prepare("SELECT id,box_no From ic WHERE box_no = '$td2'");
		$query->execute();
		$count = $query->rowCount();
		while ($row = $query->fetch(PDO::FETCH_ASSOC))
		{
			$checkID = $row['id'];
			$checkSID = $row['box_no'];
		}

		if ($checkID == $td0 && $checkSID == $td2){
			$update = $db->prepare("UPDATE ic set lf_name='".$td1."',box_no='".$td2."',package='".$td3."',insert_sn='".$td4."',line='".$td5."',machine_model='".$td6."',max_shots='".$td7."',dra='".$td8."',clamp_sn='".$td9."',remarks='".$td10."' WHERE id='".$td0."'");
	
			if ($update->execute()) {
				echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}else{
			if ($count >= 1) {
				echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Serial ID already exist!</b></div>';
			}else{
				$update = $db->prepare("UPDATE ic set lf_name='".$td1."',box_no='".$td2."',package='".$td3."',insert_sn='".$td4."',line='".$td5."',machine_model='".$td6."',max_shots='".$td7."',dra='".$td8."',clamp_sn='".$td9."',remarks='".$td10."' WHERE id='".$td0."'");
		
				if ($update->execute()) {
					echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}
			}
		}
		break;
	case "MC":
		$query = $db->prepare("SELECT id,serial_ID From mc WHERE serial_ID = '$td1'");
		$query->execute();
		$count = $query->rowCount();
		while ($row = $query->fetch(PDO::FETCH_ASSOC))
		{
			$checkID = $row['id'];
			$checkSID = $row['serial_ID'];
		}

		if ($checkID == $td0 && $checkSID == $td1){
			$update = $db->prepare("UPDATE mc set serial_id='".$td1."',package='".$td2."',vendor='".$td7."',mold_die_id='".$td3."',die_model='".$td4."',line='".$td8."',machine_pf='".$td5."',rack='".$td6."',remarks='".$td9."' WHERE id='".$td0."'");
			if ($update->execute()) {
				echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}else{
			if ($count >= 1) {
				echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Serial ID already exist!</b></div>';
			}else{
				$update = $db->prepare("UPDATE mc set serial_id='".$td1."',package='".$td2."',vendor='".$td7."',mold_die_id='".$td3."',die_model='".$td4."',line='".$td8."',machine_pf='".$td5."',rack='".$td6."',remarks='".$td9."' WHERE id='".$td0."'");
				if ($update->execute()) {
					echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}
			}
		}
		break;
	case "WP":
		$query = $db->prepare("SELECT id,serial_ID From wp WHERE serial_ID = '$td1'");
		$query->execute();
		$count = $query->rowCount();
		while ($row = $query->fetch(PDO::FETCH_ASSOC))
		{
			$checkID = $row['id'];
			$checkSID = $row['serial_ID'];
		}

		if ($checkID == $td0 && $checkSID == $td1){
			$update = $db->prepare("UPDATE wp set serial_id='".$td1."',package_type='".$td2."',part_no='".$td3."',dut_req='".$td4."',material='".$td11."',rack='".$td5."',tst_model='".$td7."',hd_model='".$td8."',rack='".$td5."',max_shot_count='".$td10."',vendor='".$td12."',line='".$td9."',gs_code='".$td6."',remarks='".$td13."' WHERE id='".$td0."'");
	
			if ($update->execute()) {
				echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}else{
			if ($count >= 1) {
				echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Serial ID already exist!</b></div>';
			}else{
				$update = $db->prepare("UPDATE wp set serial_id='".$td1."',package_type='".$td2."',part_no='".$td3."',dut_req='".$td4."',material='".$td11."',rack='".$td5."',tst_model='".$td7."',hd_model='".$td8."',rack='".$td5."',max_shot_count='".$td10."',vendor='".$td12."',line='".$td9."',gs_code='".$td6."',remarks='".$td13."' WHERE id='".$td0."'");
		
				if ($update->execute()) {
					echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}
			}
		}
		break;
	case "SB":
		$query = $db->prepare("SELECT id,socket_ID From socket_board WHERE socket_ID = '$td1'");
		$query->execute();
		$count = $query->rowCount();
		while ($row = $query->fetch(PDO::FETCH_ASSOC))
		{
			$checkID = $row['id'];
			$checkSID = $row['socket_ID'];
		}

		if ($checkID == $td0 && $checkSID == $td1){
			$update = $db->prepare("UPDATE socket_board set socket_id='".$td1."',family='".$td2."',vendor='".$td3."',tst_pf='".$td4."',temp='".$td5."',storage='".$td6."',
			max_shotcount='".$td7."',package_type='".$td9."',part_no='".$td10."',line='".$td13."',remarks='".$td14."' WHERE id='".$td0."'");
	
			if ($update->execute()) {
				echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}else{
			if ($count >= 1) {
				echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Serial ID already exist!</b></div>';
			}else{
				$update = $db->prepare("UPDATE socket_board set socket_id='".$td1."',family='".$td2."',vendor='".$td3."',tst_pf='".$td4."',temp='".$td5."',storage='".$td6."',
				max_shotcount='".$td7."',package_type='".$td9."',part_no='".$td10."',line='".$td13."',remarks='".$td14."' WHERE id='".$td0."'");
		
				if ($update->execute()) {
					echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}
			}
		}
		break;
	case "ATC":
		$checkID = '';
		$query = $db->prepare("SELECT id,serial_id From atc WHERE serial_id = '$td1'");
		$query->execute();
		$count = $query->rowCount();
		while ($row = $query->fetch(PDO::FETCH_ASSOC))
		{
			$checkID = $row['id'];
			$checkSID = $row['serial_id'];
		}

		if ($checkID == $td0 && $checkSID == $td1){
			$update = $db->prepare("UPDATE atc set serial_id='".$td1."',tst_pf='".$td2."',family='".$td3."',package_type='".$td4."',line='".$td5."',acu_need='".$td6."',
			bare_devices='".$td7."',pcb_board='".$td8."',adap_board='".$td9."',storage='".$td10."',remarks='".$td11."', clerk='".$_SESSION['userEmail']."' WHERE id='".$td0."'");

			if ($update->execute()) {
				echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}else{
			if ($count >= 1) {
				echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Serial ID already exist!</b></div>';
			}else{
				$update = $db->prepare("UPDATE atc set serial_id='".$td1."',tst_pf='".$td2."',family='".$td3."',package_type='".$td4."',line='".$td5."',acu_need='".$td6."',
				bare_devices='".$td7."',pcb_board='".$td8."',adap_board='".$td9."',storage='".$td10."',remarks='".$td11."', clerk='".$_SESSION['userEmail']."' WHERE id='".$td0."'");
		
				if ($update->execute()) {
					echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}
			}
		}
		break;
	case "CK":
		$checkID = '';
		$query = $db->prepare("SELECT id,serial_id From ck WHERE serial_id = '$td1'");
		$query->execute();
		$count = $query->rowCount();
		while ($row = $query->fetch(PDO::FETCH_ASSOC))
		{
			$checkID = $row['id'];
			$checkSID = $row['serial_id'];
		}

		if ($checkID == $td0 && $checkSID == $td1){
			$update = $db->prepare("UPDATE ck set serial_id = '". $td1 ."', handler_pf = '". $td2 ."', storage = '". $td3 ."', category = '". $td4 ."', size = '". $td5 ."', workPress = '". $td6 ."',
			workPressAssembly = '". $td7 ."', inputShuttle = '". $td8 ."', outputShuttle = '". $td9 ."', trayPlate = '". $td10 ."', trayPokayoke = '". $td11 ."', coolingShuttle = '". $td12 ."',
			soakBoat = '". $td13 ."', rotatorLoader = '". $td14 ."', rotatorUnloader = '". $td15 ."', peaker = '". $td16 ."', chuck = '". $td17 ."', hotPlate = '". $td18 ."',
			unloaderMagazineNGLane = '".  $td19."', unloaderPlasticGoodLane = '". $td20 ."', nozzle = '". $td21 ."', loader = '". $td22 ."', loaderMagazine = '". $td23 ."',
			centeringJig = '". $td24 ."', contactor = '". $td25 ."', stabilizer = '". $td26 ."', unloaderMagazine = '".  $td27."', total = '". $td28 ."', preheatPlate = '". $td29 ."',
			loaderGoodMagazine = '". $td30 ."', package_type = '". $td31 ."', leadGuide = '". $td32 ."', testSite = '". $td33 ."', basePlate = '". $td34 ."', poolChute = '". $td35 ."',
			socketJig = '". $td36 ."', pusher = '". $td37 ."', ckResult = '". $td38 ."', freeTestChute = '".  $td39."', custodian = '". $_SESSION['userEmail'] ."', line = '". $td40 ."', tester_pf = '". $td41 ."' WHERE id='".$td0."'");

			if ($update->execute()) {
				echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}else{
			if ($count >= 1) {
				echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Serial ID already exist!</b></div>';
			}else{
				$update = $db->prepare("UPDATE ck set serial_id = '". $td1 ."', handler_pf = '". $td2 ."', storage = '". $td3 ."', category = '". $td4 ."', size = '". $td5 ."', workPress = '". $td6 ."',
				workPressAssembly = '". $td7 ."', inputShuttle = '". $td8 ."', outputShuttle = '". $td9 ."', trayPlate = '". $td10 ."', trayPokayoke = '". $td11 ."', coolingShuttle = '". $td12 ."',
				soakBoat = '". $td13 ."', rotatorLoader = '". $td14 ."', rotatorUnloader = '". $td15 ."', peaker = '". $td16 ."', chuck = '". $td17 ."', hotPlate = '". $td18 ."',
				unloaderMagazineNGLane = '".  $td19."', unloaderPlasticGoodLane = '". $td20 ."', nozzle = '". $td21 ."', loader = '". $td22 ."', loaderMagazine = '". $td23 ."',
				centeringJig = '". $td24 ."', contactor = '". $td25 ."', stabilizer = '". $td26 ."', unloaderMagazine = '".  $td27."', total = '". $td28 ."', preheatPlate = '". $td29 ."',
				loaderGoodMagazine = '". $td30 ."', package_type = '". $td31 ."', leadGuide = '". $td32 ."', testSite = '". $td33 ."', basePlate = '". $td34 ."', poolChute = '". $td35 ."',
				socketJig = '". $td36 ."', pusher = '". $td37 ."', ckResult = '". $td38 ."', freeTestChute = '".  $td39."', borrower = '". $_SESSION['userEmail'] ."', line = '". $td40 ."', tester_pf = '". $td41 ."' WHERE id='".$td0."'");
		
				if ($update->execute()) {
					echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}
			}
		}
		break;
	case "TP":
		$checkID = '';

		$update = $db->prepare("UPDATE tstpartstrck set itm_nm = '". $td1 ."', dscrptn = '". $td2 ."', prt_no = '". $td3 ."', srl_no = '". $td4 ."', vendor = '". $td5 ."', mchn_model = '". $td6 ."', status = '". $td7 ."', lction = '". $td8 ."', remarks = '". $td9 ."', quantity = '". $td10 ."' WHERE id='".$td0."'");

		if ($update->execute()) {
			echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}

		break;
	case "CB":
		$query = $db->prepare("SELECT id,serial_id From center_board WHERE serial_id = '$td1'");
		$query->execute();
		$count = $query->rowCount();
		$checkSID = "";
		while ($row = $query->fetch(PDO::FETCH_ASSOC))
		{
			$checkID = $row['id'];
			$checkSID = $row['serial_id'];
		}
		if ($checkID == $td0 && $checkSID == $td1){
			$update = $db->prepare("UPDATE center_board set serial_id='".$td1."',type='".$td2."',family='".$td3."',vendor='".$td4."',tst_pf='".$td5."',line='".$td7."',storage='".$td8."',remarks='".$td9."',clerk='".$_SESSION['userEmail']."' WHERE id='".$td0."'");
	
			if ($update->execute()) {
				echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}else{
			if ($count >= 1) {
				echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Serial ID already exist!</b></div>';
			}else{
				$update = $db->prepare("UPDATE center_board set serial_id='".$td1."',type='".$td2."',family='".$td3."',vendor='".$td4."',tst_pf='".$td5."',line='".$td7."',storage='".$td8."',remarks='".$td9."',clerk='".$_SESSION['userEmail']."' WHERE id='".$td0."'");
		
				if ($update->execute()) {
					echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}
			}
		}
		break;
	case "TFD":
		$query = $db->prepare("SELECT id,dieset_number From tfd WHERE dieset_number = '$td1'");
		$query->execute();
		$count = $query->rowCount();
		while ($row = $query->fetch(PDO::FETCH_ASSOC))
		{
			$checkID = $row['id'];
			$checkSID = $row['dieset_number'];
		}

		if ($checkID == $td0 && $checkSID == $td1){
			$update = $db->prepare("UPDATE tfd set dieset_number='".$td1."',package='".$td2."',vendor='".$td7."',dieset_serial_number='".$td3."',die_model='".$td4."',line='".$td8."',machine_pf='".$td5."',rack='".$td6."',remarks='".$td9."' WHERE id='".$td0."'");
			if ($update->execute()) {
				echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}else{
			if ($count >= 1) {
				echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Serial ID already exist!</b></div>';
			}else{
				$update = $db->prepare("UPDATE tfd set dieset_number='".$td1."',package='".$td2."',vendor='".$td7."',dieset_serial_number='".$td3."',die_model='".$td4."',line='".$td8."',machine_pf='".$td5."',rack='".$td6."',remarks='".$td9."' WHERE id='".$td0."'");
				if ($update->execute()) {
					echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}
			}
		}
		break;
	case "RC":
			$checkID = '';
	
			$update = $db->prepare("UPDATE rubber_collet set rubber_tip_no = '". $td1 ."', package = '". $td2 ."', box = '". $td3 ."', mchn_model = '". $td4 ."', mchn_id = '". $td5 ."', status = '". $td6 ."', lction = '". $td7 ."', quantity = '". $td8 ."', line = '". $td9 ."' WHERE id='".$td0."'");
	
			if ($update->execute()) {
				echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
	
			break;
	case "SP":
		$checkID = '';

		$update = $db->prepare("UPDATE spare_parts set description = '". $td1 ."', parts_code = '". $td2 ."', current_qty = '". $td3 ."', maker = '". $td4 ."', location = '". $td5 ."', machine = '". $td6 ."', line = '". $td7 ."', status = '". $td8 ."', uploadImage = '". $file ."' WHERE id='".$td0."'");

		if ($update->execute()) {
			echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}

		break;
	case "PG":
		$query = $db->prepare("SELECT id,serial_id From program WHERE serial_id = '$td1'");
		$query->execute();
		$count = $query->rowCount();
		while ($row = $query->fetch(PDO::FETCH_ASSOC))
		{
			$checkID = $row['id'];
			$checkSID = $row['serial_id'];
		}

		if ($checkID == $td0 && $checkSID == $td1){
			$update = $db->prepare("UPDATE program set serial_id='".$td1."',disc_no='".$td2."',pkg_type='".$td3."',fam_name='".$td4."',test_type='".$td5."',tester_name='".$td6."',program='".$td7."',remarks='".$td9."',clerk='".$_SESSION['userEmail']."',line='".$td10."' WHERE id='".$td0."'");
	
			if ($update->execute()) {
				echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}else{
			if ($count >= 1) {
				echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Serial ID already exist!</b></div>';
			}else{
				$update = $db->prepare("UPDATE program set serial_id='".$td1."',disc_no='".$td2."',pkg_type='".$td3."',fam_name='".$td4."',test_type='".$td5."',tester_name='".$td6."',program='".$td7."',remarks='".$td9."',clerk='".$_SESSION['userEmail']."',line='".$td10."' WHERE id='".$td0."'");
		
				if ($update->execute()) {
					echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}
			}
		}
		break;
	case "CABLE":
		$checkID = '';
		$query = $db->prepare("SELECT id,serial_id From cable WHERE serial_id = '$td1'");
		$query->execute();
		$count = $query->rowCount();
		while ($row = $query->fetch(PDO::FETCH_ASSOC))
		{
			$checkID = $row['id'];
			$checkSID = $row['serial_id'];
		}

		if ($checkID == $td0 && $checkSID == $td1){
			$update = $db->prepare("UPDATE cable set serial_id='".$td1."',conn_type='".$td2."',status='".$td3."',tester_id='".$td4."',tst_pf='".$td5."',handler_id='".$td6."',
			hd_pf='".$td7."',loc='".$td8."',storage='".$td9."',remarks='".$td10."',line='".$td11."', clerk='".$_SESSION['userEmail']."' WHERE id='".$td0."'");

			if ($update->execute()) {
				echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}else{
			if ($count >= 1) {
				echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Serial ID already exist!</b></div>';
			}else{
				$update = $db->prepare("UPDATE cable set serial_id='".$td1."',conn_type='".$td2."',status='".$td3."',tester_id='".$td4."',tst_pf='".$td5."',handler_id='".$td6."',
				hd_pf='".$td7."',loc='".$td8."',storage='".$td9."',remarks='".$td10."',line='".$td11."', clerk='".$_SESSION['userEmail']."' WHERE id='".$td0."'");
		
				if ($update->execute()) {
					echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}
			}
		}
		break;
	case "COLLET":
		$query = $db->prepare("SELECT id,box_no From collet WHERE box_no = '$td2'");
		$query->execute();
		$count = $query->rowCount();
		while ($row = $query->fetch(PDO::FETCH_ASSOC))
		{
			$checkID = $row['id'];
			$checkSID = $row['box_no'];
		}

		if ($checkID == $td0 && $checkSID == $td2){
			$update = $db->prepare("UPDATE collet set nozzle_partno='".$td1."',box_no='".$td2."',package='".$td3."',machine_model='".$td4."',max_shots='".$td5."',remarks='".$td6."',altrntv_nozzle='".$td7."',line='".$td8."' WHERE id='".$td0."'");
	
			if ($update->execute()) {
				echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}else{
			if ($count >= 1) {
				echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Nozzle Part No already exist!</b></div>';
			}else{
				$update = $db->prepare("UPDATE collet set nozzle_partno='".$td1."',box_no='".$td2."',package='".$td3."',machine_model='".$td4."',max_shots='".$td5."',remarks='".$td6."',altrntv_nozzle='".$td7."',line='".$td8."' WHERE id='".$td0."'");
		
				if ($update->execute()) {
					echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}
			}
		}
		break;
	case "SPANKER":
		$query = $db->prepare("SELECT id,box_no From spanker WHERE box_no = '$td2'");
		$query->execute();
		$count = $query->rowCount();
		while ($row = $query->fetch(PDO::FETCH_ASSOC))
		{
			$checkID = $row['id'];
			$checkSID = $row['box_no'];
		}

		if ($checkID == $td0 && $checkSID == $td2){
			$update = $db->prepare("UPDATE spanker set nozzle_partno='".$td1."',box_no='".$td2."',package='".$td3."',machine_model='".$td4."',max_shots='".$td5."',remarks='".$td6."',altrntv_nozzle='".$td7."',line='".$td8."' WHERE id='".$td0."'");
	
			if ($update->execute()) {
				echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}else{
			if ($count >= 1) {
				echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Nozzle Part No already exist!</b></div>';
			}else{
				$update = $db->prepare("UPDATE spanker set nozzle_partno='".$td1."',box_no='".$td2."',package='".$td3."',machine_model='".$td4."',max_shots='".$td5."',remarks='".$td6."',altrntv_nozzle='".$td7."',line='".$td8."' WHERE id='".$td0."'");
		
				if ($update->execute()) {
					echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}
			}
		}
		break;
	case "TT":
		$query = $db->prepare("SELECT id,serial_id From mc WHERE serial_id = '$td1'");
		$query->execute();
		$count = $query->rowCount();
		while ($row = $query->fetch(PDO::FETCH_ASSOC))
		{
			$checkID = $row['id'];
			$checkSID = $row['serial_id'];
		}

		if ($checkID == $td0 && $checkSID == $td1){
			$update = $db->prepare("UPDATE test_stand set serial_id='".$td1."',family='".$td2."',tst_pf='".$td3."',rack='".$td5."',line='".$td4."' WHERE id='".$td0."'");
			if ($update->execute()) {
				echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}else{
			if ($count >= 1) {
				echo '<div class="alert alert-danger" role="alert" id="message" for="name"><b>Serial ID already exist!</b></div>';
			}else{
				$update = $db->prepare("UPDATE test_stand set serial_id='".$td1."',family='".$td2."',tst_pf='".$td3."',rack='".$td5."',line='".$td4."' WHERE id='".$td0."'");
				if ($update->execute()) {
					echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record updated <strong>successfully</strong></b></div>';
				} else {
					echo "Error updating record: " . mysqli_error($conn);
				}
			}
		}
		break;
	default:
		break;
}
?>
