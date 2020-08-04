<?php
require('../../frameworks/ajaxConn.php');
date_default_timezone_set("Asia/Manila");
$dates=(date("y.m.d Hi "));

if(!empty($_FILES)){
    if(is_uploaded_file($_FILES['sfile']['tmp_name'])){
        sleep(1);
        $source_path = $_FILES['sfile']['tmp_name'];
        $fileName=$dates.$_FILES['sfile']['name'];
        $fileName = preg_replace("/[^a-zA-Z0-9.]/", "_", $fileName);
        $target_path = 'uploads/' . $fileName;
        if(move_uploaded_file($source_path, '../../uploads/'.$fileName)){
            echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record successfully save</b></div>';
        }
    }
}

if(empty($fileName)){
    $fileName = '';
}
// $srid = $_POST['srid'];
// $lb_id = $_POST['lbid'];
// $family = $_POST['family'];
$tst_pf = $_POST['tstPf'];
// $tstID = $_POST['tstID'];
// $hdID = $_POST['hdID'];
// $status = $_POST['status'];
// $loc = $_POST['loc'];
// $storage = $_POST['storage'];
$line = $_POST['line'];
// $vendor = $_POST['vendor'];
// $track = $_POST['track'];
// $borrower = $_POST['borrower'];
// $remarks = $_POST['remarks'];

//$clerk = $_POST['clerk'];
//$db = Db::getInstance();

$category = $_POST['category'];
$handlerPF = $_POST['handler-platform'];
$storage = $_POST['storage'];
$srid = $_POST['srid'];
$size = $_POST['size'];
$workpress = $_POST['workpress'];
$workpressAssembly = $_POST['workpress-assembly'];
$inputShuttle = $_POST['input-shuttle'];
$outputShuttle = $_POST['output-shuttle'];
$trayPlate = $_POST['tray-plate'];
$trayPokayoke = $_POST['tray-pokayoke'];
$coolingShuttle = $_POST['cooling-shuttle'];
$soakBoat = $_POST['soak-boat'];
$rotatorLoader = $_POST['rotator-loader'];
$rotatorUnloader = $_POST['rotator-unloader'];
$hotPlate = $_POST['hot-plate'];
$peaker = $_POST['peaker'];
$chuck = $_POST['chuck'];
$nozzle = $_POST['nozzle'];
$unloaderMagazineNGLane = $_POST['unloader-magazine-ng-lane'];
$unloaderPlasticMagazineGoodLane = $_POST['unloader-magazine-plastic-good-lane'];
$centerJig = $_POST['center-jig'];
$loader = $_POST['loader'];
$loaderMagazine = $_POST['loader-magazine'];
$unloaderMagazine = $_POST['unloader-magazine'];
$contactor = $_POST['contactor'];
$stabilizer = $_POST['stabilizer'];
$loaderGoodMagazine = $_POST['loader-good-magazine'];
$total = $_POST['total'];
$testSite = $_POST['test-site'];
$package = $_POST['package'];
$preheatPlate = $_POST['preheat-plate'];
$basePlate = $_POST['base-plate'];
$leadGuide = $_POST['lead-guide'];
$socketJig = $_POST['socket-jig'];
$pusher = $_POST['pusher'];
$poolChute = $_POST['pool-chute'];
$freeTestChute = $_POST['free-test-chute'];
$ckResult = $_POST['final-result'];

$borrower = $_POST['borrower'];
$tstID = $_POST['tstID'];
$hdID = $_POST['hdID'];
$status = $_POST['status'];
$loc = $_POST['loc'];
$remarks = $_POST['remarks'];

$updateSQL ="UPDATE ck set status='$status',tester_id='$tstID',handler_id='$hdID', loc='$loc', remarks='$remarks' WHERE serial_id = '$srid'";

$insertSQL = "INSERT INTO ck_history(category,handler_pf,storage,package_type,serial_id,size,workPress,workPressAssembly,inputShuttle,outputShuttle,coolingShuttle,socketJig,
trayPlate,trayPokayoke,hotPlate,basePlate,soakBoat,rotatorLoader,rotatorUnloader,nozzle,preheatPlate,peaker,chuck,centeringJig,poolChute,unloaderMagazineNGLane,
unloaderPlasticGoodLane,loader,pusher,loaderMagazine,unloaderMagazine,loaderGoodMagazine,leadGuide,contactor,stabilizer,testSite,freeTestChute,total,
ckResult,sFile,borrower,custodian,tester_id,handler_id,status,loc,remarks,line,tester_pf) VALUES ('$category', '$handlerPF', '$storage','$package',
'$srid','$size','$workpress','$workpressAssembly','$inputShuttle','$outputShuttle','$coolingShuttle','$socketJig',
'$trayPlate','$trayPokayoke', '$hotPlate','$basePlate', '$soakBoat', '$rotatorLoader', '$rotatorUnloader','$nozzle','$preheatPlate',
'$peaker','$chuck','$centerJig','$poolChute','$unloaderMagazineNGLane','$unloaderPlasticMagazineGoodLane','$loader','$pusher','$loaderMagazine',
'$unloaderMagazine','$loaderGoodMagazine','$leadGuide','$contactor','$stabilizer','$testSite','$freeTestChute','$total','$ckResult',
'$fileName','$_SESSION[userEmail]','$borrower','$tstID','$hdID','$status','$loc','$remarks','$line','$tst_pf')";

$conn->query($updateSQL);

$conn->query($insertSQL);

//header('Location: ?controller=pages&action=trkLB');
mysqli_close($conn);
?>