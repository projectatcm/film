<?php
include './libs/Functions.php';
$functions = new Functions();
$type = $_POST['type'];


### Assign / Associate seats for theaters
if($type === 'assignseatfortheater') {
	$theaterid = $_POST['theaterid'];
	$seatid = $_POST['seatid'];
	$theatercheck = $functions->checktheaterintheaterseatstable($theaterid);
	if(empty($theatercheck)){
			$fieldid = $functions->addtheatertotheaterseattable($theaterid);
			$datas   = $seatid;
		 }
	else{
		$fieldid = $theatercheck[0]['id'];
		$datas	 = $theatercheck[0]['seats'];
	}
	$datas 	 = explode('~', $datas);
	$datas[] = $seatid;
	$datas   = implode('~', $datas);
	$assign = $functions->assignseatfortheater($fieldid,$datas);
	if($assign){
		print_r("data submitted");
	}else{
		print_r("failed");
	}
}


### Dissociateseats from theater
if($type === 'dissociateseatfromtheater') {
	$seatid = $_POST['seatid'];
	$theaterid = $_POST['theaterid'];
	$theatercheck = $functions->checktheaterintheaterseatstable($theaterid);
	$fieldid = $theatercheck[0]['id'];
	$datas	 = $theatercheck[0]['seats'];
	$finaldata = $functions->find($seatid,$datas);
	$assign = $functions->assignseatfortheater($fieldid,$finaldata);
}


### Deleting datas in a row with deletion of rows
if($type === 'deletedatawithrows') {
	$rowno = $_POST['rowno'];
	$theaterid = $_POST['theaterid'];
	$theatercheck = $functions->checktheaterintheaterseatstable($theaterid);
	$fieldid = $theatercheck[0]['id'];
	$datas	 = $theatercheck[0]['seats'];
	$split_data = explode('~',$datas);
	$new_split_data = explode('~',$datas);
	for($arraysize=1;$arraysize<sizeof($new_split_data);$arraysize++){
		$split_data_exploded = explode('_', $new_split_data[$arraysize]);
		$split_data_exploded=$split_data_exploded[0];
		if($split_data_exploded == $rowno){
			unset($split_data[$arraysize]);
			$string = implode("~", $split_data);
	}else{
		
	}
}

}
