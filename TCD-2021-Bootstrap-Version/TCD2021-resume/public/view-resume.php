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
    <title>View <?php echo $_SESSION["email"]?> Resume | Tech Career Days 2021</title>

    <link rel="icon" type="image/png" href= "../img/favicon_io/favicon.ico">

    
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

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
        <h4>Welcome <span class="name"><?php echo $_SESSION['email']?></span></h4>
        <h6>To head back to the previous page, kindly close this tab.</h6>
        
<?php
    $db = "SELECT file FROM resume";
    $check = mysqli_query($connect, $db);
    $outcome = mysqli_fetch_array($check);
?>
        <object data="data:application/pdf;base64,<?php echo base64_encode($row['file']) ?>" type="application/pdf" style="height:500px;width:100%"></object>
    
    </div>




    <!-- Bootstrap CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
</body>
</html>