<?php
require '../include/secure_exam.php';
require '../include/header.php';
if(isset($_POST['delfile'])) 
{
	$target = "../pdfuploads/";
	$fileid = htmlentities($_POST['fileid']);
	//$fileformat = $obj->get_pdf_fileformat($conn, $fileid)->fetch()['fileformat'];
	$filename = $target.$fileid.".pdf";
	$delete_q = $obj->delete_pdf($conn, $fileid);
	if ($delete_q) {
		if(unlink($filename))
		echo '<script type="text/javascript">swal("File successfully deleted");</script>';
	}
}
?>
<center><h3><b>VIEW UPLOADED</b></h3>
<h4>SAMPLE QUESTION PAPERS FOR SESSION 2015-16</h4>
</center>
<form method="POST" action="view_uploadedpdf.php" role="form" class="form-inline">
<table align="center" style="width:40%">
	<tr>
		<div class="form-group">
			<td>
				<label>Course:</label>
			</td>
			<td>
				<select class="form-control" name="courseId" onchange="getbranches('1');" id="courseId" style="width:100%" required>
				<option>SELECT</option>
                <?php
					$result = $obj->get_courses($conn);
					while($row = $result->fetch()) {
						echo "<option value='".$row["courses"]."'>".$row["courses"]."</option>";
					}
				?>          
                </select>
			</td>
		</div>	
	</tr>
	<tr>
		<div class="form-group">
			<td>
				<label>Branch:</label>
			</td>
			<td>
			<select name="branchId" id="branchlist" class="form-control" style="width:100%"  onchange="getsubjects();" required>
			<option value="all">ALL</option>
			
		</select>
			</td>
		</div>	
	</tr>
	<tr>
		<div class="form-group">
			<td>
				<label>Semester:</label>
			</td>
			<td>
			<select name="sem" class="form-control" id="semesterlist" style="width:100%" required>
			<option value="ALL">ALL</option>
			<?php
				$i = 1;
				while($i<=10) {
					echo "<option value=$i>$i</option>";
					$i ++;
				}	
			?>
		</select>
			</td>
		</div>	
	</tr>
	<tr>
		<td colspan="2" align="center">
			<input type="submit" name="submit" class="btn btn-success" value="View Uploads" />
		</td>
	</tr>
	</table>
	</form>
	<?php
	if(isset($_POST['submit'])) {
		$branch = $_POST['branchId'];
		$semester = $_POST['sem'];
		if($branch == 'All')
			$x = $obj->get_branches($conn);


		
		else
			$x = $obj->get_dpt_by_id($conn,$branch);
			
		while($k = $x->fetch()) {
				$branchId = $k['branchId'];
				$branchName = $obj->get_branchname($conn, $branchId);
		$flag = 0;
		echo "<center><h3><b>Branch Name:</b> $branchName ( $branchId )</h3></center>";
		if($semester == "ALL") {
			$s = $obj->get_subjects_by_branch($conn, $branchId);
		}
		else {
			$s = $obj->get_subjects_by_branch_sem($conn, $branchId, $semester);
		}
		while($d = $s->fetch()){
			$subjectId = $d['subjectId'];
			$subjectName = $d['subjectName'];
			$query = $obj->view_pdf($conn, $branchId, $semester, $subjectId);	
			$num_rows = $query->rowCount();
			if($num_rows != 0){
				$flag++;
				echo "<center><h4><span style='color:rgb(107, 48, 12)'><b >Subject Name:</b> $subjectName ($subjectId)</span></h4></center><br>";
				echo '
			<table align="center" class="table table-responsive">
			<tr>
				<th>Uploaded By</th>
				<th>Authority</th>
				<th>Date of Upload</th>
				<th>Delete</th>
				<th>Download</th>
			</tr>';

				while ($row = $query->fetch()) {
					$uploader = $obj->get_user_details($conn,$row['uploader']);
					$uploadername = $uploader['name'];
					$uploaderpos = ($uploader['userdef'])?'Coordinator':'Exam Controller';
					$uploadedon = $row['uploadedon'];
					$fileid = $row['fileid'];
					$fileformat = 'pdf';
					$completefile = $fileid.".".$fileformat;
					$date=date_create();
			        date_timestamp_set($date, $uploadedon);
			        $original_time=date_format($date, 'M d,Y');
					echo "<td>$uploadername</td>";
					echo "<td>$uploaderpos</td>";
					echo "<td>$original_time</td>";
					//echo "<td><a href='../pdfuploads/".$completefile."'>$title</a></td>";
					//echo "<td><a href='edituploadfile.php?fileid=$fileid'><i class='fa fa-pencil-square-o btn btn-success'></i></a></td>";
					echo "<td><form method='POST' action='view_uploadedpdf.php'><input type='hidden' name='fileid' value='$fileid'><button type='submit' name='delfile' class=' btn btn-danger'><i class='fa fa-times'></i></button></td>";
					echo "<td><a href='downloadpdf.php?file=$completefile'><i class='fa fa-download btn btn-info'></i></a></td></tr>";
				}
			}
		}
	}
		if($flag == 0) {
			echo "<center><h5 style='color:red;'><b>*No File Uploads Yet<b></h5></center>";
		}
	}
?>


<?php 
	include '../include/footer.php';
?>
