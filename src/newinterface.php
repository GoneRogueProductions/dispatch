<?php
session_start();
$_SESSION["page"] = "/newinterface.php";

//BANNED ACCOUNTS BELOW
// echo '<script>alert("'.intval($_SESSION['service']),'");</script>';

$banned = ["rb", "Robert", "testUserBanned"];
if (in_array($_SESSION["name"], $banned) == true) {
    echo '<span class="error><h1>You are banned. Your IP is being logged. Do NOT try to register again.</h1></span>';
}
if (!isset($_SESSION["name"])) {
    $_SESSION["error"] = "You need to login before accessing this page.";
    echo '<script>window.location.href="/login.php";</script>';
    exit();
}

($service = strval($_GET["s"])) or ($service = $_SESSION["service"]);

if (strval($_GET["dmdel"]) !== "" && isset($_GET["dmdel"])) {
    $filename = strtolower(strval($_SESSION["name"])) . ".html";
    if (!unlink($filename)) {
        echo "DMs could not be deleted due to an error.";
    }
}
if (strval($_GET["logout"]) == "2") {
    $_SESSION["chatroom"] = "";
    echo '<script>window.location.href="/newinterface.php?s=3";</script>';
    exit();
} elseif (strval($_GET["logout"]) == "1") {
    session_destroy();
    echo '<script>window.location.href="/newinterface.php";</script>';
    exit();
}

$randdirect = rand(1, 1000);
if ($randdirect == 100) {
    echo '<style>background-image: url("bananas.gif"); background-repeat: space;</style>';
    exit();
}
/*if ($randdirect==1) {
echo '<style>body {background-image: linear-gradient(45deg, rgb(0, 0, 255), white); }</style><p>Work in Progresh</p>
            <div class="icons"><i class="fa-light fa-flask fa-10x fa-bounce"></i><i class="fa-light fa-vials fa-10x fa-bounce"></i><img src="\wip_joke.png"></img></div>';
    exit;
}*/

$spam = false;
if (!isset($_SESSION["sent"])) {
    $_SESSION["sent"] = 0;
}
if (!isset($_SESSION["theme"])) {
    $_SESSION["theme"] = true;
}

function checkforThemeChange()
{
    if (strval($_GET["themeChange"]) == "true") {
        if (!isset($_SESSION["theme"])) {
            $_SESSION["theme"] = false; // true is light
        }
        if ($_SESSION["theme"] == true) {
            $_SESSION["theme"] = false;
            echo '<style>
            body {
                background: #333!important; 
                color: white!important;
                
            }
            #loginform {
                background: #333!important;
            }
            body {
                background: #444!important;
                color: white!important;
            }
            #wrapper {
                background: #333!important;
            }
            body {
              background: #444!important;
              color: white!important;
            }
            #chatbox {
                background: #555!important;
            }
            #prics {
                color: black!important;
            }
            </style>';
            echo '<script>window.location.href="/newinterface.php";</script>';
        } elseif ($_SESSION["theme"] == false) {
            $_SESSION["theme"] = true;
            echo '<style>body {
                    background: white!important; 
                    color: black!important;
            }
                </style>';
            echo '<script>window.location.href="/newinterface.php";</script>';
        }
    }
}

