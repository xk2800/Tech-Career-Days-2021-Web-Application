<?php

  error_reporting(1);
  session_start();

  if(isset($_COOKIE["email"])){

    header("Location: https://" .$_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/dashboard.php");

  }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/phosphor-icons"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!--Own Css-->
    <link rel="stylesheet" href="../css/login.css" type="text/css">
    <!-- <link rel="stylesheet" href="public/company/css/login.css"> -->

    <!--Sweet Alerts-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- CDN for jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/2224ab56d8.js" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <title>Company Login | TCD</title>
    <link rel="icon" type="image/png" href= "../../../img/favicon_io/favicon.ico">

</head>

  <body>

    <div class="fb-chat">
        <!-- Load Facebook SDK for JavaScript -->
        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function() {

                FB.init({

                    xfbml            : true,
                    version          : 'v9.0'

                });

            };

            (function(d, s, id) {

                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);

            }(document, 'script', 'facebook-jssdk'));
        </script>

        <!-- Your Chat Plugin code -->
        <div class="fb-customerchat" attribution=setup_tool page_id="1659496437672512" theme_color="#0A7CFF">

        </div>
    </div>

    <div class="wrapper col-12 text-center" id="blur">

    <div class="stripes" id="stripes"> 
        
        </div>
    
        <div class="stripes1" id="stripes1">
        
        </div>
    
        <div class="row">

            <div class="container col-lg-5 col-xs-12 col-sm-12 text-center" id="left-section">

                <img src="../../../img/logo/LOGO standard.png" alt="">

            </div>

            <div class="modal-dialog col-lg-7 col-md-12 col-xs-12 col-sm-12 col-12">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main-section">
                    <div class="modal-content">

                        <h2 class="title">Company Login</h2>

                        <br>

                        <form class="col-12" action="./inclogin" method="POST">

                            <div class="form-group">
                                <input onkeyup="emailCheck()" onclick="startInterval()" id="email" type="email" autocomplete="off" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $_COOKIE["email"]?>"><i class="fas fa-envelope-open icon"></i>
                            </div>
                            <div id="email-error">
                                    <p>Please insert valid email address<p>
                            </div>

                            <div class="form-group">
                                <input onkeyup="passCheck()" onclick="startInterval()" type="password" name="password" id="pwdfield" class="form-control" placeholder="Enter Password"><i class="fas fa-lock icon"></i><a onclick="showToggle()"><i class="fas fa-eye-slash icon2" id="eye1"></i></a>
                            </div>

                            <div id="pass-error">
                                <p>Please insert at least 8 characters<p>
                            </div>

                            <div class="input">

                                <input type="checkbox" id="rmbme" class="rmb-me" name="remember" value="1">
                                <label for="rmbme">Remember Me</label>

                            </div>

                            <br>

                            <button type="submit" name="submit" class="btn regbutton" id="button" onclick="loginAnimation();">

                                <span class="login-text">LOG-IN&nbsp&nbsp</span>
                                <i class="ph-navigation-arrow login-icon"></i>
                                <img class="login-loading" src="../../../img/download-loading.svg" alt="" height="25px" width="25px">

                            </button>

                        </form>

                        <br>

                        <a class ="forgot" href="#" onclick="toggle()">Forgot Password?</a>

                    </div>

                </div>
            </div>

        </div>

    </div>

        <!--Forgot Password PopUp-->
        <div class="col-12" id="popup">

            <div class="header">

                <h2 class="title" id="popup-title">Forgot Password?</h2>

                <a href="#" onclick="toggle()"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg></a>

            </div>

                <form class="col-12" action="./incforgot" method="post">

                    <div class="form-group popup">
                        <input onkeyup="fgtEmailCheck()"id="fgt-email" type="text" name="email" class="form-control" placeholder="Enter Email"><i class="fas fa-envelope-open icon"></i>
                    </div>

                    <div id="fgtemail-error">
                        <p>Please insert valid email address<p>
                    </div>

                    <button type="submit" name="submit" class="btn popup" onclick="sendAnimation()">
                    
                        <span class="send-text">Send&nbsp</span>
                        <i class="ph-paper-plane-tilt send-hover"></i>
                        <img class="send-loading" src="../../../img/download-loading.svg" alt="" height="25px" width="25px">

                    </button>


                </form>

                <p class="des">Please provide us your email address</p>

        </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="../js/login.js"></script>

    <script>

