<?php
require '../config/init.php';

?>

<aside class="sidebar">
  <a href="./"><?php include "../components/logo.php" ?></a>
  <div class="sidebar-links">
    <ul>
      <li><a href=""><i class="ri-dashboard-3-line"></i>Dashboard</a></li>
      <li><a href="../../admin/bookings.php"><i class="ri-list-radio"></i>Bookings</a></li>
      <li><a href="../../admin/properties.php"><i class="ri-building-line"></i>Properties</a></li>
      <!-- <li><a href=""><i class="ri-service-line"></i>Services</a></li> -->
      <li><a href="../../admin/contacts.php"><i class="ri-contacts-book-3-line"></i>Contact</a></li>
      <li><a href="../../admin/users.php"><i class="ri-user-line"></i>Users</a></li>
    </ul>
  </div>
</aside>