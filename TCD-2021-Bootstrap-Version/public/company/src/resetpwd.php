<?php

  error_reporting(1);
  session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!--Own Css-->
    <link rel="stylesheet" href="../css/resetpwd.css">

    <!--Sweet Alerts-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- CDN for jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/2224ab56d8.js" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <title>TCD LOGIN</title>
    <link rel="icon" type="image/png" href= "/img/favicon_io/favicon.ico">

  </head>
  <body>

    <!--Navbar-->
    <div class="header" id="myHeader">
        <nav class = "navbar px-5 py-2 navbar-expand-lg navbar-light" id="navbar">

            <a class = "navbar-brand" href = "dashboard" id = "text"><img src="../../../img/favicon_io/favicon.ico" height="30px" width="30px" alt=""><span id="header-word">&nbsp&nbspTech Career Days</span></a>

            <!--Button-->

            <nav class="navbar navbar-expand-lg">
                <button type="button" id="sidebarCollapse" class="btn btn-warning">
                    <a href="./login"><span>Log In</span></a>
                </button>
            </nav>

        </nav>

    </div>

    <div class="col-12" id="popup">

        <div class="header">

            <h2>Reset Password</h2>

        </div>

            <form class="col-12" action="" method="post">

                <div class="form-group">
                    <input onkeyup="passCheck()" onclick="startInterval()" id="pwdfield" type="password" name="pass" class="form-control" placeholder="New Password"><i class="fas fa-lock icon"></i><i onclick="showToggle()" class="fas fa-eye-slash icon2" id="eye1"></i>
                </div>

                <div id="pass-error">
                    <p>Please insert at least 8 characters<p>
                </div>

                <div class="form-group">
                    <input onkeyup="rptPassCheck()" onclick="startInterval()" id="pwd" type="password" name="passRepeat" class="form-control" placeholder="Repeat Password"><i class="fas fa-redo-alt icon"></i><i onclick="rptShowToggle()" class="fas fa-eye-slash icon2" id="eye1"></i>
                </div>

                <div id="rptPass-error">
                    <p>Please insert at least 8 characters<p>
                </div>

                <button type="submit" name="submit" class="btn btn-send" id="button">Send</button>

            </form>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>

    //js functions for real time form validations
    const PASSFIELD = document.getElementById("pwdfield");
    const SHOW = document.querySelector("#eye1");
    const PASSRR = document.querySelector("#pass-error");

    const RPTPASSFIELD = document.getElementById("pwd");
    const RPTSHOW = document.querySelector("#eye2");
    const RPTPASSRR = document.querySelector("#rptPass-error");

    const BUTTON = document.querySelector("#button");

    let PASSREGEX = ".{8,}";


    function showToggle() {

        if(PASSFIELD.type === "password"){

            PASSFIELD.type = "text";

        }else{

            PASSFIELD.type = "password";

        }

    }

    function rptShowToggle() {

        if(RPTPASSFIELD.type === "password"){

            RPTPASSFIELD.type = "text";

            }else{

                RPTPASSFIELD.type = "password";

        }

    }

    function passCheck() {

        if(PASSFIELD.value.match(PASSREGEX)){

            PASSFIELD.classList.add('correct');
            PASSFIELD.classList.remove('wrong');
            PASSRR.classList.add('correct');
            PASSRR.classList.remove('wrong');

        }else{

            PASSFIELD.classList.add('wrong');
            PASSFIELD.classList.remove('correct');
            PASSRR.classList.add('wrong');
            PASSRR.classList.remove('correct');

        }

    }

    function rptPassCheck() {

        if(RPTPASSFIELD.value == (PASSFIELD.value)){

            RPTPASSFIELD.classList.add('correct');
            RPTPASSFIELD.classList.remove('wrong');
            RPTPASSRR.classList.add('correct');
            RPTPASSRR.classList.remove('wrong');

        }else{

            RPTPASSFIELD.classList.add('wrong');
            RPTPASSFIELD.classList.remove('correct');
            RPTPASSRR.classList.add('wrong');
            RPTPASSRR.classList.remove('correct');

        }

    }

    function startInterval () {

        let timer = setInterval(buttonLocker, 500);

    }

    function buttonLocker() {

        if((PASSFIELD.value.match(PASSREGEX)) && RPTPASSFIELD.value == (PASSFIELD.value) ) {

            BUTTON.disabled = false;
            clearInterval(timer);

        }else{

            BUTTON.disabled = true;

        }

    }

    function noCode() {

        Swal.fire({
            icon: 'error',
            title: 'No email found in database',
            text: '😱 Your email is not registered! 😱',
        })

    }

    function success() {

        Swal.fire({
            icon: 'success',
            title: 'GoodJob!',
            text: 'Your password has been updated',
            footer: 'Try&nbsp<a href="./login">Log-In</a>&nbspnow ?'
        })

    }

    </script>

<?php
include_once '../../db-con.php';
session_start();

if($_SERVER["HTTP_HOST"] == "localhost") {

    $redirect = "http://" . $_SERVER["HTTP_HOST"] . "/TCD2020-resume";

}else{

    $redirect = "http://" . $_SERVER["HTTP_HOST"] ;

}

//strip_tags 
function cleanTags($value){

    $value = strip_tags($value);

    return $value;

}

    if(isset($_POST['submit'])){

        $password = cleanTags($_POST['pass']);
        $repeatpass = cleanTags($_POST['passRepeat']);
        $match = strcmp($password, $repeatpass);

            if($match == 0){

                $vkey = $_GET['key'];
                $sql = "SELECT email FROM companyrstpwd WHERE vkey='$vkey';";
                $query = mysqli_query($connect, $sql);
                $queryrow = mysqli_num_rows($query);

                    if($queryrow == 0){

                        echo '<script type="text/javascript">noCode();</script>';
                        exit();

                    }else{

                        $garam = "t5)%@PH--6Eh%ZRC7HEgk+K,*<,nB73YeDJC`ZL!Ru%vQ#U]c<Fp::5bs:4<37N>+t73(:MpynRv3Ps8bm";
                        $encpass = $garam.(md5($password));

                        $row = mysqli_fetch_array($query);
                        $email = $row['email'];

                        $sqlupdate = "UPDATE company_acc SET password ='$encpass' WHERE email='$email';";
                        $updatequery = mysqli_query($connect, $sqlupdate);

                            if($updatequery){

                                $sqlDlt = "DELETE FROM companyrstpwd WHERE vkey = '$vkey';";
                                mysqli_query($connect, $sqlDlt);
                                echo '<script type="text/javascript">success();</script>';
                                exit();

                            }else{

                                echo "Password update failed, Please try again";
                                exit();

                            }   
                    }
            }else{

                echo "Repeat password is not identical to the password u typed earlier!";

            }
}

?>

</body>
</html>