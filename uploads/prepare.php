<?php
        require '../include/secure_faculty.php';
        require_once '../common/session.php';
        require '../common/connectionPDO.php';
        require '../common/queries.php';    
        $obj = new Queries();

        $user = $obj->get_user_details($conn, $id);
        $userdef = $user['userdef'];
        $myname = $user['name'];
    ?>


<?php
if((!isset($_POST['subjectid']) || !isset($_POST['submit']) || !isset($_POST['semester']) || empty($_POST['subjectid']) || empty($_POST['semester'])) && !isset($_POST['save']) && !isset($_POST['coordinator'])) {
    echo "<script>window.location='../faculty/upload.php';</script>";die();
}

if(isset($_POST['subjectid'])){
    $sub = $_POST['subjectid'];
    $sem = $_POST['semester'];
    $sql = "SELECT count(*) FROM subjects WHERE userId=:id AND subjectId=:sub AND confirm='1' coordinator='0'";
    $run=$conn->prepare($sql);
    $run->bindParam(':id', $_SESSION['id']);
    $run->bindParam(':sub', $sub);
    $run->execute();
    $p = $run->rowCount();
    if($p!='0'){
        echo "<script>window.location='../faculty/upload.php';</script>";
        die();
   }
}


if(isset($_POST['save']) || isset($_POST['coordinator'])){
    $sub = $_POST['sub'];
    $cord_check = $obj->coord_check($conn,$_SESSION['id'],$sub)->fetch();
    
    if($coord_check=='1'){
        echo "<script>window.location='../faculty/upload.php';</script>";
        die();
    }
    $sem = $_POST['sem'];
    $id = $_SESSION['id'];
    $myarray = array("A1M", "A2M", "A3M", "A4M", "A5M", "A6A", "A7A", "A8A", "A9E", "A0E", "B1M", "B2M", "B3M", "B4A", "B5A", "B6A", "B7E", "B8E", "C1M", "C2A", "C3E");
    for($i=0;$i<count($myarray);$i++){
        $ques = $ans = $ref = '';
        $q = $myarray[$i].'Q';
        $a = $myarray[$i].'A';
        $r = $myarray[$i].'R';
        $ques = $_POST[$q];
        $ans = $_POST[$a];
        $ref = $_POST[$r];
        
        if(empty($ques) && empty($ans) && empty($ref))
            continue;

        $t = $myarray[$i];
        $t = str_split($t);
        $sec = $t[0];
        $num = $t[1];
        $type = $t[2];
        if($num==0)
            $num=10;
        $type = $t[2];
        $sql = "SELECT COUNT(*) FROM questions WHERE faculty=:fac AND subject=:sub AND semester=:sem AND section=:sec AND type=:type AND num=:num";
        $run = $conn->prepare($sql);
        $run->bindParam(':fac', $id);
        $run->bindParam(':sub', $sub);
        $run->bindParam(':sem', $sem);
        $run->bindParam(':sec', $sec);
        $run->bindParam(':type', $type);
        $run->bindParam(':num', $num);
        $run->execute();
        $p = $run->fetch();
        $p = $p[0];

        if($p==0){
            $sql = "INSERT INTO questions (faculty, subject, semester, section, num, type, ques, ans, ref) VALUES (:faculty, :subject, :sem, :section, :num, :type, :ques, :ans, :ref)";
        }
        else{
            $sql = "UPDATE questions SET ques=:ques, ans=:ans, ref=:ref WHERE faculty=:faculty AND subject=:subject AND semester=:sem AND section=:section AND type=:type AND num=:num";
        }
        $run = $conn->prepare($sql);
        $run->bindParam(':faculty', $id); 
        $run->bindParam(':subject', $sub); 
        $run->bindParam(':sem', $sem); 
        $run->bindParam(':section', $sec); 
        $run->bindParam(':type', $type) ;
        $run->bindParam(':ques', $ques) ;
        $run->bindParam(':ans', $ans) ;
        $run->bindParam(':ref', $ref) ;
        $run->bindParam(':num', $num);
        $run->execute();
    }
    echo "<script>alert('Questions saved successfully.');</script>";
     
    if(isset($_POST['coordinator'])){
        $sql = "SELECT COUNT(*) FROM questions WHERE faculty=:faculty AND semester=:sem AND subject=:sub AND ((ques!='' AND ans='') OR (ques='' AND ans!=''))";
        $run2=$conn->prepare($sql);
        $run2->bindParam(':faculty', $id); 
        $run2->bindParam(':sub', $sub); 
        $run2->bindParam(':sem', $sem); 
        $run2->execute();
        $cdck = $run2->fetch();
        $cdck = $cdck['0'];
        
        if($cdck==0){
        

        date_default_timezone_set('Asia/Calcutta');
        $sql = "UPDATE subjects SET coordinator='1',sdate='".date("jS F, Y")."' WHERE userId=:id AND subjectId=:sub AND confirm='1'";
        $run = $conn->prepare($sql);
        $run->bindParam(':id', $id);
        $run->bindParam(':sub', $sub);
        if($run->execute()){
            echo "<script>alert('Questions sent to Co-ordinator.');</script>";
            echo "<script>window.location='../faculty/upload.php';</script>";
            die();
        }
        }
        else{
           echo "<script>alert('Question Paper not sent to coordinator! Both question and answer is required.');</script>";
        }
    }

  //  echo "<script>window.location='../faculty/upload.php';</script>";
  //  die();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.css">
<style>
    body {
      background: url("../images/top_bg.png") no-repeat scroll left top #0667A5;
      color:#000;
      font: 11px/17px Verdana,Geneva,sans-serif;
      margin: 0;
      padding: 0;
    }
    .panel-default {
        border-color: #8E0000;
    }
    .form-control{
      margin-bottom: 2%;
    }
    .panel-body{
      font-size: 11px;
    }
    .panel-heading{
      font-size: large;
      font-weight: bolder;
      border-bottom: 1px solid rgb(34, 34, 34);
      border-color: #8E0000;
      color:#000;
      background-color: #FFFFFF !important;
    }
    .navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
    border-color: #8E0000;
    }
    .navbar-inverse .navbar-nav>li>a {
      color: #FFFFFF;
    }
    .navbar-inverse .navbar-nav>li>a:hover {
      color: #FFFFFF;
      background-color: #860000;
    }
    .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus, .navbar-inverse .navbar-nav>.open>a:hover {
      color: #fff;
      background-color: #860000;
    }
    .navbar-inverse .navbar-brand {
      color: #FFFFFF;
    }
    .navbar-inverse {
      background-color: #980000;
      border-color: #860000;
    }
    .navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:focus, .navbar-inverse .navbar-nav>.active>a:hover {
      color: #fff;
      background-color: #860000;
    }
    .diff {
  font-size: 12px;
  font-weight: bold;
  color: #494949;
}
.data{
  color: #0667A5;
}
.faculty_name {
  padding-top: 20px;
  font-size: 18px;
}
.form-control{
  margin-bottom: 2%;
}
.modal-backdrop{
    z-index: 0;
}
.container{
      width: 100%;
    }
    .col-sm-12{
      padding-right: 0px;
      padding-left: 0px;
    }
    .panel{
      margin-bottom: 0px;
    }
        .navbar{
      border-radius: 0px;
    }
    .col-sm-6{
        margin-bottom: 1%;
    }
    </style>
    
  </head>
  <body>
    
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default">

            <div class="container-fluid" style="margin-top:.5%;margin-bottom:.5%;">
                  <div class="row logo">
                        <div class="col-sm-1 col-xs-4 pull-right" style="padding:0px"><img src="../images/sir-apj.jpg" height="100px" class="img-responsive logo-1 apj" style="border-radius:50%;position: relative;right: 5px; border:1px solid #999"></div> 
                        <div class="col-sm-1 col-xs-4"><img class="img-responsive logo-1" src="../images/logo.png"></div>
                        <div class="col-sm-10 col-xs-12 u-name"><img class="img-responsive logo-2" src="../images/logo-1.jpg" ></div>
                        

                  </div>
              </div>
            <nav class="navbar navbar-inverse"><b>
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                     
                    </a>
                  </div>

                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="font-weight:bold;font-size:12px">
                    <ul class="nav navbar-nav">
                <?php
                   if($userdef == 3) {
                        echo '<li><a href="../faculty/index.php">Home</a></li>';
                        echo '<li><a href="../faculty/view.php">Profile</a></li>';
                        echo '<li><a href="../faculty/addSubject.php">Select Subject</a></li>';
                        echo '<li><a href="../faculty/upload.php">Prepare Question Paper</a></li>';
                        $allowed = $obj->allowed_edit_faculty($conn);
                        if($allowed === 1)
                            echo "<li><a href='../faculty/edit_details.php'>Edit Profile</a></li>";
                    }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right"><li><a href="#"><?php echo 'Welcome '.$myname;?></a>
                        </li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid --></b>
