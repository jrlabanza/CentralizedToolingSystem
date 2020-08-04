$(document).on("click",".tbody tr",function(){
	$(this).addClass("selected");
	var tblID = $('.tblID',this).html();

	var srID = $('.srID',this).html();
	var lbID = $('.lbID',this).html();
	var fam = $('.fam',this).html();
	// var ven = $('.ven',this).html();
	var dut = $('.dut',this).html();
	var tst = $('.tst',this).html();
	var stats = $('.stats',this).html();
	var tstID = $('.tstID',this).html();
	var hdID = $('.hdID',this).html();
	var loc = $('.loc',this).html();
	var strg = $('.strg',this).html();
	var ven = $('.ven',this).html();
	var line = $('.line',this).html();
	var pckgType = $('.pckgType',this).html();
	var prtNo = $('.prtNo',this).html();
	var pinType = $('.pinType',this).html();
	var pinCount = $('.pinCount',this).html();
	var mShotCnt = $('.mShotCnt',this).html();
	var ShotCnt = $('.ShotCnt',this).html();
	var site = $('.site',this).html();
	var gsCode = $('.gsCode',this).html();
	var testType = $('.testType',this).html();
	var dateColl = $('.dateColl',this).html();
	var dateExpire = $('.dateExpire',this).html();
	var qaStamp = $('.qaStamp',this).html();
	var goodQty = $('.goodQty',this).html();
	var noGoodQty = $('.noGoodQty',this).html();
	var file = $('.file',this).html();
	//
	var changeKitID = $(this).attr("data-change-kit");
	var category = $('.cat',this).html();
	var handlerPF = $('.hdPF',this).html();
	var storage = $('.strg',this).html();
	var packageType = $('.pkgType',this).html();
	var size = $('.size',this).html();
	var ckResult = $('.ckResult',this).html();
	//

	var testerPartsID = $(this).attr("data-tester-parts");
	var itm_nm = $(".itm_nm", this).html();
	var quantity = $(".quantity",this).html();
	var dscrptn = $(".dscrptn", this).html();
	var prt_no = $(".prt_no",this).html();
	var srl_no = $(".srl_no", this).html();
	var vendor = $(".vendor", this).html();
	var mchn_model = $(".mchn_model",this).html();
	var status = $(".status",this).html();
	var lction = $(".lction", this).html();
	var remarks = $(".remarks", this).html();
	var prson = $(".prson", this).html();
	var date_time = $(".date_time", this).html();
	var current_quantity = $(this).attr("data-current-quantity");
	var status = $(".status",this).html();

	//

	var current_quantity = $(".quantity",this).html();
	var rubber_tip_no = $(".rubber_tip_no",this).html();
	var mchn_id = $(".mchn_id",this).html();
	var package = $(".package",this).html();
	var status = $(".status",this).html();
	var box = $(".box",this).html();
	var lction = $(".lction",this).html();
	var mchn_model = $(".mchn_model",this).html();
	var line = $(".line",this).html();

	//bibID

	var bibBarcode = $(".bibBarcode",this).html();
	var bibID = $(".bibID",this).html();

	//spare parts

	var description = $(".description",this).html();
	var parts_code = $(".parts_code",this).html();
	// var maker = $(".maker",this).html();
	// var machine = $(".machine",this).html();

	//var id=$(this).val();
	//var dataString = 'id='+ id;
	var td0 = $(".td0",this).html();
	var td1 = $(".td1",this).html();
	var td2 = $(".td2",this).html();
	var td3 = $(".td3",this).html();
	var td4 = $(".td4",this).html();
	var td5 = $(".td5",this).html();
	var td6 = $(".td6",this).html();
	var td7 = $(".td7",this).html();
	var td8 = $(".td8",this).html();
	var td9 = $(".td9",this).html();
	var td10 = $(".td10",this).html();
	var td11 = $(".td11",this).html();
	var td12 = $(".td12",this).html();
	var td13 = $(".td13",this).html();
	var td14 = $(".td14",this).html();
	var expDate = $(".expDate",this).html();

	$("#getTblID").val(tblID);
	$("#getSrID").val(srID);
	$("#getLBID").val(lbID);
	$("#getFam").val(fam);
	$("#getVen").val(fam);
	$("#getDutReq").val(dut);
	$("#getTstPF").val(tst);
	$("#getStats").val(stats);
	$("#getTstID").val(tstID);
	$("#getHdID").val(hdID);
	$("#getLoc").val(loc);
	$("#getStrg").val(strg);
	$("#getVen").val(ven);
	$("#getLine").val(line);
	$("#getPType").val(pckgType);
	$("#getPNo").val(prtNo);
	$("#getPinType").val(pinType);
	$("#getPinCnt").val(pinCount);
	$("#getMShot").val(mShotCnt);
	$("#getCrrntShotCnt").val(ShotCnt);
	$("#getSite").val(site);
	$("#getGSCode").val(gsCode);
	$("#getTestType").val(testType);
	$("#sfile").val("");
	$("#sfileNotReq").val("");
	$("#msg").html("");
	$("#getdateColl").val(dateColl);
	$("#getdateExpire").val(dateExpire);
	$("#getqaStamp").val(qaStamp);
	$("#getgoodQty").val(goodQty);
	$("#getnoGoodQty").val(noGoodQty);
	//
	$("#getCategory").val(category);
	$("#getHandlerPlatform").val(handlerPF);
	$("#getStorage").val(storage);
	$("#getPackage").val(packageType);
	$("#getSize").val(size);
	$("#geFinalResult").val(ckResult);

	$(".progress-bar").css("width","0%");

	$("#getExpDate").val(expDate);

	$('#getStats')
		.attr("disabled","disabled")
		.find('option')
		.remove()
		.end()
		.append('<option value="'+stats+'">'+stats+'</option>');
	$('.trackIn').prop('checked', false);
	$('.trackOut').prop('checked', false);
	$('#trackIn').prop("class","btn btn-outline-primary");
	$('#trackOut').prop("class","btn btn-outline-success");
	$('#getLoc')
		.attr("disabled","disabled")
		.find('option')
		.remove()
		.end();

	$("#gettd0").val(td0);
	$("#gettd1").val(td1);
	$("#gettd2").val(td2);
	$("#gettd3").val(td3);
	$("#gettd4").val(td4);
	$("#gettd5").val(td5);
	$("#gettd6").val(td6);
	$("#gettd7").val(td7);
	$("#gettd8").val(td8);
	$("#gettd9").val(td9);
	$("#gettd10").val(td10);
	$("#gettd11").val(td11);
	$("#gettd12").val(td12);
	$("#gettd13").val(td13);
	$("#gettd14").val(td14);
	//

	$(".getItemName").val(itm_nm);
	$(".getPartNumber").val(prt_no);
	$(".getVendor").val(vendor);
	$(".getLocation").val(lction);
	$(".getPartName").val(dscrptn);
	$(".getSerialNumber").val(srl_no);
	$(".getTesterPlatform").val(mchn_model);
	$(".getCurrentQuantity").val(current_quantity);
	$(".getID").val(testerPartsID);
	$(".getRemarks").val(remarks);
	$(".getStatus").val(status);

	//

	$(".getCurrentQuantity").val(current_quantity);
	$(".getRubberTipNo").val(rubber_tip_no);
	$(".getMachineID").val(mchn_id);
	$(".getPackage").val(package);
	$(".getStatus").val(status);
	$(".getBox").val(box);
	$(".getLocation").val(lction);
	$(".getMachineModel").val(mchn_model);
	$(".getLine").val(line);

	//

	$("#getBarcode").val(bibBarcode);
	$("#getBIBID").val(bibID);

	//

	$(".getDescription").val(description);
	$(".getPartsCode").val(parts_code);
	// $(".getMaker").val(maker);
	// $(".getMachine").val(machine);

	$("#srID").val(td0);

	//tester parts auto out
	$(".testerPartsAutoOut").val("OUT");

	if (stats == "OUT-PROD" || stats == "OUT-REPAIR" || stats == "OUT-ENGG" || stats == "PM" || stats == "SCRAP"){
		$('#trackOut').css("display","none");
	}else{
		$('#trackOut').css("display","");
	}

	var now = new Date();
    expiry   = new Date(expDate);
    diff  = new Date(expiry - now);
	days  = diff/1000/60/60/24;
	days = days.toFixed(2);
	//date_to_reply.getTime() - today.getTime()

	var id=$("#getTstPF").val();
	var dataString = 'id='+ id;
	if (changeKitID != null){
		$.post(
			"models/changeKit/getChangeKitData.php",
			{
				"id" : changeKitID 
			},
			function(data){
				
				var obj = JSON.parse(data);
				$(".getID").val(obj.id);
				$(".getSrID").val(obj.serial_id);
				$(".getHandlerPlatform").val(obj.handler_pf);
				$(".getStorage").val(obj.storage);
				$(".getCategory").val(obj.category);
				$(".getSize").val(obj.size);
				$(".getPackage").val(obj.package_type);
				$(".getFinalResult").val(obj.ckResult);
				$(".getWorkpress").val(obj.workPress);
				$(".getInputShuttle").val(obj.inputShuttle);
				$(".getOutputShuttle").val(obj.outputShuttle);
				$(".getCoolingShuttle").val(obj.coolingShuttle);
				$(".getTrayPlate").val(obj.trayPlate);
				$(".getTrayPokayoke").val(obj.trayPokayoke);
				$(".getHotPlate").val(obj.hotPlate);
				$(".getSoakBoat").val(obj.soakBoat);
				$(".getRotatorLoader").val(obj.rotatorLoader);
				$(".getNozzle").val(obj.nozzle);
				$(".getLoc").val(obj.loc);
				$(".getPeaker").val(obj.peaker);
				$(".getChuck").val(obj.chuck);
				$(".getCenterJig").val(obj.centeringJig);
				$(".getUnloaderMagazineNGLane").val(obj.unloaderMagazineNGLane);
				$(".getUnloaderPlasticMagazineGoodLane").val(obj.unloaderPlasticGoodLane);
				$(".getLoader").val(obj.loader);
				$(".getLoaderMagazine").val(obj.loaderMagazine);
				$(".getUnloaderMagazine").val(obj.unloaderMagazine);
				$(".getLoaderGoodMagazine").val(obj.loaderGoodMagazine);
				$(".getContactor").val(obj.contactor);
				$(".getStabilizer").val(obj.stabilizer);
				$(".getTestSite").val(obj.testSite);
				$(".getTotal").val(obj.total);
				$(".getInitialStatus").val(obj.initialStatus);
				$(".getBuyoffUsingReference").val(obj.buyoffUsingReference);
				$(".getWorkplessAssembly").val(obj.workPressAssembly);
				$(".getSocketJig").val(obj.socketJig);
				$(".getBasePlate").val(obj.basePlate);
				$(".getPreheatPlate").val(obj.preheatPlate);
				$(".getPoolChute").val(obj.poolChute);
				$(".getPusher").val(obj.pusher);
				$(".getLeadGuide").val(obj.leadGuide);
				$(".getFreeTestChute").val(obj.freeTestChute);
				$(".getRotatorUnloader").val(obj.rotatorUnloader);
				$(".getTstPF").val(obj.tester_pf);
			}
		);
	}

	//  $.ajax({
	// 	type: "POST",
	// 	url: "models/changeKit/getChangeKitData.php",
	// 	data: 
	// 	{
	// 		"id" : changeKitID 
	// 	},
	// 	cache: false,
	// 	success: function(data){
	// 		console.log(data);
	// 	}
	// });

	$.ajax({
		type: "POST",
		url: "models/getTstID.php",
		data: dataString,
		cache: false,
		success: function(html){
		$("#getTstIDdiv").html(html);
		}
		});
		
	$.ajax({
		type: "POST",
		url: "models/getHdID.php",
		//data: dataString,
		cache: false,
		success: function(html){
			$("#hdDataList").html(html);
		}
	});

	$.ajax({
		type: "POST",
		url: "models/sessionCheck.php",
		//data: dataString,
		cache: false,
		success: function(html){
		var level = html;
			if (level == ""){
				document.getElementById("trackOut").style.display = "none";
			}

			if (expDate !== null){
				if (days <= 0){
					alert (srID + " Item already expired.");
				}else if (days <= 30){
					alert (days + " Days left before expiary date.");
				}

				if (file == ''){
					$("#getFile").html("");
					alert("No current Data Log uploaded");
				}else{
					$("#getFile").html("Current uploaded  <a href='uploads/"+file+"' target='_blank' class='btn-link'>"+file+"</a>");
				}
			}
		}
	});

$('#showModal').click();
$("#message").html("");

});

