<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include_once 'functions.php';
            session_start();
            try{ /*$email=$_SESSION['uemail']; echo" Emailid= '$email' ";
                //$conn=  connect('trustbook1');
                $img = $_FILES['image1'];
                $filename=$img['name'];
                $arr=explode('.',$filename);
                $ext=strtolower(end($arr));
                $fp = file_get_contents($_FILES['image1']['tmp_name']);
                $fptype=$_FILES['image1']['type'];  echo  "$filename";
                $stmtimg= 'UPDATE user_profile set imgtype= "'.$fptype.'",image="'.$img.'" where email= "'.$email.'" ' ;
$con=mysqli_connect("localhost","root","15061994","trustbook1"); if($con) {echo "Ya! u  r connected to the database.";}
//$retval=mysqli_query($con,$stmtimg);
			if($retval==FALSE) {echo "Not Successfull.";} 				
                //$stmtimg->execute(array('email'=>$_SESSION['uemail'],'img'=>$fp,'imgtype'=>$fptype)) ;
               echo"img[0]"; redirect('./editprofile.php'); */
       
$uid=$_SESSION['uid'];echo" Userid= '$uid' ";
      $con1=mysqli_connect("localhost","root","15061994","image"); if($con1) {echo "Ya! u  r connected to the database.";}         
 $UploadedFileName=$_FILES['UploadImage']['name'];
if($UploadedFileName!='')
{
  $upload_directory = "images/"; //This is the folder which you created just now
  $TargetPath=$UploadedFileName;
  if(move_uploaded_file($_FILES['UploadImage']['tmp_name'], $upload_directory.$TargetPath)){    
    $QueryInsertFile="UPDATE storeimages SET image='$TargetPath',uid='$uid'  where uid='$uid'"; 
    // Write Mysql Query Here to insert this $QueryInsertFile   .                   
  $retval3=mysqli_query($con1,$QueryInsertFile);
  if($retval3) {echo"<br>Successfull Insertion" ;}}
}


 /*$sql='Insert into storeimages (name,image) values ("'.$fptype.'","'.$filename.'") ';
  $retval=mysqli_query($con1,$sql);
 if($retval==FALSE) {echo "<br> Not Successfull image insertion";}
 else {echo"<br> Sucessfully uploaded";}*/
 $sql1="select * from storeimages where uid='$uid' ";
 $retval1=mysqli_query($con1,$sql1);
 if($retval1==FALSE) {echo "<br> Not Successfull query";}
 $row=mysqli_fetch_assoc($retval1);
 echo  $row['image'] ; 
$Myphoto=$row['image'];
redirect('./editprofile.php'); 
}
            catch (PDOException $e){
                $e->getMessage();
            }
  ?>

    <img src='images/<?php echo $Myphoto; ?>' id='dp' alt='img' style='height: 130px;width: 110px;border-radius: 6px;margin:25px;left-align:5px;'>    







	  
       
    </body>
</html>
