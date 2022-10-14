<?php
$ttl = "Manage doctors";
include('include/header.php');
include('../include/config.php');



if (isset($_GET['del'])) {
    mysqli_query($con, "delete from doctors where id = '" . $_GET['id'] . "'");
    $_SESSION['msg'] = "data deleted !!";
}
?>

<div class="container my-box my-3">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-11 col-12">
            <h1 class="text-success">Manage Doctors</h1>
            <p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
                <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
            <table class="table table-hover" id="sample-table-1">
                <thead>
                    <tr>
                        <th class="center">#</th>
                        <th>Specialization</th>
                        <th class="hidden-xs">Doctor Name</th>
                        <th>Creation Date </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($con, "select * from doctors");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>

                        <tr>
                            <td class="center"><?php echo $cnt; ?>.</td>
                            <td class="hidden-xs"><?php echo $row['specilization']; ?></td>
                            <td><?php echo $row['doctorName']; ?></td>
                            <td><?php echo $row['creationDate']; ?>
                            </td>

                            <td>
                                <div class="">
                                    <a href="edit-doctor.php?id=<?php echo $row['id']; ?>" class="btn" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil-alt"></i></a>

                                    <a href="manage-doctors.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
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