<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
</script>
</script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js">
</script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js">
</script>
<script type="text/javascript">
  const accountBtn = document.getElementById("account-btn");

  accountBtn.addEventListener("click", function(e) {
    document.querySelector(".account-menu").classList.toggle("active");
  });

  document.addEventListener('click', function(e) {
    if (e.target.id == "account-btn") {
      return;
    }
    document.querySelector(".account-menu").classList.remove("active");
  })
</script>