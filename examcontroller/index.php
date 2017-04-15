<?php
	include '../include/secure_exam.php';
	require ("../include/header.php");
	
?>
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%">
	Welcome to Controller of Examination Module
</div>
<div class="panel-body" id="panel-body">

		<div class="col-sm-6" style="border-right:1px solid #ddd">
			<div class="panel panel-red">
	            <div class="panel-heading">
	                Guidelines for University Controller of Examination
	            </div>
	            <div class="panel-body">
					<ul>
						<li>	Controller of Examination can view all the Question paper sets submitted by the University Coordinators.</li>
						<li>	Controller of Examination can create a new set of question paper from the available sets by selecting the questions from these sets.</li>
						<li>	Controller of Examination can create/update/delete University Coordinators and the streams allocated to them.</li>
						<li>	Controller of Examination can add/delete Subjects for each stream.</li>
					</ul>
				            
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
					<Ul type="circle">
						<li style="margin-top:1%;"><a href="add_branches.php" style="font-size:14px;">Add Branches</a></li>
						<li style="margin-top:1%;"><a href="add_coord.php" style="font-size:14px;">Add Branch Coordinator</a></li>
						<!--<li style="margin-top:1%;"><a href="add_colleges.php" style="font-size:14px;">Add Colleges</a></li>-->
						<li style="margin-top:1%;"><a href="add_subjects.php" style="font-size:14px;">Add Subject</a></li>
						<li style="margin-top:1%;"><a href="allot_coord.php" style="font-size:14px;">Allot Branches to Branch Coordinator</a></li>
						<li style="margin-top:1%;"><a href="select_sub_setQuestionBank.php" style="font-size:14px;">Question Paper Set</a></li>
						<li style="margin-top:1%;"><a href="view_suggestions.php" style="font-size:14px;">View Suggestions</a></li>
					</Ul>
				</div>
					
			</div>					
		</div>	
</div>	
<?php
	require ("../include/footer.php");
?>

