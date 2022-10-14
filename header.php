<?php

 session_start();
 error_reporting(0);
 include("include/config.php");

    $res1=mysqli_query($con, "SELECT * FROM users WHERE email='".$_SESSION['login']."'");

    if (mysqli_num_rows($res1) > 0)
    {
        // output data of each row
        while ($row1 = mysqli_fetch_assoc($res1)) {
            $myUnm = $row1["fullName"];
        }
    } else {
        echo "0 results";
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
    <link rel="stylesheet" href="../css/sidenav.css">
</head>

<body>
    <nav class="navbar navbar-expand-xxl bg-dark navbar-dark">
        <div class="container-fluid">
            <div class="toggleBtn">
                <span class="fas fa-bars"></span>
            </div>
            <div class="d-flex">
                <a class="navbar-brand my-auto my-title" href="#">Hospital Management System</a>
                 <div class="dropdown"> <!-- dropstart -->
                    <button type="button" class="btn btn-dark title-btn" data-bs-toggle="dropdown">
                        <img src="../img/user.png" alt="" class="user-logo">
                        <span>
                            <?= $myUnm ?>
                            <br>
                            <i class="fa fa-angle-down"></i>
                        </span>

                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="edit-profile.php">My Profile</a></li>
                        <li><a class="dropdown-item" href="change-password.php">Change password</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </nav>

    <nav class="sidebar" id="sidenav">
        <div class="text ">
            HMS
        </div>
        <ul class="m-0 p-0 ">
            <li class="<?php if($ttl == "HMS | User Dashboard"){ ?>  active <?php } ?>">
                <a href="dashboard.php">
                    <i class="fa fa-home me-2"></i>
                Dashboard
                </a>
            </li>
            <li class="<?php if($ttl == "User | Book appointment"){ ?>  active <?php } ?>">
            <a href="book-appointment.php"><i class="fa fa-pencil-alt me-2"></i>Book Appointment</a></li>
            <!-- <li>
                <a href="#" class="feat-btn">Features
                    <span class="fas fa-caret-down first"></span>
                </a>
                <ul class="feat-show">
                    <li><a href="#">Pages</a></li>
                    <li><a href="#">Elements</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="serv-btn">Services
                    <span class="fas fa-caret-down second"></span>
                </a>
                <ul class="serv-show">
                    <li><a href="#">App Design</a></li>
                    <li><a href="#">Web Design</a></li>
                </ul>
            </li> -->
            <li class="<?php if($ttl == "User | Appointment history"){ ?>  active <?php } ?>">
            <a href="appointment-history.php"><i class="fa fa-clinic-medical me-2"></i> Appointment History</a></li>

            <li class="<?php if($ttl == "User | Medical history"){ ?>  active <?php } ?>">
            <a href="medical-history.php"><i class="fa fa-file-medical-alt me-2"></i> Medical History</a></li>

            <li class="<?php if($ttl == "User | Edit profile" || $ttl == "User | Change email" || $ttl ==  "User | Change password"){ ?>  active <?php } ?>">
            <a href="edit-profile.php"><i class="fa fa-user me-2"></i> Manage Profile</a></li>
        </ul>
    </nav>