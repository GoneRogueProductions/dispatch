<?php
session_start();
$_SESSION['page'] = "/newinterface.php";

//BANNED ACCOUNTS BELOW
// echo '<script>alert("'.intval($_SESSION['service']),'");</script>';

$banned=array("rb", "Robert", "testUserBanned");
if (in_array($_SESSION['name'],$banned)==TRUE) {
    echo '<span class="error><h1>You are banned. Your IP is being logged. Do NOT try to register again.</h1></span>';
}
if (!isset($_SESSION['name'])) {
    $_SESSION['error'] = 'You need to login before accessing this page.';
    echo '<script>window.location.href="/login.php";</script>';
    exit;
}




$service = strval($_GET['s']) or $service = $_SESSION['service'];

if (strval($_GET['dmdel']) !== "" && isset($_GET['dmdel'])) {
    $filename = strtolower(strval($_SESSION['name'])).".html";
    if(!unlink($filename)) {
        echo 'DMs could not be deleted due to an error.';
    }
}
if (strval($_GET['logout']) == "2") {
    $_SESSION['chatroom'] = "";
    echo '<script>window.location.href="/newinterface.php?s=3";</script>';
    exit;
}
else if (strval($_GET['logout']) == "1") {
    session_destroy();
    echo '<script>window.location.href="/newinterface.php";</script>';
    exit;
}

$randdirect=rand(1,1000);
if ($randdirect==100) {
    echo '<style>background-image: url("bananas.gif"); background-repeat: space;</style>';
    exit;
}
/*if ($randdirect==1) {
echo '<style>body {background-image: linear-gradient(45deg, rgb(0, 0, 255), white); }</style><p>Work in Progresh</p>
            <div class="icons"><i class="fa-light fa-flask fa-10x fa-bounce"></i><i class="fa-light fa-vials fa-10x fa-bounce"></i><img src="\wip_joke.png"></img></div>';
    exit;
}*/

$spam = false;
if (!isset($_SESSION['sent'])) {
    $_SESSION['sent'] = 0;
}
if (!isset($_SESSION['theme'])) {
    $_SESSION['theme'] = true;
}

