<div class="page-content">
  <div class="card mb-3">
    <div class="card-header bg-secondary text-white">
      <h5>TESTER STAND INFORMATION</h5>
    </div>
    <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data">
        	<div class="row">
				<div class="col-sm-6">
					SERIAL ID:<input id="td1" name="itm_nm" type="text" class="form-control mb-2" tabindex="">
					FAMILY:<input id="td2" name="prt_no" type="text" class="form-control mb-2" tabindex="">
					TESTER PF:<input id="td3" name="vendor" type="text" class="form-control mb-2"  tabindex="">
				</div>
				<div class="col-sm-6">
          LINE:<input id="td4" name="line" type="text" class="form-control mb-2" tabindex="-1">
					RACK:<input id="td5" name="storage" type="text" class="form-control mb-2" tabindex="-1">
          Remarks:<textarea id="td6" name="remarks" class="form-control mb-2" rows="1"></textarea>
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
