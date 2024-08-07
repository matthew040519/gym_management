<?php include('../include/admin_session.php'); ?>
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
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Listing /</span> Package</h4>
                <div class="card">
                  <div class="card-header">
                        <button
                                type="button"
                                class="btn btn-primary mb-3"
                                data-bs-toggle="modal"
                                data-bs-target="#modalCenter"
                              >
                              <i class='bx bx-user-plus' ></i> Add Package
                      </button>
                  </div>
                  <div class="card-body">
                        <table id="example" class="table table-striped nowrap" style="width:100%">
                          <thead>
                              <tr>
                                  <th>Package Name</th>
                                  <th style="text-align: left;">Rate</th>
                                  <th>Duration</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                              $query = mysqli_query($con, "SELECT * FROM package WHERE active = 1");
                              while ($row = mysqli_fetch_array($query)) {
                              ?>
                              <tr>
                                  <td><?php echo $row['package_name']; ?></td>
                                  <td style="text-align: left;"><?php echo number_format($row['amount'], 2); ?></td>
                                  <td><?php echo $row['duration']; ?></td>
                                  <td><a href="#" data-bs-toggle="modal"
                                data-bs-target="#modalCenter<?php echo $row['id']; ?>" class="btn btn-success btn-sm"><i class='bx bx-edit-alt'></i></a> |
                                <a href="#" data-bs-toggle="modal"
                                data-bs-target="#modalCenterdelete<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"><i class='bx bx-no-entry'></i></i></a></td>
                              </tr>
                              <?php 
                              include('modals/edit_packages.php');
                              include('modals/delete_packages.php');
                             } ?>
                          </tbody>
                      </table>
                  </div>
              </div>
                
                
            </div>

            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Add Package</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <form method="POST">
                                    <div class="row g-2">
                                        <div class="col mb-3">
                                            <label for="emailWithTitle" class="form-label">Package</label>
                                            <input
                                            type="text"
                                            name="package"
                                            id="emailWithTitle"
                                            class="form-control"
                                            placeholder="Package"
                                            />
                                        </div>
                                        <div class="col mb-3">
                                            <label for="dobWithTitle" class="form-label">Rate</label>
                                            <input
                                            type="number"
                                            id="dobWithTitle"
                                            name="rate"
                                            class="form-control"
                                            placeholder="Rate"
                                            />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <div class="col mb-3">
                                                <label for="emailWithTitle" class="form-label">Duration</label>
                                                <select id="" name="duration" class="form-control">
                                                    <option value="Week">Week</option>
                                                    <option value="Month">Months</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col mb-3 mt-4" >
                                                <input
                                                style="margin-top: 30px;"
                                                    type="number"
                                                    name="count"
                                                    id="emailWithTitle"
                                                    class="form-control"
                                                    placeholder="Duration"
                                                    />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                      <div class="col mb-3 mt-4" >
                                          <label for="emailWithTitle" class="form-label">Details</label>
                                          <textarea name="details" class="form-control" id=""></textarea>
                                      </div>
                                    </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                <input type="submit" class="btn btn-primary" name="submit" value="Save Changes">
                        </form>
                              </div>
                            </div>
                          </div>
                        </div>
            <!-- / Content -->
            <?php

              if(isset($_POST['submit'])) {

                  $package = $_POST['package'];
                  $rate = $_POST['rate'];
                  $duration = $_POST['duration'];
                  $count = $_POST['count'];
                  $details = $_POST['details'];

                  $complete_duration = $count.' '.$duration;
                  $complete_rate = $rate;

                  mysqli_query($con, "INSERT INTO package (`package_name`, `amount`, `duration`, `type`, `count`) 
                  VALUES ('$package', '$complete_rate', '$complete_duration', '$duration', '$count')");

                  echo "<script>location.replace('packages.php')</script>";

              }


              if(isset($_POST['update']))
                        {
                            $package_id = $_POST['id'];
                            $package = $_POST['package'];
                            $rate = $_POST['rate'];
                            $duration = $_POST['duration'];
                            $count = $_POST['count'];
                            $details = $_POST['details'];
          
                            $complete_duration = $count.' '.$duration;
                            $complete_rate = $rate;

                            mysqli_query($con, "UPDATE package SET `package_name` = '$package', `amount` = '$rate', `duration` = '$complete_duration', 
                            `type` = '$duration', `count` = '$count', `details` = '$details' WHERE `id` = '$package_id'");
                            echo "<script>location.replace('packages.php')</script>";
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
