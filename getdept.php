<?php
	include 'common/connectionPDO.php';
	include 'common/queries.php';
	$obj = new Queries();
	$colgId = $_POST['cid'];
	$result = $obj->get_branch_clg($conn,$colgId);
	while($row = $result->fetch()) {
		$branchName = $obj->get_branchname($conn,$row["branchId"]);
		echo "<option value='".$row["branchId"]."'>".$branchName."($row[branchId])</option>";
	}
	echo "<option value='OTHER'>OTHERS</option>";
?>  