<header class="dash-header">
    <a href="./" style="visibility:hidden"><?php include "../components/logo.php" ?></a>
    <div>
        <a href="#" id="account-btn" class="clr-theme">
            <?php
            if (isset($_SESSION['auth_user'])) {
                echo "Welcome ! " . $_SESSION['auth_user'] . '<i class="ri-arrow-down-s-line"></i>';
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
    </div>
</header>