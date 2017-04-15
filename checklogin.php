<!DOCTYPE html>
<html>
<head>
	<title>:: Dr. A.P.J. Abdul Kalam Technical University (APJAKTU) ::</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</head>
<style>
body {
	background: url("images/top_bg.png") no-repeat scroll left top #0667A5;
	color: #000000;
	font: 11px/17px Verdana,Geneva,sans-serif;
	margin: 0;
	padding: 0;
}
.login-panel{
	border: 2px solid #003E56;
	border-radius: 10px;
	padding: 10px;
   	box-shadow: 0px 0px 5px #000;
}

.login_logo {
  	background: no-repeat scroll 0 0 rgba(0, 0, 0, 0);
  	display: block;
  	height: 218px;
  	width: 100%;
}
.panel-default>.panel-heading {
	background-color:#FFF; 
}
.panel-title{
	font-weight: 600;
}
.panel-body{
	verticle-align:center;
}
.log_in{
	font-size: 16px;
}
</style>
<body>

<div class="container">
    <div class="row">
    	<div class="col-sm-8" style="margin-left:15%">
    		<div class="login_logo" align="center"><img src="images/logo_login.png"></div>
    		<div class="col-sm-2">&nbsp;
    		</div>
    		<div class="col-sm-8">
    			<div class="login-panel panel panel-default" align="center">
                <div class="panel-heading">
                    <h3 class="panel-title" align="center">Choose Login Type</h3>
                </div>
                <div class="panel-body">
                	<div class="col-sm-6" style="">
                		<a href="collegelogin.php"><div class="log_in"><img src="images/Public_Sector_icon.png" height="100px"><br>College Login</div></a>
                	</div>
                	<div class="col-sm-6" style="">	
                		<a href="facultylogin.php"><div class="log_in"><img src="images/photo.jpg" height="100px"><br>Faculty Login</div></a>
                	</div>	
                </div>
            </div>
    		</div>
            <div class="col-sm-2">&nbsp;
            </div>
        </div>
    </div>
</div>    
</body>
</html>
