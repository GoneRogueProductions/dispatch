<?php
session_start();
if ($_SESSION['loggedin'] !== true) {
    $_SESSION['error'] = "Please login before tyring to post in the Forums.";
    header("Location: /index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Dispatch Forums: Make a post</title>
<style>
    h1 {
        text-align: left!important;
        color: white!important;
        border: 0!important;
        background: transparent!important;
    }
    textarea {
        background: white!important;
        border-radius: 5px!important;
        border: 2px solid #0000ff!important;
        color: black!important;
    }

    .page_link {
        border: 3px outset red;
        background-color: rgb(255, 127, 127);
        text-align: center;
    }

    .submit {

        margin-left: auto;
        margin-right: auto;
    }

    body {
        background: black;
        color: white;
    }
    
</style>
<!-- <div class="navbar1">
    <nav class="navigation hide" id="navigation">
        <span class="close-icon" id="close-icon" onclick="showIconBar()"><i class="fa fa-close"></i></span>
        <ul class="nav-list">
            <li class="nav-item"><a href="main.php">Make a post</a></li>
            <li class="nav-item"><a href="links.html">Posts</a></li>
            <li class="nav-item"><a href="/">Main Chat</a></li>
            <li class="nav-item"><a href="/index.php">Login</a></li>
        </ul>
    </nav>
    <a class="bar-icon" id="iconBar" onclick="hideIconBar()"><i class="fa fa-bars"></i></a>
    <div class="brand"><img src="/logo.png" style="margin-right: 10px; height: 50px;">Dispatch Forums</div>
</div> -->
<style>
    @media (prefers-color-scheme: dark) {
        body {
            background: #444 !important;
            color: white !important;
        }

        .bg-light {
            background: #333 !important;
        }

    }

    @media only screen and (max-width: 1200px) {
        #auth {
            display: none;
        }
    }
</style>
<style>
.topnav {
    background: black!important;
    border-bottom: 5px solid #0000ff!important;
}
    .topnav {
        position: sticky;
    }

    @media only screen and (max-width: 767px) {
        #navbar {
            display: none;
        }

        #col1 {
            display: none;
        }

        #icol {
            display: none;
        }

        .col-9 {
            width: 100% !important;
        }
    }

    @media only screen and (min-width: 768px) {
        .topnav {
            display: none;
        }

    }

    .topnav {
        overflow: hidden;
        background-color: lightgray;
        position: relative;
    }

    #btn1 {
        width: 80%;
    }

    .topnav #myLinks {
        display: none;
    }

    .topnav a {
        color: white;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        display: block;
    }

    .topnav a.icon {
        display: block;
        position: absolute;
        right: 0;
        top: 0;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    @media (prefers-color-scheme: dark) {
        body {
            background: #444 !important;
            color: white !important;
        }
    }
</style>

<style>
    @media (prefers-color-scheme: dark) {
        body {
            background: #444 !important;
            color: white !important;
        }

        .bg-light {
            background: #333 !important;
        }

    }

    @media only screen and (max-width: 1200px) {
        #auth {
            display: none;
        }
    }

    #navbar a {
        margin-right: 25px;
    }
    div a img {
        display: none;
    }
    #navbar a {
        margin-right: 25px;
        color: lightgrey;
    }
    #navbar a:hover {
        color: white;
    }
    div a img {
        display: none;
    }
    .button {
    background-color: #2F02FF;
    border: none;
    border-radius: 12px;
    text-align: center;
    cursor: pointer;
    transition-duration: 0.4s;
    padding: 16px 16px;
    color: white;
    font-size: 20px;
    width: 100%;
    margin-top: 20px;
}

.button:hover {
    background-color: white;
    color: black;
    border: 2px solid #2F02FF;
    box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
}
</style>
    </head>
<body>

<?php
include("header.html");
?>
<div class="page-content">
    <div class="container">
        <form action="/main_handler.php" method="post">
            <h1>Subject: </h1><textarea name="subject"
                                        style="background-color:rgb(255, 127, 127);padding:0;e;color:white;width:100%;border: 5px outset red;font-size:40px"
                                        name="message" rows="1" cols="10"></textarea><br>
            <h1>Message: </h1><textarea name="message"
                                        style="background-color:rgb(255, 127, 127);padding:0;color:white;width:100%;border: 5px outset red;font-size:20px"
                                        name="message" rows="10" cols="10"></textarea><br>
            <div class="submit">
                <input class="button"
                       type="submit" value="Post My Messаge">
            </div>
        </form>
        <script src="main.js" type="text/javascript"></script>
    </div>
</div>

<footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50" style="bottom: 0;">
    <div class="container text-center">
        <small>&copy Dispatch 2022. Dispatch is licensed under the <a
                    href="https://www.gnu.org/licenses/gpl-3.0.en.html">GNU-GPL license.</a>
            <p xmlns:cc="http://creativecommons.org/ns#" xmlns:dct="http://purl.org/dc/terms/"><span
                        property="dct:title">Dispatch's Logos </span> are licensed under <a
                        href="http://creativecommons.org/licenses/by-nc-nd/4.0/?ref=chooser-v1" target="_blank"
                        rel="license noopener noreferrer" style="display:inline-block;">CC BY-NC-ND 4.0<img
                            style="height:22px!important;margin-left:3px;vertical-align:text-bottom;"
                            src="https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1"><img
                            style="height:22px!important;margin-left:3px;vertical-align:text-bottom;"
                            src="https://mirrors.creativecommons.org/presskit/icons/by.svg?ref=chooser-v1"><img
                            style="height:22px!important;margin-left:3px;vertical-align:text-bottom;"
                            src="https://mirrors.creativecommons.org/presskit/icons/nc.svg?ref=chooser-v1"><img
                            style="height:22px!important;margin-left:3px;vertical-align:text-bottom;"
                            src="https://mirrors.creativecommons.org/presskit/icons/nd.svg?ref=chooser-v1"></a></p>
        </small>
    </div>
</footer>
</body>
</html>