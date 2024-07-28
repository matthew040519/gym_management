<?php include('../include/member_session.php'); ?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <?php include('../include/title.php'); ?>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
    <script src="https://www.paypal.com/sdk/js?client-id=AWbRzoA08hLbiOFm8J5Htm-z5STS47eQ1n4VmQzel-YFzQnIakp5DUNyjXJIVtVrBoiTcAsXN9s-pdL2&currency=PHP"></script>

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

       <?php include('../include/sidebar.php'); ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

         <?php include('../include/navbar.php'); ?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Listing /</span> Instructor</h4>
              <div class="row mb-5">
                <?php 
                $package = $_GET['package'];
                $query = mysqli_query($con, "SELECT * FROM instructor where active = 1");
                while($row = mysqli_fetch_array($query)){
                ?>
                  <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                    <img class="card-img-top" style="height: 300px;" src="../assets/img/profile/<?php echo $row['image']; ?>" alt="Card image cap" />
                    <div class="card-body">
                      <h4 class="card-title" style="font-weight: bold;"><?php echo $row['fullname']; ?></h4>
                      
                      <p class="card-text">
                        <blockquote><?php echo $row['biography']; ?></blockquote>
                      </p>
                      <!-- <a href="javascript:void(0)" class="btn btn-outline-primary">Go somewhere</a> -->
                      <h5>Expertise:</h5>
                      <ul>
                        <?php
                            $id = $row['id'];
                            $instructor_skills = mysqli_query($con, "SELECT * FROM instructor_skills 
                            INNER JOIN instructor_types ON instructor_skills.type_id=instructor_types.id 
                            WHERE instructor_skills.instructor_id = '$id'");

                            while($instructor_skills_data = mysqli_fetch_array($instructor_skills)){
                        ?>
                            <li><?php echo $instructor_skills_data['types']; ?></li>
                        <?php } ?>
                      </ul>
                      </div>
                      <div class="modal-footer">
                          <a href="transaction.php?package=<?php echo $package; ?>&instructor_id=<?php echo $row['id']; ?>" class="btn btn-outline-success">Choose this Instructor!</a>
                      </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
        
            <!-- / Content -->

            <?php


                if(isset($_POST['submit']))
                {
                    $package_id = $_GET['package'];
                    $id = $_POST['instructor_id'];
                    $member_id = $_SESSION['member_id'];
                    $schedule = $_POST['schedule'];
                    $mop = $_POST['mop'];
                    date_default_timezone_set('Asia/Manila');
                    $tdate = date("Y-m-d");

                    $query = mysqli_query($con, "INSERT INTO member_package (`member_id`, `package_id`, `instructor_id`, `tdate`, `schedule`, `MOP`)
                    VALUES ('$member_id', '$package_id', '$id', '$tdate', '$schedule', '$mop')");

                    if($query)
                    {
                        echo "<script>alert('Successfully Subscribe!')</script>";
                    }

                }
            
            
            ?>
            

            <!-- Footer -->
            <?php include('../include/footer.php'); ?>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>
    <script>
        new DataTable('#example', {
            responsive: true
        });
    </script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    
  </body>
</html>
