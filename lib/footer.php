<?php
$sql_logo="SELECT *  FROM `cms` WHERE `id`='1'";
// $res_logo=mysql_query($sql_logo);
// $row_logo=mysql_fetch_array($res_logo);
$res_logo=mysqli_query($con, $sql_logo);
$row_logo=mysqli_fetch_array($res_logo);
?>
<?php
if($_POST[sub]=="submit_news"){

$sql_email="SELECT * FROM `newsletter` WHERE `email`='$_POST[email]'";
$res_email=mysqli_query($con, $sql_email);
$row_email=mysqli_fetch_array($res_email);
// $res_email=mysql_query($sql_email);
// $row_email=mysql_fetch_array($res_email);
if($row_email){
echo "<script>alert('this email already add our newsletter !');</script>";
}
else
{	
$sql_n="INSERT INTO `newsletter`(`email`) VALUES ('$_POST[email]')";
mysqli_query($con, $sql_n);
// mysql_query($sql_n);
echo "<script>alert('Your Email Has Been Successfully Added!');</script>";
}
}
?>
<!--Footer Section-->
		<footer id="main-footer">
			<div class="inner-container container">
				<div class="t-sec clearfix">
					<div class="widget-box col-sm-6 col-md-4">
						<a href="index.php" id="f-logo">
							<img src="<?php echo $row_logo[logo]; ?>" style="height:50px; width:200px;">
						</a>
						<div class="widget-content text-widget">
							<?php if($_SESSION['ln']=="en"){?> <?php echo $row_logo[logo_con_en]; ?> <?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_logo[logo_con_fr]; ?> <?php } ?>
						</div>
					</div>
					<div class="widget-box col-sm-6 col-md-4">
						<h4 class="title"><?php if($_SESSION['ln']=="en"){?> Newsletter<?php } if($_SESSION['ln']=="fr"){?> Newsletter<?php } ?></h4>
						<div class="widget-content newsletter">
							<div class="desc"></div>
							<form class="news-letter-form" action="" method="post">
								<input type="text" name="email" class="email" placeholder="Email" required>
								<button type="submit" name="sub" value="submit_news" class="ravis-btn btn-type-2" style="background-color:#FF7B4E;"><?php if($_SESSION['ln']=="en"){?> Submit<?php } if($_SESSION['ln']=="fr"){?> Envoyer<?php } ?></button>
							</form>
						</div>
					</div>
					<div class="widget-box col-sm-6 col-md-4">
						<h4 class="title"><?php if($_SESSION['ln']=="en"){?> Contact Us<?php } if($_SESSION['ln']=="fr"){?> Contactez-Nous<?php } ?></h4>
						<div class="widget-content contact">
							<ul class="contact-info">
								<li>
									<i class="fa fa-home"></i>
									<?php echo $row_con[address]; ?>
								</li>
								<li>
									<i class="fa fa-phone"></i>
									<?php echo $row_con[email]; ?>
								</li>
								<li>
									<i class="fa fa-envelope"></i>
									<?php echo $row_con[phone]; ?>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="b-sec clearfix">
					<div class="copy-right">
						 <a href="http://riadmazaya.com" target="_blank">Riad Mazaya</a> © 2017. All Rights Reserved.
					</div>
					<ul class="social-icons list-inline">
						<li><a href="<?php echo $row_con[facebook]; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
					</ul>
				</div>
			</div>
		</footer>
		<!--End of Footer Section-->

	</div>
	<!-- JS Include Section -->
	<script type="text/javascript" src="assets/js/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="assets/js/helper.js"></script>
	<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="assets/js/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/imagesloaded.pkgd.min.js"></script>
	<script type="text/javascript" src="assets/js/isotope.pkgd.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript" src="assets/js/template.js"></script>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;key=AIzaSyBFqY_VBzRTQTtzbOImGqLkJFHUwM7T-4g"></script>
	
</body>
</html>