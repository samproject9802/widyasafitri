<?php
session_start();

session_unset();
session_destroy();
$_SESSION['status'] = "";
header('Location: ../../index.php');
