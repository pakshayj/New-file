<?php
$ttl = "Doctor | Add patient";
include('include/header.php');
session_start();
error_reporting(0);
include('../include/config.php');
if (isset($_POST['submit'])) {
    $docid = $_SESSION['id'];
    $patname = $_POST['patname'];
    $patcontact = $_POST['patcontact'];
    $patemail = $_POST['patemail'];
    $gender = $_POST['gender'];
    $pataddress = $_POST['pataddress'];
    $patage = $_POST['patage'];
    $medhis = $_POST['medhis'];
    $sql = mysqli_query($con, "insert into tblpatient(Docid,PatientName,PatientContno,PatientEmail,PatientGender,PatientAdd,PatientAge,PatientMedhis) values('$docid','$patname','$patcontact','$patemail','$gender','$pataddress','$patage','$medhis')");
    if ($sql) {
        echo "<script>alert('Patient info added Successfully');</script>";
    }
}
?>
<div class="container my-box my-2">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8 col-12">
            <form role="form" name="" method="post">

                <h1 class="text-success my-4">Add patient</h1>
                <div class="from-group mt-3">
                    <label for="doctorname">
                        Patient Name
                    </label>
                    <input type="text" name="patname" class="form-control" placeholder="Enter Patient Name" required="true">
                </div>
                <div class="from-group mt-3">
                    <label for="fess">
                        Patient Contact no
                    </label>
                    <input type="text" name="patcontact" class="form-control" placeholder="Enter Patient Contact no" required="true" maxlength="10" pattern="[0-9]+">
                </div>
                <div class="from-group mt-3">
                    <label for="fess">
                        Patient Email
                    </label>
                    <input type="email" id="patemail" name="patemail" class="form-control" placeholder="Enter Patient Email id" required="true" onBlur="userAvailability()">
                    <span id="user-availability-status1" style="font-size:12px;"></span>
                </div>
                <div class="from-group mt-3">
                    <label class="block">
                        Gender
                    </label>
                    <div class="clip-radio radio-primary">
                        <input type="radio" id="rg-female" name="gender" value="female">
                        <label for="rg-female">
                            Female
                        </label>
                        <input type="radio" id="rg-male" name="gender" value="male">
                        <label for="rg-male">
                            Male
                        </label>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="address">
                        Patient Address
                    </label>
                    <textarea name="pataddress" class="form-control" placeholder="Enter Patient Address" required="true"></textarea>
                </div>
                <div class="form-group mt-3">
                    <label for="fess">
                        Patient Age
                    </label>
                    <input type="text" name="patage" class="form-control" placeholder="Enter Patient Age" required="true">
                </div>
                <div class="from-group mt-3">
                    <label for="fess">
                        Medical History
                    </label>
                    <textarea type="text" name="medhis" class="form-control" placeholder="Enter Patient Medical History(if any)" required="true"></textarea>
                </div>

                <button type="submit" name="submit" id="submit" class="btn btn-o btn-primary my-3">
                    Add
                </button>
            </form>

        </div>
    </div>
</div>
<?php
include('include/footer.php')
?>
<script>
    function userAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'email=' + $("#patemail").val(),
            type: "POST",
            success: function(data) {
                $("#user-availability-status1").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
</script>