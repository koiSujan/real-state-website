<?php
require '../config/init.php';
include './components/head.php'
?>

<body>
    <?php include './components/header.php' ?>
    <div class="dashboard-wrap">
        <?php include './components/sidebar.php' ?>
        <main class="main">
            <div class="dashboard-container">
                <?php flash() ?>
                <section class="overview">
                    <div class="flx flx-ctr flx-between">
                        <h2 class="title-h2">Properties</h2>
                        <a href="./add-properties.php" class="theme-btn mg-x ">Add Property</a>
                    </div>
                    <div class="app-content">

                    </div>
                </section>
            </div>
        </main>
    </div>
</body>

</html>