<?php
include '../common/queries.php';
include'../common/connectionPDO.php';

$obj = new Queries();

$sub = htmlentities($_POST['sub']);
$set = htmlentities($_POST['set']);
$sem = htmlentities($_POST['sem']);

if($obj->delete_set($conn,$set,$sem,$sub))
	echo '<script>alert("Set Deleted Successfully!");window.location="select_sub_setQuestionBank.php";</script>';
else
	echo '<script>alert("Error in deleting set!");window.location="select_sub_setQuestionBank.php";</script>';

?>