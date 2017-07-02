<?php
//echo"<br> Comment php file";
include_once 'functions.php';
try{ //$_POST["updateid"]=1; echo"<br> Comment php file";
//echo  $_POST["uid"] ;
//$_POST["comment"]="Hloo parakh";
    $conn=connect('trustbook1');
	if($conn==True){echo"Hloo Successfull Connection.";}
    $stmt=$conn->prepare("insert into comment(updateid,uid,text) values(:updateid,:uid,:text)");
    $stmt->execute(array('updateid'=>$_POST["updateid"],'uid'=>$_POST["uid"],'text'=>$_POST["comment"]));
    redirect('home.php');
}
 catch (PDOException $e){
     echo $e->getMessage();
 }
?>
