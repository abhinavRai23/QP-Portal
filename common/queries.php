<?php
class Queries {

    public function paperSent($conn,$setId,$semester,$subject) {
        date_default_timezone_set('Asia/Calcutta');
        $sql = "UPDATE paper_pattern SET controller='1',sdate='".date("jS F, Y")."' WHERE setId=:setId AND sem=:semester AND subject=:subject";
        
        $run = $conn->prepare($sql);
        
        $run->bindParam(':setId', $setId);
        $run->bindParam(':semester', $semester);
        $run->bindParam(':subject', $subject);
        
        $run->execute();
        return $run->rowCount();
    }

    public function fetchQuestionSet($branch, $sem,$conn){
        $query2 = "SELECT subjectId FROM info_subject";
        if($branch!='All'){
            $query2.=" WHERE branchId=:branch";
        }
        if($sem!='all') {
            $sql="SELECT * FROM  paper_pattern WHERE sem=:sem AND controller='1' AND subject IN ($query2) ORDER BY sem,subject";
            $run = $conn->prepare($sql);
                $run->bindParam(':sem', $sem);
        }
        else {
         /* $sql="SELECT * FROM  paper_pattern, info_subject WHERE subject IN ($query2) AND controller='1' AND paper_pattern.subject=info_subject.subjectId  ORDER BY info_subject.branchId,sem,subject";*/
            $sql="SELECT * FROM  paper_pattern LEFT JOIN info_subject ON paper_pattern.subject = info_subject.subjectId WHERE paper_pattern.controller='1' AND subject IN ($query2) ORDER BY info_subject.branchId, sem, subject, setId";
            $run = $conn->prepare($sql);
        }
        if($branch!='All'){
               $run->bindParam(':branch', $branch);
         }
                $run->execute();
                return $run;


    }

    public function fetchQuestionSet_coor($branch, $sem,$conn){
        $query2 = "SELECT subjectId FROM info_subject";
        if($branch!='All'){
            $query2.=" WHERE branchId=:branch";
        }
        if($sem!='all') {
            $sql="SELECT * FROM  paper_pattern WHERE sem=:sem AND creater='0' AND subject IN ($query2) ORDER BY sem,subject";
            $run = $conn->prepare($sql);
                $run->bindParam(':sem', $sem);
        }
        else {
         $sql="SELECT * FROM  paper_pattern WHERE creater='0' AND subject IN ($query2) ORDER BY sem,subject";/*
            $sql="SELECT * FROM  paper_pattern LEFT JOIN info_subject ON paper_pattern.subject = info_subject.subjectId WHERE paper_pattern.creater='0' AND subject IN ($query2) ORDER BY info_subject.branchId, sem, subject, setId";*/
            $run = $conn->prepare($sql);
        }
        if($branch!='All'){
               $run->bindParam(':branch', $branch);
         }
                $run->execute();
                return $run;


    }

    public function fetchQuestionSet_student($branch, $sem,$conn){
        $query2 = "SELECT subjectId FROM info_subject";
        if($branch!='All'){
            $query2.=" WHERE branchId=:branch";
        }
        if($sem!='all') {
            $sql="SELECT * FROM  paper_pattern WHERE sem=:sem AND controller='1' AND student='1' AND subject IN ($query2) ORDER BY sem,subject";
            $run = $conn->prepare($sql);
                $run->bindParam(':sem', $sem);
        }
        else {
         /* $sql="SELECT * FROM  paper_pattern, info_subject WHERE subject IN ($query2) AND controller='1' AND paper_pattern.subject=info_subject.subjectId  ORDER BY info_subject.branchId,sem,subject";*/
            $sql="SELECT * FROM  paper_pattern LEFT JOIN info_subject ON paper_pattern.subject = info_subject.subjectId WHERE paper_pattern.controller='1' AND student='1' AND subject IN ($query2) ORDER BY info_subject.branchId, sem, subject, setId";
            $run = $conn->prepare($sql);
        }
        if($branch!='All'){
               $run->bindParam(':branch', $branch);
         }
                $run->execute();
                return $run;


    }



    public function get_paper_details($conn, $setId, $semester, $subject) {
        //echo $sql = "SELECT * FROM paper_pattern WHERE setId=$setId AND sem=$semester AND subject=$subject";
        $sql = "SELECT * FROM paper_pattern WHERE setId=:setId AND sem=:semester AND subject=:subject";
        
        $run = $conn->prepare($sql);
        
        $run->bindParam(':setId', $setId);
        $run->bindParam(':semester', $semester);
        $run->bindParam(':subject', $subject);

        $run->execute();
        //var_dump($run->fetch());
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
    }public function delete_college($conn,$id) {
        $sql = "DELETE FROM info_college WHERE collegeId=:id";
        $run = $conn->prepare($sql);
        $run->bindParam(':id', $id);
        if(!$run->execute()) return 0;
        $sql = "DELETE FROM collegeheads WHERE collegeId=:id";
        $run = $conn->prepare($sql);
        $run->bindParam(':id', $id);
        if(!$run->execute()) return 0;
        return 1;
    }
    public function delete_set($conn,$set,$sem,$sub) {
        $i=1;
        $sql = "DELETE FROM paper_pattern WHERE setId=:id AND subject=:sub AND sem=:sem";
        $run = $conn->prepare($sql);
        $run->bindParam(':id', $set);
        $run->bindParam(':sub', $sub);
        $run->bindParam(':sem', $sem);
        if(!$run->execute()) $i=0;
        $sql = "DELETE FROM question_set WHERE setId=:id AND semester=:sem AND subject=:sub";
        $run = $conn->prepare($sql);
        $run->bindParam(':id', $set);
        $run->bindParam(':sub', $sub);
        $run->bindParam(':sem', $sem);
        if(!$run->execute()) $i=0;
        return $i;
    }
    public function student_set($conn,$set,$sem,$sub,$allow) {
       
        $sql = "UPDATE paper_pattern SET student=:i WHERE setId=:id AND subject=:sub AND sem=:sem";
        $run = $conn->prepare($sql);
        $run->bindParam(':id', $set);
        $run->bindParam(':sub', $sub);
        $run->bindParam(':i', $allow);
        $run->bindParam(':sem', $sem);
        if($run->execute())
            return '1';
        return '0';
        
    }

