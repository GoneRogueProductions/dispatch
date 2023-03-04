<?php

function rm_special_char($str) {

//Remove "#","'" and ";" using str_replace() function

$result = str_replace( array("#", "'", ";", "?", ":", "/", "!", "(", '"', ")"), '', $str);

//The output after remove

return $result;

}

session_start();
if (!isset($_SESSION['name'])) {
    $_SESSION['error'] = 'You need to login before accessing this page.';
    header("Location: login.php");
    exit;
}

define('DB_SERVER1', 'localhost');
    define('DB_USERNAME1', '');
    define('DB_PASSWORD1', '');
    define('DB_NAME1', 'id20398710_dispatch_groups');
// Create connection
$conn = mysqli_connect(DB_SERVER1,DB_USERNAME1,DB_PASSWORD1,DB_NAME1);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS `".$_SESSION['name']."` (
id INT NOT NULL,
name    VARCHAR(255) NOT NULL )";
if (mysqli_query($conn, $sql)) {
  
} 
else {
    die("Internal error occured!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_GET['gn'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $gn = rm_special_char($_POST['gn']);
        $m1 = rm_special_char($_POST['m1']);
        $m2 = rm_special_char($_POST['m2']);
    }
    else if (isset($_GET['gn']) && isset($_GET['m1'])) {
        $gn = rm_special_char($_GET['gn']);
        $m1 = rm_special_char($_GET['m1']);
        $m2 = rm_special_char($_GET['m2']);
    }
    else {
        header("HTTP/1.1 500");
        exit("Sorry, an internal error occured.");
    }
    $id = intval(file_get_contents("highest_id.txt")) + 1;
    
    $sql = "CREATE TABLE IF NOT EXISTS `".$m1."` (
id INT NOT NULL,
name    VARCHAR(255) NOT NULL )";
if (mysqli_query($conn, $sql)) {
  
} 
else {
    die("Internal error occured.");
}


    
    $sql = "INSERT INTO `".$m1."` (id, name) VALUES (".$id.",'".$gn."')";
    if (mysqli_query($conn, $sql)) {
  
} 
else {
    die("Internal error occured.");
}

if ($m2 !== "") {
    $sql = "CREATE TABLE IF NOT EXISTS `".$m2."` (
id INT NOT NULL,
name    VARCHAR(255) NOT NULL )";
if (mysqli_query($conn, $sql)) {
  
} 
else {
    die("Internal error occured.");
}
    $sql = "INSERT INTO `".$m2."` (id, name) VALUES (".$id.",'".$gn."')";
        if (mysqli_query($conn, $sql)) {
      
    } 
    else {
        die("Internal error occured.");
    }
}

$sql = "INSERT INTO `".$_SESSION['name']."` (id, name) VALUES (".$id.",'".$gn."')";
    if (mysqli_query($conn, $sql)) {
  
} 
else {
    die("Internal error occured.");
}

