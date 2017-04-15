<?php
require_once 'common/connectionPDO.php';
	require ("include/headerindex.php");
	$obj = new Queries();
?>

<?php

if(isset($_POST['registerNew'])) {
$target_dir = "fimages/";
$new_name=md5($_POST['name'].time());
$imageFileType = pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION);
$target_file = $target_dir . $new_name.'.'.$imageFileType;
$uploadOk = 1;
// Check if image file is a actual image or fake image


// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
/*...............PERSONAL DETAILS..................*/
	$collegeId = htmlentities($_POST['collegeId']);
	$image=htmlentities($new_name.'.'.$imageFileType);
	$deptId = htmlentities($_POST['deptId']);
	$name = htmlentities($_POST['name']);
	$designation = htmlentities($_POST['designation']);
	$teachingExperienceYear = htmlentities($_POST['teachingExperienceYear']);
	$industrialExperienceYear = htmlentities($_POST['industrialExperienceYear']);
	$phone = htmlentities($_POST['phone']);
	$email = htmlentities($_POST['email']);
	$confirmEmail = htmlentities($_POST['confirmmail']);
	$mister1 = htmlentities($_POST['mister1']);/*what is this*/
	$nameOfBank=htmlentities($_POST['nameOfBank']);
	$nameInBank=htmlentities($_POST['nameInBank']);
	$accountNo=htmlentities($_POST['accountNo']);
   $ifsc=htmlentities($_POST['ifsc']);

/*......TECHNICAL AND PROFFESSIONAL DETAILS.............*/
if(isset($_POST['degree'])){
$degree=$_POST['degree'];
$time=$_POST['time'];
 ///"time=".$_POST['time'];
$institution=$_POST['institution'];
$university=$_POST['university'];
 $passingyr=$_POST['passingyr'];
 $branchSpeci=$_POST['branchSpeci'];
//$percent=$_POST['percent'];  /*MAKE ITS VALUE ZERO FOR NOW */ 
}
 /*......ANY OTHER QUALIFICATIONS .............*/
 $course=$_POST['course'];
 $duration=$_POST['duration'];
 $trainIns=$_POST['trainIns'];
 $detailOfTrai=$_POST['detailOfTrai'];

$password=substr(sha1(time()), 0,8);
       $receiverName = $name;
		$receiverMail = $email;

        $subject = "Registration Successful";

        $message = 'Hello '.$receiverName.",<br><br>APJAKTU Model Question Paper Portal Registration Successful!<br><br><b>Your User ID:</b> ".$receiverMail."<br><b>Your password:</b> ".$password."<br><br>You can change password after logging in.<br><br>APJAKTU";

        require("mailer/class.phpmailer.php");

        $mail = new PHPMailer();

        $mail->IsSMTP();                                      // set mailer to use SMTP
        $mail->SMTPSecure = 'ssl';
        $mail->Host = "smtp.gmail.com";  // specify main and backup server
        $mail->Port = '465';
        $mail->SMTPAuth = true;     // turn on SMTP authentication
        $mail->Username = "apjaktu.reg@gmail.com";  // SMTP username
        $mail->Password = "apjaktupass"; // SMTP password
        $mail->SMTPDebug = 0;

        $mail->From = "apjaktu.reg@gmail.com";
        $mail->FromName = "APJAKTU";
        $mail->AddAddress($receiverMail, $receiverName);
        $mail->WordWrap = 100;                                 // set word wrap to 50 characters
        $mail->IsHTML(true);                                  // set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = $message;

        if(!$mail->Send())
        {
           echo "Message could not be sent. Please try again.<p>";
           exit;
        }
    

