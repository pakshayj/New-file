<?php
$ttl = "Doctor | Forget Password";

session_start();
error_reporting(0);
include("../include/config.php");

if (isset($_POST['submit'])) {
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];
    $query = mysqli_query($con, "select id from  doctors where contactno='$contactno' and docEmail='$email'");
    $row = mysqli_num_rows($query);
    if ($row > 0) {

        $_SESSION['cnumber'] = $contactno;
        $_SESSION['email'] = $email;
        echo "<script>location.href='reset-password.php'</script>";
    } else {
        echo "<script>alert('Invalid details. Please try with valid details');location.href ='forget.php'</script>";
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
</head>

<body>

    <div class="container-fluid p-lg-5" style="background: linear-gradient(to right bottom,white,rgb(92, 189, 234));height:100vh;">
        <div class="row">
            <div class="col-12 w-100 ">
                <div class="mx-auto w-100">
                    <p class="text-center">

                        <a href="../index.php" class="text-secondary text-decoration-none h2">HMS | </a>
                        <span class="text-secondary h2">Doctor - Forget Password</span>
                    </p>
                </div>

                <div class="d-flex justify-content-center my-3">
                    <form style="width:340px" class="shadow p-3 bg-light" method="post">
                        <div class="mb-3 mt-2">
                            <label for="username" class="form-label">Registred Contact number:</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa fa-user text-secondary"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Contact number" id="contactno" name="contactno" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Regestred Email:</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa fa-envelope-open text-secondary"></i>
                                </span>
                                <input type="email" class="form-control" placeholder="Email" name="email" id="email" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" value="submit" name="submit">Submit</button>

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