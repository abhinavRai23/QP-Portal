<?php
include '../common/queries.php';
include'../common/connectionPDO.php';
 $obj = new Queries();
 //$sub=$_POST['sub'];
$sem=$_POST['sem'];
$branch=$_POST['branch'];
 // $sub='AUC301';
 // $sem=3;
//$branch=$_POST['branch'];

$run=$obj->fetchQuestionSet_coor($branch,$sem,$conn);
echo'

      <div class="panel panel-default">
                <div class="panel-heading">
                    View Question Paper Set
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Branch</th>
                                    <th>Semester</th>
                                    <th>Subject</th>
                                    <th>Set Name</th>
                                    <th>Prepare</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>';
                            $ii=1;
            while($p=$run->fetch(PDO::FETCH_ASSOC)) {
               // print_r($p);echo "<br>";
              $p_sub = $obj->get_subjects_by_id($conn,$p['subject'])->fetch();
              $sem = $p['sem'];
                    $buttonId =  $p['setId'].$p['subject'].$sem;     

                  echo'           <tbody>
                                <tr>
                                    <td>'.$ii++.'</td>
                                    <td>'.$obj->get_branchname($conn, $p_sub['branchId']).' ('.$p_sub['branchId'].')</td>
                                    <td>'.$p_sub['semester'].'</td>
                                    <td>'.$p_sub['subjectName'].' ('.$p['subject'].')</td>
                                    <td>'.$p['setId'].'</td>
                                    ';
                                    if($p['controller']=='0'){
                                    echo "<td>";
                                    echo '<button id="P'.$buttonId.'" class="btn btn-primary" onclick="prepareQS(\''.$p['setId'].'\',\''.$p['subject'].'\')">Prepare</button>';
                                    
                                    echo '</td>
                                    <td><button  id="V'.$buttonId.'" class="btn btn-warning" onclick="viewQS(\''.$p['setId'].'\',\''.$p['subject'].'\',\''.$sem.'\')">View</button></td>
                                    <td><button  id="D'.$buttonId.'" class="btn btn-danger" onclick="delQS(\''.$p['setId'].'\',\''.$p['subject'].'\',\''.$sem.'\')">Delete</button></td>
                                    ';
                                    }
                                    else{
                                    echo "<td>";
                                    echo '<button class="btn btn-primary" disabled>Prepare</button>';
                                    
                                    echo '</td>
                                    <td><button  id="V'.$buttonId.'" class="btn btn-warning" onclick="viewQS(\''.$p['setId'].'\',\''.$p['subject'].'\',\''.$sem.'\')">View</button></td>
                                    <td><button  class="btn btn-danger" disabled>Delete</button></td>
                                    ';
                                        
                                    }
                                    
                                    echo ' </tr>
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
        function viewStudent(set,sub,sem){
            $("#myhiddendiv2").html("<form id='myhiddenform2' method='POST' action='student.php'><input type='hidden' name='sub' value='"+sub+"'><input type='hidden' name='set' value='"+set+"'><input type='hidden' name='sem' value='"+sem+"'><input type='hidden' name='allow' value='1'></form>");
            $("#myhiddenform2").submit();
        }
        function viewStudentD(set,sub,sem){
            $("#myhiddendiv2").html("<form id='myhiddenform2' method='POST' action='student.php'><input type='hidden' name='sub' value='"+sub+"'><input type='hidden' name='set' value='"+set+"'><input type='hidden' name='sem' value='"+sem+"'><input type='hidden' name='allow' value='0'></form>");
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
    $("#newmodalpattern").submit();
     
 });
});
</script>





 

  
