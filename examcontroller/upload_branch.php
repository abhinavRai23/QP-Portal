<?php include '../include/secure_exam.php';
include '../include/header.php';
?>
<style type="text/css">
	.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
.table{
	width:50%;
}
.table > tbody > tr > th{
	background-color: #ddd;
}
.table > thead > tr > th{
	background-color: #ddd;
}
.btn-default:hover{
	background-color: #fff;
}
</style>
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%;">
                UPLOAD BRANCHES
</div>
<div class="panel-body" id="panel-body">
	<div class="panel">	
		<form enctype="multipart/form-data" method="POST" align="center">
			<div class="btn-default" align="center">
			    <input type="file" name="file" class="upload btn btn-default" required/><br>
			</div>
				<input type="submit" class="btn btn-success" name="submit" value="Submit" />
		</form>
	</div>	
<center>
<div class="panel-body">
	<div class="table-responsive">
		<table class="table table-bordered" width="60%" style="background-color: rgb(237, 252, 240);">
			<tr>
				<th colspan="8" style="text-align:center">Format of Upload File:</th>
			</tr>
			<tr >
				<td >Branch Id</td>
				<td >Branch Name</td>
				<td >Course</td>
					
			</tr>
			<tr>
				
				<td colspan="8">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="8">Save file as .CSV (Example filename.csv)</td>
			</tr>
		</table>

                            
                                
                            </div>
                            <!-- /.table-responsive -->
                        </div>
</center>	
	
<?php

if(isset($_POST['submit']))
{

	if($_FILES["file"]["type"] != "application/vnd.ms-excel"){
	die("This is not a CSV file.");
	}
	

$file_handle = fopen($_FILES["file"]["tmp_name"], "r");

echo '
<table class="table table-bordered" align="center">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Branch Id</th>
                                            <th>Branch Name</th>
                                            <th>Course</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>';

$sn=1;
while (!feof($file_handle) ) {
$line_of_text = fgetcsv($file_handle, 1024);
$branchId=$line_of_text[0];
$branchName=$line_of_text[1];
$course=$line_of_text[2];
$run = $obj->upload_branch($conn, $branchId, $branchName, $course);
$p = $run->rowCount();
echo "<tr>
		<td>".$sn++."</td>
		<td>$branchId</td>
		<td>$branchName</td>
		<td>$course</td>";
	if($p>0)
 		echo '<td style="color:green">Success</td>';
	else
 		echo '<td style="color:red">Upload failed</td>';
  echo "</tr>";
}
echo '
                                    </tbody>
                                </table>';
fclose($file_handle);


}
?>
</div>
<?php
    require ("../include/footer.php");
?>
<?php
$conn = null;
?>