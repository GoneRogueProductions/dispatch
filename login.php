<?php
session_start();
if ($_SESSION['loggedin'] == TRUE) {
	header('Location: newinterface.php');
	exit;
}
if (isset($_GET['s'])) {
	$_SESSION['loginservice'] = $_GET['s'];
}
?>

<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/049529442a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.0.0-beta.83/dist/themes/light.css" />
        <title>Dispatch: Login</title>
          <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
          <meta name="description" content="Dispatch: A no-faff simple chatroom that puts your privacy first. No emails needed, no faff chatting." />
          <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
          <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
          <link rel="manifest" href="/site.webmanifest">
          <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
          <meta name="msapplication-TileColor" content="#2d89ef">
          <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="/style.css">
        <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width, height=device-height, target-densitydpi=device-dpi">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
		<style>
		* {box-sizing: border-box}
        .mySlides {display: none}
        img {vertical-align: 
        middle;
            opacity:60%;
        }
        a {
            color:lightgrey;
            text-decoration:none;
        }
        a:hover {
            color:grey;
            text-decoration:none;
        }
        /* Slideshow container */
        .slideshow-container {
          position: relative;
          margin: 0!important;
        }
        
        html {
            overflow: hidden;
        }
        
        /* Next & previous buttons */
        .prev, .next {
          cursor: pointer;
          position: absolute;
          top: 50%;
          width: auto;
          padding: 16px;
          margin-top: -22px;
          color: white;
          font-weight: bold;
          font-size: 18px;
          transition: 0.6s ease;
          border-radius: 0 3px 3px 0;
          user-select: none;
        }
        
        /* Position the "next button" to the right */
        .next {
          right: 0;
          border-radius: 3px 0 0 3px;
        }
        
        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
          background-color: rgba(0,0,0,0.8);
        }
        
        /* Caption text */
        .text {
          color: #f2f2f2;
          font-size: 15px;
          padding: 8px 12px;
          position: absolute;
          bottom: 8px;
          width: 100%;
          text-align: left;
        }
        
        /* Number text (1/3 etc) */
        .numbertext {
          color: #f2f2f2;
          font-size: 12px;
          padding: 8px 12px;
          position: absolute;
          top: 0;
        }
        
        /* The dots/bullets/indicators */
        .dot {
          cursor: pointer;
          height: 15px;
          width: 15px;
          margin: 0 2px;
          background-color: #bbb;
          border-radius: 50%;
          display: inline-block;
          transition: background-color 0.6s ease;
        }
        
        .active, .dot:hover {
          background-color: #717171;
        }
        
        /* Fading animation */
        .fade2 {
          animation-name: fade1;
          animation-duration: 1.5s;
        }
        
        @keyframes fade1 {
          from {opacity: .4} 
          to {opacity: 1}
        }
        
        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
          .prev, .next,.text {font-size: 11px}
        }
			* {
				margin: 0;
				padding: 0;
			}
			html,
			body {
				width: 100%;
				height: 100%;
			}
			body {
				display: flex;
				justify-content: center;
				align-items: center;
				flex-wrap: wrap;
			}

			.container {
				display: flex;
				flex-direction: column;
			}
			.container em,
			.container h2 {
				text-align: center;
			}

			.loginForm {
				display: flex;
				flex-direction: column;
				justify-content: center;
			}
			.field {
				display: flex;
				justify-content: center;
				flex-direction: row;
				align-items: center;
				gap: 10px;
				margin-bottom: 10px;
			}
			.field input {
				border-radius: 10px;
				height: 50px;
				outline: 0;
				border: 0;
				background: rgb(128, 128, 128,0.3);
				padding: 10px;
			}
			.field h2 {
				margin: 0;
				color: var(--bs-blue);
			}
			.submit {
				padding: 10px!important;
				background-color: var(--bs-blue)!important;
				color: white!important;
				border: 0!important;
				border-radius: 10px!important;
				width: 256px;
				transition: 0.5s;
			}
			.row {
			    margin-left: 10px;
			}
			.submit:hover {
				background: var(--bs-link-hover-color)!important;
			}

			.logo {
				height: 100px!important;
				position: absolute;
				left: 20px;
				top: 20px;
				background-color: white;
				border-radius: 10px;
				padding: 10px;
			}

			@media (prefers-color-scheme: dark) {
				body {
					background: #444;
					color: white;
				}
				input {
					color: white;
				}
			}
			
			    .first-col {
			        border: 0!important;
			    }
			    html {
			        overflow-y: scroll;
			    }
			    .regCon {
			        display: none;
			    }
			    .regLink {
			        display: initial!important;
			    }
				.links {
					display: initial!important;
				}
			@media (max-height: 500px) {
			    .regCon {
			        display: none;
			    }
			    .regLink {
			        display: initial!important;
			    }
			}
			.links {
				display: none;
			}
			
			#username-error,
			#password-error {
			    font-size: 1em;
			    width: auto;
			}
			.u-row {
			    display: flex;
			    flex-direction: column;
			    text-align: left;
			}
			input.error {
			    border: 5px dashed red;
			}
			.slideshow1 {
			    position: absolute;
			    height: 100%;
			    width: 100%;
			}
			.slideshow-container,
			.mySlides,
			.mySlides img {
			    width: 100%;
			    height: 100%;
			}
			.mySlides img {
			    object-fit: cover;
			}
			.u-row-2 {
			    display: flex;
			    flex-direction: column;
			    gap: 10px;
			}
            .regCon, .first-col {
                flex-grow: 0!important;
                padding:25px;
                /* Parent background + Gaussian blur */
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px); /* Safari */
              
                /* Exclusion blend */
                background-blend-mode: exclusion;
              
                /* Color/tint overlay + Opacity */
                background: white;
                background: rgba(255, 255, 255, .25);
              
                /* Tiled noise texture 
                background-image: url(data:image/png;base64,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);
                */

                border-radius: 25px;
                border: 1px solid #959595 !important;
                box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 20px 10px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
            }

            .regLink, .regLink p, .loginForm {
                margin-bottom: 0;
                padding-bottom: 0;
            }

		</style>
	</head>
	<body>
	    
		<img src="https://dispatch.ml/logo.png" class="logo" style="opacity: 1;">
		    <div class="col-sm first-col" id="logCon" style="border-right: 1px solid gray;">
		        <h2>Have an account?</h2>
    			<em>Welcome back!</em>
    			<br>
    			<b style="color: red;"><?php echo $_SESSION['error']; ?></b>
    			<form method="post" class="loginForm" action="/authenticate.php" id="loginForm">
    				<div class="field">
    					<h2><i class="fa-solid fa-user"></i></h2>
    					<div class="u-row">
    					    <input type="text" minlength="2" placeholder="Username" name="username">
    					</div>
    				</div>
    				
    				<div class="field">
    					<h2><i class="fa-solid fa-lock"></i></h2>
    					<div class="u-row">
    					    <input type="password" minlength="8" placeholder="Password" name="password">
    					</div>
    				</div>
    				<div class="field">
    					<input type="submit" value="Login" class="submit">
    				</div>
    				<div class="field regLink links">
    				    <p>Don't? Click <a href="#" onclick="showReg();">here!</a></p>
    				</div>
    				<script>
    				    let regShown = false;
    				    document.getElementById("regCon").style.flexDirection="column";
    				    function showReg() {
    				        if (regShown == false) {
    				            document.getElementById("logCon").style.display = "none";
    				            document.getElementById("regCon").style.display = "flex";
    				            regShown = true;
    				        }
    				        else if (regShown == true) {
    				            document.getElementById("logCon").style.display = "initial";
    				            document.getElementById("regCon").style.display = "none";
    				            regShown = false;
    				        }
    				    }
    				</script>
    			</form>
		    </div>
			<div class="col-sm regCon" id="regCon">
		        <h2>Don't?</h2>
    			<em>Get started below!</em>
    			<br>
    			<form class="loginForm" method="post" id="regForm" action="/regauth.php">
    				<div class="field">
    					<h2><i class="fa-solid fa-user"></i></h2>
    					<div class="u-row">
    					    <input type="text" id="regu" minlength="2" placeholder="Username" name="regusername">
    					</div>
    				</div>
    				
    				<div class="field">
    					<h2><i class="fa-solid fa-lock"></i></h2>
    					<div class="u-row-2">
    					    <div class="u-row">
    					        <input type="password" minlength="8" placeholder="Password" name="regpassword">
    					    </div>
    					    <div class="u-row">
    					        <input type="password" minlength="8" placeholder="Repeat" name="password1">
    					    </div>
    					</div>
    				</div>
    				<div class="field">
    					<input type="submit" value="Register" class="submit" style="background: rgba(var(--bs-info-rgb))!important">
    				</div>
    				<div class="field regLink links">
    				    <p><a href="#" onclick="showReg();">Back to Login</a></p>
    				</div>
    			</form>
		    </div>
		<script>
			document.getElementById("regu").value="<?php echo $_POST['email']; ?>";
		    $("#loginForm").validate();
		    $("#regForm").validate();
		</script>
		<div class="slideshow1" style="z-index: -1;">
	        <div class="slideshow-container">

                <div class="mySlides fade2">
                  <img src="/assets/img/login/img-1.jpg" style="width:100%; max-width: 100%; max-height: 100vh; margin: auto;">
                  <div class="text"><i class="fa-solid fa-location-dot"></i>    El Capitan, Yosemite National Park, USA</div>
                </div>
                
                <div class="mySlides fade2">
                  <img src="/assets/img/login/img-2.jpg" style="width:100%; max-width: 100%; max-height: 100vh; margin: auto;">
                  <div class="text"><i class="fa-solid fa-location-dot"></i>    Ciucaș Peak, Romania</div>
                </div>
                
                <div class="mySlides fade2">
                  <img src="/assets/img/login/img-3.jpg" style="width:100%; max-width: 100%; max-height: 100vh; margin: auto;">
                  <div class="text"><i class="fa-solid fa-location-dot"></i>    Yili, Xinjiang, China</div>
                </div>
                
                <div class="mySlides fade2">
                  <img src="/assets/img/login/img-4.jpg" style="width:100%; max-width: 100%; max-height: 100vh; margin: auto;">
                  <div class="text"><i class="fa-solid fa-location-dot"></i>    Beaver Dam, WI 53916, USA</div>
                </div>
                
                <div class="mySlides fade2">
                  <img src="/assets/img/login/img-5.jpg" style="width:100%; max-width: 100%; max-height: 100vh; margin: auto;">
                  <div class="text"><i class="fa-solid fa-location-dot"></i>    Playa de la Misericordia, Spain</div>
                </div>
                
                <div class="mySlides fade2">
                  <img src="/assets/img/login/img-6.jpg" style="width:100%; max-width: 100%; max-height: 100vh; margin: auto;">
                  <div class="text"><i class="fa-solid fa-location-dot"></i>    Skye, United Kingdom</div>
                </div>
                
                <div class="mySlides fade2">
                  <img src="/assets/img/login/img-7.jpg" style="width:100%; max-width: 100%; max-height: 100vh; margin: auto;">
                  <div class="text"><i class="fa-solid fa-location-dot"></i>    Bad Pyrmont, Deutschland</div>
                </div>
                
                <div class="mySlides fade2">
                  <img src="/assets/img/login/img-8.jpg" style="width:100%; max-width: 100%; max-height: 100vh; margin: auto;">
                  <div class="text"><i class="fa-solid fa-location-dot"></i>    Lake Louise, Canada</div>
                </div>
                
                <div class="mySlides fade2">
                  <img src="/assets/img/login/img-9.jpg" style="width:100%; max-width: 100%; max-height: 100vh; margin: auto;">
                  <div class="text"><i class="fa-solid fa-location-dot"></i>    Fribourg, Switzerland</div>
                </div>
                
                <div class="mySlides fade2">
                  <img src="/assets/img/login/img-10.jpg" style="width:100%; max-width: 100%; max-height: 100vh; margin: auto;">
                  <div class="text"><i class="fa-solid fa-location-dot"></i>    Maldives</div>
                </div>
                </div>
                
                </div>
                <br>
                
                
                <script>
                let slideIndex = 1;
                showSlides(slideIndex);
                
                function showSlides(n) {
                  let i;
                  let slides = document.getElementsByClassName("mySlides");
                  if (n > slides.length) {slideIndex = 1}    
                  if (n < 1) {slideIndex = slides.length}
                  for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                  }
                  slides[slideIndex-1].style.display = "block";  
                }
                
                function rotSlides() {
                    showSlides(slideIndex);
                    if (slideIndex === 3) {
                        slideIndex = 1;
                    }
                    else {
                        slideIndex += 1;
                    }
                }
                setInterval(rotSlides,6000);
                </script>
	    </div>
	</body>
</html>