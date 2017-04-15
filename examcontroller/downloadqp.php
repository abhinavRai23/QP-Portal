<?php 
include '../include/secure_exam.php';
require ("../include/header.php");


     

?>
<style>
.checkbox-inline, .radio-inline {
    padding-left: 10%;
}
textarea{
    margin:2%;
}
.s_no{
    padding-top: 15px !important;
}
.btn{
    padding:3px 12px;
}
th{
    vertical-align: middle !important;
}
thead{
    background-color: #f2f2f2; 
}
</style>
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%;">
Question Bank
</div><div class="panel-body" id="panel-body">
	<div class="row">
	<div class="col-md-3	"></div>
		<div class="col-sm-6">
			<form id="QB-form" role="form" class="form-inline" method="POST" action="setView.php" target="_blank">
				<Table style="width:100%;">
					<!--<tr>
						<div class="form-group">
							<td>
								<label>Purpose:</label>
							</td>
							<td>
								<select class="form-control" name="purpose" id="purpose" style="width:100%">
		 							<option value="I">View</option>
		 							<option value="D">Download</option>
		 							
		 						</select>
							</td>
						</div>	
					</tr>
					-->
					<input type="hidden" id="purpose" name="purpose">
					<tr>
						<div class="form-group">
							<td>
								<label>Course:</label>
							</td>
							<td>
							<select name="courseId" id="courseId" class="form-control" style="width:100%"  onchange="getbranch();" required>
							<?php
								$branchlist = $obj->get_courses($conn);
								while($branch = $branchlist->fetch()) {
									$branchName = $branch["courses"];
									
									echo "<option value='$branchName'>$branchName</option>";
								}		
							?>
						</select>
						<script type="text/javascript">
						function getbranch() {
						      var c = document.getElementById('courseId').value;
						      
						      $.ajax({
						       type:"POST",
						       url:"common/getdata.php",
						       data:'course='+c+'&t=1',
						       success:function(result){
						            $("#branchlist").html(result);
						       }

						      });     
						}
						</script>
							</td>
						</div>	
					</tr>
					<tr>
						<div class="form-group">
							<td>
								<label>Branch:</label>
							</td>
							<td>
							<select name="branchId" id="branchlist" class="form-control" style="width:100%"  onchange="getsubjects();" required>
							
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
							<select name="semester" class="form-control" id="semesterlist" onchange="getsubjects();" style="width:100%" required>
							<option value="0">All</option>
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
					<!--<tr>
						<div class="form-group">
							<td>
								<label>Subject:</label>
							</td>
							<td>
							<select name="subs" class="form-control" id="subjectlist" style="width:100%" required>
						</select>
							</td>
						</div>	
					</tr>-->
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
					
					
				</Table>
				<center><input type="hidden" class="btn btn-md btn-success btn-block" value="Submit" name="createSet" style="width:25%;">
				<button id="btn-view" class="btn btn-success" style="width:20%;">View</button>&nbsp;&nbsp;<button id="btn-download" class="btn btn-success" style="width:20%;">Download</button></center>
			</form>
		</div>
	</div>
	
		
</div>



</div>      
<script type="text/javascript" src="js/approvefaculty.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#btn-view").click(function(){
			$("#purpose").val("I");
			$("#QB-form").submit();
		});
		$("#btn-download").click(function(){
			$("#purpose").val("D");
			$("#QB-form").submit();
		});
	});
</script>

<?php require ("../include/footer.php"); 
?>