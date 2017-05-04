<?php include './includes/header.php'; ?>
	<div class="col-sm-8 maincontainers">
		<form class="" action="../actions.php?action=changeadminpassword" method="post" enctype="multipart/form-data">
			<div class="form-group ">
					<label>Old Password</label>
					<input required class="form-control" type="password" name="oldpassword" placeholder="Enter Old Password">
			</div>
			<div class="form-group ">
					<label>New Password</label>
					<input required class="form-control" type="password" name="newpassword" placeholder="Enter New Password">
			</div>
			<div class="form-group ">
					<label>Re-enter new Password</label>
					<input required class="form-control" type="password" name="repassword" placeholder="Enter Category">
			</div>
			<div class="form-group">
				<button type="submit" class= "btn btn-default" >Change password</button>
			</div>
	  </form>
	</div>

<?php include './includes/footer.php'; ?>
