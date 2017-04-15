<?php require 'include/headerindex.php';
	$value = $obj->get_counter($conn)->fetch()['value'];
    $obj->update_counter_add_sub($conn,$value,"add");
							
?>
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
</style>
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%;">
Welcome to APJAKTU Model Question Paper Portal
<a href="studentpdf.php"><marquee behavior="alternate" style="font-size:16px; margin-top:1%" onmouseenter="this.stop();" onmouseout="this.start();"><span style="color:red">New!</span> Question Papers Pattern for Session 2015-16</marquee></a>
</div>
<div class="panel-body" id="panel-body">
	<div class="col-sm-10" style="margin:auto 8.33%;">
		<div class="col-sm-8" style="border-right:1px solid #ddd">
	        <div class="panel panel-red">
	            <div class="panel-heading">
	                About the Portal
	            </div>
	            <div class="panel-body"  style="font-size:14px;text-align:justify;">
	                <p>
	                	The University has initiated the process for preparation of Question Banks for various subjects of all the disciplines being run in the University. These model question papers shall be made available to the students for practice and to make them more equipped for preparation of semester examinations. For the purpose, the university has nominated coordinators for various streams, who shall be responsible for preparation of the model question papers of all the subjects related to their streams with the help of the subject faculties. 
	              		<br><br>
Faculties who are interested to contribute in this activity can upload their Model Questions Papers along with Model Answers with the help of this Portal.
 <br><br>
This Portal will facilitate faculties of various streams to prepare and submit Model Question Papers and Model Answers online. The faculties can type the question papers with the online text editor. The portal automates the process of creating the Question Bank from the question papers submitted by faculties after duly approved by the concerned coordinators.</p><p>
The Portal will also provide facility to students to view and download the questions from the Question Bank and view corresponding Model Answers. 
</p>
<p class="heading"><b>
Login</b></p>
<ul> 
	<li>	Faculties are required to login to the portal with their email ID and provided password.</li>
	<li>	If not registered already, initial “Registration” will be required.
	<ul type="circle"><li>	Faculty will be required to fill in profile details</li>
	<li>	After submission an email with password will be sent to the concerned faculty at the registered email.</li>
	</ul></li></ul>

	              		<!--<div class="pull-right">
	              			<a href="guidelines.php">... More Details</a>
	              		</div>-->
	                </p>
	            </div>
	        </div>      
	    </div>
	    <div class="col-sm-4">
	    	<div class="col-sm-12">
		    	<div class="panel panel">
		            <div class="panel-heading">
		                Login
		            </div>
		            <div class="panel-body"  style="font-size:14px;">
		            	<form role="form" method="post">
			            	<fieldset>
			                        <div class="form-group">
			                          <input class="form-control" required placeholder="Email Id" name="user" id="user" type="text" autofocus="">
			                        </div>
			                        <div class="form-group">
			                          <input class="form-control" required placeholder="Password" name="password" id="password" type="password" autofocus="">
			                        </div>
			                        <a data-dismiss="modal" data-toggle="modal" data-target="#myModal">*Forgot Password</a>
			                        <a href="registration_faculty_new.php" class="pull-right">*New Registration</a>
			                        <div id="msgfl"></div>
			                        <hr>
			                        <input type="submit" name="faclogin" value="Login" class="btn btn-success pull-right">
			                </fieldset>
		                </form>
		                <hr>
						<p class="heading"><b>
						Important Information</b></p>
						<ul>
							<li><a href="guidelines.php#mqp">Guidelines for preparing Model Question Paper</a></li>
							<li><a href="guidelines.php#qpf1">Classification of Questions under three section</a></li>
							<li><a href="guidelines.php#qpf">Question Paper Format</a></li>

						</ul>
						<?php
							
							echo "<br><b style='color:darkred;'>VISITORS: ".$obj->get_counter($conn)->fetch()['value']."</b>";
						?>
		            </div>
		    	</div>
		    </div>	
		</div>
	</div>		    
</div>
<!-- <script type="text/javascript" src="js/sweetalert.js"></script>
<script type="text/javascript" src="js/login.js"></script> -->
<?php require 'include/footerindex.php';?>

