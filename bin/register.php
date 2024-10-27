<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <?php 

    include("include/connection.php");


    if (isset($_POST['subBtn'])) {
            $id = $_POST['userid'];
            $Fname = $_POST['fname'];
            $Lname = $_POST['lname'];
            $Uname = $_POST['uname'];
            $Pass = $_POST['password'];

            $myAccount = "INSERT INTO register(userID,Fname,Lname,Username,Password)VALUES('{$id}','{$Fname}','{$Lname}','{$Uname}','{$Pass}')";
            if ($myLoginSession->query($myAccount)==TRUE) {
                 echo '<script>';
                 echo 'alert("You have successfully created an account");';
                 echo '</script>';
            }
        }



    ?>
    <h2>Register New Account</h2>
    <form method="post" action="register.php">
        <input type="text" id="userid" name="userid" hidden><br><br>

        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" required><br><br>

        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" required><br><br>

        <label for="uname">Username:</label>
        <input type="text" id="uname" name="uname" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" name="subBtn" value="Register">
    </form>
</body>
</html>
