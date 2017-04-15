<?php
    require ("../include/header.php");
    require '../common/connectionPDO.php';
    if(!isset($_POST['set']) || !isset($_POST['sub'])){
      echo '<script>window.location.href="select_sub_setQuestionBank.php";</script>';
      die();
    }
    $set=$_POST['set'];
    $sub=$_POST['sub'];
    $sub_detail = $obj->get_subjects_by_id($conn,$sub)->fetch();
    $subjectName = $sub_detail['subjectName'];
    $sem = $sub_detail['semester'];

    echo '<form id="paperSetView" style="visibility:hidden" target="_black" method="POST" action="../coordinator/paper.php">
          <input type="hidden" name="set" value="'.$set.'">
          <input type="hidden" name="sub" value="'.$sub.'">
          <input type="hidden" name="sem" value="'.$sem.'">
          </form>';

      $pattern_detail = $obj->get_paper_details($conn, $set, $sem, $sub)->fetch();

?>
<style>

	.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: middle;
    border-top: 1px solid #ddd;
	}
	.table > thead > tr > th {
    vertical-align: bottom;
    border-bottom: 1px solid #ddd;
}
.btn{
	padding: 5px 10px;
}
.panel-title{
    font-size: 14px;
    font-weight: bold;
    color:#fff;
}
.bk{
    background-color: #CA8181 !important;
}
</style>
<div class="panel-heading" align="center" style="font-size:24px;">
                Prepare Question Paper Set
</div>
<div class="panel-body" id="panel-body">
    <div class="col-sm-3">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php 
$mba=noOfQuestion($set,'A','M',$conn,$sub);
$eba=noOfQuestion($set,'A','E',$conn,$sub);
$aba=noOfQuestion($set,'A','A',$conn,$sub);
$mbb=noOfQuestion($set,'B','M',$conn,$sub);
$ebb=noOfQuestion($set,'B','E',$conn,$sub);
$abb=noOfQuestion($set,'B','A',$conn,$sub);
$mbc=noOfQuestion($set,'C','M',$conn,$sub);
$ebc=noOfQuestion($set,'C','E',$conn,$sub);
$abc=noOfQuestion($set,'C','A',$conn,$sub);
dispaly_pattern($set,'A',$mba,$eba,$aba,$conn,$sub);
dispaly_pattern($set,'B',$mbb,$ebb,$abb,$conn,$sub);
dispaly_pattern($set,'C',$mbc,$ebc,$abc,$conn,$sub);
function dispaly_pattern($set,$sec,$noOfM,$noOfE,$noOfA,$conn,$sub){

echo '
        <div class="panel panel-default">
          <span style="cursor:pointer;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$sec.'" aria-expanded="false" aria-controls="collapse'.$sec.'">
            <div class="panel-heading bk" role="tab" id="heading'.$sec.'">
              <h4 class="panel-title" align="center">
                
                  Section '.$sec.'
                
              </h4>
            </div>
          </span>';
           echo' <div id="collapse'.$sec.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$sec.'">
              <div class="panel-body">
                 <div class="table-responsive">
                    <table class="table">';
                      echo'  <thead>
                                <tr>
                                    <TH>INSTRUCTION</TH>
                                    <th>S. no</th>
                                    <th>Upload</th>
                                </tr>
                        </thead>
                        <tbody>';
                            echo'<tr>
                                <TH rowspan='.$noOfM.'>Memory Based</TH>';
                                 for($num=1;$num<=$noOfM;$num++){
                                 $id=fetchEachQuestionId($set,$sec,'M',$num,$conn,$sub);
                                 if(!empty($id['ques']) && !empty($id['ans']))
                                  $btn_color = "btn-success";
                                  else
                                  $btn_color = "btn-danger";
                                 echo'<td>'.$num.'</td>

                                 <td><span id="Q_A_'.$id['id'].'" onclick="paperMethod(\''.$id['id'].'\',\''.$id['section'].'\',\''.$id['type'].'\')" class="btn '.$btn_color.'">Q/A</a></span>                            
                                </tr></tr>';
                             }

                            echo '<tr>
                                <TH rowspan='.$noOfE.'>Evaluation Based</TH>';
                                for($num=1;$num<=$noOfE;$num++){
                                $id=fetchEachQuestionId($set,$sec,'E',$num,$conn,$sub);
                                $id['id'];
                                 if(!empty($id['ques']) && !empty($id['ans']))
                                  $btn_color = "btn-success";
                                  else
                                  $btn_color = "btn-danger";
                                 echo'<td>'.$num.'</td>
                                <td><span id="Q_A_'.$id['id'].'" onclick="paperMethod(\''.$id['id'].'\',\''.$id['section'].'\',\''.$id['type'].'\')" class="btn '.$btn_color.'">Q/A</span></td>                            
                                </tr></tr>';
                              
                              }
                                
                                 echo '<tr>
                                <TH rowspan='.$noOfA.'>Apllication Based</TH>';
                                for($num=1;$num<=$noOfA;$num++){
                                $id=fetchEachQuestionId($set,$sec,'A',$num,$conn,$sub);
                                $id['id'];
                                 if(!empty($id['ques']) && !empty($id['ans']))
                                  $btn_color = "btn-success";
                                  else
                                  $btn_color = "btn-danger";
                                 echo'<td>'.$num.'</td>
                                <td><span id="Q_A_'.$id['id'].'" onclick="paperMethod(\''.$id['id'].'\',\''.$id['section'].'\',\''.$id['type'].'\')" class="btn '.$btn_color.'">Q/A</span></td>                            
                                </tr></tr>';
                              }

                         echo'
                            
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>';

          }

          echo '</div></div>';

          echo '<div class="col-sm-9" style="border-left:1px solid #929292;min-height:500px;"><h4 align="center"><b style="color: #7B7B7B;">'.$subjectName.'('.$sub.')</b>
                <button id="view-btn" class="btn btn-success pull-right">View</button>
                </h4><br><iframe name="my_iframe" frameborder="0" width="99%" style="position: absolute; height: 100%;"  id="secondPanel"></iframe></div>   ';  

          echo '<div id="hidden"></div>';     

          ?>
        
