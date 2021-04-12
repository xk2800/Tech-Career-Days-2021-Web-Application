<?php 
    session_start();
    include("db-con.php");
    //ob_start();
    $_SESSION['email'];
    
    if(!isset($_SESSION['email'])){
        header("Location:login");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KHBFLD56B2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-KHBFLD56B2');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Resume | Tech Career Days 2021</title>

    <link rel="icon" type="image/png" href= "../img/favicon_io/favicon.ico">

    <!-- CSS for all sections in this page -->
    <link rel="stylesheet" href="../css/font.css">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

<style>
    body, html{
        overflow-x: hidden;
    }
    .title{
        font-family: 'Bebas Neue', cursive;
        font-size: 2.5em;
    }
    .words{
        font-family: 'Arvo', serif;
    }
    .info{
        font-size: 14px;
    }

    .red{
        background-color: #ffcccb;
        color: #5B0A13;
    }

    .blue{
        background-color: #D9EDF7;
        color: #31708F;
    }

    .size, .rad-title, .p_num{
        font-weight: bold;
    }
    .add-newbtn{
        border: 2px solid #adadad;
        color: black;
        background-color: #adadad;
    }

    .add-newbtn:hover, .add-backbtn:hover{
        border: 2px solid #4368a3;
        color: white;
        background-color: #15243C;
    }

    .add-backbtn{
        border: 2px solid #343A40;
        color: white;
        background-color: #343A40;
    }
    .note{
        font-weight: bold;
    }
    #blue-box{
        margin-top: -160px;
    }
    #red-box{
        margin-right: 15px;
    }
    @media only screen and (max-width: 600px){
        #blue-box{
            margin: 10px 15px 10px 0;
        }
        #red-box{
            margin: 15px 0 0 0;
        }
        #phone-num{
            margin-right: 160px;
        }
    }
</style>

</head>
<body>

<?php
    include "nav.html";


    $email = $_SESSION["email"];

    //take from acc table = $row
    $result = mysqli_query($connect, "SELECT * from resume WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);

    //take from resume table = $rows
    $results = mysqli_query($connect, "SELECT * from acc WHERE email = '$email'");
    $rows = mysqli_fetch_assoc($results);

?>
    <div class="container">
        <br>
        <h4 class="title">@ <span class="name"><?php echo $_SESSION['email']?></span></h4>
        <h2 class="title">Upload resume</h2>

<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$time = time();
$actual_time = date('Y-m-d H:i:s', $time); //date_format($time,"Y/m/d H:i:s");
$db_date = date('Y-m-d', $time); //date_format($time,"Y/m/d H:i:s");

echo 'The current time is '.$actual_time;

function clean($value){

    $value =trim($value);
    $value =stripslashes($value);
    $value =strip_tags($value);

    return $value;
}

define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);
// Then you can simply do your condition like
ini_set('upload_max_filesize', 5*MB);


if(isset($_POST["uploadbtn"])){

    $job        = $_POST["job"];
    $p_number   = clean($_POST["p_number"]);
    $time       = $actual_time;
    $db_info    = $db_date;

    $bringemail=$_SESSION['email'];

    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  

    $query = "UPDATE resume SET phone_number='$p_number' , last_edit_by='user' , vetting='1' , file='$file' , job_type='$job', last_edit_time='$time', db_time='$db_info' WHERE email='$bringemail'";

    $allowed_image_extension = array(
        "pdf"
    );
    if (($_FILES["image"]["size"] > 1000000)) { //if error, file more than 1MB
        echo '<div class="container style=background-color: ;">
                <div class="alert alert-danger words" role="alert">
                    Opps, looks like your file is more than 1MB, make sure your file is 1MB or less to submit.
                </div>
            </div>';
        ?> <a href="upload-new"><button class="btn btn-light btn-md rounded-pill add-backbtn">Retry</button></a> <?php
            die();
    } else{
    
        if(mysqli_query($connect, $query)){ //if success, file less than 1MB
            echo '<div class="container style=background-color: ;">
                    <div class="alert alert-success words" role="alert">
                        Your Resume has successfully been uploaded into our system. 
                    </div>
                </div>';
            include('success_new_resume.php');
            die();
        }else{ //if some other error in system
            echo '<div class="container style=background-color: ;">
                    <div class="alert alert-danger words" role="alert">
                        Sorry, your Resume was unsuccessfully failed to be uploaded into our system. Chat with us to find out why.
                    </div>
                </div>';
            include('failed_new_resume.php'); //email sent to tcd system gmail for tracking and loggin purpose
            die();
        }
    }
}

