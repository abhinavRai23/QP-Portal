<?php
require 'connectionPDO.php';
include 'myqueries.php';
$obj = new Queries();

// $setId = htmlentities($_POST['setId']);
// $semester = htmlentities($_POST['semester']);
// $subId = htmlentities($_POST['subject']);
$setId = 'A';
$semester = '3';
$subId = 'NCS301';
echo "HI";die();
$paper = $obj->get_paper_details($conn, $setId, $semester, $subId)->fetch();

$A = $paper['A'];$B = $paper['B'];$C = $paper['C'];
$TA = $paper['TA'];$TB = $paper['TB'];$TC = $paper['TC'];
$outOfA = $paper['outOfA'];$outOfB = $paper['outOfB'];$outOfC = $paper['outOfC'];
echo $totalMarks = $paper['totalMarks'];

// $subjectName = $obj->get_subjects_by_id($conn,$subId)->fetch()['subjectName'];
if($totalMarks <= 70)
	$timepaper = '2';
else $timepaper = '3';
echo"<center><b>B.Tech.</b></center>
<center><b>EXAMINATION, 2015-16</b></center>
<center>$subId</center>
<p>[Time: $timepaper Hours]						[Total Marks: $totalMarks]</p>

<h2>SECTION-A</h2>";

if($outOfA == $TA)
echo "<h3>Q.1 Attempt all parts. All parts carry equal marks. Write answer of each part in short.								($Ax$TA=".($A * $TA).")</h3>";
else echo "<h3>Q.1 Attempt any $outOfA questions from this section.								($Ax$TA=".($A * $outOfA).")</h3>";

echo "<h4>";
$i = 1;
while($i <= $TA) {
	$ch = chr($i+96);
	echo "($ch)";
	$qa = $obj->get_question_answer($conn, $setId, $semester, $subject, 'A');
	$ques = $qa['ques'];
	echo "$ques<br>";
	$i++;
}
echo"</h4>

<h2>SECTION-B</h2>";

if($outOfB == $TB)
echo "<h3>Note: Attempt all questions. All question carry equal marks.								($Bx$TB=".($B * $TB).")</h3>";
else echo "<h3>Note: Attempt any $outOfB questions from this section.								($Bx$TB=".($B * $outOfB).")</h3>";

echo "<h4>";
$i = 1;
while($i<=$TB) {
	echo "Q.".($i + 1);
	$qa = $obj->get_question_answer($conn, $setId, $semester, $subject, 'B');
	$ques = $qa['ques'];
	echo "$ques<br>";
	$i++;	
}
echo "</h4>
<h2>SECTION-C</h2>";
if($outOfC == $TC)
echo "<h3>Note: Attempt all questions. All question carry equal marks.								($Cx$TC=".($C * $TC).")</h3>";
else echo "<h3>Note: Attempt any $outOfC questions from this section.								($Cx$TC=".($C * $outOfC).")</h3>";

echo "<h4>";
$i = 1;
while($i<=$TC) {
	echo "Q.".($i + 1);
	$qa = $obj->get_question_answer($conn, $setId, $semester, $subject, 'C');
	$ques = $qa['ques'];
	echo "$ques<br>";
	$i++;	
}
echo "</h4>";
?>