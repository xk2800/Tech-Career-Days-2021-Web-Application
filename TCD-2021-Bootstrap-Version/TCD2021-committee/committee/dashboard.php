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
    <title>Vetting Dashboard | Tech Career Days 2021</title>

    <link rel="icon" type="image/png" href= "../img/favicon_io/favicon.ico">

    <!-- CSS for all sections in this page -->
    <link rel="stylesheet" href="../css/font.css">
    
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            table-layout: fixed;
            width: 250px;
        }
        th{
            /*width: 100px;*/
            text-align: center;
        }
    </style>

</head>
</head>
<body>

<?php
    include ("button.html");
?>
    <div class="container">
    <br><br>
    <h4>Logged in as <span class="name"><?php echo $_SESSION['username']?></span> (Username)</h4>
    
<?php

    $query = "SELECT * FROM resume WHERE vetting = 2";
    $result = mysqli_query($connect, $query);

    date_default_timezone_set("Asia/Kuala_Lumpur");
    $time = time();
    $actual_time = date('Y-m-d H:i:s', $time); //date_format($time,"Y/m/d H:i:s");
    echo 'The current time is '.$actual_time;
    
    ?>
    <br><h6>Happy Vetting, lets get that bread. -TCD 2021 Dev Team</h6>
            <br><br>

<?php
//Queries to count total
    $quer1="SELECT count(*) as number from resume WHERE vetting='1'"; //pending 1
    $rest1=mysqli_query($mysqli,$quer1);

    while($data1=mysqli_fetch_array($rest1)){
        //$year=$data['last_edit_time'];
        $stat1=$data1['number'];
    }


    $quer2="SELECT count(*) as number from resume WHERE vetting='2'"; //reject 2
    $rest2=mysqli_query($mysqli,$quer2);

    while($data2=mysqli_fetch_array($rest2)){
        //$year=$data['last_edit_time'];
        $stat2=$data2['number'];
    }
    
    
    $quer3="SELECT count(*) as number from resume WHERE vetting='3'"; //approved 3
    $rest3=mysqli_query($mysqli,$quer3);

    while($data3=mysqli_fetch_array($rest3)){
        //$year=$data['last_edit_time'];
        $stat3=$data3['number'];
    }
    
    
    $quer20="SELECT count(*) as number from resume WHERE vetting='20'"; //reject no email 20
    $rest20=mysqli_query($mysqli,$quer20);
    while($data20=mysqli_fetch_array($rest20)){
        //$year=$data['last_edit_time'];
        $stat20=$data20['number'];
    }


    $quer0="SELECT count(*) as number from resume WHERE vetting='0'"; //no submission 0
    $rest0=mysqli_query($mysqli,$quer0);

    while($data0=mysqli_fetch_array($rest0)){
        //$year=$data['last_edit_time'];
        $stat0=$data0['number'];
    }
