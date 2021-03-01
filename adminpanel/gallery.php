<?php
include "lib/head.php";
include "lib/header.php";
include "lib/left_menu.php";
?>
<?php
if($_GET['action']=="del"){

$sql="SELECT *  FROM `gallery` WHERE `id`='$_GET[gid]'";
$res=mysqli_query($con, $sql);
$row=mysqli_fetch_array($res);
// $res=mysql_query($sql);
// $row=mysql_fetch_array($res);
if($row[image]){
$path = "../";
unlink($path.$row[image]);
}

$sql_del1="DELETE FROM `gallery` WHERE `id`='$_GET[gid]'";
mysqli_query($con, $sql_del1);
// mysql_query($sql_del1);
echo"<script>window.location='gallery.php?del=success'</script>";
}
?>
<?php
if($_POST[sub]=="submit"){

if($_FILES[img][name])
{
$link="upload/".time()."-".$_FILES[img][name];
$link1="../upload/".time()."-".$_FILES[img][name];
copy($_FILES[img][tmp_name],$link1);
}
$update="INSERT INTO `gallery`(`type`,`title_en`,`title_fr`,`image`) VALUES ('$_POST[type]','$_POST[title_en]','$_POST[title_fr]','$link')";
mysqli_query($con, $update);
// mysql_query($update);
echo "<script>window.location='gallery.php?msg=susses'</script>";
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
                                <span>Gallery CMS</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Gallery CMS
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
							<?php
							if($_GET['del']=="success"){
							?>
							<div class="alert alert-block alert-success fade in">
                                        <button type="button" class="close" data-dismiss="alert"></button>
                                        <p><strong class="alert-heading">Success!</strong> Product Delete has been done successfully</p>
                            </div>
							<?php } ?>
						<div class="portlet box blue ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-plus"></i> Gallery CMS 
									</div>
                                    <div class="tools">
                                        <a href="" class="collapse" data-original-title="" title=""> </a>
                                        <a href="" class="reload" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form" align="center">
									<!-- CHANGE PASSWORD TAB -->
										<form action="" method="post" enctype="multipart/form-data">
										<div class="form-body">
											<div class="form-group">
												<label class="control-label">Gallery Image Type</label>
												<select class="form-control" name="type" style="width:500px;">
													<option value="restaurant">Patio</option>
													<option value="bars">Terrase</option>
													<option value="pool">Chambres</option>
													
												</select>
											</div>
											<div class="form-group">
												<label class="control-label">Gallery Image Title in English</label>
												<input type="text" class="form-control" name="title_en" style="width:500px;" /> 
											</div>
											<div class="form-group">
												<label class="control-label">Gallery Image Title in French</label>
												<input type="text" class="form-control" name="title_fr" style="width:500px;" /> 
											</div>
											<div class="form-group">
												<label class="control-label">Gallery Image</label>
												<input type="file" class="form-control" name="img" style="width:500px;" /> 
												<font size="-1"  color="#FF0000">700X520 Image Size</font>
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
						<div class="portlet-body">
							<table id="table-pagination" data-toggle="table" data-url="" data-height="380" data-pagination="true">
								<thead>
									<tr>
										<th data-field="id" data-align="center" data-sortable="true">Sl/No</th>
										<th data-field="Image Type" data-align="center" data-sortable="true">Image Type</th>
										<th data-field="Image title English" data-align="center" data-sortable="true">Image Titles English</th>
										<th data-field="Image title French" data-align="center" data-sortable="true">Image Titles French</th>
										<th data-field="Image" data-align="center" data-sortable="true">Image</th>
										<th data-field="Action" data-align="center" data-sorter="priceSorter">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql_gallery="SELECT * FROM `gallery` ORDER BY `id` DESC";
									// $res_gallery=mysql_query($sql_gallery);
									// while($row_gallery=mysql_fetch_array($res_gallery))
									$res_gallery=mysqli_query($con, $sql_gallery);
									while($row_gallery=mysqli_fetch_array($res_gallery))
									{
									$c++;
									?>
								
									<tr>
										<td><?php echo $c; ?></td>
										<td><?php echo $row_gallery[type];?></td>
										<td><?php echo $row_gallery[title_en];?></td>
										<td><?php echo $row_gallery[title_fr];?></td>
										<td><img src="../<?php echo $row_gallery[image];?>" style="height:70px; width:180px;"  /></td>
										<td><a href="gallery.php?action=del&gid=<?php echo $row_gallery[id];?>" onclick="return confirm('Are you sure you want to delete this Image ?');" class="btn btn-sm red"><i class="fa fa-times-circle"> Del</i></a></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
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