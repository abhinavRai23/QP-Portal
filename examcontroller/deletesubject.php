<?php

$sid = $_POST['sid'];
$bid = $_POST['bid'];
$i = $_POST['i'];
$v= $_POST['v'];

	include '../include/secure_exam.php';
	include '../common/connectionPDO.php';
	include '../common/queries.php';
	
	
	$obj = new Queries();

$obj->deletesubject($conn, $sid, $bid, $v);
if($v == 1)
	echo '<button class="btn btn-outline btn-danger" name="appdisapp" onclick="deletesubject(\''.$bid.'\',\''.$sid.'\',\''.$i.'\')">Delete</button>';
if($v == 0)
	echo '<button class="btn btn-outline btn-info" name="appdisapp" onclick="undeletesubject(\''.$bid.'\',\''.$sid.'\',\''.$i.'\')">Activate</button>';
?>