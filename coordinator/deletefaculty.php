<?php
	include '../include/secure_coord.php';
	include '../common/connectsionPDO.php';
	include '../common/queries.php';
	
	$obj = new Queries();
?>

<?php
if(isset($_POST['facId']) && isset($_POST['subId'])) {
	$facId = htmlentities($_POST['facId']);
	$subId = htmlentities($_POST['subId']);

	$obj->delete_faculty_subject($conn, $facId, $subId);
	
}


?>