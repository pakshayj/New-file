<?php
$ttl = "Manage users";
include('include/header.php');
include('../include/config.php');


if (isset($_GET['del'])) {
    mysqli_query($con, "delete from users where id = '" . $_GET['id'] . "'");
    $_SESSION['msg'] = "data deleted !!";
}
?>
<div class="container my-3 my-box">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10 col-12">
            <h1 class="text-success my-3">Manage Users</h1>
            <p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
                <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
            <table class="table table-hover" id="sample-table-1">
                <thead>
                    <tr>
                        <th class="center">#</th>
                        <th>Full Name</th>
                        <th class="hidden-xs">Adress</th>
                        <th>City</th>
                        <th>Gender </th>
                        <th>Email </th>
                        <th>Creation Date </th>
                        <th>Updation Date </th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($con, "select * from users");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>

                        <tr>
                            <td class="center"><?php echo $cnt; ?>.</td>
                            <td class="hidden-xs"><?php echo $row['fullName']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['city']; ?>
                            </td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['regDate']; ?></td>
                            <td><?php echo $row['updationDate']; ?>
                            </td>
                            <td>
                                <div>


                                    <a href="manage-users.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-transparent" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
                                </div>

                            </td>
                        </tr>

                    <?php
                        $cnt = $cnt + 1;
                    } ?>


                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>