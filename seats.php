<?php
include './libs/Functions.php';
$functions = new Functions();
$theaterid = 10;
$seatdatas = $functions->checktheaterintheaterseatstable($theaterid);
$fieldid = $seatdatas[0]['id'];
$fieldid = $seatdatas[0]['theaterid'];
$seatdatas = $seatdatas[0]['seats'];
$split_seatdatas = explode('~', $seatdatas);
$alphabets = ['','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','z'];
?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title></title>

		<script src="js/vendors/jquery-1.12.4.js" charset="utf-8"></script>
		<script src="js/vendors/bootstrap.min.js" charset="utf-8"></script>
		<script src="./js/seat.js" charset="utf-8"></script>
		<!-- css -->
		<link rel="stylesheet" href="css/vendors/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/vendors/bootstrap.min.css">
		<link rel="stylesheet" href="css/vendors/font-awesome.min.css">
		<link rel="stylesheet" href="./css/seat.css">
  </head>
  <body style="background-color:#f3f3f3">
		<div  style="padding:25px 10px;">
			<table class="text-center seatscontainer">
        <?php
        $numberofrows = 1;
        for($arraysize=1;$arraysize<sizeof($split_seatdatas);$arraysize++){
          $split_seatdatas_Exploded = explode('_', $split_seatdatas[$arraysize]);
          $split_seatdatas_Exploded=$split_seatdatas_Exploded[0];
          if($split_seatdatas_Exploded > $numberofrows){ $numberofrows = $split_seatdatas_Exploded;}
        }
          for($rowssize = 1 ;$rowssize <= $numberofrows;$rowssize++) {
         ?>
				<tr>
					<td><div class="othercolumns rowsnames text-uppercase"><?=$alphabets[$rowssize]?></div></td>
					<?php for($i=1;$i<=30;$i++){
              $presentflag = 0;
              $currentclass = $rowssize.'_'.$i;
              foreach ($split_seatdatas as $key => $split_seatdata_id) {
                if($currentclass == $split_seatdata_id){ $presentflag = 1; }
              }
            ?>
            <td >
              <div class="seatnumbers
                    <?php
                    if($presentflag === 1){ echo " reddiv dissociateseatfromtheater "; }
                    else{ echo " greendiv associateseatfortheater "; }
                    ?>
                      seat_1_<?=$i?>"
                   data-theaterid="10"
                   data-seatname="1_<?=$i?>" > <?=$i?>
              </div>
            </td> <?php }
            if($rowssize === 1){
            ?>
					<td><div class="othercolumns rowsadd">+</div></td>
          <?php }else{ ?>
            <td><div class="othercolumns rowsdel" data-theaterid="10" data-rowno="<?=$i?>">-</div></td>

            <?php } ?>
				</tr>
        <?php
          }
         ?>
			</table>
		</div>

		<div class="col-xs-12" style="padding:15px;">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="padding:10px;background-color:#4A148C;color:#fff"> Screen </div>
		</div>

  </body>
	<script type="text/javascript">
	$(document).ready(function(){
			var maxField = 25;
			var addButton = $('.rowsadd');
			var wrapper = $('.seatscontainer');
			var x = <?=$rowssize?>;
			var alphabets = ['','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','z'];
			$(addButton).click(function(){
					if(x < maxField){
              classname = x;
							var fieldHTML = '<tr >'+
                                '<td><div class="othercolumns rowsnames text-uppercase">'+alphabets[x]+'</div></td>'+
                                '<?php for($i=1;$i<=30;$i++){  ?> '+
                                '<td ><div class="seatnumbers associateseatfortheater greendiv seat_'+classname+'_<?=$i?>" '+
                                'data-theaterid="10"'+
                                'data-seatname="'+classname+'_'+<?=$i?>+'"><?=$i?></div></td>'+
                                ' <?php } ?>'+
                                '<td><div class="othercolumns rowsdel" data-theaterid="10" data-rowno="<?=$i?>">-</div></td>'+
                              '</tr>';

							$(wrapper).append(fieldHTML);
							x++;
					}
			});
			$(wrapper).on('click', '.rowsdel', function(e){
					e.preventDefault();
          rowno = $(this).data('rowno');
          theaterid = $(this).data('theaterid');
          $.ajax({
        			type:'POST',
        			url:'./ajaxfunctions.php',
        			data: {'type':'deletedatawithrows','rowno': rowno,'theaterid':theaterid},
        			success:function(data){
        				console.log(data);
        		}
        	});
          $(this).parent().parent().remove();

			});
	});

	</script>

</html>
