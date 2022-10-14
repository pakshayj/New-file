<?php

    $ttl = "User | Change email";
    session_start();

    error_reporting(0);

    include('include/config.php');

    include('include/header.php');

    include('include/checklogin.php');

    check_login();

    if (isset($_POST['submit'])) {
        $email=$_POST['email'];
        $sql=mysqli_query($con, "Update users set email='$email' where id='".$_SESSION['id']."'");
        if ($sql) {
            $msg="Your email updated Successfully";
        }
    }

    ?>

<div class="container-lg my-box my-3">
    <div class="row my-5 ">
        <div class="col-12">
            <h2 class="text-secondary text-center">User | Edit Profile </h2>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-md-12">

            <div class="row">
                <div class="col-lg-8 col-md-12 mx-auto">

                    <div class="panel panel-white">
                        <h6 class="text-success">
                            <?php if ($msg) {
                                                echo htmlentities($msg);
                                            }?>
                        </h6>

                        <div class="panel-body">
                            <form name="registration" id="updatemail" method="post">
                                <div class="form-group my-3">
                                    <label for="fess">
                                        User Email
                                    </label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        onBlur="userAvailability()" placeholder="Email" required>

                                    <span id="user-availability-status1" style="font-size:12px;"></span>
                                </div>


                                <button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
                                    Update
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function userAvailability() {
        // $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'email=' + $("#email").val(),
            type: "POST",
            success: function (data) {
                $("#user-availability-status1").html(data);
                // $("#loaderIcon").hide();
            },
            error: function () { }
        });
    }
</script>
<?php
    include('include/footer.php');
?>