<?php
include "lib/head.php";
include "lib/header.php";
include "lib/left_menu.php";
?>
<?php
if($_GET['action']=="del"){

$sql="SELECT *  FROM `room` WHERE `id`='$_GET[id]'";
$res=mysqli_query($con, $sql);
$row=mysqli_fetch_array($res);
// $res=mysql_query($sql);
// $row=mysql_fetch_array($res);
/////
if($row[img]){
$path = "../";
unlink($path.$row[img]);
}
/////
if($row[slider_img1]){
$path = "../";
unlink($path.$row[slider_img1]);
}
/////
if($row[slider_img2]){
$path = "../";
unlink($path.$row[slider_img2]);
}
/////
if($row[slider_img3]){
$path = "../";
unlink($path.$row[slider_img3]);
}
/////
if($row[slider_img4]){
$path = "../";
unlink($path.$row[slider_img4]);
}
$sql_del1="DELETE FROM `room` WHERE `id`='$_GET[id]'";
mysqli_query($con, $sql_del1);
// mysql_query($sql_del1);
echo"<script>window.location='view_room.php?del=success'</script>";
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
                                <span>View Rooms</span>
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
                        <small>All View Rooms List</small>
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
                                        <p><strong class="alert-heading">Success!</strong> Rooms Delete has been done successfully</p>
                            </div>
							<?php } ?>
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-social-dribbble font-green hide"></i>
                                            <span class="caption-subject font-dark bold">Rooms List</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table id="table-pagination" data-toggle="table" data-height="400" data-pagination="true" data-search="true">
                                            <thead>
                                                <tr>
                                                    <th data-field="Sl/No" data-align="center" data-sortable="true">Sl/No</th>
                                                    <th data-field="Blog title" data-align="center" data-sortable="true">Room Title</th>
                                                    <th data-field="Short Description" data-align="center" data-sortable="true">room Image</th>
													<th data-field="Image" data-align="center" data-sortable="true">Room Price</th>
                                                    <th data-field="postdate" data-align="center" data-sortable="true">Room Facilities</th>
													<th data-field="Action" data-align="center" data-sortable="true">Action</th>
                                                </tr>
                                            </thead>
											<tbody>
												<?php
												$sql_room="SELECT * FROM `room` ORDER BY `id` DESC";
												$res_room=mysqli_query($con, $sql_room);
                                                while($row_room=mysqli_fetch_array($res_room))
                                                // $res_room=mysql_query($sql_room);
												// while($row_room=mysql_fetch_array($res_room))
												{
												$c++;
												?>
                                                <tr>
                                                    <td><?php echo $c; ?></td>
                                                    <td><?php echo $row_room[title_en]; ?></td>
													<td><img src="../<?php echo $row_room[img]; ?>" style="width:120px; height:80px;" ></td>
                                                    <td><?php echo $row_room[price1]; ?>, <?php echo $row_room[price2]; ?>, <?php echo $row_room[price3]; ?></td>                                                    
													<td><?php echo $row_room[facilities_en]; ?></td>
													<td>
														<a style="margin-bottom:5px;" href="edit_room.php?e_id=<?php echo $row_room[id]; ?>" class="btn btn-sm blue"><i class="fa fa-edit"></i> Edit </a>
														<a href="view_room.php?action=del&id=<?php echo $row_room[id]; ?>" onclick="return confirm('Are you sure you want to delete this Room ?');" class="btn btn-sm red"><i class="fa fa-times-circle"> Del</i></a>
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