<?php
require 'config/init.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include './components/head.php' ?>

<body>
   <?php flash() ?>
   <!-- header section starts  -->
   <?php include './components/header.php' ?>
   <!-- header section ends -->

   <!-- home section starts  -->

   <!-- <div class="home"> -->
      <?php include './components/about.php' ?>
   <!-- </div> -->

   <!-- home section ends -->

   <!-- footer section starts  -->
   <?php include './components/footer.php' ?>
   <!-- footer section ends -->


   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>

<?php include './components/script.php' ?>
<script src="./js/script.js"></script>