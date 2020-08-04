<button id="showModal" class="btn btn-primary" data-toggle="modal" data-target="#bd-example-modal-lg" style="display: none;" >
</button>

<?php
	if(!empty($_SESSION['userEmail'])){
?>
		<form id="saveData" method="post" action="models/loadboard/saveLB.php" enctype="multipart/form-data">
			<div class="col-xs-6 form-group">
				<div class="modal" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">LOADBOARD</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
								<div class="row d-flex justify-content-center">
										<div class="btn-group btn-group-toggle mb-2" data-toggle="buttons">
											<label id="trackIn" class="btn btn-outline-primary">
												<input class="trackIn" name="track" value="IN" id="trackIn" type="radio" autocomplete="off" required=""> TRACK IN
											</label>
<?php if ($_SESSION['level'] != ""){ ?>
											<label id="trackOut" class="btn btn-outline-success">
												<input name="track" value="OUT" id="trackOut" type="radio" autocomplete="off" required=""> TRACK OUT
											</label>
<?php } ?>
										</div>
								</div>
							<div class="row">
								<div class="col-sm-6">
									SERIAL ID:<input id="getSrID" name="srid" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									LOADBOARD ID:<input id="getLBID" name="lbid" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									FAMILY:<input id="getFam" name="family" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									VENDOR:<input id="getVen" name="vendor" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									TESTER PF:<input id="getTstPF" name="tstPf" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									LINE:<input id="getLine" name="line" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									RACK:<input id="getStrg" name="storage" type="text" class="form-control mb-2" readonly="" tabindex="-1">
								</div>
								<div class="col-sm-6">
									BORROWER :<input name="borrower" type="text" class="form-control mb-2" required="">
									TESTER ID:<div id="getTstID"></div>
									HANDLER ID:<input list="handlerList" id="getHdID" name="hdID" type="text" class="form-control mb-2" required="">
									<span id="hdDataList"></span>
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
													<input id="sfile" class="form-control-file mb-2" name="sfile" type="file" value="Choose file" accept=".jpg, .txt, .doc, .docx, .pdf, .xlsx, .csv, .jpeg, .jpg, .png, .bmp, .msg, .asc">
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
			<h5 class="modal-title" id="exampleModalLabel">LOADBOARD</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
				<span aria-hidden="true">×</span>
			</button>
		</div>
		<div class="modal-body">
				<div class="row d-flex justify-content-center">
					<form class="dropdown-menu p-4 dropdown-menu-right" method="post" action="?controller=posts&action=signin">
						<div class="form-group">
							<label>User name</label>
							<input name="username" type="text" class="form-control myusername">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input name="password" type="password" class="form-control mypassword">
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
		getresult("models/pagiResHome.php");
	}
}
</script>
</HEAD>

<BODY>
<!-- <div id="overlay"><div><img src="public/img/loading.svg" width="64px" height="64px"/></div></div> -->
<div class="page-content"  style="width: auto;">
	<div style="border-bottom: #F0F0F0 1px solid;margin-bottom: 15px;">
		<h2>SUMMARY OF ITEMS</h2>
		<div class="Timer"></div>
		<div class="form-group">
			<div class="row">
			</div>
		</div>
	</div>

	<br>
	</div>
	<div id="pagination-result">
	<input type="hidden" name="rowcount" id="rowcount" />
	</div>
</div>
<script>
getresult("models/pagiResHome.php");
var start = new Date;

setInterval(function() {
	// $('.Timer').text((new Date - start) / 1000 + " Seconds");
	getresult("models/pagiResHome.php");
}, 10000);


</script>
