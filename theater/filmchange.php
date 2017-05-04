<?php
include './includes/header.php';
$screenid = $_GET['screen'];
$theaterid = $id;
$showtimes = $functions->getShowTimesByTheaterAndScreenId($theaterid,$screenid);?>
<script type="text/javascript">
<?php  if(empty($showtimes)){ ?>
		$(document).ready(function(){
					$('.addShowTimes').modal({
							backdrop: 'static',
							keyboard: false
					});
						$('.addShowTimes').modal('show');
				});
	<?php } ?>
</script>
<div class="modal fade addShowTimes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body" style="padding: 25px;">
				<form action="../actions.php?action=addShowTime" method="post">
					<input type="text" name="theaterid" value="<?=$theaterid?>" hidden>
					<input type="text" name="screen" value="<?=$screenid?>" hidden>
					<div class="row">

						<div class="form-group">
							<div class="col-xs-12">
								<label>First Show</label>
							</div>
							<div class="col-xs-4">
								<input name="firstshow_hour" type="number" placeholder="Hours" max="12" min="1" class="form-control">
							</div>
							<div class="col-xs-4">
								<input name="firstshow_minutes"  type="number" placeholder="Minutes" max="59" min="00" class="form-control">
							</div>
							<div class="col-xs-4">
								<input type="text" readonly class="form-control" name="first_show_time_period" value="AM">
							</div>
						</div>

						<br><br><br>
						<div class="form-group">
							<div class="col-xs-12">
								<label>Noon Show</label>
							</div>
							<div class="col-xs-4">
								<input name="nonshow_hour" type="number" placeholder="Hours" max="12" min="1" class="form-control">
							</div>
							<div class="col-xs-4">
								<input name="noonshow_minutes"  type="number" placeholder="Minutes" max="59" min="00" class="form-control">
							</div>
							<div class="col-xs-4">
								<select class="form-control" name="noon_show_time_period">
									<option value="am">AM</option>
									<option value="pm">PM</option>
								</select>
							</div>
						</div>

						<br><br><br>
						<div class="form-group">
							<div class="col-xs-12">
								<label>Matinee Show</label>
							</div>
							<div class="col-xs-4">
								<input name="matineeshow_hour" type="number" placeholder="Hours" max="12" min="1" class="form-control">
							</div>
							<div class="col-xs-4">
								<input name="matineehow_minutes"  type="number" placeholder="Minutes" max="59" min="00" class="form-control">
							</div>
							<div class="col-xs-4">
								<input type="text" readonly class="form-control" name="matinee_show_time_period" value="PM">
							</div>
						</div>

						<br><br><br>
						<div class="form-group">
							<div class="col-xs-12">
								<label>Second Show</label>
							</div>
							<div class="col-xs-4">
								<input name="secondshow_hour" type="number" placeholder="Hours" max="12" min="1" class="form-control">
							</div>
							<div class="col-xs-4">
								<input name="secondshow_minutes"  type="number" placeholder="Minutes" max="59" min="00" class="form-control">
							</div>
							<div class="col-xs-4">
								<input type="text" readonly class="form-control" name="second_show_time_period" value="PM">
							</div>
						</div>

						<div class="col-xs-12" style="padding-top:15px">
							<button type="submit" class="btn btn-default" name="button">Add Show Time</button>
						</div>

						</div>
				</form>
			</div>
		</div>
	</div>
</div>

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
							 <div class="col-xs-12" style="padding:0px">
								 <a href="changemovie.php?show=firstshow&screenno=<?=$screenid?>&filmassignid=<?=$filmassignid?>">
									 <button type="button" style="padding:2px 5px;outline:none" class="btn btn-default" name="button">Change Movie</button>
								 </a>
							 </div>
						<?php } else{ ?>
 						<div style="color:#212121;opacity:0.3;font-weight:700;margin-top:100px;">No Film Added</div>
						<div class="col-xs-12" style="padding:5px 0px;font-size:12px"><label><?=$firstshow?></label></div>
						<div class="col-xs-12" style="padding:0px">
							<a href="addmovie.php?show=firstshow&screenno=<?=$screenid?>">
								<button  type="button" style="padding:2px 5px;outline:none" class="btn btn-default" name="button">Add Movie</button>
							</a>
						</div>

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
							 <div class="col-xs-12" style="padding:0px">
								 <a href="changemovie.php?show=noonshow&screenno=<?=$screenid?>&filmassignid=<?=$filmassignid?>">
									 <button type="button" style="padding:2px 5px;outline:none" class="btn btn-default" name="button">Change Movie</button>
								 </a>
						 </div>
						<?php } else{ ?>
 						<div style="color:#212121;opacity:0.3;font-weight:700;margin-top:100px;">No Film Added</div>
						<div class="col-xs-12" style="padding:5px 0px;font-size:12px"><label><?=$noonshow?></label></div>
						<div class="col-xs-12" style="padding:0px">
							<a href="addmovie.php?show=noonshow&screenno=<?=$screenid?>">
								<button type="button" style="padding:2px 5px;outline:none" class="btn btn-default" name="button">Add Movie</button>
							</a>
						</div>
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
								 <div class="col-xs-12" style="padding:0px">
									 <a href="changemovie.php?show=matineeshow&screenno=<?=$screenid?>&filmassignid=<?=$filmassignid?>">
										 <button type="button" style="padding:2px 5px;outline:none" class="btn btn-default" name="button">Change Movie</button>
									 </a>
									 </div>
							<?php } else{ ?>
	 						<div style="color:#212121;opacity:0.3;font-weight:700;margin-top:100px;">No Film Added</div>
							<div class="col-xs-12" style="padding:5px 0px;font-size:12px"><label><?=$matineeshow?></label></div>
							<div class="col-xs-12" style="padding:0px">
								<a href="addmovie.php?show=matineeshow&screenno=<?=$screenid?>">
									<button type="button" style="padding:2px 5px;outline:none" class="btn btn-default" name="button">Add Movie</button>
								</a>
						</div>
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
									 <div class="col-xs-12" style="padding:0px">
										 <a href="changemovie.php?show=secondshow&screenno=<?=$screenid?>&filmassignid=<?=$filmassignid?>">
											 <button type="button" style="padding:2px 5px;outline:none" class="btn btn-default" name="button">Change Movie</button>
										 </a>
									 </div>
								<?php } else{ ?>
		 						<div style="color:#212121;opacity:0.3;font-weight:700;margin-top:100px;">No Film Added</div>
								<div class="col-xs-12" style="padding:5px 0px;font-size:12px"><label><?=$secondshow?></label></div>
								<div class="col-xs-12" style="padding:0px">
									<a href="addmovie.php?show=secondshow&screenno=<?=$screenid?>">
										<button type="button" style="padding:2px 5px;outline:none" class="btn btn-default" name="button">Add Movie</button>
									</a>
								</div>
							<?php } ?>
		 				</div>
					 </div>
				<?php } ?>



</div>
<?php } ?>

<?php include './includes/footer.php'; ?>
