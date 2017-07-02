<html>
<title>TRUSTBOOK
</title>
<head>

<link type="text/css" rel="stylesheet" href="stylesheets/ust.css" />

</head>
<body style="height:815px">

<div class="headerx">

</div>

<div class="header">
<div id="img1" class="header" />

<img src="logos/trustbook.gif" id="img1" />

</div>

<form method="post" action="./validate.php">
<div id="form1" class="header">Email or Username<br>
<input placeholder="Email" type="email" id="login" name="uemail" style='color:red;'/><br>
</div>
<div id="form2" class="header">Password<br>
<input placeholder="Password" type="password" name="password"/><br>
</div>
<div id="submit1" class="header"><input type="submit" id="button1" value="login"/></div>
</form>
<p style='font-weight:bold;font-family:verdana;font-size:65px;color:orange;'>@trustbook  </p>

</div>



$smsg=$_POST['view1'];
$fmsg=$_POST['view2'];

<div class="bodyx">
   <div id="intro1" class="bodyx" style='color:green;'>Trustbook helps you connect and share with peoples.</div>
<div id="intro2" class="bodyx">Create an account</div>
<div id="img2" class="bodyx"><img src="logos/bg5.jpg" style='width:100%;height:auto;opacity:1;min-height: 100%;
  min-width: 1024px;position: fixed;
  top: 0;
  left: 0;'/><img src="logos/godstars.gif" style='width:1000px;height:500px;opacity:1;min-height: 100%;
  min-width: 1024px;position: fixed;
  top: 0;
  left: 0;'/><img src="logos/nitpatna3.gif" style='width:1000px;height:500px;opacity:0.5;min-height: 100%;
  min-width: 1024px;position: fixed;
  top: 0;
  left: 0;'/><img src="logos/nitpatna4.gif" style='width:1000px;height:500px;opacity:0.5;min-height: 100%;
  min-width: 1024px;position: fixed;
  top: 0;
  left: 0;'/><img src="logos/natur.gif" style='width:1000px;height:500px;opacity:0.1;min-height: 100%;
  min-width: 1024px;position: fixed;
  top: 0;
  left: 0;'/>
  </div>
<div id="intro3" class="bodyx">It's free and always will be.</div>
<form method="post" action="register.php" >
<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
<div id="form3" class="bodyx"><input placeholder="Firstname" type="text" id="namebox" name="name1" /><input placeholder="Lastname" type="text" id="namebox" name="name2"/><br>
<input placeholder="Email" type="text" id="mailbox" name="uemail"/><br>
<input style="color:black;
font-family:verdana;
font-size:27px;" placeholder="Phone" type="text" id="phone" name="mobile"/><br>
<input placeholder="Re-enter email" type="text" id="mailbox"/><br>
<input placeholder="Password" type="password" id="mailbox" name="password"/><br>
<input type="date" id="namebox" name="dob"/><br><br>
<input type="radio" name="gender" value="male"/> Male  <input type="radio" name="gender" value="female" style='background-color:white;'/> Female<br><br>
By clicking Create an account, you agree to our Terms.<br><br>
<input type="submit" id="button2" value="Signup"/>

</form>
<br><hr>
Create a page for you.</div>

        </div>
		
</body>
</html>