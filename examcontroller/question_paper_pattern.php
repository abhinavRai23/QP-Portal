<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<?php
 
 require '../common/connectionPDO.php';
?>

<?php
/*
if(isset($_POST['set'])){

echo $nQTA =$_POST['nQTA'];
 $nQTAA=$_POST['nQTTAA'];
echo $nQTB =$_POST['nQTB'];
 $nQTAB =$_POST['nQTTAB'];
echo $nQTC  =$_POST['nQTC'];
 $nQTAC =$_POST['nQTTAC'];
$set=$_POST["set"];
$totalMarks=$_POST["total_marks"];
$nSecA=$_POST["nSecA"];
$mba=$_POST["mba"];
$eba=$_POST["eba"];
$aba=$_POST["aba"]; 
$nSecB=$_POST["nSecB"];
$mbb=$_POST["mbb"];
$ebb=$_POST["ebb"];
$abb=$_POST["abb"]; 
$nSecC=$_POST["nSecC"];
$mbc=$_POST["mbc"];
$ebc=$_POST["ebc"];
$abc=$_POST["abc"];
$sub=$_POST["sub"];
$sem=$_POST["sem"];
//$totalMark=$_POST['total_marks'];
echo" TA=" .$tqa=($mba+$eba+$aba);
echo" TB=" .$tqb=($mbb+$ebb+$abb);
echo" TC=" .$tqc=($mbc+$ebc+$abc);
echo" T=" .$total=(($nSecA*$nQTAA)+($nSecB*$nQTAB)+($nSecC*$nQTAC));

if($totalMarks==$total && $tqa==$nQTA && $tqb==$nQTB && $tqc==$nQTC){
 // echo"done:";
*/

$nSecA=10;
$mba=5;
$eba=2;
$aba=3; 
$nSecB=8;
$mbb=3;
$ebb=2;
$abb=3; 
$nSecC=3;
$mbc=1;
$ebc=1;
$abc=1;
$sub=$_POST["sub"];
$sem=$_POST["sem"];
$set=$_POST["set"];	
	
$check_p = paper_pattern($set,$sub,'2','10','15',$conn,$sem,'10','10','8','5','3','2','100');
if($check_p=='1'){
question_set($set,$sub,$sem,'A',$mba,$eba,$aba,$conn);
question_set($set,$sub,$sem,'B',$mbb,$ebb,$abb,$conn);
question_set($set,$sub,$sem,'C',$mbc,$ebc,$abc,$conn);
	echo "<script>alert('Set $set Created');</script>";

}
else{
	echo "<script>alert('Cannot create set. Set already present.');</script>";
}

 echo'<form method="POST" action="select_sub_setQuestionBank.php" id="select_sub_setQuestionBank">
     
     <input type="hidden" name="sem" value="'.$sem.'" />
     <input type="hidden" name="sub" value="'.$sub.'" />
     <input type="hidden" name="redirectPage" value="redirectPage"> 
     </form>';
	echo "

    <script>
     document.getElementById('select_sub_setQuestionBank').submit();
     </script>


	";

/*else{
    echo'<form method="POST" action="newcreate_question_paper_modal.php" id="DeleteUserForm">
     <input type="hidden" name="sem" value="'.$sem.'" />
     <input type="hidden" name="sub" value="'.$sub.'" />
      <input type="hidden" name="alert" value="yes" />
     </form>';
	echo "

    <script>
      $(document).ready(function(){
       
     document.getElementById('DeleteUserForm').submit();
       });
     
    </script>


	";
 }
}*/
function question_set($id,$sub,$sem,$sec,$noOfM,$noOfE,$noOfA,$conn){
$sql = "INSERT INTO question_set (setId,semester,subject,section,type,num,ques,ans) VALUES (:setId, :sem,:subjectId,:sec,:type,:num,'','')";
		$run = $conn->prepare($sql);
		for($num=1;$num<=$noOfM;$num++) {
			$type='M';
			$run->bindParam(':setId', $id);
			$run->bindParam(':subjectId', $sub);
			$run->bindParam(':sem', $sem);
			$run->bindParam(':sec', $sec);
			$run->bindParam(':type',$type);
			$run->bindParam(':num', $num);
			$run->execute();
			}
	    for($num=1;$num<=$noOfE;$num++) {
			$type='E';
			$run->bindParam(':setId', $id);
			$run->bindParam(':subjectId', $sub);
			$run->bindParam(':sem', $sem);
			$run->bindParam(':sec', $sec);
			$run->bindParam(':type',$type);
			$run->bindParam(':num', $num);
			$run->execute();
			}
		for($num=1;$num<=$noOfA;$num++) {
			$type='A';
			$run->bindParam(':setId', $id);
			$run->bindParam(':subjectId', $sub);
			$run->bindParam(':sem', $sem);
			$run->bindParam(':sec', $sec);
			$run->bindParam(':type',$type);
			$run->bindParam(':num', $num);
			$run->execute();
			}

	}

function paper_pattern($set,$subject,$A,$B,$C,$conn,$sem,$nQTA,$nQTAA,$nQTB,$nQTAB,$nQTC,$nQTAC,$totalMark){

$sql="INSERT INTO paper_pattern (setId,subject,A,B,C,sdate,sem,TA,TB,TC,outOfA,outOfB,outOfC,totalMarks,controller,creater)VALUES(:setId,:subject,:a,:b,:c,'0',:sem,:TA,:TB,:TC,:outOfA,:outOfB,:outOfC,:Tmark,'1','1')";
$run=$conn->prepare($sql);
$run->bindParam(':setId',$set);
$run->bindParam(':subject',$subject);
$run->bindParam(':a',$A);
$run->bindParam(':b',$B);
$run->bindParam(':c',$C);
$run->bindParam(':TA',$nQTA);
$run->bindParam(':TB',$nQTB);
$run->bindParam(':TC',$nQTC);
$run->bindParam(':outOfA',$nQTAA);
$run->bindParam(':outOfB',$nQTAB);
$run->bindParam(':outOfC',$nQTAC );
$run->bindParam(':sem',$sem);
$run->bindParam(':Tmark',$totalMark);
$run->execute();
return $run->rowCount();

}

?>



