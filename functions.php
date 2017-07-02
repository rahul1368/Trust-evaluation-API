<?php

function connect($db)
{
    $dbuser = 'root';
    $dbpass = '15061994';
    try{
    $conn = new PDO('mysql:host=localhost;dbname='.$db, $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $conn;
    }
    catch(PDOException $e)
    {
echo $e->getMessage();        
echo "Can't connect to the servers right now.";
    }
}
function redirect($tgt)
{ echo"Unsuccessfull";
    header("Location:".$tgt);
}
?>


