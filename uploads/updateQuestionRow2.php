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
if($p['QB']==1){
								        	$bText = "Deselect";
								        	$fun = "undoCreateQuesBank('$p[id]');";
                                            $editStyle = 'display:none;';
								        }
								        else{
								        	$bText = "Select";
								        	$fun = "createQuesBank('$p[id]');";
                                            $editStyle = 'display:inline-block;';
                                        
								        }
	echo '<div class="pull-right">';
 if($p['QB']=='1'){
            	 echo '<button class="btn btn-primary" id="S'.$p['id'].'" onclick="undoCreateQuesBank(\''.$p['id'].'\')">Deselect</button>';
           
            }
            else{
            echo ' <form id="idEdit_'.$p['id'].'" name="edit_'.$p['id'].'" action="../uploads/editQuestion2.php" method="post" target="my_iframe">
  												<input type="hidden" name="ques_id" id="ques_id" value="'.$p['id'].'">
											  </form>
		          <button class="btn" style="'.$editStyle.'" id="E'.$p['id'].'" onclick="editQuestion('."'$p[id]'".')">Edit</button>&nbsp;';
            echo '<button class="btn btn-primary" id="S'.$p['id'].'" onclick="createQuesBank(\''.$p['id'].'\')">Select</button>';
           	
            }
            
            echo '&nbsp;<button class="btn btn-danger" id="D'.$p['id'].'" onclick="deleteQuesBank(\''.$p['id'].'\')">Delete</button>
   				 </div>	
			    <br><br><br>
				<div class="panel panel-default">
					<div class="panel-body" style="min-height:1px;background-color:#EBE9E9;">
					<h4>Question</h4>'.$p['ques'].'<h4>Answer</h4>'.$p['ans'].'
			    	</div>
				</div>
				<br><br>';


}

?>