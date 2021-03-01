<?php
include "lib/head.php";
include "lib/header.php";
include "lib/left_menu.php";
?>
<?php
if($_POST['sub']=="Update_slider"){

$sql_sli="SELECT *  FROM `slider` WHERE `id`='$_POST[s_id]'";
$res_sli=mysqli_query($con, $sql_sli);
$row_sli=mysqli_fetch_array($res_sli); 
// $res_sli=mysql_query($sql_sli);
// $row_sli=mysql_fetch_array($res_sli); 

if($_FILES[img][name])
{
if($row_sli[image]){
$path = "../";
unlink($path.$row_sli[image]);
}
$link="upload/".time()."-".$_FILES[img][name];
$link1="../upload/".time()."-".$_FILES[img][name];
copy($_FILES[img][tmp_name],$link1);
}
else
{
$link=$row_sli[image];
}
$sql_update="UPDATE `slider` SET `image`='$link', `sdis_en`='$_POST[sdis_en]',`sdis_fr`='$_POST[sdis_fr]',`ldis_en`='$_POST[ldis_en]', `ldis_fr`='$_POST[ldis_fr]' WHERE `id`='$_POST[s_id]'";
mysqli_query($sql_update);
// mysql_query($sql_update);
echo"<script>window.location='slider.php?add=success'</script>";
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
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Slider </span>
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
                    <h3 class="page-title"> Slider
                        <small>Update Slider </small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="clearfix"></div>
					<div class="row">
                    	<div class="col-md-12">
							<?php
							if($_GET['add']=="success"){
							?>
							<div class="alert alert-block alert-success fade in">
                                        <button type="button" class="close" data-dismiss="alert"></button>
                                        <p><strong class="alert-heading">Success!</strong> Slider Update has been done successfully</p>
                            </div>
							<?php } ?>
							<div class="note note-danger note-bordered">
								<h2 align="center">Please Choose Slider. No</h2>
										<div class="form-body">
											<div class="row">
												<div class="col-md-3" >	</div>
												<div class="col-md-6" >	
													<div class="form-group">
														<select id="single" name="client" class="form-control select2" onchange="GenericAjaxFunction('ajax_slider.php?s_id='+this.value,'show_dtl',0)" required>
																<option>Select Slider</option>
																<option value="1">Slider 1</option>
																<option value="2">Slider 2</option>
																<option value="3">Slider 3</option>
																<option value="4">Slider 4</option>
														</select>												
													</div>
												</div>
												<div class="col-md-3" >	</div>
											</div>
										</div>
							</div>
                                <div id="show_dtl"></div>
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