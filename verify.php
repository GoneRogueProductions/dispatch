<link rel="stylesheet" href="style.css">
<script src="https://kit.fontawesome.com/049529442a.js" crossorigin="anonymous"></script>
<?php
if ($_GET['user']==null || $_GET['id']==null) {
    echo '<h1>It\'s not you, it\'s us <i class="fa fa-sad-tear"></i></h1>';
    echo '<h2>Your email had the wrong link. Please forigve us! (and maybe try again!).</h2>';
}
else {
    echo '<h1>Your code is being checked...</h1>';
    $found=0;
    
    $servername = "localhost";
    $username = "";
    $password = "";
    $dbname = "dispatch";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT user,id FROM Verify WHERE user='".$_GET['user']."' AND id='".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      echo '<h2>Match Found</h2>';
      $found=1;
    }
mysqli_close($conn);
if ($found==0){
    echo '<h2>Match Not Found<br>Did you verify?<br>If not, then the email\'s code was wrong.</h2>';
}
}
?>
