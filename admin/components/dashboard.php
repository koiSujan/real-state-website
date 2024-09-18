<?php
$propertyCount  = $userCount = $bookingCount = 0;
// for properties
$sql = "SELECT COUNT(*) as totalCount FROM properties;";
$result = $connection->query($sql);
$countResult = $result->fetch_assoc();
if ($countResult) {
  $propertyCount = $countResult['totalCount'];
}

//for users
$sql = "SELECT COUNT(*) as totalCount FROM users;";
$result = $connection->query($sql);
$countResult = $result->fetch_assoc();
if ($countResult) {
  $userCount = $countResult['totalCount'];
}

// for bookings
$sql = "SELECT COUNT(*) as totalCount FROM bookings;";
$result = $connection->query($sql);
$countResult = $result->fetch_assoc();
if ($countResult) {
  $bookingCount = $countResult['totalCount'];
}
?>
<div class="dashboard-section">
  <section class="overview">
    <h2 class="title-h2">Overview</h2>
    <div class="flx dash-card-wrap">
      <div class="dash-card">
        <p>
          <a href="../properties.php" class="clr-theme">
            <i class="ri-building-line" style="font-size:28px"></i><span>Properties</span>
          </a>
        </p>
        <!-- <p class="text-tiny">Properties</p> -->
        <h4 class="title-h4"><?php echo $propertyCount ?></h4>
      </div>
      <div class="dash-card">
        <p>
          <a href="#" class="clr-theme">
            <i class="ri-user-line" style="font-size:28px"></i><span>Users</span>
          </a>
        </p>
        <!-- <p class="text-tiny">Users</p> -->
        <h4 class="title-h4"><?php echo $userCount ?></h4>
      </div>
      <div class="dash-card">
        <p>
          <a href="../bookings.php" class="clr-theme">
            <i class="ri-chat-check-line" style="font-size:28px"></i><span>Bookings</span>
          </a>
        </p>
        <!-- <p class="text-tiny">Bookings</p> -->
        <h4 class="title-h4"><?php echo $bookingCount ?></h4>
      </div>
    </div>
  </section>

  <section class="overview" style="margin-top:30px">
    <h2 class="title-h2">Recent Bookings</h2>
    <div class="">
      <?php
      $rows = array();
      $sql = "SELECT bookings.id as bId, bookings.booked_by, bookings.property_id , bookings.booking_date ,users.name , properties.title  FROM bookings INNER JOIN Users ON bookings.booked_by=users.id INNER JOIN properties ON bookings.property_id=properties.id limit 10";
      $statement = $connection->prepare($sql);
      if ($statement->execute()) {
        $result = $statement->get_result();
        while ($row = $result->fetch_assoc()) {
          $rows[] = $row;
        }
        // print_r($rows);
      }
      // debug($rows);
      ?>
      <div style="overflow-x:auto;">
        <table class="app-table" id="booking-table">
          <thead>
            <tr>
              <th>Booking Id</th>
              <th>Booked By</th>
              <th>Property</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($rows) && count($rows) > 0) {
              foreach ($rows as $key => $data) {
            ?>
                <tr>
                  <td><?php echo ($data['bId']) ?></td>
                  <td>
                    <?php echo ($data['name']) ?>
                  </td>
                  <td><?php echo  $data['title'] ?></td>
                  <td>
                    <?php echo $data['booking_date'] ?>
                  </td>
                  <td>
                    <div class="table-action">
                      <!-- <a target="_blank" href="../property.php/?id=<?php echo $data['id'] ?>" title="View Detail"><i class="ri-eye-line"></i></a> -->
                      <form id="del-prop-<?php echo $data['bId'] ?>" method="post" action="core/delete-bookings.php" style="display:inline">
                        <input name="del_id" type="hidden" style="display:none" value="<?php echo $data['id'] ?>">
                        <a href="#" onClick="
                                                                if(window.confirm('Do you want to delete this item ?')){
                                                                    console.log('yes');
                                                                    document.querySelector('#del-prop-<?php echo $data['bId'] ?>').submit();
                                                                }
                                                            " title="Delete Record"><i class="ri-delete-bin-line"></i></a>
                      </form>
                      <!-- <a href="" title="Delete Property"><i class="ri-delete-bin-line"></i></a> -->
                    </div>
                  </td>
                </tr>
            <?php
              }
            } else {
              echo "<tr style='text-align:center'><td style='color:red'>No Records Found</td></tr>";
            }
            ?>
          </tbody>
        </table>

      </div>
    </div>
  </section>
</div>