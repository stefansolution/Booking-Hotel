		<div class="slider-available-sec">
			<!-- Main Slider -->
			<section id="main-slider" class="owl-car">
				<?php
				$file = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '/')+1) ;
				$page =substr($file, 0, strpos($file, '.'));

				if($page == 'choose_room' || $page == 'make_reservation')
					$page = 'rooms';

				$sql_sli="SELECT *  FROM `slider` WHERE `page`='$page'";
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
		</div>