$(document).on("click","#trackIn",function(){
	var line = $("#getLine").val();

	if (line == "LSI-ASSY"){	
		$('#getLoc')
		.removeAttr("disabled")
		.find('option')
		.remove()
		.end()
		.append('<option value="TOOLING">TOOLING</option>')
		.append('<option value="PRODUCTION">PRODUCTION</option>')
		.append('<option value="KITTING">KITTING</option>');
	}else if (line == "QFN-ASSY"){	
		$('#getLoc')
		.removeAttr("disabled")
		.find('option')
		.remove()
		.end()
		.append('<option value="KITTING">KITTING</option>');
	}
	// else if ($("#exampleModalLabel").html() == "INSERT AND CLAMP"){
	// 	$('#getLoc')
	// 	.removeAttr("disabled")
	// 	.find('option')
	// 	.remove()
	// 	.end()
	// 	.append('<option value="TOOLING">TOOLING</option>')
		
	// 	.append('<option value="KITTING">KITTING</option>');
	// }
	else{
		$('#getLoc')
		.removeAttr("disabled")
		.find('option')
		.remove()
		.end()
		.append('<option value="HARDWARE">HARDWARE</option>');
	}
	if ($("#exampleModalLabel").html() == "SPANKER" || $("#exampleModalLabel").html() == "INSERT AND CLAMP" || $("#exampleModalLabel").html() == "NOZZLE"){
		$('#getStats')
		.removeAttr("disabled")
		.find('option')
		.remove()
		.end()
		.append('<option value="IN-GOOD">IN-GOOD</option>')
		.append('<option value="IN-REPAIR">IN-REPAIR</option>')
		.append('<option value="IN-FOR CLEANING">IN-FOR CLEANING</option>')
		.append('<option value="IN-FOR QUAL">IN-FOR QUAL</option>')
		.append('<option value="END OF LIFE / SCRAP">END OF LIFE / SCRAP</option>')
		// .append('<option value="PM">PM</option>');
	}
	else{
		$('#getStats')
		.removeAttr("disabled")
		.find('option')
		.remove()
		.end()
		.append('<option value="IN-GOOD">IN-GOOD</option>')
		.append('<option value="IN-REPAIR">IN-REPAIR</option>')
		.append('<option value="IN-FOR CLEANING">IN-FOR CLEANING</option>')
		.append('<option value="IN-FOR QUAL">IN-FOR QUAL</option>')
		.append('<option value="END OF LIFE">END OF LIFE</option>')
		.append('<option value="SCRAP">SCRAP</option>')
		.append('<option value="PM">PM</option>');
	}


	if (line == "QFN-FT"){
		$('#getStats').append('<option value="FAILED">FAILED</option>')
	}

	$('#sfile').attr("required","required");

	// $('#getTstIDdiv').html('<select id="getTstID" name="tstID" type="text" class="form-control mb-2" required=""></select>');
	$('#getTstID').find('option')
	.remove()
	.end()
	.append('<option value="N/A">N/A</option>')
	.attr("readonly","readonly");
	

	$('#getHdID')
	.val("N/A")
	.attr("readonly","readonly");

	$('#getShotCnt')
	.val('')
	.removeAttr("readonly");

});

// $(document).ready(function(){
// 	var id = $("#getTstPF").val();
// 	$.ajax({
// 		type: "POST",
// 		url: "models/getTstID.php",
// 		data: "id:"+id,
// 		cache: false,
// 		success: function(html){
// 			console.log(id);
// 			$("#getTstID").html(html);
// 		}
// 		});
// });

$(document).ready(function(){
	$.ajax({
		type: "POST",
		url: "models/getAssyEquipID.php",
		//data: dataString,
		cache: false,
		success: function(html){
			$("#assyEqpList").html(html);
			$('#assyEqpList').removeAttr("readonly");
		}
	});
});

$(document).on("click","#trackOut",function(){
	var line = $("#getLine").val();
	if (line == "LSI-ASSY" || line == "QFN-ASSY"){
		$('#getLoc')
		.removeAttr("disabled")
		.append('<option value="TOOLING">TOOLING</option>')

		.append('<option value="PRODUCTION">PRODUCTION</option>')
		.append('<option value="KITTING">KITTING</option>');
	}else{
		$('#getLoc')
		.removeAttr("disabled")
		.find('option')
		.remove()
		.end()
		.append('<option value="SW">SW</option>')
		.append('<option value="NW">NW</option>')
		.append('<option value="MAINTENANCE ROOM">MAINTENANCE ROOM</option>')
		.append('<option value="QFN">QFN</option>')
		.append('<option value="PROBER">PROBER</option>')
		.append('<option value="ENGG">ENGG</option>')
		.append('<option value="OFF SITE">OFF SITE</option>');
	}
	if ($("#exampleModalLabel").html() == "SPANKER" || $("#exampleModalLabel").html() == "INSERT AND CLAMP" || $("#exampleModalLabel").html() == "NOZZLE"){
		$('#getStats')
		.removeAttr("disabled")
		.find('option')
		.remove()
		.end()
		.append('<option value="OUT-PROD">OUT-PROD</option>')
		.append('<option value="OUT-REPAIR">OUT-REPAIR</option>')
		.append('<option value="OUT-ENGG">OUT-ENGG</option>')
		.append('<option value="END OF LIFE / SCRAP">END OF LIFE / SCRAP</option>')
	}
	else{
		$('#getStats')
		.removeAttr("disabled")
		.find('option')
		.remove()
		.end()
		.append('<option value="OUT-PROD">OUT-PROD</option>')
		.append('<option value="OUT-REPAIR">OUT-REPAIR</option>')
		.append('<option value="OUT-ENGG">OUT-ENGG</option>')
		.append('<option value="END OF LIFE">END OF LIFE</option>')
		.append('<option value="SCRAP">SCRAP</option>')
		.append('<option value="PM">PM</option>');
	}


	$('#sfile').removeAttr("required");

	$.ajax({
		type: "POST",
		url: "models/getTstID.php",
		data: "id:"+ $('.getTstPF').val(),
		cache: false,
		success: function(html){
			$("#getTstID").html(html);
			$('#getTstID').removeAttr("readonly");
		}
		});
	
	$.ajax({
		type: "POST",
		url: "models/getHdID.php",
		//data: dataString,
		cache: false,
		success: function(html){
			$("#handlerList").html(html);
			$('#getHdID').removeAttr("readonly");
		}
	});

	$.ajax({
		type: "POST",
		url: "models/getAssyEquipID.php",
		//data: dataString,
		cache: false,
		success: function(html){
			$("#assyEqpList").html(html);
			$('#assyEqpList').removeAttr("readonly");
		}
	});

	$('#getShotCnt')
	.attr("readonly","readonly")
	.val(0);
	
});

$('#trklbID').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {

		var id=$(this).val();
		var dataString = 'id='+ id;
		// alert($('#trklbID').val());
		$.ajax({
			type: "POST",
			url: "models/loadboard/getTrkLB.php",
			data: dataString,
			cache: false,
			success: function(html){
			$(".trkLBRes").html(html);
			$.ajax({
				url: "models/getPizzaValidation.php",
				type: "POST",
				cache: false,
				data: 
				{
					"pizza": $('#trklbID').val()
				},				
				success: function(data)
				{
					console.log(data);
					var data_res = JSON.parse(data);
					data_res["lb_ID"] == null ? $(".pizza-read-only").attr("readonly", true).val("N/A"): $(".pizza-read-only").attr("readonly", false).val("");
				}        
			});
			}
		});
  }
});

$('#trkSocketID').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
	{
		   var id=$(this).val();
		   var dataString = 'id='+ id;

		   $.ajax({
			   type: "POST",
			   url: "models/socket/getTrkSocket.php",
			   data: dataString,
			   cache: false,
			   success: function(html){
			   $(".trkSocketRes").html(html);
			   }
		   });
	}
	});

$('#trkGNGID').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
	{
		var id=$(this).val();
		var dataString = 'id='+ id;

		$.ajax({
			type: "POST",
			url: "models/gng/getTrkGNG.php",
			data: dataString,
			cache: false,
			success: function(html){
			$(".trkGNGRes").html(html);
			}
		});
	}
	});
	 
$('#trkSocketBoardID').keypress(function (e) {
var key = e.which;
if(key == 13)  // the enter key code
	{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax({
				type: "POST",
				url: "models/socketBoard/getTrkSocketBoard.php",
				data: dataString,
				cache: false,
				success: function(html){
				$(".trkSocketBoardRes").html(html);
				}
			});
	}
	});

$('#trkBibID').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
	{

		var id=$(this).val();
		var dataString = 'id='+ id;

		$.ajax({
			type: "POST",
			url: "models/bib/getTrkBIB.php",
			data: dataString,
			cache: false,
			success: function(html){
			$(".trkBIBRes").html(html);
			}
		});
	}
});

$('#trkCBID').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
	{

		var id=$(this).val();
		var dataString = 'id='+ id;

		$.ajax({
			type: "POST",
			url: "models/centerBoard/getTrkCB.php",
			data: dataString,
			cache: false,
			success: function(html){
			$(".trkCBRes").html(html);
			}
		});
	}
});

$('#trkCableID').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
	{

		var id=$(this).val();
		var dataString = 'id='+ id;

		$.ajax({
			type: "POST",
			url: "models/cable/getTrkCable.php",
			data: dataString,
			cache: false,
			success: function(html){
				$(".trkCableRes").html(html);
			}
		});
	}
});