function checkforThemeChange() {
    if(strval($_GET['themeChange']) == "true") {
        if (!isset($_SESSION['theme'])) {
            $_SESSION['theme'] = false; // true is light
        }
        if ($_SESSION['theme'] == true) {
            $_SESSION['theme'] = false;
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
        }
        else if ($_SESSION['theme'] == false) {
            $_SESSION['theme'] = true;
            echo '<style>body {
                    background: white!important; 
                    color: black!important;
            }
                </style>';
                echo '<script>window.location.href="/newinterface.php";</script>';
        }
    }
}

    
        
    
    function displayContent() {
        if ($_GET['s']==="st") {
            
        } 
else if ($_GET['s'] == "g") {
    echo '<style>.groups-cont { display: flex; padding: 25px; flex-direction: column; width: 100%; height: 100%; overflow-x: hidden; gap: 20px; } .groups-cont a { background: white; border-radius: 10px; color: black!important; padding: 10px; text-decoration: none; } #main1 { margin: 0!important; }</style><h1>Your Groups</h1><div class="groups-cont"><a href="/newinterface.php?s=1">First Chatroom</a><a href="/newinterface.php?s=2">Second Chatroom</a><hr>';
    define('DB_SERVER1', 'localhost');
    define('DB_USERNAME1', '');
    define('DB_PASSWORD1', '');
    define('DB_NAME1', 'groups');
// Create connection
$conn1 = mysqli_connect(DB_SERVER1,DB_USERNAME1,DB_PASSWORD1,DB_NAME1);
// Check connection
if (!$conn1) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `".$_SESSION['name']."`";
$result = mysqli_query($conn1, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<a href='newinterface.php?id=".$row['id']."'</a>" . $row["name"]."<br>";
  }
} else {
  echo "<p style='text-align: center; font-size: 30px;
                text-align: left; margin-left: 20px; margin-top: 30px;'>You aren't in any groups!</p>";
}

mysqli_close($conn);
echo '</div>';
}
else {
        if (intval($service) > 99999 && !(intval($_GET['id']) > 99999)) {
            header("Location: /newinterface.php?id=".$service);
        }
        if (isset($_GET['s'])) {
        $service = strval($_GET['s']);
        }
        else if (isset($_GET['id'])) {
             $service = $_GET['id'];
        }
        else {
            $service = $_SESSION['service'];
        }
        if (intval($service) > 99999) {
            $fname = "./groups/posts/".strval($_GET['id']).".php";
            $contents = file_get_contents($fname);
            echo $contents;
            $_SESSION['service'] = strval($_GET['id']);
            $_SESSION['file'] = $fname;
        }
        
        
        else if ($service == "1") {
                $contents = file_get_contents("./log.html");
                echo $contents;

                $_SESSION['service'] = "1";
                $_SESSION['file'] = "./log.html";
        }
        else if ($service == "2") {
                $contents = file_get_contents("./log2.html");
                echo $contents;

                $_SESSION['service'] = "2";
                $_SESSION['file'] = "./log2.html";
        }
        else if ($service == "3") {
            $contents = file_get_contents("football.html");
                echo $contents;

                $_SESSION['service'] = "3";
                $_SESSION['file'] = "football.html";
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
        <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width, height=device-height, target-densitydpi=device-dpi">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
        <style>
        .img-sent {
            max-width: 300px;
            max-height: 300px;
            border-radius: 20px;
            
        }
            @media (prefers-color-scheme: dark) {
                #loginform {
                    background: #333;
                    
                }
                body {
                    background: #444!important;
                    color: white!important;
                }
                #prics {
                    color: black!important;
                }
                .img-sent {
                    filter: brightness(0.75);
                }
            }
            .icons {
                vertical-align: center;
            }
            @media only screen and (min-height: 1024px) {
                .icons {
                    margin-top: 100px;
                }
            }
        .selectButton {
            height: 25px;
            border-radius: 5px;
            cursor: pointer;
            width: 25px;
            color: #0000ff;

        }
        #emoji {
            color: #0000ff;
            margin-top: 5px;
            background: transparent;
            border: 0;
            border-radius: 5px;
            
        }
        #emoji:hover {
            color: white;
        }
        a.userlink:hover {
            color: white!important;
        }
            .help-box {
                display: none;
            }

				.option {
					padding-top: 50 %;
					text-align: center;
				}
            .sidenav {
              height: 100%;
              width: 256px;
              position: fixed;
              z-index: 1;
              top: 0;
              left: 0;
              background-color: #ebebeb;
              border-right: 1px solid #888888;
              overflow-x: hidden;
              padding-top: 20px;
              display: none;
            }
            .sidebar-label {
                display: block;
                color: black;
            }
            @media only screen and (min-width:768px) {
                .sidenav {
                    display: inline;
                }
                .main {
                    width: 90%; /* fallback width */
                    width: calc(100% - 290px);
                    width: -webkit-calc(100% - 290px); /* safari */
                    width: -moz-calc(100% - 290px); /* firefox */
                }
            }
            
            .sidenav-mobile a {
              padding: 6px 12px 6px 12px;
              text-decoration: none;
              font-size: 25px;
              color: black;
              vertical-align: center;  
            }
            .sidenav a {
              padding: 6px 16px 6px 16px;
              text-decoration: none;
              font-size: 25px;
              color: black;
              display: block;
              vertical-align: center;
            }
