<!DOCTYPE html>
<html>
<?php session_start(); ?>
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
    <head><style>#rahul{background-color:white;width:600px;height:450px;opacity:1;}
	#dp{width:600px;}</style>
<script type="text/javascript">
function populate(s1,s2)
{var s1=document.getElementById(s1);
var s2=document.getElementById(s2);
s2.innerHTML="";
if(s1.value=="0")
{var optionArray=["1000|None","1|Hometown","2|Place of Birth","5|Interests","6|Language Known","7|Relationship Status"]}
else if(s1.value=="3")
{var optionArray= ["1000|None","8|Past Location","4|Current Location"]}
else if(s1.value == "9")
	{var optionArray = ["1000|None","10|Primary Education","11|10th Education","12|12th Education","13|Undergraduate Education","14|Postgraduate Education"]}
else if(s1.value== "15")
{var optionArray= ["1000|None",,"16|Past Profession","17|Current Profession"]}
else if(s1.value== "1000")
{var optionArray= ["1000|None"]}
for(var option in optionArray){var pair = optionArray[option].split("|");
var newOption=document.createElement("option");
newOption.value= pair[0];
newOption.innerHTML= pair[1];
s2.options.add(newOption);
}
}



</script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Friends requests</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/homepage.css">
    </head>
    <body>
        <div class="header">
        <h1><a href="home.php">@trustbook</a></h1>
		<?php
    //session_start();
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
        
          $sender=$_POST['sender'];$count=0;
				
                 $con=mysqli_connect("localhost","root","15061994","image"); 
		if($con==FALSE) {echo"Database Connection error in file home.php";}
		$statement="select * from storeimages where uid='$sender'";
		$result=mysqli_query($con,$statement);
		$ans=mysqli_fetch_assoc($result);
		$imageData=$ans['image'];
		$imageData="images/".$imageData;
			//echo $imageData;	 
				 
				 echo "<tr><td><a href='friendprofile.php?uid=".$sender."'></a>";echo '<img src="'.$imageData.'" height="630" width="400"  />';

                 echo '</td><td>';   //echo"$img1";
                 $stmt1=$conn->prepare("select name,email from user_profile where uid=:uid");
                 $stmt1->execute(array('uid'=>$sender));
                 $row1=$stmt1->fetch();
                 echo "<a href='friendprofile.php?uid=".$sender."'>".$row1[0]."<br>".$row1[1];
			echo "</a><br>";
                     ?>

					 <div id="rahul">
					 <form action='confirmfriend.php' method='POST'>
                        <input type='hidden' name='sender' value=<?php echo $sender ?>>
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
                     <button><a href='declinerequest.php?uid=<?php echo $sender; ?>'>Decline</a></button>
					 <form action='mayank.php' method='POST' id='submitbutton' onsubmit='foo()'>
                        <input type='hidden' name='sender' value="<?php echo $sender;?>">
<h2> Choose your Preference 1:</h2>
<hr />
<select id="slct1" name="preference11" onchange="populate(this.id,'slct2')" style='background-color:yellow;' >
<option value="1000">None</option>
<option value="0">Profile Info</option>
<option value="3">Location</option>
<option value= "9"> Education </option>
<option value="15">Profession</option>

</select>
<select id="slct2" name="preference12"  onchange="populate1(this.id,'slct3')" style='background-color:#865;' ><option value="1000">None</option></select>


<h2> Choose your Preference 2:</h2>
<hr />
<select id="slct4" name="preference21" onchange="populate(this.id,'slct5')" style='background-color:yellow;'>
<option value="1000">None</option>
<option value="0">Profile Info</option>
<option value="3">Location</option>
<option value= "9"> Education </option>
<option value="15">Profession</option>

</select>
<select id="slct5" name="preference22" onchange="populate1(this.id,'slct6')" style='background-color:yellow;'><option value="1000" >None</option></select>



<h2> Choose your Preference 3:</h2>
<hr />
<select id="slct7" name="preference31" onchange="populate(this.id,'slct8')" style='background-color:orange;'>
<option value="1000">None</option>
<option value="0">Profile Info</option>
<option value="3">Location</option>
<option value= "9"> Education </option>
<option value="15">Profession</option>
</select>
<select id="slct8" name="preference32" onchange="populate1(this.id,'slct9')" style='background-color:blue;'><option value="1000">None</option></select>

<h2> Chooose your Preference 4:</h2>
<hr />
<select id="slct10" name="preference41" onchange="populate(this.id,'slct11')" style='background-color:green;'>
<option value="1000">None</option>
<option value="0">Profile Info</option>
<option value="3">Location</option>
<option value= "9"> Education </option>
<option value="15">Profession</option>
</select>
<select id="slct11" name="preference42" onchange="populate1(this.id,'slct12')" style='background-color:yellow;'><option value="1000">None</option></select>
<br><br>
<input type='submit' value='Evaluate Trust' style='font-weight:900;background-color:red;' ><br><br>  
</form><center><img id="img" src="images/loading1.gif" width="328" height="428" style='display:none'/>
		
</center></div>	</div>

                     </td>
                     <td>Mutuals :<?php echo $count; ?></td>
                     </tr> 
					 
					 
					 </table>
				 <script type="text/javascript">function foo(){//alert('Form has been submitted');
	 document.getElementById('img').className ='classname';
	 document.getElementById('submitbutton').style.display = "none";
document.getElementById('img').style.display = "block";
document.getElementById('rahul').style.display = "block";}</script>
					</body>
					 </html>