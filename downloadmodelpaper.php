<?php 
require 'include/headerindex.php';
require 'common/connectionPDO.php';

        $obj = new Queries();


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
Model Question Papers
</div><div class="panel-body" id="panel-body">
	<div class="row">
	<div class="col-md-3	"></div>
		<div class="col-sm-6">
			<form id="QB-form" role="form" class="form-inline" method="POST">
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
							<option value="All">All</option>
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
					<!--<tr>
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
					</tr>-->
					
					
				</Table>
				<center><input type="submit" name="submit" value="Submit" class="btn btn-success"></center>
				<!--
				<center><input type="hidden" class="btn btn-md btn-success btn-block" value="Submit" name="createSet" style="width:25%;">

				<button id="btn-view" class="btn btn-success" style="width:20%;">View</button>&nbsp;&nbsp;<button id="btn-download" class="btn btn-success" style="width:20%;">Download</button></center>
				-->

			</form>
		</div>
	</div>
	
		<div id="myhiddenForm" style="visibility:hidden;">
			
		</div>
</div>
	<?php
		if(isset($_POST['submit'])){
			$branch = $_POST['branchId'];
			$semester = $_POST['semester'];
			
			echo '<center><table class="table" style="width:60%;">';
			$sets=$obj->fetchQuestionSet_student($branch,$semester,$conn);
			
			$k=1;
			//print_r($_POST);
			echo "<tr>
					<thead>
						<th>S.No.</th>
						<th>Semester</th>
						<th>Subject</th>
						<th>View</th>
						<th>Download</th>
					</thead>
				</tr>";
			while($sub=$sets->fetch()){
				$p_sub = $obj->get_subjects_by_id($conn,$sub['subject'])->fetch();
					echo '<br><tr>
					<td>'.$k++.'</td>
					<td>'.$sub['sem'].'</td>
					<td>'.$p_sub['subjectName'].' ('.$sub['subject'].')</td>';
					echo '<td>
							<button class="btn btn-success" onclick="download(\'I\',\''.$sub['setId'].'\',\''.$sub['sem'].'\',\''.$sub['subject'].'\')">View</button>
						</td>
					<td>
							<button class="btn btn-success" onclick="download(\'D\',\''.$sub['setId'].'\',\''.$sub['sem'].'\',\''.$sub['subject'].'\')">Download</button>
						</td>';
					
				echo '</tr>';
			}
			echo '</table></center>';
		}

	?>


</div>      
<script type="text/javascript" src="js/approvefaculty.js"></script>
<?php require 'include/footerindex.php';?>
<script type="text/javascript">
	function download(p,set,sem,sub){
			$("#myhiddenForm").html('<form id="pdfForm" action="paper.php" method="POST" target="_blank"><input type="hidden" name="purpose" value="'+p+'"><input type="hidden" name="set" value="'+set+'"><input type="hidden" name="sem" value="'+sem+'"><input type="hidden" name="sub" value="'+sub+'"></form>');
			$("#pdfForm").submit();

		}
	
</script>