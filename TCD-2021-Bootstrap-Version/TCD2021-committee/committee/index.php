<?php 
    session_start();
    include("../db-con.php");
    ob_start();

?>

<!DOCTYPE html>
<html>
<head>
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
    

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<script>

    function forget(){
        alert('Contact your system admin.');
    }

</script>

<style>
        body{
            background-color: #15243C;
            /*text-align: center;*/
        }
        .animate{
            background-color: #15243C;
            border-radius: 30px;
            color: white;
            text-align: center;
            /*margin-top: 10%;*/
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
</style>

</head>
<body>
    

    <div class="container white">

        <form class="modal-content animate" method="post" name="login">
            <div class="imgcontainer">
                <img src="../img/logo/LOGO standard.png" class="avatar">
            </div>

            <div class="container">
                <span id="error"></span>
                <span class="message"><h2>Sign in to event coordinator panel</h2></span>
                <span class="message"><h6>This is strictly for event coordination purpose.</h6></span>
                <br>
                <span class="title">Username:</span><span class="email"><br><input type="text" placeholder="Enter username" name="username" id="username"></span>
                <br><br>
                <span class="title">Password:</span><span class="password"><br><input type="password" placeholder="Enter Password" name="password" id="pwd" ></span>
                <br>
                <!--SHOW/HIDE PWD-->
                <input type="checkbox" onclick="toggle()">Show Password
                <br>
                <!--label><input type="checkbox" checked="checked" name="remember" class="remember"> Remember me</label-->
                <br>
                <button type="submit" name="submitbtn" class="btn btn-light btn-md rounded-pill submitbtn">Login</button>
            </div>

            <div class="container">
                <br>
                <a class="forgot-pwd" href="" onclick="forget();" id="forget">Forgot password?</a>
                <span class="forget"></span>
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

/**
 *  !!! IF INPUT EMPTY  !!!
 */
$fullUrl ="https:// $_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if(strpos($fullUrl, "login=empty") == true){
        echo '<script>document.getElementById("error").innerHTML = "You did not fill in all fields<br><br>"</script>';
        
        /*("<p class="msg">You did not fill in all fields</p>")*/; //add css for color
    }
    if(strpos($fullUrl, "invalid+credentials") == true){
      //echo '<script>document.getElementById("error").innerHTML = "Wrong Credentials<br><br>"</script>';
        echo '<script>alert("Wrong Credentials")</script>';
        
      /*("<p class="msg">You did not fill in all fields</p>")*/; //add css for color
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
if(isset($_POST['submitbtn']))
{
    $username =  mysqli_real_escape_string($connect, clean($_POST['username']));
    $pwd = mysqli_real_escape_string($connect, clear($_POST['password']));
    //$pword = md5($pword);

    $pwdd = md5($pwd);

    //salty
    $salty = "P3js\;EE.W-N/EUFGsz@-k!k]#q9K{K8CZpAv!G.#uJ76vH=a}";

    //salty pwd
    $saltypwd = $salty.$pwdd;

    //$connect->prepare

    $result=mysqli_query($connect, "SELECT * from vetting_acc WHERE username = '$username' AND password = '$saltypwd' ");
    
    /*$result="SELECT * from vetting_acc WHERE username = '$username' AND password = '$saltypwd' ";
    $stmt=$connect->prepare($result);*/


    /*$result->bind_param("ss", $username, $saltypwd);
    $result->execute();
    $result->close()*/
    
    if(empty($username) || empty($pwd)){
        header('location: index?login=empty');
        exit();
    }
    else{

        if(mysqli_num_rows($result)>0){
        
            $_SESSION['username'] = $username;

            header("location: dashboard");   //!! CHANGE HERE WHEN ADMIN LANDING PAGE DONE
    
        }else{
        header('location: index?invalid+credentials');
        }
    }

}


?>