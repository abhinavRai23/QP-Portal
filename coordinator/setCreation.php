<?php
	//error_reporting(E_ALL);
    include '../include/secure_coord.php';
    require ("../include/header.php");
	if(!isset($_POST['purpose']) || !isset($_POST['createSet']) || !isset($_POST['subs']) || !isset($_POST['semester']) || !isset($_POST['sec']) || !isset($_POST['type']) || empty($_POST['purpose']) || empty($_POST['createSet']) || empty($_POST['subs']) || empty($_POST['semester']) || empty($_POST['sec']) || empty($_POST['type'])){
		header('location:createQB.php');
	}

if(isset($_POST['createSet'])){
//	$course = $_POST['deptId'];
	$branch = $_POST['branchId'];
	$semester = $_POST['semester'];
	$subject = $_POST['subs'];
	$section = $_POST['sec'];
	$type = $_POST['type'];
	$purpose = $_POST['purpose'];
	
}



?>	
<style>
	label{
		font-size: 13px
	}
	.form-control{
		margin-bottom: 4%;
		padding: 0px 12px;
	}
	.col-sm-6{
		margin-left: 25%;
	}
	hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid #BCBCBC;
}
</style>

<?php
if($type=='M'){
	$fullType = 'Memory Based';
}
elseif($type=='A'){
	$fullType = 'Application Based';
}
elseif($type=='E'){
	$fullType = 'Evaluation Type';
}
else{
	$fullType = 'All';
}
$sub_d = $obj->get_subjects_by_id($conn,$subject)->fetch();
echo '<div class="panel-heading" align="center">
              <u>CREATE QUESTION BANK</u><br><br>
              <h4>'."<b> Subject:</b>".$sub_d['subjectName']."($subject)<b><br><br><b>Semester:</b>$semester Section:</b>$section<b> Type:</b>$fullType".'</h4>
