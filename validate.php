<?php
    session_start();
    include_once './functions.php';
    $uemail=$_POST["uemail"];
    $password=$_POST["password"];
    try{
        $conn=connect('trustbook1'); 
        $stmt=$conn->prepare("select password,uid from user_profile where email=:uemail");
        $stmt->execute(array('uemail'=>$uemail));
        $row=$stmt->fetch();
        if(isset($row[0])&&$row[0]==$password){
            redirect('home.php');
            $_SESSION['uemail']=$uemail;
            $_SESSION['uid']=$row[1];
            $_SESSION['sender']=null;
        }
        else{ echo"Uncucesssfull";
            redirect('./facebook login.php'); 
        }
    }
    catch (PDOException $e){
        $e->getMessage();
    }
?>
