<?php include '../include/secure_exam.php';
include '../include/header.php';
	
?>
<style type="text/css">
	a{
		text-decoration: none;
		color: white;

	}
	a:hover {
		color: white;
		text-decoration: none;
	}
	a:visited{
		color: white;
		text-decoration: none;
	}
</style>
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%">
    List of Assigned Branch Coordinators
</div>
<div class="panel-body" id="panel-body">
	<div class="table-responsive">
		<table class='table table-striped table-bordered table-hover' id='subtable'>
			<thead>
				<tr>
					<td>S.No.</td>
					<td>Name</td>
					<td>Name of College</td>
					<td>Email ID</td>
					<td>Assigned Branches</td>
					<td>Edit</td>
					<td>Delete</td>
				</tr>
			</thead>

			<?php
				$count = 0;
				$headlist = $obj->get_Coord($conn);
				while($row = $headlist->fetch()) {
					$count++;
					$class = ($count%2)?'even':'odd';
					$name = $row['name'];
					$collegeName = $obj->get_college_name($conn,$row['collegeId']);
					$emailId = $row['email'];
					$ass_branches = $obj->get_assigned_branches_by_id($conn,$row['id'])->fetchAll(PDO::FETCH_COLUMN);

					$txtBranch = '';
					foreach ($ass_branches as $branch) {
						$txtBranch .= $branch.', ';
					}
					$txtBranch = substr($txtBranch, 0,strlen($txtBranch)-2);

					echo "<tr class='$class'>";
					echo "<td>".$count."</td>";
					echo "<td>".$name."</td>";
					echo "<td>".$collegeName." ($row[collegeId])</td>";
					echo "<td>".$emailId."</td>";
					echo "<td>".((strlen($txtBranch)!=0)?$txtBranch:'No Branches Alloted')."</td>";
					echo "<td><button class='btn btn-warning' onclick='editcoord($row[id]);'>Edit</button></td>";
					echo "<td><button class='btn btn-danger' onclick='deletecoord($row[id]);'>Delete</button></td>";
					echo "</tr>";
				}
			?>
		</table>
	</div>
</div>   
<script type="text/javascript">
	function editcoord(id) {
		window.open("editcoord.php?id="+id, "_blank");
	}
</script>     

<?php
    require ("../include/footer.php");
?>
<?php
$conn = null;
?>