<?php

  error_reporting(0);
  session_start();
  include '../../db-con.php';

    if($_SERVER["HTTP_HOST"] == "localhost") {

        $redirect = "http://" . $_SERVER["HTTP_HOST"] . "/TCD2020-resume";

    }else{

        $redirect = "http://" . $_SERVER["HTTP_HOST"] ;

    }

    if(!isset($_COOKIE['email']) || !isset($_SESSION["email"])){
        header("Location:login");
    }

?>

<!doctype html>
<html lang="en">
  <head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-KHBFLD56B2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-KHBFLD56B2');
    </script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/phosphor-icons"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!--Own Css-->
    <link rel="stylesheet" href="../css/dashboard.css" type="text/css">

    <!--Sweet Alerts-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- CDN for jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!--Font Awesome-->
<!--     <script src="https://kit.fontawesome.com/2224ab56d8.js" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> -->

    <title>Company Dashboard | TCD</title>
    <link rel="icon" type="image/png" href= "../../../img/favicon_io/favicon.ico">

    <style>

    </style>

    <!-- <script src="../js/dashboard.js"></script> -->
    <script src="../js/block.js" defer></script>
    
    <script>

    $(document).ready(function() {

        $("#table-body").load("inctable ", {

            search: $("#search").val(),
            sort: $("input[name='sort-type']:checked").val(),
            diploma: $('#diploma').is(":checked"),
            other: $('#postgraduate').is(":checked"),
            degree: $('#degree').is(":checked"),
            yr1: $('#yr1').is(":checked"),
            yr2: $('#yr2').is(":checked"),
            yr3: $('#yr3').is(":checked"),
            yr4: $('#yr4').is(":checked"),
            approved: $('#aStatus').is(":checked"),
            declined: $('#dStatus').is(":checked"),

        }, tableLoaderOff);

    });

    $(document).ready(function() {

        $('#save').click(function() {

            $("#table-body").load("inctable ", {

                search: $("#search").val(),
                sort: $("input[name='sort-type']:checked").val(),
                diploma: $('#diploma').is(":checked"),
                other: $('#postgraduate').is(":checked"),
                degree: $('#degree').is(":checked"),
                yr1: $('#yr1').is(":checked"),
                yr2: $('#yr2').is(":checked"),
                yr3: $('#yr3').is(":checked"),
                yr4: $('#yr4').is(":checked"),
                approved: $('#aStatus').is(":checked"),
                declined: $('#dStatus').is(":checked"),

            }, tableLoaderOff);

        });

    });

    $(document).ready(function() {

        $('#filter').click(function() {

            $("#table-body").load("inctable", {

                search: $("#search").val(),
                sort: $("input[name='sort-type']:checked").val(),
                diploma: $('#diploma').is(":checked"),
                other: $('#postgraduate').is(":checked"),
                degree: $('#degree').is(":checked"),
                yr1: $('#yr1').is(":checked"),
                yr2: $('#yr2').is(":checked"),
                yr3: $('#yr3').is(":checked"),
                yr4: $('#yr4').is(":checked"),
                approved: $('#aStatus').is(":checked"),
                declined: $('#dStatus').is(":checked"),

            }, tableLoaderOff);

        });

    });

    $(document).ready(function() {

        var limitCount = 20;

        $('#load-more').click(function() {

            limitCount = limitCount + 20;

            $("#table-body").load("inctable", {

                search: $("#search").val(),
                sort: $("input[name='sort-type']:checked").val(),
                diploma: $('#diploma').is(":checked"),
                other: $('#postgraduate').is(":checked"),
                degree: $('#degree').is(":checked"),
                yr1: $('#yr1').is(":checked"),
                yr2: $('#yr2').is(":checked"),
                yr3: $('#yr3').is(":checked"),
                yr4: $('#yr4').is(":checked"),
                approved: $('#aStatus').is(":checked"),
                declined: $('#dStatus').is(":checked"),
                limit: limitCount

            }, loadMoreLoading);

        });

    });

    $(document).ready(function() {

        $('#select-all').click(function() {

            if($('#select-all').is(":checked")){

                var checkboxes = document.getElementsByName('id[]');
                var i =0 ;

                for (var checkbox of checkboxes) {
                    checkbox.checked = this.checked;
                    i++;
                }

                document.querySelector("#selected").innerHTML = i + " Selected";

            }else{

                var checkboxes = document.getElementsByName('id[]');
                i=0;

                for (var checkbox of checkboxes) {
                    checkbox.checked = this.Unchecked;
                }
                    
            }

            document.querySelector("#selected").innerHTML = i + " Selected";

        });

    });

    function signupsuccess(){

        const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: 'Signed in as <?php echo $_SESSION["username"] ?>'
        })

    }

    </script>

    <style>
    
    </style>
  </head>

  <body>

    <!--Navbar-->
    <div class="header" id="myHeader">
        <nav class = "navbar px-5 py-2 navbar-expand-lg navbar-light" id="navbar">

            <a class = "navbar-brand" href = "dashboard" id = "text"><img src="../../../img/favicon_io/favicon.ico" height="30px" width="30px" alt=""><span id="header-word">&nbsp&nbspTech Career Days</span></a>


            <!--Button-->

            <nav class="navbar navbar-expand-lg">
                <button type="button" id="sidebarCollapse" class="btn btn-warning">
                    <a href="./logout"><span>Log Out</span></a>
                </button>
            </nav>

        </nav>

    </div>

    <br>

    <div id="background-dimmed" class=""></div>

    <div class="main-wrapper" id="main">

    <!-- Top Bar -->
    <h5 class="section-title"><img src="../../../img/icons/details.svg" alt="" height="25px" width="25px"/>&nbsp&nbspAnalytics Overview</h5>
    
    <br>

    <div class="welcome-bar">

        <div class="topbar-wrapper">

            <div class="welcome-card">

                <h4>Hey,&nbspwelcome back <?php echo $_SESSION["username"] ?>!</h4>
                <br>
                <h6>Wish you a good day ahead!!! - TCD TEAM</h6>
                <br>

            </div>

            <div class="cards-group">

                <div class="topbar" id="item1" >

                    <?php

                        /* $newDate = date('Y-m-d h:i:s', strtotime('-7 days')); */

                        /* $sqlSub = "SELECT * FROM resume WHERE last_edit_time >= '". $newDate ."' AND vetting = 3"; */
                        $sqlSub = "SELECT * FROM resume WHERE vetting != '0'";
                        $resultSub = mysqli_query($connect, $sqlSub);
                        $subRowNum = mysqli_num_rows($resultSub);

                        echo '<span id="numbers">'.$subRowNum.'</span>';
                        echo '<span>Total Numbers of Submissions</span>';

                    ?>

                </div>

                <div class="topbar" id="item2">

                    <?php

                        $sqlTotalSub = "SELECT * FROM resume WHERE vetting = 3";
                        $resultTotal = mysqli_query($connect, $sqlTotalSub);
                        $rowsTotal = mysqli_num_rows($resultTotal);

                        echo '<span id="numbers">' . $rowsTotal . '</span>&nbsp&nbspTotal Accepted Submissions ';

                    ?>

                </div>

            </div>

        </div>

    </div>

    <br>
    <br>

    <h5 class="section-title"><img src="../../../img/icons/lists.svg" alt="" height="25px" width="25px"/>&nbsp&nbspDetails</h5>

    <br>

    <div class="table-wrapper">

        <div class="table-top">

            <div class="table-title">Submission Lists&nbsp&nbsp<a href="/public/company/src/viewAll.php" target="_blank">View All</a></div>

            <div class="selections">

                <a class="filter" href="#" onclick="toggle(); toggleLoader();"><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="#000000" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><line x1="64" y1="128" x2="192" y2="128" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line><line x1="24" y1="80" x2="232" y2="80" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line><line x1="104" y1="176" x2="152" y2="176" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line></svg></a>

                <a class="filter" href="#" onclick="toggleSearch(); toggleLoader();" ><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="#000000" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><circle cx="116" cy="116" r="84" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle><line x1="175.39356" y1="175.40039" x2="223.99414" y2="224.00098" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line></svg></a>

                <a href="#" onclick="toggleDownload();" class="bulk-download"><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="#000000" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><path d="M200,224.00005H55.99219a8,8,0,0,1-8-8V40a8,8,0,0,1,8-8L152,32l56,56v128A8,8,0,0,1,200,224.00005Z" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path><polyline points="152 32 152 88 208.008 88" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></polyline><polyline points="100 156 128 184 156 156" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></polyline><line x1="128" y1="120" x2="128" y2="184" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line></svg></a>

            </div>

        </div>

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
                <!-- <th scope="col">Status</th> -->
                <th scope="col" class="hiddenExtra2">Download</th>
                <th scope="col">Preview</th>
                <th scope="col">Status</th>
                
                </tr>
            </thead>

            <tbody id="table-body">

            <?php

                /* include'./inctable'; */

            ?>

            </tbody>

        </table>

        <div class="table-loader-bar active" id="table-loader">

            <div class="table-loader-wrap">
            <span class="table-loader"><span class="table-loader-title"><img src="../../../img/loader-ring.svg" height="80px" width="80px" style="background-color: black;" alt=""></span>
            </div>

        </div>

        <br>

            <a href="#" id="load-more" class="load-more" onclick="loadMoreLoading()"><span class="text">Load More Results</span><span><i class="ph-circles-three load-more-icon"></i></span></a>

    </div>

    </div>

    <br>
    <br>

    <!--Filter PopUp-->
    <div class="col-12" id="popup">

        <div class="header">

            <h5 class="popup-title"><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="#000000" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><line x1="64" y1="128" x2="192" y2="128" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line><line x1="24" y1="80" x2="232" y2="80" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line><line x1="104" y1="176" x2="152" y2="176" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line></svg>&nbsp&nbspFilter & Sort</h5>

            <a href="#" id="exit-popup" onclick="toggle(); tableLoaderOff();"><i class="ph-x"></i></a>

        </div>

        <hr>

        <form class="col-12" action="" method="post">

            <div class="sort-Popup" id="sort-popup">

                <h6>Sort By</h6>

                <div class="sort-field">

                    <input type="radio" id="alphabatical-order" name="sort-type" value="alphabatical-order" class="sort-type">
                    <label for="alphabatical-order" class="select-sort">Alphabetical Order </label>
                    <div id="field-icon1"><img src="../../../img/icons/checked.svg" alt="" height="15px" width="15px"></div>

                </div>

                <div class="sort-field">

                    <input type="radio" id="submission-date" name="sort-type" value="submission-date" class="sort-type">
                    <label for="submission-date" class="select-sort">Submission Date</label>
                    <div id="field-icon2"><img src="../../../img/icons/checked.svg" alt="" height="15px" width="15px"></div>

                </div>

            </div>

            <br>

                <h6>Filter By</h6>

                <br>

                <div class="checkboxes">

                    <div class="by-year">

                        <div class="input">
                            <input type="checkbox" name="study-type" id="diploma" class="study-type" value="Diploma">
                            <label for="diploma">Diploma</label>
                        </div>

                        <div class="input">
                            <input type="checkbox" name="study-type" id="degree" class="study-type" value="Degree">
                            <label for="degree">Degree</label>
                        </div>

                        <div class="input">
                            <input type="checkbox" name="study-type" id="postgraduate" class="study-type" value="Postgraduate">
                            <label for="postgraduate">Postgraduate</label>
                        </div>

                    </div>

                    <hr>

                    <div class="by-field">

                        <div class="first-block">

                            <div class="input">
                                <input type="checkbox" id="yr1" class="study-year" value="Year 1">
                                <label for="yr1">Year 1</label>
                            </div>

                            <div class="input">
                                <input type="checkbox" id="yr2" class="study-year" value="Year 2">
                                <label for="yr2">Year 2</label>
                            </div>

                        </div>

                        <br>

                        <div class="sec-block">

                            <div class="input">
                                <input type="checkbox" id="yr3" class="study-year" value="Year 3">
                                <label for="yr3">Year 3</label>
                            </div>

                            <div class="input">
                                <input type="checkbox" id="yr4" class="study-year" value="Year 4">
                                <label for="yr4">Year 4</label>
                            </div>

                        </div>

                    </div>

                    <hr>

                    <div class="by-status">

                        <div class="input">
                            <input type="checkbox" name="status" id="aStatus" class="status-type" value="1">
                            <label for="aStatus">Starred</label>
                        </div>

                        <div class="input">
                            <input type="checkbox" name="status" id="dStatus" class="status-type" value="2">
                            <label for="dStatus">Ignored</label>
                        </div>

                    </div>
                    <hr>

                </div>

            </form>
            
                <br>
                <br>
            <button id="filter" onclick="toggle()" onclick="toggleLoader()" type="submit" name="submit" class="btn popup">Save</button>
    
    </div>

    <div class="col-12" id="popup-search">

        <div class="header">

            <h5 class="popup-title"><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="#000000" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><circle cx="116" cy="116" r="84" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle><line x1="175.39356" y1="175.40039" x2="223.99414" y2="224.00098" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line></svg>&nbsp&nbspSearch</h5>

            <a href="#" id="exit-popup" onclick="toggleSearch(); tableLoaderOff();"><i class="ph-x"></i></a>

        </div>

        <hr>

        <!-- <form class="col-12" action="" method="post"> -->

            <input id="search" type="text" autocomplete="on" name="search" class="form-control" placeholder="Search..."><i class="fas fa-search icon"></i>

        <!-- </form> -->

        <br>
            
        <button id="save" onclick="toggleSearch()" type="submit" name="submit" class="btn popup">Search</button>

    </div>

    <div class="col-12" id="popup-download">

        <div class="header">

            <h5 class="popup-title"><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="#000000" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><path d="M200,224.00005H55.99219a8,8,0,0,1-8-8V40a8,8,0,0,1,8-8L152,32l56,56v128A8,8,0,0,1,200,224.00005Z" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path><polyline points="152 32 152 88 208.008 88" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></polyline><polyline points="100 156 128 184 156 156" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></polyline><line x1="128" y1="120" x2="128" y2="184" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line></svg>&nbsp&nbspBulk Download</h5>

            <a href="#" id="exit-popup" onclick="toggleDownload();"><i class="ph-x"></i></a>

        </div>

        <hr>

        <form class="col-12" action="./downloadAll" method="post">

            <div class="download-checkboxes-wrapper">

                <?php

                    $sql = "SELECT * from resume WHERE vetting = 3";
                    $resultDownload = mysqli_query($connect, $sql);
                    $downloadRow = mysqli_num_rows($resultDownload);
                    $i = 0;

                    while($download = mysqli_fetch_assoc($resultDownload)){

                        echo '
                        
                            <div class="download-checkboxes">
                            
                                <label for="'.$download['id'].'">'.$download['name'].'</label>
                                <input type="checkbox" name="id[]" onchange="calcCheckboxes();" class="download-checkboxes" id="'.$download['id'].'" value="'.$download['id'].'"/>

                            </div>
                        ';
                        $i++;
                            
                    }

                ?>

            </div>

            <br>
            
            <input type="checkbox" id="select-all">
            <label id="selected" for="select-all">Select All</label>

            <button id="download" type="submit" name="submit" class="btn popup">Download -><!-- <img src="../../../img/download-loading.svg" alt="" height="25px" width="25px"> --></button>

        </form>

    </div>

    <!-- button for scroll to top -->
    <a id="button"><img src="../../../img/icons/top.svg" alt=""></a>

    <div class="loader-wrapper">
      <span class="loader"><span class="loader-title">TCD<span></span>
    </div>

    <script>

    </script> 

    <!-- Own Js -->
    <script src="../js/dashboard.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <?php

        if(isset($_SESSION['loggedin'])){
            echo '<script type="text/javascript">signupsuccess();</script>';
            //signupsuccess() will activate sweet alert function above
        }

    ?>

  </body>
</html>