$('#trkTSID').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
	{

		var id=$(this).val();
		var dataString = 'id='+ id;

		$.ajax({
			type: "POST",
			url: "models/testStand/getTrkTS.php",
			data: dataString,
			cache: false,
			success: function(html){
				$(".trkTSRes").html(html);
			}
		});
	}
});

$('#trkCKID').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
	{

		var id=$(this).val();
		var dataString = 'id='+ id;

		$.ajax({
			type: "POST",
			url: "models/changeKit/getTrkCK.php",
			data: dataString,
			cache: false,
			success: function(html){
				$(".trkCKRes").html(html);
			}
		});
	}
});

$('#trkATCID').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
	 {
   
		var id=$(this).val();
		var dataString = 'id='+ id;

		$.ajax({
			type: "POST",
			url: "models/atc/getTrkATC.php",
			data: dataString,
			cache: false,
			success: function(html){
			$(".trkATCRes").html(html);
			}
		});
	}
});

$('#lbID').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {

		var id=$(this).val();
		var dataString = 'id='+ id;

		$.ajax({
			type: "POST",
			url: "models/loadboard/getID.php",
			data: dataString,
			cache: false,
			success: function(html){
				if (id == ""){
					getresult("models/loadboard/pagiResLB.php"); // refresh the list
					$(".pagination").css("display","");
				}else{
					$("#tbody2").html(html);
					$(".pagination").css("display","none");
					$(".tbodySearch").html(html);
				}
			}
		});
  }
});

$('#socketID').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
	 {
   
		   var id=$(this).val();
		   var dataString = 'id='+ id;
   
		   $.ajax({
			   type: "POST",
			   url: "models/socket/getID.php",
			   data: dataString,
			   cache: false,
			   success: function(html){
					if (id == ""){
						getresult("models/socket/pagiResSocket.php"); // refresh the list
						$(".pagination").css("display","");
					}else{
						$("#tbody2").html(html);
						$(".pagination").css("display","none");
						$(".tbody").html(html);
					}
			   }
		   });
	 }
	 });
	 
$('#socketBoardID').keypress(function (e) {
var key = e.which;
if(key == 13)  // the enter key code
	{
	
			var id=$(this).val();
			var dataString = 'id='+ id;
	
			$.ajax({
				type: "POST",
				url: "models/socketBoard/getID.php",
				data: dataString,
				cache: false,
				success: function(html){
				if (id == ""){
					getresult("models/socketBoard/pagiResSocketBoard.php"); // refresh the list
					$(".pagination").css("display","");
				}else{
					$("#tbody2").html(html);
					$(".pagination").css("display","none");
					$(".tbody").html(html);
				}
				}
			});
	}
	});

$('#bibID').keypress(function (e) {
var key = e.which;
if(key == 13)  // the enter key code
	{

		var id=$(this).val();
		var dataString = 'id='+ id;

		$.ajax({
			type: "POST",
			url: "models/bib/getID.php",
			data: dataString,
			cache: false,
			success: function(html){
				if (id == ""){
					getresult("models/bib/pagiResBIB.php"); // refresh the list
					$(".pagination").css("display","");
				}else{
					$("#tbody2").html(html);
					$(".pagination").css("display","none");
					$(".tbody").html(html);
				}
			}
		});
	}
});

$('#gngID').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
	{
		$('#searchItem').click();
	}
});

$('#searchItem').on("click",function(){
	var id=$("#gngID").val();
	var fil1=$("#filter1").val();
	var dataString = 'id='+ id;

	$.ajax({
		type: "POST",
		url: "models/gng/getID.php",
		data: {id:id,fil1:fil1},
		cache: false,
		success: function(html){
			if (id == "" && fil1 == ""){
				getresult("models/gng/pagiResGNG.php"); // refresh the list
				$(".pagination").css("display","");
			}else{
				$("#tbody2").html(html);
				$(".pagination").css("display","none");
				$(".tbody").html(html);
			}
		}
	});
});

$('#nozzleID').keypress(function (e) {
var key = e.which;
if(key == 13)  // the enter key code
	{

		var id=$(this).val();
		var dataString = 'id='+ id;

		$.ajax({
			type: "POST",
			url: "models/nozzle/getID.php",
			data: dataString,
			cache: false,
			success: function(html){
				if (id == ""){
					getresult("models/nozzle/pagiResNozzle.php"); // refresh the list
					$(".pagination").css("display","");
				}else{
					$("#tbody2").html(html);
					$(".pagination").css("display","none");
					$(".tbody").html(html);
				}
			}
		});
	}
});

$('#colletID').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
		{
	
			var id=$(this).val();
			var dataString = 'id='+ id;
	
			$.ajax({
				type: "POST",
				url: "models/collet/getID.php",
				data: dataString,
				cache: false,
				success: function(html){
					if (id == ""){
						getresult("models/collet/pagiResCollet.php"); // refresh the list
						$(".pagination").css("display","");
					}else{
						$("#tbody2").html(html);
						$(".pagination").css("display","none");
						$(".tbody").html(html);
					}
				}
			});
		}
	});

$('#spankerID').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
		{
	
			var id=$(this).val();
			var dataString = 'id='+ id;
	
			$.ajax({
				type: "POST",
				url: "models/spanker/getID.php",
				data: dataString,
				cache: false,
				success: function(html){
					if (id == ""){
						getresult("models/spanker/pagiResSpanker.php"); // refresh the list
						$(".pagination").css("display","");
					}else{
						$("#tbody2").html(html);
						$(".pagination").css("display","none");
						$(".tbody").html(html);
					}
				}
			});
		}
	});

$('#icID').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
		{

		var id=$(this).val();
		var dataString = 'id='+ id;

		$.ajax({
			type: "POST",
			url: "models/ic/getID.php",
			data: dataString,
			cache: false,
			success: function(html){
				if (id == ""){
					getresult("models/ic/pagiResIC.php"); // refresh the list
					$(".pagination").css("display","");
				}else{
					$("#tbody2").html(html);
					$(".pagination").css("display","none");
					$(".tbody").html(html);
				}
			}
		});
	}
});

$('#redFilter').change(function() {
	if(this.checked) {
		$.ajax({
			type: "POST",
			url: "models/ic/icRedFilter.php",
			data: "id=red",
			cache: false,
			success: function(html){
				console.log(html);
					$("#tbody2").html(html);
					$(".pagination").css("display","none");
					$(".tbody").html(html);
			}
		});
	}else{
		getresult("models/ic/pagiResIC.php"); // refresh the list
		$(".pagination").css("display","");
	}
});

$('#mcID').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
		{
	
			var id=$(this).val();
			var dataString = 'id='+ id;
	
			$.ajax({
				type: "POST",
				url: "models/moldchase/getID.php",
				data: dataString,
				cache: false,
				success: function(html){
					if (id == ""){
						getresult("models/moldchase/pagiResMC.php"); // refresh the list
						$(".pagination").css("display","");
					}else{
						$("#tbody2").html(html);
						$(".pagination").css("display","none");
						$(".tbody").html(html);
					}
				}
			});
		}
});

$('#tfdID').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
		{
	
			var id=$(this).val();
			var dataString = 'id='+ id;
	
			$.ajax({
				type: "POST",
				url: "models/trimAndFormDiesets/getID.php",
				data: dataString,
				cache: false,
				success: function(html){
					if (id == ""){
						getresult("models/trimAndFormDiesets/pagiResTFDS.php"); // refresh the list
						$(".pagination").css("display","");
					}else{
						$("#tbody2").html(html);
						$(".pagination").css("display","none");
						$(".tbody").html(html);
					}
				}
			});
		}
});

$('#wpID').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
		{
	
			var id=$(this).val();
			var dataString = 'id='+ id;
	
			$.ajax({
				type: "POST",
				url: "models/workpress/getID.php",
				data: dataString,
				cache: false,
				success: function(html){
					if (id == ""){
						getresult("models/workpress/pagiResWP.php"); // refresh the list
						$(".pagination").css("display","");
					}else{
						$("#tbody2").html(html);
						$(".pagination").css("display","none");
						$(".tbody").html(html);
					}
				}
			});
		}
});

$('#atcID').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
		{
	
			var id=$(this).val();
			var dataString = 'id='+ id;
	
			$.ajax({
				type: "POST",
				url: "models/atc/getID.php",
				data: dataString,
				cache: false,
				success: function(html){
					if (id == ""){
						getresult("models/atc/pagiResATC.php"); // refresh the list
						$(".pagination").css("display","");
					}else{
						$("#tbody2").html(html);
						$(".pagination").css("display","none");
						$(".tbody").html(html);
					}
				}
			});
		}
});

$('#testStandID').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
		{
	
			var id=$(this).val();
			var dataString = 'id='+ id;
	
			$.ajax({
				type: "POST",
				url: "models/testStand/getID.php",
				data: dataString,
				cache: false,
				success: function(html){
					if (id == ""){
						getresult("models/testStand/pagiResTS.php"); // refresh the list
						$(".pagination").css("display","");
					}else{
						$("#tbody2").html(html);
						$(".pagination").css("display","none");
						$(".tbody").html(html);
					}
				}
			});
		}
});

$('#cbID').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
	 {
   
		   var id=$(this).val();
		   var dataString = 'id='+ id;
   
		   $.ajax({
			   type: "POST",
			   url: "models/CenterBoard/getID.php",
			   data: dataString,
			   cache: false,
			   success: function(html){
				   if (id == ""){
					   getresult("models/centerBoard/pagiResCB.php"); // refresh the list
					   $(".pagination").css("display","");
				   }else{
					   $("#tbody2").html(html);
					   $(".pagination").css("display","none");
					   $(".tbody").html(html);
				   }
			   }
		   });
	 }
   });

$('#cableID').keypress(function (e) {
var key = e.which;
if(key == 13)  // the enter key code
	{

		var id=$(this).val();
		var dataString = 'id='+ id;

		$.ajax({
			type: "POST",
			url: "models/cable/getID.php",
			data: dataString,
			cache: false,
			success: function(html){
				if (id == ""){
					getresult("models/cable/pagiResCable.php"); // refresh the list
					$(".pagination").css("display","");
				}else{
					$("#tbody2").html(html);
					$(".pagination").css("display","none");
					$(".tbody").html(html);
				}
			}
		});
	}
});

