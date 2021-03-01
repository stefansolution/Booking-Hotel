<div class="slider-available-sec">
			<!-- Main Slider -->
			<section id="main-slider" class="owl-car">
				<?php
				$sql_sli="SELECT *  FROM `slider`";
				// $res_sli=mysql_query($sql_sli);
				$res_sli=mysqli_query($con, $sql_sli);
				// while($row_sli=mysql_fetch_array($res_sli))
				while($row_sli=mysqli_fetch_array($res_sli))
				{
				?>
				<div class="items">
					<div class="img-container" data-bg-img="<?php echo $row_sli[image]; ?>"></div>
					<!-- Change the URL section based on your image\'s name -->
					<div class="slide-caption">
						<div class="inner-container clearfix">
							<div class="up-sec"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_sli[sdis_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_sli[sdis_fr]; ?><?php } ?></div>
							<div class="down-sec"><?php if($_SESSION['ln']=="en"){?> <?php echo $row_sli[ldis_en]; ?><?php } if($_SESSION['ln']=="fr"){?> <?php echo $row_sli[ldis_fr]; ?><?php } ?></div>
						</div>
					</div>
				</div>
				<?php } ?>
			</section>
			<!-- End of Main Slider -->

			<!--Main Booking form-->
			<section id="main-availability-form">
				<div class="inner-container container">
					<div class="l-sec col-md-4">
						<div class="ravis-title">
							<div class="inner-box">
								<div class="title"><?php if($_SESSION['ln']=="en"){?> Select a date <?php } if($_SESSION['ln']=="fr"){?> Choisir Une Date <?php } ?></div>
								<div class="sub-title"><?php if($_SESSION['ln']=="en"){?>Select the dates of your stay <?php } if($_SESSION['ln']=="fr"){?> S&#233;lectionnez les dates de votre s&#233;jour<?php } ?></div>
							</div>
						</div>
					</div>
					<div class="r-sec col-md-8">
						
						<form id="room-information-form" class="booking-form clearfix" action="choose_room.php" method="post"><!-- Do Not remove the classes -->
							<div class="col-md-10">
								<div id="booking-date-range-inline" class="clearfix">
									<div class="input-daterange row">
										<div class="booking-fields col-md-6">
											<input placeholder="<?php if($_SESSION['ln']=='en'){?>Check In<?php } if($_SESSION['ln']=='fr'){?>Arriv&#233;e<?php } ?>" class="datepicker-fields check-in"  type="text" name="check_in" required/>
											<!-- Date Picker field ( Do Not remove the "datepicker-fields" class ) -->
											<i class="fa fa-calendar"></i><!-- Date Picker Icon -->
										</div>
										<div class="booking-fields col-md-6">
											<input placeholder="<?php if($_SESSION['ln']=='en'){?>Check Out<?php } if($_SESSION['ln']=='fr'){?>D&#233;part<?php } ?>" class="datepicker-fields check-out" type="text" name="check_out" required/>
											<i class="fa fa-calendar"></i>
										</div>
									</div>
								</div>
								<div class="duration">
									<textarea style="display:none;"  name="duration" class="value"></textarea>
								</div>
								<div class="row">
									<div class="booking-fields col-md-6">
										<!-- Select boxes ( you can change the items and its value based on your project's needs ) -->
										<select name="adult">
											<option value=""><?php if($_SESSION['ln']=="en"){?> Adult<?php } if($_SESSION['ln']=="fr"){?> Adulte<?php } ?></option>
											<!-- Select box items ( you can change the items and its value based on your project's needs ) -->
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
										<!-- End of Select boxes -->
									</div>
									<div class="booking-fields col-md-6">
										<select name="child">
											<option value=""><?php if($_SESSION['ln']=="en"){?> Child<?php } if($_SESSION['ln']=="fr"){?> Enfant<?php } ?></option>
											<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<button type="submit" name="sub" value="Book Now" class="ravis-btn btn-type-1">
									<span class="inner-box"><?php if($_SESSION['ln']=="en"){?> Information request<?php } if($_SESSION['ln']=="fr"){?>Renseignements sur la Demande <?php } ?></span>
								</button>
							</div>
						</form>

					</div>
				</div>
			</section>
			<!--End of Main Booking form-->
		</div>