<?php
require 'config/init.php';
if (isset($_SESSION['auth_user'])) {
   redirect('../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'components/head.php' ?>

<body>
   <!-- header section starts  -->
   <?php include './components/header.php' ?>
   <!-- header section ends -->

   <!-- home section starts  -->
   <?php flash() ?>
   <section class="form-container">
      <form action="./core/login.php" method="post" enctype="multipart/form-data">
         <h3>Welcome. Let's Get Started</h3>
         <input type="email" name="email" required placeholder="Enter your email" class="box">
         <input type="password" name="password" required maxlength="20" placeholder="Enter your password" class="box">
         <p>Do not have an account? <a href="./register.php">Register Now</a></p>
         <input type="submit" value="LOGIN" name="submit" class="btn">
      </form>
   </section>

   <!-- footer section starts  -->
   <?php include './components/footer.php' ?>
   <!-- footer section ends -->


   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>
<?php include './components/script.php' ?>
<script src="./js/script.js"></script>