<?php
    session_start();
    include './functions.php';
    if(isset($_SESSION["uemail"])){
        $uemail=$_SESSION["uemail"];
        $uid=$_SESSION['uid']; 
        try{
            $conn=connect('trustbook'); 
            $stmtdefault=$conn->prepare("select * from userinfo where email=:uemail");
            $stmtdefault->execute(array('uemail'=>$uemail));
            $rowdefault=$stmtdefault->fetch();
        }
        catch (PDOException $e){
            $e->getMessage();
        } 
    }
    else{
        redirect('./index.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST" action="sampledata.php">
            <input type="text" name="taguser" list="frndlist">
            <datalist id="frndlist">
            <?php
                try{
                    $stmt="SELECT * FROM relationship WHERE (user_one_id = ".$uid." OR user_two_id =".$uid.") AND status = 1";            
                    foreach ($conn->query($stmt) as $row) {                 
                     if($row[0]==$uid){
                         $friend=$row[1];
                     }
                     else {
                         $friend=$row[0];
                     }
                     $stmt1=$conn->prepare("select name from userinfo where uid=:uid");
                     $stmt1->execute(array('uid'=>$friend));
                     $row1=$stmt1->fetch();
                     echo "<option value='".$row1[0]."'>";
                    }
                }
                catch (PDOException $e){
                    $e->getMessage();
                }
            ?>    
            </datalist>
        </form>
    </body>
</html>
