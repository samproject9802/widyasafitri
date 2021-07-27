<?php
include_once 'config.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$dir = "../uploads/$username";

$sql = "INSERT INTO tbloginmhs (username,password)
VALUES ('$username', '$password')";

if ($conn->query($sql) == true) {
    header('location: ../index.php?page=registrasi&task=signup-success');
    mkdir($dir);
} else {
    header('location: ../index.php?page=registrasi&task=signup-failed');
}
