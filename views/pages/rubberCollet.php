
<button id="showModal" class="btn btn-primary" data-toggle="modal" data-target="#bd-example-modal-lg" style="display: none;" >
</button>

<?php
	if(!empty($_SESSION['userEmail'])){
?>
		<form id="saveData" method="post" action="models/rubberCollet/saveRC.php" enctype="multipart/form-data">
		<!-- <form id="saveData" method="post" action="" enctype="multipart/form-data"> -->
			<div class="col-xs-6 form-group">
				<div class="modal" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog change-kit-size" role="document">
					
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">RUBBER COLLET</h5>
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
							<!-- <div class="row d-flex justify-content-center">
									<div class="btn-group btn-group-toggle mb-2" data-toggle="buttons">
										<label id="trackIn" class="btn btn-outline-primary">
											<input class="trackIn" name="track" value="IN" id="" type="radio" autocomplete="off" required=""> TRACK IN
										</label>
										<?php if ($_SESSION['level'] != ""){ ?>
										<label id="trackOut" class="btn btn-outline-success">
											<input class="trackIn" name="track" value="OUT" id="" type="radio" autocomplete="off" required=""> TRACK OUT
										</label>
										<?php } ?>
									</div>
							</div> -->
							
							<div class="row d-flex justify-content-center">
								<div class="btn-group btn-group-toggle mb-2" data-toggle="buttons">
									<label id="in-parts" class="btn btn-outline-primary">
										<input class="in-parts" name="track" value="IN" id="" type="radio" autocomplete="off" required="">IN
									</label>
									<label id="out-parts" class="btn btn-outline-success">
									<input class="out-parts" name="track" value="OUT" id="" type="radio" autocomplete="off" required="">OUT
									</label>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2"></div>
								<div class="col-4">
								CURRENT QUANTITY:<input id="" name="current-quantity" type="number" class="form-control mb-2 getCurrentQuantity" tabindex="-1" readonly/>
								</div>
								<div class="col-4">
								WITHDRAW QUANTITY:<input id="" name="quantity" type="number" class="form-control mb-2 getWithdrawQuantity" tabindex="-1"/>
								</div>
								<div class="col-sm-2"></div>
							</div>
							<br>
							<div class="row">
							
								<div class="col-sm-2"></div>
								<div class="col-sm-4">
									<input name="rcID" type="text" class="form-control mb-2 getID" hidden>
									RUBBER TIP NO:<input id="" name="rubber-tip" type="text" class="form-control mb-2 getRubberTipNo" tabindex="-1" readonly/>
									PACKAGE:<input id="" name="package" type="text" class="form-control mb-2 getPackage" tabindex="-1"readonly/>
									BOX:<input id="" name="box" type="text" class="form-control mb-2 getBox" tabindex="-1" readonly/>		
									MACHINE MODEL:<input id="" name="machine-model" type="text" class="form-control mb-2 getMachineModel" tabindex="-1" readonly/>
									LINE:<input id="" name="line" type="text" class="form-control mb-2 getLine" tabindex="-1" readonly/>
								</div>
								<div class="col-sm-4">
									CLIENT :<input list="users" name="client" type="text" class="form-control mb-2" required="">
										<datalist id="users">
											<?php include("./models/users.php"); ?>
										</datalist>
									MACHINE ID:<input id="" name="machine-id" type="text" class="form-control mb-2 getMachineID" tabindex="-1" readonly/>
									STATUS:<input id="" name="status" type="text" class="form-control mb-2 getStatus" tabindex="-1" readonly/>
									LOCATION:<input id="" name="location" type="text" class="form-control mb-2 getLocation" tabindex="-1" readonly/>
									REMARKS:<input id="" name="remarks" type="text" class="form-control mb-2" tabindex="-1">
									<!-- INSTALLED TO:<input id="" name="installedTo" type="text" class="form-control mb-2" tabindex="-1"> -->
								</div>
								<div class="col-sm-2"></div>
							</div>
							<!-- <div class="row">
								<div class="col-sm-12">
								SUPPORT FILE:
													<input id="" class="form-control-file mb-2" name="sfile" type="file" value="Choose file" accept=".jpg, .txt, .doc, .docx, .pdf, .xlsx, .csv, .jpeg, .jpg, .png, .bmp, .msg, .asc, .zip">

								</div>
								<div class="col-sm-12">
									<br>
									<div class="progress">
										<div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div> -->
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
			<h5 class="modal-title" id="exampleModalLabel">LOG IN</h5>
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
		getresult("models/rubberCollet/pagiResRC.php");
	}
}
</script>
</HEAD>

<BODY>
<div id="overlay"><div><img src="public/img/loading.svg" width="64px" height="64px"/></div></div>
<div class="page-content"  style="width: 1600px;">
	<div style="border-bottom: #F0F0F0 1px solid;margin-bottom: 15px;">
		<h2>RUBBER COLLET</h2>
		<div class="form-group">
		<div class="row">
		<div class="col-md-4"><label for="name">Search:</label><input type="text" class="form-control" id="tpID">

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
getresult("models/rubberCollet/pagiResRC.php");
</script>