?>
            <form method="POST" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">
                                    <div class="card">
                                        <div class="card-body alert-info note">
                                            *Note: Resume submitted is subject to approval. Please refer to the guidelines beside for faster approval. Thank you.
                                        </div>
                                    </div>
                                    <span class="job-type"></span><span class="job words"><br>
                                        <span class="rad-title">I am looking for</span><br>
                                        <span class="rad"><input type="radio" class="full-time" value="Full time" name="job" required > Full time</span><br>
                                        <span class="rad"><input type="radio" class="internship" value="Internship" name="job"> Internship</span><br>
                                        <span class="rad"><input type="radio" class="Freelance" value="Freelance" name="job"> Freelance</span><br>
                                    </span>
                                    <br>
                                    <span class="p_num words">Phone Number:</span>
                                        <div class="input-group mb-3" style="width: 500px;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">+</span>
                                        </div>
                                            <input type="number" class="form-control p_number words" id="phone-num" placeholder="601234567890" inputmode="tel" maxlength="15" value="<?php echo $row['phone_number']?>" name="p_number">
                                        </div>
                                    <br>
                                    <span class="size words">Resume in .pdf format &lt;1MB size</span><br>
                                    <input type="file" name="image" id="image" accept="application/pdf" class="words" required/>

                                    <br><br>
                                    <button type="submit" name="uploadbtn" class="btn btn-light btn-md rounded-pill add-newbtn words">
                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-up-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/>
                                        </svg>    
                                        Upload Information
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="card red" id="red-box">
                            <div class="card-body">
                                <h5 class="card-title words">
                                    <svg width="1.0625em" height="1em" viewBox="0 0 17 16" class="bi bi-exclamation-triangle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.938 2.016a.146.146 0 0 0-.054.057L1.027 13.74a.176.176 0 0 0-.002.183c.016.03.037.05.054.06.015.01.034.017.066.017h13.713a.12.12 0 0 0 .066-.017.163.163 0 0 0 .055-.06.176.176 0 0 0-.003-.183L8.12 2.073a.146.146 0 0 0-.054-.057A.13.13 0 0 0 8.002 2a.13.13 0 0 0-.064.016zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                                    </svg>
                                    Do Not Put
                                </h5>
                                <p class="card-text info words">
                                    <ul style="font-size: 14px;">
                                        <li>Photo</li>
                                        <li>Home address</li>
                                        <li>Gender, religion, marital status, ethnicity, NRIC/passport number, age</li>
                                        <li>Education history before diploma/degree</li>
                                        <li>Irrelevant past job experiences</li>
                                        <li>IDEs, text editors, and Microsoft Office as skill sets</li>
                                        <li>Programming languages you cannot code in</li>
                                        <li>Personal interests and hobbies</li>
                                        <li>Boilerplate summary and objectives</li>
                                        <li>Expected salary</li>
                                    </ul>
                                    <hr>
                                    Read more on <a href="https://resume.techcareerdays.com/">homepage</a> before you upload.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-sm-6 float-right" id="blue-box">
                    <div class="card alert-primary">
                        <div class="card-body">
                            <h5 class="card-title words"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-patch-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.273 2.513l-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
                                <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                </svg>
                                Not getting full-time jobs and internship?
                            </h5>
                            <p class="card-text info">For students that are not looking for full-time and internship positions, you may pick the freelance option. You can upload portfolio in lieu of resume and will not be subjected to the rules we stipulated.</p>
                        </div>
                    </div>
                </div>
            </form>
        <br><br>
        <a href="resume"><button type="submit" class="btn btn-light btn-md rounded-pill add-backbtn">
            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            Back to Dashboard
        </button></a>
    </div>
    <br><br><br>




    <!-- Bootstrap CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
</body>
</html>

