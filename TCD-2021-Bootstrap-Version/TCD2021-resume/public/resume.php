<?php 
    session_start();
    include("db-con.php");
    ob_start();
    $_SESSION['email'];

    if(!isset($_SESSION['email'])){
        header("Location:login");
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Dashboard | Tech Career Days 2021</title>

    <link rel="icon" type="image/png" href= "../img/favicon_io/favicon.ico">

    <!-- CSS for all sections in this page -->
    <link rel="stylesheet" href="../css/font.css">
    
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

<style>
    .title{
        font-family: 'Bebas Neue', cursive;
        font-size: 2.5em;
    }

    .words{
        font-family: 'Arvo', serif;
    }

    .add-newbtn{
            border: 2px solid grey;
            color: white;
            background-color: #adadad;
    }

    .add-newbtn:hover{
            border: 2px solid #4368a3;
            color: white;
            background-color: #15243C;
    }
    #discord{
        width: 300px;
        height: 300px;
    }
    @media only screen and (max-width: 600px){
        #upload-box{
            margin: 0 0 80px 0;
        }

        #event-box{
            margin: -50px 0 80px 0;
        }
        #discord{
            width: 270px;
        }
    }
    @media only screen and (max-width: 1199){

        #discord{
            width: 30px;
        }
    }

    @media only screen and (max-width: 992){

        #discord{
            width: 30px;
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
    <br><br><br>
    <h4 class="title">Welcome to your Resume Dashboard, <span class="name"><?php echo $_SESSION['email']?></span></h4>
    <h2 class="title">Prepare For Tech Career Days 2021</h2>

        <br><br>
        <form method="GET">
            <div class="row">
                <div class="col-sm-4" id="upload-box">
                    <div class="card whole">
                        <h5 class="card-header head words">Upload Resume Here</h5>
                        <div class="card-body">
                            <h5 class="card-title words">
                                <?php 
                                if($row['vetting'] == "0"){
                                    echo "Status: No submission";
                                }
                                else if($row['vetting'] == "1"){
                                    echo "Status: Pending Review";
                                ?>
                                    <style>
                                    .whole, .head{
                                        border: 2.5px solid #FFFFAD;
                                    }
                                    .head{
                                        background-color: #FFFFAD;
                                        color: black;
                                    }
                                </style>
                                <?php
                                }else if($row['vetting'] == "2"){
                                    echo "Status: Rejected";
                                    ?>
                                    <style>
                                    .whole, .head{
                                        border: 2.5px solid #ffcccb;
                                    }
                                    .head{
                                        background-color: #ffcccb;
                                        color: red;
                                    }
                                </style>
                                <?php
                                } else if($row['vetting'] == "3"){
                                    echo "Status: Approved";
                                    ?> 
                                    <style>
                                        .whole, .head{
                                            border: 2.5px solid #DFF0D8;
                                        }
                                        .head{
                                            background-color: #DFF0D8;
                                            color: green;
                                        }
                                    </style>
                                <?php
                                } 
                                else if($row['vetting'] == "20"){
                                    echo "Status: Rejected, Pending Email";
                                    ?> 
                                    <style>
                                    .whole, .head{
                                        border: 2.5px solid #ffcccb;
                                    }
                                    .head{
                                        background-color: #ffcccb;
                                        color: red;
                                    }
                                </style>
                                <?php
                                }
                                ?>
                            </h5>
                            <p class="card-text words"><?php 
                                if($row['vetting'] == "0"){
                                    echo "There is no submission recorded in our system.";
                                }
                                else if($row['vetting'] == "1"){
                                    echo "The volunteers are currently checking through your resume.";
                                }else if($row['vetting'] == "2"){
                                    echo "Unfortunately your resume has been rejected. Kindly check your email to find out the reason.";
                                } else if($row['vetting'] == "3"){
                                    echo "Your resume looks good! It's now made available for the recruiters' perusal.";
                                }else if($row['vetting'] == "20"){
                                    echo "Unfortunately your resume has been rejected. An email will be sent to you shortly.";
                                }
                                ?>
                                </p>
                            <a href="upload-new" class="btn btn-light btn-md rounded-pill add-newbtn words">Upload New Resume</a>
                            <br>
                            <a href="view-resume" target="_blank" class="words">View Resume</a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-4" id="event-box">
                    <div class="card">
                        <h5 class="card-header">Event Platform Links</h5>
                        <div class="card-body">
                            <span class="card-text">
                                <p><iframe src="https://discord.com/widget?id=782474641147035660&theme=dark" id="discord" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe></p>
                                    Connect button not working? <a href="https://discord.gg/RmFeDgbk6K" target="_blank">Join here!</a>
                                    <!--p>Event platforms will open starting 30th December 2020, check back by then for more updates.</p-->
                            </span>
                        </div>
                    </div>
                </div>
                <br><br>
            </div>
        </form>
    </div>


    <!-- Bootstrap CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
</body>
</html>
