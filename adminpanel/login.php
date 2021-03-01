<?php
include "lib/head.php";
include"lib/connection.php";
error_reporting(E_ALL & ~E_NOTICE);

if($_POST[sub]=="submit")
{
$unm=$_POST[username];
$pass=$_POST[password];
 $sql="SELECT * FROM  `admin` where `username` = '$_POST[username]' AND `password` = '$_POST[password]'";
$res=mysqli_query($con, $sql);
$rows=mysqli_fetch_array($res);
// $res=mysql_query($sql);
// $rows=mysql_fetch_array($res);
if(!$rows)
{
date_default_timezone_set("Asia/Kolkata");
	 $unm=$_POST[username];
	 $ip=$_SERVER["REMOTE_ADDR"];
	 $d=date("d-M-Y");
	 $t=date("h:i:s a");

	 $sql1="INSERT INTO `admin_login` (`id`, `username`, `ip_address`, `date`, `time`, `status`) VALUES (NULL, '$unm', '$ip', '$d', '$t', 'Unsuccessful Login')";
	 mysqli_query($con, $sql1);
	 // mysql_query($sql1);
	echo"<script>window.location='index.php?msg=Incorrect_username_or_Password!!'</script>";

	}
else
	{
	if($_POST[password]==$rows[password])
	{
	$_SESSION[adminusername]=$unm;
	 $_SESSION[check]=true;
     date_default_timezone_set("Asia/Kolkata");
	 $unm=$_POST[username];
	 $ip=$_SERVER["REMOTE_ADDR"];
	 $d=date("d-M-Y");
	 $t=date("h:i:s a");

	 $sql1="INSERT INTO `admin_login` (`id`, `username`, `ip_address`, `date`, `time`, `status`) VALUES (NULL, '$unm', '$ip', '$d', '$t', 'Successfully Login')";
	 mysqli_query($con, $sql1);
	 // mysql_query($sql1);
	echo"<script>window.location='home.php?Login_successfully!!!!'</script>";
	
	}
	else
	{
	$sql3="INSERT INTO `admin_login` (`id`, `username`, `ip_address`, `date`, `time`, `status`) VALUES (NULL, '$unm', '$ip', '$d', '$t', 'Unsuccessful Login')";
	 // mysql_query($sql3);
	 mysqli_query($con, $sql3);
	echo"<script>window.location='index.php?msg=Incorrect_username_or_Password!!'</script>";
	}
     
	}
}

?>
