<?php
 require ('../common/connectionPDO.php');
 require ('../common/queries.php');

$branch = $_POST['branch'];
$userId=$_POST['userId'];
$sem=$_POST['sem'];
//$userId=12;
$obj = new Queries;
 $reGsubject=[];
    $sql = "SELECT * FROM subjects WHERE userId=:user";
         $run = $conn->prepare($sql);
         $run->bindParam(':user',$userId);
         $run->execute();
         while($result = $run->fetch(PDO::FETCH_ASSOC))
         $reGsubject[]=$result['subjectId'];
         $k=0;

	$result = $obj->get_subjects_by_branch_sem($conn,$branch,$sem);
   echo' <option>SELECT</option>';
	while($row = $result->fetch()) {
               $value=$row['subjectId'];
               $name=$row["subjectName"];

               for($i=0;$i<count($reGsubject);$i++){
                     if($reGsubject[$i]==$value){
                            $k++;
                           // echo $reGsubject[$i];
                                               }
                    

                         }
                  if($k=='0')
                    {
                       echo '
                             <option  value="'.$value.'">'.$name.' ('.$value.')</option>                                              
	';
                        
                    }
                  
                  $k=0;
              }

            
		
		// echo "<input type='checkbox' value='".$row["subjectId"]."'".$row["subjectName"]."</option>";
	
$conn = NULL;
?>