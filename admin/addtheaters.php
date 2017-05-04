<?php include './includes/header.php'; ?>


<div class="col-sm-8 maincontainers">
	<form class="" action="../actions.php?action=addtheater" method="post" enctype="multipart/form-data">
		<div class="form-group ">
			<label>Theater Name</label>
			<input required class="form-control" type="" name="name" placeholder="Enter Theater Name">
		</div>
		<div class="form-group ">
			<label>Theater Image</label>
			<input required class="form-control " type="file" name="theaterimage" placeholder="Theater Image">
		</div>

		<div class="form-group ">
			<label>Address Line 1</label>
			<input required class="form-control" type="text" name="address1" placeholder="Address Line 1">
			<br>
			<input class="form-control" type="text" name="address2" placeholder="Address Line 2">
		</div>
		<div class="form-group ">
			<label>Location</label>
			<?php $common->loactionselector()?>
		</div>
		<div class="form-group ">
			<label>City</label>
			<input required class="form-control select_location" id="citylocation" readonly type="text" name="city" placeholder="District">
		</div>
		<div class="form-group ">
			<label>State</label>
			<input required class="form-control select_location" id="statelocation" readonly type="text" name="state" placeholder="State">
		</div>
		<div class="form-group ">
			<label>Country</label>
			<input required class="form-control select_location" id="countrylocation" readonly  type="text" name="country" placeholder="Country">
		</div>
		<div class="form-group ">
			<label>Contact Number</label>
			<input required class="form-control" type="text" name="contactnumber" placeholder="Contact Number">
		</div>
		<div class="form-group ">
			<label>Email Id (this will be the user id)</label>
			<input required class="form-control" type="email" name="email" placeholder="Email id">
		</div>
		<div class="form-group ">
			<label>Theater Proof</label>
			<input required class="form-control " type="file" name="proof" placeholder="Proof">
		</div>

		<div class="form-group ">
			<label>Number of screen</label>
			<input required class="form-control" type="number" min="1" max="10" name="screennumber" placeholder="Number of screens">
		</div>

<div class="form-group " hidden>
	<label>status</label>
	<input required class="form-control" type="text" min="1"  name="status" value="approved">
</div>

		<div class="form-group">
				<button type="submit" class= "btn btn-default" >Add Theater</button>
		</div>
	</form>
</div>



<?php include './includes/footer.php'; ?>
