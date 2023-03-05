<?php
session_start();
$target_dir = "./uploads/";
function rm_special_char($str) {

//Remove "#","'" and ";" using str_replace() function

$result = str_replace( array("#", "'", ";", "?", ":", "/", "!"), '', $str);

//The output after remove

return $result;

}
$target_file = $target_dir . rm_special_char(basename($_FILES["fileToUpload"]["name"]));
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (file_exists($target_file)) {
  $text_message = "<div class='msgln'><span class='chat-time'>" . date("d/m G:i ") . "UTC" . "</span> <b class='user-name'>" . $_SESSION['name'] . "</b> <img class='img-sent' src='/" . $target_file . "'<br></div>";
    file_put_contents($_SESSION['file'], $text_message, FILE_APPEND | LOCK_EX);
   // header("Location: newinterface.php");
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  die( "Sorry, file too large.");
}
if(isset($_POST["submit"])) {
  if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
if ($imageFileType == "mp4" || $imageFileType == "avi" || $imageFileType == "mov" || $imageFileType == "3gp") {
        echo "Sorry, but videos aren't supported right now. Try again later.";
        echo '<script>window.location.href="/newinterface.php";</script>';
        exit;
    
}
if ($imageFileType == "php" || $imageFileType == "py" || $imageFileType == "sh" || $imageFileType == "js") {
  echo "Please don't try.";
        echo '<script>window.location.href="/newinterface.php";</script>';
        exit;
}
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      
    if ($imageFileType == "jpg" || $imageFileType == "jpeg" || $imageFileType == "png" || $imageFileType == "gif" || $imageFileType == "webm") {
        $text_message = "<div class='msgln'><span class='chat-time'>" . date("d/m G:i ") . "UTC" . "</span> <b class='user-name'>" . $_SESSION['name'] . "</b> <img class='img-sent' src='/" . $target_file . "'><br></div>";
        
    }
    else if ($imageFileType == "mp3" || $imageFileType == "wav" || $imageFileType == "ogg" || $imageFileType == "aac" || $imageFileType == "m4a") {
        $text_message = "<div class='msgln'><span class='chat-time'>" . date("d/m G:i ") . "UTC" . "</span> <b class='user-name' id='".$_SESSION['name']."'>" . $_SESSION['name'] . "</b> <audio controls><source src='".$target_file."' type='audio/".$imageFileType."'></audio><br></div>";
    }
    file_put_contents($_SESSION['file'], $text_message, FILE_APPEND | LOCK_EX);
    
   // header("Location: newinterface.php");
    
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}
?>