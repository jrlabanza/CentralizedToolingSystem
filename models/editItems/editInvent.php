<?php
$cat = $_POST['id'];

switch ($cat)
{
	case "LOADBOARD":
		include('editInventLB.php');
		break;
	case "SOCKET":
	include('editInventSocket.php');
		break;
	case "GNG":
		include('editInventGNG.php');
		break;
	case "BIB":
		include('editInventBIB.php');
		break;
	case "NOZZLE":
		include('editInventNozzle.php');
		break;
	case "CHIPMOUNT NOZZLE":
		include('editInventChipmountNozzle.php');
		break;	
	case "IC":
		include('editInventIC.php');
		break;
	case "MC":
		include('editInventMC.php');
		break;
	case "WP":
		include('editInventWP.php');
		break;
	case "SB":
		include('editInventSocketBoard.php');
		break;
	case "ATC":
		include('editInventATC.php');
		break;
	case "CK":
		include('editInventCK.php');
		break;
	case "TP":
		include('editInventTP.php');
		break;
	case "CB":
		include('editInventCB.php');
		break;
	case "TFD":
		include('editInventTFD.php');
		break;
	case "RC":
		include('editInventRC.php');
		break;
	case "SP":
		include('editInventSP.php');
		break;
	case "PG":
		include('editInventPG.php');
		break;
	case "CABLE":
		include('editInventCable.php');
		break;	
	case "COLLET":
		include('editInventCollet.php');
		break;	
	case "SPANKER":
		include('editInventSpanker.php');
		break;
	case "TT":
		include('editInventTT.php');
		break;				
	default:
		break;
}

?>
