<?php
session_start();
$found=false;
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        include('head.html');
        ?>
        <style>
            span.status {
                background: rgb(240,240,240);
                padding: 10px;
                color: black!important;
                border-radius: 15px;
            }
        </style>
    </head>
    <body>
        <?php
        include('navbar.html');
        ?>
        <div class="container" style="text-align: left;">
        <?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', '');
define('DB_PASSWORD', '');
define('DB_NAME', 'id20398710_dispatch');
// Create connection
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT name,banned,verified,status,mood FROM Logins";
if ($_GET['u'] == "") {
    echo '<form action="user.php" method="get" class="user">
		            <input type="text" id="usermsg" class="u" placeholder="Search User" name="u"></input>
		            <input type="submit" id="enter" value="Search">
		        </form><script>document.getElementById("usermsg").value="'.$_GET['u'].'";</script>';
    echo '<h1>Start searching to get started!</h1>';
}
else {
    $result = mysqli_query($conn, $sql);
}
echo '<div id="container">';
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    if ($_GET['u']==$row['name']) {
        if($_GET['api']!=null) {
            echo '<div id="cont"><h2>';
        echo '<b>';
        echo $row['name'];
        echo '</b>';
        echo ' is';
        if ($row['verified']==0) {
            echo ' not verified and ';
        }
        else {
            echo ' verified and ';
        } 
        if ($row['banned']==0) {
            echo ' not banned.';
        }
        else {
            echo ' banned.';
        }
        echo '<h2><b>';
        echo $row['name'];
        echo '</b>\'s';
        echo ' status is ';
        echo $row['status'];
            echo '</div>';
        }
        else {
        echo '<form action="user.php" method="get" class="user">
		            <input type="text" id="usermsg" class="u" placeholder="Search User" name="u"></input>
		            <input type="submit" id="enter" value="Search">
		        </form><script>document.getElementById("usermsg").value="'.$_GET['u'].'";</script>';
        
        echo '<h1>';
        
        if ($row['verified']==0) {
            echo '<b>';
            echo $row['name'];
            echo '</b>';
            echo ' is';
            echo ' not verified.<br>';
        }
        else {
            echo '<b>';
            echo $row['name'];
            echo '</b>';
            echo ' is';
            echo '  <i class="fa-solid fa-badge-check"></i>    verified. This means that they are an administrator, and you can trust them.<br>';
        } 
        if ($row['banned']==0) {
            echo '<b>';
            echo $row['name'];
            echo '</b>';
            echo ' is';
            echo ' not banned.';
        }
        else {
            echo '<b>';
            echo $row['name'];
            echo '</b>';
            echo ' is';
            echo ' <b>banned</b>. This means that they have been banned by an administrator, and cannot chat.<br>';
        }
        echo '<h1><b>';
        echo $row['name'];
        echo '</b>\'s';
        echo ' status is <span class="status">';
        echo $row['status'];
        echo '</span> <a href="/profile.php">Set your own status here.</a>';
        echo '<br><br>';
        $found=true;
        $mood = intval($row['mood']);
        if ($mood === 0) {
            echo '@' . $row['name'] . "'s feeling happy. 😀";
        }
        else if ($mood === 1) {
            echo '@' . $row['name'] . "'s feeling cheerful. 🥳";
        }
        else if ($mood === 2) {
            echo '@' . $row['name'] . "'s feeling angry. 😡";
        }
        else if ($mood === 3) {
            echo '@' . $row['name'] . "'s feeling sad. ☹️";
        }
        else if ($mood === 4) {
            echo '@' . $row['name'] . "'s feeling really sad. 😭";
        }
        else if ($mood === 5) {
            echo '@' . $row['name'] . "'s feeling fine. 😐";
        }
                        echo ' <a href="/profile.php">Set your mood here.</a>';
                        echo '<br><br>';
                        echo '<a href="/groups/create.php?gn='.$row['name'].'&m1='.$row['name'].'"><i class="fa-solid fa-plus"></i>   Start chatting with '.$row['name'].'.</a>';
        }
    }
  }
} else {

}

mysqli_close($conn);
if ($found==false && $_GET['u']!=null && $_GET['api']==null) {
      echo '<form action="user.php" method="get" class="user">
		            <input type="text" id="usermsg" class="u" placeholder="Search User" name="u"></input>
		            <input type="submit" id="enter" value="Search">
		        </form><script>document.getElementById("usermsg").value="'.$_GET['u'].'";</script>';
  echo '<h1>'.$_GET['u'].' is not registered on Dispatch.</h1>';
}
?>
        </div>
    </body>
</html>
