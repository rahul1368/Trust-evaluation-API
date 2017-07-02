<?php
    include_once 'functions.php';
    session_start();
    try{$uemail=$_SESSION["uemail"];$uid=$_SESSION['uid'];
        $conn1=connect('trustbook1');
           $stmt1=$conn1->prepare("select * from user_profile where email=:uemail");     // Fetching user profile info
            $stmt1->execute(array('uemail'=>$uemail));
            $row=$stmt1->fetch();   //echo"$row[0]";
        $uname=$_POST["uname"];
        $mobile=$_POST["mobile"];
        $dob=$_POST["dob"];
		$gender=$_POST["gender"];
		
        $current_city=$_POST["current_city"];       // Location_info Table starts
         $current_state=$_POST["Current_State"];
		  $current_country=$_POST["Current_Country"];
		  //$past_city=$_POST["Past_City"];      
         //$past_state=$_POST["Past_State"];
		 // $past_country=$_POST["Past_Country"];
		$hometown=$_POST["hometown"];
        $place_of_birth=$_POST["placeofbirth"];
		
		$primary_school_name=$_POST["primary_sname"];           
		$primary_school_city=$_POST["primary_scity"];
		$primary_school_state=$_POST["primary_sstate"];
        $primary_school_country=$_POST["primary_scountry"];
		$primary_school_timespan=$_POST["primary_stimespan"];
		
		$High_school_name=$_POST["High_sname"];           
		$High_school_city=$_POST["High_scity"];
		$High_school_state=$_POST["High_sstate"];
        $High_school_country=$_POST["High_scountry"];
		$High_school_timespan=$_POST["High_stimespan"];
        
		$Inter_school_name=$_POST["Inter_sname"];           
		$Inter_school_city=$_POST["Inter_scity"];
		$Inter_school_state=$_POST["Inter_sstate"];
        $Inter_school_country=$_POST["Inter_scountry"];
		$Inter_school_timespan=$_POST["Inter_stimespan"];
		$Undergrad_school_name=$_POST["Undergrad_sname"];           
		$Undergrad_school_city=$_POST["Undergrad_scity"];
		$Undergrad_school_state=$_POST["Undergrad_sstate"];
        $Undergrad_school_country=$_POST["Undergrad_scountry"];
		$Undergrad_school_timespan=$_POST["Undergrad_stimespan"];
		
		$Postgrad_school_name=$_POST["Postgrad_sname"];           
		$Postgrad_school_city=$_POST["Postgrad_scity"];
		$Postgrad_school_state=$_POST["Postgrad_sstate"];
        $Postgrad_school_country=$_POST["Postgrad_scountry"];
		$Postgrad_school_timespan=$_POST["Postgrad_stimespan"];
		
		$previousoccu=$_POST["previousoccu"];
		$previous_company=$_POST["employer1"];
		$timespanofworking=$_POST["timespanofworking"];
		$currenttimespanofworking=$_POST["currenttimespanofworking"];
		$currentoccu=$_POST["current_jobtitle"];
		$current_company=$_POST["current_company"];
		$working_city=$_POST["working_city"];
		$working_state=$_POST["working_state"];
        $working_country=$_POST["working_country"];
		$prev_city=$_POST["prev_city"];
		$prev_state=$_POST["prev_state"];
        $prev_country=$_POST["prev_country"];
        $language=$_POST["language"];
    $interest=$_POST["interest"];
        $Relationship_status=$_POST["relationship"];
        $primary_st_date=$_POST['primary_start_date'];
		$primary_end_date=$_POST['primary_end_date'];
		
		 $t10th_st_date=$_POST['high-school_start_date'];
		$t10th_end_date=$_POST['high-school_end_date'];
		 $t12th_st_date=$_POST['12th_start_date'];
		$t12th_end_date=$_POST['12th_end_date'];
		
		$ug_st_date=$_POST['ug_start_date'];
		$ug_end_date=$_POST['ug_end_date'];
		$pg_st_date=$_POST['pg_start_date'];
		$pg_end_date=$_POST['pg_end_date'];
		$job_st_date=$_POST['job_start_date'];
		$job_end_date=$_POST['job_end_date'];
		$curr_job_st_date=$_POST['curr_job_start_date'];
		$curr_job_end_date=$_POST['curr_job_end_date'];
		$curr_location_st_date=$_POST['curr_location_start_date'];
		$curr_location_end_date=$_POST['curr_location_end_date'];
		$currentlocationtimespan=$_POST['currentlocationtimespan'];
$con1=mysqli_connect("localhost", "root", "15061994", "image");
if(!$con1){echo "Connection failed at line 85 in updateinfo";}
$sql12="Update timespan set primary_st_date='$primary_st_date',primary_end_date='$primary_end_date',
10th_st_date='$t10th_st_date',10th_end_date='$t10th_end_date',
12th_st_date='$t12th_st_date',12th_end_date='$t12th_end_date',
ug_st_date='$ug_st_date',ug_end_date='$ug_end_date',
pg_st_date='$pg_st_date',pg_end_date='$pg_end_date' ,
job_st_date='$job_st_date',job_end_date='$job_end_date', 
curr_job_st_date='$curr_job_st_date',curr_job_end_date='$curr_job_end_date',
curr_location_st_date='$curr_location_st_date',curr_location_end_date='$curr_location_end_date' where uid='$row[0]' ";
      $retval12=mysqli_query($con1,$sql12);
	  if($retval12==FALSE){echo "Not successfull connection at line 90 in updateinfo.php";}
	if($current_city!=NULL && ($current_country==NULL || $current_state==NULL))
	{//echo"city= '$current_city'";
$sql1="select city_state from cities where city_id=(select city_id from cities where city_name='$current_city')";
$retval13=mysqli_query($con1,$sql1);
 if($retval13==FALSE){echo "Not successfull connection at line 90 in updateinfo.php";}
$row13=mysqli_fetch_assoc($retval13);
$current_state=$row13['city_state'];$current_country="India";
}	
if($past_city!=NULL && ($past_country==NULL || $past_state==NULL))
	{//echo"city= '$past_city'";
$sql1="select city_state from cities where city_id=(select city_id from cities where city_name='$past_city')";
$retval13=mysqli_query($con1,$sql1);
 if($retval13==FALSE){echo "Not successfull connection at line 90 in updateinfo.php";}
$row13=mysqli_fetch_assoc($retval13);
$past_state=$row13['city_state'];$past_country="India";
}		

if($primary_school_city!=NULL && ($primary_school_country==NULL || $primary_school_state==NULL))
	{echo"city= '$primary_school_city'";
$sql1="select city_state from cities where city_id=(select city_id from cities where city_name='$primary_school_city')";
$retval13=mysqli_query($con1,$sql1);
 if($retval13==FALSE){echo "Not successfull connection at line 90 in updateinfo.php";}
$row13=mysqli_fetch_assoc($retval13);
$primary_school_state=$row13['city_state'];$primary_school_country="India";
}	
if($High_school_city!=NULL && ($High_school_country==NULL || $High_school_state==NULL))
	{echo"city= '$High_school_city'";
$sql1="select city_state from cities where city_id=(select city_id from cities where city_name='$High_school_city')";
$retval13=mysqli_query($con1,$sql1);
 if($retval13==FALSE){echo "Not successfull connection at line 90 in updateinfo.php";}
$row13=mysqli_fetch_assoc($retval13);
$High_school_state=$row13['city_state'];$High_school_country="India";
}	
if($Inter_school_city!=NULL && ($Inter_school_country==NULL || $Inter_school_state==NULL))
	{echo"city= '$Inter_school_city'";
$sql1="select city_state from cities where city_id=(select city_id from cities where city_name='$Inter_school_city')";
$retval13=mysqli_query($con1,$sql1);
 if($retval13==FALSE){echo "Not successfull connection at line 90 in updateinfo.php";}
$row13=mysqli_fetch_assoc($retval13);
$Inter_school_state=$row13['city_state'];$Inter_school_country="India";
}								
	if($Undergrad_school_city!=NULL && ($Undergrad_school_country==NULL || $Undergrad_school_state==NULL))
	{echo"city= '$Undergrad_school_city'";
$sql1="select city_state from cities where city_id=(select city_id from cities where city_name='$Undergrad_school_city')";
$retval13=mysqli_query($con1,$sql1);
 if($retval13==FALSE){echo "Not successfull connection at line 90 in updateinfo.php";}
$row13=mysqli_fetch_assoc($retval13);
$Undergrad_school_state=$row13['city_state'];$Undergrad_school_country="India";
}		
if( $Postgrad_school_city!=NULL && ( $Postgrad_school_country==NULL ||  $Postgrad_school_state==NULL))
	{echo"city= ' $Postgrad_school_city'";
$sql1="select city_state from cities where city_id=(select city_id from cities where city_name=' $Postgrad_school_city')";
$retval13=mysqli_query($con1,$sql1);
 if($retval13==FALSE){echo "Not successfull connection at line 90 in updateinfo.php";}
$row13=mysqli_fetch_assoc($retval13);
 $Postgrad_school_state=$row13['city_state']; $Postgrad_school_country="India";
}	
/*if( $working_city!=NULL && ( $working_country==NULL ||  $working_state==NULL))
	{echo"city= ' $working_city'";
$sql1="select city_state from cities where city_id=(select city_id from cities where city_name=' $working_city')";
$retval13=mysqli_query($con1,$sql1);
 if($retval13==FALSE){echo "Not successfull connection at line 90 in updateinfo.php";}
$row14=mysqli_fetch_row($retval13);
 $working_state=$row14[2]; $working_country="India";echo $row14[3];
} */	
if( $prev_city!=NULL && ( $prev_country==NULL ||  $prev_state==NULL))
	{echo"city= ' $prev_city'";
$sql2="select city_state from cities where city_id=(select city_id from cities where city_name=' $prev_city')";
$retval13=mysqli_query($con1,$sql2);
 if($retval13==FALSE){echo "Not successfull connection at line 90 in updateinfo.php";}
$row13=mysqli_fetch_assoc($retval13);
$prev_state=$row13['city_state']; $prev_country="India";echo"state= ' $prev_state'";
}																						
		
		$conn=mysqli_connect("localhost", "root", "15061994", "trustbook1");
		//echo "<p> doooluuuu1 :</p>";
        $sql="UPDATE user_profile set name='$uname',phone_no='$mobile',dob='$dob',gender='$gender',interest='$interest',relationship='$Relationship_status' where email='$uemail'";
	if(mysqli_query($conn, $sql)){
    echo "Records were updated successfully.<br>";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
		//$stmt2=$conn->prepare("UPDATE user_profile set name='$uname',phone_no='$mobile',dob='$dob',gender='$gender' where email='$uemail'");
		 $stmt3="UPDATE location_info set current_city='$current_city',current_state='$current_state',
		 country='$current_country',
		 hometown='$hometown',place_of_birth='$place_of_birth',lcurrent_timespan='$currentlocationtimespan' where uid='$row[0]'";
		$stmt4="UPDATE user_education set primary_school_name='$primary_school_name',primary_school_city='$primary_school_city',primary_school_state='$primary_school_state',primary_school_country='$primary_school_country',timespan_of_primary='$primary_school_timespan',10th_school_name='$High_school_name',10th_school_city='$High_school_city',10th_school_state='$High_school_state',10th_school_country='$High_school_country',timespan_of_10th='$High_school_timespan' ,12th_school_name='$Inter_school_name',12th_school_city='$Inter_school_city',12th_school_state='$Inter_school_state',12th_school_country='$Inter_school_country',timespan_of_12th='$Inter_school_timespan' ,ug_college_name='$Undergrad_school_name',undergraduation_city='$Undergrad_school_city',undergraduation_state='$Undergrad_school_state',undergraduation_country='$Undergrad_school_country',timespan_of_ug='$Undergrad_school_timespan' ,pg_college_name='$Postgrad_school_name',postgraduation_city='$Postgrad_school_city',postgraduation_state='$Postgrad_school_state',postgraduation_country='$Postgrad_school_country',timespan_of_pg='$Postgrad_school_timespan'  where uid='$row[0]'";
        //echo "<p> doooluuuu :</p>";
		$stmt5="UPDATE user_profession set previous_job_title='$previousoccu',previous_company='$previous_company',timespan_of_working='$timespanofworking',current_job_title='$currentoccu',current_company_name='$current_company',working_city='$working_city',working_state='$working_state',working_country='$working_country',prev_city='$prev_city',prev_state='$prev_state',prev_country='$prev_country',Language_known='$language',Relationship_status='$Relationship_status',current_timespan='$currenttimespanofworking' where uid='$row[0]'";
       
         //echo"Hloo";
		if(mysqli_query($conn, $stmt3)){
    echo "Records were updated successfully.<br>";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
if(mysqli_query($conn, $stmt4)){
    echo "Records were updated successfully.<br>";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
if(mysqli_query($conn, $stmt5)){
    echo "Records were updated successfully.<br>";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}


	  // echo "<p> doooluuuu :</p>";
	redirect('./editprofile.php');
    }
    catch (PDOException $e){
        $e->getMessage();
    }
?>
