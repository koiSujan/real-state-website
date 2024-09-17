<!DOCTYPE html>
<html lang="en">
<?php
require 'config/init.php';
// isAuth();
?>
<?php include 'components/head.php' ?>
<?php
$id = $_GET['id'];
if (!isset($id)) {
  redirect('./404.php');
}
$pId = (int)$id;
$statement = $connection->prepare("Select * from properties where id=?");
$statement->bind_param(
  "i",
  $pId
);
$succ = $statement->execute();
if (!$succ) {
  redirect('./404.php');
  die();
}
$data = $statement->get_result();
$row = $data->fetch_assoc();

if (!isset($row)) {
  redirect('./404.php');
  die();
}

$statement2 = $connection->prepare("Select * from property_images where property_id=?");
$statement2->bind_param(
  "i",
  $pId
);
$galleryImages = array();
if ($statement2->execute()) {
  $data = $statement2->get_result();
  $i = 0;
  while ($dataRow = $data->fetch_assoc()) {
    $galleryImages[] = $dataRow;
  }
}
?>

<body>

  <!-- header section starts  -->
  <?php include './components/header.php' ?>
  <!-- header section ends -->

  <section class="view-property">
    <div class="details">
      <div class="thumb">
        <div class="big-image">
          <img alt="COVER_IMAGE" src="<?php echo UPLOAD_URL . 'cover/' . $row['cover_image'] ?>" alt="">
        </div>
        <?php
        if (isset($galleryImages) && count($galleryImages) > 0) {
        ?>
          <div class="small-images">
            <?php
            foreach ($galleryImages as $key => $data) {
            ?>
              <!-- <?php echo UPLOAD_URL . 'property/' . $data['image_path'] ?> -->
              <img src="<?php echo UPLOAD_URL . 'property/' . $data['image_path'] ?>" alt="PROPERTY_GALLERY_IMAGE">
            <?php
            }
            ?>
          </div>
        <?php
        }
        ?>

        <h3 class="name"><?php echo $row['title'] ?></h3>
        <p class="location"><i class="fas fa-map-marker-alt"></i><span><?php echo $row['address'] ?></span></p>
        <div class="info">
          <p><i class="fas fa-tag"></i><span>$<?php echo $row['price'] ?></span></p>
          <p><i class="fas fa-user"></i><span><?php echo $row['owner'] ?> (owner)</span></p>
          <p><i class="fas fa-phone"></i><a href="#"><?php echo $row['contact_person_number'] ?></a></p>
          <p><i class="fas fa-building"></i><span><?php echo $row['property_type'] ?></span></p>
          <!-- <p><i class="fas fa-house"></i><span>sale</span></p> -->
          <p><i class="fas fa-calendar"></i><span><?php echo $row['listed_date'] ?></span></p>
        </div>
        <h3 class="title">details</h3>
        <div class="flex">
          <div class="box">
            <p><i>BedRooms :</i><span><?php echo $row['bed_no'] ?></span></p>
            <p><i>Deposit amount :</i><span>0</span></p>
            <p><i>Bathroom :</i><span><?php echo $row['bath_no'] ?></span></p>
            <p><i>Area :</i><span><?php echo $row['area'] ?></span></p>
          </div>

        </div>
        <!-- <h3 class="title">amenities</h3>
      <div class="flex">
        <div class="box">
          <p><i class="fas fa-check"></i><span>lifts</span></p>
          <p><i class="fas fa-check"></i><span>security guards</span></p>
          <p><i class="fas fa-times"></i><span>play ground</span></p>
          <p><i class="fas fa-check"></i><span>gardens</span></p>
          <p><i class="fas fa-check"></i><span>water supply</span></p>
          <p><i class="fas fa-check"></i><span>power backup</span></p>
        </div>
        <div class="box">
          <p><i class="fas fa-check"></i><span>parking area</span></p>
          <p><i class="fas fa-times"></i><span>gym</span></p>
          <p><i class="fas fa-check"></i><span>shopping mall</span></p>
          <p><i class="fas fa-check"></i><span>hospital</span></p>
          <p><i class="fas fa-check"></i><span>schools</span></p>
          <p><i class="fas fa-check"></i><span>market area</span></p>
        </div>
      </div> -->
        <h3 class="title">Description</h3>
        <p class="description">
          <?php echo $row['property_details'] ?>
        </p>
        <?php
        if (isset($_SESSION['auth_id']))
        ?>
        <form action="./core/book_appointment.php" method="post">
          <div class="app-form-group">
            <input type="date" required class="app-input" name="date" min="<?php echo date('Y-m-d') ?>" placeholder="Choose a Date">
            <!-- <input type="text" class="hidden" name="user_id" value="<?php echo $_SESSION['auth_id'] || '0' ?>"> -->
            <input type="hidden" class="hidden" name="property_id" value="<?php echo $pId ?>">
          </div>
          <input type="submit" value="Book A Visit Here" name="save" class="inline-btn">
        </form>
        <?php
        ?>
      </div>

  </section>

  <!-- footer section starts  -->
  <?php include './components/footer.php' ?>
  <!-- footer section ends -->

</body>

</html>

<?php include './components/script.php' ?>
<script src="./js/script.js"></script>