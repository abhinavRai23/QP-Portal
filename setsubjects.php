<?php 
include 'common/connectionPDO.php';
include 'common/queries.php';

$obj = new Queries();
$bid = $_POST['branch'];
$sem = $_POST['semester'];
$sublist = $obj->get_subjects_by_branch_sem($conn, $bid, $sem);
while($row = $sublist->fetch()) {
	$subid = $row['subjectId'];
	$subname = $row['subjectName'];
	echo "<option value='$subid'>$subname ($subid)</option>";	
}


?>