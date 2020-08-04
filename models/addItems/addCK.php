<div class="page-content">
  <div class="card mb-3">
    <div class="card-header bg-secondary text-white">
      <h5>CHANGE KIT INFORMATION</h5>
    </div>
    <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data">
        	<div class="row">
				<div class="col-sm-4">
					SERIAL ID:<input id="td1" name="srid" type="text" class="form-control mb-2" tabindex="">
					CATEGORY:<input id="td4" name="category" type="text" class="form-control mb-2" tabindex="">
					WORK PRESS ASSEMBLY:<input id="td7" name="workpress-assembly" type="text" class="form-control mb-2"  tabindex="">
					TRAY PLATE:<input id="td10" name="tray-plate" type="text" class="form-control mb-2" tabindex="">
					SOAK BOAT:<input id="td13" name="soak-boat" type="text" class="form-control mb-2" tabindex="">		
					PEAKER:<input id="td16" name="peaker" type="text" class="form-control mb-2" tabindex="">
					UNLOADER MAGAZINE NG LANE:<input id="td19" name="unloader-magazine-ng-lane" type="text" class="form-control mb-2" tabindex="">
					LOADER:<input id="td22" name="loader" type="text" class="form-control mb-2" tabindex="">
					CONTACTOR:<input id="td25" name="contactor" type="text" class="form-control mb-2" tabindex="">
					TOTAL:<input id="td28" name="total" type="text" class="form-control mb-2" tabindex="">
					PACKAGE TYPE:<input id="td31" name="package" type="text" class="form-control mb-2" tabindex="">
					BASE PLATE:<input id="td34" name="base-plate" type="text" class="form-control mb-2" tabindex="">	
					PUSHER:<input id="td37" name="pusher" type="text" class="form-control mb-2" tabindex="">	
					TESTER PF<input id="td40" name="tstPF" type="text" class="form-control mb-2" required="">
					<!-- LOADBOARD ID:<input id="getLBID" name="lbid" type="text" class="form-control mb-2" readonly="" tabindex="">
					FAMILY:<input id="getFam" name="family" type="text" class="form-control mb-2" readonly="" tabindex="">
					VENDOR:<input id="getVen" name="vendor" type="text" class="form-control mb-2" readonly="" tabindex="">
					TESTER PF:<input id="getTstPF" name="tstPf" type="text" class="form-control mb-2" readonly="" tabindex="">
					LINE:<input id="getLine" name="line" type="text" class="form-control mb-2" readonly="" tabindex="">
					RACK:<input id="getStrg" name="storage" type="text" class="form-control mb-2" readonly="" tabindex=""> -->
				</div>
				<div class="col-sm-4">
					HANDLER PLATFORM:<input id="td2" name="handler-platform" type="text" class="form-control mb-2" tabindex="">
					SIZE:<input id="td5" name="size" type="text" class="form-control mb-2" tabindex="">
					INPUT SHUTTLE:<input id="td8" name="input-shuttle" type="text" class="form-control mb-2" tabindex="">	
					TRAY POKAYOKE:<input id="td11" name="tray-pokayoke" type="text" class="form-control mb-2" tabindex="">	
					ROTATOR LOADER:<input id="td14" name="rotator-loader" type="text" class="form-control mb-2" tabindex="">	
					CHUCK:<input id="td17" name="chuck" type="text" class="form-control mb-2" tabindex="">
					UNLOADER PLASTIC MAGAZINE GOOD LANE:<input id="td20" name="unloader-magazine-plastic-good-lane" type="text" class="form-control mb-2" tabindex="">
					LOADER MAGAZINE:<input id="td23" name="loader-magazine" type="text" class="form-control mb-2" tabindex="">
					STABILIZER:<input id="td26" name="stabilizer" type="text" class="form-control mb-2" tabindex="">
					PRE-HEAT PLATE:<input id="td29" name="preheat-plate" type="text" class="form-control mb-2" tabindex="">
					LEAD GUIDE:<input id="td32" name="lead-guide" type="text" class="form-control mb-2" tabindex="">
					POOL CHUTE:<input id="td35" name="pool-chute" type="text" class="form-control mb-2" tabindex="">
					FINAL RESULT:<input id="td38" name="final-result" type="text" class="form-control mb-2" tabindex="">		
					LINE:<select id="td41" name="line" class="form-control mb-2" required>
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
					STORAGE:<input id="td3" name="storage" type="text" class="form-control mb-2" tabindex="">
					WORK PRESS:<input id="td6" name="workpress" type="text" class="form-control mb-2" tabindex="">
					OUTPUT SHUTTLE:<input id="td9" name="output-shuttle" type="text" class="form-control mb-2" tabindex="">	
					COOLING SHUTTLE:<input id="td12" name="cooling-shuttle" type="text" class="form-control mb-2" tabindex="">
					ROTATOR UNLOADER:<input id="td15" name="rotator-unloader" type="text" class="form-control mb-2" tabindex="">
					HOT PLATE:<input id="td18" name="hot-plate" type="text" class="form-control mb-2" tabindex="">	
					NOZZLE:<input id="td21" name="nozzle" type="text" class="form-control mb-2" tabindex="">
					CENTER JIG:<input id="td24" name="center-jig" type="text" class="form-control mb-2" tabindex="">
					UNLOADER MAGAZINE:<input id="td27" name="unloader-magazine" type="text" class="form-control mb-2" tabindex="">
					LOADER GOOD MAGAZINE:<input id="td30" name="loader-good-magazine" type="text" class="form-control mb-2" tabindex="">
					TEST SITE:<input id="td33" name="test-site" type="text" class="form-control mb-2" tabindex="">
					SOCKET JIG:<input id="td36" name="socket-jig" type="text" class="form-control mb-2" tabindex="">	
					FREE TEST CHUTE:<input id="td39" name="free-test-chute" type="text" class="form-control mb-2" tabindex="">
				</div>
			</div>
            <div class="card-footer">
            <div class="d-flex justify-content-center">
              <div id="message"></div>
            </div>
            <div class="d-flex justify-content-center">
              <button id="saveAdd" type="button" name="submit" class="btn btn-success">SAVE</button>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>