$('#ckID').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
		{
	
			var id=$(this).val();
			var dataString = 'id='+ id;
	
			$.ajax({
				type: "POST",
				url: "models/changeKit/getID.php",
				data: dataString,
				cache: false,
				success: function(html){
					if (id == ""){
						getresult("models/changekit/pagiResCk.php"); // refresh the list
						$(".pagination").css("display","");
					}else{
						$("#tbody2").html(html);
						$(".pagination").css("display","none");
						$(".tbody").html(html);
					}
				}
			});
		}
	});

	$('#tpID').keypress(function (e) {
		var key = e.which;
		if(key == 13)  // the enter key code
			{
		
				var id=$(this).val();
				var dataString = 'id='+ id;
		
				$.ajax({
					type: "POST",
					url: "models/testerParts/getID.php",
					data: dataString,
					cache: false,
					success: function(html){
						if (id == ""){
							getresult("models/testerParts/pagiResCk.php"); // refresh the list
							$(".pagination").css("display","");
						}else{
							$("#tbody2").html(html);
							$(".pagination").css("display","none");
							$(".tbody").html(html);
						}
					}
				});
			}
		});

		$('#spID').keypress(function (e) {
			var key = e.which;
			if(key == 13)  // the enter key code
				{
			
					var id=$(this).val();
					var dataString = 'id='+ id;
			
					$.ajax({
						type: "POST",
						url: "models/spareParts/getID.php",
						data: dataString,
						cache: false,
						success: function(html){
							if (id == ""){
								getresult("models/testerParts/pagiResSP.php"); // refresh the list
								$(".pagination").css("display","");
							}else{
								$("#tbody2").html(html);
								$(".pagination").css("display","none");
								$(".tbody").html(html);
							}
						}
					});
				}
			});

		$('#pgID').keypress(function (e) {
			var key = e.which;
			if(key == 13)  // the enter key code
				{
			
					var id=$(this).val();
					var dataString = 'id='+ id;
			
					$.ajax({
						type: "POST",
						url: "models/program/getID.php",
						data: dataString,
						cache: false,
						success: function(html){
							if (id == ""){
								getresult("models/program/pagiResPG.php"); // refresh the list
								$(".pagination").css("display","");
							}else{
								$("#tbody2").html(html);
								$(".pagination").css("display","none");
								$(".tbody").html(html);
							}
						}
					});
				}
			});	
	

$('#lbIDHist').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {
		$('#bttnHistSearch').click();
  }
});

$('#bttnHistSearch').on("click",function(){
		var id=$('#lbIDHist').val();
		var from=$('#from').val();
		var to=$('#to').val();
		var dataString = 'id='+ id + '|'+ from+ '|'+ to;

		if (id == "" && from == "" && to == ""){
			location.reload();
		}else{
			$.ajax({
				type: "POST",
				url: "models/loadboard/pagiResLBHisFil.php",
				data: dataString,
				cache: false,
				success: function(html){
				$("#pagination-result").html(html);
				}
			});
		}
});

$('#bttnSearchSocket').on("click",function(){
	var id=$('#lbIDHist').val();
	var from=$('#from').val();
	var to=$('#to').val();
	var dataString = 'id='+ id + '|'+ from+ '|'+ to;

	if (id == "" && from == "" && to == ""){
		location.reload();
	}else{
		$.ajax({
			type: "POST",
			url: "models/socket/pagiResSocketHisFil.php",
			data: dataString,
			cache: false,
			success: function(html){
			$("#pagination-result").html(html);
			}
		});
	}
});

$('#bttnSearchSocketBoard').on("click",function(){
	var id=$('#lbIDHist').val();
	var from=$('#from').val();
	var to=$('#to').val();
	var dataString = 'id='+ id + '|'+ from+ '|'+ to;

	if (id == "" && from == "" && to == ""){
		location.reload();
	}else{
		$.ajax({
			type: "POST",
			url: "models/socketBoard/pagiResSocketBoardHisFil.php",
			data: dataString,
			cache: false,
			success: function(html){
			$("#pagination-result").html(html);
			}
		});
	}
});

$('#bttnSearchGNG').on("click",function(){
	var id=$('#gngIDHist').val();
	var from=$('#from').val();
	var to=$('#to').val();
	var dataString = 'id='+ id + '|'+ from+ '|'+ to;

	if (id == "" && from == "" && to == ""){
		location.reload();
	}else{
		$.ajax({
			type: "POST",
			url: "models/gng/pagiResGNGHisFil.php",
			data: dataString,
			cache: false,
			success: function(html){
			$("#pagination-result").html(html);
			}
		});
	}
});

$('#bttnSearchIC').on("click",function(){
	var id=$('#lbIDHist').val();
	var from=$('#from').val();
	var to=$('#to').val();
	var dataString = 'id='+ id + '|'+ from+ '|'+ to;

	if (id == "" && from == "" && to == ""){
		location.reload();
	}else{
		$.ajax({
			type: "POST",
			url: "models/ic/pagiResICHisFil.php",
			data: dataString,
			cache: false,
			success: function(html){
			$("#pagination-result").html(html);
			}
		});
	}
});

$('#bttnSearchMC').on("click",function(){
	var id=$('#mcIDHist').val();
	var from=$('#from').val();
	var to=$('#to').val();
	var dataString = 'id='+ id + '|'+ from+ '|'+ to;

	if (id == "" && from == "" && to == ""){
		location.reload();
	}else{
		$.ajax({
			type: "POST",
			url: "models/moldchase/pagiResMCHisFil.php",
			data: dataString,
			cache: false,
			success: function(html){
			$("#pagination-result").html(html);
			}
		});
	}
});

$('#bttnSearchBIB').on("click",function(){
	var id=$('#lbIDHist').val();
	var from=$('#from').val();
	var to=$('#to').val();
	var dataString = 'id='+ id + '|'+ from+ '|'+ to;

	if (id == "" && from == "" && to == ""){
		location.reload();
	}else{
		$.ajax({
			type: "POST",
			url: "models/bib/pagiResBIBHisFil.php",
			data: dataString,
			cache: false,
			success: function(html){
			$("#pagination-result").html(html);
			}
		});
	}
});

$('#bttnSearchNozzle').on("click",function(){
	var id=$('#lbIDHist').val();
	var from=$('#from').val();
	var to=$('#to').val();
	var dataString = 'id='+ id + '|'+ from+ '|'+ to;

	if (id == "" && from == "" && to == ""){
		location.reload();
	}else{
		$.ajax({
			type: "POST",
			url: "models/nozzle/pagiResNozzleHisFil.php",
			data: dataString,
			cache: false,
			success: function(html){
			$("#pagination-result").html(html);
			}
		});
	}
});

$('#bttnSearchCollet').on("click",function(){
	var id=$('#lbIDHist').val();
	var from=$('#from').val();
	var to=$('#to').val();
	var dataString = 'id='+ id + '|'+ from+ '|'+ to;

	if (id == "" && from == "" && to == ""){
		location.reload();
	}else{
		$.ajax({
			type: "POST",
			url: "models/collet/pagiResColletHisFil.php",
			data: dataString,
			cache: false,
			success: function(html){
			$("#pagination-result").html(html);
			}
		});
	}
});

$('#bttnSearchSpanker').on("click",function(){
	var id=$('#lbIDHist').val();
	var from=$('#from').val();
	var to=$('#to').val();
	var dataString = 'id='+ id + '|'+ from+ '|'+ to;

	if (id == "" && from == "" && to == ""){
		location.reload();
	}else{
		$.ajax({
			type: "POST",
			url: "models/spanker/pagiResSpankerHisFil.php",
			data: dataString,
			cache: false,
			success: function(html){
			$("#pagination-result").html(html);
			}
		});
	}
});

$('#bttnSearchWorkPress').on("click",function(){
	var id=$('#lbIDHist').val();
	var from=$('#from').val();
	var to=$('#to').val();
	var dataString = 'id='+ id + '|'+ from+ '|'+ to;

	if (id == "" && from == "" && to == ""){
		location.reload();
	}else{
		$.ajax({
			type: "POST",
			url: "models/workpress/pagiResWPHisFil.php",
			data: dataString,
			cache: false,
			success: function(html){
			$("#pagination-result").html(html);
			}
		});
	}
});

$('#bttnSearchATC').on("click",function(){
	var id=$('#lbIDHist').val();
	var from=$('#from').val();
	var to=$('#to').val();
	var dataString = 'id='+ id + '|'+ from+ '|'+ to;

	if (id == "" && from == "" && to == ""){
		location.reload();
	}else{
		$.ajax({
			type: "POST",
			url: "models/atc/pagiResATCHisFil.php",
			data: dataString,
			cache: false,
			success: function(html){
			$("#pagination-result").html(html);
			}
		});
	}
});

$('#bttnSearchTS').on("click",function(){
	var id=$('#lbIDHist').val();
	var from=$('#from').val();
	var to=$('#to').val();
	var dataString = 'id='+ id + '|'+ from+ '|'+ to;

	if (id == "" && from == "" && to == ""){
		location.reload();
	}else{
		$.ajax({
			type: "POST",
			url: "models/testStand/pagiResTSHisFil.php",
			data: dataString,
			cache: false,
			success: function(html){
			$("#pagination-result").html(html);
			}
		});
	}
});

$('#bttnSearchCable').on("click",function(){
	var id=$('#lbIDHist').val();
	var from=$('#from').val();
	var to=$('#to').val();
	var dataString = 'id='+ id + '|'+ from+ '|'+ to;

	if (id == "" && from == "" && to == ""){
		location.reload();
	}else{
		$.ajax({
			type: "POST",
			url: "models/cable/pagiResCableHisFil.php",
			data: dataString,
			cache: false,
			success: function(html){
			$("#pagination-result").html(html);
			}
		});
	}
});

$('#bttnHistCKSearch').on("click",function(){
	var id=$('#ckIDHist').val();
	var from=$('#from').val();
	var to=$('#to').val();
	var dataString = 'id='+ id + '|'+ from+ '|'+ to;

	if (id == "" && from == "" && to == ""){
		location.reload();
	}else{
		$.ajax({
			type: "POST",
			url: "models/changeKit/pagiResCKHisFil.php",
			data: dataString,
			cache: false,
			success: function(html){
			$("#pagination-result").html(html);
			}
		});
	}
});

$('#bttnHistTPSearch').on("click",function(){
	var id=$('#tpIDHist').val();
	var from=$('#from').val();
	var to=$('#to').val();
	var dataString = 'id='+ id + '|'+ from+ '|'+ to;

	if (id == "" && from == "" && to == ""){
		location.reload();
	}else{
		$.ajax({
			type: "POST",
			url: "models/testerParts/pagiResTPHisFil.php",
			data: dataString,
			cache: false,
			success: function(html){
			$("#pagination-result").html(html);
			}
		});
	}
});

$('#bttnHistRCSearch').on("click",function(){
	var id=$('#rcIDHist').val();
	var from=$('#from').val();
	var to=$('#to').val();
	var dataString = 'id='+ id + '|'+ from+ '|'+ to;

	if (id == "" && from == "" && to == ""){
		location.reload();
	}else{
		$.ajax({
			type: "POST",
			url: "models/rubberCollet/pagiResRCHisFil.php",
			data: dataString,
			cache: false,
			success: function(html){
			$("#pagination-result").html(html);
			}
		});
	}
});

