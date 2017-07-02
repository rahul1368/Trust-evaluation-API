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
        redirect('./index.php');
    }
    /*steps to be followed
     1.make two txts
     2.execute s-match
     3.prefernce calculation
    4.default calculation
    5.mutual calculation
     steps end*/
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Friends requests</title>
        <link rel="stylesheet" type="text/css" href="homepage.css">
    </head>
    <body>
        <div class="header">
        <h1><a href="home.php">trustbook</a></h1>
	<h3><?php echo $rowdefault[4]; ?></h3>
        <?php 
        if($rowdefault[13]=='blank'){
            echo "<img src='images/profille.jpg' id='dp'style='height: 130px;width: 110px;border-radius: 6px;'/>";
        }
        else{
            echo "<img src='test.php' alt='img' style='height: 130px;width: 110px;border-radius: 6px;' id='dp'>";
        }
        ?>
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

// first txt starts
// echo"uemail=$uemail";echo $_POST['sender'];
$data = "Thing";
$file = "C:\\wamp64\\www\\trustbook1\\s-match-20131104\\test-data\\cw\\c.txt";

$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("Couldn't write values to file!");

fclose($fp);

$data = "    Profile_Info";
$file = "C:\\wamp64\\www\\trustbook1\\s-match-20131104\\test-data\\cw\\c.txt";

$fp = fopen($file, "a") or die("Couldn't open $file for writing!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = $location[3];


fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "      Hometown") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!101");



$data = "    Location";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = "      Current_Location";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data=$location[1];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Current_City") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "           ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!120");

$data=$location[2];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        State") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!here");

$data=$location[6];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Country") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "           ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = "      Past_Location";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data=$location[4];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        City") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "           ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data=$location[5];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        State") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "           ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data=$location[6];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Country") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "           ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");






$data = "    Education";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = "      Primary_Education";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data =$education[14];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Primary_school_name") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!187");

$data =$education[11];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Primary_school_city") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education[12];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Primary_school_state") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education[13];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Primary_school_country") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education[15];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Primary_school_timespan") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data = "      High_School_Education";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data =$education[4];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        High_school_name") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education[1];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        High_school_city") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education[2];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        High_school_state") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education[3];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        High_school_country") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education[5];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        High_school_timespan") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data = "      Intermediate_Education";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data =$education[9];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "       Intermediate_school_name") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education[6];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Intermediate_school_city") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education[7];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Intermediate_school_state") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education[8];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Intermediate_school_country") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education[10];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Intermediate_school_timespan") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = "      Undergraduation_Education";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");




$data =$education[19];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "       Undergraduation_school_name") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education[16];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Undergraduation_school_city") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education[17];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Undergraduation_school_state") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education[18];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Undergraduation_school_country") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education[20];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Undergraduation_school_timespan") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data = "      Postgraduation_Education";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");




$data =$education[24];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "       Postgraduation_school_name") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education[21];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Postgraduation_school_city") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education[22];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Postgraduation_school_state") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data =$education[23];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "       Postgraduation_school_country") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education[25];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Postgraduation_school_timespan") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data = "    Profession";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = "      Past_Profession";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data = $profession[6];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Job_Title") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = $profession[8];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Employer") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

//echo"second file starts";

$data =$profession[5];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Timespan_of_working") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");




$data = "      Current_Profession";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = $profession[7];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Job_Title") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = $profession[4];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Employer") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data =$profession[1];
;
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Working_city") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = $profession[2];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Working_state") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = $profession[3];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Working_country") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = $profession[9];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Relationship_status") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = "      Language_known";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = $profession[10];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        ") or die("Couldn't write values to file!");
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
$file = "C:\\wamp64\\www\\trustbook1\\s-match-20131104\\test-data\\cw\\w.txt";

$fp = fopen($file, "w") or die("Couldn't open $file for writing!");
fwrite($fp, $data) or die("Couldn't write values to file!");

fclose($fp);

$data = "    Profile_Info";
$file = "C:\\wamp64\\www\\trustbook1\\s-match-20131104\\test-data\\cw\\w.txt";

$fp = fopen($file, "a") or die("Couldn't open $file for writing!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = $location1[3];

//echo "<p> Hometown".$data."<p>";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "      Hometown") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = "    Location";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = "      Current_Location";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data=$location1[1];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Current_City") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "           ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data=$location1[2];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        State") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!here");

$data=$location1[6];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Country") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "           ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = "      Past_Location";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data=$location1[4];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        City") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "           ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data=$location1[5];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        State") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "           ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data=$location1[6];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Country") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "           ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");






$data = "    Education";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = "      Primary_Education";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data =$education1[14];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Primary_school_name") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education1[11];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Primary_school_city") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education1[12];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Primary_school_state") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education1[13];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Primary_school_country") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education1[15];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Primary_school_timespan") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data = "      High_School_Education";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data =$education1[4];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        High_school_name") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education1[1];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        High_school_city") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education1[2];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        High_school_state") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education1[3];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        High_school_country") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education1[5];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        High_school_timespan") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data = "      Intermediate_Education";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data =$education1[9];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "       Intermediate_school_name") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education1[6];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Intermediate_school_city") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education1[7];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Intermediate_school_state") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education1[8];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Intermediate_school_country") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education1[10];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Intermediate_school_timespan") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = "      Undergraduation_Education";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");




$data =$education1[19];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "       Undergraduation_school_name") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education1[16];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Undergraduation_school_city") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education1[17];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Undergraduation_school_state") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education1[18];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Undergraduation_school_country") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education1[20];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Undergraduation_school_timespan") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data = "      Postgraduation_Education";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");




$data =$education1[24];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "       Postgraduation_school_name") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education1[21];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Postgraduation_school_city") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education1[22];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Postgraduation_school_state") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data =$education1[23];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "       Postgraduation_school_country") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data =$education1[25];

