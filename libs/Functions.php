<?php

require_once ('DbConnection.php');

class Functions extends DbConnection {


public function assignseatfortheater($fieldid,$datas){
  $query  = "UPDATE theaterseats SET seats = '$datas' WHERE id = '$fieldid'" ;
	$output = $this->setData($query);
	return $output;
}



public function find($key,$string){
		//$string = "1~2~3~";
		$split_array = explode("~", $string);
		$array_key = array_search($key, $split_array);
		if($array_key){
			echo "found";
			unset($split_array[$array_key]);
			$split_array = array_filter($split_array);
    	$string = implode("~", $split_array);
      print_r($string);
      exit();
      return $string;
		}
    else{	return FALSE; }
	}



public function checktheaterintheaterseatstable($theaterid){
  $query = "SELECT * FROM theaterseats WHERE theaterid='$theaterid'";
  return $this->getData($query);
}
public function addtheatertotheaterseattable($theaterid){
  $query = "INSERT INTO theaterseats SET theaterid='$theaterid'";
  return $this->setDataAndReturnLastInsertId($query);
}

public function getShowTimesByTheaterAndScreenId($theater,$screenid){
  $query = "SELECT * FROM show_times WHERE theater_id='$theater' AND screen_no='$screenid'";
  return $this->getData($query);
}

public function addSeats($theaterid,$screenno,$row,$cols,$seats){
  $query = "INSERT INTO seats SET theaterid='$theaterid', screenno='$screenno', rows='$row', cols='$cols', seats='$seats'";
  $output = $this->setData($query);
  return $output;
}


public function addShowTimes($ftime,$ntime,$mtime,$stime,$theaterid,$screenid){
  $query = "INSERT INTO show_times SET theater_id='$theaterid', screen_no='$screenid', firstshowtime='$ftime',noonshowtime='$ntime',matineeshowtime='$mtime',secondshowtime='$stime'";
  $output = $this->setData($query);
  return $output;
}

public function getFilmShowByTheaterScreenAndShowTime($theaterid,$screenid,$showtime){
  $query = "SELECT * FROM theaterfilms WHERE theaterid='$theaterid' AND screenid='$screenid' AND showtime='$showtime'";
  return $this->getData($query);
}

/** Common functions **/

public function emailCheck($email) {
    $useremailcheck = $this->selectUserByEmail($email);
    if($useremailcheck) {
    			return FALSE;
    }else{
        $theateremailcheck = $this->selectTheaterDataByEmail($email);
        if($theateremailcheck){
        			return FALSE;
        }else{
          			return TRUE;
        }
    }
}

public function userLogin($email,$password) {
	$user = $this->userlogincheck($email, $password);
	if($user) {
			$type = 'users';
			$userid = $user[0]['id'];
			return array($userid,$type);
		}
		else {
				$theater = $this->theaterlogincheck($email, $password);
				if($theater) {
						$type = 'theater';
						$userid = $theater[0]['id'];
						return array($userid,$type);
					}
					else {
							$admin = $this->adminlogincheck($email,$password);
							if($admin) {
									$type = 'admin';
									$userid = $admin[0]['id'];
									return array($userid,$type);
								}
								else {
											return FALSE;
									}
						  }
				  }
	    }


public function userlogincheck($email,$password) {
	$query = "SELECT * FROM users WHERE email='$email' AND password= '$password'";
	$output = $this->getData($query);
	return $output;
}

public function theaterlogincheck($email,$password) {
	$query = "SELECT * FROM theaters WHERE email='$email' AND password= '$password'";
	$output = $this->getData($query);
	return $output;
}


public function adminlogincheck($username,$password) {
	$query = "SELECT * FROM admin WHERE username='$username' AND password= '$password'";
	$output = $this->getData($query);
	return $output;
}

public function adminOldPassCheck($password) {
	$query = "SELECT * FROM admin WHERE password='$password'";
	$output = $this->getData($query);
	return $output;
}

public function changePassword($id,$table,$new){
	$query  = "UPDATE $table SET password = '$new' WHERE id = '$id'" ;
	$output = $this->setData($query);
	return $output;
}

public function changeStatus($id,$table,$status) {
	$query  = "UPDATE $table SET status = '$status' WHERE id = $id" ;
	$output = $this->setData($query);
	return $output;
}

public function delete($table,$id) {
		$query = "DELETE FROM $table WHERE id=$id";
		$output = $this->setData($query);
		return $output;
}

public function block($table,$id) {
	$query  = "UPDATE $table SET status = 'blocked' WHERE id = $id" ;
	$output = $this->setData($query);
	return $output;
}

public function approve($table,$id) {
	$query  = "UPDATE $table SET status = 'approved' WHERE id = $id" ;
	$output = $this->setData($query);
	return $output;
}

public function selectallwithstatus($table,$status,$limitstart,$limitend) {
	if($status === '') { $query = "SELECT * FROM $table order by id desc LIMIT $limitstart,$limitend "; }
	else {$query = "SELECT * FROM $table WHERE status='$status' order by id desc LIMIT $limitstart,$limitend "; }
  return $this->getData($query);
}

public function pagenations($SELECTedfunction,$table,$pagelimit,$status='') {
	$count = count($SELECTedfunction);
	$pagelimit = $pagelimit;
	$total_page_no = ceil($count / $pagelimit);
	if(!isset($_GET['page'])) { $page = 1; }
	else { $page = $_GET['page']; }
	$limitstart = (($page-1)*$pagelimit);
	$pagenatedoutput = $this->SELECTallwithstatus($table,$status,$limitstart,$pagelimit,$status);
	$returnvalues = array($total_page_no,$pagenatedoutput);
	return $returnvalues;
}

public function pageinationPages($total_page_no){?>
	<div class="col-xs-12 text-center">
		<ul class="pagination">
			<?php for($i=1;$i<=$total_page_no;$i++) { ?>
			<li><a href="?page=<?=$i?>"><?=$i?></a></li>
			<?php }?>
		</ul>
	</div>
<?php
}

/** Common functions  Ends**/

/** location services **/
public function getLatitudeAndLongitude() {
	$lat_request = $_REQUEST['latitude'];
	$long_request = $_REQUEST['longitude'];
	if (empty($lat_request)) {
		echo "empty latitude &nbsp;&nbsp;";
	}if(empty($long_request)) {
		echo "empty longitude";
	}
	if ($lat_request && $long_request) {
		$geocodes['latitude'] = $_GET['latitude'];
		$geocodes['longitude'] = $_GET['longitude'];
		return $geocodes;
	}
}


/** location services ends**/

/** Languages **/
	public function allLanguages() {
		$query = "SELECT * FROM languages";
		$output  = $this->getData($query);
		return $output;
	}

