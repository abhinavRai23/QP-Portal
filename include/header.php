<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Bootstrap -->

    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- <link rel="stylesheet" href="../css/font-awesome.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/sweetalert.css">
        <script type="text/javascript" src="../js/sweetalert.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
    <style>
    body {
      color:#000;
      font: 11px/17px Verdana,Geneva,sans-serif;
      margin: 0;
      padding: 0;
    }
    .cancel {
      background-color: #C11E1E !important;
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
      font-size: 18px;
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
    .bb-alert
{
    position: fixed;
    bottom: 25%;
    right: 0;
    margin-bottom: 0;
    font-size: 1.2em;
    padding: 1em 1.3em;
    z-index: 2000;
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
    </style>
  </head>
  <body>
    <?php
        require_once '../common/session.php';

        require '../common/connectionPDO.php';
        require '../common/queries.php';

        $obj = new Queries();

        $user = $obj->get_user_details($conn, $id);
        $userdef = $user['userdef'];
        $myname = $user['name'];
        $email =$user['email'];

        if(isset($_POST['changep'])) {
            $oldp = md5(htmlentities($_POST['oldp']));
            $newp = md5(htmlentities($_POST['newp']));
            $cnfnewp = md5(htmlentities($_POST['cnfnewp']));
            
            $currentp = $user['password'];
            if($oldp != $currentp)
              echo '<script>swal("Alert", "Wrong Old Password", "warning");</script>';

            else if($newp != $cnfnewp)
              echo '<script>swal("Password Not Changed", "New password and confirm password doesn\'t match", "error");</script>';

            else if($newp == $currentp)
              echo '<script>swal("Password Not Changed", "New password is same as old password", "error");</script>';

            else {
              if($obj->update_password($conn, $email, $newp, 0))
              echo '<script>swal("Success", "Password Changed Successfully", "success");</script>';
            }
        }
    ?>    
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="main" class="panel panel-default">

            <div class="container-fluid" style="margin-top:.5%;margin-bottom:.5%;" id="container-fluid">
                  <div class="row logo">
                        <div class="col-sm-1 col-xs-4 pull-right" style="padding:0px"><img src="../images/sir-apj.jpg" height="100px" class="img-responsive logo-1 apj" style="float: right;
    margin-right: 5%;border-radius:50%;position: relative;right: 5px; border:1px solid #999"></div> 
                        <div class="col-sm-1 col-xs-4"><img class="img-responsive logo-1" src="../images/logo.png"></div>
                        <div class="col-sm-10 col-xs-12 u-name"><img class="img-responsive logo-2" src="../images/logo-1.jpg" ></div>
                        

                  </div>
              </div>
            <nav class="navbar navbar-inverse" id="nav">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    
                  </div>

                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="font-weight:bold;font-size:12px">
                    <ul class="nav navbar-nav">
                <?php
                    if($userdef == 0) {
                        echo '<li><a href="index.php">Home</a></li>';
                        
                        echo '<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add<span class="caret"></span>
                    </a>
                        <ul class="dropdown-menu">
                            <li><a href="../examcontroller/add_branches.php">Branches</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="../examcontroller/add_coord.php">Branch Co-ordinators</a></li>
                            <li role="separator" class="divider"></li>
                            <!--<li><a href="../examcontroller/add_colleges.php">College</a></li>
                            <li role="separator" class="divider"></li>-->
                            <li><a href="../examcontroller/add_subjects.php">Subjects</a></li>
                        </ul>
                </li> ';
                      echo '<li><a href="../examcontroller/allot_coord.php">Allot Branches</a></li>';
                        echo '<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View<span class="caret"></span>
                    </a>
                        <ul class="dropdown-menu">
                            <li><a href="../examcontroller/downloadqb.php">Question Bank</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="../examcontroller/view_coord.php">Branch Co-ordinators</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="../examcontroller/view_college.php">Colleges</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="../examcontroller/view_branches.php">Branches</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="../examcontroller/view_subjects.php">Subjects</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="../examcontroller/view_suggestions.php">Suggestions</a></li>
                        </ul>
                </li> ';
                        echo '<li class="dropdown">
                        <a href = "#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Question Paper<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                        <li><a href="../examcontroller/select_sub_setQuestionBank.php">Create Question Paper Sets</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../examcontroller/view_select_sub_setQuestionBank.php">View Question Paper Sets</a></li>';
                        
                        echo'
                        <li role="separator" class="divider"></li>
                        <li><a href="../examcontroller/uploadpdf.php">Upload PDF Question Paper</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../examcontroller/view_uploadedpdf.php">View PDF Question Paper</a></li>';
                        
                        echo'
                        </ul>
                    
                       ';
                        echo '<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings<span class="caret"></span>
                    </a>
                        <ul class="dropdown-menu">
                            <li><a href="../examcontroller/allow_edit.php">Allow Edit</a></li>
                            <li><a href="../examcontroller/allow_upload.php">Allow PDF Upload</a></li>
                        </ul>
                </li> <li><a href="../examcontroller/edit_details.php">Edit Profile</a></li>';
                echo '<li><a href="../examcontroller/help.php">Help</a></li>';  
                    }

                    else if($userdef == 1) {
                        echo '<li><a href="../coordinator/index.php">Home</a></li>';
                        //echo '<li><a href="../coordinator/approve_subjects.php">Approve Subjects of Faculty</a></li>';                        
                        //echo '<li><a href="../coordinator/view_upload_coord.php">View Received Questions</a></li>';
                        echo '<li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Subject<span class="caret"></span>
                                  </a>
                                      <ul class="dropdown-menu">
                                          <li><a href="../coordinator/approve_subjects.php">Approve Subjects of Faculty</a></li>
                                          <li role="separator" class="divider"></li>
                                          <li><a href="../coordinator/view_subjects.php">View Subjects</a></li>
                                      </ul>
                              </li> ';
                        echo '<li><a href="../coordinator/view_upload_coord.php">Received Questions From Faculty</a></li>
                                          <li role="separator" class="divider"></li>';

                        echo '<li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Question Bank<span class="caret"></span>
                                  </a>
                                      <ul class="dropdown-menu">
                                          
                                          <li><a href="../coordinator/createQB.php">Prepare Question Bank</a></li>
                                          <li role="separator" class="divider"></li>
                                          <li><a href="../coordinator/downloadqb.php">View Question Bank</a></li>
                                      </ul>
                              </li> ';
                        echo '<li class="dropdown">
                                <a href = "#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Question Paper<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                        <li><a href="../coordinator/select_sub_setQuestionBank.php">Create Question Paper Sets</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../coordinator/view_select_sub_setQuestionBank.php">View Question Paper Sets</a></li>';
                        $allowedup = $obj->allowed_upload($conn);
                        if($allowedup == 1)
                        echo'
                        <li role="separator" class="divider"></li>
                        <li><a href="../coordinator/uploadpdf.php">Upload PDF Question Paper</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../coordinator/view_uploadedpdf.php">View PDF Question Paper</a></li>';
                        
                        echo'</ul></li>
                                          <li><a href="../coordinator/edit_details.php">Edit Profile</a></li>';
                        echo '<li><a href="../coordinator/notification.php">Notification</a></li>';       
                        echo '<li><a href="../coordinator/help.php">Help</a></li>';  
                        echo '';
                        
                    }
                    else if($userdef == 3) {
                        echo '<li><a href="../faculty/index.php">Home</a></li>';
                        echo '<li><a href="../faculty/view.php">View Profile</a></li>';
                        echo '<li><a href="../faculty/addSubject.php">Select Subject</a></li>';
                        echo '<li><a href="../faculty/upload.php">Prepare Question Paper</a></li>';
                        $allowed = $obj->allowed_edit_faculty($conn);
                        if($allowed == 1)
                            echo "<li><a href='../faculty/edit_details.php'>Edit Profile</a></li>";
                        echo '<li><a href="../faculty/help.php">Help</a></li>';  
                    }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right"><li><a href="#"><?php echo 'Welcome '.$myname;?></a>
                        </li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                          <a data-toggle="modal" data-target="#changeP" href="#"><i class="fa fa-expeditedssl fa-fw"></i> Change Password</a>
                        </li>
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->

    <!-- The change password modal -->
    <div id="changeP" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Change Password</h4>
            </div>
                                <form role="form" method="POST">

            <div class="modal-body">
                <div class="row">
                  <div class="col-md-12 ">
                      <fieldset>
                        <div class="form-group">
                          <input class="form-control" placeholder="Old Passwod" name="oldp" id="oldp" type="password" autofocus>
                        </div>
                        <div class="form-group">
                          <input class="form-control" placeholder="New Password" name="newp" id="newp" type="password" autofocus>
                        </div>
                        <div class="form-group">
                          <input class="form-control" placeholder="Confirm New Password" name="cnfnewp" id="cnfnewp" type="password" autofocus>
                        </div>
                        </fieldset>
                        <div id="msgp"></div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <INPUT type="submit" name="changep" onclick="return matchpassword();" value="Change" class="btn btn-success">
              
            </div>
            </form>
          </div>

        </div>
      </div>
</nav>