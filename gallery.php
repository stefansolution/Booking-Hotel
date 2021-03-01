<?php
include "lib/head.php";
?>
<body class="home-page-1">
<?php
include "lib/header.php";
?>

		<?php include 'lib/main_slider.php';?>

		<!-- Gallery -->
		<section id="gallery">
			<div class="inner-container container">
				<!-- Gallery Container -->
				<div class="gallery-container">
					<div class="sort-section">
						<div class="sort-section-container">
							<div class="sort-handle"><?php if($_SESSION['ln']=="en"){?> filters<?php } if($_SESSION['ln']=="fr"){?> Filtres<?php } ?></div>
							<ul class="list-inline">
								<li><a href="#" data-filter="*" class="active"><?php if($_SESSION['ln']=="en"){?> All<?php } if($_SESSION['ln']=="fr"){?> Tout<?php } ?></a></li>
								<li><a href="#" data-filter=".restaurant"><?php if($_SESSION['ln']=="en"){?> Patio<?php } if($_SESSION['ln']=="fr"){?> Patio<?php } ?></a></li>
								<li><a href="#" data-filter=".bars"><?php if($_SESSION['ln']=="en"){?> terrace<?php } if($_SESSION['ln']=="fr"){?> Terrase<?php } ?></a></li>
								<li><a href="#" data-filter=".pool"><?php if($_SESSION['ln']=="en"){?> Bedrooms<?php } if($_SESSION['ln']=="fr"){?> Chambres<?php } ?></a></li>							</ul>
						</div>
					</div>
					<ul class="image-main-box clearfix">
					<?php
					$sql_gallery="SELECT * FROM `gallery` ORDER BY `id` DESC";
					$res_gallery=mysqli_query($con, $sql_gallery);
					while($row_gallery=mysqli_fetch_array($res_gallery))
					// $res_gallery=mysql_query($sql_gallery);
					// while($row_gallery=mysql_fetch_array($res_gallery))
					{
					?>
						<li class="item col-xs-6 col-md-4 <?php echo $row_gallery[type]; ?>">
							<figure>
							<img src="<?php echo $row_gallery[image]; ?>" alt="11"/>
							<a href="<?php echo $row_gallery[image]; ?>" class="more-details" data-title="<?php if($_SESSION['ln']=='en'){?> <?php echo $row_gallery[title_en]; ?><?php } if($_SESSION['ln']=='fr'){?> <?php echo $row_gallery[title_fr]; ?><?php } ?>"><?php if($_SESSION['ln']=='en'){?> <?php echo $row_gallery[title_en]; ?><?php } if($_SESSION['ln']=='fr'){?> <?php echo $row_gallery[title_fr]; ?><?php } ?></a>
							<figcaption>
								<h4><?php if($_SESSION['ln']=='en'){?> <?php echo $row_gallery[title_en]; ?><?php } if($_SESSION['ln']=='fr'){?> <?php echo $row_gallery[title_fr]; ?><?php } ?></h4>
							</figcaption>
							</figure>
						</li>
					<?php } ?>
					</ul>
				</div>
			</div>
		</section>
		<!-- End of Gallery -->
<!--FOOTER-->
<?php
include "lib/footer.php";
?>