#rainbow {
    
}
            
            
            .sidenav a:hover {
              color: white;
              background: #0000ff;
            }
            
            .main {
              margin-left: 256px; /* Same as the width of the sidenav */
              font-size: 28px; /* Increased text to enable scrolling */
            text-align: left;
            padding: 0px 10px 0px 24px;
            
            }
            @media screen and (max-height: 450px) {
              .sidenav {padding-top: 15px;}
              .sidenav a {font-size: 18px;}
            }
            .selectButton:hover {
                color: white;
            }
            .messages {
                background: #ebebeb;
                margin-top: 20px;
                position: sticky;
                position: -webkit-sticky;
                box-shadow: 0 0 0 0;
                    bottom: 0;
                    left: 0;
                    border-radius: 0px;
            }
            @media only screen and (max-width:767px) {
                .sidenav-mobile {
                    display: inline;
                }
                .main {
                    margin-left: 0;
                }
                .messages {
                    box-shadow: 0 0 0 0;
                    bottom: 0;
                    left: 0;
                    margin: 0px;
                    border-radius: 0px;
                }
                #emoji {
                    display: none;
                }
            }
            .bottom {
                bottom: 3vh !important;
                cursor: pointer;
                position: absolute;
                width: 256px;
                text-align: center;
            }
            
            a.logout {
                color: red;
            }
            a.logout:hover {
                color: white;
                background: red;
            }
            .icons{
                 margin: auto;
                 width: 50%;
            }
            #pricmenu {
                display: none;
            }
            .emoji-list {
                display: none;
                
            }
            #emoji-disclaimer {
                display: none;
                color: lightgrey;
                font-size: 20px;
                text-align: left;
                margin-left: 256px;
                padding-left: 24px;
                
            }
            .emoji-list span {
                padding: 0px 1px;
                margin: 0px 1px;
                border-radius: 5px;
                cursor: pointer;
            }
            .emoji-list span:hover {
                color: white;
            }
            #prics {
                cursor: pointer;
            }
            #prics:hover {
                color: white!important;
            }
            div a img {
                display: none;
            }
            .sidenav-mobile {
  overflow: hidden;
  background-color: #333;
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  justify-content: center;
}
@media only screen and (min-width: 769px) {
    .sidenav-mobile {
        display: none;
    }
    
}

.sidenav-mobile a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.sidenav-mobile a:hover {
  background: #f1f1f1;
  color: black;
}
        </style>
    </head>
    <body id="body">
        <style>
                        .leave-g {
                            position: absolute;
                            border-radius: 50%;
                            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
                            top: 0;
                            left: 29%;
                            background: white;
                            border: 0;
                            margin: 10px;
                            padding: 5px;
                            color: rgb(200,200,200)!important;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            text-align: center;
                            cursor: pointer;
                            transition: 0.2s;
                        }
                        @media (max-width: 937px) {
                            .leave-container,
                            .leave-g {
                                left: 0!important;
                            }
                        }
                        .leave-g:hover {
                            background: rgb(240,240,240);
                        }
                        .leave-container {
                            left: 29%;
                            position: absolute;
                            top: 0;
                            margin: 0;
                            padding: 0;
                        }
                        .g-options {
                            display: flex;
                            background: white;
                            border-radius: 10px;
                            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
                            flex-direction: column;
                            padding: 25px;
                            gap: 10px;
                        }
                        @media (prefers-color-scheme: dark) {
                            .g-options {
                                background: #444;
                            }
                        }
                        .g-options-container {
                            align-items: center;
                            justify-content: center;
                            position: absolute;
                            z-index:2485792348579248307509243875609834256347825624938756;
                            width: 100%;
                            height: 100%;
                            display: none;
                        }
                        .g-top {
                            display: flex;
                            align-items: center;
                            justify-content: space-between;
                        }
                        .g-x {
                            padding: 10px;
                            cursor: pointer;
                        }
                        </style>
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
            var xyy = "<?php echo $_GET['id'];?>"
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
        <style>
            #uploadForm {
                position: absolute;
                left: 30%;
                bottom: 50px;
                max-width: 250px;
                width: 90%;
            }
            #fileToUpload {
                width: 0.1px;
	            height: 0.1px;
            	opacity: 0;
            	overflow: hidden;
                position: absolute;
                z-index: -1;
            }
        </style>
        <form method="post" enctype="multipart/form-data" id="uploadForm" style="display: none; background: white; border-radius: 10px; z-index: 99999;">
            <style>
                .js .inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}

.inputfile + label {
    max-width: 80%;
    font-size: 1.25rem;
    /* 20px */
    font-weight: 700;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    padding: 0.625rem 1.25rem;
    /* 10px 20px */
}

.no-js .inputfile + label {
    display: none;
}

.inputfile:focus + label,
.inputfile.has-focus + label {
    outline: 1px dotted #000;
    outline: -webkit-focus-ring-color auto 5px;
}

.inputfile + label * {
    /* pointer-events: none; */
    /* in case of FastClick lib use */
}

