<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.css">
<?php
include '../include/secure_exam.php';
include '../common/session.php';
include '../common/connectionPDO.php';
include '../common/queries.php';
error_reporting(E_ALL);
$obj = new Queries();
$pId = $_POST['id'];
$sub = $_POST['sub'];
$sec = $_POST['sec'];
$type = $_POST['type'];
$sql = "SELECT DISTINCT(question_set.id),question_set.ques,question_set.ans,question_set.setId FROM question_set,paper_pattern WHERE question_set.subject=paper_pattern.subject AND question_set.semester=paper_pattern.sem AND question_set.subject=:sub AND question_set.section=:sec AND question_set.type=:type AND paper_pattern.setId=question_set.setId AND question_set.ques!='' AND paper_pattern.controller='1' ORDER BY question_set.setId";
$run = $conn->prepare($sql);
$run->bindParam(':sub', $sub);
$run->bindParam(':sec', $sec);
$run->bindParam(':type', $type);
$run->execute();				
							echo '<div style="padding:1%;">';
								while($p=$run->fetch()){
                                    echo '
                		          	       <div class="main">
							                    <div class="panel panel-default">
							                        <div class="panel-heading" style="font-size: 14px;font-weight: 100;">
							                            <span style="font-weight:bold;font-size:14px;">Question:</span><span class="pull-right"><b>Set: '.$p['setId'].'</b></span>'.$p['ques'].'
							                        </div>
							                        <div class="panel-body" style="font-size:12px">
							                            <p><span style="font-weight:bold;font-size:14px;">Answer:</span>'.$p['ans'].'
							                            </p>
							                        </div>
							                    </div> 
							                    <div class="pull-right" style="margin-top:3px;">
							                   		<button class="btn btn-primary" onclick="selectFromBank(\''.$p['id'].'\',\''.$pId.'\')">Select</button>
								            	</div>   
							                </div><br><br><br><br>';
								}
								echo '</div>';


?>
<script type="text/javascript" src="../js/jquery.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.js"></script>

<script type="text/javascript">
	function selectFromBank(from,to){
    $("#hidden",parent.document).html('<form name="hiddenForm" id="hiddenForm" method="POST" action="../uploads/paperEditC.php" target="my_iframe"><input type="hidden" name="fromId" value="'+from+'"><input type="hidden" name="toId" value="'+to+'"></form>');
    $("#hiddenForm",parent.document).submit();
  }
 
</script>