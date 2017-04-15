<?php 
include '../include/secure_exam.php';
include '../include/header.php';
?>


<div class="panel-heading" align="center">
    Add New College Representatives
</div>
<div class="panel-body" id="panel-body">
<div>
<?php
	if(isset($_POST['addHead'])) {
		$cid = htmlentities($_POST['cid']);
		$cemail = htmlentities($_POST['cemail']);
		$cpass = htmlentities($_POST['cpass']);
		$cname = htmlentities($_POST['cname']);
		$ccpass = htmlentities($_POST['ccpass']);
		$rpass = htmlentities($_POST['rpass']);
		$rrpass = htmlentities($_POST['rrpass']);


		if(!empty($cid) && !empty($cemail) && !empty($cpass) && !empty($ccpass) && !empty($rpass) && !empty($rrpass)) {
			if(($cpass == $ccpass) && ($rpass == $rrpass) && ($rpass != $cpass)){
				if($obj->addHead($conn, $cid, $cname, $cemail, md5($cpass), md5($rpass)))
					echo "<span style='color:green'>$cname added successfully</span>";
			}
			else
				echo "<span style='color:red'>Passwords doesn't match</span>";
		}
		else
			echo "<span style='color:green'>Please fill all details first</span>";
	}

?>
	<form role="form" class="form-inline" method="POST">
		<table align="center">
			<tr>
				<div class="form-group">
					<td>
						<label>Select College:</label>
					</td>
					<td style="max-width:200px">
						<select class="form-control" name="cid" id="college" style="max-width:100%">
                       <?php
							$collegelist = $obj->get_colleges_h($conn);
							while($row = $collegelist->fetch()) {
								$collegeId = $row['collegeId'];
								$collegeName = $row['collegeName'];
								echo "<option value='$collegeId'>$collegeName ($collegeId)</option>";
							}
						?>
						</select>
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Name of College Representative:</label>
					</td>
					<td>
						<input class="form-control"type="text" name="cname" placeholder="Name">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Email Id for College Representative:</label>
					</td>
					<td>
						<input placeholder="Email" class="form-control"type="email" name="cemail">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Private Password:</label>
					</td>
					<td>
						<input class="form-control" type="password" name="cpass">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Confirm Private Password:</label>
					</td>
					<td>
						<input class="form-control" type="password" name="ccpass">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Registration Password:</label>
					</td>
					<td>
						<input class="form-control" type="password" name="rpass">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Confirm Registration Password:</label>
					</td>
					<td>
						<input class="form-control" type="password" name="rrpass">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td colspan="2" style="text-align:right">
						<p><i>*Please select different private password and registration password</i></p>
					</td>
				</div>	
			</tr>
		</table>
		<center><input type="submit" name="addHead" class="btn btn-success" value="Add"></center>
	</form>
	
</div>
</div>        

<?php
    require ("../include/footer.php");
?>
<?php
$conn = null;
?>