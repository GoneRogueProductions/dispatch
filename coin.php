<link rel="stylesheet" href="style.css">
<script src="https://kit.fontawesome.com/049529442a.js" crossorigin="anonymous"></script>
<?php
    echo '<h1>Your code is being checked...</h1>';
    $found=0;
    
    $servername = "localhost";
    $username = "root";
    $password = "ogBgU5RUHJaV1D";
    $dbname = "dispatch";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    

    $sql2 = "SELECT `coins` FROM `Logins` WHERE Name='".$_POST['newowner']."'";
    $result2 = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result2) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $newcoin=$row['coins'];
          }
    }
    $coincoin=$newcoin+$_POST['coin'];
    $sql = "UPDATE `Logins` SET `coins`=".$coincoin." WHERE Name='".$_POST['newowner']."'";
    $result = mysqli_query($conn, $sql);
    
mysqli_close($conn);
echo $sql;
?>