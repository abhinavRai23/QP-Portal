<?php

	require 'connectionPDO.php';
	require 'queries.php';	
	$obj = new Queries();

if($_POST['t']==1)
{
	$course = htmlentities($_POST['course']);
	$branchlist = $obj->get_branch_by_c($conn,$course);
	if(isset($_POST['all'])){
		if($_POST['all']=='1')
		echo "<option value='All'>ALL</option>";
	}
	while($branch = $branchlist->fetch()) {
		$branchId = $branch["branchId"];
		$branchName = $branch["branchName"];
		
		echo "<option value='$branchId'>$branchName ($branchId)</option>";
	}	
}
elseif($_POST['t']==2)
{

}

?>