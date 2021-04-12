<?php

  error_reporting(0);
  session_start();
  include'../../db-con.php';
  $_SESSION['email'];
  $compId = $_SESSION['compId'];

    if(!isset($_SESSION['email'])){
    header("Location:login");
}
    $id = $_GET["id"];

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/phosphor-icons"></script>

    <!--Own Css-->
    <link rel="stylesheet" href="../css/moreDetails.css">

    <!--Sweet Alerts-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- CDN for jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!--Font Awesome-->
<!--     <script src="https://kit.fontawesome.com/2224ab56d8.js" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
 -->
    <title>Company More Details | TCD</title>
    <link rel="icon" type="image/png" href= "../../../img/favicon_io/favicon.ico">

    <style>

.status-bar{

display: flex;

}

    </style>

    <script>

    $(document).ready(function() {

        $(".status-bar").load("./incats", {

            compId : <?php echo $compId ?>,
            id : <?php echo $id ?>,

        }, updateAnimation);

    });

    function updateStatusA(){

        $(".status-bar").load("./incats", {

            status : 1,
            compId : <?php echo $compId ?>,
            id : <?php echo $id ?>,

        }, updateAnimation);

    }

    function updateStatusD(){

        $(".status-bar").load("./incats", {

            status : 2,
            compId : <?php echo $compId ?>,
            id : <?php echo $id ?>,

        }, updateAnimation);

    }

    function updateStatusR(){

        $(".status-bar").load("./incats", {

            status : 0,
            compId : <?php echo $compId ?>,
            id : <?php echo $id ?>,

        }, updateAnimation);

    }

/*     $(document).ready(function() {

        $('#status-a').click(function() {

            console.log('try');

            $(".status-bar").load("./incats", {

                status : 1,
                compId : <?php echo $compId ?>,
                id : <?php echo $id ?>,

            });

        });

    }); */

