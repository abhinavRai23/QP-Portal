<?php
require '../include/secure_exam.php';
require '../include/header.php';
?>
<center><h3><b>UPLOAD MODEL QUESTION PAPER TO WEBSITE</b></h3></center>

<form enctype="multipart/form-data" method="POST" action="uploadpdf.php" role="form" class="form-inline">
<table align="center" style="width:40%">
	
	<tr>
		<div class="form-group">
			<td>
				<label>Course:</label>
			</td>
			<td>
				<select class="form-control" name="courseId" onchange="getbranches();" id="courseId" style="width:100%" required>
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
			<option>SELECT</option>
			
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
			<select name="sem" class="form-control" id="semesterlist" onchange="getsubjects();" style="width:100%" required>
			<option>SELECT</option>
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
		<div class="form-group">
			<td>
				<label>Subject:</label>
			</td>
			<td>
			<select name="sub" class="form-control" id="subjectlist" style="width:100%" required>
		</select>
		  <input type="hidden" name="alert" value="no" />
			</td>
		</div>	
	</tr>
	<tr>
		<td colspan="2">
			<input name="file" type="file" class="form-control" align="center" style="border:1px solid #fff;">
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<input type="submit" name="submit" class="btn btn-success" value="Upload File" />
		</td>
	</tr>
	</form>
	</table>
	<br><br>
	
<?php

if(isset($_POST['submit']))
{
	$target = "../pdfuploads/";
	//$semester = $_POST['semester'];	
	$pdf['branchId'] = $_POST['branchId'];
	$pdf['subjectId'] = $_POST['sub'];
	$pdf['semester'] = $_POST['sem'];
	$pdf['tmp_name'] = $_FILES['file']['tmp_name'];
	$pdf['filename'] = $_FILES['file']['name'];
	$pdf['fileformat'] = substr(strrchr($pdf['filename'],'.'),1);
	$pdf['uploader'] = $_SESSION['id'];
	$pdf['time'] = time();
	$pdf['filename'] = $pdf['uploader']."_".$pdf['time'];
	
	if($pdf['fileformat'] != 'pdf')
		echo "<script>swal('The file uploaded is not a pdf file.')</script>";
	else {
		
	if(move_uploaded_file($_FILES['file']['tmp_name'], $target.$pdf['filename'].".pdf"))
	{
		echo "<center><h5 style='color:green;'>FILE SUCCESSFULLY UPLOADED</h5></center>";
		$query = $obj->uploadpdf($conn, $pdf);
	}
}
}
?>


<?php 
	include '../include/footer.php';
?>
