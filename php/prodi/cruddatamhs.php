<?php

require_once '../config.php';

$tugas = $_POST['task'];
$idKelompok = $_POST['idKelompok'];

if ($tugas == 'selectSpecificData') {

    $sqlSelectData = "SELECT * FROM `tbpengajuankelompok`
                    WHERE id_kelompok = '$idKelompok'";
    $resultSelectData = $conn->query($sqlSelectData);
    $dataSaya = array();

    if ($resultSelectData->num_rows > 0) {
        // output data of each row
        while ($rowSelectData = $resultSelectData->fetch_assoc()) {
            $dataSaya[] = $rowSelectData;
        }
    } else {
        echo $dataSaya[] = $rowSelectData;
    }

    echo json_encode($dataSaya);
} else if ($tugas == 'updateSpecificData') {
    $bidangppkm = $_POST['bidangppkm'];
    $judulppkm = $_POST['judulppkm'];
    $namadoping = $_POST['namadoping'];
    $status = $_POST['status'];

    $sqlUpdateData = "  UPDATE `tbpengajuankelompok`
                        SET bidangppkm='$bidangppkm',judul='$judulppkm',nama_dosen='$namadoping',status='$status'
                        WHERE id_kelompok = '$idKelompok'";

    if ($conn->query($sqlUpdateData) == TRUE) {
        echo "Sukses";
    } else {
        echo "Gagal";
    }
} else if ($tugas == 'deleteSpecificData') {
    $sqlDeleteData = "  DELETE FROM `tbpengajuankelompok`
                        WHERE id_kelompok = '$idKelompok'";
    if ($conn->query($sqlDeleteData) == TRUE) {
        echo "Sukses";
    } else {
        echo "Gagal";
    }
}
