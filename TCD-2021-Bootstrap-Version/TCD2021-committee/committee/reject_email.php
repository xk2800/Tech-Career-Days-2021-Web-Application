<?php 
    session_start();
    include("../db-con.php");
    ob_start();
    
    if(!isset($_SESSION['username'])){
        header("Location:index.");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reject Resume Email Body | Tech Career Days 2021</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
</head>
<body>

<?php
$fullUrl ="http:// $_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$url = $fullUrl;
$parts = parse_url($url);
$output = [];
parse_str($parts['query'], $name);
echo $name['email'];

$mail  = $_SESSION['email'];

if(isset($_REQUEST["email"])){
    $name = $_REQUEST["email"];
    
    $result = mysqli_query($connect, "SELECT * from resume WHERE email = '$name'");
    $row = mysqli_fetch_assoc($result);

}

?>
    <div class="container">
        <form method="POST">
            <span class="mail"><p>Email:<br><input type="text" name="email" id="email" disabled value="<?php echo $name;?>"></span></p>
            <span class="content"><p>Email Body:<br><textarea name="body" id="body" style="width: 600px; height: 500px;"></textarea></span></p>
            
            <button type="submit" name="sendbtn" value="2">Send Email</button><!--/a-->
            <button type="submit" name="cancelbtn">Cancel</button>

        </form>
        <br><br><br>
        <?php

        $db = "SELECT file FROM resume";
        $check = mysqli_query($connect, $db);
        $outcome = mysqli_fetch_array($check);

        ?>
        <span class="resume">Resume:<br></span><?php
        if(base64_encode($row['file'])){
            ?><object data="data:application/pdf;base64,<?php echo base64_encode($row['file']) ?>" type="application/pdf" style="height:400px;width:60%"></object><?php
        }else{
            ?><span class="empty">User did not submit any resume.</span><?php
        }

        ?>

    <!-- Bootstrap CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>

<?php

    if(isset($_POST["sendbtn"])){
        $email= $name;
        $body=$_POST["body"];
        $status = $_POST["sendbtn"];

        if($status=="2"){
            header("location: reject_email_send?email=".$email." & body=".$body);
        }
    }
        
    if(isset($_POST["cancelbtn"])){
        header("location: dashboard");
    }


?>