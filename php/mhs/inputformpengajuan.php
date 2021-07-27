<?php
session_start();

require_once '../config.php';

$noreg1 = $_POST['noreg1'];
$datareg1 = explode("/", $noreg1);
$jenisreg1 = $datareg1[0];
$tahunreg1 = $datareg1[1];
$nomorreg1 = $datareg1[2];
$nirm1 = $_POST['nirm1'];
$namamahasiswa1 = $_POST['namamhs1'];

$noreg2 = $_POST['noreg2'];
$datareg2 = explode("/", $noreg2);
$jenisreg2 = $datareg2[0];
$tahunreg2 = $datareg2[1];
$nomorreg2 = $datareg2[2];
$nirm2 = $_POST['nirm2'];
$namamahasiswa2 = $_POST['namamhs2'];

$noreg3 = $_POST['noreg3'];
$datareg3 = explode("/", $noreg3);
$jenisreg3 = $datareg3[0];
$tahunreg3 = $datareg3[1];
$nomorreg3 = $datareg3[2];
$nirm3 = $_POST['nirm3'];
$namamahasiswa3 = $_POST['namamhs3'];

$noreg4 = $_POST['noreg4'];
$datareg4 = explode("/", $noreg4);
$jenisreg4 = $datareg4[0];
$tahunreg4 = $datareg4[1];
$nomorreg4 = $datareg4[2];
$nirm4 = $_POST['nirm4'];
$namamahasiswa4 = $_POST['namamhs4'];

$noreg5 = $_POST['noreg5'];
$datareg5 = explode("/", $noreg5);
$jenisreg5 = $datareg5[0];
$tahunreg5 = $datareg5[1];
$nomorreg5 = $datareg5[2];
$nirm5 = $_POST['nirm5'];
$namamahasiswa5 = $_POST['namamhs5'];

$judulppkm = $_POST['judulppkm'];

