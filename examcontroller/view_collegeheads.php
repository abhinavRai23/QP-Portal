<?php include '../include/secure_exam.php';
include '../include/header.php';
	
?>

<div class="panel-heading" align="center">
    List of Assigned College Representatives
</div>
<div class="panel-body" id="panel-body">
	<div class="table-responsive">
		<table class='table table-striped table-bordered table-hover' id='subtable'>
			<thead>
				<tr>
					<td>College Id</td>
					<td>College Name</td>
					<td>Name of College Representative</td>
					<td>Email Id</td>
					<td>Delete</td>
				</tr>
			</thead>

			<?php
				$count = 0;
				$headlist = $obj->get_headdetails($conn);
				while($row = $headlist->fetch()) {
					$class = ($count%2)?'even':'odd';
					$collegeId = $row['collegeId'];
					$collegeName = $row['collegeName'];
					$name = $row['name'];
					$emailId = $row['emailId'];
					echo "<tr class='$class'>";
					echo "<td>".$collegeId."</td>";
					echo "<td>".$collegeName."</td>";
					echo "<td>".$name."</td>";
					echo "<td>".$emailId."</td>";
					echo "<td><button class='btn btn-danger' onclick='deletehead(\"".$collegeId."\");'>Delete</button></td>";
					echo "</tr>";
				}
			?>
		</table>
	</div>
</div>        

<?php
    require ("../include/footer.php");
?>
<?php
$conn = null;
?>