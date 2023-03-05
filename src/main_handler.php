<?php

function rm_special_char($str) {

//Remove "#","'" and ";" using str_replace() function

$result = str_replace( array("#", "'", ";", "?", ":", "/", "!"), '', $str);

//The output after remove

return $result;

}

if ($_SERVER['REQUEST_METHOD']=='POST'){

    $text = $_POST['message'];
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
        $b19 = "ligma";
        // $b17 = "trash";
        // $b16 = "rubbish";
        $b14 = "twat";
        $b15 = "stuffed";
        $btest = "filtertest";
        $long = "Text too long!";
        if (stripos($text, $b1) !== FALSE || stripos($text, $b2) !== FALSE || stripos($text, $b3) !== FALSE || stripos($text, $b4) !== FALSE || stripos($text, $b5) !== FALSE || stripos($text, $b6) !== FALSE || stripos($text, $b7) !== FALSE || stripos($text, $b8) !== FALSE || stripos($text, $b9) !== FALSE || stripos($text, $b10) !== FALSE || stripos($text, $b11) !== FALSE || stripos($text, $b12) !== FALSE || stripos($text, $b13) !== FALSE || stripos($text, $b14) !== FALSE || stripos($text, $b15) !== FALSE || stripos($text, $btest) !== FALSE || stripos($text, $b18) !== FALSE || stripos($text, $b19) !== FALSE) {
            die("Explicit words detected");
        }
       
    $filename = "./forum/posts/".rm_special_char($_POST['subject']).'.html';
    if (file_exists($filename)) {
        die("Subject already exists!");
    }
    $storagefile = fopen($filename, "w") or die("Unable to open file!!");
    session_start();
    $subject = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispatch: Forums</title>
    <link rel="stylesheet" href="/style.css">
        <link rel="stylesheet" href="/forum/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital@1&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
<script>$(document).ready(function() {
    $("#navbar").load("/forum/header.html");
});</script>
<div id="navbar">
</div>

        </div>

<div class="container">
        <!--Topic Section-->
        <div class="topic-container">
            <!--Original thread-->
            <div class="head">
                <div class="authors" style="color:white">Author</div>
            </div>

            <div class="body">
                <div class="authors">
                    <div class="username" style="margin-bottom: 10px;"><a href="">' . $_SESSION['name'] . '</a></div>
                    <img src="https://cdn.pixabay.com/photo/2015/11/06/13/27/ninja-1027877_960_720.jpg" alt="Profile" style="border-radius: 25px;">
                </div>
                <div class="content" style="color:white; text-align: left;"><h2>'.$_POST['subject'].'</h2><br>
                '.nl2br(stripslashes(htmlspecialchars($_POST['message']))).'
                    
                </div>
            </div>
        </div>

        <!--Comment Area-->
        <div class="comment-area hide" id="comment-area">
        <form action="/comment_handler.php?s='.stripslashes(htmlspecialchars($_POST['subject'])).'.html" method="post">
        <style>
        #comment{
            width: 90%!important;
            border-radius: 5px;
            border: 2px solid #0000ff;
        }
        #submit {
            width: 7%;
            min-height: 100px;
            
        }
        #submit {
    background-color: #2F02FF;
    border: none;
    border-radius: 12px;
    text-align: center;
    cursor: pointer;
    transition-duration: 0.4s;
    color: white;
    font-size: 20px;
}

#submit:hover {
    background-color: white;
    color: black;
    border: 2px solid #2F02FF;
    box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
}
        </style>
            <textarea name="comment" id="comment" placeholder="comment here ... "></textarea>
            <input id="submit" type="submit" value="submit" class="button">
        </form>
        </div>



        


    <script src="main.js"></script>
';
    fwrite($storagefile, $subject);
    fclose($storagefile);
    #above processes message and writes to file, then links the file to the user
    
    $linksa='<div class="page_link"><a style="color:black;" href="/forum/posts/'.$_POST['subject'].'.html">'.$_SESSION['name'].' - '.$_POST['subject'].'</a></div>';
    $link = fopen("./forum/links.html", "a") or die("Unable to open file!");
    fwrite($link, $linksa);
    fclose("links.html");
    #aboves apprehends new link to links.html
    header("Location: ".$filename);
    echo '<h1>'.$_SESSION['name'].'oh</h1>';
    #echo '<script>window.location.replace("https://dispatch.ml/forum/links.html");</script>';
} else {
    echo '<h1 style="color:white;">POST requests only!!!</h1>
    <h2 style="color:white;">Very naughty</h2>';
    echo '<script>window.location.replace("https://dispatch.ml/forum/links.html");</script>';
}
?>