<?php
include '../common/queries.php';
include'../common/connectionPDO.php';

$obj = new Queries();

$sub = htmlentities($_POST['sub']);
$set = htmlentities($_POST['set']);
$sem = htmlentities($_POST['sem']);
echo '<body><form id="myform" action="view_select_sub_setQuestionBank.php" method="POST">
		<input type="hidden" name="sem" value="'.$sem.'">
		<input type="hidden" name="redirectPage" value="1">
		<input type="hidden" name="branchId" value="'.$obj->get_subjects_by_id($conn,$sub)->fetch()['branchId'].'">
		</form>';

if($obj->delete_set($conn,$set,$sem,$sub))
	echo '<script>alert("Set Deleted Successfully!");document.getElementById("myform").submit();</script>';
else
	echo '<script>alert("Error in deleting set!");window.location="select_sub_setQuestionBank.php";</script>';

?>