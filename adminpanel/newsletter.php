<?php
include "lib/head.php";
include "lib/header.php";
include "lib/left_menu.php";
?>
<?php
if($_POST['sub']=="Send_Email"){

$subject=$_POST[subject];
$msg=$_POST[msg];

require("class.phpmailer.php");

foreach($_POST['email'] as $to) {

$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "exco.smtpmail@gmail.com";
$mail->Password = "12345678u";
$mail->SetFrom("no_reply@your.com");
$mail->Subject = "$subject";
$mail->Body = "$msg";
$mailto = "$to";
$mail->AddAddress($mailto);	
if(!$mail->Send())
{
echo "Mailer Error: " . $mail->ErrorInfo;
}
}
echo "<script>window.location='newsletter.php?msg=success'</script>";
}
?>
<?php
if($_GET['action']=="del"){
$sql_status="DELETE FROM `newsletter` WHERE `id`='$_GET[id]'";
mysqli_query($con, $sql_status);
// mysql_query($sql_status);
echo"<script>window.location='newsletter.php?delete=success'</script>";
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
                                <a href="index.php">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Newsletter </span>
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
                    <h3 class="page-title"> Newsletter
                        <small>All Newsletter List</small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <div class="clearfix"></div>
					<div class="row">
						<?php
							if($_GET['msg']=="success"){
							?>
							<div class="alert alert-block alert-success fade in">
                                        <button type="button" class="close" data-dismiss="alert"></button>
                                        <p><strong class="alert-heading">Success!</strong> All Email Send has been done successfully</p>
                            </div>
							<?php } ?>
                    	<div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-social-dribbble font-green hide"></i>
                                            <span class="caption-subject font-dark bold">Email To User List</span>&nbsp;&nbsp;&nbsp;<a href="newsletter.php?view=All" class="btn btn-sm blue"><i class="fa fa-eye"></i> View All </a>
                                        </div>
                                    </div>
<?php	
// find out how many rows are in the table 

$sql_buy="SELECT COUNT(*) FROM `newsletter` ORDER BY `id` DESC";	
$result_buy = mysqli_query($con, $sql_buy) or trigger_error("SQL", E_USER_ERROR);
$r_buy = mysqli_fetch_row($result_buy);
// $result_buy = mysql_query($sql_buy) or trigger_error("SQL", E_USER_ERROR);
// $r_buy = mysql_fetch_row($result_buy);
$numrows_buy = $r_buy[0];

// number of rows to show per page
if($_GET[view]=="All"){
$rowsperpage_buy = 99999999999999;
}
else
{
$rowsperpage_buy = 100;
}
// find out total pages
$totalpages_buy = ceil($numrows_buy / $rowsperpage_buy);

// get the current page or set a default
if (isset($_GET['currentpage_buy']) && is_numeric($_GET['currentpage_buy'])) {
   // cast var as int
   $currentpage_buy = (int) $_GET['currentpage_buy'];
} else {
   // default page num
   $currentpage_buy = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage_buy > $currentpage_buy) {
   // set current page to last page
   $currentpage_buy = $totalpages_buy;
} // end if
// if current page is less than first page...
if ($currentpage_buy < 1) {
   // set current page to first page
   $currentpage_buy = 1;
} // end if

// the offset of the list, based on current page 
$offset_buy = ($currentpage_buy - 1) * $rowsperpage_buy;
?>
									<form action="" method="post" enctype="multipart/form-data">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover" id="table-pagination" data-toggle="table" data-height="299" data-search="true">
                                            <thead>
                                                <tr>
													<th  data-align="center" ><input type="checkbox" onclick="toggle(this);"> Check All</th>
                                                    <th data-field="Sl/No" data-align="center" data-sortable="true">Sl/No</th>
                                                    <th data-field="email" data-align="center" data-sortable="true">Email-Id</th>
													<th data-field="action" data-align="center" data-sortable="true">Action</th>
                                                </tr>
                                            </thead>
											<tbody>
												<?php
												if($_GET[currentpage_buy]=="1"){
												$a=0;
												}
												elseif($_GET[currentpage_buy]){
												$page=$_GET[currentpage_buy]-1;
												$a=150*$page;
												}
												$sql_emp="SELECT * FROM `newsletter` ORDER BY `id` DESC LIMIT $offset_buy, $rowsperpage_buy";
												$res_emp=mysqli_query($con, $sql_emp);
                        while($row_emp=mysqli_fetch_array($res_emp))
            //             $res_emp=mysql_query($sql_emp);
												// while($row_emp=mysql_fetch_array($res_emp))
												{
												$a++;
												?>
                                                <tr>
													<td><input type="checkbox" name="email[]" value="<?php echo $row_emp[email]; ?>" id="checkbox-<?php echo $emp; ?>"></td>
                                                    <td><?php echo $a; ?></td>
                                                    <td><?php echo $row_emp[email]; ?></td>
													<td><a href="newsletter.php?action=del&id=<?php echo $row_emp[id]; ?>" onclick="return confirm('Are you sure you want to delete this email ?');" class="btn btn-sm red"><i class="fa fa-times-circle"> Del</i></a></td>
                                                </tr>
												<?php } ?>
                                            </tbody>
                                        </table>
										<div align="center">
									<ul class="pagination">			
<?php
// range of num links to show
$range_buy = 9;

// if not on page 1, don't show back links
if ($currentpage_buy > 1) {
   // show << link to go back to page 1
   echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage_buy=1'><<</a></li> ";
   // get previous page num
   $prevpage_buy = $currentpage_buy - 1;
   // show < link to go back to 1 page
   echo "<li> <a href='{$_SERVER['PHP_SELF']}?currentpage_buy=$prevpage_buy'><</a> </li>";
} // end if 
else
{
echo "<li> <a><<</a> </li>";
echo "<li> <a><</a> </li>";
}
// loop to show links to range of pages around current page
for ($x = ($currentpage_buy - $range_buy); $x < (($currentpage_buy + $range_buy) + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $totalpages_buy)) {
      // if we're on current page...
      if ($x == $currentpage_buy) {
         // 'highlight' it but don't make a link
         echo " <li class='active'><a>$x</a></li> ";
      // if not current page...
      } else {
         // make it a link
         echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage_buy=$x'>$x</a></li> ";
      } // end else
   } // end if 
} // end for

