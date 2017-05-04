<?php

include './libs/Functions.php';
$functions = new Functions();
$type = $_POST['type'];

if($type === 'viewfilmdata'){
	$filmid = $_POST['filmid'];
	$filmdata = $functions->SELECTFilmById($filmid);
	$filmdata = $filmdata[0];
	$filmname = $filmdata['name'];
	$filmlanguages = $filmdata['language'];
	$filmcasts = $filmdata['cast'];
	$filmdirectors = $filmdata['director'];
	$filmproducers = $filmdata['producer'];
	$filmposter = $filmdata['poster'];
	$filmrelease = $filmdata['releasedate'];
	$filmlanguages = explode(',', $filmlanguages);
	$filmlanguagessize = sizeof($filmlanguages);
	$filmcasts = explode(',', $filmcasts);
	$filmcastssize = sizeof($filmcasts);
	for($x=0;$x<$filmcastssize;$x++){
		$castdata = $functions->selectcastbyid($filmcasts[$x]);
		$castdata = $castdata[0]['name'];
		$castnames[] = $castdata;
	}

	$filmdirectors = explode(',', $filmdirectors);
	$filmdirectorssize = sizeof($filmdirectors);
	for($y=0;$y<$filmdirectorssize;$y++){
		$directorsdatas = $functions->selectcastbyid($filmdirectors[$y]);
		$directorsdatas = $directorsdatas[0]['name'];
		$directornames[] = $directorsdatas;
	}

	$filmproducers = explode(',', $filmproducers);
	$filmproducerssize = sizeof($filmproducers);
	for($z=0;$z<$filmproducerssize;$z++){
		$filmproducerdata = $functions->selectcastbyid($filmproducers[$z]);
		$filmproducerdata = $filmproducerdata[0]['name'];
		$filmprod[] = $filmproducerdata;
	}

	$castname = implode('<br>', $castnames);
	$directorname = implode('<br>', $directornames);
	$filmproducer = implode('<br>', $filmprod);
	?>


	<div class="container">

<div class="col-xs-12">
	<div class="form-group">
		<div class="col-xs-2">
			<label>Film Name</label>
			<span class="pull-right">:</span>
		</div>
		<div class="col-xs-10"><?=$filmname?></div>
	</div>
</div>

<div class="col-xs-12">
		<div class="form-group">
			<div class="col-xs-2">
				<label>Release Date</label>
				<span class="pull-right">:</span>
			</div>
			<div class="col-xs-10"><?=$filmrelease?></div>
		</div>
</div>
<div class="col-xs-12">
		<div class="form-group">
			<div class="col-xs-2">
				<label>Casts</label>
				<span class="pull-right">:</span>
			</div>
			<div class="col-xs-10"><?=$castname?></div>
		</div>
</div>
<div class="col-xs-12">
		<div class="form-group">
			<div class="col-xs-2">
				<label>Directors</label>
				<span class="pull-right">:</span>
			</div>
			<div class="col-xs-10"><?=$directorname?></div>
		</div>
</div>
<div class="col-xs-12">
		<div class="form-group">
			<div class="col-xs-2">
				<label>Producers</label>
				<span class="pull-right">:</span>
			</div>
			<div class="col-xs-10"><?=$filmproducer?></div>
		</div>
</div>

</div>


<?php }

if($type === 'addTheaterSeats') {
	$rows = $_POST['rows'];
	$cols = $_POST['cols'];
	for($i=1;$i<=$rows;$i++){
		for($x=1;$x<=$cols;$x++){
		?>
			<label> Seats for row- <?=$i?> Division- <?=$x?></label>
			<input name="r<?=$i?>c<?=$x?>" placeholder="Seats" type="number" class="form-control">
			<br>
	<?php } } ?>
	<input type="text" name="totalrow" value="<?=$rows?>" hidden>
		<input type="text" name="totalcols" value="<?=$cols?>" hidden>
 <?php }
