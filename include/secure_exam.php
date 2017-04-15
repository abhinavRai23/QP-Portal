<?php
if(!isset($_SESSION)) session_start();
if($_SESSION['userdef'] != 0)
	{header('Location:../index.php');die();}
?>