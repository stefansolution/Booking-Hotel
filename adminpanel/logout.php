<?php
include "lib/head.php";
 if($_SESSION['adminusername'])
 {
unset($_SESSION['adminusername']);
session_destroy();
 header("Location:index.php");
 }
 else
{
session_destroy();
   header("Location:index.php");
 }
?>
