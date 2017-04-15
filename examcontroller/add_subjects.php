<?php include '../include/secure_exam.php';
include '../include/header.php';
?>
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%">
    Add Subject
</div>
<?php
if(isset($_POST['addSubject'])){
	echo '<div style="padding-left:15%;"><b><br>';
	if(!isset($_POST['branch']) || empty($_POST['branch']))
		echo "<span style='color:red;'>Please select valid branch.</span><br>";
	if(!isset($_POST['sub']) || empty($_POST['sub']))
		echo "<span style='color:red;'>Please enter subject name.</span><br>";
	if(!isset($_POST['subCode']) || empty($_POST['subCode']))
		echo "<span style='color:red;'>Please enter subject code.</span><br>";
	if(!isset($_POST['sem']) || empty($_POST['sem']))
		echo "<span style='color:red;'>Please select valid semester.</span><br>";
	if(isset($_POST['branch']) & isset($_POST['sub']) & isset($_POST['subCode']) & isset($_POST['sem'])){
		$b = $_POST['branch'];
		$s = $_POST['sub'];
		$sc = $_POST['subCode'];
		$sm = $_POST['sem'];
		if(!empty($b) & !empty($s) & !empty($sc) & !empty($sm)){
			if($obj->check_subject_infoSubject($conn,$b,$sc,$sm)==0){
				if($obj->add_subject_infoSubject($conn,$b,$s,$sc,$sm))
					echo "<span style='color:green;'>Subject added successfully.</span><br>";
				else
					echo "<span style='color:red;'>Please try again.</span><br>";
			}
			else{
				echo "<span style='color:red;'>Please enter subject code.</span><br>";
			}
		}
	}
	echo '</b></div>';
	
}

?>
<div class="panel-body" align="center" id="panel-body">
	<form role="form" class="form-inline" method="POST">
		<Table>
			<tr>
				<div class="form-group">
					<td>
						<label>Course:</label>
					</td>
					<td>
						<select class="form-control" name="course" id="courseId" onchange="getbranches();">
                       <?php
							$result = $obj->get_courses($conn);
							while($row = $result->fetch()) {
								echo "<option value='".$row["courses"]."'>".$row["courses"]."</option>";
							}
						?>
						</select>
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Branch:</label>
					</td>
					<td>
						<select class="form-control" name="branch" id="branchlist">
                       
						</select>
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Subject:</label>
					</td>
					<td>
						<input class="form-control" type="text" name="sub" id="sub">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Subject Code:</label>
					</td>
					<td>
						<input class="form-control" type="text" name="subCode" id="subCode">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Semester:</label>
					</td>
					<td>
						<select class="form-control" name="sem" id="sem">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                        </select>
					</td>
				</div>	
			</tr>
		</Table>
		<center><input type="submit" name="addSubject" class="btn btn-md btn-success"></center>
	</form>		
</div>        

<?php
    require ("../include/footer.php");
?>
<?php
$conn = null;
?>