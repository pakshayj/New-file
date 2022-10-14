<?php
    $ttl = "User | Login";

    session_start();
    error_reporting(0);
    include("include/config.php");
    if(isset($_POST['submit']))
    {
        $ret=mysqli_query($con,"SELECT * FROM users WHERE email='".$_POST['username']."' and password='".md5($_POST['password'])."'");
        $num=mysqli_fetch_array($ret);
        if($num>0)
        {
            $extra="dashboard.php";
            $_SESSION['login']=$_POST['username'];
            $_SESSION['id']=$num['id'];
            $host=$_SERVER['HTTP_HOST'];
            $uip=$_SERVER['REMOTE_ADDR'];
            $status=1;

            // For stroing log if user login successfull
            $log=mysqli_query($con,"insert into userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')");
            $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
            header("location:http://$host$uri/$extra");
            exit();
        }
        else
        {
            // For stroing log if user login unsuccessfull
            $_SESSION['login']=$_POST['username'];	
            $uip=$_SERVER['REMOTE_ADDR'];
            $status=0;
            mysqli_query($con,"insert into userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')");
            $_SESSION['errmsg']="Invalid username or password";
            $extra="user-login.php";
            $host  = $_SERVER['HTTP_HOST'];
            $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
            header("location:http://$host$uri/$extra");
            exit();
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

<body>
    <?php
        if($_SESSION['errmsg']){
    ?>
    <div class="alert alert-danger alert-dismissible mb-0">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Error!</strong>
        <?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?>
    </div>
    <?php } ?>

    <div class="container-fluid p-lg-5" style="background: linear-gradient(to right bottom,white,rgb(240, 177, 143));height:100vh;">
        <div class="row">
            <div class="col-12 w-100 ">
                <div class="mx-auto w-100">
                     <p class="text-center">

                     <a href="../index.php" class="text-secondary text-decoration-none h2">HMS | </a>
                <span class="text-secondary h2"> PATIENT LOGIN</span></p>
                </div>
               
                <div class="d-flex justify-content-center my-3">
                    <form style="width:340px" class="shadow p-3 bg-light" method="post">
                        <div class="mb-3 mt-2">
                            <label for="username" class="form-label">Email:</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa fa-envelope text-secondary"></i>
                                </span>
                                <input type="email" class="form-control" placeholder="Email" id="username" name="username" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-lock text-secondary"></i>
                            </span>
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                        </div>
                        </div>
                        <div class="form-check mb-3">
                            <label class="form-check-label w-100">
                                <a href="forget.php" class="text-decoration-none text-primary text-end d-block w-100">forget password?</a>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary" value="submit" name="submit">Login</button>

                        <div class="mt-4 mb-3">
                            <p class="text-seconday"> Don't have an account yet? <a href="signup.php" class="text-decoration-none text-primary"> Create an account</a></p>
                        </div>

                        <hr class="w-75 mx-auto ">
                        <p class="text-secondary">&copy; 2022 <a href="../index.php" class="text-secondary"> HMS</a>. All rights reserved

                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>