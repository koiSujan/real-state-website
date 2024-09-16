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
                        <h2 class="title-h2">Properties</h2>
                        <a href="./add-properties.php" class="theme-btn mg-x ">Add Property</a>
                    </div>
                    <div class="app-content">
                        <?php
                        $rows = array();
                        $statement = $connection->prepare("Select * from properties order by id desc");
                        if ($statement->execute()) {
                            $result = $statement->get_result();
                            while ($row = $result->fetch_assoc()) {
                                $rows[] = $row;
                            }
                            // print_r($rows);
                        }
                        ?>
                        <div style="overflow-x:auto;">
                            <table class="app-table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Property Info</th>
                                        <th>Price</th>
                                        <th>Contact</th>
                                        <th>Details</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($rows) && count($rows) > 0) {
                                        foreach ($rows as $key => $data) {
                                    ?>
                                            <tr>
                                                <td><?php echo ($data['id']) ?></td>
                                                <td>
                                                    <div class="p-detail">
                                                        <p class="title">
                                                            <?php
                                                            echo $data['title']
                                                            ?>
                                                        </p>
                                                        <p class="addr">
                                                            <?php
                                                            echo $data['address']
                                                            ?>
                                                        </p>
                                                        <p class="dt">
                                                            <?php
                                                            echo 'Listed On: ' . $data['listed_date'];
                                                            ?>
                                                        </p>
                                                    </div>
                                                </td>
                                                <td><?php echo $data['price'] ?></td>
                                                <td>
                                                    <div class="p-contact">
                                                        <p><span style="font-weight:600">Owner:</span> <?php echo $data['owner'] ?></p>
                                                        <p><span style="font-weight:600">Phone</span> <?php echo $data['contact_person_number'] ?></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="p-detail-2">
                                                        <p>Area: <?php echo $data['area'] ?></p>
                                                        <p>Bed: <?php echo $data['bed_no'] ?></p>
                                                        <p>Bathroom: <?php echo $data['bath_no'] ?></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="table-action">
                                                        <a target="_blank" href="../property.php/?id=<?php echo $data['id'] ?>" title="View Detail"><i class="ri-eye-line"></i></a>
                                                        <form id="del-prop-<?php echo $data['id'] ?>" method="post" action="core/delete-properties.php" style="display:inline">
                                                            <input name="del_id" type="hidden" style="display:none" value="<?php echo $data['id'] ?>">
                                                            <a href="#" onClick="
                                                                if(window.confirm('Do you want to delete this item ?')){
                                                                    console.log('yes');
                                                                    document.querySelector('#del-prop-<?php echo $data['id'] ?>').submit();
                                                                }
                                                            " title="Delete Property"><i class="ri-delete-bin-line"></i></a>
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