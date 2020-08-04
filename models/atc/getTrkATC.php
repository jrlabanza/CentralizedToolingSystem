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
	$result = $conn->query('SELECT * FROM atc WHERE serial_id="'.$id.'"');
	while ($row = $result->fetch_assoc()) {
		$status = $row['status'];
?>
						
			<form id="saveData" method="post" action="models/atc/saveATC.php" enctype="multipart/form-data">
		<!-- <form id="saveData" method="post" action="" enctype="multipart/form-data"> -->
			<div class="col-xs-6 form-group">
				<div class="" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">AUTO CORR</h5>
							<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
								<span aria-hidden="true">×</span>
							</button> -->
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
												SERIAL ID:<input id="getSerID" name="srid" type="text" class="form-control mb-2" readonly="" tabindex="-1" value="<?php echo $row['serial_id'] ?>">
                                                FAMILY:<input id="getFam" name="family" type="text" class="form-control mb-2" readonly="" tabindex="-1" value="<?php echo $row['family'] ?>">
												TESTER PF:<input id="getTstPF" name="tstPf" type="text" class="form-control mb-2" readonly="" tabindex="-1" value="<?php echo $row['tst_pf'] ?>">
                                                ACU NEED:<input id="getTestType" name="testType" type="text" class="form-control mb-2" readonly="" tabindex="-1" value="<?php echo $row['acu_need'] ?>">
                                                LINE:<input id="getLine" name="line" type="text" class="form-control mb-2" readonly="" tabindex="-1" value="<?php echo $row['line'] ?>">
												RACK:<input id="getStrg" name="storage" type="text" class="form-control mb-2" readonly="" tabindex="-1" value="<?php echo $row['storage'] ?>">
											</div>
											<div class="col-md-6">
												CLIENT :<input list="users" name="borrower" type="text" class="form-control mb-2" required="">
												<datalist id="users">
													<?php include("../trackUsers.php"); ?>
												</datalist>
												TESTER ID:<select id="getTstID" name="tstID" type="text" class="form-control mb-2" required="">
<?php
												echo '<option value="N/A">N/A</option>';
												$result = $conn->query('SELECT tester_id FROM testers WHERE tst_pf="'.$row['tst_pf'].'"');
												while ($row2 = $result->fetch_assoc()) {
													echo '<option value="'.$row2['tester_id'].'">'.$row2['tester_id'].'</option>';
												}
?>
												</select>

<?php
												// $result = $conn->query('SELECT handler_id FROM handlers');
												// while ($row3 = $result->fetch_assoc()) {
												// 	echo '<option value="'.$row3['handler_id'].'">'.$row3['handler_id'].'</option>';
                                                // }
?>
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
                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        <!-- GOOD QTY:<input id="getgoodQty" maxlength="2" name="goodQty" type="text" class="form-control mb-2 isNumberKey" required> -->
                                                        ACU ID:<input id="" name="acuID" type="text" class="form-control mb-2 isNumberKeyComma" required>
                                                        <!-- <input name="noGoodQty" type="checkbox" class="">Correct ACU ID? -->
                                                    </div>
                                                </div>												
										</div>
                                        <div class="col-sm-12">
                                            REMARKS:<textarea id="remarks" name="remarks" class="form-control mb-2" rows="1"></textarea>
                                        </div>
										</div>
										<div class="row">
											<div class="col-md-12">
											SUPPORT FILE:
																	<!-- <input type="file" class="custom-file-input" id="inputGroupFile01" required=""> -->
																	<input id="" class="form-control" name="sfile" type="file" value="Choose file" accept=".jpg, .txt, .doc, .docx, .pdf, .xlsx, .csv, .jpeg, .jpg, .png, .bmp, .msg, .asc">
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
