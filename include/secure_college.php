<?php
if(!isset($_SESSION)) session_start();
if($_SESSION['userdef'] != 2 && $_SESSION['userdef'] != 5)
	{header('Location:../index.php');die();}
?>