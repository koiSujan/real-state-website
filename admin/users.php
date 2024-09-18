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
                        <h2 class="title-h2">Users</h2>
                    </div>
                    <div class="app-content">
                        <?php
                        $rows = array();
                        $statement = $connection->prepare("Select * from users");
                        if ($statement->execute()) {
                            $result = $statement->get_result();
                            while ($row = $result->fetch_assoc()) {
                                $rows[] = $row;
                            }
                            // print_r($rows);
                        }
                        ?>
                        <div style="overflow-x:auto;">
                            <table class="app-table" id="contact-table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone </th>
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
                                                            echo $data['name']
                                                            ?>
                                                        </p>
                                                    </div>
                                                </td>
                                                <td><?php echo $data['email'] ?></td>
                                                <td>
                                                <?php echo $data['address'] ?>
                                                </td>
                                                <td>
                                                <?php echo $data['phone_number'] ?>
                                                </td>
                                                <td>
                                                    <div class="table-action">
                                                        <!-- <a target="_blank" href="../property.php/?id=<?php echo $data['id'] ?>" title="View Detail"><i class="ri-eye-line"></i></a> -->
                                                        <form id="del-prop-<?php echo $data['id'] ?>" method="post" action="core/delete-users.php" style="display:inline">
                                                            <input name="del_id" type="hidden" style="display:none" value="<?php echo $data['id'] ?>">
                                                            <a href="#" onClick="
                                                                if(window.confirm('Do you want to delete this item ?')){
                                                                    console.log('yes');
                                                                    document.querySelector('#del-prop-<?php echo $data['id'] ?>').submit();
                                                                }
                                                            " title="Delete User"><i class="ri-delete-bin-line"></i></a>
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

<?php include './components/scripts.php' ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#contact-table').DataTable();
    });
</script>