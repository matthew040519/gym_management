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
    <script src="https://www.paypal.com/sdk/js?client-id=AeSUWcd989vbaiMLCO3tfWpRWNHEmCt7aIaYO7bYeXMzcKY3s-go3O9e2mMM25BOJAImeQDtigVI1V_O&currency=PHP&components=buttons&enable-funding=venmo"></script>
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
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Listing /</span> Transaction</h4>
              <div class="row mb-5">
                <?php 
                $package = $_GET['package'];
                $instructor_id = $_GET['instructor_id'];
                $query = mysqli_query($con, "SELECT * FROM instructor WHERE id = '$instructor_id'");
                while($row = mysqli_fetch_array($query)){
                ?>
                  <div class="col-md-6 col-lg-3 mb-3">
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

                <?php 
                $package = $_GET['package'];
                $instructor_id = $_GET['instructor_id'];
                $query = mysqli_query($con, "SELECT * FROM package WHERE id = '$package'");
                while($row = mysqli_fetch_array($query)){
                    $total_pay = $row['amount'];
                ?>
                   <div class="col-md-6 col-lg-3 mb-3">
                  <div class="card h-100">
                    <img class="card-img-top" style="height: 300px;" src="../include/gym_logo.jpg" alt="Card image cap" />
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
                <?php } ?>
                <div class="col-md-6 col-lg-6 mb-3">
                    <form method="POST">
                    <?php

$instructor_id = $_GET['instructor_id'];

$query_instructor = mysqli_query($con, "SELECT * FROM instructor WHERE id = '$instructor_id'");
$row_instructor = mysqli_fetch_array($query_instructor);

$countSlotsAM = mysqli_query($con, "SELECT COUNT(*) as count FROM member_package 
WHERE instructor_id = '$instructor_id' AND schedule = 'AM'");
$rowCountsAM = mysqli_fetch_array($countSlotsAM);
$countAM = mysqli_num_rows($countSlotsAM) == 0 ? 3 : 3 - $rowCountsAM['count'];

$countSlotsPM = mysqli_query($con, "SELECT COUNT(*) as count FROM member_package 
WHERE instructor_id = '$instructor_id' AND schedule = 'PM'");
$rowCountsPM = mysqli_fetch_array($countSlotsPM);
$countPM = mysqli_num_rows($countSlotsPM) == 0 ? 3 : 3 - $rowCountsPM['count'];

?>
                            <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="nameWithTitle" class="form-label">Schedule</label>
                                            <select name="schedule" class="form-control" id="schedule">
                                              <option value="AM">AM</option>
                                              <option value="PM">PM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="nameWithTitle" class="form-label">AM SLOT</label>
                                            <input type="text" value="<?php echo $countAM; ?>" readonly class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="nameWithTitle" class="form-label">PM SLOT</label>
                                            <input type="text" value="<?php echo $countPM; ?>" readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Mode of Payment</label>
                                            <select name="mop" class="form-control" id="mop">
                                              <option value="" selected disabled>Choose Mode of Payment..</option>
                                              <option value="Cash">Cash</option>
                                              <option value="Paypal">Paypal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Total Pay</label>
                                            <input type="text" name="totalPay" readonly value="<?php echo number_format($total_pay, 2); ?>" class="form-control">
                                            <input type="hidden" readonly id="totalPay" value="<?php echo $total_pay; ?>" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div id="modalfooter" style="display: none;">
										<!-- <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button> -->
										<button type="submit" style="width: 100%;" name="submit" class="btn btn-success">Subscribe!</button>
									</div>
                                    <div style="display: none;" id="paypal-button-container"></div>
                    </form>
                </div>
              </div>
            </div>
        
            <!-- / Content -->

            <?php


                if(isset($_POST['submit']))
                {
                    $package_id = $_GET['package'];
                    $id = $_GET['instructor_id'];
                    $member_id = $_SESSION['member_id'];
                    $schedule = $_POST['schedule'];
                    $mop = $_POST['mop'];
                    date_default_timezone_set('Asia/Manila');
                    $tdate = date("Y-m-d");
                    $totalPay = $_POST['totalPay'];

                    $query = mysqli_query($con, "INSERT INTO member_package (`member_id`, `package_id`, `instructor_id`, `tdate`, `schedule`, `MOP`, `amount`)
                    VALUES ('$member_id', '$package_id', '$id', '$tdate', '$schedule', '$mop', '$totalPay')");

                    if($query)
                    {
                        echo "<script>
                        alert('Successfully Subscribe!');
                        location.replace('packages.php');
                        </script>";
                    }
                    else {
                      echo "<script>alert('Error!')</script>";
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
    <script>
        $(document).ready(function () {

            $('#mop').change(function() {
                var mop = $('#mop').val();
                console.log(mop)
                if(mop == 'Cash')
                {
                    $('#modalfooter').css('display', 'block');
                    $('#paypal-button-container').css('display', 'none');
                }
                else if(mop == 'Paypal')
                {
                    $('#paypal-button-container').css('display', 'block');
                    $('#modalfooter').css('display', 'none');
                }
                
            });

        })
    </script>
    <script>
        var TotalPay = $('#totalPay').val();
        console.log(TotalPay);
        paypal.Buttons({
            createOrder: function(data, actions) {
            // setup transaction
            return actions.order.create({
                  "purchase_units": [
                  {
                      "amount": {
                          "currency_code": "PHP",
                          "value": parseFloat(TotalPay),
                      },
                  }
              ]
            });
        },
        onApprove: function(data, actions) {
            // capture funds from transaction
            return actions.order.capture().then(function(details) {
                // return fetch('/paypal-transaction-complete', {
                //     method: 'post',
                //     body: JSON.stringify({
                //         orderID: data.orderID
                //     })
                // });

                $data = { 

                    package: <?php echo $_GET['package']; ?>,
                    instructor_id: <?php echo $_GET['instructor_id']; ?>,
                    member_id: <?php echo $_SESSION['member_id']; ?>,
                    amount: $('#totalPay').val(),
                    schedule: $('#schedule').val(),
                    mop: $('#mop').val(),
                }

                $.ajax({
                    type: "POST",
                    url: 'paypal-transaction-complete.php',
                    data: $data,
                    success: function(response){
                        //if request if made successfully then the response represent the data

                        // $( "#result" ).empty().append( response );
                        // location.reload(true);
                        response = 'success' ? location.replace('packages.php') : alert('Something Went Wrong!');
                    }
                });
            });
        }
    }).render('#paypal-button-container');
    </script>
  </body>
</html>
