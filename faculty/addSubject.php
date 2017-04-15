<?php require ('../include/header.php');
  include 'addSubjectMail.php';
      //require ('../common/connectionPDO.php');
      //require ('../common/queries.php');

      $obj = new Queries();

     $facId=$_SESSION['id'];
    // echo $facId;
     // $facId=12;

?>
<?php
  if(!empty($_POST['user'])&&!empty($_POST['sub'])&&!empty($_POST['exp'])){
  $userId=$_POST['user'];
   $exp=$_POST['exp'];
   $newSubjectid=[];
  $subject=$_POST['sub'];

  $sql = "SELECT * FROM subjects WHERE userId=:user";
  $run = $conn->prepare($sql);
         $run->bindParam(':user',$userId);
         $run->execute();
         while($result = $run->fetch(PDO::FETCH_ASSOC)){

         $reGsubject[]=$result['subjectId'];
       }
         $k=0;
        
    
                     for($i=0;$i<count($reGsubject);$i++){
                     if($reGsubject[$i]==$subject){
                            $k++;
                            }

                    }
if($k==0){

  $sql2 = "INSERT INTO subjects (userId, subjectId, confirm,experience) VALUES (:userId, :subjectId, '0',:exp)";
  $runn = $conn->prepare($sql2);
  $runn->bindParam(':userId', $userId);
      $runn->bindParam(':subjectId', $subject);
       $runn->bindParam(':exp', $exp);
      $runn->execute();
      echo "<script>swal('Subject Added')</script>";
    sendmailfac($conn,$obj, $facId, $subject);
     
    }
   //$reGsubject=[];
  //removing the id's for which faculty is already registered
 
else{
echo "";
}  
 }    

  




?>

<script type="text/javascript">
	$(document).ready(function(){
    	$("#semesterlist,#courseId,#branchlist").change(function(){
    		var userId="<?php echo $facId;?>";
    		var branch=$('#branchlist').val();
        var sem=$('#semesterlist').val();
             $.ajax({
             type:"POST",
             url:"showSubjects.php",
             data:{branch:branch,userId:userId,sem:sem},
             success:function(result){
             $("#subject").html(result);
             }
             });
       	});

	});

	function exp(i,facId,sub){
    var exp=$('#exp'+i).val();
    if(confirm("Are you sure?")){

        $.ajax({              
               type:"POST",
               url:"addExp.php",
               data:{sub:sub,userId:facId,val:exp},
               success:function(result){
               $('#ex'+i).html(result);
               
               }
   
              });
      }else{
            var exp=0;
        $.ajax({              
               type:"POST",
               url:"addExp.php",
               data:{sub:sub,userId:facId,val:exp},
               success:function(result){
               $('#ex'+i).html(result);
               
               }
   
              });


      }

         }
         function sendmailfac(facId, subId) {
  
    $.ajax({
      type:"POST",
      url:"addSubjectMail.php",
      data:"facId="+facId+"&subId="+subId,
      success:function(result) {
        swal('An Email is sent to Coordinator');
      }
    });
}
	
