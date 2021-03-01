<?php
include "lib/head.php";
?>
<body class="booking">
<?php
include "lib/header.php";
?>
<?php
if($_POST['sub']=="Renseignements Sur La Demande")
{
$_SESSION['check_in']=$_POST['check_in'];
$_SESSION['check_out']=$_POST['check_out'];
$_SESSION['duration']=$_POST['duration'];
$_SESSION['adult']=$_POST['adult'];
$_SESSION['child']=$_POST['child'];
$_SESSION['room_no']=$_POST['room_no'];
}
//
if($_POST['sub']=="Book Now")
{
$today = date("j M Y");   
 $sql_insert="INSERT INTO `book_room`(`room_id`, `check_in`, `check_out`, `duration`, `adult`, `child`, `f_name`, `l_name`, `phone`, `email`, `msg`, `date_time`, `status`) VALUES ('$_SESSION[room_no]','$_SESSION[check_in]','$_SESSION[check_out]','$_SESSION[duration]','$_SESSION[adult]','$_SESSION[child]','$_POST[f_name]','$_POST[l_name]','$_POST[phone]','$_POST[email]','$_POST[msg]','$today','Request')";
mysqli_query($con, $sql_insert);
// mysql_query($sql_insert);
//
$actual_link = 'http://'.$_SERVER['HTTP_HOST'].'/MAZAYA/room_details.php?id='.$_SESSION[room_no];
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
$mail->Subject = "Book Room";
// Set content-type for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$mail->Body = "
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Order Confirmation</title>
</head>
<style>
button2 {background-color: #008CBA;} /* Blue */
</style>
<style>
table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th {
    height: 50px;
}
</style>
<body>
<div align='left' valign='top'><img src='https://lh6.googleusercontent.com/-t-lIWitXO0c/UWbNKLzhZ2I/AAAAAAAAAaw/0pVdQMeA90c/s600/top.png' style='width:100%;' height='177' style='display:block;'></div>
        <div align='center' style='background-color:#d3be6c; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000000; padding:0px 15px 10px 15px;'>
          <div><img src='https://lh5.googleusercontent.com/-JcyC9ItRa5s/UWbNIoxpABI/AAAAAAAAAao/64aK8LozuGs/s517/divider.png' width='517' height='10'></div>
          	<div style='font-size:48px; color:#838383;'><b>Booking Confirmation</b></div>
		  <div><img src='https://lh5.googleusercontent.com/-JcyC9ItRa5s/UWbNIoxpABI/AAAAAAAAAao/64aK8LozuGs/s517/divider.png' width='517' height='10'></div>
		  <div align='center' style='background-color:rgba(226, 224, 224, 0.75); margin-bottom:10px; padding:10px;'>
		  <h1 style='color:#333333;'>User Details</h1>
			  <h3>Name Is - $_POST[f_name]  $_POST[l_name] </h3>
			  <h3>Email Id :-  $_POST[email]</h3>
			  <h3>Phone No :- $_POST[phone]</h3>
			  <h5>Message :- $_POST[msg]</h5><br>
		  </div>
		<table>
			<tr>
				<th>Room </th>
				<th>Room Booking Details</th>
			</tr>
			<tr>
				<td align='center'>Check in</td>
				<td align='center'> $_SESSION[check_in] </td>
			</tr>
			<tr>
				<td align='center'>Check Out</td>
				<td align='center'>$_SESSION[check_out]</td>
			</tr>
			<tr>
				<td align='center'>Total Night</td>
				<td align='center'> $_SESSION[duration]</td>
			</tr>
			<tr>
				<td align='center'>Adult</td>
				<td align='center'> $_SESSION[adult] </td>
			</tr>
			<tr>
				<td align='center'>Child</td>
				<td align='center'>$_SESSION[child]</td>
			</tr>
		</table>
          <div style='font-size:24px; color:#555100;'><br>
				Room Book is successful  <br>
				<a style='background-color: #000099; /* Green */ border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block;
		font-size: 16px; margin: 4px 2px; cursor: pointer;' href='$actual_link'>View Room</a><br>
	click the button and view Book Room details</div>
			  <div>
				<br>
				<br>
				<b>Company Name</b><br>
				Enter company address here<br>
				Phone: (000) 123  4567 <br>
				<a href='' target='_blank' style='color:#000000; text-decoration:none;'> http://www.yoursite.com</a>
      		</div>
      	</div>
        <div align='left' valign='top'><img src='https://lh6.googleusercontent.com/-5d0w_7iRro8/UWbNIjGZI8I/AAAAAAAAAak/FOtNvzDtPiI/s600/bot.png' style='width:100%' height='18' style='display:block;'></div>
</body>
</html>
";
$mailto = "lionkingdom123@yandex.com";
// $mailto = "zoomprofiler@gmail.com";
$mail->AddAddress($mailto);
if(!$mail->Send())
{
echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
//
unset($_SESSION['check_in']);
unset($_SESSION['check_out']);
unset($_SESSION['duration']);
unset($_SESSION['adult']);
unset($_SESSION['child']);
unset($_SESSION['room_no']);
echo "<script>window.location='confirmation.php?msg=success'</script>";
}
}
?>

		<!--Breadcrumb Section-->
		<section id="breadcrumb-section" data-bg-img="assets/img/banner.jpg">
			<div class="inner-container container">
				<div class="ravis-title">
					<div class="inner-box">
						<div class="title"><?php if($_SESSION['ln']=="en"){?> Booking<?php } if($_SESSION['ln']=="fr"){?> R&#233;servation<?php } ?></div>
						<div class="sub-title"><?php if($_SESSION['ln']=="en"){?> Check the availability of our rooms<?php } if($_SESSION['ln']=="fr"){?> V&#233;rifiez la disponibilit&#233; de nos chambres<?php } ?></div>
					</div>
				</div>
			</div>
		</section>
		<!--End of Breadcrumb Section-->

		<section id="booking-section" class="step-3">
			<div class="inner-container container">
				<div class="col-md-4 l-sec">
					<div class="ravis-title-t-2">
						<div class="title"><span><?php if($_SESSION['ln']=="en"){?> Reservation Information<?php } if($_SESSION['ln']=="fr"){?> Renseignements sur la r&#233;servation<?php } ?></span></div>
					</div>
					<div class="check-in-out-container">
						<div class="check-in-out-box">
							<div class="title"><?php if($_SESSION['ln']=="en"){?> Check-in<?php } if($_SESSION['ln']=="fr"){?> Check-in<?php } ?> :</div>
							<div class="value"><?php echo $_SESSION['check_in']; ?></div>
						</div>
						<div class="check-in-out-box">
							<div class="title"> <?php if($_SESSION['ln']=="en"){?> Check-out<?php } if($_SESSION['ln']=="fr"){?> Check-out<?php } ?> :</div>
							<div class="value"><?php echo $_SESSION['check_out']; ?></div>
						</div>
						<div class="check-in-out-box">
								<div class="title"><?php if($_SESSION['ln']=="en"){?> duration<?php } if($_SESSION['ln']=="fr"){?> Dur&#233;e<?php } ?>  :</div>
								<div class="value"><?php echo $_SESSION['duration']; ?><?php if($_SESSION['ln']=="en"){?> Night<?php } if($_SESSION['ln']=="fr"){?> Nuit<?php } ?> </div>
							</div>
					</div>

					<div class="selected-room-container">
						<?php
						$sql_r="SELECT *  FROM `room` WHERE `id`='$_SESSION[room_no]'";
						// $res_r=mysql_query($sql_r);
						// $row_r=mysql_fetch_array($res_r);
						$res_r=mysqli_query($con, $sql_r);
						$row_r=mysqli_fetch_array($res_r);
						?>
						<div class="selected-room-box">
							<div class="room-title">
								<div class="title"><?php if($_SESSION['ln']=="en"){?> Bedroom<?php } if($_SESSION['ln']=="fr"){?> Chambre<?php } ?>  :</div>
								<div class="value"><?php if($_SESSION['ln']=="en") echo $row_r[title_en]; else echo $row_r[title_fr];?></div>
							</div>
							<div class="adult-count">
								<div class="title"><?php if($_SESSION['ln']=="en"){?> Adult<?php } if($_SESSION['ln']=="fr"){?> Adulte<?php } ?> :</div>
								<div class="value"><?php echo $_SESSION['adult']; ?></div>
							</div>
							<div class="child-count">
								<div class="title"><?php if($_SESSION['ln']=="en"){?> children<?php } if($_SESSION['ln']=="fr"){?> Enfants<?php } ?> :</div>
								<div class="value"><?php echo $_SESSION['child']; ?></div>
							</div>
						</div>
					</div>

					
				</div>
				<div class="col-md-8 r-sec">
					<div class="inner-box">
						<div id="booking-guest-info-form">
							<form action="make_reservation.php" method="post">
								<div class="field-row clearfix">
									<div class="col-md-6">
										<input type="text" placeholder="<?php if($_SESSION['ln']=='en'){?>First name<?php } if($_SESSION['ln']=='fr'){?>Pr&#233;nom<?php } ?> :" name="f_name" required>
									</div>
									<div class="col-md-6">
										<input type="text" placeholder="<?php if($_SESSION['ln']=='en'){?>Last name<?php } if($_SESSION['ln']=='fr'){?>Nom de famille<?php } ?> :" name="l_name" required>
									</div>
								</div>
								<div class="field-row clearfix">
									<div class="col-md-6">
										<input type="text" placeholder="<?php if($_SESSION['ln']=='en'){?>Phone<?php } if($_SESSION['ln']=='fr'){?>T&#233;l&#233;phone<?php } ?> :" name="phone" required>
									</div>
									<div class="col-md-6">
										<input type="email" placeholder="<?php if($_SESSION['ln']=='en'){?>E-mail<?php } if($_SESSION['ln']=='fr'){?>Email<?php } ?> :" name="email" required>
									</div>
								</div>
								<div class="field-row clearfix">
									<textarea placeholder="<?php if($_SESSION['ln']=='en'){?>Special needs<?php } if($_SESSION['ln']=='fr'){?>Besoins sp&#233;ciaux<?php } ?> : " name="msg" required></textarea>
								</div>
								<div class="field-row btn-container clearfix">
									<button class="by-email" type="submit" name="sub" value="Book Now"><?php if($_SESSION['ln']=="en"){?> Validate<?php } if($_SESSION['ln']=="fr"){?> Valider<?php } ?></button>
									<a href="booking.php" class="by-paypal"><?php if($_SESSION['ln']=="en"){?> Cancel<?php } if($_SESSION['ln']=="fr"){?> Annuler<?php } ?></a>
								</div>
							</form>
						</div>


					</div>
				</div>
			</div>

		</section>
<?php
include "lib/footer.php";
?>