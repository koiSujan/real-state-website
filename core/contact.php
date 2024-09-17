<?php
require '../config/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  try {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $phoneNumber = $_POST["phone_number"];
    $statement = $connection->prepare("Insert into contacts(name, email , message, phone_number) values(? ,? ,? ,?)");
    $statement->bind_param(
      "ssss",
      $name,
      $email,
      $message,
      $phoneNumber
    );
    $result = $statement->execute();
    if ($result) {
      redirect("../contact.php", "success", "Your contact request is submitted successfully");
    } else {
      redirect("../contact.php", "error", "Unable To Complete Action");
    }
  } catch (Exception $ex) {
    echo "Exception caught: " . $ex->getMessage();
  }
} else {
  redirect('../login.php', "error", "Invalid Http Request");
}
