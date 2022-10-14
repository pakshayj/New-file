<?php
$ttl = "Doctor Dashboard";
include('include/header.php');
?>
<div class="container-lg my-box my-3">
    <div class="row my-5 ">
        <div class="col-12">
            <h2 class="text-secondary">DOCTOR | DASHBOARD</h2>
        </div>
    </div>
    <div class="row d-flex justify-content-between  ">
        <div class="col-lg-6">
            <div class="d-box border d-flex flex-column align-items-center justify-content-center p-2" style="height: 250px;">
                <i class="fa fa-user fa-3x my-2">
                </i>
                <h3 class="text-secondary text-center">My Profile</h3>
                <a href="edit-profile.php" class="text-decoration-none my-2">update profile</a>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="d-box border d-flex flex-column align-items-center justify-content-center p-2" style="height: 250px;">
                <i class="fa fa-paperclip fa-3x my-2">
                </i>
                <h3 class="text-secondary text-center">My Appointment
                </h3>
                <a href="appointment-history.php" class="text-decoration-none my-2">View Appointment History</a>
            </div>
        </div>
    </div>
</div>

<?php
include('include/footer.php');
?>