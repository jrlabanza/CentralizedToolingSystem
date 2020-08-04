<div class="page-content">
  <div class="card mb-3">
    <div class="card-header bg-secondary text-white">
      <h5>BURN IN BOARD INFORMATION</h5>
    </div>
    <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="d-flex">
            <div class="col-md-4 p-2 flex-fill">
              BARCODE<input id="td8" name="barcode" type="text" class="form-control mb-2" required="">
              SERIAL ID<input id="td1" name="srID" type="text" class="form-control mb-2" required="">
              FAMILY<input id="td2" name="family" type="text" class="form-control mb-2" required="">
              <!-- DUT REQ.<input name="dutReq" type="text" class="form-control mb-2" required=""> -->
            </div>
            <div class="col-md-4 p-2 flex-fill">
              BIB ID<input id="td9" name="bib_id" type="text" class="form-control mb-2" required="">
              <!-- TESTER PF<input id="td3" name="tstPF" type="text" class="form-control mb-2" required=""> -->
              <!-- STATUS<input id="td4" name="status" type="text" class="form-control mb-2" value="IN-FOR QUAL" readonly> -->
              <!-- LOCATION<input id="td5" name="loc" type="text" class="form-control mb-2" required=""> -->
              VENDOR<input id="td5" name="vendor" type="text" class="form-control mb-2" required="">
            </div>
            <div class="col-md-4 p-2 flex-fill">
              STORAGE<input id="td4" name="storage" type="text" class="form-control mb-2" required="">
              LINE:<select id="td6" name="line" class="form-control mb-2" required>
                <!-- <option value="LSI-ASSY">LSI-ASSY</option> -->
                <option value="LSI-FT">LSI-FT</option>
								<!-- <option value="QFN-ASSY">QFN-ASSY</option> -->
                <option value="QFN-FT">QFN-FT</option>
							</select>
            </div>
          </div>
          <div class="d-flex">
            <div class="col-md-12 p-2 flex-fill">
            REMARKS<textarea id="td7" name="remarks" class="form-control mb-2" maxlength="250" required="" ></textarea>
            </div>
          </div>
          <div class="d-flex">
            <div class="col-md-12 p-2 flex-fill">
              <!-- SUPPORT FILE<input id="td8" class="form-control mb-2" name="sfile" type="file" value="Choose file"> -->
            </div>
          </div>
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
