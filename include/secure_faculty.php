<?php
if(!isset($_SESSION)) session_start();
if($_SESSION['userdef'] != 3)
	{header('Location:../index.php');die();}
?>