
<?php 
require '../config/init.php';
isAdmin();
include './components/head.php' ;
?>

<body>
    <?php include './components/header.php' ?>
    <div class="dashboard-wrap">
        <?php include './components/sidebar.php' ?>
        <main class="main">
            <div class="dashboard-container">
                <?php include './components/dashboard.php' ?>
            </div>
        </main>
    </div>
</body>
</html>
<?php include "./components/scripts.php" ?>
