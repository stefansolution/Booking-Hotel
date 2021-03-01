<?php
session_start();
include "lib/connection.php";
?>
<style>
.buttons {
    background-color: #FF7B4E;
    border: none;
	width:100%;
    color: white;
    padding: 4px 5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    margin: 4px 2px;
    cursor: pointer;
}
.buttons, a:hover {
color:#FFFFFF;
}
</style>
<?php
if($_GET[room_no])
{
$_SESSION['room_no']=$_GET['room_no'];
$sql="SELECT *  FROM `room` WHERE `id`='$_GET[room_no]'";
$res=mysqli_query($con, $sql);
$row=mysqli_fetch_array($res);
// $res=mysql_query($sql);
// $row=mysql_fetch_array($res);
?>
<table>
	<tr style="border: 1px solid #000000;  border-color:#ff0000;">
		<td class="price"><h4 style="text-decoration: underline;"><?php echo $row[title]; ?></h4></td>
	</tr>
	<tr style="border: 1px solid #000000;  border-color:#ff0000;">
		<td class="price"><?php if($_SESSION['ln']=="en"){?> Basse saison<?php } if($_SESSION['ln']=="fr"){?> Low season<?php } ?> : <?php echo $row[price1]; ?> </td>
	</tr>
	<tr style="border: 1px solid #000000;  border-color:#ff0000;">
		<td class="price"><?php if($_SESSION['ln']=="en"){?> Moyenne saison<?php } if($_SESSION['ln']=="fr"){?> Average season<?php } ?> : <?php echo $row[price2]; ?> </td>
	</tr >
	<tr style="border: 1px solid #000000;  border-color:#ff0000;">
		<td class="price"><?php if($_SESSION['ln']=="en"){?> Haute Saison<?php } if($_SESSION['ln']=="fr"){?> High season<?php } ?> : <?php echo $row[price3]; ?> </td>
	</tr>
	<tr>
		<td colspan="4"><h3 align="center"><font color="#FF7B4"> </font></h3></td>
	</tr>
	
	<tr>
		<td colspan="4"><a href="make_reservation.php" class="button"><?php if($_SESSION['ln']=="en"){?> Continuer<?php } if($_SESSION['ln']=="fr"){?> Carry on<?php } ?> </a></td>
	</tr>
</table>
<?php
}
?>