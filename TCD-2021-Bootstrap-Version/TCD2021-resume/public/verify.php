<?
    include "../db-con.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Verification | Tech Career Days 2021</title>
    
    <link rel="icon" type="image/png" href= "../img/favicon_io/favicon.ico">

</head>
<body>
    


<?php
    if(isset($_GET['vkey'])){
        //process verification
        $vkey = $_GET["vkey"];

        //$mysqli = NEW MySQLi ("3.0.146.123", "rooting", "kHBq2gIsXxoPxTSc", "TCD-resume");

        $resultSet = $mysqli->query("SELECT verified, vkey FROM acc WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");

        if($resultSet->num_rows == 1){
            //validate email
            $update = $mysqli->query("UPDATE acc SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");
            
            if($update){
                echo ("Your account has been verified. You may login.<br>You will be redirected to login page in 5 seconds");
                echo '<script>
                //Using setTimeout to execute a function after 5 seconds.
                setTimeout(function () {
                //Redirect with JavaScript
                window.location.href= "https://resume.techcareerdays.com/login";
                }, 5000);
                </script>';
            }else{
                echo $mysqli->error;
            }
        }else{
            echo ("This account is invalid or already has been verified.");
        }
    }else{
        die("Something went wrong. <br>Err_msg: Verifying key error. <br><br>Kindly reach out to its.tcd.system@gmail.com for assistance.");
    }


?>
</body>
</html>