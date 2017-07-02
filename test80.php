<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Profile</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/homepage.css">
		<link rel="stylesheet" type="text/css" href="stylesheets/ust.css">
    </head>
<h1>@Trustbook , Be Safe Be Happy. <h1>
<hr>
<body onload="loadingAjax('myDiv');">

<script>
var arname="<?php $tr_arname=$_REQUEST['arname']; echo "$tr_arname"; ?>";
function loadingAjax(div_id)
{
    $("#"+div_id).html('<center><img src="images/loading.gif"><br><br><font color="#006699" face="arial" size="4"><b>Loading arerror.log <br><?php echo "$tr_arname"; ?> <br>Please Wait ...</b></font></center>');
    $.ajax({
        type: "POST",
        url: "ThePHPScriptPage.php",
        data: "arname=" + arname,
        success: function(msg){
            $("#"+div_id).html(msg);
        }
    });
}
</script>

<div id="myDiv">

<?php
    session_start();
	//$_SESSION['uemail']="lucy@gmail.com";
	$uemail=$_SESSION['uemail'];
	 $conn=mysqli_connect("localhost", "root", "15061994", "trustbook1");
	  $sql1="select uid,name from user_profile where email='$uemail'";
$result=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result);
if($result==False){echo "Not Sucessfull connection in register.php";}
$uid=$row['uid'];
$sql2="INSERT INTO `location_info`(`uid`, `current_city`, `current_state`, `hometown`, `past_city`, `past_state`, `country`, `place_of_birth`) VALUES ($uid,'','','','','','','')"; ;
	 $result1=mysqli_query($conn,$sql2); 
	$sql3="INSERT INTO `user_education`(`uid`, `10th_school_city`, `10th_school_state`, `10th_school_country`, `10th_school_name`, `timespan_of_10th`, `12th_school_city`, `12th_school_state`, `12th_school_country`, `12th_school_name`, `timespan_of_12th`, `primary_school_city`, `primary_school_state`, `primary_school_country`, `primary_school_name`, `timespan_of_primary`, `undergraduation_city`, `undergraduation_state`, `undergraduation_country`, `ug_college_name`, `timespan_of_ug`, `postgraduation_city`, `postgraduation_state`, `postgraduation_country`, `pg_college_name`, `timespan_of_pg`) VALUES ($uid,'','','','','','','','','','','','','','','','','','','','','','','','','');";
	 $result2=mysqli_query($conn,$sql3); 
$sql4="INSERT INTO `user_profession`(`uid`, `working_city`, `working_state`, `working_country`, `current_company_name`, `timespan_of_working`, `previous_job_title`, `current_job_title`, `previous_company`, `Relationship_status`, `Language_known`) VALUES ($uid,'','','','','','','','','','');";
	 $result3=mysqli_query($conn,$sql4);
	  $con1=mysqli_connect("localhost", "root", "15061994", "image");
	 $sql5="INSERT INTO `storeimages`(`uid`, `image`) VALUES ($uid,'')";
	 $result3=mysqli_query($con1,$sql5);
	 $name=$row['name'];
	 $sql6="INSERT INTO `timespan`(`uid`, `primary_st_date`, `primary_end_date`, `10th_st_date`,
	 `10th_end_date`, `12th_st_date`, `12th_end_date`, `ug_st_date`, `ug_end_date`, `pg_st_date`, `pg_end_date`, 
	 `job_st_date`, `job_end_date`, `curr_job_st_date`, `curr_job_end_date`, `curr_location_st_date`,
	 `curr_location_end_date`) VALUES ($uid,'20120101','20120101','20120101','20120101','20120101',
	 '20120101','20120101','20120101','20120101','20120101','20120101','20120101',
	 '20120101','20120101','20120101','20120101');";
//echo $uid;
	 if($con1==False) echo "Unsuccessfull connection into timespan table";	
	$result4=mysqli_query($con1,$sql6);
	 if($result4==False) echo "Unsuccessfull insertion into timespan table";
	 echo"Hi $name cheers,Your registration is complete.<br><br><hr>";
?>	
 </div>
 
 <a   href="facebook login.php">Back To Login.</a> </body></html>
