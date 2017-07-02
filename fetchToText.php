<?php
    session_start();
    include './functions.php';
    if(isset($_SESSION["uemail"])){
        $uemail=$_SESSION["uemail"];
        try{
            $conn=connect('trustbook1'); 
            $stmt=$conn->prepare("select * from user_profile where email=:uemail");
            $stmt->execute(array('uemail'=>$uemail));
            $row=$stmt->fetch();
        }
        catch (PDOException $e){
            $e->getMessage();
        }        
    }
    else{
        redirect('./index.php');
    }
	
//$saving = $_REQUEST['saving'];
//if ($saving == 1){
	//echo $row[3];
	
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

$data = "bihar";//$row[7];

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

$data="bareilly";//$row[6];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        City") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "           ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="ap";//$row[];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        State") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "           ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="india";//$row[];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Country") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "           ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = "      Past_Location";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="faizabad";//$row[];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        City") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "           ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="up";//$row[];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        State") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "           ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data="amrica";//$row[];
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Country") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "           ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");






$data = "    Education";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = "      Past_Education";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data ="nitp";// $row[8];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Institute") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = "2016";//$row[9];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Year") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data = "b.tech";//$row[10];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Course") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = "cse";//$row[];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Field") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data = "patna";//$row[11];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Location") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data = "      Current_Education";
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data = "iitp";//$row[12];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Institute") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = "2014";//$row[13];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Year") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data = "m.tech.";//$row[14];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Course") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data ="cse";//row[14];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Field") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data = "patna";//$row[15];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Location") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");




$data = "    Profession";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = "      Past_Profession";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");


$data = "developer";//$row[16];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Job_Title") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = "google";//$row[17];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Employer") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data ="2020";// $row[18];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Year") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data ="california";// $row[19];

fwrite($fp, "        Location") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");




$data = "      Current_Profession";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = "se";//$row[20];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Job_Title") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = "apple";//$row[21];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Employer") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data ="2025";// $row[22];
;
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Year") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = "ny";//$row[23];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        Location") or die("Couldn't write values to file!");
fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "          ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = "    Interest";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");



$data = "      Interest_name";

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");

$data = "bakaiti";//$row[26];

fwrite($fp, "\n") or die("Couldn't write values to file!");
fwrite($fp, "        ") or die("Couldn't write values to file!");
fwrite($fp, $data) or die("Couldn't write values to file!");




echo "Saved to $file successfully!";
//}


?>