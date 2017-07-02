<?php 
    session_start();
    try{
        $dbuser = 'root';
        $dbpass = '15061994';
        $db='trustbook1';  $r=$_SESSION['uemail'];
        $conn = new PDO('mysql:host=localhost;dbname='.$db, $dbuser, $dbpass);
        
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt="Select imgtype,image from user_profile where email='$r'";
        $con=mysqli_connect("localhost","root","15061994","trustbook1");
		$retval=mysqli_query($con,$stmt);
			if ($retval === FALSE) {
    echo"Not Sucessfull Connection in test.php";}
		//echo"Error";
        $row=mysqli_fetch_array($retval);
        $imageType=$row[0];
        $imageData=$row[1];
        header("content-type: ".$imageType);
        echo $imageData; 
	   echo"<br> $r"; 
       //session_start();
//$_SESSION['img']=$imageData;	
   }
        catch(Exception $e)
        {
            $e->getMessage();
        }
?>