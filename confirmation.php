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
						<div class="title"><?php if($_SESSION['ln']=="en"){?> Reservation<?php } if($_SESSION['ln']=="fr"){?> R&#233;servation<?php } ?></div>
						<div class="sub-title"><?php if($_SESSION['ln']=="en"){?> Reservation request<?php } if($_SESSION['ln']=="fr"){?> Demande de r&#233;servation<?php } ?></div>
					</div>
				</div>
			</div>
		</section>
		<!--End of Breadcrumb Section-->

		<section id="booking-section" class="step-3">
			<div class="inner-container container">
				<div class="col-md-12 r-sec">
					<div class="inner-box">
						<div id="confirmation-message">
							<div class="ravis-title-t-2">
								<div class="title"><span><?php if($_SESSION['ln']=="en"){?> Reservation request completed<?php } if($_SESSION['ln']=="fr"){?> Demande de r&#233;servation termin&#233;e<?php } ?></span></div>
								<div class="sub-title"><?php if($_SESSION['ln']=="en"){?> The details of your booking request have been sent to Riad Mazaya<?php } if($_SESSION['ln']=="fr"){?> Les d&#233;tails de votre demande de r&#233;servation ont &#233;t&#233; envoy&#233;s au Riad Mazaya<?php } ?></div>
							</div>
							
						</div>
					</div>
				</div>
			</div>

		</section>
<?php
include "lib/footer.php";
?>