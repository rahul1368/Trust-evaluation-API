<?php
    session_start();
    include './functions.php';
    if(isset($_SESSION["uemail"])){
        $uemail=$_SESSION["uemail"];
		$uid=$_SESSION['uid'];
        try{$_POST['start_date']=0;
            $con1=mysqli_connect("localhost","root","15061994","trustbook1");
		$sql2="select * from user_profile JOIN location_info ON user_profile.uid=location_info.uid JOIN user_education ON location_info.uid=user_education.uid 
		JOIN user_profession ON user_education.uid=user_profession.uid where user_profile.email='$uemail'";
$retval2=mysqli_query($con1,$sql2);	
			if($retval2==FALSE){echo" Not Suceesfull";}
			   
$row=mysqli_fetch_assoc($retval2);
$con2=mysqli_connect("localhost","root","15061994","image");
$sql3="select * from timespan where uid='$uid'";
$retval3=mysqli_query($con2,$sql3);	
			if($retval3==FALSE){echo" Not Suceesfull in editprofile at line 18";}
	$timespan=mysqli_fetch_assoc($retval3);	
//echo $timespan['primary_end_date'];	
 function getAge($date) {
    return floor((strtotime(date('d-m-Y')) - strtotime($date))/(60*60*24*365.2421896));
} 
function gettimespan($date1,$date2)
{//$datetime1=strtotime($date1);
//$datetime2=strtotime($date2);
if($date1==$date2){$interval="0-0";return $interval;}
$v1=explode("-",$date1);$v2=explode("-",$date2);
$year1=$v1[0];$year2=$v2[0];
$interval =$year1."-".$year2;
	
	return $interval;}

}
        catch (PDOException $e){
            $e->getMessage();
        }        
    }
    else{
        redirect('./facebook login.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Edit profile</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/homepage.css">
    </head>
    <body>
        <style>
		input, textarea {
  font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;
  margin  : 5px;
  width   : 250px;
font-weight:bold;color:blue;
  background: pink;
}
input:focus, textarea:focus {font-weight:400;
  background   : #FF0;
  border-radius: 5px;
  outline      : none;
}input {font-weight:400;
    height: 2.5em; /* for IE */
    vertical-align: middle; /* This is optional but it makes legacy IEs look better */
}
textarea {
  display : block;
font-weight:400;
  padding : 10px;
  margin  : 10px 0 0 -10px;
  width   : 340px;
  height  : 360px;

  resize  : none;
  overflow: auto;
}.pagecontent{ font:calibri;padding:0 90px; margin  : 2px;
	font-weight:900;color:pink-red;
  resize  : none;
  overflow: auto;}
		</style>
		
		<div class="header">
        <h1><a href="home.php">@trustbook</a></h1>
	<h3><?php echo $row['name']; ?></h3>
        <?php 
        /*if($row['imgtype']=='blank'){
            echo "<img src='images/unknown.jpg' id='dp'style='height: 130px;width: 110px;border-radius: 6px;'/>";
        }  */
       {
            //echo "<img src='$img' alt='img' style='height: 130px;width: 110px;border-radius: 6px;' id='dp'>";
       $con=mysqli_connect("localhost","root","15061994","image"); 
		if($con==FALSE) {echo"Database Connection error in file home.php";}
		$statement="select * from storeimages where uid='$uid'";
		$result=mysqli_query($con,$statement);
		$ans=mysqli_fetch_assoc($result);
		$imageData=$ans['image'];
		$imageData="images/".$imageData;
		//echo  $imageData;
		
		}
        ?><img src='<?php echo $imageData; ?>' id='dp' alt='img' style='height: 130px;width: 110px;border-radius: 6px;margin:25px;left-align:5px;'>
	</div>
	<div class="leftbar">
	<a href="editprofile.php">Want to edit profile?</a><br>
        <a href="profile.php">View profile</a><br>
        <a href="friends.php">Friends</a><br>
        <a href="pendingrequest.php">Pending friend requests</a><br>
        <form action="findfriends.php" method="GET">
            <input type="name" name="key" style='width:70px;height:25px;background-color:white;'>
            <input type="submit" value="Search"/ style='width:30px;height:25px;background-color:white;'>
        </form>
        <a href="logout.php">Log out</a>
	</div>
        <div class="pagecontent">
        <button><a href="home.php" style="text-decoration: none;color:black">Done editing</a></button><br><br>
        <?php 
          /*  if($row['imgtype']=='blank'){
                echo "<img src='images/unknown.jpg'style='height: 130px;width: 110px;border-radius: 6px;'/>";
            }  */
            {   //echo"Imgtype is not blank.";
               // echo "<img src='.test.php.' alt='img' style='border: 1px outset black;height: 130px;width: 110px;border-radius: 6px;'>";
           $con=mysqli_connect("localhost","root","15061994","image"); 
		if($con==FALSE) {echo"Database Connection error in file home.php";}
		$statement="select * from storeimages where uid='$uid'";
		$result=mysqli_query($con,$statement);
		$ans=mysqli_fetch_assoc($result);
		$imageData=$ans['image'];
		$imageData="images/".$imageData;
		//echo  $imageData;
		}
        echo '<img src="'.$imageData.'" height="130" width="110" border-radius="6" margin="25" left-align="5" />'; ?>
        <form action="dpupdate.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="UploadImage"/ style='width:30px;height:25px;background-color:white;'>
            <input type="submit" value="Change profile picture"/ style='width:600px;height:25px;background-color:red;padding:0px'>
        </form>
        <form action="updateinfo.php" method="POST">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="name" name="uname"  value="<?php echo $row['name']; ?>"></td>
            </tr>
            <td>Mobile Number</td>
                <td><input type="number" name="mobile" value="<?php echo $row['phone_no']; ?>"></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><input type="date" name="dob"  value="<?php echo $row['dob']; ?>"></td>
            </tr>
			<tr>
                <td>Gender</td>
                <td><input type="name" name="gender"  value="<?php echo $row['gender']; ?>"></td>
            </tr>
<tr>
                <td>Interests</td>
                <td><input type="name" name="interest"  value="<?php echo $row['interest']; ?>"></td>
            </tr>
<tr>
                <td>Age</td>
                <td><input type="name" name=""  value="<?php echo getAge($row['dob']); ?>"></td>
            </tr>
			<tr>
                <td>Home town</td>
                <td><input type="name" name="hometown"  value="<?php echo $row['hometown']; ?>"></td>
            </tr>
            
            <tr>
                <td>Place of Birth</td>
                <td><input type="name" name="placeofbirth"  value="<?php echo $row['place_of_birth']; ?>"></td>
            </tr>
			<tr>
                
				<td>Relationship Status</td>
                <td><input type="name" name="relationship" value="<?php echo $row['Relationship_status']; ?>"></td>
            </tr>
            <tr>
                <td>Languages Known</td>
                <td><input type="name" name="language"  value="<?php echo $row['Language_known']; ?>"></td>
            </tr>
			<tr><td colspan="2"><center style='background:orange;'>Location - info</center></td></tr>
            <tr>
                <td>Current city</td>
                <td><input type="name" name="current_city"  value="<?php echo $row['current_city']; ?>"></td>
            </tr>

            <tr>
                <td>Current state</td>
                <td><input type="name" name="Current_State"  value="<?php echo $row['current_state']; ?>"></td>
            </tr>

            <tr>
                <td>Current country</td>
                <td><input type="name" name="Current_Country"  value="<?php echo $row['country']; ?>"></td>
            </tr>

            <tr>
                <td>Starting Date at Current Location </td>
                <td><input type="date" name="curr_location_start_date"  value="<?php echo $timespan['curr_location_st_date']; ?>"></td>
            </tr>
			
			<tr>
                <td>Ending Date at Current Location(Optional)</td>
                <td><input type="date" name="curr_location_end_date"  value="<?php echo $timespan['curr_location_end_date']; ?>"></td>
            </tr>
			<tr>
                <td>Time Span of Current Location</td>
                <td><input type="name" name="currentlocationtimespan"  value="<?php echo gettimespan($timespan['curr_location_st_date'],$timespan['curr_location_end_date']); ?>"></td>
            </tr>
			
			
            
			<tr><td colspan="2"><center style='background:yellow;'>Education - info</center></td></tr>
            <tr>
                <td>Primary School Name</td>
                <td><input type="name" name="primary_sname"  value="<?php echo $row['primary_school_name']; ?>"></td>
            </tr>
			<tr>
                <td>Primary School City</td>
                <td><input type="name" name="primary_scity"  value="<?php echo $row['primary_school_city']; ?>"></td>
            </tr>
			<tr>
                <td>Primary School State</td>
                <td><input type="name" name="primary_sstate"  value="<?php echo $row['primary_school_state']; ?>"></td>
            </tr>
            <tr>
                <td>Primary School Country</td>
                <td><input type="name" name="primary_scountry"  value="<?php echo $row['primary_school_country']; ?>"></td>
            </tr>
			<tr>
                <td>Starting Date of Primary</td>
                <td><input type="date" name="primary_start_date"  value="<?php echo $timespan['primary_st_date']; ?>"></td>
            </tr>
			
			<tr>
                <td>Ending Date of Primary</td>
                <td><input type="date" name="primary_end_date"  value="<?php echo $timespan['primary_end_date']; ?>"></td>
            </tr>
<tr>
                <td>Time Span of Primary</td>
                <td><input type="name" name="primary_stimespan"  value="<?php echo gettimespan($timespan['primary_st_date'],$timespan['primary_end_date']); ?>"></td>
            </tr>


            <tr>
                <td>High School Name</td>
                <td><input type="name" name="High_sname"  value="<?php echo $row['10th_school_name']; ?>"></td>
            </tr>
            <tr>
                <td>High School City</td>
                <td><input type="name" name="High_scity"  value="<?php echo $row['10th_school_city']; ?>"></td>
            </tr>
			<tr>
                <td>High School State</td>
                <td><input type="name" name="High_sstate"  value="<?php echo $row['10th_school_state']; ?>"></td>
            </tr>
			<tr>
                <td>High School Country</td>
                <td><input type="name" name="High_scountry"  value="<?php echo $row['10th_school_country']; ?>"></td>
            </tr>
			<tr>
                <td>Starting Date of high-school </td>
                <td><input type="date" name="high-school_start_date"  value="<?php echo $timespan['10th_st_date']; ?>"></td>
            </tr>
			
			<tr>
                <td>Ending Date of high-school</td>
                <td><input type="date" name="high-school_end_date"  value="<?php echo $timespan['10th_end_date']; ?>"></td>
            </tr>

            <tr>
                <td>Time Span of high-school</td>
                <td><input type="name" name="High_stimespan"  value="<?php echo gettimespan($timespan['10th_st_date'],$timespan['10th_end_date']); ?>"></td>
            </tr>

 <tr>
                <td>Intermediate School Name</td>
                <td><input type="name" name="Inter_sname"  value="<?php echo $row['12th_school_name']; ?>"></td>
            </tr>
            <tr>
                <td>Intermediate School City</td>
                <td><input type="name" name="Inter_scity"  value="<?php echo $row['12th_school_city']; ?>"></td>
            </tr>
			<tr>
                <td>Intermediate School State</td>
                <td><input type="name" name="Inter_sstate"  value="<?php echo $row['12th_school_state']; ?>"></td>
            </tr>
			<tr>
                <td>Intermediate School Country</td>
                <td><input type="name" name="Inter_scountry"  value="<?php echo $row['12th_school_country']; ?>"></td>
            </tr>
			<tr>
                <td>Starting Date of intermediate-school </td>
                <td><input type="date" name="12th_start_date"  value="<?php echo $timespan['12th_st_date']; ?>"></td>
            </tr>
			
			<tr>
                <td>Ending Date of intermediate-school</td>
                <td><input type="date" name="12th_end_date"  value="<?php echo $timespan['12th_end_date']; ?>"></td>
            </tr>

            <tr>
                <td>Time Span of intermediate-school</td>
                <td><input type="name" name="Inter_stimespan"  value="<?php echo gettimespan($timespan['12th_st_date'],$timespan['12th_end_date']);?>"></td>
            </tr>
 <tr>
                <td>Under-Graduation College Name</td>
                <td><input type="name" name="Undergrad_sname"  value="<?php echo $row['ug_college_name']; ?>"></td>
            </tr>
            <tr>
                <td>Under-Graduation College City</td>
                <td><input type="name" name="Undergrad_scity"  value="<?php echo $row['undergraduation_city']; ?>"></td>
            </tr>
			<tr>
                <td>Under-Graduation College State</td>
                <td><input type="name" name="Undergrad_sstate"  value="<?php echo $row['undergraduation_state']; ?>"></td>
            </tr>
			<tr>
                <td>Under-Graduation College Country</td>
                <td><input type="name" name="Undergrad_scountry"  value="<?php echo $row['undergraduation_country']; ?>"></td>
            </tr>
			<tr>
                <td>Starting Date of Under-Graduation College </td>
                <td><input type="date" name="ug_start_date"  value="<?php echo $timespan['ug_st_date']; ?>"></td>
            </tr>
			
			<tr>
                <td>Ending Date of Under-Graduation College</td>
                <td><input type="date" name="ug_end_date"  value="<?php echo $timespan['ug_end_date']; ?>"></td>
            </tr>


            <tr>
                <td>Time Span of Under-Graduation College</td>
                <td><input type="name" name="Undergrad_stimespan"  value="<?php echo gettimespan($timespan['ug_st_date'],$timespan['ug_end_date']); ?>"></td>
            </tr>
<tr>
                <td>Post-Graduation College Name</td>
                <td><input type="name" name="Postgrad_sname"  value="<?php echo $row['pg_college_name']; ?>"></td>
            </tr>
            <tr>
                <td>Post-Graduation College City</td>
                <td><input type="name" name="Postgrad_scity"  value="<?php echo $row['postgraduation_city']; ?>"></td>
            </tr>
			<tr>
                <td>Post-Graduation College State</td>
                <td><input type="name" name="Postgrad_sstate"  value="<?php echo $row['postgraduation_state']; ?>"></td>
            </tr>
			<tr>
                <td>Post-Graduation College Country</td>
                <td><input type="name" name="Postgrad_scountry"  value="<?php echo $row['postgraduation_country']; ?>"></td>
            </tr>
<tr>
                <td>Starting Date of Post-Graduation College </td>
                <td><input type="date" name="pg_start_date"  value="<?php echo $timespan['pg_st_date']; ?>"></td>
            </tr>
			
			<tr>
                <td>Ending Date of Post-Graduation College</td>
                <td><input type="date" name="pg_end_date"  value="<?php echo $timespan['pg_end_date']; ?>"></td>
            </tr>

            <tr>
                <td>Time Span of Post-Graduation College</td>
                <td><input type="name" name="Postgrad_stimespan"  value="<?php echo gettimespan($timespan['pg_st_date'],$timespan['pg_end_date']); ?>"></td>
            </tr>
            <tr><td colspan="2"><center style='background:yellow;'>Employment - Details</center></td></tr>
            <tr>
                <td>Previous(if any) Job Title</td>
                <td><input type="name" name="previousoccu"  value="<?php echo $row['previous_job_title']; ?>"></td>
            </tr>
			<tr>
                <td>Previous Company Name</td>
                <td><input type="name" name="employer1"  value="<?php echo $row['previous_company']; ?>"></td>
            </tr>
			<tr>
                <td>Previous Working City</td>
                <td><input type="name" name="prev_city"  value="<?php echo $row['prev_city']; ?>"></td>
            </tr>
			<tr>
                <td>Previous Working State</td>
                <td><input type="name" name="prev_state"  value="<?php echo $row['prev_state']; ?>"></td>
            </tr>
			<tr>
                <td>Previous Working Country</td>
                <td><input type="name" name="prev_country"  value="<?php echo $row['prev_country']; ?>"></td>
            </tr>
			<tr>
                <td>Starting Date of Job </td>
                <td><input type="date" name="job_start_date"  value="<?php echo $timespan['job_st_date']; ?>"></td>
            </tr>
			
			<tr>
                <td>Ending Date of Job</td>
                <td><input type="date" name="job_end_date"  value="<?php echo $timespan['job_end_date']; ?>"></td>
            </tr>
			<tr>
                <td>Time Span of Working</td>
                <td><input type="name" name="timespanofworking"  value="<?php echo gettimespan($timespan['job_st_date'],$timespan['job_end_date']); ?>"></td>
            </tr>
			<tr>
                <td>Current Job Titie</td>
                <td><input type="name" name="current_jobtitle"  value="<?php echo $row['current_job_title']; ?>"></td>
            </tr>
            <tr>
                <td>Current Company Name</td>
                <td><input type="name" name="current_company"  value="<?php echo $row['current_company_name']; ?>"></td>
            </tr>
			<tr>
                <td>Current Working City</td>
                <td><input type="name" name="working_city"  value="<?php echo $row['working_city']; ?>"></td>
            </tr>
			<tr>
                <td>Current Working State</td>
                <td><input type="name" name="working_state"  value="<?php echo $row['working_state']; ?>"></td>
            </tr>
			<tr>
                <td>Current Working Country</td>
                <td><input type="name" name="working_country"  value="<?php echo $row['working_country']; ?>"></td>
            </tr>
            <tr>
                <td>Starting Date of Job </td>
                <td><input type="date" name="curr_job_start_date"  value="<?php echo $timespan['curr_job_st_date']; ?>"></td>
            </tr>
			
			<tr>
                <td>Ending Date of Job</td>
                <td><input type="date" name="curr_job_end_date"  value="<?php echo $timespan['curr_job_end_date']; ?>"></td>
            </tr>
			<tr>
                <td>Time Span of Working</td>
                <td><input type="name" name="currenttimespanofworking"  value="<?php echo gettimespan($timespan['curr_job_st_date'],$timespan['curr_job_end_date']); ?>"></td>
            </tr>
			
   
            <tr>
                <td colspan="2"><input type="submit" value="Update"/></td>
            </tr>
        </table>
        </form>
        </div>
    </body>
</html>
