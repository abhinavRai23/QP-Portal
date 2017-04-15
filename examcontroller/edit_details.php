<?php
include '../include/secure_exam.php';
require ("../include/header.php");


if(isset($_POST['editDetails'])) {
	$name = htmlentities($_POST['name']);
	$email = htmlentities($_POST['email']);

		$user['id'] = htmlentities($_POST['facultyid']);
        $user['name'] = $name;
        $user['email'] = $email;
        
        if($obj->update_examc_details($conn, $user) == 1)
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
    Exam Controller Profile
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
						<label>Coordinator Name:</label>
					</td>
					<td>
                        <?php 
                        $name = $data['name'];
                        	echo '<input class="form-control" type="text" name="name" id="name" value="'.$name.'">'
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
						<input class="form-control" type="email" name="email" id="email"  value="<?php echo $data['email'];?>">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td colspan="2" align="center">
						<input type="submit" class="btn btn-md btn-warning btn-block" value="Update Info" name="editDetails" style="width:50%">
					</td>
				</div>	
			</tr>
									
        </table> 
        <br>
    </form>
</div>
<?php
require ("../include/footer.php"); 
?>