.inputfile + label svg {
    width: 1em;
    height: 1em;
    vertical-align: middle;
    fill: currentColor;
    margin-top: -0.25em;
    /* 4px */
    margin-right: 0.25em;
    /* 4px */
}


/* style 1 */

.inputfile-1 + label {
    color: white;
    background-color: #0000ff;
    border: 2px solid rgb(200,200,200);
    border-radius: 10px;
    transition: 0.5s;
}

.inputfile-1:focus + label,
.inputfile-1.has-focus + label,
.inputfile-1 + label:hover {
    background-color: #722040;
}


/* style 2 */

.inputfile-2 + label {
    color: #d3394c;
    border: 2px solid currentColor;
}

.inputfile-2:focus + label,
.inputfile-2.has-focus + label,
.inputfile-2 + label:hover {
    color: #722040;
}


/* style 3 */

.inputfile-3 + label {
    color: #d3394c;
}

.inputfile-3:focus + label,
.inputfile-3.has-focus + label,
.inputfile-3 + label:hover {
    color: #722040;
}


/* style 4 */

.inputfile-4 + label {
    color: #d3394c;
}

.inputfile-4:focus + label,
.inputfile-4.has-focus + label,
.inputfile-4 + label:hover {
    color: #722040;
}

.inputfile-4 + label figure {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background-color: #d3394c;
    display: block;
    padding: 20px;
    margin: 0 auto 10px;
}

.inputfile-4:focus + label figure,
.inputfile-4.has-focus + label figure,
.inputfile-4 + label:hover figure {
    background-color: #722040;
}

.inputfile-4 + label svg {
    width: 100%;
    height: 100%;
    fill: #f1e5e6;
}


/* style 5 */

.inputfile-5 + label {
    color: #d3394c;
}

.inputfile-5:focus + label,
.inputfile-5.has-focus + label,
.inputfile-5 + label:hover {
    color: #722040;
}

.inputfile-5 + label figure {
    width: 100px;
    height: 135px;
    background-color: #d3394c;
    display: block;
    position: relative;
    padding: 30px;
    margin: 0 auto 10px;
}

.inputfile-5:focus + label figure,
.inputfile-5.has-focus + label figure,
.inputfile-5 + label:hover figure {
    background-color: #722040;
}

.inputfile-5 + label figure::before,
.inputfile-5 + label figure::after {
    width: 0;
    height: 0;
    content: '';
    position: absolute;
    top: 0;
    right: 0;
}

.inputfile-5 + label figure::before {
    border-top: 20px solid #dfc8ca;
    border-left: 20px solid transparent;
}

.inputfile-5 + label figure::after {
    border-bottom: 20px solid #722040;
    border-right: 20px solid transparent;
}

.inputfile-5:focus + label figure::after,
.inputfile-5.has-focus + label figure::after,
.inputfile-5 + label:hover figure::after {
    border-bottom-color: #d3394c;
}

.inputfile-5 + label svg {
    width: 100%;
    height: 100%;
    fill: #f1e5e6;
}


/* style 6 */

.inputfile-6 + label {
    color: #d3394c;
}

.inputfile-6 + label {
    border: 1px solid #d3394c;
    background-color: #f1e5e6;
    padding: 0;
}

.inputfile-6:focus + label,
.inputfile-6.has-focus + label,
.inputfile-6 + label:hover {
    border-color: #722040;
}

.inputfile-6 + label span,
.inputfile-6 + label strong {
    padding: 0.625rem 1.25rem;
    /* 10px 20px */
}

.inputfile-6 + label span {
    width: 200px;
    min-height: 2em;
    display: inline-block;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    vertical-align: top;
}

.inputfile-6 + label strong {
    height: 100%;
    color: #f1e5e6;
    background-color: #d3394c;
    display: inline-block;
}

.inputfile-6:focus + label strong,
.inputfile-6.has-focus + label strong,
.inputfile-6 + label:hover strong {
    background-color: #722040;
}

