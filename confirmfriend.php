<?php
    include_once 'functions.php';
    session_start();
    $user_one_id=$_SESSION['uid'];
   // $user_two_id=$_GET['uid'];
    $user_two_id=$_POST['sender'];
    //echo "<p>".$user_two_id."</p";
    if($user_one_id>$user_two_id){
        $temp=$user_one_id;
        $user_one_id=$user_two_id;
        $user_two_id=$temp;
    }
    try{
        $circle=$_POST['circle'];
        echo "<p> Friend request sender id:=".$user_two_id."</p>"; //echo"<br>";
        echo "<p> Friend request receiver id:=".$user_one_id."</p>";
    $conn=mysqli_connect("localhost","root","15061994","trustbook1"); 
    $stmt='UPDATE relationship SET user_one_id="'.$user_one_id.'",user_two_id="'.$user_two_id.'",status="'.$circle.'",action_user_id="'.$user_one_id.'" where user_one_id="'.$user_one_id.'" AND user_two_id="'.$user_two_id.'" ';
   $result=mysqli_query($conn,$stmt);
	if($result) { echo "hi $circle";}
     redirect('pendingrequest.php');
    }
    catch(PDOException $e){
     $e->getMessage();
    }
    
?>
