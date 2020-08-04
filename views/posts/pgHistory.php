<link rel="stylesheet" href="public/js/date/jquery-ui.css">
<div id="overlay"><div><img src="public/img/loading.svg" width="64px" height="64px"/></div></div>
<div class="page-content"  style="width: 1600px;">
  <div class="card">
    <div class="card-header">
      PROGRAM HISTORY
    </div>
    <div class="card-body">
      <form class="form-inline" method="post" action="models/program/exportData.php">
          <input type="text" name="serialID" class="form-control mb-2 mr-sm-2 IDHist" id="lbIDHist" placeholder="SERIAL ID">
          <input name="from" id="from" class="form-control mb-2 mr-sm-2 datepicker from" type="text" placeholder="START DATE">
          <input name="to" id="to" class="form-control mb-2 mr-sm-2 datepicker to" type="text" placeholder="END DATE">
          <button id="bttnHistSearch" type="button" class="btn btn-success mb-2 mr-sm-2">GO</button>
          <button type="submit" class="btn btn-primary mb-2 mr-sm-2">DOWNLOAD</button>
          <!-- <a class="btn btn-primary mb-2 mr-sm-2 export" href="models/exportData.php">DOWNLOAD</a></button> -->
        </form>
    </div>
</div>
	<div style="border-bottom: #F0F0F0 1px solid;margin-bottom: 15px;">
    <h1><span class="badge badge-primary"></span></h1>

	<br>
	</div>
	<div id="pagination-result">
	<input type="hidden" name="rowcount" id="rowcount" />
	</div>
</div>

<style>
body{width:600px;font-family:"Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;font-size:14px;}
</style>

<script src="public/js/pagiJsQuery-2.1.1.js"></script>
<script src="public/js/date/jquery-1.12.4.js"></script>
<script src="public/js/date/jquery-ui.js"></script>
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
		getresult("models/program/pagiResPGHis.php");
	}
}
</script>
<script>
getresult("models/program/pagiResPGHis.php");
$( ".datepicker" ).datepicker();
</script>
