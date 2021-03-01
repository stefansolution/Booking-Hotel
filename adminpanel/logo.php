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
if($row[logo]){
$path = "../";
unlink($path.$row[logo]);
}
$link="upload/".time()."-".$_FILES[img][name];
$link1="../upload/".time()."-".$_FILES[img][name];
copy($_FILES[img][tmp_name],$link1);
}
else
{
$link=$row[logo];
}
$fcon_fr=addslashes($_POST[fcon_fr]);
$fcon_en=addslashes($_POST[fcon_en]);

$update="UPDATE `cms` SET `logo`='$link', `logo_con_fr`='$fcon_fr', `logo_con_en`='$fcon_en' WHERE `id`='1'";
mysqli_query($con, $update);
// mysql_query($update);
echo "<script>window.location='logo.php?msg=susses'</script>";
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
                                <span>Logo</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title">Site Logo
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
                                        <i class="fa fa-plus"></i> Site Logo 
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
												<label class="control-label">Site Logo Image</label><br />
												<img src="../<?php echo $row[logo]; ?>" style="width:500px;" height="300px;" /><br />
												<input type="file" class="form-control" name="img" style="width:500px;" /> 
												<font size="-1"  color="#FF0000">200X40 Image Size</font>
											</div>
											<div class="form-group">
												<label class="control-label">Footer Logo Content French</label><br />
												<textarea class="form-control" name="fcon_fr" style="width:500px;"><?php echo $row[logo_con_fr]; ?></textarea>
											</div>
											<div class="form-group">
												<label class="control-label">Footer Logo Content English</label><br />
												<textarea class="form-control" name="fcon_en" style="width:500px;"><?php echo $row[logo_con_en]; ?></textarea>
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