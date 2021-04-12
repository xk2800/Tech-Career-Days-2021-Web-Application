<?php 
    session_start();
    include("../db-con.php");
    ob_start();
    
    if(!isset($_SESSION['username'])){
        header("Location:index");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

$fullUrl ="http:// $_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


$url = $fullUrl;
$parts = parse_url($url);
$output = [];
parse_str($parts['query'], $name);
echo $name['email'];

$url = $fullUrl;
$parts = parse_url($url);
$output = [];
parse_str($parts['query'], $body);
echo $body['body'];


/*if(isset($_REQUEST["email"])){
    $name = $_REQUEST["email"];
    echo $name;
    $result = mysqli_query($connect, "SELECT * from resume WHERE name = '$name'");
    $row = mysqli_fetch_assoc($result);
    //echo $row ["name"];
}*/

/*$url = $fullUrl;
$parts = parse_url($url);
$output = [];
parse_str($parts['query'], $name);
echo $name['body'];*/










?>
    
</body>
</html>