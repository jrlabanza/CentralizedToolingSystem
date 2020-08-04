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
	$result = $conn->query('SELECT * FROM socket WHERE socket_id="'.$id.'"');
	while ($row = $result->fetch_assoc()) { 
?>
				<form method="post" action="?controller=posts&action=saveSocket" enctype="multipart/form-data">
                    <div class="col-xs-6 form-group">
                        <div class="" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">SOCKET</h5>
                                </div>
                                <div class="modal-body">
                                        <div class="row d-flex justify-content-center">
                                                <div class="btn-group btn-group-toggle " data-toggle="buttons">
                                                    <label id="trackIn" class="btn btn-outline-primary">
                                                        <input name="track" value="IN" id="trackIn" type="radio" autocomplete="off" required=""> TRACK IN
                                                    </label>
                                                    <label id="trackOut" class="btn btn-outline-success">
                                                        <input name="track" value="OUT" id="trackOut" type="radio" autocomplete="off" required=""> TRACK OUT
                                                    </label>
                                                </div>
                                        </div>
                                        <br>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="getLBID">SOCKET ID:</label><input id="getLBID" name="socketid" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['socket_id']; ?>">
                                            <label for="getFam">FAMILY:</label><input id="getFam" name="family" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['family']; ?>">
                                            <label for="getVen">VENDOR:</label><input id="getVen" name="vendor" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['vendor']; ?>">
                                            <label for="getTstPF">TESTER PF:</label><input id="getTstPF" name="tstPf" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['tst_pf']; ?>">
                                            <label for="getLine">LINE:</label><input id="getLine" name="line" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['line']; ?>">
                                            <label for="getStrg">RACK:</label><input id="getStrg" name="storage" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['storage']; ?>">	
                                            <label for="getGSCode">GS CODE:</label><input id="getGSCode" name="gsCode" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['gs_code']; ?>">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="name">CLIENT :</label><input list="users" name="client" type="text" class="form-control" required="">
                                            <   datalist id="users">
													<?php include("../trackUsers.php"); ?>
												</datalist>
												<label for="name">TESTER ID:</label><select id="getTstID" name="tstID" type="text" class="form-control" required="">
<?php
												echo '<option value="N/A">N/A</option>';
												$result = $conn->query('SELECT tester_id FROM testers WHERE tst_pf="'.$row['tst_pf'].'"');
												while ($row2 = $result->fetch_assoc()) {
													echo '<option value="'.$row2['tester_id'].'">'.$row2['tester_id'].'</option>';
                                                }
?>
                                                </select>
												<label for="name">HANDLER ID:</label><input list="handlerList" id="getHdID" name="hdID" type="text" class="form-control" required="">
                                                <datalist id="handlerList">
<?php
												$result = $conn->query('SELECT handler_id FROM handlers');
												while ($row3 = $result->fetch_assoc()) {
													echo '<option value="'.$row3['handler_id'].'">'.$row3['handler_id'].'</option>';
                                                }
?>
                                                </datalist>
                                                <label for="name">STATUS:</label><select id="getStats" name="status" class="form-control" required="" disabled>
                                                </select>
                                                <label for="name">LOCATION:</label><select id="getLoc" name="loc" class="form-control" required="">
                                                    <option value="SW">SW</option>
                                                    <option value="NW">NW</option>
                                                    <option value="PROBER">PROBER</option>
                                                    <option value="HARDWARE">HARDWARE</option>
                                                    <option value="ENGG">ENGG</option>
                                                    <option value="OFF SITE">OFF SITE REPAIR</option>
                                                </select>
                                                <label for="remarks">REMARKS:</label><textarea id="remarks" name="remarks" class="form-control" rows="3"></textarea>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="getLBID">PACKAGE TYPE:</label><input id="getPType" name="pckgType" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['package_type']; ?>">
                                                <label for="getFam">PART NO:</label><input id="getPNo" name="prtNo" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['part_no']; ?>">
                                                <label for="getVen">PIN TYPE:</label><input id="getPinType" name="pinType" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['pin_type']; ?>">
                                                <label for="getDutReq">PIN COUNT:</label><input id="getPinCnt" name="pinCnt" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['pin_count']; ?>">
                                                <label for="getLine">MAX SHOT:</label><input id="getMShot" name="mShot" type="text" class="form-control" readonly="" tabindex="-1" value="<?php echo $row['max_shotcount']; ?>">
                                                <label for="getTstPF">CURRENT SHOT COUNT:</label><input id="getCrrntShotCnt" name="crrntShotCnt" type="text" class="form-control"  readonly="" tabindex="-1" value="<?php echo $row['shotcount']; ?>">
                                                <label for="getTstPF">SHOT COUNT:</label><input id="getShotCnt" name="shotCnt" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <label for="sfile">SUPPORT FILE:</label>
                                                <!-- <input type="file" class="custom-file-input" id="inputGroupFile01" required=""> -->
                                                <input id="sfile" class="form-control" name="sfile" type="file" value="Choose file">
                                                <!-- <label class="custom-file-label" for="inputGroupFile01" >Choose file</label> -->
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="getSite">SITE:</label><select id="getSite" name="site" class="form-control" required="">
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
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                    </div>
<?php	}
}else if($_POST['id'] == ""){
}
mysqli_close($conn);
?>
