<?php
	include '../include/secure_faculty.php';
    require ("../include/header.php");

?>	
<style>
.btn{
	padding: 1px 10px;
}
</style>
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%;">
    Question Paper Preparation
</div>
<div class="panel-body" id="panel-body" align="center">
	<div class="panel " style="width:60%">
        <div class="panel-body" style="min-height:100px">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead style="background-color: #DDDDDD;">
                        <tr>
                            <th>S.No.</th>
                            <th>Semester</th>
                            <th>Subject Name</th>
                            <!--<th>Status</th>-->
                            <th>Prepare</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        	$sub_ids = $obj->get_faculty_subjects($conn,$id)->fetchAll(PDO::FETCH_ASSOC);

                        	$i=1;
                        	foreach ($sub_ids as $sub) {
                                if($sub['confirm']=='1'){
                        		echo '<tr>';
                        		echo '<td>'.($i++).'</td>';
                        		$sub_name = $obj->get_subjects_by_id($conn,$sub['subjectId'])->fetch();
                        		echo '<td>'.$sub_name['semester'].'</td>';
                                echo '<td>'.$sub_name['subjectName'].' ('.$sub['subjectId'].')</td>';
                        		//echo '<td>'.(($sub['confirm'])?'Approved':'Not Approved').'</td>';
                        		if($sub['confirm']=='1' && $sub['coordinator']=='1'){
                                    echo '<td>Sent to coordinator   </td>';
                                }
                                else{
                                echo '<td>'.(($sub['confirm']==1)?'<form action="../uploads/prepare.php" method="POST">
                                    <input type="hidden" name="subjectid" value="'.$sub['subjectId'].'">
                                    <input type="hidden" name="semester" value="'.$sub_name['semester'].'">
                                    <input type="submit" name="submit" class="btn btn-success" value="Prepare">
                                    </form>':'-').'</td>';
                                }
                                echo '<td>'.(($sub['confirm']==1)?'<form action="../faculty/view_questions.php" target="_blank" method="POST">
                                    <input type="hidden" name="s" value="'.$sub['subjectId'].'">
                                    <input type="submit" name="submit" class="btn btn-success" value="View">
                                    </form>':'-').'</td>';
                                
                        	}
                        }

                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
</div>
<?php
	require ("../include/footer.php");
	$conn=null;
?>

            