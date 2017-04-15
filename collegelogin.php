<?php
require_once 'common/connectionPDO.php';
require_once 'common/queries.php';
$obj = new Queries;
if(isset($_POST['user'])){
	$user = $_POST['user'];
	$pass = $_POST['password'];
	$obj->logincollege($conn,$user,$pass);
}
// $conn = null;
?>