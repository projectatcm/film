$(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");
    });
});
$(document).on("click", ".editcrew", function () {
    var $docId = $(this).data('id');
    var $docName = $(this).data('name');
    $(".modal-body #dIdleave").val($docId);
    $(".modal-body #dNameLeave").val($docName);
});

$(document).on("click", ".closemapmodal", function () {
  $('.locationselectionmodal').modal('hide');
});

$(document).on("click",".viewinmap",function(){
    var $url = $(this).data('mapurl');
      $('.mapmodal').attr('src',$url);
});
$(document).on("click",".viewproof",function(){
      var $url = $(this).data('proofurl');
      $('.theaterproofimage').attr('src',$url);
});

$(document).on('click', ".viewfulladdress",function() {
    var $address = $(this).data('fulladdress');
    $('.fulladdressmodal').text($address);
});

$(document).on('click', ".blockbtn",function() {
    var $id = $(this).data('blockid');
    $('.blockingid').val($id);
});

$(document).on('click', ".deletetheaterbtn",function() {
    var $id = $(this).data('deleteid');
    $('.delid').val($id);
});

$(document).on('click', ".approvetheaterbtn",function() {
    var $id = $(this).data('blockid');
    $('.approveidfield').val($id);
});

$(document).on('click', ".delcrewbtn",function() {
    var $id = $(this).data('crewid');
    $('.delid').val($id);
});


$(document).on('click', ".editcrewbtn",function() {
  var $id = $(this).data('crewid');
  var $name = $(this).data('crewname');
  var $image = $(this).data('crewimage');
  var $type = $(this).data('crewtype');
  $('.editcrewname').val($name);
  $('.editcrewtype').val($type);
  $('.crewimagefield').val($image);
  $('.crewidmodal').val($id);
});

$(document).on('click', ".editlanguagebtn",function() {
    var $id = $(this).data('langid');
    var $lang = $(this).data('lang');
    $('.delid').val($id);
});

$(document).on('click', ".deletelanguagebtn",function() {
    var $id = $(this).data('langiuageid');
    $('.dellangid').val($id);
});

$(document).on('click', ".deleteCategoryBtn",function() {
    var $id = $(this).data('catid');
    $('.delcatid').val($id);
});


$(document).on("click",".viewuserpic",function(){
      var $url = $(this).data('userpic');
      $('.userprofilepic').attr('src',$url);
});

$(document).on('click', ".statusBtn",function() {
    var $id = $(this).data('uid');
    var $data = $(this).data('input');
    $('.userid_status').val($id);
    $('.newstatusfield').val($data);
});



				$(document).on("click", ".viewMoreBtn", function () {
					var filmid = $(this).data('filmid');
					if(filmid){
							$.ajax({
									type:'POST',
									url:'../ajaxData.php',
									data: {'type':'viewfilmdata','filmid': filmid},
									success:function(data){
										console.log(data);
										$('.showFilmData').html(data);
								}
							});
					}
				});


$(document).on("click", ".addrowsbtn", function (e) {
  var rows = $('#rowsfield').val();
  var col = $('#columnsfield').val();
if(rows.length === 0){
    e.preventDefault();
    alert('Please Select Rows In Theater');
  }else{
    if(col.length === 0){
      e.preventDefault();
      alert('Please Select Rows In Theater');
    }
  else{


    $.ajax({
        type:'POST',
        url:'../ajaxData.php',
        data: {'type':'addTheaterSeats','rows': rows,'cols':col},
        success:function(data){
          console.log(data);
          $('.seatsinrow').html(data);
      }
    });
    }
  }


});

        $(document).on('click', ".assignmoviebtn",function() {
          var $fid = $(this).data('filmid');
          var $tid = $(this).data('theaterid');
          var $sno = $(this).data('screenno');
            $('.assignmoviefilmid').val($fid);
            $('.assignmovietheaterid').val($tid);
            $('.assignmoviescreenno').val($sno);
        });
