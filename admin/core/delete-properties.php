<?php
require '../../config/init.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
      $id = (int)sanitizeInput($_POST['del_id']);
      $statement = $connection->prepare("Delete from properties where id= ?");
      $statement->bind_param(
        "i",
        $id
      );
      $result1 = $statement->execute();

      $statement2 = $connection->prepare("Delete from property_images where property_id=?");
      $statement2->bind_param("i", $id);
      $result2 = $statement2->execute();
      $statement->close();
      $statement2->close();
      if($result1 && $result2){
        redirect("../properties.php", 'success', 'Property Deleted Successfully');
      }else{
        redirect("../properties.php", 'error', 'Unable to complete action');
      }
    }catch(Exception $e){
      echo "Exception caught: " . $e->getMessage();
    }
  }else{
    redirect("../properties.php", 'error', 'Invalid Http request received');
  }