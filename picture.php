<?php
    try{
        $dbuser = 'root';
        $dbpass = '15061994';
        $db='trustbook1';
        $conn = new PDO('mysql:host=localhost;dbname='.$db, $dbuser, $dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt=$conn->prepare('select imgtype, img from updates where updateid=:picid');
        $stmt->execute(array('picid'=>$_GET['picid']));
        $row=$stmt->fetch();
        $imageType=$row[0];
        $imageData=$row[1];
        header("content-type: ".$imageType);
        echo $imageData;
        }
        catch(Exception $e)
        {
            $e->getMessage();
        }
?>
