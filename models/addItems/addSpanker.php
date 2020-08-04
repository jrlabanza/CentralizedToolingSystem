<div class="page-content">
  <div class="card mb-3">
    <div class="card-header bg-secondary text-white">
      <h5>SPANKER INFORMATION</h5>
    </div>
    <div class="card-body">
        <!-- <form method="post" action="?controller=posts&action=addNozzle" enctype="multipart/form-data"> -->
        <form method="post" action="" enctype="multipart/form-data">
          <div class="d-flex">
            <div class="col-md-6 p-2 flex-fill">
              SPANKER PART NO.:<input id="td1" name="nozzlePrtNO" type="text" class="form-control mb-2" required>
              BOX NO.:<input id="td2" name="boxNo" type="text" class="form-control mb-2">
              SPANKER TYPE:<input id="td3" name="package" type="text" class="form-control mb-2" required>
              ALTERNATIVE SPANKER:<input id="td4" name="altrntvNozzle" type="text" class="form-control mb-2" required>
              LINE:<select id="td5" name="line" class="form-control mb-2" required>
								<option value="LSI-ASSY">LSI-ASSY</option>
                <!-- <option value="LSI-FT">LSI-FT</option> -->
                <option value="QFN-ASSY">QFN-ASSY</option>
								<!-- <option value="QFN-FT">QFN-FT</option> -->
							</select>
            </div>
            <div class="col-md-6 p-2 flex-fill">
              MACHINE MODEL:<input id="td6" name="machineModel" type="text" class="form-control mb-2" required>
              MAX SHOT:<input id="td7" name="mShot" type="text" class="form-control mb-2 isNumberKey" maxlength="10" required>
              REMARKS:<textarea id="td8" name="remarks" class="form-control mb-2" rows="3"></textarea>
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
