<?php
    include '../../db-con.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/dashboard.css" type="text/css">

    <style>
        body{

            padding: 40px 40px;

        }
    </style>
</head>
<body>

<table class="table">
    <thead class="thead-light">
        <tr>
        
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col" class="hidden">Job Type</th>
        <th scope="col" class="hiddenExtra">Email</th>
        <th scope="col" class="hiddenExtra">Phone</th>
        <th scope="col" class="hiddenExtra3">University</th>
        <th scope="col" class="hidden">Study Type</th>
        <th scope="col" class="hiddenExtra2">Study Year</th>
        
        </tr>
    </thead>
    <tbody id="table-body">
    <?php

        $sql = "SELECT * FROM resume WHERE vetting = 3";
        $result = mysqli_query($connect, $sql);
        $rowsNum = mysqli_num_rows($result);
        $i = 1;

        while($rowResult = mysqli_fetch_assoc($result)){

            echo '

                <tr class="table-row" style="border: 1">

                    <th scope="row">'.$i.'</th>
                    <td>'.$rowResult["name"].'</td>
                    <td class="hidden">'.$rowResult["job_type"].'</td>
                    <td class="hiddenExtra"><a href="mailTo:'.$rowResult['email'].'">'.$rowResult["email"].'</a></td>
                    <td class="hiddenExtra"><a href="tel:'.$rowResult['phone_number'].'">'.$rowResult["phone_number"].'</a></td>
                    <td class="hiddenExtra3">'.$rowResult["uni_name"].'</td>
                    <td class="hidden">'.$rowResult["study_type"].'</td>
                    <td class="hiddenExtra2">'.$rowResult["year_study"].'</td>
                    <td class="hiddenExtra2"><a href="download?id='.$rowResult["id"].'">Download</a></td>
                    <td><a href="./moreDetails?id='.$rowResult["id"].'">Preview</a></td>

                </tr>

            ';

            $i++;

        }

    ?>
    <tbody>
</table>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>
</html>