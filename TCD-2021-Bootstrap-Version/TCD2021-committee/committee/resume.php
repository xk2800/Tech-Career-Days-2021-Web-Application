<?php 
    session_start();
    include("../db-con.php");
    ob_start();

    if(!isset($_SESSION['username'])){
        header("Location:index");
    }

    if(isset($_REQUEST["email"])){
        $name = $_REQUEST["email"];

        $result = mysqli_query($connect, "SELECT * from resume WHERE email = '$name'");
        $row = mysqli_fetch_assoc($result);
        //echo $row ["name"];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name?>'s Resume | Tech Career Days 2021</title>

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

$time = time();
?> <br> <?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$time = time();
$actual_time = date('Y-m-d H:i:s', $time); //date_format($time,"Y/m/d H:i:s");
echo 'The current time is '.$actual_time;

    include ("button.html");
?>
    <div class="container">
        <form method="post">
        <p>Full Name<br><input type="text" name="name" disabled value="<?php echo $row ["name"]?>"/></p>

        <p>Email<br><input type="text" name="email" disabled value="<?php echo $row["email"]?>"/></p>

        <p>Job Type<br><input type="text" name="staff_id" disabled value="<?php echo $row ["job_type"];?>"/></p>

        <p>Vetting/Resume Status<br><input type="text" disabled name="email"
        value="<?php 
            if($row['vetting'] == "0"){
                echo "No submission";
            }
            else if($row['vetting'] == "1"){
                echo "Pending";
            }else if($row['vetting'] == "2"){
                echo "Reject";
            } else if($row['vetting'] == "3"){
                echo "Approved";
            }else if($row['vetting'] == "20"){
                echo "Reject Without Email Send";
            }
        ?>"/></p>

        <p>Last edited by<br><input type="text" name="staff_id" disabled value="<?php echo $row ["last_edit_by"];?>"/></p>
        <?php

        $db = "SELECT file FROM resume";
        $check = mysqli_query($connect, $db);
        $outcome = mysqli_fetch_array($check);
        //$content = $outcome['pdf'];

        
        ?><span class="resume">Resume:<br></span><?php
        if(base64_encode($row['file'])){
            ?><object data="data:application/pdf;base64,<?php echo base64_encode($row['file']) ?>" type="application/pdf" style="height:400px;width:60%"></object><?php
        }else{
            ?><span class="empty">User did not submit any resume.</span><?php
        }

        ?>
        <p>Update Vetting Status<br><select type="text" name="update" id="update" required></p>
                                <option style='display:none;'>Update Vetting Status</option>
                                <option value="20">Reject</option>
                                <option value="3">Approve</option>
                                </select>
        <br><br>
        <button type="submit" name="submitbtn">Submit Update</button>
        <!--a href="dashboard.php"--><button type="submit" name="cancelbtn">Cancel</button><!--/a-->

        </form>
    </div>

    <!-- Bootstrap CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>

<?php

    if(isset($_POST["cancelbtn"])){

        $_SESSION['email'] = $_POST['mail'];
        header("location: dashboard");
    }

    if(isset($_POST["submitbtn"])){
        $name   = $_REQUEST["email"];
        $status = $_POST["update"];
        $verify = $_SESSION['username'];
        $email  = $row["email"];
        $time   = $actual_time;

        if($status=="20"){
            header("location: reject_email?email=".$email);
        } else if($status=="3"){
            header("location: approve_email_send?email=".$email);
        }

        mysqli_query($connect, "UPDATE resume SET vetting='$status', last_edit_by='$verify', last_edit_time='$time' where email='$name'");
        //header("location: dashboard");
    }


?>