$('#bttnHistCBSearch').on("click",function(){
	var id=$('#cbIDHist').val();
	var from=$('#from').val();
	var to=$('#to').val();
	var dataString = 'id='+ id + '|'+ from+ '|'+ to;

	if (id == "" && from == "" && to == ""){
		location.reload();
	}else{
		$.ajax({
			type: "POST",
			url: "models/centerBoard/pagiResCBHisFil.php",
			data: dataString,
			cache: false,
			success: function(html){
				$("#pagination-result").html(html);
				console.log(dataString);
			}
		});
	}
});

$('#bttnSearchtfd').on("click",function(){
	var id=$('#mcIDHist').val();
	var from=$('#from').val();
	var to=$('#to').val();
	var dataString = 'id='+ id + '|'+ from+ '|'+ to;

	if (id == "" && from == "" && to == ""){
		location.reload();
	}else{
		$.ajax({
			type: "POST",
			url: "models/trimAndFormDiesets/pagiResTFDSHisFil.php",
			data: dataString,
			cache: false,
			success: function(html){
			$("#pagination-result").html(html);
			}
		});
	}
});

$('#addCategory').change(function () {
	var id=$(this).val();
	var dataString = 'id='+ id;

	$.ajax({
		type: "POST",
		url: "models/addItems/addInvent.php",
		data: dataString,
		cache: false,
		success: function(html){
		$("#addItem").html(html);
		}
	});
});

$('#editCategory').change(function () {
	var id=$(this).val();
	var dataString = 'id='+ id;

		$.ajax({
			type: "POST",
			url: "models/editItems/editInvent.php",
			data: dataString,
			cache: false,
			success: function(html){
				$("#editItem").html(html);
				$("#editSearch").css("display","");
			}
		});
});

$('#delCategory').change(function () {
	var id=$(this).val();
	var dataString = 'id='+ id;

		$.ajax({
			type: "POST",
			url: "models/delItems/delInvent.php",
			data: dataString,
			cache: false,
			success: function(html){
				$("#delItem").html(html);
				$("#delSearch").css("display","");
			}
		});
});

 $(document).on("keypress","#editKeyword",function(e){
	var key = e.which;
 if(key == 13)  // the enter key code
  {
	  $("#editBttnSearch").click();
  }
});

$(document).on("click","#editBttnSearch",function(){
	var id=$("#editKeyword").val();
	var cat=$("#editCategory").val();
	
	switch (cat)
	{
		case "LOADBOARD":
			refresh = "models/editItems/editResLB.php";
			break;
		case "SOCKET":
			refresh = "models/editItems/editResSocket.php";
			break;
		case "GNG":
			refresh = "models/editItems/editResGNG.php";
			break;
		case "BIB":
			refresh = "models/editItems/editResBIB.php";
			break;
		case "NOZZLE":
			refresh = "models/editItems/editResNozzle.php";
			break;
		case "IC":
			refresh = "models/editItems/editResIC.php";
			break;
		case "MC":
			refresh = "models/editItems/editResMC.php";
			break;
		case "WP":
			refresh = "models/editItems/editResWP.php";
			break;
		case "SB":
			refresh = "models/editItems/editResSocketBoard.php";
			break;
		case "ATC":
			refresh = "models/editItems/editResATC.php";
			break;
		case "TS":
			refresh = "models/editItems/editResTS.php";
			break;
		case "CK":
			refresh = "models/editItems/editResCK.php";
			break;
		case "TP":
			refresh = "models/editItems/editResTP.php";
			break;
		case "CB":
			refresh = "models/editItems/editResCB.php";
			break;
		case "TFD":
			refresh = "models/editItems/editResTFD.php";
			break;
		case "SP":
			refresh = "models/editItems/editResSP.php";
			break;
		case "COLLET":
			refresh = "models/editItems/editResCollet.php";
			break;
		case "SPANKER":
			refresh = "models/editItems/editResSpanker.php";
			break;	
		default:
			break;
	}
	
	$.ajax({
		type: "POST",
		url: "models/editItems/getEditID.php",
		data: {id:id,cat:cat},
		cache: false,
		success: function(html){
			if (id == ""){
				getresult(refresh); // refresh the list
				$(".pagination").css("display","");
			}else{
				$(".tbody").html(html);
				$(".pagination").css("display","none");
			}
		}
	});
});

$(document).on("keypress","#delKeyword",function(e){
  	var key = e.which;
   if(key == 13)  // the enter key code
    {
		$("#delBttnSearch").click();
    }
});

$(document).on("click","#delBttnSearch",function(){
	var id=$("#delKeyword").val();
	var cat=$("#delCategory").val();
	//var dataString = 'id='+ id;	

	switch (cat)
	{
		case "LOADBOARD":
			refresh = "models/delItems/delResLB.php";
			break;
		case "SOCKET":
			refresh = "models/delItems/delResSocket.php";
			break;
		case "GNG":
			refresh = "models/delItems/delResGNG.php";
			break;
		case "BIB":
			refresh = "models/delItems/delResBIB.php";
			break;
		case "NOZZLE":
			refresh = "models/delItems/delResNozzle.php";
			break;
		case "IC":
			refresh = "models/delItems/delResIC.php";
			break;
		case "MC":
			refresh = "models/delItems/delResMC.php";
			break;
		case "WP":
			refresh = "models/delItems/delResWP.php";
			break;
		case "SB":
			refresh = "models/delItems/delResSocketBoard.php";
			break;
		case "ATC":
			refresh = "models/delItems/delResATC.php";
			break;
		case "TS":
			refresh = "models/delItems/delResTS.php";
			break;
		case "CK":
			refresh = "models/delItems/delResCK.php";
			break;
		case "TP":
			refresh = "models/delItems/delResTP.php";
			break;
		case "CB":
			refresh = "models/delItems/delResCB.php";
			break;
		case "RC":
			refresh = "models/delItems/delResRC.php";
			break;
		case "PG":
			refresh = "models/delItems/delResPG.php";	
			break;
		default:
			break;

	}

	$.ajax({
		type: "POST",
		url: "models/delItems/getDelID.php",
		data: {id:id,cat:cat},
		cache: false,
		success: function(html){
			if (id == ""){
				getresult(refresh); // refresh the list
				$(".pagination").css("display","");
			}else{
				$("#tbody2").html(html);
				$(".pagination").css("display","none");
			}
		}
	});
});

$(document).on("click","#yesDel",function(){
		var keyword = $("#delKeyword").val();
		var cat = $("#delCategory").val();
		var favorite = [];		

			$.each($("input[name=cbox]:checked"), function(){            

				favorite.push($(this).val());
			});
		if (favorite == ""){
			alert("No item selected.");
		}else{
			$.ajax({
				type: "POST",
				url: "models/delItems/delItem.php",
				data: {id:favorite,cat:cat},
				cache: false,
				success: function(html){
					console.log(html);
					//if (keyword != ""){
						$("#delBttnSearch").click();
					//}
				}
			});
		}
});

