<?php
include "lib/head.php";
include "lib/header.php";
include "lib/left_menu.php";
?>
<?php
$sql_emp="SELECT * FROM `book_room` WHERE `booking_id`='$_GET[view]'";
$res_emp=mysqli_query($con, $sql_emp);
$row_emp=mysqli_fetch_array($res_emp);
// $res_emp=mysql_query($sql_emp);
// $row_emp=mysql_fetch_array($res_emp);
?>
<?php
if($_GET['status']=="Confirm"){
$sql_status="UPDATE `book_room` SET `status`='Confirm' WHERE `booking_id`='$_GET[id]'";
mysqli_query($con, $sql_status);
// mysql_query($sql_status);
echo"<script>window.location='view_book_room.php?activated=success&view=$_GET[id]'</script>";
}
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
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Booking </span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body">
                                <i class="icon-calendar"></i>&nbsp;
                                <span class="thin uppercase hidden-xs"></span>&nbsp;
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> User
                        <small>Booking Details </small> 
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="clearfix"></div>
					<div class="row">
                    	<div class="col-md-12">
							<?php
							if($_GET['activated']=="success"){
							?>
							<div class="alert alert-block alert-success fade in">
                                        <button type="button" class="close" data-dismiss="alert"></button>
                                        <p><strong class="alert-heading">Success!</strong> Room Confirm has been done successfully</p>
                            </div>
							<?php } ?>
                                <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-user"></i><?php echo $row_emp[f_name]; ?> <?php echo $row_emp[l_name]; ?> - Booking Details 
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
                                                    <td> Name : </td>
                                                    <td> <?php echo $row_emp[f_name]; ?> <?php echo $row_emp[l_name]; ?> </td>
                                                    <td> Email-Id : </td>
                                                    <td> <?php echo $row_emp[email]; ?> </td>
                                                </tr>
                                                <tr class="success">
                                                    <td colspan="2"> Mobile Number : </td>
                                                    <td colspan="2"> <?php echo $row_emp[phone]; ?> </td>
                                                </tr>
												<tr class="active">
													<td>Message</td>
													<td colspan="3"><?php echo $row_emp[msg]; ?></td>
												</tr>
												<tr class="success">
                                                    <td> Check In  : </td>
                                                    <td> <?php echo $row_emp[check_in]; ?> </td>
                                                    <td> Check out : </td>
                                                    <td> <?php echo $row_emp[check_out]; ?> </td>
                                                </tr>
												<tr class="active">
                                                    <td> Duration  : </td>
                                                    <td> <?php echo $row_emp[duration]; ?> Night</td>
                                                    <td> Booking Date & Time : </td>
                                                    <td> <?php echo $row_emp[date_time]; ?> </td>
                                                </tr>
												<tr class="success">
                                                    <td> Adult   : </td>
                                                    <td> <?php echo $row_emp[adult]; ?> </td>
                                                    <td> Children  : </td>
                                                    <td> <?php echo $row_emp[child]; ?> </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-md-12">
                                <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-user"></i><?php echo $row_emp[f_name]; ?> <?php echo $row_emp[l_name]; ?> - User Room Details 
									</div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table id="table-pagination" data-toggle="table" data-height="200" data-pagination="true" data-search="true">
                                            <thead>
                                                <tr>
                                                    <th data-field="Sl/No" data-align="center" data-sortable="true">Sl/No</th>
                                                    <th data-field="id No" data-align="center" data-sortable="true">Room Title</th>
													<th data-field="Photo" data-align="center" data-sortable="true">Photo</th>
													<th data-field="Id Card Part 1" data-align="center" data-sortable="true">Price</th>
													<th data-field="Id Card Part 2" data-align="center" data-sortable="true">Action</th>
                                                </tr>
                                            </thead>
											<tbody>
												<?php
												$sql_room="SELECT * FROM `room` WHERE `id`='$row_emp[room_id]'";
												$res_room=mysqli_query($con, $sql_room);
                                                $row_room=mysqli_fetch_array($res_room);
                                                // $res_room=mysql_query($sql_room);
												// $row_room=mysql_fetch_array($res_room);
												?>
                                                <tr>
                                                    <td>1</td>
													<td><?php echo $row_room[title_en]; ?></td>
                                                    <td><img src="../<?php echo $row_room[img]; ?>" style="height:40px; width:120px;"  /></td>
													<td><?php echo $row_room[price1]; ?>,<?php echo $row_room[price2]; ?>,<?php echo $row_room[price3]; ?></td>
													<td><a href="vroom.php?view=<?php echo $row_room[id]; ?>" class="btn btn-sm blue"><i class="fa fa-eye"></i> View Room </a></td>
                                                </tr>
                                            </tbody>
                                        </table>
										<table class="table table-bordered table-hover">
											<tbody>
													<td colspan="2" align="center"><font size="2" color="#000066"><strong><?php echo $row_emp[status]; ?></strong></font>
														
														
														<br />
														<?php
														if($row_emp['status']=="Request")
														{
														?>
														<a href="view_book_room.php?status=Confirm&id=<?php echo $row_emp[booking_id]; ?>" class="btn green btn-sm btn-outline">Confirm</a>
														<?php } ?>
													</td>
											</tbody>
										</table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
<?php
include "lib/footer.php";
?>