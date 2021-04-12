<?php

    include '../../db-con.php';
    session_start();
    $_SESSION['email'];
    
    if(!isset($_SESSION['email'])){
        header("Location:login");
    }

    

    $sqlFile = 'SELECT * FROM resume WHERE id IN ('.implode(',', $_POST['id']).')';
    $resultsFile = mysqli_query($connect, $sqlFile);

    $zipname = 'TCD2021-resume.zip';
    $zip = new ZipArchive;
    $zip->open($zipname, ZipArchive::CREATE);

    $numRows = mysqli_num_rows($resultsFile);
    //echo $numRows;
    $i = 0;

    while($data = mysqli_fetch_assoc($resultsFile)){

        $zip->addFromString(''.$data["name"].'.pdf', $data["file"]);

    } 

    $zip->close();

    header("Content-type: application/zip"); 
    header('Content-Disposition: attachment; filename='.$zipname); 
    header("Pragma: no-cache"); 
    header("Expires: 0"); 

    readfile($zipname);
    unlink($zipname);
    exit;

