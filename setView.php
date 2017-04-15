


<?php
		$mypdf = '';

$mypdf .= '<style>
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
</style>';

	//error_reporting(E_ALL);
    //require ("../include/header.php");
	///////////////////////////////////////////////////////////////
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Bootstrap -->
    <?php $mypdf.=' <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">';  ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <style>
    body {
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
    .panel-body {
      min-height: 500px;

    }
    </style>
    
  </head>
  <body>
    <?php
        
        require 'common/connectionPDO.php';
        require 'common/queries.php';    
        $obj = new Queries();

        $user = $obj->get_user_details($conn, $id);
        $userdef = $user['userdef'];
        $myname = $user['name'];

	$mypdf.= '<div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="main" class="panel panel-default">';

            
     echo 'Generating PDF...';
////////////////////////////////////////////////////////////////////


	if(!isset($_POST['createSet']) || !isset($_POST['subs']) || !isset($_POST['semester']) || !isset($_POST['purpose'])){
    var_dump($_POST);die();
		header('location:download.php');
	}


if(isset($_POST['createSet'])){
	$course = $_POST['deptId'];
	$branch = $_POST['branchId'];
	$semester = $_POST['semester'];
	$subject = $_POST['subs'];
    $purpose = $_POST['purpose'];
    $section = $_POST['sec'];
  	
}
$mypdffilename = $branch.'_'.$semester.'_'.$subject;
/*
if($_POST['purpose']=='U'){
echo "<form name='fr' action='uploadSet.php' method='POST'>
<input type='hidden' name='deptId' value='$course'>
<input type='hidden' name='branchId' value=$branch>
<input type='hidden' name='semester' value='$semester'>
<input type='hidden' name='subs' value='$subject'>
</form>
<script type='text/javascript'>
document.fr.submit();
</script>";
die();
}
*/

?>	
<?php

$sub_d = $obj->get_subjects_by_id($conn,$subject)->fetch();
$mypdf.= '<div class="panel-heading" align="center">
           <img src="../../images/capture2.png" height="600">
                        

              <h2><u><b>QUESTION BANK</b></u></h2><br><b><table width="100%"><tr><td width="60%" align="left">
              '."Subject:&nbsp;&nbsp;".$sub_d['subjectName'].'</td><td width="40%" align="right">'."Subject Code:&nbsp;&nbsp; $subject</td></tr></table></b><h4>Semester:$semester ".'</h4>
</div>';



$mypdf.='<div class="panel-body"><br><br>';


	function showQuestions($conn,$subject,$semester,$section){
		$sql = "SELECT * FROM questions WHERE subject=:sub AND semester=:sem AND QB='1'";
    if($section=='A' || $section=='B' || $section=='C'){
      $sql.= " AND section=:sec";
    }
    $sql.=" ORDER BY section ASC, type DESC";
    $run = $conn->prepare($sql);
    if($section=='A' || $section=='B' || $section=='C'){
        $run->bindParam(':sec', $section);
    }
    
		$run->bindParam(':sub', $subject);
		$run->bindParam(':sem', $semester);
		$run->execute();
		return $run;
	}
	$run = showQuestions($conn,$subject,$semester,$section);
  $A= $B =$C = 0;
	while($p = $run->fetch()){
	if(!empty($p['ques']) & !empty($p['ans'])){
    if($A=='0' && $p['section']=='A'){
                                        $mypdf.= '<h4 align="center"><b>Section A</b></h4>';
                                        $A='1';    
                                        }
                                        elseif($B=='0' && $p['section']=='B'){
                                        $mypdf.= '<h4 align="center"><b>Section B</b></h4>';    
                                        $B='1';
                                        }
                                        elseif($C=='0' && $p['section']=='C'){
                                        $mypdf.= '<h4 align="center"><b>Section C</b></h4>';    
                                        $C='1';
                                        }
	$mypdf.= '
	<div class="panel panel-default" style="border-top:1px solid black;">
		<div class="panel-body" style="min-height:1px;">
		<br><br>
		<h4 align="left">Question</h4>
		<span align="left" style="font-size:14px !important;">'.$p['ques'].'</span>
		<h4 align="left">Answer</h4>
		<span align="left">'.$p['ans'].'</span>
    	</div>
	</div>';
	}
	}

		
$mypdf.= '</div>';


if($purpose=='I'){

echo "<form name='fr2' action='download/pdf/question_bank.php' method='POST'>
<input type='hidden' name='mypdfdata' value='$mypdf'>
<input type='hidden' name='purpose' value=$purpose>
<input type='hidden' name='mypdffilename' value=$mypdffilename>
</form>
<script type='text/javascript'>
document.fr2.submit();
// window.location.assign('download.php');
</script>";
}
if($purpose=='D'){

echo "<form name='fr2' action='download/pdf/question_bank.php' target='_blank' method='POST'>
<input type='hidden' name='mypdfdata' value='$mypdf'>
<input type='hidden' name='purpose' value=$purpose>
<input type='hidden' name='mypdffilename' value=$mypdffilename>
</form>
<script type='text/javascript'>
document.fr2.submit();
//window.location.assign('download.php');
</script>";
}


?>
<?php



	require ("../include/footer.php");
	$conn=null;
?>
