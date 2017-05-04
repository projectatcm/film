<?php
include './includes/header.php';
$screen = $_GET['screen']
?>

<div class="col-xs-12">
	<div class="form-group">
		<label>No. of rows</label>
		<input id="rowsfield" type="number" min="4" max="7" class="form-control" name="rows" placeholder="No. of rows">
		<br>
		<label>No. of divisions</label>
		<input id="columnsfield" type="number" min="2" max="4" class="form-control" name="rows" placeholder="No. of rows">
		<br>
		<button type="button" name="button" class="btn btn-default addrowsbtn">Add Rows</button>
	</div>
</div>
<div class="col-xs-12">
	<form class="" action="../actions.php?action=addseats" method="post">
		<input type="text" name="screenno" value="<?=$screen?>" hidden>
			<input type="text" name="theaterid" value="<?=$loginid?>" hidden>
			<div class="seatsinrow">

			</div>
			<button type="submit" name="button addseatsbtn" style="">Add Seats</button>
	</form>
</div>

<?php include './includes/footer.php'; ?>
