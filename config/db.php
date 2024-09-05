<?php
  include "../config/constants.php";
  // establish connection with database locally
  $connection = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

  if($connection->connect_error){
    echo "Failed to establish database connection: " . $connection->connect_error;
    return;
  }

  // echo "Connection Established Successfully";



?>