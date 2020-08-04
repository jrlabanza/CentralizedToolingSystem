<div class="page-content">
  <div class="card mb-3">
    <div class="card-header bg-secondary text-white">
      <h5>SOCKET INFORMATION</h5>
    </div>
    <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="d-flex">
            <div class="col-md-4 p-2 flex-fill">
              SOCKET ID:<input id="td1" name="socketid" type="text" class="form-control mb-2" required="">
              FAMILY:<input id="td2" name="family" type="text" class="form-control mb-2" required="">
              VENDOR:<input id="td3" name="vendor" type="text" class="form-control mb-2" required="">
              TESTER PF:<input id="td4" name="tstPf" type="text" class="form-control mb-2" required="">
            </div>
            <div class="col-md-4 p-2 flex-fill">
              <!-- STATUS:<input name="status" type="text" class="form-control mb-2" value="IN-FOR QUAL" readonly tabindex="-1"> -->
              <!-- LOCATION:<select id="getLoc" name="loc" class="form-control mb-2" required="">
                <option value="" selected disabled></option>
                <option value="SW">SW</option>
                <option value="NW">NW</option>
                <option value="PROBER">PROBER</option>
                <option value="HARDWARE">HARDWARE</option>
                <option value="ENGG">ENGG</option>
                <option value="OFF SITE">OFF SITE</option>
              </select> -->
              GS CODE:<input id="td5" name="gsCode" type="text" class="form-control mb-2" required="">
              RACK:<input id="td6" name="storage" type="text" class="form-control mb-2" required="">
              MAX SHOT:<input id="td7" name="mShot" type="text" class="form-control mb-2 isNumberKey" required="">
              SITE:<select id="td8" name="site" class="form-control mb-2" required="">
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
            <div class="col-md-4 p-2 flex-fill">
              PACKAGE TYPE:<input id="td9" name="pckgType" type="text" class="form-control mb-2" required="">
              PART NO:<input id="td10" name="prtNo" type="text" class="form-control mb-2" required="">
              PIN TYPE:<input id="td11" name="pinType" type="text" class="form-control mb-2" required="">
              PIN COUNT:<input id="td12" name="pinCnt" type="text" class="form-control mb-2 isNumberKey" required="">
            </div>
          </div>
          <div class="d-flex">
            <div class="col-md-4 p-2 flex-fill">
              LINE:<select id="td13" name="line" class="form-control mb-2" required>
								<!-- <option value="LSI-ASSY">LSI-ASSY</option> -->
                <option value="LSI-FT">LSI-FT</option>
								<!-- <option value="QFN-ASSY">QFN-ASSY</option> -->
                <option value="QFN-FT">QFN-FT</option>
							</select>
            </div>
            <div class="col-md-8 p-2 flex-fill">
              REMARKS:<textarea id="td14" name="remarks" class="form-control mb-2" rows="2"></textarea>
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
