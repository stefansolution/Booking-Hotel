<?php
include "lib/head.php";
?>
<body class="booking">
<?php
include "lib/header.php";
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

		<section id="booking-section" class="step-1">
			<div class="inner-container container">
				<div class="col-md-4 l-sec">
					<div class="ravis-title-t-2">
						<div class="title"><span><?php if($_SESSION['ln']=="en"){?> Reservation Information<?php } if($_SESSION['ln']=="fr"){?> Renseignements sur la r&#233;servation<?php } ?></span></div>
					</div>

					
					<form id="room-information-form" action="choose_room.php" method="post" name="myForm" onSubmit="return regis();"><!-- Do Not remove the classes -->
						<div class="input-daterange">
							<div class="field-row check-in">
								<input type="hidden" id="check_in" name="check_in"/>
								<div class="check-in-box">
									<div class="title"><?php if($_SESSION['ln']=="en"){?> recording<?php } if($_SESSION['ln']=="fr"){?> enregistrement<?php } ?> :</div>
									<div class="value"> <?php if($_SESSION['ln']=="en"){?> Choose a date<?php } if($_SESSION['ln']=="fr"){?> Choisissez une date<?php } ?></div>
								</div>
							</div>
							<div class="field-row check-out">
								<input type="hidden" id="check_out" name="check_out"/>
								<div class="check-out-box">
									<div class="title"><?php if($_SESSION['ln']=="en"){?> Check-out<?php } if($_SESSION['ln']=="fr"){?> Check-out<?php } ?> :</div>
									<div class="value"><?php if($_SESSION['ln']=="en"){?> Choose a date<?php } if($_SESSION['ln']=="fr"){?> Choisissez une date<?php } ?> </div>
								</div>
							</div>
							<div class="field-row duration">
								<textarea style="display:none;"  name="duration" class="value"></textarea>
								<div class="duration-box">
									<div class="title"><?php if($_SESSION['ln']=="en"){?> duration<?php } if($_SESSION['ln']=="fr"){?> Dur&#233;e<?php } ?> :</div>
									<div class="value"><?php if($_SESSION['ln']=="en"){?> Choose a date<?php } if($_SESSION['ln']=="fr"){?> Choisissez une date<?php } ?> </div>
								</div>
							</div>
						</div>
						<div class="field-row room-field" >
						<div class="title"><?php if($_SESSION['ln']=="en"){?> Other details<?php } if($_SESSION['ln']=="fr"){?> Autres d&#233;tails<?php } ?>  :</div>
						<select name="adult" class="adult-field ">
							<option value="1"><?php if($_SESSION['ln']=="en"){?> 1 Adult<?php } if($_SESSION['ln']=="fr"){?> 1 Adulte<?php } ?></option>
							<option value="2"><?php if($_SESSION['ln']=="en"){?> 2 Adult<?php } if($_SESSION['ln']=="fr"){?> 2 Adultes<?php } ?></option>
							<option value="3"><?php if($_SESSION['ln']=="en"){?> 3 Adult<?php } if($_SESSION['ln']=="fr"){?> 3 Adultes<?php } ?></option>
							<option value="4"><?php if($_SESSION['ln']=="en"){?> 4 Adult<?php } if($_SESSION['ln']=="fr"){?> 4 Adultes<?php } ?></option>
							<option value="5"><?php if($_SESSION['ln']=="en"){?> 5 Adult<?php } if($_SESSION['ln']=="fr"){?> 5 Adultes<?php } ?></option>
						</select>
						<select name="child" >
							<option value="0"><?php if($_SESSION['ln']=="en"){?> No children<?php } if($_SESSION['ln']=="fr"){?> Aucun enfant<?php } ?></option>
							<option value="1"><?php if($_SESSION['ln']=="en"){?> 1 Children<?php } if($_SESSION['ln']=="fr"){?> 1 Enfants<?php } ?></option>
							<option value="2"><?php if($_SESSION['ln']=="en"){?> 2 Children<?php } if($_SESSION['ln']=="fr"){?> 2 Enfants<?php } ?></option>
							<option value="3"><?php if($_SESSION['ln']=="en"){?> 3 Children<?php } if($_SESSION['ln']=="fr"){?> 3 Enfants<?php } ?></option>
							<option value="4"><?php if($_SESSION['ln']=="en"){?> 4 Children<?php } if($_SESSION['ln']=="fr"){?> 4 Enfants<?php } ?></option>
							<option value="5"><?php if($_SESSION['ln']=="en"){?> 5 Children<?php } if($_SESSION['ln']=="fr"){?> 5 Enfants<?php } ?></option>
						</select>
						</div>
						<div class="room-field-container"></div>
						<div class="field-row btn-container">
							<input type="submit" name="sub" value="Book Now">
						</div>
					</form>
				</div>
				<div class="col-md-8 r-sec">
					<div class="inner-box">
						<div class="steps">
							<ul class="list-inline">
								<li class="active"><?php if($_SESSION['ln']=="en"){?> Choose the date<?php } if($_SESSION['ln']=="fr"){?> Choisir la date<?php } ?></li>
								<li><?php if($_SESSION['ln']=="en"){?> Choose the room<?php } if($_SESSION['ln']=="fr"){?> Choisir la pi&#233;ce<?php } ?></li>
								<li><?php if($_SESSION['ln']=="en"){?> to make a reservation<?php } if($_SESSION['ln']=="fr"){?> aire une r&#233;servation<?php } ?>F</li>
								<li><?php if($_SESSION['ln']=="en"){?> Confirmation<?php } if($_SESSION['ln']=="fr"){?> Confirmation<?php } ?></li>
							</ul>
						</div>
						<div id="booking-date-range-inline" class="clearfix">
							<div class="check-in col-md-6" name="start"></div>
							<div class="check-out col-md-6" name="end"></div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div id="div_msg"></div>
				</div>
			</div>

		</section>
<!--FOOTER-->
<?php
include "lib/footer.php";
?>
<script type="text/javascript">
function regis() {
//alert("hello");
var check_in = document.forms["myForm"]["check_in"].value;
	var len_name =check_in.trim().length;
    if (len_name < 1) {
		document.getElementById("div_msg").innerHTML = "<h3 align='center' style='padding:10px; background-color:#f5e9e9;'><font color='red'> S&#233;lectionnez Check-in & Check-out .</font></h3>";
        return false;
    }   
	var check_out = document.forms["myForm"]["check_out"].value;
	var len_name =check_out.trim().length;
    if (len_name < 1) {
		document.getElementById("div_msg").innerHTML = "<h3 align='center' style='padding:10px; background-color:#f5e9e9;'><font color='red'>S&#233;lectionnez Check-in & Check-out .</font></h3>";
        return false;
    } 
}
</script>