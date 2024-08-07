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
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Listing /</span> Instructor</h4>
                <div class="card">
                  <div class="card-header">
                    <button
                              type="button"
                              class="btn btn-primary mb-3"
                              data-bs-toggle="modal"
                              data-bs-target="#modalCenter"
                            >
                            <i class='bx bx-user-plus' ></i> Add Instructor
                    </button>
                  </div>
                  <div class="card-body">
                    <table id="example" class="table table-striped nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Fullname</th>
                                <th>Address</th>
                                <th style="text-align: left;">Contact</th>
                                <th>Biography</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($con, "SELECT * FROM instructor WHERE active = 1");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><a href="#" data-bs-toggle="modal"
                                data-bs-target="#modalCenter<?php echo $row['id']; ?>" class="btn btn-success btn-sm"><i class='bx bx-edit-alt'></i></a> |
                                <a href="#" data-bs-toggle="modal"
                                data-bs-target="#modalCenterdelete<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"><i class='bx bx-no-entry'></i></i></a></td>
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td style="text-align: left;"><?php echo $row['contact']; ?></td>
                                <td><?php echo $row['biography']; ?></td>
                            </tr>
                            <?php 
                            include('modals/edit_instructor.php');
                            include('modals/delete_instructor.php');
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
                                <h5 class="modal-title" id="modalCenterTitle">Add Instructor</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <form method="POST" enctype="multipart/form-data">
                                  <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Image</label>
                                            <input
                                            type="file"
                                            name="image"
                                            id="nameWithTitle"
                                            class="form-control"
                                            placeholder="Enter Name"
                                            required
                                            />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Name</label>
                                            <input
                                            type="text"
                                            name="fullname"
                                            id="nameWithTitle"
                                            class="form-control"
                                            placeholder="Enter Name"
                                            required
                                            />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-3">
                                            <label for="emailWithTitle" class="form-label">Username</label>
                                            <input
                                            type="text"
                                            name="username"
                                            id="emailWithTitle"
                                            class="form-control"
                                            placeholder="Username"
                                            required
                                            />
                                        </div>
                                        <div class="col mb-3">
                                            <label for="dobWithTitle" class="form-label">Password</label>
                                            <input
                                            type="password"
                                            id="dobWithTitle"
                                            name="password"
                                            class="form-control"
                                            placeholder="Password"
                                            required
                                            />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-3">
                                            <label for="emailWithTitle" class="form-label">Contact Number</label>
                                            <input
                                            type="text"
                                            name="contact_number"
                                            id="emailWithTitle"
                                            class="form-control"
                                            placeholder="Contact Number"
                                            required
                                            />
                                        </div>
                                        <div class="col mb-3">
                                            <label for="dobWithTitle" class="form-label">Address</label>
                                            <input
                                            type="text"
                                            id="dobWithTitle"
                                            name="address"
                                            class="form-control"
                                            placeholder="address"
                                            required
                                            />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Skills</label>
                                           <select name="skills[]" multiple id="" class="form-control">
                                            <option value="" selected disabled>Choose Skills...</option>
                                            <?php $querySkills  = mysqli_query($con, "SELECT * FROM instructor_types");
                                            while($rowSkills = mysqli_fetch_array($querySkills)){ ?>
                                            <option value="<?php echo $rowSkills['id']; ?>"><?php echo $rowSkills['types']; ?></option>
                                            <?php } ?>
                                           </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Biography</label>
                                           <textarea name="bio" class="form-control" id="" required></textarea>
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

                  $target = "../assets/img/profile/". basename($_FILES['image']['name']);
                  $image = $_FILES['image']['name'];
                  $fullname = $_POST['fullname'];
                  $username = $_POST['username'];
                  $password = md5($_POST['password']);
                  $contact_number = $_POST['contact_number'];
                  $address = $_POST['address'];
                  $bio = $_POST['bio'];

                  $checkifusernameexist = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
                    $checkusername = mysqli_num_rows($checkifusernameexist);

                    if($checkusername === 0)
                    {
                      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){

                        $queryUsers = mysqli_query($con, "INSERT INTO users (`username`, `password`, `role`) VALUES ('$username', '$password', 2)");
    
                        if($queryUsers)
                        {
                            $users = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
                            $rowUsers = mysqli_fetch_array($users);
                            $user_id = $rowUsers["id"];
        
                            mysqli_query($con, "INSERT INTO instructor (`image`, `fullname`, `biography`, `address`, `contact`, `user_id`) VALUES
                            ('$image', '$fullname', '$bio', '$address', '$contact_number', '$user_id') ");
    
                            $instructor = mysqli_query($con, "SELECT * FROM instructor WHERE user_id = '$user_id'");
                            $rowInstructor = mysqli_fetch_array($instructor);
                            $instructor_id = $rowInstructor['id'];
    
                            foreach($_POST['skills'] as $skills)
                            {
                                mysqli_query($con, "INSERT INTO instructor_skills (`instructor_id`, `type_id`) VALUES ('$instructor_id', '$skills')");
                            }
        
                            echo "<script>location.replace('instructor.php')</script>";
                        }
                        else 
                        {
                            echo "<script>alert('Something went wrong!')</script>";
                        }
    
                      }
                       
                      else {
                        echo "<script>alert('Error in Uploading Files!')</script>";
                      }
                    } 
                    else 
                    {
                      echo "<script>alert('Username is already exist')</script>";
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
