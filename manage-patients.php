<?php
$ttl = "Manage patients";
include('include/header.php');
include('../include/config.php');

?>
<div class="container my-3 my-box">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10 col-12">
            <h1 class="text-success">View <span class="text-bold">Patients</span></h1>

            <table class="table table-hover" id="sample-table-1">
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

                    $sql = mysqli_query($con, "select * from tblpatient");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <td class="center"><?=  $cnt; ?>.</td>
                            <td class="hidden-xs"><?=  $row['PatientName']; ?></td>
                            <td><?=  $row['PatientContno']; ?></td>
                            <td><?=  $row['PatientGender']; ?></td>
                            <td><?=  $row['CreationDate']; ?></td>
                            <td><?=  $row['UpdationDate']; ?>
                            </td>
                            <td>

                                <a href="view-patient.php?viewid=<?=  $row['ID']; ?>"><i class="fa fa-eye"></i></a>

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