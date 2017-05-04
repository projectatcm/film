<?php
include './includes/header.php';
$screenno = $_GET['screenno'];
$show = $_GET['show'];
$filmassignid = $_GET['filmassignid'];
$theaterid = $id;
$allfilms = $functions->SELECTAllFilms();
?>

<div class="col-xs-12">

<?php foreach($allfilms as $films) {
		$filmid = $films['id'];
		$filmname = $films['name'];
		$filmposter = $films['poster'];
	 ?>
<div class="col-xs-3" style="padding-top:15px">
	<div class="col-xs-12" style="height:250px;background-color:#f8f8f8;padding:0">
		<img src="<?='.'.$filmposter?>" alt="">
	</div>
	<div class="col-xs-12 text-center" >
		<h5 style="font-weight:700"><?=$filmname?></h5>

		<h5 style="font-size:12px">
			<a href="#"
			class="viewMoreBtn"
			data-filmid="<?=$filmid?>"
			data-toggle="modal"
			data-target=".viewmoremodal">View More</a></h5>

		<h5 style="font-size:12px">
			<a href="#" class="assignmoviebtn"
				 data-filmid="<?=$filmid?>"
				 data-theaterid="<?=$theaterid?>"
				 data-screenno="<?=$screenno?>"
				 data-toggle="modal"
				 data-target=".assignmoviemodal">Assign Movie</a></h5>
	</div>
</div>
<?php } ?>


</div>

<?php include './includes/footer.php'; ?>

<!-- Modal -->
<div class="modal fade viewmoremodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius:0">
      <div class="modal-body ">
				<div class="row showFilmData">

				</div>
			</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade assignmoviemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
				<form class="" action="../actions.php?action=updateassignmovie" method="post">
					<input type="text" class="assignmoviefilmid" name="amfilmid" hidden>
					<input type="text" class="assignmovietheaterid" name="amtheaterid" hidden>
					<input type="text" class="assignmoviescreenno" name="amscreenno" hidden>
					<input type="text"  value="<?=$filmassignid?>" hidden name="filmassignid">
					<input type="text" class="assignmovieshow" name="amsshow" value="<?=$show?>" hidden>
      </div>
			<h4 class="text-center">Are You Sure</h4>
			<div style="padding-top:15px;padding-bottom:15px;" class="text-center">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Assign</button>
			</div>
			</form>
    </div>
  </div>
</div>
