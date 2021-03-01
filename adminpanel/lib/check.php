<?php
include "head.php";
error_reporting(E_ALL & ~E_NOTICE);
if($_SESSION[check]!=true)
{
	echo"<script>window.location='index.php?msg=login_first'</script>";
}
?>