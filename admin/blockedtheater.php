<?php
	include './includes/header.php';
	$alltheaters = $functions->theatersByStatus('blocked');
	$pageinationresult = $functions->pagenations($alltheaters,'theaters',6,'blocked');
	$total_page_no = $pageinationresult[0];
	$pagenatedoutput = $pageinationresult[1];
	$totalcards = sizeof($pagenatedoutput);
	if (empty($pagenatedoutput)) {
?>
	<h3 class="notfoundtext text-center"> No data found </h3>
<?php }else { ?>
<h4 class="page-header" style="font-weight:600">Blocked Theaters</h4>
<?php
foreach ($alltheaters as $theaters)  {
		$id = $theaters['id'];
		$name = $theaters['name'];
		$email = $theaters['email'];
		$password = $theaters['password'];
		$contact = $theaters['contact'];
		$address = $theaters['address'];
		if(strlen($address) >= 50 ){
		$newaddress = substr($address, 0, 30);
		$newaddress = $newaddress.'...';
	}
	else{ $newaddress = $address;}
		$location = $theaters['location'];
		if(strlen($location) >= 50 ){
		$newlocation = substr($newlocation, 0, 50);
		$newlocation = $newlocation.'...';
	}
	else{ $newlocation = $location;}
		$city = $theaters['city'];
		$state = $theaters['state'];
		$country = $theaters['country'];
		$fulladdress = $address.' , '. $city.' , '.$state.' , '. $country;
		$latitude = $theaters['latitude'];
		$longitude =$theaters['longitude'];
		$proof = $theaters['proof'];
		$proof = '.'.$proof;
		$buildingimage = $theaters['buildingimage'];
		$buildingimage = '.'.$buildingimage;
		$screennumber = $theaters['no_of_screens'];
		$status = $theaters['status'];
?>

<div class="col-xs-6 alltheatercardcontainer  text-capitalize">
	<div class="col-xs-12 nopadding">

		<div class="col-xs-5 nopadding theaterimagecontainer">
			<img src="<?=$buildingimage?>" class='imgfullsize'>
		</div>

		<div class="col-xs-7	 theaterdatacontainer">

				<div class="col-xs-12 nopadding theaterdatadiv">
						<div class="col-xs-5 ">Name <span class="pull-right">:</span></div>
						<div class="col-xs-7 nopadding"><?=$name?></div>
				</div>

				<div class="col-xs-12 nopadding theaterdatadiv">
							<div class="col-xs-5">email<span class="pull-right">:</span></div>
							<div class="col-xs-7 nopadding"><?=$email?></div>
				</div>

				<div class="col-xs-12 nopadding theaterdatadiv">
						<div class="col-xs-5">contact<span class="pull-right">:</span></div>
						<div class="col-xs-7 nopadding"><?=$contact?></div>
				</div>

			  <div class="col-xs-12 nopadding theaterdatadiv">
					<div class="col-xs-5">address<span class="pull-right">:</span></div>
					<div class="col-xs-7 nopadding" ><?=$newaddress?><span class="atagstyle viewfulladdress" data-toggle="modal" data-target=".viewfulladdressmodal" data-fulladdress="<?=$fulladdress?>"  style="font-size:12px;font-weight:400">
					view full address</span></div>
				</div>

				<div class="col-xs-12 nopadding theaterdatadiv">
					<div class="col-xs-5">Location <span class="pull-right">:</span></div>
					<div class="col-xs-7 nopadding"><?=$newlocation?>	</div>
				</div>

				<div class="col-xs-12 nopadding theaterdatadiv">
					<div class="col-xs-5"></div>
					<div class="col-xs-7 nopadding atagstyle viewinmap" style="font-size:12px;font-weight:400" data-mapurl="https://maps.google.com/maps?q=<?=$latitude?>,<?=$longitude?>&hl=es;z=14&amp;output=embed"  data-toggle="modal" data-target=".viewtheaterinmap">View location in map</div>
				</div>

				<div class="col-xs-12 nopadding theaterdatadiv">
					<div class="col-xs-5"> proof <span class="pull-right">:</span></div>
					<div class="col-xs-7 nopadding atagstyle viewproof" data-proofurl="<?=$proof?>"  data-toggle="modal" data-target=".viewtheaterproof">View theater proof</div>
				</div>

				<div class="col-xs-12 nopadding theaterdatadiv">
						<div class="col-xs-5">Screen<span class="pull-right">:</span></div>
						<div class="col-xs-7 nopadding"><?=$screennumber?></div>
				</div>

				<div class="col-xs-12 nopadding theaterdatadiv">
						<div class="col-xs-5"> Status <span class="pull-right">:</span></div>
						<div class="col-xs-7 nopadding
						<?php if($status === 'approved') {echo 'text-success';}elseif ($status === 'blocked') {echo 'text-danger';} else{echo 'text-warning';}?>
						"><?=$status?></div>
				</div>

				<div class="col-xs-12 nopadding theateroperationcontainer">
						<div class="col-xs-12 text-right theateroperationdiv">
								<?php if($status === 'approved') {?>
								<i class="fa fa-ban theateroperations blockbtn" data-toggle="modal" data-target=".blocktheatermodal" data-blockid=<?=$id?>></i>
								<?php }?>
								<?php if($status === 'blocked' || $status === 'pending') {?>
								<i class="fa fa-check theateroperations approvetheaterbtn" data-toggle="modal" data-target=".approvetheatermodal" data-blockid=<?=$id?>></i>
								<?php }?>

								<i class="fa fa-pencil theateroperations edittheater"  data-toggle="modal" data-target=".edittheatermodal" data-editid=<?=$id?>></i>
								<i class="fa fa-trash theateroperations deletetheaterbtn"  data-toggle="modal" data-target=".deletetheatermodal" data-deleteid=<?=$id?>></i>
						</div>
				</div>
			</div>
		</div>
</div>

<?php } } if($totalcards > 6){
	$functions->pageinationPages($total_page_no);
}
?>

