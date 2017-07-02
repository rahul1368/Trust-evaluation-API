<?php
    session_start();
    include './functions.php'; //$img=$_SESSION['img'];
    if(isset($_SESSION["uemail"])){
        $uemail=$_SESSION["uemail"];$uid=$_SESSION["uid"];
        try{
            $conn=connect('trustbook1'); 
            $stmt=$conn->prepare("select * from user_profile where email=:uemail");
            $stmt->execute(array('uemail'=>$uemail));
            $row=$stmt->fetch();
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
        <title>Profile</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/homepage.css">
    </head>
    <body>
        <div class="header">
            <h1><a href="home.php">trustbook</a></h1>
            <a href="timeline.php" style="color: white">
            <h3><?php echo $row[4]; ?></h3>
            <?php 
            /*if($row[13]=='blank'){
                echo "<img src='images/unknown.jpg' id='dp'style='height: 130px;width: 110px;border-radius: 6px;'/>";
            } */
            {
              //  echo "<img src='$img' id='dp' alt='img' style='height: 130px;width: 110px;border-radius: 6px;' />";
           $con=mysqli_connect("localhost","root","15061994","image"); 
		if($con==FALSE) {echo"Database Connection error in file home.php";}
		$statement="select * from storeimages where uid='$uid'";
		$result=mysqli_query($con,$statement);
		$ans=mysqli_fetch_assoc($result);
		$imageData=$ans['image'];
		$imageData="images/".$imageData; }
            ?>
			<img src='<?php echo $imageData; ?>' id='dp' alt='img' style='height: 130px;width: 110px;border-radius: 6px;'>
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
        <?php
            $uid=$_SESSION['uid'];
            $sql="select * from updates where uid=".$uid;
            foreach ($conn->query($sql) as $row1) {
                if($row1[2]==0){
                    echo "
                        <fieldset>
                        You wrote on your timeline.<br>"
                        .$row1[3]
                        ."</fieldset>
                        ";
                }
                elseif($row1[2]==1){
                    echo "
                        <fieldset>
                        You uploaded a photo to your timeline.<br>
                        <a href='picture.php?picid=".$row1[0]."' target='_blank'><img src='picture.php?picid=".$row1[0]."' alt='img' style='height: 200px;border-radius: 3px;'></a>
                        </fieldset>
                        ";
                }
                else{
                    echo "
                        <fieldset>
                        You uploaded a photo to your timeline.<br>"
                        .$row1[3]."<br>
                        <a href='picture.php?picid=".$row1[0]."' target='_blank'><img src='picture.php?picid=".$row1[0]."' alt='img' style='height: 200px;border-radius: 3px;'></a>
                        </fieldset>
                        ";
                }
            }
        ?>
        </div>
    </body>
</html>