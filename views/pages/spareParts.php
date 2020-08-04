
<button id="showModal" class="btn btn-primary" data-toggle="modal" data-target="#bd-example-modal-lg" style="display: none;" >
</button>

<?php
	if(!empty($_SESSION['userEmail'])){
?>
		<form id="saveData" method="post" action="models/spareParts/saveSP.php" enctype="multipart/form-data">
		<!-- <form id="saveData" method="post" action="" enctype="multipart/form-data"> -->
			<div class="col-xs-6 form-group">
				<div class="modal" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog change-kit-size" role="document">
					
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">SPARE PARTS</h5>
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
								<?php 
								if($_SESSION['level'] == 2 || $_SESSION['level'] == 3){ ?>
									<label id="in-parts" class="btn btn-outline-primary">
										<input class="in-parts" name="track" value="IN" id="" type="radio" autocomplete="off" required="">IN
									</label> <?php
								}
									
								?>
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
								<span id='quantity-name'>QUANTITY:</span>
								<input id="" name="quantity" type="number" class="form-control mb-2 getWithdrawQuantity" tabindex="-1"/>
								</div>
								<div class="col-sm-2"></div>
							</div>
							<br>
							<div class="row">
							
								<div class="col-sm-2"></div>
								<div class="col-sm-4">
									<input name="spID" type="text" class="form-control mb-2 getID" hidden>
									DESCRIPTION:<input id="" name="description" type="text" class="form-control mb-2 getDescription" tabindex="-1" readonly/>
									PARTS CODE:<input id="" name="parts_code" type="text" class="form-control mb-2 getPartsCode" tabindex="-1"readonly/>
									RACK<input id="" name="location" type="text" class="form-control mb-2 getLocation" tabindex="-1" list='rack-list' autocomplete='off'/>	
									<datalist id='rack-list'>
										<?php
										// include("./models/rack.php");
										?>
									</datalist>
									STATUS:<input id="" name="status" type="text" class="form-control mb-2 getStatus" tabindex="-1" readonly/>
	
								</div>
								<div class="col-sm-4">

									PERSONNEL:<span id="name-change"></span><input list="users" name="client" id="show-personnel" type="number" class="form-control mb-2" required="" readonly/>
										<!-- <datalist id="users">
											<?php //include("./models/users.php"); ?>
										</datalist> -->
									MAKER:<input id="" name="maker" type="text" class="form-control mb-2 getMaker" tabindex="-1" readonly/>
									MACHINE:<input id="" name="machine" type="text" class="form-control mb-2 getMachine" tabindex="-1" list='machine-list' readonly/>
											<datalist id='machine-list'>
											
											</datalist>
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
		getresult("models/spareParts/pagiResSP.php");
	}
}
</script>
</HEAD>

<BODY>
<div id="overlay"><div><img src="public/img/loading.svg" width="64px" height="64px"/></div></div>
<div class="page-content"  style="width: 1600px;">
	<div style="border-bottom: #F0F0F0 1px solid;margin-bottom: 15px;">
		<h2>SPARE PARTS</h2>
		<div class="form-group">
		<div class="row">
		<div class="col-md-4"><label for="name">Search:</label><input type="text" class="form-control" id="spID">

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
getresult("models/spareParts/pagiResSP.php");
</script>
