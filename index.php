<?php
session_start();
$_SESSION['page'] = "/";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            @media (prefers-color-scheme: dark) {
                h1,
                h2,
                h3,
                h4,
                h5,
                h6,
                b,
                span,
                p {
                    color: white!important;
                }
            }
        </style>
        <?php
        include("head.html");
        ?>
<meta name="have-i-been-pwned-verification" value="48466a382707044e47d97e07fd6a00bb">
<script src="https://kit.fontawesome.com/049529442a.js" crossorigin="anonymous"></script>
<link rel="canonical" href="https://dispatch.ml/">
<meta name="description" content="Dispatch: A no-faff simple chatroom that puts your privacy first. It's the modern chat website, but without ANY spying on you. No emails needed, no faff chatting. Simple. Join the people who care about privacy, and use Dispatch, chat without the faff." />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/index.css?v=6" rel="stylesheet" />
        
        <style>
            .bg-light {
                color: black!important;
            }
            .nav-container {
                display: none;
            }
        </style>

        <style>
            /* First slide CSS */
            .navbar-logo-left {
     position: fixed;
     left: 0px;
     top: 0px;
     right: 0px;
     z-index: 99999;
     background-color: rgba(89, 64, 255, 0.9);
     box-shadow: 4px 4px 6px 0 rgba(0, 0, 0, 0.23);
}
 .navbar-logo-left-container {
     z-index: 5;
     width: 1030px;
     max-width: 100%;
     margin-right: auto;
     margin-left: auto;
     padding: 15px 20px;
     background-color: transparent;
}
 .navbar-logo-left-container.shadow-three {
     width: 100%;
     max-width: 1140px;
     margin-bottom: 0px;
     padding-top: 20px;
     padding-bottom: 20px;
     font-family: Optimistic, sans-serif;
}
 .container {
     width: 100%;
     max-width: 940px;
     margin-right: auto;
     margin-left: auto;
}
 .navbar-wrapper {
     display: -webkit-box;
     display: -webkit-flex;
     display: -ms-flexbox;
     display: flex;
     -webkit-box-pack: justify;
     -webkit-justify-content: space-between;
     -ms-flex-pack: justify;
     justify-content: space-between;
     -webkit-box-align: center;
     -webkit-align-items: center;
     -ms-flex-align: center;
     align-items: center;
}
 .nav-menu-two {
     display: -webkit-box;
     display: -webkit-flex;
     display: -ms-flexbox;
     display: flex;
     margin-bottom: 0px;
     -webkit-box-pack: justify;
     -webkit-justify-content: space-between;
     -ms-flex-pack: justify;
     justify-content: space-between;
     -webkit-box-align: center;
     -webkit-align-items: center;
     -ms-flex-align: center;
     align-items: center;
}
 .nav-link {
     margin-right: 5px;
     margin-left: 5px;
     padding: 5px 10px;
     color: #fff;
     font-size: 14px;
     line-height: 20px;
     letter-spacing: 0.25px;
}
 .nav-link:hover {
     color: rgba(26, 27, 31, 0.75);
}
 .nav-link:focus-visible {
     border-radius: 4px;
     outline-color: #0050bd;
     outline-offset: 0px;
     outline-style: solid;
     outline-width: 2px;
     color: #0050bd;
}
 .nav-link[data-wf-focus-visible] {
     border-radius: 4px;
     outline-color: #0050bd;
     outline-offset: 0px;
     outline-style: solid;
     outline-width: 2px;
     color: #0050bd;
}
 .nav-dropdown {
     margin-right: 5px;
     margin-left: 5px;
}
 .nav-dropdown-toggle {
     padding: 5px 30px 5px 10px;
     font-size: 14px;
     line-height: 20px;
     letter-spacing: 0.25px;
}
 .nav-dropdown-toggle:hover {
     color: rgba(26, 27, 31, 0.75);
}
 .nav-dropdown-toggle:focus-visible {
     border-radius: 5px;
     outline-color: #0050bd;
     outline-offset: 0px;
     outline-style: solid;
     outline-width: 2px;
     color: #0050bd;
}
 .nav-dropdown-toggle[data-wf-focus-visible] {
     border-radius: 5px;
     outline-color: #0050bd;
     outline-offset: 0px;
     outline-style: solid;
     outline-width: 2px;
     color: #0050bd;
}
 .nav-dropdown-icon {
     margin-right: 10px;
}
 .nav-dropdown-list {
     border-radius: 12px;
     background-color: #fff;
}
 .nav-dropdown-list.w--open {
     padding-top: 10px;
     padding-bottom: 10px;
}
 .nav-dropdown-link {
     padding-top: 5px;
     padding-bottom: 5px;
     font-size: 14px;
}
 .nav-dropdown-link:focus-visible {
     border-radius: 5px;
     outline-color: #0050bd;
     outline-offset: 0px;
     outline-style: solid;
     outline-width: 2px;
     color: #0050bd;
}
 .nav-dropdown-link[data-wf-focus-visible] {
     border-radius: 5px;
     outline-color: #0050bd;
     outline-offset: 0px;
     outline-style: solid;
     outline-width: 2px;
     color: #0050bd;
}
 .nav-divider {
     width: 1px;
     height: 22px;
     margin-right: 15px;
     margin-left: 15px;
     background-color: #e4ebf3;
}
 .nav-link-accent {
     margin-right: 20px;
     margin-left: 5px;
     padding: 5px 10px;
     color: #fff;
     font-size: 14px;
     line-height: 20px;
     font-weight: 700;
     letter-spacing: 0.25px;
}
 .nav-link-accent:hover {
     color: rgba(26, 27, 31, 0.75);
}
 .button-primary {
     padding: 12px 25px;
     border-radius: 10px;
     background-color: #1a1b1f;
     -webkit-transition: all 200ms ease;
     transition: all 200ms ease;
     color: #fff;
     font-size: 12px;
     line-height: 20px;
     letter-spacing: 2px;
     text-transform: uppercase;
     cursor: pointer;
}
 .button-primary:hover {
     background-color: #32343a;
     color: #fff;
}
 .button-primary:active {
     background-color: #43464d;
}
 .button-primary.register {
     background-color: #fff;
     color: #000;
}
 .button-primary.register:hover {
     background-image: url('..//assets/img/maintenence.gif');
     background-position: 100% 50%;
     background-size: cover;
     box-shadow: 4px 4px 3px 0 rgba(15, 15, 15, 0.72);
     color: #fff;
}
 .heading {
     font-family: Optimistic, sans-serif;
}
 .body {
     display: block;
     overflow: visible;
     height: 100%;
     -webkit-box-align: start;
     -webkit-align-items: flex-start;
     -ms-flex-align: start;
     align-items: flex-start;
     background-color: #fff;
     line-height: 100%;
}
 .section {
     position: absolute;
     left: 0%;
     top: 0%;
     right: auto;
     bottom: auto;
     display: -webkit-box;
     display: -webkit-flex;
     display: -ms-flexbox;
     display: flex;
     overflow: hidden;
     width: 100%;
     height: 120%;
     margin-right: 0px;
     margin-left: 0px;
     padding: 25px;
     -webkit-box-pack: justify;
     -webkit-justify-content: space-between;
     -ms-flex-pack: justify;
     justify-content: space-between;
     -webkit-box-align: center;
     -webkit-align-items: center;
     -ms-flex-align: center;
     align-items: center;
     background-image: linear-gradient(146deg, #3f05ff, #fff);
}
 .image {
     position: absolute;
     left: 0%;
     top: 0%;
     right: auto;
     bottom: auto;
     z-index: -1;
     width: 100%;
     height: 100%;
}
 .image-2 {
     position: absolute;
     left: auto;
     top: auto;
     right: -4%;
     bottom: auto;
     z-index: 1;
     height: 75%;
}
 .image-3 {
     position: absolute;
     left: auto;
     top: auto;
     right: 13%;
     bottom: -5%;
     z-index: 1;
     height: 50%;
}
 .image-4 {
     position: absolute;
     left: auto;
     top: 67px;
     right: 13%;
     bottom: 0%;
     z-index: 1;
     height: 50%;
}
 .image-5 {
     position: absolute;
     left: auto;
     top: auto;
     right: 18%;
     bottom: 17%;
     z-index: 2;
     height: 40%;
     -webkit-transform: rotate(29deg);
     -ms-transform: rotate(29deg);
     transform: rotate(29deg);
}
 .paragraph {
     font-family: Optimistic, sans-serif;
}
 .section-2 {
     position: relative;
     top: 102%;
     z-index: 2;
     display: -webkit-box;
     display: -webkit-flex;
     display: -ms-flexbox;
     display: flex;
     margin-top: 0%;
     -webkit-box-orient: vertical;
     -webkit-box-direction: normal;
     -webkit-flex-direction: column;
     -ms-flex-direction: column;
     flex-direction: column;
     -webkit-box-pack: center;
     -webkit-justify-content: center;
     -ms-flex-pack: center;
     justify-content: center;
     -webkit-box-align: center;
     -webkit-align-items: center;
     -ms-flex-align: center;
     align-items: center;
     font-family: Optimistic, sans-serif;
}
 .div-block {
     position: relative;
     z-index: 9;
}
 .heading-2 {
     font-family: Optimistic, sans-serif;
     color: #fffdfd;
     text-align: center;
}
 .slider {
     overflow: visible;
     width: 100%;
     height: 400px;
     background-color: transparent;
     color: #fff;
}
 .mask {
     padding-right: 64px;
     padding-bottom: 64px;
     padding-left: 64px;
}
 .heading-1 {
     width: 100%;
}
 .div-block-2 {
     display: -webkit-box;
     display: -webkit-flex;
     display: -ms-flexbox;
     display: flex;
     width: 75%;
     height: 100%;
     -webkit-box-orient: vertical;
     -webkit-box-direction: normal;
     -webkit-flex-direction: column;
     -ms-flex-direction: column;
     flex-direction: column;
     -webkit-box-pack: justify;
     -webkit-justify-content: space-between;
     -ms-flex-pack: justify;
     justify-content: space-between;
     -webkit-box-align: start;
     -webkit-align-items: flex-start;
     -ms-flex-align: start;
     align-items: flex-start;
}
 .div-block-3 {
     position: static;
     display: block;
     width: 100%;
     text-align: left;
}
 .icon {
     background-color: transparent;
     -webkit-filter: invert(100%);
     filter: invert(100%);
}
 .icon-2 {
     -webkit-filter: invert(100%);
     filter: invert(100%);
}
 .div-block-4 {
     display: -webkit-box;
     display: -webkit-flex;
     display: -ms-flexbox;
     display: flex;
     margin-top: 22px;
     margin-left: 73px;
     padding-right: 36px;
     padding-left: 36px;
     -webkit-box-pack: justify;
     -webkit-justify-content: space-between;
     -ms-flex-pack: justify;
     justify-content: space-between;
     grid-column-gap: 20px;
     grid-row-gap: 20px;
}
 .slide {
     padding-right: 25px;
     padding-left: 25px;
}
 .image-6 {
     position: absolute;
     left: 87px;
     top: 48px;
     height: 25%;
     max-height: 30%;
     margin-left: 0px;
}
 .div-block-5 {
     position: relative;
     width: 50%;
}
 .image-7 {
     position: relative;
     left: 11%;
     top: 148px;
     height: 15%;
     margin-left: 0px;
}
 .div-block-6 {
     position: absolute;
     left: -20%;
     top: 65%;
     right: auto;
     bottom: auto;
     overflow: visible;
     width: 550%;
     height: 80%;
     background-color: #353535;
     -webkit-transform: rotate(-6deg);
     -ms-transform: rotate(-6deg);
     transform: rotate(-6deg);
}
 .div-block-7 {
     position: static;
     top: 100%;
     overflow: hidden;
     width: 100%;
}
 .left-arrow {
     -webkit-filter: invert(100%);
     filter: invert(100%);
}
 .right-arrow {
     -webkit-filter: invert(100%);
     filter: invert(100%);
}
 .div-block-8 {
     position: absolute;
     top: 1326px;
     width: 200%;
     background-color: #ff9d00;
}
 .div-block-9 {
     position: absolute;
     top: 951px;
     z-index: 999;
     display: block;
     width: 100%;
     background-color: #ff9500;
}
 .div-block-10 {
     position: absolute;
     left: -96px;
     top: 1387px;
     right: 0px;
     bottom: auto;
     width: 150%;
     height: 500px;
     background-color: #ff9d00;
     box-shadow: 3px -3px 9px 0 rgba(0, 0, 0, 0.25);
     -webkit-transform: rotate(5deg);
     -ms-transform: rotate(5deg);
     transform: rotate(5deg);
}
 @media screen and (min-width: 1440px) {
     .div-block-10 {
         top: 1448px;
    }
}
 @media screen and (max-width: 991px) {
     .container {
         max-width: 728px;
    }
     .nav-menu-wrapper {
         background-color: transparent;
    }
     .nav-menu-two {
         display: -webkit-box;
         display: -webkit-flex;
         display: -ms-flexbox;
         display: flex;
         margin-top: 10px;
         padding: 20px;
         -webkit-justify-content: space-around;
         -ms-flex-pack: distribute;
         justify-content: space-around;
         -webkit-flex-wrap: wrap;
         -ms-flex-wrap: wrap;
         flex-wrap: wrap;
         -webkit-box-align: center;
         -webkit-align-items: center;
         -ms-flex-align: center;
         align-items: center;
         border-radius: 50px;
         background-color: #fff;
         box-shadow: 0 8px 50px 0 rgba(0, 0, 0, 0.05);
    }
     .nav-link {
         padding-right: 5px;
         padding-left: 5px;
    }
     .nav-dropdown-list.shadow-three.w--open {
         position: absolute;
    }
     .menu-button {
         padding: 12px;
    }
     .menu-button.w--open {
         background-color: #a6b1bf;
         color: #fff;
    }
     .heading-2 {
         position: relative;
         top: 52px;
    }
     .slider {
         top: 56px;
         height: 400px;
    }
     .div-block-2 {
         width: 75%;
    }
     .div-block-4 {
         margin-top: 73px;
         margin-left: -10px;
    }
     .image-6 {
         left: auto;
         right: -20px;
    }
     .div-block-5 {
         width: 50%;
    }
     .image-7 {
         left: 20%;
    }
     .div-block-6 {
         top: 83%;
    }
     .div-block-10 {
         top: 1337px;
    }
}
 @media screen and (max-width: 767px) {
     .navbar-logo-left-container {
         max-width: 100%;
    }
     .navbar-brand {
         padding-left: 0px;
    }
     .nav-menu-two {
         padding-bottom: 30px;
         -webkit-box-orient: vertical;
         -webkit-box-direction: normal;
         -webkit-flex-direction: column;
         -ms-flex-direction: column;
         flex-direction: column;
         border-radius: 20px;
    }
     .nav-link {
         display: inline-block;
         padding-top: 10px;
         padding-bottom: 10px;
    }
     .nav-dropdown {
         display: -webkit-box;
         display: -webkit-flex;
         display: -ms-flexbox;
         display: flex;
         -webkit-box-orient: vertical;
         -webkit-box-direction: normal;
         -webkit-flex-direction: column;
         -ms-flex-direction: column;
         flex-direction: column;
         -webkit-box-align: center;
         -webkit-align-items: center;
         -ms-flex-align: center;
         align-items: center;
    }
     .nav-dropdown-toggle {
         padding-top: 10px;
         padding-bottom: 10px;
    }
     .nav-dropdown-list.shadow-three {
         box-shadow: 0 8px 50px 0 rgba(0, 0, 0, 0.05);
    }
     .nav-dropdown-list.shadow-three.w--open {
         position: relative;
    }
     .nav-dropdown-list.shadow-three.mobile-shadow-hide {
         box-shadow: none;
    }
     .nav-divider {
         width: 200px;
         height: 1px;
         max-width: 100%;
         margin-top: 10px;
         margin-bottom: 10px;
    }
     .nav-link-accent {
         display: inline-block;
         margin-right: 5px;
         padding-top: 10px;
         padding-bottom: 10px;
    }
     .mobile-margin-top-10 {
         margin-top: 10px;
    }
     .heading {
         color: #2802ff;
    }
     .image-2 {
         right: -36%;
         height: 75%;
         -o-object-fit: cover;
         object-fit: cover;
         -o-object-position: 0% 50%;
         object-position: 0% 50%;
    }
     .image-4 {
         display: none;
    }
     .paragraph {
         width: 50%;
    }
     .section-2 {
         top: 93%;
         overflow: scroll;
    }
     .slider {
         height: 450px;
    }
     .div-block-2 {
         width: 100%;
         -webkit-box-pack: center;
         -webkit-justify-content: center;
         -ms-flex-pack: center;
         justify-content: center;
         -webkit-box-align: center;
         -webkit-align-items: center;
         -ms-flex-align: center;
         align-items: center;
    }
     .div-block-4 {
         height: 100%;
         -webkit-box-pack: center;
         -webkit-justify-content: center;
         -ms-flex-pack: center;
         justify-content: center;
         -webkit-box-align: center;
         -webkit-align-items: center;
         -ms-flex-align: center;
         align-items: center;
    }
     .image-6 {
         height: auto;
    }
     .div-block-5 {
         display: none;
    }
     .div-block-6 {
         height: 55%;
    }
     .div-block-10 {
         top: 1219px;
    }
}
 @media screen and (max-width: 479px) {
     .navbar-logo-left {
         position: -webkit-sticky;
         position: sticky;
         z-index: 10;
    }
     .navbar-logo-left-container.shadow-three {
         position: relative;
    }
     .container {
         max-width: none;
    }
     .navbar-wrapper {
         color: transparent;
    }
     .nav-menu-wrapper {
         display: none;
    }
     .nav-menu-two {
         position: relative;
         left: auto;
         right: auto;
         z-index: 99;
         display: -webkit-box;
         display: -webkit-flex;
         display: -ms-flexbox;
         display: flex;
         margin-top: 0px;
         margin-right: 32px;
         margin-left: 32px;
         -webkit-box-orient: vertical;
         -webkit-box-direction: normal;
         -webkit-flex-direction: column;
         -ms-flex-direction: column;
         flex-direction: column;
         color: #000;
    }
     .nav-link {
         color: #000;
    }
     .menu-button {
         color: #fff;
    }
     .heading {
         color: #fff;
         text-align: left;
    }
     .section {
         padding-top: 71px;
         -webkit-box-align: start;
         -webkit-align-items: flex-start;
         -ms-flex-align: start;
         align-items: flex-start;
    }
     .image-2 {
         display: none;
    }
     .image-4 {
         display: none;
    }
     .image-5 {
         bottom: 6%;
         overflow: visible;
         height: 60%;
         border-radius: 50px;
    }
     .section-2 {
         top: 99%;
         overflow: visible;
    }
     .heading-2 {
         padding-right: 10px;
         padding-left: 10px;
    }
     .slider {
         height: 400px;
    }
     .div-block-2 {
         -webkit-box-pack: center;
         -webkit-justify-content: center;
         -ms-flex-pack: center;
         justify-content: center;
         -webkit-box-align: center;
         -webkit-align-items: center;
         -ms-flex-align: center;
         align-items: center;
    }
     .div-block-4 {
         height: 100%;
         -webkit-box-pack: center;
         -webkit-justify-content: center;
         -ms-flex-pack: center;
         justify-content: center;
         -webkit-box-align: center;
         -webkit-align-items: center;
         -ms-flex-align: center;
         align-items: center;
    }
     .div-block-6 {
         top: 102%;
         height: 70%;
    }
     .heading-3 {
         font-size: 18px;
         line-height: 20px;
    }
     .div-block-10 {
         top: 1471px;
    }
}
 @font-face {
     font-family: 'Source code Pro';
     src: url('../fonts/Source-Code-Pro-Regular.woff2') format('woff2');
     font-weight: 400;
     font-style: normal;
     font-display: swap;
}
 @font-face {
     font-family: 'Optimistic';
     src: url('../fonts/Optimistic_Display_W_Bd.woff2') format('woff2');
     font-weight: 700;
     font-style: normal;
     font-display: swap;
}
 @font-face {
     font-family: 'Optimistic';
     src: url('../fonts/Optimistic_Display_W_Md.woff2') format('woff2');
     font-weight: 400;
     font-style: normal;
     font-display: swap;
}
body {
    font-family: Optimistic,var(--bs-font-sans-serif);
}
        </style>
    </head>
    <body class="body">
        <!-- Navigation-->
        <?php
        include("navbar.html");
        
        if ($_SESSION['cookies'] !== true) {
            include("cookies.html");
        }
        ?>
       <div class="section wf-section">
  <img src="/assets/img/safari.png" sizes="100vw" alt="Dispatch Chat interface" class="image-2">
  <img src="/assets/img/iphone.png" loading="eager" alt="Dispatch on mobile" class="image-5">
  <img src="/assets/img/forum.png" loading="eager" alt="Dispatch Forums" class="image-4">
  <div class="div-block">
    <h1 class="heading" style="text-align: left; padding-left: 0; color: white;">Everyone uses Dispatch, <br>chat without the faff. </h1>
    <p class="paragraph" style="color: white;">Use Dispatch for the best experience out there: the experience of privacy.</p>
  </div>
</div>
<!-- [if lte IE 9]>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script>
				<![endif] -->
        <!-- Icons Grid-->
        <section class="features-icons bg-light text-center" style="margin-top: 105vh;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex d-flex-center"><i class="fa-duotone fa-shield-halved text-primary"></i></div>
                            <h3>Privacy at its center</h3>
                            <p class="lead mb-0">No data is collected, no ads are shown. We run completely on free services!</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex d-flex-center"><i class="fa-duotone fa-sparkles text-primary"></i></div>
                            <h3>Modern Interface</h3>
                            <p class="lead mb-0">An interface comparable to the biggest tech companies makes Dispatch even better than before!</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex d-flex-center"><i class="fa-duotone fa-plane-departure text-primary"></i></div>
                            <h3>Easy to Use</h3>
                            <p class="lead mb-0">Get started right away with Dispatch by <a href="https://gonerogue.ml/register.php?s=phpchat">registering here</a>. No emails needed!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="call-to-action text-white text-center" id="signup">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <h2 class="mb-4">Donate now on Ko-Fi!</h2>
                        <h2><a href="https://ko-fi.com/dispatch">Click here</a></h2>
                    </div>
                </div>
            </div>
        </section>
        <!-- Image Showcases-->
        <section class="showcase">
            <style>
                .d-flex svg { height: 4.5rem; margin-bottom: 2.5rem; }
            </style>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('assets/img/example.png')"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <div class="features-icons-icon d-flex d-flex-center"><i class="fa-duotone fa-earth-americas text-primary"></i></div>
                        <h2>World-class chatting service</h2>
                        <p class="lead mb-0">When you use Dispatch, a good experience is guaranteed. We have worked for hours on the interface, and have perfected it. We hope you enjoy it!</p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 text-white showcase-img" style="background-image: url('assets/img/bg-showcase-2.jpg')"></div>
                    <div class="col-lg-6 my-auto showcase-text">
                        <div class="features-icons-icon d-flex d-flex-center"><i class="fa-duotone fa-microchip text-primary"></i></div>
                        <h2>Newest technology</h2>
                        <p class="lead mb-0">We have the newest technology in store for you, including our world-class 256-bit SSL/TLS 1.3 encryption. This is why you can have peace of mind in us, as we handle your data in the securest way possible, comparable to other chatting services.</p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('assets/img/bg-showcase-3.jpg')"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <div class="features-icons-icon d-flex d-flex-center"><i class="fa-duotone fa-user-police text-primary"></i></div>
                        <h2>Strict Data Policy</h2>
                        <p class="lead mb-0">We have a very stringent data policy - <a href="policy.html">which you can see here</a> - which basically says that we only record things that you type. It is more secure than <b>any</b> chatting service out there - so you can put your trust in us.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action-->
        <section class="call-to-action text-white text-center" id="signup">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <h2 class="mb-4">Ready to get started? Sign up now!</h2>
                        <form class="form-subscribe" id="contactForm" action="/login.php" method="post">
                                <!-- Email address input-->
                                <div class="row">
                                    <div class="col">
                                        <input class="form-control form-control-lg" id="emailAddress" type="text" placeholder="Username" name="email" />
                                    </div>
                                    <div class="col-auto"><input type="submit" class="btn btn-primary btn-lg" id="submitButton" value="Register" /></div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item"><a href="" onclick="window.scrollTo({ top: 0, behavior: 'smooth' });">Scroll to top</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="/policy.html">Policies</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="/forum">Forums</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="/login.php">Login/enter</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="/news">News</a></li>
                        </ul>
                        <p class="text-muted small mb-4 mb-lg-0">&copy; Dispatch 2022 under our <a href="policy.html">copyright policy.</a></p>
                    </div>
                    <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item me-4">
                                <a href="https://gonerogue.ml"><img src="https://gonerogue.ml/mstile-150x150.png" style="filter: invert(33%) sepia(83%) saturate(4148%) hue-rotate(209deg) brightness(101%) contrast(99%); display: inline; width: 100px; height: 100px;"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
                           <style>
            p {
                line-height: var(--bs-body-line-height)!important;
            }
            .orange {
                color:darkorange;

            }
            #body {
            }
            #ul {
                font-size:1vw;
            }
            .flex-container {
                display: flex;
                flex-direction: row;
            }
            #h4 {
                font-size: 1em !important;
            }
            #h1 {
                padding:40px 0;
                color:darkorange !important;
                                padding-left:1px;
                                font-size:3.5vw;
            }
            .fa-exclamation-circle {
                color:maroon
            }
            .buttons {
                display: flex;
                flex-direction: column;
                margin-left:40px;
                padding: 30px 0;
            }
            .accept {
                height:auto;
                font-size:2vw;
                color:darkorange;
                background-color: #302f2f;
                padding:4px;
                border-radius:8px;
            }
            .accept:hover {
                background-color: #585757;
            }
            #header {
                background:grey;
                padding:1px;
                height:200px;
                margin:0;
                text-align:left !important;
            }
        </style>
        <script>
            function hide() {
                document.getElementById("header").innerHTML="";
                document.getElementById("head").innerHTML="";
            }
        </script>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
       
    </body>
</html>
