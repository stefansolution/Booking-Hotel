<?php
if($_SESSION['ln']==""){
$_SESSION['ln']=en;
}
if($_GET['ln']=="en"){
$_SESSION['ln']=$_GET[ln];
echo "<script>window.location='index.php'</script>";
}
if($_GET['ln']=="fr"){
$_SESSION['ln']=$_GET[ln];
echo "<script>window.location='index.php'</script>";
}
?>
<?php
$sql_logo="SELECT *  FROM `cms` WHERE `id`='1'";
// $res_logo=mysql_query($sql_logo);
// $row_logo=mysql_fetch_array($res_logo);
$res_logo=mysqli_query($con,$sql_logo);
$row_logo=mysqli_fetch_array($res_logo);
?>
<?php
$sql_con="SELECT *  FROM `contact` WHERE `id`='1'";
$res_con=mysqli_query($con, $sql_con);
$row_con=mysqli_fetch_array($res_con);
// $res_con=mysql_query($sql_con);
// $row_con=mysql_fetch_array($res_con);
?>
<?php
$page=$url=basename($_SERVER['PHP_SELF']);
if($page=="index.php"){
$aa="active";
}
if($page=="about.php"){
$bb="active";
}
if($page=="rooms.php" || $page=="room_details.php"){
$cc="active";
}
if($page=="gallery.php"){
$dd="active";
}
if($page=="contact.php"){
$ee="active";
}
?>
	<div class="main-wrapper">
		<!-- Header Section -->
		<header id="main-header">
			<div class="inner-container container">
				<div class="l-sec col-xs-10 col-sm-6 col-md-4">
					<a href="index.php" id="t-logo">
						<img src="<?php echo $row_logo[logo]; ?>" style="height:80px; width:242px;">
					</a>
				</div>
				<div class="r-sec col-xs-2 col-sm-6 col-md-8">
					<nav id="main-menu">
						<ul class="list-inline">
							<li class="<?php echo $aa; ?>"><a href="index.php"><?php if($_SESSION['ln']=="en"){?>Home<?php } if($_SESSION['ln']=="fr"){?>  Accueil<?php } ?></a></li>
							<li class="<?php echo $bb; ?>"><a href="about.php"><?php if($_SESSION['ln']=="en"){?>About <?php } if($_SESSION['ln']=="fr"){?>Prestation <?php } ?></a></li>
							<li class="<?php echo $cc; ?>"><a href="rooms.php"><?php if($_SESSION['ln']=="en"){?> Rooms<?php } if($_SESSION['ln']=="fr"){?> Chambres<?php } ?></a></li>
							<li class="<?php echo $dd; ?>"><a href="gallery.php"><?php if($_SESSION['ln']=="en"){?>Gallery <?php } if($_SESSION['ln']=="fr"){?>Galerie <?php } ?></a></li>
							<li class="<?php echo $ee; ?>"><a href="contact.php"><?php if($_SESSION['ln']=="en"){?>Contact <?php } if($_SESSION['ln']=="fr"){?> Contact<?php } ?></a></li>
							<?php
							if($_SESSION['ln']=="en"){
							?>
								<li><a href="index.php?ln=en"><img src="assets/img/en.png" style="height:25px; width:25px;" /></a></li>
								<li><a href="index.php?ln=fr"><img src="assets/img/fr.png" style="height:25px; width:25px;" /></a></li>							
							<?php
							}
							if($_SESSION['ln']=="fr"){
							?>
								<li><a href="index.php?ln=en"><img src="assets/img/en.png" style="height:20px; width:20px;" /></a></li>
								<li><a href="index.php?ln=fr"><img src="assets/img/fr.png" style="height:30px; width:30px;" /></a></li>
							<?php } ?>
							
						</ul>
					</nav>
					<div id="main-menu-handle" class="ravis-btn btn-type-2"><i class="fa fa-bars"></i><i class="fa fa-close"></i></div><!-- Mobile Menu handle -->
					<a href="http://via.eviivo.com/mazaya40000" target="_blank" id="header-book-bow" class="ravis-btn btn-type-2" style="background-color:#FF7B4E;"><span><?php if($_SESSION['ln']=="en"){?>Online booking<?php } if($_SESSION['ln']=="fr"){?>  Reservation en Ligne<?php } ?></span> <i class="fa fa-calendar"></i></a>
				</div>
			</div>
			<div id="mobile-menu-container"></div>
		</header>
		<!-- End of Header Section -->