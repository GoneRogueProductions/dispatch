<?php
session_start();
if  (isset($_SESSION['lastregister'])){
	$diff = time() - $_SESSION['lastregister']; 
	if ($diff < 86400) {
		$_SESSION['error'] = 'You may only register every 1 day.';
		header("Location: /login.php");
		exit;
	}
}
// Change this to your connection info.
define('DB_SERVER', 'localhost');
define('DB_USERNAME', '');
define('DB_PASSWORD', '');
define('DB_NAME', 'id20398710_dispatch');
// Try and connect using the info above.
$con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ( $con->connect_error ) {
	// If there is an error with the connection, stop the script and display the error.
	$_SESSION['error'] = 'Internal error. Please refresh and try again.';
	header("Location: /login.php");
	exit;
}
if ($_POST['regpassword'] != $_POST['password1']) {
	// Could not get the data that should have been sent.
	$_SESSION['error'] = "Passwords don't match. Please check your fields.";
	header("Location: /login.php");
	exit;
}
$text = $_POST['regusername'];
$b1 = "porn";
$b2 = "sex";
$b3 = "shit";
$b4 = "fuck";
$b5 = "piss";
$b6 = "dick";
$b7 = "ass";
$b8 = "bitch";
$b9 = "bastard";
$b10 = "cunt";
$b11 = "bollock";
$b12 = "blood";
$b13 = "shag";
$b19 = "sus";
$b20 = "ligma";
$b21 = "balls";
// $b17 = "trash";
// $b16 = "rubbish";
$b14 = "twat";
$b15 = "stuffed";
$b18 = "p0rn";
$btest = "filtertest";
if (stripos($text, $b1) !== FALSE || stripos($text, $b2) !== FALSE || stripos($text, $b3) !== FALSE || stripos($text, $b4) !== FALSE || stripos($text, $b5) !== FALSE || stripos($text, $b6) !== FALSE || stripos($text, $b7) !== FALSE || stripos($text, $b8) !== FALSE || stripos($text, $b9) !== FALSE || stripos($text, $b10) !== FALSE || stripos($text, $b11) !== FALSE || stripos($text, $b12) !== FALSE || stripos($text, $b13) !== FALSE || stripos($text, $b14) !== FALSE || stripos($text, $b15) !== FALSE || stripos($text, $btest) !== FALSE || stripos($text, $b18) !== FALSE || stripos($text, $b19) !== FALSE || stripos($text, $b20) !== FALSE || stripos($text, $b21) !== FALSE) {
        $_SESSION['error'] = 'Explicit words are not allowed as names.';
	    header("Location: /login.php");
	    exit;
}
if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['regusername']) == 0) {
    $_SESSION['error'] = "Special characters aren't allowed in usernames.";
	header("Location: /login.php");
	exit;
}
if ($_POST['regusername'] == "" || $_POST['regpassword'] == "" || $_POST['password1'] == "") {
    $_SESSION['error'] = 'Please check all fields.';
	header("Location: /login.php");
	exit;
}

// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT name, password FROM Logins WHERE name = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['regusername']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		$_SESSION['error'] = 'Username already exists, please choose another.';
	    header("Location: /login.php");
	    exit;
	} else {
		if ($stmt = $con->prepare('INSERT INTO Logins (Name, Password) VALUES (?, ?)')) {
            // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
            $password = password_hash($_POST['regpassword'], PASSWORD_DEFAULT);
            $stmt->bind_param('ss', $_POST['regusername'], $password);
            $stmt->execute();
            $_SESSION['error'] = "";
            if ($_SESSION['service'] == "profile") {
                header("Location: profile.php");
            }
            else {
                header('Location: /');
            }
			if (!isset($_SESSION['lastregister'])) {
				$_SESSION['lastregister'] = time();
			}
        } else {
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            $_SESSION['error'] = 'Internal error. Please refresh and try again.';
	        header("Location: /login.php");
	        exit;
        }
	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	$_SESSION['error'] = 'Internal error. Please refresh and try again.';
	header("Location: /login.php");
	exit;
}
$con->close();
?>
