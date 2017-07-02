<!DOCTYPE html>
<html>
    <head>
	
<?php
    session_start();
    include './functions.php';
    if(isset($_SESSION["uemail"])){
        $uemail=$_SESSION["uemail"];
        $uid=$_SESSION['uid']; 
        try{
            $conn=connect('trustbook1'); 
            $stmtdefault=$conn->prepare("select * from user_profile  where email=:uemail");
            $stmtdefault->execute(array('uemail'=>$uemail));
            $rowdefault=$stmtdefault->fetch();
			$stmtdefault1=$conn->prepare("select * from user_profession  where uid='$rowdefault[0]'");
            $stmtdefault1->execute(array('uemail'=>$uemail));
            $profession=$stmtdefault1->fetch();
			$stmtdefault2=$conn->prepare("select * from user_education  where uid='$rowdefault[0]'");
            $stmtdefault2->execute(array('uemail'=>$uemail));
            $education=$stmtdefault2->fetch();
			$stmtdefault3=$conn->prepare("select * from location_info  where uid='$rowdefault[0]'");
            $stmtdefault3->execute(array('uemail'=>$uemail));
            $location=$stmtdefault3->fetch();
        $stmtdefault4=$conn->prepare("select * from friend where uid='$rowdefault[0]'");
            $stmtdefault4->execute(array('uemail'=>$uemail));
            $friend=$stmtdefault4->fetch();}
        catch (PDOException $e){
            $e->getMessage();echo "Some problem is there";
        } 
    }
    else{
        redirect('./facebook login.php');
    }
    /*steps to be followed
     1.make two txts
     2.execute s-match at line 993
     3.prefernce calculation 
	 3(a).when no of preference==1
	 start at line no 1132, ends at 1280
	 3.(b).when no of preference >1
	 starts at line no 1283,ends at line no 1676
    4.default calculation
	starts at line no 1678
    5.mutual calculation at line no 1762
	6.Final trust calculation
     steps end*/
    
?>


	
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Friends requests</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/homepage.css">
    </head>
    <body>
	
        <div class="header">
        <h1><a href="home.php">@trustbook</a></h1>
	<h3><?php echo $rowdefault[4]; ?></h3>
        <?php 
        /*if($rowdefault[13]=='blank'){
            echo "<img src='images/profille.jpg' id='dp'style='height: 130px;width: 110px;border-radius: 6px;'/>";
        } */
        {
            //echo "<img src='$img' alt='img' style='height: 130px;width: 110px;border-radius: 6px;' id='dp'>";
       $con=mysqli_connect("localhost","root","15061994","image"); 
		if($con==FALSE) {echo"Database Connection error in file home.php";}
		$statement="select * from storeimages where uid='$uid'";
		$result=mysqli_query($con,$statement);
		$ans=mysqli_fetch_assoc($result);
		$imageData=$ans['image'];
		$imageData="images/".$imageData;
		//echo  $imageData;
		}
        ?><img src='<?php echo $imageData; ?>' id='dp' alt='img' style='height: 130px;width: 110px;border-radius: 6px;margin:25px;left-align:5px;'>
	</div>
	<div class="leftbar">
	<a href="editprofile.php">Want to edit profile?</a><br>
        <a href="profile.php">View profile</a><br>
        <a href="friends.php">Friends</a><br>
        <a href="pendingrequest.php">Pending friend requests</a><br>
        <form action="findfriends.php" method="GET">
            <input type="name" name="key">
            <input type="submit" value="Search"/>
        </form>
        <a href="logout.php">Log out</a>
	</div>
        <div class="pagecontent">
  


<?php
//if (!$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') die('Invalid request');

// get variable sent from client-side page
//$my_variable = isset($_POST['my_variable']) ? strip_tags($_POST['my_variable']) :null;

// first txt starts
 $sender= $_POST['sender'];
$data = "Thing";
$file = "C:\\wamp64\\www\\mysite\\trustbook\\smatch\\test-data\\cw\\c.txt";

$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("Couldn't write values to file!");

fclose($fp);

$data = "Profile_info";
$file = "C:\\wamp64\\www\\mysite\\trustbook\\smatch\\test-data\\cw\\c.txt";

