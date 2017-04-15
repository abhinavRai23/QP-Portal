<?php
include '../include/secure_coord.php';
require ("../include/header.php");


if(isset($_POST['editDetails'])) {
	$name = htmlentities($_POST['name']);
	$designation = htmlentities($_POST['designation']);
	$email = htmlentities($_POST['email']);

		$user['id'] = htmlentities($_POST['facultyid']);
        $user['name'] = $name;
        $user['designation'] = $designation;
        $user['email'] = $email;
        
        if($obj->update_coord_details($conn, $user) == 1)
        	echo "<script>swal('', 'Successfully edited', 'success')</script>";
       	else echo "<script>swal('', 'Failed to update', 'warning')</script>";
}

$facultyid = $_SESSION['id'];
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
			
									
        </table> 
        <br>
        <center><input type="submit" class="btn btn-md btn-warning btn-block" value="Update Info" name="editDetails" style="width:25%;"></center>   
    </form>
</div>
<?php
require ("../include/footer.php"); 
?>