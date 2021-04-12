<?php 
    session_start();
    include("../db-con.php");
    ob_start();
    
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
    <title>Edit Personal Information | Tech Career Days 2021</title>

    <link rel="icon" type="image/png" href= "../img/favicon_io/favicon.ico">
    

    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Favicon -->
    <link rel="icon" type="image/favicon" href="../img/favicon_io/favicon.ico">

    <!-- CSS for all sections in this page -->
    <link rel="stylesheet" href="../css/font.css">

<style>
    .title{
        font-family: 'Bebas Neue', cursive;
        font-size: 2.5em;
    }

    input, input:focus{
        border: 0px solid black;
        border-bottom: 1px solid grey;
    }
    select{
        border: 1px solid grey;
    }
    #name, #email{
        width: 350px;
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
    .cancelbtn:hover{
        color: #4368a3;
        text-decoration: none;
        margin: 10px 10px;
    }
    .cancelbtn, .cancelbtn:link{
        color: black;
        text-decoration: none;
        margin: 10px 10px;
    }
    .submitbtn{
        background-color: white;
        border: 1px solid black;
        color: black;
        font-weight: bold;
    }

    .submitbtn:hover{
        border-color: #4368a3;
        border-radius: 5px;
        color:#4368a3;
        background-color: #15243C;
        font-weight: bold;
    }
    @media screen and (max-width: 500px){
        #name, #email{
            width: 250px;
        }
    }
</style>

<script>
    function study(val){
            var element=document.getElementById('study-year');
            if(val=='Diploma' || val=='Degree' || val=='Postgraduate'){
                element.style.display='block';

            }else{
                element.style.display='none';
            }
    }

    function others(val){
            var element=document.getElementById('other');
            if(val=='others'){
                element.style.display='block';

            }else{
                element.style.display='none';
            }
    }

</script>

</head>
<body>
<?php
    include "nav.html";

    $email_add = $_SESSION["email"];
        
        //take from acc table = $row
        $result = mysqli_query($connect, "SELECT * from resume WHERE email = '$email_add'");
        $row = mysqli_fetch_assoc($result);

        //take from resume table = $rows
        $results = mysqli_query($connect, "SELECT * from acc WHERE email = '$email_add'");
        $rows = mysqli_fetch_assoc($results);
