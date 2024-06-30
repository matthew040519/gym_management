<?php

        include('include/connection.php');

        if(isset($_POST["submit"]))
        {

            $answer = $_POST['answer'];
            $password = md5($_POST['password']);
            $sq_question = $_POST['sq_question'];

            
            $username = $_GET['username'];
            $user = mysqli_query($con, "SELECT * FROM security_questions
            INNER JOIN users ON users.sq_id=security_questions.id
            WHERE users.sq_answer = '$answer' and users.username = '$username' AND users.sq_id='$sq_question'");
            $rowuser = mysqli_fetch_array($user);

            $checkusername = mysqli_num_rows($user);

            if($checkusername > 0)
            {
                $username = $rowuser['username'];
                $queryInsert = mysqli_query($con, "UPDATE users SET `password`= '$password' WHERE username = '$username'");
                if($queryInsert)
                {
                    echo "<script>alert('Successfully Changed')</script>";
                    header('location: login.php');
                }
                else
                {
                    echo "<script>alert('Something Went Wrong!')</script>";
                }
            } else {
                echo "<script>alert('Something Went Wrong!')</script>";
            }
            

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

    <title>Gym Management</title>

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
    <style>
      #bg-video {
    min-width: 100%;
    min-height: 100vh;
    max-width: 100%;
    max-height: 100vh;
    object-fit: cover;
    z-index: -1;
}

#bg-video::-webkit-media-controls {
    display: none !important;
}

.video-overlay {
    position: absolute;
    background-color: rgba(35,45,57,0.8);
    top: 0;
    left: 0;
    bottom: 7px;
    width: 100%;
}

.main-banner .caption {
  text-align: center;
  position: absolute;
  width: 80%;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
}
    </style>
  </head>

  <body>
    <!-- Content -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="front_page/assets/images/gym-video.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
            <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.php" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <img src="include/gym_logo.jpg" style="height: 150px;" alt="">
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder"></span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Welcome to Gym System! 👋</h4>
              <p class="mb-4">Security Password</p>

              <form id="formAuthentication" class="mb-3" method="POST">
              <?php
                    $sec_id = $_GET['sq_id'];
                    $querySecQuestion = mysqli_query($con, "SELECT * FROM security_questions WHERE id = $sec_id");
                    
                ?>
              <div class="mb-3" style="text-align: left;">
                  <label for="email" class="form-label">Security Question</label>
                 <select name="sq_question" class="form-control" id="">
                    <?php while($rowSQ = mysqli_fetch_array($querySecQuestion)) { ?>
                    <option selected value="<?php echo $rowSQ['id']; ?>"><?php echo $rowSQ['questions']; ?></option>
                    <?php } ?>
                 </select>
                </div>
                <div class="mb-3" style="text-align: left;">
                  <label for="email" class="form-label">Answer</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="answer"
                    placeholder="Enter your Answer"
                    autofocus
                  />
                </div>
                <div class="mb-3" style="text-align: left;">
                  <label for="email" class="form-label">New Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="email"
                    name="password"
                    placeholder="Enter your Password"
                    autofocus
                  />
                </div>
                <div class="mb-3">
                  <input type="submit" class="btn btn-primary d-grid w-100" name="submit" value="Change">
                </div>
              </form>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>
            </div>
        </div>
    </div>

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
