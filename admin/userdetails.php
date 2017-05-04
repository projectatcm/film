<?php include './includes/header.php'; ?>

<h4 class="page-header" style="font-weight:600">All Users</h4>

<table class="table table-bordered text-center">
	<tr style="font-weight:700">
		<td>#</td>
		<td class="text-capitalize">name</td>
		<td class="text-capitalize">phone</td>
		<td class="text-capitalize">email</td>
		<td class="text-capitalize">password</td>
		<td class="text-capitalize">status</td>
		<td class="text-capitalize">profile image</td>
		<td class="text-capitalize">Operations</td>
	</tr>
	<?php
	$slno=1;
	$allusers = $functions->selectAllUsers();
	foreach ($allusers as $user) {
		$id = $user['id'];
		$name = $user['name'];
		$phone = $user['phone'];
		$email = $user['email'];
		$password = $user['password'];
		$profileimage = $user['profileimage'];
		$status = $user['status'];
	?>
	<tr>
		<td><?=$slno++?></td>
		<td><?=$name?></td>
		<td><?=$phone?></td>
		<td><?=$email?></td>
		<td><?=$password?></td>
		<td><?=$status?></td>
		<td class="text-capitalize">
			<div class="col-xs-12 nopadding atagstyle viewuserpic" data-userpic="<?=$profileimage?>"  data-toggle="modal" data-target=".viewuserimage">View user image</div>
		</td>
		<td>
			<i class="fa fa-trash deleteUserBtn" data-target=".deleteUserModal" data-toggle="modal" data-catid="<?=$id?>"></i>
			<?php
			if($status === 'blocked') {
					$icon = 'fa-check';
					$newstatus = 'approved';
			}else{
				$icon = 'fa-ban';
				$newstatus = 'blocked';
			} ?>
			<i class="fa <?=$icon?> statusBtn theateroperations " style="padding-left:20px;" data-target=".statusModal" data-input='<?=$newstatus?>' data-toggle="modal" data-uid="<?=$id?>"></i>
		</td>
	</tr>
	<?php
		}?>
</table>

<!-- delete modal -->
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

<!-- profile image modal -->
<div class="modal fade viewuserimage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content confirmationmodals">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="confirmationmodalstext">User Image</h5>
    </div>
      <div class="modal-body">
				<img src="" class="img-responsive userprofilepic" alt="">
      </div>
    </div>
  </div>
</div>
<!-- status modal -->
<div class="modal fade statusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content confirmationmodals">
      <div class="modal-body text-center">
				<h5 class="confirmationmodalstext">Do you want to change the status ?</h5>
				<div class="confirmationmodalsbuttoncontainer">
					<form class="" action="../actions.php?action=changeuserstatus" method="post">
						<input type="text" name="table" value="users" class="hidden">
						<input type="text" name="id" class="userid_status hidden">
						<input type="text" name="status" class="newstatusfield hidden">
						<?php
						$url = $_SERVER['REQUEST_URI'];
						$url = explode('/', $url);
						$urllength = sizeof($url);
						$url = $url[$urllength-1];
						?>
						<input type="text" class="hidden" name="page" value="<?=$url?>">
						<button type='submit' class='btn modalblockbtn'>Confirm</button>
						<buttonn type="button" class="btn btn-default modalcancelbtn" data-dismiss="modal">Cancel</button>
					</form>
				</div>
      </div>
    </div>
  </div>
</div>


<?php include './includes/footer.php'; ?>
