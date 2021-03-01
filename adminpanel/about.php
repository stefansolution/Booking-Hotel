<?php
include "lib/head.php";
include "lib/header.php";
include "lib/left_menu.php";
?>
<?php
$sql="SELECT *  FROM `about_us` WHERE `a_id`='1'";
$res=mysqli_query($con, $sql);
$row=mysqli_fetch_array($res);
// $res=mysql_query($sql);
// $row=mysql_fetch_array($res);
?>
<?php
if($_POST[sub]=="Update"){
//
$title_en=addslashes($_POST[title_en]);
$content_en=addslashes($_POST[content_en]);
$name_en=addslashes($_POST[name_en]);
$vid_title_en=addslashes($_POST[vid_title_en]);
$vid_content_en=addslashes($_POST[vid_content_en]);
$vid_link_en=addslashes($_POST[vid_link_en]);
//
$title_fr=addslashes($_POST[title_fr]);
$content_fr=addslashes($_POST[content_fr]);
$name_fr=addslashes($_POST[name_fr]);
$vid_title_fr=addslashes($_POST[vid_title_fr]);
$vid_content_fr=addslashes($_POST[vid_content_fr]);
$vid_link_fr=addslashes($_POST[vid_link_fr]);
//
$sql_update="UPDATE `about_us` SET `title_en`='$title_en',`title_fr`='$title_fr',`content_en`='$content_en',`content_fr`='$content_fr',`name_en`='$name_en',`name_fr`='$name_fr',`vid_title_en`='$vid_title_en',`vid_title_fr`='$vid_title_fr',`vid_content_en`='$vid_content_en',`vid_content_fr`='$vid_content_fr',`vid_link`='$vid_link' WHERE `a_id`='1'";
mysqli_query($con, $sql_update);
// mysql_query($sql_update);
echo "<script>window.location='about.php?msg=susses'</script>";
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
                                <span>About CMS</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title">About CMS
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
                    			<span>Update Successfully</span>
                			</div>	
							<?php	
							}
							?>
						<div class="portlet box blue ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-plus"></i> About CMS
									</div>
                                    <div class="tools">
                                        <a href="" class="collapse" data-original-title="" title=""> </a>
                                        <a href="" class="reload" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
									<!-- CHANGE PASSWORD TAB -->
										<form action="" method="post" enctype="multipart/form-data">
										<div class="row">
											<div class="col-md-6">
												<div class="form-body">
													<div class="form-group">
														<label class="control-label">Name in English</label><br />
														<input class="form-control" name="name_en" value="<?php echo $row[name_en]; ?>" >
													</div>
													<div class="form-group">
														<label class="control-label">Name in French</label><br />
														<input class="form-control" name="name_fr" value="<?php echo $row[name_fr]; ?>" >
													</div>
													<div class="form-group">
														<label class="control-label">Title in English</label><br />
														<input class="form-control" name="title_en" value="<?php echo $row[title_en]; ?>" >
													</div>
													<div class="form-group">
														<label class="control-label">Title in French</label><br />
														<input class="form-control" name="title_fr" value="<?php echo $row[title_fr]; ?>" >
													</div>
													
													<div class="form-group">
														<label class="control-label">Contact in English</label><br />
														<textarea class="ckeditor form-control" name="content_en" style="width:100%;"><?php echo $row[content_en]; ?></textarea>
													</div>	
													<div class="form-group">
														<label class="control-label">Contact in French</label><br />
														<textarea class="ckeditor form-control" name="content_fr" style="width:100%;"><?php echo $row[content_fr]; ?></textarea>
													</div>	
																			
													
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-body">
													<div class="form-group">
														<label class="control-label">Youtub Link</label><br />
														<input class="form-control" name="vid_link" value="<?php echo $row[vid_link]; ?>" >
													</div>
													<div class="form-group">
														<label class="control-label">Video Title in English</label><br />
														<input class="form-control" name="vid_title_en" value="<?php echo $row[vid_title_en]; ?>" >
													</div>
													<div class="form-group">
														<label class="control-label">Video Title in French</label><br />
														<input class="form-control" name="vid_title_fr" value="<?php echo $row[vid_title_fr]; ?>" >
													</div>
													
													<div class="form-group">
														<label class="control-label">Video Contact in English</label><br />
														<textarea class="ckeditor form-control" name="vid_content_en" id="editor1" style="width:100%;"><?php echo $row[vid_content_en]; ?></textarea>
													</div>	
													<div class="form-group">
														<label class="control-label">Video Contact in French</label><br />
														<textarea class="ckeditor form-control" name="vid_content_fr" id="editor1" style="width:100%;"><?php echo $row[vid_content_fr]; ?></textarea>
													</div>												
																		
												</div>
											</div>
										</div>
										<hr />
											<div class="margin-top-10" align="center">
												<button name="sub" type="submit" value="Update" class="btn green"> Update</button>
												<a href="" class="btn default"> Cancel </a>
											</div>
											<br />
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