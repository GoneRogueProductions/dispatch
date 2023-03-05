<?php
session_start();
// Change this to your connection info.
define('DB_SERVER', 'localhost');
define('DB_USERNAME', '');
define('DB_PASSWORD', '');
define('DB_NAME', 'id20398710_dispatch');
// Try and connect using the info above.
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	$_SESSION['error'] = 'Internal error. Please reload and try again.';
	header("Location: index.php");
	exit;
}

$sql = "UPDATE Logins SET Status='".$_POST['status']."' WHERE Name='".$_SESSION['name']."'";
mysqli_query($con, $sql);
echo 'updated to ';
echo $_POST['status'];
?>
<script>window.location.href="profile.php"</script>
