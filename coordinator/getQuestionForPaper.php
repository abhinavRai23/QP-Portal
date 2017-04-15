<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.css">
<?php
include '../include/secure_coord.php';
include '../common/session.php';
include '../common/connectionPDO.php';
include '../common/queries.php';
error_reporting(E_ALL);
$obj = new Queries();
$pId = $_POST['id'];
$sub = $_POST['sub'];
$sec = $_POST['sec'];
$type = $_POST['type'];
$sql = "SELECT * FROM questions WHERE subject=:sub AND QB='1' AND section=:sec AND type=:type";
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
							                            <span style="font-weight:bold;font-size:14px;">Question:</span>'.$p['ques'].'
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
    $("#hidden",parent.document).html('<form name="hiddenForm" id="hiddenForm" method="POST" action="../uploads/paperEdit.php" target="my_iframe"><input type="hidden" name="fromId" value="'+from+'"><input type="hidden" name="toId" value="'+to+'"></form>');
    $("#hiddenForm",parent.document).submit();
  }
 
</script>