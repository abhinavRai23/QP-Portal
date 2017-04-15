<?php 
include '../common/connectionPDO.php';
include '../common/queries.php';

$obj = new Queries();
$set = $_POST['set'];
 $sem=$_POST['sem'];
 $sub=$_POST['sub'];
$i=0;
$sql="SELECT * FROM  paper_pattern WHERE sem=:sem AND subject=:sub";
$run=$conn->prepare($sql);
$run->bindParam(':sem',$sem);
$run->bindParam(':sub',$sub);
$run->execute();

while($p = $run->fetch()){
	if($p[0]==$set){
		$i=$i+1;;
	}

}
if($i>0){
 echo 1;
}
else{
	echo 0;
}





?>