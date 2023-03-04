<?php
session_start();
function rm_special_char($str) {

//Remove "#","'" and ";" using str_replace() function

$result = str_replace( array("#", "'", ";", "?", ":", "/", "!", "(", '"', ")"), '', $str);

//The output after remove

return $result;

}
// Change this to your connection info.
define('DB_SERVER', 'localhost');
define('DB_USERNAME', '');
define('DB_PASSWORD', '');
define('DB_NAME', 'id19613881_goneroguedb');
// Try and connect using the info above.
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	$_SESSION['error'] = 'Internal error. Please reload and try again.';
	header("Location: index.php");
	exit;
}
if ($_POST['pass'] !== "") {
    $sql = "UPDATE Logins SET Password = '" . password_hash(rm_special_char($_POST['pass'])) . "' WHERE name = '" . $_SESSION['name'] . "'";
    if (mysqli_query($con, $sql)) {

        $_SESSION['error']= 'Password changed! Please login again.';
$_SESSION['name'] = "";
$_SESSION['loggedin'] = false;
header ("Location: login.php");
    }
    else {
        echo 'Internal error occured.';
    }
}
else {
    echo 'Please fill out the password field.';
}
?>