/*     $(document).ready(function() {

        $('#status-update-d').click(function() {

            console.log('try');

            $(".status-bar").load("./incats", {

                status : 2,
                compId : <?php echo $compId ?>,
                id : <?php echo $id ?>,

            });

        });

    }); */

    </script>

  </head>
  <body>

    <!--Navbar-->
    <div class="header" id="myHeader">
        <nav class = "navbar px-5 py-2 navbar-expand-lg navbar-light" id="navbar">

            <a class = "navbar-brand" href = "#" id = "text"><img src="../../../img/favicon_io/favicon.ico" height="30px" width="30px" alt=""><span id="header-word">&nbsp&nbspTech Career Days</span></a>


            <!--Button-->

            <nav class="navbar navbar-expand-lg">
                <button type="button" id="sidebarCollapse" class="btn btn-warning" onclick="dropDown()">
                    <a href="./logout"><span>Log Out</span></a>
                </button>
            </nav>

        </nav>

    </div>

    <div class="topbar">

        <a class="back-button" href="./dashboard"><img src="../../../img/icons/left.svg" alt=""> Back to dashboard</a>

        <div class="more-button-wrapper">

            <a class="more-button" href="#" onclick="toggleLists()"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#000000" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><g><circle cx="128.00098" cy="128" r="12"></circle><circle cx="64.00098" cy="128" r="12"></circle><circle cx="192.00098" cy="128" r="12"></circle></g></svg></a>

            <div class="list-wrapper" id="list-wrapper">

                <?php

                    $sqlLists = "SELECT * FROM resume WHERE vetting = 3";
                    $resultLists = mysqli_query($connect, $sqlLists);
                    $i = 1;

                    while($rowLists = mysqli_fetch_assoc($resultLists)){

                        echo '

                            <div class="lists">

                                <span>'.$i.'</span>

                                <a href="./moreDetails?id='.$rowLists["id"].'">'.$rowLists['name'].'</a>

                            </div>

                            <hr>

                        ';

                        $i++;

                    }

                ?>

            </div>

        </div>

    </div>

    <?php

        $sqlTotalSub = "SELECT * FROM resume WHERE vetting = 3 AND id = $id";
        $resultTotal = mysqli_query($connect, $sqlTotalSub);
        $rows = mysqli_fetch_assoc($resultTotal);

    ?>

    <div class="wrapper">

        <div class="details-wrap">

            <div class="details-card">

                <div class="details-top">

                    <div class="title">
                        Details
                    </div>

                    <div class="status-wrapper">

                        <span class="status-loading active"><i class="ph-circles-three status-load"></i></span>

                        <div class="status-bar">

                        </div>

                    </div>

                </div>

                <div class="details-window">

                    <b>Name :</b>
                    <br>
                    <p class="field"><?php echo $rows["name"]; ?></p>
                    <hr>

                    <b>Phone :</b>
                    <br>
                    <p class="field"><a href="tel:<?php echo $rows["phone_number"] ?>"><?php echo $rows["phone_number"]; ?></a></p>
                    <hr>

                    <b>Email :</b>
                    <br>
                    <p class="field"><a href="mailTo:<?php echo $rows["email"] ?>"><?php echo $rows["email"]; ?></a></p>
                    <hr>

                    <b>University Name :</b>
                    <br>
                    <p class="field"><?php echo $rows["uni_name"]; ?></p>

                    <hr>

                    <b>Study Type :</b>
                    <br>
                    <p class="field"><?php echo $rows["study_type"]; ?></p>

                    <hr>

                    <b>Year Study :</b>
                    <br>
                    <p class="field"><?php echo $rows["year_study"]; ?></p>

                    <hr>

                    <b>Field Of Study :</b>
                    <br>
                    <p class="field"><?php echo $rows["field_study"]; ?></p>

                    <hr>

                    <b>Job Type :</b>
                    <br>
                    <p class="field"><?php echo $rows["job_type"]; ?></p>

                    <hr>

                    <b>Phone Number :</b>
                    <br>
                    <p class="field"><?php echo $rows["phone_number"]; ?></p>

                </div>

            </div>

        </div>

        <div class="preview-wrap">

            <div class="preview-card">

                <div class="title">
                    <p>Resume Preview</p>
                    <a class="download-button" href="./download?id=<?php echo $id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#000000" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><polyline points="86 110 128 152 170 110" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></polyline><line x1="128" y1="39.97056" x2="128" y2="151.97056" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line><path d="M224,136v72a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V136" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path></svg>&nbspdownload</a>
                </div>

                <div class="pdf-window">

                    <?php

                        if(base64_encode($rows['file'])){
                            ?><object class="pdf" data="data:application/pdf;base64,<?php echo base64_encode($rows['file']) ?>" type="application/pdf" ></object>

                            <?php
                        }else{
                            ?><span class="empty">User did not submit any resume.</span><?php
                        }

                    ?>

                </div>

            </div>

        </div>

    </div>

    <a id="button"></a>

    <div class="loader-wrapper">
      <span class="loader"><span class="loader-title">TCD<span></span>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script>

        function updateAnimation(){

            var span = document.querySelector(".status-loading");
            span.classList.toggle("active");

        }

        $(window).on("load",function(){
            $(".loader-wrapper").fadeOut(500);
        });

        const DROPDOWN = document.querySelector("#menu-dropdown");

        function dropDown() {

            if(DROPDOWN.classList.contains('active')) {

                DROPDOWN.classList.remove('active');

            }else{

                DROPDOWN.classList.add('active');

            }

        }

        var btn = $('#button');

        $(window).scroll(function() {

            if($(window).scrollTop() > 20) {

                btn.addClass('show');

            }else{

                btn.removeClass('show');

            }

        });

        btn.on('click', function(e) {

            e.preventDefault();
            $('html, body').animate({scrollTop:0}, '300');

        });

        var list = document.querySelector('#list-wrapper');
        function toggleLists(){

            list.classList.toggle('active');

        }

    </script>

  </body>
</html>
