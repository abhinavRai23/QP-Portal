<?php
	include '../include/secure_faculty.php';
	require ("../include/header.php");
	
?>
<style>
	.heading{
		font-weight: bold;
		font-size:14px	;
	}
    .panel-my .panel-heading {
  border-color: #d9534f !important;
  color: #fff;
  background-color: #d9534f !important;
}   
.panel-my {
  border-color: #d9534f !important;
}
.panel-my .panel-body {
        padding: 0px !important;
    }
</style>

<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%;">
Video Help
</div>	
<div class="panel-body" id="panel-body">
	<div class="col-sm-6" style="border-right:1px solid #ddd">
		<div class="panel panel-red">
            <div class="panel-heading">
                Regarding Upload Question Papers
            </div>
            <div class="panel-body">
            	<div class="panel panel-my">
            		<div class="panel-heading" >Select Subject</div>
                    <div class="panel-body"><video src="../videos/selectsubject.mp4" height="500px" width="100%" controls></video>
            		</div>
            	</div>
            	<div class="panel panel-my">
                    <div class="panel-heading" >Add Question</div>
                    <div class="panel-body"><video src="../videos/addquestion.mp4" height="500px" width="100%" controls></video>
                    </div>
                </div>
                <div class="panel panel-my">
                    <div class="panel-heading" >Send to Coordinators</div>
                    <div class="panel-body"><video src="../videos/sendtocoord.mp4" height="500px" width="100%" controls></video>
                    </div>
                </div>

            </div>
        </div>	
	</div>	
	<div class="col-sm-6">
		<div class="panel panel-red">
            <div class="panel-heading">
                Regarding Word Editor
            </div>
            <div class="panel-body">
            <div class="panel panel-my">
                    <div class="panel-heading" >Word Editor</div>
                    <div class="panel-body"><video src="../videos/editor.mp4" height="500px" width="100%" controls></video>
                    </div>
                </div>	
                </div>
	</div>	
</div>
<?php
	require ("../include/footer.php");
?>

