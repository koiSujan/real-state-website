<header class="header">
  <style>
    .account-menu {
      display: none;
      position: relative;
    }

    .account-menu.active {
      display: block;
    }

    .account-inner-menu {
      background-color: #fff;
      padding: 10px;
      position: absolute !important;
      top: 5px !important;
      right: 0px !important;
      border-radius: 6px;
    }
  </style>
  <nav class="navbar nav-1">
    <section class="flex">
      <a href="../home.php" class="logo clr-theme">
        <?php include './components/logo.php' ?>
      </a>

      <ul>
        <li><a href="#">About</a></li>
        <li><a href="../properties.php">Property</a></li>
        <li><a href="../contact.php">Contact</a></li>
        <li>
          <a href="#" id="account-btn">
            <?php
            if (isset($_SESSION['auth_user'])) {
              echo "Welcome ! " . $_SESSION['auth_user'];
            } else {
              echo "Account";
            }
            ?>
          </a>
          <div class="account-menu">
            <div class="account-inner-menu">
              <?php
              if (isset($_SESSION['auth_user'])) {
              ?>
                <span class="d-block">
                  <form action="../core/logout.php" class="logout-form"><a href="#" onClick="document.querySelector('.logout-form').submit()" class="clr-theme">Logout</a></form>
                </span>
              <?php
              }
              ?>

              <?php
              if (!isset($_SESSION['auth_user'])) {
              ?>
                <span class="d-block"><a href="../login.php">Login</a></span>
                <span class="d-block"><a href="../register.php">Register</a></span>

              <?php
              }
              ?>

              <!-- <span class="d-block"><a href="../login.php">Login</a></span>
              <span class="d-block"><a href="../register.php">Register</a></span>
              <span class="d-block">
                <form action="../core/logout.php" class="logout-form"><a href="#" onClick="document.querySelector('.logout-form').submit()" class="clr-theme">
                    Logout</a></form>
              </span> -->

            </div>
          </div>
      </ul>
    </section>
  </nav>
</header>