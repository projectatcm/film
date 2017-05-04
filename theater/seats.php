<?php include './includes/header.php'; ?>

<div class="col-xs-12">

	<?php

	for($i=1;$i<=$screens;$i++){
	 ?>

	<div class="col-xs-3" style="padding-top:10px">
		<a href="addseats.php?screen=<?=$i?>" style="color:#616161">
		<div class="col-xs-12" style="height:250px;background-color:red;padding:0;">
				<img src="../images/screen.jpg" alt="">
		</div>
		<div class="col-xs-12 text-center" style="padding-top:5px;font-weight:700">
			Screen No. <?=$i?>
		</div>
		</a>
	</div>
<?php } ?>

</div>



<?php include './includes/footer.php'; ?>
