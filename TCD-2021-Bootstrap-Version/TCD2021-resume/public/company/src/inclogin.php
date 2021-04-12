<?php

session_start();

include_once'../../../db-con.php';

//strip_tags 
function cleanTags($value){

    $value = strip_tags($value);

    return $value;

}

function clean($value){

    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);

    return $value;
}

if(isset($_POST['submit'])){

    $remember = $_POST["remember"];

    $email = clean($_POST['email']);
    $pass = cleanTags($_POST['password']);

    if($remember == 1){

        setcookie("email", $email, time()+1*24*60*60);

    }else{

        setcookie("email", "", time()-3600);

    }

    $garam = "t5)%@PH--6Eh%ZRC7HEgk+K,*<,nB73YeDJC`ZL!Ru%vQ#U]c<Fp::5bs:4<37N>+t73(:MpynRv3Ps8bm";
    $encpass = $garam.(md5($pass));

        if(empty($email) || empty($pass)){

            header("Location: https://" .$_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/login.php?login=empty");
            exit;

        }else{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

                header("Location: http://" .$_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/login.php?login=emailError");
                exit;

            }else{

                $sqlEmail = "SELECT * FROM company_acc WHERE email=?";  
                //$result = mysqli_query($connect, $sqlEmail);
                //$row = mysqli_fetch_assoc($result);
                $stmt = $connect->prepare($sqlEmail);
                $stmt->bind_param('s', $email);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                $pass1 = $row['password'];
                $username1 = $row['username'];
                $compId = $row['id'];

                if($pass1 == $encpass){

                    header("Location: https://" .$_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/dashboard.php");
                    $_SESSION['loggedin'] = "yes";
                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $username1;
                    $_SESSION['compId'] = $compId;
                    setcookie("email", $email, time()+1*24*60*60);
                    exit;

                }else{

                    header("Location: https://" .$_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/login.php?login=detailsError");
                    exit;
                    
                }
            }
        }
}

