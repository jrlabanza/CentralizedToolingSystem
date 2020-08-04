<?php
require('../../frameworks/ajaxConn.php');
//
// echo '<select id="getTstID" name="tstID" type="text" class="form-control" required="">';
// if($_POST['id']){
// 	$id=$_POST['id'];
// 	$result = $conn->query('SELECT tester_id FROM testers WHERE tst_pf="'.$id.'"');
// 	while ($row = $result->fetch_assoc()) {
// 		echo '<option value="'.$row['tester_id'].'">'.$row['tester_id'].'</option>';
// 	}
// }else{
// }
// echo '</select>';
// mysqli_close($conn);


if($_POST['id']){
	$id=$_POST['id'];
	$result = $conn->query('SELECT * FROM ck WHERE serial_id="'.$id.'"');
	while ($row = $result->fetch_assoc()) {
		$status = $row['status'];
?>
						
			<form id="saveData" method="post" action="models/changeKit/saveCK.php" enctype="multipart/form-data">
		<!-- <form id="saveData" method="post" action="" enctype="multipart/form-data"> -->
			<div class="col-xs-6 form-group">
				<div class="" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="" role="document">
					
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">CHANGE KIT</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">

							<!-- confirm -->
							<div class="confirmModal" id="exampleModalCentered" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true" style="background-color: rgba(10, 10, 10, 0.5); overflow: float; position: fixed; top: 0; bottom: 0; left: 0; right: 0; z-index:1052; display: none;">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenteredLabel">CONFIRMATION</h5>
									<button type="button" class="close dismissConfirmModal" aria-label="Close">
									<span aria-hidden="true">x</span>
									</button>
								</div>
								<div class="modal-body">
								There is/are item attached to this Machine ID. Please enter the word <strong style="color:blue;">PROCEED</strong> to continue.<input type="text" class="form-control mb-2 confirmPass">
								</div>
								<div class="modal-footer">
									<button id="cancel" type="button" class="btn btn-secondary dismissConfirmModal" data-dismiss="confirmModal">Cancel</button>
									<button id="confirmed" type="button" class="btn btn-primary">Save changes</button>
								</div>
								</div>
							</div>
							</div>
							<!-- end of confirm -->
							<div class="row d-flex justify-content-center">
									<div class="btn-group btn-group-toggle mb-2" data-toggle="buttons">
										<label id="trackIn" class="btn btn-outline-primary">
											<input class="trackIn" name="track" value="IN" id="" type="radio" autocomplete="off" required=""> TRACK IN
										</label>
<?php if ($_SESSION['level'] != ""){ 
	
	if ($status == "OUT-PROD" || $status == "OUT-REPAIR" || $status == "OUT-ENGG" || $status == "PM" || $status == "FOR SCRAP"){}
	else{?>
											<label id="trackOut" class="btn btn-outline-success">
												<input name="track" value="OUT" id="" type="radio" autocomplete="off" required=""> TRACK OUT
											</label>
<?php }} ?>
													</div>
											</div>
											<br>
										<div class="row">
											<div class="col-sm-3">
												SERIAL ID:<input id="getSerID" name="srid" type="text" class="form-control mb-2" readonly="" tabindex="-1" value="<?php echo $row['serial_id'] ?>">
												CATEGORY:<input id="" name="category" type="text" class="form-control mb-2 getCategory" readonly="" tabindex="-1" value="<?php echo $row['category'] ?>">
												WORK PRESS ASSEMBLY:<input id="" name="workpress-assembly" type="text" class="form-control mb-2 getWorkplessAssembly" readonly="" tabindex="-1" value="<?php echo $row['workPressAssembly'] ?>">
												TRAY PLATE:<input id="" name="tray-plate" type="text" class="form-control mb-2 getTrayPlate" readonly="" tabindex="-1"> value="<?php echo $row['trayPlate'] ?>"
												SOAK BOAT:<input id="" name="soak-boat" type="text" class="form-control mb-2 getSoakBoat" readonly="" tabindex="-1" value="<?php echo $row['soakBoat'] ?>">		
												PEAKER:<input id="" name="peaker" type="text" class="form-control mb-2 getPeaker" readonly="" tabindex="-1" value="<?php echo $row['peaker'] ?>">
												UNLOADER MAGAZINE NG LANE:<input id="" name="unloader-magazine-ng-lane" type="text" class="form-control mb-2 getUnloaderMagazineNGLane" readonly="" tabindex="-1" value="<?php echo $row['unloaderMagazineNGLane'] ?>"> 
												LOADER:<input id="" name="loader" type="text" class="form-control mb-2 getLoader" readonly="" tabindex="-1" value="<?php echo $row['loader'] ?>">
												CONTACTOR:<input id="" name="contactor" type="text" class="form-control mb-2 getContactor" readonly="" tabindex="-1" value="<?php echo $row['contactor'] ?>">
												TOTAL:<input id="" name="total" type="text" class="form-control mb-2 getTotal" readonly="" tabindex="-1" value="<?php echo $row['total'] ?>">
												PACKAGE TYPE:<input id="" name="package" type="text" class="form-control mb-2 getPackage" readonly="" tabindex="-1" value="<?php echo $row['package_type'] ?>">
												BASE PLATE:<input id="" name="base-plate" type="text" class="form-control mb-2 getBasePlate" readonly="" tabindex="-1" value="<?php echo $row['basePlate'] ?>">	
												PUSHER:<input id="" name="pusher" type="text" class="form-control mb-2 getPusher" readonly="" tabindex="-1" value="<?php echo $row['pusher'] ?>">	
												TESTER PF:<input id="getTstPF" name="tstPf" type="text" class="form-control mb-2" readonly="" tabindex="-1" value="<?php echo $row['tester_pf'] ?>">
											</div>
											<div class="col-sm-3">
												HANDLER PLATFORM:<input id="" name="handler-platform" type="text" class="form-control mb-2 getHandlerPlatform" readonly="" tabindex="-1" value="<?php echo $row['handler_pf'] ?>">
												SIZE:<input id="" name="size" type="text" class="form-control mb-2 getSize" readonly="" tabindex="-1" value="<?php echo $row['size'] ?>">
												INPUT SHUTTLE:<input id="" name="input-shuttle" type="text" class="form-control mb-2 getInputShuttle" readonly="" tabindex="-1" value="<?php echo $row['inputShuttle'] ?>">	
												TRAY POKAYOKE:<input id="" name="tray-pokayoke" type="text" class="form-control mb-2 getTrayPokayoke" readonly="" tabindex="-1" value="<?php echo $row['trayPokayoke'] ?>">	
												ROTATOR LOADER:<input id="" name="rotator-loader" type="text" class="form-control mb-2 getRotatorLoader" readonly="" tabindex="-1" value="<?php echo $row['rotatorLoader'] ?>">	
												CHUCK:<input id="" name="chuck" type="text" class="form-control mb-2 getChuck" readonly="" tabindex="-1" value="<?php echo $row['chuck'] ?>">
												UNLOADER PLASTIC MAGAZINE GOOD LANE:<input id="" name="unloader-magazine-plastic-good-lane" type="text" class="form-control mb-2 getUnloaderPlasticMagazineGoodLane" readonly="" tabindex="-1" value="<?php echo $row['unloaderPlasticGoodLane'] ?>">
												LOADER MAGAZINE:<input id="" name="loader-magazine" type="text" class="form-control mb-2 getLoaderMagazine" readonly="" tabindex="-1" value="<?php echo $row['loaderMagazine'] ?>">
												
												STABILIZER:<input id="" name="stabilizer" type="text" class="form-control mb-2 getStabilizer" readonly="" tabindex="-1" value="<?php echo $row['stabilizer'] ?>">
												PRE-HEAT PLATE:<input id="" name="preheat-plate" type="text" class="form-control mb-2 getPreheatPlate" readonly="" tabindex="-1" value="<?php echo $row['preheatPlate'] ?>">
												LEAD GUIDE:<input id="" name="lead-guide" type="text" class="form-control mb-2 getLeadGuide" readonly="" tabindex="-1" value="<?php echo $row['leadGuide'] ?>">
												POOL CHUTE:<input id="" name="pool-chute" type="text" class="form-control mb-2 getPoolChute" readonly="" tabindex="-1" value="<?php echo $row['poolChute'] ?>">
												FINAL RESULT:<input id="" name="final-result" type="text" class="form-control mb-2 getFinalResult" readonly="" tabindex="-1" value="<?php echo $row['ckResult'] ?>">	
												LINE:<input id="getLine" name="line" type="text" class="form-control mb-2" readonly="" tabindex="-1" value="<?php echo $row['line'] ?>">

												<!-- HANDLER PLATFORM:<input id="getHDPF" name="handlerPlatform" type="text" class="form-control mb-2" readonly="" tabindex="-1" value="<?php echo $row['handler_pf'] ?>">
												CLIENT :<input name="borrower" type="text" class="form-control mb-2" required="">
												TESTER ID:<select id="getTstID" name="tstID" type="text" class="form-control mb-2" required="">
												</select>
												HANDLER ID:<input list="handlerList" id="getHdID" name="hdID" type="text" class="form-control mb-2" required="">
                                                <datalist id="handlerList"><?php

												// $result = $conn->query('SELECT handler_id FROM handlers');
												// while ($row3 = $result->fetch_assoc()) {
												// 	echo '<option value="'.$row3['handler_id'].'">'.$row3['handler_id'].'</option>';
                                                // }?>
                                                </datalist>
												STATUS:<select id="getStats" name="status" class="form-control mb-2" required="" disabled>
												<?php
													// echo '<option value="'.$row['status'].'" selected>'.$row['status'].'</option>';
												?>
												</select>
												LOCATION:<select id="" name="loc" class="form-control mb-2" required="" disabled>
												<?php
													// echo '<option value="'.$row['loc'].'" selected>'.$row['loc'].'</option>';
												?>
												</select>
												REMARKS:<textarea id="remarks" name="remarks" class="form-control mb-2" rows="3"></textarea> -->
												
											</div>
											<div class="col-sm-3">
												STORAGE:<input id="" name="storage" type="text" class="form-control mb-2 getStorage" readonly="" tabindex="-1" value="<?php echo $row['storage'] ?>">
												WORK PRESS:<input id="" name="workpress" type="text" class="form-control mb-2 getWorkpress" readonly="" tabindex="-1" value="<?php echo $row['workPress'] ?>">
												OUTPUT SHUTTLE:<input id="" name="output-shuttle" type="text" class="form-control mb-2 getOutputShuttle" readonly="" tabindex="-1" value="<?php echo $row['outputShuttle'] ?>">	

												COOLING SHUTTLE:<input id="" name="cooling-shuttle" type="text" class="form-control mb-2 getCoolingShuttle" readonly="" tabindex="-1" value="<?php echo $row['coolingShuttle'] ?>">
												ROTATOR UNLOADER:<input id="" name="rotator-unloader" type="text" class="form-control mb-2 getRotatorUnloader" readonly="" tabindex="-1" value="<?php echo $row['rotatorUnloader'] ?>">
												HOT PLATE:<input id="" name="hot-plate" type="text" class="form-control mb-2 getHotPlate" readonly="" tabindex="-1" value="<?php echo $row['hotPlate'] ?>">	
												NOZZLE:<input id="" name="nozzle" type="text" class="form-control mb-2 getNozzle" readonly="" tabindex="-1" value="<?php echo $row['nozzle'] ?>">
												CENTER JIG:<input id="" name="center-jig" type="text" class="form-control mb-2 getCenterJig" readonly="" tabindex="-1" value="<?php echo $row['centeringJig'] ?>">
												UNLOADER MAGAZINE:<input id="" name="unloader-magazine" type="text" class="form-control mb-2 getUnloaderMagazine" readonly="" tabindex="-1" value="<?php echo $row['unloaderMagazine'] ?>">
												
												LOADER GOOD MAGAZINE:<input id="" name="loader-good-magazine" type="text" class="form-control mb-2 getLoaderGoodMagazine" readonly="" tabindex="-1" value="<?php echo $row['loaderGoodMagazine'] ?>">
												TEST SITE:<input id="" name="test-site" type="text" class="form-control mb-2 getTestSite" readonly="" tabindex="-1" value="<?php echo $row['testSite'] ?>">
												SOCKET JIG:<input id="" name="socket-jig" type="text" class="form-control mb-2 getSocketJig" readonly="" tabindex="-1" value="<?php echo $row['socketJig'] ?>">	
												
												FREE TEST CHUTE:<input id="" name="free-test-chute" type="text" class="form-control mb-2 getFreeTestChute" readonly="" tabindex="-1" value="<?php echo $row['freeTestChute'] ?>">
											</div>
											<div class="col-sm-3">
												CLIENT :<input list="users" name="borrower" type="text" class="form-control mb-2" required="">
												<datalist id="users">
													<?php include("../trackUsers.php"); ?>
												</datalist>
												TESTER ID:<select id="getTstID" name="tstID" type="text" class="form-control mb-2" required=""></select>
												HANDLER ID:<input list="handlerList" id="getHdID" name="hdID" type="text" class="form-control mb-2" required="">
                                                <datalist id="handlerList"></datalist>
												STATUS:<select id="getStats" name="status" class="form-control mb-2" required="" disabled>
												</select>
												LOCATION:<select id="getLoc" name="loc" class="form-control mb-2" required="">
												</select>
												REMARKS:<textarea id="remarks" name="remarks" class="form-control mb-2" rows="3"></textarea>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
											SUPPORT FILE:
																	<!-- <input type="file" class="custom-file-input" id="inputGroupFile01" required=""> -->
																	<input id="" class="form-control" name="sfile" type="file" value="Choose file" accept=".jpg, .txt, .doc, .docx, .pdf, .xlsx, .csv, .jpeg, .jpg, .png, .bmp, .msg, .asc">
																	<!-- <label class="custom-file-label" for="inputGroupFile01" >Choose file</label> -->
										</div>
										<div class="col-sm-12">
											<br>
											<div class="progress">
												<div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<div id="msg" style="display: none;"></div>
										<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
										<button type="submit" name="submit" class="btn btn-primary">Save changes</button>
									</div>
<?php	}
}else if($_POST['id'] == ""){
}
mysqli_close($conn);
?>
