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
        <title>Find Friends</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/homepage.css">
    </head>
    <body>
        <div class="header">
        <h1><a href="home.php">@trustbook</a></h1>
	<h3><?php echo $rowdefault[4]; ?></h3>
        <?php 
        /*if($rowdefault[13]=='blank'){
            echo "<img src='images/unknown.jpg' id='dp'style='height: 130px;width: 110px;border-radius: 6px;'/>";
        } */
        {
            //echo "<img src='test.php' alt='img' style='height: 130px;width: 110px;border-radius: 6px;' id='dp'>";
       
                 $con=mysqli_connect("localhost","root","15061994","image"); 
		if($con==FALSE) {echo"Database Connection error in file home.php";}
		$statement="select * from storeimages where uid='$uid'";
		$result=mysqli_query($con,$statement);
		$ans=mysqli_fetch_assoc($result);
		$imageData=$ans['image'];
		$imageData="images/".$imageData;
			//echo $imageData;	 
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
                $key=$_GET['key'];
                echo $key;
                try{   
                 $con=mysqli_connect("localhost","root","15061994","image"); 
		if($con==FALSE) {echo"Database Connection error in file home.php";}
		
                    $stmt="select name,email,uid from user_profile where name LIKE '%".$key."%'";
                    foreach ($conn->query($stmt) as $row) { $statement="select * from storeimages where uid='$row[2]'";
		$result=mysqli_query($con,$statement);
		$ans=mysqli_fetch_assoc($result);
		$imageData=$ans['image'];
		$imageData="images/".$imageData;
			//echo $imageData;	                 
                        if($_SESSION["uid"]==$row[2]);
                        else{
                            $user_one_id=$_SESSION['uid'];
                            $user_two_id=$row[2];
                            if($user_one_id>$user_two_id){
                                $temp=$user_one_id;
                                $user_one_id=$user_two_id;
                                $user_two_id=$temp;
                            }
                            $stmt1=$conn->prepare("select status,action_user_id from relationship where user_one_id=:user_one_id and user_two_id=:user_two_id");
                            $stmt1->execute(array('user_one_id'=>$user_one_id,'user_two_id'=>$user_two_id));
                            $row1=$stmt1->fetch();
                            if($row1){
                                if($row1[0]>=0){
                                    echo "<tr><td><a href='friendprofile.php?uid=".$row[2]."'>";echo"<td>";echo '<img src="'.$imageData.'" height="130" width="130" radius="10" />';echo"</td>";
                                    echo '</a></td><td>';
                                    echo "<a href='friendprofile.php?uid=".$row[2]."'>".$row[0]."</a><br>".$row[1]."<br>Friends";
                                    echo "</td>
                                        </tr>";
                                }
                                /*else if($row1[0]==-1){
                                    echo "<tr><td><a href='friendprofile.php?uid=".$row[2]."'><img src='test1.php?uid=".$row[2]."' alt='image not available' height='200' width='180'>";
                                    echo '</a></td><td>';
                                    echo "<a href='friendprofile.php?uid=".$row[2]."'>".$row[0]."</a><br>".$row[1]."<br><button><a href='friendrequest.php?uid=".$row[2]."'>Send friend request</a></button>";
                                    echo "</td>
                                        </tr>";
                                }  */
                                else{
                                    if($row1[0]==-1&&$row1[1]==$uid){
                                        echo "<tr><td><a href='friendprofile.php?uid=".$row[2]."'>";echo"<td>";echo '<img src="'.$imageData.'" height="130" width="130" radius="10" />';echo"</td>";
                                        echo '</a></td><td>';
                                        echo "<a href='friendprofile.php?uid=".$row[2]."'>".$row[0]."</a><br>".$row[1]."<br>Friend request sent.";
                                        echo "</td>
                                            </tr>";
                                    }
                                    else{
                                        echo "<tr ><td><a href='friendprofile.php?uid=".$row[2]."'>";echo"<td>";echo '<img src="'.$imageData.' " height="130" width="130" radius="10" />';echo"</td>";
                                        echo '</td></a><td>';
                                        echo "<a href='friendprofile.php?uid=".$row[2]."'>".$row[0]."</a><br>".$row[1]."<br><button><a href='confirmfriend.php?uid=".$row[2]."'>Confirm</a></button><br>
                                             <button ><a href='declinerequest.php?uid=".$row[2]."'>Decline</a></button>";
                                        echo "</td>
                                            </tr>";
                                    }
                                } 
                            }
                            else{
                                echo "<tr><td><a href='friendprofile.php?uid=".$row[2]."'>";echo"<td>";echo '<img src="'.$imageData.'"  height="130" width="130" radius="10" />';echo"</td>";
                                echo '</td></a><td>';
                                echo "<a href='friendprofile.php?uid=".$row[2]."'>".$row[0]."</a><br>".$row[1]."<br><button><a href='friendrequest.php?uid=".$row[2]."'>Send friend request</a></button>";
                                echo "</td>
                                    </tr>";
                            }
                        }
                    }
                }
                catch (PDOException $e){
                    $e->getMessage();
                }
            ?>
        </table>
        </div>
    </body>
</html>
