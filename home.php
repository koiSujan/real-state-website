<?php
require 'config/init.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'components/head.php' ?>

<body>

   <!-- header section starts  -->
   <?php include './components/header.php' ?>
   <!-- header section ends -->

   <!-- home section starts  -->

   <div class="home">
      <?php include './components/hero-section.php' ?>
   </div>

   <!-- home section ends -->

   <!-- services section starts  -->
   <?php include './components/services.php' ?>

   <!-- services section ends -->

   <!-- listings section starts  -->
   <?php include './components/property-listing.php' ?>
   <!-- listings section ends -->










   <!-- footer section starts  -->
   <?php include './components/footer.php' ?>
   <!-- footer section ends -->


   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>