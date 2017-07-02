<?php
    session_start();
    include './functions.php'; //include './test.php';

    if(isset($_SESSION["uemail"])){
        $uemail=$_SESSION["uemail"];
        try{
            $conn=connect('trustbook1'); 
            $stmt=$conn->prepare("select * from user_profile where email=:uemail");
            $stmt->execute(array('uemail'=>$uemail));
            $row=$stmt->fetch();
			//echo "$row[4]";
      $uid=$row[0];  }
        catch (PDOException $e){
            $e->getMessage();echo"error is there";
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
        <title>Trustbook</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/homepage.css">
    </head>
    <body>
        <div class="header">
            <h1><a href="home.php">@trustbook</a></h1>
            <a href="timeline.php" style="color: white">
            <h3><?php echo $row[4]; ?></h3>
            <?php 
           /* if($row[13]=='blank'){
                echo "<img src='images/unknown.jpg' id='dp'style='height: 130px;width: 110px;border-radius: 6px;'/>";
            }   */
            {
                //echo "<img src='DisplayPhoto.php' id='dp' alt='img' style='height: 130px;width: 110px;border-radius: 6px;'>";
          
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
                </a>
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
            <div class="update">
            <form action="updatestatus.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
					<h1 style="color:red;padding-top:10px"><?php echo $row[4]; ?> , Welcome @ Your Homepage #</h1><style>td.myclass
{  
        font-family:Times New Roman;
	color :black;background-color:white;
	padding-left:20px;font-weight:900;
	height: 10px;
	margin-top:10px;
	padding-top:10px;
	font-size:15px;
}</style>
                        <td class='myclass'>What's on your mind:</td><hr>
                        <td><textarea name="status" rows="5" cols="110"></textarea></td>
                    </tr>
                    <tr>
                        <td class='myclass'>Want to upload a pic?</td>
                        <td><input style="color:red;"type="file" name="image"/></td>
                    </tr>
                    <tr><td colspan="2" align="center"><input type="submit" value="Upload"/></td></tr>
                </table>
            </form>  
            </div>
            <?php
                 //echo "code starts here $row[4]";
				$sql="select * from updates,user_profile where updates.uid=user_profile.uid order by updates.time DESC";
                foreach ($conn->query($sql) as $row1) {  //echo "code starts here  $row1[12]";
                    echo "<fieldset>";
                    if($row1[2]==0){
                        echo $row1[12]." wrote on his timeline.<br>"
                            .$row1[3]
                            ."<br><a href='like.php?updateid=".$row1[0]."'>Like</a>".$row1[6];
                    }
                    elseif($row1[2]==1){
                        echo $row1[12]." uploaded a photo to his timeline.<br>
                            <a href='picture.php?picid=".$row1[0]."' target='_blank'><img src='picture.php?picid=".$row1[0]."' alt='img' style='height: 200px;border-radius: 3px;'></a>
                            <br><a href='like.php?updateid=".$row1[0]."'>Like</a>".$row1[6];
                    }
                    else{
                        echo $row1[12]." uploaded a photo to his timeline.<br>"
                            .$row1[3]."<br>
                            <a href='picture.php?picid=".$row1[0]."' target='_blank'><img src='picture.php?picid=".$row1[0]."' alt='img' style='height: 200px;border-radius: 3px;'></a>
                            <br><a href='like.php?updateid=".$row1[0]."'>Like</a>".$row1[6];
                    }
                    echo "<br>
                               <fieldset>
                                <form action='comment.php' method='POST'>
                                    <input type='text' id = 'comment' name='comment' placeholder='Write a comment!!' >
                                    <input type='hidden' name='updateid' value='".$row1[0]."'>
									<input type='hidden' name='uid' value='".$row[0]."'>
                                    <input type='submit' value = 'Comment'>
                                 </form>";
                    $sql1 = "select * from comment where updateid =".$row1[0];   // This for listing all the comments for a post
                    foreach ($conn->query($sql1) as $row2) {
                        $stmt2=$conn->prepare("select name from user_profile where uid=:uid");
                        $stmt2->execute(array('uid'=>$row2[2]));
                        $row3=$stmt2->fetch();
                        
                        echo"<br>
                            <b>".$row3[0]."</b> : ".$row2[3]."<br>";
                    }
                    echo " 
                                </fieldset>
                        </fieldset>";
            }
            ?>
        </div>       
    </body>
</html>