$(document).on("click","#saveAdd",function(){
	var cat = $("#addCategory").val();
	var td1 = $("#td1").val();
	var td2 = $("#td2").val();
	var td3 = $("#td3").val();
	var td4 = $("#td4").val();
	var td5 = $("#td5").val();
	var td6 = $("#td6").val();
	var td7 = $("#td7").val();
	var td8 = $("#td8").val();
	var td9 = $("#td9").val();
	var td10 = $("#td10").val();
	var td11 = $("#td11").val();
	var td12 = $("#td12").val();
	var td13 = $("#td13").val();
	var td14 = $("#td14").val();
	var td15 = $("#td15").val();
	var td16 = $("#td16").val();
	var td17 = $("#td17").val();
	var td18 = $("#td18").val();
	var td19 = $("#td19").val();
	var td20 = $("#td20").val();
	var td21 = $("#td21").val();
	var td22 = $("#td22").val();
	var td23 = $("#td23").val();
	var td24 = $("#td24").val();
	var td25 = $("#td25").val();
	var td26 = $("#td26").val();
	var td27 = $("#td27").val();
	var td28 = $("#td28").val();
	var td29 = $("#td29").val();
	var td30 = $("#td30").val();
	var td31 = $("#td31").val();
	var td32 = $("#td32").val();
	var td33 = $("#td33").val();
	var td34 = $("#td34").val();
	var td35 = $("#td35").val();
	var td36 = $("#td36").val();
	var td37 = $("#td37").val();
	var td38 = $("#td38").val();
	var td39 = $("#td39").val();
	var td40 = $("#td40").val();
	var td41 = $("#td41").val();

	switch (cat) {
		case "LOADBOARD":
			$.ajax({
				type: "POST",
				url: "models/addItems/saveItem.php",
				data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9},
				cache: false,
				success: function(html){
					//console.log(html);
					$("#message").html(html);
				}
			});
			break;
		case "SOCKET":
			$.ajax({
				type: "POST",
				url: "models/addItems/saveItem.php",
				data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9,td10:td10,
					td11:td11,td12:td12,td13:td13,td14:td14,td15:td15},
				cache: false,
				success: function(html){
					//console.log(html);
					$("#message").html(html);
				}
			});
			break;
		case "GNG":
			$.ajax({
				type: "POST",
				url: "models/addItems/saveItem.php",
				data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9,td10:td10,td11:td11,td12:td12,td13:td13,td14:td14},
				cache: false,
				success: function(html){
					//console.log(html);
					$("#message").html(html);
				}
			});
			break;
		case "BIB":
			$.ajax({
				type: "POST",
				url: "models/addItems/saveItem.php",
				data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9},
				cache: false,
				success: function(html){
					//console.log(html);
					$("#message").html(html);
				}
			});
			break;
		case "NOZZLE":
			$.ajax({
				type: "POST",
				url: "models/addItems/saveItem.php",
				data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7},
				cache: false,
				success: function(html){
					//console.log(html);
					$("#message").html(html);
				}
			});
			break;
		case "CHIPMOUNT NOZZLE":
			$.ajax({
				type: "POST",
				url: "models/addItems/saveItem.php",
				data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7},
				cache: false,
				success: function(html){
					//console.log(html);
					$("#message").html(html);
				}
			});
			break;	
		case "IC":
			$.ajax({
				type: "POST",
				url: "models/addItems/saveItem.php",
				data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9,td10:td10},
				cache: false,
				success: function(html){
					//console.log(html);
					$("#message").html(html);
				}
			});
			break;
		case "MC":
			$.ajax({
				type: "POST",
				url: "models/addItems/saveItem.php",
				data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9},
				cache: false,
				success: function(html){
					// console.log(html);
					$("#message").html(html);
				}
			});
			break;
		case "WP":
			$.ajax({
				type: "POST",
				url: "models/addItems/saveItem.php",
				data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9,td10:td10,td11:td11,
					td12:td12,td13:td13},
				cache: false,
				success: function(html){
					// console.log(html);
					$("#message").html(html);
				}
			});
			break;
		case "SB":
			$.ajax({
				type: "POST",
				url: "models/addItems/saveItem.php",
				data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td9:td9,td10:td10,td13:td13,td14:td14},
				cache: false,
				success: function(html){
					// console.log(html);
					$("#message").html(html);
				}
			});
			break;
		case "ATC":
			$.ajax({
				type: "POST",
				url: "models/addItems/saveItem.php",
				data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9,td10:td10,td11:td11},
				cache: false,
				success: function(html){
					// console.log(html);
					$("#message").html(html);
				}
			});
			break;
		case "TS":
			$.ajax({
				type: "POST",
				url: "models/addItems/saveItem.php",
				data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9,td10:td10,td11:td11},
				cache: false,
				success: function(html){
					// console.log(html);
					$("#message").html(html);
				}
			});
			break;
		case "CK":
				$.ajax({
					type: "POST",
					url: "models/addItems/saveItem.php",
					data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
						td6:td6,td7:td7,td8:td8,td9:td9,td10:td10,td11:td11,
						td12:td12,td13:td13,td14:td14,td15:td15,td16:td16,
						td17:td17,td18:td18,td19:td19,td20:td20,td21:td21,
						td22:td22,td23:td23,td24:td24,td25:td25,td26:td26,
						td27:td27,td28:td28,td29:td29,td30:td30,td31:td31,
						td32:td32,td33:td33,td34:td34,td35:td35,td36:td36,
						td37:td37,td38:td38,td39:td39,td40:td40,td41:td41},
					cache: false,
					success: function(html){
						//console.log(html);
						$("#message").html(html);
					}
				});
				break;
		case "TP":
				$.ajax({
					type: "POST",
					url: "models/addItems/saveItem.php",
					data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
						td6:td6,td7:td7,td8:td8,td9:td9,td10:td10},
					cache: false,
					success: function(html){
						//console.log(html);
						$("#message").html(html);
					}
				});
				break;
		case "CB":
				$.ajax({
					type: "POST",
					url: "models/addItems/saveItem.php",
					data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
						td6:td6,td7:td7,td9:td9},
					cache: false,
					success: function(html){
						//console.log(html);
						$("#message").html(html);
					}
				});
				break;
		case "TFD":
				$.ajax({
					type: "POST",
					url: "models/addItems/saveItem.php",
					data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
						td6:td6,td7:td7,td8:td8,td9:td9},
					cache: false,
					success: function(html){
						// console.log(html);
						$("#message").html(html);
					}
				});
				break;
		case "RC":
				$.ajax({
					type: "POST",
					url: "models/addItems/saveItem.php",
					data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
						td6:td6,td7:td7,td8:td8,td9:td9,td10:td10},
					cache: false,
					success: function(html){
						//console.log(html);
						$("#message").html(html);
					}
				});
				break;
		case "SP":
				if($("#userImage")[0].files[0] == null){
					alert("PLEASE ATTACH IMAGE");
				}
				else{
					$.ajax({
						type: "POST",
						url: "models/spareParts/sparePartsExist.php",
						data:{
							"parts_code": td2,
							"rack": td5
						},
						cache:false,
						success: function(data){
							if (data == td2){
								alert("PARTS CODE EXISTS WITHIN THE RACK!")
							}
							else{
								var trimName = $("#userImage")[0].files[0].name;

								if (trimName.split('.').slice(0, -1).join('.') == td2){
									var image = $("#userImage")[0].files[0];
											if(image != null){

												var formData = new FormData();
												formData.append("Image", image);
												formData.append("cat", cat);

												$.ajax({
													type: "POST",
													url: "models/addItems/saveItem.php",
													data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
														td6:td6,td7:td7,td8:td8},
													cache: false,
													success: function(html){
														$.ajax({
															url: "models/uploadItems/uploadItems.php",
															type: "POST",
															data: formData,				
															contentType: false,
															processData:false,
															success: function(data)
															{
																
																console.log(data);
																$("#message").html(html);
		
															},
															error: function() 
															{
															} 	        
													   });
														
													}
												});
											}
									
								}
								else{
									alert("IMAGE DESCRIPTION DOES NOT MATCH PART CODE");
								}
							}
						}
					});
				}
				break;
		case "PG":
			var trimName = $("#userImage")[0].files[0].name;
			$.ajax({
				type: "POST",
				url: "models/addItems/saveItem.php",
				data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9,file:trimName},
				cache: false,
				success: function(html){
					//console.log(html);
					$("#message").html(html);
					var image = $("#userImage")[0].files[0];
					if(image != null){
												
						var formData = new FormData();
						formData.append("Image", image);
						formData.append("cat", cat);
						$.ajax({
							url: "models/uploadItems/uploadItems.php",
							type: "POST",
							data: formData,				
							contentType: false,
							processData:false,
							success: function(data)
							{
										
							},
							error: function() 
							{
							} 	        
					   });
					}
				}
			});
		break;
		case "CABLE":
			$.ajax({
				type: "POST",
				url: "models/addItems/saveItem.php",
				data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9,td10:td10},
				cache: false,
				success: function(html){
					//console.log(html);
					$("#message").html(html);
				}
			});
			break;
		case "COLLET":
			$.ajax({
				type: "POST",
				url: "models/addItems/saveItem.php",
				data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7},
				cache: false,
				success: function(html){
					//console.log(html);
					$("#message").html(html);
				}
			});
			break;		
		case "SPANKER":
			$.ajax({
				type: "POST",
				url: "models/addItems/saveItem.php",
				data: {cat:cat,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7},
				cache: false,
				success: function(html){
					//console.log(html);
					$("#message").html(html);
				}
			});
			break;		
		default:
			break;
	}
});


$(document).on("change","input[type=file]",function () {

	var fieldVal = $(this).val();
	var fileSize = (this.files[0].size);
  
	fileSize = ((fileSize/1000).toFixed(2));
	fieldVal = fieldVal.replace("C:\\fakepath\\", "");
  
	var fileType = ["txt","doc","docx","pdf","xlsx","csv","jpeg","jpg","png","bmp","msg","asc","zip","S"];
	var fileTrue = true;
  
	if (fieldVal != undefined || fieldVal != "") {
			fileName = fieldVal;
		  fileExtension = fileName.substr((fileName.lastIndexOf('.') + 1));
		  fileExtension = fileExtension.toLowerCase();
		  fLen = fileType.length;
  
		  for (i = 0; i < fLen; i++) {
			  if (fileExtension == fileType[i]){
				  fileTrue = false;
				  if (fileSize > 10000){
					  alert("File size should not exceed to 10mb.");
					  $("#sfile").val("");
					  $("#sfileNotReq").val("");
					  break;
				  }
				  break;
			  }
		  }
		  if (fileTrue){
			  alert ("Invalid file format!");
			  $("#sfile").val("");
			  $("#sfileNotReq").val("");
		  }
	}
  });

// $("input[type=file]").change(function () {

//   var fieldVal = $(this).val();
//   var fileSize = (this.files[0].size);

//   fileSize = ((fileSize/1000).toFixed(2));
//   fieldVal = fieldVal.replace("C:\\fakepath\\", "");

//   var fileType = ["txt","doc","docx","pdf","xlsx","csv","jpeg","jpg","png","bmp","msg","asc"];
//   var fileTrue = true;

//   if (fieldVal != undefined || fieldVal != "") {
//   		fileName = fieldVal;
// 		fileExtension = fileName.substr((fileName.lastIndexOf('.') + 1));
// 		fileExtension = fileExtension.toLowerCase();
// 		fLen = fileType.length;

// 		for (i = 0; i < fLen; i++) {
// 		    if (fileExtension == fileType[i]){
// 		    	fileTrue = false;
// 		    	if (fileSize > 5000){
// 		    		alert("File size should not exceed to 5mb.");
// 		    		break;
// 		    	}
// 		    	break;
// 		    }
// 		}
// 		if (fileTrue){
// 			alert ("Invalid file format!");
// 			$("#sfile").val("");
// 		}
//   }
// });

	$(document).on("submit","#saveData",function(event){
		var tstID = $('#getTstID option:selected').text();
		var cat = $('.modal-title').html();
		
		$.ajax({
			type: "POST",
			url: "models/checkOut.php",
			data: {'id':tstID,'cat':cat},
			cache: false,
			success: function(html){
				console.log(html);
				// console.log(html);
				// console.log(tstID);
				// if (keyword != ""){
				// 	$("#delBttnSearch").click();
				// }
				// $("#message").html(html);
				// $("#editBttnSearch").click();
				//$('#openConfirmModal').click();
				//$('.confirmModal').css('display','');
				if (html > 0){
					event.preventDefault();
					$('.confirmModal').css('display','');
				}else{
					
					if($('#sfile').val()){
						event.preventDefault();
						// $('#loader-icon').show();
						$('#msg').hide();
						$('#saveData').ajaxSubmit({
							target: '#msg',
							beforeSubmit:function(){
								$('.progress-bar').width('0%');
							},
							uploadProgress: function(event, position, total, percentageComplete){
								$('.progress-bar').animate({
									width: percentageComplete + '50%'
								}, {
									duration: 1000
								});
			
							},
							success:function(){
								//$('#saveData').submit();
								// $('#loader-icon').hide();
								// $('#targetLayer').show();
								// if ($('.progress-bar').css('width', '100%')){
					//before v2.8 updates	// $('#msg').html('<div class="alert alert-danger" role="alert" id="message" for="name"><b>There are already Item in '+ tstID +'</b></div>');
					//before v2.8 updates	// $('#msg').show();
								// }
								if(cat == "LOADBOARD"){

								}
								else if(cat == "SPARE PARTS"){

								}
								else{
									$('#msg').html('<div class="alert alert-success" role="alert" id="message" for="name"><b>Record successfully save</b></div>');				
									$('#msg').show();
									location.reload();
								}
								
							}
						});
					}else{
						event.preventDefault();
						// $('#loader-icon').show();
						$('#msg').hide();
						$('#saveData').ajaxSubmit({
							target: '#msg',
							beforeSubmit:function(){
								$('.progress-bar').width('50%');
							},
							uploadProgress: function(event, position, total, percentageComplete){
								$('.progress-bar').animate({
									width: percentageComplete + '100%'
								}, {
									duration: 1000
								});
			
							},
							success:function(){
								//$('#saveData').submit();
								// $('#loader-icon').hide();
								// $('#targetLayer').show();
								// if ($('.progress-bar').css('width', '100%')){
									if(cat == "LOADBOARD"){

									}
									else if(cat == "SPARE PARTS"){
									
									}
									else{
										$('#msg').html('<div class="alert alert-success" role="alert" id="message" for="name"><b>Record successfully save</b></div>');				
										$('#msg').show();
										location.reload();
									}
								// }
								
							}
						});
					}
				}
			}
		});
		
	return false;
	});

$('#sidebarCollapse').on('click', function () {
 $(document).ready(function () {
	 $('#sidebar').toggleClass('active');

	 if ($(window).width() <= 768) {
		 if ($("#sidebar").hasClass("active")){
			 $("#content").css("margin", "75px 0px 0px 250px");
		 }else{
			 $("#content").css("margin", "75px 0px 0px 0px");
		 }
   }else{
		 if ($("#sidebar").hasClass("active")){
			 $("#content").css("margin", "75px 0px 0px 0px");
		 }else{
			 $("#content").css("margin", "75px 0px 0px 250px");
		 }
	 }
 });
});