function deletesubjectpr(facId,subId,val) {
  swal({
              title: "Are you sure want to delete it?",
              text: "You will not be able to change it!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#5cb85c",
              cancelButtonColor: "#f0f0f0",
              // confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes",
              cancelButtonText: "No",
              closeOnConfirm: true,
              closeOnCancel: true
            },
            function(isConfirm) {
              if (isConfirm) {
                swal("", "The subject is now deleted.", "error");
               $.ajax({  
      type:"POST",
      url:"deleteSubjectfacultypr.php",
      data:'facId='+facId+'&subId='+subId,
      success:function(result){
        $('#delete'+val).html(result);
      }

    });
               // swal("Approved", "Subject Approved", "success");
              } else {
                swal("","Subject is not deleted", "success");
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
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%;">
           Select Subjects<br><br>
</div>
<div class="panel-body" id="panel-body">
	<div class="row">
  <div class="col-sm-10" style="margin:auto 8.33%">
		<div class="col-sm-6" style="border-right:1px solid #ddd">
      <div class="panel panel-red">
        <div class="panel-heading">
            Choose Options
        </div>
        <div class="panel-body">
    			<form role="form" class="form-inline" action="addSubject.php" method="POST">
    				<Table style="width:100%;">
    					<tr>
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
    								<select class="form-control" name="course" id="courseId"  onchange="getbranches();"  style="min-width:37%;width:60%;">
    									<option>Select</option>
                      	<?php
                        $sql = $conn->prepare("SELECT DISTINCT(course) FROM info_college WHERE collegeId=(SELECT collegeId FROM users WHERE id=:id)");
                        $sql->bindParam(':id', $_SESSION['id']);
    										$sql->execute();
                        while($row = $sql->fetch()) {
    											echo "<option value='".$row["course"]."'>".$row["course"]."</option>";
    										}
    									?>
    									</select>   
    		                        </select>
    							</td>
    						</div>	
    					</tr>
    					<tr>
    						<div class="form-group">
    							<td>
    								<label>Branch:</label>
    							</td>
    							<td>

    							<select class="form-control" name="branch[]" id="branchlist" style="min-width:37%;width:60%;">
    									<option>Select</option>
    										

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
              <select name="sem" class="form-control" id="semesterlist" style="min-width:37%;width:60%;" onchange="getsubjects();" required>
              <option>Select</option>
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
              <select name="sub" class="form-control" id="subject" style="min-width:37%;width:60%;" required>
             
              
            </select>
              </td>
            </div>  
          </tr>   

          <tr>
            <div class="form-group">
              <td>
                <label>No. of times taught:</label>
              </td>
              <td>
              <input type="integer" name="exp" class="form-control" id="exp" style="min-width:37%;width:60%;" required>
              
            
              </td>
            </div>  
          </tr>   
    				</Table>
    				
    				<?php
    				echo'<input type="hidden" value="'.$facId.'" name="user">';
    				?>
    				<!-- <div id="subject" style="width: 73%;border-color:#F1F1F1;border-style:solid;min-height:150px;max-height:150px;overflow: scroll;">
    				</div> -->
    				
    				 <input type="submit" class="btn btn-success" value="Submit" id="add" style="    margin: 2%;">		
    			</form>
        </div>
      </div>  
		</div>
    <div class="col-sm-6" border="1" style="">
      <div class="panel panel-red">
        <div class="panel-heading">
            Selected Subjects
        </div>
        <div class="panel-body">
         	<div class="table-responsive" style="overflow-x:visible;">
          	<table class="table table-bordered table-hover">
        	    <thead>
                <tr>
                    <th>S.No.  </th>
                    <th>Subject</th>
                    <th>Semester</th>
                    <th>No. of times taught</th>
                    <th>Status</th>

                    <th>Edit</th>
                  
                </tr>
              </thead>
              <tbody>
                <span id="done">
              
                   <?php
                   $i=1;
                    
                     $p=$obj->get_subject_list_faculty_all($conn,$facId,0);
                     
                     while($d=$p->fetch(PDO::FETCH_ASSOC)){
                     	$status=$obj->get_approval_status($conn, $facId, $d['subjectId']);
                     	$subname= $obj->get_subjects_by_id($conn,$d['subjectId'])->fetch()['subjectName'];
                      $exp=$obj->get_facuty_experience($conn, $facId, $d['subjectId']);
                  echo'<tr>
                  <td>'.$i++.'</td>
                  <td>'.$subname.'('.$d['subjectId'].')</td>
                  <td>'.$d['semester'].'</td>';
                  
                   echo '<td>'.$exp.'</td>';
                   
                   if($status==0)
                    echo'<td>Pending</td>';
                   if($status==1)
                    echo'<td>Approved</td>';
                   if($status==2)
                    echo'<td>Disapproved</td>';
                    if($status==1)
                   echo' <td>- </td>';
                  else
                  	echo' <td><div id="delete'.$i.'"> <button class="btn btn-danger"  onclick ="deletesubjectpr(\''.$facId.'\', \''.$d['subjectId'].'\',\''.$i.'\')">Delete</button></div></td>';
                  echo' </tr>';
                   }
                  ?>
           
          
                </span>
              </tbody>
            </table>
          </div>
        </div>  
		</div>
  </div>
</div>
</div>    




    
<script type="text/javascript" src="../js/approvefaculty.js"></script>
<?php require '../include/footer.php';?>