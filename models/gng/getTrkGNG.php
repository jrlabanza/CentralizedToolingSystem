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
	$result = $conn->query('SELECT * FROM gng WHERE serial_id="'.$id.'"');
	while ($row = $result->fetch_assoc()) {
?>
						
					<form method="post" action="?controller=posts&action=saveBIB" enctype="multipart/form-data">
					<form id="saveData" method="post" action="models/gng/saveGNG.php" enctype="multipart/form-data">
					<div class="col-xs-6 form-group">
						<div class="modal" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">GONOGO</h5>
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
												<input name="track" value="OUT" id="trackOut" type="radio" autocomplete="off" required=""> TRACK OUT
											</label>
<?php } ?>
													</div>
											</div>
											<br>
										<div class="row">
											<div class="col-md-6">
												<label for="name">SERIAL ID:</label><input id="getSerID" name="srid" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['serial_id'] ?>">
												<label for="name">FAMILY:</label><input id="getFam" name="family" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['family'] ?>">
												<label for="getVen">APPEARANCE:</label><select id="getVen" name="vendor" type="text" class="form-control">
													<option value="GOOD">GOOD</option>
													<option value="NO GOOD">NO GOOD</option>
												</select>
												<label for="name">TESTER PF:</label><input id="getTstPF" name="tstPf" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['tst_pf'] ?>">
												<label for="name">LINE:</label><input id="getLine" name="line" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['line'] ?>">
												<label for="name">RACK:</label><input id="getStrg" name="storage" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['storage'] ?>">
											</div>
											<div class="col-md-6">
												<label for="name">CLIENT :</label><input list="users" name="borrower" type="text" class="form-control" required="">
												<datalist id="users">
													<?php include("../trackUsers.php"); ?>
												</datalist>
												<label for="name">TESTER ID:</label><select id="getTstID" name="tstID" type="text" class="form-control" required="">';

<?php
												echo '<option value="N/A">N/A</option>';
												$result = $conn->query('SELECT tester_id FROM testers WHERE tst_pf="'.$row['tst_pf'].'"');
												while ($row = $result->fetch_assoc()) {
													echo '<option value="'.$row['tester_id'].'">'.$row['tester_id'].'</option>';
												}
?>
												</select>
												HANDLER ID:<input list="handlerList" id="getHdID" name="hdID" type="text" class="form-control mb-2" required="">
                                                <datalist id="handlerList"></datalist>
												<label for="name">STATUS:</label><select id="getStats" name="status" class="form-control" required="" disabled>
												</select>
												<label for="name">LOCATION:</label><select id="getLoc" name="loc" class="form-control" required="">
													<option value="SW">SW</option>
													<option value="NW">NW</option>
													<option value="PROBER">PROBER</option>
													<option value="HARDWARE">HARDWARE</option>
													<option value="HARDWARE">ENGG</option>
													<option value="OFF SITE REPAIR">OFF SITE</option>
												</select>
												<label for="remarks">REMARKS:</label><textarea id="remarks" name="remarks" class="form-control" rows="3"></textarea>
												
										</div>
										</div>
										<div class="row">
											<div class="col-md-12">
											<label for="sfile">SUPPORT FILE:</label>
																	<!-- <input type="file" class="custom-file-input" id="inputGroupFile01" required=""> -->
																	<input id="sfile" class="form-control" name="sfile" type="file" value="Choose file" accept=".jpg, .txt, .doc, .docx, .pdf, .xlsx, .csv, .jpeg, .jpg, .png, .bmp, .msg, .asc, .zip, .S">
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