<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
if (!isset($_SESSION["sent"])) {
    $_SESSION["sent"] = 0;
}
if ($_GET["logout"] == "yes") {
    session_destroy();
    exit();
}
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION["loggedin"])) {
    $_SESSION['error'] = "You must login before visiting this page.";
    header("Location: /login.php?service=profile");
    exit;
}
define('DB_SERVER', 'localhost');
define('DB_USERNAME', '');
define('DB_PASSWORD', '');
define('DB_NAME', 'id20398710_dispatch');
// Try and connect using the info above.
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    exit("Failed to connect to MySQL: " . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare("SELECT name FROM Logins WHERE name = ?");
// In this case we can use the account ID to get the account info.
$stmt->bind_param("s", $_SESSION["name"]);
$stmt->execute();
$stmt->bind_result($name);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Dispatch: Profile Page</title>
    <?php include "head.html"; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/049529442a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <?php include "head.html"; ?>
    <style>
        .flexthing {
            display: flex;
        }

        html,
        body {
            min-height: 100%;
            width: 100%;
            color: white !important;
        }

        body {
            background-image: linear-gradient(45deg, rgb(0, 0, 255), white) !important;
        }

        div a img {
            display: none;
        }

        html {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        @font-face {
    font-family: 'Source code Pro';
    src: url('../fonts/Source-Code-Pro-Regular.woff2') format('woff2');
    font-weight: 400;
    font-style: normal;
    font-display: swap;
}
@font-face {
    font-family: 'Optimistic';
    src: url('../fonts/Optimistic_Display_W_Bd.woff2') format('woff2');
    font-weight: 700;
    font-style: normal;
    font-display: swap;
}
@font-face {
    font-family: 'Optimistic';
    src: url('../fonts/Optimistic_Display_W_Md.woff2') format('woff2');
    font-weight: 400;
    font-style: normal;
    font-display: swap;
}
body {
    font-family: Optimistic,system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue","Noto Sans","Liberation Sans",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
}

        body {
            background-image: linear-gradient(45deg, rgb(0, 0, 255), white) !important;
            background-repeat: no-repeat;
            font-family: -apple-system, Roboto, "Segoe UI", Liberation Sans, SansSerif, sans-serif;
            width: 100%;
            height: 100%;
        }

        .back {
            left: 0;
            top: 0;
            margin-left: 10px;
            background: white;
            border-radius: 5px;
            max-width: 100px;
            padding: 10px;
            color: #0000ff;
            cursor: pointer;
            transition-duration: 0.4s;
        }

        .back:hover {
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        }

        .top {
            white-space: nowrap;
        }

        .top div {
            display: inline-block;
        }

        .back p {
            margin: 0;
        }

        .header h1 {
            text-align: center;
        }

        .header {
            display: inline;
            width: 100%;
        }

        noscript {
            width: 100%;
            height: 100%;
            text-align: center;
            margin: auto;
            margin: 0 10%;
        }

        noscript h1 {
            margin: auto;
        }

        .startButton {
            border-radius: 5px;
            background: #0000ff;
            color: white;
            font-size: 50px;
            transition-duration: 0.4s;
            border: 0;
            height: inherit;
            padding: 0 10px;
            cursor: pointer;
        }

        .startButton:hover {
            background: white;
            color: black;
            border: 2px solid #0000ff;
        }

        .top h1 {
            display: inline;
            margin-left: 50px;
            text-align: center;
            padding: 0 !important;
        }

        .top {
            margin-top: 20px !important;
        }

        .vertical {
            display: block;
            margin: 5px;
            width: 100%;
        }

        .container {
            margin-top: 50px;
        }

        .col-sm {
            text-align: left;
        }

        code,
        #status {
            color: black;
            background: lightgrey;
            font-family: var(--bs-font-monospace);
            border-radius: 5px;
            padding: 5px;
        }

        #verified {
            background-image: linear-gradient(90deg, orange, yellow) !important;
            border-radius: 10px;
            margin-right: 20px;
        }

        .pc {
            text-align: left;
            display: inline;
        }

        #enter {
            background: #0000ff;
            border: 2px solid #ffffff;
            color: white;
            padding: 4px 10px;
            font-weight: bold;
            border-radius: 4px;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .tb {
            padding: 5px;
        }
    </style>
</head>

