<?php
	//error_reporting(E_ALL);
    include '../include/secure_coord.php';
    require ("../include/header.php");
    if(!isset($_POST['sec']) || !isset($_POST['type']) || !isset($_POST['viewQB']) || !isset($_POST['subs']) || !isset($_POST['semester']) || empty($_POST['viewQB']) || empty($_POST['subs']) || empty($_POST['semester']) || empty($_POST['sec']) || empty($_POST['type'])){
		echo '<meta http-equiv=refresh content="0;viewQB.php">';
		die();
	}

if(isset($_POST['viewQB'])){
	// $course = $_POST['deptId'];
	$branch = $_POST['branchId'];
	$semester = $_POST['semester'];
	$subject = $_POST['subs'];
	$section = $_POST['sec'];
	$type = $_POST['type'];
	
	
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


$sub_d = $obj->get_subjects_by_id($conn,$subject)->fetch();
echo '<div class="panel-heading" align="center">
              <u>QUESTION BANK</u><br><br>
              <h4>'."<b> Subject:</b>".$sub_d['subjectName']."($subject)<b><br><br><b>Semester:</b>$semester ".'</h4>
</div>';
?>
<div class="panel-body" id="panel-body"><br>
	<?php
	// if($sub_d['controller']=='1'){
	// 	echo '<button class="btn btn-success pull-right" disabled="true">Question Bank had been finalized</button><br><br><br>';
	// }
	// else{
	// echo '<button class="btn btn-success pull-right" id="Cont">Finalize Question Bank</button><br><br><br>';
	// }
	echo '<input type="hidden" id="cont_sub" value="'.$subject.'">';
	echo '<input type="hidden" id="cont_sem" value="'.$semester.'">';
	/*$course = $_POST['deptId'];
	$branch = $_POST['branchId'];
	$semester = $_POST['semester'];
	$subject = $_POST['subs'];
	$section = $_POST['sec'];
	$type = $_POST['type'];
	*/

	function showQuestions($conn,$subject,$semester,$type,$section){
		$sql = "SELECT * FROM questions WHERE subject=:sub AND semester=:sem AND QB='1'";
		if($section=='A' || $section=='B' || $section=='C'){
			$sql.= " AND section=:sec";
		}
		if($type=='M' || $type=='A' || $type=='E'){
			$sql.= " AND type=:type";
		}
		$sql." ORDER BY section ASC, type DESC";
		$run=$conn->prepare($sql);
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
	$run = showQuestions($conn,$subject,$semester,$type,$section);
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
		
		
		
		  
            echo '
   				<div class="panel panel-default">
					<div class="panel-body" style="min-height:1px;background-color:#EBE9E9;">
					<h4>Question</h4>'.$p['ques'].'<h4>Answer</h4>'.$p['ans'].'
			    	</div>
				</div>
				<br><br><br>
				';
			}
		
		
	
	?>
		
</div>
<?php
	require ("../include/footer.php");
	$conn=null;
?>
<script>
	$(document).ready(function(){
		$("#Cont").click(function(){
			if(confirm("Final question bank will be sent to controller, no changes will be made later.")){
				 $.ajax({
		             type:"POST",
		             url:"sendtocontroller.php",
		             data:'sub='+$("#cont_sub").val()+'&sem='+$("#cont_sem").val(),
		             success:function(result){
		             	if(result==1){
	             		$("#Cont").attr("disabled","true");
	             		$("#Cont").text("Question Bank had been finalized");
	             	}
	             }
	   
	            });
			}
		});
	});
</script>