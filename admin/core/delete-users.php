<?php
require '../../config/init.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
      $id = (int)sanitizeInput($_POST['del_id']);
      $statement = $connection->prepare("Delete from users where id= ?");
      $statement->bind_param(
        "i",
        $id
      );
      $result = $statement->execute();
      if($result){
        redirect("../users.php", 'success', 'User Deleted Successfully');
      }else{
        redirect("../users.php", 'error', 'Unable to delete user');
      }
    }catch(Exception $e){
      echo "Exception caught: " . $e->getMessage();
    }
  }else{
    redirect("../users.php", 'error', 'Invalid Http request received');
  }