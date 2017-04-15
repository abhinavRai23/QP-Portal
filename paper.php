<?php
echo '
<style type="text/css">
	body{
		visibility: hidden;
	}
</style>
<span style="visibility: visible;">Generating PDF..</span>';
require 'common/connectionPDO.php';
//include '../common/queries.php';
include 'include/headerindex.php';
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
$subId = $_POST['sub'];
$check_allow = $obj->get_paper_details($conn, $setId, $semester, $subId)->fetch();

if($check_allow['student'] != '1') {
	header('Location:downloadmodelpaper.php');
	die();
}
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
	<div class='panel-body' id='panel-body'>
	<span id='downloadPDF' class='btn btn-success pull-right'>Download</span>
<div class='col-sm-8' id='mypdfdataPaper' style='margin:auto 16.67%;border:1px solid #ddd'>
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
			
		<div class='panel-heading' align='center' style='border-bottom:1px solid #840000;'>
			<b><span style='font-size:22px;'>B.Tech</span><br><br>
			EXAMINATION, 2015-16<br><br>
			<table width='100%'>
				<tr>
					<td align='left' width='60%'>Subject: &nbsp;$subjectName</td>
					<td align='right' width='40%'>Code: &nbsp;$subId</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>	
				<tr>
					<td align='left'>[Time: $timepaper Hours]</td>
					<td align='right'>[Total Marks: $totalMarks]</td>
				</tr>
			</table>	</b>
			<br></div>
			
<h4>SECTION-A</h4>	";

if($outOfA == $TA)
echo "<h5><b>Q.1</b> Attempt all parts. All parts carry equal marks. Write answer of each part in short.								($A x $TA=".($A * $TA).")</h5>";
else echo "<h5><b>Q.1</b> Attempt any $outOfA questions from this section.								(".$A." x ".$outOfA."=".($A * $outOfA).")</h5>";

echo "<table>";
$i = 1;
$qa = $obj->get_question_answer($conn, $setId, $semester, $subId, 'A');
while($row = $qa->fetch()) {
	$ch = chr($i+96);
	echo "<tr><th width='4%'>($ch)</th><td width='90%'>";
	echo $row['ques']."</td></tr>";
	$i++;
}
echo"</table>

<h4>SECTION-B</h4>";

if($outOfB == $TB)
echo "<h5><b>Note:</b> Attempt all questions. All question carry equal marks.								($B x $TB=".($B * $TB).")</h5>";
else echo "<h5><b>Note:</b> Attempt any $outOfB questions from this section.								($B x $outOfB=".($B * $outOfB).")</h5>";

echo "<table>";
$i = 1;
$qa = $obj->get_question_answer($conn, $setId, $semester, $subId, 'B');
while($row = $qa->fetch()) {
	echo "<tr><th width='6%'>Q.".($i+1)."</th><td width='90%'>";
	echo $row['ques']."</td></tr>";
	$i++;
}
echo "</table>
<h4>SECTION-C</h4>";
if($outOfC == $TC)
echo "<h5><b>Note:</b> Attempt all questions. All question carry equal marks.								($C x $TC=".($C * $TC).")</h5>";
else echo "<h5><b>Note:</b> Attempt any $outOfC questions from this section.								($C x $outOfC=".($C * $outOfC).")</h5>";

echo "<table>";
$qa = $obj->get_question_answer($conn, $setId, $semester, $subId, 'C');
while($row = $qa->fetch()) {
	echo "<tr><th width='6%'>Q.".($i+1)."</th><td width='90%'>";
	echo $row['ques']."</td></tr>";
	$i++;
}
echo "</table>
</div>
</div>";

echo '<div id="myhiddenForm"></div>
</div>';


include "include/footerindex.php";
?>
<script type="text/javascript">
	$(document).ready(function(){
			$("#myhiddenForm").html('<form id="pdfForm" action="download/pdf/question_bank.php" method="POST" "><input type="hidden" name="purpose" value="<?php echo $_POST['purpose'] ?>"><input type="hidden" name="mypdfdata" id="mypdfdata" value""><input type="hidden" name="mypdffilename" value="sets"></form>');
			$("#mypdfdata").val($("#mypdfdataPaper").html());
			$("#pdfForm").submit();

		
	});
</script>