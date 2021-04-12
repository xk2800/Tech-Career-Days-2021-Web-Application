<?php

error_reporting(0);
include'../../../db-con.php';

    $compId = $_POST["compId"];
    $status = $_POST['status'];
    $id = $_POST['id'];

    $sqlStatus = "SELECT * FROM resume_ats WHERE company_id = '$compId' AND resume_id = '$id';";
    $resultStatus = mysqli_query($connect, $sqlStatus);
    $rowsStatus = mysqli_fetch_assoc($resultStatus);
    $rowNum = mysqli_num_rows($resultStatus);

    if(isset($status)){

        //echo $status;
        if($rowNum == 0){

            $sqlInsert = "INSERT INTO resume_ats(company_id, resume_id, status) VALUES ('$compId','$id','$status')";
            $resultInsert = mysqli_query($connect, $sqlInsert);

        }

        if($rowNum > 0){

            $sqlStatusUpdate = "UPDATE resume_ats SET status = '$status' WHERE resume_id = '$id' AND company_id = '$compId';";
            $updateQuery = mysqli_query($connect, $sqlStatusUpdate);
        }

    }

    $sqlStatus = "SELECT * FROM resume_ats WHERE company_id = '$compId' AND resume_id = '$id';";
    $resultStatus = mysqli_query($connect, $sqlStatus);
    $rowsStatus = mysqli_fetch_assoc($resultStatus);

    if($rowsStatus['status'] == 0){

        echo '

            <div class="button green">

                <button onclick="updateStatusA(); updateAnimation();">Star&nbsp<img src="../../../img/icons/approved.svg" alt="" height="20px" width="20px" value="1"></img></button>

            </div>

            &nbsp
            &nbsp

            <div class="button red">

                <button onclick="updateStatusD(); updateAnimation();">Ignore&nbsp<img src="../../../img/icons/decline.svg" alt="" height="25px" width="25px" value="0"></img></button>

            </div>

        ';

    }else if($rowsStatus['status'] == 1){

        echo '

            <div class="button grey">

                <button onclick="updateStatusR(); updateAnimation();">Reset&nbsp</button>

            </div>

            &nbsp
            &nbsp

            <div class="button green">

                <button>Starred&nbsp<img src="../../../img/icons/approved.svg" alt="" height="20px" width="20px"></button>

            </div>
        
        ';

    }else if($rowsStatus['status'] == 2){

        echo '

            <div class="button grey">

                <button onclick="updateStatusR(); updateAnimation();">Reset&nbsp</button>

            </div>

            &nbsp
            &nbsp

            <div class="button red">

                <button>Ignored&nbsp<img src="../../../img/icons/decline.svg" alt="" height="25px" width="25px"></button>

            </div>
    
        ';

    }

?>