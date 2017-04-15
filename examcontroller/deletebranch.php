<?php

$cid = $_POST['cid'];
$bid = $_POST['bid'];

	include '../include/secure_exam.php';
	include '../common/connectionPDO.php';
	include '../common/queries.php';
	
	
	$obj = new Queries();

$obj->deletebranch($conn, $cid, $bid);
?>