if ($noreg1 != "" && $nirm1 != "" && $namamahasiswa1 != "") {
    if ($noreg2 != "" && $nirm2 != "" && $namamahasiswa2 != "") {
        if ($noreg3 != "" && $nirm3 != "" && $namamahasiswa3 != "") {
            if ($noreg4 != "" && $nirm4 != "" && $namamahasiswa4 != "") {
                if ($noreg5 != "" && $nirm5 != "" && $namamahasiswa5 != "") {
                    $tahun = [$tahunreg1, $tahunreg2, $tahunreg3, $tahunreg4, $tahunreg5];
                    $jenis = [$jenisreg1, $jenisreg2, $jenisreg3, $jenisreg4, $jenisreg5];
                    $nomor = [$nomorreg1, $nomorreg2, $nomorreg3, $nomorreg4, $nomorreg5];
                    $nirm = [$nirm1, $nirm2, $nirm3, $nirm4, $nirm5];
                    $nama = [$namamahasiswa1, $namamahasiswa2, $namamahasiswa3, $namamahasiswa4, $namamahasiswa5];

                    $tahunsekarang = date("Y");
                    $message = [];

                    $jmlharrTahun = 5;

                    for ($i = 0; $i < $jmlharrTahun; $i++) {
                        if ($tahun[$i] != $tahunsekarang) {
                            $chk_value = "Tahun Berbeda";
                            array_push($message, $chk_value);
                            break;
                        }
                    }

                    if (isset($message[0])) {
                        echo "<script type='text/javascript'>alert('Data Tahun tidak sama');</script>";
                        echo "<script>setTimeout(function(){ window.location.href = '../../mhsmenu/index.php?page=form-pengajuan'; }, 3000);</script>";
                    } else {
                        $hasilcheckingnirm = [];
                        $hasilcheckingnama = [];

                        for ($i = 0; $i < $jmlharrTahun; $i++) {
                            $sqlcheckingdata = "SELECT * FROM `tbpendaftaranmhs` WHERE noreg='$nomor[$i]' AND bidangppkm='$jenis[$i]'";
                            $resultcheckingdata = $conn->query($sqlcheckingdata);

                            if ($resultcheckingdata->num_rows > 0) {
                                // output data of each row
                                while ($rowcheckingdata = $resultcheckingdata->fetch_assoc()) {
                                    array_push($hasilcheckingnama, $rowcheckingdata['nama']);
                                    array_push($hasilcheckingnirm, $rowcheckingdata['nirm']);
                                }
                            }
                        }

                        $secondchecking = [];

                        if (isset($hasilcheckingnama) && isset($hasilcheckingnirm)) {
                            //Checking Nama dan Nirm Sesuai Noreg
                            for ($i = 0; $i < $jmlharrTahun; $i++) {
                                if ($hasilcheckingnirm[$i] != $nirm[$i] || $hasilcheckingnama[$i] != $nama[$i]) {
                                    $chk_value = "Nama atau Nirm berbeda";
                                    array_push($secondchecking, $chk_value);
                                    break;
                                }
                            }
                        }

                        if (isset($secondchecking[0])) {
                            echo "<script type='text/javascript'>alert('Data Nama atau Nirm tidak sama');</script>";
                            echo "<script>setTimeout(function(){ window.location.href = '../../mhsmenu/index.php?page=form-pengajuan'; }, 3000);</script>";
                        } else {
                            $finalstep = [];

                            for ($i = 0; $i < $jmlharrTahun; $i++) {
                                $sqlcheckingdata = "SELECT * FROM `tbpendaftaranmhs` WHERE noreg='$nomor[$i]' AND nirm='$nirm[$i]'";
                                $resultcheckingdata = $conn->query($sqlcheckingdata);

                                if ($resultcheckingdata->num_rows > 0) {
                                    // output data of each row
                                    while ($rowcheckingdata = $resultcheckingdata->fetch_assoc()) {
                                        array_push($finalstep, $rowcheckingdata['bidangppkm']);
                                    }
                                }
                            }

                            $sumarray = array_count_values($finalstep);
                            $sumarraysaja = array_values($sumarray);
                            if ($sumarraysaja[0] < $jmlharrTahun) {
                                echo "<script type='text/javascript'>alert('Data Jenis PKM tidak sama');</script>";
                                echo "<script>setTimeout(function(){ window.location.href = '../../mhsmenu/index.php?page=form-pengajuan'; }, 3000);</script>";
                            } else {
                                $sqlinsertdatapeng = "INSERT INTO tbpengajuankelompok (noreg1,nirm1,nama1,noreg2,nirm2,nama2,noreg3,nirm3,nama3,noreg4,nirm4,nama4,noreg5,nirm5,nama5,bidangppkm,judul,status)
                            VALUES ('$noreg1', '$nirm1', '$namamahasiswa1',
                            '$noreg2', '$nirm2', '$namamahasiswa2',
                            '$noreg3', '$nirm3', '$namamahasiswa3',
                            '$noreg4', '$nirm4', '$namamahasiswa4',
                            '$noreg5', '$nirm5', '$namamahasiswa5',
                            '$finalstep[0]',
                            '$judulppkm','Belum Divalidasi'
                            )";

                                if ($conn->query($sqlinsertdatapeng) === TRUE) {
                                    for ($i = 1; $i < $jmlharrTahun; $i++) {
                                        $sqlupdate[$i] = "UPDATE tbstatusmhs SET status_pengajuan='Sudah Mengisi' WHERE username='$nirm[$i]'";
                                        $conn->query($sqlupdate[$i]);
                                    }
                                    echo "<script>setTimeout(function(){ window.location.href = '../../mhsmenu/index.php?page=form-pengajuan'; }, 1000);</script>";
                                }
                            }
                        }
                    }
                } else {
                    $tahun = [$tahunreg1, $tahunreg2, $tahunreg3, $tahunreg4];
                    $jenis = [$jenisreg1, $jenisreg2, $jenisreg3, $jenisreg4];
                    $nomor = [$nomorreg1, $nomorreg2, $nomorreg3, $nomorreg4];
                    $nirm = [$nirm1, $nirm2, $nirm3, $nirm4];
                    $nama = [$namamahasiswa1, $namamahasiswa2, $namamahasiswa3, $namamahasiswa4];

                    $tahunsekarang = date("Y");
                    $message = array();

                    $jmlharrTahun = 4;

                    for ($i = 0; $i < $jmlharrTahun; $i++) {
                        if ($tahun[$i] != $tahunsekarang) {
                            $chk_value = "Tahun Berbeda";
                            array_push($message, $chk_value);
                            break;
                        }
                    }

                    if (isset($message[0])) {
                        echo "<script type='text/javascript'>alert('Data Tahun tidak sama');</script>";
                        echo "<script>setTimeout(function(){ window.location.href = '../../mhsmenu/index.php?page=form-pengajuan'; }, 3000);</script>";
                    } else {
                        $hasilcheckingnirm = [];
                        $hasilcheckingnama = [];

                        for ($i = 0; $i < $jmlharrTahun; $i++) {
                            $sqlcheckingdata[$i] = "SELECT * FROM `tbpendaftaranmhs` WHERE noreg='$nomor[$i]' AND bidangppkm='$jenis[$i]'";
                            $resultcheckingdata[$i] = $conn->query($sqlcheckingdata[$i]);
                            if ($resultcheckingdata[$i]->num_rows > 0) {
                                // output data of each row
                                while ($rowcheckingdata[$i] = $resultcheckingdata[$i]->fetch_assoc()) {
                                    array_push($hasilcheckingnama, $rowcheckingdata[$i]['nama']);
                                    array_push($hasilcheckingnirm, $rowcheckingdata[$i]['nirm']);
                                }
                            }
                        }

                        $secondchecking = [];

                        if (isset($hasilcheckingnama) && isset($hasilcheckingnirm)) {
                            //Checking Nama dan Nirm Sesuai Noreg
                            for ($i = 0; $i < $jmlharrTahun; $i++) {
                                if ($hasilcheckingnirm[$i] != $nirm[$i] || $hasilcheckingnama[$i] != $nama[$i]) {
                                    $chk_value = "Nama atau Nirm berbeda";
                                    array_push($secondchecking, $chk_value);
                                    break;
                                }
                            }
                        }

                        if (isset($secondchecking[0])) {
                            echo "<script type='text/javascript'>alert('Data Nama atau Nirm tidak sama');</script>";
                            echo "<script>setTimeout(function(){ window.location.href = '../../mhsmenu/index.php?page=form-pengajuan'; }, 3000);</script>";
                        } else {
                            $finalstep = [];

                            for ($i = 0; $i < $jmlharrTahun; $i++) {
                                $sqlcheckingdata = "SELECT * FROM `tbpendaftaranmhs` WHERE noreg='$nomor[$i]' AND nirm='$nirm[$i]'";
                                $resultcheckingdata = $conn->query($sqlcheckingdata);

                                if ($resultcheckingdata->num_rows > 0) {
                                    // output data of each row
                                    while ($rowcheckingdata = $resultcheckingdata->fetch_assoc()) {
                                        array_push($finalstep, $rowcheckingdata['bidangppkm']);
                                    }
                                }
                            }

                            $sumarray = array_count_values($finalstep);
                            $sumarraysaja = array_values($sumarray);
                            if ($sumarraysaja[0] < $jmlharrTahun) {
                                echo "<script type='text/javascript'>alert('Data Jenis PKM tidak sama');</script>";
                                echo "<script>setTimeout(function(){ window.location.href = '../../mhsmenu/index.php?page=form-pengajuan'; }, 3000);</script>";
                            } else {
                                $sqlinsertdatapeng = "INSERT INTO tbpengajuankelompok (noreg1,nirm1,nama1,noreg2,nirm2,nama2,noreg3,nirm3,nama3,noreg4,nirm4,nama4,bidangppkm,judul,status)
                            VALUES ('$noreg1', '$nirm1', '$namamahasiswa1',
                            '$noreg2', '$nirm2', '$namamahasiswa2',
                            '$noreg3', '$nirm3', '$namamahasiswa3',
                            '$noreg4', '$nirm4', '$namamahasiswa4',
                            '$finalstep[0]',
                            '$judulppkm','Belum Divalidasi'
                            )";

                                if ($conn->query($sqlinsertdatapeng) === TRUE) {
                                    for ($i = 1; $i < $jmlharrTahun; $i++) {
                                        $sqlupdate[$i] = "UPDATE tbstatusmhs SET status_pengajuan='Sudah Mengisi' WHERE username='$nirm[$i]'";
                                        $conn->query($sqlupdate[$i]);
                                    }
                                    echo "<script>setTimeout(function(){ window.location.href = '../../mhsmenu/index.php?page=form-pengajuan'; }, 1000);</script>";
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
