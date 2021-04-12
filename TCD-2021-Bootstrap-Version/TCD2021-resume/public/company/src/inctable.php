<?php

error_reporting(0);
session_start();

    include'../../db-con.php';

    $search = $_POST["search"];
    $sort = $_POST["sort"];
    $diploma = $_POST["diploma"];
    $other = $_POST["other"];
    $degree = $_POST["degree"];
    $yr1 = $_POST["yr1"];
    $yr2 = $_POST["yr2"];
    $yr3 = $_POST["yr3"];
    $yr4 = $_POST["yr4"];
    $approved = $_POST["approved"];
    $declined = $_POST["declined"];
    $limit = $_POST["limit"];
    $compId = $_SESSION['compId'];

    if(!isset($limit)){

        $limit = 20;

    }

    $sqlAdd = " (((vetting = 3 AND (name LIKE '%$search%' OR uni_name LIKE '%$search%' )) AND (";

        if($sort == "alphabatical-order"){

            $change = 0;

            if($diploma == "true") {

                $sqlAdd .= "study_type LIKE '%Diploma%'";
                $exist1 = 1;
                $change = 1;

            }

            if($other == "true") {

                    if($exist1 == 1){

                        $sqlAdd .= " OR ";

                    }

                $sqlAdd .= "study_type LIKE '%Postgraduate%'";

                $exist2 = 1;
                $change = 1;

            }

            if($degree == "true") {

                    if($exist1 == 1 || $exist2 == 1){

                        $sqlAdd .= " OR ";

                    }

                $sqlAdd .= "study_type LIKE '%Degree%'";
                $change = 1;

            }

                if($change == 0){

                    $sqlAdd .= "study_type LIKE '%%'";

                }

            $sqlAdd .= ")) AND (";

            $exist1 = 0;
            $exist2 = 0;
            $exist3 = 0;
            $change = 0;

/*--------------------------------------------------------------------*/

                if($yr1 == "true") {

                    $exist1 = 1;
                    $change = 1;
                    $sqlAdd .= "year_study LIKE '%1%'";

                }

                if($yr2 == "true") {

                    if($exist1 == 1) {

                        $sqlAdd .= " OR ";

                    }

                    $exist2 = 1;
                    $change = 1;
                    $sqlAdd .= "year_study LIKE '%2%'";

                }

                if($yr3 == "true") {

                    if($exist1 == 1 || $exist2 == 1){

                        $sqlAdd .= " OR ";

                    }

                    $exist3 = 1;
                    $change = 1;
                    $sqlAdd .= "year_study LIKE '%3%'";

                }

                if($yr4 == "true"){

                    if($exist1 == 1 || $exist2 == 2 || $exist3 == 1){

                        $sqlAdd .= " OR ";

                    }

                    $change =1;
                    $sqlAdd .= "year_study LIKE '%4%'";

                }

                if($change == 0) {

                    $sqlAdd .= "year_study LIKE '%%'";

                }

                $sqlAdd .= ")) ORDER BY name LIMIT $limit";

        }else if($sort == "submission-date"){

            $change1 = 0;

            if($diploma == "true") {

                $sqlAdd .= "study_type LIKE '%Diploma%'";
                $exist1 = 1;
                $change1 = 1;

            }

            if($other == "true") {

                    if($exist1 == 1){

                        $sqlAdd .= " OR ";

                    }

                    $sqlAdd .= "study_type LIKE '%Postgraduate%'";

                $exist2 = 1;
                $change1 = 1;

            }

            if($degree == "true") {

                    if($exist1 == 1 || $exist2 == 1){

                        $sqlAdd .= " OR ";

                    }

                $sqlAdd .= "study_type LIKE '%Degree%'";
                $change1 = 1;

            }

                if($change1 == 0){

                    $sqlAdd .= "study_type LIKE '%%'";

                }

            $sqlAdd .= ")) AND (";

            $existD1 = 0;
            $existD2 = 0;
            $existD3 = 0;
            $change1 = 0;

/*--------------------------------------------------------------------*/

                if($yr1 == "true") {

                    $existD1 = 1;
                    $change1 = 1;
                    $sqlAdd .= "year_study LIKE '%1%'";

                }

                if($yr2 == "true") {

                    if($existD1 == 1) {

                        $sqlAdd .= " OR ";

                    }

                    $existD2 = 1;
                    $change1 = 1;
                    $sqlAdd .= "year_study LIKE '%2%'";

                }

                if($yr3 == "true") {

                    if($existD1 == 1 || $existD2 == 1){

                        $sqlAdd .= " OR ";

                    }

                    $existD3 = 1;
                    $change1 = 1;
                    $sqlAdd .= "year_study LIKE '%3%'";

                }

                if($yr4 == "true"){

                    if($existD1 == 1 || $existD2 == 2 || $existD3 == 1){

                        $sqlAdd .= " OR ";

                    }

                    $change1 = 1;
                    $sqlAdd .= "year_study LIKE '%4%'";

                }

                if($change1 == 0) {

                    $sqlAdd .= "year_study LIKE '%%'";

                }

                $sqlAdd .= ")) ORDER BY last_edit_time DESC LIMIT $limit";

        }else{

            $changeN1 = 0;

            if($diploma == "true") {

                $sqlAdd .= "study_type LIKE '%diploma%'";
                $existN1 = 1;
                $changeN1 = 1;

            }

            if($other == "true") {

                    if($existN1 == 1){

                        $sqlAdd .= " OR ";

                    }

                    $sqlAdd .= "study_type LIKE '%Postgraduate%'";

                $existN2 = 1;
                $changeN1 = 1;

            }

            if($degree == "true") {

                    if($existN1 == 1 || $existN2 == 1){

                        $sqlAdd .= " OR ";

                    }

                $sqlAdd .= "study_type LIKE '%degree%'";
                $changeN1 = 1;

            }

                if($changeN1 == 0){

                    $sqlAdd .= "study_type LIKE '%%'";

                }

            $sqlAdd .= ")) AND (";

            $existNN1 = 0;
            $existNN2 = 0;
            $existNN3 = 0;
            $changeN1 = 0;

/*--------------------------------------------------------------------*/

                if($yr1 == "true") {

                    $existNN1 = 1;
                    $changeN1 = 1;
                    $sqlAdd .= "year_study LIKE '%1%'";

                }

                if($yr2 == "true") {

                    if($existNN1 == 1) {

                        $sqlAdd .= " OR ";

                    }

                    $existNN2 = 1;
                    $changeN1 = 1;
                    $sqlAdd .= "year_study LIKE '%2%'";

                }

                if($yr3 == "true") {

                    if($existNN1 == 1 || $existNN2 == 1){

                        $sqlAdd .= " OR ";

                    }

                    $existNN3 = 1;
                    $changeN1 = 1;
                    $sqlAdd .= "year_study LIKE '%3%'";

                }

                if($yr4 == "true"){

                    if($existNN1 == 1 || $existNN2 == 2 || $existNN3 == 1){

                        $sqlAdd .= " OR ";

                    }

                    $changeN1 = 1;
                    $sqlAdd .= "year_study LIKE '%4%'";

                }

                if($changeN1 == 0) {

                    $sqlAdd .= "year_study LIKE '%%'";

                }

                $sqlAdd .= ")) LIMIT $limit";
            
        }

