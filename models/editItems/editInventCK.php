<button id="showModal" class="btn btn-primary" data-toggle="modal" data-target="#bd-example-modal-lg" style="display: none;" >
</button>

<form method="post" action="" enctype="multipart/form-data">
	<div class="col-xs-6 form-group">
		<div class="modal" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">UPDATE CHANGE KIT INFORMATION</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
				<div class="row">
				<div class="col-sm-4">
					<input id="gettd0" name="tblid" type="text" class="form-control mb-2 getID" style="display: none;">
					SERIAL ID:<input id="gettd1" name="srid" type="text" class="form-control mb-2 getSrID" tabindex="-1">
					CATEGORY:<input id="gettd4" name="category" type="text" class="form-control mb-2 getCategory" tabindex="-1">
					WORK PRESS ASSEMBLY:<input id="gettd7" name="workpress-assembly" type="text" class="form-control mb-2 getWorkplessAssembly " tabindex="-1">
					TRAY PLATE:<input id="gettd10" name="tray-plate" type="text" class="form-control mb-2 getTrayPlate " tabindex="-1">
					SOAK BOAT:<input id="gettd13" name="soak-boat" type="text" class="form-control mb-2 getSoakBoat" tabindex="-1">		
					PEAKER:<input id="gettd16" name="peaker" type="text" class="form-control mb-2 getPeaker" tabindex="-1">
					UNLOADER MAGAZINE NG LANE:<input id="gettd19" name="unloader-magazine-ng-lane" type="text" class="form-control mb-2 getUnloaderMagazineNGLane" tabindex="-1">
					LOADER:<input id="gettd22" name="loader" type="text" class="form-control mb-2 getLoader" tabindex="-1">
					CONTRACTOR:<input id="gettd25" name="contactor" type="text" class="form-control mb-2 getContactor" tabindex="-1">
					TOTAL:<input id="gettd28" name="total" type="text" class="form-control mb-2 getTotal" tabindex="-1">
					PACKAGE TYPE:<input id="gettd31" name="package" type="text" class="form-control mb-2 getPackage" tabindex="-1">
					BASE PLATE:<input id="gettd34" name="base-plate" type="text" class="form-control mb-2 getBasePlate" tabindex="-1">	
					PUSHER:<input id="gettd37" name="pusher" type="text" class="form-control mb-2 getPusher" tabindex="-1">	
					TESTER PF<input id="gettd40" name="tstPF" type="text" class="form-control mb-2" required="">
					<!-- LOADBOARD ID:<input id="getLBID" name="lbid" type="text" class="form-control mb-2" readonly="" tabindex="-1">
					FAMILY:<input id="getFam" name="family" type="text" class="form-control mb-2" readonly="" tabindex="-1">
					VENDOR:<input id="getVen" name="vendor" type="text" class="form-control mb-2" readonly="" tabindex="-1">
					TESTER PF:<input id="getTstPF" name="tstPf" type="text" class="form-control mb-2" readonly="" tabindex="-1">
					LINE:<input id="getLine" name="line" type="text" class="form-control mb-2" readonly="" tabindex="-1">
					RACK:<input id="getStrg" name="storage" type="text" class="form-control mb-2" readonly="" tabindex="-1"> -->
				</div>
				<div class="col-sm-4">
					HANDLER PLATFORM:<input id="gettd2" name="handler-platform" type="text" class="form-control mb-2 getHandlerPlatform" tabindex="-1">
					SIZE:<input id="gettd5" name="size" type="text" class="form-control mb-2 getSize" tabindex="-1">
					INPUT SHUTTLE:<input id="gettd8" name="input-shuttle" type="text" class="form-control mb-2 getInputShuttle" tabindex="-1">	

					TRAY POKAYOKE:<input id="gettd11" name="tray-pokayoke" type="text" class="form-control mb-2 getTrayPokayoke" tabindex="-1">	
					ROTATOR LOADER:<input id="gettd14" name="rotator-loader" type="text" class="form-control mb-2 getRotatorLoader" tabindex="-1">	
					CHUCK:<input id="gettd17" name="chuck" type="text" class="form-control mb-2 getChuck" tabindex="-1">
					UNLOADER PLASTIC MAGAZINE GOOD LANE:<input id="gettd20" name="unloader-magazine-plastic-good-lane" type="text" class="form-control mb-2 getUnloaderPlasticMagazineGoodLane" tabindex="-1">
					LOADER MAGAZINE:<input id="gettd23" name="loader-magazine" type="text" class="form-control mb-2 getLoaderMagazine" tabindex="-1">
					
					STABILIZER:<input id="gettd26" name="stabilizer" type="text" class="form-control mb-2 getStabilizer" tabindex="-1">
					PRE-HEAT PLATE:<input id="gettd29" name="preheat-plate" type="text" class="form-control mb-2 getPreheatPlate" tabindex="-1">
					LEAD GUIDE:<input id="gettd32" name="lead-guide" type="text" class="form-control mb-2 getLeadGuide" tabindex="-1">
					POOL CHUTE:<input id="gettd35" name="pool-chute" type="text" class="form-control mb-2 getPoolChute" tabindex="-1">
					FINAL RESULT:<input id="gettd38" name="final-result" type="text" class="form-control mb-2 getFinalResult" tabindex="-1">		
					LINE:<select id="gettd41" name="line" class="form-control mb-2" required>
								<option value="LSI-FT">LSI-FT</option>
								<option value="QFN-FT">QFN-FT</option>
							</select>
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
				<div class="col-sm-4">
					STORAGE:<input id="gettd3" name="storage" type="text" class="form-control mb-2 getStorage" tabindex="-1">
					WORK PRESS:<input id="gettd6" name="workpress" type="text" class="form-control mb-2 getWorkpress" tabindex="-1">
					OUTPUT SHUTTLE:<input id="gettd9" name="output-shuttle" type="text" class="form-control mb-2 getOutputShuttle" tabindex="-1">	

					COOLING SHUTTLE:<input id="gettd12" name="cooling-shuttle" type="text" class="form-control mb-2 getCoolingShuttle" tabindex="-1">
					ROTATOR UNLOADER:<input id="gettd15" name="rotator-unloader" type="text" class="form-control mb-2 getRotatorUnloader" tabindex="-1">
					HOT PLATE:<input id="gettd18" name="hot-plate" type="text" class="form-control mb-2 getHotPlate" tabindex="-1">	
					NOZZLE:<input id="gettd21" name="nozzle" type="text" class="form-control mb-2 getNozzle" tabindex="-1">
					CENTER JIG:<input id="gettd24" name="center-jig" type="text" class="form-control mb-2 getCenterJig" tabindex="-1">
					UNLOADER MAGAZINE:<input id="gettd27" name="unloader-magazine" type="text" class="form-control mb-2 getUnloaderMagazine" tabindex="-1">
					
					LOADER GOOD MAGAZINE:<input id="gettd30" name="loader-good-magazine" type="text" class="form-control mb-2 getLoaderGoodMagazine" tabindex="-1">
					TEST SITE:<input id="gettd33" name="test-site" type="text" class="form-control mb-2 getTestSite" tabindex="-1">
					SOCKET JIG:<input id="gettd36" name="socket-jig" type="text" class="form-control mb-2 getSocketJig" tabindex="-1">	
					
					FREE TEST CHUTE:<input id="gettd39" name="free-test-chute" type="text" class="form-control mb-2 getFreeTestChute" tabindex="-1">
				</div>
			</div>
					<div class="row">
						<div class="col-md-12">
							<br>
							<div id="message"></div>
						</div>
					</div>
					<!-- <div class="row">
						<div class="col-md-12">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">SUPPORT FILE</span>
								</div>
								<div class="">
									<input id="sfile" class="form-control" name="sfile" type="file" value="Choose file">
								</div>
							</div>
						</div>
					</div> -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button id="update" type="button" name="submit" class="btn btn-primary">UPDATE</button>
				</div>
