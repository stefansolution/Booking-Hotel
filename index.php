<?php
include "lib/head.php";
?>
<body class="home-page-1 booking" >
<?php
include "lib/header.php";
include "lib/slider.php";
?>
<?php
$sql_cms="SELECT *  FROM `cms` WHERE `id`='1'";
// $res_cms=mysql_query($sql_cms);
// $row_cms=mysql_fetch_array($res_cms);
$res_cms=mysqli_query($con, $sql_cms);
$row_cms=mysqli_fetch_array($res_cms);
?>

		<!--Welcome Section-->
		<section id="welcome-section">
			<div class="inner-container container">
				<div class="l-sec col-md-7">
					<div class="ravis-title-t-1">
						<div class="title"><span>Riad Mazaya</span></div>
						<div class="sub-title"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_cms[title]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_cms[title]; ?><?php } ?></div>
					</div>
					<div class="content">
						<?php if($_SESSION['ln']=="en"){?> <?php echo $row_cms[content_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_cms[content_fr]; ?><?php } ?>
					</div>
					<a href="about.php" class="ravis-btn btn-type-2" style="background-color:#FF7B4E;"><?php if($_SESSION['ln']=="en"){?> about us<?php } if($_SESSION['ln']=="fr"){?> &#192; propos de nous<?php } ?></a>
				</div>
				<div class="r-sec col-md-5">
					<img src="<?php echo $row_cms[img]; ?>" alt="Riad Mazaya">
				</div>
			</div>
		</section>
		<!--End of Welcome Section-->

		<!--Luxury Room Section-->
		<section id="luxury-rooms" class="clearfix">
			<?php
			$sql_room="SELECT * FROM `room` ORDER BY `id` DESC LIMIT 0,4";
			$res_room=mysqli_query($con, $sql_room);
			// $res_room=mysql_query($sql_room);
			// while($row_room=mysql_fetch_array($res_room))
			while($row_room=mysqli_fetch_array($res_room))
			{
			?>
			<div class="room-boxes col-sm-6 col-md-3">
				<a href="room_details.php?id=<?php echo $row_room[id]; ?>" class="inner-container" data-bg="<?php echo $row_room[img]; ?>">
					<span class="ravis-title">
						<span class="inner-box">
							<span class="title"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[title_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[title_fr]; ?><?php } ?></span>
							<span class="sub-title"> <?php if($_SESSION['ln']=="en"){?> Low season<?php } if($_SESSION['ln']=="fr"){?> Basse saison<?php } ?> : <?php echo $row_room[price1]; ?> </span>
							<span class="sub-title"> <?php if($_SESSION['ln']=="en"){?> Middle season<?php } if($_SESSION['ln']=="fr"){?> Moyenne saison <?php } ?>: <?php echo $row_room[price2]; ?> </span>
							<span class="sub-title"> <?php if($_SESSION['ln']=="en"){?> High season<?php } if($_SESSION['ln']=="fr"){?> Haute Saison <?php } ?>: <?php echo $row_room[price3]; ?> </span>
						</span>
					</span>
				</a>
			</div>
			<?php } ?>
		</section>
		<!--End of Luxury Room Section-->

		<!-- Gallery -->
		<section id="gallery">
			<div class="inner-container container">

				<div class="ravis-title">
					<div class="inner-box">
						<div class="title"><?php if($_SESSION['ln']=="en"){?> Mazaya Gallery<?php } if($_SESSION['ln']=="fr"){?> Galerie Mazaya<?php } ?></div>
						<div class="sub-title"><?php if($_SESSION['ln']=="en"){?> Discover our best and luxurious Rooms<?php } if($_SESSION['ln']=="fr"){?> D&#233;couvrez nos meilleurs et luxueux Chambres<?php } ?></div>
					</div>
				</div>

				<!-- Gallery Container -->
				<div class="gallery-container">
					<div class="sort-section">
						<div class="sort-section-container">
							<div class="sort-handle"><?php if($_SESSION['ln']=="en"){?> Filtres<?php } if($_SESSION['ln']=="fr"){?> Filtres<?php } ?></div>
							<ul class="list-inline">
								<li><a href="#" data-filter="*" class="active"><?php if($_SESSION['ln']=="en"){?> All<?php } if($_SESSION['ln']=="fr"){?> Tout<?php } ?></a></li>
								<li><a href="#" data-filter=".restaurant"><?php if($_SESSION['ln']=="en"){?> Spa<?php } if($_SESSION['ln']=="fr"){?> Spa<?php } ?></a></li>
								<li><a href="#" data-filter=".bars"><?php if($_SESSION['ln']=="en"){?> Bedrooms<?php } if($_SESSION['ln']=="fr"){?> Chambres<?php } ?></a></li>
								<li><a href="#" data-filter=".pool"><?php if($_SESSION['ln']=="en"){?> Swimming pool<?php } if($_SESSION['ln']=="fr"){?> Piscine<?php } ?></a></li>
							</ul>
						</div>
					</div>
					<ul class="image-main-box clearfix">
						<?php
						$sql_gallery="SELECT * FROM `gallery` ORDER BY `id` DESC LIMIT 0,6";
						// $res_gallery=mysql_query($sql_gallery);
						// while($row_gallery=mysql_fetch_array($res_gallery))
						$res_gallery=mysqli_query($con, $sql_gallery);
						while($row_gallery=mysqli_fetch_array($res_gallery))
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

					<a href="gallery.php" class="gallery-more-btn ravis-btn btn-type-2" style="background-color:#FF7B4E;"><?php if($_SESSION['ln']=="en"){?> More ...<?php } if($_SESSION['ln']=="fr"){?> Plus ...<?php } ?></a>
				</div>
			</div>
		</section>
		<!-- End of Gallery -->
<!--FOOTER-->
<?php
include "lib/footer.php";
?>