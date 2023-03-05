<?php
session_start();
if (!isset($_SESSION['name'])) {
    $_SESSION['error'] = "You have to login before you can change your mood!";
    header("Location: /login.php");
    exit;
}
define('DB_SERVER', 'localhost');
define('DB_USERNAME', '');
define('DB_PASSWORD', '');
define('DB_NAME', 'id20398710_dispatch');
// Try and connect using the info above.
$con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($con->connect_error) {
    // If there is an error with the connection, stop the script and display the error.
    exit("Failed to connect to MySQL: " . $con->connect_error);
}
if (intval($_GET['mood']) < 0 && intval($_GET['mood']) > 6) {
    echo 'Invalid value.';
    exit;
}
$sql = "UPDATE Logins SET mood=".intval($_GET['mood'])." WHERE name='".$_SESSION['name']."'";
if ($con->query($sql) === TRUE) {
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
header("Location: /profile.php");
echo '<script>window.location.href = "/profile.php";</script>';
exit;
?>
