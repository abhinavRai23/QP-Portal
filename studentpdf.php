<?php
require 'include/headerupload.php';
?>
<style type="text/css">
	td{
		text-align: center;
		font-size: 15px;
	}
</style>
<center><h3><b>Question Paper (Theory) Pattern for session 2015-16</b></h3>
<h4 style="font-size: 180%;">(Some Sample Question Papers)</h4>
<h5 style="width:51%;text-align:left;"><b>Note:</b> Pattern of the Theory Question Papers of the University for the academic session 2015-16 (odd and even semesters) shall be the same for all the subjects of all the Disciplines / Courses / Programs. Some sample papers are given below for reference.<br><span text-align="left"></span></h5>
</center>
<br><br>
	<?php
	$i = 0;
	$x = $obj->get_branches($conn);
	echo '<center><div class="table-responsive" style="width:50%;">
			<table align="center" class="table table-striped table-bordered table-hover">
			<thead><tr style="background-color: #929292;">
				<th><center><h5><b>Semester</b></h5></center></th>
				<th><center><h5><b>Subject</b></h5></center></th>
				<th><center><h5><b>Download</b></h5></center></th>
			</tr></thead>';
	while($b = $x->fetch()) {
		$branchId = $b['branchId'];
		$branchName = $b['branchName'];
		$flag = 0;$i++;
		$query = $obj->view_pdf_branch($conn, $branchId);
		$num_rows = $query->rowCount();
		if($num_rows != 0) {
			echo "<tr style='background-color: #E0E0E0;'><td colspan='3'><h4><b>$branchName ( $branchId )</b></h4></td></tr>";
		
				while ($row = $query->fetch()) {
					$title = $row['title'];
					$fileid = $row['fileid'];
					$fileformat = $row['fileformat'];
					$semester = $row['semester'];
					$subjectId = $row['subjectId'];
					$subjectName = $row['subjectName'];
					$completefile = $fileid.".".$fileformat;
					echo "<tr><td>$semester</td><td>$subjectName ( $subjectId )</td>";
					echo "<td><a href='downloadpdf.php?file=$completefile'><i class='fa fa-download btn btn-info'></i></a></td></tr>";
				}
		
		}
	}
				echo "</table></div></center>";
	
?>


<?php 
	include 'include/footerindex.php';
?>