@media screen and (max-width: 50em) {
	.inputfile-6 + label strong {
		display: block;
	}
}

            </style>
            <div class="box">
					<input type="file" name="fileToUpload" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple style="height: 0.1px; width: 0.1px; opacity: 0;" />
					<label for="file-1" id="file-lab"><i class="fa-solid fa-cloud-arrow-up"></i>  <span>Choose</span></label>
			</div>
  <input type="submit" value="Upload Image/Video" name="submit" id="enter">
        </form>
        <style>
            #s1 {
                margin-left: 256px;
                width: 350px;
                color: black;
            }
            #s1 a {
                font-size: 30px;
                text-align: left;
            }
            @media only screen and (max-width: 768px) {
                #s1 {
                    display: none;
                }
                .main {
                    margin: 0!important;
                    height: 90%;
                }
                .messages {
                    margin: 0!important;
                    bottom: 6%!important;
                }
                .row1 {
                    margin-left:0!important;
                }
            }
            
            .cg {
                color: #0000ff!important; font-size: 25px!important; text-align: center!important; transition-duration: 0.4s!important; cursor: pointer;
                
            }
            .cg:hover {
                color: white!important;
            }
            .nsfw {
                color: black;
                cursor: pointer;
                transition-duration: 0.4s!important;
            }
            .nsfw:hover {
                color: red!important;
            }
            .football {
                padding: 10px;
                border-radius: 5px;
                border: 1px solid grey;
                cursor: pointer;
                margin-top: 10px;
                color: inherit;
                transition-duration: 0.4s;
            }
            .football:hover {
                background: #0000ff;
                color: white;
            }
            .row1 {
                justify-content: left;
                width: 100%;
                margin-left: 606px;
                margin-top: 20px;
            }
        </style>
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
                overflow: hidden;
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
        <style>
            .navigation1 {
                display: none;
            }
            @media only screen and (max-width: 936px) {
                * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            :root {
                --clr: #222327;
            }
            body {
                
                min-height: 100vh;
                font-family: system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue","Noto Sans","Liberation Sans",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji",sans-serif;
            }
            .navigation1 {
                position: fixed;
                left: 0;
                right: 0;
                bottom:0;
                height: 70px;
                background: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
            
                z-index: 99999999;
            }
            .navigation1 ul {
                display: flex;
                width: 350px; 
                padding:0;
                margin-bottom: 20px;
            }
            .navigation1 ul li {
                position: relative;
                list-style: none;
                width:70px;
                height:70px;
                z-index: 1;
                display:flex;
            }
            .navigation1 ul li a {
                position: relative;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                width: 100%;
                text-align:center;
                font-weight: 500;
            }
            .navigation1 ul li a .icon1 {
                position:relative;
                display: block;
                line-height: 75px;
                font-size: 1.5em;
                text-align:center;
                transition: 0.5s;
                color: var(--clr);
            
            }
            .navigation1 ul li:hover a .icon1 {
                color: #888;
            }
            .navigation1 ul li a .text1 {
                position: absolute;
                color: var(--clr);
                font-weight: 400;
                font-size: 0.75em;
                letter-spacing: 0.05em;
                transition: 0.5s;
                transform: translateY(25px);
            }
            .navigation1 ul li:hover a .text1 {
                color: #888;
            }
            .navigation1 ul li.active a .icon1 {
                color: #0000ff;
            }
            @media only screen and (min-width: 937px) {
                .navigation1 {
                    display: none;
                }
                .back {
                    display: none;
                }
            }
            @media only screen and (max-width: 767px) {
                .main {
                    position: absolute!important;
                    top: 0!important;
                    height: calc(100% - 70px - 66px)!important;
                    overflow: hidden;
                    overflow-y: scroll;
                }
                #uploadForm {
                    background: white;
                    border-radius: 10px;
                    margin:0 20px!important;
                    margin-bottom: 150px!important;
                    z-index:9;
                }
                .reminder {
                    display:none!important;
                }
                .messages {
                   bottom: 70px!important;
                    position:sticky;
                    width:100%;
                    font-size: 2vh;
                }
                body {
                    display: flex;
                justify-content: center;
                align-items: flex-end;
                }
                .main {
                    height: calc(100% - 70px) !important;
                    font-size: 3vh!important;
                    width: 100%;
                }
            }
            }
            .main {
                font-size: 3vh!important;
            }
            .messages {
                font-size: 2vh;
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
    font-family: Optimistic,var(--bs-font-sans-serif);
}
            </style>
            <?php
            if ($_SESSION['cookies'] !== true) {
                include("cookies.html");
            }
            ?>
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

