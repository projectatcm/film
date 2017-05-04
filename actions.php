<?php

require './libs/Functions.php';
require './libs/Common.php';
$functions = new Functions();
$common = new Common();

if (!empty($_REQUEST)) {
    $action = $_REQUEST['action'];

if($action === 'addseats') {
  $screenno = $_POST['screenno'];
  $theaterid = $_POST['theaterid'];
  $row = $_POST['totalrow'];
  $cols = $_POST['totalcols'];
  for($i=1;$i<=$row;$i++){
    for($x=1;$x<=$cols;$x++){
      $seats[] = $_POST['r'.$i.'c'.$x];
    }
  }
  /* retrivel
  for($a=0;$a<$row;$a++){
    for($b=0;$b<$cols;$b++){?>
      <!--  <label> Seats for row- <?=$a+1?> Division- <?=$b+1?> = <?=$seats[$b]?></label>
        <br>
        <br> -->
    <?php }
  } */
  $seats = implode(',', $seats);
  $result = $functions->addSeats($theaterid,$screenno,$row,$cols,$seats);
  if($result){
    echo '<script type="text/javascript">';
    echo 'alert("Sucess");';
    echo 'window.location="./theater/seats.php";';
    echo '</script>';
  }else{
    echo '<script type="text/javascript">';
    echo 'alert("Error");';
    echo 'window.location="./theater/addseats.php?screen='.$screenno.'";';
    echo '</script>';
  }
}

if($action === 'addShowTime') {
  $theaterid = $_POST['theaterid'];
  $screenid = $_POST['screen'];
  $fhour = $_POST['firstshow_hour'];
  $fmin  = $_POST['firstshow_minutes'];
  $fperiod = $_POST['first_show_time_period'];
  if(($fhour === '') || ($fhour === '') || ($fhour === '') ){
    $ftime = 'no show';
  }else{
    $ftime = $fhour.':'.$fmin.' '.$fperiod;
  }

  $nhour = $_POST['nonshow_hour'];
  $nmin = $_POST['noonshow_minutes'];
  $nperiod = $_POST['noon_show_time_period'];
  $ntime = $nhour.':'.$nmin.' '.$nperiod;
  if(($nhour === '') || ($nmin === '') || ($nperiod === '') ){
    $ntime = 'no show';
  }else{
    $ntime = $nhour.':'.$nmin.' '.$nperiod;
  }

  $mhour = $_POST['matineeshow_hour'];
  $mmin = $_POST['matineehow_minutes'];
  $mperiod = $_POST['matinee_show_time_period'];
  $mtime = $mhour.':'.$mmin.' '.$mperiod;
  if(($mhour === '') || ($mmin === '') || ($mperiod === '') ){
    $mtime = 'no show';
  }else{
    $mtime = $mhour.':'.$mmin.' '.$mperiod;
  }


  $shour = $_POST['secondshow_hour'];
  $smin = $_POST['secondshow_minutes'];
  $speriod = $_POST['second_show_time_period'];
  $stime = $shour.':'.$smin.' '.$speriod;
  if(($shour === '') || ($smin === '') || ($speriod === '') ){
    $stime = 'no show';
  }else{
    $stime = $shour.':'.$smin.' '.$speriod;
  }

  $result = $functions->addShowTimes($ftime,$ntime,$mtime,$stime,$theaterid,$screenid);
  if($result){
    echo '<script type="text/javascript">';
    echo 'alert("Sucess");';
    echo 'window.location="./theater/filmchange.php?screen='.$screenid.'";';
    echo '</script>';
  }else{
    echo '<script type="text/javascript">';
    echo 'alert("ERROR");';
    echo 'window.location="./theater/filmchange.php?screen='.$screenid.'";';
    echo '</script>';
  }
}

if($action === 'assignmovie') {
  $filmid = $_POST['amfilmid'];
  $theaterid = $_POST['amtheaterid'];
  $screenno = $_POST['amscreenno'];
  $showtime = $_POST['amsshow'];
  $result = $functions->assignMovieToTheater($filmid,$theaterid,$screenno,$showtime);
  if($result){
    echo '<script type="text/javascript">';
    echo 'alert("Sucess");';
    echo 'window.location="./theater/filmchange.php?screen='.$screenno.'";';
    echo '</script>';
  }else{
    echo '<script type="text/javascript">';
    echo 'alert("ERROR");';
    echo 'window.location="./theater/addmovie.php?show='.$showtime.'&screenno='.$screenno.'";';
    echo '</script>';
  }
}


if($action === 'updateassignmovie') {
  $filmid = $_POST['amfilmid'];
  $filmassignid = $_POST['filmassignid'];
  $theaterid = $_POST['amtheaterid'];
  $screenno = $_POST['amscreenno'];
  $showtime = $_POST['amsshow'];
  $result = $functions->updateAssignMovieToTheater($filmid,$filmassignid);
  if($result){
    echo '<script type="text/javascript">';
    echo 'alert("Sucess");';
    echo 'window.location="./theater/filmchange.php?screen='.$screenno.'";';
    echo '</script>';
  }else{
    echo '<script type="text/javascript">';
    echo 'alert("ERROR");';
    echo 'window.location="./theater/changemovie.php?show='.$showtime.'&screenno='.$screenno.'&filmassignid='.$filmassignid.'";';
    echo '</script>';
  }
}

/*** Crew Actions ***/
		if($action === 'addcrew') {
			$name = $_POST['crewname'];
			$type = $_POST['type'];
			$image = 'image';
			$dest = "./images/crew/$type/";
			$imagepath = $common->uploads($image,$dest);
			$result = $functions->insertcrewdata($name,$type,$imagepath);
			if($result) {
				echo '<script type="text/javascript">';
				echo 'alert("Crew Added");';
				echo 'window.location="./admin/addcrewdatas.php";';
				echo '</script>';
			}else{
				echo '<script type="text/javascript">';
				echo 'alert("Error");';
				echo 'window.location="./admin/addcrewdatas.php";';
				echo '</script>';

			}
		}
    if($action === 'deletecrew') {
      $id = $_POST['delid'];
      $table = $_POST['delfor'];
      $page = $_POST['page'];
      $crewdata = $functions->selectcastbyid($id);
      $images = $crewdata[0]['images'];
      if(!empty($images)) { unlink($images); } //if proof path not empty unlink or delete file from folder
      $result = $functions->delete($table,$id);
      if($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Deleted");';
        echo 'window.location="./admin/'.$page.'"' ;
        echo '</script>';
      }
      else{
        echo '<script type="text/javascript">';
        echo 'alert("Error");';
        echo 'window.location="./admin/'.$page.'"' ;
        echo '</script>';
      }
    }

    if($action === 'updatecrew') {
    $id = $_POST['crewid'];
    $name = $_POST['crewname'];
    $type = $_POST['type'];
    if($_FILES['crewimagemodal']['size'] !== 0) {
      $image = 'crewimagemodal';
      $dest = "./images/crew/$type/";
      $imagepath = $common->uploads($image,$dest);
      }else{
        $imagepath = $_POST['editcrewimage'];
      }
      $result = $functions->updateCrewData($id,$name,$type,$imagepath);
      if($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Crew Updated");';
        echo 'window.location="./admin/addcrewdatas.php";';
        echo '</script>';
      }else{
        echo '<script type="text/javascript">';
        echo 'alert("Error");';
        echo 'window.location="./admin/addcrewdatas.php";';
        echo '</script>';
      }
    }

    /*** Crew Actions Ends***/

    /*** Login , change password etc. ***/

    if($action === 'userlogin') {
      $email = $_POST['username'];
      $password = $_POST['password'];
      $page = 'index.php'; // default page
      $result = $functions->userLogin($email,$password);
        if($result) {
            $userid = $result[0];
            $type = $result[1];
            session_start();
            if (!empty($_SESSION)) { session_destroy(); }
            $_SESSION['logintype'] = $type;
            $_SESSION['id'] = $userid;
            echo '<script type="text/javascript">';
            echo 'alert("Welcome");';
            echo 'window.location="./'.$type.'/home.php"' ;
            echo '</script>';
          }
      else{
        echo '<script type="text/javascript">';
        echo 'alert("User Not found");';
        echo 'window.location="./'.$page.'"' ;
        echo '</script>';
      }
    }


          if($action === 'changeadminpassword') {
            $old = $_POST['oldpassword'];
            $new = $_POST['newpassword'];
            $re = $_POST['repassword'];
            $table = 'admin';
            $oldpasscheck = $functions->adminOldPassCheck($old);
            if(sizeof($oldpasscheck) !== 0) {
              $id = $oldpasscheck[0]['id'];
              if($new === $re) {
                  $changepassword = $functions->changePassword($id,$table,$new);
                  if($changepassword) {
                    echo '<script type="text/javascript">';
                    echo 'alert("password Changed");';
                    echo 'window.location="./admin/settings.php";';
                    echo '</script>';
                  }else{
                    echo '<script type="text/javascript">';
                    echo 'alert("Error");';
                    echo 'window.location="./admin/settings.php";';
                    echo '</script>';
                  }
              }else{
                echo '<script type="text/javascript">';
                echo 'alert("Passwords not matching");';
                echo 'window.location="./admin/settings.php";';
                echo '</script>';
              }
            }
            else{
              echo '<script type="text/javascript">';
              echo 'alert("Old Password is incorrect");';
              echo 'window.location="./admin/settings.php";';
              echo '</script>';
            }
        }

    if($action === 'adminlogin') {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $result = $functions->adminLogin($username,$password);
      if($result) {
        session_start();
        if (!empty($_SESSION)) {
            session_destroy();
        }
        $_SESSION['logintype'] = 'admin';
        echo '<script type="text/javascript">';
        echo 'alert("Welcome admin");';
        echo 'window.location="./admin/home.php";';
        echo '</script>';
      }else{
        echo '<script type="text/javascript">';
        echo 'alert("Error");';
        echo 'window.location="./admin/home.php";';
        echo '</script>';
      }
    }

    if($action === 'logout') {
      $page = 'admin';
      session_start();
      $_SESSION = array(); // Unset all of the session variables.
      if(empty($_SESSION)){
        session_destroy();
        echo '<script type="text/javascript">';
        echo 'alert("See you again");';
        echo 'window.location="./index.php";';
        echo '</script>';
      }else{
        echo '<script type="text/javascript">';
        echo 'alert("Error");';
        echo 'window.location="./'.$page.'/home.php";';
        echo '</script>';
      }
    }

    /*** Login , change password, logout etc. ends ***/


    /*** Category , Languages ***/
    if($action === 'addcategory') {
      $category = $_POST['category'];
      $result = $functions->addCategory($category);
      if($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Category Added");';
        echo 'window.location="./admin/filmcategory.php";';
        echo '</script>';
      }else{
        echo '<script type="text/javascript">';
        echo 'alert("Error");';
        echo 'window.location="./admin/filmcategory.php";';
        echo '</script>';
      }
    }

    if($action === 'addlanguage') {
      $languages = $_POST['languages'];
      $result = $functions->addLanguages($languages);
      if($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Languages Added");';
        echo 'window.location="./admin/addlanguages.php";';
        echo '</script>';
      }else{
        echo '<script type="text/javascript">';
        echo 'alert("Error");';
        echo 'window.location="./admin/addlanguages.php";';
        echo '</script>';
      }
    }

    /*** Languages ends ***/



if($action === 'changeuserstatus') {
  $table = $_POST['table'];
  $id = $_POST['id'];
  $status = $_POST['status'];
  $page = $_POST['page'];
  $result = $functions->changeStatus($id,$table,$status);
  if($result) {
    echo '<script type="text/javascript">';
    echo 'alert("Changed");';
    echo 'window.location="./admin/'.$page.'"' ;
    echo '</script>';
  }
  else{
    echo '<script type="text/javascript">';
    echo 'alert("Error");';
    echo 'window.location="./admin/'.$page.'"' ;
    echo '</script>';
  }
}

if($action === 'deletelanguage') {
  $id = $_POST['delid'];
  $table = $_POST['delfor'];
  $page = $_POST['page'];
  $result = $functions->delete($table,$id);
  if($result) {
    echo '<script type="text/javascript">';
    echo 'alert("Deleted");';
    echo 'window.location="./admin/'.$page.'"' ;
    echo '</script>';
  }
  else{
    echo '<script type="text/javascript">';
    echo 'alert("Error");';
    echo 'window.location="./admin/'.$page.'"' ;
    echo '</script>';
  }
}

/** Theater Actions **/

    if($action === 'addtheater') {
      $email = $_POST['email'];
      $emailcheck = $functions->emailCheck($email);
      if($emailcheck) {
          $name = $_POST['name'];
          $address1 = $_POST['address1'];
          $address2 = $_POST['address2'];
          $address  = $address1." , ".$address2;
          $location = $_POST['location'];
          $city = $_POST['city'];
          $state = $_POST['state'];
          $country = $_POST['country'];
          $latitude = $_POST['latitude'];
          $longitude = $_POST['longitude'];
          $contactnumber = $_POST['contactnumber'];
          $screennumber = $_POST['screennumber'];
          $proof = 'proof';
          $proofdest = "./images/theaters/proofs/";
          $proofpath = $common->uploads($proof,$proofdest);
          $buildingimage = 'theaterimage';
          $buildingdest = "./images/theaters/theaterimage/";
          $buildingimagepath = $common->uploads($buildingimage,$buildingdest);
          $random_hash = md5(uniqid(rand(), true));
          $random_hash = substr($random_hash, 0, 6);
          $password = $random_hash;
          $status = $_POST['status'];
          $mailverification = 'not verified';
          $verificationcode = $common->SendVerificationMail($name,$email,$random_hash);
          if($verificationcode) {
            $result = $functions->inserttheaterdata($name,$email,$password,$contactnumber,$address,$location,$city,$state,$country,$latitude,$longitude,$proofpath,$buildingimagepath,$screennumber,$status,$mailverification,$random_hash);
            if($result) {
              echo '<script type="text/javascript">';
              echo 'alert("Theater Added");';
              echo 'window.location="./index.php";';
              echo '</script>';
            }else{
              echo '<script type="text/javascript">';
              echo 'alert("Error");';
              echo 'window.location="./index.php";';
              echo '</script>';
            }
         }
       }
       else{
         echo '<script type="text/javascript">';
         echo 'alert("Email Already registered");';
         echo 'window.location="./admin/addtheaters.php";';
         echo '</script>';
       }
    }



        if($action === 'blocktheater') {
          $table = $_POST['blockfor'];
          $id = $_POST['blockid'];
          $page = $_POST['page'];
          $result = $functions->block($table,$id);
          if($result) {
            echo '<script type="text/javascript">';
            echo 'alert("Blocked");';
            echo 'window.location="./admin/'.$page.'"' ;
            echo '</script>';
          }
          else{
            echo '<script type="text/javascript">';
            echo 'alert("Error");';
            echo 'window.location="./admin/'.$page.'"' ;
            echo '</script>';
          }

        }

            if($action === 'deletetheater') {
              $table = $_POST['delfor'];
              $id = $_POST['delid'];
              $page = $_POST['page'];
              $theaterdatas = $functions->selectTheaterDataById($id);
              $proofs = $theaterdatas[0]['proof'];
              $buildingimages = $theaterdatas[0]['buildingimage'];
              if(!empty($proofs)) { unlink($proofs); } //if proof path not empty unlink or delete file from folder
              if(!empty($buildingimages)) { unlink($buildingimages); } // same as above
              $result = $functions->delete($table,$id);
              if($result) {
                echo '<script type="text/javascript">';
                echo 'alert("Deleted");';
                echo 'window.location="./admin/'.$page.'"' ;
                echo '</script>';
              }
              else{
                echo '<script type="text/javascript">';
                echo 'alert("Error");';
                echo 'window.location="./admin/'.$page.'"' ;
                echo '</script>';
              }
            }


          if($action === 'approvetheater') {
              $table = $_POST['approvefor'];
              $id =$_POST['approveid'];
              $page = $_POST['page'];
              $result = $functions->approve($table,$id);
              if($result) {
                echo '<script type="text/javascript">';
                echo 'alert("Approved");';
                echo 'window.location="./admin/'.$page.'"' ;
                echo '</script>';
              }
              else{
                echo '<script type="text/javascript">';
                echo 'alert("Error");';
                echo 'window.location="./admin/'.$page.'"' ;
                echo '</script>';
              }
          }

          /** Theater Action Ends **/


if($action === 'addfilm') {
  $filmname = $_POST['filmname'];
  $languages = $_POST['languages'];
  $languages =  implode(',',$languages);
  $actors = $_POST['actors'];
  $actors =  implode(',',$actors);
  $directors = $_POST['directors'];
  $directors = implode(',', $directors);
  $producers =$_POST['producers'];
  $producers = implode(',', $producers);
  $releasedate = $_POST['releasedate'];
  // changing date format from year-month-date to date-month-year
  $releasedate = date("d-m-Y", strtotime($releasedate));
  $poster = 'poster';
  $dest = "./images/films/";
  $imagepath = $common->uploads($poster,$dest);
  if($imagepath){
    $result = $functions->addFilms($filmname,$languages,$actors,$directors,$producers,$imagepath,$releasedate);
    if($result) {
      echo '<script type="text/javascript">';
      echo 'alert("Film Added");';
      echo 'window.location="./admin/addfilms.php";';
      echo '</script>';
    }else{
      echo '<script type="text/javascript">';
      echo 'alert("Error while data insertion");';
      echo 'window.location="./admin/addfilms.php";';
      echo '</script>';
    }
  }else{
    echo '<script type="text/javascript">';
    echo 'alert("file upload error");';
    echo 'window.location="./admin/addfilms.php";';
    echo '</script>';
  }

}

if($action === 'deleteFilm') {
  $id = $_POST['id'];
  $table = 'films';
  $page = $_POST['page'];
  $filmdatas = $functions->selectFilmById($id);
  $posters = $filmdatas[0]['proof'];
  if(!empty($posters)) { unlink($posters); }
  $result = $functions->delete($table,$id);
  if($result) {
    echo '<script type="text/javascript">';
    echo 'alert("Deleted");';
    echo 'window.location="./admin/'.$page.'"' ;
    echo '</script>';
  }
  else{
    echo '<script type="text/javascript">';
    echo 'alert("Error");';
    echo 'window.location="./admin/'.$page.'"' ;
    echo '</script>';
  }
}

/*****************----- Admin Side Ends Here -----***********************/

if($action === 'userregister') {
  $email = $_POST['email'];
  $emailcheck = $functions->emailCheck($email);
  if($emailcheck) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $page = $_POST['page'].'.php';
            $verificationcode = md5(uniqid(rand(), true));
            $verificationcode = substr($verificationcode, 0, 6);
            $password = $verificationcode;
            $status = 'pending';
            $mailverification = 'not verified';
            $result = $functions->addUser($name,$email,$phone,$password,$status,$mailverification);
              if($result) {
                $sendverificationcode = $common->SendVerificationMail($name, $email, $password);
                echo '<script type="text/javascript">';
                echo 'alert("Please login to continue");';
                echo 'window.location="./index.php"' ;
                echo '</script>';
              }else{
                echo '<script type="text/javascript">';
                echo 'alert("error");';
                echo 'window.location="./index.php"' ;
                echo '</script>';
              }

          }
    else{
      echo '<script type="text/javascript">';
      echo 'alert("Email already registered");';
      echo 'window.location="./'.$page.'"' ;
      echo '</script>';
    }
}


