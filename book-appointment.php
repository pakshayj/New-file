<?php


    $ttl = "User | Book appointment";

    session_start();

    error_reporting(0);

    include('include/config.php');

    include('include/header.php');

    include('include/checklogin.php');

    check_login();


    if (isset($_POST['submit'])) {
        $specilization=$_POST['Doctorspecialization'];
        $doctorid=$_POST['doctor'];
        $userid=$_SESSION['id'];
        $fees=$_POST['fees'];
        $appdate=$_POST['appdate'];
        $time=$_POST['apptime'];
        $userstatus=1;
        $docstatus=1;
        $query=mysqli_query($con, "insert into appointment(doctorSpecialization,doctorId,userId,consultancyFees,appointmentDate,appointmentTime,userStatus,doctorStatus) values('$specilization','$doctorid','$userid','$fees','$appdate','$time','$userstatus','$docstatus')");
    }

    ?>
    <div class="container-lg my-box my-3">
        <div class="row my-5 ">
            <div class="col-12">
                <h2 class="text-secondary text-center">User | Book Appointment </h2>
            </div>
        </div>
        <div class="row my-2">
            
           <div class="col-lg-8 col-md-12 mx-auto">
                <?php
                    if ($query) 
                    {
                ?>
                <div class="alert alert-success alert-dismissible" id="bookDone">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Success!</strong> Appointment submitted successfully
                </div>
                <?php
                    }
                ?>
                <p class="my-2 text-danger"><?php echo htmlentities($_SESSION['msg1']);?>

                <?php echo htmlentities($_SESSION['msg1']="");?></p>

                <form action="" name="book" method="POST">
                    <div class="form-group">
                    <label for="DoctorSpecialization">
                        Doctor Specialization
                    </label>

                    <select name="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);" required>
                        <option value="" selected hidden disabled>
                            Select Specialization
                        </option>

                        <?php 
                            $ret=mysqli_query($con, "select * from doctorspecilization");
                            while ($row=mysqli_fetch_array($ret)) 
                            {
                        ?>

                        <option value="<?php echo htmlentities($row['specilization']);?>">
                            <?php echo htmlentities($row['specilization']); ?>
                        </option>
                        
                        <?php } ?>

                    </select>
                    <div class="form-group">
                        <label for="doctor">Doctors</label>
                        <select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);" required="required">
                            <option value="">Select Doctor</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="consultancyfees">
                            Consultancy Fees
                        </label>
                        <select name="fees" class="form-control" id="fees" readonly>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="AppointmentDate">
                            Date
                        </label>
                        <input class="form-control datepicker" name="appdate" type="date" required data-date-format="yyyy-mm-dd" id="datepicker">

                    </div>

                    <div class="form-group">
                        <label for="Appointmenttime"> Time </label>
                        <input class="form-control"  type="time" name="apptime" id="timepicker1" required>
                            <p class="text-secondary">eg : 10:00 PM</p>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
           </div>
        </div>
    </div>
<script>
    function getdoctor(val) {
        $.ajax({
            type: "POST",
            url: "get_doctor.php",
            data: 'specilizationid=' + val,
            success: function(data) {
                $("#doctor").html(data);
            }
        });
    }

    function getfee(val) {
        $.ajax({
            type: "POST",
            url: "get_doctor.php",
            data: 'doctor=' + val,
            success: function(data) {
                $("#fees").html(data);
            }
        });
    }

</script>


<?php
    include("include/footer.php");
?>