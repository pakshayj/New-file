<?php


$ttl = "Doctor | Manage patient";


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
            <h2 class="text-secondary">Manage Patient</h2>
        </div>
    </div>
    <div class="row my-2">
        <p class="text-danger"><?= ($_SESSION['msg']); ?>
            <?= ($_SESSION['msg'] = ""); ?></p>

        <div class="col-lg-12 table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th class="center">#</th>
                        <th>Patient Name</th>
                        <th>Patient Contact Number</th>
                        <th>Patient Gender </th>
                        <th>Creation Date </th>
                        <th>Updation Date </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $docid = $_SESSION['id'];
                    $sql = mysqli_query($con, "select * from tblpatient where Docid='$docid' ");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <td class="center"><?php echo $cnt; ?>.</td>
                            <td class="hidden-xs"><?php echo $row['PatientName']; ?></td>
                            <td><?php echo $row['PatientContno']; ?></td>
                            <td><?php echo $row['PatientGender']; ?></td>
                            <td><?php echo $row['CreationDate']; ?></td>
                            <td><?php echo $row['UpdationDate']; ?>
                            </td>
                            <td>

                                <a href="edit-patient.php?editid=<?php echo $row['ID']; ?>"><i class="fa fa-edit"></i></a> || <a href="view-patient.php?viewid=<?php echo $row['ID']; ?>"><i class="fa fa-eye"></i></a>

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