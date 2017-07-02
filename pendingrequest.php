<?php
    session_start();
    include './functions.php';

    if(isset($_SESSION["uemail"])){
        $uemail=$_SESSION["uemail"];
        $uid=$_SESSION['uid']; 
        try{
            $conn=connect('trustbook1'); 
            $stmtdefault=$conn->prepare("select * from user_profile where email=:uemail");
            $stmtdefault->execute(array('uemail'=>$uemail));
            $rowdefault=$stmtdefault->fetch();
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
        <title>Friends requests</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/homepage.css">
    <style type="text/css">
.classname { #img{display:hidden;}
#rahul{visibility:hidden;}
-webkit-animation-name: cssAnimation;
-webkit-animation-duration:3s;
-webkit-animation-iteration-count: 1;
-webkit-animation-timing-function: ease;
-webkit-animation-fill-mode: forwards;
}
@-webkit-keyframes cssAnimation {
from {
-webkit-transform: rotate(0deg) scale(1) skew(0deg) translate(100px);
}
to {
-webkit-transform: rotate(0deg) scale(2) skew(0deg) translate(100px);
}
}
</style>
	</head>
    <body>
        <div class="header">
        <h1><a href="home.php">@trustbook</a></h1>
		
	<h3><?php echo $rowdefault[4]; ?></h3>
        <?php 
       /* if($rowdefault[13]=='blank'){
             echo "<img src='images/unknown.jpg' alt='img' style='height: 130px;width: 110px;border-radius: 6px;' id='dp' />";
        }  */
        {
            //echo "<img src='$img' alt='img' style='height: 130px;width: 110px;border-radius: 6px;' id='dp' />";
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
            <input type="name" name="key">
            <input type="submit" value="Search"/>
        </form>
        <a href="logout.php">Log out</a>
	</div>
        <div class="pagecontent">
        <table>
        <?php
        
           /* try{
                $stmt3="SELECT * FROM relationship WHERE (user_one_id = ".$uid." OR user_two_id =".$uid.") AND status = 1";   
                $stmt4="SELECT * FROM relationship WHERE ("         
                foreach ($conn->query($stmt3) as $row) {                 
                 if($row[0]==$uid){
                     $friend=$row[1];
                 }
                 else {
                     $friend=$row[0];
                 }
                 echo "<tr><td><a href='friendprofile.php?uid=".$friend."'><img src='test1.php?uid=".$friend."' alt='image not available' height='200' width='180'>";
                 echo '</a></td><td>';
                 $stmt1=$conn->prepare("select name,email from userinfo where uid=:uid");
                 $stmt1->execute(array('uid'=>$friend));
                 $row1=$stmt1->fetch();
                 echo "<a href='friendprofile.php?uid=".$friend."'>".$row1[0]."<br>".$row1[1];
                 echo "</a>
                     <br><button><a href='unfriend.php?uid=".$friend."'>Unfriend</a></button>
                     </td>
                     </tr>";
                }
            }
            catch (PDOException $e){
                $e->getMessage();
            }*/
        
        try{
            $stmt="SELECT * FROM relationship WHERE (user_one_id = ".$uid." OR user_two_id =".$uid.") AND status = -1 AND action_user_id != ".$uid."";            
            foreach ($conn->query($stmt) as $row) {

                 
                 if($row[0]==$row[3]){
                     $sender=$row[0];
                 }
                 else {
                     $sender=$row[1];
                 }
              $po=$uid-1;  //echo"po=$po";
 $stmt1="Select user_one_id AS user_id,status from relationship  where user_two_id=$uid && status>=0 && user_one_id<=$po UNION  (Select user_two_id AS user_id,status from relationship  where user_one_id=$uid && status>=0 && user_two_id>$uid)" ;
$stmt2="Select user_one_id AS user_id,status from relationship  where user_two_id=$sender && status>=0 && user_one_id<=$sender-1  UNION  (Select user_two_id AS user_id,status from relationship  where user_one_id=$sender && status>=0 && user_two_id>$sender)" ;


/*foreach ($conn->query($stmt1) as $row1) { //echo"hi '$row1[0]'"; 
$con=mysqli_connect("localhost","root","15061994","trustbook1"); 
$gf='Insert into friend1(friendid,Type) values  ("'.$row1[0].'","'.$row1[1].'") ';
			$retval=mysqli_query($con,$gf);
			if ($retval === FALSE) {
    break;}
   }
//if($conn->query($stmt2) ==TRUE){echo"could not connect to database .";}
foreach ($conn->query($stmt2) as $row2) {$con=mysqli_connect("localhost","root","15061994","trustbook1"); 
$gf1='Insert into friend2(friendid,Type) values ("'.$row2[0].'","'.$row2[1].'")';
			$retval=mysqli_query($con,$gf1);
			if($retval==FALSE) {break;}     }  */

//echo"sender=$sender ";
 $count=0;
                 $Random_count=0;  $Professional_friend_count=0;
                 $college_friend_count=0; $close_friend_count=0;
                 $Family_count=0;
                 $school_friend_count=0;
                 $Relatives_count=0;
foreach ($conn->query($stmt1) as $row1)
{foreach ($conn->query($stmt2) as $row2)
	{if($row1[0]==$row2[0])
{$count=$count+1;
                            if($row1[1]==0)
                            {
                              $close_friend_count=$close_friend_count+1;  
                            }
                            if($row1[1]==1)
                            {
                              $Family_count=$Family_count+1;  
                            }
                            if($row1[1]==2)
                            {
                              $Random_count=$Random_count+1;  
                            }
							if($row1[1]==3)
                            {
                              $Professional_friend_count=$Professional_friend_count+1;  
                            }
							if($row1[1]==4)
                            {
                              $college_friend_count=$college_friend_count+1;  
                            }
							if($row1[1]==5)
                            {
                              $school_friend_count=$$school_friend_count+1;  
                            }
							if($row1[1]==6)
                            {
                              $Relatives_count=$Relatives_count+1;  
                            }
} //outer if
}  //inner loop

}
 //outer loop


			
                  /* echo"Random_count=$Random_count"; echo"<br>";			 
	 echo"Relatives_count=$Relatives_count";echo"<br>";
	 echo"Close_count=$close_friend_count";echo"<br>";
	 echo"College_count=$college_friend_count";echo"<br>";
	 echo"Professional_count=$Professional_friend_count";echo"<br>";
	 echo"School_count=$school_friend_count";echo"<br>";
	 echo"Family_count=$Family_count";echo"<br>";   */
	 
                 
				 
	 $total_mutual_friend = $close_friend_count + $Family_count + $Random_count+$college_friend_count+$Professional_friend_count+$school_friend_count+$Relatives_count;
				 if($total_mutual_friend !=0){
				 $family_weight=  0.5 *($Family_count/ $total_mutual_friend);
				 $close_friend_weight=  0.3 *($close_friend_count/ $total_mutual_friend);
				 $college_friend_weight=  0.2 *($college_friend_count/ $total_mutual_friend);
				 $school_friend_weight=  0.2 *($school_friend_count/ $total_mutual_friend);
				 $Professional_friend_weight=  0.2 *($Professional_friend_count/ $total_mutual_friend);
				 $Random_friend_weight=  0.02 *($Random_count/ $total_mutual_friend);
				 $Relatives_friend_weight=  0.4 *($Relatives_count/ $total_mutual_friend);
				 }
				 else{
					$family_weight =0;
					$college_friend_weight =0;
					$school_friend_weight =0;
					$Professional_friend_weight=  0;
					$Random_friend_weight=0;
					 $Relatives_friend_weight= 0;
					 $close_friend_weight=  0;
				 }
				  
				 $mutual_friend_factor= 0.33;
				 $mutual_friends_weight = $mutual_friend_factor *($family_weight + $college_friend_weight + $school_friend_weight+$Professional_friend_weight+
				 $Random_friend_weight+ $Relatives_friend_weight+$close_friend_weight);
//echo"Mutual_friend weight=$mutual_friends_weight";
                // echo"at 195 sender=  $sender";
				
                 $con=mysqli_connect("localhost","root","15061994","image"); 
		if($con==FALSE) {echo"Database Connection error in file home.php";}
		$statement="select * from storeimages where uid='$sender'";
		$result=mysqli_query($con,$statement);
		$ans=mysqli_fetch_assoc($result);
		$imageData=$ans['image'];
		$imageData="images/".$imageData;
			//echo $imageData;	 
				 
				 echo "<tr><td><a href='friendprofile.php?uid=".$sender."'></a>";echo '<img src="'.$imageData.'" height="130" width="150"  />';

                 echo '</td><td>';   //echo"$img1";
                 $stmt1=$conn->prepare("select name,email from user_profile where uid=:uid");
                 $stmt1->execute(array('uid'=>$sender));
                 $row1=$stmt1->fetch();
                 echo "<a href='friendprofile.php?uid=".$sender."'>".$row1[0]."<br>".$row1[1];
                 /*echo "</a><br>
                     
                     <form action='confirmfriend.php' method='POST'>
                        <input type='hidden' name='sender' value=".$sender.">
                        Choose circle
                        <select name='circle' style='background:yellow;font-weight:900;'>
                            <option value='0'>Close_Friend</option>
                            <option value='1'>Family</option>
                            <option value='2'>Random</option>
							<option value='3'>Professional_Friend</option>
                            <option value='4'>College_Friend</option>
                            <option value='5'>School_friend</option>
							<option value='6'>Relatives</option>
                            
                            
                        </select>
                        <input type='submit' value='Confirm'>
                     </form>
                     <button><a href='declinerequest.php?uid=".$sender."'>Decline</a></button>
                     <form action='mayank.php' method='POST' id='submitbutton' onsubmit='foo()'>
                        <input type='hidden' name='sender' value=".$sender.">
                        Preference for trust calculation
                        <br>
                        
                        <select name='preference1' style='background:yellow;font-weight:900;>
                            <option value='0'>Thing</option>
                            <option value='1'>Profile_info</option>
                            <option value='2'>Hometown</option>
                            <option value='3'>Location</option>
                            <option value='4'>Current_Location</option>
                            <option value='5'>Current_city</option>
							<option value='6'>Current_state</option>
							<option value='7'>Current_country</option>
							<option value='8'>Past_Location</option>
							<option value='9'>Past_city</option>
                            <option value='10'>Past_state</option>
                            <option value='11'>Past_country</option>
							<option value='12'>Education</option>
						    <option value='13'>Primary_Education</option>
							<option value='14'>Primary_School_Name</option>
							<option value='15'>Primary_School_City</option>
                            <option value='16'>Primary_School_State</option>
							<option value='17'>Primary_School_Country</option>
						    <option value='18'>Primary_School_Timespan</option>
                            <option value='19'>High_School_Education</option>
							<option value='20'>High_School_Name</option>
                          <option value='21'>High_School_city</option>
						  <option value='22'>High_School_state</option>
							<option value='23'>High_School_Country</option>
						    <option value='24'>High_School_Timespan</option>
							<option value='25'>Intermediate_School_Education</option>
							<option value='26'>Intermediate_School_Name</option>
                          <option value='27'>Intermediate_School_city</option>
						  <option value='28'>Intermediate_School_state</option>
							<option value='29'>Intermediate_School_Country</option>
						    <option value='30'>Intermediate_School_Timespan</option>
							<option value='31'>Undergraduate_Education</option>
							<option value='32'>Undergraduate_College_Name</option>
                          <option value='33'>Undergraduate_College_city</option>
						  <option value='34'>Undergraduate_College_state</option>
							<option value='35'>Undergraduate_College_Country</option>
						    <option value='36'>Undergraduate_College_Timespan</option>
							<option value='37'>Postgraduate_Education</option>
							<option value='38'>Postgraduate_College_Name</option>
                          <option value='39'>Postgraduate_College_city</option>
						  <option value='40'>Postgraduate_College_state</option>
							<option value='41'>Postgraduation_College_Country</option>
						    <option value='42'>Postgraduate_College_Timespan</option>
							<option value='43'>Profession</option>
							<option value='44'>Past_Profession</option>
                          <option value='45'>Past_Job_Title</option>
						  <option value='46'>Past_Company_Name</option>
							<option value='47'>Past_profession_timespan</option>
						    <option value='48'>Current_profession</option>
							<option value='49'>Current_Job_Title</option>
						  <option value='50'>Current_Company_Name</option>
						  <option value='51'>Working_city</option>
						  <option value='52'>Working_state</option>
							<option value='53'>Working_Country</option>
							<option value='54'>Relationship_Status</option>
						  <option value='55'>Languages_Known</option>
							<option value='1000'  selected>None</option>
							

                        </select>
                        <br><br>
                        
                         <select name='preference2' style='background:green;font-weight:900;>
                            <option value='0'>Thing</option>
                            <option value='1'>Profile_info</option>
                            <option value='2'>Hometown</option>
                            <option value='3'>Location</option>
                            <option value='4'>Current_Location</option>
                            <option value='5'>Current_city</option>
							<option value='6'>Current_state</option>
							<option value='7'>Current_country</option>
							<option value='8'>Past_Location</option>
							<option value='9'>Past_city</option>
                            <option value='10'>Past_state</option>
                            <option value='11'>Past_country</option>
							<option value='12'>Education</option>
						    <option value='13'>Primary_Education</option>
							<option value='14'>Primary_School_Name</option>
							<option value='15'>Primary_School_City</option>
                            <option value='16'>Primary_School_State</option>
							<option value='17'>Primary_School_Country</option>
						    <option value='18'>Primary_School_Timespan</option>
                            <option value='19'>High_School_Education</option>
							<option value='20'>High_School_Name</option>
                          <option value='21'>High_School_city</option>
						  <option value='22'>High_School_state</option>
							<option value='23'>High_School_Country</option>
						    <option value='24'>High_School_Timespan</option>
							<option value='25'>Intermediate_School_Education</option>
							<option value='26'>Intermediate_School_Name</option>
                          <option value='27'>Intermediate_School_city</option>
						  <option value='28'>Intermediate_School_state</option>
							<option value='29'>Intermediate_School_Country</option>
						    <option value='30'>Intermediate_School_Timespan</option>
							<option value='31'>Undergraduate_Education</option>
							<option value='32'>Undergraduate_College_Name</option>
                          <option value='33'>Undergraduate_College_city</option>
						  <option value='34'>Undergraduate_College_state</option>
							<option value='35'>Undergraduate_College_Country</option>
						    <option value='36'>Undergraduate_College_Timespan</option>
							<option value='37'>Postgraduate_Education</option>
							<option value='38'>Postgraduate_College_Name</option>
                          <option value='39'>Postgraduate_College_city</option>
						  <option value='40'>Postgraduate_College_state</option>
							<option value='41'>Postgraduation_College_Country</option>
						    <option value='42'>Postgraduate_College_Timespan</option>
							<option value='43'>Profession</option>
							<option value='44'>Past_Profession</option>
                          <option value='45'>Past_Job_Title</option>
						  <option value='46'>Past_Company_Name</option>
							<option value='47'>Past_profession_timespan</option>
						    <option value='48'>Current_profession</option>
							<option value='49'>Current_Job_Title</option>
						  <option value='50'>Current_Company_Name</option>
						  <option value='51'>Working_city</option>
						  <option value='52'>Working_state</option>
							<option value='53'>Working_Country</option>
							<option value='54'>Relationship_Status</option>
						  <option value='55'>Languages_Known</option>
							<option value='1000'  selected>None</option>

                        </select>
                        <br><br>
                        
                         <select name='preference3' style='background:purple;font-weight:900;>
                          <option value='0'>Thing</option>
                            <option value='1'>Profile_info</option>
                            <option value='2'>Hometown</option>
                            <option value='3'>Location</option>
                            <option value='4'>Current_Location</option>
                            <option value='5'>Current_city</option>
							<option value='6'>Current_state</option>
							<option value='7'>Current_country</option>
							<option value='8'>Past_Location</option>
							<option value='9'>Past_city</option>
                            <option value='10'>Past_state</option>
                            <option value='11'>Past_country</option>
							<option value='12'>Education</option>
						    <option value='13'>Primary_Education</option>
							<option value='14'>Primary_School_Name</option>
							<option value='15'>Primary_School_City</option>
                            <option value='16'>Primary_School_State</option>
							<option value='17'>Primary_School_Country</option>
						    <option value='18'>Primary_School_Timespan</option>
                            <option value='19'>High_School_Education</option>
							<option value='20'>High_School_Name</option>
                          <option value='21'>High_School_city</option>
						  <option value='22'>High_School_state</option>
							<option value='23'>High_School_Country</option>
						    <option value='24'>High_School_Timespan</option>
							<option value='25'>Intermediate_School_Education</option>
							<option value='26'>Intermediate_School_Name</option>
                          <option value='27'>Intermediate_School_city</option>
						  <option value='28'>Intermediate_School_state</option>
							<option value='29'>Intermediate_School_Country</option>
						    <option value='30'>Intermediate_School_Timespan</option>
							<option value='31'>Undergraduate_Education</option>
							<option value='32'>Undergraduate_College_Name</option>
                          <option value='33'>Undergraduate_College_city</option>
						  <option value='34'>Undergraduate_College_state</option>
							<option value='35'>Undergraduate_College_Country</option>
						    <option value='36'>Undergraduate_College_Timespan</option>
							<option value='37'>Postgraduate_Education</option>
							<option value='38'>Postgraduate_College_Name</option>
                          <option value='39'>Postgraduate_College_city</option>
						  <option value='40'>Postgraduate_College_state</option>
							<option value='41'>Postgraduation_College_Country</option>
						    <option value='42'>Postgraduate_College_Timespan</option>
							<option value='43'>Profession</option>
							<option value='44'>Past_Profession</option>
                          <option value='45'>Past_Job_Title</option>
						  <option value='46'>Past_Company_Name</option>
							<option value='47'>Past_profession_timespan</option>
						    <option value='48'>Current_profession</option>
							<option value='49'>Current_Job_Title</option>
						  <option value='50'>Current_Company_Name</option>
						  <option value='51'>Working_city</option>
						  <option value='52'>Working_state</option>
							<option value='53'>Working_Country</option>
							<option value='54'>Relationship_Status</option>
						  <option value='55'>Languages_Known</option>
							<option value='1000'  selected>None</option>

                        </select>
                        <br><br>
                         <select name='preference4' style='background:red;font-weight:900;>
                           <option value='0'>Thing</option>
                            <option value='1'>Profile_info</option>
                            <option value='2'>Hometown</option>
                            <option value='3'>Location</option>
                            <option value='4'>Current_Location</option>
                            <option value='5'>Current_city</option>
							<option value='6'>Current_state</option>
							<option value='7'>Current_country</option>
							<option value='8'>Past_Location</option>
							<option value='9'>Past_city</option>
                            <option value='10'>Past_state</option>
                            <option value='11'>Past_country</option>
							<option value='12'>Education</option>
						    <option value='13'>Primary_Education</option>
							<option value='14'>Primary_School_Name</option>
							<option value='15'>Primary_School_City</option>
                            <option value='16'>Primary_School_State</option>
							<option value='17'>Primary_School_Country</option>
						    <option value='18'>Primary_School_Timespan</option>
                            <option value='19'>High_School_Education</option>
							<option value='20'>High_School_Name</option>
                          <option value='21'>High_School_city</option>
						  <option value='22'>High_School_state</option>
							<option value='23'>High_School_Country</option>
						    <option value='24'>High_School_Timespan</option>
							<option value='25'>Intermediate_School_Education</option>
							<option value='26'>Intermediate_School_Name</option>
                          <option value='27'>Intermediate_School_city</option>
						  <option value='28'>Intermediate_School_state</option>
							<option value='29'>Intermediate_School_Country</option>
						    <option value='30'>Intermediate_School_Timespan</option>
							<option value='31'>Undergraduate_Education</option>
							<option value='32'>Undergraduate_College_Name</option>
                          <option value='33'>Undergraduate_College_city</option>
						  <option value='34'>Undergraduate_College_state</option>
							<option value='35'>Undergraduate_College_Country</option>
						    <option value='36'>Undergraduate_College_Timespan</option>
							<option value='37'>Postgraduate_Education</option>
							<option value='38'>Postgraduate_College_Name</option>
                          <option value='39'>Postgraduate_College_city</option>
						  <option value='40'>Postgraduate_College_state</option>
							<option value='41'>Postgraduation_College_Country</option>
						    <option value='42'>Postgraduate_College_Timespan</option>
							<option value='43'>Profession</option>
							<option value='44'>Past_Profession</option>
                          <option value='45'>Past_Job_Title</option>
						  <option value='46'>Past_Company_Name</option>
							<option value='47'>Past_profession_timespan</option>
						    <option value='48'>Current_profession</option>
							<option value='49'>Current_Job_Title</option>
						  <option value='50'>Current_Company_Name</option>
						  <option value='51'>Working_city</option>
						  <option value='52'>Working_state</option>
							<option value='53'>Working_Country</option>
							<option value='54'>Relationship_Status</option>
						  <option value='55'>Languages_Known</option>
							<option value='1000'  selected>None</option>

                        </select><br><br>
  
					
                        <input type='submit' value='Calculate Trust' style='font-weight:900;' ><br><br>
                  
  
</form>

                     </td>
                     <td>Mutuals : ".$count."</td>
                     </tr>";*/
				//echo'<img id="img" src="images/brad4.jpg" width="328" height="328" />';
				
				echo"<form action='modifiedpendingrequest.php' method='POST'>
                        <input type='hidden' name='sender' value=".$sender.">
                        <br>
                       
                        <input type='submit' value=' Trust Evaluation '>
                     </form> ";
				echo"<form action='showmutualfriends.php' method='POST'>
                        <input type='hidden' name='uid' value=".$uid.">
                        <input type='hidden' name='sender' value=".$sender.">
						<br>
                       
                        <input type='submit' value='See Mutual friends '>
                     </form> ";
				
				echo"<td>Mutuals : ".$count."</td>";
$sql1="Truncate friend1";$con1=mysqli_connect("localhost","root","15061994","trustbook1");
$retval1=mysqli_query($con1,$sql1);	   
if($retval1==FALSE){echo" Not Suceesfull";}
 $sql2="Truncate friend2";
 $con2=mysqli_connect("localhost","root","15061994","trustbook1");
$retval2=mysqli_query($con2,$sql2);	   
if($retval2==FALSE){echo" Not Suceesfull";}       
	   //echo"hloo";
		}
       
 //redirect('./smatch/bin/test81.php');
 if(isset($_POST['submit'])){
    echo"<td id='rahul' style ='display:hidden'> Please wait , process can take few second to evaluate results....</td>"; //tables will shown only after submitted
}}
        catch (PDOException $e){
            $e->getMessage();
        }
        ?>
        </table><center><img id="img" src="images/loading1.gif" width="328" height="328" style='display:none'/>
		
</center>
        </div>
	<script type="text/javascript">function foo(){//alert('Form has been submitted');
	 document.getElementById('img').className ='classname';
	 document.getElementById('submitbutton').style.display = "none";
document.getElementById('img').style.display = "block";
document.getElementById('rahul').style.display = "block";}</script>
    </body>
</html>
