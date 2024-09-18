<?php
require '../config/init.php';
if(!isAuth()){
  redirect("../index.php", "error", "Please Login First");
}

// debug("here");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  try {
    $propertyId = (int)$_POST["property_id"];
    $bookedBy = (int)$_SESSION['auth_id'];
    $bookingDate = date('Y-m-d' , strtotime($_POST["date"]));
    $statement = $connection->prepare("Insert into bookings(booked_by, property_id , booking_date) values(? ,? ,?)");
    $statement->bind_param(
      "iis",
      $bookedBy,
      $propertyId,
      $bookingDate
    );
    $result = $statement->execute();
    if ($result) {
      redirect("../index.php", "success", "Your booking request is submitted successfully. Admin will email you soon");
    } else {
      redirect("../index.php", "error", "Unable To Book Reservation");
    }
  } catch (Exception $ex) {
    echo "Exception caught: " . $ex->getMessage();
  }
} else {
  redirect('../login.php', "error", "Invalid Http Request");
}
