<?php

require_once 'common/connectionPDO.php';
?>
<?php
if(isset($_POST['emailsending'])){

	$email=$_POST['emailsending'];
	
	

	$type=$_POST['typee'];

	
}
    if($type=='email'){
        
       

      $sql="SELECT count(*) FROM users WHERE email=:email";
      $run=$conn->prepare($sql);
        $run->bindParam(':email', $email);
        $run->execute();
        $p=$run->fetch();
        if($p[0]>0){
        	echo 'alert   %&*$#$()(*&^%%$$$##@!())(_+_+   ';
           die();
        }
       echo $email;
     


    }
	
   if($type=="text"){
  
	$i=0;$flag=0;
	while ($i<strlen($email)) 
	{
		$char=substr($email, $i,$i+1);
		$result=text($char);
		if($result==1) 
			$flag++;
		else {
			$flag=0;
			echo substr($email, 0,$i);
			die();
			break;
		}
		
		$i++;		
	}
	echo $email;
	// if($flag==0){
	// 		echo substr($email, 0,$i);
 //           die();

	// 	}else {
	// 		echo $email;
	// 		die();
	// 	}
	
	
}
if($type=="alphaNum"){
  
	$i=0;$flag=0;
	while ($i<strlen($email)) 
	{
		$char=substr($email, $i,$i+1);
		$result=alphaNum($char);
		if($result==1) 
			$flag++;
		else {
			$flag=0;
			echo substr($email, 0,$i);
			die();
			break;
		}
		
		$i++;		
	}
	echo $email;
	// if($flag==0){
	// 		echo substr($email, 0,$i);
 //           die();

	// 	}else {
	// 		echo $email;
	// 		die();
	// 	}
	
	
}
if($type=="char"){
  
	$i=0;$flag=0;
	while ($i<strlen($email)) 
	{
		$char=substr($email, $i,$i+1);
		$result=char($char);
		if($result==1) {
			$flag++;
					}
		else {
			$flag=0;
			echo substr($email, 0,$i);
			die();
			break;
		}
		
		$i++;		
	}
	echo $email;
	// if($flag==0){
	// 		echo substr($email, 0,$i);
 //           die();

	// 	}else {
	// 		echo $email;
	// 		die();
	// 	}
	
	
}
if($type=="num"){
  
	$i=0;$flag=0;
	while ($i<strlen($email)) 
	{
		$char=substr($email, $i,$i+1);
		$result=num($char);
		if($result==1) 
			$flag++;
		else {
			$flag=0;
			echo substr($email, 0,$i);
			die();
			break;
		}
		
		$i++;		
	}
	if($flag==0){
			echo substr($email, 0,$i);
           die();

		}else {
			echo $email;
			die();
		}
	
	

}
if($type=="mob"){

	$i=0;$flag=0;
	while ($i<strlen($email)) 
	{
		$char=substr($email, $i,$i+1);
		$result=num($char);
		if($result==1){ 
			$flag++;
		}
		else {
			$flag=0;
			echo substr($email, 0,$i);
			die();
			break;
		}
		
		$i++;		
	}
	if($flag<10)
			echo substr($email, 0,$flag);
		    else 
		    echo substr($email,0,9);
           die();
	// if($flag==0){
	// 		if($i<10)
	// 		echo substr($email, 0,$i);
	// 	    else 
	// 	    echo substr($email,0,9);
 //           die();

	// 	}else {
	// 		if($i<10)
	// 		echo $email;
	// 	    else 
	// 	    echo substr($email,0,9);
	// 		die();
	// 	}
	
	
	
}
 function num($str){
		$regex='/[0-9 ]/';
		if(preg_match($regex, $str))
		return 1;
		else 
		return 0;
	}


function char($str){
		$regex='/[a-zA-Z ]/';
		if(preg_match($regex, $str))
		return 1;
		else 
		return 0;
	}
function alphaNum($str){
		$regex='/[a-zA-Z0-9 ]/';
		if(preg_match($regex, $str))
		return 1;
		else 
		return 0;
	}
function email($str){
		$regex='/[0-9a-zA-Z%&\-.,+=-@()*  <>?#!_]/';
		if(preg_match($regex, $str))
		return 1;
		else 
		return 0;
	}
?>