<?php
require 'common/connectionPDO.php';
require 'common/queries.php';
$branch = $_POST['branch'];
$obj = new Queries;
	$result = $obj->get_subjects_by_branch($conn,$branch);
	while($row = $result->fetch()) {
		echo '
											<div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="subject[]" value="'.$row["subjectId"].'">&nbsp;'.$row["subjectName"].'
                                                </label>
                                            </div><br>
	';
		// echo "<input type='checkbox' value='".$row["subjectId"]."'".$row["subjectName"]."</option>";
	}
$conn = NULL;
?>