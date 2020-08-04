<div class="page-content">
  <div class="card mb-3">
    <div class="card-header bg-secondary text-white">
      <h5>CABLE INFORMATION</h5>
    </div>
    <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="d-flex">
            <div class="col-md-6 p-2 flex-fill">
              SERIAL ID:<input id="td1" name="serialID" type="text" class="form-control mb-2" required>
							TESTER PF:<input id="td2" name="tstPf" type="text" class="form-control mb-2" required>
              HANDLER PLATFORM:<input id="td3" name="hdPF" type="text" class="form-control mb-2" required>
							STORAGE:<input id="td4" name="storage" type="text" class="form-control mb-2" required>
              LINE:<select id="td5" name="line" class="form-control mb-2" required>
								<option value="LSI-ASSY">LSI-ASSY</option>
								<option value="LSI-FT">LSI-FT</option>
								<option value="QFN-ASSY">QFN-ASSY</option>
								<option value="QFN-FT">QFN-FT</option>
							</select>
            </div>
            <div class="col-md-6 p-2 flex-fill">
              CONNECTION TYPE:<input id="td6" name="ConType" type="text" class="form-control mb-2" maxlength="2" required>
              TESTER ID:<input id="td7" name="testerID" type="text" class="form-control mb-2" maxlength="3" required>
							HANDLER ID:<input id="td8" name="handlerID" type="text" class="form-control mb-2" maxlength="3" required>
              LOCATION:<input id="td9" name="handlerID" type="text" class="form-control mb-2" maxlength="3" required>

            </div>
          </div>
          <div class="d-flex">
            <div class="col-md-12 p-2 flex-fill">
              REMARKS:<textarea id="td10" name="remarks" class="form-control mb-2" maxlength="250" rows="2"></textarea>
            </div>
          </div>
          <div class="d-flex">
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
<script src="public/js/date/jquery-1.12.4.js"></script>
<script src="public/js/date/jquery-ui.js"></script>
<script>
$( ".datepicker" ).datepicker();
</script>