    public function get_coord_email($conn, $subId) {
        $sql = "SELECT email, name FROM users WHERE id = ANY(SELECT userId FROM coordinators WHERE branchId = ANY(SELECT branchId FROM info_subject WHERE subjectId=:subId))";
        $run = $conn->prepare($sql);
        $run->bindParam(':subId', $subId);
        $run->execute();

        return $run;
    }
    public function update_college($conn,$id,$name) {
        $sql = "UPDATE info_college SET collegeName=:name WHERE collegeId=:id";
        $run = $conn->prepare($sql);
        $run->bindParam(':id', $id);
        $run->bindParam(':name', $name);
        if(!$run->execute()) return 0;
        return 1;
    }    
    public function update_branch($conn,$id,$name,$course) {
        $sql = "UPDATE info_branch SET branchName=:name,course=:course WHERE branchId=:id";
        $run = $conn->prepare($sql);
        $run->bindParam(':id', $id);
        $run->bindParam(':name', $name);
        $run->bindParam(':course', $course);
        if(!$run->execute()) return 0;
        return 1;
    }
    public function get_courseID($conn,$id) {
        $sql = "SELECT * FROM info_course WHERE courses=:id";
        $run = $conn->prepare($sql);
        $run->bindParam(':id',$id);
        $run->execute();
        return $run->fetch();
        }

    public function get_coursename($conn,$id) {
        $sql = "SELECT * FROM info_course WHERE courseId=:id";
        $run = $conn->prepare($sql);
        $run->bindParam(':id',$id);
        $run->execute();
        return $run->fetch();
        }


    public function get_ques($conn,$fac,$sub) {
        $sql = "SELECT * FROM questions WHERE faculty=:fac AND subject=:sub AND ques!='' AND ans!='' ORDER BY section ASC,type DESC";
        $run = $conn->prepare($sql);
        $run->bindParam(':fac', $fac);
        $run->bindParam(':sub', $sub);
        $run->execute();
        return $run;
    }

    public function count_ques_in_QB($conn,$sub) {
        $sql = "SELECT COUNT(*) FROM questions WHERE subject=:sub AND ques!='' AND ans!='' AND QB='1' ORDER BY section ASC,type DESC";
        $run = $conn->prepare($sql);
        $run->bindParam(':sub', $sub);
        $run->execute();
        return $run;
    }

    
    public function update_ques_by_id($conn,$id,$ques,$ans) {
        $sql = "UPDATE questions SET ques=:ques, ans=:ans WHERE id=:id";
        $run = $conn->prepare($sql);
        $run->bindParam(':id', $id);
        $run->bindParam(':ques', $ques);
        $run->bindParam(':ans', $ans);
        if($run->execute())
        return 1;
        else
            return 0;
    }

    public function get_ques_by_id($conn,$id) {
        $sql = "SELECT * FROM questions WHERE id=:id";
        $run = $conn->prepare($sql);
        $run->bindParam(':id', $id);
        $run->execute();
        return $run;
    }
    public function get_s_ques_by_id($conn,$id) {
        $sql = "SELECT * FROM question_set WHERE id=:id";
        $run = $conn->prepare($sql);
        $run->bindParam(':id', $id);
        $run->execute();
        return $run;
    }
   
	// $conn = new mysqli_connect();
	public function loginfaculty($conn,$email,$pass) {
		$sql = "SELECT password, id, userdef FROM users WHERE email=:email";
		$run = $conn->prepare($sql);
		$run->bindParam(':email', $email);
		$run->execute();
		$p = $run->fetch();
        $id = $p['id'];
        $userdef = $p['userdef'];
        $p = $p['password'];
        if(empty($email) || empty($pass)){
        	echo "<script>swal('Empty','Please fill all the details', 'warning')</script>";
        	return '0';
        }
        if($p==md5($pass)){
        	session_start();
        	$_SESSION['id'] = $id;
            $_SESSION['userdef'] = $userdef;
        	$_SESSION['msg'] = 1;
            header('location:home.php');
        }
        else{
        	echo "<script>swal('Wrong Password', 'Please enter correct password', 'error');</script>";
        }
	}

