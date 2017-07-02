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
    $conn=connect('trustbook1');
    $stmt=$conn->prepare("DELETE from relationship WHERE user_one_id =:user_one_id AND user_two_id = :user_two_id");
    $stmt->execute(array('user_one_id'=>$user_one_id,'user_two_id'=>$user_two_id));
    redirect('friends.php');
    }
    catch(PDOException $e){
     $e->getMessage();
    }
?>
