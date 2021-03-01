<?php
include "lib/connection.php";
if($_GET[s_id]){

$sql="SELECT *  FROM `about_slider` WHERE `id`='$_GET[s_id]'";
$res=mysqli_query($con, $sql);
$row=mysqli_fetch_array($res);
// $res=mysql_query($sql);
// $row=mysql_fetch_array($res);
if($row){
?>
<div class="portlet box blue ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-plus"></i> Slider <?php echo $row[id]; ?> </div>
                                    <div class="tools">
                                        <a href="" class="collapse" data-original-title="" title=""> </a>
                                        <a href="" class="reload" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form role="form" method="post" action="" enctype="multipart/form-data">
										<div class="form-body">
										<div class="row">
											<div class="col-md-12">	
											<img src="../<?php echo $row[image]; ?>" style="width:100%; height:300px;" />
											</div>
                    						<div class="col-md-12">	
												<div class="form-group has-success">
													<label class="control-label"><strong>Slider Image</strong><font color="#FF0000">*</font></label>
													<input type="file" class="form-control" name="img"> 
												</div>
												<font size="-1" color="#FF0000">Image Size 1900x920</font>
											</div>
										</div>
											<input type="hidden" name="s_id" value="<?php echo $row[id]; ?>" />
										</div>
                                        <div class="form-actions" align="right">
                                            <a href="" class="btn default">Cancel</a>
                                            <button type="submit" name="sub" value="Update_slider" class="btn purple">Update</button>
                                        </div>
                                    </form>
</div>
<?php
}}
?>
