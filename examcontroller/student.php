<?php
include '../common/queries.php';
include'../common/connectionPDO.php';

$obj = new Queries();

$sub = htmlentities($_POST['sub']);
$set = htmlentities($_POST['set']);
$sem = htmlentities($_POST['sem']);
$allow = htmlentities($_POST['allow']);
echo '<body><form id="myform" action="view_select_sub_setQuestionBank.php" method="POST">
		<input type="hidden" name="sem" value="'.$sem.'">
		<input type="hidden" name="redirectPage" value="1">
		<input type="hidden" name="branchId" value="'.$obj->get_subjects_by_id($conn,$sub)->fetch()['branchId'].'">
		</form>';
if($allow=='0')
	$a='dis';
if($obj->student_set($conn,$set,$sem,$sub,$allow))
	echo '<script>alert("Set '.$set.' is '.$a.'allowed for student view");document.getElementById("myform").submit();</script>';
else
	echo '<script>alert("Error in assigning set to student!");window.location="view_select_sub_setQuestionBank.php";</script>';
echo "</body>";
?>