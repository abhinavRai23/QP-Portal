<?php
require_once 'common/connectionPDO.php';
require_once 'common/queries.php';
$obj = new Queries;
if(isset($_POST['user'])){
	echo $user = $_POST['user'];
	echo $pass = $_POST['password'];
	$obj->loginfaculty($conn,$user,$pass);
}
// $conn = null;
?>
