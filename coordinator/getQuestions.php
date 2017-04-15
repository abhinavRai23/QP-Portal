<?php
include '../include/secure_coord.php';
include '../common/session.php';
include '../common/connectionPDO.php';
include '../common/queries.php';
error_reporting(E_ALL);
$obj = new Queries();

$sub =$_POST['s'];
$fac = $_POST['f'];
$fac_detail = $obj->get_user_details($conn,$fac);;
$sub_detail = $obj->get_subjects_by_id($conn,$sub)->fetch()	;
echo '<div class="panel">
                	<div class="" style="font-size: 16px;color: dimgrey;" align="center">
                		<b>Faculty: </b>'.$fac_detail['name'].'(College-'.$fac_detail['collegeId'].')<b> Subject:</b>'.$sub_detail['subjectName'].'
                	</div>
                        <!-- /.panel-heading -->
                         	<div class="dataTable_wrapper">';
	                        // if($sub_detail['controller']=='1'){
                         //        echo "<br><br><br><br><br><h4 style='color:#9A9A9A;' align='center'>Question Bank had been finalized.</h4>";
                         //        die();
                         //    }
                            echo '   <table class="" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th style="visibility:hidden">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    $A= $B =$C = $AM = $AE = $AA = $BM = $BE = $BA = $CM = $CE = $CA = '0'; 
                                    $run = $obj->get_ques($conn,$fac,$sub);

                                    while($p=$run->fetch()){


                                    	if($p['SQB']==1){
								        	$bText = "Deselect";
								        	$fun = "undoCreateQuesBank('$p[id]');";
                                            $editStyle = 'display:none;';
								        }
								        else{
								        	$bText = "Select";
								        	$fun = "createQuesBank('$p[id]');";
                                            $editStyle = 'display:inline-block;';
                                        
								        }


								        	echo '<tr id="MP'.$p['id'].'">
								          <td id="tdMP'.$p['id'].'" style="width:120%;">
								          	<div class="main">';
                                        //echo '<div style="">a';print_r($p);echo '</div>';
                                        if($A=='0' && $p['section']=='A'){
                                        echo '<h4 align="center"><b>Section A</b></h4>';
                                        $A='1';    
                                        }
                                        elseif($B=='0' && $p['section']=='B'){
                                        echo '<h4 align="center"><b>Section B</b></h4>';    
                                        $B='1';
                                        }
                                        elseif($C=='0' && $p['section']=='C'){
                                        echo '<h4 align="center"><b>Section C</b></h4>';    
                                        $C='1';
                                        }
                                        
                                        if($AM=='0' && $p['section']=='A' && $p['type']=='M'){
            echo '<h5><b>Memory Based</b></h5>';
            $AM='1';
        }
        elseif($BM=='0' && $p['section']=='B' && $p['type']=='M'){
            echo '<h5><b>Memory Based</b></h5>';
            $BM='1';
        }
        elseif($CM=='0' && $p['section']=='C' && $p['type']=='M'){
            echo '<h5><b>Memory Based</b></h5>';
            $CM='1';
        }
        elseif($AE=='0' && $p['section']=='A' && $p['type']=='E'){
            echo '<h5><b>Evaluation Based</b></h5>';
            $AE='1';
        }
        elseif($BE=='0' && $p['section']=='B' && $p['type']=='E'){
            echo '<h5><b>Evaluation Based</b></h5>';
            $BE='1';
        }
        elseif($CE=='0' && $p['section']=='C' && $p['type']=='E'){
            echo '<h5><b>Evaluation Based</b></h5>';
            $CE='1';
        }
        elseif($AA=='0' && $p['section']=='A' && $p['type']=='A'){
            echo '<h5><b>Application Based</b></h5>';
            $AA='1';
        }
        elseif($BA=='0' && $p['section']=='B' && $p['type']=='A'){
            echo '<h5><b>Application Based</b></h5>';
            $BA='1';
        }
        elseif($CA=='0' && $p['section']=='C' && $p['type']=='A'){
            echo '<h5><b>Application Based</b></h5>';
            $CA='1';
        }
							                    echo '<div class="panel panel-default"><div class="panel-heading" style="font-size: 14px;font-weight: 100;">
							                            <span>Question:</span>'.$p['ques'].'
							                        </div>
							                        <div class="panel-body" style="font-size:12px">
							                            <p><span>Answer:</span>'.$p['ans'].'
							                            </p>
							                        </div>
							                    </div> 
							                    <div class="pull-right pull-right-new">
							                    <form id="idEdit_'.$p['id'].'" name="edit_'.$p['id'].'" action="../uploads/editQuestion.php" method="post" target="my_iframe">
  												<input type="hidden" name="ques_id" id="ques_id" value="'.$p['id'].'">
											  </form>
								                    	<button class="btn" style="'.$editStyle.'" id="E'.$p['id'].'" onclick="editQuestion('."'$p[id]'".')">Edit</button>
                            							<button class="btn btn-primary" id="S'.$p['id'].'" onclick="'.$fun.'">'.$bText.'</button>
								                    	&nbsp;
								                    	<button class="btn btn-danger" id="D'.$p['id'].'" onclick="deleteQuesBank('."'$p[id]'".')">Delete</button>
							   				 	</div>   
							                </div>

								          </td>
								        </tr>';
								    }
								        echo '							        
								      </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <!--
                           
                        
                        <!- /.panel-body -->
                </div>';
?>
<!-- MOdal box -->
        <div class="modal fade" id="edit_question_modal" role="dialog">
                <div class="modal-dialog" style="width:55%;">

                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" id="close_modal_click">&times;</button>
                            <h4 class="modal-title" style="color:rgb(126, 126, 126);">Edit </h4>
                        </div>
                        <div class="modal-body" style="min-height:475px;padding:0px;">
                            <iframe name="my_iframe" frameborder="0" width="99%" style="position: absolute; height: 100%;"></iframe>
                        </div>
                    </div>

                </div>
        </div>
<script>
$(document).ready(function() {
    $('table.display').DataTable();

} );


    function editQuestion(id){
    	var z = "idEdit_"+id;
    	   document.getElementById(z).submit();
            $('#edit_question_modal').modal('show');  
        }


</script>