<?php
session_start();
include './functions.php';
$uid=$_POST['uid'];
$sender=$_POST['sender'];
 $conn=connect('trustbook1'); 
$po=$uid-1;
	            $stmt1="Select user_one_id AS user_id,status from relationship  where user_two_id=$uid && status>=0 && user_one_id<=$po UNION  (Select user_two_id AS user_id,status from relationship  where user_one_id=$uid && status>=0 && user_two_id>$uid)" ;
$stmt2="Select user_one_id AS user_id,status from relationship  where user_two_id=$sender && status>=0 && user_one_id<=$sender-1  UNION  (Select user_two_id AS user_id,status from relationship  where user_one_id=$sender && status>=0 && user_two_id>$sender)" ;

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

$con1=mysqli_connect("localhost","root","15061994","image"); 
		if($con1==FALSE) {echo"Database Connection error in file home.php";}
		$statement="select * from storeimages where uid='$row1[0]'";
		$result=mysqli_query($con1,$statement);
		$ans=mysqli_fetch_assoc($result);
		$imageData=$ans['image'];
		$imageData="images/".$imageData;
			//echo $imageData;	 
				 
				 echo "<tr><td><a href='friendprofile.php?uid=".$sender."'></a>";echo '<img src="'.$imageData.'" height="130" width="140"  />';



$con=mysqli_connect("localhost","root","15061994","trustbook1");
$sql="select name from user_profile where uid='$row1[0]'";
$retval=mysqli_query($con,$sql);
$ans=mysqli_fetch_assoc($retval);
 echo"     ";
echo $ans['name'];





                            if($row1[1]==0)
                            {
                              $close_friend_count=$close_friend_count+1;  
                        echo "   =  CLOSE FRIEND";    }
                            if($row1[1]==1)
                            {
                              $Family_count=$Family_count+1;   echo "   =  FAMILY FRIEND";
                            }
                            if($row1[1]==2)
                            {
                              $Random_count=$Random_count+1;  echo "   =  RANDOM FRIEND"; 
                            }
							if($row1[1]==3)
                            {
                              $Professional_friend_count=$Professional_friend_count+1;  echo "   =  PROFESSIONAL FRIEND"; 
                            }
							if($row1[1]==4)
                            {
                              $college_friend_count=$college_friend_count+1; echo "   =  COLLEGE FRIEND";  
                            }
							if($row1[1]==5)
                            {
                              $school_friend_count=$$school_friend_count+1;  echo "   =  SCHOOL FRIEND"; 
                            }
							if($row1[1]==6)
                            {
                              $Relatives_count=$Relatives_count+1;  echo "   =  RELATIVE"; 
                            }
} //outer if
echo"<br>";}  //inner loop

}
 //outer loop

/*if($Random_count!=0)	echo"Random-friend=$Random_count"; echo"<br>";			 
if($Relatives_count!=0)	 echo"Relatives=$Relatives_count";echo"<br>";
if($close_friend_count!=0)	 echo"Close-friend=$close_friend_count";echo"<br>";
if($college_friend_count!=0)	 echo"College-friend=$college_friend_count";echo"<br>";
	if($Professional_friend_count!=0) echo"Professional-friend=$Professional_friend_count";echo"<br>";
	if($school_friend_count!=0) echo"School-friend=$school_friend_count";echo"<br>";
	if($Family_count!=0) echo"Family-friend=$Family_count";echo"<br>"; */
	 
echo "<a href='pendingrequest.php' style='font-weight=bold;color=red;'>Press to Back</a> "	 ?>