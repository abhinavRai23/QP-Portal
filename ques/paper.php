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
$paper = $obj->get_paper_details($conn, $setId, $semester, $subId)->fetch();

$A = $paper['A'];$B = $paper['B'];$C = $paper['C'];
$TA = $paper['TA'];$TB = $paper['TB'];$TC = $paper['TC'];
$outOfA = $paper['outOfA'];$outOfB = $paper['outOfB'];$outOfC = $paper['outOfC'];
$totalMarks = $paper['totalMarks'];

// $subjectName = $obj->get_subjects_by_id($conn,$subId)->fetch()['subjectName'];

if($totalMarks <= 70)
	$timepaper = '2';
else $timepaper = '3';
echo"<center><b>B.Tech.</b></center>
<center><b>EXAMINATION, 2015-16</b></center>
<center>$subId</center>
<p>[Time: $timepaper Hours]						<span style='float:right;'>[Total Marks: $totalMarks]</span></p>

<h2>SECTION-A</h2>";

if($outOfA == $TA)
echo "<h3>Q.1 Attempt all parts. All parts carry equal marks. Write answer of each part in short.								($A x $TA=".($A * $TA).")</h3>";
else echo "<h3>Q.1 Attempt any $outOfA questions from this section.								(".$A." x ".$outOfA."=".($A * $outOfA).")</h3>";

echo "<table>";
$i = 1;
$qa = $obj->get_question_answer($conn, $setId, $semester, $subId, 'A');
while($row = $qa->fetch()) {
	$ch = chr($i+96);
	echo "<tr><th>($ch)</th><td>";
	echo $row['ques']."</td></tr>";
	$i++;
}
echo"</table>

<h2>SECTION-B</h2>";

if($outOfB == $TB)
echo "<h3>Note: Attempt all questions. All question carry equal marks.								($B x $TB=".($B * $TB).")</h3>";
else echo "<h3>Note: Attempt any $outOfB questions from this section.								($B x $outOfB=".($B * $outOfB).")</h3>";

echo "<table>";
$i = 1;
$qa = $obj->get_question_answer($conn, $setId, $semester, $subId, 'B');
while($row = $qa->fetch()) {
	echo "<tr><th>Q.".($i+1)."</th><td>";
	echo $row['ques']."</td></tr>";
	$i++;
}
echo "</table>
<h2>SECTION-C</h2>";
if($outOfC == $TC)
echo "<h3>Note: Attempt all questions. All question carry equal marks.								($C x $TC=".($C * $TC).")</h3>";
else echo "<h3>Note: Attempt any $outOfC questions from this section.								($C x $outOfC=".($C * $outOfC).")</h3>";

echo "<table>";
$qa = $obj->get_question_answer($conn, $setId, $semester, $subId, 'C');
while($row = $qa->fetch()) {
	echo "<tr><th>Q.".($i+1)."</th><td>";
	echo $row['ques']."</td></tr>";
	$i++;
}
echo "</table>";
?>