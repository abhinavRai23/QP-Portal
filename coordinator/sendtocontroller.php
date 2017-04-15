<?php
include '../include/secure_coord.php';
include '../common/session.php';
include '../common/connectionPDO.php';
include '../common/queries.php';
error_reporting(E_ALL);
$obj = new Queries();

$sub =$_POST['sub'];
$sem =$_POST['sem'];

$sql = "UPDATE info_subject SET controller='1' WHERE subjectId=:sub AND semester=:sem";
$run = $conn->prepare($sql);
$run->bindParam(':sub', $sub);
$run->bindParam(':sem', $sem);
if($run->execute())
    echo "1";
else
    echo "0";

?>