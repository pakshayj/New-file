<?php
$ttl = "Doctor | Edit profile";

session_start();
error_reporting(0);
include('include/header.php');
include('../include/config.php');
if (isset($_POST['submit'])) {
    $eid = $_GET['editid'];
    $patname = $_POST['patname'];
    $patcontact = $_POST['patcontact'];
    $patemail = $_POST['patemail'];
    $gender = $_POST['gender'];
    $pataddress = $_POST['pataddress'];
    $patage = $_POST['patage'];
    $medhis = $_POST['medhis'];
    $sql = mysqli_query($con, "update tblpatient set PatientName='$patname',PatientContno='$patcontact',PatientEmail='$patemail',PatientGender='$gender',PatientAdd='$pataddress',PatientAge='$patage',PatientMedhis='$medhis' where ID='$eid'");
    if ($sql) {
        echo "<script>alert('Patient info updated Successfully');location.href='manage-patient.php'</script>";
    }
}
?>

<div class="container-lg my-box my-3">
    <div class="row my-5 ">
        <div class="col-12">
            <h2 class="text-secondary text-center">Doctor | Edit Patient </h2>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-md-12">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h5 class="panel-title">Edit Doctor</h5>
                        </div>
                        <div class="panel-body">

                            <form role="form" name="" method="post">
                                <?php
                                $eid = $_GET['editid'];
                                $ret = mysqli_query($con, "select * from tblpatient where ID='$eid'");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {

                                ?>
                                    <div class="form-group">
                                        <label for="doctorname">
                                            Patient Name
                                        </label>
                                        <input type="text" name="patname" class="form-control" value="<?php echo $row['PatientName']; ?>" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="fess">
                                            Patient Contact no
                                        </label>
                                        <input type="text" name="patcontact" class="form-control" value="<?php echo $row['PatientContno']; ?>" required="true" maxlength="10" pattern="[0-9]+">
                                    </div>
                                    <div class="form-group">
                                        <label for="fess">
                                            Patient Email
                                        </label>
                                        <input type="email" id="patemail" name="patemail" class="form-control" value="<?php echo $row['PatientEmail']; ?>" readonly='true'>
                                        <span id="email-availability-status"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Gender: </label>
                                        <?php if ($row['Gender'] == "Female") { ?>
                                            <input type="radio" name="gender" id="gender" value="Female" checked="true">Female
                                            <input type="radio" name="gender" id="gender" value="male">Male
                                        <?php } else { ?>
                                            <label>
                                                <input type="radio" name="gender" id="gender" value="Male" checked="true">Male
                                                <input type="radio" name="gender" id="gender" value="Female">Female
                                            </label>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">
                                            Patient Address
                                        </label>
                                        <textarea name="pataddress" class="form-control" required="true"><?php echo $row['PatientAdd']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="fess">
                                            Patient Age
                                        </label>
                                        <input type="text" name="patage" class="form-control" value="<?php echo $row['PatientAge']; ?>" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="fess">
                                            Medical History
                                        </label>
                                        <textarea type="text" name="medhis" class="form-control" placeholder="Enter Patient Medical History(if any)" required="true"><?php echo $row['PatientMedhis']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="fess">
                                            Creation Date
                                        </label>
                                        <input type="text" class="form-control" value="<?php echo $row['CreationDate']; ?>" readonly='true'>
                                    </div>
                                <?php } ?>
                                <button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
                                    Update
                                </button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php
include('include/footer.php');

?>