$userdef=3;
 $stmt = $conn->prepare("INSERT INTO users (collegeId, dept_code, name, nameInBank, nameOfBank, ifsc, designation, account, teach_exp, industrial_exp, mobile_no, email, password, image, userdef) 
    VALUES (:collegeId, :dept_code, :name, :nameInBank, :nameOfBank,  :ifsc, :designation,  :account, :teach_exp, :industrial_exp, :mobile_no, :email, :password, :image, :userdef)");
 //print_r($stmt);
   // $stmt->bindParam(':id', $id);
    $stmt->bindParam(':collegeId', $collegeId);
    $stmt->bindParam(':dept_code', $deptId);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':nameInBank',$nameInBank);
    $stmt->bindParam(':nameOfBank', $nameOfBank);
     $stmt->bindParam(':image', $image);
 
    $stmt->bindParam(':designation', $designation);
    $stmt->bindParam(':ifsc', $ifsc);
    $stmt->bindParam(':teach_exp', $teachingExperienceYear);
    $stmt->bindParam(':industrial_exp',	$industrialExperienceYear);
    $stmt->bindParam(':mobile_no', $phone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', md5($password));
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':account',$accountNo);
      $stmt->bindParam(':userdef', $userdef);
    //   echo "INSERT INTO users (id, collegeId, dept_code, name, nameInBank, nameOfBank, ifsc, designation, account, teach_exp, industrial_exp, mobile_no, email, password, image, userdef) 
    // VALUES ($id, $collegeId, $deptId, $name, $nameInBank, $nameOfBank,  $ifsc, $designation,  $accountNo, $teachingExperienceYear, $industrialExperienceYear, $phone, $email, $password, $image, $userdef)";
    $stmt->execute();
   // if(isset($name))
   $id=$conn->lastInsertId();

    //.....................technical..................................//
    $stm = $conn->prepare("INSERT INTO user_technical (degree, time, institute, university, passingyr,branchSpeci,userid,type) 
                               VALUES (:degree,:time, :institution, :university, :passingyr,:branchSpeci,:id,'T')");
 //print_r($stmt);
   // $stmt->bindParam(':id', $id);
    $i=0;
    foreach($degree as $deg){
    $stm->bindParam(':degree', $degree[$i]);
    $stm->bindParam(':time', $time[$i]);
     $stm->bindParam(':institution',$institution[$i]);
    $stm->bindParam(':university', $university[$i]);
     $stm->bindParam(':passingyr', $passingyr[$i]);
    $stm->bindParam(':branchSpeci', $branchSpeci[$i]);
    $stm->bindParam(':id', $id);
  
    // echo "INSERT INTO user_technical (degree, time, institute, university, passingyr,branchSpeci, percent,userid) 
      //                         VALUES ($degree,$time, $institution, $university, $passingyr,$branchSpeci, $percent,id)";
    $i++;
    $stm->execute();
}

    //.....................training..................................//
    $stm = $conn->prepare("INSERT INTO user_technical (degree, time, institute, university, passingyr,branchSpeci,userid,type) 
                               VALUES (:degree,:time, :institution,'','',:university,:id,'R')");
 //print_r($stmt);
   // $stmt->bindParam(':id', $id);
    $i=0;
    foreach($course as $deg){
    	if(strlen($course[$i])>0){
    $stm->bindParam(':degree', $course[$i]);
    $stm->bindParam(':time', $duration[$i]);
     $stm->bindParam(':institution',$trainIns[$i]);
    $stm->bindParam(':university', $detailOfTrai[$i]);
    $stm->bindParam(':id', $id);
  
    // echo "INSERT INTO user_technical (degree, time, institute, university, passingyr,branchSpeci, percent,userid) 
      //                         VALUES ($degree,$time, $institution, $university, $passingyr,$branchSpeci, $percent,id)";
    $i++;
    $stm->execute();}
}


echo "<center><h2>Registration Successful! Log in details are sent to your Email</h2></center>";
}
else{
?>

<style>

	#signup-step{margin:auto;padding:0;width:53%;box-shadow: 3px 4px 16px #888888;}
	#signup-step li{list-style:none; float:left;padding:5px 10px;border-top:#980000o 1px solid;border-left:#980000 2px solid;border-right:#980000 2px solid;border-radius:5px 5px 0 0;}
	.active{color:#FFF;}
	#signup-step li.active{background-color:#980000;}
	#signup-form{box-shadow: 3px 4px 16px #888888;clear:both;border:2px #980000 solid;padding:20px;width:50%;margin:auto;}
	.demoInputBox{padding: 10px;border: #CDCDCD 1px solid;border-radius: 4px;background-color: #FFF;width: 50%;}
	.signup-error{color:#FF0000; padding-left:15px;}
	.message {color: #00FF00;font-weight: bold;width: 100%;padding: 10;}
	.btnAction{padding: 5px 10px;background-color: #F00;border: 0;color: #FFF;cursor: pointer; margin-top:15px;}
	label{line-height:35px;}
	.table-bordered > thead > tr > th, .table-bordered > thead > tr > td {
    border-bottom-width: 2px;
    vertical-align: middle;
}
</style>
<div class="panel-heading" align="center">
    Registration Faculty
</div>
<br>	
<div class="panel-body" id="panel-body">
	<ul id="signup-step">
	    <li id="personal" class="active" style="box-shadow: 0px 0px 16px #888888;border-top: 2px solid rgb(152, 0, 0);width:31%;font-weight:bold;padding:2%;margin-left:3%">Personal Details</li>
	    <li id="bank" class="" style="box-shadow: 0px 0px 16px #888888;border-top: 2px solid rgb(152, 0, 0);width:31.3%;font-weight:bold;padding:2%;">Bank Details</li>
	    <li id="edutech" class="" style="box-shadow: 0px 0px 16px #888888;	border-top: 2px solid rgb(152, 0, 0);width:32%;font-weight:bold;padding:2%;">Educational/Technical Details</li>
	</ul>
	<form name="Registration"  enctype="multipart/form-data" id="signup-form" method="post" action="registration_faculty_new.php">
	    <div id="personal-field" style="display:block" >
	        <div class="col-sm-12" style="margin:auto 2%;">
				<table style="width:100%;">
						<tr>
							<div class="form-group">
								<td width="30%"> 
									<label>College Name:</label>
								</td>
								<td>
									<select class="form-control" name="collegeId" id="personal-fieldCol">
									<option value=''>SELECT</option>
									<?php
										$result = $obj->get_colleges($conn);
										while($row = $result->fetch()) {
											echo "<option value='".$row["collegeId"]."'>".$row["collegeName"]."</option>";
										}
									?>
                                    </select>
								</td>
							</div>	
						</tr>
						<tr>
							<div class="form-group">
								<td>
									<label>Department:</label>
								</td>
								<td>
									<select class="form-control" name="deptId" id="personal-fieldDep" style="">
									<option value=''>SELECT</option>
                                    <?php
										$result = $obj->get_branches($conn);
										while($row = $result->fetch()) {
											echo "<option value='".$row["branchId"]."'>".$row["branchName"]."</option>";
										}
									?>          
                                    </select>
								</td>
							</div>	
						</tr>
						<tr>
							<div class="form-group">
								<td>
									<label>Faculty Name:</label>
								</td>
								<td>
									<div class="row" style="margin-right:0px;margin-left:0px;">
										<div class="col-xs-4" style="padding-right: 5px;padding-left: 0px;">
											<select class="form-control" name="mister1" id="mister1" style="">
		                                                <option value="Mr.">Mr.</option>
		                                                <option value="Mrs.">Mrs.</option>
		                                                <option value="Ms.">Ms.</option>
		                                                <option value="Dr.">Dr.</option>
		                                    </select>
	                                    </div>
	                                    <div class="col-xs-8" style="padding-right: 0px;padding-left: 0px;">
	                                    	<input class="form-control" type="text" name="name" id="name" style="" onkeyup="validate(this,'char')" required>
	                                    </div>
	                                </div>    
								</td>
							</div>	
						</tr>
						<tr>
							<div class="form-group">
								<td>
									<label>Designation:</label>
								</td>
								<td>
									<select class="form-control" name="designation" id="personal-fieldDesig" style="">
									            	<option value=''>SELECT</option>
                                                <option value="Professor">Professor</option>
                                                <option value="Associate Professor">Associate Professor</option>
                                                <option value="Assistant Professor">Assistant Professor</option>
                                    </select>
								</td>
							</div>	
						</tr>
						<tr>
							<div class="form-group">
								<td>
									<label>Teaching Experience in Year:</label>
								</td>
								<td>
                                    <input class="form-control" type="text" name="teachingExperienceYear" id="teachingExperienceYear" style="min-width:37%;" onkeyup="validate(this,'num');" maxlength="2" required>
								</td>
							</div>	
						</tr>

						<tr>
							<div class="form-group">
								<td>
									<label>Industrial Experience in Year:</label>
								</td>
								<td>
                                    <input class="form-control" type="text" name="industrialExperienceYear" id="teachingExperienceYear" style="min-width:37%;" onkeyup="validate(this,'num');" maxlength="2" required>
								</td>
							</div>	
						</tr>
						<tr>
							<div class="form-group">
								<td>
									<label>Mobile No:</label>
								</td>
								<td>
									<input class="form-control" type="text" name="phone" id="phone" style="min-width:37%;" onkeyup="validate(this,'num');"  maxlength="10" required>
								</td>
							</div>	
						</tr>
						<tr>
							<div class="form-group">
								<td>
									<label>Email:</label>
								</td>
								<td>
									<input class="form-control" type="email" name="email" id="email" style="min-width:37%;" onfocusout="validate(this,'email');"   required >
								</td>
							</div>	
						</tr>
						<tr>
							<div class="form-group">
								<td>
									<label>Confirm Email:</label>
								</td>
								<td>
									<input onpaste="return false" class="form-control" type="email" name="confirmmail" id="confirmmail" style="min-width:37%;" onpaste="return false" required>
								</td>
							</div>	
						</tr>
				</table>
			</div>
	    </div>
        <div id="bank-field" style="display:none">
            <div class="row">
					<div class="col-md-4" align="center" style="float:right;">
                        <img src="images/default.png" id="picture" style="width: 100px;height: 110px;border-radius: 5px">
                        <input onchange="readURL(this)" type="file" class="form-control" name="fileToUpload" style="width: 80%;" required>
                    </div>
                    <div class="col-md-8" style="padding-left: 30px;">
                    	<table style="width:100%;">
							<tr>
								<div class="form-group">
									<td>
										<label>Name as in the Bank:</label>
									</td>
									<td>
	                                    <input class="form-control" type="text" name="nameInBank" id="nameInBank" style="min-width:37%;max-width:200px;" onkeyup="validate(this,'char');">
									</td>
								</div>	
							</tr>
							<tr>
								<div class="form-group">
									<td>
										<label>Name of Bank:</label>
									</td>
									<td>
	                                    <input class="form-control" type="text" name="nameOfBank" id="bank_name" style="min-width:37%;max-width:200px;">
									</td>
								</div>	
							</tr>
							<tr>
								<div class="form-group">
									<td>
										<label>Account no:</label>
									</td>
									<td>
	                                    <input class="form-control" type="number" name="accountNo" id="acc_no" style="min-width:37%;max-width:200px;" onkeyup="validate(this,'num');">
									</td>
								</div>	
							</tr>
							<tr>
								<div class="form-group">
									<td>
										<label>IFSC code:</label>
									</td>
									<td>
	                                    <input class="form-control" type="text" name="ifsc" id="name" style="min-width:37%;max-width:100%;" onkeyup="validate(this,'alphaNum');">
									</td>
								</div>	
							</tr>												
						</table>
                    </div>
                </div>
        </div>
        <div id="edutech-field" style="display:none">
            <div class="row">
				<div class="panel-body">
		            <div class="table-responsive">
		                <table class="table table-bordered">
		                    <thead>
		                        <tr>
		                        	<th colspan="7">Technical/Professional Qualifications (B.Tech / B.E. onwards)</th>
		                        </tr>
		                        <tr>
		                            <th>Name of Degree</th>
		                            <th>Full Time/ Part Time/ Correspondence etc.</th>
		                            <th>Name of Institution/ College</th>
		                            <th>University</th>
		                            <th>Year of Passing</th>
		                            <th>Branch/ Specialization</th>
		                            <!--<th>Devision & % age of Marks (overall)</th>
		                        --></tr>
		                    </thead>
		                    <tbody id="technical">
		                        <tr>
		                            <td><input class="form-control tbl" type="text" name="degree[]" id="degree" placeholder="" style="" required  onkeyup="validate(this,'alphaNum');"></td>
		                            <td><input class="form-control tbl" type="text" name="time[]" id="time" placeholder="" style="" required  onkeyup="validate(this,'alphaNum');"></td>
		                            <td><input class="form-control tbl" type="text" name="institution[]" id="institution" placeholder="" style="" required  onkeyup="validate(this,'alphaNum');"></td>
		                            <td><input class="form-control tbl" type="text" name="university[]" id="university" placeholder="" style="" required  onkeyup="validate(this,'alphaNum');"></td>
		                            <td><input class="form-control tbl" type="text" name="passingyr[]" id="passingyr" placeholder="" style="" required  onkeyup="validate(this,'num');"></td>
		                            <td><input class="form-control tbl" type="text" name="branchSpeci[]" id="branchSpeci" placeholder="" style="" required  onkeyup="validate(this,'alphaNum');"></td>
		                            <!--<td><input class="form-control tbl" type="text" name="percent[]" id="percent" placeholder="" style=""></td>
		                        --></tr>	
		                    </tbody>
		                    
		                </table>
		                <input type="button" class="btn btn-success pull-right" style="padding:4px 8px;" onclick="technical()" value="Add Fields">
		            </div>
		            <!-- /.table-responsive -->
		        </div>
		    </div>
		    <div class="row">
				<div class="panel-body">
		            <div class="table-responsive">
		                <table class="table table-bordered">
		                    <thead>
		                        <tr>
		                        	<th colspan="7">Additional Courses</th>
		                        </tr>
		                        <tr>
		                            <th>Name of Degree</th>
		                            <th>Full Time/ Part Time/ Correspondence etc.</th>
		                            <th>Name of Institution/ College</th>
		                            <th>Details of Training/ Course</th>
		                           
		                        </tr>
		                    </thead>
		                    <tbody id="technicalskill">
		                     <tr>
		                            <td><input class="form-control tbl" type="text" name="course[]" id="course" placeholder="" style="" onkeyup="validate(this,'alphaNum');"></td>
		                            <td><input class="form-control tbl" type="text" name="duration[]" id="duration" placeholder="" style="" onkeyup="validate(this,'alphaNum');"></td>
		                            <td><input class="form-control tbl" type="text" name="trainIns[]" id="trainIns" placeholder="" style="" onkeyup="validate(this,'alphaNum');"></td>
		                            <td><input class="form-control tbl" type="text" name="detailOfTrai[]" id="detailOfTrai" placeholder="" style="" onkeyup="validate(this,'alphaNum');"></td>
		                           
		                        </tr>	
		                       
		                    </tbody>
		                </table>
		                 
		                        	<td colspan="7"><input type="button" class="btn btn-success pull-right" style="padding:4px 8px;" onclick="training()" value="Add Fields"></td>
		                        
		            </div>
		            <!-- /.table-responsive -->
		        </div>
		    </div> 
        </div>
	    <div>
	        <input class="btn btn-danger" type="button" name="back" id="back" value="Back" style="display:none;">
	        <input class="btn btn-danger" type="button" name="next" id="next" value="Next" >
	        <input class="btn btn-danger" type="submit" name="registerNew" id="finish" value="submit" style="display:none;">
	    </div>
	</form>
</div>

<script>
var count=0;
function validateConfirmEmail1(con){

	var conEmail=con.value;
	var email=document.getElementById('email').value;
	if(email==''){

		alert("Enter email first, then confirm it");
		$("#email").focus();
	}
	

}

function validateConfirmEmail(con){

	var conEmail=con.value;
	var email=document.getElementById('email').value;
	
    if(str.toUpperCase(conEmail)!=str.toUpperCase(email)){
      
      alert("Both the email are not same");             
                    

       

	}

}
function validateConfirmEmaile(con){

	var conEmail=con.value;
	var email=document.getElementById('email').value;
	
    if((conEmail!=email) && conEmail.length>2){
      
      alert("Both the email are not same");             
                    

       

	}

}
 function validate(obj,type)
 {
 	//alert("jsdf");
 	var value;
 	value=obj.value;
 	obj.onpaste="return false";
 	$.ajax({
        type:"POST",
 		url:"filter.php",
 		data:{emailsending:value,typee:type},
 		success:function(data){
     
                 
                   if(data=='alert   %&*$#$()(*&^%%$$$##@!())(_+_+   '){
                           swal("","This email address is already registered");
                           obj.value='';
                   }
                   else{
                   	  obj.value=data;
                   }
      }
  });
 }
   
 
  function technical(){

  $.ajax({


     url:'technicalHtml.php',
     success:function(result){
     	$("#technical").append(result);
     }



  });



  	//alert("me");
 }

    

  function training(){

  	//alert("me");
  		$.ajax({


     url:'trainingHtml.php',
     success:function(result){
     	$("#technicalskill").append(result);
     }



  });


  }
  $(document).ready(function(){
  var current = $(".active");
 var next = $(".active").next("li");


  });
    
	$(document).ready(function() {
	    $("#next").click(function(){
	        if(true) {
	            var current = $(".active");
	           $("#"+current.attr("id")+"-field").children().find('input,select').each(function(){
                       if($(this).val()===''){
                       	$(this).focus();
                       	$(this).addclass("red");
                       	 count=0;
                       }else{
                    count=count+1;
                   //alert(count);
                       }
                    
                      });
                     if(count>=9)
                   var next = $(".active").next("li");
                      
	           
	                if(next.length>0) {
	                    $("#"+current.attr("id")+"-field").hide();
	                    $("#"+next.attr("id")+"-field").show();
	                    $("#back").show();
	                    $("#finish").hide();
	                    $(".active").removeClass("active");
	                    next.addClass("active");
	                    if($(".active").attr("id") == $("li").last().attr("id")) {
	                        $("#next").hide();
	                        $("#finish").show(); 
	                    }
	                }
	            }
	        });
	    $("#back").click(function(){ 
	        var current = $(".active");
	        var prev = $(".active").prev("li");
	        if(prev.length>0) {
	            $("#"+current.attr("id")+"-field").hide();
	            $("#"+prev.attr("id")+"-field").show();
	            $("#next").show();
	            $("#finish").hide();
	            $(".active").removeClass("active");
	            prev.addClass("active");
	            if($(".active").attr("id") == $("li").first().attr("id")) {
	                $("#back").hide(); 
	            }
	        }
	    });
	});
</script>
<script type="text/javascript">
	    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#picture')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
       
</script>     
<?php
}
	require ("include/footerindex.php");
?>	