<button id="showModal" class="btn btn-primary" data-toggle="modal" data-target="#bd-example-modal-lg" style="display: none;" >
</button>

<?php
	if(!empty($_SESSION['userEmail'])){
?>
		<form id="saveData" method="post" action="models/ic/saveIC.php" enctype="multipart/form-data">
			<div class="col-xs-6 form-group">
				<div class="modal" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">INSERT AND CLAMP</h5>
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
												<input class="trackIn" name="track" value="IN" type="radio" autocomplete="off" required=""> TRACK IN
											</label>
<?php if ($_SESSION['level'] != ""){ ?>
											<label id="trackOut" class="btn btn-outline-success">
												<input name="track" value="OUT" class="trackOut" type="radio" autocomplete="off" required=""> TRACK OUT
											</label>
<?php } ?>
										</div>
								</div>
							<div class="row">
								<div class="col-sm-6">
									LF NAME:<input id="getSrID" name="nozzlePrtNO" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									BOX NO.:<input id="getLBID" name="boxNo" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									PACKAGE:<input id="getPType" name="package" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									MACHINE MODEL:<input id="getTstPF" name="machineModel" type="text" class="form-control mb-2"  readonly="" tabindex="-1">
									MAX SHOT:<input id="getMShot" name="mShot" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									CURRENT SHOT COUNT:<input id="getCrrntShotCnt" name="crrntShotCnt" type="text" class="form-control mb-2"  readonly="" tabindex="-1">
									LINE:<input id="getLine" name="line" type="text" class="form-control mb-2"  readonly="" tabindex="-1">
									<input id="getVen" name="drawing" type="text" class="form-control mb-2"  readonly="" tabindex="-1" style="display: none;">
									OUT COUNT:<input id="getPinCnt" name="outCount" type="text" class="form-control mb-2"  readonly="" tabindex="-1">
									<input id="getPNo" name="insertSN" type="text" class="form-control mb-2"  readonly="" tabindex="-1" style="display: none;">
									<input id="getPinType" name="clampSN" type="text" class="form-control mb-2"  readonly="" tabindex="-1" style="display: none;">
									<!-- <label for="get4">OUT COUNT:<input id="get5" name="outCount" type="text" class="form-control" readonly="" tabindex="-1"> -->
								</div>
								<div class="col-sm-6">
									CLIENT :<input list="users" name="client" type="text" class="form-control mb-2" required="">
									<datalist id="users">
										<?php include("./models/users.php"); ?>
									</datalist>
									MACHINE ID:<input list="assyEqpList" id="get7" name="machineID" type="text" class="form-control mb-2" required="">
									<datalist id="assyEqpList"></datalist>
									STATUS:<select id="getStats" name="status" class="form-control mb-2" required="" disabled>
									</select>
									LOCATION:<select id="getLoc" name="loc" class="form-control mb-2" required="">
									</select>
									SHOT COUNT:<input id="getShotCnt" name="shotCnt" type="text" class="form-control mb-2">
									REMARKS:<textarea id="remarks" name="remarks" class="form-control mb-2" rows="3"></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
								SUPPORT FILE:
													<!-- <input type="file" class="custom-file-input" id="inputGroupFile01" required=""> -->
													<input id="sfileSocket" class="form-control-file mb-2" name="sfile" type="file" value="Choose file" accept=".jpg, .txt, .doc, .docx, .pdf, .xlsx, .csv, .jpeg, .jpg, .png, .bmp, .msg, .asc">
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
			<h5 class="modal-title" id="exampleModalLabel">INSERT AND CLAMP</h5>
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
		getresult("models/ic/pagiResIC.php");
	}
}
</script>
</HEAD>

<BODY>
<div id="overlay"><div><img src="public/img/loading.svg" width="64px" height="64px"/></div></div>
<div class="page-content"  style="width: 1600px;">
	<div style="border-bottom: #F0F0F0 1px solid;margin-bottom: 15px;">
		<h2>INSERT & CLAMP SECTION</h2>
		<div class="form-group">
		<div class="row">
			<div class="col-md-3 form-inline">
				<label for="name">SEARCH &nbsp;</label><input type="text" class="form-control" id="icID">
				&nbsp;<input type="checkbox" class="form-control" name="redFilter" id="redFilter">Filter red rows
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
getresult("models/ic/pagiResIC.php");
</script>
