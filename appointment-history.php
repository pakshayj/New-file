<?php


$ttl = "Doctor | Appointment history";


include("include/header.php");

include('../include/config.php');

// include('include/checklogin.php');


session_start();
error_reporting(0);
// check_login();
if (isset($_GET['cancel'])) {
    mysqli_query($con, "update appointment set doctorStatus='0' where id ='" . $_GET['id'] . "'");
    $_SESSION['msg'] = "Appointment canceled !!";
}

?>

<div class="container-lg my-box my-3">
    <div class="row my-5 ">
        <div class="col-12">
            <h2 class="text-secondary">Appointment History</h2>
        </div>
    </div>
    <div class="row my-2">
        <p class="text-danger"><?= htmlentities($_SESSION['msg']); ?>
            <?= htmlentities($_SESSION['msg'] = ""); ?></p>

        <div class="col-lg-12 table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th class="center">#</th>
                        <th class="hidden-xs">Patient Name</th>
                        <th>Specialization</th>
                        <th>Consultancy Fee</th>
                        <th>Appointment Date / Time </th>
                        <th>Appointment Creation Date </th>
                        <th>Current Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($con, "select users.fullName as fname,appointment.*  from appointment join users on users.id=appointment.userId where appointment.doctorId='" . $_SESSION['id'] . "'");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>

                        <tr>
                            <td class="center"><?php echo $cnt; ?>.</td>
                            <td class="hidden-xs"><?php echo $row['fname']; ?></td>
                            <td><?php echo $row['doctorSpecialization']; ?></td>
                            <td><?php echo $row['consultancyFees']; ?></td>
                            <td><?php echo $row['appointmentDate']; ?> / <?php echo
                                                                            $row['appointmentTime']; ?>
                            </td>
                            <td><?php echo $row['postingDate']; ?></td>
                            <td>
                                <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                                    echo "Active";
                                }
                                if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
                                    echo "Cancel by Patient";
                                }

                                if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
                                    echo "Cancel by you";
                                }



                                ?></td>
                            <td>
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>


                                        <a href="appointment-history.php?id=<?php echo $row['id'] ?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')" class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
                                    <?php } else {

                                        echo "Canceled";
                                    } ?>
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

include("include/footer.php");

?>