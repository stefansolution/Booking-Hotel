<?php
include "lib/head.php";
include "lib/header.php";
include "lib/left_menu.php";
?>
<?php
if($_POST[sub]=="submit"){

if($_FILES[img][name])
{
$link1="upload/".time()."-".$_FILES[img][name];
$link11="../upload/".time()."-".$_FILES[img][name];
copy($_FILES[img][tmp_name],$link11);
}
//
if($_FILES[slider_img1][name])
{
$link2="upload/".time()."-".$_FILES[slider_img1][name];
$link22="../upload/".time()."-".$_FILES[slider_img1][name];
copy($_FILES[slider_img1][tmp_name],$link22);
}
//
if($_FILES[slider_img2][name])
{
$link3="upload/".time()."-".$_FILES[slider_img2][name];
$link33="../upload/".time()."-".$_FILES[slider_img2][name];
copy($_FILES[slider_img2][tmp_name],$link33);
}
//
if($_FILES[slider_img3][name])
{
$link4="upload/".time()."-".$_FILES[slider_img3][name];
$link44="../upload/".time()."-".$_FILES[slider_img3][name];
copy($_FILES[slider_img3][tmp_name],$link44);
}
//
if($_FILES[slider_img4][name])
{
$link5="upload/".time()."-".$_FILES[slider_img4][name];
$link55="../upload/".time()."-".$_FILES[slider_img4][name];
copy($_FILES[slider_img4][tmp_name],$link55);
}
//

////
$title_en=addslashes($_POST[title_en]);
$breakfast_en=addslashes($_POST[breakfast_en]);
$room_size_en=addslashes($_POST[room_size_en]);
$max_people_en=addslashes($_POST[max_people_en]);
$view_en=addslashes($_POST[view_en]);
$facilities_en=addslashes($_POST[facilities_en]);
$sdis_en=addslashes($_POST[sdis_en]);
$ldis_en=addslashes($_POST[ldis_en]);
////
$title_fr=addslashes($_POST[title_fr]);
$breakfast_fr=addslashes($_POST[breakfast_fr]);
$room_size_fr=addslashes($_POST[room_size_fr]);
$max_people_fr=addslashes($_POST[max_people_fr]);
$view_fr=addslashes($_POST[view_fr]);
$facilities_fr=addslashes($_POST[facilities_fr]);
$sdis_fr=addslashes($_POST[sdis_fr]);
$ldis_fr=addslashes($_POST[ldis_fr]);
////
$insert="INSERT INTO `room`(`title_en`, `title_fr`, `price1`, `price2`, `price3`, `breakfast_en`, `breakfast_fr`, `room_size_en`, `room_size_fr`, `max_people_en`, `max_people_fr`, `view_en`, `view_fr`, `facilities_en`, `facilities_fr`, `sdis_en`, `sdis_fr`, `ldis_en`, `ldis_fr`, `img`, `slider_img1`, `slider_img2`, `slider_img3`, `slider_img4`) VALUES ('$title_en','$title_fr','$_POST[price1]','$_POST[price2]','$_POST[price3]','$breakfast_en','$breakfast_fr','$room_size_en','$room_size_fr','$max_people_en','$max_people_fr','$view_en','$view_fr','$facilities_en','$facilities_fr','$sdis_en','$sdis_fr','$ldis_en','$ldis_fr','$link1','$link2','$link3','$link4','$link5')";
mysqli_query($con, $insert);
// mysql_query($insert);
echo "<script>window.location='add_room.php?msg=susses'</script>";
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
                                <a href="home.php">Home</a>
                                <i class="fa fa-angle-double-right"></i>
                            </li>
                            <li>
                                <span>Room Add</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title">Room Add
                        <small></small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
							<?php
							if($_GET['msg']=="susses"){
							?>
							<div class="alert alert-success">
                    			<button class="close" data-close="alert"></button>
                    			<span>Insert Successfully</span>
                			</div>	
							<?php	
							}
							?>
						<div class="portlet box blue ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-plus"></i> Room Add 
									</div>
                                    <div class="tools">
                                        <a href="" class="collapse" data-original-title="" title=""> </a>
                                        <a href="" class="reload" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
									<!-- CHANGE PASSWORD TAB -->
										<form action="" method="post" enctype="multipart/form-data">
										<div class="form-body">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label">Room Image</label><br />
														<input type="file" class="form-control" name="img" style="width:100%;" /> 
														<font size="-1"  color="#FF0000">400X380 Image Size</font>
													</div>
													<div class="form-group">
														<label class="control-label">Room Title in English</label><br />
														<input class="form-control" name="title_en" >
													</div>
													<div class="form-group">
														<label class="control-label">Room Title in French</label><br />
														<input class="form-control" name="title_fr" >
													</div>
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">Price 1</label><br />
																<input class="form-control" name="price1" >
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">Price 2</label><br />
																<input class="form-control" name="price2" >
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">Price 3</label><br />
																<input class="form-control" name="price3" >
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">Breakfast in English</label><br />
																<input class="form-control" name="breakfast_en" >
															</div>
															<div class="form-group">
																<label class="control-label">Breakfast in French</label><br />
																<input class="form-control" name="breakfast_fr" >
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">Room Size in English</label><br />
																<input class="form-control" name="room_size_en" >
															</div>
															<div class="form-group">
																<label class="control-label">Room Size in French</label><br />
																<input class="form-control" name="room_size_fr" >
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">Max People in English</label><br />
																<input class="form-control" name="max_people_en" >
															</div>
															<div class="form-group">
																<label class="control-label">Max People in French</label><br />
																<input class="form-control" name="max_people_fr" >
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label">View in English</label><br />
																<input class="form-control" name="view_en" >
															</div>
															<div class="form-group">
																<label class="control-label">View in French</label><br />
																<input class="form-control" name="view_fr" >
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label">Facilities in English</label><br />
																<input class="form-control" name="facilities_en" >
															</div>
															<div class="form-group">
																<label class="control-label">Facilities in French</label><br />
																<input class="form-control" name="facilities_fr" >
															</div>
														</div>
													</div>								
													<div class="row">
														<div class="col-md-3">
															<div class="form-group">
																<label class="control-label">Room Slider 1 Image</label><br />
																<input type="file" class="form-control" name="slider_img1" style="width:100%;" /> 
																<font size="-1"  color="#FF0000">1350X950 Image Size</font>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label class="control-label">Room Slider 2 Image</label><br />
																<input type="file" class="form-control" name="slider_img2" style="width:100%;" /> 
																<font size="-1"  color="#FF0000">1350X950 Image Size</font>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label class="control-label">Room Slider 3 Image</label><br />
																<input type="file" class="form-control" name="slider_img3" style="width:100%;" /> 
																<font size="-1"  color="#FF0000">1350X950 Image Size</font>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label class="control-label">Room Slider 4 Image</label><br />
																<input type="file" class="form-control" name="slider_img4" style="width:100%;" /> 
																<font size="-1"  color="#FF0000">1350X950 Image Size</font>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label">Short Description in English</label><br />
														<textarea class="form-control" name="sdis_en" style="width:100%;"></textarea>
													</div>	
													<div class="form-group">
														<label class="control-label">Short Description in French</label><br />
														<textarea class="form-control" name="sdis_fr" style="width:100%;"></textarea>
													</div>	
													<div class="form-group">
														<label class="control-label">Long Description in English</label><br />
														<textarea class="ckeditor form-control" id="editor2" name="ldis_en"></textarea>
													</div>
													<div class="form-group">
														<label class="control-label">Long Description in French</label><br />
														<textarea class="ckeditor form-control" id="editor2" name="ldis_fr"></textarea>
													</div>		
												</div>
											</div>					
											<div class="margin-top-10">
												<button name="sub" type="submit" value="submit" class="btn green"> Submit</button>
												<a href="" class="btn default"> Cancel </a>
											</div>
										</div>
										</form>
									<!-- END CHANGE PASSWORD TAB -->
								</div>
							</div>
                            <!-- END PROFILE CONTENT -->
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