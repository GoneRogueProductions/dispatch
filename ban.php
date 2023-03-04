<meta name="robots" content="noindex, nofollow">
<h1>Ban Account</h1>
<?php
session_start();
if (!isset($_SESSION['name'])) {
    $_SESSION['error'] = 'You need to login before accessing this page.';
    header("Location: login.php");
    exit;
}
if ($_SESSION['name'] == "max" || $_SESSION['name'] == "werdl" || $_SESSION['name'] == "rob" || $_SESSION['name'] == "froggo" || $_SESSION['name'] == "Teapot" || $_SESSION['name'] == "2010person") {
    
}