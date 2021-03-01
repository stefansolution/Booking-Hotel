<?php
include "lib/head.php";
include "lib/header.php";
include "lib/left_menu.php";
?>
<?php
$sql="SELECT *  FROM `admin`";
$res=mysqli_query($con, $sql);
$row_p=mysqli_fetch_array($res);
// $res=mysql_query($sql);
// $row_p=mysql_fetch_array($res);
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
                                <span>Admin Profile</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Admin Profile | Account
                        <small>Admin account page</small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light ">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                                </div>
                                                <ul class="nav nav-tabs">
												<?php 
												if($_GET[t_id]=="1" OR $_GET[t_id]==""){
												?>
                                                    <li class="active"><a href="#tab_1_1" data-toggle="tab">Change Email Id</a></li>
												<?php } else { ?>
													<li><a href="#tab_1_1" data-toggle="tab">Change Email Id</a></li>
												<?php } ?>
												<?php 
												if($_GET[t_id]=="2"){
												?>
                                                    <li class="active"><a href="#tab_1_2" data-toggle="tab">Change Password</a></li>
												<?php } else { ?>
													<li><a href="#tab_1_2" data-toggle="tab">Change Password</a></li>
												<?php } ?>
												<?php 
												if($_GET[t_id]=="3"){
												?>
                                                    <li class="active"><a href="#tab_1_3" data-toggle="tab">Change Username</a></li>
												<?php } else { ?>
													<li><a href="#tab_1_3" data-toggle="tab">Change Username</a></li>
												<?php } ?>
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
<!-- PERSONAL INFO TAB -->
<?php
if($_POST['sub1']=="submit1"){
	
	$email=$_POST['email'];
	$id=$_POST['id'];
	
$sqls="UPDATE `admin` SET `email`='$email' WHERE `id`='$id'";
mysqli_query($sqls);
// mysql_query($sqls);
echo "<script>window.location='profile.php?msg=susses&t_id=1'</script>";
}
?>
<?php 
if($_GET[t_id]=="1" OR $_GET[t_id]==""){
?>
<div class="tab-pane active" id="tab_1_1">
<?php } else { ?>
<div class="tab-pane" id="tab_1_1">
<?php } ?>
    <form role="form" action="profile.php" method="post">
       
       <div class="form-group">
       		<label class="control-label">Email Id</label>
       		<input type="text" name="email" value="<?php echo $row_p['email']; ?>" placeholder="Please Input Your Email Id" class="form-control" style="width:500px;" /> 
	   </div>
       <input type="hidden" name="id" value="<?php echo $row_p['id']; ?>">
       <div class="margiv-top-10">
		<?php
		if($_SESSION['type']=="super_admin"){
		?>
       <button type="submit" name="sub1" value="submit1" class="btn green"> Save Changes </button>
	   <?php } ?>
       <a href="javascript:;" class="btn default"> Cancel </a>
       </div>
    </form>
	<br />
							<?php
							if($_GET['msg']=="susses"){
							?>
							<div class="alert alert-success">
                    			<button class="close" data-close="alert"></button>
                    			<span>Update <b>Successfully</b></span>
                			</div>	
							<?php	
							}
							?>
 </div>
<!-- END PERSONAL INFO TAB -->

