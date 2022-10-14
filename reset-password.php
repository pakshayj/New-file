<?php
$ttl = "Doctor | Reset password";

session_start();
//error_reporting(0);
include("../include/config.php");
// Code for updating Password
if (isset($_POST['change'])) {
    $cno = $_SESSION['cnumber'];
    $email = $_SESSION['email'];
    $newpassword = md5($_POST['password']);
    $query = mysqli_query($con, "update doctors set password='$newpassword' where contactno='$cno' and docEmail='$email'");
    if ($query) {
        echo "<script>alert('Password successfully updated.');</script>";
        echo "<script>location.href ='index.php'</script>";
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
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../fontawesome-free-5.9.0-web/css/all.min.css">

    <script type="text/javascript">
        function valid() {
            if (document.passwordreset.password.value != document.passwordreset.password_again.value) {
                alert("Password and Confirm Password Field do not match  !!");
                document.passwordreset.password_again.focus();
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <?php
    if ($_SESSION['errmsg']) {
    ?>
        <div class="alert alert-danger alert-dismissible mb-0">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Error!</strong>
            <?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg'] = ""; ?>
        </div>
    <?php
    }
    ?>


    <div class="container-fluid p-lg-5" style="background: linear-gradient(to right bottom,white,rgb(92, 189, 234));height:100vh;">
        <div class="row">
            <div class="col-12 w-100 ">
                <div class="mx-auto w-100">
                    <p class="text-center">

                        <a href="../index.php" class="text-secondary text-decoration-none h2">HMS | </a>
                        <span class="text-secondary h2">Doctor - Reset Password</span>
                    </p>
                </div>

                <div class="d-flex justify-content-center my-3">
                    <form style="width:340px" class="shadow p-3 bg-light" method="post" name="passwordreset" onSubmit="return valid()">
                        <div class="mb-3 mt-2">
                            <label for="username" class="form-label">Password:</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa fa-lock text-secondary"></i>
                                </span>
                                <input type="password" class="form-control" placeholder="New Password" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirm Password:</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa fa-lock text-secondary"></i>
                                </span>
                                <input type="password" class="form-control" placeholder="Retype Password" name="password_again" id="password_again" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" value="submit" name="change">Submit</button>

                        <div class="mt-4 mb-3">
                            <p class="text-seconday"> Already have an account? <a href="user-login.php" class="text-decoration-none text-primary">Log-in</a></p>
                        </div>

                        <hr class="w-75 mx-auto ">
                        <p class="text-secondary">&copy; 2022 <a href="../index.php" class="text-secondary"> HMS</a>.
                            All
                            rights reserved

                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../js/jquery-3.6.0.min.js"></script>
</body>

</html>