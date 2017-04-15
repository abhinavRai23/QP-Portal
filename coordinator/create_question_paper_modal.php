<?php
	require ("../include/header.php");
	$sub=$_POST['sub'];
	$sem=$_POST['sem'];
	$alert=$_POST['alert'];
	if($alert=="yes"){

		echo'<script>

		alert("THE CALCULATION OF TOTAL MARKS WAS WRONG")</script>';
	}
?>


<style type="text/css">
	table{
		margin-left: 10%;
	} .form-control {
    display: inline-block;
    width: 90%;
    vertical-align: middle;
}
</style>

<div class="panel-heading" align="center">
                Create Question Paper
</div>
<div class="panel-body" id="panel-body">


	<div class="col-sm-6" style="margin-left:25%;border:1px solid #ddd">
			<form class="form-inline" action='question_paper_pattern.php' method="POST">
				<div class="form-group" style="margin-top:2%;margin-left:5%">
					<label>Set:</label>
					<input type="Text" class="form-control" name="set" placeholder="Type set" required>
				</div>
				<div class="form-group" style="margin-top:2%;margin-left:5%">
					<label>Total marks:</label>
					<input type="number" class="form-control" name="total_marks" placeholder="Total Marks" required>
				</div>
				<hr>
				<div class="panel-heading">
		                Section A
		                <div class="form-group pull-right side">
		                	<input type="number" class="form-control" name="nSecA" id="" placeholder="Marks/Question" required>
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
		                	<input type="number" class="form-control" name="nSecB" id="" placeholder="Marks/Question" required>
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
		                	<input type="number" class="form-control" name="nSecC" id="" placeholder="Marks/Question" required>
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
								  echo'<input type="hidden" name="sub" value='.$sub.'>';
								  echo'<input type="hidden" name="sem" value='.$sem.'>';
								  ?>
							</td>
						</div>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<button type="submit" class="btn btn-success" style="margin-bottom:2%" value="submit">Submit</button>
						</td>
					</tr>
				</table>
			</form>
	</div>		


</div>
<?php
	require ("../include/footer.php");
?>

