<?php
    include_once './functions.php';
    $fname=$_POST["name1"];$lname=$_POST["name2"];
	$uname=$fname." ".$lname;
    $uemail=$_POST["uemail"];
    $mobile=$_POST["mobile"];
    $dob=$_POST["dob"];
    $gender=$_POST["gender"];
    $password=$_POST["password"];
    try{
    $conn=connect('trustbook1'); 
    $stmt = $conn->prepare("insert into user_profile(name,email,phone_no,dob,gender,password,imgtype) values(:uname,:uemail,:mobile,:dob,:gender,:password,'blank')");
    
    if($stmt->execute(array('uname'=>$uname,'uemail'=>$uemail,'mobile'=>$mobile,'dob'=>$dob,'gender'=>$gender,'password'=>$password,))){
         
		   $smsg = "User Created Successfully.";
		   session_start(); // start the session 
$_SESSION['view1']=$smsg; $_SESSION['uemail']=$uemail; 
        }else{
            $fmsg ="User Registration Failed";session_start(); // start the session 
$_SESSION['view2']=$fmsg;  
       /*$conn=mysqli_connect("localhost", "root", "15061994", "trustbook1");
	  $sql1="select uid from user_profile where email='$uemail'";
$result=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result);
if($result==False){echo "Not Sucessfull connection in register.php";}
$uid=$row['uid'];
$sql2="INSERT INTO `location_info`(`uid`, `current_city`, `current_state`, `hometown`, `past_city`, `past_state`, `country`, `place_of_birth`) VALUES ($uid,'','','','','','','')"; ;
	 $result1=mysqli_query($conn,$sql2); 
	$sql3="INSERT INTO `user_education`(`uid`, `10th_school_city`, `10th_school_state`, `10th_school_country`, `10th_school_name`, `timespan_of_10th`, `12th_school_city`, `12th_school_state`, `12th_school_country`, `12th_school_name`, `timespan_of_12th`, `primary_school_city`, `primary_school_state`, `primary_school_country`, `primary_school_name`, `timespan_of_primary`, `undergraduation_city`, `undergraduation_state`, `undergraduation_country`, `ug_college_name`, `timespan_of_ug`, `postgraduation_city`, `postgraduation_state`, `postgraduation_country`, `pg_college_name`, `timespan_of_pg`) VALUES ($uid,'','','','','','','','','','','','','','','','','','','','','','','','','');";
	 $result2=mysqli_query($conn,$sql3); 
$sql4="INSERT INTO `user_profession`(`uid`, `working_city`, `working_state`, `working_country`, `current_company_name`, `timespan_of_working`, `previous_job_title`, `current_job_title`, `previous_company`, `Relationship_status`, `Language_known`) VALUES ($uid,'','','','','','','','','','');";
	 $result3=mysqli_query($conn,$sql4);*/	 
	 }
	redirect('test80.php');
    }
 catch (PDOException $e)
 {
        echo $e->getMessage();
 }
?>
