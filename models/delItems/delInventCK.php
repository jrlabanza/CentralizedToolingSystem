<div class="col-xs-6 form-group">
	<div class="modal" id="bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">DELETE?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<h6>Are you sure you want to DELETE the selected item(s)?</h6>
			</div>	
			<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
					<button id="yesDel" name="submit" class="btn btn-primary" data-dismiss="modal">YES</button>
			</div>
			</div>
		</div>
	</div>
</div>

<div id="overlay"><div><img src="public/img/loading.svg" width="64px" height="64px"/></div></div>
	<div class="page-content"  style="width: 1600px;">
		<div id="pagination-result">
			<input type="text" name="rowcount" id="rowcount" style="display: none;" />
		</div>
	</div>

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

getresult("models/delItems/delResCK.php");
</script>
