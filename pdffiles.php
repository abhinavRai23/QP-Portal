<?php
require 'include/headerindex.php';
?>
<style type="text/css">
	td{
		text-align: center;
	}
</style>
<center><h3><b>Sample Model Question Papers 2015-16</b></h3></center>
	<?php
	$i = 0;
	$x = $obj->get_branches($conn);
	while($b = $x->fetch()) {
		$branchId = $b['branchId'];
		$branchName = $b['branchName'];
		$flag = 0;$i++;
		$query = $obj->view_pdf_branch($conn, $branchId);
		$num_rows = $query->rowCount();
		if($num_rows != 0) {
			echo "<center><h3><b>Branch Name:</b> $branchName ( $branchId )</h3></center>";
				echo '<center><div class="table-responsive" style="width:50%;">
			<table align="center" class="table table-striped table-bordered table-hover">
			<thead><tr>
				<th>Semester</th>
				<th>Subject</th>
				<th>Download</th>
			</tr></thead>';

				while ($row = $query->fetch()) {
					$fileid = $row['fileid'];
					$fileformat = $row['fileformat'];
					$semester = $row['semester'];
					$subjectId = $row['subjectId'];
					$subjectName = $row['subjectName'];
					$completefile = $fileid.".".$fileformat;
					echo "<tr><td>$semester</td><td>$subjectName ( $subjectId )</td>";
					echo "<td><a href='downloadpdf.php?file=$completefile'><i class='fa fa-download btn btn-info'></i></a></td></tr>";
				}
				echo "</table></div></center>";
		
		}
	}
?>


<?php 
	include 'include/footerindex.php';
?>
