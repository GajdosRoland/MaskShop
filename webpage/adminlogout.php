<?php
session_start();
unset($_SESSION['admin_name']);
unset($_SESSION['pw']);
session_destroy();
header("location:index.php");