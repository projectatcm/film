<?php include './includes/header.php'; ?>

<div class="col-sm-8 maincontainers">
	<form class="" action="../actions.php?action=addlanguage" method="post" enctype="multipart/form-data">
		<div class="form-group ">
				<label>Languages</label>
				<input required class="form-control" type="text" name="languages" placeholder="Enter Language">
		</div>
		<div class="form-group">
			<button type="submit" class= "btn btn-default" >Add Language</button>
		</div>
  </form>
</div>

<table class="table table-bordered text-center">
	<tr style="font-weight:700">
		<td>#</td>
		<td>Language</td>
		<td>Operations</td>
	</tr>
	<?php
	$slno=1;
	$languages = $functions->allLanguages();
	foreach ($languages as $languages) {
		$id = $languages['id'];
		$language = $languages['language'];
	?>
	<tr>
		<td><?=$slno++?></td>
		<td><?=$language?></td>
		<td>
			<i class="fa fa-trash deletelanguagebtn" data-target=".deleteLanguageModal" data-toggle="modal" data-langiuageid="<?=$id?>"></i>
		</td>
	</tr>
	<?php
		}?>
</table>

<div class="modal fade deleteLanguageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content confirmationmodals">
			<div class="modal-body text-center">
				<h5 class="confirmationmodalstext">Do you really want to delete ?</h5>
				<div class="confirmationmodalsbuttoncontainer">
					<form class="" action="../actions.php?action=deletelanguage" method="post">
						<input type="text" name="delfor" value="languages" class="hidden">
						<input type="text" name="delid" class="dellangid hidden">
						<?php
						$url = $_SERVER['REQUEST_URI'];
						$url = explode('/', $url);
						$urllength = sizeof($url);
						$url = $url[$urllength-1];
						?>
						<input type="text" class="hidden" name="page" value="<?=$url?>">
						<button type='submit' class='btn modaldeletebtn'>Delete</button>
						<button type="button" class="btn btn-default modalcancelbtn" data-dismiss="modal">Cancel</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include './includes/footer.php'; ?>
