<?php
	require ("include/headerindex.php");
?>
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%;">
Suggestions and Feedback<br>
</div> 
<div class="panel-body" id="panel-body" align="center">
	<?php
		if(isset($_POST['submit'])) {
			$suggestion = htmlentities($_POST['suggestion']);
			$rate = htmlentities($_POST['rate']);
			
			if($obj->add_suggestion($conn, $suggestion, $rate)) {
				echo "<script>swal('Thank you for your precious suggestions');</script>";
			}
		}
	?>
	<h4 style="padding-bottom:2%;">Kindly enter your valuable suggestion or feedback regarding this portal</h4>
	
	<form action="suggestion.php" method="POST">
	

		<textarea name="suggestion" style="width:450px;height:180px;" placeholder="Add your valuable comments..." required></textarea>
		<hr style="width:800px;">
		<h4>How do you like this portal</h4>
		<table>
			<?php
				$i = 1;echo "<tr>";
				while($i<=10) {
					echo "<td style='padding:5px !important;'>$i</td>";
					$i++;
				}
				echo "</tr>";
				$i = 1;echo "<tr>";
				while($i<=10) {
					echo '<td style="padding:5px !important;"><input type="radio" name="rate" value="'.$i.'" required></td>';
					$i++;
				}
				echo "</tr>";
			?>
		</table>
		<hr style="width:800px;">
		
		<br><input type="submit" class="btn btn-success" value="Submit" name='submit'>
	</form>
	<!-- <hr style="width:800px;border:2px solid black;"> -->
</div>
<?php
	require ("include/footerindex.php");
?>

