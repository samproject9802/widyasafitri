<?php
require_once '../config.php';

$id = $_POST['id'];
$namaDosen = $_POST['namaDosen'];

$sql = "UPDATE tbpengajuankelompok
        SET nama_dosen='$namaDosen', status='Valid'
        WHERE id_kelompok='$id'";

if ($conn->query($sql)) {
    echo 'Sukses';
} else {
    echo 'Gagal';
};