<!-- CHANGE PASSWORD TAB -->
<script src="script.js"></script>
<script>
function pro2()
{ 
var old_pass=document.getElementById("old_pass").value;
     if(old_pass=="")
     {
      document.getElementById("pdiv2").innerHTML="<b>Please Enter The Old Password</b>";
      document.getElementById("pdiv2").style.color="red";
      return false;
     } 
var new_pass=document.getElementById("new_pass").value;
     if(new_pass=="")
     {
      document.getElementById("pdiv4").innerHTML="<b>Please Enter The New Password</b>";
      document.getElementById("pdiv4").style.color="red";
      return false;
     }
var new_pass=document.getElementById('new_pass').value;
	if(new_pass.length < 6)
		{
		document.getElementById('pdiv_pass').innerHTML="<font color='red'><b>Short passwords 6 characters.</pb></font>";
		return false;
		}
var con_pass=document.getElementById("con_pass").value;
     if(con_pass=="")
     {
      document.getElementById("pdiv5").innerHTML="<b>Please Enter The Confirm Password</>";
      document.getElementById("pdiv5").style.color="red";
      return false;
     }
if(new_pass != con_pass)
		{
		document.getElementById('pdiv_cpass').innerHTML="<font color='red'><b>Password does not match the confirm password.</b></font>";
		return false;
		}

}
function old_passr(){
document.getElementById('pdiv2').innerHTML="";
}
function new_passr(){
document.getElementById('pdiv4').innerHTML="";
document.getElementById('pdiv_pass').innerHTML="";
}
function con_passr(){
document.getElementById('pdiv5').innerHTML="";
document.getElementById('pdiv_cpass').innerHTML="";
}
</script>
<?php
						if($_POST[sub2]=="submit2")
						{
						$old_pass=$_POST[old_pass];
						
						$sql_password="SELECT *  FROM `admin` WHERE `password`='$old_pass'";
            // $res_password=mysql_query($sql_password);
            // $row_password=mysql_fetch_array($res_password);
						$res_password=mysqli_query($con, $sql_password);
						$row_password=mysqli_fetch_array($res_password);
						if(!$row_password){
						echo"<script>window.location='profile.php?password=error&t_id=2'</script>";
						}
						else{
						$con_pass=$_POST[con_pass];						
						$sql_row="UPDATE `admin` SET `password`='$con_pass' WHERE `id`='1'";
							mysqli_query($con, $sql_row);
              // mysql_query($sql_row);
							echo"<script>window.location='profile.php?password=success&t_id=2'</script>";
						} }
?>
<?php 
if($_GET[t_id]=="2"){
?>
<div class="tab-pane active" id="tab_1_2">
<?php } else { ?>
<div class="tab-pane" id="tab_1_2">
<?php } ?>

	<form action="" method="post" onsubmit="return pro2()">
		<div class="form-group">
        	<label class="control-label">Current Password</label>
            <input type="password" name="old_pass" id='old_pass' onKeyPress="return old_passr()" placeholder="please input the Current password" class="form-control" style="width:500px;" /> 
			<div id='pdiv2'></div>
        </div>
        <div class="form-group">
        	<label class="control-label">New Password</label>
            <input type="password" name="new_pass" id="new_pass" onKeyPress="return new_passr()" placeholder="please input the new password" class="form-control" style="width:500px;" />
        </div>
		<div id="pdiv4"></div><div id="pdiv_pass"></div>
        <div class="form-group">
        	<label class="control-label">Re-type New Password</label>
            <input type="password" name="con_pass" id="con_pass" onKeyPress="return con_passr()" placeholder="please input the confirm password" class="form-control" style="width:500px;" /> 
        </div>
		<div id="pdiv5"></div><div id="pdiv_cpass"></div>
        <div class="margin-top-10">
		<?php
		if($_SESSION['type']=="super_admin"){
		?>
        	<button type="submit" class="btn green" name="sub2" value="submit2"> Change Password </button>
		<?php } ?>
            <a href="javascript:;" class="btn default"> Cancel </a>
        </div>
    </form>
	<br />
							<?php
							if($_GET['password']=="success"){
							?>
							<div class="alert alert-success">
          			<button class="close" data-close="alert"></button>
          			<span>Your Password has been Change <b>Successfully</b></span>
      			  </div>	
							<?php	
							}
							?>
	<br />
							<?php
							if($_GET['password']=="error"){
							?>
							<div class="alert alert-danger">
          			<button class="close" data-close="alert"></button>
          			<span>your current password is incorrect. <b>please try again</b></span>
      				</div>	
							<?php	
							}
							?>
