<html>
<body>
<select name="hierarchiacal">
<option class="level_1">United States</option>
    <option class="level_2">Hawaii</option>
        <option class="level_3">Kauai</option>
    <option class="level_2">Washington</option>
        <option class="level_3">Seattle</option>
        <option class="level_3">Chelan</option>
</select>
<select name="Something">
  <option>United States</option>
  <option>&#160;Hawaii</option>
  <option>&#160;&#160;Kauai</option>
  <option>&#160;Washington</option>
  <option>&#160;&#160;Seattle</option>
  <option>&#160;&#160;Chelan</option>
</select>
<script type='text/javascript'>$(document).ready(
function(){
   $('.level_2').each(
        function(){
            $(this).text('----'+$(this).text());
        }
   );

   $('.level_3').each(
        function(){
            $(this).text('---------'+$(this).text());
        }
   );

 }
);</script>
</body>


</html>



<?php
    //session_start();
    try{//echo"hi";
        $dbuser = 'rahul';
        $dbpass = '15061994';$uid=1;
        $db='trustbook1';
        //$conn = new PDO('mysql:host=localhost;dbname='.$db, $dbuser, $dbpass);
        //$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $con=mysqli_connect("localhost","root","15061994","trustbook1");//if($con) {echo"Ya! Successfull Connection.";}
		$stmt="select imgtype, image from user_profile where uid='$uid' ";
        $retval=mysqli_query($con,$stmt);
			if ($retval === FALSE) {
    echo"Not Sucessfull Connection in test.php";}
        $row=mysqli_fetch_array($retval);
        $imageType=$row[0];
        $imageData=$row[1];
        //header("content-type: image/jpeg");
       // echo $imageData;
		echo '<img src="data:image/jpeg;base64,'.base64_encode( $imageData->load()).'"/>';
    //session_start();
	$_SESSION['image']=$imageData;}
    catch(Exception $e)
    {
        $e->getMessage();
    }
?>
