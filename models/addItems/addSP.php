<?php $path = $_SERVER['DOCUMENT_ROOT']; ?>
<div class="page-content">
  <div class="card mb-3">
    <div class="card-header bg-secondary text-white">
      <h5>SPARE PARTS INFORMATION</h5>
    </div>
    <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data">
        	<div class="row">
				<div class="col-sm-6">
					DESCRIPTION:<input id="td1" name="rubber-tip-no" type="text" class="form-control mb-2" tabindex="">
					QUANTITY:<input id="td3" name="box" type="text" class="form-control mb-2" tabindex="">
          RACK:<input id="td5" name="location" type="text" class="form-control mb-2" tabindex="" list='rack-list'>	
          <datalist id='rack-list'>
            <?php require("../rack.php") ?>
          </datalist>
					LINE:<select id="td7" name="line" class="form-control mb-2" required>
								<option value="LSI-ASSY">LSI-ASSY</option>
								<option value="LSI-FT">LSI-FT</option>
								<option value="QFN-ASSY">QFN-ASSY</option>
								<option value="QFN-FT">QFN-FT</option>
						</select>		
          <!-- UPLOAD IMAGE:  <input type="file" name="fileToUpload[]" id="fileToUpload" multiple="" /> -->
          UPLOAD IMAGE:
          <div class="custom-file mb-2">
          <input name="userImage" id="userImage" type="file" class="custom-file-input" />
              <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
				</div>
				<div class="col-sm-6">
					PARTS CODE<input id="td2" name="package" type="text" class="form-control mb-2" tabindex="">
					MAKER:<input id="td4" name="machine-model" type="text" class="form-control mb-2" tabindex="">
          MACHINE:<input id="td6" name="machine-model" type="text" class="form-control mb-2" tabindex="" list='machine-list'>
          <datalist id='machine-list'>
          <?php require("../spareParts/machineID.php") ?>
          </datalist>
          STATUS:<select id="td8" name="status" type="text" class="form-control mb-2" tabindex="">
          <option value="IN">IN</option>
          </select>
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
