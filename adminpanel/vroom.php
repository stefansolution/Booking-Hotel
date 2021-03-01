<?php
include "lib/head.php";
include "lib/header.php";
include "lib/left_menu.php";
?>
<?php
$sql="SELECT *  FROM `room` WHERE `id`='$_GET[view]'";
$res=mysqli_query($con, $sql);
$row=mysqli_fetch_array($res);
// $res=mysql_query($sql);
// $row=mysql_fetch_array($res);
?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="home.php">Home</a>
                                <i class="fa fa-angle-double-right"></i>
                            </li>
                            <li>
                                <span>Room View</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title">Room View
                        <small></small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
						<div class="portlet box blue ">
										<div class="portlet-title">
											<div class="caption">
												<i class="fa fa-user"></i>Room - Booking Details 
											</div>
											<div class="tools">
												<a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
												<a href="javascript:;" class="reload" data-original-title="" title=""> </a>
											</div>
										</div>
										<div class="portlet-body">
											<div class="table-scrollable">
												<table class="table table-bordered table-hover">
													<tbody>
														<tr class="active">
															<td> Room Image : </td>
															<td> <img src="../<?php echo $row[img]; ?>" style="height:100px; width:100%;" /> </td>
															<td> Room Title : </td>
															<td> <?php echo $row[title_en]; ?> </td>
														</tr>
														<tr class="success">
															<td> Price : </td>
															<td> <?php echo $row[price1]; ?>&euro;, <?php echo $row[price2]; ?>&euro;, <?php echo $row[price3]; ?>&euro; </td>
															<td> Breakfast : </td>
															<td> <?php echo $row[breakfast_en]; ?> </td>
														</tr>
														<tr class="active">
															<td>Room Size</td>
															<td colspan="3"><?php echo $row[room_size_en]; ?></td>
														</tr>
														<tr class="success">
															<td> Max People : </td>
															<td> <?php echo $row[max_people_en]; ?> </td>
															<td> View : </td>
															<td> <?php echo $row[view_en]; ?> </td>
														</tr>
														<tr class="active">
															<td> Facilities  : </td>
															<td> <?php echo $row[facilities_en]; ?> </td>
															<td> Room Slider 1 Image : </td>
															<td> <img src="../<?php echo $row[slider_img1]; ?>" style="height:100px; width:100%;" /> </td>
														</tr>
														<tr class="success">
															<td> Room Slider 2 Image   : </td>
															<td> <img src="../<?php echo $row[slider_img2]; ?>" style="height:100px; width:100%;" /> </td>
															<td> Room Slider 3 Image  : </td>
															<td> <img src="../<?php echo $row[slider_img3]; ?>" style="height:100px; width:100%;" /> </td>
														</tr>
														<tr class="active">
															<td> Room Slider 4 Image  : </td>
															<td> <img src="../<?php echo $row[slider_img4]; ?>" style="height:100px; width:100%;" /> </td>
															<td> Short Description : </td>
															<td> <?php echo $row[sdis_en]; ?> </td>
														</tr>
														<tr class="success">
															<td> Long Description : </td>
															<td colspan="3"> <?php echo $row[ldis_en]; ?> </td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
							</div>
                            <!-- END PROFILE CONTENT -->
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
			</div>
<?php
include "lib/footer.php";
?>