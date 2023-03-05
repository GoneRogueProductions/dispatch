<?php
session_start();
$x=$_SESSION['name'];

if (($x!="werdl") && ($x!="max")) {
    $_SESSION['error']="Unauthorised for your account type";
    header("Location: login.php");
    
}
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/049529442a.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
            box-sizing: border-box;
        }
        p,b,h1,h2,h3,h4,h5,h6,a,.terminal-container,
        body {
            font-family: var(--bs-font-monospace)!important;
            margin: 0;
            padding: 0;
        }
        body {
            background: black;
            display:flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            transition: 0.5s;
        }

        .container {
            padding: 0px;
            margin: 0px;
            border-radius: 10px;
            border: 3px solid darkslategray;
            box-shadow: 0 0 128px 0 rgba(40,40,40,0.1),
              0 32px 64px -48px rgba(40,40,40,0.5);
              transition: 0.2s;
        }
        .terminal-container {
            padding: 10px;
            margin: 0;
            text-align: left;
            color: white!important;
            background: black;
            border-radius: 0 0 8px 8px;
        }
        .top {
            display: flex;
            justify-content: space-between;
            border-radius: 6px 6px 0 0;
            padding: 0px;
            color: white;
            align-items: center;
            background: darkslategray;
            transition: 0.5s;
        }
        .top p {
            margin: 0;
        }
        .top p,
        .tray a {
            text-decoration: none;
            font-family: var(--bs-font-sans-serif)!important;
        }
        .tray a {
            transition: 0.1s;
            height: 100%;
            display: inline-block;
            padding: 10px;
            border-radius: 5px;
            padding-top: 3px;
            padding-bottom: 3px;
            color: white;
        }
        .tray a:hover {
            background: black;
            color: white;
        }
        .tray {
            display: inline-block;
            padding: 10px;
        }
        .top p {
            margin: 10px;
        }
        .cmd {
            outline: none;
            border: none;
            background-color: transparent;
            color: white;
            display: inline;
            width: calc(100% - 100px);
        }
        #last {
            display: inline;
        }
        @media (prefers-color-scheme: light) {
            .container {
              border: 3px solid white;
              background-color: black;
            }
            .top {
                background: white;
                color: black;
            }
            body {
                background: white;
            }
            .tray a {
                color: black;
            }
        }
        .made-by {
            position:absolute;
            bottom: 20px;
            left: 20px;
        }
    </style>

</head>
<body>
    <div class="container" id="container">
        <div class="top" id="top">
            <p><i class="fa-solid fa-rectangle-terminal"></i>    Terminal</p>
            <div class="tray">
                <a href="#" onclick="maximise();" id="max"><i class="fa-solid fa-square-arrow-up-right"></i></a>
            </div>
        </div>
        <div class="terminal-container">
            <p>MySQL Command Line</p>
            <p id="last">bash-3.2$</p>
            <input class="cmd" id="cmd" />
        </div>
    </div>
    <p class="made-by">ADMINS ONLY!!!!!</p>
    <script type="text/javascript">
        let input = document.getElementById("cmd");
        let lastp = document.getElementById("last");
        let cont = document.getElementById("container");
        let topdiv = document.getElementById("top");
        let maxdiv = document.getElementById("max");
        let max = false;

        function maximise() {
            if (max === false) {
                cont.style.maxWidth="100%";
                cont.style.height="100%";
                cont.style.width="100%";
                cont.style.padding="0";
                maxdiv.innerHTML='<i class="fa-solid fa-square-arrow-down-left"></i>';
                max = true;
            }
            else if (max === true) {
                cont.style.maxWidth="";
                cont.style.width="";
                cont.style.height="";
                cont.style.padding="";
                maxdiv.innerHTML='<i class="fa-solid fa-square-arrow-up-right"></i>';
                max = false;
            }
        }
    </script>
</body>
</html>