<?php
    include_once 'functions.php';
    session_start();
    $user_one_id=$_SESSION['uid'];
    $user_two_id=$_GET['uid'];
    if($user_one_id>$user_two_id){
        $temp=$user_one_id;
        $user_one_id=$user_two_id;
        $user_two_id=$temp;
    }
    try{
    $conn=connect('trustbook1');echo"User one id=$user_one_id";
	echo"<br>User two id=$user_two_id";
    $stmt=$conn->prepare("DELETE from relationship WHERE user_one_id =:user_one_id AND user_two_id = :user_two_id");
    $stmt->execute(array('user_one_id'=>$user_one_id,'user_two_id'=>$user_two_id));
	echo"Hi rahul";
    redirect('pendingrequest.php');
    }
    catch(PDOException $e){
     $e->getMessage();
    }
?>
