<?php
session_start();
$filename = "./forum/posts/".$_GET['s'];
$text = $_POST['comment'];
$text1 = '<!--Comments Section-->
        <div class="comments-container">
            <div class="body">
                <div class="authors">
                    <div class="username" style="margin-bottom: 10px;"><a href="">' . $_SESSION['name'] . '</a></div>
                    <img src="https://cdn.pixabay.com/photo/2015/11/06/13/27/ninja-1027877_960_720.jpg" alt="" style="border-radius: 25px;">
                </div>
                <div class="content">'.nl2br(stripslashes(htmlspecialchars($_POST['comment']))).'
                    
                </div>
            </div>
        </div>';
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
file_put_contents($filename, $text1, FILE_APPEND | LOCK_EX);
$_SESSION['subject'] = "";
header("Location: ".$filename);
?>
        
