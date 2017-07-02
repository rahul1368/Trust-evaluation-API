<?php
    session_start();
    include './functions.php';
    if(isset($_SESSION["uid"])){
        $uid=$_SESSION["uid"];
        try{
            $conn=connect('trustbook1'); 
            $stmt=$conn->prepare("select * from user_profile where uid=:uid");
            $stmt->execute(array('uid'=>$uid));
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
        <title>Trustbook</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/homepage.css">
        <script type="text/javascript" src="jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#tagbox").hide();
                $("#yestag").click(function(){
                    $("#tagbox").show();
                });
            });
        </script>
    </head>
    <body>
        <div class="header">
            <h1><a href="home.php">@trustbook</a></h1>
	<h3><?php echo $row[4]; ?></h3>
        <?php 
        if($row[13]=='blank'){
            echo "<img src='images/unknown.jpg' id='dp'style='height: 130px;width: 110px;border-radius: 6px;'/>";
        }
        else{
            echo "<img src='test.php' id='dp' alt='img' style='height: 130px;width: 110px;border-radius: 6px;'>";
        }
        ?>
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
                echo "<br><br><br>
                        <center>
                            User tagged succesfully.<br> 
                            <b>Want to tag more people?</b>
                            <button id='yestag'>Yes</button>
                            <a href='home.php'><button>No</button></a>
                            <br>
                            <div id='tagbox'>
                                <form method='POST' action='taguser.php'>
                                <input type='text' name='taguser' list='frndlist'>
                                <datalist id='frndlist'>";
                    try{
                        $stmtfrnd="SELECT * FROM relationship WHERE (user_one_id = ".$uid." OR user_two_id =".$uid.") AND status = 1";            
                        foreach ($conn->query($stmtfrnd) as $rowfrnd) {                 
                         if($rowfrnd[0]==$uid){
                             $friend=$rowfrnd[1];
                         }
                         else {
                             $friend=$rowfrnd[0];
                         }
                         $stmtfrnd1=$conn->prepare("select name from userinfo where uid=:uid");
                         $stmtfrnd1->execute(array('uid'=>$friend));
                         $rowfrnd1=$stmtfrnd1->fetch();
                         echo "<option value='".$rowfrnd1[0]."'>";
                        }
                    }
                    catch (PDOException $e){
                        $e->getMessage();
                    }
                    echo "       </datalist>";
                    echo "      <input type='hidden' name='updateid' value=".$_GET['updateid'].">".
                                "<input type='submit' value='Tag'>
                                </form>
                            </div>
                        </center>
                        ";
            ?>
        </div>       
    </body>
</html>

