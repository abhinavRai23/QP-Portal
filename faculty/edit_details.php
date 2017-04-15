<?php 
include '../include/secure_faculty.php';
include '../include/header.php';

	$data = $user;
	$img = $data['image'];
?>
<style>
.bound{
	border: 1px solid #ccc !important;
	border-spacing: 2px !important;
	width: 100%;
	min-height: 300px;
	padding: 5% !important;
}
.blk{
	padding-top:10px !important;
	margin-top:10px !important;
	border: 1px solid #ccc !important;
	border-spacing: 2px !important;
	
}
td{
	padding-bottom:3%;
	font-size:14px;
	padding: 5px;
}
.diff{
	font-weight: bold;
}
.faculty_name{
	margin-top: 1%;
	font-size: 16px;
}
</style>
<form method='POST'>
<div class="panel-heading">
	<center>
    	<div class="header" style="font-size:20px">Faculty Profile</div>
    	<div class="faculty_name"><em><?php echo $data['name']; ?></em></div>
    </center>
</div>
<div class="panel-body" id="panel-body">
	<div class="col-sm-12" align="center">
		<?php echo "<img src='../fimages/$img' style='height: 150px;width: 150px;'>";?>
	</div>
	<div class="col-sm-6">
		<table class="bound">
			<tr>
				<td colspan="2" align="center"><h3><u>Personal Details</u></h3></td>
			</tr>
			<tr>
				<td class="diff">College Name:</td>
				<td class="data"><?php echo $obj->get_college_name($conn, $data['collegeId']);	?></td>
			</tr>
			<tr>
				<td class="diff">Department:</td>
				<td class="data"><input class='form-control' type='text' name='dept_code' value='<?php echo $obj->get_branchname($conn, $data['dept_code']); ?>'></td>
			</tr>
			<tr>
				<td class="diff">Faculty Name:</td>
				<td class="data"><input class='form-control' type='text' name='name' value='<?php echo $data['name']; ?>'></td>
			</tr>
			<tr>
				<td class="diff">Designation:</td>
				<td class="data"><input class='form-control' type='text' name='designation' value='<?php echo $data['designation']; ?>'></td>
			</tr>
			<tr>
				<td class="diff">Teaching Experience in Year:</td>
				<td class="data"><input class='form-control' type='text' name='teach_exp' value='<?php echo $data['teach_exp']; ?>'></td>
			</tr>
			<tr>
				<td class="diff">Industrial Experience in Year:</td>
				<td class="data"><input class='form-control' type='text' name='industrial_exp' value='<?php echo $data['industrial_exp']; ?>'></td>
			</tr>
			<tr>
				<td class="diff">Mobile no:</td>
				<td class="data"><input class='form-control' type='text' name='mobile_no' value='<?php echo $data['mobile_no']; ?>'></td>
			</tr>
			<tr>
				<td class="diff">Email Id:</td>
				<td class="data"><input class='form-control' type='text' name='email' value='<?php echo $data['email']; ?>'></td>
			</tr>
			
		</table>
	</div>
	<div class="col-sm-6">
		<table  class="bound">
			<tr>
				<td colspan="2" align="center"><h3><u>Bank Details</u></h3></td>
			</tr>
			<tr>
				<td class="diff">Account Holder:</td>
				<td class="data"><input class='form-control' type='text' name='nameInBank' value='<?php echo $data['nameInBank'];	?>'></td>
			</tr>
			<tr>
				<td class="diff">Bank Name:</td>
				<td class="data"><input class='form-control' type='text' name='nameOfBank' value='<?php echo $data['nameOfBank']; ?>'></td>
			</tr>
			<tr>
				<td class="diff">IFSC Code:</td>
				<td class="data"><input class='form-control' type='text' name='ifsc' value='<?php echo $data['ifsc']; ?>'></td>
			</tr>
			<tr>
				<td class="diff">Account No.:</td>
				<td class="data"><input class='form-control' type='text' name='account' value='<?php echo $data['account']; ?>'></td>
			</tr>
			
		</table>
	</div>
	<!-- degree time institute university passingyr branchSpeci percent -->
	<?php $tech = $obj->get_technical_details($conn, $id);?>
	<br><br><br>
	<div class="col-sm-12 blk" align="center">
		<table class="table">
			<thead>
			<tr>
				<td colspan="7" align="center"><h3><u>Technical/ Professional</u></h3></td>
			</tr>

			<tr>
				<th>S.No.</th>
				<th>Name of Degree</th>
                <th>Full Time/ Part Time/ Correspondence etc.</th>
                <th>Name of Institution/ College</th>
                <th>University</th>
                <th>Year of Passing</th>
                <th>Branch/ Specialization</th>
			</tr>
			</thead>
			<tbody>
				<?php
					$i = 1;
					while($row = $tech->fetch()) {
						$degree = $row['degree'];
						$time = $row['time'];
						$institute = $row['institute'];
						$university = $row['university'];
						$passingyr = $row['passingyr'];
						$branchSpeci = $row['branchSpeci'];
						echo "<tr>";
						echo "<td>$i</td>";
						echo "<td><input class='form-control' type='text' name='degree[$i]' value='$degree'></td>";
						echo "<td><input class='form-control' type='text' name='time[$i]' value='$time'></td>";
						echo "<td><input class='form-control' type='text' name='institute[$i]' value='$institute'></td>";
						echo "<td><input class='form-control' type='text' name='university[$i]' value='$university'></td>";
						echo "<td><input class='form-control' type='text' name='passingyr[$i]' value='$passingyr'></td>";
						echo "<td><input class='form-control' type='text' name='branchSpeci[$i]' value='$branchSpeci'></td>";
						echo "</tr>";
						$i++;
					}

				?>
			</tbody>
		</table>
	</div>
	<?php $tech = $obj->get_additional_details($conn, $id);?>
	<div class="col-sm-12 blk" align="center">
		<table class="table">
			<thead>
			<tr>
				<td colspan="7" align="center"><h3><u>Additional Courses</u></h3></td>
			</tr>

			<tr>
				<th>S.No.</th>
				<th>Name of Degree</th>
                <th>Full Time/ Part Time/ Correspondence etc.</th>
                <th>Name of Institution/ College</th>
                <th>Details of Training/ Course</th>
			</tr>
			</thead>
			<tbody>
				<?php
					$i = 1;
					while($row = $tech->fetch()) {
						$degree = $row['degree'];
						$time = $row['time'];
						$institute = $row['institute'];
						$university = $row['university'];
						$passingyr = $row['passingyr'];
						$branchSpeci = $row['branchSpeci'];
						echo "<tr>";
						echo "<td>$i</td>";
						echo "<td><input class='form-control' type='text' name='nod[$i]' value='$degree'></td>";
						echo "<td><input class='form-control' type='text' name='type[$i]' value='$time'></td>";
						echo "<td><input class='form-control' type='text' name='ins[$i]' value='$institute'></td>";
						echo "<td><input class='form-control' type='text' name='train[$i]' value='$branchSpeci'></td>";
						echo "</tr>";
						$i++;
					}

				?>
			</tbody>
		</table>
	</div>

</div>  
</form>      
<?php
	require ("../include/footer.php");
?>
<?php $conn=null; ?>

					

					
					
					
					
					
					
					
					