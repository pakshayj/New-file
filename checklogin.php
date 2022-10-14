<?php

function check_login()
{
    if (!isset($_SESSION['login'])) {
        echo "<script>alert('Login first');location.href='user-login.php'</script>";
    }
}
