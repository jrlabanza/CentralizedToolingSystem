<button id="showModal" class="btn btn-primary" data-toggle="modal" data-target="#bd-example-modal-lg" style="display: none;" >
</button>

<?php
	if(!empty($_SESSION['userEmail'])){ ?>
		<form id="saveData" method="post" action="models/socket/saveSocket.php" enctype="multipart/form-data">
			<div class="col-xs-6 form-group">
				<div class="modal" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">SOCKET</h5>
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
										<div class="btn-group btn-group-toggle " data-toggle="buttons">
											<label id="trackIn" class="btn btn-outline-primary">
												<input name="track" value="IN" class="trackIn" type="radio" autocomplete="off" required=""> TRACK IN
											</label>
<?php if ($_SESSION['level'] != ""){ ?>
											<label id="trackOut" class="btn btn-outline-success">
												<input name="track" value="OUT" class="trackOut" type="radio" autocomplete="off" required=""> TRACK OUT
											</label>
<?php } ?>
										</div>
								</div>
								<br>
							<div class="row">
								<div class="col-sm-4">
									SOCKET ID:<input id="getLBID" name="socketid" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									FAMILY:<input id="getFam" name="family" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									VENDOR:<input id="getVen" name="vendor" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									TESTER PF:<input id="getTstPF" name="tstPf" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									LINE:<input id="getLine" name="line" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									RACK:<input id="getStrg" name="storage" type="text" class="form-control mb-2" readonly="" tabindex="-1">	
									GS CODE:<input id="getGSCode" name="gsCode" type="text" class="form-control mb-2" readonly="" tabindex="-1">
								</div>
								<div class="col-sm-4">
									PACKAGE TYPE:<input id="getPType" name="pckgType" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									PART NO:<input id="getPNo" name="prtNo" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									PIN TYPE:<input id="getPinType" name="pinType" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									PIN COUNT:<input id="getPinCnt" name="pinCnt" type="text" class="form-control mb-2" readonly="" tabindex="-1">
									MAX SHOT:<input id="getMShot" name="mShot" type="text" class="form-control mb-2 isNumberKey" readonly="" tabindex="-1">
									CURRENT SHOT COUNT:<input id="getCrrntShotCnt" name="crrntShotCnt" type="text" class="form-control mb-2"  readonly="" tabindex="-1">
									CHANGE PIN:
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
											<input id="changePin" name="changePin" type="radio" value="0" aria-label="Radio button for following text input">
											</div>
										</div>
											<input type="text" class="form-control" aria-label="Text input with radio button" value="YES" disabled>
										<div class="input-group-prepend">
										<div class="input-group-text">
											<input name="changePin" type="radio" aria-label="Radio button for following text input">
											</div>
										</div>
											<input type="text" class="form-control" aria-label="Text input with radio button" value="NO" disabled>
									</div>
								</div>
								<div class="col-sm-4">
									CLIENT :<input list="users" name="client" type="text" class="form-control mb-2" required="">
									<datalist id="users">
										<?php include("./models/users.php"); ?>
									</datalist>
									TESTER ID:<select id="getTstID" name="tstID" type="text" class="form-control mb-2" required=""></select>
									HANDLER ID:<input list="handlerList" id="getHdID" name="hdID" type="text" class="form-control mb-2" required="">
									<datalist id="handlerList"></datalist>
									STATUS:<select id="getStats" name="status" class="form-control mb-2" required="" onchange="stats()" disabled>
									</select>
									LOCATION:<select id="getLoc" name="loc" class="form-control mb-2" required="">
									</select>
									SHOT COUNT:<input id="getShotCnt" name="shotCnt" type="text" class="form-control mb-2 isNumberKey" required>
									SITE:<select id="getSite" name="site" class="form-control mb-2" required="">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="6">6</option>
										<option value="8">8</option>
										<option value="16">16</option>
										<option value="32">32</option>
									</select>
								</div>
							</div>
							<div class="row">
							<div class="col-sm-12">
									REMARKS:<textarea id="remarks" name="remarks" class="form-control mb-2" rows="3"></textarea>
								</div>
								<div class="col-sm-12">
									SUPPORT FILE:
									<!-- <input type="file" class="custom-file-input" id="inputGroupFile01" required=""> -->
									<input id="sfileSocket" class="form-control-file mb-2" name="sfile" type="file" value="Choose file" accept=".jpg, .txt, .doc, .docx, .pdf, .xlsx, .csv, .jpeg, .jpg, .png, .bmp, .msg, .asc">
									<!-- <label class="custom-file-label" for="inputGroupFile01" >Choose file -->
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
	<?php }else{ ?>
		<form class="signIn" method="post" action="?controller=posts&action=signin" enctype="multipart/form-data">
		<div class="col-xs-6 form-group">
			<div class="modal" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">SOCKET</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
				<span aria-hidden="true">×</span>
			</button>
		</div>
		<div class="modal-body">
				<div class="row d-flex justify-content-center">
					<form class="dropdown-menu p-4 dropdown-menu-right" method="post" action="?controller=posts&action=signin">
						<div class="form-group">
							<label>User name</label>
							<input name="username" type="text" class="form-control mb-2 myusername2">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input name="password" type="password" class="form-control mb-2 mypassword2">
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
function changePagination(option) {
	if(option!= "") {
		getresult("models/socket/pagiResSocket.php");
	}
}

function stats(){
		var stats = $("#getStats").val();
		if (stats == "IN-REPAIR"){
			$("#changePin").attr("required","");
			$("#getShotCnt")
			.attr("readonly","")
			.removeAttr("required");
			
		}else{
			$("#changePin").removeAttr("required");
			$("#getShotCnt")
			.attr("required","")
			.removeAttr("readonly");
		}
}
</script>
</HEAD>

<BODY>
<div id="overlay"><div><img src="public/img/loading.svg" width="64px" height="64px"/></div></div>
<div class="page-content"  style="width: 1600px;">
	<div style="border-bottom: #F0F0F0 1px solid;margin-bottom: 15px;">
		<h2>SOCKET SECTION</h2>
		<div class="form-group">
		<div class="row">
		<div class="col-md-4"><label for="name">SOCKET ID:</label><input type="text" class="form-control mb-2" id="socketID">

		</div>
		<!-- <div class="col-md-3">
			<label for="name">Pagination Setting:</label>
			<select name="pagination-setting" onChange="changePagination(this.value);" class="form-control mb-2" id="pagination-setting">
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
getresult("models/socket/pagiResSocket.php");
</script>
