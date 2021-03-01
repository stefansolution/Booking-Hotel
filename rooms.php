<?php
include "lib/head.php";
?>
<body class="home-page-1">
<?php
include "lib/header.php";
?>

		<?php include 'lib/main_slider.php'?>    
		<!--Room Section-->
		<section id="rooms-section" class="row-view">
			<div class="inner-container container">
				<div class="ravis-title-t-2">
					<div class="title"><span><?php if($_SESSION['ln']=="en"){?> Our Rooms<?php } if($_SESSION['ln']=="fr"){?> Nos Chambres<?php } ?> </span></div>
				</div>

				<div class="room-container clearfix">
					<?php
					$sql_room="SELECT * FROM `room` ORDER BY `id` DESC";
					$res_room=mysqli_query($con, $sql_room);
					while($row_room=mysqli_fetch_array($res_room))
					// $res_room=mysql_query($sql_room);
					// while($row_room=mysql_fetch_array($res_room))
					{
					?>
					<div class="room-box row animated-box" data-animation="fadeInUp">
						<div class="col-md-4 room-img" data-bg-img="<?php echo $row_room[img]; ?>">
							<a href="room_details.php?id=<?php echo $row_room[id]; ?>" class="more-info-url"></a>
						</div>
						<div class="r-sec col-md-8">
							<div class="col-md-7 m-sec">
								<div class="title-box">
									<div class="title"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[title_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[title_fr]; ?><?php } ?></div>
									<div class="price">
										<div class="title"> <?php if($_SESSION['ln']=="en"){?> Low saison<?php } if($_SESSION['ln']=="fr"){?> Basse season<?php } ?> :</div>
										<div class="value"><?php echo $row_room[price1]; ?> </div>
									</div><div class="price">
										<div class="title"> <?php if($_SESSION['ln']=="en"){?> Average season <?php } if($_SESSION['ln']=="fr"){?>Moyenne Saison <?php } ?> :</div>
										<div class="value"><?php echo $row_room[price2]; ?> </div>
									</div><div class="price">
										<div class="title"> <?php if($_SESSION['ln']=="en"){?> High Saison<?php } if($_SESSION['ln']=="fr"){?> Haut season<?php } ?>  :</div>
										<div class="value"><?php echo $row_room[price3]; ?> </div>
									</div>
								</div>
								<div class="amenities">
									<ul class="list-inline clearfix">
										<li class="col-md-5">
											<div class="title"><?php if($_SESSION['ln']=="en"){?> Lunch<?php } if($_SESSION['ln']=="fr"){?> D&#233;jeuner <?php } ?> :</div>
											<div class="value"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[breakfast_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[breakfast_fr]; ?><?php } ?></div>
										</li>
										<li class="col-md-7">
											<div class="title"><?php if($_SESSION['ln']=="en"){?> Bed<?php } if($_SESSION['ln']=="fr"){?> Lit <?php } ?> :</div>
											<div class="value"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[room_size_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[room_size_fr]; ?><?php } ?></div>
										</li>
										<li class="col-md-5">
											<div class="title"> <?php if($_SESSION['ln']=="en"){?> Capacity<?php } if($_SESSION['ln']=="fr"){?> Capacit&#233; <?php } ?> :</div>
											<div class="value"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[max_people_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[max_people_fr]; ?><?php } ?></div>
										</li>
										<li class="col-md-7">
											<div class="title"><?php if($_SESSION['ln']=="en"){?> Floor <?php } if($_SESSION['ln']=="fr"){?> Etage<?php } ?> :</div>
											<div class="value"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[view_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[view_fr]; ?><?php } ?></div>
										</li>
										<li class="col-md-12">
											<div class="title"><?php if($_SESSION['ln']=="en"){?> Installation<?php } if($_SESSION['ln']=="fr"){?> Installation<?php } ?>  :</div>
											<div class="value"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[facilities_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[facilities_fr]; ?><?php } ?></div>
										</li>
									</ul>
								</div>
								<a href="room_details.php?id=<?php echo $row_room[id]; ?>" class="more-info"><?php if($_SESSION['ln']=="en"){?> More informations<?php } if($_SESSION['ln']=="fr"){?> Plus d'information<?php } ?> </a>
							</div>
							<div class="col-md-5 desc">
								<?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[sdis_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[sdis_fr]; ?><?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>

			</div>
		</section>
		<!--End of Room Section-->
<!--FOOTER-->
<?php
include "lib/footer.php";
?>