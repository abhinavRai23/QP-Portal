<?php
include '../include/secure_coord.php';
require_once '../common/connectionPDO.php';
$id = $_POST['i'];
$type = $_POST['t'];

if($type=='S')
		echo setQB($conn,$id);
if($type=='U')
		echo unsetQB($conn,$id);
if($type=='D')
		echo deleteQB($conn,$id);

function setQB($conn,$id){
	$sql = "UPDATE questions SET SQB='1' WHERE id=:id";
	$run=$conn->prepare($sql);
	$run->bindParam(':id', $id);
	if($run->execute())
		return 1;
	else
		return 0;
}
function unsetQB($conn,$id){
	$sql = "UPDATE questions SET SQB='0',QB='0' WHERE id=:id";
	$run=$conn->prepare($sql);
	$run->bindParam(':id', $id);
	if($run->execute())
		return 1;
	else
		return 0;
}
function deleteQB($conn,$id){
	$sql = "DELETE FROM questions WHERE id=:id";
	$run=$conn->prepare($sql);
	$run->bindParam(':id', $id);
	if($run->execute())
		return 1;
	else
		return 0;
}




?>