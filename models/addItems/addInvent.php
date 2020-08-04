<?php
$cat = $_POST['id'];

switch ($cat)
{
	case "LOADBOARD":
		include('addLB.php');
		break;
	case "SOCKET":
	include('addSocket.php');
		break;
	case "GNG":
		include('addGNG.php');
		break;
	case "BIB":
		include('addBIB.php');
		break;
	case "NOZZLE":
		include('addNozzle.php');
		break;
	case "CHIPMOUNT NOZZLE":
		include('addChipmountNozzle.php');
		break;	
	case "IC":
		include('addIC.php');
		break;
	case "MC":
		include('addMC.php');
		break;
	case "WP":
		include('addWP.php');
		break;
	case "SB":
		include('addSocketBoard.php');
		break;
	case "ATC":
		include('addATC.php');
		break;
	case "CABLE":
		include('addCable.php');
		break;
	case "TT":
		include('addTT.php');
		break;
	case "CK":
		include('addCK.php');
		break;
	case "TP":
		include('addTP.php');
		break;
	case "CB":
		include('addCB.php');
		break;
	case "TFD":
		include('addTFD.php');
		break;
	case "RC":
		include('addRC.php');
		break;
	case "SP":
		include('addSP.php');
		break;
	case "PG":
		include('addPG.php');
		break;
	case "COLLET":
		include('addCollet.php');
		break;
	case "SPANKER":
		include('addSpanker.php');
		break;		
	default:
		break;
}
?>
