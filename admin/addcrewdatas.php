<?php
include './includes/header.php';
$crews = $functions->selectAllCrews();
?>

<div class="col-sm-8 maincontainers">
	<form class="" action="../actions.php?action=addcrew" method="post" enctype="multipart/form-data">
		<div class="form-group ">
				<label>Crew</label>
				<input required class="form-control" type="" name="crewname" placeholder="Enter crew name">
		</div>
		<div class="form-group">
		  <label for="">Crew Type</label>
			<select class="form-control" name="type" required>
				<option value="">Please Select crew Type</option>
				<option value="actor">Actor</option>
				<option value="actress">Actress</option>
				<option value="producers">Producers</option>
				<option value="directors">Directors</option>
			</select>
		</div>
		<div class="form-group ">
				<label>Image</label>
				<input required class="form-control" type="file" name="image" placeholder="">
		</div>
		<div class="form-group">
			<button type="submit" class= "btn btn-default" >Add Crew</button>
		</div>
  </form>
</div>

<div class="col-sm-12">

<?php
foreach ($crews as $crew) {
	$id = $crew['id'];
	$name = $crew['name'];
	$type = $crew['type'];
	$images = $crew['images'];
	$images = '.'.$images;
?>

	<div class="col-xs-3" style="padding-bottom:15px;">
		<div class="col-xs-12" style="border: 1px solid #ccc;padding:5px;">
			<img src="<?=$images?>" alt="cast images" style='width:100%;height:180px;' >
			<div class='text-capitalize' style='font-weight:700;font-size:14px;padding-top:10px;'>
				<?=$name?>
				<i class='fa fa-trash pull-right delcrewbtn' data-crewid="<?=$id?>" data-target=".deleteCrewModal" data-toggle="modal" style="margin-left:15px;"></i>
				<i class='fa fa-pencil pull-right editcrewbtn' data-crewid="<?=$id?>" data-crewname="<?=$name?>" data-crewimage="<?=$images?>" data-crewtype="<?=$type?>" data-target=".editCrew" data-toggle="modal" ></i>
			</div>
			<div class='text-capitalize' style='font-weight:400;font-size:12px;'><?=$type?></div>
		</div>
	</div>

<?php } ?>


</div>

<!-- delete modal -->
<div class="modal fade deleteCrewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content confirmationmodals">
			<div class="modal-body text-center">
				<h5 class="confirmationmodalstext">Do you really want to delete ?</h5>
				<div class="confirmationmodalsbuttoncontainer">
					<form class="" action="../actions.php?action=deletecrew" method="post">
						<input type="text" name="delfor" value="crew" class="hidden" >
						<input type="text" name="delid" class="delid hidden">
						<?php
						$url = $_SERVER['REQUEST_URI'];
						$url = explode('/', $url);
						$urllength = sizeof($url);
						$url = $url[$urllength-1];
						?>
						<input type="text" class="hidden" name="page" value="<?=$url?>">
						<button type='submit' class='btn modaldeletebtn'>Delete</button>
						<buttonn type="button" class="btn btn-default modalcancelbtn" data-dismiss="modal">Cancel</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- edit modal -->
<div class="modal fade editCrew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="confirmationmodalstext">Update crew data</h5>
      </div>
      <div class="modal-body">
				<form class="" action="../actions.php?action=updatecrew" method="post" enctype="multipart/form-data">
					<input  class="crewidmodal form-control hidden" type="text" name="crewid">
					<div class="form-group ">
							<label>Crew</label>
							<input required class="editcrewname form-control" type="" name="crewname">
					</div>
					<div class="form-group">
					  <label for="">Crew Type</label>
						<select class="form-control editcrewtype" name="type" required>
							<option value="">Please Select crew Type</option>
							<option value="actor">Actor</option>
							<option value="actress">Actress</option>
							<option value="producers">Producers</option>
							<option value="directors">Directors</option>
						</select>
					</div>
					<div class="form-group ">
							<label>Image</label>
							<input class="form-control" type="file"  name="crewimagemodal" placeholder="">
							<input type="text" name="editcrewimage" class="crewimagefield hidden">
					</div>
					<div class="form-group">
						<button type="submit" class= "btn btn-default" >Update Crew</button>
					</div>
			  </form>

    </div>
  </div>
</div>



<?php
include './includes/footer.php';
?>
