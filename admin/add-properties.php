<?php
require '../config/init.php';
include './components/head.php'
?>

<body>
  <?php include './components/header.php' ?>
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    try {
      $title = $address = $price = $owner = $contact = $description = "";
      // print_r($_POST);
      $title = sanitizeInput($_POST["title"]);
      $address = sanitizeInput($_POST["address"]);
      $price = sanitizeInput($_POST["price"]);
      $owner = sanitizeInput($_POST["owner"]);
      $contact = sanitizeInput($_POST["contact"]);
      $description = $_POST["description"];
      $bedNo = sanitizeInput($_POST["bed"]);
      $bathNo = sanitizeInput($_POST["bathroom"]);
      $area = sanitizeInput($_POST["area"]);
      $propertyType = sanitizeInput($_POST["type"]);

      // insert query
      $statement = $connection->prepare("Insert into properties(title, address, contact_person_number,owner, price, property_details ,listed_date, bed_no ,bath_no , area , property_type) values(? , ? , ? ,? ,? ,? ,? , ? ,? ,?,?)");
      $statement->bind_param(
        "sssssssssss",
        $title,
        $address,
        $contact,
        $owner,
        $price,
        $description,
        date('Y-m-d'),
        $bedNo,
        $bathNo,
        $area,
        $propertyType
      );

      if ($statement->execute()) {
        $rowId = $statement->insert_id;

        // save files/images in properties_images table and uploads folder
        $images = $_FILES['images'];
        if (isset($images)) {
          if (count($images['name']) > 0) {
            for ($i = 0; $i < count($images['name']); $i++) {
              $temp = array();
              if ($images["error"][$i] == 0) {
                $temp['name'] = $images['name'][$i];
                $temp['type'] = $images['type'][$i];
                $temp['tmp_name'] = $images['tmp_name'][$i];
                $temp['error'] = $images['error'][$i];
                $temp['size'] = $images['size'][$i];
                $imageName = uploadFile($temp, "property");
                if ($imageName) {
                  $stmt = $connection->prepare("Insert into property_images(property_id, image_path) values(? , ?)");
                  $stmt->bind_param("is", $rowId, $imageName);
                  $stmt->execute();
                }
              }
            }
          }
        }
        redirect("./properties.php", 'success', 'Property Added Successfully');
      } else {
        redirect("./properties.php", 'error', 'Error occured in adding property. Failed to properly execute queries');
      }
    } catch (Exception $e) {
      echo "Exception caught: " . $e->getMessage();
    }
  }
  ?>
  <div class="dashboard-wrap">
    <?php include './components/sidebar.php' ?>
    <main class="main">
      <div class="dashboard-container">
        <section class="overview">
          <div class="flx flx-ctr flx-between">
            <h2 class="title-h2">Properties</h2>
            <a href="./properties.php" class="theme-btn mg-x">View Properties</a>
          </div>
          <div class="app-content">
            <form
              enctype="multipart/form-data"
              id="property-form"
              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
              method="post"
              class="app-form">
              <div class="app-form-group">
                <label for="p-title" class="app-form-label">Title</label>
                <input name="title" type="text" id="p-title" class="app-input" placeholder="Property Name Or Title...">
              </div>
              <div class="app-form-group">
                <label for="p-addr" class="app-form-label">Address</label>
                <input name="address" type="text" id="p-addr" class="app-input" placeholder="11 Swan Av , Strathfield ...">
              </div>
              <div class="app-form-group">
                <label for="p-own" class="app-form-label">Owner</label>
                <input name="owner" type="text" id="p-own" class="app-input" placeholder="Owner Name ...">
              </div>
              <div class="app-form-group">
                <label for="p-cntct" class="app-form-label">Contact</label>
                <input name="contact" type="text" id="p-cntct" class="app-input" placeholder="Contact Number ...">
              </div>
              <div class="app-form-group">
                <label for="p-price" class="app-form-label">Price</label>
                <input name="price" type="text" id="p-price" class="app-input" placeholder="AUD 10.5M ... ">
              </div>
              <div class="app-form-group">
                <label for="p-type" class="app-form-label">Type</label>
                <select name="type" id="p-type" class="app-input">
                  <option value="House">House</option>
                  <option value="Flat">Flat</option>
                  <option value="Appartment">Unit/Appartment</option>
                  <option value="Townhouse">Townhouse</option>
                  <option value="Villa">Villa</option>
                  <option value="Villa">Other</option>
                </select>
              </div>
              <div class="app-form-group">
                <label for="p-status" class="app-form-label">Status</label>
                <select name="status" id="p-status" class="app-input">
                  <option value="Unsold">Unsold</option>
                  <option value="Sold">Sold</option>
                </select>
              </div>
              <div class="app-form-group">
                <div class="flx flx-between">
                  <div>
                    <label for="p-bed" class="app-form-label">Bedding</label>
                    <select name="bed" id="p-bed" class="app-input" style="min-width:120px">
                      <?php
                      for ($x = 1; $x <= 10; $x++) {
                        echo "<option value='$x'>" . $x . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div>
                    <label for="p-bath" class="app-form-label">Bathroom</label>
                    <select name="bathroom" id="p-bath" class="app-input" style="min-width:120px">
                      <?php
                      for ($x = 1; $x <= 10; $x++) {
                        echo "<option value='$x'>" . $x . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div>
                    <label for="p-area" class="app-form-label">Area</label>
                    <input name="area" type="text" id="p-area" class="app-input" placeholder="750 sq m">
                  </div>
                </div>
              </div>
              <div class="app-form-group">
                <label for="p-price" class="app-form-label">Price</label>
                <input name="price" type="text" id="p-price" class="app-input" placeholder="AUD 10.5M ... ">
              </div>
              <div class="app-form-group">
                <label for="p-imgs" class="app-form-label">Images</label>
                <input type="file" multiple accept="images/*" id="p-imgs" class="app-input" name="images[]" placeholder="AUD 10.5M ... ">
              </div>
              <div class="app-form-group">
                <label for="description" class="app-form-label">
                  Description
                </label>
                <textarea name="description" id="description" class="app-input">

                </textarea>
              </div>
              <div class="app-form-group mg-y-16">
                <button class="theme-btn theme-btn-submit">Submit</button>
                <button class="theme-btn theme-btn-alt mg-x">Cancel</button>

              </div>
            </form>
          </div>
        </section>
      </div>
    </main>
  </div>
</body>

</html>
<?php include "./components/scripts.php" ?>

<script src="https://cdn.tiny.cloud/1/warvfuduzz4guldhq22jj4qqjh5reqlwi9bqchh9a9e8ynmo/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-webcomponent@2/dist/tinymce-webcomponent.min.js"></script> -->
<script type="text/javascript">
  initTinymce();

  function initTinymce() {
    tinymce.init({
      selector: "#desc",
      menubar: false,
      plugins: "advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount",
      toolbar: "undo redo | blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat",
      height: '450px',
      toolbar_sticky: true,
      icons: 'thin',
      autosave_restore_when_empty: true,
    });
  }
</script>