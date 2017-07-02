<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sign up</title>
    </head>
    <body>
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
    </body>
</html>
