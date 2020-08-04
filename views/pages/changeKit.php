
<button id="showModal" class="btn btn-primary" data-toggle="modal" data-target="#bd-example-modal-lg" style="display: none;" >
</button>

<?php
	if(!empty($_SESSION['userEmail'])){
?>
		<form id="saveData" method="post" action="models/changeKit/saveCK.php" enctype="multipart/form-data">
		<!-- <form id="saveData" method="post" action="" enctype="multipart/form-data"> -->
			<div class="col-xs-6 form-group">
				<div class="modal" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog change-kit-size" role="document">
					
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
										<?php if ($_SESSION['level'] != ""){ ?>
										<label id="trackOut" class="btn btn-outline-success">
											<input class="trackIn" name="track" value="OUT" id="" type="radio" autocomplete="off" required=""> TRACK OUT
										</label>
										<?php } ?>
									</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									SERIAL ID:<input id="" name="srid" type="text" class="form-control mb-2 getSrID" readonly="" tabindex="-1">
									CATEGORY:<input id="" name="category" type="text" class="form-control mb-2 getCategory" readonly="" tabindex="-1">
									WORK PRESS ASSEMBLY:<input id="" name="workpress-assembly" type="text" class="form-control mb-2 getWorkplessAssembly" readonly="" tabindex="-1">
									TRAY PLATE:<input id="" name="tray-plate" type="text" class="form-control mb-2 getTrayPlate" readonly="" tabindex="-1">
									SOAK BOAT:<input id="" name="soak-boat" type="text" class="form-control mb-2 getSoakBoat" readonly="" tabindex="-1">		
									PEAKER:<input id="" name="peaker" type="text" class="form-control mb-2 getPeaker" readonly="" tabindex="-1">
									UNLOADER MAGAZINE NG LANE:<input id="" name="unloader-magazine-ng-lane" type="text" class="form-control mb-2 getUnloaderMagazineNGLane" readonly="" tabindex="-1">
									LOADER:<input id="" name="loader" type="text" class="form-control mb-2 getLoader" readonly="" tabindex="-1">
									CONTACTOR:<input id="" name="contactor" type="text" class="form-control mb-2 getContactor" readonly="" tabindex="-1">
									TOTAL:<input id="" name="total" type="text" class="form-control mb-2 getTotal" readonly="" tabindex="-1">
									PACKAGE TYPE:<input id="" name="package" type="text" class="form-control mb-2 getPackage" readonly="" tabindex="-1">
									BASE PLATE:<input id="" name="base-plate" type="text" class="form-control mb-2 getBasePlate" readonly="" tabindex="-1">	
									PUSHER:<input id="" name="pusher" type="text" class="form-control mb-2 getPusher" readonly="" tabindex="-1">	
									TESTER PF:<input id="getTstPF" name="tstPf" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									<!-- LOADBOARD ID:<input id="getLBID" name="lbid" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									FAMILY:<input id="getFam" name="family" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									VENDOR:<input id="getVen" name="vendor" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									TESTER PF:<input id="getTstPF" name="tstPf" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									LINE:<input id="getLine" name="line" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									RACK:<input id="getStrg" name="storage" type="text" class="form-control mb-2" readonly="" tabindex="-1"> -->
								</div>
								<div class="col-sm-3">
									HANDLER PLATFORM:<input id="" name="handler-platform" type="text" class="form-control mb-2 getHandlerPlatform" readonly="" tabindex="-1">
									SIZE:<input id="" name="size" type="text" class="form-control mb-2 getSize" readonly="" tabindex="-1">
									INPUT SHUTTLE:<input id="" name="input-shuttle" type="text" class="form-control mb-2 getInputShuttle" readonly="" tabindex="-1">	

									TRAY POKAYOKE:<input id="" name="tray-pokayoke" type="text" class="form-control mb-2 getTrayPokayoke" readonly="" tabindex="-1">	
									ROTATOR LOADER:<input id="" name="rotator-loader" type="text" class="form-control mb-2 getRotatorLoader" readonly="" tabindex="-1">	
									CHUCK:<input id="" name="chuck" type="text" class="form-control mb-2 getChuck" readonly="" tabindex="-1">
									UNLOADER PLASTIC MAGAZINE GOOD LANE:<input id="" name="unloader-magazine-plastic-good-lane" type="text" class="form-control mb-2 getUnloaderPlasticMagazineGoodLane" readonly="" tabindex="-1">
									LOADER MAGAZINE:<input id="" name="loader-magazine" type="text" class="form-control mb-2 getLoaderMagazine" readonly="" tabindex="-1">
									
									STABILIZER:<input id="" name="stabilizer" type="text" class="form-control mb-2 getStabilizer" readonly="" tabindex="-1">
									PRE-HEAT PLATE:<input id="" name="preheat-plate" type="text" class="form-control mb-2 getPreheatPlate" readonly="" tabindex="-1">
									LEAD GUIDE:<input id="" name="lead-guide" type="text" class="form-control mb-2 getLeadGuide" readonly="" tabindex="-1">
									POOL CHUTE:<input id="" name="pool-chute" type="text" class="form-control mb-2 getPoolChute" readonly="" tabindex="-1">
									FINAL RESULT:<input id="" name="final-result" type="text" class="form-control mb-2 getFinalResult" readonly="" tabindex="-1">	
									LINE:<input id="getLine" name="line" type="text" class="form-control mb-2" readonly="" tabindex="-1">	
				
									<!-- CLIENT :<input list="users" name="borrower" type="text" class="form-control mb-2" required="">
									<datalist id="users">
										<?php include("./models/users.php"); ?>
									</datalist>
									TESTER ID:<div id="getTstID"></div>
									HANDLER ID:<input list="handlerList" id="getHdID" name="hdID" type="text" class="form-control mb-2" required="">
									<span id="hdDataList"></span>
									STATUS:<select id="getStats" name="status" class="form-control mb-2" required="" disabled>
									</select>
									LOCATION:<select id="getLoc" name="loc" class="form-control mb-2" required="">
									</select>
									REMARKS:<textarea id="remarks" name="remarks" class="form-control mb-2" rows="3"></textarea> -->
								</div>
								<div class="col-sm-3">
									STORAGE:<input id="" name="storage" type="text" class="form-control mb-2 getStorage" readonly="" tabindex="-1">
									WORK PRESS:<input id="" name="workpress" type="text" class="form-control mb-2 getWorkpress" readonly="" tabindex="-1">
									OUTPUT SHUTTLE:<input id="" name="output-shuttle" type="text" class="form-control mb-2 getOutputShuttle" readonly="" tabindex="-1">	

									COOLING SHUTTLE:<input id="" name="cooling-shuttle" type="text" class="form-control mb-2 getCoolingShuttle" readonly="" tabindex="-1">
									ROTATOR UNLOADER:<input id="" name="rotator-unloader" type="text" class="form-control mb-2 getRotatorUnloader" readonly="" tabindex="-1">
									HOT PLATE:<input id="" name="hot-plate" type="text" class="form-control mb-2 getHotPlate" readonly="" tabindex="-1">	
									NOZZLE:<input id="" name="nozzle" type="text" class="form-control mb-2 getNozzle" readonly="" tabindex="-1">
									CENTER JIG:<input id="" name="center-jig" type="text" class="form-control mb-2 getCenterJig" readonly="" tabindex="-1">
									UNLOADER MAGAZINE:<input id="" name="unloader-magazine" type="text" class="form-control mb-2 getUnloaderMagazine" readonly="" tabindex="-1">
									
									LOADER GOOD MAGAZINE:<input id="" name="loader-good-magazine" type="text" class="form-control mb-2 getLoaderGoodMagazine" readonly="" tabindex="-1">
									TEST SITE:<input id="" name="test-site" type="text" class="form-control mb-2 getTestSite" readonly="" tabindex="-1">
									SOCKET JIG:<input id="" name="socket-jig" type="text" class="form-control mb-2 getSocketJig" readonly="" tabindex="-1">	
									
									FREE TEST CHUTE:<input id="" name="free-test-chute" type="text" class="form-control mb-2 getFreeTestChute" readonly="" tabindex="-1">
								</div>
								<div class="col-sm-3">
									CLIENT :<input list="users" name="borrower" type="text" class="form-control mb-2" required="">
									<datalist id="users">
										<?php include("./models/users.php"); ?>
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
								<div class="col-sm-12">
								SUPPORT FILE:
													<!-- <input type="file" class="custom-file-input" id="inputGroupFile01" required=""> -->
													<input id="" class="form-control-file mb-2" name="sfile" type="file" value="Choose file" accept=".jpg, .txt, .doc, .docx, .pdf, .xlsx, .csv, .jpeg, .jpg, .png, .bmp, .msg, .asc, .zip">
													<!-- <label class="custom-file-label" for="inputGroupFile01" >Choose file</label> -->
								</div>
								<div class="col-sm-12">
									<br>
									<div class="progress">
										<div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<div id="msg" style="display: none;"></div>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" name="submit" class="btn btn-primary">Save changes</button>
						</div>
<?php	}else{ ?>
		<form class="signIn" method="post" action="?controller=posts&action=signin" enctype="multipart/form-data">
		<div class="col-xs-6 form-group">
			<div class="modal" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">CHANGE KIT</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
				<span aria-hidden="true">×</span>
			</button>
		</div>
		<div class="modal-body">
				<div class="row d-flex justify-content-center">
					<form class="dropdown-menu p-4 dropdown-menu-right" method="post" action="?controller=posts&action=signin">
						<div class="form-group">
							<label>User name</label>
							<input name="username" type="text" class="form-control myusername2">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input name="password" type="password" class="form-control mypassword2">
						</div>
				</div>
		</div>
		<div class="modal-footer">
			<input type="button" class="btn btn-primary signin2" value="Sign in">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
<?php	}
?>

