<?php
session_start();
function js($arg) {
    echo '<script>console.log("'.$arg.'")</script>';
}
if (isset($_POST['usermsg'])) {
        if (intval($_SESSION['service']) > 99999) {
            
        }
         
        $text = $_POST['usermsg'];

        $_SESSION['messages'] = $_SESSION['messages'] + 1;
        if (isset($_SESSION['lastmessage'])) {
            $nowtime = time();
            $difference = $nowtime - $_SESSION['lastmessage'];
            if ($difference < 2) {
                $spam = true;
                
            }
        }
        else {
            $_SESSION['lastmessage'] = time() - 19999;
        }
            if ($spam !== true) {
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
        $long = "Text too long";
        if (strlen($text) > 128) {
        $text = "Text too long!";
        }
        else if (stripos($text, $long) !== false) {
                $text = "Text NOT too long!!!";
            }
        if (stripos($text, $b1) !== FALSE || stripos($text, $b2) !== FALSE || stripos($text, $b3) !== FALSE || stripos($text, $b4) !== FALSE || stripos($text, $b5) !== FALSE || stripos($text, $b6) !== FALSE || stripos($text, $b7) !== FALSE || stripos($text, $b8) !== FALSE || stripos($text, $b9) !== FALSE || stripos($text, $b10) !== FALSE || stripos($text, $b11) !== FALSE || stripos($text, $b12) !== FALSE || stripos($text, $b13) !== FALSE || stripos($text, $b14) !== FALSE || stripos($text, $b15) !== FALSE || stripos($text, $btest) !== FALSE || stripos($text, $b18) !== FALSE || stripos($text, $b19) !== FALSE) {
            
            if ($_SESSION['service'] == "1") {
                $text = "!?*@$;!";
            }
        }
        if ($_SESSION['name'] == "max" || $_SESSION['name'] == "werdl" || $_SESSION['name'] == "rob" || $_SESSION['name'] == "froggo" || $_SESSION['name'] == "teapot" || $_SESSION['name'] == "super") {
            $text_message = "<div class='msgln' id='".$_SESSION['name']."' onmouseover='javascript:ajax(".$newr.",'user.php?u=".$_SESSION['name']."&api=true')'><div id='".$newr."'></div><span class='chat-time'>" . date("d/m G:i ") . "UTC" . "</span> <b class='user-name' style='background-image: linear-gradient(90deg, rgba(255,0,0,1) 0%, rgba(255,154,0,1) 10%, rgba(208,222,33,1) 20%, rgba(79,220,74,1) 30%, rgba(63,218,216,1) 40%, rgba(47,201,226,1) 50%, rgba(28,127,238,1) 60%, rgba(95,21,242,1) 70%, rgba(186,12,248,1) 80%, rgba(251,7,217,1) 90%, rgba(255,0,0,1) 100%);
      background-size: 800%!important;'><a class='userlink' href='user.php?u=" . $_SESSION['name'] . "'>" . $_SESSION['name'] . "  <i class='fa-solid fa-badge-check'></i></a></b> " . stripslashes(htmlspecialchars($text)) . "<br></div>";
        }
        else {
            $text_message = "<div class='msgln' id='".$_SESSION['name']."' onmouseover='javascript:ajax(".$newr.",'user.php?u=".$_SESSION['name']."&api=true')'><div id='".$newr."'></div><span class='chat-time'>" . date("d/m G:i ") . "UTC" . "</span> <b class='user-name' style='background-size: 800%!important;'><a class='userlink' href='user.php?u=" . $_SESSION['name'] . "'>" . $_SESSION['name'] . "  </a></b> " . stripslashes(htmlspecialchars($text)) . "<br></div>";
        }
        $_SESSION['sent'] = $_SESSION['sent'] + 1;
        file_put_contents($_SESSION['file'], $text_message, FILE_APPEND | LOCK_EX);
        $_SESSION['lastmessage'] = time();
            }
        }
?>