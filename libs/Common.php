<?php

require_once ('DbConnection.php');

class Common extends DbConnection {

    public function uploads($file, $dest) {
        $Imagefile = $_FILES[$file];
//file properties
        $fileName = $Imagefile['name'];
        $fileType = $Imagefile['type'];
        $fileSize = $Imagefile['size'];
        $fileTempName = $Imagefile['tmp_name'];
        $fileError = $Imagefile['error'];
//file upload
        $fileExt = explode('.', $fileName);
        $fileExt = strtolower(end($fileExt));
        $allowedExt = array('png', 'jpeg', 'jpg', 'pdf');
        if (in_array($fileExt, $allowedExt)) {
            if ($fileError === 0) {
                if ($fileSize <= '2000000') {
                    $fileNew = uniqid('', TRUE) . '.' . $fileExt;
                    $fileDest = $dest . $fileNew;
                    if (!empty($_SESSION['crop_items'])) {
                        $crop_items = $_SESSION['crop_items'];
                    } else {
                        $crop_items = array();
                    }
//array_push($crop_items,$fileDest);
                    if (move_uploaded_file($fileTempName, $fileDest)) {

                        array_push($crop_items, $fileDest);
                        $_SESSION['crop_items'] = $crop_items;
//                               header("Location:./crop");
//                            echo sizeof($_SESSION['crop_items']);
                        return $fileDest;
                    }
                } else {
                    echo "Image Upload Error";
                }
            }
        }
    }



  public function SendVerificationMail($name, $email, $random_hash) {
            require './PHPMailer/PHPMailerAutoload.php';
            require './PHPMailer/class.phpmailer.php';
            require './PHPMailer/class.smtp.php';
            $from = "projectatcm@gmail.com";
            $from_name = "Film Booking Project";
            $subject = "Verification code from Film booking";
            $body = "This is the verification code for this email adddress is ----> $random_hash";
            $to = $email;
            $mail = new PHPMailer;  // create a new object
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPAuth = true;  // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465; // 465 or 587
            $mail->Username = "projectatcm@gmail.com";
            $mail->Password = "[code]magos";
            $mail->SetFrom($from, $from_name);
            $mail->addReplyTo($from);
            $mail->Subject = $subject;
            $mail->IsHTML(true);
            $mail->Body = $body;
            $mail->AddAddress($to);
            if (!empty($cc)) {
                $mail->addCC($cc);
            }
            if (!empty($bcc)) {
                $mail->addBCC($bcc);
            }
            if (!$mail->Send()) {
                echo $error = 'Mail error: ' . $mail->ErrorInfo;
                return false;
            } else {
                return true;
            }
        }