</div>
</div>
</div>
</div>
</form>

<style>

</style>


<script>
function getresult(url) {
	$.ajax({
		url: url,
		type: "GET",
		data:  {rowcount:$("#rowcount").val(),"pagination_setting":$("#pagination-setting").val()},
		beforeSend: function(){$("#overlay").show();},
		success: function(data){
		$("#pagination-result").html(data);
		setInterval(function() {$("#overlay").hide(); },500);
		},
		error: function()
		{}
   });
}
function changePagination(option) {
	if(option!= "") {
		getresult("models/changeKit/pagiResCK.php");
	}
}
</script>
</HEAD>

<BODY>
<div id="overlay"><div><img src="public/img/loading.svg" width="64px" height="64px"/></div></div>
<div class="page-content"  style="width: 1600px;">
	<div style="border-bottom: #F0F0F0 1px solid;margin-bottom: 15px;">
		<h2>CHANGE KIT SECTION</h2>
		<div class="form-group">
		<div class="row">
		<div class="col-md-4"><label for="name">Change Kit ID:</label><input type="text" class="form-control" id="ckID">

		</div>
		<!-- <div class="col-md-3">
			<label for="name">Pagination Setting:</label>
			<select name="pagination-setting" onChange="changePagination(this.value);" class="form-control" id="pagination-setting">
			<option value="all-links">Display All Page Link</option>
			<option value="prev-next">Display Prev Next Only</option>
			</select>
		</div> -->
		</div>
		</div>

	<br>
	</div>
	<div id="pagination-result">
	<input type="hidden" name="rowcount" id="rowcount" />
	</div>
</div>
<script>
getresult("models/changeKit/pagiResCK.php");
</script>
