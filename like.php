<?php
include_once 'functions.php';
try{
    $conn=connect('trustbook1');
    $stmt=$conn->prepare("select likes from updates where updateid=:updateid");
    $stmt->execute(array('updateid'=>$_GET["updateid"]));
    $row=$stmt->fetch();
    $like=$row[0]+1;
    $stmt1=$conn->prepare("update updates set likes=:likes where updateid=:updateid");
    $stmt1->execute(array('updateid'=>$_GET["updateid"],'likes'=>$like));
    redirect('home.php');
}
 catch (PDOException $e){
     echo $e->getMessage();
 }
?>
