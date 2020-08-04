<button id="showModal" class="btn btn-primary" data-toggle="modal" data-target="#bd-example-modal-lg" style="display: none;" >
</button>

<form method="post" action="" enctype="multipart/form-data">
	<div class="col-xs-6 form-group">
		<div class="modal" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">UPDATE RUBBER COLLET INFORMATION</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
				<div class="row">
				<div class="col-sm-6">
					<input id="gettd0" name="tblid" type="text" class="form-control mb-2 getID" style="display: none;">
					RUBBER TIP NO:<input id="gettd1" name="rubber-tip-no" type="text" class="form-control mb-2 getRubberTipNo" tabindex="-1">
					BOX:<input id="gettd3" name="box" type="text" class="form-control mb-2 getBox" tabindex="-1">
					MACHINE ID<input id="gettd5" name="machine-id" type="text" class="form-control mb-2 getMachineID " tabindex="-1">
					LOCATION<input id="gettd7" name="location" type="text" class="form-control mb-2 getLocation " tabindex="-1">
					LINE<input id="gettd9" name="line" type="text" class="form-control mb-2 getLine" tabindex="-1">		

				</div>
				<div class="col-sm-6">
					PACKAGE:<input id="gettd2" name="package" type="text" class="form-control mb-2 getPackage" tabindex="-1">
					MACHINE MODEL:<input id="gettd4" name="machine-model" type="text" class="form-control mb-2 getMachineModel" tabindex="-1">
					STATUS<input id="gettd6" name="status" type="text" class="form-control mb-2 getStatus" tabindex="-1">	
					QUANTITY<input id="gettd8" name="quantity" type="text" class="form-control mb-2 getCurrentQuantity" tabindex="-1">	
						
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
getresult("models/editItems/editResRC.php");
</script>
