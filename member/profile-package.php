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
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Profile</h4>
            
            <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link" href="profile.php"><i class="bx bx-user me-1"></i> Account</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="profile-package.php"
                        ><i class="bx bx-link-alt me-1"></i> Package</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="change-password.php"
                        ><i class="bx bx-key me-1"></i> Change Password</a
                      >
                    </li>
                    
                  </ul>
                  <div class="row mb-5">
                <?php 
                $id = $_SESSION['member_id'];
                $query = mysqli_query($con, "SELECT * FROM package 
                INNER JOIN member_package ON member_package.package_id=package.id
                WHERE member_package.member_id = $id AND finish = 0");
                while($row = mysqli_fetch_array($query)){
                ?>
                  <div class="col-md-6 col-lg-6 mb-3">
                  <div class="card h-100">
                    <img class="card-img-top" src="../include/gym_logo.jpg" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title" style="font-weight: bold;"><?php echo $row['package_name']; ?></h5>
                      <h4>&#8369; <?php echo number_format($row['amount'], 2); ?></h4>
                      <p class="card-text">
                        <blockquote><?php echo $row['details']; ?></blockquote>
                      </p>
                      <!-- <a href="javascript:void(0)" class="btn btn-outline-primary">Go somewhere</a> -->
                      <ul>
                        <li>Duration: <?php echo $row['duration']; ?></li>
                      </ul>
                      </div>
                  </div>
                </div>
                <?php  } ?>
                <?php 
                $query = mysqli_query($con, "SELECT * FROM instructor
                INNER JOIN member_package ON member_package.instructor_id=instructor.id
                WHERE member_package.member_id = $id AND finish = 0");
                while($row = mysqli_fetch_array($query)){
                ?>
                  <div class="col-md-6 col-lg-6 mb-3">
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
                  </div>
                </div>
                <?php } ?>
              </div>
                  
                  <!-- <div class="card">
                    <h5 class="card-header">Delete Account</h5>
                    <div class="card-body">
                      <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                          <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                          <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                      </div>
                      <form id="formAccountDeactivation" onsubmit="return false">
                        <div class="form-check mb-3">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            name="accountActivation"
                            id="accountActivation"
                          />
                          <label class="form-check-label" for="accountActivation"
                            >I confirm my account deactivation</label
                          >
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                      </form>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>

            <?php

                            if(isset($_POST['subs']))
                            {
                                date_default_timezone_set('Asia/Manila');
                                $tdate = date("Y-m-d");
                                $id = $_POST['id'];
                                $user_id = $_SESSION['member_id'];
                                $queryInsert = mysqli_query($con, "INSERT INTO member_package (`member_id`, `package_id`, `tdate`) 
                                VALUES ('$user_id', '$id', '$tdate')");
                                if($queryInsert)
                                {
                                    echo "<script>location.replace('packages.php?success')</script>";
                                }
                                else
                                {
                                    echo "<script>alert('Something went wrong!')</script>";
                                }
                                
                            }
                        
                        ?>
            

            <!-- / Content -->
            

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
