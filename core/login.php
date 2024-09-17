<?php
require '../config/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  try {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $statement = $connection->prepare("Select * from users where email=?");
    $statement->bind_param(
      "s",
      $email
    );
    $result = $statement->execute();
    if (!$result) {
      redirect('../login.php', "error", "Server error");
    }
    $data = $statement->get_result();
    $row = $data->fetch_assoc();
    // print_r($row);
    if (isset($row)) {
      // debug($row['password']);
      if (password_verify($password, $row['password'])) {
        $_SESSION['auth_id'] = $row['id'];
        $_SESSION['auth_user'] = $row['name'];
        if ($row['role'] == 'admin') {
          $_SESSION['auth_role'] = 'admin';
          redirect('../admin/index.php');
        } else {
          redirect('../index.php', "success", "Login Suceessful");
        }
      } else {
        redirect('../login.php', "error", "Password doesn't match ");
      }
    } else {
      redirect('../login.php', "error", "Email Does Not Match");
    }
  } catch (Exception $ex) {
    echo "Exception caught: " . $ex->getMessage();
  }
} else {
  redirect('../login.php', "error", "Invalid Http Request");
}
