<?php
include "lib/head.php";
?>
<body class="home-page-1">
<?php
include "lib/header.php";
?>
<?php
$sql_about="SELECT *  FROM `about_us` WHERE `a_id`='1'";
// $res_about=mysql_query($sql_about);
// $row_about=mysql_fetch_array($res_about);
$res_about=mysqli_query($con, $sql_about);
$row_about=mysqli_fetch_array($res_about);
?>

		<!--Breadcrumb Section-->
		<section id="breadcrumb-section" data-bg-img="assets/img/banner.jpg">
			<div class="inner-container container">
				<div class="ravis-title">
					<div class="inner-box">
						<div class="title"><?php if($_SESSION['ln']=="en"){?> about us<?php } if($_SESSION['ln']=="fr"){?> &#192; propos de nous<?php } ?></div>
						<div class="sub-title"><?php if($_SESSION['ln']=="en"){?> The services we offer<?php } if($_SESSION['ln']=="fr"){?> Les prestations que nous vous proposons<?php } ?></div>
					</div>
				</div>
			</div>
		</section>
		<!--End of Breadcrumb Section-->

		<!--Welcome Section-->
		<section id="welcome-section" class="has-user">
			<div class="inner-container container">
				<div class="l-sec col-md-12">
					<div class="ravis-title-t-1">
						<div class="title"><span><?php if($_SESSION['ln']=="en"){?> Riad Mazaya<?php } if($_SESSION['ln']=="fr"){?> Riad Mazaya<?php } ?></span></div>
						<div class="sub-title"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_about[title_en]; ?> <?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_about[title_fr]; ?> <?php } ?></div>
					</div>
					<div class="content">
						<?php if($_SESSION['ln']=="en"){?> <?php echo $row_about[content_en]; ?> <?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_about[content_fr]; ?> <?php } ?>
					</div>
					<cite><?php if($_SESSION['ln']=="en"){?> <?php echo $row_about[name_en]; ?> <?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_about[name_fr]; ?> <?php } ?></cite>
				</div>
			</div>
		</section>
		<!--End of Welcome Section-->

		<!-- Video Tour -->
<?php
include "lib/slider_about.php";
?>
		<!-- End of Video Tour -->
<!--FOOTER-->
<?php
include "lib/footer.php";
?>