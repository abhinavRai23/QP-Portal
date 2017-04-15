<?php
	include '../include/secure_faculty.php';
	require ("../include/header.php");
	
?>
<style>
	.heading{
		font-weight: bold;
		font-size:14px	;
	}
</style>
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%;">
Welcome to Faculty Module
</div>	
<div class="panel-body" id="panel-body">
	<div class="col-sm-6" style="border-right:1px solid #ddd">
		<div class="panel panel-red">
            <div class="panel-heading">
                Guidelines for Faculty
            </div>
            <div class="panel-body">
                <p class="heading">Login</p>
		<ul> 
			<li>	Faculties are required to login to the portal with their email ID and provided password.</li>
			<li>	If not registered already, initial “Registration” will be required.
			<ul type=circle><li>	Faculty will be required to fill in profile details</li>
			<li>	After submission an email with password will be sent to the concerned faculty at the registered email.</li>
			</ul></li></ul>
			<p class="heading">Subject Selection</p>
			<ul>
			<li>	After registration, faculty can choose single/multiple subjects from the drop down menus for the Model Question Paper.</li></ul>
			<p class="heading">Preparation and Uploading of Questions</p>
			<ul>
			<li>	Faculty can submit the question paper to the coordinator of the respective branch through this portal.</li>
			<li>	Faculty will be able to see “Submit Question Paper” Button in front of the approved subject/subjects.</li>
			<li>	On clicking “Submit Question Paper Button”, Question Paper writing interface will appear.</li>
			<li>	Facility to save the partial work is provided so that the keyed in data is not lost while typing. Facility to edit the saved questions is also provided.</li>
			<li>	Color indication is provided for the questions saved.</li>
			<li>	Once all the questions have been typed and saved the complete or partial Question Paper can be submitted.</li>
			<li>	Submitted Question paper will be forwarded to the concerned coordinator automatically.</li></ul>
			            
			<br>
          		<div class="pull-right">
          			<a href="guidelines.php">Other Guidelines</a>
          		</div>
            </div>
        </div>	
	</div>	
	<div class="col-sm-6">
		<div class="panel panel-red">
            <div class="panel-heading">
                Links
            </div>
            <div class="panel-body">
				<ul list-style-	type="" style="font-size:14px;">
					<li style="margin-top:1%;"><a href="../faculty/view.php">View Profile</a></li>
					<li style="margin-top:1%;"><a href="../faculty/addSubject.php">Select Subject</a></li>
					<li style="margin-top:1%;"><a href="../faculty/upload.php">Prepare Question Paper</a></li>
				</ul>
			</div>	
	</div>	
</div>
<?php
	require ("../include/footer.php");
?>