if($action === 'verify') {
  $id = $_POST['id'];
  $code = $_POST['code'];
  $page = $_POST['page'];
  $result = $functions->verification($id,$code);
  if($result) {
    echo '<script type="text/javascript">';
    echo 'alert("Please login to continue");';
    echo 'window.location="./'.$page.'"' ;
    echo '</script>';
  }else{
    echo '<script type="text/javascript">';
    echo 'alert("error");';
    echo 'window.location="./'.$page.'"' ;
    echo '</script>';
  }
}

if($action === 'uploadprofileimage') {
  $id = $_POST['userid'];
  $image = 'profilepic';
  $dest = './images/users/';
  $imagepath = $common->uploads($image,$dest);
  if($imagepath) {
    $result = $functions->uploaduserpic($id,$imagepath);
    if($result) {
      echo '<script type="text/javascript">';
      echo 'alert("profilepic uploaded");';
//      echo 'window.location="./'.$page.'"' ;
      echo '</script>';
    }else{
      echo '<script type="text/javascript">';
      echo 'alert("error while inserting data");';
  //    echo 'window.location="./'.$page.'"' ;
      echo '</script>';
    }
  }else{
    echo '<script type="text/javascript">';
    echo 'alert("upload error");';
//    echo 'window.location="./'.$page.'"' ;
    echo '</script>';
  }
}


if($action === 'firstPasswordChange'){

    $loginid = $_POST['loginid'];
    $table = $_POST['table'];
    $newpass = $_POST['newpassword'];
    $repassword = $_POST['renewpassword'];
    if($newpass == $repassword) {
      $result = $functions->passwordChange($table,$newpass,$loginid);
      if($result){
          $functions->changeMailVerificationStatus($table,$loginid);
          $userdata = $functions->getDataWithTableAndId($table,$loginid);
          $name = $userdata[0]['name'];
          $email = $userdata[0]['email'];
          session_start();
          $page = $_SESSION['logintype'];
          $common->notificationmail('Password Changed',$name,'Password changed',$newpass,$email);
          echo '<script type="text/javascript">';
          echo 'alert("password changed");';
          echo 'window.location="'.$page.'/home.php";';
          echo '</script>';
        }
      }else{
        echo '<script type="text/javascript">';
        echo 'alert("passwords not matching");';
        echo 'window.location="'.$page.'/home.php";';
        echo '</script>';
  }
}





}
