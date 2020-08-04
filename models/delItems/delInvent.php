<?php
$cat = $_POST['id'];

switch ($cat)
{
	case "LOADBOARD":
		include('delInventLB.php');
		break;
	case "SOCKET":
	include('delInventSocket.php');
		break;
	case "GNG":
		include('delInventGNG.php');
		break;
	case "BIB":
		include('delInventBIB.php');
		break;
	case "NOZZLE":
		include('delInventNozzle.php');
		break;
	case "CHIPMOUNT NOZZLE":
		include('delInventChipmountNozzle.php');
		break;		
	case "IC":
		include('delInventIC.php');
		break;
	case "MC":
		include('delInventMC.php');
		break;
	case "WP":
		include('delInventWP.php');
		break;
	case "SB":
		include('delInventSocketBoard.php');
		break;
	case "ATC":
		include('delInventATC.php');
		break;
	case "CK":
		include('delInventCK.php');
		break;
	case "TP":
		include('delInventTP.php');
		break;
	case "CB":
		include('delInventCB.php');
		break;
	case "TFD":
		include('delInventTFD.php');
		break;
	case "RC":
		include('delInventRC.php');
		break;
	case "SP":
		include('delInventSP.php');
		break;
	case "PG":
		include('delInventPG.php');
		break;
	case "CABLE":
		include('delInventCable.php');
		break;
	case "COLLET":
		include('delInventCollet.php');
		break;	
	case "SPANKER":
		include('delInventSpanker.php');
		break;			
	default:
		break;
}
?>
