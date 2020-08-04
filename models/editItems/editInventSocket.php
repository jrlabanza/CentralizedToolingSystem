<button id="showModal" class="btn btn-primary" data-toggle="modal" data-target="#bd-example-modal-lg" style="display: none;" >
</button>

<form method="post" action="" enctype="multipart/form-data">
	<div class="col-xs-6 form-group">
		<div class="modal" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">UPDATE SOCKET INFORMATION</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4">
							<input id="gettd0" name="tblid" type="text" class="form-control mb2" style="display: none;">
							SOCKET ID:<input id="gettd1" name="socketid" type="text" class="form-control mb2" readonly>
							FAMILY:<input id="gettd2" name="family" type="text" class="form-control mb2" required>
							VENDOR:<input id="gettd3" name="vendor" type="text" class="form-control mb2" required>
							PIN TYPE:<input id="gettd4" name="pinType" type="text" class="form-control mb2" required>
						</div>
						<div class="col-md-4">
							RACK:<input id="gettd5" name="storage" type="text" class="form-control mb2" required>	
							GS CODE:<input id="gettd6" name="gsCode" type="text" class="form-control mb2" required>
							TESTER PF:<input id="gettd7" name="tstPf" type="text" class="form-control mb2" required>
							PIN COUNT:<input id="gettd8" name="pinCnt" type="text" class="form-control mb2 isNumberKey" required>
						</div>
						<div class="col-md-4">
							LINE:<select id="gettd9" name="line" class="form-control mb2" required>
								<!-- <option value="LSI-ASSY">LSI-ASSY</option> -->
								<option value="LSI-FT">LSI-FT</option>
								<!-- <option value="QFN-ASSY">QFN-ASSY</option> -->
								<option value="QFN-FT">QFN-FT</option>
							</select>
							SITE:<select id="gettd10" name="site" class="form-control mb2" required="">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="6">6</option>
								<option value="8">8</option>
								<option value="16">16</option>
								<option value="32">32</option>
							</select>
							PACKAGE TYPE:<input id="gettd11" name="pckgType" type="text" class="form-control mb2" required>
							PART NO:<input id="gettd12" name="prtNo" type="text" class="form-control mb2" required>
							MAX SHOT:<input id="gettd13" name="mShot" type="text" class="form-control mb2 isNumberKey" required>

							<!-- BORROWER :<input name="borrower" type="text" class="form-control mb2" required="">
							TESTER ID:<div id="getTstID"></div>
							HANDLER ID:<input id="getHdID" name="hdID" type="text" class="form-control mb2" required="">
							STATUS:<select id="getStats" name="status" class="form-control mb2" required="">
								<option value="IN-GOOD">IN-GOOD</option>
								<option value="IN-REPAIR">IN-REPAIR</option>
								<option value="IN-FOR QUAL">IN-FOR QUAL</option>
								<option value="OUT-PROD">OUT-PROD</option>
								<option value="OUT-REPAIR">OUT-REPAIR</option>
								<option value="OUT-ENGG">OUT-ENGG</option>
								<option value="FOR SCRAP">FOR SCRAP</option>
								<option value="PM">PM</option>
							</select> -->
							<!-- LOCATION:<select id="getLoc" name="loc" class="form-control mb2" required="">
								<option value="SW">SW</option>
								<option value="NW">NW</option>
								<option value="PROBER">PROBER</option>
								<option value="HARDWARE">HARDWARE</option>
								<option value="OFF SITE REPAIR">OFF SITE REPAIR</option>
							</select> -->
							
						 </div>
						 <div class="col-md-12">
							REMARKS:<textarea id="gettd14" name="remarks" class="form-control mb-2" rows="2"></textarea>
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
									<input id="sfile" class="form-control mb2" name="sfile" type="file" value="Choose file">
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
getresult("models/editItems/editResSocket.php");
</script>
