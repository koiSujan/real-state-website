<?php
require '../config/init.php';
include './components/head.php'
?>

<body>
  <?php include './components/header.php' ?>
  <div class="dashboard-wrap">
    <?php include './components/sidebar.php' ?>
    <main class="main">
      <div class="dashboard-container">
        <?php flash() ?>
        <section class="overview">
          <div class="flx flx-ctr flx-between">
            <h2 class="title-h2">Bookings</h2>
          </div>
          <div class="app-content">
            <?php
            $rows = array();
            $sql = "SELECT bookings.id as bId, bookings.booked_by, bookings.property_id , bookings.booking_date ,users.name , properties.title  FROM bookings INNER JOIN Users ON bookings.booked_by=users.id INNER JOIN properties ON bookings.property_id=properties.id ;";
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
              <table class="app-table">
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
    </main>
  </div>
</body>

</html>