<button id="showModal" class="btn btn-primary" data-toggle="modal" data-target="#bd-example-modal-lg" style="display: none;" >
</button>

<?php
	if(!empty($_SESSION['userEmail'])){
?>
		<form method="post" action="?controller=posts&action=saveLB" enctype="multipart/form-data">
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
										<div class="btn-group btn-group-toggle " data-toggle="buttons">
											<label id="trackIn" class="btn btn-outline-primary">
												<input class="trackIn" name="track" value="IN" id="trackIn" type="radio" autocomplete="off" required=""> TRACK IN
											</label>
											<label id="trackOut" class="btn btn-outline-success">
												<input name="track" value="OUT" id="trackOut" type="radio" autocomplete="off" required=""> TRACK OUT
											</label>
										</div>
								</div>
							<div class="row">
								<div class="col-sm-6">
									<label for="getSerID">SERIAL ID:</label><input id="getSrID" name="srid" type="text" class="form-control" readonly="" tabindex="-1">
									<label for="getLBID">LOADBOARD ID:</label><input id="getLBID" name="lbid" type="text" class="form-control" readonly="" tabindex="-1">
									<label for="getFam">FAMILY:</label><input id="getFam" name="family" type="text" class="form-control" readonly="" tabindex="-1">
									<label for="getVen">VENDOR:</label><input id="getVen" name="vendor" type="text" class="form-control" readonly="" tabindex="-1">
									<label for="getTstPF">TESTER PF:</label><input id="getTstPF" name="tstPf" type="text" class="form-control" readonly="" tabindex="-1">
									<label for="getLine">LINE:</label><input id="getLine" name="line" type="text" class="form-control" readonly="" tabindex="-1">
									<label for="getStrg">RACK:</label><input id="getStrg" name="storage" type="text" class="form-control" readonly="" tabindex="-1">
								</div>
								<div class="col-sm-6">
									<label for="name">BORROWER :</label><input name="borrower" type="text" class="form-control" required="">
									<label for="name">TESTER ID:</label><div id="getTstID"></div>
									<label for="name">HANDLER ID:</label><input list="handlerList" id="getHdID" name="hdID" type="text" class="form-control" required="">
									<span id="hdDataList"></span>
									<label for="name">STATUS:</label><select id="getStats" name="status" class="form-control" required="" disabled>
									</select>
									<label for="name">LOCATION:</label><select id="getLoc" name="loc" class="form-control" required="">
										<option value="SW">SW</option>
										<option value="NW">NW</option>
										<option value="PROBER">PROBER</option>
										<option value="HARDWARE">HARDWARE</option>
										<option value="ENGG">ENGG</option>
										<option value="OFF SITE">OFF SITE</option>
									</select>
									<label for="remarks">REMARKS:</label><textarea id="remarks" name="remarks" class="form-control" rows="3"></textarea>
									

									</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
								<label for="sfile">SUPPORT FILE:</label>
													<!-- <input type="file" class="custom-file-input" id="inputGroupFile01" required=""> -->
													<input id="sfile" class="form-control" name="sfile" type="file" value="Choose file">
													<!-- <label class="custom-file-label" for="inputGroupFile01" >Choose file</label> -->
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" name="submit" class="btn btn-primary">Save changes</button>
						</div>
<?php	}else{ ?>
		<form method="post" action="?controller=posts&action=signin" enctype="multipart/form-data">
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
		getresult("models/loadboard/pagiResLB.php");
	}
}
</script>
</HEAD>

<BODY>
<div id="overlay"><div><img src="public/img/loading.svg" width="64px" height="64px"/></div></div>
<div class="page-content"  style="width: 1600px;">
	<div style="border-bottom: #F0F0F0 1px solid;margin-bottom: 15px;">
		<h2>LOAD BOARD SECTION</h2>
		<div class="form-group">
		<div class="row">
		<div class="col-md-4"><label for="name">Loadboard ID:</label><input type="text" class="form-control" id="lbID">

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
getresult("models/loadboard/pagiResLB.php");
</script>
