<?php
include "lib/head.php";
include "lib/header.php";
include "lib/left_menu.php";
?>
<?php
$sql="SELECT *  FROM `cms` WHERE `id`='1'";
$res=mysqli_query($con, $sql);
$row=mysqli_fetch_array($res);
// $res=mysql_query($sql);
// $row=mysql_fetch_array($res);
?>
<?php
if($_POST[sub]=="submit"){

if($_FILES[img][name])
{
if($row[img]){
$path = "../";
unlink($path.$row[img]);
}
$link1="upload/".time()."-".$_FILES[img][name];
$link11="../upload/".time()."-".$_FILES[img][name];
copy($_FILES[img][tmp_name],$link11);
}
else
{
$link1=$row[img];
}
//
$title_en=addslashes($_POST[title_en]);
$content_en=addslashes($_POST[content_en]);
////
$title_fr=addslashes($_POST[title_fr]);
$content_fr=addslashes($_POST[content_fr]);
///

$update="UPDATE `cms` SET `img`='$link1',`title_en`='$title_en', `title_fr`='$title_fr',`content_en`='$content_en', `content_fr`='$content_fr' WHERE `id`='1'";
mysqli_query($con, $update);
// mysql_query($update);
echo "<script>window.location='home_cms.php?msg=susses'</script>";
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
                                <span>Home CMS</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title">Home CMS
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
                                        <i class="fa fa-plus"></i> Home CMS 
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
												<div class="form-group" align="center">
													<label class="control-label">Image</label><br />
													<img src="../<?php echo $row[img]; ?>" style="width:500px;" height="200px;" /><br />
													<input type="file" class="form-control" name="img" style="width:500px;" /> 
													<font size="-1"  color="#FF0000">400X300 Image Size</font>
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
													<textarea class="form-control" name="content_en" style="width:100%;"><?php echo $row[content_en]; ?></textarea>
												</div>
												<div class="form-group">
													<label class="control-label">Contact in French</label><br />
													<textarea class="form-control" name="content_fr" style="width:100%;"><?php echo $row[content_fr]; ?></textarea>
												</div>												
													
											</div>
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