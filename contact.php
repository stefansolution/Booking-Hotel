<?php
include "lib/head.php";
?>
<body class="home-page-1">
<?php
include "lib/header.php";
?>
<?php
if($_POST[sub]=="Send Now" || $_POST[sub]=="Submit"){

require("class.phpmailer.php");
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = ''; // secure transfer enabled REQUIRED for GMail
$mail->Host = "riadmazaya.com";
$mail->Port = 25; // or 587
$mail->IsHTML(true);
$mail->Username = "no-reply@riadmazaya.com";
$mail->Password = "y8S35ja#";
$mail->SetFrom("no-reply@riadmazaya.com");
$mail->Subject = "Contact Us";
$mail->Body = "Hello,<br>My Name Is - $_POST[name] <br> Email Id :- $_POST[email] <br> Phone No :- $_POST[phone] <br>Message :- $_POST[message]";
$mailto = "zoomprofiler@gmail.com";
$mail->AddAddress($mailto);
if(!$mail->Send())
{
echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
 echo "<script>alert('votre message a été envoyé avec succès!!');</script>";
}
}
?>
		<?php include ('lib/main_slider.php');?>
		<!--Contact Section-->
		<section id="contact-section">
			<div class="inner-container container">
				<div class="t-sec">
					<div class="ravis-title-t-2">
						<div class="title"><span><?php if($_SESSION['ln']=="en"){?> Contact us<?php } if($_SESSION['ln']=="fr"){?> Contactez nous<?php } ?></span></div>
						<div class="sub-title"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_con[title_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_con[title_fr]; ?><?php } ?></div>
					</div>
					<div class="content">
					<?php if($_SESSION['ln']=="en"){?> <?php echo $row_con[discription_en]; ?> <?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_con[discription_fr]; ?> <?php } ?>
					</div>

					<div class="contact-info">
						<div class="contact-inf-box">
							<div class="icon-box">
								<i class="fa fa-home"></i>
							</div>
							<div class="text">
								<?php echo $row_con[address]; ?>
							</div>
						</div>
						<div class="contact-inf-box">
							<div class="icon-box">
								<i class="fa fa-envelope"></i>
							</div>
							<div class="text">
								<?php echo $row_con[email]; ?>
							</div>
						</div>
						<div class="contact-inf-box">
							<div class="icon-box">
								<i class="fa fa-phone"></i>
							</div>
							<div class="text">
								<?php echo $row_con[phone]; ?>
							</div>
						</div>
					</div>
				</div>

				<div class="b-sec clearfix">
					<div class="contact-form col-md-6">
						<form action="contact.php" method="post" >
							<div class="field-row">
								<input type="text" name="name" id="contact-name" placeholder="<?php if($_SESSION['ln']=='en'){?> Name<?php } if($_SESSION['ln']=='fr'){?> Nom<?php } ?> :" required>
							</div>
							<div class="field-row">
								<input type="text" name="phone" id="contact-phone" placeholder="<?php if($_SESSION['ln']=='en'){?> Phone<?php } if($_SESSION['ln']=='fr'){?> T&#233;l&#233;phone<?php } ?> :">
							</div>
							<div class="field-row">
								<input type="email" name="email" id="contact-email" placeholder="<?php if($_SESSION['ln']=='en'){?> E-mail<?php } if($_SESSION['ln']=='fr'){?> Email<?php } ?> :" required>
							</div>
							<div class="field-row">
								<textarea placeholder="<?php if($_SESSION['ln']=='en'){?>  Your message<?php } if($_SESSION['ln']=='fr'){?> Votre message<?php } ?>" name="message" id="contact-message" required></textarea>
							</div>
							<div class="message-box"></div>
							<div class="field-row">
								<input type="submit" name="sub" value="<?php if($_SESSION['ln']=='en'){?>Submit<?php } if($_SESSION['ln']=='fr'){?>Valider<?php } ?>">
							</div>
						</form>
					</div>
					<div id="map" class="col-md-6" data-marker="assets/img/marker.png">
					</div>
				</div>
			</div>
		</section>
		<!--End of Contact Section-->
<!--FOOTER-->
<?php
include "lib/footer.php";
?>
<script>

      // This example displays a marker at the center of Australia.
      // When the user clicks the marker, an info window opens.

      function initMap() {
        var uluru = {lat: <?php echo $row_con[latitude]; ?>, lng: <?php echo $row_con[longitude]; ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: uluru
        });

        var contentString = '<div id="content">'+'<p><?php echo $row_con[address]; ?></p>'+'</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        var marker = new google.maps.Marker({
          position: uluru,
          map: map,
          title: 'Uluru (Ayers Rock)'
        });
        marker.addListener('mouseover', function() {
          infowindow.open(map, marker);
        });
      }
    </script>
    <!-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApRJynsuBd2tnUpsO0V5F32KgsTHPpk0c&callback=initMap">
    </script> -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiOTKWwvPbrQhQixbfVUnmQWlggp5lZ_k&callback=initMap">
    </script>