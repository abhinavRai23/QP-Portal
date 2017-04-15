<?php require ('../include/header.php');

      require ('../common/connectionPDO.php');
      //require ('../common/queries.php');

        $obj = new Queries();

     

?>

<script>



 $(document).ready(function(){
 $("#submit").click(function(){

 	var sem=document.getElementById("semesterlist").value;
var branch=document.getElementById("branchlist").value;
var sub =document.getElementById("subjectlist").value; 
 myfunction(sem,sub,branch);
});

function submitmyform(){
	alert("submitting my form");
}


});







function myfunction(sem,sub,branch){

 $.ajax({
             
             type:"POST",
             url:"showQuestionSet.php",
             data:{sub:sub,sem:sem,branch:branch},
             success:function(result){
             	$("#questionset").html(result);
             	//$("#createnew").css("display","block");
             	// $("#nequestionset").html("<button class='btn' onclick='newquestinset("+sub+","+sem+")'>Final</button>");
             }
   
            });
	
}

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
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%">
            Create Question Paper Set<br><br>
</div>
<div class="panel-body" id="panel-body">
	<div class="row">
	<div class="col-md-3	"></div>
		<div class="col-sm-6">
			<form role="form" class="form-inline" method="POST" action="select_sub_setQuestionBank.php" id="myform">
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
							<select name="branchId" id="branchlist" class="form-control" style="width:100%"  onchange="getsubjects();" required>
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
					<tr>
						<div class="form-group">
							<td>
								<label>Subject:</label>
							</td>
							<td>
							<select name="sub" class="form-control" id="subjectlist" style="width:100%" required>
						</select>
						  <input type="hidden" name="alert" value="no" />
							</td>
						</div>	
					</tr>
					
				</Table>
				<center><input type="button" id="submit"class="btn btn-md btn-success btn-block" value="Submit" name="createSet" style="width:25%;"></center><!-- <input type="submit" id="createnew"class="btn btn-md btn-success btn-block" value="Create New" name="createSet" style="width:25%; float:right;width:200px;    margin-top: -4.9%;
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
                           
                                  
                            </div>

                      
                    
      </div>
   </div>   

</div>  </div>    
<script type="text/javascript" src="../js/approvefaculty.js"></script>
<?php require '../include/footer.php';?>

<?php
 	 if(isset($_POST['redirectPage'])) 
 	 	echo "<script>myfunction('".$_POST['sem']."','".$_POST['sub']."','');</script>";
 	 	?>




	