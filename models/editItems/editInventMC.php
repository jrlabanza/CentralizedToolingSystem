<button id="showModal" class="btn btn-primary" data-toggle="modal" data-target="#bd-example-modal-lg" style="display: none;" >
</button>

<form method="post" action="" enctype="multipart/form-data">
	<div class="col-xs-6 form-group">
		<div class="modal" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">UPDATE MOLD CHASE INFORMATION</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4">
							<input id="gettd0" name="tblid" type="text" class="form-control" style="display: none;">
							SERIAL ID<input id="gettd1" name="srID" type="text" class="form-control mb-2" required="">
							PACKAGE<input id="gettd2" name="family" type="text" class="form-control mb-2" required="">
							<!-- DUT REQ.<input name="dutReq" type="text" class="form-control mb-2" required=""> -->
							VENDOR<input id="gettd7" name="family" type="text" class="form-control mb-2" required="">
						</div>
						<div class="col-md-4">
							MOLD DIE ID:<input id="gettd3" name="line" type="text" class="form-control mb-2" required="">
							DIE MODEL<input id="gettd4" name="dieModel" type="text" class="form-control mb-2" required="">
							LINE:<select id="gettd8" name="line" class="form-control mb-2" required>
								<option value="LSI-ASSY">LSI-ASSY</option>
								<!-- <option value="LSI-FT">LSI-FT</option> -->
								<option value="QFN-ASSY">QFN-ASSY</option>
								<!-- <option value="QFN-FT">QFN-FT</option> -->
							</select>
						</div>
						<div class="col-md-4">
							MACHINE MODEL<input id="gettd5" name="tstPF" type="text" class="form-control mb-2" required="">
							RACK<input id="gettd6" name="storage" type="text" class="form-control mb-2" required="">
						 </div>
						 <div class="col-md-12">
							REMARKS:<textarea id="gettd9" name="remarks" class="form-control mb-2" rows="2"></textarea>
						 </div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<br>
							<div id="message"></div>
						</div>
					</div>
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
<script src="public/js/date/jquery-1.12.4.js"></script>
<script src="public/js/date/jquery-ui.js"></script>
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
getresult("models/editItems/editResMC.php");
$( ".datepicker" ).datepicker();
</script>
