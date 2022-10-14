<?php
$ttl = "Add doctor";
include('include/header.php');
include('../include/config.php');

if (isset($_POST['submit'])) {
    $docspecialization = $_POST['Doctorspecialization'];
    $docname = $_POST['docname'];
    $docaddress = $_POST['clinicaddress'];
    $docfees = $_POST['docfees'];
    $doccontactno = $_POST['doccontact'];
    $docemail = $_POST['docemail'];
    $password = md5($_POST['npass']);
    $sql = mysqli_query($con, "insert into doctors(specilization,doctorName,address,docFees,contactno,docEmail,password) values('$docspecialization','$docname','$docaddress','$docfees','$doccontactno','$docemail','$password')");
    if ($sql) {
        echo "<script>alert('Doctor info added Successfully');</script>";
        echo "<script>window.location.href ='manage-doctors.php'</script>";
    }
}
?>

<script>
    function checkemailAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'emailid=' + $("#docemail").val(),
            type: "POST",
            success: function(data) {
                $("#email-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }

    function valid() {
        if (document.adddoc.npass.value != document.adddoc.cfpass.value) {
            alert("Password and Confirm Password Field do not match  !!");
            document.adddoc.cfpass.focus();
            return false;
        }
        return true;
    }
</script>
<div class="container my-box my-3">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8 col-12">
            <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                <h1 class="text-success">Add doctor</h1>
                <div class="form-group mt-3">
                    <label for="DoctorSpecialization">
                        Doctor Specialization
                    </label>
                    <select name="Doctorspecialization" class="form-control" required="true">
                        <option value="" selected hidden disabled>Select Specialization</option>
                        <?php $ret = mysqli_query($con, "select * from doctorspecilization");
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
                            <option value="<?= ($row['specilization']); ?>">
                                <?= ($row['specilization']); ?>
                            </option>
                        <?php } ?>

                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="doctorname">
                        Doctor Name
                    </label>
                    <input type="text" name="docname" class="form-control" placeholder="Enter Doctor Name" required="true">
                </div>


                <div class="form-group mt-3">
                    <label for="address">
                        Doctor Clinic Address
                    </label>
                    <textarea name="clinicaddress" class="form-control" placeholder="Enter Doctor Clinic Address" required="true"></textarea>
                </div>
                <div class="form-group mt-3">
                    <label for="fess">
                        Doctor Consultancy Fees
                    </label>
                    <input type="text" name="docfees" class="form-control" placeholder="Enter Doctor Consultancy Fees" required="true">
                </div>

                <div class="form-group mt-3">
                    <label for="fess">
                        Doctor Contact no
                    </label>
                    <input type="text" name="doccontact" class="form-control" placeholder="Enter Doctor Contact no" required="true">
                </div>

                <div class="form-group mt-3">
                    <label for="fess">
                        Doctor Email
                    </label>
                    <input type="email" id="docemail" name="docemail" class="form-control" placeholder="Enter Doctor Email id" required="true" onBlur="checkemailAvailability()">
                    <span id="email-availability-status"></span>
                </div>




                <div class="form-group mt-3">
                    <label for="exampleInputPassword1">
                        Password
                    </label>
                    <input type="password" name="npass" class="form-control" placeholder="New Password" required="required">
                </div>

                <div class="form-group mt-3">
                    <label for="exampleInputPassword2">
                        Confirm Password
                    </label>
                    <input type="password" name="cfpass" class="form-control" placeholder="Confirm Password" required="required">
                </div>



                <button type="submit" name="submit" id="submit" class="btn mt-3 btn-primary">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>