<?php
session_start();

require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;

if($detect->isMobile()){
    header("Location: mobile-login.php");
}
if ($_SESSION['loggedin'] == TRUE) {
	header('Location: newinterface.php');
	exit;
}
if (isset($_GET['s'])) {
	$_SESSION['loginservice'] = $_GET['s'];
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Dispatch: A no-faff chatroom with privacy in mind</title>
    <meta charset="utf-8" />
    <meta name="description" content="Dispatch: A no-faff simple chatroom that puts your privacy first. No emails needed, no faff chatting." />
    <link type="text/css" rel="stylesheet" href="/style.css" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <script src="https://kit.fontawesome.com/049529442a.js" crossorigin="anonymous"></script>
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <style>
      .loginform {
        margin: 0 auto;
        padding: 25px;
        background: #eee;
        width: 600px;
        max-width: 100%;
        border: 2px solid #0000ff;
        border-radius: 4px;
      }
      .field {
          border: 2px solid #0000ff;
          border-radius: 4px;
          margin-left: auto;
          margin-right: auto;
          height: 25px;
      }
      @media (prefers-color-scheme: dark) {
        .loginform {
          background: #333;
        }
        body {
          background: #444;
          color: white;
        }
      }
      .submit {
        height: 25px;
        text-align: center;
        background: #0000ff;
        border: 2px solid #0000ff;
        border-radius: 4px;
        color: white;
      }
      .submit:hover {
        background: white;
        color: black;
        cursor: pointer;
      }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
  <img src="/logo.png" style="display: block; margin-left: auto; margin-right: auto; height: 75px; margin-bottom: 25px; margin-top: 25px; height: 125px;" alt="Dispatch Logo">
		<div class="loginform">
      
			<h1 style="margin: 0;" >Login</h1>
			<?php
			if (isset($_SESSION['error']) && $_SESSION['error'] !== "") {
			    echo '<span class="error">' . $_SESSION['error'] . '</span>';
			}
			?>
			<form action="authenticate.php" id="loginForm" method="post" style="display: flex; flex-direction: column; justify-content: center;">
			    <div style="display: flex; justify-content: space-between;">
			        <div style="display: flex; flex-direction: column;">
			            <label for="username">
					        <i class="fas fa-user"></i>
				        </label>
				        <input class="field" id="cname" minlength="2"  type="text" name="username" placeholder="Username" id="username" required>
			        </div>
			 <div style="display: flex; flex-direction: column;">
			     <label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input class="field" id="cname" minlength="8" type="password" name="password" placeholder="Password" id="password" required>
				
			 </div>
			    </div>
				<input class="submit" type="submit" value="Login" style="max-width: 100px;">
				<style>
				    #cname-error {
				        font-size: small;
				    }
				</style>
				<script>
                $("#loginForm").validate();
                </script>
			</form>
            <p>By clicking 'Login', you are accepting that we <a href="/policy.html#cok">use cookies</a>.<i class="fa-thin fa-cookie-bite fa-pull-right fa-2x"></i></p>
		</div>
		<p>No account? Register <a href="https://gonerogue.ml/register.php">here</a>!</p>
		<footer><small>&copy Dispatch 2022. Dispatch is licensed under the <a href="https://www.gnu.org/licenses/gpl-3.0.en.html">GNU-GPL license.</a> <p xmlns:cc="http://creativecommons.org/ns#" xmlns:dct="http://purl.org/dc/terms/"><span property="dct:title">Dispatch's Logos </span> are licensed under <a href="http://creativecommons.org/licenses/by-nc-nd/4.0/?ref=chooser-v1" target="_blank" rel="license noopener noreferrer" style="display:inline-block;">CC BY-NC-ND 4.0<img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1"><img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/by.svg?ref=chooser-v1"><img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/nc.svg?ref=chooser-v1"><img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/nd.svg?ref=chooser-v1"></a></p></small></footer>
	</body>
</html>