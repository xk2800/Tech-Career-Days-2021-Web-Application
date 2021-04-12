<?php
session_start();
include("../db-con.php");
//ob_start();

//EMAIL REG VERIFICATION//

$fullUrl ="http:// $_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


if(isset($_REQUEST["email"])){
    $email = $_REQUEST["email"];
    //echo $name;
    $result = mysqli_query($connect, "SELECT * from resume WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    //echo $row ["name"];
}
if(!isset($_SESSION['username'])){
    header("Location:index");
}

$body = $_REQUEST["body"];

    mysqli_query($connect, "UPDATE resume SET vetting=2 where email='$email'");


//include ('../db-con.php');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 1;                 
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                      // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'its.tcd.system@gmail.com';               // SMTP username
        $mail->Password   = 'bsoxiqrulynnqugg';                      // SMTP password
        $mail->SMTPSecure = "tls";                                   // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->Sender=('its.tcd.system@gmail.com');
        $mail->setFrom('its.tcd.system@gmail.com', 'Tech Career Days Resume', FALSE);
        $mail->addAddress($email);     // Add a recipient
        $mail->addReplyTo('its.tcd.system@gmail.com', 'No Reply (Tech Career Days)');
        $mail->addBCC('its.tcd.marketing@gmail.com');

        //$url = "http://" .$_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/verify.php?vkey=$vkey";

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "[Tech Career Days] Unfortunately, your resume has been rejected. Here's why...";
        $mail->Body    = "Hey there,<br><br>  Thank you for your resume submission for Tech Career Days. <br>However, we regret to inform you that your resume has been rejected due to the following reasons:<br><br>".$body."<br><br>Kindly refer to our resume guideline at <a href='https://resume.techcareerdays.com/'>our website</a>, we hope you can make the modifications according to suggestions given.<br><br>Thank you and all the best in your job hunting!<br>Tech Career Days 2021, presented by IT Society";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        ?><a href="dashboard"><button type="submit">Back To Dashboard</button></a> <?php
        echo '<script>document.getElementById("error").innerHTML = "Verification email has been sent.<br><br>"</script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    exit();


?>











