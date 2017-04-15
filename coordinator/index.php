<?php
	include '../include/secure_coord.php';
	require ("../include/header.php");
	
?>
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%">
	Welcome to Branch Co-ordinator Module
</div>
<div class="panel-body" id="panel-body">

		<div class="col-sm-6" style="border-right:1px solid #ddd">
			<div class="panel panel-red">
	            <div class="panel-heading">
	                GUIDELINES FOR BRANCH COORDINATOR
	            </div>
	            <div class="panel-body">
					<ul>
						<li>	Branch Coordinators can view all the questions papers submitted by faculty and select or reject the full question paper or in part.</li>
						<li>	The selected Questions will be stored in the Question Bank which will be later used for generation of a question paper or by students to view the Question Bank along with model answers. </li>
						<li>	The generated set of Question Papers can be forwarded directly to the Controller of Examination.</li>
						<li>	The printout/pdf file of the same can be generated.</li>
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
						<li style="margin-top:1%;"><a href="../coordinator/view_upload_coord.php" style="font-size:14px;">View Received Question Paper from Faculty</a></li>
						<li style="margin-top:1%;"><a href="../coordinator/createQB.php" style="font-size:14px;">Prepare Question Bank</a></li>
						<li style="margin-top:1%;"><a href="../coordinator/viewQB.php" style="font-size:14px;">View Question Bank</a></li>
						<li style="margin-top:1%;"><a href="../coordinator/select_sub_setQuestionBank.php" style="font-size:14px;">Question Paper Set</a></li>
					</Ul>
				</div>
					
			</div>					
		</div>	
</div>		
<?php
	require ("../include/footer.php");
?>