$(window).resize(function(){
       if ($(window).width() <= 768) {
               $("#content").css("margin", "75px 0px 0px 0px");
       }   else {
					 $("#content").css("margin", "75px 0px 0px 250px");
			 }
});

$('.signin').on('click', function () {
	var myusername = $(".myusername").val();
	var mypassword = $(".mypassword").val();
	if (mypassword == "" || myusername == ""){
		//$(".mypassword").attr("required","required");
	}else{
		$(this).prop('type', 'submit');
	}
});

$('.signin2').on('click', function () {
	var myusername = $(".myusername2").val();
	var mypassword = $(".mypassword2").val();
	if (mypassword == "" || myusername == ""){
		//$(".mypassword").attr("required","required");
	}else{
		$(this).prop('type', 'submit');
	}
});

$('#lbIDHist').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {
		$('#bttnSearch').click();
  }
});

$('.export').on("click",function(){
		var id=$('#lbIDHist').val();
		var from=$('#from').val();
		var to=$('#to').val();
		var dataString = 'id='+ id + '|'+ from+ '|'+ to;

		if (id == "" && from == "" && to == ""){
			location.reload();
		}else{
			$.ajax({
				type: "POST",
				url: "models/exportData.php",
				data: dataString,
				cache: false,
				success: function(html){
				$("#pagination-result").html(html);
				}
			});
		}
});

$(document).on("click","#update",function(){
		var cat = $("#editCategory").val();
		var td0 = $("#gettd0").val();
		var td1 = $("#gettd1").val();
		var td2 = $("#gettd2").val();
		var td3 = $("#gettd3").val();
		var td4 = $("#gettd4").val();
		var td5 = $("#gettd5").val();
		var td6 = $("#gettd6").val();
		var td7 = $("#gettd7").val();
		var td8 = $("#gettd8").val();
		var td9 = $("#gettd9").val();
		var td10 = $("#gettd10").val();
		var td11 = $("#gettd11").val();
		var td12 = $("#gettd12").val();
		var td13 = $("#gettd13").val();
		var td14 = $("#gettd14").val();
		var td15 = $("#gettd15").val();
		var td16 = $("#gettd16").val();
		var td17 = $("#gettd17").val();
		var td18 = $("#gettd18").val();
		var td19 = $("#gettd19").val();
		var td20 = $("#gettd20").val();
		var td21 = $("#gettd21").val();
		var td22 = $("#gettd22").val();
		var td23 = $("#gettd23").val();
		var td24 = $("#gettd24").val();
		var td25 = $("#gettd25").val();
		var td26 = $("#gettd26").val();
		var td27 = $("#gettd27").val();
		var td28 = $("#gettd28").val();
		var td29 = $("#gettd29").val();
		var td30 = $("#gettd30").val();
		var td31 = $("#gettd31").val();
		var td32 = $("#gettd32").val();
		var td33 = $("#gettd33").val();
		var td34 = $("#gettd34").val();
		var td35 = $("#gettd35").val();
		var td36 = $("#gettd36").val();
		var td37 = $("#gettd37").val();
		var td38 = $("#gettd38").val();
		var td39 = $("#gettd39").val();
		var td40 = $("#gettd40").val();
		var td41 = $("#gettd41").val();

	switch (cat) {
		case "LOADBOARD":
			// day = "Sunday";
			$.ajax({
				type: "POST",
				url: "models/editItems/update.php",
				data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9,td10:td10,
					td11:td11,td12:td12},
				cache: false,
				success: function(html){
					//console.log(html);
					// if (keyword != ""){
					// 	$("#delBttnSearch").click();
					// }
					$("#message").html(html);
					$("#editBttnSearch").click();
				}
			});
			break;
		case "SOCKET":
			$.ajax({
				type: "POST",
				url: "models/editItems/update.php",
				data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9,td10:td10,td11:td11,td12:td12,
					td13:td13,td14:td14},
				cache: false,
				success: function(html){
					//console.log(html);
					// if (keyword != ""){
					// 	$("#delBttnSearch").click();
					// }
					$("#message").html(html);
					$("#editBttnSearch").click();
				}
			});
			break;
		case "GNG":
			$.ajax({
				type: "POST",
				url: "models/editItems/update.php",
				data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9,td10:td10,td11:td11,td12:td12,td13:td13,td14:td14},
				cache: false,
				success: function(html){
					//console.log(html);
					// if (keyword != ""){
					// 	$("#delBttnSearch").click();
					// }
					$("#message").html(html);
					$("#editBttnSearch").click();
				}
			});
			break;
		case "BIB":
			$.ajax({
				type: "POST",
				url: "models/editItems/update.php",
				data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9},
				cache: false,
				success: function(html){
					//console.log(html);
					// if (keyword != ""){
					// 	$("#delBttnSearch").click();
					// }
					$("#message").html(html);
					$("#editBttnSearch").click();
				}
			});
			break;
		case "NOZZLE":
			$.ajax({
				type: "POST",
				url: "models/editItems/update.php",
				data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8},
				cache: false,
				success: function(html){
					//console.log(html);
					// if (keyword != ""){
					// 	$("#delBttnSearch").click();
					// }
					$("#message").html(html);
					$("#editBttnSearch").click();
				}
			});
			break;
		case "CHIPMOUNT NOZZLE":
		$.ajax({
			type: "POST",
			url: "models/editItems/update.php",
			data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
				td6:td6,td7:td7,td8:td8},
			cache: false,
			success: function(html){
				//console.log(html);
				// if (keyword != ""){
				// 	$("#delBttnSearch").click();
				// }
				$("#message").html(html);
				$("#editBttnSearch").click();
			}
		});
			break;		
		case "IC":
			$.ajax({
				type: "POST",
				url: "models/editItems/update.php",
				data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9,td10:td10},
				cache: false,
				success: function(html){
					//console.log(html);
					// if (keyword != ""){
					// 	$("#delBttnSearch").click();
					// }
					$("#message").html(html);
					$("#editBttnSearch").click();
				}
			});
			break;
		case "MC":
			$.ajax({
				type: "POST",
				url: "models/editItems/update.php",
				data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9},
				cache: false,
				success: function(html){
					//console.log(html);
					// if (keyword != ""){
					// 	$("#delBttnSearch").click();
					// }
					$("#message").html(html);
					$("#editBttnSearch").click();
				}
			});
			break;
		case "WP":
			$.ajax({
				type: "POST",
				url: "models/editItems/update.php",
				data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9,td10:td10,td11:td11,td12:td12,td13:td13},
				cache: false,
				success: function(html){
					//console.log(html);
					// if (keyword != ""){
					// 	$("#delBttnSearch").click();
					// }
					$("#message").html(html);
					$("#editBttnSearch").click();
				}
			});
			break;
		case "SB":
			$.ajax({
				type: "POST",
				url: "models/editItems/update.php",
				data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td9:td9,td10:td10,td13:td13,td14:td14},
				cache: false,
				success: function(html){
					//console.log(html);
					// if (keyword != ""){
					// 	$("#delBttnSearch").click();
					// }
					$("#message").html(html);
					$("#editBttnSearch").click();
				}
			});
			break;
		case "ATC":
			$.ajax({
				type: "POST",
				url: "models/editItems/update.php",
				data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9,td10:td10,td11:td11},
				cache: false,
				success: function(html){
					//console.log(html);
					// if (keyword != ""){
					// 	$("#delBttnSearch").click();
					// }
					$("#message").html(html);
					$("#editBttnSearch").click();
				}
			});
			break;
		case "TS":
			$.ajax({
				type: "POST",
				url: "models/editItems/update.php",
				data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9,td10:td10,td11:td11},
				cache: false,
				success: function(html){
					//console.log(html);
					// if (keyword != ""){
					// 	$("#delBttnSearch").click();
					// }
					$("#message").html(html);
					$("#editBttnSearch").click();
				}
			});
			break;
		case "CK":
				$.ajax({
					type: "POST",
					url: "models/editItems/update.php",
					data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
						td6:td6,td7:td7,td8:td8,td9:td9,td10:td10,td11:td11,
						td12:td12,td13:td13,td14:td14,td15:td15,td16:td16,
						td17:td17,td18:td18,td19:td19,td20:td20,td21:td21,
						td22:td22,td23:td23,td24:td24,td25:td25,td26:td26,
						td27:td27,td28:td28,td29:td29,td30:td30,td31:td31,
						td32:td32,td33:td33,td34:td34,td35:td35,td36:td36,
						td37:td37,td38:td38,td39:td39,td40:td40,td41:td41},
					cache: false,
					success: function(html){
						//console.log(html);
						$("#message").html(html);
						$("#editBttnSearch").click();
					}
				});
				break;
		case "TP":
				$.ajax({
					type: "POST",
					url: "models/editItems/update.php",
					data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
						td6:td6,td7:td7,td8:td8,td9:td9,td10:td10},
					cache: false,
					success: function(html){
						//console.log(html);
						$("#message").html(html);
						$("#editBttnSearch").click();
					}
				});
				break;
		case "CB":
			// day = "Sunday";
			$.ajax({
				type: "POST",
				url: "models/editItems/update.php",
				data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td7:td7,td8:td8,td9:td9},
				cache: false,
				success: function(html){
					//console.log(html);
					// if (keyword != ""){
					// 	$("#delBttnSearch").click();
					// }
					$("#message").html(html);
					$("#editBttnSearch").click();
				}
			});
			break;
		case "TFD":
			$.ajax({
				type: "POST",
				url: "models/editItems/update.php",
				data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9},
				cache: false,
				success: function(html){
					//console.log(html);
					// if (keyword != ""){
					// 	$("#delBttnSearch").click();
					// }
					$("#message").html(html);
					$("#editBttnSearch").click();
				}
			});
			break;
		case "RC":
				$.ajax({
					type: "POST",
					url: "models/editItems/update.php",
					data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
						td6:td6,td7:td7,td8:td8},
					cache: false,
					success: function(html){
						//console.log(html);
						$("#message").html(html);
						$("#editBttnSearch").click();
					}
				});
				break;	
		case "SP":
			var image = $("input#userImage")[0].files[0];
			var imageComp = $("#gettd2").val();
			var trimName = $("input#userImage")[0].files[0].name;

			if(image != null){
				if (trimName.split('.').slice(0, -1).join('.') == imageComp){
					$.ajax({
						type: "POST",
						url: "models/editItems/update.php",
						data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
							td6:td6,td7:td7,td8:td8,file:trimName},
						cache: false,
						success: function(html){
							//console.log(html);
		
							
							console.log(image);
						
							if(image != null){
								
								var formData = new FormData();
								formData.append("Image", image);
								formData.append("cat", cat);
								formData.append("id", td0);
								$.ajax({
									url: "models/editUploads/editUploads.php",
									type: "POST",
									data: formData,				
									contentType: false,
									processData:false,
									success: function(data)
									{
										$("#message").html(html);
										$("#editBttnSearch").click();	
									},
									error: function() 
									{
									} 	        
								});
							}
							else{
								$("#message").html(html);
								$("#editBttnSearch").click();
							}
						}
					});
				}
				else{
					alert("IMAGE DESCRIPTION DOES NOT MATCH PART CODE");
				}
			}
			else{
				$.ajax({
					type: "POST",
					url: "models/editItems/update.php",
					data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
						td6:td6,td7:td7,td8:td8},
					cache: false,
					success: function(html){
						//console.log(html);
						$("#message").html(html);
						$("#editBttnSearch").click();
					}
				});
			}
			break;	
		case "PG":
			// day = "Sunday";
			$.ajax({
				type: "POST",
				url: "models/editItems/update.php",
				data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9,td10:td10,
					td11:td11,td12:td12},
				cache: false,
				success: function(html){
					//console.log(html);
					// if (keyword != ""){
					// 	$("#delBttnSearch").click();
					// }
					$("#message").html(html);
					$("#editBttnSearch").click();
				}
			});
			break;
		case "CABLE":
			$.ajax({
				type: "POST",
				url: "models/editItems/update.php",
				data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8,td9:td9,td10:td10,td11:td11,td12:td12},
				cache: false,
				success: function(html){
					//console.log(html);
					// if (keyword != ""){
					// 	$("#delBttnSearch").click();
					// }
					$("#message").html(html);
					$("#editBttnSearch").click();
				}
			});
			break;
		case "COLLET":
		$.ajax({
			type: "POST",
			url: "models/editItems/update.php",
			data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
				td6:td6,td7:td7,td8:td8},
			cache: false,
			success: function(html){
				//console.log(html);
				// if (keyword != ""){
				// 	$("#delBttnSearch").click();
				// }
				$("#message").html(html);
				$("#editBttnSearch").click();
			}
		});
		break;	
		case "SPANKER":
			$.ajax({
				type: "POST",
				url: "models/editItems/update.php",
				data: {cat:cat,td0:td0,td1:td1,td2:td2,td3:td3,td4:td4,td5:td5,
					td6:td6,td7:td7,td8:td8},
				cache: false,
				success: function(html){
					//console.log(html);
					// if (keyword != ""){
					// 	$("#delBttnSearch").click();
					// }
					$("#message").html(html);
					$("#editBttnSearch").click();
				}
			});
			break;		
			
		default:
			break;
	}
});