    public function add_suggestion($conn, $suggestion, $rate) {
        $sql = $conn->prepare("INSERT INTO suggestions (suggestion, rate) VALUES (:sug, :rate)");
        $sql->bindParam(':sug', $suggestion);
        $sql->bindParam(':rate', $rate);

        if($sql->execute()) return 1;
        else return 0;
    }

    public function delete_suggestion($conn, $sugId) {
        $sql = $conn->prepare("DELETE FROM suggestions WHERE id=:sug");
        $sql->bindParam(':sug', $sugId);

        $sql->execute();
        return $sql;
    }    

    public function get_suggestions($conn) {
        $sql = "SELECT * FROM suggestions";
        $run = $conn->prepare($sql);
        $run->execute();
        return $run;
    }


    public function logincollege($conn,$cid,$pass) {
        $sql = "SELECT * FROM collegeheads WHERE emailId=:cid";
        $run = $conn->prepare($sql);
        $run->bindParam(':cid', $cid);
        $run->execute();
        $p = $run->fetch();
        $id = $p['collegeId'];
        $pwd = $p['password'];
        $rpwd = $p['rpassword'];

        if(empty($cid) || empty($pass)){
            echo "<script>swal('Empty','Please fill all the details', 'warning')</script>";
            return '0';
        }
        if($pwd==md5($pass)){
            session_start();
            $_SESSION['id']=$id;
            $_SESSION['userdef'] = 2;
            $_SESSION['msg'] = 1;
            header('location:collegehead/index.php');            
        }
        elseif($rpwd==md5($pass)){
            session_start();
            $_SESSION['id']=$id;
            $_SESSION['userdef'] = 5;
            header('location:collegehead/homepcollege.php');            
        }
        else{
            echo "<script>swal('Wrong Password', 'Please enter correct password', 'error');</script>";
        }
    }


	public function get_user_details($conn,$id) {
		$sql = "SELECT * FROM users WHERE id=:id";
		$run = $conn->prepare($sql);
		$run->bindParam(':id', $id);
		$run->execute();
		$p = $run->fetch();
        return $p;
	}

    public function get_collegehead_details($conn, $id) {
        $sql = $conn->prepare("SELECT * FROM collegeheads WHERE collegeId=:id");
        $sql->bindParam(':id', $id);

        $sql->execute();
        $res = $sql->fetch();
        return $res;
    }

	public function get_colleges($conn) {
		$sql = "SELECT DISTINCT(collegeId),collegeName FROM info_college ORDER BY collegeName";
		$run = $conn->prepare($sql);
		$run->execute();
        return $run;
	}

    public function get_colleges_h($conn) {
        $sql = "SELECT * FROM info_college WHERE NOT EXISTS (Select collegeId FROM collegeheads WHERE info_college.collegeId = collegeheads.collegeId) ";
        $run = $conn->prepare($sql);
        $run->execute();
        return $run;
    }

    public function get_branches($conn) {
        $sql = "SELECT * FROM info_branch ORDER BY branchName";
        $run = $conn->prepare($sql);
        $run->execute();
        return $run;
        }
    public function get_branch_clg($conn,$id) {
        $sql = "SELECT * FROM info_college WHERE collegeId=:id ORDER BY branchId";
        $run = $conn->prepare($sql);
        $run->bindParam(':id', $id);
        $run->execute();
        return $run;
        }
	public function insert_user_subjects($conn,$id,$subject) {
		$sql = "INSERT INTO subjects (userId, subjectId, confirm) VALUES (:userId, :subjectId, '0')";
		$run = $conn->prepare($sql);
		foreach ($subject as  $sub) {
			$run->bindParam(':userId', $id);
			$run->bindParam(':subjectId', $sub);
			$run->execute();
			}
		return 'true';
		}
	public function get_subjects_by_branch($conn,$branch) {
		$sql = "SELECT * FROM info_subject WHERE branchId=:branch ORDER BY subjectName";
		$run = $conn->prepare($sql);
		$run->bindParam(':branch',$branch);
		$run->execute();
		return $run;
		}
    public function get_subjects_by_branch_order_sem($conn,$branch) {
        $sql = "SELECT * FROM info_subject WHERE branchId=:branch ORDER BY semester";
        $run = $conn->prepare($sql);
        $run->bindParam(':branch',$branch);
        $run->execute();
        return $run;
        }


    public function get_subjects_by_branch_sem($conn, $bid, $sem) {
        $sql = "SELECT * FROM info_subject WHERE branchId=:branch AND semester=:sem ORDER BY subjectName";
        $run = $conn->prepare($sql);
        $run->bindParam(':branch',$bid);
        $run->bindParam(':sem', $sem);
        $run->execute();
        return $run;
        }

	public function get_max_user_id($conn) {
		$sql = "SELECT MAX(id) FROM users";
		$run = $conn->prepare($sql);
		$run->execute();
		$p = $run->fetch();
		return $p[0];
		}
	public function get_courses($conn) {
		$sql = "SELECT * FROM info_course ORDER BY courses";
		$run = $conn->prepare($sql);
		$run->execute();
		return $run;
		}

