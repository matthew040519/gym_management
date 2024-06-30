<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" >
          <div class="app-brand demo" style="background-color: #FFF7F2;">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="../include/gym_logo.jpg" style="height: 80px;" alt="">
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Gym</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item mt-3">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard </div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-item">
              <!-- <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Layouts</div>
              </a> -->

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="layouts-without-menu.html" class="menu-link">
                    <div data-i18n="Without menu">Without menu</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-without-navbar.html" class="menu-link">
                    <div data-i18n="Without navbar">Without navbar</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-container.html" class="menu-link">
                    <div data-i18n="Container">Container</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-fluid.html" class="menu-link">
                    <div data-i18n="Fluid">Fluid</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-blank.html" class="menu-link">
                    <div data-i18n="Blank">Blank</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Pages</span>
            </li>
            <?php if($_SESSION['role'] == 1){ ?>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Listing</div>
              </a>
              <ul class="menu-sub">
              <li class="menu-item">
                  <a href="admin.php" class="menu-link">
                    <div data-i18n="Account">Users</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="instructor.php" class="menu-link">
                    <div data-i18n="Account">Instructor</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="instructor-types.php" class="menu-link">
                    <div data-i18n="Account">Instructor Type</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="rates.php" class="menu-link">
                    <div data-i18n="Notifications">Rates</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="packages.php" class="menu-link">
                    <div data-i18n="Notifications">Packages</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="products.php" class="menu-link">
                    <div data-i18n="Notifications">Products</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="blogs.php" class="menu-link">
                    <div data-i18n="Notifications">Blogs</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="feedback.php" class="menu-link">
                    <div data-i18n="Notifications">Feedback</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-folder-minus"></i>
                <div data-i18n="Account Settings">Transaction</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="walkin.php" class="menu-link">
                    <div data-i18n="Account">Walk In</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="subscription.php" class="menu-link">
                    <div data-i18n="Account">Subscription</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="approvesubscription.php" class="menu-link">
                    <div data-i18n="Account">Approve Subscription</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="cancelsubscription.php" class="menu-link">
                    <div data-i18n="Account">Cancel Subscription</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-data"></i>
                <div data-i18n="Account Settings">Reports</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="users.php" class="menu-link">
                    <div data-i18n="Account">Users</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="transactions.php" class="menu-link">
                    <div data-i18n="Account">Transactions</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="profile.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-key"></i>
                <div data-i18n="Analytics">Change Password </div>
              </a>
            </li>
            <?php } else if($_SESSION['role'] == 3){ ?>
              <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Listing</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="packages.php" class="menu-link">
                    <div data-i18n="Notifications">Packages</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="products.php" class="menu-link">
                    <div data-i18n="Notifications">Products</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="blogs.php" class="menu-link">
                    <div data-i18n="Notifications">Blogs</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item mt-3">
              <a href="profile.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Analytics">Profile </div>
              </a>
            </li>
              <?php } else if($_SESSION['role'] == 2) { ?>
                <li class="menu-item mt-3">
              <a href="profile.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Analytics">Profile </div>
              </a>
            </li>
                <?php } ?>
          </ul>
        </aside>