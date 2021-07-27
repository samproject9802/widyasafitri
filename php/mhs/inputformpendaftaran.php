<?php

require_once '../config.php';

$nirm = $_POST['nirm'];
$namamahasiswa = $_POST['namamahasiswa'];
$jurusan = $_POST['pilihanjurusan'];
$nohp = $_POST['nohp'];
$bidangpkm = $_POST['pilihanppkm'];
$spermohonan = $_FILES['berkaspermohonan']['name'];
$spermohonantmp = $_FILES['berkaspermohonan']['tmp_name'];
$kpkm = $_FILES['kwitansi']['name'];
$kpkmtmp = $_FILES['kwitansi']['tmp_name'];
$kuangkuliah = $_FILES['uangkuliah']['name'];
$kuangkuliahtmp = $_FILES['uangkuliah']['tmp_name'];
$kartukuning = $_FILES['kartukuning']['name'];
$kartukuningtmp = $_FILES['kartukuning']['tmp_name'];
$dns = $_FILES['dns']['name'];
$dnstmp = $_FILES['dns']['tmp_name'];
$dirUpload = "../../uploads/$nirm/";

$sql = "INSERT INTO `tbpendaftaranmhs` (nirm,nama,jurusan,nohp,bidangppkm,spermohonan,kwitansippkm,ukt,kk,dns)
VALUES ('$nirm', '$namamahasiswa','$jurusan','$nohp','$bidangpkm','$spermohonan','$kpkm','$kuangkuliah','$kartukuning','$dns')";

if ($conn->query($sql) === TRUE) {
    move_uploaded_file($spermohonantmp, $dirUpload . $spermohonan);
    move_uploaded_file($kpkmtmp, $dirUpload . $kpkm);
    move_uploaded_file($kuangkuliahtmp, $dirUpload . $kuangkuliah);
    move_uploaded_file($kartukuningtmp, $dirUpload . $kartukuning);
    move_uploaded_file($dnstmp, $dirUpload . $dns);

    $sqlstatus = "INSERT INTO tbstatusmhs 
            VALUES ('$nirm', 'Sudah Mengisi','')";
    $conn->query($sqlstatus);

    header('location: ../../mhsmenu/index.php');
}
