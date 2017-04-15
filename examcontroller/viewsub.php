<?php include '../include/secure_exam.php';
//include '../include/header.php';
	$sem=$_POST['sem'];
	$branch=$_POST['branch'];
?>


	
<div class="panel-heading" align="center">
    List of College
</div>
<div class="panel-body" id="panel-body">
	<div class="table-responsive">
	<form method="POST">
		<table class='table table-striped table-bordered table-hover' id='subtable'>
			<thead>
				<tr>
					<td>S.No.</td>
					<td>Branch</td>
					<td>Code</td>
					<td>Sem</td>
					<td>Edit</td>
				</tr>
			</thead>

			<?php
				$count = 0;
				$headlist = $obj->get_subjects($conn);
				while($row = $headlist->fetch()) {
					$class = ($count%2)?'even':'odd';
					$count++;
					$collegeId = $row['collegeId'];
					$collegeName = $row['collegeName'];
					$city = $row['city'];
					echo "<tr class='$class'>";
					echo "<td>".$count."</td>";
					echo "<td>".$collegeId."</td>";
					echo "<td id='name_$collegeId'>".$collegeName."</td>";
					echo "<td id='city_$collegeId'>".$city."</td>";
					echo "<td id='edit_$collegeId'><button class='btn btn-warning' onclick='editcollege(\"".$collegeId."\");'>Edit</button></td>";
					echo "</tr>";
				}
			?>
		</table>
	</form>
	</div>
</div>        
<script type="text/javascript" src="../js/approvefaculty.js"></script>
<?php
    require ("../include/footer.php");
?>
<?php
$conn = null;