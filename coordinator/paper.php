<?php
require '../common/connectionPDO.php';
//include '../common/queries.php';
include '../include/header.php';
$obj = new Queries();

// $setId = htmlentities($_POST['setId']);
// $semester = htmlentities($_POST['semester']);
// $subId = htmlentities($_POST['subject']);
if(!isset($_POST['set']) || !isset($_POST['sem']) || !isset($_POST['sub'])){
	echo '<script>window.location.href="select_sub_setQuestionBank.php";</script>';
      die();
  }
$setId = $_POST['set'];
$semester = $_POST['sem'];
$sem_rm = rome($semester);
if($sem%2==1)
$semMsg = 'ODD';
else
$semMsg = 'EVEN'; 
$subId = $_POST['sub'];
$sub_detail = $obj->get_subjects_by_id($conn,$subId)->fetch();
$subjectName = $sub_detail['subjectName'];
$paper = $obj->get_paper_details($conn, $setId, $semester, $subId)->fetch();

$A = $paper['A'];$B = $paper['B'];$C = $paper['C'];
$TA = $paper['TA'];$TB = $paper['TB'];$TC = $paper['TC'];
$outOfA = $paper['outOfA'];$outOfB = $paper['outOfB'];$outOfC = $paper['outOfC'];
$totalMarks = $paper['totalMarks'];

// $subjectName = $obj->get_subjects_by_id($conn,$subId)->fetch()['subjectName'];

if($totalMarks <= 70)
	$timepaper = '2';
else $timepaper = '3';
echo"<style>
		p {
    		margin: 0px 0px 0px 15px;
	}
	h4{
		text-decoration:underline;
	}
	th{
		vertical-align:top;
	}
	</style>
<div class='col-sm-8' style='margin:auto 16.67%;border:1px solid #ddd'>
	<div class='panel-body' id='panel-body'>
	<b>
	<table border='0' width='100%'><tr><td align='right'>$subId</td></tr></table>
	<div style='border:1px solid black;'>
	<br>
		<table border='0' width='100%' style='font-wight:normal;'>
			<tr><td colspan='5' align='center'>(Following Paper ID and Numbers to be filled in your Answer books)</td></tr>
			<tr><td colspan='5'>&nbsp;</td></tr>
			<tr>
			<td width='1%'></td>
			<td width='20%' align='left'>Paper ID:<br>
			<table border='1' style='background-color:#f5f5f5'><tbody><tr><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td></tr></tbody></table>
			</td>
			<td width='48%'>
			&nbsp;
			</td>
			<td width='30%' align='right'>
			Roll No:<br>
			<table border='1'><tbody><tr><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td></tr></tbody></table>
			</td>
			<td width='1%'></td>
			
			</tr></table>
			<br>
			</b>
			</div>
			<br>
			
		<div class='panel-heading' align='center'>
			<span style='font-size:22px;'>B.Tech</span><br><br>
			(SEM. $sem_rm) &nbsp;($semMsg SEM) &nbsp;THEORY EXAMINATION, 2015-16<br><br>
			<center><b>$subjectName($subId)</b></center><br>
			<p><span style='float:left	;'>[Time: $timepaper Hours]</span>						<span style='float:right;'>[Total Marks: $totalMarks]</span></p>
			<br></div>
			
<h4><center>SECTION-A</center></h4><br>";
if($outOfA == $TA)
echo "<h5><b>Q.1</b> Attempt all parts. All parts carry equal marks. Write answer of each part in short.								($A x $TA=".($A * $TA).")</h5>";
else echo "<h5><b>Q.1</b> Attempt any $outOfA questions from this section.								(".$A." x ".$outOfA."=".($A * $outOfA).")</h5>";

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

<h4><center>SECTION-B</center></h4><br>";

if($outOfB == $TB)
echo "<h5><b>Note:</b> Attempt all questions. All question carry equal marks.								($B x $TB=".($B * $TB).")</h5>";
else echo "<h5><b>Note:</b> Attempt any $outOfB questions from this section.								($B x $outOfB=".($B * $outOfB).")</h5>";

echo "<table>";
$i = 1;
$qa = $obj->get_question_answer($conn, $setId, $semester, $subId, 'B');
while($row = $qa->fetch()) {
	echo "<tr><th>Q.".($i+1)."</th><td>";
	echo $row['ques']."</td></tr>";
	$i++;
}
echo "</table>
<h4><center>SECTION-C</center></h4><br>";
if($outOfC == $TC)
echo "<h5><b>Note:</b> Attempt all questions. All question carry equal marks.								($C x $TC=".($C * $TC).")</h5>";
else echo "<h5><b>Note:</b> Attempt any $outOfC questions from this section.								($C x $outOfC=".($C * $outOfC).")</h5>";

echo "<table>";
$qa = $obj->get_question_answer($conn, $setId, $semester, $subId, 'C');
while($row = $qa->fetch()) {
	echo "<tr><th>Q.".($i+1)."</th><td>";
	echo $row['ques']."</td></tr>";
	$i++;
}
echo "</table>
<hr>
</div>
</div>";
include "../include/footer.php";
function rome($N){ 
        $c='IVXLCDM'; 
        for($a=5,$b=$s='';$N;$b++,$a^=7) 
                for($o=$N%$a,$N=$N/$a^0;$o--;$s=$c[$o>2?$b+$N-($N&=-2)+$o=1:$b].$s); 
        return $s; 
} 
?>