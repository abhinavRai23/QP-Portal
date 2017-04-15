<?php require ('../include/header.php');
      require ('../common/connectionPDO.php');
      //require ('../common/queries.php');
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
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%">
            View Subjects<br><br>
</div>
<div class="panel-body" id="panel-body">
	<div class="row">
	<div class="col-md-3	"></div>
		<div class="col-sm-6">
			<form role="form" class="form-inline" method="POST" action="" id="myform">
				<table style="width:100%;">
					
					<tr>
						<div class="form-group">
							<td>
								<label>Branch:</label>
							</td>
							<td>
							<select name="branchId" id="branchlist" class="form-control" style="width:100%" required>
							<option>SELECT</option>
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
							<select name="semester" class="form-control" style="width:100%" required>
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
					<tr>
						<div class="form-group">
							<td colspan="2" align="center">
								<input type="submit" value="Submit" name="getdata" class='btn btn-outline btn-success'>
							</td>
						</div>
					</tr>
				</table>
			</form>


		<div class="panel-inside">
		<!-- part if form submitted -->
		
		<?php
			// if(isset($_POST['appdisapp'])) {
			// 	$facultyId = htmlentities($_POST['facultyId']);
			// 	$subjectId = htmlentities($_POST['subjectId']);
			// 	$approve = htmlentities($_POST['approve']);

			// 	$obj->update_approval($conn, $facultyId, $subjectId, $approve);
				
				
			// }
			if(isset($_POST['getdata'])) {
				$branchId = htmlentities($_POST['branchId']);
				$branchName = $obj->get_branchname($conn, $branchId);
				$semester = htmlentities($_POST['semester']);

				//$subjectName = $obj->get_subjects_by_id($conn,$subjectId)->fetch()['subjectName'];
				if($semester=='All')
					$list_subject = $obj->get_subjects_by_branch_order_sem($conn,$branchId);
				else
					$list_subject = $obj->get_subjects_by_branch_sem($conn, $branchId, $semester);
				

				echo "<br><br><center><h4>Branch Name: $branchName</h4></center>";
				echo "<div class='table-responsive'><table class='table table-striped table-bordered table-hover' id='subtable2'>";
				echo "<thead><tr>
				<th>S.No.</th>
				<th>Semester</th>
				<th>Code</th>
				<th>Subject</th>
				</tr></thead>";
				$count = 0;
				$i = 0;
				while($row = $list_subject->fetch()) {
					$class = ($count%2)?'even':'odd'; 
					$i = $i+1;
					$count ++;
					echo "<tr class='$class'>
							<td>$i</td>
							<td>$row[semester]</td>
							<td>$row[subjectId]</td>
							<td>$row[subjectName]</td>
							";

					echo "</tr>";
				}
				echo "</table></div>";
			}
		?>
	   </div>
</div>        
<?php
	require ("../include/footer.php");
?>
<script type="text/javascript">
	$(document).ready(function() {
        $('#subtable2').dataTable({
            "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],iDisplayLength: -1
        });
    });
</script>
