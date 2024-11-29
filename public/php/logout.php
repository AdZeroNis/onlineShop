<?php
session_start();
unset($_SESSION['signin']) ;
session_destroy();
header('location:../views/login.php');