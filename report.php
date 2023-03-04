<?php
session_start();
include('head.html');
include('navbar.html');
?>
<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>
<style>
@keyframes bg-color {
  0%   {background-color: red;}
  14%  {background-color: orange;}
  28%  {background-color: yellow;}
  42%  {background-color: green;}
  56%  {background-color: blue;color:lightgrey}
  70%  {background-color: indigo;color:lightgrey}
  85%  {background-color: violet;color:lightgrey}
  100%  {background-color: red;}
}
@keyframes bg {
  0%   {background: red;}
  14%  {background: orange;}
  28%  {background: yellow;}
  42%  {background: green;}
  56%  {background: blue;color:lightgrey}
  70%  {background: indigo;color:lightgrey}
  85%  {background: violet;color:lightgrey}
  100%  {background: red;}
}
    .form input {
        opacity:40%;
        font-size:35px;
        float:center;
        height:100px;
        width:300px;
        font-family: "Lucida Console", Lucida, serif;
        background-color: red;
        animation-name: bg-color;
        animation-duration: 10s;
        animation-iteration-count: infinite;
        transition: opacity 2s;
        
    }
    .form input:hover {
          opacity:100%;
    }
    textarea {
        opacity:40%;
        border:2px black solid;
        float:center;
        font-family: "Lucida Console", Lucida, serif;
        background: red;
        animation-name: bg;
        animation-duration: 10s;
        animation-iteration-count: infinite;
        transition: opacity 2s;
    }
    textarea:hover {
        opacity:100%;
    }
    h1 {
        font-size:40vw !important;
    }
</style>
<div class="form">
<form style="text-align:center"action="report.php" method="GET">
    <div class="textarea">
  <textarea placeholder="report user"type="text" id="group" style="height:100px;width:300px;font-size:40px"name="group"></textarea><br>
  </div>
  <div class="submit">
    <input type="submit" value="REPORT USER">
  </div>
</form>
</div>
<div class="rainbow-emoji">
    <h1 ata-bs-toggle="tooltip" title="I am a Rainbow! 418">
        🌈
    </h1>
</div>
<?php
session_start();
if (!isset($_SESSION['name'])) {
    echo '<script>window.location.href = "login.php";</script>';
    $_SESSION['error']="You need to be logged in to make a report.";
}
if ($_GET['group']!=null) {

$servername = "localhost";
$username = "";
$password = "GV-";
define('DB_NAME', 'id19613881_goneroguedb');

// Create connection;
$conn = mysqli_connect($servername, $username, $password,DB_NAME);

// Check connection;
if (!$conn) {
  die("Connection failed: ");
}
session_start();

$sql = "INSERT INTO Reports (reporter, reporting,reason)VALUES ('".$_SESSION['name']."','".$_GET['group']."','')";

if ($conn->query($sql) === TRUE) {
  echo "<script>window.location.href = 'newinterface.php';</script>";
}
}
?>