</div>
</div>
</div>
</div>
</form>

<!-- <table id="keywords" class="table table-bordered table-sm-responsive table-hover">
<thead id="thead" class="thead-light">
	<tr>
		<th scope="col" class="col-sm-0">#</th>
		<th scope="col" class="col-sm-1">SERIAL ID</th>
		<th scope="col" class="col-sm-1">LB ID</th>
		<th scope="col" class="col-sm-1">FAMILY</th>
		<th scope="col" class="col-sm-1">TST PF</th>
		<th scope="col" class="col-sm-1">STATUS</th>
		<th scope="col" class="col-sm-1">TST ID</th>
		<th scope="col" class="col-sm-1">HD ID</th>
		<th scope="col" class="col-sm-1">LOCATION</th>
		<th scope="col" class="col-sm-1">STORAGE</th>
		<th scope="col" class="col-sm-1">VENDOR</th>
		<th scope="col" class="col-sm-1">LINE</th>
		<th scope="col" class="col-sm-1">HARWARE PERSONNEL</th>
		<th scope="col" class="col-sm-1">UPDATED</th>
	</tr>
</thead>
<tbody class="tbody">
</tbody>
</table> -->

<script src="public/js/pagiJsQuery-2.1.1.js"></script>
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
// function changePagination(option) {
// 	if(option!= "") {
// 		getresult("models/editResLB.php");
// 	}
// }
</script>
</HEAD>

<BODY>
<div id="overlay"><div><img src="public/img/loading.svg" width="64px" height="64px"/></div></div>
<div class="page-content"  style="width: 1600px;">
	<div id="pagination-result">
	<input type="hidden" name="rowcount" id="rowcount" />
	</div>
</div>
<script>
getresult("models/editItems/editResCK.php");
</script>