	public function addLanguages($language) {
		$query = "Insert into languages set language = '$language'";
		$output = $this->setData($query);
		return $output;
	}
	/** Languages end**/


	/** category **/
		public function allcategory() {
			$query = "SELECT * FROM category";
			$output  = $this->getData($query);
			return $output;
		}

		public function addCategory($category) {
			$query = "Insert into category set category = '$category'";
			$output = $this->setData($query);
			return $output;
		}
		/** category end**/


	/** Cast type **/
	public function crewByType($type) {
		$query = "SELECT * FROM crew WHERE type = '$type' ";
		$output  = $this->getData($query);
		return $output;
	}
	public function selectcasts() {
		$query = "SELECT * FROM crew WHERE type = 'actor' OR type = 'actress' ";
		$output  = $this->getData($query);
		return $output;
	}

public function selectcastbyid($id) {
	$query = "SELECT * FROM crew WHERE id='$id'";
	$output = $this->getData($query);
	return $output;
}

public function assignMovieToTheater($filmid,$theaterid,$screenno,$showtime){
  $query = "insert into theaterfilms set theaterid='$theaterid', screenid ='$screenno', showtime = '$showtime',filmid='$filmid'";
	$output = $this->setData($query);
	return $output;
}

public function updateAssignMovieToTheater($filmid,$filmassignid){
  $query  = "UPDATE theaterfilms SET filmid = '$filmid' WHERE id = $filmassignid" ;
	$output = $this->setData($query);
	return $output;
}

