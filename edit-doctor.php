<?php
$ttl = "Edit Doctor";
include('include/header.php');

$did = intval($_GET['id']); // get doctor id
if (isset($_POST['submit'])) {
    $docspecialization = $_POST['Doctorspecialization'];
    $docname = $_POST['docname'];
    $docaddress = $_POST['clinicaddress'];
    $docfees = $_POST['docfees'];
    $doccontactno = $_POST['doccontact'];
    $docemail = $_POST['docemail'];
    $sql = mysqli_query($con, "Update doctors set specilization='$docspecialization',doctorName='$docname',address='$docaddress',docFees='$docfees',contactno='$doccontactno',docEmail='$docemail' where id='$did'");
    if ($sql) {
        // $msg = "Doctor Details updated Successfully";
        echo "<script>alert('Doctor Details updated Successfully');location.href='manage-doctors.php'</script>";
    }
}
?>
<div class="container my-3 my-box">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8 col-12">
            <?php $sql = mysqli_query($con, "select * from doctors where id='$did'");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
                <h4><?= ($data['doctorName']); ?>'s Profile</h4>
                <p><b>Profile Reg. Date: </b><?= ($data['creationDate']); ?></p>
                <?php if ($data['updationDate']) { ?>
                    <p><b>Profile Last Updation Date: </b><?= ($data['updationDate']); ?></p>
                <?php } ?>
                <hr />
                <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                    <div class="form-group my-3">
                        <label for="DoctorSpecialization">
                            Doctor Specialization
                        </label>
                        <select name="Doctorspecialization" class="form-control" required="required">
                            <option value="<?= ($data['specilization']); ?>">
                                <?= ($data['specilization']); ?></option>
                            <?php $ret = mysqli_query($con, "select * from doctorspecilization");
                            while ($row = mysqli_fetch_array($ret)) {
                            ?>
                                <option value="<?= ($row['specilization']); ?>">
                                    <?= ($row['specilization']); ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>

                    <div class="form-group my-3">
                        <label for="doctorname">
                            Doctor Name
                        </label>
                        <input type="text" name="docname" class="form-control" value="<?= ($data['doctorName']); ?>">
                    </div>


                    <div class="form-group my-3">
                        <label for="address">
                            Doctor Clinic Address
                        </label>
                        <textarea name="clinicaddress" class="form-control"><?= ($data['address']); ?></textarea>
                    </div>
                    <div class="form-group my-3">
                        <label for="fess">
                            Doctor Consultancy Fees
                        </label>
                        <input type="text" name="docfees" class="form-control" required="required" value="<?= ($data['docFees']); ?>">
                    </div>

                    <div class="form-group my-3">
                        <label for="fess">
                            Doctor Contact no
                        </label>
                        <input type="text" name="doccontact" class="form-control" required="required" value="<?= ($data['contactno']); ?>">
                    </div>

                    <div class="form-group my-3">
                        <label for="fess">
                            Doctor Email
                        </label>
                        <input type="email" name="docemail" class="form-control" readonly="readonly" value="<?= ($data['docEmail']); ?>">
                    </div>




                <?php } ?>


                <button type="submit" name="submit" class="btn btn-o btn-primary">
                    Update
                </button>
                </form>
        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>