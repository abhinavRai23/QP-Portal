<?php
class Queries {
	public function get_paper_details($conn, $setId, $semester, $subject) {
		$sql = "SELECT * FROM paper_pattern WHERE setId=:setId AND sem=:semester AND subject=:subject";
		
		$run = $conn->prepare($sql);
		
		$run->bindParam(':setId', $setId);
		$run->bindParam(':semester', $semester);
		$run->bindParam(':subject', $subject);

		$run->execute();
		return $run;
	}

	public function get_question_answer($conn, $setId, $semester, $subject, $section) {
		//echo "SELECT ques FROM question_set WHERE setId=$setId AND semester=$semester AND subject=$subject AND section=$section ORDER BY type DESC, num ASC";
		//die();
		$sql = "SELECT ques FROM question_set WHERE setId=:setId AND semester=:semester AND subject=:subject AND section=:section ORDER BY type DESC, num ASC";
		$run = $conn->prepare($sql);
		$run->bindParam(':setId', $setId);
		$run->bindParam(':semester', $semester);
		$run->bindParam(':subject', $subject);
		$run->bindParam(':section', $section);

		$run->execute();
		return $run;
	}
}

?>