$(document).on("click",".userList tr",function(){
	$(this).addClass("selected");
	var id = $('.id',this).html();
	var ad_accnt = $('.ad_accnt',this).html();
	var level = $('.level',this).html();
	var line = $('.line',this).html();

	$("#userID").val(id);
	$("#adAccount").val(ad_accnt);
	$("#level").val(level);
	$("#line").val(line);
});

$('.mypassword').keypress(function (e) {
	var key = e.which;
	if(key == 13)  // the enter key code
	{
		$('.signin').click();
	}
});

$('.mypassword2').keypress(function (e) {
var key = e.which;
if(key == 13)  // the enter key code
	{
		$('.signin2').click();
	}
});

$(document).on("keypress",".isNumberKey",function isNumberKey(evt){
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)){
			return false;
		}else{
			return true;
		}

		// if (charCode == 44 || (charCode > 47 && charCode < 58)){
		// 	return true;
		// }else{
		// 	return false;
		// }
});

$(document).on("keypress",".isNumberKeyComma",function isNumberKey(evt){
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	// if (charCode > 31 && (charCode < 48 || charCode > 57)){
	// 	return false;
	// }else{
	// 	return true;
	// }

	if (charCode == 44 || (charCode > 47 && charCode < 58)){
		return true;
	}else{
		return false;
	}
});


// function showfield(tstID){
// 	$.ajax({
// 		type: "POST",
// 		url: "models/checkOut.php",
// 		data: 'id='+ tstID,
// 		cache: false,
// 		success: function(html){
// 			console.log(html);
// 			alert(html);
// 			// if (keyword != ""){
// 			// 	$("#delBttnSearch").click();
// 			// }
// 			// $("#message").html(html);
// 			// $("#editBttnSearch").click();
// 			//$('#openConfirmModal').click();
// 			//$('.confirmModal').css('display','');
// 		}
// 	});
// }

// $(document).on("click",".openConfirmModal",function(){
// 	if ($('#trackOut').hasClass('active')){
// 		$('.confirmModal').css('display','');
// 	}
// });

// $(document).on("click","#cancel",function(){
// 	$('#saveData').attr('id','hold');
// 	alert('adf');
// });

// $(document).on("click","#confirmed",function(){
// 	$('#hold').attr('id','saveData');
// 	$('.dismissConfirmModal').click();
// });

$(document).on('click','#confirmed', function () {
	//var getUrl = window.location;
	var mypassword = $(".confirmPass").val();
	var cat = $('.modal-title').html();
	if (mypassword == ""){
		$(".confirmPass").attr("required","required");
	}else{
		var pass = $(".confirmPass");
		pass.removeAttr("required");
		// $.ajax({
		// 	type: "POST",
		// 	url: getUrl+"?controller=posts&action=signin",
		// 	data: "pass=" + pass,
		// 	cache: false,
		// 	success: function(){
		// 		console.log(url);
		// 	}
		// });
		var check = pass.val().toUpperCase();
		if (check == "PROCEED"){
			event.preventDefault();
			// $('#loader-icon').show();
			$('#msg').hide();
			$('#saveData').ajaxSubmit({
				target: '#msg',
				beforeSubmit:function(){
					$('.progress-bar').width('50%');
					$('.dismissConfirmModal').click();
				},
				uploadProgress: function(event, position, total, percentageComplete){
					$('.progress-bar').animate({
						width: percentageComplete + '100%'
					}, {
						duration: 1000
					});

				},
				success:function(){
					//$('#saveData').submit();
					// $('#loader-icon').hide();
					// $('#targetLayer').show();
					// if ($('.progress-bar').css('width', '100%')){
						if(cat == "LOADBOARD"){

						}
						else if(cat == "SPARE PARTS"){
									
						}
						else{
							$('#msg').html('<div class="alert alert-success" role="alert" id="message" for="name"><b>Record successfully save</b></div>');				
							$('#msg').show();
							location.reload();
						}
					// }
					
				}
			});
		}
						
	}
});

$(document).on("click",".dismissConfirmModal",function(){
	$('.confirmModal').css('display','none');
});

$(document).on("click", "#in-parts" ,function(){
	$(".getStatus").val("IN");
});

$(document).on("click", "#out-parts" ,function(){
	$(".getStatus").val("OUT");
});

// $(document).ready(function(){

	// /* Get browser */
	// $.browser.chrome = /chrome/.test(navigator.userAgent.toLowerCase());
	// $.browser.mozilla = /mozilla/.test(navigator.userAgent.toLowerCase());
	
	// /* Detect Chrome */
	// if($.browser.chrome){
	//   /* Do something for Chrome at this point */
	//   alert("You are using Chrome!");
	  
	//   /* Finally, if it is Chrome then jQuery thinks it's 
	//   Safari so we have to tell it isn't */
	//   $.browser.safari = false;
	//   $.browser.mozilla = false;

	// }
	
	// if($.browser.mozilla){
	// 	/* Do something for Chrome at this point */
	// 	alert("You are using Mozilla!");
		
	// 	/* Finally, if it is Chrome then jQuery thinks it's 
	// 	Safari so we have to tell it isn't */
	// 	$.browser.safari = false;		
	// }
	
	// /* Detect Safari */
	// if($.browser.msie){
	// 	/* Do something for Safari */
	// 	alert("You are using IE!");
	//   }
	
	
// });

$(".barcode").on("input", function() {
	delay(function(){
	    if ($(".barcode").val().length < 7) {
	 	   $(".barcode").val("");
	   }
	}, 25 );
 });
 
  var delay = (function(){
	var timer = 0;
	return function(callback, ms){
	   clearTimeout (timer);
	   timer = setTimeout(callback, ms);
	};
 })();

 $("#show-personnel").on("keyup", function(){
	var cid = $(this).val();
	
	$.ajax({
		type: "POST",
		url: "models/spareParts/getUserData.php",
		data: {
			"cid": cid
		},
		cache: false,
		success: function(data){
			var obj = JSON.parse(data);
			
			if(obj.firstName == null)
			{
				$("#name-change").html("");
			}
			else{
				$("#name-change").html(obj.firstName+ " " +obj.lastName);
			}
		}
	});

 });


$(document).on("change",".custom-file-input",function() {
	var fileName = $(this).val().split("\\").pop();
	$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

$("#out-parts").on("click", function(){
	$(".getMachine").attr("readonly", false);
	$("#quantity-name").html("WITHDRAW QUANTITY");
	$("#show-personnel").attr("readonly", false);
	$.ajax({
		type: "POST",
		url: "models/rack.php",
		data: {
			"parts_code" : $(".getPartsCode").val()
		},
		cache: false,
		success: function(html){
			console.log(html);
			$("#rack-list").html(html);
		}
	});

	$.ajax({
		type: "POST",
		url: "models/spareParts/machineID.php",
		cache: false,
		success: function(html){
			console.log(html);
			$("#machine-list").html(html);
		}
	});
});

$("#in-parts").on("click", function(){
	$(".getMachine").attr("readonly", true);
	$("#quantity-name").html("DEPOSIT QUANTITY");
	$("#show-personnel").attr("readonly", true);
	$.ajax({
		type: "POST",
		url: "models/rack.php",
		data: {
			"parts_code" : $(".getPartsCode").val()
		},
		cache: false,
		success: function(html){
			console.log(html);
			$("#rack-list").html(html);
		}
	});
});

$(document).on("keyup select", ".getLocation", function(){
	var rack = $(this).val();
	var parts_code = $(".getPartsCode").val();
	// if(parts_code == ""){

	// }

	$.ajax({
		type: "POST",
		url: "models/spareParts/sparePartsAutopopulate.php",
		data: {
			"rack": rack,
			"parts_code": parts_code
		},
		cache: false,
		success: function(data){
			console.log(data);
			var obj = JSON.parse(data);

			$(".getCurrentQuantity").val(obj.current_qty);
			$(".getMaker").val(obj.maker);
		}
	});
});

$(document).on("keypress", ".isNumberKey", function isNumberKey(evt) {
	  var charCode = (evt.which) ? evt.which : evt.keyCode;
	  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	    return false;
	  } else {
	    return true;
	  }
	});
	 
	$(document).on("keypress", ".isNumberKeyDot", function isNumberKey(evt) {
	  var charCode = (evt.which) ? evt.which : evt.keyCode;
	  if (charCode === 46 && this.value.split('.').length === 2) {
	    return false;
	  }
	 
	  if (charCode == 46 || (charCode > 47 && charCode < 58)) {
	    return true;
	  } else {
	    return false;
	  }
});  

$(document).on("click",".close", function(){
	$("#rack-list").html("");
});
