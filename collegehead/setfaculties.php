<?php 
include '../include/secure_college.php';
include '../common/session.php';
include '../common/connectionPDO.php';
include '../common/queries.php';


$obj = new Queries();
$branch = $_POST['branch'];
// $sem = $_POST['sem'];
$collegeId = $_SESSION['id'];
$faclist = $obj->get_faculty_by_branch($conn, $collegeId, $branch);
while($row = $faclist->fetch()) {
	$facid = $row['id'];
	$facname = $row['name'];
	echo "<option value='$facid'>$facname ($facid)</option>";	
}


?>