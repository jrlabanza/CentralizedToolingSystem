<?php
require('../../frameworks/ajaxConn.php');
//
// echo '<select id="getTstID" name="tstID" type="text" class="form-control" required="">';
// if($_POST['id']){
// 	$id=$_POST['id'];
// 	$result = $conn->query('SELECT tester_id FROM testers WHERE tst_pf="'.$id.'"');
// 	while ($row = $result->fetch_assoc()) {
// 		echo '<option value="'.$row['tester_id'].'">'.$row['tester_id'].'</option>';
// 	}
// }else{
// }
// echo '</select>';
// mysqli_close($conn);


if($_POST['id']){
	$id=$_POST['id'];
	$result = $conn->query('SELECT * FROM program WHERE serial_id="'.$id.'"');
	while ($row = $result->fetch_assoc()) {
		$status = $row['status'];
?>
						
			<form id="saveData" method="post" action="models/program/savePG.php" enctype="multipart/form-data">
		<!-- <form id="saveData" method="post" action="" enctype="multipart/form-data"> -->
			<div class="col-xs-6 form-group">
				<div class="" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">PROGRAM</h5>
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
												<input class="trackIn" name="track" value="IN" id="" type="radio" autocomplete="off" required=""> TRACK IN
											</label>
<?php if ($_SESSION['level'] != ""){ 
	
	if ($status == "OUT-PROD" || $status == "OUT-REPAIR" || $status == "OUT-ENGG" || $status == "PM" || $status == "FOR SCRAP"){}
	else{?>
											<label id="trackOut" class="btn btn-outline-success">
												<input name="track" value="OUT" id="" type="radio" autocomplete="off" required=""> TRACK OUT
											</label>
<?php }} ?>
													</div>
											</div>
											<br>
										<div class="row">
											<div class="col-md-6">
											SERIAL ID:<input id="getSrID" name="srid" type="text" class="form-control mb-2" readonly="" tabindex="-1">
											DISK NO:<input id="getDiskNo" name="disk_no" type="text" class="form-control mb-2" readonly="" tabindex="-1">
											FAMILY:<input id="getFam" name="family" type="text" class="form-control mb-2" readonly="" tabindex="-1">
											TESTER NAME:<input id="getTesterName" name="tester_name" type="text" class="form-control mb-2" readonly="" tabindex="-1">
											PROGRAM:<input id="getProgram" name="program" type="text" class="form-control mb-2" readonly="" tabindex="-1">
											LINE:<input id="getLine" name="line" type="text" class="form-control mb-2" readonly="" tabindex="-1">
											</div>
											<div class="col-md-6">
											CLIENT :<input list="users" name="borrower" type="text" class="form-control mb-2" required="">
											<datalist id="users">
												<?php include("./models/users.php"); ?>
											</datalist>
											PACKAGE TYPE:<input id="getPkgType" name="pkg_type" type="text" class="form-control mb-2" required=""/>
											TEST TYPE:<input id="getTestType" name="test_type" type="text" class="form-control mb-2" required=""/>
											STATUS:<select id="getStats" name="status" class="form-control mb-2" required="" disabled>
											</select>
											LOCATION:<select id="getLoc" name="loc" class="form-control mb-2" required="">
											</select>
											REMARKS:<textarea id="remarks" name="remarks" class="form-control mb-2" rows="3"></textarea>
										</div>
										</div>
										<div class="row">
											<div class="col-md-12">
											SUPPORT FILE:
																	<!-- <input type="file" class="custom-file-input" id="inputGroupFile01" required=""> -->
																	<input id="sfile" class="form-control" name="sfile" type="file" value="Choose file" accept=".jpg, .txt, .doc, .docx, .pdf, .xlsx, .csv, .jpeg, .jpg, .png, .bmp, .msg, .asc">
																	<!-- <label class="custom-file-label" for="inputGroupFile01" >Choose file</label> -->
										</div>
										<div class="col-sm-12">
											<br>
											<div class="progress">
												<div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<div id="msg" style="display: none;"></div>
										<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
										<button type="submit" name="submit" class="btn btn-primary">Save changes</button>
									</div>
<?php	}
}else if($_POST['id'] == ""){
}
mysqli_close($conn);
?>
