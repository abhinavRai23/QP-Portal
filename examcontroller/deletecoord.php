<?php
	include '../common/connectionPDO.php';
	include '../common/queries.php';
	include '../include/secure_exam.php';
	
	$obj = new Queries();
?>

<?php
if(isset($_POST['userId'])) {
	$cid = htmlentities($_POST['userId']);
	$obj->delete_user($conn, $cid);
}


?>