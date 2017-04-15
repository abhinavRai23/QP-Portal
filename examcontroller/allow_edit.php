<?php include '../include/secure_exam.php';
include '../include/header.php';

?>
<?php

if(isset($_POST['allow'])) {
	$stat = 1;
	$obj->set_edit_status($conn,$stat);
}
if(isset($_POST['disallow'])) {
	$stat = 0;
	$obj->set_edit_status($conn,$stat);
}
$status = $obj->allowed_edit_faculty($conn);

?>
<style type="text/css">
	.btn{
		padding: 3px 6px;
		margin: 1% 2%;
	}
</style>
<div class="panel-body" id="panel-body">
	<div class="col-sm-4" style="margin-left:33.33%; border:1px solid #ddd; border-radius:5px; margin-top:5%;">
		<div class="panel-heading" align="center">
    		Allow Faculty Profile Update
		</div>
		<div class="panel">
			<form role="form" class="form-inline" method="POST">
				<div id='status' align="center" style="padding-top:20px;"><b>Current Status: <?php echo (($status)?'<span style="color:green;font-style:italic;">ALLOWED</span>':'<span style="color:red;font-style:italic;">NOT ALLOWED</span>') ?></b></div>
				<hr>
				<center><input type="submit" name="allow" value="Allow" class="btn btn-md btn-success">
					<input type="submit" name="disallow" value="Disallow" class="btn btn-md btn-danger"></center>
			</form>
		</div>	
	</div>			
</div>        

<?php
    require ("../include/footer.php");
?>
<?php
$conn = null;
?>