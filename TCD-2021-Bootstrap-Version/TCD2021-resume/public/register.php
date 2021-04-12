<?php
    include "../db-con.php";
    ob_start();
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
    <title>Registration | Tech Career Days 2021</title>

    <link rel="icon" type="image/png" href= "../img/favicon_io/favicon.ico">

    <!-- CSS for all sections in this page -->
    <link rel="stylesheet" href="../css/font.css">
    
    <!-- CSS for all sections in this page -->
    <link rel="stylesheet" href="../css/parallax.css">
    
    <!-- SASS->CSS for all sections in this page -->
    <link rel="stylesheet" href="../css/select-box.css">

    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Favicon -->
    <link rel="icon" type="image/favicon" href="../img/favicon_io/favicon.ico">

    <script>
        function others(val){
            var element=document.getElementById('other');
            if(val=='others'){
                element.style.display='block';

            }else{
                element.style.display='none';
            }
        }

        function study(val){
            var element=document.getElementById('study-year');
            if(val=='Diploma' || val=='Degree' || val=='Postgraduate'){
                element.style.display='block';

            }else{
                element.style.display='none';
            }
        }


        function sanitizeInputs() {
                var str = $("#fullname").val();
                str = str.replace(/[^a-zA-Z 0-9,/'"]/gim, "");
                str = str.trim();
                $("#fullname").val(str);

        }

        function sanitizeEmail() {
            var str = $("#email").val();
            str = str.replace(/[^a-zA-Z 0-9!#$%&'*+-/=?^_`{|}~@]/gim, "");
            str = str.trim();
            $("#email").val(str);

        }
    </script>

    <style>
        body{
            background-color: #15243C;
            color: white;
        }

        /* width */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        /* Track */
        ::-webkit-scrollbar-track {
            background: #C0C0C0; 
        }
        
        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888; 
        }
        
        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555; 
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
        }
        .content{
            padding-left: 15%;
        }
        .top-title{
            font-family: 'Bebas Neue', cursive;
            margin-left: -10%;
            margin-top: -10px;
            padding-bottom: 2%;
            font-size: 2.8rem;
        }
        input, input:focus{
            border: 0px solid black;
            border-bottom: 1px solid grey;
        }
        select{
            border: 1px solid grey;
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
        .cancelbtn{
            color: black;
        }

        #email_err, #password_err{
            color: red;
        }

        @media screen and (max-width: 991px){
            .white{
            position: relative; 
            z-index:2;
            top: 0%;
            bottom: 0%;
            left: 0%;
            right: 0%;
            width: 70%;
            height: 100%;
            background-color: white;
            color: black;
            font-family: 'Arvo', serif;
            }
        }
        @media screen and (max-width: 500px){
        #uni-name{
            width: 200px;
        }
        }
    </style>
</head>
<body>

        <div class="parallax">
                <img src="../img/parallax/1.png">
                <img src="../img/parallax/2.png">
                <img src="https://returnpath.com/assets/images/backgrounds/background-confetti-md-arcade.svg;">
                <img src="https://returnpath.com/assets/images/backgrounds/background-confetti-sm-arcade.svg;">
                <img src="https://returnpath.com/assets/images/backgrounds/background-confetti-xs-arcade.svg">
        </div>
    
    <div class="container white">
        <div class="content">
            <br>
            <h2 class="top-title">Tech Career Days 2021 Registration</h2>

            <div id="error" style="color: green;"></div>

<?php

                function get_browser_name($user_agent)
                {
                    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
                    elseif (strpos($user_agent, 'Edge')) return 'Edge';
                    elseif (strpos($user_agent, 'Chrome')) return  'Chrome';
                    elseif (strpos($user_agent, 'Safari')) return 'Safari';
                    elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
                    elseif (strpos($user_agent, 'MSI') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';
                    
                    return 'Other';
                }
                
                date_default_timezone_set("Asia/Kuala_Lumpur");
                $time = time();
                $actual_time = date('Y-m-d H:i:s', $time); //date_format($time,"Y/m/d H:i:s");
                
                //echo'<br>--------------------------------<br>';

                //echo get_browser_name($_SERVER['HTTP_USER_AGENT']);

                $fullUrl ="http:// $_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if(strpos($fullUrl, "email=exist") == true){
                    //echo '<script>document.getElementById("error").innerHTML = "<br><br>"</script>';
                    echo '<div class="container">
                            <div class="alert alert-warning words" role="alert">
                            Email already exist in system. Try loggin in <a href="login">here</a>
                            </div>
                        </div>';
                }

                /*if(strpos($fullUrl, "password!=same") == true){
                    //echo '<script>document.getElementById("error").innerHTML = "<br><br>"</script>';
                    echo '<div class="container">
                            <div class="alert alert-warning words" role="alert">
                            Your passwords do not match. Please try again.
                            </div>
                        </div>';
                }*/

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
            
            <div class="account">
                Already have an account? <a href="https://resume.techcareerdays.com/login">Click here to login</a><br><br>
            </div>

            <form name="add-jobs" method="POST" enctype="multipart/form-data">
                <span class="title"><p>Full Name:</span><br><input type="text" name="full-name" id="fullname" placeholder="Input your full name" required onChange="sanitizeInputs()" required></p>
                
                <span class="title"><p>University Name:</span><br><select name="uni-name" id="uni-name" onchange='others(this.value);' required></p>
                                                                <option style='display:none;'>Select a university</option>
                                                                <option value="MMU Cyberjaya">MMU Cyberjaya</option>
                                                                <option value="MMU Melaka">MMU Melaka</option>
                                                                <option value="Universiti Tunku Abdul Rahman">UTAR</option>
                                                                <option value="Tunku Abdul Rahman University College">TARUC</option>
                                                                <option value="Xiamen University Malaysia">Xiamen University Malaysia</option>
                                                                <option value="Sunway University">Sunway University</option>
                                                                <option value="Universiti Teknologi Malaysia">Universiti Teknologi Malaysia</option>
                                                                <option value="Taylor's University">Taylor's University</option>
                                                                <option value="Universiti Utara Malaysia">Universiti Utara Malaysia</option>
                                                                <option value="others">Others</option>
                                                                </select>
                                                                <br>
                                                                <input type="text" name="other" id="other" style='display:none;'/>

                <span class="title"><p>Gender:</span><br><select name="gender" id="gender" required></p>
                                                                <option style='display:none;'>Select gender</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Rather not say">Rather Not Say</option>
                                                                </select>

                <span class="title"><p>Nationality:</span><br><select type="text" name="nationality" id="nationality" required></p>
                                                                <option style='display:none;'>Select Nationality</option>
                                                                <option value="Malaysian">Malaysian</option>
                                                                <option value="Non-Malaysian">Non-Malaysian</option>
                                                                </select>

                <span class="title"><p>Year of Study:</span><br><select name="study-type" id="study-type" onchange="study(this.value);" style="margin-bottom: 10px;" required></p>
                                                                <option style='display:none;'>Select year of studies</option>
                                                                <option value="Foundation">Foundation</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option value="Degree">Degree</option>
                                                                <option value="Postgraduate">Postgraduate</option>
                                                                </select>
                                                                
                                                                <select name="study-year" id="study-year" style='display:none;'>
                                                                <option value="Year 1">Year 1</option>
                                                                <option value="Year 2">Year 2</option>
                                                                <option value="Year 3">Year 3</option>
                                                                <option value="Year 4">Year 4</option>
                                                                </select>

                <span class="title"><p>Field of Study:</span><br><select name="study-field" id="study-field" onchange='others1(this.value);' required></p>
                                                                <option style='display:none;'>Select a field of study</option>
                                                                <option value="IT/CS-related field">IT/CS-related field</option>
                                                                <option value="Non-IT/CS-related field">Non-IT/CS-related field</option>
                                                                </select>

                <div class="box">
                    <span class="title"><p>Email:</span><br><span class="title"><div id="email_err"></div></span><input type="text" name="email" id="email" inputmode="email" placeholder="john@email.com" required onChange="sanitizeEmail()"></p>
                    <span class="title"><p>Password:</span><br><input type="password" name="password" id="password" placeholder="Input password" required></p>
                    <span class="title"><div id="password_err"></div></span>
                    <span class="title"><p>Confirm Password:</span><br><input type="password" name="confirm-password" id="confirm-password" placeholder="Re-confirm password" required></p>
                </div>


                <button type="submit" name="submitbtn" class="btn btn-light btn-md rounded-pill submitbtn">Submit</button>
                <button class="btn btn-light btn-md rounded-pill submitbtn"><a class="cancelbtn" href="https://resume.techcareerdays.com/">Cancel</a></button>
                <br><br>
            </form>  
        </div>
    </div>
    
    <script src="https://fjm97lkppdnq.statuspage.io/embed/script.js"></script>
    <!-- Bootstrap CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
    <script src="https://fjm97lkppdnq.statuspage.io/embed/script.js"></script>
</body>
</html>

<?php echo 'The current time is '.$actual_time; ?>

<?php



if(isset($_POST["submitbtn"])){

    $full_name      = clean($_POST ["full-name"]);
    $uni_name       = clean(($_POST['uni-name'] == "others") ? $_POST['other']:$_POST['uni-name']);
    $gender         = clean($_POST ["gender"]);
    $nationality    = clean($_POST ["nationality"]);
    $study_type     = clean($_POST ["study-type"]);
    $study_year     = clean($_POST ["study-year"]);
    $study_field    = clean(($_POST['study-field'] == "others") ? $_POST['study-field-input']: $_POST['study-field']);
    $email          = clean($_POST ["email"]);
    $pwd            = clear($_POST ["password"]);
    $c_pwd          = clear($_POST ["confirm-password"]);
    $explorer       = get_browser_name($_SERVER['HTTP_USER_AGENT']);
    $time           = $actual_time;


    $check_dup_email = "SELECT * FROM acc WHERE email = '$email'";
    $res = mysqli_query($connect, $check_dup_email);
    //$count = mysqli_num_rows($res);

    if(mysqli_num_rows($res) > 0){
        header('location: register?email=exist');
        exit();
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo '<script>document.getElementById("email_err").innerHTML = "Invalid email format.<br><br>"</script>';
    }else{

        if($pwd != $c_pwd){
            echo '<script>document.getElementById("password_err").innerHTML = "Your passwords do not match. Please try again.<br><br>"</script>';
        } else{

            //generate vkey
            $vkey = md5(time().$email);

            $pwdd = md5($pwd);

            $garam = "t5)%@PH--6Eh%ZRC7HEgk+K,*<,nB73YeDJC`ZL!Ru%vQ#U]c<Fp::5bs:4<37N>+t73(:MpynRv3Ps8bm";

            $salted = $garam.$pwdd;

            $insert = $mysqli->query("INSERT INTO acc(f_name, email, password, uni_name, gender, nationality, study_type, year_study, field_study, vkey, browser_used, createdate)
            VALUES ('$full_name', '$email', '$salted', '$uni_name', '$gender', '$nationality', '$study_type', '$study_year', '$study_field', '$vkey', '$explorer', '$time')");

            $resume = $mysqli->query("INSERT INTO resume(email, name, uni_name, study_type, year_study, field_study, last_edit_time)
            VALUES ('$email', '$full_name', '$uni_name', '$study_type', '$study_year', '$study_field', '$time')") ;

            if($insert && $resume){
                
                include('sendverify.php');
            }else{
                echo $mysqli->error;
            }

        }
    }

}

?>