<!-- map modal -->
<div class="modal fade viewtheaterinmap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content confirmationmodals">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="confirmationmodalstext">Location in map</h5>
      </div>
      <div class="modal-body nopadding">
				<iframe class="mapmodal" src="" height="450" frameborder="0" style="width:100%" allowfullscreen></iframe>      </div>
        <button style="margin-bottom:5px;margin-left:15px" type="button" class="btn btn-default modalcancelbtn" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- proof modal -->
<div class="modal fade viewtheaterproof" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content confirmationmodals">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="confirmationmodalstext">Theater Name Proof</h5>
    </div>
      <div class="modal-body">
				<img src="" class="img-responsive theaterproofimage" alt="">
      </div>
    </div>
  </div>
</div>
<!-- approve modal -->
<div class="modal fade approvetheatermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content confirmationmodals">
      <div class="modal-body text-center">
				<h5 class="confirmationmodalstext">Do you really want to approve ?</h5>
				<div class="confirmationmodalsbuttoncontainer">
					<form class="" action="../actions.php?action=approvetheater" method="post">
						<input type="text" name="approvefor" value="theaters" class="hidden">
						<input type="text" name="approveid" class="approveidfield hidden">
						<?php
						$url = $_SERVER['REQUEST_URI'];
						$url = explode('/', $url);
						$urllength = sizeof($url);
						$url = $url[$urllength-1];
						?>
						<input type="text" class="hidden" name="page" value="<?=$url?>">
						<button type='submit' class='btn modalapprovebtn'>Approve</button>
						<buttonn type="button" class="btn btn-default modalcancelbtn" data-dismiss="modal">Cancel</button>
					</form>
				</div>
      </div>
    </div>
  </div>
</div>
<!-- block modal -->
<div class="modal fade blocktheatermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content confirmationmodals">
      <div class="modal-body text-center">
				<h5 class="confirmationmodalstext">Do you really want to block ?</h5>
				<div class="confirmationmodalsbuttoncontainer">
					<form class="" action="../actions.php?action=blocktheater" method="post">
						<input type="text" name="blockfor" value="theaters" class="hidden">
						<input type="text" name="blockid" class="blockingid hidden">
						<?php
						$url = $_SERVER['REQUEST_URI'];
						$url = explode('/', $url);
						$urllength = sizeof($url);
						$url = $url[$urllength-1];
						?>
						<input type="text" class="hidden" name="page" value="<?=$url?>">
						<button type='submit' class='btn modalblockbtn'>Block</button>
						<buttonn type="button" class="btn btn-default modalcancelbtn" data-dismiss="modal">Cancel</button>
					</form>
				</div>
      </div>
    </div>
  </div>
</div>
<!-- delete modal -->
<div class="modal fade deletetheatermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content confirmationmodals">
			<div class="modal-body text-center">
				<h5 class="confirmationmodalstext">Do you really want to delete ?</h5>
				<div class="confirmationmodalsbuttoncontainer">
					<form class="" action="../actions.php?action=deletetheater" method="post">
						<input type="text" name="delfor" value="theaters" class="hidden">
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
<div class="modal fade edittheatermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="confirmationmodalstext">Update <=THeater Name=> data</h5>
      </div>
      <div class="modal-body">
				<form class="" action="../actions.php?action=updatetheater" method="post" enctype="multipart/form-data">
						<?php
						$url = $_SERVER['REQUEST_URI'];
						$url = explode('/', $url);
						$urllength = sizeof($url);
						$url = $url[$urllength-1];
						?>
						<input type="text" class="hidden" name="page" value="<?=$url?>">

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
						<input required min="1" max="10"  class="form-control" type="number" name="screennumber" placeholder="Number of screens">
					</div>
      </div>
      <div class="modal-footer">
				<button type='submit' class='btn modelupdatebtn'>Update</button>
				<buttonn type="button" class="btn btn-default modalcancelbtn" data-dismiss="modal">Cancel</button>
      </div>
		</form>
    </div>
  </div>
</div>
<!-- full address modal -->
<div class="modal fade viewfulladdressmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content confirmationmodals">
      <div class="modal-body ">
				<h5 class=" fulladdressmodal" style="font-size: 13px;font-weight: 500;line-height:21px;"></h5>
	    </div>
    </div>
  </div>
</div>


<?php include './includes/footer.php'; ?>
