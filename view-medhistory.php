<?php

    $ttl = "User | Medical History";

    session_start();

    error_reporting(0);

    include('include/config.php');

    include('include/header.php');

    include('include/checklogin.php');

    check_login();
    if (isset($_POST['submit'])) {
        $vid=$_GET['viewid'];
        $bp=$_POST['bp'];
        $bs=$_POST['bs'];
        $weight=$_POST['weight'];
        $temp=$_POST['temp'];
        $pres=$_POST['pres'];


        $query.=mysqli_query($con, "insert tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres)value('$vid','$bp','$bs','$weight','$temp','$pres')");
        if ($query) {
            echo '<script>alert("Medicle history has been added.")</script>';
            echo "<script>window.location.href ='manage-patient.php'</script>";
        } else {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
    }


?>

    <div class="container-lg my-box my-3">
        <div class="row my-5 ">
            <div class="col-12">
                <h2 class="text-secondary">USER | View Medical History</h2>
            </div>
        </div>
        <div class="row my-2">

           <div class="col-lg-12 table-responsive">
            <h5 class="text-secondary">Users <span class="text-bold">Medical
                                        History</span></h5>
                                <?php
                               $vid=$_GET['viewid'];
                               $ret=mysqli_query($con,"select * from tblpatient where ID='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
                               ?>
               <table border="1" class="table table-bordered">
                                    <tr align="center">
                                        <td colspan="4" style="font-size:20px;color:blue">
                                            Patient Details</td>
                                    </tr>

                                    <tr>
                                        <th scope>Patient Name</th>
                                        <td><?php  echo $row['PatientName'];?></td>
                                        <th scope>Patient Email</th>
                                        <td><?php  echo $row['PatientEmail'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope>Patient Mobile Number</th>
                                        <td><?php  echo $row['PatientContno'];?></td>
                                        <th>Patient Address</th>
                                        <td><?php  echo $row['PatientAdd'];?></td>
                                    </tr>
                                    <tr>
                                        <th>Patient Gender</th>
                                        <td><?php  echo $row['PatientGender'];?></td>
                                        <th>Patient Age</th>
                                        <td><?php  echo $row['PatientAge'];?></td>
                                    </tr>
                                    <tr>

                                        <th>Patient Medical History(if any)</th>
                                        <td><?php  echo $row['PatientMedhis'];?></td>
                                        <th>Patient Reg Date</th>
                                        <td><?php  echo $row['CreationDate'];?></td>
                                    </tr>

                                    <?php }?>
                                </table>
                                <?php

$ret=mysqli_query($con,"select * from tblmedicalhistory  where PatientID='$vid'");



 ?>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <tr align="center">
                                        <th colspan="8">Medical History</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Blood Pressure</th>
                                        <th>Weight</th>
                                        <th>Blood Sugar</th>
                                        <th>Body Temprature</th>
                                        <th>Medical Prescription</th>
                                        <th>Visit Date</th>
                                    </tr>
                                    <?php
while ($row=mysqli_fetch_array($ret)) {
  ?>
                                    <tr>
                                        <td><?php echo $cnt;?></td>
                                        <td><?php  echo $row['BloodPressure'];?></td>
                                        <td><?php  echo $row['Weight'];?></td>
                                        <td><?php  echo $row['BloodSugar'];?></td>
                                        <td><?php  echo $row['Temperature'];?></td>
                                        <td><?php  echo $row['MedicalPres'];?></td>
                                        <td><?php  echo $row['CreationDate'];?></td>
                                    </tr>
                                    <?php $cnt=$cnt+1;} ?>
                                </table>
           </div>
        </div>
    </div>
<?php

               include("include/footer.php");

    ?>