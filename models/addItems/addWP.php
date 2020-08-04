<div class="page-content">
  <div class="card mb-3">
    <div class="card-header bg-secondary text-white">
      <h5>WORK PRESS INFORMATION</h5>
    </div>
    <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="d-flex">
            <div class="col-md-6 p-2 flex-fill">
              SERIAL ID:<input id="td1" name="serialID" type="text" class="form-control mb-2" required="">
              PACKAGE TYPE:<input id="td2" name="pckgType" type="text" class="form-control mb-2" required="">
              PART NO:<input id="td3" name="prtNo" type="text" class="form-control mb-2" required="">
              DUT REQ:<input id="td4" name="dutReq" type="text" class="form-control mb-2 isNumberKey" required="">
              MATERIAL:<input id="td5" name="material" type="text" class="form-control mb-2" required="">
              VENDOR:<input id="td6" name="vendor" type="text" class="form-control mb-2" required="">
            </div>
            <div class="col-md-6 p-2 flex-fill">
              TESTER MODEL:<input id="td7" name="tstPf" type="text" class="form-control mb-2" required="">
              HANDLER MODEL:<input id="td8" name="hdPf" type="text" class="form-control mb-2" required="">
              MAX SHOT:<input id="td9" name="mShot" type="text" class="form-control mb-2 isNumberKey" required="">
              RACK:<input id="td10" name="storage" type="text" class="form-control mb-2" required="">
              GS CODE:<input id="td11" name="gsCode" type="text" class="form-control mb-2" required="">
              LINE:<select id="td12" name="line" class="form-control mb-2" required>
                <option value="" disabled selected></option>
								<!-- <option value="LSI-ASSY">LSI-ASSY</option> -->
                <option value="LSI-FT">LSI-FT</option>
								<!-- <option value="QFN-ASSY">QFN-ASSY</option> -->
                <option value="QFN-FT">QFN-FT</option>
							</select>
            </div>
          </div>
          <div class="d-flex">
            <div class="col-md-12 p-2 flex-fill">
              REMARKS:<textarea id="td13" name="remarks" class="form-control mb-2" rows="2"></textarea>
            </div>
          </div>
          <!-- <div class="d-flex">
            <div class="col-md-12 p-2 flex-fill">
            SUPPORT FILE: -->
                <!-- <input type="file" class="custom-file-input" id="inputGroupFile01" required=""> -->
                <!-- <input id="td15" class="form-control mb-2" name="sfile" type="file" value="Choose file"> -->
                <!-- <label class="custom-file-label" for="inputGroupFile01" >Choose file</label> -->
            <!-- </div>
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