function displayContent()
{
    if ($_GET["s"] === "st") {
    } elseif ($_GET["s"] == "g") {
        echo '<style>.groups-cont { display: flex; padding: 25px; flex-direction: column; width: 100%; height: 100%; overflow-x: hidden; gap: 20px; } .groups-cont a { background: white; border-radius: 10px; color: black!important; padding: 10px; text-decoration: none; } #main1 { margin: 0!important; }</style><h1>Your Groups</h1><div class="groups-cont"><a href="/newinterface.php?s=1">First Chatroom</a><a href="/newinterface.php?s=2">Second Chatroom</a><hr>';
        define("DB_SERVER1", "localhost");
        define("DB_USERNAME1", "");
        define("DB_PASSWORD1", "");
        define("DB_NAME1", "id20398710_dispatch_groups");
        // Create connection
        $conn1 = mysqli_connect(
            DB_SERVER1,
            DB_USERNAME1,
            DB_PASSWORD1,
            DB_NAME1
        );
        // Check connection
        if (!$conn1) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM `" . $_SESSION["name"] . "`";
        $result = mysqli_query($conn1, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<a href='newinterface.php?id=" .
                    $row["id"] .
                    "'</a>" .
                    $row["name"] .
                    "<br>";
            }
        } else {
            echo "<p style='text-align: center; font-size: 30px;
                text-align: left; margin-left: 20px; margin-top: 30px;'>You aren't in any groups!</p>";
        }

        mysqli_close($conn);
        echo "</div>";
    } else {
        if (intval($service) > 99999 && !(intval($_GET["id"]) > 99999)) {
            header("Location: /newinterface.php?id=" . $service);
        }
        if (isset($_GET["s"])) {
            $service = strval($_GET["s"]);
        } elseif (isset($_GET["id"])) {
            $service = $_GET["id"];
        } else {
            $service = $_SESSION["service"];
        }
        if (intval($service) > 99999) {
            $fname = "./groups/posts/" . strval($_GET["id"]) . ".php";
            $contents = file_get_contents($fname);
            echo $contents;
            $_SESSION["service"] = strval($_GET["id"]);
            $_SESSION["file"] = $fname;
        } elseif ($service == "1") {
            $contents = file_get_contents("./log.html");
            echo $contents;

            $_SESSION["service"] = "1";
            $_SESSION["file"] = "./log.html";
        } elseif ($service == "2") {
            $contents = file_get_contents("./log2.html");
            echo $contents;

            $_SESSION["service"] = "2";
            $_SESSION["file"] = "./log2.html";
        } elseif ($service == "3") {
            $contents = file_get_contents("football.html");
            echo $contents;

            $_SESSION["service"] = "3";
            $_SESSION["file"] = "football.html";
        }
    }
}
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <script>
        let service = "<?php echo $service; ?>";
            if (screen.width < 937) {
                if (service != "") {
                    
                }
                else {
                    location.href="/newinterface.php?s=g";
                }
            }
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/049529442a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.0.0-beta.83/dist/themes/light.css" />
<script type="module" src="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.0.0-beta.83/dist/shoelace.js"></script>
        <title>Dispatch</title>
          <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
          <meta name="description" content="Dispatch: A no-faff simple chatroom that puts your privacy first. No emails needed, no faff chatting." />
          <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
          <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
          <link rel="manifest" href="/site.webmanifest">
          <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
          <meta name="msapplication-TileColor" content="#2d89ef">
          <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="/style.css">
        <link rel="stylesheet" href="/newinterface.css">
        <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width, height=device-height, target-densitydpi=device-dpi">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    </head>
    <body id="body">
        <div class="g-options-container" id="goc">
            <div class="g-options" id="g-options">
                <div class="g-top">
                    <div class="g-x" onclick="showOptions();">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <h3 style="margin: 0;">Group Options</h3>
                </div>
                <div class="g-top" style="justify-content: center; gap: 10px;">
                    <button id="submitmsg" onclick="location.href='/leave.php';" style="background: red;">Leave Group</button>
                    <button id="submitmsg" onclick="reportGroup()">Report Group</button>
                </div>
                
            </div>
            <script type="text/javascript">        
            var xyy = "<?php echo $_GET["id"]; ?>"
            </script>
            <script>

                        let gshown = false;
                function reportGroup() {
                
                
                window.location.href="report.php?id="+xyy;
                console.log('sent');
            }

            function showOptions() {
                if (gshown === false) {
                    document.getElementById("desktop").style.filter = "brightness(0.5) grayscale(100%)";
                    document.getElementById("main").style.filter = "brightness(0.5) grayscale(100%)";
                    document.getElementById("sidenav").style.filter = "brightness(0.5) grayscale(100%)";
                    document.getElementById("goc").style.display = "flex";
                    gshown = true;
                }
                else if (gshown === true) {
                    document.getElementById("desktop").style.filter = "brightness(100%) grayscale(0)";
                    document.getElementById("main").style.filter = "brightness(100%) grayscale(0)";
                    document.getElementById("sidenav").style.filter = "brightness(100%) grayscale(0)";
                    document.getElementById("goc").style.display = "none";
                    gshown = false;
                }
            }
                $(window).click(function() {
                    if (gshown === true) {
                        document.getElementById("desktop").style.filter = "brightness(100%) grayscale(0)";
                        document.getElementById("main").style.filter = "brightness(100%) grayscale(0)";
                        document.getElementById("sidenav").style.filter = "brightness(100%) grayscale(0)";
                        document.getElementById("goc").style.display = "none";
                        gshown = false;
                    }
                });
                
                $('#g-options').click(function(event){
                  event.stopPropagation();
                });
                $('.leave-g').click(function(event){
                  event.stopPropagation();
                });
        </script>
        </div>
        <form method="post" enctype="multipart/form-data" id="uploadForm" style="display: none; background: white; border-radius: 10px; z-index: 99999;">
            <div class="box">
					<input type="file" name="fileToUpload" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple style="height: 0.1px; width: 0.1px; opacity: 0;" />
					<label for="file-1" id="file-lab"><i class="fa-solid fa-cloud-arrow-up"></i>  <span>Choose</span></label>
			</div>
  <input type="submit" value="Upload Image/Video" name="submit" id="enter">
        </form>
            <?php if ($_SESSION["cookies"] !== true) {
                include "cookies.html";
            } ?>
                    <div class="navigation1" id="sidenav">
                        <ul>
                            <li class="list">
                                <a href="/">
                                    <span class="icon1"><i class="fa-solid fa-house"></i></span>
                                    <span class="text1">Home</span>
                                </a>
                            </li>
                            <li class="list">
                                <a href="/profile.php">
                                    <span class="icon1"><i class="fa-solid fa-user"></i></span>
                                    <span class="text1">Profile</span>
                                </a>
                            </li>
                            <li class="list">
                                <a href="/news">
                                    <span class="icon1"><i class="fa-solid fa-newspaper"></i></span>
                                    <span class="text1">News</span>
                                </a>
                            </li>
                            <li class="list">
                                <a href="/forum">
                                    <span class="icon1"><i class="fa-solid fa-align-left"></i></span>
                                    <span class="text1">Forums</span>
                                </a>
                            </li>
                            <li class="list active">
                                <a href="/newinterface.php">
                                    <span class="icon1"><i class="fa-solid fa-comment"></i></span>
                                    <span class="text1">Ch&#1072;t</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="desktop" id="desktop">
                        <div class="sidenav1" id="sidenav">
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
                                    <a href="/report.php">
                                        <div class="tray-icon logout">
                                            <i class="fa-solid fa-flag"></i>
                                        </div>
                                    </a>
                                    <a href="/newinterface.php?logout=1">
                                        <div class="tray-icon logout">
                                            <i class="fa-solid fa-right-from-bracket"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="chats" style="color: black!important; overflow-x: hidden; overflow-y: visible;">
                                <a href="https://ko-fi.com/dispatch" class="chat" style="background: var(--bs-info)!important; color: white;">
                                    <b>Donate to us on Ko-Fi!</b>
                                </a>
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
                                <div class="search">
                                    <i class="fa-solid fa-magnifying-glass" style="color: black;"></i>
                                    <input type="text" id="searchGroups" onkeyup="search();" placeholder="Search groups..." title="Search groups...">
                                </div>
                                
                                <ul class="groups" id="groups" style="padding: 0;">
                                    
