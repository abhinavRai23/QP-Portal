<?php
include '../include/secure_exam.php';
require ("../include/header.php");


if(isset($_POST['editDetails'])) {
	$eOK = 1;
	$id = htmlentities($_POST['facultyid']);
	$name = htmlentities($_POST['name']);
	$designation = htmlentities($_POST['designation']);
	$email = htmlentities($_POST['email']);
	$pass = md5(htmlentities($_POST['pass']));
	$cpass = md5(htmlentities($_POST['cpass']));

	if(!empty($pass)) {
		if(empty($cpass)) {
				echo "<script>swal('', 'Enter confirm password details', 'warning')</script>";
				$eOK = 0;
			}
		else if($cpass != $pass) {
				echo "<script>swal('', 'Confirm password do not match', 'warning')</script>";
				$eOK = 0;
			}
		else
			$obj->update_password($conn, $id, $pass, 0);
	}
		$user['id'] = $id;
        $user['name'] = $name;
        $user['designation'] = $designation;
        $user['email'] = $email;
        

        if($eOK == 1 && $obj->update_coord_details($conn, $user) == 1)
        	echo "<script>swal('', 'Successfully edited', 'success')</script>";

       	else if($eOK ==1) 
       		echo "<script>swal('', 'Failed to update', 'warning')</script>";
}
if(isset($_GET['id']))
	$facultyid = $_GET['id'];
else if(isset($_POST['facultyid']))
	$facultyid = $_POST['facultyid'];
else
	{echo ('<h3 style="text-align:center;color:red"></h3>');
		die();
	}
$data = $obj->get_user_details($conn,$facultyid);

?>
<style type="text/css">
	td {
		padding-right: 5px;
	}
</style>
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%">
    Branch Coordinator Profile
</div>
<div class="panel-body" align="center">
	<form role="form" class="form-inline" method="POST">
		<?php
			echo "<input type='hidden' value='$facultyid' name='facultyid'>";
		?>
		<table >
			<tr>
				<div class="form-group">
					<td>
						<label>College Name:</label>
					</td>
					<td>
						<select class="form-control" name="collegeId" id="collegeId" style="width:100%;" disabled>
						<?php
							$collegeName = $obj->get_college_name($conn, $data['collegeId']);
								echo "<option value='".$data["collegeId"]."'>".$collegeName."</option>";	
						?>
                        </select>
					</td>
				</div>	
			</tr>
			
			<tr>
				<div class="form-group">
					<td>
						<label>Coordinator Name:</label>
					</td>
					<td>
                        <?php 
                        $name = $data['name'];
                        	echo '<input class="form-control" type="text" name="name" id="name" style="min-width:37%;width:60%;" value="'.$name.'">'
                        ?>
					</td>
				</div>	
			</tr>
			
			<tr>
				<div class="form-group">
					<td>
						<label>Designation:</label>
					</td>
					<td>
						<?php 
                        $designation = $data['designation'];
                        	echo '<input class="form-control" type="text" name="designation" id="designation" style="min-width:37%;width:60%;" value="'.$designation.'">'
                        ?>
					</td>
				</div>	
			</tr>
			
			<tr>
				<div class="form-group">
					<td>
						<label>Email:</label>
					</td>
					<td>
						<input class="form-control" type="email" name="email" id="email" style="min-width:37%;width:60%;" value="<?php echo $data['email'];?>">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td colspan="2" align="center"><span style="color:red">If you do not want to edit password for the branch coordinator, leave following parameters as blank </span></td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Password:</label>
					</td>
					<td>
						<input class="form-control" type="password" name="pass" id="pass" style="min-width:37%;width:60%;" placeholder="Password">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Confirm Password:</label>
					</td>
					<td>
						<input class="form-control" type="password" name="cpass" id="cpass" style="min-width:37%;width:60%;" placeholder="Confirm Password">
					</td>
				</div>	
			</tr>
									
        </table> 
        <br>
        <center><input type="submit" class="btn btn-md btn-warning btn-block" value="Update Info" name="editDetails" style="width:25%;"></center>   
    </form>
</div>
<?php
require ("../include/footer.php"); 
?>