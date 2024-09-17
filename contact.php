<?php
require 'config/init.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include './components/head.php' ?>

<body>

   <!-- header section starts  -->
   <?php include './components/header.php' ?>
   <!-- header section ends -->

   <?php flash() ?>

   <!-- contact section starts  -->
   <div class="home">
      <?php include './components/contact.php' ?>
   </div>

   <!-- footer section starts  -->
   <?php include './components/footer.php' ?>
   <!-- footer section ends -->

</body>

</html>

<?php include './components/script.php' ?>
<script src="./js/script.js"></script>
<script>
  $("#contact-form").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        name: "required",
        message:"required",
        email:{
          "required": true,
           "email":true
        },
      
        phone_number:{
          required: true,
          digits: true

        },
      },
      // Specify validation error messages
      messages: {
        name: "Please provide name",
        email: {
          required: "Please provide email",
          email: "Email must be valid "
        },
        message:"Please provide your message",
        phone_number:{
          required: "Please provide phone number",
          digits:"Phone number should have digits only"
        },
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });
</script>