<?php
include "lib/head.php";
include "lib/header.php";
include "lib/left_menu.php";
?>
<?php
$sql="SELECT *  FROM `contact` WHERE `id`='1'";
$res=mysqli_query($con, $sql);
$row=mysqli_fetch_array($res);
// $res=mysql_query($sql);
// $row=mysql_fetch_array($res);
?>
<?php
if($_POST[sub]=="submit"){
$title_en=addslashes($_POST[title_en]);
$discription_en=addslashes($_POST[discription_en]);
///
$title_fr=addslashes($_POST[title_fr]);
$discription_fr=addslashes($_POST[discription_fr]);

$update="UPDATE `contact` SET `address`='$_POST[address]',`phone`='$_POST[phone]',`email`='$_POST[email]',`facebook`='$_POST[facebook]',`gplus`='$_POST[gplus]',`twitter`='$_POST[twitter]',`latitude`='$_POST[latitude]',`longitude`='$_POST[longitude]',`title_en`='$title_en',`title_fr`='$title_fr',`discription_en`='$discription_en', `discription_fr`='$discription_fr' WHERE `id`='1'";
mysqli_query($con, $update);
// mysql_query($update);
echo "<script>window.location='contact_cms.php?msg=susses'</script>";
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
                                <span>Contact Cms</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title">Contact CMS
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
                                        <i class="fa fa-plus"></i> Contact CMS 
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
											<div class="form-group">
												<label class="control-label">Address</label><br />
												<input type="text" class="form-control" name="address" value="<?php echo $row[address]; ?>" style="width:50%;" /> 
											</div>	
											<div class="form-group">
												<label class="control-label">Phone No</label><br />
												<input type="text" class="form-control" name="phone" value="<?php echo $row[phone]; ?>" style="width:50%;" /> 
											</div>	
											<div class="form-group">
												<label class="control-label">Email Id</label><br />
												<input type="text" class="form-control" name="email" value="<?php echo $row[email]; ?>" style="width:50%;" /> 
											</div>
											<div class="form-group">
												<label class="control-label">Facebook Link</label><br />
												<input type="text" class="form-control" name="facebook" value="<?php echo $row[facebook]; ?>" style="width:50%;" /> 
												<font size="-1">Ex-https://www.facebook.com/</font>
											</div>
											<div class="form-group">
												<label class="control-label">Google+ Link</label><br />
												<input type="text" class="form-control" name="gplus" value="<?php echo $row[gplus]; ?>" style="width:50%;" /> 
												<font size="-1">Ex-https://plus.google.com/</font>
											</div>
											<div class="form-group">
												<label class="control-label">Twitter  Link</label><br />
												<input type="text" class="form-control" name="twitter" value="<?php echo $row[twitter]; ?>" style="width:50%;" /> 
												<font size="-1">Ex-https://www.twitter.com/</font>
											</div>
											<div class="form-group">
												<label class="control-label">Location Map Latitude</label><br />
												<input type="text" class="form-control" name="latitude" value="<?php echo $row[latitude]; ?>" style="width:50%;" /> 
											</div>
											<div class="form-group">
												<label class="control-label">Location Map Longitude</label><br />
												<input type="text" class="form-control" name="longitude" value="<?php echo $row[longitude]; ?>" style="width:50%;" /> 
											</div>
											<div class="form-group">
												 <label class="control-label">Contact Title in English</label>
                                                 <textarea class="form-control" name="title_en" rows="1" style="width:100%;"><?php echo $row[title_en]; ?></textarea>
											</div>
											<div class="form-group">
												 <label class="control-label">Contact Title in French</label>
                                                 <textarea class="form-control" name="title_fr" rows="1" style="width:100%;"><?php echo $row[title_fr]; ?></textarea>
											</div>	
											<div class="form-group">
												 <label class="control-label">Contact Discription in English</label>
                                                 <textarea class="ckeditor form-control" id="editor2" name="discription_en" rows="6" style="width:500px;"><?php echo $row[discription_en]; ?></textarea>
											</div>	
											<div class="form-group">
												 <label class="control-label">Contact Discription in French</label>
                                                 <textarea class="ckeditor form-control" id="editor2" name="discription_fr" rows="6" style="width:500px;"><?php echo $row[discription_fr]; ?></textarea>
											</div>		
											<div class="margin-top-10">
												<button name="sub" type="submit" value="submit" class="btn green"> Update</button>
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