function emailSuccess() {

    Swal.fire({
        icon: 'success',
        title: 'Email Sent !!',
        text: 'Check your inbox now !!',
    })

}

//js functions for real time form validations
const PASSFIELD = document.getElementById("pwdfield");
const SHOW = document.querySelector("#eye1");

const EMAIL = document.querySelector("#email");
const EMAILRR = document.querySelector("#email-error");

const PASS = document.querySelector("#pwdfield");
const PASSRR = document.querySelector("#pass-error");

const FGTEMAIL = document.querySelector("#fgt-email");
const FGTEMAILRR = document.querySelector("#fgtemail-error");

const BUTTON = document.querySelector("#button");

let EMAILREGEX = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
let PASSREGEX = ".{8,}";

function showToggle() {

    if(PASSFIELD.type === "password"){

        PASSFIELD.type = "text";

    }else{

        PASSFIELD.type = "password";

    }

}

function emailCheck(){

    if(EMAIL.value.match(EMAILREGEX)){

        EMAIL.classList.add('correct');
        EMAIL.classList.remove('wrong');
        EMAILRR.classList.add('correct');
        EMAILRR.classList.remove('wrong');

    }else{

        EMAIL.classList.add('wrong');
        EMAIL.classList.remove('correct');
        EMAILRR.classList.add('wrong');
        EMAILRR.classList.remove('correct');

    }

}

function passCheck() {

    if(PASS.value.match(PASSREGEX)){

        PASS.classList.add('correct');
        PASS.classList.remove('wrong');
        PASSRR.classList.add('correct');
        PASSRR.classList.remove('wrong');

    }else{

        PASS.classList.add('wrong');
        PASS.classList.remove('correct');
        PASSRR.classList.add('wrong');
        PASSRR.classList.remove('correct');

    }

}

function fgtEmailCheck () {

    if(FGTEMAIL.value.match(EMAILREGEX)){

        FGTEMAIL.classList.add('correct');
        FGTEMAIL.classList.remove('wrong');
        FGTEMAILRR.classList.add('correct');
        FGTEMAILRR.classList.remove('wrong');

    }else{

        FGTEMAIL.classList.add('wrong');
        FGTEMAIL.classList.remove('correct');
        FGTEMAILRR.classList.add('wrong');
        FGTEMAILRR.classList.remove('correct');

    }

}

function startInterval () {

    let timer = setInterval(buttonLocker, 500);

}

function buttonLocker() {

    if((EMAIL.value.match(EMAILREGEX)) && (PASS.value.match(PASSREGEX))) {

        BUTTON.disabled = false;

    }else{

        BUTTON.disabled = true;

    }

}

function toggle() {

    var blur = document.getElementById('blur');
    blur.classList.toggle('active');

    var stripe = document.getElementById("stripes");
    stripe.classList.toggle('active');
    
    var stripe1 = document.getElementById("stripes1");
    stripe.classList.toggle('active');

    var popup = document.getElementById('popup');
    popup.classList.toggle('active');

}

</script>

<?php

    if(!isset($_GET['login'])){ //check if name "signup" exists, if not then means that user havent signup

        exit();

    }else{

        $loginCheck = $_GET['login'];

        if($loginCheck == "empty"){

          echo '<script type="text/javascript">empty();</script>';
          exit();

        }elseif($loginCheck == "detailsError"){

          echo '<script type="text/javascript">detailsError();</script>';
          exit();

        }elseif($loginCheck == "emailError"){

            echo '<script type="text/javascript">emailError();</script>';
            exit();
  
        }elseif($loginCheck == "emailSuccess") {

            echo '<script type="text/javascript">emailSuccess();</script>';
            exit();

        }elseif($loginCheck == "emailFailed") {

            echo '<script type="text/javascript">emailFailed();</script>';
            exit();

        }

    }

?>


  </body>
</html>
