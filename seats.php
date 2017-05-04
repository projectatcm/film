
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
		<style media="screen">
			td{ padding:2px; }
			.seatnumbers{
				padding:5px 10px;
				background-color:#00C853;
				color:#ECEFF1;
				width:35px;
				border-radius:4px;
			}
			.othercolumns{
				color:#ECEFF1;
				padding:5px 10px;
			}
			.rowsnames{background-color:#C51162; }
			.rowsadd{background-color:#795548;cursor: pointer; }
			.rowsdel{background-color:#F44336;cursor: pointer; }
		</style>

		<div  style="padding:25px 10px;">
			<table class="text-center seatscontainer">
				<tr>
					<td><div class="othercolumns rowsnames text-uppercase">A</div></td>
					<?php for($i=1;$i<=30;$i++){ ?> <td ><div class="seatnumbers"><?=$i?></div></td> <?php } ?>
					<td><div class="othercolumns rowsadd">+</div></td>

				</tr>
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
			var x = 1;
			var alphabets = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','z'];
			$(addButton).click(function(){
					if(x < maxField){
							var fieldHTML = '<tr >'+
                                '<td><div class="othercolumns rowsnames text-uppercase">'+alphabets[x]+'</div></td>'+
                                '<?php for($i=1;$i<=30;$i++){ ?> '+
                                '<td ><div class="seatnumbers" data-name="'+x+'_'+<?=$i?>+'"><?=$i?></div></td>'+
                                ' <?php } ?>'+
                                '<td><div class="othercolumns rowsdel">-</div></td>'+
                              '</tr>';

							$(wrapper).append(fieldHTML);
							x++;
					}
			});
			$(wrapper).on('click', '.rowsdel', function(e){
					e.preventDefault();
					$(this).parent().parent().remove();
					x--;
			});
	});

	</script>

</html>
