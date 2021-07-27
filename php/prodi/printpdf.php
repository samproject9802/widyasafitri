<?php
include_once '../config.php';

//ambil data di tabel dan masukkan ke array
$query = "SELECT * FROM tbpengajuankelompok ORDER BY id_kelompok";
$result = $conn->query($query);
$data = array();
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        array_push($data, $row);
    }
}


#setting judul laporan dan header tabel
$judul = "LAPORAN DATA PENGAJUAN KELOMPOK";
$header = array(
    array("label" => "ID KELOMPOK", "length" => 30, "align" => "C"),
    array("label" => "No. Registrasi Mahasiswa 1", "length" => 80, "align" => "C"),
    array("label" => "NIRM Mahasiswa 1", "length" => 80, "align" => "C"),
    array("label" => "Nama Mahasiswa 1", "length" => 80, "align" => "C"),
    array("label" => "No. Registrasi Mahasiswa 2", "length" => 80, "align" => "C"),
    array("label" => "NIRM Mahasiswa 2", "length" => 80, "align" => "C"),
    array("label" => "Nama Mahasiswa 2", "length" => 80, "align" => "C"),
    array("label" => "No. Registrasi Mahasiswa 3", "length" => 80, "align" => "C"),
    array("label" => "NIRM Mahasiswa 3", "length" => 80, "align" => "C"),
    array("label" => "Nama Mahasiswa 3", "length" => 80, "align" => "C"),
    array("label" => "No. Registrasi Mahasiswa 4", "length" => 80, "align" => "C"),
    array("label" => "NIRM Mahasiswa 4", "length" => 80, "align" => "C"),
    array("label" => "Nama Mahasiswa 4", "length" => 80, "align" => "C"),
    array("label" => "No. Registrasi Mahasiswa 5", "length" => 80, "align" => "C"),
    array("label" => "NIRM Mahasiswa 5", "length" => 80, "align" => "C"),
    array("label" => "Nama Mahasiswa 5", "length" => 80, "align" => "C"),
    array("label" => "Bidang PPKM", "length" => 80, "align" => "C"),
    array("label" => "Judul PPKM", "length" => 80, "align" => "C"),
    array("label" => "Status", "length" => 30, "align" => "C")
);

#sertakan library FPDF dan bentuk objek
require('../../plugin/fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

#tampilkan judul laporan
$pdf->SetFont('Arial', 'B', '16');
$pdf->Cell(0, 20, $judul, '0', 1, 'C');

#buat header tabel
$pdf->SetFont('Arial', '', '10');
$pdf->SetFillColor(255, 0, 0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128, 0, 0);
foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();

#tampilkan data tabelnya
$pdf->SetFillColor(224, 235, 255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill = false;
foreach ($data as $baris) {
    $i = 0;
    foreach ($baris as $cell) {
        $pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
        $i++;
    }
    $fill = !$fill;
    $pdf->Ln();
}

#output file PDF
$pdf->Output();