</div>
<!-- END CHANGE PASSWORD TAB -->
<!-- CHANGE PASSWORD TAB -->
<script>
function pro3()
{ 
var old_username=document.getElementById("old_username").value;
     if(old_username=="")
     {
      document.getElementById("udiv2").innerHTML="<b>Please Enter The Old Username</b>";
      document.getElementById("udiv2").style.color="red";
      return false;
     } 
var new_username=document.getElementById("new_username").value;
     if(new_username=="")
     {
      document.getElementById("udiv4").innerHTML="<b>Please Enter The New Username</b>";
      document.getElementById("udiv4").style.color="red";
      return false;
     }
var con_username=document.getElementById("con_username").value;
     if(con_username=="")
     {
      document.getElementById("udiv5").innerHTML="<b>Please Enter The Confirm Username</b>";
      document.getElementById("udiv5").style.color="red";
      return false;
     }
if(new_username != con_username)
		{
		document.getElementById('udiv_cusername').innerHTML="<font color='red'><b>Username does not match the confirm Username.</b></font>";
		return false;
		}

}
function old_username(){
document.getElementById('udiv2').innerHTML="";
}
function new_username(){
document.getElementById('udiv4').innerHTML="";
document.getElementById('udiv_username').innerHTML="";
}
function con_username(){
document.getElementById('udiv5').innerHTML="";
document.getElementById('udiv_username').innerHTML="";
}
</script>
<?php
						if($_POST[sub3]=="submit3")
						{
						$old_username=$_POST[old_username];
						
						$sql_username="SELECT *  FROM `admin` WHERE `username`='$old_username'";
						// $res_username=mysql_query($sql_username);
      //       $row_username=mysql_fetch_array($res_username);
            $res_username=mysqli_query($con, $sql_username);
						$row_username=mysqli_fetch_array($res_username);
						if(!$row_username){
						echo"<script>window.location='profile.php?username=error&t_id=3'</script>";
						}
						else{
						$con_username=$_POST[con_username];						
						$sql_res="UPDATE `admin` SET `username`='$con_username' WHERE `id`='1'";
							mysqli_query($con, $sql_res);
              // mysql_query($sql_res);
							echo"<script>window.location='profile.php?username=success&t_id=3'</script>";
						} }
?>
<?php 
if($_GET[t_id]=="3"){
?>
<div class="tab-pane active" id="tab_1_3">
<?php } else { ?>
<div class="tab-pane" id="tab_1_3">
<?php } ?>
 <form action="" method="post" onsubmit="return pro3()">
                                                            <div class="form-group">
                                                                <label class="control-label">Current Username</label>
                                                                <input type="text" name="old_username" id='old_username' onKeyPress="old_username()" placeholder="please input the Current Username" class="form-control" style="width:500px;" /> 
															</div>
															<div id="udiv2"></div>
                                                            <div class="form-group">
                                                                <label class="control-label">New Username</label>
                                                                <input type="text" name="new_username" id="new_username" onKeyPress="return new_username()" placeholder="please input the new Username" class="form-control" style="width:500px;" /> 
															</div>
															<div id="udiv4"></div>
                                                            <div class="form-group">
                                                                <label class="control-label">Re-type New Username</label>
                                                                <input type="text" name="con_username" id="con_username" onKeyPress="return con_username()" placeholder="please input the confirm Username" class="form-control" style="width:500px;" /> 
															</div>
															<div id="udiv5"></div>
															<div id="udiv_cusername"></div>
                                                            <div class="margin-top-10">
																<?php
																if($_SESSION['type']=="super_admin"){
																?>
                                                                <button type="submit" name="sub3" value="submit3" class="btn green"> Change Username </button>
																<?php } ?>
                                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                                            </div>
</form>
	
							<?php
							if($_GET['username']=="success"){
							?>
							<br />
							<div class="alert alert-success">
                    			<button class="close" data-close="alert"></button>
                    			<span>Your Username has been Change <b>Successfully</b></span>
                			</div>	
							<?php	
							}
							?>
	
							<?php
							if($_GET['username']=="error"){
							?>
							<br />
							<div class="alert alert-danger">
                    			<button class="close" data-close="alert"></button>
                    			<span>your current Username is incorrect. <b>please try again<b></span>
                				</div>	
							<?php	
							}
							?>
</div>
<!-- END CHANGE PASSWORD TAB -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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