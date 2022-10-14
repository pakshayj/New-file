<?php
session_start();
error_reporting(0);
include('../include/config.php');
include('include/header.php');

$id = intval($_GET['id']); // get value
if (isset($_POST['submit'])) {
    $docspecialization = $_POST['doctorspecilization'];
    $sql = mysqli_query($con, "update  doctorSpecilization set specilization='$docspecialization' where id='$id'");
    $_SESSION['msg'] = "Doctor Specialization updated successfully !!";
}
?>


<div class="container my-box my-3">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10 col-12">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h5 class="panel-title">Doctor Specialization</h5>
                </div>
                <div class="panel-body">
                    <p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
                        <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
                    <form role="form" name="dcotorspcl" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Edit Doctor Specialization
                            </label>

                            <?php

                            $id = intval($_GET['id']);
                            $sql = mysqli_query($con, "select * from doctorSpecilization where id='$id'");
                            while ($row = mysqli_fetch_array($sql)) {
                            ?> <input type="text" name="doctorspecilization" class="form-control" value="<?php echo $row['specilization']; ?>">
                            <?php } ?>
                        </div>




                        <button type="submit" name="submit" class="btn btn-o btn-primary">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
include('include/footer.php');
?>