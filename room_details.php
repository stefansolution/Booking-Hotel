<?php
include "lib/head.php";
?>
<body class="room-detials booking">
<?php
include "lib/header.php";
?>
<?php
$sql_room="SELECT * FROM `room` WHERE `id`='$_GET[id]'";
// $res_room=mysql_query($sql_room);
// $row_room=mysql_fetch_array($res_room);
$res_room=mysqli_query($con, $sql_room);
$row_room=mysqli_fetch_array($res_room);
?>
		<section id="room-top-section">
			<!-- Event Slider -->
			<section id="room-slider">
				<div class="items">
					<div class="img-container" data-bg-img="<?php echo $row_room[slider_img1]; ?>"></div>
				</div>
				<div class="items">
					<div class="img-container" data-bg-img="<?php echo $row_room[slider_img2]; ?>"></div>
				</div>
				<div class="items">
					<div class="img-container" data-bg-img="<?php echo $row_room[slider_img3]; ?>"></div>
				</div>
				<div class="items">
					<div class="img-container" data-bg-img="<?php echo $row_room[slider_img4]; ?>"></div>
				</div>
			</section>
			<!-- End of Event Slider -->
			<div class="inner-container container">
				<div class="room-title-box">
					<h1 class="title"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[title_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[title_fr]; ?><?php } ?></h1>
					<div class="price">
						<div class="title"><?php if($_SESSION['ln']=="en"){?> Low Season<?php } if($_SESSION['ln']=="fr"){?> Basse Saison<?php } ?>  :</div>
						<div class="value"><?php echo $row_room[price1]; ?> </div>
					</div>
					<div class="price">
						<div class="title"><?php if($_SESSION['ln']=="en"){?> Midlle season<?php } if($_SESSION['ln']=="fr"){?> Moyen Saison <?php } ?> :</div>
						<div class="value"><?php echo $row_room[price2]; ?> </div>
					</div>
					<div class="price">
						<div class="title"><?php if($_SESSION['ln']=="en"){?> High season<?php } if($_SESSION['ln']=="fr"){?> Haut Saison <?php } ?> :</div>
						<div class="value"><?php echo $row_room[price3]; ?> </div>
					</div>
				</div>
			</div>
		</section>

		<section class="room-desc">
			<div class="inner-container container">
				<div class="l-sec col-md-8">
					<div class="amenities">
						<ul class="list-inline clearfix">
							<li class="col-md-6">
								<div><?php if($_SESSION['ln']=="en"){?> Lunch<?php } if($_SESSION['ln']=="fr"){?> D&#233;jeuner<?php } ?>:</div>
								<div><font color="#FF7B4E"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[breakfast_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[breakfast_fr];?><?php } ?></font></div>
							</li>
							<li class="col-md-6">
								<div> <?php if($_SESSION['ln']=="en"){?> Size of The Room <?php } if($_SESSION['ln']=="fr"){?> Taille de la pi&#232;ce<?php } ?>:</div>
								<div><font color="#FF7B4E"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[room_size_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[room_size_fr]; ?><?php } ?></font></div>
							</li>
							<li class="col-md-6">
								<div> <?php if($_SESSION['ln']=="en"){?> Max People <?php } if($_SESSION['ln']=="fr"){?> Max Personnes<?php } ?> :</div>
								<div><font color="#FF7B4E"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[max_people_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[max_people_fr]; ?><?php } ?></font></div>
							</li>
							<li class="col-md-6" >
								<div> <?php if($_SESSION['ln']=="en"){?> View <?php } if($_SESSION['ln']=="fr"){?> Vue <?php } ?> :</div>
								<div><font color="#FF7B4E"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[view_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[view_fr]; ?><?php } ?></font></div>
							</li>
							<li class="col-md-12">
								<div> <?php if($_SESSION['ln']=="en"){?> Installation<?php } if($_SESSION['ln']=="fr"){?> Installation<?php } ?>  :</div>
								<div><font color="#FF7B4E"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[facilities_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[facilities_fr]; ?><?php } ?></font></div>
							</li>
						</ul>
					</div>
					<div class="icons-container">
						<ul class="list-inline">
							<li><i class="ravis-icon-hotel-tv"></i></li>
							<li><i class="ravis-icon-towel-on-hanger"></i></li>
							<li><i class="ravis-icon-swimming-pool-sign"></i></li>
							<li><i class="ravis-icon-surveillance-camera"></i></li>
							<li><i class="ravis-icon-hotel-left-luggage"></i></li>
							<li><i class="ravis-icon-hair-dryer"></i></li>
							<li><i class="ravis-icon-fast-food-burger-and-drink"></i></li>
						</ul>
					</div>
					<div class="description">
						<font color="#000000"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[sdis_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[sdis_fr]; ?><?php } ?></font>
					</div>
				</div>
				<div class="r-sec col-md-4">

					<form id="room-information-form"  action="make_reservation.php" method="post"><!-- Do Not remove the classes -->
						<div id="booking-date-range-inline" class="clearfix">
							<div class="input-daterange">
								<div class="field-row">
									<input placeholder="<?php if($_SESSION['ln']=='en'){?>Check In<?php } if($_SESSION['ln']=='fr'){?>Arriv&#233;e<?php } ?>" class="datepicker-fields check-in" type="text" name="check_in" required />
									<!-- Date Picker field ( Do Not remove the "datepicker-fields" class ) -->
									<i class="fa fa-calendar"></i><!-- Date Picker Icon -->
								</div>
								<div class="field-row">
									<input placeholder="<?php if($_SESSION['ln']=='en'){?>Check Out<?php } if($_SESSION['ln']=='fr'){?>D&#233;part<?php } ?>" class="datepicker-fields check-out" type="text" name="check_out" required />
									<i class="fa fa-calendar"></i>
								</div>
							</div>
							<div class="field-row duration">
								<textarea style="display:none;"  name="duration" class="value"></textarea>
								<div class="duration-box">
									<div class="title"> <?php if($_SESSION['ln']=="en"){?> Night-time<?php } if($_SESSION['ln']=="fr"){?> Dur&#233;e-Nuit<?php } ?></div>
									<div class="value"> <?php if($_SESSION['ln']=="en"){?> Choose a date <?php } if($_SESSION['ln']=="fr"){?>Choisissez une date<?php } ?></div>
								</div>
							</div>
						</div>
						<div class="field-row">
							<!-- Select boxes ( you can change the items and its value based on your project's needs ) -->
							<select name="adult" required>
								<option value=""> <?php if($_SESSION['ln']=="en"){?> Adult<?php } if($_SESSION['ln']=="fr"){?> Adulte<?php } ?></option>
								<!-- Select box items ( you can change the items and its value based on your project's needs ) -->
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							<!-- End of Select boxes -->
						</div>
						<div class="field-row">
							<select name="child" >
								<option value=""><?php if($_SESSION['ln']=="en"){?> Child<?php } if($_SESSION['ln']=="fr"){?> Enfant<?php } ?></option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
						<input type="hidden" name="room_no" value="<?php echo $row_room[id]; ?>">
						<div class="field-row">
							<input type="submit" name="sub" value="Renseignements Sur La Demande">
						</div>
					</form>
				</div>
				<div class="l-sec col-md-12" style="padding:30px; border: 2px solid #FFFFFF; box-shadow: 0 0 0 2px #FF7B4E, inset 0 0 0 1px #FF7B4E;">
					<font color="#000"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[ldis_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[ldis_fr]; ?><?php } ?></font>
				</div>
			</div>
		</section>

		<!--Other Rooms Section-->
		<section id="other-rooms">
			<div class="inner-container container">
				<div class="ravis-title">
					<div class="inner-box">
						<div class="title"> <?php if($_SESSION['ln']=="en"){?> Our Rooms <?php } if($_SESSION['ln']=="fr"){?> Nos Chambres<?php } ?></div>
						<div class="sub-title"><?php if($_SESSION['ln']=="en"){?> Our Rooms you might be intersted<?php } if($_SESSION['ln']=="fr"){?> Nos Chambres  que vous pourriez &#234;tre int&#233;ress&#233; <?php } ?></div>
					</div>
				</div>
				<div class="room-container clearfix">
					<?php
					$sql_rooms="SELECT * FROM `room` ORDER BY `id` DESC";
					$res_rooms=mysqli_query($con, $sql_rooms);
					while($row_rooms=mysqli_fetch_array($res_rooms))
					// $res_rooms=mysql_query($sql_rooms);
					// while($row_rooms=mysql_fetch_array($res_rooms))
					{
					?>
					<div class="room-box col-xs-6 col-md-4 animated-box" data-animation="fadeInUp">
						<div class="inner-box" data-bg-img="<?php echo $row_rooms[img]; ?>">
							<a href="room_details.php?id=<?php echo $row_rooms[id]; ?>" class="more-info"></a>
							<div class="caption">
								<div class="title"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_rooms[title_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_rooms[title_fr]; ?><?php } ?></div>
								<div class="price">
									<div class="title"><?php if($_SESSION['ln']=="en"){?> Low Season<?php } if($_SESSION['ln']=="fr"){?> Basse saison <?php } ?> :</div>
									<div class="value"><?php echo $row_rooms[price1]; ?></div>
								</div>
								<div class="price">
									<div class="title"><?php if($_SESSION['ln']=="en"){?> Middle Seasojn<?php } if($_SESSION['ln']=="fr"){?> Moyenne saison <?php } ?> :</div>
									<div class="value"><?php echo $row_rooms[price2]; ?></div>
								</div>
								<div class="price">
									<div class="title"><?php if($_SESSION['ln']=="en"){?>High Season<?php } if($_SESSION['ln']=="fr"){?>  Haute Saison<?php } ?>  :</div>
									<div class="value"><?php echo $row_rooms[price3]; ?></div>
								</div>
								<div class="desc">
									<div class="inner-box" style="overflow:hidden;">
										<?php if($_SESSION['ln']=="en"){?> <?php echo $row_rooms[sdis_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_rooms[sdis_fr]; ?><?php } ?>
									</div>
								</div>
							</div>

						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<!--End of Other Rooms Section-->
<!--FOOTER-->
<?php
include "lib/footer.php";
?>