<?php
function noOfQuestion($set,$sec,$type,$conn,$sub){
        $i=0;
        $sql = "SELECT * FROM question_set WHERE setId=:set AND section=:sec AND type=:type AND subject=:sub ";
        $run = $conn->prepare($sql);
        $run->bindParam(':set', $set);
        $run->bindParam(':sec', $sec);
        $run->bindParam(':type', $type);
        $run->bindParam(':sub', $sub);
        $run->execute();
        while($p = $run->fetch(PDO::FETCH_ASSOC)){
         $i++;
                
       }
      return $i;
}
function fetchEachQuestionId($set,$sec,$type,$num,$conn,$sub){
        
        $sql = "SELECT * FROM question_set WHERE setId=:set AND section=:sec AND type=:type AND num=:num AND subject=:sub   ";
        $run = $conn->prepare($sql);
        $run->bindParam(':set', $set);
        $run->bindParam(':sec', $sec);
        $run->bindParam(':type', $type);
        $run->bindParam(':num', $num);
         $run->bindParam(':sub', $sub);
        $run->execute();
        $p = $run->fetch(PDO::FETCH_ASSOC);
        //$id=$p['id'];
        return $p;
}

	require ("../include/footer.php");

echo '<div id="paperMethod" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="color: #828282;">Choose Method</h4>
            </div>
            <div class="modal-body">
                <center>
                           <input type="hidden" id="questionMethodID">
                           <input type="hidden" id="questionMethodSec">
                           <input type="hidden" id="questionMethodType">
                           <input type="hidden" id="questionSubjectID" value="'.$sub.'">
                <span id="createMethodNew" class="btn btn-success" style="width:90%;" align="center">Create New / Edit Question</span> <br><br>
                <span id="chooseMethodBank" class="btn btn-success" style="width:90%;" align="center">Choose From Paper Sets</span>
                </center>
            </div>
          </div>

        </div>';
 
?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#view-btn").click(function(){
      $("#paperSetView").submit();
    });
    $("#chooseMethodBank").click(function(){
      $.ajax({
                 type:"POST",
                 url:"getQuestionForPaperC.php",
                 data:'sub='+$("#questionSubjectID").val()+'&id='+$("#questionMethodID").val()+'&sec='+$("#questionMethodSec").val()+'&type='+$("#questionMethodType").val(),
                 success:function(result){
                  var doc = document.getElementById('secondPanel').contentWindow.document;
                  doc.open();
                  doc.write(result);
                  doc.close();//$("#secondPanel").html(result);
                  $("#secondPanel").attr(src="getQuestionForPaperC.php");
                  $("#paperMethod").modal("hide");
                 }
     
              });
    });
    $("#createMethodNew").click(function(){
      $("#hidden").html('<form name="hiddenForm" id="hiddenForm" method="POST" action="../uploads/paperEditC.php" target="my_iframe"><input type="hidden" name="fromId" value="'+$("#questionMethodID").val()+'"></form>');
      $("#hiddenForm").submit();
      $("#paperMethod").modal("hide");
  
    });
  });
   function paperMethod(id,sec,type){
    $("#questionMethodID").val(id);
    $("#questionMethodSec").val(sec);
    $("#questionMethodType").val(type);
    $("#paperMethod").modal("show");
  }
</script>