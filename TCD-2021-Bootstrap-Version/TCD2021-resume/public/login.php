<?php 
    include("../db-con.php");
    ob_start();

?>

<!DOCTYPE html>
<html>
<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KHBFLD56B2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-KHBFLD56B2');
    </script>
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <meta name="viewpoint" content="width=device-width">

    
    <link rel="stylesheet" href="../css/login.css">
    <script type="text/Javascript" src="../js/show-pwd.js"></script>

    <title>Login | Tech Career Days 2021</title>

    <link rel="icon" type="image/png" href= "../img/favicon_io/favicon.ico">

    <!-- CSS for all sections in this page -->
    <link rel="stylesheet" href="../css/login.css">

    <!-- CSS for all sections in this page -->
    <link rel="stylesheet" href="../css/font.css">

    <!-- CSS for all sections in this page -->
    <link rel="stylesheet" href="../css/parallax-login.css">
    
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<script>
    function sanitizeInputs() {
                var str = $("#email").val();
                str = str.replace(/[^a-zA-Z 0-9!#$%&'*+-/=?^_`{|}~@]/gim, "");
                str = str.trim();
                $("#email").val(str);

            }
</script>

<style>
        body{
            background-color: #15243C;
        }
        .animate{
            background-color: #15243C;
            border-radius: 30px;
            color: white;
            text-align: center;
        }
        .imgcontainer img{
            margin-top: 30px;
            margin-bottom: 15px;
            width: 150px;
        }
        img{
            text-align: center;
        }
        .white{
            position: relative; 
            z-index:2;
            top: 0%;
            bottom: 0%;
            left: 0%;
            right: 0%;
            width: 40%;
            height: 100%;
            background-color: white;
            border-radius: 30px;
            color: black;
            font-family: 'Arvo', serif;
            margin-top: 40px;
            padding-top: 20px;
            padding-bottom: 20px;
            padding-left: 20px;
            padding-right: 20px;
        }
        .title{
            text-align: left;
        }
        .message{
            font-family: 'Bebas Neue', cursive;
        }
        .submitbtn, .remember{
            margin-top: 15px;
        }
        .cancelbtn:hover{
            border-color: #4368a3;
            border-radius: 5px;
            color:#4368a3;
            background-color: #15243C;
            font-weight: bold;
        }
        .cancelbtn, .cancelbtn:link{
            color: black;
            text-decoration: none;
            margin: 0px 10px;
            margin-top: 15.1px;
        }
        .forgot-pwd:link{
            color: white;
            text-decoration: underline;
        }
        .forgot-pwd:hover{
            color: yellow;
            text-decoration: underline;
        }
        
        .submitbtn:hover{
            border-color: #4368a3;
            border-radius: 5px;
            color:#4368a3;
            background-color: #15243C;
            font-weight: bold;
        }
        /*.email-error{
            color: white;
            position: absolute ; 
            z-index:2;
            text-align: center;
            padding-left: 400px;
        }*/
</style>

</head>
<body>
    

    <div class="parallax">
                <img src="../img/parallax/1.png">
                <img src="../img/parallax/2.png">
                <!--img src="https://returnpath.com/assets/images/backgrounds/background-confetti-md-arcade.svg;">
                <img src="https://returnpath.com/assets/images/backgrounds/background-confetti-sm-arcade.svg;">
                <img src="https://returnpath.com/assets/images/backgrounds/background-confetti-xs-arcade.svg">
    --></div>
    <div class="container white">

        <form class="modal-content animate" method="post" name="login">
            <div class="imgcontainer">
                <img src="../img/logo/LOGO standard.png" class="avatar">
            </div>

            <div class="container">
<?php

                    /**
                     *  !!! IF INPUT EMPTY  !!!
                     */
                    $fullUrl ="https:// $_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                        if(strpos($fullUrl, "login=empty") == true){
                            //echo '<script>document.getElementById("error").innerHTML = "You did not fill in all fields</span><br><br>"</script>';
                            echo "<div class='container'>
                                    <div class='alert alert-danger words' role='alert'>
                                        Hmm, looks like you did't fill in all fields. Lets try that again.
                                    </div>
                                </div>";
                        }
                        if(strpos($fullUrl, "credentials=invalid") == true){
                            //echo '<script>document.getElementById("error").innerHTML = "<br><br>"</script>';
                            echo '<div class="container style=background-color: ;">
                                    <div class="alert alert-danger words" role="alert">
                                        Opps, looks like you might had entered the wrong credentials. Lets try that again.
                                    </div>
                                </div>';
                        }

                        function clean($value){

                            $value =trim($value);
                            $value =stripslashes($value);
                            $value =strip_tags($value);

                        return $value;
                        }

                        function clear($value){

                            $value =strip_tags($value);

                        return $value;
                        }

?>
                <span class="message"><h2>Sign in to continue</h2></span>
                <br>
                <span class="title">Email:</span><span class="email"><br><input type="text" inputmode="email" placeholder="Enter email" name="email" id="email" onChange="sanitizeInputs()"></span>
                <br><br>
                <span class="title">Password:</span><span class="password"><br><input type="password" placeholder="Enter Password" name="password" id="pwd" ></span>
                <br>
                <!--SHOW/HIDE PWD-->
                <input type="checkbox" onclick="toggle()">Show Password
                <br>
                <!--label><input type="checkbox" checked="checked" name="remember" class="remember"> Remember me</label-->
                <br>
                <button type="submit" name="submitbtn" class="btn btn-light btn-md rounded-pill submitbtn">Login</button>
                <a href="https://resume.techcareerdays.com/" class="btn btn-light btn-md rounded-pill cancelbtn">Cancel</a>
            </div>

            <div class="container">
                <br>
                <div class="account">
                    New here? <a href="https://resume.techcareerdays.com/register">Register for an account now!</a><br><br>
                </div>
                <a class="forgot-pwd" href="reset-pwd">Forgot password?</a>
                <br><br>
            </div>
        </form>
    </div>

    <!-- Bootstrap CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
</body>
</html>

<?php

if(isset($_POST['submitbtn']))
{
    $email =  clean($_POST['email']);
    $pwd = clear($_POST['password']);

    $pwdd = md5($pwd);

    //salty
    $salty = "t5)%@PH--6Eh%ZRC7HEgk+K,*<,nB73YeDJC`ZL!Ru%vQ#U]c<Fp::5bs:4<37N>+t73(:MpynRv3Ps8bm";

    //salty pwd
    $saltypwd = $salty.$pwdd;



    $result=mysqli_query($connect, "SELECT * from acc WHERE email = '$email' AND password = '$saltypwd' LIMIT 1");
    
    if(empty($email) || empty($pwd)){
        header('location: login?login=empty');
        exit();
    }
    else{
        if($result->num_rows != 0 ){
            $row = $result->fetch_assoc();
            $verified = $row["verified"];
            $email = $row["email"];
            $date = $row["createdate"];

            if($verified == 1){
            //continue processing
                echo '<script>("Your account is verified")</script>'; //not needed if unwanted
                session_start();
                $_SESSION['email'] = $email;
                header('location:resume');
            } else if ($verified == 0){
                ?><br>
                <p><?php echo '<div class="container">
                                    <div class="alert alert-warning words" role="alert">
                                    This account is yet to be verified. An email was sent to '.$email.' on ' .$date.'. 
                                    </div>
                                </div>';
                ?></p>
<?php
            }
        
        }else{
            header('location: login?credentials=invalid');
        }
    }

}


?>