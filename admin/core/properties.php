<?php
require '../../config/init.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
      $title = $address = $price = $owner = $contact = $description = $coverImage = "";
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
      
      // save cover image 
      if(isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == 0){
        $fileName = uploadFile($_FILES['cover_image'], 'cover');
        if($fileName){
          $coverImage = $fileName;
        } 
      }
      // insert query and bind parameters to the prepared statement
      $statement = $connection->prepare("Insert into properties(title, address, contact_person_number,owner, price, property_details ,listed_date, bed_no ,bath_no , area , property_type, cover_image) values(? , ? , ? ,? ,? ,? ,? , ? ,? ,?,? ,?)");
      $statement->bind_param(
        "ssssssssssss",
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
        $propertyType,
        $coverImage
      );

      if ($statement->execute()) {
        $rowId = $statement->insert_id;
        saveGalleryImages($rowId);
        redirect("../properties.php", 'success', 'Property Added Successfully');
      } else {
        redirect("../properties.php", 'error', 'Error occured in adding property. Failed to properly execute queries');
      }
    } catch (Exception $e) {
      echo "Exception caught: " . $e->getMessage();
    }
  }

  function saveGalleryImages($rowId){
    // set connection as a global variable
    global $connection;

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
  }
  ?>