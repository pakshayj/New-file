<?php
    $ttl = "User | SignUp";

    include_once('include/config.php');
    if(isset($_POST['submit']))
    {
        $fname=$_POST['full_name'];
        $address=$_POST['address'];
        $city=$_POST['city'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $query=mysqli_query($con,"insert into users(fullname,address,city,gender,email,password) values('$fname','$address','$city','$gender','$email','$password')");
        
        if($query)
        {
            echo "<script>alert('Successfully Registered. You can login now');</script>";
            header('location:user-login.php');
        }else{
            echo "<script>alert('no');</script> + $query";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $ttl; ?></title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-5.9.0-web/css/all.min.css">
</head>

<body >

 <script type="text/javascript">
    function valid() {
        if (document.registration.password.value != document.registration.password_again.value) {
            alert("Password and Confirm Password Field do not match  !!");
            document.registration.password_again.focus();
            return false; 
        }
        return true;
    }
</script>

    <div class="container-fluid px-lg-5 py-lg-1" style="background: linear-gradient(to right bottom,white,rgb(90, 208, 149));">
        <div class="row ">
            <div class="col-12 w-100 ">
                <div class="mx-auto w-100">
                    <p class="text-center">

                        <a href="../index.php" class="text-secondary text-decoration-none h2">HMS | </a>
                        <span class="text-secondary h2"> PATIENT SIGN UP</span>
                    </p>
                </div>

                <div class="d-flex justify-content-center my-3">
                    <form style="width:400px" class="shadow p-3 bg-light" name="registration" onSubmit="return valid();" id="registration" method="POST">
                        <div class="mb-3 mt-2">
                            <input type="text" class="form-control" id="full_name" placeholder="Full name" name="full_name" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="address" placeholder="Address"
                                name="address" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="city" placeholder="City" name="city" required>
                        </div>
                        <div class="mb-3">
                            <label  class="d-block mb-2">Gender</label>
                            <input type="radio" name="gender" value="male" class="form-check-input"> Male &nbsp;&nbsp;
                            <input type="radio" name="gender" value="female" class="form-check-input"> Female
                        </div>
                        <div class="mb-3 mt-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa fa-envelope text-secondary"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Email" name="email" id="email" onBlur="userAvailability()" required>
                            </div>
                            <span class="d-block" id="user-availability-status1" style="font-size:12px;"></span>
                        </div>
                        <div class="mb-3 mt-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa fa-lock text-secondary"></i>
                                </span>
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                            </div>
                        </div>
                        <div class="mb-3 mt-2">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-lock text-secondary"></i>
                            </span>
                            <input type="password" class="form-control" placeholder="confirm password" name="password_again" required>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit" id="submit">Register</button>

                        <div class="mt-4 mb-3">
                            <p class="text-seconday">Already have an account? <a href="user-login.php"
                                    class="text-decoration-none text-primary"> Log-in</a></p>
                        </div>

                        <hr class="w-75 mx-auto ">
                        <p class="text-secondary">&copy; 2022 <a href="../index.php" class="text-secondary"> HMS</a>.
                            All rights reserved
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script>
        function userAvailability() {
            
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'email=' + $("#email").val(),
            type: "POST",
            success: function(data) {
                $("#user-availability-status1").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
    </script>
</body>

</html>