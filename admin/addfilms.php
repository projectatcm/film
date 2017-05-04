<?php
	include './includes/header.php';
	$languages = $functions->allLanguages();
	$castmembers = $functions->selectcasts();
	$director = $functions->crewByType('directors');
	$producers = $functions->crewByType('producers');
?>

<div class="col-sm-8 maincontainers">
	<form class="" action="../actions.php?action=addfilm" method="post" enctype="multipart/form-data">
		<div class="form-group ">
			<label>Film Name</label>
			<input required  class="form-control" type="" name="filmname" placeholder="">
		</div>
		<div class="form-group">
			<label>Languages</label>
			<div class="fielddivs">
				<select required  multiple class="form-control" name="languages[]" >
					<?php
					foreach ($languages as $language) {
						$id  = $language['id'];
						$languages = $language['language'];
					?>
					<option value="<?=$id?>" ><?=$languages?></option>
					<?php }?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label>Select cast in the film </label>
			<div class="fielddivs">
				<select required  multiple class="form-control" name="actors[]">
					<?php
					foreach ($castmembers as $cast) {
						$id  = $cast['id'];
						$name  = $cast['name'];
						// uppercase conversion
						$name  = ucwords($name);
						$images = $cast['images'];
					?>
					<option value="<?=$id?>" ><?=$name?></option>
					<?php }?>
				</select>
			</div>
		</div>
		<div class="form-group">
					<label>Select director of the film </label>
					<div class="fielddivs">
						<select required  multiple class="form-control" name="directors[]">
							<?php
							foreach ($director as $director) {
								$id  = $director['id'];
								$name  = $director['name'];
								// uppercase conversion
								$name  = ucwords($name);
								$images = $director['images'];
							?>
							<option value="<?=$id?>" ><?=$name?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="form-group">
						<label>Select producers of the film </label>
								<div class="fielddivs">
									<select required  multiple class="form-control" name="producers[]">
										<?php
											foreach ($producers as $producer) {
												$id  = $producer['id'];
												$name  = $producer['name'];
												// uppercase conversion
												$name  = ucwords($name);
												$images = $producer['images'];
											?>
											<option value="<?=$id?>" ><?=$name?></option>
											<?php }?>
										</select>
									</div>
					</div>
					<div class="form-group ">
							<label>Film Poster</label>
							<input required  class="form-control" type="file" name="poster" placeholder="">
					</div>
					<div class="form-group ">
							<label>Release Date</label>
							<input required  class="form-control" type="date" name="releasedate" >
					</div>
					<div class="form-group">
							<button type="submit" class= "btn btn-default" >Add Film</button>
					</div>
	</form>
</div>



</div>

<?php include './includes/footer.php'; ?>
