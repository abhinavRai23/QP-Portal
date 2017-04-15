<?php
	require ("../include/header.php");
	if(!isset($_POST['sem']) || !isset($_POST['sub']) || !isset($_POST['alert'])){
      echo '<script>window.location.href="select_sub_setQuestionBank.php";</script>';
      die();
    }

	if(isset($_POST['sub'])){
    $sub=$_POST['sub'];
	 $sem=$_POST['sem'];
	 $alert=$_POST['alert'];

	if($alert=="yes"){

		echo'<script>

		swal("Please enter correct marks")
		</script>';
	}

}
?>
<script>
	$(document).ready(function(){
       
       $("#setfocus").focus(function(){
     
        //alert(this.val());


       });
      

	});

       function checkset(){
               var set=$("#setfocus").val();
                var sub="<?php echo $sub?>";
                 var sem="<?php echo $sem?>";
                //alert(sub);
             $.ajax({
             type:"POST",
             url:"checkSet.php",
             data:{sub:sub,set:set,sem:sem},
             success:function(result){
                 if(result==1){
                 	alert("Set "+set+" already exists");
                 	return false;	
             }else{
             	return true;
             }
             
             }
             });


       }
      

	


</script>

<style type="text/css">
	.form-control {
    display: inline-block;
    width: 90%;
    vertical-align: middle;
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 10px 10px;
    line-height: 1.42857143;
    vertical-align: middle;
    border-top: 1px solid #fff;
}
hr{
	margin-top: 0px;
}
</style>

<div class="panel-heading" align="center">
                Create Question Paper
</div>
<div class="panel-body" id="panel-body" style="">


	<div class="col-sm-8" style="margin:auto 16.67%;border:1px solid #ddd">
			<form class="form-inline" action='question_paper_pattern.php' method="POST">
				<div class="table-responsive">
					<table class="table" style="margin-bottom:0px;">
						<tr>
							<td style="float:right;">		
									<input type="Text" class="form-control" name="set" placeholder="Set Name" id="setfocus"required maxlength="1" style="text-transform:uppercase">
								</div>	
							</td>
							<td>		
									<input type="number" class="form-control" name="total_marks" placeholder="Total Marks" required>
								</div>
							</td>
					</table>
				</div>
				<hr>
				<div class="panel-heading">
		                Section A
		                <div class="form-group pull-right side">
		                	<input type="number" class="form-control" name="nSecA"  placeholder="Marks Per Question" required>

		                </div>
		                 <div class="form-group pull-right side">
		                	<input type="number" class="form-control" name="nQTTAA" id="" placeholder="To be attempted" required style="width: 83%;margin-left: 11%;">
		                </div>
		                 <div class="form-group pull-right side">
		                	<input type="number" class="form-control" name="nQTA" id="" placeholder="Total question" required style="width: 83%;margin-left: 11%;">
		                </div>
		                
		                <br><br>
				</div>
				<table width="100%">
					<tr>
						<div class="form-group">
							<td>
								<label>Memory Based:</label>
							</td>
							<td>
								 <input type="number" class="form-control" name="mba" id="MemoryBased" placeholder="No. of Question" required>
							</td>
						</div>
					</tr>
					<tr>	
						<div class="form-group">
							<td>
								<label>Evaluation Based:</label>
							</td>
							<td>
								 <input type="number" class="form-control" name="eba" id="EvaluationBased" placeholder="No. of Question" required>
							</td>
						</div>
					</tr>
					<tr>	
						<div class="form-group">
							<td>
								<label>Application Based:</label>
							</td>
							<td>
								 <input type="number" class="form-control" name="aba" id="ApplicationBased" placeholder="No. of Question" required>
							</td>
						</div>
					</tr>
				</table>
			
			<hr>
		<div class="panel-heading">
		                Section B
		                <div class="form-group pull-right side">
		                	<input type="number" class="form-control" name="nSecB" id="" placeholder="Marks Per Question" required  style="width: 83%;margin-left: 11%;">
		                </div>
		                <div class="form-group pull-right side">
		                	<input type="number" class="form-control" name="nQTTAB" id=""  placeholder="To be attempted"  required style="width: 83%;margin-left: 11%;">
		                </div>
		                 <div class="form-group pull-right side">
		                	<input type="number" class="form-control" name="nQTB" id="" placeholder="Total question"  required style="width: 83%;margin-left: 11%;">
		                </div>
		                 
		                <br><br>
		</div>
			
				<table width="100%">
					<tr>
						<div class="form-group">
							<td>
								<label>Memory Based:</label>
							</td>
							<td>
								 <input type="number" class="form-control" name="mbb" id="MemoryBased" placeholder="No. of Question" required>
							</td>
						</div>
					</tr>
					<tr>	
						<div class="form-group">
							<td>
								<label>Evaluation Based:</label>
							</td>
							<td>
								 <input type="number" class="form-control" name="ebb" id="EvaluationBased" placeholder="No. of Question" required>
							</td>
						</div>
					</tr>
					<tr>	
						<div class="form-group">
							<td>
								<label>Application Based:</label>
							</td>
							<td>
								 <input type="number" class="form-control" name="abb" id="ApplicationBased" placeholder="No. of Question" required>
							</td>
						</div>
					</tr>
				</table>
			
			<hr>
		<div class="panel-heading">
		                Section C
		                <div class="form-group pull-right side">
		                	<input type="number" class="form-control" name="nSecC" id="" placeholder="Marks Per Question" required>
		                </div>
		                <div class="form-group pull-right side">
		                	<input type="number" class="form-control"name="nQTTAC" id="" placeholder="To be attempted"  required="" style="width: 83%;margin-left: 11%;">
		                </div>
		                 <div class="form-group pull-right side">
		                	<input type="number" class="form-control"name="nQTC" id="" placeholder="Total question" required="" style="width: 83%;margin-left: 11%;">
		                </div>
		                 
		                <br><br>
		</div>
			
				<table width="100%">
					<tr>
						<div class="form-group">
							<td>
								<label>Memory Based:</label>
							</td>
							<td>
								 <input type="number" class="form-control" name="mbc" id="MemoryBased" placeholder="No. of Question" required>
							</td>
						</div>
					</tr>
					<tr>	
						<div class="form-group">
							<td>
								<label>Evaluation Based:</label>
							</td>
							<td>
								 <input type="number" class="form-control" name="ebc" id="EvaluationBased" placeholder="No. of Question" required>
							</td>
						</div>
					</tr>
					<tr>	
						<div class="form-group">
							<td>
								<label>Application Based:</label>
							</td>
							<td>
								 <input type="number" class="form-control" name="abc" id="ApplicationBased" placeholder="No. of Question"required>
								  <?php
								  echo'<input type="hidden" id="sub" name="sub" value='.$sub.'>';
								  echo'<input type="hidden" id="sub" name="sem" value='.$sem.'>';
								  ?>
							</td>
						</div>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" onsubmit="return checkset();"  id="submit"class="btn btn-success pull-right" style="margin-bottom:2%;padding:8px 14px;" value="Submit">
						</td>
					</tr>
				</table>
			</form>
	</div>		


</div>
<?php
	require ("../include/footer.php");
?>

