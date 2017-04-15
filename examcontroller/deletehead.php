<?php
	include '../include/secure_exam.php';
	include '../common/connectionPDO.php';
	include '../common/queries.php';
	
	
	$obj = new Queries();
?>

<?php
if(isset($_POST['collegeId'])) {
	$cid = htmlentities($_POST['collegeId']);
	$obj->delete_collegehead($conn, $cid);
}


?>