$fname = "posts/".strval($id).".php";
file_put_contents($fname, "<?php 
session_start;
if (\$_SESSION['name'] !== '".$_SESSION['name']."' || \$_SESSION['name'] !== '".$m1."' || \$_SESSION['name'] !== '".$m2."' )
 { 
 header('Location: index.php'); 
 exit; 
 }
 ?>", LOCK_EX);
 file_put_contents($fname, "<style> .userlink { color:white!important; text-decoration:none; } #cont { width:auto; border-radius:10px; } </style>
 <script> 
 function ajax(div,file) { 
     console.log(div,file); 
     const xhttp = new XMLHttpRequest(); 
     xhttp.onload = function() { document.getElementById(div).innerHTML = this.responseText; } 
     xhttp.open(\"GET\", file, true); xhttp.send(); } 
     function hov(name,id) { ajax(id,('user.php?u='+name+'&api=true')); } 
     function nomorehov(div) { document.getElementById(div).innerHTML=null; } </script>", LOCK_EX);
    
    file_put_contents("highest_id.txt", $id, LOCK_EX);

    header("Location: /newinterface.php?id=".$id);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dispatch: A no-faff chatroom that cares about privacy</title>
        <meta name="description" content="Dispatch: A no-faff simple chatroom that puts your privacy first. No emails needed, no faff chatting. Simple." />
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/style.css">

<script src="https://kit.fontawesome.com/049529442a.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<style>
            body {
                margin: 0;
                padding: 0;
                overflow: hidden;
            }
            :root {
                --clr: rgb(241, 241, 241);
            }
            html,
            .desktop,
            body {
                height: 100%;
                width: 100%;
            }
            body {
                background-color: white;
            }
            .sidenav1 {
                display: flex;
                flex-direction: column;
                flex-wrap: nowrap;
                width: 30%;
                padding: 25px;
                height: 100vh;
                background: var(--clr);
            }
        
            .icon {
                justify-content: center;
                align-items: center;
                display: flex;
                margin-right: 10px;
            }
        
            @media only screen and (max-width: 937px) {
                .sidenav1 {
                    display: none;
                }
            }
            .chats {
                overflow: hidden;
                overflow-y: scroll;
            }
        
            .tray {
                display: grid;
                grid-template-columns: auto auto auto;
                gap: 5px;
                overflow-x: scroll;
                align-items: center;
                justify-content: center;
            }
            .tray a .tray-icon {
                width: 100%;
                height: 100%;
                background: white;
                border-radius: 10px;
                padding: 10px;
        
            }
            .brand {
                display: flex;
                align-items: center;
                flex-wrap: wrap;
                justify-content: space-between;
            }
            .logout {
                color: red;
            }
            .tray a div,
            .tray a {
                display: flex;
                align-items: center;
                justify-content: center;
            }
            @media only screen and (max-width: 1322px) {
                .tray {
                    grid-template-columns: auto auto auto auto auto auto;
                    margin-top: 10px;
                }
                .brand {
                    justify-content: center;
                }
            }
        
            .chats {
                display: grid;
                grid-template-columns: auto;
                align-items: flex-start;
                justify-content: center;
                text-align: center;
            }
            .chats a {
                background: white;
                border-radius: 10px;
                padding: 10px;
                text-align: left;
                gap: 5px;
                margin-bottom: 10px;
                color: black;
                transition: 0.5s;
                text-decoration: none;
            }
            .chats a:hover {
                background: lightgray;
            }
        
            .desktop {
                display: flex;     
            }
            .main {
                margin-left: 25px;
                height: 100%;
                overflow: hidden;
                overflow-y: scroll;
            }
        </style>
    </head>
    <body>
        <div class="sidenav1">
                            <div class="brand">
                                <div class="icon">
                                    <img src="https://dispatch.ml/logo.png" style="max-height: 75px;" onclick="location.href='/';" style="cursor: pointer;">
                                </div>
                                <style>
                                    .tray-icon {
                                        transition: 0.5s;
                                    }
                                    .tray-icon:hover {
                                        background: rgb(200,200,200)!important;
                                    }
                                </style>
                                <div class="tray" style="overflow: hidden;">
                                      <a href="/">
                                        <div class="tray-icon">
                                            <i class="fa-solid fa-house"></i>
                                        </div>
                                    </a>
                                    <a href="/profile.php">
                                        <div class="tray-icon">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                    </a>
                                    <a href="/forum">
                                        <div class="tray-icon">
                                            <i class="fa-solid fa-f"></i>
                                        </div>
                                    </a>
                                    <a href="/news">
                                        <div class="tray-icon">
                                            <i class="fa-solid fa-newspaper"></i>
                                        </div>
                                    </a>
                                    <a href="/newinterface.php?logout=1">
                                        <div class="tray-icon logout">
                                            <i class="fa-solid fa-right-from-bracket"></i>
                                        </div>
                                    </a>
                                    <a href="/report.php">
                                        <div class="tray-icon logout">
                                            <i class="fa-solid fa-exclamation"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="chats" style="color: black!important; overflow-x: hidden; overflow-y: visible;">
                                <h2>Public Chatrooms</h2>
                                <a href="/newinterface.php?s=1" class="chat">
                                    <b>Public Chatroom</b>
                                </a>
                                <a href="/newinterface.php?s=2" class="chat">
                                    <b>Second Chatroom</b>
                                </a>
                                <!-- <a href="/newinterface.php?s=3" class="chat">
                                    <b>Football Chatroom</b>
                                </a> -->
                                <hr>
                                <h2>Your Groups and DMs</h2>
                                <a href="/groups/create.php" style="text-align: center; background: blue; color: white;"><i class="fa-solid fa-plus"></i>    Create a new group!</a>
                                <style>
                                    .search {
                                        border-radius: 10px;
                                        background: white;
                                        padding: 10px;
                                        margin-bottom: 15px;
                                    }
                                    .search input {
                                        outline: none;
                                        border: none;
                                    }
                                </style>
                                <div class="search">
                                    <i class="fa-solid fa-magnifying-glass" style="color: black;"></i>
                                    <input type="text" id="searchGroups" onkeyup="search();" placeholder="Search groups..." title="Search groups...">
                                </div>
                                
                                <style>
                                .groups {
                                    list-style-type: none;
                                }
                                    .groups a {
                                        width: 100%;
                                        display: block;
                                    }
                                </style>
                                <ul class="groups" id="groups" style="padding: 0;">
                                    
<?php
// Create connection

$sql = "SELECT * FROM `".$_SESSION['name']."`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<li><a href='/newinterface.php?id=".$row['id']."'>" . $row["name"]."</a></li><br>";
  }
} else {
  echo "<p style='text-align: center; font-size: 30px;
                text-align: left; margin-left: 20px; margin-top: 30px;'>You aren't in any groups!</p>";
}

mysqli_close($conn);
?>
                                </ul>
<script>
function search() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("searchGroups");
    filter = input.value.toUpperCase();
    ul = document.getElementById("groups");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
                            </div>
                        </div>
                        <style>
                            .main {
                                position:absolute;
                                right:0;
                                top:0;
                                left:30%;
                            }
                            @media (max-width: 937px) {
                                .main {
                                    left:0px;
                                    padding-left: 10px;
                                    margin-left: 0;
                                }
                                .groupForm div input {
                                    width: 100%;
                                }
                            }
                            @media (min-width: 938px) {
                                .back {
                                    display: none;
                                }
                            }
                            .back {
                                position: absolute;
                                left: 20px;
                                top: 20px;
                                border-radius: 10px;
                                background: white;
                                padding: 10px;
                            }
                            .back:focus {
                                background: rgb(200,200,200);
                            }
                        </style>
                        <div class="back text-primary" onclick="location.href='/newinterface.php';">
                            <a href="/newinterface.php"><i class="fa-solid fa-angle-left"></i>  Go Back</a>
                        </div>
        <div class="main">
                <style>
                    .text-h1 {
                        font-size: 30px;
                        padding: 10px;
                    }
                    .groupForm div {
                        display: block;
                    }
                    .groupForm {
                        display: block;
                    }
                </style>
                <form class="groupForm" method="post" action="create.php">
                    <div>
                    <h1>Group Name</h1>
                    <input type="text" class="text-h1" id="usermsg" placeholder="Group Name here..." required name="gn">
                    </div>
                    <div>
                    <h1>Member 1</h1>
                    <input type="text" class="text-h1" id="usermsg" placeholder="Group Name here..." required name="m1">
                    </div>
                    <div>
                    <h1>Member 2</h1>
                    <input type="text" class="text-h1" id="usermsg" placeholder="Group Name here..." name="m2">
                    </div>
                    <div style="margin-top: 20px;">
                        <input type="submit" class="button" value="Create">
                    </div>
                </form>
        </div>
    </body>
</html>
