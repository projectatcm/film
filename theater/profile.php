<?php include './includes/header.php';

?>

	<div class="col-xs-2">
		<div style="height:150px;margin-left:auto;margin-right:auto;width:150px;background-color:#f7f7f7;border-radius:50%;padding:0">
			<img src="<?='.'.$buildingimage?>" class="img-circle">
		</div>
	</div>
	<div class="col-xs-10" style="padding-top:10px;border-bottom:1px solid #eee">
		<div class="col-xs-6">
			<h4 class="text-capitalize"><?=$name?></h4>
			<h5>T<?=$loginid?></h5>
			<h5><?=$email?></h5>
			<h5><?=$location?></h5>
			<h5 class="text-capitalize"><?=$status?></h5>
		</div>
		<div class="col-xs-6">
			<h6><a href="#" class="viewproofbtn" data-toggle="modal" data-target=".proofview">View Proof</a></h6>
			<h6><a href="#" class="viewlocationbtn" data-toggle="modal" data-target=".locationview">View Location</a></h6>
		</div>
	</div>

	<div class="col-xs-12" style="padding-top:80px;">
		<h4 style="color:#2d2d2d;font-size:18px;font-weight:100" class="page-header">Now Playing</h4>
		<?php for($i=1;$i<=$screens;$i++){ ?>
		<div class="col-xs-12">
			<h5>Screen No <?=$i?></h5>
			<?php

			$screenid = $i;
			$theaterid = $loginid;
			$showtimes = $functions->getShowTimesByTheaterAndScreenId($theaterid,$screenid);?>

			<?php if($showtimes){
			$firstshow = $showtimes[0]['firstshowtime'];
			$noonshow = $showtimes[0]['noonshowtime'];
			$matineeshow = $showtimes[0]['matineeshowtime'];
			$secondshow = $showtimes[0]['secondshowtime'];
			 ?>


			<div class="col-xs-12">

					<?php if($firstshow !== 'no show'){ ?>
						 <div class="col-xs-3">
							 <label>First Show</label>
							 <div class="col-xs-12 text-center" style="height: 250px;padding:0;background-color:#f8f8f8">
								 	<?php
									 $filmsbyshowtime = $functions->getFilmShowByTheaterScreenAndShowTime($theaterid,$screenid,'firstshow');
									 if($filmsbyshowtime){
										 	$filmassignid = $filmsbyshowtime[0]['id'];
										 	$filmid = $filmsbyshowtime[0]['filmid'];
											$filmdata = $functions->SELECTFilmById($filmid);
											$poster = $filmdata[0]['poster'];
											$filmname = $filmdata[0]['name'];
											$poster = '.'.$poster;
											if(file_exists($poster)){ $poster = $poster; }
											else{ $poster = '../images/default-movie.png'; }
										 ?>
										 <img src="<?=$poster?>" alt="">
										 <div class="col-xs-12" style="padding:5px 0px"><label><?=$filmname?></label></div>
										 <div class="col-xs-12" style="padding:5px 0px;font-size:12px"><label><?=$firstshow?></label></div>
									<?php } else{ ?>
			 						<div style="color:#212121;opacity:0.3;font-weight:700;margin-top:100px;">No Film Added</div>
									<div class="col-xs-12" style="padding:5px 0px;font-size:12px"><label><?=$firstshow?></label></div>

								<?php } ?>
			 				</div>

						 </div>
				 	  <?php } ?>

						<?php if($noonshow !== 'no show'){ ?>
						 <div class="col-xs-3">
							 <label>Noon Show</label>
							 <div class="col-xs-12 text-center" style="height: 250px;padding:0;background-color:#f8f8f8">
								 	<?php
									 $filmsbyshowtime = $functions->getFilmShowByTheaterScreenAndShowTime($theaterid,$screenid,'noonshow');
									 if($filmsbyshowtime){
										 	$filmassignid = $filmsbyshowtime[0]['id'];
										 	$filmid = $filmsbyshowtime[0]['filmid'];
											$filmdata = $functions->SELECTFilmById($filmid);
											$poster = $filmdata[0]['poster'];
											$filmname = $filmdata[0]['name'];
											$poster = '.'.$poster;
											if(file_exists($poster)){ $poster = $poster; }
											else{ $poster = '../images/default-movie.png'; }
										 ?>
										 <img src="<?=$poster?>" alt="">
										 <div class="col-xs-12" style="padding:5px 0px"><label><?=$filmname?></label></div>
										 <div class="col-xs-12" style="padding:5px 0px;font-size:12px"><label><?=$noonshow?></label></div>

									<?php } else{ ?>
			 						<div style="color:#212121;opacity:0.3;font-weight:700;margin-top:100px;">No Film Added</div>
									<div class="col-xs-12" style="padding:5px 0px;font-size:12px"><label><?=$noonshow?></label></div>
								<?php } ?>
			 				</div>

						 </div>
					<?php } ?>

							<?php if($matineeshow !== 'no show'){ ?>
							 <div class="col-xs-3">
								 <label>Matinee Show</label>
								 <div class="col-xs-12 text-center" style="height: 250px;padding:0;background-color:#f8f8f8">
									 	<?php
										 $filmsbyshowtime = $functions->getFilmShowByTheaterScreenAndShowTime($theaterid,$screenid,'matineeshow');
										 if($filmsbyshowtime){
											 	$filmassignid = $filmsbyshowtime[0]['id'];
											 	$filmid = $filmsbyshowtime[0]['filmid'];
												$filmdata = $functions->SELECTFilmById($filmid);
												$poster = $filmdata[0]['poster'];
												$poster = '.'.$poster;
												$filmname = $filmdata[0]['name'];
												if(file_exists($poster)){ $poster = $poster; }
												else{ $poster = '../images/default-movie.png'; }
											 ?>
											 <img src="<?=$poster?>" alt="">
											 <div class="col-xs-12" style="padding:5px 0px"><label><?=$filmname?></label></div>
											 <div class="col-xs-12" style="padding:5px 0px;font-size:12px"><label><?=$matineeshow?></label></div>
										<?php } else{ ?>
				 						<div style="color:#212121;opacity:0.3;font-weight:700;margin-top:100px;">No Film Added</div>
										<div class="col-xs-12" style="padding:5px 0px;font-size:12px"><label><?=$matineeshow?></label></div>

									<?php } ?>
				 				</div>
							 </div>
						<?php } ?>

								<?php if($secondshow !== 'no show'){ ?>
								 <div class="col-xs-3">
									 <label>Second Show</label>
									 <div class="col-xs-12 text-center" style="height: 250px;padding:0;background-color:#f8f8f8">
										 	<?php
											 $filmsbyshowtime = $functions->getFilmShowByTheaterScreenAndShowTime($theaterid,$screenid,'secondshow');
											 if($filmsbyshowtime){
												 	$filmassignid = $filmsbyshowtime[0]['id'];
												 	$filmid = $filmsbyshowtime[0]['filmid'];
													$filmdata = $functions->SELECTFilmById($filmid);
													$poster = $filmdata[0]['poster'];
													$poster = '.'.$poster;
													$filmname = $filmdata[0]['name'];
													if(file_exists($poster)){ $poster = $poster; }
													else{ $poster = '../images/default-movie.png'; }
												 ?>
												 <img src="<?=$poster?>" alt="">
												 <div class="col-xs-12" style="padding:5px 0px"><label><?=$filmname?></label></div>
												 <div class="col-xs-12" style="padding:5px 0px;font-size:12px"><label><?=$secondshow?></label></div>
											<?php } else{ ?>
					 						<div style="color:#212121;opacity:0.3;font-weight:700;margin-top:100px;">No Film Added</div>
											<div class="col-xs-12" style="padding:5px 0px;font-size:12px"><label><?=$secondshow?></label></div>
										<?php } ?>
					 				</div>
								 </div>
							<?php } ?>



			</div>
			<?php } ?>

			<?php include './includes/footer.php'; ?>



		</div>
<?php } ?>
	</div>

<?php include './includes/footer.php'; ?>
