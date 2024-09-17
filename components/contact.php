<section class="contact">

  <div class="row">
    <div class="image">
      <img src="images/contact-img.svg" alt="">
    </div>
    <form id="contact-form" action="../core/contact.php" method="post" enctype="multipart/form-data">
      <h3>get in touch</h3>
      <input type="text" name="name"  placeholder="enter your name" class="box">
      <input type="email" name="email"  placeholder="enter your email" class="box">
      <input type="number" name="phone_number"  max="9999999999" min="0" placeholder="enter your number" class="box">
      <textarea name="message" placeholder="enter your message"  maxlength="1000" cols="30" rows="10" class="box"></textarea>
      <input type="submit" value="send message" name="send" class="btn">
    </form>
  </div>

</section>