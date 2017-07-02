<?php
    session_start();
    include './functions.php';$img=$_SESSION['img'];
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
            echo "<img src='$img' id='dp' alt='img' style='height: 130px;width: 110px;border-radius: 6px;'>";
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
            try{//echo"at 62 END"; 
                if(empty($_POST['status']) and empty($_FILES['image']['name'])){//echo"at 63 END";
                    redirect('home.php');
                }
                elseif(empty($_FILES['image']['name'])){  //echo"at 66 END";                  
                    $status=$_POST["status"];//echo"<br> Status= $status , ID= $uid";
                    $sql='insert into updates (uid,type,text) values("'.$uid.'",0,"'.$status.'")';
					//$stmt1=$conn->prepare("insert into updates(uid,type,text) values(:uid,0,:status)");                           
                  //echo"at 69 error";
$con1=mysqli_connect("localhost", "root", "15061994", "trustbook1");//if($con1){echo"<br> Successfull Connection on  line 71 in updatestatus.php";}
$result=mysqli_query($con1,$sql);//if($result==False){echo"<br> Successfull Connection on  line 71 in updatestatus.php";}				  
				  //$stmt1->execute(array('uid'=>$uid,'status'=>$status));
                }
                elseif(empty($_POST['status'])){//echo"at 71 END";
                    $fp = file_get_contents($_FILES['image']['tmp_name']);
                    $fptype=$_FILES['image']['type'];
                    $stmtimg=$conn->prepare("insert into updates(uid,imgtype,img,type) values(:uid,:imgtype,:img,1)");                            
                    $stmtimg->execute(array('uid'=>$uid,'img'=>$fp,'imgtype'=>$fptype)) ;
                }
                else{//echo"at 77 END"; 
                    $status=$_POST["status"];
                    $fp = file_get_contents($_FILES['image']['tmp_name']);
                    $fptype=$_FILES['image']['type'];
                    $stmtimg=$conn->prepare("insert into updates(uid,imgtype,img,text,type) values(:uid,:imgtype,:img,:status,2)");                            
                    $stmtimg->execute(array('uid'=>$uid,'img'=>$fp,'imgtype'=>$fptype,'status'=>$status)) ;
                }
                    echo "
                        <center>
                            Timeline updated succesfully.<br> 
                            <b>Want to tag people?</b>
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
                         $stmtfrnd1=$conn->prepare("select name from user_profile where uid=:uid");
                         $stmtfrnd1->execute(array('uid'=>$friend));
                         $rowfrnd1=$stmtfrnd1->fetch();
                         echo "<option value='".$rowfrnd1[0]."'>";
                        }
                    }
                    catch (PDOException $e){
                        $e->getMessage();
                    }
                    echo "       </datalist>";
                    try{
                        $stmtpost=$conn->prepare("select updateid from updates where uid=:uid order by time desc");
                        $stmtpost->execute(array('uid'=>$uid));
                        $rowpost=$stmtpost->fetch();
                    }
                    catch (PDOException $e){
                        $e->getMessage();
                    }
                    echo "      <input type='hidden' name='updateid' value=".$rowpost[0].">".
                                "<input type='submit' value='Tag'>
                                </form>
                            </div>
                        </center>
                        ";
          //echo"END";  
		  }
            catch (PDOException $e){
                    $e->getMessage();
                }
            ?>
        </div>       
    </body>
</html>

