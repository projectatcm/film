<?php
	include './includes/header.php';
	$allfilms = $functions->selectAllFilms();?>

<div class="col-xs-12">

<h4>All Films</h4>

<?php

	foreach($allfilms as $filmdatas){
		$filmid = $filmdatas['id'];
		$filmname = $filmdatas['name'];
		$filmposter = $filmdatas['poster'];
 ?>

	<div class="col-xs-3"  style="padding-top:10px;padding-bottom:10px;">
		<div class="col-xs-12" style="height:250px;padding:0">
			<img src="<?='.'.$filmposter?>" alt="">
		</div>
		<div class="col-xs-12" style="padding:5px 0">
			<?=$filmname?>
		</div>
	</div>
<?php } ?>


</div>

<?php include './includes/footer.php'; ?>
