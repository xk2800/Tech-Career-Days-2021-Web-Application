<?php

    include'../../db-con.php';
    session_start();
    $_SESSION['email'];
    
    if(!isset($_SESSION['email'])){
        header("Location:login");
    }

    if(isset($_GET["id"])){

        $id = $_GET["id"];
        $sqlFile = "SELECT * FROM resume WHERE id = $id";
        $resultsFile = mysqli_query($connect, $sqlFile);
        $data = mysqli_fetch_assoc($resultsFile);

//$file = 'media/'.$data["file"];

/*         if(file_exists($file)){

            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Content-Length: '.filesize($file));
            readfile($file);
            exit;

        } */

        //$file = base64_decode($data['file']);
        $file = $data["file"];
        $name = $data["name"];

        if(isset($file)) {

            //file_put_contents('my.pdf', $file);
            header("Content-type: pdf");
            header("Content-type: application/pdf");
            header('Content-Disposition: attachment; filename="'.$name.'_resume.pdf"');
            header('Content-Transfer-Encoding: binary');
            ob_clean();
            flush();

            echo $file;
            exit;

        }

    }
