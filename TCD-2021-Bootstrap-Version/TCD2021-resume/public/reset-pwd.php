<html>
<head>

    <title>Request For Account Password Reset | Tech Career Days 2021</title>
    
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <!-- Favicon -->
    <link rel="icon" type="image/favicon" href="../img/favicon_io/favicon.ico">

    <!-- CSS for all sections in this page -->
    <link rel="stylesheet" href="../css/font.css">
    
    <!-- CSS for all sections in this page -->
    <link rel="stylesheet" href="../css/resetemailpage.css">

    <script>
        $(document).ready(function() {
  $(".btn-send").click(function() {
    $(this).toggleClass('btn-success');
  });
});
    </script>
</head>
<body>

    <div class="container">
        <br><br><br>
        <img src="../img/logo/LOGO standard.png" alt="Tech Career Days 2021 Logo">
        <br><br>
        <h1>Request For Account Password Reset</h1>
        <br>
        <div id="error" style="color: yellow;"></div>
    </div>

<?php

include ('db-con.php');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

    $fullUrl ="http:// $_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if(strpos($fullUrl, "email=nonexist") == true){
        //echo '<script>document.getElementById("error").innerHTML = "<br><br>"</script>';
        echo '<div class="container">
                <div class="alert alert-warning words" role="alert">
                Opps! Look like this email does not exist in system. Try to register <a href="register">here</a>
                </div>
            </div>';
    }

if(isset($_POST["submit"])){

    $emailTo = $_POST["email"];
    //$ip      = $ip_add;

    $check_dup_email = "SELECT * FROM acc WHERE email = '$emailTo'"; 
    $res = mysqli_query($connect, $check_dup_email);

    if(mysqli_num_rows($res) == 0){
        
        header('location: reset-pwd?email=nonexist');
        die();


    }else{
        
        $check_reset = "SELECT * FROM resetpwduser WHERE email = '$emailTo'"; 
        $check = mysqli_query($connect, $check_reset);
        
        if(mysqli_num_rows($check) > 0){

            header('location: reset-pwd?email=nonexist');
            die();
        
        } else{
            
            $code = uniqid(true);
            $query = mysqli_query($connect, "INSERT INTO resetpwduser(email, code) VALUES('$emailTo', '$code')");
            if (!$query) {
                echo ("Error! Err_msg: query var unable to read.");
                die();
            }
        
        
            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);
        
            try {
                //Server settings
                $mail->SMTPDebug = 0;         //change to 0 for no debug message, 1 for debug message     
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                      // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'its.tcd.system@gmail.com';                     // SMTP username
                $mail->Password   = 'bsoxiqrulynnqugg';                              // SMTP password
                $mail->SMTPSecure = "tls";         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
                //Recipients
                $mail->Sender=('its.tcd.system@gmail.com');
                $mail->setFrom('Tech.Career.Days.2021@gmail.com', 'Tech Career Days System', FALSE);
                $mail->addAddress($emailTo);     // Add a recipient
                //$mail->addReplyTo('its.tcd.system@gmail.com', 'TCD');
        
                $url = "https://" .$_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword?code=$code";
        
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Reset Password Link';
                $mail->Body    = "<h1>You have requsted a password reset.</h1>
                                    <p>Click <a href='$url'>here</a> to reset your password.</p>
                                    <p></p><p>If you can't click the link then try here $url</p>";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        
            die();
        }
    }


    
}
?>

<!--div>
            <h2>Reset password</h2>

            <p>An e-mail will be sent to you with instructions on how to reset your password.</p>
            <form method="post">
                <input type="text" name="email" placeholder="Enter your email">
                <button type="submit" name="submit">Get new password by email</button>

            </form>

        </div-->

    <div class="container">
        <div id="error" style="color: #39FF14;"></div>
            <form method="post">
                <!--h2>Reset password</h2-->
                <p id="info">An e-mail will be sent to you with instructions on how to reset your password.</p>
                <input type="text" name="email" placeholder="Enter your email">
                <button type="submit" name="submit">Get new password by email</button>

            </form>
    </div>

    <!-- Bootstrap CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>