$fp = fopen($file, "a") or die("Couldn't open $file for writing!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data="Hometown";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

$data="Demo";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

$data=$location[3];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Relationship_Status";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Demo";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data=$profession[9];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Language_known";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Demo";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data=$profession[10];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data="Place_of_Birth";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

$data="Demo";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
$data=$location[7];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

$data="Interests";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

$data="Demo";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

$data=$rowdefault[6];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


/*$data = "Location";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = "Current_Location";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = "Current_city";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data=$location[1];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!120");

$data = "Current_state";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
//echo"line 236";
$data=$location[2];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!120");

//echo"line 242";
$data = "Current_country";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$location[6];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!120");
/*$data = "Past_Location";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = "Past_city";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data=$location[4];echo"line 264 $data";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!120");
echo"line 236";
$data = "Past_state";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data=$location[5];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!120");

$data = "Past_country";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$location[8];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!120");
*/
$data="Education";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Primary_Education";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Primary_school_name";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[14];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Primary_school_city";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[11];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Primary_school_state";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[12];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Primary_school_country";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[13];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Primary_school_timespan";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[15];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="High_school_Education";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="High_school_name";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[4];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="High_school_city";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[1];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="High_school_state";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[2];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="High_school_country";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[3];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="High_school_timespan";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[5];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="12th_Education";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="12th_school_name";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[9];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="12th_school_city";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[6];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="12th_school_state";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[7];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="12th_school_country";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[8];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="12th_school_timespan";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[10];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data="Undergrad_Education";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Undergrad_school_name";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[19];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Undergrad_school_city";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[16];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Undergrad_school_state";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[17];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Undergrad_school_country";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[18];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Undergrad_school_timespan";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[20];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data="Postgrad_Education";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Postgrad_school_name";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[24];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Postgrad_school_city";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[21];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Postgrad_school_state";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[22];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Postgrad_school_country";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[23];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Postgrad_school_timespan";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education[25];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Profession";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Past_Profession";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Job_Title";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession[6];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Employer";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession[8];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Prev_City";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession[11];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Prev_State";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession[12];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Prev_Country";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession[13];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Time span";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession[5];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Current_Profession";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Job_title";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession[7];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Employer";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession[4];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Working_city";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession[1];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Working_state";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession[2];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Working_country";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession[3];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



fclose($fp);

// first txt ends
//second txt starts
$sender=$_POST['sender'];
try{
           $conn=connect('trustbook1'); 
            $stmtdefault7=$conn->prepare("select * from user_profile  where uid='$sender'");
            $stmtdefault7->execute(array('uid'=>$sender));
            $rowdefault1=$stmtdefault7->fetch();
			$stmtdefault1=$conn->prepare("select * from user_profession  where uid='$rowdefault1[0]'");
            $stmtdefault1->execute(array('uid'=>$sender));
            $profession1=$stmtdefault1->fetch();
			$stmtdefault2=$conn->prepare("select * from user_education  where uid='$rowdefault1[0]'");
            $stmtdefault2->execute(array('uid'=>$sender));
            $education1=$stmtdefault2->fetch();
			$stmtdefault3=$conn->prepare("select * from location_info  where uid='$rowdefault1[0]'");
            $stmtdefault3->execute(array('uid'=>$sender));
            $location1=$stmtdefault3->fetch();
        $stmtdefault4=$conn->prepare("select * from friend where uid='$rowdefault1[0]'");
            $stmtdefault4->execute(array('uid'=>$sender));
            $friend1=$stmtdefault4->fetch();
        }
        catch (PDOException $e){
            $e->getMessage();
        } 


$data = "Thing";
$file = "C:\\wamp64\\www\\mysite\\trustbook\\smatch\\test-data\\cw\\w.txt";

$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("Couldn't write values to file!");

fclose($fp);

$data = "Profile_info";
$file = "C:\\wamp64\\www\\mysite\\trustbook\\smatch\\test-data\\cw\\w.txt";

$fp = fopen($file, "a") or die("Couldn't open $file for writing!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Hometown";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

$data="Demo";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

$data=$location1[3];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Relationship_Status";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Demo";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data=$profession1[9];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Language_known";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Demo";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession1[10];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Place_of_Birth";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

$data="Demo";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
$data=$location1[7];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

$data="Interests";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

$data="Demo";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

$data=$rowdefault1[6];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data = "Location";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = "Current_Location";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = "Current_city";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data=$location1[1];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!120");

$data = "Current_state";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data=$location1[2];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!120");


$data = "Current_country";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$location1[6];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!120");
/*$data = "Past_Location";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = "Past_city";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data=$location1[4];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!120");

$data = "Past_state";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data=$location1[5];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!120");

$data = "Past_country";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$location1[8];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!120");
*/


$data="Education";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Primary_Education";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Primary_school_name";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[14];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Primary_school_city";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[11];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Primary_school_state";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[12];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Primary_school_country";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[13];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Primary_school_timespan";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[15];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="High_school_Education";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="High_school_name";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[4];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="High_school_city";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[1];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="High_school_state";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[2];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="High_school_country";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[3];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="High_school_timespan";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[5];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="12th_Education";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="12th_school_name";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[9];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="12th_school_city";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[6];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="12th_school_state";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[7];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="12th_school_country";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[8];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="12th_school_timespan";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[10];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data="Undergrad_Education";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Undergrad_school_name";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[19];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Undergrad_school_city";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[16];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Undergrad_school_state";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[17];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Undergrad_school_country";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[18];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Undergrad_school_timespan";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[20];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data="Postgrad_Education";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Postgrad_school_name";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[24];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Postgrad_school_city";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[21];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Postgrad_school_state";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[22];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Postgrad_school_country";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[23];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Postgrad_school_timespan";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$education1[25];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Profession";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Past_Profession";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Job_Title";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession1[6];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Employer";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession1[8];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Prev_City";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession1[11];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Prev_State";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession1[12];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Prev_Country";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession1[13];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Time span";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession1[5];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Current_Profession";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Job_title";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession1[7];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Employer";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession1[4];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="Working_city";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession1[1];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Working_state";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession1[2];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data="Working_country";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
$data=$profession1[3];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "\t\t\t\t") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



fclose($fp);
//second txt ends
// s-match is execution
//chdir("C:\\wamp64\\www\\trustbook1\\s-match-20131104\\bin\\"); 
//bool chdir('string C:\xampp\htdocs\trustbook\Smatch\bin');
//exec('cd C:\wamp64\www\mysite\trustbook\smatch\bin ,all-cw.cmd'); 
$var1="c.txt";$var2="w.txt";
//exec('C:\\wamp64\\www\\mysite\\trustbook\\smatch\\bin\\call match-manager.cmd convert ..\test-data\cw\c.txt ..\test-data\cw\c.xml -config=..\conf\s-match-Tab2XML.properties');// Background execution of smatch tool
// s-match execution ends
//$output=shell_exec('C:\\wamp64\\www\\mysite\\trustbook\\smatch\\bin\\call match-manager.cmd convert ..\test-data\cw\c.txt ..\test-data\cw\c.xml -config=..\conf\s-match-Tab2XML.properties ');
//system('C:\\wamp64\\www\\mysite\\trustbook\\smatch\\bin\\background.exe');
//system("C:\WINDOWS\System32\cmd.exe /b start G:\codejam_2017\background.exe");
// prefernce calculation starts
echo"Hi this is 0 preference case.";
//exec('C:\wamp64\www\mysite\trustbook\smatch\bin\all-cw');
$p11=$_POST["preference11"];$p12=$_POST["preference12"];
$p21=$_POST["preference21"];$p22=$_POST["preference22"];
$p31=$_POST["preference31"];$p32=$_POST["preference32"];
$p41=$_POST["preference41"];$p42=$_POST["preference42"];
if($p11!=1000 && $p12!=1000 )
{$p1=$p12;}
else if($p11!=1000 && $p12==1000 )
{$p1=$p11;}
else if($p11==1000 && $p12==1000 )
{$p1=1000;}
if($p21!=1000 && $p22!=1000 )
{$p2=$p22;}
else if($p21!=1000 && $p22==1000 )
{$p2=$p21;}
else if($p21==1000 && $p22==1000 )
{$p2=1000;}
if($p31!=1000 && $p32!=1000 )
{$p3=$p32;}
else if($p31!=1000 && $p32==1000 )
{$p3=$p31;}
else if($p31==1000 && $p32==1000 )
{$p3=1000;}
if($p41!=1000 && $p42!=1000 )
{$p4=$p42;}
else if($p41!=1000 && $p42==1000 )
{$p4=$p41;}
else if($p41==1000 && $p42==1000 )
{$p4=1000;} //echo $p4; echo"<br>";
//echo "<p> p1 :".$p1.", p2 :".$p2.", p3:".$p3." ,p4:".$p4.
/*$file1 = "C:\\wamp\\www\\trustbook1\\pref1.txt";
$fp1 = fopen($file1, "w") or die("Couldn't open $file for writing!");
fwrite($fp1, "\n") or die("Couldn't write values to file!");
fwrite($fp1, "  $p1   ") or die("Couldn't write values to file!");
fwrite($fp1, "\n") or die("Couldn't write values to file!");
fwrite($fp1, "  $p2   ") or die("Couldn't write values to file!");
fwrite($fp1, "\n") or die("Couldn't write values to file!");
fwrite($fp1, "  $p3   ") or die("Couldn't write values to file!");
fwrite($fp1, "\n") or die("Couldn't write values to file!");
fwrite($fp1, "  $p4   ") or die("Couldn't write values to file!");
fclose($fp1); */
//$output=shell_exec("comparetwofiles1.exe c.txt w.txt pref1.txt");      //  C++ Code Call Alternative of S-MATCH TOOL
   //echo "Output of Smatch= $output";
$sum=$p1+$p2+$p3+$p4;
   $selections=0;
if($sum<1000)
{//echo"on line 1047";
$selections=4;
}
else if(($sum>=1000)&&($sum<2000))
{//echo"on line 1051";
$selections=3;
}
else if(($sum>=2000)&& ($sum<3000))
{ //echo"on line 1055";
$selections=2;
}
else if(($sum>=3000)&& ($sum<4000))
{$selections=1;//echo"on line 1059";
}
//echo"sum=   ";echo $sum; echo"<br>";
//echo"User selected $selections prefrences";
$paths=array();
array_push($paths,"/Thing/Profile_info");
array_push($paths,"/Thing/Profile_info/Hometown");
array_push($paths,"/Thing/Profile_info/Place_of_Birth");
array_push($paths,"/Thing/Location");
array_push($paths,"/Thing/Location/Current_Location");
array_push($paths,"/Thing/Profile_info/Interests");
array_push($paths,"/Thing/Profile_info/Languages_known");
array_push($paths,"/Thing/Profile_info/Relationship_Status");
array_push($paths,"/Thing/Location/Past_Location");
array_push($paths,"/Thing/Education");
array_push($paths,"/Thing/Education/Primary_Education");
array_push($paths,"/Thing/Education/High_school_Education");
array_push($paths,"/Thing/Education/12th_Education");
    array_push($paths,"/Thing/Education/Undergrad_Education");
    array_push($paths,"/Thing/Education/Postgrad_Education");
    array_push($paths,"/Thing/Profession");
	array_push($paths,"/Thing/Profession/Past_Profession");
	array_push($paths,"/Thing/Profession/Current_Profession");
    
	
    
    $weight=0;
    $count=0; $preferenceindex=array();$preferencepath=array();
if($selections==1)
{   $flag=false;$pr=-1;$rahul=0;
if($p1!=1000 )
	{$p1_name=$paths[$p1];$rahul=$p1;array_push($preferenceindex,$p1);
$prepathofsize2=explode("/",$p1_name);
$tmp="/".$prepathofsize2[1]."/".$prepathofsize2[2];
array_push($preferencepath,$tmp);
if($p1==3 || $p1==4 || $p1==8 )
{$flag=true;$pr=$p1;}
}
	if($p2!=1000)
	{$p1_name=$paths[$p2];$rahul=$p2;array_push($preferenceindex,$p2);
$prepathofsize2=explode("/",$p1_name);
$tmp="/".$prepathofsize2[1]."/".$prepathofsize2[2];
array_push($preferencepath,$tmp);
if($p2==3 || $p2==4 || $p2==8 )
{$flag=true;$pr=$p2;}}
	if($p3!=1000)
	{$p1_name=$paths[$p3];$rahul=$p3;array_push($preferenceindex,$p3);
$prepathofsize2=explode("/",$p1_name);
$tmp="/".$prepathofsize2[1]."/".$prepathofsize2[2];
array_push($preferencepath,$tmp);
if($p3==3 || $p3==4 || $p3==8 )
{$flag=true;$pr=$p3;}}
if($p4!=1000)
	{$p1_name=$paths[$p4];$rahul=$p4;array_push($preferenceindex,$p4);
$prepathofsize2=explode("/",$p1_name);
$tmp="/".$prepathofsize2[1]."/".$prepathofsize2[2];
array_push($preferencepath,$tmp);
if($p4==3 || $p4==4 || $p4==8 )
{$flag=true;$pr=$p4;}}
$prweight=0;//CHOSEN PREFERENCE WEIGHT
if($flag)
{if($pr==3) // Location is chosen as preference
		{  $data="Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user1.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");

//Timespan1
$data=$education[15];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// timespan 2
$data=$education[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 3
$data=$education[10];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[6];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[7];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[8];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 4
$data=$education[20];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[16];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[17];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[18];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 5
$data=$education[25];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[21];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[22];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[23];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// Timespan 6
$data=$profession[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 7
$data=$profession[14];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
fclose($fp);




// Second File Starts


$data="Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user2.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");

//Timespan1
$data=$education1[15];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// timespan 2
$data=$education1[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 3
$data=$education1[10];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[6];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[7];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[8];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 4
$data=$education1[20];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[16];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[17];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[18];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 5
$data=$education1[25];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[21];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[22];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[23];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// Timespan 6
$data=$profession1[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession1[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession1[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession1[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 7
$data=$profession1[14];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession1[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession1[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession1[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
fclose($fp);

$output1=shell_exec("Locationmatching.exe user1.txt user2.txt");      //  C++ Code Call Alternative of S-MATCH TOOL
   //echo "Output of Smatch= $output1";
			
	$prweight=$output1;	//echo $prweight;	
		}
		else if($pr==8)  //Past Location is chosen as preference
		{$data="Past Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user1.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");

//Timespan1
$data=$education[15];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// timespan 2
$data=$education[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 3
$data=$education[10];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[6];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[7];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[8];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 4
$data=$education[20];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[16];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[17];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[18];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 5
$data=$education[25];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[21];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[22];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[23];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// Timespan 6
$data=$profession[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

fclose($fp);




// Second File Starts


$data="Past Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user2.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");

//Timespan1
$data=$education1[15];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// timespan 2
$data=$education1[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 3
$data=$education1[10];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[6];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[7];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[8];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 4
$data=$education1[20];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[16];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[17];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[18];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 5
$data=$education1[25];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[21];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[22];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[23];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// Timespan 6
$data=$profession1[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession1[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession1[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession1[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

fclose($fp);

$output1=shell_exec("Locationmatching.exe user1.txt user2.txt");      //  C++ Code Call Alternative of S-MATCH TOOL
   //echo "Output of Smatch= $output1";
		$prweight=$output1;	}
	else if($pr==4)   // Current Location is chosen as preference
	{$data=" Current Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user1.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");
		$data=$profession[14];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
fclose($fp);
$data=" Current Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user2.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");
	
	$data=$profession1[14];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession1[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession1[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession1[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
fclose($fp);
		
	}
	
}


 $similarity_score=array();

$file = fopen("C:\\wamp64\\www\\mysite\\trustbook\\smatch\\test-data\\cw\\result-cw.txt","r");
      //echo"<br> <br>Path1: $p1_name <br>";
      $txt_file = file_get_contents('C:\\wamp64\\www\\mysite\\trustbook\\smatch\\test-data\\cw\\result-cw.txt');
        $rows = explode("\n", $txt_file);
        //echo "<p> At line 1080 row count :".sizeof($rows)."</p>";
        array_shift($rows);
$paths_preference=array();
array_push($paths_preference,$p1_name);
$values=array();

while($count<sizeof($paths))
    {
        $path = $paths[$count];

        foreach($rows as $row => $line)

            {
              //echo "<p> At code line no 1099 :<br>line is :".$line."<p>";
                if($line=="")
                    {
                        break;
                    }
					
               // $line = fgets($file);
                    //echo "aloha";
                $var = explode("\t",$line);
                //echo "size after explode :".sizeof($var)."</p>";
                $path1=explode("\\",$var[0]);
                $s_var = sizeof($path1);
                 //first path without attribute value ,p1
                $p1="";
				//echo $line;echo "<br>";
                  //echo "<p> svar :".$s_var."</p>";
                  $s_var=$s_var-1;$len1=$s_var;
                while($s_var>0)
                {
                    $p1="/".$path1[$s_var].$p1;
                    $s_var=$s_var-1;
                }

                $path2=explode("\\",$var[2]);
                $s_var = sizeof($path2);
                $s_var=$s_var-1;$len2=$s_var;
                 //second path without attribute value, p2
                $p2="";

                while($s_var >0)
                {
                    $p2="/".$path2[$s_var].$p2;
                    $s_var=$s_var-1;

                }  //if($count==0){echo"p2='$p2'";}
                //echo "<p> path :".$path."\t path :".$path."</p>";
                if( strpos($p1,$path)!==false && strpos($p2,$path)!==false && ($len1==5 && $len2==5) )      /* THIS IS FOR the case when suppose path is superclass then weight will be given to all of its subclasses */
                { //echo "<p> path 1:".$p1."\t\t".$var[1]." path2 :".$p2."</p>";
                  //echo "<p> in loop at line 1136 <br></p>";
                  if($var[1]=="=")
                  {//echo"this is condition of preference calculation where = sign is there.<br>";
                   // $weight=$weight + $values[$count];
				  array_push($values,1);}
			    
                   if($var[1]==">" )
                  {//echo"this is condition of preference calculation where > sign is there.<br>";
                    //$weight=$weight + 0.4*$values[$count];
                    array_push($values,0.4);
                  }
                  if($var[1]=="<" )
                  {//echo"this is condition of preference calculation where < sign is there.<br>";
                    //$weight=$weight + 0.7*$values[$count];
                    array_push($values,0.7);
                  }
                  else if($var[1]=="!" )
                  {//echo"this is condition of preference calculation where no sign is there.<br>";
                    array_push($values,0);
                  }
                 // break;
                }
                //echo $var[0]."<br />";
                //echo $var[1]."<br />";
                //echo $var[2]."<br />";
      $sum=0;
	  for($i=0;$i<sizeof($values);$i++)
	   {$sum+=$values[$i];}		
if(sizeof($values)!=0)
	$sum=$sum/sizeof($values);
   }array_push($similarity_score,$sum);
	$count=$count+1;}
    //echo"this is loop of preference calculation <br>";
    /* multiplying with ahp values*/
    //echo "<p> values size :".sizeof($values)."</p>";  
 
   //echo"This is onr preference case on line no 1183.";
/*$i=0;
   while($i<sizeof($values))
   {echo"  ";
echo $values[$i];
$i=$i+1;} */
   //$array1=array();//starting of one preference calculation
            //$preference=$_POST["preference"];
           /*for($i=0;$i<sizeof($similarity_score);$i++)
		   {echo $similarity_score[$i] ;echo "   hhg  ";}echo " <br>  ";*/
		   
		   if($flag )
		   {if($pr==3) $similarity_score[3]=$prweight;
			 else if($pr==4) $similarity_score[3]=$prweight;  
		   else if($pr==8) $similarity_score[3]=$prweight;}
		   
		   $p1=$rahul; //echo"on line 1228";echo $p1;
            $temp=$similarity_score[$p1];
            $similarity_score[$p1]=$similarity_score[0];
            $similarity_score[0]=$temp;
            $r=sizeof($similarity_score);
            for ($index1 = 1; $index1 < sizeof($similarity_score); $index1++) {
                $similarity_score[$index1-1]=$similarity_score[$index1];
            }$similarity_score[$r-1]=-1;
            
			rsort($similarity_score);
            /*for($i=0;$i<sizeof($similarity_score);$i++)
		   {echo $similarity_score[$i] ;echo "  hhh ";}echo " <br>  ";
			echo "at line 1442";echo sizeof($similarity_score); */
            for ($index1 = $r-1; $index1>=1; $index1--) //Right shifting
			{
                $similarity_score[$index1]=$similarity_score[$index1-1];
            }
            $similarity_score[0]=$temp;
			/*for($i=0;$i<sizeof($similarity_score);$i++)
		   {echo $similarity_score[$i] ;echo " jjj  ";}echo " <br>  "; */
			
            $alpha = 0.0;
            for ($index2 = 0; $index2 < sizeof($similarity_score); $index2++) {
                $alpha += (sizeof($similarity_score)-$index2-1)*$similarity_score[$index2];
            }
            $alpha = $alpha/((sizeof($similarity_score)-1)*10);
            //echo "<br><br>alpha=".round($alpha,3);
            if($alpha>0.5){
                $alpha=1-$alpha;
            }
            $min = 10000000;//echo"alpha= ";echo $alpha;echo "<br>";
            $w=array();
            $w[0]=$alpha;
            for ($i = 1; $i <= sizeof($similarity_score)-1; $i++) {
                $w[$i]=(1-$alpha)/(sizeof($similarity_score)-1);
            }
            
            $trust = 0.0;
            for ($i = 0; $i < sizeof($similarity_score); $i++) {
                $trust += $similarity_score[$i]*$w[$i];
            }
     $weight=$trust;      
		   //echo"Trust= $trust";
            //echo '<br><br>Trust score based on profile matching='.round($trust,2)."%<br>";    
             		
   
   

   }// one preference calculation
   







   if($selections==4){array_push($preferenceindex,$p1);array_push($preferenceindex,$p2);array_push($preferenceindex,$p3);array_push($preferenceindex,$p4);
	   $path = $paths[$p1];
		$prepathofsize2=explode("/",$path);
$tmp="/".$prepathofsize2[1]."/".$prepathofsize2[2];
array_push($preferencepath,$tmp);
$path = $paths[$p2];
		$prepathofsize2=explode("/",$path);
$tmp="/".$prepathofsize2[1]."/".$prepathofsize2[2];
array_push($preferencepath,$tmp);
$path = $paths[$p3];
		$prepathofsize2=explode("/",$path);
$tmp="/".$prepathofsize2[1]."/".$prepathofsize2[2];
array_push($preferencepath,$tmp);
$path = $paths[$p4];
		$prepathofsize2=explode("/",$path);
$tmp="/".$prepathofsize2[1]."/".$prepathofsize2[2];
array_push($preferencepath,$tmp);
	   
	   $process=array();$index=array();$similarity_score=array();
	   array_push($similarity_score,0);array_push($similarity_score,0);array_push($similarity_score,0);array_push($similarity_score,0);
	   if($p1==3 || $p1==4 || $p1==8)
	   {array_push($process,$p1);array_push($index,0);$p1=-1;}
   
   if($p2==3 || $p2==4 || $p2==8)
	   {array_push($process,$p2);array_push($index,1);$p2=-1;}
   if($p3==3 || $p3==4 || $p3==8)
	   {array_push($process,$p3);array_push($index,2);$p3=-1;}
	   if($p4==3 || $p4==4 || $p4==8)
	   {array_push($process,$p4);array_push($index,3);$p4=-1;}
	   
    $sz=sizeof($process);
	for($i=0;$i<$sz;$i++)
	{if($process[$i]==3) // Location is chosen as preference
		{  $data="Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user1.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");

//Timespan1
$data=$education[15];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// timespan 2
$data=$education[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 3
$data=$education[10];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[6];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[7];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[8];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 4
$data=$education[20];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[16];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[17];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[18];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 5
$data=$education[25];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[21];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[22];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[23];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// Timespan 6
$data=$profession[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 7
	
	$data=$profession[14];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

fclose($fp);




// Second File Starts


$data="Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user2.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");

//Timespan1
$data=$education1[15];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// timespan 2
$data=$education1[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 3
$data=$education1[10];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[6];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[7];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[8];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 4
$data=$education1[20];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[16];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[17];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[18];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 5
$data=$education1[25];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[21];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[22];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[23];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// Timespan 6
$data=$profession1[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession1[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession1[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession1[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 7
	
	$data=$profession1[14];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession1[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession1[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession1[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
fclose($fp);

$output1=shell_exec("Locationmatching.exe user1.txt user2.txt");      //  C++ Code Call Alternative of S-MATCH TOOL
   //echo "Output of Smatch= $output1";
			
			
		}
		else if($process[$i]==8)  //Past Location is chosen as preference
		{$data="Past Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user1.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");

//Timespan1
$data=$education[15];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// timespan 2
$data=$education[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 3
$data=$education[10];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[6];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[7];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[8];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 4
$data=$education[20];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[16];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[17];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[18];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 5
$data=$education[25];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[21];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[22];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[23];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// Timespan 6
$data=$profession[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

fclose($fp);




// Second File Starts


$data="Past Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user2.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");

//Timespan1
$data=$education1[15];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// timespan 2
$data=$education1[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 3
$data=$education1[10];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[6];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[7];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[8];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 4
$data=$education1[20];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[16];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[17];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[18];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 5
$data=$education1[25];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[21];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[22];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[23];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// Timespan 6
$data=$profession1[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession1[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession1[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession1[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

fclose($fp);

$output1=shell_exec("Locationmatching.exe user1.txt user2.txt");      //  C++ Code Call Alternative of S-MATCH TOOL
   //echo "Output of Smatch= $output1";
			}
	else if($process[$i]==4)   // Current Location is chosen as preference
	{
		$data=" Current Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user1.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");
	
	$data=$profession[14];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
fclose($fp);
			$data=" Current Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user2.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");
	
	$data=$profession1[14];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession1[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession1[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession1[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
fclose($fp);}
	$output1=shell_exec("Locationmatching.exe user1.txt user2.txt");  
	$similarity_score[$index[$i]]=$output1;
	
	}
	
	$index1=array();$paths_preference=array();
	if($p1>=0)
	{$p1_name=$paths[$p1];array_push($paths_preference,$p1_name);array_push($index1,0);}
     if($p2>=0)
	{$p2_name=$paths[$p2];array_push($paths_preference,$p2_name);array_push($index1,1);}
      if($p3>=0)
	{$p3_name=$paths[$p3];array_push($paths_preference,$p3_name);array_push($index1,2);}
if($p4>=0)
	{$p4_name=$paths[$p4];array_push($paths_preference,$p4_name);array_push($index1,3);}
	  
      $file = fopen("C:\\wamp\\www\\mysite\\trustbook\\smatch\\test-data\\cw\\result-cw.txt","r");
      //echo"<br> <br>Path1: $p1_name <br>";echo"Path2: $p2_name <br>";echo"Path3: $p3_name <br>";echo"Path4: $p4_name <br>";
      $txt_file = file_get_contents('C:\\wamp\\www\\mysite\\trustbook\\smatch\\test-data\\cw\\result-cw.txt');
        $rows = explode("\n", $txt_file);
        //echo "<p> At line 1080 row count :".sizeof($rows)."</p>";
        array_shift($rows);
        



$sz1=sizeof($paths_preference);
//echo "At line 1088 1st preference " . $paths_preference[0] . "\t and \t" . $paths_preference[1] . " \tand \t" . $paths_preference[2] . "\tand \t".$paths_preference[3].".";


        while($count<($sz1))
    {$values=array();
        $path=$paths_preference[$count];
        foreach($rows as $row => $line)

            {
              //echo "<p> At code line no 1099 :<br>line is :".$line."<p>";
                if($line=="")
                    {
                        break;
                    }
					
               // $line = fgets($file);
                    //echo "aloha";
                $var = explode("\t",$line);
                //echo "size after explode :".sizeof($var)."</p>";
                $path1=explode("\\",$var[0]);
                $s_var = sizeof($path1);
                 //first path without attribute value ,p1
                $p1="";
                  //echo "<p> svar :".$s_var."</p>";
                  $s_var=$s_var-1;$len1=$s_var;
                while($s_var>0)
                {
                    $p1="/".$path1[$s_var].$p1;
                    $s_var=$s_var-1;
                }

                $path2=explode("\\",$var[2]);
                $s_var = sizeof($path2);
                $s_var=$s_var-1;$len2=$s_var;
                 //second path without attribute value, p2
                $p2="";

                while($s_var >0)
                {
                    $p2="/".$path2[$s_var].$p2;
                    $s_var=$s_var-1;

                }  //if($count==0){echo"p2='$p2'";}
                //echo "<p> path 1:".$p1."\t path2 :".$p2."</p>";
                if( strpos($p1,$path)!==false && strpos($p2,$path)!==false &&($len1==5&&$len2==5))      /* THIS IS FOR the case when suppose path is superclass then weight will be given to all of its subclasses */
                { //echo "<p> path 1:".$p1."\t path2 :".$p2."</p>";
                  //echo "<p> in loop at line 1136 <br></p>";
                  if($var[1]=="=")
                  {//echo"this is condition of preference calculation where = sign is there.<br>";
                   // $weight=$weight + $values[$count];
				  array_push($values,1);}
			    
                   if($var[1]==">" )
                  {//echo"this is condition of preference calculation where > sign is there.<br>";
                    //$weight=$weight + 0.4*$values[$count];
                    $random=mt_rand(2000000,4000000);
$random=$random/10000000;
$random1=round($random,5);
					array_push($values,$random1);
                  }
                  if($var[1]=="<")
                  {//echo"this is condition of preference calculation where < sign is there.<br>";
                    //$weight=$weight + 0.7*$values[$count];
                    $random=mt_rand(5000000,7000000);
$random=$random/10000000;
$random1=round($random,5);
					array_push($values,$random1);
                  }
                  if($var[1]=="!")
						array_push($values,0);
                 // break;
                }
                //echo $var[0]."<br />";
                //echo $var[1]."<br />";
                //echo $var[2]."<br />";
            }
			$sum=0;
			for($i=0;$i<sizeof($values);$i++)
			{$sum+=$values[$i];}
		if(sizeof($values)!=0)
		$sum=($sum)/(sizeof($values));
		$similarity_score[$index1[$count]]=$sum;
	$count=$count+1;}
    //echo"this is loop of preference calculation <br>";
    /* multiplying with ahp values*/
    //echo "<p> values size :".sizeof($values)."</p>";  
    $output=shell_exec("project.exe  $selections" );//echo"On line 1644, output=   ";echo $output;
$v=explode(" ",$output);
/*for($i=0;$i<sizeof($v);$i++)
{echo"     ";echo $v[$i];}*/
	$ahp4=array();
    array_push($ahp4,$v[0]);
    array_push($ahp4,$v[1]);
    array_push($ahp4,$v[2]);array_push($ahp4,$v[3]);
   
    $weight=$similarity_score[0]*$ahp4[0]+$similarity_score[1]*$ahp4[1]+$similarity_score[2]*$ahp4[2]+$similarity_score[3]*$ahp4[3];
  $rd=mt_rand(39990900,40000000);
$rd=$rd/100000000;
$rd=round($rd,5);
	//$weight=$weight* $rd;

	}

   
   
   
   
   
   
   
   
   if($selections==3){ //echo "<br>COUNT IS= $count <br>";
    
	if($p1!=1000)
	{array_push($preferenceindex,$p1);
		$path = $paths[$p1];
		$prepathofsize2=explode("/",$path);
$tmp="/".$prepathofsize2[1]."/".$prepathofsize2[2];
	array_push($preferencepath,$tmp);}
	if($p2!=1000)
	{array_push($preferenceindex,$p2);
		$path = $paths[$p2];
		$prepathofsize2=explode("/",$path);
$tmp="/".$prepathofsize2[1]."/".$prepathofsize2[2];
	array_push($preferencepath,$tmp);}
if($p3!=1000)
{array_push($preferenceindex,$p3);
	$path = $paths[$p3];
		$prepathofsize2=explode("/",$path);
$tmp="/".$prepathofsize2[1]."/".$prepathofsize2[2];
   array_push($preferencepath,$tmp);}
if($p4!=1000)
{array_push($preferenceindex,$p4);
	$path = $paths[$p4];
		$prepathofsize2=explode("/",$path);
$tmp="/".$prepathofsize2[1]."/".$prepathofsize2[2];
array_push($preferencepath,$tmp);
}
	   $process=array();$index=array();$similarity_score=array();
	   array_push($similarity_score,0);array_push($similarity_score,0);array_push($similarity_score,0);array_push($similarity_score,0);
	   if($p1==3 || $p1==4 || $p1==8)
	   {array_push($process,$p1);array_push($index,0);$p1=-1;}
   
   if($p2==3 || $p2==4 || $p2==8)
	   {array_push($process,$p2);array_push($index,1);$p2=-1;}
   if($p3==3 || $p3==4 || $p3==8)
	   {array_push($process,$p3);array_push($index,2);$p3=-1;}
	   if($p4==3 || $p4==4 || $p4==8)
	   {array_push($process,$p4);array_push($index,3);$p4=-1;}
	   
    $sz=sizeof($process);
	for($i=0;$i<$sz;$i++)
	{if($process[$i]==3) // Location is chosen as preference
		{  $data="Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user1.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");

//Timespan1
$data=$education[15];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// timespan 2
$data=$education[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 3
$data=$education[10];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[6];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[7];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[8];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 4
$data=$education[20];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[16];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[17];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[18];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 5
$data=$education[25];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[21];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[22];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[23];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// Timespan 6
$data=$profession[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 7
	
	$data=$profession[14];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

fclose($fp);




// Second File Starts


$data="Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user2.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");

//Timespan1
$data=$education1[15];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// timespan 2
$data=$education1[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 3
$data=$education1[10];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[6];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[7];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[8];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 4
$data=$education1[20];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[16];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[17];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[18];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 5
$data=$education1[25];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[21];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[22];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[23];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// Timespan 6
$data=$profession1[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession1[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession1[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession1[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 7
	
	$data=$profession1[14];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession1[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession1[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession1[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
fclose($fp);

$output1=shell_exec("Locationmatching.exe user1.txt user2.txt");      //  C++ Code Call Alternative of S-MATCH TOOL
   //echo "Output of Smatch= $output1";
			
			
		}
		else if($process[$i]==8)  //Past Location is chosen as preference
		{$data="Past Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user1.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");

//Timespan1
$data=$education[15];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// timespan 2
$data=$education[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 3
$data=$education[10];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[6];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[7];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[8];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 4
$data=$education[20];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[16];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[17];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[18];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 5
$data=$education[25];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[21];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[22];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[23];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// Timespan 6
$data=$profession[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

fclose($fp);




// Second File Starts


$data="Past Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user2.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");

//Timespan1
$data=$education1[15];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// timespan 2
$data=$education1[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 3
$data=$education1[10];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[6];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[7];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[8];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 4
$data=$education1[20];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[16];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[17];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[18];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 5
$data=$education1[25];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[21];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[22];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[23];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// Timespan 6
$data=$profession1[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession1[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession1[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession1[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

fclose($fp);

$output1=shell_exec("Locationmatching.exe user1.txt user2.txt");      //  C++ Code Call Alternative of S-MATCH TOOL
   //echo "Output of Smatch= $output1";
			}
	else if($process[$i]==4)   // Current Location is chosen as preference
	{
		$data=" Current Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user1.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");
	
	$data=$profession[14];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
fclose($fp);
			$data=" Current Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user2.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");
	
	$data=$profession1[14];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession1[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession1[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession1[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
fclose($fp);}
	$output1=shell_exec("Locationmatching.exe user1.txt user2.txt");  
	$similarity_score[$index[$i]]=$output1;
	}
	
	$index1=array();$paths_preference=array();
	if($p1>=0 && $p1!=1000)
	{$p1_name=$paths[$p1];array_push($paths_preference,$p1_name);array_push($index1,0);}
     if($p2>=0 && $p2!=1000)
	{$p2_name=$paths[$p2];array_push($paths_preference,$p2_name);array_push($index1,1);}
      if($p3>=0 && $p3!=1000)
	{$p3_name=$paths[$p3];array_push($paths_preference,$p3_name);array_push($index1,2);}
if($p4>=0 && $p4!=1000)
	{$p4_name=$paths[$p4];array_push($paths_preference,$p4_name);array_push($index1,3);}
	  
      $file = fopen("C:\\wamp\\www\\mysite\\trustbook\\smatch\\test-data\\cw\\result-minimal-cw.txt","r");
      //echo"<br> <br>Path1: $p1_name <br>";echo"Path2: $p2_name <br>";echo"Path3: $p3_name <br>";echo"Path4: $p4_name <br>";
      $txt_file = file_get_contents('C:\\wamp\\www\\mysite\\trustbook\\smatch\\test-data\\cw\\result-minimal-cw.txt');
        $rows = explode("\n", $txt_file);
        //echo "<p> At line 1080 row count :".sizeof($rows)."</p>";
        array_shift($rows);
        



$sz1=sizeof($paths_preference);
//echo "At line 1088 1st preference " . $paths_preference[0] . "\t and \t" . $paths_preference[1] . " \tand \t" . $paths_preference[2] . "\tand \t".$paths_preference[3].".";


        while($count<($sz1))
    {$values=array();
        $path=$paths_preference[$count];
        foreach($rows as $row => $line)

            {
              //echo "<p> At code line no 1099 :<br>line is :".$line."<p>";
                if($line=="")
                    {
                        break;
                    }
					
               // $line = fgets($file);
                    //echo "aloha";
                $var = explode("\t",$line);
                //echo "size after explode :".sizeof($var)."</p>";
                $path1=explode("\\",$var[0]);
                $s_var = sizeof($path1);
                 //first path without attribute value ,p1
                $p1="";
                  //echo "<p> svar :".$s_var."</p>";
                  $s_var=$s_var-1;$len1=$s_var;
                while($s_var>0)
                {
                    $p1="/".$path1[$s_var].$p1;
                    $s_var=$s_var-1;
                }

                $path2=explode("\\",$var[2]);
                $s_var = sizeof($path2);
                $s_var=$s_var-1;$len2=$s_var;
                 //second path without attribute value, p2
                $p2="";

                while($s_var >0)
                {
                    $p2="/".$path2[$s_var].$p2;
                    $s_var=$s_var-1;

                }  //if($count==0){echo"p2='$p2'";}
                //echo "<p> path 1:".$p1."\t path2 :".$p2."</p>";
                if( strpos($p1,$path)!==false && strpos($p2,$path)!==false &&($len1==5&&$len2==5))      /* THIS IS FOR the case when suppose path is superclass then weight will be given to all of its subclasses */
                { //echo "<p> path 1:".$p1."\t path2 :".$p2."</p>";
                  //echo "<p> in loop at line 1136 <br></p>";
                  if($var[1]=="=")
                  {//echo"this is condition of preference calculation where = sign is there.<br>";
                   // $weight=$weight + $values[$count];
				  array_push($values,1);}
			    
                   if($var[1]==">" )
                  {//echo"this is condition of preference calculation where > sign is there.<br>";
                    //$weight=$weight + 0.4*$values[$count];
                    $random=mt_rand(2000000,4000000);
$random=$random/10000000;
$random1=round($random,5);
					array_push($values,$random1);
                  }
                  if($var[1]=="<")
                  {//echo"this is condition of preference calculation where < sign is there.<br>";
                    //$weight=$weight + 0.7*$values[$count];
                    $random=mt_rand(5000000,7000000);
$random=$random/10000000;
$random1=round($random,5);
					array_push($values,$random1);
                  }
                  if($var[1]=="!")
						array_push($values,0);
                 // break;
                }
                //echo $var[0]."<br />";
                //echo $var[1]."<br />";
                //echo $var[2]."<br />";
            }
			$sum=0;
			for($i=0;$i<sizeof($values);$i++)
			{$sum+=$values[$i];}
		if(sizeof($values)!=0)
		$sum=($sum)/(sizeof($values));
		$similarity_score[$index1[$count]]=$sum;
	$count=$count+1;}
    //echo"this is loop of preference calculation <br>";
    /* multiplying with ahp values*/
    //echo "<p> values size :".sizeof($values)."</p>";  
    $output=shell_exec("project.exe  $selections" );//echo"On line 1644, output=   ";echo $output;
$v=explode(" ",$output);
/*for($i=0;$i<sizeof($v);$i++)
{echo"     ";echo $v[$i];}*/
	$ahp3=array();
    array_push($ahp3,$v[0]);
    array_push($ahp3,$v[1]);
    array_push($ahp3,$v[2]);
   
    $weight=$similarity_score[0]*$ahp3[0]+$similarity_score[1]*$ahp3[1]+$similarity_score[2]*$ahp3[2];
	}


if($selections==2){ //echo"2 preferences has been choosen <br>";
    if($p1!=1000)
	{array_push($preferenceindex,$p1);
		$path = $paths[$p1];
		$prepathofsize2=explode("/",$path);
$tmp="/".$prepathofsize2[1]."/".$prepathofsize2[2];
	array_push($preferencepath,$tmp);}
	if($p2!=1000)
	{array_push($preferenceindex,$p2);
		$path = $paths[$p2];
		$prepathofsize2=explode("/",$path);
$tmp="/".$prepathofsize2[1]."/".$prepathofsize2[2];
	array_push($preferencepath,$tmp);}
if($p3!=1000)
{array_push($preferenceindex,$p3);
	$path = $paths[$p3];
		$prepathofsize2=explode("/",$path);
$tmp="/".$prepathofsize2[1]."/".$prepathofsize2[2];
   array_push($preferencepath,$tmp);}
if($p4!=1000)
{array_push($preferenceindex,$p4);
	$path = $paths[$p4];
		$prepathofsize2=explode("/",$path);
$tmp="/".$prepathofsize2[1]."/".$prepathofsize2[2];
array_push($preferencepath,$tmp);
}
	   $process=array();$index=array();$similarity_score=array();
	   array_push($similarity_score,0);array_push($similarity_score,0);array_push($similarity_score,0);array_push($similarity_score,0);
	   if($p1==3 || $p1==4 || $p1==8)
	   {array_push($process,$p1);array_push($index,0);$p1=-1;}
   
   if($p2==3 || $p2==4 || $p2==8)
	   {array_push($process,$p2);array_push($index,1);$p2=-1;}
   if($p3==3 || $p3==4 || $p3==8)
	   {array_push($process,$p3);array_push($index,2);$p3=-1;}
	   if($p4==3 || $p4==4 || $p4==8)
	   {array_push($process,$p4);array_push($index,3);$p4=-1;}
	   
    $sz=sizeof($process);
	for($i=0;$i<$sz;$i++)
	{if($process[$i]==3) // Location is chosen as preference
		{  $data="Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user1.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");

//Timespan1
$data=$education[15];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// timespan 2
$data=$education[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 3
$data=$education[10];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[6];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[7];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[8];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 4
$data=$education[20];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[16];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[17];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[18];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 5
$data=$education[25];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[21];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[22];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[23];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// Timespan 6
$data=$profession[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 7
	
	$data=$profession[14];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

fclose($fp);




// Second File Starts


$data="Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user2.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");

//Timespan1
$data=$education1[15];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// timespan 2
$data=$education1[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 3
$data=$education1[10];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[6];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[7];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[8];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 4
$data=$education1[20];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[16];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[17];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[18];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 5
$data=$education1[25];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[21];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[22];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[23];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// Timespan 6
$data=$profession1[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession1[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession1[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession1[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 7
	
	$data=$profession1[14];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession1[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession1[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession1[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
fclose($fp);

$output1=shell_exec("Locationmatching.exe user1.txt user2.txt");      //  C++ Code Call Alternative of S-MATCH TOOL
   //echo "Output of Smatch= $output1";
			
			
		}
		else if($process[$i]==8)  //Past Location is chosen as preference
		{$data="Past Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user1.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");

//Timespan1
$data=$education[15];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// timespan 2
$data=$education[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 3
$data=$education[10];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[6];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[7];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[8];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 4
$data=$education[20];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[16];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[17];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[18];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 5
$data=$education[25];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education[21];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education[22];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education[23];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// Timespan 6
$data=$profession[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

fclose($fp);




// Second File Starts


$data="Past Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user2.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");

//Timespan1
$data=$education1[15];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// timespan 2
$data=$education1[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 3
$data=$education1[10];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[6];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[7];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[8];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

//Timespan 4
$data=$education1[20];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[16];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[17];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[18];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
//Timespan 5
$data=$education1[25];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$education1[21];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$education1[22];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$education1[23];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

// Timespan 6
$data=$profession1[5];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession1[11];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession1[12];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession1[13];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");

fclose($fp);

$output1=shell_exec("Locationmatching.exe user1.txt user2.txt");      //  C++ Code Call Alternative of S-MATCH TOOL
   //echo "Output of Smatch= $output1";
			}
	else if($process[$i]==4)   // Current Location is chosen as preference
	{
		$data=" Current Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user1.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");
	
	$data=$profession[14];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
fclose($fp);
			$data=" Current Location";
$file = "C:\\wamp\\www\\mysite\\trustbook\\smatch\\bin\\user2.txt";
$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("5Couldn't write values to file!");
	
	$data=$profession1[14];
fwrite($fp, "\n") or die("16Couldn't write values to file!");
fwrite($fp, $data) or die("13Couldn't write values to file!");


$data=$profession1[1];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("22Couldn't write values to file!");


$data=$profession1[2];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");


$data=$profession1[3];
//fwrite($fp, "\n") or die("27Couldn't write values to file!");
fwrite($fp, " - ") or die("Couldn't write values to file!");
fwrite($fp,$data) or die("Couldn't write values to file!");
fclose($fp);}
	$output1=shell_exec("Locationmatching.exe user1.txt user2.txt");  
	$similarity_score[$index[$i]]=$output1;
	}
	
	$index1=array();$paths_preference=array();
	if($p1>=0 && $p1!=1000)
	{$p1_name=$paths[$p1];array_push($paths_preference,$p1_name);array_push($index1,0);}
     if($p2>=0 && $p2!=1000)
	{$p2_name=$paths[$p2];array_push($paths_preference,$p2_name);array_push($index1,1);}
      if($p3>=0 && $p3!=1000)
	{$p3_name=$paths[$p3];array_push($paths_preference,$p3_name);array_push($index1,2);}
if($p4>=0 && $p4!=1000)
	{$p4_name=$paths[$p4];array_push($paths_preference,$p4_name);array_push($index1,3);}
	  
	  //echo"At line no 3905 index size= ";echo sizeof($index1);
	  
      $file = fopen("C:\\wamp\\www\\mysite\\trustbook\\smatch\\test-data\\cw\\result-cw.txt","r");
      //echo"<br> <br>Path1: $p1_name <br>";echo"Path2: $p2_name <br>";echo"Path3: $p3_name <br>";echo"Path4: $p4_name <br>";
      $txt_file = file_get_contents('C:\\wamp\\www\\mysite\\trustbook\\smatch\\test-data\\cw\\result-cw.txt');
        $rows = explode("\n", $txt_file);
        //echo "<p> At line 1080 row count :".sizeof($rows)."</p>";
        array_shift($rows);
        



$sz1=sizeof($paths_preference);// echo"At line no 3917 paths size= ";echo $sz1;
//echo "At line 1088 1st preference " . $paths_preference[0] . "\t and \t" . $paths_preference[1] . " \tand \t" . $paths_preference[2] . "\tand \t".$paths_preference[3].".";


        while($count<($sz1))
    {$values=array();
        $path=$paths_preference[$count];
        foreach($rows as $row => $line)

            {
              //echo "<p> At code line no 1099 :<br>line is :".$line."<p>";
                if($line=="")
                    {
                        break;
                    }
					
               // $line = fgets($file);
                    //echo "aloha";
                $var = explode("\t",$line);
                //echo "size after explode :".sizeof($var)."</p>";
                $path1=explode("\\",$var[0]);
                $s_var = sizeof($path1);
                 //first path without attribute value ,p1
                $p1="";
                  //echo "<p> svar :".$s_var."</p>";
                  $s_var=$s_var-1;$len1=$s_var;
                while($s_var>0)
                {
                    $p1="/".$path1[$s_var].$p1;
                    $s_var=$s_var-1;
                }

                $path2=explode("\\",$var[2]);
                $s_var = sizeof($path2);
                $s_var=$s_var-1;$len2=$s_var;
                 //second path without attribute value, p2
                $p2="";

                while($s_var >0)
                {
                    $p2="/".$path2[$s_var].$p2;
                    $s_var=$s_var-1;

                } //echo $p2;echo"<br>";
				//if($count==0){echo"p2='$p2'";}
                //echo "<p> path 1:".$p1."\t path2 :".$p2."</p>";
                if( strpos($p1,$path)!==false && strpos($p2,$path)!==false &&($len1==5 && $len2==5))      /* THIS IS FOR the case when suppose path is superclass then weight will be given to all of its subclasses */
                { //echo "<p> path 1:".$p1."\t path2 :".$p2."</p>";
                 // echo "<p> in loop at line 1136 <br></p>";
                  if($var[1]=="="  &&($len1==5 &&$len2==5))
                  {//echo"this is condition of preference calculation where = sign is there.<br>";
                   // $weight=$weight + $values[$count];
				  array_push($values,1);}
			    
                   if($var[1]==">"  &&($len1==5&&$len2==5) )
                  {//echo"this is condition of preference calculation where > sign is there.<br>";
                    //$weight=$weight + 0.4*$values[$count];
                    $random=mt_rand(2000000,4000000);
$random=$random/10000000;
$random1=round($random,5);
					array_push($values,$random1);
                  }
                  if($var[1]=="<"  &&($len1==5&&$len2==5))
                  {//echo"this is condition of preference calculation where < sign is there.<br>";
                    //$weight=$weight + 0.7*$values[$count];
                    $random=mt_rand(5000000,7000000);
$random=$random/10000000;
$random1=round($random,5);
					array_push($values,$random1);
                  }
                  if($var[1]=="!" &&($len1==5&&$len2==5))
						array_push($values,0);
                 // break;
                }
                //echo $var[0]."<br />";
                //echo $var[1]."<br />";
                //echo $var[2]."<br />";
            }
			$sum=0;
			for($i=0;$i<sizeof($values);$i++)
			{$sum+=$values[$i];}
		if(sizeof($values)!=0)
		$sum=$sum/ sizeof($values);
		//echo"At line no 3950 similarity score=";echo $sum;echo "<br>";
		$similarity_score[$index1[$count]]=$sum;
	$count=$count+1;}
    //echo"this is loop of preference calculation <br>";
    /* multiplying with ahp values*/
    //echo "<p> values size :".sizeof($values)."</p>";  
    $output=shell_exec("project.exe  $selections" );//echo"On line 1644, output=   ";echo $output;
$v=explode(" ",$output);
/*for($i=0;$i<sizeof($v);$i++)
{echo"     ";echo $v[$i];}*/
	$ahp2=array();
    array_push($ahp2,$v[0]);
    array_push($ahp2,$v[1]);
    
   
    $weight=$similarity_score[0]*$ahp2[0]+$similarity_score[1]*$ahp2[1];
	//$weight=$weight* $rd;
	// preference calculation ends
//echo "<p>  selections =2 weight preference :".$weight."<p>";   
}
      // default calculation starts
$values_d=array(0.0556,0.0556,0.0556,0.0556,0.0556,0.0556,0.0556,0.0556,0.0556,0.0556,0.0556,0.0556,0.0556,0.0556,0.0556,
0.0556,0.0556,0.0556);
$cdcd=count($values_d);
$rowdy=sizeof($preferenceindex);     // Removal of preference  Attributes
//echo"<br> At line no 1623 size of prefindex= $rowdy ";
//echo "<br> At line 4022 conting result = $cdcd ";
 for($i=0;$i<$rowdy;$i++ )   // Removing chosen attributes from remaining attributes.
 {$values_d[$preferenceindex[$i]]=0;
	//echo "<br> At line 1628 = ";echo $values_d[$preferenceindex[$i]]; 
 }
 
 
 
 
 $weight_d=0;
    $count=0;
    $txt_file = file_get_contents('C:\\wamp64\\www\\mysite\\trustbook\\smatch\\test-data\\cw\\result-cw.txt');
        $rows = explode("\n", $txt_file);
        array_shift($rows);
    while($count<sizeof($paths))
    {
      $path = $paths[$count];	 
	 //echo $path;echo "<br>";
    foreach($rows as $row => $line)
        {
          //$line = fgets($file);
          if($line=="")
          {
            break;
          }
		  //echo $line;echo "<br>";
          $var = explode("\t",$line);
          $path1=explode("\\",$var[0]);
          $s_var = sizeof($path1);
          $s_var=$s_var-1;
                 //first path without attribute value ,p1
                $p1="";

          while($s_var >0)
          {
            $p1="/".$path1[$s_var].$p1;
            $s_var=$s_var-1;$len1=$s_var;
          }

          $path2=explode("\\",$var[2]);
          $s_var = sizeof($path2);
          $s_var=$s_var-1;
                 //second path without attribute value, p2
                $p2="";

          while($s_var >0)
          {
            $p2="/".$path2[$s_var].$p2;
            $s_var=$s_var-1;$len2=$s_var;

          }
          if(strpos($p1,$path)!==false && strpos($p2,$path)!==false )
          { //echo $p1;echo"   ";echo $p2;
                  if($var[1]=="=")
                  {
                    $weight_d=$weight_d + $values_d[$count];
                  }
                  else if($var[1]==">")
                  {
                    $weight_d=$weight_d + 0.4*$values_d[$count];
                  }
                  else if($var[1]=="<")
                  {
                    $weight_d=$weight_d + 0.7*$values_d[$count];
                  }
                  else if($var[1]=="!")
                  {
                    $weight_d=$weight_d + 0*$values_d[$count];
                  }
				  //break;
          }
          //echo $var[0]."<br />";
          //echo $var[1]."<br />";
          //echo $var[2]."<br />";
        }
      $count=$count+1;
    }
$weight_d=$weight_d/18;
  $weight_d = $weight_d * 0.5*0.632 ;
  //echo "<p> weight default :".$weight_d."<p>";
        // default calculation ends


        // mutual calculation starts
          $po=$uid-1;
	            $stmt1="Select user_one_id AS user_id,status from relationship  where user_two_id=$uid && status>=0 && user_one_id<=$po UNION  (Select user_two_id AS user_id,status from relationship  where user_one_id=$uid && status>=0 && user_two_id>$uid)" ;
$stmt2="Select user_one_id AS user_id,status from relationship  where user_two_id=$sender && status>=0 && user_one_id<=$sender-1  UNION  (Select user_two_id AS user_id,status from relationship  where user_one_id=$sender && status>=0 && user_two_id>$sender)" ;

                 $count=0;
                 $Random_count=0;  $Professional_friend_count=0;
                 $college_friend_count=0; $close_friend_count=0;
                 $Family_count=0;
                 $school_friend_count=0;
                 $Relatives_count=0;
foreach ($conn->query($stmt1) as $row1)
{foreach ($conn->query($stmt2) as $row2)
	{if($row1[0]==$row2[0])
{$count=$count+1;
                            if($row1[1]==0)
                            {
                              $close_friend_count=$close_friend_count+1;  
                            }
                            if($row1[1]==1)
                            {
                              $Family_count=$Family_count+1;  
                            }
                            if($row1[1]==2)
                            {
                              $Random_count=$Random_count+1;  
                            }
							if($row1[1]==3)
                            {
                              $Professional_friend_count=$Professional_friend_count+1;  
                            }
							if($row1[1]==4)
                            {
                              $college_friend_count=$college_friend_count+1;  
                            }
							if($row1[1]==5)
                            {
                              $school_friend_count=$$school_friend_count+1;  
                            }
							if($row1[1]==6)
                            {
                              $Relatives_count=$Relatives_count+1;  
                            }
} //outer if
}  //inner loop

}
 //outer loop

	/*echo"Random_count=$Random_count"; echo"<br>";			 
	 echo"Relatives_count=$Relatives_count";echo"<br>";
	 echo"Close_count=$close_friend_count";echo"<br>";
	 echo"College_count=$college_friend_count";echo"<br>";
	 echo"Professional_count=$Professional_friend_count";echo"<br>";
	 echo"School_count=$school_friend_count";echo"<br>";
	 echo"Family_count=$Family_count";echo"<br>"; */
         $total_mutual_friend = $close_friend_count + $Family_count + $Random_count+$college_friend_count+$Professional_friend_count+$school_friend_count+$Relatives_count;
				 
				 if($total_mutual_friend !=0){//echo"this is non zero case at line no 4939";
					 /*for($i=0;$i<sizeof($preferencepath);$i++)
		  {echo $preferencepath[$i];echo" at  line 2012<br>";}  */
		  $Default_list=array("/Thing/Profile_info"=>"Family_friend","/Thing/Location"=>"Relative_friend","/Thing/Education"=>"College_friend",
"/Thing/Profession"=>"Professional_friend");
$default=array("Close_friends","Family_friend","Relative_friend","College_friend",
"Professional_friend","Random");
$category_weight=array();
$category_count=array("Family_friend"=>$Family_count,"Relative_friend"=>$Relatives_count,"College_friend"=>$college_friend_count,
"Professional_friend"=>$Professional_friend_count,"Close_friends"=>$close_friend_count,"Random"=>$Random_count);

/*$p=array();
$p[0]="/Thing/Profile Info";$p[1]="/Thing/Location";$p[2]="/Thing/Education";$p[3]="/Thing/Profession"; */
  $friend_list=array();$tmp=array();
for($i=0;$i<$selections;$i++)
{$tmp[$i]=$Default_list[$preferencepath[$i]];
$pos = array_search($tmp[$i], $default);
unset($default[$pos]);
if($category_count[$tmp[$i]]!=0)
array_push($friend_list,$tmp[$i]);
}

foreach($default as $row)
{if($category_count[$row]!=0)
array_push($friend_list,$row);}
$z=sizeof($friend_list);

/*for($i=0;$i<sizeof($friend_list);$i++)
{echo $friend_list[$i];echo"<br>";
}*/
	$output=shell_exec("project.exe  $z" );//echo"On line 1644, output=   ";echo $output;
$v=explode(" ",$output);$sum=0;
for($j=0;$j<$z;$j++)
{//echo"     ";echo $v[$j];echo   $sum   ;
$tmp=$friend_list[$j];
$sum=$sum+(($v[$j]*$category_count[$tmp])/$total_mutual_friend);} 
				 
				 /*$family_weight=  0.5 *($Family_count/ $total_mutual_friend);
				 $close_friend_weight=  0.3 *($close_friend_count/ $total_mutual_friend);
				 $college_friend_weight=  0.2 *($college_friend_count/ $total_mutual_friend);
				 $school_friend_weight=  0.2 *($school_friend_count/ $total_mutual_friend);
				 $Professional_friend_weight=  0.2 *($Professional_friend_count/ $total_mutual_friend);
				 $Random_friend_weight=  0.02 *($Random_count/ $total_mutual_friend);
				 $Relatives_friend_weight=  0.4 *($Relatives_count/ $total_mutual_friend); */
				 }
				 else{
					$family_weight =0;
					$college_friend_weight =0;
					$school_friend_weight =0;
					$Professional_friend_weight=  0;
					$Random_friend_weight=0;
					 $Relatives_friend_weight= 0;
					 $close_friend_weight=  0;
					 $sum=0;
				 }
				  
          

	  
		  
         //$mutual_friend_factor= 0.5*0.368;
         $mutual_friends_weight = $sum;

				 $beta=0;$eta=0;
				 if($weight==0)
				 {$beta=0;}
			 else{$beta=0.5;}
				 if($mutual_friends_weight==0)
				 {$eta=1;}
				 else{$eta=0.5;}
				 
				// echo "<p> Trust of mutual friends:".$mutual_friends_weight."<p> ";
        // mutual calculation ends
//echo"<p> Trust weight from preference attributes: $weight <br>";
//echo"<p>Trust weight from remaining attributes: $weight_d <br>";
         // trust value
		 if($selections==1)
		 {$trust_profile_attribute=$weight;
	 $Final_trust = $eta*($trust_profile_attribute)+(1-$eta)*$mutual_friends_weight;
	 } 
		 else
		 {$trust_profile_attribute=$beta*($weight)+(1-$beta)*($weight_d);//echo"<br>profile attri= $trust_profile_attribute";
         $Final_trust = $eta*($trust_profile_attribute)+(1-$eta)*$mutual_friends_weight;}
         //trust value
         		 //echo"<p> trust: $Final_trust <br>";

		 $trust=$Final_trust*100;
         //echo "<br><p> TRUST:= ".$trust."<p>";

echo "mutual friend weight= $total_mutual_friend";

    echo '<br>Trust score based on profile matching='.round($trust,2)."%<br><br>"; 
    if($trust>=48){
                echo "The user is trustworthy enough according to the system.<br><br> Do you want to accept friend request?<br><br>
                
                <form action='confirmfriend.php' method='POST'>
                        <input type='hidden' name='sender' value=".$sender.">
                        Choose circle
                        <select name='circle' style='background:yellow;font-weight:900;'>
                            <option value='0'>Close_Friend</option>
                            <option value='1'>Family</option>
                            <option value='2'>Random</option>
							<option value='3'>Professional_Friend</option>
                            <option value='4'>College_Friend</option>
                            <option value='5'>School_friend</option>
							<option value='6'>Relatives</option>
                            
                            
                        </select>
                        <input type='submit' value='Confirm'>
                     </form>
               <br> <button><a href='./declinerequest.php'>No</button><button><a href='./pendingrequest.php'>Change                    Preference</a></button>";
            }
            else {
                echo "The user is not much trustworthy according to the system.";echo"<br>";
				echo"<br> Do you want to accept friend request?<br><br>
                <form action='confirmfriend.php' method='POST'>
                        <input type='hidden' name='sender' value=".$sender.">
                        Choose circle
                        <select name='circle' style='background:yellow;font-weight:900;'>
                            <option value='0'>Close_Friend</option>
                            <option value='1'>Family</option>
                            <option value='2'>Random</option>
							<option value='3'>Professional_Friend</option>
                            <option value='4'>College_Friend</option>
                            <option value='5'>School_friend</option>
							<option value='6'>Relatives</option>
                            
                            
                        </select>
                        <input type='submit' value='Confirm'>
                     </form>
               <br> <button><a   href='./declinerequest.php'>No</button><button><a href='./pendingrequest.php'>Change                    Preference</a></button>";
            }
?>
</div>
</body>
</html>