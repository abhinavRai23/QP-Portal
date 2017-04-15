<?php include '../include/secure_exam.php';
include '../include/header.php';
	
?>

<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%">
    Suggestions
</div>
<div class="panel-body" id="panel-body">
<?php
	if(isset($_POST['delete'])) {
		$sugId = htmlentities($_POST['sugId']);

		if($obj->delete_suggestion($conn, $sugId)) {
			header('Location:view_suggestions.php');
		}
	}
?>
	<div class="table-responsive">
	<form method="POST">
		<table class='table table-striped table-bordered table-hover' id='subtable'>
			<thead>
				<tr>
					<td>S.No.</td>
					<td>Suggestion</td>
					<td>Ratings</td>
					<td>Delete</td>
				</tr>
			</thead>

			<?php
				$count = 0;
				$suglist = $obj->get_suggestions($conn);
				while($row = $suglist->fetch()) {
					$class = ($count%2)?'even':'odd';
					$count++;
					$suggestion = $row['suggestion'];
					$rate = $row['rate'];
					$id = $row['id'];
					echo "<tr class='$class'>";
					echo "<td>".$count."</td>";
					echo "<td>".$suggestion."</td>";
					echo "<td >".$rate."</td>";
					echo "<td><form action='view_suggestions.php' method='POST'>
						<input type='hidden' value='$id' name='sugId'>
						<input type='submit' class='btn btn-danger' value='Delete' name='delete'>
					</form></td>";
					echo "</tr>";
				}
			?>
		</table>
	</form>
	</div>
</div>        

<?php
    require ("../include/footer.php");
?>
<?php
$conn = null;
?>