	/** Cast type end**/

/** crew members **/
public function insertcrewdata($name,$type,$imagepath) {
	$query = "insert into crew set name='$name', type ='$type', images = '$imagepath'";
	$output = $this->setData($query);
	return $output;
}
public function selectAllCrews() {
	$query = "SELECT * FROM crew order by id DESC";
	$output  = $this->getData($query);
	return $output;
}
public function UpdateCrewData($id,$name,$type,$imagepath) {
	$query  = "UPDATE crew SET name = '$name', type='$type', images = '$imagepath' WHERE id = $id" ;
	$output = $this->setData($query);
	return $output;
}
/** crew members end**/

/** Theater Datas**/
public function inserttheaterdata($name,$email,$password,$contactnumber,$address,$location,$city,$state,$country,$latitude,$longitude,$proofpath,$buildingimagepath,$screennumber,$status,$mailverification,$random_hash) {
	$query = "insert into theaters set name='$name', email='$email', password='$password', contact='$contactnumber', address='$address', location= '$location', city = '$city', state='$state', country='$country', latitude='$latitude',longitude='$longitude', proof='$proofpath', buildingimage='$buildingimagepath', no_of_screens='$screennumber',status='$status',mailverification='$mailverification'" ;
	$output = $this->setData($query);
	return $output;
}

public function getallTheaters() {
	$query = "SELECT * FROM theaters";
	$output = $this->getData($query);
	return $output;
}


public function allTheatersInDescendingOrder() {
	$query = "SELECT * FROM theaters order by id ASC";
	$output = $this->getData($query);
	return $output;
}

public function selectTheaterDataById($id) {
	$query = "SELECT * FROM theaters WHERE id = $id";
	$output = $this->getData($query);
	return $output;
}


public function selectTheaterDataByEmail($email) {
  $query = "SELECT * FROM theaters WHERE email='$email'";
	$output = $this->getData($query);
	return $output;
}

public function theatersByStatus($status) {
	$query = "SELECT * FROM theaters WHERE status = '$status'";
	$output = $this->getData($query);
	return $output;
}

/** Theater Datas end**/


/** Film datas **/
public function addFilms($filmname,$languages,$cast,$directors,$producers,$imagepath,$releasedate) {
	$query = "insert into films set name='$filmname', language='$languages', cast='$cast', director='$directors', producer='$producers', poster= '$imagepath', releasedate = '$releasedate'" ;
	$output = $this->setData($query);
	return $output;
}
public function SELECTAllFilms() {
	$query = "SELECT * FROM films";
	$output = $this->getData($query);
	return $output;
}
public function SELECTFilmById($id){
	$query = "SELECT * FROM films WHERE id = '$id'";
	$output = $this->getData($query);
	return $output;
}


/** film datas end **/

/** users **/
public function SELECTAllUsers() {
	$query = "SELECT * FROM users";
	$output = $this->getData($query);
	return $output;
}
public function SELECTUserByid($id) {
	$query = "SELECT * FROM users WHERE id='$id'";
	$output = $this->getData($query);
	return $output;
}

public function selectUserByEmail($email) {
	$query = "SELECT * FROM users WHERE email = '$email'";
	$output = $this->getData($query);
	return $output;
}

public function addUser($name,$email,$phone,$password,$status,$mailverification) {
	$query = "insert into users set name='$name',  email='$email', phone='$phone', password='$password', status='$status',mailverification='$mailverification'" ;
	$output = $this->setData($query);
	return $output;
}

public function verification($id,$code) {
	$query  = "UPDATE users SET status = '$code' WHERE id = '$id' AND status='$code'" ;
	$output = $this->setData($query);
	return $output;
}

public function uploaduserpic($id,$imagepath) {
	$query  = "UPDATE users SET profileimage = '$imagepath' WHERE id = '$id'" ;
	$output = $this->setData($query);
	return $output;
}

/** users end **/
public function passwordChange($table,$new,$loginid){
	$query  = "UPDATE $table SET password = '$new' WHERE id = '$loginid'" ;
	$output = $this->setData($query);
	return $output;
}

public function changeMailVerificationStatus($table,$id,$status='verified') {
	$query  = "UPDATE $table SET mailverification = '$status' WHERE id = $id" ;
	$output = $this->setData($query);
	return $output;
}

public function getDataWithTableAndId($table,$id){
	$query = "SELECT * FROM $table WHERE id = $id";
	$output = $this->getData($query);
	return $output;
}




} ?>
