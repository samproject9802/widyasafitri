<?php

require_once '../php/config.php';

$currentdate = date('Y');

$sql = "SELECT a.nirm,a.noreg,a.bidangppkm,a.nama,b.status_pendaftaran,b.status_pengajuan 
		FROM tbpendaftaranmhs as a
		INNER JOIN tbstatusmhs as b 
		WHERE a.nirm = '$_SESSION[username]'";
$result = $conn->query($sql);
$sample = [];

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$sample = $row;
	}
}

if (isset($sample['status_pendaftaran'])) {
	$statusdaftar = $sample['status_pendaftaran'];
	$statusajukan = $sample['status_pengajuan'];
	if ($statusdaftar == "Sudah Mengisi" && $statusajukan == NULL || $statusajukan != NULL) {
		echo "Selamat anda sudah terdaftar kedalam sistem kami, dengan detail sebagai berikut :";
		echo "<br>";
		echo "<br>";
		echo "
		<div class='container-fluid' style='border: 2px solid black;'>
		 	<div class='mb-3 row'>
				<label for='staticEmail' class='col-sm-2 col-form-label'>No. Registrasi Pendaftaran</label>
				<div class='col-sm-10'>
				<input type='text' readonly class='form-control-plaintext' id='staticEmail' value=': $sample[bidangppkm]/$currentdate/$sample[noreg]'>
				</div>
  			</div>
			<div class='mb-3 row'>
				<label for='staticEmail' class='col-sm-2 col-form-label'>Nama Mahasiswa</label>
				<div class='col-sm-10'>
				<input type='text' readonly class='form-control-plaintext' id='staticEmail' value=': $sample[nama]'>
				</div>
  			</div>
		</div>
		";
		echo "<br>";
		echo "Simpan Nomor Registrasi Pendaftaran anda untuk pengisian kelompok PPKM.";
	} else {
		echo "
	<div class='container-fluid'>
	<div class='mb-2' align='center'>
		<h3>Formulir Pendaftaran PPKM</h3>
	</div>
	<form class='mt-4' method='POST' action='../php/mhs/inputformpendaftaran.php' enctype='multipart/form-data'>
		<div class='row mb-3'>
			<label for='inputEmail3' class='col-sm-2 col-form-label'>NIRM</label>
			<div class='col-sm-10'>
				<input type='text' class='form-control' id='inputEmail3' value='$_SESSION[username]' name='nirm' readonly>
			</div>
		</div>
		<div class='row mb-3'>
			<label for='inputPassword3' class='col-sm-2 col-form-label'>Nama Mahasiswa</label>
			<div class='col-sm-10'>
				<input type='text' class='form-control' id='inputPassword3' name='namamahasiswa'>
			</div>
		</div>
		<div class='row mb-3'>
			<label for='inputPassword3' class='col-sm-2 col-form-label'>Jurusan</label>
			<div class='col-sm-10'>
				<select class='form-select' aria-label='Default select example' name='pilihanjurusan'>
					<option selected>Pilih salah satu...</option>
					<option value='D3-MI'>D3 - Manajemen Informatika</option>
					<option value='D3-TK'>D3 - Teknik Komputer</option>
					<option value='S1-SI'>S1 - Sistem Informasi</option>
					<option value='S1-SK'>S1 - Sistem Komputer</option>
				</select>
			</div>
		</div>
		<div class='row mb-3'>
			<label for='inputPassword3' class='col-sm-2 col-form-label'>No. HP</label>
			<div class='col-sm-10'>
				<input type='text' class='form-control' id='inputPassword3' name='nohp'>
			</div>
		</div>
		<div class='row mb-3'>
			<label for='inputPassword3' class='col-sm-2 col-form-label'>Bidang PPKM yang dipilih</label>
			<div class='col-sm-10'>
				<select class='form-select' aria-label='Default select example' name='pilihanppkm'>
					<option selected>Pilih salah satu...</option>
					<option value='PKM-AI'>Bidang Artikel Ilmiah</option>
					<option value='PKM-GF'>Bidang Gagasan Futuristik</option>
					<option value='PKM-GT'>Bidang Gagasan Tertulis</option>
					<option value='PKM-KC'>Bidang Karsa Cipta</option>
					<option value='PKM-K'>Bidang Kewirausahaan</option>
					<option value='PKM-P'>Bidang Penelitian</option>
					<option value='PKM-PT'>Bidang Penerapan Teknologi</option>
					<option value='PKM-PM'>Bidang Pengabdian Masyarakat</option>
				</select>
			</div>
		</div>
		<div class='row mb-3'>
			<label for='inputPassword3' class='col-sm-2 col-form-label'>Surat Permohonan PPKM</label>
			<div class='col-sm-10'>
				<input class='form-control' type='file' id='formFile' aria-describedby='emailHelp' name='berkaspermohonan'>
				<div id='emailHelp' class='form-text'>File berupa format PDF, Max. 4 MB</div>
			</div>
		</div>
		<div class='row mb-3'>
			<label for='inputPassword3' class='col-sm-2 col-form-label'>Kwitansi PPKM</label>
			<div class='col-sm-10'>
				<input class='form-control' type='file' id='formFile' aria-describedby='emailHelp' name='kwitansi'>
				<div id='emailHelp' class='form-text'>File berupa format PDF, Max. 4 MB</div>
			</div>
		</div>
		<div class='row mb-3'>
			<label for='inputPassword3' class='col-sm-2 col-form-label'>Kwitansi Uang Kuliah</label>
			<div class='col-sm-10'>
				<input class='form-control' type='file' id='formFile' aria-describedby='emailHelp' name='uangkuliah'>
				<div id='emailHelp' class='form-text'>File berupa format PDF, Max. 4 MB</div>
			</div>
		</div>
		<div class='row mb-3'>
			<label for='inputPassword3' class='col-sm-2 col-form-label'>Kartu Kuning</label>
			<div class='col-sm-10'>
				<input class='form-control' type='file' id='formFile' aria-describedby='emailHelp' name='kartukuning'>
				<div id='emailHelp' class='form-text'>File berupa format PDF, Max. 4 MB</div>
			</div>
		</div>
		<div class='row mb-3'>
			<label for='inputPassword3' class='col-sm-2 col-form-label'>DNS</label>
			<div class='col-sm-10'>
				<input class='form-control' type='file' id='formFile' aria-describedby='emailHelp' name='dns'>
				<div id='emailHelp' class='form-text'>File berupa format PDF, Max. 4 MB</div>
			</div>
		</div>
		<div align='center'>
			<button type='submit' class='btn btn-success'>Kirim Data</button>
			<button type='reset' class='btn btn-danger'>Batal</button>
		</div>
	</form>
	<p></p>
	<fieldset>Perhatian:
		<ul>
			<li>Harap mengisi data dengan benar, periksa kembali sebelum mengklick tombol kirim data.
			<li>Karena yang kami terima adalah data kebenaran dari anda. Terima Kasih!.......
		</ul>
	</fieldset>
</div>
	";
	}
} else {
	echo "
	<div class='container-fluid'>
	<div class='mb-2' align='center'>
		<h3>Formulir Pendaftaran PPKM</h3>
	</div>
	<form class='mt-4' method='POST' action='../php/mhs/inputformpendaftaran.php' enctype='multipart/form-data'>
		<div class='row mb-3'>
			<label for='inputEmail3' class='col-sm-2 col-form-label'>NIRM</label>
			<div class='col-sm-10'>
				<input type='text' class='form-control' id='inputEmail3' value='$_SESSION[username]' name='nirm' readonly>
			</div>
		</div>
		<div class='row mb-3'>
			<label for='inputPassword3' class='col-sm-2 col-form-label'>Nama Mahasiswa</label>
			<div class='col-sm-10'>
				<input type='text' class='form-control' id='inputPassword3' name='namamahasiswa'>
			</div>
		</div>
		<div class='row mb-3'>
			<label for='inputPassword3' class='col-sm-2 col-form-label'>Jurusan</label>
			<div class='col-sm-10'>
				<select class='form-select' aria-label='Default select example' name='pilihanjurusan'>
					<option selected>Pilih salah satu...</option>
					<option value='D3-MI'>D3 - Manajemen Informatika</option>
					<option value='D3-TK'>D3 - Teknik Komputer</option>
					<option value='S1-SI'>S1 - Sistem Informasi</option>
					<option value='S1-SK'>S1 - Sistem Komputer</option>
				</select>
			</div>
		</div>
		<div class='row mb-3'>
			<label for='inputPassword3' class='col-sm-2 col-form-label'>No. HP</label>
			<div class='col-sm-10'>
				<input type='text' class='form-control' id='inputPassword3' name='nohp'>
			</div>
		</div>
		<div class='row mb-3'>
			<label for='inputPassword3' class='col-sm-2 col-form-label'>Bidang PPKM yang dipilih</label>
			<div class='col-sm-10'>
				<select class='form-select' aria-label='Default select example' name='pilihanppkm'>
					<option selected>Pilih salah satu...</option>
					<option value='PKM-AI'>Bidang Artikel Ilmiah</option>
					<option value='PKM-GF'>Bidang Gagasan Futuristik</option>
					<option value='PKM-GT'>Bidang Gagasan Tertulis</option>
					<option value='PKM-KC'>Bidang Karsa Cipta</option>
					<option value='PKM-K'>Bidang Kewirausahaan</option>
					<option value='PKM-P'>Bidang Penelitian</option>
					<option value='PKM-PT'>Bidang Penerapan Teknologi</option>
					<option value='PKM-PM'>Bidang Pengabdian Masyarakat</option>
				</select>
			</div>
		</div>
		<div class='row mb-3'>
			<label for='inputPassword3' class='col-sm-2 col-form-label'>Surat Permohonan PPKM</label>
			<div class='col-sm-10'>
				<input class='form-control' type='file' id='formFile' aria-describedby='emailHelp' name='berkaspermohonan'>
				<div id='emailHelp' class='form-text'>File berupa format PDF, Max. 4 MB</div>
			</div>
		</div>
		<div class='row mb-3'>
			<label for='inputPassword3' class='col-sm-2 col-form-label'>Kwitansi PPKM</label>
			<div class='col-sm-10'>
				<input class='form-control' type='file' id='formFile' aria-describedby='emailHelp' name='kwitansi'>
				<div id='emailHelp' class='form-text'>File berupa format PDF, Max. 4 MB</div>
			</div>
		</div>
		<div class='row mb-3'>
			<label for='inputPassword3' class='col-sm-2 col-form-label'>Kwitansi Uang Kuliah</label>
			<div class='col-sm-10'>
				<input class='form-control' type='file' id='formFile' aria-describedby='emailHelp' name='uangkuliah'>
				<div id='emailHelp' class='form-text'>File berupa format PDF, Max. 4 MB</div>
			</div>
		</div>
		<div class='row mb-3'>
			<label for='inputPassword3' class='col-sm-2 col-form-label'>Kartu Kuning</label>
			<div class='col-sm-10'>
				<input class='form-control' type='file' id='formFile' aria-describedby='emailHelp' name='kartukuning'>
				<div id='emailHelp' class='form-text'>File berupa format PDF, Max. 4 MB</div>
			</div>
		</div>
		<div class='row mb-3'>
			<label for='inputPassword3' class='col-sm-2 col-form-label'>DNS</label>
			<div class='col-sm-10'>
				<input class='form-control' type='file' id='formFile' aria-describedby='emailHelp' name='dns'>
				<div id='emailHelp' class='form-text'>File berupa format PDF, Max. 4 MB</div>
			</div>
		</div>
		<div align='center'>
			<button type='submit' class='btn btn-success'>Kirim Data</button>
			<button type='reset' class='btn btn-danger'>Batal</button>
		</div>
	</form>
	<p></p>
	<fieldset>Perhatian:
		<ul>
			<li>Harap mengisi data dengan benar, periksa kembali sebelum mengklick tombol kirim data.
			<li>Karena yang kami terima adalah data kebenaran dari anda. Terima Kasih!.......
		</ul>
	</fieldset>
</div>
	";
}
