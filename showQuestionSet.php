<?php
include '../common/queries.php';
include'../common/connectionPDO.php';
 //$sub=$_POST['sub'];
$sem=$_POST['sem'];
$branch=$_POST['branch'];
 // $sub='AUC301';
 // $sem=3;
//$branch=$_POST['branch'];

$run=fetchQuestionSet($branch,$sem,$conn);
echo'<input type="button" id="createnew" data-toggle="modal" data-target="#creatset" class="btn btn-md btn-success btn-block" value="Create New" name="createSet" style="width:25%; float:right;margin-top: 1%;
    margin-right: 1%;">
 
            </form>

<!-- Modal -->
  <div class="modal fade" id="creatset" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create New Question Paper Set</h4>
        </div>
        <div class="modal-body">
         <form action="question_paper_pattern.php" class="form-inline" method="POST" id="newmodalpattern">
      <span style="margin-right:2%;font-size:12px;font-weight:bold;">Subject:'.$sub.'</span><input type="hidden" class="form-control" name="sub" value="'.$sub.'" required>
      <span style="font-size:12px;font-weight:bold;">Semester:'.$sem.'</span><input type="hidden" class="form-control" name="sem" value="'.$sem.'">
      <br><br><br><label>Set Name:&nbsp;&nbsp;<label><input type="text" class="form-control" name="set" required >
      
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-success" value="submit" id="newmodalsubmit" data-dismiss="modal">
       </form>
        </div>
      </div>
      
    </div>
  </div>

      <div class="panel panel-default">
                <div class="panel-heading">
                    Question set
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Subject</th>
                                    <th>Set Name</th>
                                    <th>Prepare</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>';
                            $ii=1;
            while($p=$run->fetch(PDO::FETCH_ASSOC)) {
                     
                    $buttonId =  $p['setId'].$p['subject'].$sem;             
                  echo'           <tbody>
                                <tr>
                                    <td>'.$ii++.'</td>
                                    <td>'.get_subjects_by_id($conn,$p['subject'])->fetch()['subjectName'].' ('.$p['subject'].')</td>
                                    <td>'.$p['setId'].'</td>
                                    <td>';
                                    
                                    echo '<button id="P'.$buttonId.'" class="btn btn-default" onclick="prepareQS(\''.$p['setId'].'\',\''.$p['subject'].'\')">Prepare</button>';
                                    
                                    echo '</td>
                                    <td><button  id="V'.$buttonId.'" class="btn btn-default" onclick="viewQS(\''.$p['setId'].'\',\''.$p['subject'].'\',\''.$sem.'\')">View</button></td>
                                    <td><button  id="D'.$buttonId.'" class="btn btn-default" onclick="delQS(\''.$p['setId'].'\',\''.$p['subject'].'\',\''.$sem.'\')">Delete</button></td>
                                    ';
                                    echo '
                                </tr>
                            </tbody>';
                             
                    
                            

  
                } 
               echo ' </table> 

                </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>     
      </div><div style="hidden" id="myhiddendiv1"></div><div style="hidden" id="myhiddendiv2"></div> ';          


                          
?>



<?php
function fetchQuestionSet($branch, $sem,$conn){

if($sem!='all') {
 $sql="SELECT * FROM  paper_pattern WHERE sem=:sem AND controller='1' AND subject IN (SELECT subjectId FROM info_subject WHERE branchId=:branch)";
$run = $conn->prepare($sql);
        $run->bindParam(':branch', $branch);
        $run->bindParam(':sem', $sem);
}
else {
  $sql="SELECT * FROM  paper_pattern WHERE subject IN (SELECT subjectId FROM info_subject WHERE branchId=:branch) AND controller='1'";
$run = $conn->prepare($sql);
        $run->bindParam(':branch', $branch);
}

 
        $run->execute();
        return $run;


}



?>

<script type="text/javascript">
 function prepareQS(set,sub){
            $("#myhiddendiv2").html("<form id='myhiddenform2' method='POST' action='showPattern.php'><input type='hidden' name='sub' value='"+sub+"'><input type='hidden' name='set' value='"+set+"'></form>");
            $("#myhiddenform2").submit();
        }
        function viewQS(set,sub,sem){
            $("#myhiddendiv2").html("<form id='myhiddenform2' target='_blank' method='POST' action='paper.php'><input type='hidden' name='sub' value='"+sub+"'><input type='hidden' name='set' value='"+set+"'><input type='hidden' name='sem' value='"+sem+"'></form>");
            $("#myhiddenform2").submit();
        }
        function delQS(set,sub,sem){
            $("#myhiddendiv2").html("<form id='myhiddenform2' method='POST' action='delset.php'><input type='hidden' name='sub' value='"+sub+"'><input type='hidden' name='set' value='"+set+"'><input type='hidden' name='sem' value='"+sem+"'></form>");
            $("#myhiddenform2").submit();
        }
        function finaliseQS(set,sub,sem,buttonId){
            if(confirm("Paper set will be sent to the controller of examination, no changes will be permissible after submission!")){
                var p = '#P'+buttonId;
                var v = '#V'+buttonId;
                var f = '#F'+buttonId;
                $.ajax({
             
             type:"POST",
             url:"paperSent.php",
             data:{sub:sub,sem:sem,set:set},
             success:function(result){
                if(result=='1'){
                    alert('Paper set '+set+' has been sent successfully');
                    $(p).attr("disabled","true");
                    $(f).html("Paper Sent to CoE");
                    $(f).attr("disabled","true");
                }
             }
   
            });

            }
            }
      $(document).ready(function(){
       
   $("#createnew").click(function(){
    $("#myhiddenform").submit();
     
 });
});
      $(document).ready(function(){
       
   $("#newmodalsubmit").click(function(){
    $("#newm