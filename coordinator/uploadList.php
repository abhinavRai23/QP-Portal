
<?php
include '../include/secure_coord.php';
include '../common/session.php';
include '../common/connectionPDO.php';
include '../common/queries.php';
$obj = new Queries();

$sub =$_POST['sub'];
$sem = $_POST['sem'];

$sql = "SELECT * FROM subjects WHERE subjectId=:sub AND coordinator='1' AND confirm='1'";

$run = $conn->prepare($sql);
$run->bindParam(':sub', $sub);
$run->execute();

echo '

<div class="dataTable_wrapper">
                                <table class="table table-hover table-bordered display">
                                    <thead style="background-color:rgb(216, 216, 216);">
                                        <tr>
                                            <th>C Id</th>
                                            <th>Faculty Name</th>
                                            <th>Ques</th>
                                            <th>Submit Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
								        while($p = $run->fetch()){
								        $q = $obj->get_user_details($conn,$p['userId']);
								        echo "<tr onclick=\"getQuestions('$p[userId]','$sub')\">
								          <th scope='row'>$q[collegeId]</th>
								          <td>$q[name]</td>
								          <td>".$obj->get_ques($conn,$p['userId'],$sub)->rowCount()."</td>
								          <td>$p[sdate]</td>
								        </tr>";
								        
								    }
								        echo '</tbody>
                                </table>
                            </div>
                        <script>';
 echo "         
$(document).ready(function() {
    $('table.display').DataTable();
} );

</script>";

?>