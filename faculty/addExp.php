<?php
require ('../common/connectionPDO.php');
require ('../common/queries.php');

$fac=$_POST['userId'];
$sub=$_POST['sub'];
$exp=$_POST['val'];
echo $exp;

$sql = "UPDATE subjects SET experience=:exp WHERE userid=:id AND subjectId=:sub";
        $run = $conn->prepare($sql);
        $run->bindParam(':id', $fac);
        $run->bindParam(':exp', $exp);
        $run->bindParam(':sub', $sub);
        $run->execute();
?>