<?php
	include '../include/secure_coord.php';
	require ("../include/header.php");
?>
<style>
	label {
  display: inline-block;
  max-width: 100%;
  margin-bottom: 5px;
  font-weight: bold;
  font-size: 13px;
}
.col-sm-5{
	border-right:1px solid #ddd;
}
span{
	font-size: 14px;
	font-weight: bold;
}
.col-sm-7>.panel-heading{
	font-size: 14px !important;
	font-weight: 100 !important;
}
table.dataTable {
  clear: both;
  margin-top: 6px !important;
  margin-bottom: 6px !important;
  width: 100%;
}
.pull-right-new {
  margin-bottom: 6%;
  margin-top: 1%;
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
  padding: 8px;
  line-height: 1.42857143;
  vertical-align: top;
  border-top: 1px solid #ddd;
  cursor: pointer;
}

</style>

<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%">
	Prepared Questions By Faculty
</div>
<div class="panel-body" id="panel-body">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<form role="form" class="form-inline" method="POST" action="setCreation.php">
					<Table style="width:100%;">
						<tr>
							<div class="form-group">
								<td>
									<label>Branch:&nbsp;</label>
								</td>
								<td>
								<select name="branchId" id="branchlist" class="form-control" style="width:80%"  required onchange="getsubjects();">
								<option>Select</option>
								<?php
									$allotedlist = $obj->get_alloted($conn, $id);
									$i=0;
									while($row = $allotedlist->fetch()) {
										$i++;
										$bid = $row['branchId'];
										$bname = $row['branchName'];
										echo "<option value='$bid'>$bname ($bid)</option>";
										
									}
								?>
							</select>
								</td>
							</div>	
						</tr>
						<tr>
							<div class="form-group">
								<td>
									<label>Semester:&nbsp;</label>
								</td>
								<td>
									<select name="semester" class="form-control" id="semesterlist" required style="width:80%" onchange="getsubjects();">
									<?php
										$i = 1;
										while($i<=10) {
											echo "<option value=$i>$i</option>";
											$i ++;
										}	
									?>
									</select>
								</td>
							</div>	
						</tr>
						<tr>
							<div class="form-group">
								<td>
									<label>Subject:&nbsp;</label>
								</td>
								<td>
									<select name="subs" class="form-control" id="subjectlist" required style="width:80%" onchange="getUploadList();">
									</select>
								</td>
							</div>	
						</tr>
					</Table>
				</form>	
				<br>
				<div class="panel" id="uploadList">
                </div>	
			</div>
			<div class="col-sm-7" style="border-left:1px solid rgb(169, 159, 159);margin-left:2%;padding-left:6%;min-height:600px;" id="getQuestions">
                      <h3 align="center" style="color:#8C8C8C;margin-top: 26%;">Select from left panel to view questions</h3>
                
                
			</div>
		</div>
	</div>
</div>
		<div class="modal fade" id="edit_question_modal" role="dialog">
                <div class="modal-dialog" style="width:55%;">

                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" id="close_modal_click">&times;</button>
                            <h4 class="modal-title" style="color:rgb(126, 126, 126);">Edit </h4>
                        </div>
                        <div class="modal-body" style="min-height:475px;padding:0px;">
                            <iframe name="my_iframe" frameborder="0" width="99%" style="position: absolute; height: 100%;"></iframe>
                        </div>
                    </div>

                </div>
        </div>
<script>
$(document).ready(function() {
    $('table.display').DataTable();
} );


function getUploadList() {
		 $.ajax({

             type:"POST",
             url:"uploadList.php",
             data:'sub='+$("#subjectlist").val()+'&sem='+$("#semesterlist").val(),
             success:function(result){
             	$("#uploadList").html(result);
             }
   
            });
	
		
	}
 function getQuestions(f,s){
 		 $.ajax({

             type:"POST",
             url:"getQuestions.php",
             data:'f='+f+'&s='+s,
             success:function(result){
             	$("#getQuestions").html(result);
             }
   
            });
	}
 </script>

<?php
	require ("../include/footer.php");
?>
<style type="text/css">
	.dataTables_filter, .dataTables_info { display: none; }
	.dataTables_filter, .dataTables_length { display: none; }
	.pagination{margin-left: -10% !important;}
	.table-bordered > tbody > tr > td{   border: 1px solid #5E5E5E; }
	.table-bordered > tbody > tr > th{   border: 1px solid #5E5E5E; }
	.table-bordered{   border: 1px solid #5E5E5E; }
	.table-bordered > thead > tr > th{   border: 1px solid #5E5E5E; }
	.soring_1{border: 1px solid #5E5E5E;}

</style>

<script>
	function deleteQuesBank(i) {
		if (confirm('Are you sure you want to delete from the database?')) {
	     $.ajax({

             type:"POST",
             url:"createQuesBankPre.php",
             data:'i='+i+'&t=D',
             success:function(result){
             	if(result==1){
             		var m = '#MP'+i;
             		alert("Question deleted from database");
             		$(m).css("display","none");
             	}
             }
   
            });
	
		} else {
	    // Do nothing!
		}
	}
	function createQuesBank(i) {
		 $.ajax({

             type:"POST",
             url:"createQuesBankPre.php",
             data:'i='+i+'&t=S',
             success:function(result){
             	if(result==1){
             		var s = '#S'+i;
             		var d = '#D'+i;
             		var e = '#E'+i;
             		$(e).css("display","none");
             		$(s).text("Deselect");
             		$(s).attr("onclick","undoCreateQuesBank('"+i+"')");
             	}
             }
   
            });
	
		
	}
	function undoCreateQuesBank(i) {
		 $.ajax({

             type:"POST",
             url:"createQuesBankPre.php",
             data:'i='+i+'&t=U',
             success:function(result){
             	if(result==1){
             		var s = '#S'+i;
             		var d = '#D'+i;
             		var e = '#E'+i;
             		$(e).css("display","inline-block");
             		$(s).text("Select");
             		$(s).attr("onclick","createQuesBank('"+i+"')");
             	}
             }
   
            });
	
		
	}

</script>