?>

            <div class="container">
            <h2>Vetting System</h2>
                <p></p>

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Overview Count</a></li>
                    <li><a data-toggle="tab" href="#menu1">Pending <?php echo "{ ".$stat1." }" ?></a></li>
                    <li><a data-toggle="tab" href="#menu2">Rejected <?php echo "{ ".$stat2." }" ?></a></li>
                    <li><a data-toggle="tab" href="#menu3">Rejected, no email sent <?php echo "{ ".$stat20." }" ?></a></li>
                    <li><a data-toggle="tab" href="#menu4">Approved <?php echo "{ ".$stat3." }" ?></a></li>
                    <li><a data-toggle="tab" href="#menu5">No Submission <?php //echo "{ ".$stat0." }" ?></a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <h3>HOME</h3>
                        <?php
                            $quer1="SELECT count(*) as number from resume WHERE vetting='1'";
                            $rest1=mysqli_query($mysqli,$quer1);

                            while($data1=mysqli_fetch_array($rest1)){
                                $sale1=$data1['number'];
                            }
                            echo "Total number of resume's PENDING to date: <b>".$sale1."</b><br><br>";
                        ?>
                        <?php
                            $quer2="SELECT count(*) as number from resume WHERE vetting='2'";
                            $rest2=mysqli_query($mysqli,$quer2);

                            while($data2=mysqli_fetch_array($rest2)){
                                $sale2=$data2['number'];
                            }
                            echo "Total number of resume's REJECTED to date: <b>".$sale2."</b><br><br>";
                        ?>
                        <?php
                            $quer20="SELECT count(*) as number from resume WHERE vetting='20'";
                            $rest20=mysqli_query($mysqli,$quer20);

                            while($data20=mysqli_fetch_array($rest20)){
                                $sale20=$data20['number'];
                            }
                            echo "Total number of resume's REJECT, NO EMAIL SENT to date: <b>".$sale20."</b><br><br>";
                        ?>
                        <?php
                            $quer3="SELECT count(*) as number from resume WHERE vetting='3'";
                            $rest3=mysqli_query($mysqli,$quer3);

                            while($data3=mysqli_fetch_array($rest3)){
                                $sale3=$data3['number'];
                            }
                            echo "Total number of resume's APPROVED to date: <b>".$sale3."</b><br><br>";
                        ?>
                        <?php
                            $quer0="SELECT count(*) as number from resume WHERE vetting='0'";
                            $rest0=mysqli_query($mysqli,$quer0);

                            while($data0=mysqli_fetch_array($rest0)){
                                $sale0=$data0['number'];
                            }
                            echo "Total number of users with NO SUBMISSION to date: <b>".$sale0."</b>";
                        ?>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                <?php
                        $query1 = "SELECT * FROM resume WHERE vetting = '1' ORDER BY last_edit_time DESC ";
                        $result1 = mysqli_query($connect, $query1);

                        if(mysqli_num_rows($result1)==0){
                            ?> No data <?php
                        }else{
                        ?>
                        <br>
                            <table>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th style="width: 130px;">Vetting Status</th>
                                <th style="width: 130px;">Update Status</th>
                            </table>
                        <?php
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                echo '<table>';
                                echo '<tr>';
                                echo '<td>'.$row1['name'].'</td>';
                                echo '<td>'.$row1['email'].'</td>';
                                echo '<td style="width: 130px;">';
                                if($row1['vetting'] == "0"){
                                    echo "No submission";
                                }
                                else if($row1['vetting'] == "1")
                                {
                                    echo "Pending";
                                }else if($row1['vetting'] == "2"){
                                    echo "Reject";
                                } else if($row1['vetting'] == "3"){
                                    echo "Approved";
                                }else if($row1['vetting'] == "20"){
                                    echo "Reject Without Email Send";
                                }
                                '</td>';
                                echo '<td style="width: 130px; text-align: center;">'?><a href="resume?email=<?php echo $row1["email"];?>"><button type="submit">Update Status</button></a></td><?php
                                echo '</tr>';
                                echo '</table>';
                            }
                        ?><?php
                        }
                    ?>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                    <?php
                        $query2 = "SELECT * FROM resume WHERE vetting = '2' ORDER BY last_edit_time DESC ";
                        $result2 = mysqli_query($connect, $query2);

                        if(mysqli_num_rows($result2)==0){
                            ?> No data <?php
                        }else{
                        ?>
                        <br>
                            <table>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th style="width: 130px;">Vetting Status</th>
                                <th style="width: 130px;">Update Status</th>
                            </table>
                        <?php
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                echo '<table>';
                                echo '<tr>';
                                echo '<td>'.$row2['name'].'</td>';
                                echo '<td>'.$row2['email'].'</td>';
                                echo '<td style="width: 130px;">';
                                if($row2['vetting'] == "0"){
                                    echo "No submission";
                                }
                                else if($row2['vetting'] == "1")
                                {
                                    echo "Pending";
                                }else if($row2['vetting'] == "2"){
                                    echo "Reject";
                                } else if($row2['vetting'] == "3"){
                                    echo "Approved";
                                }else if($row2['vetting'] == "20"){
                                    echo "Reject Without Email Send";
                                }
                                '</td>';
                                echo '<td style="width: 130px; text-align: center;">'?><a href="resume?email=<?php echo $row2["email"];?>"><button type="submit">Update Status</button></a></td><?php
                                echo '</tr>';
                                echo '</table>';
                            }
                        ?><?php
                        }
                    ?>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                    <?php
                        $query20 = "SELECT * FROM resume WHERE vetting = '20' ORDER BY last_edit_time DESC ";
                        $result20 = mysqli_query($connect, $query20);

                        if(mysqli_num_rows($result20)==0){
                            ?> No data <?php
                        }else{
                        ?>
                        <br>
                            <table>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th style="width: 130px;">Vetting Status</th>
                                <th style="width: 130px;">Update Status</th>
                            </table>
                        <?php
                            while ($row20 = mysqli_fetch_assoc($result20)) {
                                echo '<table>';
                                echo '<tr>';
                                echo '<td>'.$row20['name'].'</td>';
                                echo '<td>'.$row20['email'].'</td>';
                                echo '<td style="width: 130px;">';
                                if($row20['vetting'] == "0"){
                                    echo "No submission";
                                }
                                else if($row20['vetting'] == "1")
                                {
                                    echo "Pending";
                                }else if($row20['vetting'] == "2"){
                                    echo "Reject";
                                } else if($row20['vetting'] == "3"){
                                    echo "Approved";
                                }else if($row20['vetting'] == "20"){
                                    echo "Reject Without Email Send";
                                }
                                '</td>';
                                echo '<td style="width: 130px; text-align: center;">'?><a href="resume?email=<?php echo $row20["email"];?>"><button type="submit">Update Status</button></a></td><?php
                                echo '</tr>';
                                echo '</table>';
                            }
                        ?><?php
                        }
                    ?>
                    </div>
                    <div id="menu4" class="tab-pane fade">
                    <?php
                        $query3 = "SELECT * FROM resume WHERE vetting = '3' ORDER BY db_time DESC ";
                        $result3 = mysqli_query($connect, $query3);

                        if(mysqli_num_rows($result3)==0){
                            ?> No data <?php
                        }else{
                        ?>
                        <br>
                            <table>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th style="width: 130px;">Vetting Status</th>
                                <th style="width: 130px;">Update Status</th>
                                
                            </table>
                        <?php
                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                echo '<table>';
                                echo '<tr>';
                                echo '<td>'.$row3['name'].'</td>';
                                echo '<td>'.$row3['email'].'</td>';
                                echo '<td style="width: 130px;">';
                                if($row3['vetting'] == "0"){
                                    echo "No submission";
                                }
                                else if($row3['vetting'] == "1")
                                {
                                    echo "Pending";
                                }else if($row3['vetting'] == "2"){
                                    echo "Reject";
                                } else if($row3['vetting'] == "3"){
                                    echo "Approved";
                                }else if($row3['vetting'] == "20"){
                                    echo "Reject Without Email Send";
                                }
                                '</td>';
                                echo '<td style="width: 130px; text-align: center;">'?><a href="resume?email=<?php echo $row3["email"];?>"><button type="submit">Update Status</button></a></td><?php
                                echo '</tr>';
                                echo '</table>';
                                
                            }
                        ?><?php
                        }
                    ?>
                    </div>
                    <div id="menu5" class="tab-pane fade">
                    <div class="container">
                    <?php
                        $query0 = "SELECT * FROM resume WHERE vetting = '0' ORDER BY last_edit_time DESC ";
                        $result0 = mysqli_query($connect, $query0);

                        if(mysqli_num_rows($result0)==0){
                            ?> No data <?php
                        }else{
                        ?>
                        <br>
                            <table>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th style="width: 130px;">Vetting Status</th>
                                <th style="width: 130px;">Update Status</th>
                            </table>
                        <?php
                            while ($row0 = mysqli_fetch_assoc($result0)) {
                                echo '<table>';
                                echo '<tr>';
                                echo '<td>'.$row0['name'].'</td>';
                                echo '<td>'.$row0['email'].'</td>';
                                echo '<td style="width: 130px;">';
                                if($row0['vetting'] == "0"){
                                    echo "No submission";
                                }
                                else if($row0['vetting'] == "1")
                                {
                                    echo "Pending";
                                }else if($row0['vetting'] == "2"){
                                    echo "Reject";
                                } else if($row0['vetting'] == "3"){
                                    echo "Approved";
                                }else if($row0['vetting'] == "20"){
                                    echo "Reject Without Email Send";
                                }
                                '</td>';
                                echo '<td style="width: 130px; text-align: center;">'?><a href="resume?email=<?php echo $row0["email"];?>"><button type="submit">Update Status</button></a></td><?php

                                echo '</tr>';
                                echo '</table>';
                            }
                        ?><?php
                        }
                    ?>
                    </div>
                    </div>
                </div>
        </div>
        <br><br><br><br>
    </div>



    <!-- Bootstrap CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>
