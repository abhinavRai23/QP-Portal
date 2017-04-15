<?php
include '../include/secure_coord.php';
include '../common/session.php';
include '../common/connectionPDO.php';
include '../common/queries.php';
error_reporting(E_ALL);
$obj = new Queries();

if(isset($_POST['id'])){
$id = $_POST['id'];
$p = $obj->get_ques_by_id($conn,$id)->fetch();

if($p['SQB']==1){
								        	$bText = "Deslect";
								        	$fun = "undoCreateQuesBank('$p[id]');";
								        }
								        else{
								        	$bText = "Select";
								        	$fun = "createQuesBank('$p[id]');";
								        }
								        	echo '
								          
								          	<div class="main">
							                    <div class="panel panel-default">
							                        <div class="panel-heading" style="font-size: 14px;font-weight: 100;">
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
								                    	<button class="btn" id="E'.$p['id'].'" onclick="editQuestion('."'$p[id]'".')">Edit</button>
                            							<button class="btn btn-primary" id="S'.$p['id'].'" onclick="'.$fun.'">'.$bText.'</button>
								                    	&nbsp;
								                    	<button class="btn btn-danger" id="D'.$p['id'].'" onclick="deleteQuesBank('."'$p[id]'".')">Delete</button>
							   				 	</div>   
							                </div>

								          
								        ';


}

?>