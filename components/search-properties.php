<?php
$rows = array();
$search = $_GET["search"];
$sql = "Select * from properties where title like '%$search%' or property_type like '%$search' or address like '%$search' or property_details like '%$search%'";
$result = $connection->query($sql);
$rows = array();
if($result->num_rows > 0){
  while($row = $result->fetch_assoc()) {
    $rows[] = $row;
  }
}
// if ($statement->execute()) {
//   $result = $statement->get_result();
//   while ($row = $result->fetch_assoc()) {
//     $rows[] = $row;
//   }
//   // debug($rows);
// }
?>
<section class="listings">
  <h1 class="heading">Properties</h1>
  <p style="text-align:center; font-size:15px; margin-bottom:16px">Search Results For : <span style="font-weight:500"><?php echo $_GET["search"] ?></span> <span> <?php count($rows) > 0 ? count($rows) : "0" . "results" ?></span></p>


  <div class="box-container">
    <?php
    if (isset($rows) && count($rows) > 0) {
      foreach ($rows as $key => $data) {
    ?>
        <div class="box">
          <div class="admin">
            <!-- <h3>j</h3> -->
            <div>
              <p><?php echo $data['owner'] ?></p>
              <span><?php echo $data['listed_date'] ?></span>
            </div>
          </div>
          <div class="thumb">
            <!-- <p class="total-images"><i class="far fa-image"></i><span>4</span></p> -->
            <p class="type"><span><?php echo $data['property_type'] ?></p>
            <!-- <form action="" method="post" class="save">
                     <button type="submit" name="save" class="far fa-heart"></button>
                  </form> -->
            <img src="<?php echo UPLOAD_URL . 'cover/' . $data['cover_image'] ?>" alt="PROPERTY_COVER_IMAGE">
            <!-- <img src="images/house-img-1.webp" alt=""> -->
          </div>
          <h3 class="name"><?php echo $data['title'] ?></h3>
          <p class="location"><i class="fas fa-map-marker-alt"></i><span><?php echo $data['address'] ?></span></p>
          <div class="flex">
            <p><i class="fas fa-bed"></i><span><?php echo $data['bed_no'] ?></span></p>
            <p><i class="fas fa-bath"></i><span><?php echo $data['bath_no'] ?></span></p>
            <p><i class="fas fa-maximize"></i><span><?php echo $data['area'] . 'sq m' ?></span></p>
          </div>
          <a href="../property.php?id=<?php echo $data['id'] ?>" class="btn">View property</a>
        </div>
    <?php
      }
    }
    ?>
  </div>
</section>