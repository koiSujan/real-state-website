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
      <form id="login-form" action="./core/login.php" method="post" enctype="multipart/form-data">
         <h3>Welcome. Let's Get Started</h3>
         <input type="email" name="email" placeholder="Enter your email" class="box">
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
<script>
   $("#login-form").validate({
      // Specify validation rules
      rules: {

         email: {
            "required": true,
            "email": true
         },
         password: {
            "required": true,
            "minlength": 6
         },


      },
      // Specify validation error messages
      messages: {

         email: {
            required: "Please provide email",
            email: "Email must be valid "
         },
         password: "Please provide your password",
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
         form.submit();
      }
   });
</script>