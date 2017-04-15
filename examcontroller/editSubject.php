<?php require ('../include/header.php');

      require ('../common/connectionPDO.php');
      //require ('../common/queries.php');

        

$obj = new Queries();
if(isset($_POST['branch'])&&  isset($_POST['sem'])){
$bid = $_POST['branch'];
$sem = $_POST['sem'];
}
$sublist = $obj->get_subjects_by_branch_sem($conn, $bid, $sem);

?>

<script>







</script>
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
<div class="panel-heading" align="center">
           VIEW SUBJECT<br><br>
</div>
<div class="panel-body" id="panel-body">
	<div class="row">
	<div class="col-md-3	"></div>
		<div class="col-sm-6">
			<form role="form" class="form-inline" method="POST" action="editSubject.php" id="myform">
				<table style="width:100%;">
					<!-- <tr>
						<div class="form-group">
							<td>
								
							</td>
							
						</div>	
					</tr><tr>
						<div class="form-group">
							<td>
								<label>Course:</label>
							</td>
							<td>
								<select class="form-control" name="deptId" id="depId" style="width:100%" required>
								<option>SELECT</option>
		                        <?php
									$result = $obj->get_courses($conn);
									while($row = $result->fetch()) {
										echo "<option value='".$row["courseId"]."'>".$row["courses"]."</option>";
									}
								?>          
		                        </select>
							</td>
						</div>	
					</tr> -->
					<tr>
						<div class="form-group">
							<td>
								<label>Branch:</label>
							</td>
							<td>
							<select name="branch" id="branchlist" class="form-control" style="width:100%"  onchange="getsubjects();" required>
							<option>SELECT</option>
							<?php
								$branchlist = $obj->get_branches($conn);
								while($branch = $branchlist->fetch()) {
									$branchId = $branch["branchId"];
									$branchName = $branch["branchName"];
									
									echo "<option value='$branchId'>$branchName ($branchId)</option>";
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
							<select name="sem" class="form-control" id="semesterlist" onchange="getsubjects();" style="width:100%" required>
							<option>SELECT</option>
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
					
					
				</Table>
				<center><input type="submit" id="submit"class="btn btn-md btn-success btn-block" value="Submit" name="createSet" style="width:25%;"></center><!-- <input type="submit" id="createnew"class="btn btn-md btn-success btn-block" value="Create New" name="createSet" style="width:25%; float:right;width:200px;    margin-top: -4.9%;
    margin-right: -50%;" >-->
			
		</div>
		<div id="qestionSetwq">
	  	<div class="col-sm-6" style="margin-left:25%; margin-top:2%">
	  		
                    <div id="questionset">
                 
                                  
                            </div>

                      
                    
      </div>
   </div>   </form>
	</div>
	
		

<div id="qestionSetwq">
	  	<div class="col-sm-6" style="margin-left:25%; margin-top:2%">
	  		
                    <div id="questionset">
                         
                       
	


		<?php 

               if(isset($_POST['branch'])&&!(empty($_POST['branch']))&&(($_POST['branch'])!='SELECT')&&isset($_POST['sem'])&&!(empty($_POST['sem']))&&(($_POST['sem'])!='SELECT')){
		echo'<div class="panel-heading" align="center">
  List of subjects
</div>
<div class="panel-body" id="panel-body">
	<div class="table-responsive">
	<form method="POST">
		<table class="table table-striped table-bordered table-hover" id="subtable">
			<thead>
				<tr>
					<td>S.No.</td>
					<td>Branch</td>
					<td>Code</td>
					<td>Sem</td>
					<td>Edit</td>
				</tr>
			</thead>';
				$count = 0;
				
				 while($row = $sublist->fetch()) {
				 	$count=$count+1;
	                      $subid = $row['subjectId'];
	                    $subname = $row['subjectName'];
	                    $branchId=$row['branchId'];
					echo "<tr class='$class'>";
					echo "<td>". $count."</td>";
					echo "<td>". $subname."</td>";
					echo "<td>".$sem."</td>";
					echo "<td>".$subid."</td>";

					echo "<td><button class='btn btn-warning'>Edit</button></td>";
					echo "</tr>";
				}
				echo '</table>
	</form>
	</div>
</div>       ';}
				?>
		
		
    
                                  
                            </div>

                      
                    
      </div>
   </div>   

</div>  </div>    


?>
<?php require '../include/footer.php';?>

<?php
 	 if(isset($_POST['redirectPage'])) 
 	 	echo "<script>myfunction('".$_POST['sem']."','".$_POST['sub']."','');</script>";
 	 	?>


	