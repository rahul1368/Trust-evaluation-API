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
       $uid=$rowdefault[0]; }
        catch (PDOException $e){
            $e->getMessage();
        } 
    }
    else{
        redirect('./index.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Friends list</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/homepage.css">
    </head>
    <body>
        <div class="header">
        <h1><a href="home.php">@trustbook</a></h1>
	<h3><?php echo $rowdefault[4]; ?></h3>
        <?php 
        /*if($rowdefault[13]=='blank'){
            echo "<img src='images/unknown.jpg' id='dp'style='height: 130px;width: 110px;border-radius: 6px;'/>";
        }*/
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
            <input type="name" name="key">
            <input type="submit" value="Search"/>
        </form>
        <a href="logout.php">Log out</a>
	</div>
        <div class="pagecontent">
        <table>
		<h1 style="color:green;padding-top:1px"><?php echo $rowdefault[4]; ?> , Here is your Friend List#</h1><hr/>
        <?php
            try{
                $stmt="SELECT * FROM relationship WHERE (user_one_id = ".$uid." OR user_two_id =".$uid.") AND status >= 0"; 
                $rishta=" ";           
                foreach ($conn->query($stmt) as $row) {                 
                 if($row[0]==$uid){
                     $friend=$row[1];
                 }
                 else {
                     $friend=$row[0];
                 }
                 if($row[2]==0)
                 {
                    $rishta="Close Friend";

                 }
                 else if($row[2]==1)
                 {
                    $rishta="Family";
                 }
                 else if($row[2]==2)
                 {
                    $rishta="Random";
                 }
				 else if($row[2]==3)
                 {
                    $rishta="Professional Friend";
                 }
				 else if($row[2]==4)
                 {
                    $rishta="College Friend";
                 }
				 else if($row[2]==5)
                 {
                    $rishta="School Friend";
                 }
				 else if($row[2]==6)
                 {
                    $rishta="Relative";
                 }
                 $con=mysqli_connect("localhost","root","15061994","image"); 
		if($con==FALSE) {echo"Database Connection error in file home.php";}
		$statement="select * from storeimages where uid='$friend'";
		$result=mysqli_query($con,$statement);
		$ans=mysqli_fetch_assoc($result);
		$imageData=$ans['image'];
		$imageData="images/".$imageData;
			//echo $imageData;	 
				 
				
                 $stmt1=$conn->prepare("select name,email from user_profile where uid=:uid");
                 $stmt1->execute(array('uid'=>$friend));
                 $row1=$stmt1->fetch();
                 
                 echo "<a href='friendprofile.php?uid=".$friend."'>".$row1[0]."<br>".$row1[1];
				 echo "<p> Relationship :    "   .$rishta."</p>";
                 echo '<img src="'.$imageData.'" height="130" width="130" />';
				 echo "</a>
                     <br><br><button><a href='unfriend.php?uid=".$friend."'>Unfriend</a></button>
                     </td>
                     <br>";
					 echo"<br>";
					  //echo"</td>";
				 echo "<td><a href='friendprofile.php?uid=".$friend."'>";
                 echo '</a></td>';
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
