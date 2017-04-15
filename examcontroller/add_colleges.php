<?php include '../include/secure_exam.php';
include '../include/header.php';
?>
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%">
    Add Colleges
</div>
<?php
if(isset($_POST['addCollege'])) {
	$cid = htmlentities($_POST['cid']);
	$cname = htmlentities($_POST['cname']);

	if(!empty($cid) && !empty($cname)) {
		if($obj->add_college($conn, $cid, $cname))
			echo "<span style='color:green'>$cname added successfully</span>";
		}
	else
		echo "<span style='color:red'>Please Fill All Details</span>";
	
}

?>
<div class="panel-body" align="center" id="panel-body">
	<form role="form" class="form-inline" method="POST">
		<Table>
			<tr>
				<div class="form-group">
					<td>
						<label>College Id:</label>
					</td>
					<td>
						<input type="text" placeholder="College Id" name="cid" class="form-control">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>College Name:</label>
					</td>
					<td>
						<input type="text" placeholder="College Name" name="cname" class="form-control">
					</td>
				</div>
			</tr>
		</Table>
		<center><input type="submit" name="addBranch" class="btn btn-md btn-success" value="Add"></center>
	</form>		
</div>        

<?php
    require ("../include/footer.php");
?>
<?php
$conn = null;
?>