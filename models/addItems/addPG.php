<div class="page-content">
  <div class="card mb-3">
    <div class="card-header bg-secondary text-white">
      <h5>PROGRAM INFORMATION</h5>
    </div>
    <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="d-flex">
            <div class="col-md-6 p-2 flex-fill">
              SERIAL ID<input id="td1" name="srID" type="text" class="form-control mb-2" required="">
              PACKAGE TYPE<input id="td2" name="package_type" type="text" class="form-control mb-2" required="">
              FAMILY<input id="td3" name="family" type="text" class="form-control mb-2" required="">
              TESTER NAME<input id="td8" name="tester_name" type="text" class="form-control mb-2" required="">
            </div>
            <div class="col-md-6 p-2 flex-fill">
              DISC NO<input id="td4" name="disc_no" type="number" class="form-control mb-2" required="">
              TEST TYPE<input id="td5" name="test_type" type="text" class="form-control mb-2" required="">
              PROGRAM<input id="td6" name="program" type="text" class="form-control mb-2" required="">
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
