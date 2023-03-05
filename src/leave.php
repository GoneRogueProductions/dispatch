<?php
session_start();
define('DB_SERVER1', 'localhost');
define('DB_USERNAME1', '');
define('DB_PASSWORD1', '');
define('DB_NAME1', 'groups');
// Create connection
$conn = mysqli_connect(DB_SERVER1,DB_USERNAME1,DB_PASSWORD1,DB_NAME1);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM `".$_SESSION['name']."` WHERE id=".$_SESSION['service']."";
$result = mysqli_query($conn, $sql);

$_SESSION['service'] = "";

mysqli_close($conn);
header("Location: /newinterface.php");
exit;
?>