?>
        <div class="container">
            <br>
            <h4 class="title">@ <span class="name"><?php echo $email_add?></span></h4>
            <h2 class="title">Edit Personal Information</h2>
            
            <form method="post">

            <?php

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

    if(isset($_POST["submitbtn"])){


        $full_name      = clean($_POST ["full-name"]);
        $uni_name       = clean(($_POST['uni-name'] == "others") ? $_POST['other']:$_POST['uni-name']);
        $gender         = clean($_POST ["gender"]);
        $nationality    = clean($_POST ["nationality"]);
        $study_type     = clean($_POST ["study-type"]);
        $study_year     = clean($_POST ["study-year"]);
        $study_field    = clean(($_POST['study-field'] == "others") ? $_POST['study-field-input']: $_POST['study-field']);
    


    $insert = "UPDATE acc SET f_name='$full_name', uni_name='$uni_name', gender='$gender', nationality='$nationality', study_type='$study_type', year_study='$study_year', field_study='$study_field'  WHERE email = '$email_add'";
    
    $resume = "UPDATE resume SET uni_name='$uni_name' , name='$full_name', study_type='$study_type', field_study='$study_field' WHERE email = '$email_add'";
    
    if((mysqli_query($connect, $insert)) && (mysqli_query($connect, $resume))){
            
        echo '<div class="container style=background-color: ;">
                <div class="alert alert-success words" role="alert">
                    Your information has been updated into our system. Thank you.
                </div>
            </div>';
            ?> 
            <a href="resume"><button type="submit" class="btn btn-light btn-md rounded-pill add-backbtn">
            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            Back to Dashboard
        </button></a><?php
            die();
    }else{
        echo '<div class="container style=background-color: ;">
                <div class="alert alert-danger words" role="alert">
                    Sorry, your Resume was unsuccessfully failed to be uploaded into our system. Chat with us to find out why.
                </div>
            </div>';
            ?> 
            <a href="edit-info"><button type="submit" class="btn btn-light btn-md rounded-pill add-backbtn">
            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            Retry
        </button></a>
            <br>or
            <a href="resume"><button type="submit" class="btn btn-light btn-md rounded-pill add-backbtn">
            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            Back to Dashboard
        </button></a>
            <?php
            die();
    }
}
?>
                <p>Full Name:<br><input type="text" name="full-name" id="name" value="<?php echo $row ["name"]?>"/></p>

                <!--p>Email:<br><input type="text" name="email" id="email" value="<?php echo $row["email"]?>"/></p-->

                <p>University Name:<br><select name="uni-name" id="uni-name" onchange='others(this.value);' required>
                                            <option value="<?php echo $row ["uni_name"]?>"  style='display:none;'><?php echo $row ["uni_name"]?></option>
                                            <option value="MMU Cyberjaya">MMU Cyberjaya</option>
                                            <option value="MMU Melaka">MMU Melaka</option>
                                            <option value="Universiti Tunku Abdul Rahman">UTAR</option>
                                            <option value="Tunku Abdul Rahman University College">TARUC</option>
                                            <option value="Xiamen University Malaysia">Xiamen University Malaysia</option>
                                            <option value="Sunway University">Sunway University</option>
                                            <option value="Universiti Teknologi Malaysia">Universiti Teknologi Malaysia</option>
                                            <option value="Taylor's University">Taylor's Universitya</option>
                                            <option value="Universiti Utara Malaysia">Universiti Utara Malaysia</option>
                                            <option value="others">Others</option>
                                        </select>
                                            <br>
                                            <input type="text" name="other" id="other" style='display:none;'/>
                                </p>
                <p>Gender:<br><select name="gender" id="gender" required></p>
                                    <option value="<?php echo $rows ["gender"]?>" style='display:none;'><?php echo $rows ["gender"]?></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Rather not say">Rather Not Say</option>
                                </select>
                            </p>

                <p>Nationality:<br><select type="text" name="nationality" id="nationality" required></p>
                                        <option value="<?php echo $rows ["nationality"]?>" style='display:none;'><?php echo $rows ["nationality"]?></option>
                                        <option value="Malaysian">Malaysian</option>
                                        <option value="Non-Malaysian">Non-Malaysian</option>
                                    </select>
                                </p>

                <p>Year of Study:<br><select name="study-type" id="study-type" onchange="study(this.value);" style="margin-bottom: 10px;" required>
                                        <option value="<?php echo $row ["study_type"]?>" style='display:none;'><?php echo $row ["study_type"]?></option>
                                        <option value="Foundation">Foundation</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Degree">Degree</option>
                                        <option value="Postgraduate">Postgraduate</option>
                                        </select>
                                        
                                        <select name="study-year" id="study-year" style='display:none;'>
                                            <option value="<?php echo $rows ["year_study"]?>"  style='display:none;'><?php echo $rows ["year_study"]?></option>
                                            <option value="Year 1">Year 1</option>
                                            <option value="Year 2">Year 2</option>
                                            <option value="Year 3">Year 3</option>
                                            <option value="Year 4">Year 4</option>
                                    </select>
                                </p>

                <p>Field of Study:<br><select name="study-field" id="study-field" onchange='others1(this.value);' required>
                                        <option value="<?php echo $rows ["field_study"]?>"  style='display:none;'><?php echo $rows ["field_study"]?></option>
                                        <option value="IT/CS-related field">IT/CS-related field</option>
                                        <option value="Non-IT/CS-related field">Non-IT/CS-related field</option>
                                    </select>
                                </p>

                
                <button type="submit" name="submitbtn" class="btn btn-light btn-md rounded-pill submitbtn">Submit Update</button>
                <button class="btn btn-light btn-md rounded-pill submitbtn"><a class="cancelbtn" href="resume">Cancel</a></button>

                <br><br>

        </form>
        <a href="resume"><button type="submit" class="btn btn-light btn-md rounded-pill add-backbtn">
            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            Back to Dashboard
        </button></a>
        <br><br><br>
    </div>

</body>
</html>

