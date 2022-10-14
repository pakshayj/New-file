<?php
$ttl = "Doctor specialization";
session_start();
error_reporting(0);
include('../include/config.php');
include('include/header.php');

if (isset($_POST['submit'])) {
    $sql = mysqli_query($con, "insert into doctorSpecilization(specilization) values('" . $_POST['doctorspecilization'] . "')");
    $_SESSION['msg'] = "Doctor Specialization added successfully !!";
}

if (isset($_GET['del'])) {
    mysqli_query($con, "delete from doctorSpecilization where id = '" . $_GET['id'] . "'");
    $_SESSION['msg'] = "data deleted !!";
}
?>


<div class="container my-box my-3">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10 col-12">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h1 class="text-success">Doctor Specialization</h5>
                </div>
                <div class="panel-body">
                    <p style="color:red;"><?= ($_SESSION['msg']); ?>
                        <?= ($_SESSION['msg'] = ""); ?></p>
                    <form role="form" name="dcotorspcl" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Doctor Specialization
                            </label>
                            <input type="text" name="doctorspecilization" class="form-control" placeholder="Enter Doctor Specialization">
                        </div>




                        <button type="submit" name="submit" class="btn my-3 btn-primary">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 my-3">
            <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Docter Specialization</span></h5>

            <table class="table table-hover" id="sample-table-1">
                <thead>
                    <tr>
                        <th class="center">#</th>
                        <th>Specialization</th>
                        <th class="hidden-xs">Creation Date</th>
                        <th>Updation Date</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($con, "select * from doctorSpecilization");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>

                        <tr>
                            <td class="center"><?php echo $cnt; ?>.</td>
                            <td class="hidden-xs"><?php echo $row['specilization']; ?></td>
                            <td><?php echo $row['creationDate']; ?></td>
                            <td><?php echo $row['updationDate']; ?>
                            </td>

                            <td>
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="edit-doctor-specialization.php?id=<?php echo $row['id']; ?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil-alt"></i></a>

                                    <a href="doctor-specialization.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
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