</nav>	
<style>
.checkbox-inline, .radio-inline {
	padding-left: 10%;
}
textarea{
	margin:2%;
}
.s_no{
	padding-top: 15px !important;
}
.btn{
	padding:3px 12px;
}
th{
	vertical-align: middle !important;
}
thead{
	background-color: #f2f2f2; 
}
.modal {
    background-color: rgba(0,0,0,0.470588);
}
.modal-content {
    border-radius: 0px;
    margin-top: 15%;
}
.modal-body{
    padding: 0px;
}
.modal-header{
    background-color: #B5BBFF;
    color: #3A3845;
}
.modal-footer{
    background-color: #B5BBFF;
}
.abcd{
    width: 18%;
    background-color: #4259FF;
    color: white;
}
.abcd:hover{
    background-color: #5cb85c;
    color: white;
}
.cke_bottom{
    background: #FFFFFF;
}
.modal-dialog{
    width: 52%;
}
</style>
<div class="panel-heading" align="center" >
              <div style="font-size:28px;padding-bottom:2%;">Question Paper Preparation</div>
              <em>(<?php
                $k = $obj->get_subjects_by_id($conn,$sub);
                $c = $k->fetch();
                echo $c['subjectName'].', ';


               echo $sub; ?>)</em>
</div>
<form method="POST" name="uploadForm">
<input type="hidden" name="sub" value="<?php echo $sub; ?>">
<input type="hidden" name="sem" value="<?php echo $sem; ?>">

