<?php
	include '../include/secure_coord.php';
	include '../common/connectionPDO.php';
	include '../common/queries.php';
	
	$obj = new Queries();
?>

<?php
if(isset($_POST['facId'])){

  $facultyId=$_POST['facId'];
 $subjectId=$_POST['subId'];
 $approve=$_POST['val'];
 $id=$_POST['id'];
$obj->update_approval($conn, $facultyId, $subjectId, $approve);
if($approve==2){
echo '<button class="btn btn-outline btn-success" name="appdisapp" onclick="approve(\''.$facultyId.'\',\''.$subjectId.'\',\''.$id.'\')">';
echo "<i  class='fa fa-check '></i></button>";
}

if($approve==1){
echo '<button  class="btn btn-outline btn-danger" name="appdisapp" onclick="disApprove(\''.$facultyId.'\',\''.$subjectId.'\',\''.$id.'\')">';
											echo "<i  class='fa fa-remove'></i></button>";
 }             
}
?>