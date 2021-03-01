<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED );
date_default_timezone_set("Asia/Dhaka"); 

$con=mysqli_connect("localhost","root","","riadmazaya_new");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . MySQLli_connect_error();
}
mysqli_select_db($con, 'riadmazaya_new');
?>
