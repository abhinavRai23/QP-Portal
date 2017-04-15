<?php
	//include '../include/secure_college.php';
	include '../common/connectionPDO.php';
	include '../common/queries.php';
	
	$obj = new Queries();
?>

<?php
if(isset($_POST['facId']) && isset($_POST['subId'])) {
	$facId = htmlentities($_POST['facId']);
	$subId = htmlentities($_POST['subId']);
   delete_faculty_subject($conn, $facId, $subId) ;

	// $obj->delete_faculty_subject($conn, $facId, $subId);
	
}


?>
<?php

  function delete_faculty_subject($conn, $facId, $subId) {
        $sql = "DELETE FROM subjects WHERE userId=:userId AND subjectId=:subjectId";
        $run = $conn->prepare($sql);

        $run->bindParam(':userId', $facId);
        $run->bindParam(':subjectId', $subId);

        if($run->execute())
        {
        	echo "Deleted";
        }
    }

?>