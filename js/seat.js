$(document).on("click", ".associateseatfortheater", function (e) {
	var seatid = $(this).data('seatname');
	var theaterid = $(this).data('theaterid');
	$.ajax({
			type:'POST',
			url:'./ajaxfunctions.php',
			data: {'type':'assignseatfortheater','seatid': seatid,'theaterid':theaterid},
			success:function(data){
				console.log(data);
		}
	});
	$(this).removeClass( "greendiv associateseatfortheater" ).addClass( "reddiv dissociateseatfromtheater" );
	e.stopImmediatePropagation();
});

$(document).on("click",".dissociateseatfromtheater",function(e){
	var theaterid = $(this).data('theaterid');
	var seatname = $(this).data('seatname');
	$.ajax({
			type:'POST',
			url:'./ajaxfunctions.php',
			data: {'type':'dissociateseatfromtheater','seatid': seatname,'theaterid':theaterid},
			success:function(data){
				console.log(data);
		}
	});
	$(this).removeClass( "reddiv dissociateseatfromtheater" ).addClass( "greendiv associateseatfortheater" );
	e.stopImmediatePropagation();
});
