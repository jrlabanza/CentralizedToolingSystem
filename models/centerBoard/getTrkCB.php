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
	$result = $conn->query('SELECT * FROM center_board WHERE serial_id="'.$id.'"');
	while ($row = $result->fetch_assoc()) {
		$status = $row['status'];
?>
						
					<form method="post" action="?controller=posts&action=saveCB" enctype="multipart/form-data">
						<div class="col-xs-6 form-group">
							<div class="" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">CENTER BOARD</h5>
									</div>
									<div class="modal-body">
											<div class="row d-flex justify-content-center">
													<div class="btn-group btn-group-toggle " data-toggle="buttons">
														<label id="trackIn" class="btn btn-outline-primary">
															<input name="track" value="IN" id="" type="radio" autocomplete="off" required=""> TRACK IN
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
												SERIAL ID:<input id="getSerID" name="srid" type="text" class="form-control mb-2" readonly="" tabindex="-1" value="<?php echo $row['serial_id'] ?>">
												TYPE:<input id="getLBID" name="lbid" type="text" class="form-control mb-2" readonly="" tabindex="-1" value="<?php echo $row['type'] ?>">
												FAMILY:<input id="getFam" name="family" type="text" class="form-control mb-2" readonly="" tabindex="-1" value="<?php echo $row['family'] ?>">
												VENDOR:<input id="getVen" name="vendor" type="text" class="form-control mb-2" readonly="" tabindex="-1" value="<?php echo $row['vendor'] ?>">
												TESTER PF:<input id="getTstPF" name="tstPf" type="text" class="form-control mb-2" readonly="" tabindex="-1" value="<?php echo $row['tst_pf'] ?>">
												LINE:<input id="getLine" name="line" type="text" class="form-control mb-2" readonly="" tabindex="-1" value="<?php echo $row['line'] ?>">
												RACK:<input id="getStrg" name="storage" type="text" class="form-control mb-2" readonly="" tabindex="-1" value="<?php echo $row['storage'] ?>">
											</div>
											<div class="col-md-6">
												CLIENT :<input list="users" name="borrower" type="text" class="form-control mb-2" required="">
												<datalist id="users">
													<?php include("../trackUsers.php"); ?>
												</datalist>
												TESTER ID:<select id="getTstID" name="tstID" type="text" class="form-control mb-2" required="">';
<?php
												// echo '<option value="N/A">N/A</option>';
												// // $result = $conn->query('SELECT tester_id FROM testers WHERE tst_pf="'.$row['tst_pf'].'"');
												// // while ($row2 = $result->fetch_assoc()) {
												// // 	echo '<option value="'.$row2['tester_id'].'">'.$row2['tester_id'].'</option>';
												// // }

												// $id=$row['tst_pf'];
												// echo '<option value="N/A" disabled selected></option>';
												// $result2 = $connMchnList->query('SELECT tester_id FROM testers WHERE cents_pf="'.$id.'" ORDER BY tester_id ASC');

												// if (mysqli_num_rows($result2) > 	0) {
												// 	while ($row2 = $result2->fetch_assoc()) {
												// 		echo '<option value="'.$row2['tester_id'].'">'.$row2['tester_id'].'</option>';
												// 	}
												// }else{
												// 	$result2 = $connMchnList->query('SELECT tester_id FROM testers ORDER BY tester_id ASC');
												// 	while ($row2 = $result2->fetch_assoc()) {
												// 		echo '<option value="'.$row2['tester_id'].'">'.$row2['tester_id'].'</option>';
												// 	}
												// }
?>
												</select>
												HANDLER ID:<input list="handlerList" id="getHdID" name="hdID" type="text" class="form-control mb-2" required="">
                                                <datalist id="handlerList"></datalist>
												STATUS:<select id="getStats" name="status" class="form-control mb-2" required="" disabled>
												<?php
													echo '<option value="'.$row['status'].'" selected>'.$row['status'].'</option>';
												?>
												</select>
												LOCATION:<select id="getLoc" name="loc" class="form-control mb-2" required="" disabled>
												<?php
													echo '<option value="'.$row['loc'].'" selected>'.$row['loc'].'</option>';
												?>
												</select>
												REMARKS:<textarea id="remarks" name="remarks" class="form-control mb-2" rows="3"></textarea>
												
										</div>
										</div>
										<div class="row">
											<div class="col-md-12">
											SUPPORT FILE:
																	<!-- <input type="file" class="custom-file-input" id="inputGroupFile01" required=""> -->
																	<input id="CBsfile" class="form-control" name="sfile" type="file" value="Choose file" accept=".jpg, .txt, .doc, .docx, .pdf, .xlsx, .csv, .jpeg, .jpg, .png, .bmp, .msg, .asc">
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
