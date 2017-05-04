<?php
  include './includes/header.php';
  $allusers = $functions->selectAllUsers();
  $alltheaters = $functions->getallTheaters();
  $allfilms = $functions->selectAllFilms();
  $usercount = sizeof($allusers);
  $theatercount = sizeof($alltheaters);
  $filmcount = sizeof($allfilms);
  $bookingscount = '10';
?>

  <div class="col-sm-12 dashboardtilemaincontainer">

        <div class="col-sm-3">
      		<div class="col-sm-12 dashboardtiles" >
      			<div class="col-sm-8 dashboardtexts">
      				<div class="dashboardtotalnumber"><?=$usercount?></div>
      				<div class="dashboardtilehead text-captialize">Total users</div>
      			</div>
      			<div class="col-sm-4"><i class="fa fa-users pull-right dashboardtileicon"></i></div>
      		</div>
      	</div>


            <div class="col-sm-3">
          		<div class="col-sm-12 dashboardtiles" >
          			<div class="col-sm-8 dashboardtexts">
          				<div class="dashboardtotalnumber"><?=$theatercount?></div>
          				<div class="dashboardtilehead text-captialize">Total Theaters</div>
          			</div>
          			<div class="col-sm-4"><i class="fa fa-building-o pull-right dashboardtileicon"></i></div>
          		</div>
          	</div>


                <div class="col-sm-3">
              		<div class="col-sm-12 dashboardtiles" >
              			<div class="col-sm-8 dashboardtexts">
              				<div class="dashboardtotalnumber"><?=$filmcount?></div>
              				<div class="dashboardtilehead text-captialize">Total Films</div>
              			</div>
              			<div class="col-sm-4"><i class="fa fa-film pull-right dashboardtileicon"></i></div>
              		</div>
              	</div>


                    <div class="col-sm-3">
                  		<div class="col-sm-12 dashboardtiles" >
                  			<div class="col-sm-8 dashboardtexts">
                  				<div class="dashboardtotalnumber"><?=$bookingscount?></div>
                  				<div class="dashboardtilehead text-captialize">Total Bookings</div>
                  			</div>
                  			<div class="col-sm-4"><i class="fa fa-ticket pull-right dashboardtileicon"></i></div>
                  		</div>
                  	</div>

  </div>




<?php include './includes/footer.php'; ?>
