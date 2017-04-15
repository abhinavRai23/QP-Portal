<?php
if(!isset($_POST['s'])){
    header('location:index.php');
    die();
}
include '../include/secure_fac.php';
include '../include/header.php';
include '../common/session.php';
include '../common/connectionPDO.php';
//include '../common/queries.php';
error_reporting(E_ALL);
$obj = new Queries();

$sub =$_POST['s'];
$fac = $_SESSION['id'];
$fac_detail = $obj->get_user_details($conn,$fac);;
$sub_detail = $obj->get_subjects_by_id($conn,$sub)->fetch()	;
echo    '<div class="panel-body" id="panel-body">
            <div class="col-sm-8" style="margin:auto 16.67% ;border:1px solid #c7c7c7;">
            <div class="panel-heading" style=border-bottom:1px solid #fff;font-size: 16px;color: dimgrey;" align="center">
                   <b>Subject:</b>'.$sub_detail['subjectName'].'
                </div>
            ';

                       $A= $B =$C = $AM = $AE = $AA = $BM = $BE = $BA = $CM = $CE = $CA = '0'; 
                        $run = $obj->get_ques($conn,$fac,$sub);

                        while($p=$run->fetch()){


    				        if($A=='0' && $p['section']=='A'){
                            echo '<h4 align="center"><b><u>Section A</u></b></h4>';
                            $A='1';    
                            }
                            elseif($B=='0' && $p['section']=='B'){
                            echo '<h4 align="center"><b><u>Section B</u></b></h4>';    
                            $B='1';
                            }
                            elseif($C=='0' && $p['section']=='C'){
                            echo '<h4 align="center"><b><u>Section C</u></b></h4>';    
                            $C='1';
                            }
                            
                            if($AM=='0' && $p['section']=='A' && $p['type']=='M'){
                                echo '<h5><b>Memory Based</b></h5><hr style="border-top: 1px solid #980000;">';
                                $AM='1';
                            }
                            elseif($BM=='0' && $p['section']=='B' && $p['type']=='M'){
                                echo '<h5><b>Memory Based</b></h5></h5><hr style="border-top: 1px solid #980000;">';
                                $BM='1';
                            }
                            elseif($CM=='0' && $p['section']=='C' && $p['type']=='M'){
                                echo '<h5><b>Memory Based</b></h5><hr style="border-top: 1px solid #980000;">';
                                $CM='1';
                            }
                            elseif($AE=='0' && $p['section']=='A' && $p['type']=='E'){
                                echo '<h5><b>Evaluation Based</b></h5><hr style="border-top: 1px solid #980000;">';
                                $AE='1';
                            }
                            elseif($BE=='0' && $p['section']=='B' && $p['type']=='E'){
                                echo '<h5><b>Evaluation Based</b></h5><hr style="border-top: 1px solid #980000;">';
                                $BE='1';
                            }
                            elseif($CE=='0' && $p['section']=='C' && $p['type']=='E'){
                                echo '<h5><b>Evaluation Based</b></h5><hr style="border-top: 1px solid #980000;">';
                                $CE='1';
                            }
                            elseif($AA=='0' && $p['section']=='A' && $p['type']=='A'){
                                echo '<h5><b>Application Based</b></h5><hr style="border-top: 1px solid #980000;">';
                                $AA='1';
                            }
                            elseif($BA=='0' && $p['section']=='B' && $p['type']=='A'){
                                echo '<h5><b>Application Based</b></h5><hr style="border-top: 1px solid #980000;">';
                                $BA='1';
                            }
                            elseif($CA=='0' && $p['section']=='C' && $p['type']=='A'){
                                echo '<h5><b>Application Based</b></h5><hr style="border-top: 1px solid #980000;">';
                                $CA='1';
                            }
    			                    echo '<b>Question:</b><br>'.$p['ques'].'
    			                         <b>Answer:</b><br>'.$p['ans'].'
    			                         <hr style="border-top: 1px solid #ddd;">

    				          ';
    				    }
    				        echo '							        		      
            </div>
        </div>      
        ';
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