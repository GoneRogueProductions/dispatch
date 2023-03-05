<?php
$response = array();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', '');
define('DB_PASSWORD', '');
define('DB_NAME', 'id19613881_goneroguedb');
// Try and connect using the info above.
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	header("HTTP/1.1 405");
	$response['error'] = true;
	$response['message'] = 'Internal error. Please reload and try again.';
	
}


if ($_SERVER['REQUEST_METHOD'] != 'GET') {
   $response['error'] = true;
    $response['message'] = 'This endpoint only accepts GET requests.';
    header("HTTP/1.1 405");
    echo json_encode($response);
}
if (!isset($_GET['chatroom']) || !isset($_GET['key']) || !isset($_GET['message']) || !isset($_GET['user'])) {
    $response['error'] = true;
    $response['message'] = 'Params missing.';
    header("HTTP/1.1 400");
    echo json_encode($response);
    
}
if ($stmt = $con->prepare('SELECT name, loginkey FROM Logins WHERE name = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_GET['user']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
  if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $loginkey);
    $stmt->fetch();
    // Account exists, now we verify the password.
    // Note: remember to use password_hash in your registration file to store the hashed passwords.
    if ($_GET['key'] === $loginkey) {
      // Verification success! User has logged-in!
      // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
      $text = $_GET['message'];
        if (strlen($text) > 32) {
            $text = "Text too long!";
        }
            else {
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
        $b18 = "p0rn";
        // $b17 = "trash";
        // $b16 = "rubbish";
        $b14 = "twat";
        $b15 = "stuffed";
        $btest = "filtertest";
        if (stripos($text, $b1) !== FALSE || stripos($text, $b2) !== FALSE || stripos($text, $b3) !== FALSE || stripos($text, $b4) !== FALSE || stripos($text, $b5) !== FALSE || stripos($text, $b6) !== FALSE || stripos($text, $b7) !== FALSE || stripos($text, $b8) !== FALSE || stripos($text, $b9) !== FALSE || stripos($text, $b10) !== FALSE || stripos($text, $b11) !== FALSE || stripos($text, $b12) !== FALSE || stripos($text, $b13) !== FALSE || stripos($text, $b14) !== FALSE || stripos($text, $b15) !== FALSE || stripos($text, $btest) !== FALSE || stripos($text, $b18) !== FALSE) {
            if ($service == "1") {
                $text = "!?*@$;!";
            }
        }

        $text_message = "<div class='msgln'><span class='chat-time'>" . date("d/m g:i A") . "</span> <b class='user-name'>" . $_GET['user'] . "</b> " . stripslashes(htmlspecialchars($text)) . "<br></div>";
        if (intval($_GET['chatroom']) > 0) {
            if (strval($_GET['chatroom']) == "1" || strval($_GET['chatroom']) == "2") {
                if (strval($_GET['chatroom']) == "2") {
                    $file = "log2.html";
                }
                else if (strval($_GET['chatroom']) == "1") {
                    $file = "log.html";
                }
            }
            
            else if (strval($_GET['chatroom']) != "1" || strval($_GET['chatroom']) != "2") {
                    $file = "private-".strval(intval($_GET['chatroom'])).".html";
            }
        }
        else {
            $file = $_GET['chatroom'].".html";
        }
        file_put_contents($file, $text_message, FILE_APPEND | LOCK_EX);
        $response['error'] = false;
    header("HTTP/1.1 200");
    echo json_encode($response);
    
            }
    } else {
      // Incorrect password
    $response['error'] = true;
    echo $_GET['key'];
    echo $loginkey;
    $response['message'] = 'Params incorrect.1';
    header("HTTP/1.1 400");
    echo json_encode($response);
    
    }
  } else {
    // Incorrect username
    $response['error'] = true;
    $response['message'] = 'Params incorrect.';
    header("HTTP/1.1 400");
    echo json_encode($response);
    
  }
}

?>
