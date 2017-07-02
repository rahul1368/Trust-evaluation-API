<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Trustbook</title>
        <link rel="stylesheet" type="text/css" href="index.css">
        <script type="text/javascript" src="jquery-ui.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="myscript.js"></script>
    </head>
    <body>
          <div id="outer">
  <div id="login">
           <form method="post" action="./validate.php">
        <table align="center">
            <tr>
                <td>Email ID</td>
                <td><input type="email" name="uemail"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Log in"></td>
            </tr>
            
        </table>
        </form>
  </div>
  <div id="top"> <input type="button" value="LOGIN" id="b1"></div>
  <div id="center"><h1>trustbook</h1></div>
  <div id="bottom"><input type="button" value="SIGN UP" id="b2"></div>
  <div id="signup">
       
	<form method="post" action="register.php">
        <table align="center">
            <tr>
                <td>Name</td>
                <td><input type="name" name="uname"></td>
            </tr>
            <tr>
                <td>Email ID</td>
                <td><input type="email" name="uemail"></td>
            </tr>
            <tr>
                <td>Mobile Number</td>
                <td><input type="number" name="mobile"></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><input type="date" name="dob"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="radio" name="gender" value="male">Male<br>
                <input type="radio" name="gender" value="female">Female</td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Sign up"></td>
            </tr>
        </table>
        </form>
   </div>
 </div>
    </body>
</html>
