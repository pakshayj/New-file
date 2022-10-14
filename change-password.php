<?php


$ttl = "Doctor | Change password";
include('include/header.php');

session_start();
error_reporting(0);
include('../include/config.php');
date_default_timezone_set('Asia/Kolkata'); // change according timezone
$currentTime = date('d-m-Y h:i:s A', time());
if (isset($_POST['submit'])) {
    $sql = mysqli_query($con, "SELECT password FROM  doctors where password='" . md5($_POST['cpass']) . "' && id='" . $_SESSION['id'] . "'");
    $num = mysqli_fetch_array($sql);
    if ($num > 0) {
        $con = mysqli_query($con, "update doctors set password='" . md5($_POST['npass']) . "', updationDate='$currentTime' where id='" . $_SESSION['id'] . "'");
        $_SESSION['msg1'] = "Password Changed Successfully !!";
    } else {
        $_SESSION['msg1'] = "Old Password not match !!";
    }
}


?>

<div class="container-lg my-box my-3">
    <div class="row my-5 ">
        <div class="col-12">
            <h2 class="text-secondary text-center">Doctor | Edit Profile </h2>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-8 col-md-12 mx-auto">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h5 class="panel-title">Change Password</h5>
                            </div>
                            <div class="panel-body">
                                <p style="color:red;">
                                    <?php echo htmlentities($_SESSION['msg1']); ?>
                                    <?php echo htmlentities($_SESSION['msg1'] = ""); ?>
                                </p>
                                <div class="panel-body">
                                    <p style="color:red;"><?= $_SESSION['msg1']; ?>
                                        <?= $_SESSION['msg1'] = ""; ?></p>
                                    <form role="form" name="chngpwd" method="post" onSubmit="return valid();">
                                        <div class="form-group mt-3">
                                            <label for="exampleInputEmail1">
                                                Current Password
                                            </label>
                                            <input type="password" name="cpass" class="form-control" placeholder="Enter Current Password">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="exampleInputPassword1">
                                                New Password
                                            </label>
                                            <input type="password" name="npass" class="form-control" placeholder="New Password">
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="exampleInputPassword1">
                                                Confirm Password
                                            </label>
                                            <input type="password" name="cfpass" class="form-control" placeholder="Confirm Password">
                                        </div>



                                        <button type="submit" name="submit" class="btn btn-o btn-primary mt-3">
                                            Submit
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    function valid() {
        if (document.chngpwd.cpass.value == "") {
            alert("Current Password Filed is Empty !!");
            document.chngpwd.cpass.focus();
            return false;
        } else if (document.chngpwd.npass.value == "") {
            alert("New Password Filed is Empty !!");
            document.chngpwd.npass.focus();
            return false;
        } else if (document.chngpwd.cfpass.value == "") {
            alert("Confirm Password Filed is Empty !!");
            document.chngpwd.cfpass.focus();
            return false;
        } else if (document.chngpwd.npass.value != document.chngpwd.cfpass.value) {
            alert("Password and Confirm Password Field do not match  !!");
            document.chngpwd.cfpass.focus();
            return false;
        }
        return true;
    }
</script>
<?php
include('include/footer.php');

?>