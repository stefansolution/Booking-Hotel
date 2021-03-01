<?php
include "lib/head.php";
include "lib/header.php";
include "lib/left_menu.php";
?>
<?php
if($_GET['action']=="del"){

$sql_del1="DELETE FROM `book_room` WHERE `booking_id`='$_GET[id]'";
mysqli_query($con, $sql_del1);
// mysql_query($sql_del1);
echo"<script>window.location='view_booking.php?del=success'</script>";
}
if($_GET['status']=="Confirm"){
$sql_status="UPDATE `book_room` SET `status`='Confirm' WHERE `booking_id`='$_GET[id]'";
mysqli_query($con, $sql_status);
// mysql_query($sql_status);
echo"<script>window.location='view_booking.php?activated=success'</script>";
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
                                <a href="#">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Booking Rooms</span>
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
                    <h3 class="page-title"> View Rooms
                        <small>All View Booking List</small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <div class="clearfix"></div>
					<div class="row">
                    	<div class="col-md-12">
							<?php
							if($_GET['del']=="success"){
							?>
							<div class="alert alert-block alert-success fade in">
                                        <button type="button" class="close" data-dismiss="alert"></button>
                                        <p><strong class="alert-heading">Success!</strong> Booking Delete has been done successfully</p>
                            </div>
							<?php } ?>
							<?php
							if($_GET['activated']=="success"){
							?>
							<div class="alert alert-block alert-success fade in">
                                        <button type="button" class="close" data-dismiss="alert"></button>
                                        <p><strong class="alert-heading">Success!</strong> Room Confirm has been done successfully</p>
                            </div>
							<?php } ?>
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-social-dribbble font-green hide"></i>
                                            <span class="caption-subject font-dark bold">Booking List</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table id="table-pagination" data-toggle="table" data-height="400" data-pagination="true" data-search="true">
                                            <thead>
                                                <tr>
                                                    <th data-field="Sl/No" data-align="center" data-sortable="true">Sl/No</th>
                                                    <th data-field="Blog title" data-align="center" data-sortable="true">Name</th>
													<th data-field="Image" data-align="center" data-sortable="true">Check In</th>
                                                    <th data-field="check_out" data-align="center" data-sortable="true">Check Out</th>
													<th data-field="duration" data-align="center" data-sortable="true">Duration</th>
													<th data-field="Status" data-align="center" data-sortable="true">Status</th>
													<th data-field="Action" data-align="center" data-sortable="true">Action</th>
                                                </tr>
                                            </thead>
											<tbody>
												<?php
												$sql_room="SELECT * FROM `book_room` ORDER BY `booking_id` DESC";
												$res_room=mysqli_query($con, $sql_room);
                                                while($row_room=mysqli_fetch_array($res_room))
                                                // $res_room=mysql_query($sql_room);
												// while($row_room=mysql_fetch_array($res_room))
												{
												$c++;
												?>
                                                <tr>
                                                    <td><?php echo $c; ?></td>
                                                    <td><?php echo $row_room[f_name]; ?> <?php echo $row_room[l_name]; ?></td>
                                                    <td><?php echo $row_room[check_in]; ?></td>                                                    
													<td><?php echo $row_room[check_out]; ?></td>
													<td><?php echo $row_room[duration]; ?> Night</td>
													<td>
														<b><?php echo $row_room['status']; ?></b>
														<br />
														<?php
														if($row_room['status']=="Request")
														{
														?>
														<a href="view_booking.php?status=Confirm&id=<?php echo $row_room[booking_id]; ?>" class="btn green btn-sm btn-outline">Confirm</a>
														<?php } ?>
													</td>
													<td>
														<a href="view_book_room.php?view=<?php echo $row_room[booking_id]; ?>" class="btn btn-sm blue"><i class="fa fa-eye"></i> View Details </a>
														<a href="view_booking.php?action=del&id=<?php echo $row_room[booking_id]; ?>" onclick="return confirm('Are you sure you want to delete this Room ?');" class="btn btn-sm red"><i class="fa fa-times-circle"> Del</i></a>
													</td>
                                                </tr>
												<?php } ?>
                                            </tbody>
                                        </table>
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