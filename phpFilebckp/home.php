<?php 

session_start();

if (!isset($_SESSION['userID'])) {
    header('Location: login.php');
    exit();
}

function logout() {
    $_SESSION = array();
    session_destroy();
    header('Location: login.php');
    exit();
}

if (isset($_POST['logout'])) {
    logout();
}
if (isset($_SESSION['username'])) {
    echo "Welcome, " . $_SESSION['fname'] ." ". $_SESSION['lname'] . "!";
}

// Logout button
echo "<form action='' method='post'>";
echo "<input type='submit' value='Logout' name='logout'>";
echo "</form>";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
</body>
</html>