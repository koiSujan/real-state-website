<?php
require '../../config/init.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
      $id = (int)sanitizeInput($_POST['del_id']);
      $statement = $connection->prepare("Delete from contacts where id= ?");
      $statement->bind_param(
        "i",
        $id
      );
      $result = $statement->execute();
      if($result){
        redirect("../contacts.php", 'success', 'Contact Deleted Successfully');
      }else{
        redirect("../properties.php", 'error', 'Unable to complete action');
      }
    }catch(Exception $e){
      echo "Exception caught: " . $e->getMessage();
    }
  }else{
    redirect("../contacts.php", 'error', 'Invalid Http request received');
  }