        /*--------- location selector function -----------------*/

public function loactionselector() {?>

  <!-- Add locations and GeoCordinates ------------------------------------------------------------------------------------------------------------>
  <!------><input type="text" class="form-control select_location selectedlocation" readonly name="location" placeholder="click to add location" required /><!-------->
	<!------><input type="" name="latitude" class="latvalue hidden" /><!------------------------------------------------------------------------------->
	<!------><input type="" name="longitude" class="lonvalue hidden" /><!------------------------------------------------------------------------------>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBi9iGKL01Roy-7MZIOFFA4USHDykfUP8Q&v=3.exp&libraries=places"></script>
  <script type="text/javascript">
      var $map, $autocomplete, $marker, latitude, longitude, address, splitaddress, countryfrommap, statefrommap, cityfrommap, splitaddresslength;
      function initialize() {
            var auto_complete_input = document.getElementById('place_autocomplete'); // search field in the map modal
            var auto_complete_options = {componentRestrictions: {'country': 'ind'}}; // limited search by india
            var lanlng = new google.maps.LatLng(12.8505,73.2711); // default location given is kerala
            var map_options = {
                zoom: 7,
                center: lanlng,
                mapTypeId: google.maps.MapTypeId.HYBRID,
                disableDefaultUI: true
            };
          var map_loader = document.getElementById('map_view'); //div which map is loading
          $autocomplete = new google.maps.places.Autocomplete(auto_complete_input, auto_complete_options); // places auto completion
          $map = new google.maps.Map(map_loader, map_options); // map loading
          $marker = new google.maps.Marker({ // map options
              position: lanlng,
              map: $map,
              draggable: true,
              animation: google.maps.Animation.DROP,
              title: 'Click me',
              visible: false
        });
        google.maps.event.addListener($autocomplete, "place_changed", getSelectedplace); // getting datas of changed place
        google.maps.event.addListener($marker, "dragend", function (event) {
            latitude = this.getPosition().lat(); // changed latitude
            longitude = this.getPosition().lng() // changed longitude
        });
      }

    function getSelectedplace() {
      var place = $autocomplete.getPlace();
      if (!place.geometry) {
        alert("Your Searched place not found!.Plase use the makers to point to your location to get the GeoCordinates");
        return;
      } else {
          var location = place.geometry.location;
          latitude = place.geometry.location.lat();
          longitude = place.geometry.location.lng();
          $map.panTo(location);
          $map.setZoom(16);
          $marker.setPosition(location);
          $marker.setVisible(true);
          $marker.setAnimation(google.maps.Animation.BOUNCE);
          console.log(place);
          alert("Plase Select your exact position.\n1.Drag the marker to your location\n2.Use mouse to scroll and pan arround the map\n3.Locate your position and Drop the marker there");
          address = place.formatted_address; // gets the formated address of the selected place from places object
console.log(address);
          splitaddress = address.split(","); // spliting the array
          console.log(splitaddress);
          splitaddresslength = splitaddress.length;
          if(splitaddresslength <= 2) {
            countryfrommap = splitaddress[splitaddresslength - 1]; // always the last one in array is country
            statefrommap = splitaddress[splitaddresslength - 2]; // and the second last one in array is state
            cityfrommap = splitaddress[splitaddresslength - 2];  // and same as above the third last one will be city
          }
          else {
            countryfrommap = splitaddress[splitaddresslength - 1]; // always the last one in array is country
            statefrommap = splitaddress[splitaddresslength - 2]; // and the second last one in array is state
            cityfrommap = splitaddress[splitaddresslength - 3]; // and same as above the third last one will be city
          }
          $('.selectedlocation').val(address); // into full location field
          $('#citylocation').val(cityfrommap); // into city field
          $('#statelocation').val(statefrommap); // into state field
          $('#countrylocation').val(countryfrommap); // into country field
          $('.latvalue').val(latitude); // into hidden latitude
          $('.lonvalue').val(longitude); // into hidden longitude
        }
      }

    $(document).ready(function () {
    initialize();
    $('.select_location').focus(function () {
        console.log("focused");
        var location_input = $(this);
        var $modal = $('#locationSelectModal');
        var lan_input = $('input[name=latitude]');
        var lng_input = $('input[name=longitude]');
        var $modal_submit = $modal.find('button.save_location');
        $modal.modal('show').on('shown.bs.modal', function () {google.maps.event.trigger($map, "resize");});
    });
});
</script>
<div class="modal fade locationselectionmodal" id="locationSelectModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <input type="text" id="place_autocomplete" placeholder="Enter Your Location name [ Eg: Mala,kerala ]" autocomplete="on">
      </div>
      <div class="modal-body"><div class="map_view" id="map_view"></div></div>
      <div class="modal-footer">
          <button class="save_location closemapmodal" type="button">Use this Location</button>
      </div>
    </div>
  </div>
</div>
<?php }

/*--------- location selector function end-----------------*/


public function mailBody($mailsubject,$mailbody,$mailfor) {
				$password = md5(uniqid(rand(), true));
				$password = substr($password, 0, 6);
				require "./PHPMailer/PHPMailerAutoload.php";
				require "./PHPMailer/class.phpmailer.php";
				require "./PHPMailer/class.smtp.php";
				$from = 'projectatcm@gmail.com';
				$from_name = 'Real Estate project';
				$subject = $mailsubject;
				$body = $mailbody;
				$to = $mailfor;
				$mail = new PHPMailer;  // create a new object
				$mail->IsSMTP(); // enable SMTP   //
				$mail->SMTPAuth = true;  // authentication enabled
				$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
				$mail->Host = 'smtp.gmail.com';
				$mail->Port = 465;
				$mail->Username = "projectatcm@gmail.com";
				$mail->Password = "[code]magos";
				$mail->SetFrom($from, $from_name);
				$mail->addReplyTo($from);
				$mail->Subject = $subject;
				$mail->IsHTML(true);
				$mail->Body = $body;
				$mail->AddAddress($to);
				if (!empty($cc)) {
						$mail->addCC($cc);
				}
				if (!empty($bcc)) {
						$mail->addBCC($bcc);
				}
				if (!$mail->Send()) {
						echo $error = 'Mail error: ' . $mail->ErrorInfo;
						return FALSE;
				} else {
						return TRUE;
				}
}



public function notificationmail($mailsubject,$name,$notificationtype,$password,$email) {
			$body = ' <br> Hello <span style="text-transform:capitalize">'.$name.'</span>, <br><p>Your '.$notificationtype.' has sucessfully updated as below <br><br><b>'.$password.'</b> </p>';
			$notificationmailsend = $this->mailBody($mailsubject,$body,$email);
			if($notificationmailsend) {
				return TRUE;
			}else{
				return FALSE;
			}
}





public function changeToNewPassword($loginid,$table,$email,$mailverification) { ?>
	<script type="text/javascript">
	<?php  if($mailverification === 'not verified') { ?>
			$(document).ready(function(){
						$('.changeNewPassword').modal({
								backdrop: 'static',
								keyboard: false
						});
							$('.changeNewPassword').modal('show');
					});
		<?php } ?>
	</script>

		<div class="modal fade changeNewPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body" style="padding: 25px;">
						<form action="../actions.php?action=firstPasswordChange" method="post">
								<input  type="text" class="form-control hidden" name="loginid" value="<?=$loginid?>" >
								<input  type="text" class="form-control hidden" name="table" value="<?=$table?>" >
								<input  type="text" class="form-control hidden" name="email" value="<?=$email?>" >
								<label>New Password</label>
								<input type="password" class="form-control" name="newpassword" >
								<br>
								<label>Re enter new Password</label>
								<input type="password" class="form-control" name="renewpassword" >
								<br>
								<button type="submit" class="btn btn-primary">Change Password</button>
						</form>
					</div>
				</div>
			</div>
		</div>
<?php }

public function approvalWaiting($loginid,$table,$status) { ?>
	<script type="text/javascript">
	<?php  if($status === 'pending') { ?>
			$(document).ready(function(){
						$('.statuspending').modal({
								backdrop: 'static',
								keyboard: false
						});
							$('.statuspending').modal('show');
					});
		<?php }elseif ($status === 'blocked') { ?>
			$(document).ready(function(){
						$('.statusblocked').modal({
								backdrop: 'static',
								keyboard: false
						});
							$('.statusblocked').modal('show');
					});
 <?php		} ?>
	</script>

		<div class="modal fade statuspending" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body text-center" style="padding: 25px;">
							Please wait for the admin approval
					</div>
				</div>
			</div>
		</div>

				<div class="modal fade statusblocked" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-body text-center" style="padding: 25px;">
									You Have been blocked by the admin
							</div>
						</div>
					</div>
				</div>


<?php }






} ?>
