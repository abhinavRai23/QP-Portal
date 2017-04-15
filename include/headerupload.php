
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- <link rel="stylesheet" href="css/font-awesome.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/sweetalert.js"></script>
    
   <style>
    body {
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
    .container{
      width: 100%;
    }
    .col-sm-12{
      padding-right: 0px;
      padding-left: 0px;
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
    .panel{
      margin-bottom: 0px;
    }
        .navbar{
      border-radius: 0px;
    }
    .navbar-right>li{
      cursor: pointer;
    }
    .dropdown-menu>li>a:hover{
      background-color: #BFBFBF !important; 
    }
    </style>

  </head>
  <body>

  <div class="bb-alert alert alert-info" style="display:none;" id="span">
        <span>The examples populate this alert with dummy content</span>
    </div>
    <div class="container">
  <?php
require_once 'common/connectionPDO.php';
require_once 'common/queries.php';
$obj = new Queries;

?>
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default" id="main">

            <div class="container-fluid" style="margin-top:.5%;margin-bottom:.5%;" id="container-fluid">
                  <div class="row logo">
                        <div class="col-sm-1 col-xs-4 pull-right" style="padding:0px"><img src="images/sir-apj.jpg" height="100px" class="img-responsive logo-1 apj" style="border-radius:50%;position: relative;right: 5px; border:1px solid #999;float: right;margin-right: 5%;"></div> 
                        <div class="col-sm-1 col-xs-4"><img class="img-responsive logo-1" src="images/logo.png"></div>
                        <div class="col-sm-10 col-xs-12 u-name"><img class="img-responsive logo-2" src="images/logo-1.jpg" ></div>
                        

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
                        <li><a href="index.php">Home</a></li>
                        
            </ul>
            
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
      <!-- Modal -->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Enter E-mail ID</h4>
            </div>
                                <form role="form" action="forgotpass.php" method="POST">

            <div class="modal-body">
                <div class="row">
                  <div class="col-md-12 ">
                        <div class="form-group">
                          <input class="form-control" placeholder="Email" name="user1" id="user1" type="text" autofocus>
                        </div>   
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <INPUT type="submit" name="submit" class="btn btn-success">
              
            </div>
            </form>
          </div>

        </div>
      </div>
      <!-- faculty login -->
            <div id="faclogin" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Login</h4>
            </div>
                                <form role="form" method="POST" >

            <div class="modal-body">
                <div class="row">
                  <div class="col-md-12 ">
                      <fieldset>
                        <div class="form-group">
                          <input class="form-control" placeholder="Email Id" name="user" id="user" type="text" required autofocus>
                        </div>
                        <div class="form-group">
                          <input class="form-control" placeholder="Password" name="password" id="password" type="password" required autofocus>
                        </div>
                        <a data-dismiss="modal" data-toggle="modal" data-target="#myModal">*Forgot Password</a>
                        <div id="msgfl"></div>
                        </fieldset>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <INPUT type="submit" name="faclogin" value="Login" class="btn btn-success">
              
            </div>
            </form>
          </div>

        </div>
      </div>
            <div id="clglogin" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">College Login</h4>
            </div> 
                                <form role="form" method="POST">

            <div class="modal-body">
                <div class="row">
                  <div class="col-md-12 ">
                      <fieldset>
                        <div class="form-group">
                          <input class="form-control" placeholder="Email Id" name="user" id="user" type="text" autofocus>
                        </div>
                        <div class="form-group">
                          <input class="form-control" placeholder="Password" name="password" id="password" type="password" autofocus>
                        </div>
                        <a data-dismiss="modal" data-toggle="modal" data-target="#myModal">*Forgot Password</a>
                        <div id="msgcl"></div>
                        </fieldset>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <INPUT type="submit" name="clglogin" value="Login" class="btn btn-success">
              
            </div>
            </form>
          </div>

        </div>
      </div>
      <script type="text/javascript">
              $(".ui-widget-overlay").click (function () {
           $("#your-dialog-id").dialog( "close" );
      });

      </script>

    </div><!-- /.container-fluid -->
</nav>