	public function insert_new_user($conn,$user){
        $id = $user['id'];
        $collegeId = $user['collegeId'];
        $dept_code=$user['dept_code'];
        $name=$user['name'];
        $fathername=$user['fathername'];
        $dob=$user['dob'];
        $gender=$user['gender'];
        $designation=$user['designation'];
        $qualification=$user['qualification'];
        $teach_exp=$user['teach_exp'];
        $industrial_exp=$user['industrial_exp'];
        $mobile_no=$user['mobile_no'];
        $email=$user['email'];
        $password=$user['password'];
        $address=$user['address'];
        $state=$user['state'];
        $district=$user['district'];
        $pincode=$user['pincode'];
        $userdef=$user['userdef'];  
 
	$stmt = $conn->prepare("INSERT INTO users (id, collegeId,dept_code,name,fathername, dob, gender, designation, qualification, teach_exp, industrial_exp, mobile_no, email, password, address, state, district, pincode, userdef) 
    VALUES (:id, :collegeId, :dept_code, :name, :fathername, :dob, :gender, :designation, :qualification, :teach_exp, :industrial_exp, :mobile_no, :email, :password, :address, :state, :district, :pincode, :userdef)");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':collegeId', $collegeId);
    $stmt->bindParam(':dept_code', $dept_code);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':fathername', $fathername);
    $stmt->bindParam(':dob', $dob);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':designation', $designation);
    $stmt->bindParam(':qualification', $qualification);
    $stmt->bindParam(':teach_exp', $teach_exp);
    $stmt->bindParam(':industrial_exp', $industrial_exp);
    $stmt->bindParam(':mobile_no', $mobile_no);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':state', $state);
    $stmt->bindParam(':district', $district);
    $stmt->bindParam(':pincode', $pincode);
    $stmt->bindParam(':userdef', $userdef);
    if($stmt->execute())
    	return '1';
    else
    	return '0';
    }

    public function update_faculty_details($conn,$user){
        $id = $user['id'];
        $dept_code=$user['dept_code'];
        $name=$user['name'];
        $fathername=$user['fathername'];
        $dob=$user['dob'];
        $gender=$user['gender'];
        $designation=$user['designation'];
        $qualification=$user['qualification'];
        $teach_exp=$user['teach_exp'];
        $industrial_exp=$user['industrial_exp'];
        $mobile_no=$user['mobile_no'];
        $email=$user['email'];
        $address=$user['address'];
        $state=$user['state'];
        $district=$user['district'];
        $pincode=$user['pincode'];
 
    $stmt = $conn->prepare("UPDATE users SET dept_code = :dept_code, name = :name, fathername = :fathername, dob = :dob, gender=:gender, designation=:designation, qualification=:qualification, teach_exp=:teach_exp, industrial_exp=:industrial_exp, mobile_no=:mobile_no, email=:email, address=:address, state=:state, district=:district, pincode=:pincode WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':dept_code', $dept_code);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':fathername', $fathername);
    $stmt->bindParam(':dob', $dob);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':designation', $designation);
    $stmt->bindParam(':qualification', $qualification);
    $stmt->bindParam(':teach_exp', $teach_exp);
    $stmt->bindParam(':industrial_exp', $industrial_exp);
    $stmt->bindParam(':mobile_no', $mobile_no);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':state', $state);
    $stmt->bindParam(':district', $district);
    $stmt->bindParam(':pincode', $pincode);
    if($stmt->execute())
        return '1';
    else
        return '0';
    }

    public function get_college_id($conn, $id) {
        $sql = $conn->prepare("SELECT collegeId FROM users WHERE id = :id");
        $sql->bindParam(':id', $id);
        
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        $collegeId = $result["collegeId"];
        return $collegeId;
    }

    public function get_college_name($conn, $id) {
        $sql = $conn->prepare("SELECT collegeName FROM info_college WHERE collegeId = :id");
        $sql->bindParam(':id', $id);
        
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        $collegeName = $result["collegeName"];
        return $collegeName;
    }
    
    public function get_branch_faculties($conn, $collegeId, $branchId) {
        $sql = $conn->prepare("SELECT * FROM users WHERE collegeId = :collegeId AND dept_code = :branchId");
        $sql->bindParam(':collegeId', $collegeId);
        $sql->bindParam(':branchId', $branchId);
        
        $sql->execute();
        return $sql;
    }
    
    public function get_subject_list_faculty_sem($conn, $facultyid, $semester) {
       $notviewed = '0';
        $sql = $conn->prepare("SELECT * FROM info_subject 
                        WHERE semester = :semester AND subjectId IN(
                            SELECT subjectId FROM subjects WHERE userId = :userId AND confirm = :confirm
                        ) ORDER BY subjectName");
        $sql->bindParam(':userId', $facultyid);
        $sql->bindParam(':confirm', $notviewed);
        $sql->bindParam(':semester', $semester);       
        $sql->execute();
        return $sql;
    }

    public function get_subject_list_faculty($conn, $facultyid) {
       $notviewed = '0';
        $sql = $conn->prepare("SELECT * FROM info_subject 
                        WHERE subjectId IN(
                            SELECT subjectId FROM subjects WHERE userId = :userId AND confirm = :confirm
                        ) ORDER BY subjectName");
        $sql->bindParam(':userId', $facultyid);
        $sql->bindParam(':confirm', $notviewed);    
        $sql->execute();
        return $sql;
    }

    public function get_subject_list_faculty_all($conn, $facultyid, $semester) {
        if($semester == 0)
            $sql = $conn->prepare("SELECT * FROM info_subject 
                        WHERE subjectId IN(
                            SELECT subjectId FROM subjects WHERE userId = :userId ) ORDER BY subjectName");
        else    
            $sql = $conn->prepare("SELECT * FROM info_subject 
                        WHERE semester = :semester AND subjectId IN(
                            SELECT subjectId FROM subjects WHERE userId = :userId ) ORDER BY subjectName");
        $sql->bindParam(':userId', $facultyid);
        if($semester != 0)
            $sql->bindParam(':semester', $semester);       
        $sql->execute();
        
        return $sql;
    }

    public function delete_faculty_subject($conn, $facId, $subId) {
        $sql = "DELETE FROM subjects WHERE userId=:userId AND subjectId=:subjectId";
        $run = $conn->prepare($sql);

        $run->bindParam(':userId', $facId);
        $run->bindParam(':subjectId', $subId);

        $run->execute();
    }

    public function get_approval_status($conn, $facultyId, $subjectId) {
        $sql = $conn->prepare("SELECT confirm FROM subjects WHERE userId = :facultyId AND subjectId =:subjectId");
        $sql->bindParam(":facultyId", $facultyId);
        $sql->bindParam(":subjectId", $subjectId);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        $status = $result['confirm'];
        return $status;
    }
    public function get_facuty_experience($conn, $facultyId, $subjectId) {
        $sql = $conn->prepare("SELECT experience FROM subjects WHERE userId = :facultyId AND subjectId =:subjectId");
        $sql->bindParam(":facultyId", $facultyId);
        $sql->bindParam(":subjectId", $subjectId);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        $status = $result['experience'];
        return $status;
    }
// end  
    public function get_branchname($conn, $branchId) {
        $sql = $conn->prepare("SELECT branchName FROM info_branch WHERE branchId = :branchId");
        $sql->bindParam(':branchId', $branchId);
        
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        $branchName = $result["branchName"];
        return $branchName;
    }
    public function get_branch_by_c($conn, $courseId) {
        $sql = $conn->prepare("SELECT * FROM info_branch WHERE course = :branchId");
        $sql->bindParam(':branchId', $courseId);
        
        $sql->execute();
        return $sql;
    }
    
    public function update_approval($conn, $facultyId, $subjectId, $confirm) {
        $sql = "UPDATE subjects SET confirm = :confirm WHERE userId = :facultyId AND subjectId = :subjectId ";
        $result = $conn->prepare($sql);
        $result->bindParam(':confirm', $confirm);
        $result->bindParam(':facultyId', $facultyId);
        $result->bindParam(':subjectId', $subjectId);
        $result->execute();
    }

    public function get_college_by_id($conn,$id) {
		$sql = "SELECT * FROM info_college WHERE collegeId=:id";
		$run = $conn->prepare($sql);
		$run->bindParam(':id', $id);
		$run->execute();
        return $run;
	}
	public function get_dpt_by_id($conn,$id) {
		$sql = "SELECT * FROM info_branch WHERE branchId=:id";
		$run = $conn->prepare($sql);
		$run->bindParam(':id', $id);
		$run->execute();
        return $run;
	}
	public function get_users($conn) {
		$sql = "SELECT * FROM users";
		$run = $conn->prepare($sql);
		$run->execute();
        return $run;
	}

    public function allowed_edit_faculty($conn) {
        $setting = 'faculty_edit';
        $sql = $conn->prepare("SELECT value FROM allowed WHERE setting=:setting");
        $sql->bindParam(':setting', $setting);
        $sql->execute();

        $row = $sql->fetch();
        $a = $row['value'];
        return $a;
    }

    public function allowed_upload($conn) {
        $setting = 'upload';
        $sql = $conn->prepare("SELECT value FROM allowed WHERE setting=:setting");
        $sql->bindParam(':setting', $setting);
        $sql->execute();

        $row = $sql->fetch();
        $a = $row['value'];
        return $a;
    }

    public function set_upload_status($conn,$stat) {
        $setting = 'upload';
        $sql = $conn->prepare("UPDATE allowed SET value=:value WHERE setting=:setting");
        $sql->bindParam(':setting', $setting);
        $sql->bindParam(':value', $stat);
        $sql->execute();

        return $sql;
    }

    public function get_counter($conn) {
        $setting = 'counter';
        $sql = $conn->prepare("SELECT * FROM allowed WHERE setting=:setting");
        $sql->bindParam(':setting', $setting);
        $sql->execute();
        return $sql;
    }

    public function add_subject_infoSubject($conn,$branch,$sub,$subCode,$sem) {
        $sql = "INSERT INTO info_subject (branchId, subjectId, subjectName, semester) VALUES (:branch, :subjectId, :sub, :sem) ON DUPLICATE KEY UPDATE branchId=VALUES(branchId), subjectId=VALUES(subjectId), subjectName=VALUES(subjectName) , semester=VALUES(semester)";
        $run = $conn->prepare($sql);
            $run->bindParam(':branch', $branch);
            $run->bindParam(':subjectId', $subCode);
            $run->bindParam(':sub', $sub);
            $run->bindParam(':sem', $sem);
        if($run->execute())
        return '1';
        else
            return '0';
        }
    

    public function check_subject_infoSubject($conn,$branch,$subCode,$sem) {
        $sql = "SELECT COUNT(*) FROM info_subject WHERE branchId=:branch AND subjectId=:sub AND semester=:sem";
        $run = $conn->prepare($sql);
        $run->bindParam(':branch', $branch);
        $run->bindParam(':sub', $subCode);
        $run->bindParam(':sem', $sem);
        $run->execute();
        $p = $run->fetch();
        $p = $p[0];
        return $p;
    }

    public function get_assigned_branches($conn) {
        $sql = "SELECT branchId FROM coordinators";
        $run = $conn->prepare($sql);
        $run->execute();

        return $run;
    }

    public function get_faculty_by_branch($conn, $cid, $bid) {
        $sql = "SELECT id, name FROM users WHERE collegeId = :cid AND dept_code = :bid";
        $run = $conn->prepare($sql);

        $run->bindParam(':cid', $cid);
        $run->bindParam(':bid', $bid);
        $run->execute();

        return $run;
    }

    public function addHead($conn, $cid, $cname, $cemail, $cpass, $rpass) {
        $sql = "INSERT INTO collegeheads (collegeId, name, emailId, password, rpassword) VALUES (:cid, :cname, :cemail, :cpass, :rpass)";
        $res = $conn->prepare($sql);
        $res->bindParam(':cid', $cid);
        $res->bindParam(':cemail', $cemail);
        $res->bindParam(':cpass', $cpass);
        $res->bindParam(':rpass', $rpass);
        $res->bindParam(':cname', $cname);

        $res->execute();
        return $res;
    }

    public function get_headdetails($conn) {
        $sql = "SELECT collegeheads.collegeId, collegeheads.name, collegeheads.emailId, info_college.collegeName FROM collegeheads LEFT JOIN info_college ON collegeheads.collegeId = info_college.collegeId";
        $res  = $conn->prepare($sql);

        $res->execute();

        return $res;
    }

    public function delete_collegehead($conn, $cid) {
        $sql = $conn->prepare("DELETE FROM collegeheads WHERE collegeId=:cid");
        $sql->bindParam(':cid', $cid);

        $sql->execute();
    }
    public function get_assigned_branches_by_id($conn,$id) {
        $sql = "SELECT branchId FROM coordinators WHERE userId= :id";
        $run = $conn->prepare($sql);
        $run->bindParam(':id', $id);
        $run->execute();
        return $run;
    }

    public function add_branch($conn, $bid, $bname) {
        $sql = $conn->prepare("INSERT INTO info_branch (branchId, branchName) VALUES (:bid, :bname)");
        $sql->bindParam(':bid', $bid);
        $sql->bindParam(':bname', $bname);

        $sql->execute();
        return $sql;
    }

    public function upload_branch($conn, $bid, $bname, $course) {
        $sql = $conn->prepare("INSERT INTO info_branch (branchId, branchName, course) VALUES (:bid, :bname, :course)");
        $sql->bindParam(':bid', $bid);
        $sql->bindParam(':bname', $bname);
        $sql->bindParam(':course', $course);

        $sql->execute();
        return $sql;
    }

    public function get_faculty_subjects($conn,$id) {
        $sql = "SELECT * FROM subjects WHERE userId=:id";
        $run = $conn->prepare($sql);
        $run->bindParam(':id', $id);
        $run->execute();
        return $run;
    }
    public function get_subjects_by_id($conn,$id) {
        $sql = "SELECT * FROM info_subject WHERE subjectId=:subject ORDER BY subjectName";
        $run = $conn->prepare($sql);
        $run->bindParam(':subject',$id);
        $run->execute();
        return $run;
        }

    public function coord_check($conn,$id,$sub) {
        //echo "SELECT COUNT(*) FROM subjects WHERE subjectId=$sub AND userId=$id AND confirm='1' AND coordinator='0'";
        
        $sql = "SELECT COUNT(*) FROM subjects WHERE subjectId=:subject AND userId=:id AND confirm='1' AND coordinator='0'";
        $run = $conn->prepare($sql);
        $run->bindParam(':subject',$sub);
        $run->bindParam(':id',$id);
        $run->execute();
        return $run;
        }

    
    public function addCoord($conn, $cid, $cname, $cemail, $cdesig, $cpass) {
        $userdef = 1;
        $sql = "INSERT INTO users (collegeId, password, name, designation, email, userdef) VALUES (:cid, :cpass, :cname, :cdesig, :cemail, :userdef)";
        $res = $conn->prepare($sql);
        $res->bindParam(':cid', $cid);
        $res->bindParam(':cpass', $cpass);
        $res->bindParam(':cname', $cname);
        $res->bindParam(':cdesig', $cdesig);
        $res->bindParam(':cemail', $cemail);
        $res->bindParam(':userdef', $userdef);

        $res->execute();
        return $res;
    }

    public function allot_coord($conn, $uid, $bid) {
        $sql = $conn->prepare("INSERT INTO coordinators (userId, branchId) VALUES (:uid, :bid)");
        $sql->bindParam(':uid', $uid);
        $sql->bindParam(':bid', $bid);

        $sql->execute();
        return $sql;
    }

    public function get_Coord($conn) {
        $userdef = 1;
        $sql = "SELECT * FROM users WHERE userdef = :userdef";
        $res = $conn->prepare($sql);

        $res->bindParam(':userdef', $userdef);
        $res->execute();

        return $res;
    }

    public function get_alloted($conn, $id) {
        $sql = $conn->prepare('SELECT info_branch.branchId, info_branch.branchName FROM info_branch RIGHT JOIN coordinators ON coordinators.branchId = info_branch.branchId WHERE coordinators.userId = :id ');
        $sql->bindParam(':id', $id);

        $sql->execute();
        return $sql;
    }

    public function add_college($conn, $cid, $cname) {
        $sql = $conn->prepare("INSERT INTO info_college (collegeId, collegeName) VALUES (:cid, :cname)");
        $sql->bindParam(':cid', $cid);
        $sql->bindParam(':cname', $cname);

        $sql->execute();
        return $sql;        
    }

    public function deletebranch($conn, $cid, $bid) {
        $sql = $conn->prepare("DELETE FROM coordinators WHERE userId=:cid AND branchId=:bid");
        $sql->bindParam(':cid', $cid);
        $sql->bindParam(':bid', $bid);
        $sql->execute();

    }
    public function delete_user($conn, $cid) {
        $sql = $conn->prepare("DELETE FROM users WHERE id=:cid");
        $sql->bindParam(':cid', $cid);
        $sql->execute();

        $sql = $conn->prepare("DELETE FROM coordinators WHERE userId=:cid");
        $sql->bindParam(':cid', $cid);
        $sql->execute();
    }

    public function get_user_details_by_mail($conn,$mail) {
        $sql = "SELECT COUNT(*) FROM users WHERE email=:id";
        $run = $conn->prepare($sql);
        $run->bindParam(':id', $mail);
        $run->execute();
        $sql1 = "SELECT COUNT(*) FROM collegeheads WHERE emailId=:id";
        $run1 = $conn->prepare($sql1);
        $run1->bindParam(':id', $mail);
        $run1->execute();

        if($run1->fetchColumn()>0)
        {
            $sql = "SELECT * FROM collegeheads WHERE emailId=:id";
            $run = $conn->prepare($sql);
            $run->bindParam(':id', $mail);
            $run->execute();
            return ($run->fetch());
        }
        elseif($run->fetchColumn()>0)
        {
            $sql = "SELECT * FROM users WHERE email=:id";
            $run = $conn->prepare($sql);
            $run->bindParam(':id', $mail);
            $run->execute();
            return ($run->fetch());
        }

        return 0;
    }

    public function get_confirm_code($conn,$email) {
        $sql = "SELECT * FROM confirm WHERE email=:email";
        $run = $conn->prepare($sql);
        $run->bindParam(':email',$email);
        $run->execute();
        return $run;
        }
    public function insert_confirm_code($conn,$id,$code,$type) {
        //$sql = "INSERT INTO confirm (email, code, type) VALUES (:email, :code, :type)";
        $sql = "INSERT INTO confirm (email, code, type) VALUES (:email, :code, :type) ON DUPLICATE KEY UPDATE code=VALUES(code), type=VALUES(type)";
        $run = $conn->prepare($sql);
        $run->bindParam(':email', $id);
        $run->bindParam(':code', $code);
        $run->bindParam(':type', $type);
        if($run->execute())        
            return 1;
        else
            return 0;
        }
    public function update_password($conn,$id,$pass1,$pass2=0) {
        if($pass2)
        {
            $sql = "UPDATE collegeheads SET password=:pass1,rpassword=:pass2 WHERE emailId=:email";
            $run = $conn->prepare($sql);
            $run->bindParam(':email', $id);
            $run->bindParam(':pass1', $pass1);
            $run->bindParam(':pass2', $pass2);
            if($run->execute())
            return 1;
        }
        else
        {
            $sql = "UPDATE users SET password=:pass1 WHERE email=:email";
            $run = $conn->prepare($sql);
            $run->bindParam(':email', $id);
            $run->bindParam(':pass1', $pass1);
            if($run->execute())
            return 1;
        }
        return 0;            
        }

    public function delete_confirm($conn, $email) {
        $sql = "DELETE FROM confirm WHERE email=:email";
        $run = $conn->prepare($sql);
        $run->bindParam(':email', $email);
        $run->execute();
    }

    public function set_edit_status($conn, $status) {
        $setting = 'faculty_edit';
        $sql = $conn->prepare("UPDATE allowed SET value=:status WHERE setting=:setting");
        $sql->bindParam(':status', $status);
        $sql->bindParam(':setting', $setting);

        $sql->execute();

        return $sql;
    }

    public function update_counter_add_sub($conn,$value,$add_sub) {
                                $setting = 'counter';
                                $sql = $conn->prepare("UPDATE allowed SET value=:value WHERE setting=:setting");
                                $sql->bindParam(':setting', $setting);
                                if($add_sub=='add'){
                                    $value++;
                                }
                                else if($add_sub=='sub'){
                                    $value--;
                                }
                                $sql->bindParam(':value', $value);
                                if($sql->execute())
                                    return '1';
                                else
                                    return '0';
                            }

    public function get_subject_experience($conn, $userId, $subId) {
        $sql = "SELECT experience FROM subjects WHERE userId=:userid AND subjectId = :subId";
        $run = $conn->prepare($sql);
        $run->bindParam(':userid', $userId);
        $run->bindParam(':subId', $subId);
        $run->execute();

        return $run;
    }

    public function get_faculty_by_subject($conn, $subjectId) {
        $sql = "SELECT id, name FROM users WHERE id IN ( SELECT userId FROM subjects WHERE subjectId=:subjectId)";
        $run = $conn->prepare($sql);

        $run->bindParam(':subjectId', $subjectId);
        $run->execute();

        return $run;
    }
    public function update_subject_name($conn, $bid, $sid, $sname) {
        $sql = "UPDATE info_subject SET subjectName=:sname WHERE branchId=:bid AND subjectId=:sid";
        $run = $conn->prepare($sql);

        $run->bindParam(':sname', $sname);
        $run->bindParam(':sid', $sid);
        $run->bindParam(':bid', $bid);

        if($run->execute()) return 1;
        else return 0;
    }

    public function deletesubject($conn, $sid, $bid, $i) {
       
       
        $sql = "UPDATE info_subject SET active=:active WHERE branchId=:bid AND subjectId=:sid";
        $run = $conn->prepare($sql);

        $run->bindParam(':active', $i);
        $run->bindParam(':sid', $sid);
        $run->bindParam(':bid', $bid);

        $run->execute();
    }

    public function get_active_subject($conn, $bid, $sid) {
        $sql = "SELECT active FROM info_subject WHERE branchId=:bid AND subjectId=:sid";
        $run = $conn->prepare($sql);

        $run->bindParam(':sid', $sid);
        $run->bindParam(':bid', $bid);
        $run->execute();
        return ($run);   
    }

    public function get_technical_details($conn, $userid) {
        $sql = "SELECT * FROM user_technical WHERE userId=:uid AND type=:type";
        $run = $conn->prepare($sql);
        $type = 'T';
        $run->bindParam(':uid', $userid);
        $run->bindParam(':type', $type);
        $run->execute();
        return ($run);   
    }

    public function get_additional_details($conn, $userid) {
        $sql = "SELECT * FROM user_technical WHERE userId=:uid AND type=:type";
        $run = $conn->prepare($sql);
        $type = 'R';
        $run->bindParam(':uid', $userid);
        $run->bindParam(':type', $type);
        $run->execute();
        return ($run);   
    }

    public function update_coord_details($conn,$user){
        $id = $user['id'];
        $name=$user['name'];
        $designation=$user['designation'];
        $email=$user['email'];
        
    $stmt = $conn->prepare("UPDATE users SET name = :name, designation=:designation, email=:email WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':designation', $designation);
    $stmt->bindParam(':email', $email);
    if($stmt->execute())
        return '1';
    else
        return '0';
    }

    public function update_examc_details($conn,$user){
        $id = $user['id'];
        $name=$user['name'];
        $email=$user['email'];
        
    $stmt = $conn->prepare("UPDATE users SET name = :name, email=:email WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    if($stmt->execute())
        return '1';
    else
        return '0';
    }

    public function uploadpdf($conn, $pdf) {
        $sql = "INSERT INTO uploadpdf (fileid , uploader , branchId, semester, subjectId, fileformat , uploadedon) VALUES (:filename , :uploader, :branchId, :semester, :subjectId, :fileformat , :time)";

        $run = $conn->prepare($sql);
        $run->bindParam(':filename', $pdf['filename']);
        $run->bindParam(':uploader', $pdf['uploader']);
        $run->bindParam(':semester', $pdf['semester']);
        $run->bindParam(':subjectId', $pdf['subjectId']);
        $run->bindParam(':branchId', $pdf['branchId']);
        $run->bindParam(':fileformat', $pdf['fileformat']);
        $run->bindParam(':time', $pdf['time']);

        $run->execute();
        return $run;
    }

    public function get_pdf_fileformat($conn, $fileid) {
        $sql = "SELECT fileformat FROM uploadpdf WHERE fileid = :fileid ";
        $run = $conn->prepare($sql);
        $run->bindParam(':fileid', $fileid);
        $run->execute();
        return $run;
    }


    public function delete_pdf($conn, $fileid) {
        $sql = "DELETE FROM uploadpdf WHERE fileid=:fileid ";
        $run = $conn->prepare($sql);
        $run->bindParam(':fileid', $fileid);
        $run->execute();

        return $run;
    }

    public function view_pdf($conn, $branchId, $semester, $subjectId) {
        if($semester!= 'ALL') {
            $sql = "SELECT * FROM uploadpdf WHERE branchId=:branchId AND semester=:semester AND subjectId=:subjectId";
            $run = $conn->prepare($sql);
            $run->bindParam(':semester', $semester);
        }
        else {
            $sql = "SELECT * FROM uploadpdf WHERE branchId=:branchId AND subjectId=:subjectId";
            $run = $conn->prepare($sql);            
        }
        $run->bindParam(':branchId', $branchId);
        
        $run->bindParam(':subjectId', $subjectId);
        $run->execute();

        return $run;
    }

    public function view_pdf_branch($conn, $bid) {
            $sql = "SELECT * FROM uploadpdf LEFT JOIN info_subject ON uploadpdf.subjectId = info_subject.subjectId WHERE uploadpdf.branchId=:branchId ORDER BY uploadpdf.semester, info_subject.subjectName";
           

            $run = $conn->prepare($sql);            
        
        $run->bindParam(':branchId', $bid);
        $run->execute();
        return $run;
    }
}
?>