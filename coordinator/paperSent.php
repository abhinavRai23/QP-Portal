<?php
include '../common/queries.php';
include'../common/connectionPDO.php';
$obj = new Queries();

if(!isset($_POST['set']) || !isset($_POST['sub']) || !isset($_POST['sem'])){
	echo '0';
	die();
}

 $pattern_detail = $obj->get_paper_details($conn, $set, $sem, $sub)->fetch();
 
if($pattern_detail['controller']=='1'){
	echo "0";
	die();
}


$set = $_POST['set'];
$sem = $_POST['sem'];
$sub = $_POST['sub'];
echo $obj->paperSent($conn,$set,$sem,$sub);

?>