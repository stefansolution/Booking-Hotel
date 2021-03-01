<style>
	.item{
		position: relative;
	}
	.overlay{
		position: absolute;
		top: 0px;
		left: 0px;
		height: 100%;
		width: 100%;
		background-color: red;
		opacity: 0.0;
	}
</style>
<div class="slider-available-sec">
			<!-- Main Slider -->
			<section id="main-slider">
				<?php
				$sql_sli="SELECT *  FROM `about_slider` limit 0,4";
				$res_sli=mysql_query($sql_sli);
				while($row_sli=mysql_fetch_array($res_sli))
				{
				?>
				<div class="items">
					<div class="img-container" data-bg-img="<?php echo $row_sli[image]; ?>"></div>
				</div>
				<?php } ?>
			</section>
			<!-- End of Main Slider -->

			<!--Main Booking form-->
			
			<!--End of Main Booking form-->
		</div>