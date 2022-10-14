<?php
$ttl = "User | Medical history";

session_start();
// error_reporting(0);
include('include/config.php');
include('include/header.php');
include('include/checklogin.php');
check_login();
?>

<div class="container-lg my-box my-3">
    <div class="row my-5 ">
        <div class="col-12">
            <h2 class="text-secondary">USER | Medical History</h2>
        </div>
    </div>
    <div class="row my-2">
        <p class="text-danger"><?= $_SESSION['msg']; ?>
            <?php ($_SESSION['msg'] = ""); ?></p>

        <div class="col-lg-12 table-responsive">
            <table class="table table-hover table-striped" id="sample-table-1">
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
                    $uid = $_SESSION['id'];
                    $sql = mysqli_query($con, "select tblpatient.* from tblpatient join users on users.email=tblpatient.PatientEmail where users.id='$uid'");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <td class="center"><?= $cnt; ?>.</td>
                            <td class="hidden-xs"><?= $row['PatientName']; ?></td>
                            <td><?= $row['PatientContno']; ?></td>
                            <td><?= $row['PatientGender']; ?></td>
                            <td><?= $row['CreationDate']; ?></td>
                            <td><?= $row['UpdationDate']; ?>
                            </td>
                            <td>

                                <a href="view-medhistory.php?viewid=<?= $row['ID']; ?>"><i class="fa fa-eye"></i></a>

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