fwrite($fp, "\n") or die("Couldn't write values to file!here 8");
fwrite($fp, "        Postgraduation_school_timespan") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data = "    Profession";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = "      Past_Profession";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data = $profession1[6];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Job_Title") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = $profession1[8];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Employer") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


//echo"There";
$data =$profession1[5];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Timespan_of_working") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = "      Current_Profession";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = $profession1[7];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Job_Title") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = $profession1[4];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Employer") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data =$profession1[1];
;
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Working_city") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = $profession1[2];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Working_state") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = $profession1[3];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Working_country") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = $profession1[9];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Relationship_status") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = "      Language_known";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = $profession1[10];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");
fclose($fp);
//second txt ends
// matching algorithm is  going to start execution
 
$var1="c.txt";$var2="w.txt";
//exec('C:\wamp64\www\trustbook1\Algorithm Descriptions of code\comparetwofiles1.exe $var1 $var2',$output123);// Background execution of smatch tool


//echo $output123[0];
;// prefernce calculation starts

$p1=$_POST["preference1"];
$p2=$_POST["preference2"];
$p3=$_POST["preference3"];
$p4=$_POST["preference4"];
//echo "<p> p1 :".$p1.", p2 :".$p2.", p3:".$p3;
$file1 = "C:\\wamp64\\www\\trustbook1\\pref1.txt";
$fp1 = fopen($file1, "w") or die("Couldn't open $file for writing!");
fwrite($fp1, "\n") or die("Couldn't write values to file!");
fwrite($fp1, "  $p1   ") or die("Couldn't write values to file!");
fwrite($fp1, "\n") or die("Couldn't write values to file!");
fwrite($fp1, "  $p2   ") or die("Couldn't write values to file!");
fwrite($fp1, "\n") or die("Couldn't write values to file!");
fwrite($fp1, "  $p3   ") or die("Couldn't write values to file!");
fwrite($fp1, "\n") or die("Couldn't write values to file!");
fwrite($fp1, "  $p4   ") or die("Couldn't write values to file!");
fclose($fp1);
$attribute_weight=shell_exec("comparetwofiles1.exe c.txt w.txt pref1.txt");
    echo "Profile Attribute Weightage= $attribute_weight <br>";
	
	
	// Mutual friend Calculation Starts
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
                            if($row2[1]==0)
                            {
                              $close_friend_count=$close_friend_count+1;  
                            }
                            if($row2[1]==1)
                            {
                              $Family_count=$Family_count+1;  
                            }
                            if($row2[1]==2)
                            {
                              $Random_count=$Random_count+1;  
                            }
							if($row2[1]==3)
                            {
                              $Professional_friend_count=$Professional_friend_count+1;  
                            }
							if($row2[1]==4)
                            {
                              $college_friend_count=$college_friend_count+1;  
                            }
							if($row2[1]==5)
                            {
                              $school_friend_count=$$school_friend_count+1;  
                            }
							if($row2[1]==6)
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
				 if($total_mutual_friend !=0){
				 $family_weight=  0.5 *($Family_count/ $total_mutual_friend);
				 $close_friend_weight=  0.3 *($close_friend_count/ $total_mutual_friend);
				 $college_friend_weight=  0.2 *($college_friend_count/ $total_mutual_friend);
				 $school_friend_weight=  0.2 *($school_friend_count/ $total_mutual_friend);
				 $Professional_friend_weight=  0.2 *($Professional_friend_count/ $total_mutual_friend);
				 $Random_friend_weight=  0.02 *($Random_count/ $total_mutual_friend);
				 $Relatives_friend_weight=  0.4 *($Relatives_count/ $total_mutual_friend);
				 }
				 else{
					$family_weight =0;
					$college_friend_weight =0;
					$school_friend_weight =0;
					$Professional_friend_weight=  0;
					$Random_friend_weight=0;
					 $Relatives_friend_weight= 0;
					 $close_friend_weight=  0;
				 }
				  
				 $mutual_friend_factor= $_POST['factor2'];
				 $mutual_friends_weight = $mutual_friend_factor *($family_weight + $college_friend_weight + $school_friend_weight+$Professional_friend_weight+
				 $Random_friend_weight+ $Relatives_friend_weight+$close_friend_weight);
//echo"Mutual_friend weight=$mutual_friends_weight";

// Final weight Calculation
$profile_attribute_weight_factor=$_POST['factor1'];
$final_weight= $profile_attribute_weight_factor*($attribute_weight)+($mutual_friend_factor)*$mutual_friends_weight;

echo"<br> Mutual Friends Weightage= $mutual_friends_weight";
// trust value
		 
         //trust value
         $trust=$final_weight*100;
         echo "<p> TRUST:= ".$trust."<p>";



    echo '<br><br>Trust score based on profile matching='.round($trust,2)."%<br>"; 
    if($trust>=40){
                echo "The user is trustworthy enough according to our system. Do you want to accept friend request?<br>
                
                <form action='confirmfriend.php' method='POST'>
                        <input type='hidden' name='sender' value=".$sender.">
                       
                        <input type='submit' value='Confirm'>
                     </form>
                <button><a  href='./declinerequest.php'>No</button><button><a href='./pendingrequest.php'>Change Preference</a></button>";
            }
            else {
                echo "The user is not much trustworthy according to our system. Do you want to accept friend request?<br>
                <form action='confirmfriend.php' method='POST'>
                        <input type='hidden' name='sender' value=".$sender.">
                       
                        <input type='submit' value='Confirm'>
                     </form>
                <button><a  href='./declinerequest.php'>No</button><button><a href='./pendingrequest.php'>Change Preference</a></button>";
            }
?>
