<script src="public/js/pagiJsQuery-2.1.1.js"></script>
<script>
function getresult(url) {
	$.ajax({
		url: url,
		type: "GET",
		data:  {rowcount:$("#rowcount").val(),"pagination_setting":$("#pagination-setting").val()},
		beforeSend: function(){$("#overlay").show();},
		success: function(data){
		$("#pagination-result").html(data);
		setInterval(function() {$("#overlay").hide(); },500);
		},
		error: function()
		{}
   });
}
function changePagination(option) {
	if(option!= "") {
		getresult("models/pagiResUser.php");
	}
}
</script>
</HEAD>

<BODY>
<!-- <div id="overlay"><div><img src="public/img/loading.svg" width="64px" height="64px"/></div></div> -->
<div class="page-content">
  <div class="card mb-3">
    <div class="card-header bg-secondary text-white">
      <h5>USER MANAGEMENT</h5>
    </div>
    <div class="card-body">
        <form method="post" action="?controller=posts&action=addUser" enctype="multipart/form-data">
          <div class="d-flex">
            <div class="col-md-4 p-2 flex-fill">
              <label for="name" style="display: none;">ID:</label><input id="userID" name="userID" type="text" class="form-control"  style="display: none;">
              <label for="name">AD ACCOUNT:</label><input id="adAccount" name="adAccount" type="text" class="form-control">
              <label for="name">LEVEL:</label><select id="level" name="level" class="form-control">
              <option value="0">CUSTODIAN</option>
              <option value="1">TECHNICIAN</option>
              <option value="2">POWER USER</option>
<?php if ($_SESSION['level'] == 3){ ?>              
              <option value="3">ADMIN</option>
<?php } ?>
              </select>
              <label for="name">LINE:</label>
<?php if ($_SESSION['level'] == 3){ ?>
              <select id="line" name="line" class="form-control">
                <option value="LSI-ASSY">LSI-ASSY</option>
                <option value="LSI-FT">LSI-FT</option>
                <option value="QFN-ASSY">QFN-ASSY</option>
                <option value="QFN-FT">QFN-FT</option>
              </select>
<?php }else{ ?>
              <input id="line" type="text" name="line" class="form-control" value="<?php echo $_SESSION['line']; ?>" readonly>
<?php } ?>
              <div class="card-footer">
                <div><?php if (isset($_SESSION['userRows'])){ echo $_SESSION['userRows']; } unset($_SESSION['userRows']);?></div>
                <div class="modal-footer">
                  <button type="submit" name="save" class="btn btn-primary">SAVE</button>
                  <button type="submit" name="update" class="btn btn-success">UPDATE</button>
                  <button type="submit" name="delete" class="btn btn-warning">DELETE</button>
						    </div>
              </div>
            </div>
            <div class="col-md-8 p-2 flex-fill">
              <div id="pagination-result">
                <input type="hidden" name="rowcount" id="rowcount" />
              </div>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>

	<div id="pagination-result">
	<input type="hidden" name="rowcount" id="rowcount" />
	</div>
</div>
<script>
getresult("models/pagiResUser.php");
</script>