$sql = "SELECT * FROM `".$_SESSION['name']."`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<li><a href='newinterface.php?id=".$row['id']."&name=".$row["name"]."'>" . $row["name"]."</a></li>";
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
                                margin: 0;
                                padding: 0;
                            }
                            .main1 {
                                margin-left: 10px;
                            }
                        </style>
                        <div class="main" id="main" style="font-size: 2vh;">
                            <?php
                            $love = '
        <div class="leave-container">
            <div class="leave-g" onclick="showOptions();">
                <i class="fa-solid fa-gear"></i>
            </div>
        </div>
        ';
                if (intval($_SESSION['service']) > 100000) {
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
        $cool = 
        '
        
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
        
        if ($_GET['s'] !== "g") {
            $service = strval($_GET['s']) or $service = $_SESSION['service'];
            if ($service == "1" || $service == "2" || $service == "3") {
                echo $cool;
            }
            if (intval($_SESSION['service']) > 100000) {
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
                $.ajax({
                  type: "GET",
                  url: "/get-chat.php",
                  success: function () {
                    // Display message back to the user here
                  }
                });
                
            }
            setInterval (loadLog, 2500);
            
            
            $(".messages").on("submit", function (e) {
                let dataString = $(this).serialize();
                scrolltoBottom();
                $("#main1").append("<div class='msgln' style='filter: grayscale(100%);'><span class='chat-time'>Sending  message...</span> <b class='user-name'><a href='user.php?u=<?php echo $_SESSION['name']; ?>'><?php echo $_SESSION['name']; ?></a></b> "+document.getElementById("usermsg").value+"<br></div>");
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
                $("#main1").append("<div class='msgln' style='filter: grayscale(100%);'><span class='chat-time'>Sending  message...</span> <b class='user-name'><?php echo $_SESSION['name']; ?></b> Sending image...<br></div>");
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
        <style>
        #main1,.msgln {
            color:black!important;
        }
        .mslgn b {
            color: white!important;
        }
		* {box-sizing: border-box}
        .mySlides {display: none; height: 100%; width: 100%}
        img {vertical-align: middle;}
        
        .mySlides img {
            object-fit: cover;
            opacity:40%;
        }
        
        /* Slideshow container */
        .slideshow-container {
          position: relative;
          margin: 0!important;
        }
        
        html {
            overflow: hidden;
        }
        
        /* Next & previous buttons */
        .prev, .next {
          cursor: pointer;
          position: absolute;
          top: 50%;
          width: auto;
          padding: 16px;
          margin-top: -22px;
          color: white;
          font-weight: bold;
          font-size: 18px;
          transition: 0.6s ease;
          border-radius: 0 3px 3px 0;
          user-select: none;
        }
        
        /* Position the "next button" to the right */
        .next {
          right: 0;
          border-radius: 3px 0 0 3px;
        }
        
        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
          background-color: rgba(0,0,0,0.8);
        }
        
        /* Caption text */
        .text {
          color: #f2f2f2;
          font-size: 15px;
          padding: 8px 12px;
          position: absolute;
          bottom: 8px;
          width: 100%;
          text-align: left;
        }
        
        /* Number text (1/3 etc) */
        .numbertext {
          color: #f2f2f2;
          font-size: 12px;
          padding: 8px 12px;
          position: absolute;
          top: 0;
        }
        
        /* The dots/bullets/indicators */
        .dot {
          cursor: pointer;
          height: 15px;
          width: 15px;
          margin: 0 2px;
          background-color: #bbb;
          border-radius: 50%;
          display: inline-block;
          transition: background-color 0.6s ease;
        }
        
        .active1, .dot:hover {
          background-color: #717171;
        }
        
        /* Fading animation */
        .fade2 {
          animation-name: fade1;
          animation-duration: 1.5s;
        }
        
        @keyframes fade1 {
          from {opacity: .4} 
          to {opacity: 1}
        }
        
        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
          .prev, .next,.text {font-size: 11px}
        }
        </style>
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
    <style>
    @media (prefers-color-scheme: dark) {
        body {
            background: #111 !important;
            color: white !important;
        }
    }
</style>

</html>
