<?php include './includes/header.php'; ?>

<div class="col-sm-8 maincontainers">
	<form class="" action="../actions.php?action=addcategory" method="post" enctype="multipart/form-data">
		<div class="form-group ">
				<label>Category</label>
				<input required class="form-control" type="text" name="category" placeholder="Enter Category">
		</div>
		<div class="form-group">
			<button type="submit" class= "btn btn-default" >Add Category</button>
		</div>
  </form>
</div>

<table class="table table-bordered text-center">
	<tr style="font-weight:700">
		<td>#</td>
		<td>Category</td>
		<td>Operations</td>
	</tr>
	<?php
	$slno=1;
	$category = $functions->allcategory();
	foreach ($category as $categories) {
		$id = $categories['id'];
		$category = $categories['category'];
	?>
	<tr>
		<td><?=$slno++?></td>
		<td><?=$category?></td>
		<td>
			<i class="fa fa-trash deleteCategoryBtn" data-target=".deleteCategorymodal" data-toggle="modal" data-catid="<?=$id?>"></i>
		</td>
	</tr>
	<?php
		}?>
</table>

<div class="modal fade deleteCategorymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content confirmationmodals">
			<div class="modal-body text-center">
				<h5 class="confirmationmodalstext">Do you really want to delete ?</h5>
				<div class="confirmationmodalsbuttoncontainer">
					<form class="" action="../actions.php?action=deletelanguage" method="post">
						<input type="text" name="delfor" value="category" class="hidden">
						<input type="text" name="delid" class="delcatid hidden">
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
