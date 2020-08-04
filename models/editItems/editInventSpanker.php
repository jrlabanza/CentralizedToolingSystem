<button id="showModal" class="btn btn-primary" data-toggle="modal" data-target="#bd-example-modal-lg" style="display: none;" >
</button>

<form method="post" action="" enctype="multipart/form-data">
	<div class="col-xs-6 form-group">
		<div class="modal" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">UPDATE SPANKER INFORMATION</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<input id="gettd0" name="dataID" type="text" class="form-control" style="display: none;">
							BOX NO.:<input id="gettd2" name="boxNo" type="text" class="form-control mb-2" readonly>
							SPANKER PART NO.:<input id="gettd1" name="nozzlePrtNO" type="text" class="form-control mb-2" required="">
							ALTERNATIVE PART NO.:<input id="gettd7" name="altrntvSocket" type="text" class="form-control mb-2" required="">
							PACKAGE:<input id="gettd3" name="package" type="text" class="form-control mb-2" required="">
							LINE:<select id="gettd8" name="line" class="form-control mb2" required>
								<option value="LSI-ASSY">LSI-ASSY</option>
								<!-- <option value="LSI-FT">LSI-FT</option> -->
								<option value="QFN-ASSY">QFN-ASSY</option>
								<!-- <option value="QFN-FT">QFN-FT</option> -->
							</select>
						</div>
						<div class="col-md-6">
							MACHINE MODEL:<input id="gettd4" name="machineModel" type="text" class="form-control mb-2" required="">
							<!-- <label for="name">STATUS:</label><select id="get4" name="status" class="form-control" required="">
								<option value="IN-GOOD">IN-GOOD</option>
								<option value="IN-REPAIR">IN-REPAIR</option>
								<option value="IN-FOR CLEANING">IN-FOR CLEANING</option>
								<option value="IN-FOR QUAL">IN-FOR QUAL</option>
								<option value="OUT-PROD">OUT-PROD</option>
								<option value="OUT-REPAIR">OUT-REPAIR</option>
								<option value="OUT-ENGG">OUT-ENGG</option>
								<option value="FOR SCRAP">FOR SCRAP</option>
								<option value="PM">PM</option>
							</select> -->
							MAX SHOT:<input id="gettd5" name="mShot" type="text" class="form-control mb-2" required="">
							<!-- <label for="getTstPF">SHOT COUNT:</label><input id="get8" name="shotCnt" type="text" class="form-control"> -->
							REMARKS:<textarea id="gettd6" name="remarks" class="form-control mb-2" rows="3"></textarea>
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
getresult("models/editItems/editResSpanker.php");
</script>
