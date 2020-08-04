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
	$result = $conn->query('SELECT * FROM bib WHERE barcode="'.$id.'"');
	while ($row = $result->fetch_assoc()) {
?>
						
					<form method="post" action="?controller=posts&action=saveBIB" enctype="multipart/form-data">
						<div class="col-xs-6 form-group">
							<div class="" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">BURN IN BOARD</h5>
									</div>
									<div class="modal-body">
											<div class="row d-flex justify-content-center">
													<div class="btn-group btn-group-toggle " data-toggle="buttons">
														<label id="trackIn" class="btn btn-outline-primary">
															<input name="track" value="IN" id="trackIn" type="radio" autocomplete="off" required=""> TRACK IN
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
												<label for="name">BARCODE:</label><input id="getBarcode" name="barcode" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['barcode'] ?>">
												<label for="name">BURN IN BOARD ID:</label><input id="getBIBID" name="bib_id" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['bib_id'] ?>">

												<label for="name">SERIAL ID:</label><input id="getSerID" name="srid" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['serial_id'] ?>">
												<label for="name">FAMILY:</label><input id="getFam" name="family" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['family'] ?>">
												<label for="name">LINE:</label><input id="getLine" name="line" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['line'] ?>">
												<label for="name">RACK:</label><input id="getStrg" name="storage" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['storage'] ?>">
											</div>
											<div class="col-md-6">
												<label for="name">CLIENT :</label><input list="users" name="borrower" type="text" class="form-control" required="">
												<datalist id="users">
													<?php include("../trackUsers.php"); ?>
												</datalist>

<?php
												// echo '<option value="N/A">N/A</option>';
												$result = $conn->query('SELECT tester_id FROM testers WHERE tst_pf="'.$row['tst_pf'].'"');
												while ($row = $result->fetch_assoc()) {
													echo '<option value="'.$row['tester_id'].'">'.$row['tester_id'].'</option>';
												}
?>
												</select>
												<!-- HANDLER ID:<input list="handlerList" id="getHdID" name="hdID" type="text" class="form-control mb-2" required=""> -->
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
