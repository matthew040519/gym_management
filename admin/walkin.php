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
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaction /</span> Walk In</h4>
                <div class="card">
                  <div class="card-header">
                      <button
                              type="button"
                              class="btn btn-primary mb-3"
                              data-bs-toggle="modal"
                              data-bs-target="#modalCenter"
                            >
                            <i class='bx bx-user-plus' ></i> Add Transaction
                    </button>
                  </div>
                  <div class="card-body">
                  <table id="example" class="table table-striped nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Member</th>
                            <th>Instructor</th>
                            <th>Type</th>
                            <th style="text-align: left;">Date</th>
                            <th>MOP</th>
                            <th style="text-align: left;">Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($con, "SELECT member.fullname as member_fullname, instructor.fullname as instructor_fullname, 
                        rates.type, TRANSACTION.payment, TRANSACTION.tdate, 
                        TRANSACTION.MOP, TRANSACTION.status FROM TRANSACTION 
                        INNER JOIN member ON member.id=TRANSACTION.member_id
                        INNER JOIN instructor ON instructor.id=TRANSACTION.instructor_id
                        INNER JOIN rates ON rates.id=TRANSACTION.rates_id");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $row['member_fullname']; ?></td>
                            <td><?php echo $row['instructor_fullname']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td style="text-align: left;"><?php echo $row['tdate']; ?></td>
                            <td><?php echo $row['MOP']; ?></td>
                            <td style="text-align: left;"><?php echo number_format($row['payment'], 2); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                  </div>
              </div>
               
                
            </div>

            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Add Transaction</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Member</label>
                                            <select name="member" class="form-control" id="" required>
                                              <option value="" disabled selected>Select Member..</option>
                                              <?php 
                                                $member = mysqli_query($con, "SELECT * FROM member WHERE available = 1");
                                                while($row = mysqli_fetch_array($member)){
                                              ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['fullname']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Instructor</label>
                                            <select name="instructor" class="form-control" id="" required>
                                              <option value="" disabled selected>Select Instructor..</option>
                                              <?php 
                                                $member = mysqli_query($con, "SELECT * FROM instructor WHERE available = 1");
                                                while($row = mysqli_fetch_array($member)){
                                              ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['fullname']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Type</label>
                                            <select name="type" class="form-control" id="" required>
                                              <option value="" disabled selected>Select Type..</option>
                                              <?php 
                                                $member = mysqli_query($con, "SELECT * FROM rates");
                                                while($row = mysqli_fetch_array($member)){
                                              ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['type']; ?></option>
                                              <?php } ?>
                                            </select>
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

                  $member = $_POST['member'];
                  $instructor = $_POST['instructor'];
                  $type = $_POST['type'];

                  $reference = rand(10,100);

                  date_default_timezone_set('Asia/Manila');
                  $tdate = date("Y-m-d");
                  
                  $rate = mysqli_query($con, "SELECT * FROM rates WHEre id = '$type'");
                  $rowRate = mysqli_fetch_array($rate);
                  $paymentRate = $rowRate['rate'];

                  mysqli_query($con, "INSERT INTO transaction (`reference`, `tdate`, `member_id`, `instructor_id`, `rates_id`, `MOP`, `status`, `payment`) 
                    VALUES ('$reference', '$tdate', '$member', '$instructor', '$type', 'Walkin', 1, '$paymentRate')");

                  mysqli_query($con, "UPDATE instructor SET available = 0 WHERE id = '$instructor'");

                  echo "<script>location.replace('walkin.php')</script>";

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
