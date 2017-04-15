<?php
include 'common/session.php';
$userdef = $_SESSION['userdef'];
if($userdef == 0)
	header('Location:examcontroller/index.php');
if($userdef == 1)
	header('Location:coordinator/index.php');
if($userdef == 2 || $userdef == 5)
	header('Location:collegehead/index.php');
if($userdef == 3)
	header('Location:faculty/index.php');

?>