</div>';
?>
<div class="panel-body" id="panel-body"><br>
	<?php
	/*$course = $_POST['deptId'];
	$branch = $_POST['branchId'];
	$semester = $_POST['semester'];
	$subject = $_POST['subs'];
	$section = $_POST['sec'];
	$type = $_POST['type'];
	*/

	function showQuestions($conn,$subject,$section,$semester,$type){
		$sql = "SELECT * FROM questions WHERE subject=:sub AND semester=:sem";
		if($section=='A' || $section=='B' || $section=='C'){
			$sql.= " AND section=:sec";
		}
		if($type=='M' || $type=='A' || $type=='E'){
			$sql.= " AND type=:type";
		}
		$sql." ORDER BY section ASC, type DESC";
		$run = $conn->prepare($sql);
		if($section=='A' || $section=='B' || $section=='C'){
				$run->bindParam(':sec', $section);
		}
		if($type=='M' || $type=='A' || $type=='E'){
				$run->bindParam(':type', $type);
		}
		$run->bindParam(':sub', $subject);
		$run->bindParam(':sem', $semester);
		$run->execute();
		return $run;
	}
	$run = showQuestions($conn,$subject,$section,$semester,$type);
	//if($sub_d['controller']=='1'){
	if(0){
		echo "<h4 style='color:#9A9A9A;' align='center'>Question Bank had been finalized.</h4>";
	
	}
	else{
	$A= $B =$C = $AM = $AE = $AA = $BM = $BE = $BA = $CM = $CE = $CA = '0'; 

	while($p = $run->fetch()){
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


		if($purpose=='C'){
			if(!empty($p['ques']) && !empty($p['ans'])){
			echo '<div id="MP'.$p['id'].'">
					<div id="tdMP'.$p['id'].'">
					<div class="pull-right">';
            if($p['QB']=='1'){
            	 echo '<form id="idEdit_'.$p['id'].'" name="edit_'.$p['id'].'" action="../uploads/editQuestion2.php" method="post" target="my_iframe">
                                                <input type="hidden" name="ques_id" id="ques_id" value="'.$p['id'].'">
                                              </form>
                  <button class="btn" style="'.$editStyle.'" id="E'.$p['id'].'" onclick="editQuestion('."'$p[id]'".')">Edit</button>&nbsp;
                  <button class="btn btn-primary" id="S'.$p['id'].'" onclick="undoCreateQuesBank(\''.$p['id'].'\')">Deselect</button>';
           
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
				<br><br></div></div>';
			}
		}

		if($purpose=='S'){
			if(!empty($p['ques']) && !empty($p['ans']) && $p['SQB']=='1'){
			echo '<div id="MP'.$p['id'].'"><div class="pull-right">';
            if($p['QB']=='1'){
            	 echo ' <form id="idEdit_'.$p['id'].'" name="edit_'.$p['id'].'" action="../uploads/editQuestion2.php" method="post" target="my_iframe">
                                                <input type="hidden" name="ques_id" id="ques_id" value="'.$p['id'].'">
                                              </form>
                  <button class="btn" style="'.$editStyle.'" id="E'.$p['id'].'" onclick="editQuestion('."'$p[id]'".')">Edit</button>&nbsp;
                                              <button class="btn btn-primary" id="S'.$p['id'].'" onclick="undoCreateQuesBank(\''.$p['id'].'\')">Deselect</button>';
           
            }
            else{
            echo ' <form id="idEdit_'.$p['id'].'" name="edit_'.$p['id'].'" action="../uploads/editQuestion.php2" method="post" target="my_iframe">
  												<input type="hidden" name="ques_id" id="ques_id" value="'.$p['id'].'">
											  </form>
		          <button class="btn" style="'.$editStyle.'" id="E'.$p['id'].'" onclick="editQuestion('."'$p[id]'".')">Edit</button>&nbsp;
		          <button class="btn btn-primary" id="S'.$p['id'].'" onclick="createQuesBank(\''.$p['id'].'\')">Select</button>';
           	
            }echo '&nbsp;<button class="btn btn-danger" id="D'.$p['id'].'" onclick="deleteQuesBank(\''.$p['id'].'\')">Delete</button>
   				 </div>	
			    <br><br><br>
				<div class="panel panel-default">
					<div class="panel-body" style="min-height:1px;background-color:#EBE9E9;">
					<h4>Question</h4>'.$p['ques'].'<h4>Answer</h4>'.$p['ans'].'
			    	</div>
				</div>
				<br><br></div></div>';
			}
		}
	}
}
	?>
		
</div>
<?php
	require ("../include/footer.php");
	$conn=null;
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
	function deleteQuesBank(i) {
		if (confirm('Are you sure you want to delete from the database?')) {
	     $.ajax({

             type:"POST",
             url:"createQuesBank.php",
             data:'i='+i+'&t=D',
             success:function(result){
             	if(result==1){
             		var m = '#MP'+i;
             		alert("Question deleted from database");
             		$(m).css("display","none");
             	}
             }
   
            });
	
		} else {
	    // Do nothing!
		}
	}
	function createQuesBank(i) {
		 $.ajax({

             type:"POST",
             url:"createQuesBank.php",
             data:'i='+i+'&t=S',
             success:function(result){
             	if(result==1){
             		var s = '#S'+i;
             		var d = '#D'+i;
                    var e = '#E'+i;
                    $(e).css("display","none");
             		$(s).text("Deselect");
             		$(s).attr("onclick","undoCreateQuesBank('"+i+"')");
             	}
             }
   
            });
	
		
	}
	function undoCreateQuesBank(i) {
		 $.ajax({

             type:"POST",
             url:"createQuesBank.php",
             data:'i='+i+'&t=U',
             success:function(result){
             	if(result==1){
             		var s = '#S'+i;
             		var d = '#D'+i;
                    var e = '#E'+i;
                    $(e).css("display","inline-block");
                    $(s).text("Select");
             		$(s).attr("onclick","createQuesBank('"+i+"')");
             	}
             }
   
            });
	
		
	}

	function editQuestion(id){
    	var z = "idEdit_"+id;
    	   document.getElementById(z).submit();
            $('#edit_question_modal').modal('show');  
        }
</script>