<div class="panel-body">
	<div class="col-sm-6">
		<div class="panel panel-default">
            <div class="panel-heading" align="center">
                Section A
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body" style="min-height: 564px;">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                                <tr>
                                	<TH>INSTRUCTION</TH>
                                    <th>S.No.</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Reference/Hint</th>
                                </tr>
                        </thead>
                        <?php
                                                        function quesColor($key){
                            global $sub;
                            global $sem;
                            $t = str_split($key);
                            $sec = $t[0];
                            $num = $t[1];
                            if($num==0)
                            $num=10;
                            $type = $t[2];
                            
                            global $conn;
                            $sql = "SELECT * FROM questions WHERE faculty=:fac AND subject=:sub AND semester=:sem AND section=:sec AND type=:type AND num=:num";
        $run = $conn->prepare($sql);
        $run->bindParam(':fac', $_SESSION['id']);
        $run->bindParam(':sub', $sub);
        $run->bindParam(':sem', $sem);
        $run->bindParam(':sec', $sec);
        $run->bindParam(':type', $type);
        $run->bindParam(':num', $num);
        $run->execute();
        $p = $run->rowCount();
        $color1 = $color2 = $color3 = "btn-danger";
        $ques = $answer = '';
        if($p==1){
            $p = $run->fetch();
            if(!empty($p['ques'])){
                $color1 = "btn-success";
                $ques = $p['ques'];
            }
            if(!empty($p['ans'])){
                $color2 = "btn-success";
                $answer = $p['ans'];
            }
            if(!empty($p['ref'])){
                $color3 = "btn-success";
                $reference = $p['ref'];
            }
        }
echo '<td class="s_no">'.$num.'</td>
                                ';
                            echo '<td><button type="button" class="btn '.$color1.'" data-toggle="modal" data-target="#M'.$key.'Q" onclick="color(this);">Q</button></td>';
                            echo '<td><button type="button" class="btn '.$color2.'" data-toggle="modal" data-target="#M'.$key.'A"  onclick="color(this);">A</button></td>';
                            echo '<td><button type="button" class="btn '.$color3.'" data-toggle="modal" data-target="#M'.$key.'R" onclick="color(this);">R</button></td>';
                           

                            echo '
        <!-- MOdal box -->
        <div class="modal fade" id="M'.$key.'Q" role="dialog">
                <div class="modal-dialog">

                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Section '.$sec.': (Question '.$num.')</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group" style="margin-bottom:0px;">
                                <textarea name="'.$key.'Q" id="'.$key.'Q" rows="10" cols="50">
                                    '.$ques.'
                                </textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default abcd" data-dismiss="modal">OK</button>
                        </div>
                    </div>

                </div>
        </div>';
                    echo '
        <!-- MOdal box -->
        <div class="modal fade" id="M'.$key.'A" role="dialog">
                <div class="modal-dialog">

                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Section '.$sec.': (Answer '.$num.')</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group" style="margin-bottom:0px;">
                                <textarea name="'.$key.'A" id="'.$key.'A" rows="10" cols="50">
                                    '.$answer.'
                                </textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default abcd" data-dismiss="modal">OK</button>
                        </div>
                    </div>

                </div>
        </div>';
                    echo '
        <!-- MOdal box -->
        <div class="modal fade" id="M'.$key.'R" role="dialog">
                <div class="modal-dialog">

                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Section '.$sec.': (Reference '.$num.')</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group" style="margin-bottom:0px;">
                                <textarea name="'.$key.'R" id="'.$key.'R" rows="10" cols="50">
                                    '.$reference.'
                                </textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default abcd" data-dismiss="modal">OK</button>
                        </div>
                    </div>

                </div>
        </div>';

    }
                        ?>
                        <tbody>
                            <tr>
                            	<TH rowspan="5">Memory Based</TH>
                                <?php
                                quesColor("A1M");
                                ?>
                            </tr>
                            <tr>
                                <?php
                                quesColor("A2M");
                                ?>
                            </tr>
                            <tr>
                                <?php
                                quesColor("A3M");
                                ?>
                            </tr>
                            <tr  >
                                <?php
                                quesColor("A4M");
                                ?>
                            </tr>
                            <tr  >
                                <?php
                                quesColor("A5M");
                                ?>
                            </tr>
                            <tr  >
                            	<TH rowspan="3">Application Base</TH>
                                <?php
                                quesColor("A6A");
                                ?>
                            </tr>
                            <tr  >
                                <?php
                                quesColor("A7A");
                                ?>
                            </tr>
                            <tr  >
                                <?php
                                quesColor("A8A");
                                ?>
                            </tr>
                            <tr  >
                            	<TH rowspan="2">Evaluation Base</TH>
                                <?php
                                quesColor("A9E");
                                ?>
                            </tr>
                            <tr >
                                <?php
                                quesColor("A0E");
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
	</div>
	<div class="col-sm-6">
		<div class="panel panel-default">
            <div class="panel-heading" align="center">
                Section B
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body" style="min-height:100px;">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                                <tr >
                                	<TH>INSTRUCTION</TH>
                                    <th>S.No.</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Reference/Hint</th>
                                </tr>
                        </thead>
                        <tbody>
                        
                            <tr >
                            	<TH rowspan="3">Memory Base</TH>
                                <?php
                                    quesColor("B1M");
                                    ?>
                            </tr>
                            <tr >
                                <?php
                                    quesColor("B2M");
                                    ?>
                            </tr>
                            <tr >
                                <?php
                                    quesColor("B3M");
                                    ?>
                            </tr>
                            <tr >
                            	<TH rowspan="3">Application Base</TH>
                                <?php
                                quesColor("B4A");
                                 ?>
                            </tr>
                            <tr >
                                <?php
                                quesColor("B5A");
                                 ?>
                            </tr>
                            <tr >
                                <?php
                                quesColor("B6A");
                                 ?>
                            </tr>
                            <tr >
                            	<th  rowspan="2">Evaluation Base</th>
                                <?php
                                quesColor("B7E");
                                 ?>
                            </tr>
                            <tr >
                                <?php
                                quesColor("B8E");
                                 ?>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
		<div class="panel panel-default">
            <div class="panel-heading" align="center">
                Section C
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body" style="min-height:100px;">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                                <tr >
                                	<th>Instruction</th>
                                    <th>S.No.</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Reference/Hint</th>
                                </tr>
                        </thead>
                        <tbody>
                            <tr >
                            	<th>Memory Base</th>
                                <?php
                                quesColor("C1M");
                                 ?>
                            </tr>
                            <tr >
                            	<th>Application Base</th>
                                <?php
                                quesColor("C2A");
                                 ?>
                            </tr>
                            <tr >
                            	<th>Evaluation Base</th>
                                <?php
                                quesColor("C3E");
                                 ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
	</div>
    
       
          <b>
            <button type="button" class="btn btn btn-success">&nbsp;</button>&nbsp;Saved&nbsp;&nbsp;
            <button type="button" class="btn btn btn-danger">&nbsp;</button>&nbsp;Not-prepared&nbsp;&nbsp;
            <button type="button" class="btn btn btn-default" style="background-color:#4263E4;">&nbsp;</button>&nbsp;Unsaved  
            <input type="submit" onclick="return checkCoord();" name="coordinator" class="btn btn-success pull-right" style="width:15%;margin-right:2%;padding:8px 12px;" value="Send to coordinator">
            <button type="submit" name="save" class="btn btn-success pull-right" style="width:10%;margin-right:2%;padding:8px 12px;">Save</button>
            <span class="btn btn-success pull-right" style="width:10%;margin-right:2%;padding:8px 12px;" id="btn-view">View</span>
        
        </b>
    </form>
    <div id="hidden_view" style="visibility:hidden">
        <form action="../faculty/view_questions.php" method="POST" target="blank" id="hidden_form_submit">
                <input name="s" type="hidden">
                </form>
    </div>


</div>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckfinder/ckfinder.js"></script>

 <script type="text/javascript" src="k.js"></script>	

<?php
	require ("../include/footer.php");
	$conn=null;
?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#btn-view").click(function(){
             $("input[name=s]").val($("input[name=sub]").val());
            $("#hidden_form_submit").submit();
        });
    });
    function checkCoord(){
        return   confirm("Are you sure you want to send paper to coordinator? No changes will be permissible after submission!");
        
    }
</script>
