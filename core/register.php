<?php
require '../config/init.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  try {
    $email = $_POST["email"];
    $password = password_hash($_POST["password"] , PASSWORD_DEFAULT);
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $statement = $connection->prepare("Insert into users(name, email , password, phone_number, address) values(? ,? ,? ,? ,?)");
    $statement->bind_param(
      "sssss",
      $name,
      $email,
      $password,
      $phone,
      $address
    );
    $result = $statement->execute();
    if ($result) {
      redirect("../login.php", "success", "Registration Successful. Please Login");
    } else {
      redirect("../regsiter.php", "error", "Unable To Complete Registration");
    }
  } catch (Exception $ex) {
    echo "Exception caught: " . $ex->getMessage();
  }
} else {
  redirect('../login.php', "error", "Invalid Http Request");
}