<body class="loggedin">
    <div class="top">
        <div class="back" onclick="location.href='/index.php';">
            <p> <i class="fa-solid fa-angle-left"></i> Go Back</p>
        </div>
        <div class="back" onclick="location.href='/newinterface.php?logout=1';">
            <p> <i class="fas fa-sign-out-alt"></i> Logout</p>
        </div>
        <div class="header">
            <h1>Profile</h1>
        </div>
    </div>
    </div>
    <div class="flexthing">
        <div class="container">
            <div class="row">
                <div class="col-sm" style="border-right: 2px solid #0000ff;">
                    <div class="vertical">
                        <h1>Your name: <br><code><?php
              echo $_SESSION["name"];

              if (
                  $_SESSION["name"] == "max" ||
                  $_SESSION["name"] == "werdl" ||
                  $_SESSION["name"] == "rob" ||
                  $_SESSION["name"] ==
                      "froggo" /* || $_SESSION['name'] == "Teapot" */ ||
                  $_SESSION["name"] == "2010person"
              ) {
                  echo '  <i class="fa-solid fa-badge-check"></i>';
              }
              ?>
		            </code><br>
		            Messages sent today: <code><?php echo $_SESSION["sent"]; ?></code>
                        </h1>
                        <h1>Your status: <br>
                            <div id="status">
                                <?php
              
// Try and connect using the info above.
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
              // Check connection
              if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
              }

              $sql = "SELECT Status,name,mood FROM Logins";
              $result = mysqli_query($conn, $sql);
              echo '<div id="container">';
              if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while ($row = mysqli_fetch_assoc($result)) {
                      if ($_SESSION["name"] == $row["name"]) {
                          echo $row["Status"];
                          $mood = $row['mood'];
                      }
                  }
              }

              mysqli_close($conn);
              ?>
                            </div>
                        </h1>

                        <form action="status.php" method="post" class="status">
                            <input type="text" id="usermsg" class="tb" placeholder="New Status" name="status" />
                            <input type="submit" id="enter" value="Post">
                        </form>
                        <br>
                        <h1 style="padding: 0;">Your Mood</h1>
                        <em>How's your mood?</em>
                        <style>
                            .emoji-tray {
                                display: flex;
                                gap: 5px;
                                width: 100%;
                            }
                            <?php
                            echo '.emote'.$mood.' { background: green!important; }';
                            ?>
                        </style>
                        <div class="emoji-tray">
                            <button id="submitmsg" class="emote0" onclick="location.href='/setmood.php?mood=0';">😀</button>
                            <button id="submitmsg" class="emote1" onclick="location.href='/setmood.php?mood=1';">🥳</button>
                            <button id="submitmsg" class="emote2" onclick="location.href='/setmood.php?mood=2';">😡</button>
                            <button id="submitmsg" class="emote3" onclick="location.href='/setmood.php?mood=3';">☹️</button>
                            <button id="submitmsg" class="emote4" onclick="location.href='/setmood.php?mood=4';">😭</button>
                            <button id="submitmsg" class="emote5" onclick="location.href='/setmood.php?mood=5';">😐</button>
                        </div>
                    </div>
                </div>
            
            <br>


            <div class="col-sm">
                <div class="vertical">
                    <h1>Security</h1>
                </div>
                <div class="vertical">
                    <style>
                        input.error {
                            border: 3px dashed red !important;
                        }

                        label.error {
                            font-size: 1rem;
                            margin-left: 10px;
                        }
                    </style>
                    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
                    <form action="change_password.php" method="post" class="pc" id="resetForm">
                        <input maxlength="255" type="password" id="usermsg" class="tb" placeholder="Change Password" name="pass" minlength="8" />
                        <input type="submit" id="enter" value="Reset">
                    </form>
                    <script>
                        $("#resetForm").validate();
                    </script>
                </div>
                <div class="col-sm">
                    <?php if (
                $_SESSION["name"] == "werdl" ||
                $_SESSION["name"] == "max" ||
                $_SESSION["name"] == "teapot"
            ) {
                echo "<h1>Reports</h1>";

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM Reports";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "    ";
                        echo '<div class="vertical">@\'';
                        echo $row["reporter"];
                        echo "' reported @'";
                        echo $row["reporting"];
                        echo "' at ";
                        echo $row["time"];
                        echo "<br>";
                        echo "</div>";
                    }
                } else {
                    echo "No reports are presently logged";
                }

                mysqli_close($conn);
                echo '<h1><a href="sql.php"><button id="enter">Commands</button></a></h1>';
            } ?>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
