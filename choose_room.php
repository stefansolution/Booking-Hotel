<?php
include "lib/head.php";
?>
<body class="booking">
<?php
include "lib/header.php";
?>
<style>
.button {
    background-color: #FF7B4E;
    border: none;
	width:100%;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.button, a:hover {
color:#FFFFFF;
}
</style>
<?php
if($_POST['sub']=="Book Now"){

$_SESSION['check_in']=$_POST['check_in'];
$_SESSION['check_out']=$_POST['check_out'];
$_SESSION['duration']=$_POST['duration'];
$_SESSION['adult']=$_POST['adult'];
$_SESSION['child']=$_POST['child'];

}
?>
		<?php include 'lib/main_slider.php';?>
		<section id="booking-section" class="step-2">
			<div class="inner-container container">
				<div class="col-md-4 l-sec">
					<div class="ravis-title-t-2">
						<div class="title"><span><?php if($_SESSION['ln']=="en"){?> Reservation Inquiry Information<?php } if($_SESSION['ln']=="fr"){?> Renseignements sur la demande r&#233;servation<?php } ?></span></div>
					</div>

					<div class="selected-room-container">
						<div class="selected-room-box active">
							<div class="room-title">
								<div class="title"> <?php if($_SESSION['ln']=="en"){?> duration<?php } if($_SESSION['ln']=="fr"){?> Dur&#233;e<?php } ?> :</div>
								<div class="value"><?php if($_SESSION['ln']=="en"){?> <?php echo $_SESSION['duration_en']; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $_SESSION['duration_fr']; ?><?php } ?><?php if($_SESSION['ln']=="en"){?> <?php } if($_SESSION['ln']=="fr"){?> Nuit<?php } ?> <?php echo $_SESSION['duration'];?></div>
							</div>
							<div class="adult-count">
								<div class="title"><?php if($_SESSION['ln']=="en"){?> Adult<?php } if($_SESSION['ln']=="fr"){?> Adulte<?php } ?> :</div>
								<div class="value"><?php if($_SESSION['ln']=="en"){?> <?php echo $_SESSION['adult_en']; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $_SESSION['adult_fr']; ?><?php } ?><?php echo $_SESSION['adult'];?></div>
							</div>
							<div class="child-count">
								<div class="title"><?php if($_SESSION['ln']=="en"){?> children<?php } if($_SESSION['ln']=="fr"){?> Enfants<?php } ?> :</div>
								<div class="value"><?php if($_SESSION['ln']=="en"){?> <?php echo $_SESSION['child_en']; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $_SESSION['child_fr']; ?><?php } ?><?php echo $_SESSION['child'];?></div>
							</div>
						</div>
					</div>
					<form id="room-information-form" action="choose_room.php" method="post"><!-- Do Not remove the classes -->
						<div id="booking-date-range-inline" class="clearfix">
							<div class="input-daterange">
								<div class="field-row">
									<input placeholder="<?php echo $_SESSION['check_in']; ?>" class="datepicker-fields check-in" type="text" name="check_in"/>
									<!-- Date Picker field ( Do Not remove the "datepicker-fields" class ) -->
									<i class="fa fa-calendar"></i><!-- Date Picker Icon -->
								</div>
								<div class="field-row">
									<input placeholder="<?php echo $_SESSION['check_out']; ?>" class="datepicker-fields check-out" type="text" name="check_out"/>
									<i class="fa fa-calendar"></i>
								</div>
								<div class="field-row duration">
									<textarea style="display:none;"  name="duration" class="value"></textarea>
									<div class="duration-box">
										<div class="title"> <?php if($_SESSION['ln']=="en"){?> Night-Time<?php } if($_SESSION['ln']=="fr"){?> Dur&#233;e-Nuit<?php } ?></div>
										<div class="value"><?php echo $_SESSION['duration']; ?> </div>
									</div>
								</div>
							</div>
						</div>
						<div class="room-field-container">
							<div class="field-row ">
								<select name="adult" class="adult-field ">
									<option value="<?php echo $_SESSION['adult']; ?>"><?php echo $_SESSION['adult']; ?> <?php if($_SESSION['ln']=="en"){?> Adult<?php } if($_SESSION['ln']=="fr"){?> Adulte<?php } ?></option>
									<option value="1"><?php if($_SESSION['ln']=="en"){?> 1 Adult<?php } if($_SESSION['ln']=="fr"){?> 1 Adulte<?php } ?></option>
									<option value="2"><?php if($_SESSION['ln']=="en"){?> 2 Adults<?php } if($_SESSION['ln']=="fr"){?> 2 Adultes<?php } ?></option>
									<option value="3"><?php if($_SESSION['ln']=="en"){?> 3 Adults<?php } if($_SESSION['ln']=="fr"){?> 3 Adultes<?php } ?></option>
									<option value="4"><?php if($_SESSION['ln']=="en"){?> 4 Adults<?php } if($_SESSION['ln']=="fr"){?> 4 Adultes<?php } ?></option>
									<option value="5"><?php if($_SESSION['ln']=="en"){?> 5 Adults<?php } if($_SESSION['ln']=="fr"){?> 5 Adultes<?php } ?></option>
								</select>
							</div>
							<div class="field-row ">
								<select name="child" class="">
									<option value="<?php echo $_SESSION['child']; ?>"><?php echo $_SESSION['child']; ?> <?php if($_SESSION['ln']=="en"){?> children<?php } if($_SESSION['ln']=="fr"){?> Enfants<?php } ?></option>
									<option value="0"><?php if($_SESSION['ln']=="en"){?> No child<?php } if($_SESSION['ln']=="fr"){?> Pas d'enfant<?php } ?></option>
									<option value="1"><?php if($_SESSION['ln']=="en"){?> 1 Children<?php } if($_SESSION['ln']=="fr"){?> 1 Enfant<?php } ?></option>
									<option value="2"><?php if($_SESSION['ln']=="en"){?> 2 Children<?php } if($_SESSION['ln']=="fr"){?> 2 Enfants<?php } ?></option>
									<option value="3"><?php if($_SESSION['ln']=="en"){?> 3 Children<?php } if($_SESSION['ln']=="fr"){?> 3 Enfants</<?php } ?>option>
									<option value="4"><?php if($_SESSION['ln']=="en"){?> 4 Children<?php } if($_SESSION['ln']=="fr"){?> 4 Enfants<?php } ?></option>
									<option value="5"><?php if($_SESSION['ln']=="en"){?> 5 Children<?php } if($_SESSION['ln']=="fr"){?> 5 Enfants</<?php } ?></option>
								</select>
							</div>
						</div>
						
					</form>
					<!--<h3 align="center">Or</h3>
					<div class="select-room-box">
						<a href="make_reservation.php" class="button">Continue Next</a>
					</div>-->
				</div>
				<div class="col-md-8 r-sec">
					<div class="inner-box">
						<div class="steps">
							<ul class="list-inline">
								<li><?php if($_SESSION['ln']=="en"){?> Choose the date<?php } if($_SESSION['ln']=="fr"){?> Choisir la date<?php } ?></li>
								<li class="active"><?php if($_SESSION['ln']=="en"){?> Choose the Room<?php } if($_SESSION['ln']=="fr"){?> Choisir la Chambre<?php } ?></li>
								<li><?php if($_SESSION['ln']=="en"){?> Make a reservation request<?php } if($_SESSION['ln']=="fr"){?> Faire une demande de r&#233;servation<?php } ?></li>
								<li><?php if($_SESSION['ln']=="en"){?> Confirmation<?php } if($_SESSION['ln']=="fr"){?> Confirmation<?php } ?></li>
							</ul>
						</div>

						<div id="booking-room-container">
						<?php
						$sql_room="SELECT * FROM `room` ORDER BY `id` DESC";
						// $res_room=mysql_query($sql_room);
						// while($row_room=mysql_fetch_array($res_room))
						$res_room=mysqli_query($con, $sql_room);
						while($row_room=mysqli_fetch_array($res_room))
						{
						?>
							<div class="room-box">
								<div class="col-md-5 room-img" data-bg-img="<?php echo $row_room[img]; ?>">
									<div class="select-room-box">
										<a href="#price-break-down-3" onClick="GenericAjaxFunction('test.php?room_no=<?php echo $row_room[id]; ?>','room_back',0);" class="price-breakdown" href="#"> <?php if($_SESSION['ln']=="en"){?> Select this House<?php } if($_SESSION['ln']=="fr"){?> S&#233;lectionnez cette Chambre<?php } ?></a>
									</div>
								</div>
								<div id="price-break-down-3" class="price-breakdown-popup mfp-hide">
									<div id="room_back"></div>
								</div>
								<div class="r-sec col-md-7">
									<div class="title-box">
										<div class="title"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[title_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[title_fr]; ?><?php } ?></div>
										<div class="price">
									<div class="title"><?php if($_SESSION['ln']=="en"){?> Basse saison<?php } if($_SESSION['ln']=="fr"){?> Low season<?php } ?> :</div>
									<div class="value"><?php echo $row_room[price1]; ?></div>
								</div>
								<div class="price">
									<div class="title"><?php if($_SESSION['ln']=="en"){?> Moyenne saison<?php } if($_SESSION['ln']=="fr"){?> Average season<?php } ?> :</div>
									<div class="value"><?php echo $row_room[price2]; ?></div>
								</div>
								<div class="price">
									<div class="title"><?php if($_SESSION['ln']=="en"){?> Haute Saison<?php } if($_SESSION['ln']=="fr"){?> High season<?php } ?>  :</div>
									<div class="value"><?php echo $row_room[price3]; ?></div>
								</div>
									</div>
									<div class="amenities">
										<ul class="list-inline clearfix">
											<li class="col-md-5">
												<div class="title"> <?php if($_SESSION['ln']=="en"){?> Lunch<?php } if($_SESSION['ln']=="fr"){?> D&#233;jeuner<?php } ?> :</div>
												<div class="value"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[breakfast_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[breakfast_fr]; ?><?php } ?></div>
											</li>
											<li class="col-md-7">
												<div class="title"> <?php if($_SESSION['ln']=="en"){?> Bed<?php } if($_SESSION['ln']=="fr"){?> Lit<?php } ?> :</div>
												<div class="value"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[room_size_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[room_size_fr]; ?><?php } ?></div>
											</li>
											<li class="col-md-5">
												<div class="title"> <?php if($_SESSION['ln']=="en"){?> Capacity<?php } if($_SESSION['ln']=="fr"){?> Capacit&#233;<?php } ?> :</div>
												<div class="value"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[max_people_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[max_people_fr]; ?><?php } ?></div>
											</li>
											<li class="col-md-7">
												<div class="title"><?php if($_SESSION['ln']=="en"){?> Floor<?php } if($_SESSION['ln']=="fr"){?> Etage<?php } ?>  :</div>
												<div class="value"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[view_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[view_fr]; ?><?php } ?></div>
											</li>
											<li class="col-md-12">
												<div class="title"><?php if($_SESSION['ln']=="en"){?> Installation<?php } if($_SESSION['ln']=="fr"){?> Installation<?php } ?> :</div>
												<div class="value"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_room[facilities_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_room[facilities_fr]; ?><?php } ?></div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>

		</section>

<?php
include "lib/footer.php";
?>