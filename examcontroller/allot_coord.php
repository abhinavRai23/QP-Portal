<?php 
include '../include/secure_exam.php';include '../include/header.php';?>
<script type="text/javascript" src="../js/jquery.js"></script>
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%">
    Allot Coordinators
</div>
<div class="panel-body" id="panel-body">
	<div class='table-responsive'>
		<?php

	
		echo "<table class='table table-bordered table-hover' id='subtable'>";
		echo "<thead><tr>
				<th>S.No.</th>
				<th>Name</th>
				<th>College</th>
				<th>Desgination</th>
				<th>Email Id</th>
				<th>Allot</td>
				</tr></thead>";
		$result = $obj->get_Coord($conn);
		$count = 0;
		while($row = $result->fetch()) {
			$count++;
			$class = ($count%2)?'even':'odd';
			$clg_name=$obj->get_college_by_id($conn,$row["collegeId"])->fetch();
			$ass_branches = $obj->get_assigned_branches_by_id($conn,$row['id'])->fetchAll(PDO::FETCH_COLUMN);

			$txtBranch = '';
			foreach ($ass_branches as $branch) {
				$txtBranch .= $branch.', ';
			}
			$txtBranch = substr($txtBranch, 0,strlen($txtBranch)-2);

			echo "<tr class='$class' data-toggle='tooltip' title='".((strlen($txtBranch)!=0)?"Alloted branches: $txtBranch":"No Branches Alloted")."'>";
			echo "<td>".$count."</td>";
			echo "<td>".$row["name"]."</td>";
			echo "<td>".$clg_name["collegeName"]."</td>";
			echo "<td>".$row["designation"]."</td>";
			echo "<td>".$row["email"]."</td>";
			echo "<td><form target='_blank' action='allot_coord_branch.php' method='post'><input type='hidden' name='id' value='".$row["id"]
				."'><input type='submit' value='Allot Branch' class='btn btn-warning'></form></td>";
			echo "</tr>";
		}

		?>
	</div>
</div>     
<script type="text/javascript">
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>   
<?php
	require ("../include/footer.php");
?>