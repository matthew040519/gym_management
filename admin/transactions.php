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
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Reports / </span>Transaction</h4>
                <div class="card">
                  <div class="card-header">
                    <form method="GET">
                      <div class="row">
                        <div class="col-md-3">
                            <label for="">Package</label>
                            <select name="package" id="" class="form-control">
                              <option value="" disabled selected>Choose Package..</option>
                              <?php $package = mysqli_query($con, "SELECT * FROM package");
                                    while($rowPackage = mysqli_fetch_array($package)){ ?>
                                    <option value="<?php echo $rowPackage['id']; ?>"><?php echo $rowPackage['package_name']; ?></option>
                              <?php } ?>
                            </select>
                        </div>
                        <?php
                        date_default_timezone_set('Asia/Manila');
                          $today = date('Y-m-d');
                        ?>
                        <div class="col-md-3">
                            <label for="">Date From</label>
                            <input type="date" name="dfrom" value="<?php echo $today; ?>" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">Date To</label>
                            <input type="date" name="dto" value="<?php echo $today; ?>" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="submit" value="Search" class="btn btn-primary mt-4">
                            <!-- <input type="submit" value="Clear" class="btn btn-secondary mt-4"> -->
                             <a href="transactions.php" class="btn btn-secondary mt-4">Clear</a>
                        </div>
                      </div>
                      </form>
                  </div>
                  <div class="card-body">
                        <table id="example" class="table table-striped nowrap" style="width:100%">
                          <thead>
                              <tr>
                                  <th>Member</th>
                                  <th>Package</th>
                                  <th style="text-align: left;">Amount</th>
                                  <th>Duration</th>
                                  <th>Mode of Payment</th>
                                  <th style="text-align: left;">Date</th>
                                  <th style="text-align: center;">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                              $Sql = "";
                              
                              if(isset($_GET['package']))
                              {
                                  $package = $_GET['package'];
                                  $dfrom = $_GET['dfrom'];
                                  $dto = $_GET['dto'];
                                  $Sql .= "And member_package.package_id = '$package' AND tdate BETWEEN '$dfrom' AND '$dto'";
                              }
                              $query = mysqli_query($con, "SELECT member_package.id as member_package_id, member_package.tdate, package.type, package.package_name, member.fullname, member_package.amount, package.duration, member_package.MOP, member_package.status,
                              (SELECT CASE WHEN member_package.status = 0 THEN 'Pending' WHEN member_package.status = 1 THEN 'Accepted' ELSE 'Declined' END) as trans_status FROM member_package 
                              INNER JOIN member ON member.id=member_package.member_id
                              INNER JOIN package ON package.id=member_package.package_id WHERE 1=1 $Sql");
                              while ($row = mysqli_fetch_array($query)) {
                              ?>
                              <tr>
                                  <td><?php echo $row['fullname']; ?></td>
                                  <td><?php echo $row['package_name']; ?></td>
                                  <td style="text-align: left;"><?php echo number_format($row['amount'], 2); ?></td>
                                  <td><?php echo $row['duration']; ?></td>
                                  <td><?php echo $row['MOP']; ?></td>
                                  <td style="text-align: left;"><?php echo $row['tdate']; ?></td>
                                  <td style="text-align: center;"><span class="badge bg-label-<?php if($row['status'] == 1) { echo "success"; } else if($row['status'] == 2) { echo "danger"; } else { echo "primary"; } ?> me-1"><?php echo $row['trans_status']; ?></span></td>
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
                                <h5 class="modal-title" id="modalCenterTitle">Add Rates</h5>
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
                                            <label for="emailWithTitle" class="form-label">Type</label>
                                            <input
                                            type="text"
                                            name="type"
                                            id="emailWithTitle"
                                            class="form-control"
                                            placeholder="Type"
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

                  $type = $_POST['type'];
                  $rate = $_POST['rate'];

                  mysqli_query($con, "INSERT INTO rates (`type`, `rate`) VALUES ('$type', '$rate')");

                  echo "<script>location.replace('rates.php')</script>";

              }
              
            
            ?>

<?php

if(isset($_POST['accept']))
{
    $id = $_POST['id'];
    $end_date = $_POST['end_date'];

    $queryAccept = mysqli_query($con, "UPDATE `member_package` SET `status` = 1, `start_date` = CURRENT_TIMESTAMP, `end_date` = '$end_date' WHERE id = '$id'");

    if($queryAccept)
    {
        echo "<script>alert('Subscription Accepted!')</script>";
        echo "<script>location.replace('subscription.php')</script>";
    }
}

if(isset($_POST['decline']))
{
    $id = $_POST['id'];
    $end_date = $_POST['end_date'];

    $queryAccept = mysqli_query($con, "UPDATE `member_package` SET `status` = 2, `start_date` = CURRENT_TIMESTAMP, `end_date` = '$end_date' WHERE id = '$id'");

    if($queryAccept)
    {
        echo "<script>alert('Subscription Decline!')</script>";
        echo "<script>location.replace('subscription.php')</script>";
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
