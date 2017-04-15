<?php 
include '../include/secure_coord.php';
include '../include/header.php';

$id=$facultyid = $_GET['facultyid'];
	$data = $obj->get_user_details($conn, $facultyid);
	$img = $data['image'];
?>
<style>
.panel-red .panel-heading {
  border-color: #d9534f !important;
  color: #fff;
  background-color: #d9534f !important;
}	
.panel-red {
  border-color: #d9534f !important;
}
.bound{
	border-spacing: 2px !important;
	width: 100%;
	min-height: 300px;
	padding: 5% !important;
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
	<div class="row">
		<div class="col-sm-6" style="padding-top:2%;">
			<div class="panel panel-red">
	            <div class="panel-heading" align="center" style="font-size:20px;text-decoration:underline;">
	                Personal Details
	            </div>
	            <div class="panel-body">
	                <table class="bound">
						<tr>
							<td class="diff">College Name:</td>
							<td class="data"><?php echo $obj->get_college_name($conn, $data['collegeId']);	?></td>
						</tr>
						<tr>
							<td class="diff">Department:</td>
							<td class="data"><?php echo $obj->get_branchname($conn, $data['dept_code']); ?></td>
						</tr>
						<tr>
							<td class="diff">Faculty Name:</td>
							<td class="data"><?php echo $data['name']; ?></td>
						</tr>
						<tr>
							<td class="diff">Designation:</td>
							<td class="data"><?php echo $data['designation']; ?></td>
						</tr>
						<tr>
							<td class="diff">Teaching Experience in Year:</td>
							<td class="data"><?php echo $data['teach_exp']; ?></td>
						</tr>
						<tr>
							<td class="diff">Industrial Experience in Year:</td>
							<td class="data"><?php echo $data['industrial_exp']; ?></td>
						</tr>
						<tr>
							<td class="diff">Mobile no:</td>
							<td class="data"><?php echo $data['mobile_no']; ?></td>
						</tr>
						<tr>
							<td class="diff">Email Id:</td>
							<td class="data"><?php echo $data['email']; ?></td>
						</tr>
					</table>
	            </div>
	        </div>
			
		</div>
		<div class="col-sm-6" style="padding-top:2%;">
			<div class="panel panel-red">
	            <div class="panel-heading" align="center" style="font-size:20px;text-decoration:underline;">
	                Bank Details
	            </div>
	            <div class="panel-body">
	           <table class="bound">
				<tr>
					<td class="diff">Account Holder:</td>
					<td class="data"><?php echo $data['nameInBank'];	?></td>
				</tr>
				<tr>
					<td class="diff">Bank Name:</td>
					<td class="data"><?php echo $data['nameOfBank']; ?></td>
				</tr>
				<tr>
					<td class="diff">IFSC Code:</td>
					<td class="data"><?php echo $data['ifsc']; ?></td>
				</tr>
				<tr>
					<td class="diff">Account No.:</td>
					<td class="data"><?php echo $data['account']; ?></td>
				</tr>
			</table>
		</div>
	</div>
	</div>
	<!-- degree time institute university passingyr branchSpeci percent -->
	<?php $tech = $obj->get_technical_details($conn, $id);?>
	
	<div class="col-sm-10" align="center" style="padding-top:2%;margin:auto 8.33%;">
		<div class="panel panel-red">
	            <div class="panel-heading" align="center" style="font-size:20px;text-decoration:underline;">
	                Technical/Professional
	            </div>
	            <div class="panel-body">
	            <div class="table-responsive">
			        <table class="bound table" style="min-height:10px;">
			        <thead>
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
								echo "<td>$degree</td>";
								echo "<td>$time</td>";
								echo "<td>$institute</td>";
								echo "<td>$university</td>";
								echo "<td>$passingyr</td>";
								echo "<td>$branchSpeci</td>";
								echo "</tr>";
								$i++;
							}

						?>
					</tbody>
					</table>
				</div>	
				</div>
		</div>		

	</div>

	<?php $tech = $obj->get_additional_details($conn, $id);?>
	<div class="col-sm-10" align="center" style="padding-top:2%;margin:auto 8.33%;">
		<div class="panel panel-red">
	            <div class="panel-heading" align="center" style="font-size:20px;text-decoration:underline;">
	                Additional Courses
	            </div>
	            <div class="panel-body">
		            <div class="table-responsive">
				        <table class="bound table" style="min-height:10px;">
					        <thead>
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
										echo "<td>$degree</td>";
										echo "<td>$time</td>";
										echo "<td>$institute</td>";
										echo "<td>$branchSpeci</td>";
										echo "</tr>";
										$i++;
									}

								?>
							</tbody>
						</table>
					</div>	
				</div>
		</div>		
	</div>
</div>        
<?php
	require ("../include/footer.php");
?>
<?php $conn=null; ?>

					

					
					
					
					
					
					
					
					