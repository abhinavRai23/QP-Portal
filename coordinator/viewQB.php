<?php
	error_reporting(E_ALL);
	include '../include/secure_coord.php';
    require ("../include/header.php");
?>	
<style>
	label{
		font-size: 13px
	}
	.form-control{
		margin-bottom: 4%;
		padding: 0px 12px;
	}
	.col-sm-6{
		margin-left: 25%;
	}
	hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid #BCBCBC;
}

</style>
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%">
              View Question Bank<br><br>
</div>
<div class="panel-body" id="panel-body">
	<div class="row">
		<div class="col-sm-6">
			<form role="form" class="form-inline" method="POST" action="view_QB.php">
				<Table style="width:100%;">
					<tr>
						<div class="form-group">
							<td>
								<label>Branch:</label>
							</td>
							<td>
							<select name="branchId" id="branchlist" class="form-control" style="width:100%"  required onchange="getsubjects();">
							<?php
									$allotedlist = $obj->get_alloted($conn, $id);
									$i=0;
									while($row = $allotedlist->fetch()) {
										$i++;
										$bid = $row['branchId'];
										$bname = $row['branchName'];
										echo "<option value='$bid'>$bname ($bid)</option>";
										
									}
								?>
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
							<select name="semester" class="form-control" id="semesterlist" onchange="getsubjects();" required style="width:100%">
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
							<select name="subs" class="form-control" id="subjectlist" style="width:100%" required>
						</select>
							</td>
						</div>	
					</tr>
					<tr>
						<div class="form-group">
							<td>
								<label>Section:</label>
							</td>
							<td>
								<select class="form-control" name="sec" id="sec" style="width:100%" required>
		 							<option value="All">All</option>           
		 							<option value="A">A</option>
		 							<option value="B">B</option>
		 							<option value="C">C</option>  
		                        </select>
							</td>
						</div>	
					</tr>
					<tr>
						<div class="form-group">
							<td>
								<label>Type:</label>
							</td>
							<td>
								<select class="form-control" name="type" id="type" style="width:100%" required>
		 							<option value="K">All</option>           
		 							<option value="M">Memory Based</option>
		 							<option value="A">Application Based</option>
		 							<option value="E">Evaluation Based</option>  
		                        </select>
							</td>
						</div>	
					</tr>
					
					
				</Table>
				<br>
					<br>
					
				<center><input type="submit" class="btn btn-md btn-success btn-block" value="Submit" name="viewQB" style="width:25%;"></center>
			</form>
		</div>
	</div>
	
		
</div>
<?php
	require ("../include/footer.php");
	$conn=null;
?>