// if not on last page, show forward and last page links        
if ($currentpage_buy != $totalpages_buy) {
   // get next page
   $nextpage_buy = $currentpage_buy + 1;
    // echo forward link for next page 
   echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage_buy=$nextpage_buy'>></a></li> ";
   // echo forward link for lastpage
   echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage_buy=$totalpages_buy'>>></a></li> ";
} // end if
else
{
echo "<li> <a>></a> </li>";
echo "<li> <a>>></a> </li>";
}
/****** end build pagination links ******/
?>
									</ul>
									</div>
                                    </div>
								</div>
									<div class="portlet box blue ">
										<div class="portlet-title">
											<div class="caption">
												<i class="fa fa-envelope"></i> Email </div>
											<div class="tools">
												<a href="" class="collapse" data-original-title="" title=""> </a>
												<a href="" class="reload" data-original-title="" title=""> </a>
											</div>
										</div>
										<div class="portlet-body form">
										<!-- CHANGE PASSWORD TAB -->
											
											<div class="form-body">
												<div class="form-group">
													<label class="control-label">Subject: </label>
													<input type="text" class="form-control" name="subject" style="width:60%;" />
												</div>
												<div class="form-group">
													<textarea class="ckeditor form-control" name="msg" id="editor2" style="width:500px;" placeholder="Enter Discription"></textarea>
												</div>
											</div>
												<div class="form-actions" align="right">
													<button type="submit" name="sub" value="Send_Email" class="btn purple"><i class="fa fa-paper-plane"></i> Send</button>
												</div>
											
										</div>
									</div>
									</form>
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
<script>
function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
</script>