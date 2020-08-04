<div class="page-content">
  <div class="card mb-3">
    <div class="card-header bg-secondary text-white">
      <h5>LOADBOARD INFORMATION</h5>
    </div>
    <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="d-flex">
            <div class="col-md-6 p-2 flex-fill">
              SERIAL ID<input id="td1" name="srID" type="text" class="form-control mb-2" required="">
              LOAD BOARD ID<input id="td2" name="lbID" type="text" class="form-control mb-2" required="">
              FAMILY<input id="td3" name="family" type="text" class="form-control mb-2" required="">
              <!-- DUT REQ.<input name="dutReq" type="text" class="form-control mb-2" required=""> -->
              N++<input id="td8" name="nplus" type="text" class="form-control mb-2 isNumberKey" maxlength="2" required="">
            </div>
            <div class="col-md-6 p-2 flex-fill">
              TESTER PF<input id="td4" name="tstPF" type="text" class="form-control mb-2" required="">
              <!-- STATUS<input id="td1" name="status" type="text" class="form-control mb-2" value="IN-FOR QUAL" readonly> -->
              <!-- LOCATION<input id="td1" name="loc" type="text" class="form-control mb-2" required=""> -->
              RACK<input id="td5" name="storage" type="text" class="form-control mb-2" required="">
              VENDOR<input id="td6" name="vendor" type="text" class="form-control mb-2" required="">
              LINE:<select id="td7" name="line" class="form-control mb-2" required>
								<option value="LSI-FT">LSI-FT</option>
								<option value="QFN-FT">QFN-FT</option>
							</select>
            </div>
          </div>
          <div class="d-flex">
            <div class="col-md-12 p-2 flex-fill">
              REMARKS<textarea id="td9" name="descrip" class="form-control mb-2" maxlength="250" required="" ></textarea>
            </div>
          </div>
          <!-- <div class="d-flex">
            <div class="col-md-12 p-2 flex-fill">
              SUPPORT FILE<input id="sfile" class="form-control mb-2" name="sfile" type="file" value="Choose file">
            </div>
          </div> -->
          <div class="card-footer">
            <div class="d-flex justify-content-center">
              <div id="message"></div>
            </div>
            <div class="d-flex justify-content-center">
              <button id="saveAdd" type="button" name="submit" class="btn btn-success">SAVE</button>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>
