<?php
require '../../config/init.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
      $id = (int)sanitizeInput($_POST['del_id']);
      $statement = $connection->prepare("Delete from bookings where id= ?");
      $statement->bind_param(
        "i",
        $id
      );
      $result = $statement->execute();
      if($result){
        redirect("../bookings.php", 'success', 'Booking Deleted Successfully');
      }else{
        redirect("../bookings.php", 'error', 'Unable to delete booking record');
      }
    }catch(Exception $e){
      echo "Exception caught: " . $e->getMessage();
    }
  }else{
    redirect("../bookings.php", 'error', 'Invalid Http request received');
  }