<div class="page-content">
  <div class="card mb-3">
    <div class="card-header bg-secondary text-white">
      <h5>TESTER PARTS INFORMATION</h5>
    </div>
    <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data">
        	<div class="row">
				<div class="col-sm-6">
					ITEM NAME:<input id="td1" name="itm_nm" type="text" class="form-control mb-2" tabindex="">
          PART NAME:<input id="td2" name="dscrptn" type="text" class="form-control mb-2" tabindex="">
					PART NO:<input id="td3" name="prt_no" type="text" class="form-control mb-2" tabindex="">
          QUANTITY:<input id="td10" name="quantity" type="text" class="form-control mb-2" tabindex="">	
          COST($):<input id="td4" name="srl_no" type="number" class="form-control mb-2" tabindex="">
				</div>
				<div class="col-sm-6">
					TESTER PLATFORM:<input id="td6" name="mchn_model" type="text" class="form-control mb-2" tabindex="">	
          MAKER:<input id="td5" name="vendor" type="text" class="form-control mb-2"  tabindex="">
					LOCATION:<input id="td8" name="lction" type="text" class="form-control mb-2" tabindex="">	
          STATUS:<select id="td7" name="status" type="text" class="form-control mb-2" tabindex="">
          <option value="IN">IN</option>
          <option value="OUT">OUT</option>
          </select>
					REMARKS:<input id="td9" name="remarks" type="text" class="form-control mb-2" tabindex="">		

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
