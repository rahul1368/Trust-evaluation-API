<?php
    include './functions.php';
    
    function countmutual($uid1,$uid2){
        try{
            $conn=connect('trustbook1');
            $conn->exec("TRUNCATE friend1");
            $conn->exec("TRUNCATE friend2");
            $stmt1="SELECT * FROM relationship WHERE (user_one_id = ".$uid1." OR user_two_id =".$uid1.") AND status = 1"; 
            $stmt2="SELECT * FROM relationship WHERE (user_one_id = ".$uid2." OR user_two_id =".$uid2.") AND status = 1";
            foreach ($conn->query($stmt1) as $row1) {                 
                 if($row1[0]==$uid1){
                     $friend1=$row1[1];
                 }
                 else {
                     $friend1=$row1[0];
                 }
                 $ins1=$conn->prepare("INSERT into friend1 values(:friendid)");
                 $ins1->execute(array('friendid'=>$friend1));
            }
            foreach ($conn->query($stmt2) as $row2) {                 
                 if($row2[0]==$uid2){
                     $friend2=$row2[1];
                 }
                 else {
                     $friend2=$row2[0];
                 }
                 $ins2=$conn->prepare("INSERT into friend2 values(:friendid)");
                 $ins2->execute(array('friendid'=>$friend2));
            }
            $count=0;
            $join="SELECT * FROM friend1,friend2 where friend1.friendid=friend2.friendid";
            foreach ($conn->query($join) as $row) {
                $count=$count+1;
            }
            echo $count;
            $conn->exec("TRUNCATE friend1");
            $conn->exec("TRUNCATE friend2");
        }
        catch(PDOException $e){
            $e->getMessage();
        }
    }
    countmutual(1,3);
?>
