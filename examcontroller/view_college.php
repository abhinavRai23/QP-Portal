<?php include '../include/secure_exam.php';
include '../include/header.php';
	
?>

<script type="text/javascript">
	function editcollege (id) {
		document.getElementById("name_"+id).innerHTML='<input class="form-control" type="text" name="name_'+id+'" value="'+(document.getElementById("name_"+id).innerHTML)+'">';
		document.getElementById("edit_"+id).innerHTML='<input class="btn btn-success" type="submit" value="Submit">';
	}
</script>
	<?php
		if(isset($_POST) && !empty($_POST))
		{
			$key = key($_POST);
			if($key[1]!='_') {next($_POST);$key = key($_POST);}
				$id = substr($key, 5);
				$name = htmlentities($_POST['name_'.$id]);

				if($obj->update_college($conn,$id,$name))
					echo '<script>alert("College edited successfully!");</script>';
				else
					echo '<script>alert("Error in editing college!");</script>';				
		}
	?>

<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%">
    List of College
</div>
<div class="panel-body" id="panel-body">
	<div class="table-responsive">
	<form method="POST">
		<table class='table table-striped table-bordered table-hover' id='subtable'>
			<thead>
				<tr>
					<td>S.No.</td>
					<td>College Id</td>
					<td>College Name</td>
					<td>Edit</td>
				</tr>
			</thead>

			<?php
				$count = 0;
				$headlist = $obj->get_colleges($conn);
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
					echo "<td id='edit_$collegeId'><button class='btn btn-warning' onclick='editcollege(\"".$collegeId."\");'>Edit</button></td>";
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