<?php
define("DB_SERVER1", "localhost");
define("DB_USERNAME1", "");
define("DB_PASSWORD1", "");
define("DB_NAME1", "id20398710_dispatch_groups");
// Create connection
$conn = mysqli_connect(DB_SERVER1, DB_USERNAME1, DB_PASSWORD1, DB_NAME1);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `" . $_SESSION["name"] . "`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li><a href='newinterface.php?id=" .
            $row["id"] .
            "&name=" .
            $row["name"] .
            "'>" .
            $row["name"] .
            "</a></li>";
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
                        <div class="main" id="main" style="font-size: 2vh;">
                            <?php
                            $love = '
        <div class="leave-container">
            <div class="leave-g" onclick="showOptions();">
                <i class="fa-solid fa-gear"></i>
            </div>
        </div>
        ';
                            if (intval($_SESSION["service"]) > 100000) {
                                echo $love;
                            }
                            ?>
            <div class="main1" id="main1" style="margin-left: 25px;">
                <?php
                displayContent();
                checkforThemeChange();
                ?>
            </div>
            <div style="bottom: 0; right: 0; position: sticky;">
                <?php
                $cool = '
        
        <form enctype="multipart/form-data" class="messages" name="message" method="post">
            <div class="emoji-list" id="emoji-list">

            </div>
            <a class="selectButton" style="margin-top: 7px; padding: 0!important;" onclick="showUpload();"><i class="fa-solid fa-hexagon-plus"></i></a>
            <a class="selectButton" style="margin-top: 7px; padding: 0!important;" onclick="$("#main").scrollTop($("#main")[0].scrollHeight);"><i class="fa-solid fa-circle-arrow-down fa-fw"></i></a>
            <button class="selectButton" id="emoji" onclick=""  type="button"><i class="fa-solid fa-face-grin"></i></button>
            <input name="usermsg" type="text" id="usermsg" placeholder="Chat here" />
            <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
        </form>
        
        ';

                if ($_GET["s"] !== "g") {
                    ($service = strval($_GET["s"])) or
                        ($service = $_SESSION["service"]);
                    if ($service == "1" || $service == "2" || $service == "3") {
                        echo $cool;
                    }
                    if (intval($_SESSION["service"]) > 100000) {
                        echo $cool;
                    }
                }
                ?>
        
            </div>
        </div>
                    </div>
        
        <div id="emoji-disclaimer"><p style="text-align: left; margin-left: 256px; padding-left: 24px;">Only 8 emojis are allowed in one messаge.</p></div>
        
        <script type="text/javascript">
            let uploadStatus = false;
            let uploadMenu = document.getElementById("uploadForm");
            let submitButton = document.getElementById("submitmsg");
            function showUpload() {
                if (uploadStatus == false) {
                    uploadMenu.style.display = "block";
                    submitButton.style.display = "none";
                    window.scrollTo(0,document.body.scrollHeight);
                    uploadStatus = true;
                }
                else if (uploadStatus == true) {
                    uploadMenu.style.display = "none";
                    submitButton.style.display = "block";
                    uploadStatus = false;
                }
            }
        </script>
        <script type="text/javascript">
            let emojiActivated = false;
            let emojiDisclaimer = document.getElementById("emoji-disclaimer");
            let emojiBtn = document.getElementById("emoji");
            let emojiListDiv = document.getElementById("emoji-list");

            let emojiList = [
                "👍",
                "👌",
                "👏",
                "🙏",
                "🆗",
                "🙂",
                "😀",
                "😃",
                "😉",
                "😊",
                "😋",
                "😌",
                "😏",
                "😐",
                "😑",
                "😒",
                "😓",
                "😂",
                "🤣",
                "😅",
                "😆",
                "😜",
                "😹",
                "🚶",
                "🏠",
                "👆",
                "🖕",
                "👋",
                "👎",
                "👈",
                "👉"
            ];

            emojiList.forEach(element => {
                let list = document.getElementById("emoji-list");
                let node = document.createElement("span");
                node.classList.add("emoji");
                node.textContent = element;
                node.onclick = ev => {
                    document.getElementById("usermsg").value += node.textContent;
                };
                list.appendChild(node);
            });

            emojiBtn.onclick = function(evt) {
                emojiActivated = !emojiActivated;
                

                let list = document.getElementById("emoji-list");
                if (emojiActivated) {
                    list.style.display = "flex";
                    emojiDisclaimer.style.display = "inline";
                    
                } else {
                    list.style.display = "none";
                    emojiDisclaimer.style.display = "none";
                }
            };
            list.innerHTML += "<br>";
        </script>
        
        <script type="text/javascript">
        
            function scrolltoBottom() {
                $("#main").scrollTop($("#main")[0].scrollHeight);
            }
            scrolltoBottom();
            function loadLog() {
                    <?php if (
                        isset($_SESSION["file"]) &&
                        $_SESSION["file"] !== ""
                    ) {
                        if ($_GET["s"] != "g") {
                            echo '$.ajax({
                        url: "' .
                                $_SESSION["file"] .
                                '",
                        cache: false,
                        success: function (html) {
                        $("#main1").html(html); //Insert chat log into the #chatbox div
                        }
                    });';
                        }
                    } ?>
                
                
            }
            setInterval (loadLog, 2500);
            
            
            $(".messages").on("submit", function (e) {
                let dataString = $(this).serialize();
                scrolltoBottom();
                $("#main1").append("<div class='msgln' style='filter: grayscale(100%);'><span class='chat-time'>Sending  message...</span> <b class='user-name'><a href='user.php?u=<?php echo $_SESSION[
                    "name"
                ]; ?>'><?php echo $_SESSION[
    "name"
]; ?></a></b> "+document.getElementById("usermsg").value+"<br></div>");
                scrolltoBottom();
                $.ajax({
                  type: "POST",
                  url: "/send.php",
                  data: dataString,
                  success: function () {
                    // Display message back to the user here
                    loadLog();
                    document.getElementById("usermsg").value = "";
                    scrolltoBottom();
                  }
                });
             
                e.preventDefault();
            });
            
            $("#uploadForm").on("submit", function (f) {
                var form = new FormData(document.getElementById('uploadForm'));
                var file = document.getElementById('file-1').files[0];
                if (file) {   
                    form.append('file-1', file);
                }
                scrolltoBottom();
                $("#main1").append("<div class='msgln' style='filter: grayscale(100%);'><span class='chat-time'>Sending  message...</span> <b class='user-name'><?php echo $_SESSION[
                    "name"
                ]; ?></b> Sending image...<br></div>");
                scrolltoBottom();
                $.ajax({
                  type: "POST",
                  url: "/image_handler.php",
                  data: form,
                  cache: false,
                  contentType: false,
                  processData: false,
                  success: function () {
                    // Display message back to the user here
                    loadLog();
                    document.getElementById("usermsg").value = "";
                    scrolltoBottom();
                  }
                });
             
                f.preventDefault();
            });
            
        </script>
        <div class="slideshow1" id="sidenav" style="z-index: -1; position: absolute; top: 0; left: 0; height: 100%; width: 100%;">
	        <div class="slideshow-container" style="width: 100%; height: 100%;">

                <div class="mySlides fade2">
                  <img src="/assets/img/login/img-1.jpg" style="width:100%; max-width: 100%; height: 100%;  margin: auto;">
                </div>
                
                <div class="mySlides fade2">
                  <img src="/assets/img/login/img-8.jpg" style="width:100%; max-width: 100%; height: 100%;  margin: auto;">
            
                </div>
                
                <div class="mySlides fade2">
                  <img src="/assets/img/login/img-5.jpg" style="width:100%; max-width: 100%; height: 100%;  margin: auto;">
                  
                </div>
                
                <div class="mySlides fade2">m
                  <img src="/assets/img/login/img-4.jpg" style="width:100%; max-width: 100%; height: 100%;  margin: auto;">
                  
                </div>
                
                <div class="mySlides fade2">
                  <img src="/assets/img/login/img-2.jpg" style="width:100%; max-width: 100%; height: 100%;  margin: auto;">
                  
                </div>
                
                <div class="mySlides fade2">
                  <img src="/assets/img/login/img-3.jpg" style="width:100%; max-width: 100%; height: 100%;  margin: auto;">
                  
                </div>
                
                <div class="mySlides fade2">
                  <img src="/assets/img/login/img-1.jpg" style="width:100%; max-width: 100%; height: 100%;  margin: auto;">
                  
                </div>
                
                <div class="mySlides fade2">
                  <img src="/assets/img/login/img-7.jpg" style="width:100%; max-width: 100%; height: 100%;  margin: auto;">
                 
                </div>
                
                <div class="mySlides fade2">
                  <img src="/assets/img/login/img-6.jpg" style="width:100%; max-width: 100%; height: 100%;  margin: auto;">
              
                </div>
                
                <div class="mySlides fade2">
                  <img src="/assets/img/login/img-9.jpg" style="width:100%; max-width: 100%; height: 100%;  margin: auto;">
              
                </div>
                </div>
                
                </div>
                <br>
                
                
                <script>
                let slideIndex = 1;
                showSlides(slideIndex);
                
                function showSlides(n) {
                  let i;
                  let slides = document.getElementsByClassName("mySlides");
                  if (n > slides.length) {slideIndex = 1}    
                  if (n < 1) {slideIndex = slides.length}
                  for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                  }
                  slides[slideIndex-1].style.display = "block";  
                }
                
                function rotSlides() {
                    showSlides(slideIndex);
                    if (slideIndex === 3) {
                        slideIndex = 1;
                    }
                    else {
                        slideIndex += 1;
                    }
                }
                setInterval(rotSlides,6000);
                
                </script>
	    </div>
    </body>

</html>
