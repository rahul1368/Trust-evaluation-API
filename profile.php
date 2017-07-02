<?php
    session_start();
    include './functions.php';
    if(isset($_SESSION["uemail"])){
        $uemail=$_SESSION["uemail"];
        try{$con1=mysqli_connect("localhost","root","15061994","trustbook1");
		$sql2="select * from user_profile JOIN location_info ON user_profile.uid=location_info.uid JOIN user_education ON location_info.uid=user_education.uid 
		JOIN user_profession ON user_education.uid=user_profession.uid where user_profile.email='$uemail'";
$retval2=mysqli_query($con1,$sql2);	
			if($retval2==FALSE){echo" Not Suceesfull";}
			   
$row=mysqli_fetch_assoc($retval2); 
//$columns=count($row);     
	// echo"Count= $columns <br>"; 
	$uid=$row['uid'];
	function getAge($date) {
    return floor((strtotime(date('d-m-Y')) - strtotime($date))/(60*60*24*365.2421896));
}}
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
        <title>Profile</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/homepage.css">
    </head>
    <body>
	<style>
		input, textarea {
  font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;
  margin  : 3px;
  width   : 450px;
font-weight:bold;color:blue;
  background: orange;
}
input:focus, textarea:focus {font-weight:bold;
  background   : #FF0;
  border-radius: 5px;
  outline      : none;
}input {
    height: 2.5em; /* for IE */
    vertical-align: middle; /* This is optional but it makes legacy IEs look better */
}
textarea {
  display : block;

  padding : 8px;
  margin  : 10px 0 0 -10px;
  width   : 340px;
  height  : 360px;

  resize  : none;
  overflow: auto;
}
.pagecontent{ font:calibri;
	font-weight:900;color:orange-blue;padding : 8px;margin  : 10px 0 0 -10px;
  resize  : none;
  overflow: auto;}
		</style>
        <div class="header">
        <h1><a href="home.php">@trustbook</a></h1>
	<h3 style='font-weight:bold; color:black;'><?php echo $row['name']; ?>
	</h3><hr>
        <?php 
        /*if($row['imgtype']=='blank'){
            echo "<img src='images/unknown.jpg' id='dp'  style='height: 130px;width: 110px;border-radius: 6px;'>";
        }  */
        {
           // echo "<img src='$img' id='dp' alt='img' style='height: 130px;width: 110px;border-radius: 6px;'>";
      $con=mysqli_connect("localhost","root","15061994","image"); 
		if($con==FALSE) {echo"Database Connection error in file home.php";}
		$statement="select * from storeimages where uid='$uid'";
		$result=mysqli_query($con,$statement);
		$ans=mysqli_fetch_assoc($result);
		$imageData=$ans['image'];
		$imageData="images/".$imageData;
		//echo  $imageData;
		}
        ?><img src='<?php echo $imageData; ?>' id='dp' alt='img' style='height: 130px;width: 110px;border-radius: 6px;'>
	
	</div>
	<div class="leftbar">
	<a href="editprofile.php">Want to edit profile?</a><br>
        <a href="profile.php">View profile</a><br>
        <a href="friends.php">Friends</a><br>
        <a href="pendingrequest.php">Pending friend requests</a><br>
        <form action="findfriends.php" method="GET">
            <input type="name" name="key"  style='width:70px;height:25px;background-color:white;'>
            <input type="submit" value="Search"/ style='width:30px;height:25px;background-color:white;'>
        </form>
        <a href="logout.php">Log out</a>
	</div>
        <div class="pagecontent">
		
		<center><h1 style='font-weight:bold;color:red; padding : 8px;
  margin  : 5px 0 0 -10px;
  width   : 0px;
  height  : 0px;
'>Welcome <?php echo" ";echo $row['name'];?> </h1></center>
            <table>
                <tr>
            <?php 
            /*if($row['imgtype']=='blank'){
                echo "<td><img src='images/unknown.jpg' style='width:350px;height:400px;'></td>";
				//echo "<td><img src='' alt='Smiley face'></td>";
            }  */
            {
               // echo "<td><img src='$img' alt='img' style='height: 130px;width: 110px;border-radius: 6px;'></td>";
           $con=mysqli_connect("localhost","root","15061994","image"); 
		if($con==FALSE) {echo"Database Connection error in file home.php";}
		$statement="select * from storeimages where uid='$uid'";
		$result=mysqli_query($con,$statement);
		$ans=mysqli_fetch_assoc($result);
		$imageData=$ans['image'];
		$imageData="images/".$imageData;
		//echo  $imageData;
		echo "<td>";  //echo '<img src="'.$imageData.'" height="130" width="110" border-radius="6" margin="25" left-align="5" />';echo "</td>";
		}
           // echo         $row['name'];
           ?>
            </tr>
			
			<?php 
			$timespan=array($row['lcurrent_timespan']);
			array_push($timespan,$row['timespan_of_primary']);
			array_push($timespan,$row['timespan_of_10th']);
			array_push($timespan,$row['timespan_of_12th']);
			array_push($timespan,$row['timespan_of_ug']);
			array_push($timespan,$row['timespan_of_pg']);
			array_push($timespan,$row['timespan_of_working']);
			array_push($timespan,$row['current_timespan']);
			$tmp0=$row['current_city'].",".$row['current_state'].",".$row['country'].".";
			$tmp1=$row['primary_school_city']." , ".$row['primary_school_state']." , ".$row['primary_school_country'].".";
			$tmp2=$row['10th_school_city']." , ".$row['10th_school_state']." , ".$row['10th_school_country'].".";
			$tmp3=$row['12th_school_city']." , ".$row['12th_school_state']." , ".$row['12th_school_country'].".";
			$tmp4=$row['undergraduation_city']." , ".$row['undergraduation_state']." , ".$row['undergraduation_country'].".";
			$tmp5=$row['postgraduation_city']." , ".$row['postgraduation_state']." , ".$row['postgraduation_country'].".";
			$tmp7=$row['working_city']." , ".$row['working_state']." , ".$row['working_country'].".";
			$tmp6=$row['prev_city']." , ".$row['prev_state']." , ".$row['prev_country'].".";
			$location=array();
			array_push($location,$tmp0);
				array_push($location,$tmp1);
					array_push($location,$tmp2);array_push($location,$tmp3);array_push($location,$tmp4);	
					array_push($location,$tmp5);	array_push($location,$tmp6);	array_push($location,$tmp7);
					
					$tmp=$timespan[0];
				if($tmp!="0-0")
				$var=explode("-",$tmp);
					$pastlocation=array();$currentlocation=array();$pasttimespan=array();$currenttimespan=array();
					/*for($i=0;$i<sizeof($timespan);$i++)
                    echo"<br> $timespan[$i]"; */
					/*for($i=0;$i<sizeof($location);$i++)
                    echo"<br> $location[$i]"; */
					for($i=0;$i<8;$i++)
					{ 
						$var1=explode("-",$timespan[$i]);
						if($var1[1]<$var[1] && $var1[1]!=0)
						{array_push($pastlocation,$location[$i]);
					array_push($pasttimespan,$timespan[$i]);}
					else if($var1[1]==$var[1] && $location[$i]!=$tmp0)
						{array_push($currentlocation,$location[$i]);
					array_push($currenttimespan,$timespan[$i]);}
					
						}
					/*for($i=0;$i<sizeof($pasttimespan);$i++)
                    echo"<br> $pasttimespan[$i]";*/
			?>
			
	
		<tr>	<td>Mobile Number  </td>
                <center><td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 30px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['phone_no']; ?></td></center>
            </tr>
            
			<tr>
                <td >Date of Birth</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['dob']; ?></td>
            </tr>
			<tr>
                <td>Gender</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;padding-left:7cm;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['gender']; ?></td>
            </tr>
<tr>
                <td>Interests</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;padding-left:7cm;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['interest']; ?></td>
            </tr>
			<tr>
                <td>Age</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo getAge($row['dob']); ?></td>
            </tr>
<tr>
                <td>Home town</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['hometown']; ?></td>
            </tr>
            
            <tr>
                <td>Place of Birth</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['place_of_birth']; ?></td>
            </tr>           
<tr>
                <td>Relationship Status</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['Relationship_status']; ?></td>
            </tr>
            <tr>
                <td>Languages Known</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['Language_known']; ?></td>
            </tr>
    <tr><td colspan="2"><center style='background:blue;'>Current Location</center></td></tr><br>
		   <tr>
			<td ><?php for($i=0;$i<sizeof($currenttimespan);$i++)
                    echo"<br> $currenttimespan[$i]";?></td>
				<td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 30px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php for($i=0;$i<sizeof($currentlocation);$i++)
                    echo"<br> $currentlocation[$i]";?></td>
			</tr>

            

            <tr><td colspan="2"><center style='background:red;'>Past Location</center></td></tr><br>
<tr>
			<td ><?php for($i=0;$i<sizeof($pasttimespan);$i++)
                    echo"<br> $pasttimespan[$i]";?></td>
				<td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 30px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php for($i=0;$i<sizeof($pastlocation);$i++)
                    echo"<br> $pastlocation[$i]";?></td>
			</tr>
            <br><br>
			<tr><td colspan="2"><center style='background:green;'>Education - info</center></td></tr><br>
            <tr>
                <td>Primary School Name</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['primary_school_name']; echo" , ";echo $row['primary_school_city'];echo" , ";echo $row['primary_school_state'];echo" , ";echo $row['primary_school_country'];  ?></td>
				
            </tr>
			<tr>
                
<tr>
                <td>Time Span of Primary</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['timespan_of_primary']; ?></td>
            </tr>


            <tr>
                <td>High School Name</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['10th_school_name'];echo" , ";echo $row['10th_school_city'];echo" , ";echo $row['10th_school_state'];echo" , "; echo $row['10th_school_country']; ?></td>
            </tr>
            <tr>

            <tr>
                <td>Time Span of high-school</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['timespan_of_10th']; ?></td>
            </tr>

 <tr>
                <td>Intermediate School Name</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['12th_school_name'];echo" , ";echo $row['12th_school_city'];echo" , "; echo $row['12th_school_state'];echo" , ";echo $row['12th_school_country'];?></td>
            </tr>
            
            <tr>
                <td>Time Span of intermediate-school</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['timespan_of_12th']; ?></td>
            </tr>
 <tr>
                <td>Under-Graduation College Name</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['ug_college_name'];echo" , ";echo $row['undergraduation_city'];echo" , "; echo $row['undergraduation_state'];echo" , ";echo $row['undergraduation_country'];  ?></td>
            </tr>
            

            <tr>
                <td>Time Span of Under-Graduation College</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['timespan_of_ug']; ?></td>
            </tr>
<tr>
                <td>Post-Graduation College Name</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['pg_college_name'];echo" , ";echo $row['postgraduation_city'];echo" , ";echo $row['postgraduation_state'];echo" , ";echo $row['postgraduation_country']; ?></td>
            </tr>
            

            <tr>
                <td>Time Span of Post-Graduation College</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['timespan_of_pg']; ?></td>
            </tr>
           <br><br> <tr><td colspan="2"><center style='background:pink;font-weight:900;font:Times new Roman;'>Employment - Details</center></td></tr><hr>
            <tr>
                <td>Previous(if any) Job Title</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['previous_job_title']; ?></td>
            </tr>
			<tr>
                <td>Previous Company Name</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['previous_company']; ?></td>
            </tr>
			<tr>
                <td>Past Working Location</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['prev_city'];echo" , ";echo $row['prev_state'];echo" , ";echo $row['prev_country']; ?></td>
            </tr>
			<tr>
                <td>Time Span of Working</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['timespan_of_working']; ?></td>
            </tr>
			<tr>
                <td>Current Job Title</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['current_job_title']; ?></td>
            </tr>
            <tr>
                <td>Current Company Name</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['current_company_name']; ?></td>
            </tr>
			<tr>
                <td>Current Working Location</td>
                <td style='font    : .9em/1.5em "handwriting", sans-serif;

  border  : none;
  padding : 0 90px;padding-left:7cm;
  margin  : 3px;
  width   : 450px;height:35px;
font-weight:bold;color:blue;
  background: orange;'><?php echo $row['working_city'];echo" , ";echo $row['working_state'];echo" , ";echo $row['working_country']; ?></td>
            </tr>
			
            
            </table>
        </div>
    </body>
</html>
