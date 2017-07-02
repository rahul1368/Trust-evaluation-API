<?php
    include_once 'functions.php';
    session_start();
    $sendto=$_GET["uid"];
    try{
        $conn=  connect('trustbook1');
        $stmt=$conn->prepare('select uid,name from user_profile where uid=:uid');
        $stmt->execute(array('uid'=>$sendto));
        $row=$stmt->fetch();
        $action_user_id=$_SESSION["uid"];
        $user_one_id=$row[0];
        if($user_one_id>$action_user_id){
            $user_two_id=$user_one_id;
            $user_one_id=$action_user_id;
        }
        else{
            $user_two_id=$action_user_id;
        } 
        $stmt1=$conn->prepare("insert into relationship(user_one_id,user_two_id,status,action_user_id) value(:user_one_id,:user_two_id,:status,:action_user_id)") ;
        $stmt1->execute(array('user_one_id'=>$user_one_id,'user_two_id'=>$user_two_id,'status'=>-1,'action_user_id'=>$action_user_id));
        redirect('findfriends.php?key=');
    }
    catch(PDOException $e){
        $e->getMessage();
        echo "Friend request couldn't be sent. May be you have already tried once. Be patient.";
        redirect('findfriends.php?key=');
    }
?>
