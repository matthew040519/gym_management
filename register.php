<?php

        include('include/connection.php');

        if(isset($_POST["submit"]))
        {

            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $fullname = $_POST['fullname'];
            $contact_number = $_POST['contact_number'];
            $address = $_POST['address'];
            $sec_question = $_POST['sec_questions'];
            $answer = $_POST['answer'];

            mysqli_query($con, "INSERT INTO users (`username`, `password`, `role`, `sq_id`, `sq_answer`) 
            VALUES ('$username', '$password', 3, '$sec_question', '$answer')");

                  $users = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
                  $rowUsers = mysqli_fetch_array($users);
                  $user_id = $rowUsers["id"];

            mysqli_query($con, "INSERT INTO member (`fullname`, `address`, `contact_number`, `user_id`) 
            VALUES ('$fullname', '$address', '$contact_number', '$user_id')");

            // echo "<script>location.replace('index.php')</script>";
            

        }

?>
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
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Register</title>

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
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.php" class="app-brand-link gap-2">
                  <img src="include/gym_logo.jpg" style="height: 150px;" alt="">
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder"></span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Welcome to Gym System! 👋</h4>
              <p class="mb-4">Please sign-up to your account and start the adventure</p>

              <form id="formAuthentication" class="mb-3" method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Fullname</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="fullname"
                    placeholder="Enter your fullname"
                    autofocus
                  />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email or Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="username"
                    placeholder="Enter your username"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <!-- <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a>
                  </div> -->
                  <label for="email" class="form-label">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3 form-password-toggle">
                  <!-- <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a>
                  </div> -->
                  <label for="email" class="form-label">Contact Number</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="number"
                      id="password"
                      class="form-control"
                      name="contact_number"
                      placeholder="Enter your Contact Number"
                      aria-describedby="password"
                    />
                  </div>
                </div>
                <div class="mb-3 form-password-toggle">
                  <!-- <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a>
                  </div> -->
                  <div class="input-group input-group-merge">
                    <textarea name="address" placeholder="Enter your Address" class="form-control" id=""></textarea>
                  </div>
                </div>
                <div class="mb-3 form-password-toggle">
                  <!-- <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a>
                  </div> -->
                  <label for="email" class="form-label">Security Questions</label>
                  <div class="input-group input-group-merge">
                    <select name="sec_questions" class="form-control" id="" required>
                      <?php $query = mysqli_query($con, "SELECT * FROM security_questions");
                      while($row = mysqli_fetch_array($query)){ ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['questions']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="mb-3 form-password-toggle">
                  <!-- <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a>
                  </div> -->
                  <label for="email" class="form-label">Answer</label>
                  <div class="input-group input-group-merge">
                    <input type="text" name="answer" class="form-control" required>
                  </div>
                </div>
                <div class="mb-3">
                  <input type="submit" class="btn btn-primary d-grid w-100" name="submit" value="Register">
                </div>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="login.php">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    

    <!-- / Content -->

    <!-- <div class="buy-now">
      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div> -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
