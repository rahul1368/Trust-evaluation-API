<?php
    include_once 'functions.php';
    session_start();
    $tagname=$_POST["taguser"];
    $updateid=$_POST["updateid"];
	$userid=$_SESSION["uid"]; echo"at 6 $updateid";
    try{ 
        $conn=connect('trustbook1');
        $stmt=$conn->prepare("select uid from user_profile where name=:name");
        $stmt->execute(array('name'=>$tagname));
        $row=$stmt->fetch(); //echo"$row[0]";
        $sql='insert into tag (updateid,taguid,uid) values("'.$updateid.'","'.$row[0].'","'.$userid.'")';
        $con1=mysqli_connect("localhost", "root", "15061994", "trustbook1");if($con1){echo"<br> Successfull Connection on  line 71 in updatestatus.php";}
$result=mysqli_query($con1,$sql);if($result==False){echo"<br> not Successfull Connection on  line 71 in updatestatus.php";}			
		$stmt1->execute(array('updateid'=>$updateid,'taguid'=>$row[0],'uid'=>$_SESSION['uid']));echo"Hi";
        redirect("tagmore.php?updateid=".$updateid);
    }
    catch (PDOException $e){
        echo "Can't tag the user.<a href='tagmore.php?updateid=".$updateid."'>Try another user.</a>";
    }
?>