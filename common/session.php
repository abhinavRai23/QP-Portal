<?php
if(!isset($_SESSION))
	session_start();
if(empty($_SESSION['id']))
	header('location:../common/logout.php');
else{
	$id = $_SESSION['id'];
	$userdef = $_SESSION['userdef'];
}
?>