$statusFilter = 0;
$aExists = 0;
$dExists = 0;

$sqlStatusFilter = "SELECT * FROM resume INNER JOIN resume_ats ON resume.id = resume_ats.resume_id WHERE resume_ats.company_id = $compId AND (";

    if($approved == "true"){

        $sqlStatusFilter .= "status = 1";
        $statusFilter = 1;
        $aExists = 1;

    }

    if($declined == "true"){

        if($aExists == 1){

            $sqlStatusFilter .= " OR ";

        }

        $sqlStatusFilter .= "status = 2";

        $statusFilter = 1;

    }

    $sqlStatusFilter .= ") AND";

        if($statusFilter == 0){

            $sqlResume = "SELECT * FROM resume WHERE $sqlAdd";

        }else{

            $sqlResume = $sqlStatusFilter . $sqlAdd;

        }

$result = mysqli_query($connect, $sqlResume);
$rowsNum = mysqli_num_rows($result);

$i = 1;

if($rowsNum > 0) {

    while($rowResult = mysqli_fetch_assoc($result)) {

        $resumeId = $rowResult['id'];

        $sqlStatus = "SELECT * FROM resume_ats WHERE company_id = '$compId' AND resume_id = '$resumeId';";
        $resultStatus = mysqli_query($connect, $sqlStatus);
        $rowsStatus = mysqli_fetch_assoc($resultStatus);

        echo'

        <tr class="table-row">

            <th scope="row">'.$i.'</th>
            <td>'.$rowResult["name"].'</td>
            <td class="hidden">'.$rowResult["job_type"].'</td>
            <td class="hiddenExtra"><a href="mailTo:'.$rowResult['email'].'">'.$rowResult["email"].'</a></td>
            <td class="hiddenExtra"><a href="tel:'.$rowResult['phone_number'].'">'.$rowResult["phone_number"].'</a></td>
            <td class="hiddenExtra3">'.$rowResult["uni_name"].'</td>
            <td class="hidden">'.$rowResult["study_type"].'</td>
            <td class="hiddenExtra2">'.$rowResult["year_study"].'</td>
            
        ';

        echo'

            <td class="hiddenExtra2"><a href="download?id='.$rowResult["id"].'">Download</a></td>
            <td><a href="./moreDetails?id='.$rowResult["id"].'">Preview</a></td>

        ';

        if($statusFilter == 0){

            if($rowsStatus['status'] == 0){

                echo '<td style="text-align:center"><span class="status-tab"> - </span></td>';
    
            }else if($rowsStatus['status'] == 1){
    
                echo '<td><button class="status-tab green">Starred</button></td>';
    
            }else if($rowsStatus['status'] == 2){
    
                echo '<td><button class="status-tab red">Ignored</button></td>';
    
            }else{
    
                echo '<td style="text-align:center"><span class="status-tab"> - </span></td>';
    
            }
        
        }else{
        
            if($rowResult['status'] == 0){

                echo '<td style="text-align:center"><span class="status-tab"> - </span></td>';
    
            }else if($rowResult['status'] == 1){
    
                echo '<td ><button class="status-tab green">Starred</button></td>';
    
            }else if($rowResult['status'] == 2){
    
                echo '<td ><button class="status-tab red">Ignored</button></td>';
    
            }else{
    
                echo '<td style="text-align:center"><span class="status-tab"> - </span></td>';
    
            }
        
        }

/*         echo'

            <td class="hiddenExtra2"><a href="download?id='.$rowResult["id"].'">Download</a></td>
            <td><a href="./moreDetails?id='.$rowResult["id"].'">Preview</a></td>

        </tr>

        '; */

        echo '</tr>';

        $i++;

    }

    if($limit > $rowsNum) {

        echo '
        <tr>
            <td class="end-result" colspan="11">End of Results <br><span style="font-size: 12px; font-weight: 200">(<strong>'.$rowsNum.'</strong> results found in database)</span></td>
        </tr>';

    }

}else{

    echo '
    <tr>
        <td class="end-result" colspan="11">No results found</td>
    </tr>';

}

