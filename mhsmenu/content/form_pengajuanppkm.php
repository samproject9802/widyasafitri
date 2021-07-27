<?php
require_once '../php/config.php';

$currentdate = date('Y');

$sql = "SELECT * FROM tbstatusmhs 
		WHERE username = '$_SESSION[username]'";
$result = $conn->query($sql);
$sample = [];

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$sample = $row;
	}
}

if (isset($sample['status_pengajuan'])) {
	$statuspengajuan = $sample['status_pengajuan'];
	if ($statuspengajuan == "Sudah Mengisi") {
		$datakelompok = [];
		$sqlselectstatus = "SELECT id_kelompok,nama_dosen,status FROM `tbpengajuankelompok`
                            WHERE nirm1 = '$_SESSION[username]'
                            OR nirm2 = '$_SESSION[username]'
                            OR nirm3 = '$_SESSION[username]'
                            OR nirm4 = '$_SESSION[username]'
                            OR nirm5 = '$_SESSION[username]'";
		$resultselectstatus = $conn->query($sqlselectstatus);

		if ($resultselectstatus->num_rows > 0) {
			// output data of each row
			while ($rowselstat = $resultselectstatus->fetch_assoc()) {
				array_push($datakelompok, $rowselstat['id_kelompok']);
				array_push($datakelompok, $rowselstat['nama_dosen']);
				array_push($datakelompok, $rowselstat['status']);
			}
		}

		if ($datakelompok[2] == "Belum Divalidasi" && $datakelompok[1] == NULL) {
			echo "
				<div class='container-fluid' align='center'>
					<h3>Data Anda Telah Berhasil Dimasukkan</h3>
					<br>
					<h3>Anda telah terdaftar di kelompok <b> $datakelompok[0]</b></h3>
					<br>
					<h5>Silahkan menunggu</h5>
					<br>
					<h6>Data anda sedang dalam proses verifikasi oleh pihak Kampus, Silahkan hubungi admin Kampus untuk informasi lebih lanjut.</h6>
				</div>";
		} else {
			echo "
				<div class='container-fluid' align='center'>
					<h3>Data Anda Telah Berhasil Diverifikasi</h3>
					<br>
					<h3>Anda terdaftar di kelompok <b> $datakelompok[0]</b></h3>
					<br>
					<p>
						Dengan nama dosen pembimbing adalah <b>$datakelompok[1]</b> , Silahkan menghubungi
						dosen yang bersangkutan untuk keterangan lebih lanjut.
					</p>
				</div>";
		}
	} else {
		echo "
	<div class='container-fluid'>
		<div class='mb-4' align='center'>
			<h3>Formulir Pengajuan PPKM</h3>
		</div>
		<form method='POST' action='../php/mhs/inputformpengajuan.php'>
			<div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>No. Registrasi</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='noreg1'>
					</div>
				</div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>NIRM</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='nirm1'>
					</div>
				</div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>Nama Mahasiswa 1</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='namamhs1'>
					</div>
				</div>
			</div>
			<br><br>
			<div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>No. Registrasi</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='noreg2'>
					</div>
				</div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>NIRM</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='nirm2'>
					</div>
				</div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>Nama Mahasiswa 2</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='namamhs2'>
					</div>
				</div>
			</div>
			<br><br>
			<div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>No. Registrasi</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='noreg3'>
					</div>
				</div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>NIRM</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='nirm3'>
					</div>
				</div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>Nama Mahasiswa 3</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='namamhs3'>
					</div>
				</div>
			</div>
			<br><br>
			<div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>No. Registrasi</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='noreg4'>
					</div>
				</div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>NIRM</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='nirm4'>
					</div>
				</div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>Nama Mahasiswa 4</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='namamhs4'>
					</div>
				</div>
			</div>
			<br><br>
			<div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>No. Registrasi</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='noreg5'>
					</div>
				</div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>NIRM</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='nirm5'>
					</div>
				</div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>Nama Mahasiswa 5</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='namamhs5'>
					</div>
				</div>
			</div>
			<div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>Judul</label>
					<div class='col-sm-10'>
						<textarea class='form-control' placeholder='Masukkan judul PPKM anda...' id='floatingTextarea2' style='height: 100px' name='judulppkm'></textarea>
					</div>
				</div>
			</div>
			<br><br>
			<div align='center'>
				<button type='submit' class='btn btn-success'>SIMPAN</button>
				<button type='reset' class='btn btn-danger'>BATAL</button>
			</div>
		</form>
	</div>
	";
	}
} else {
	echo "
	<div class='container-fluid'>
		<div class='mb-4' align='center'>
			<h3>Formulir Pengajuan PPKM</h3>
		</div>
		<form method='POST' action='../php/mhs/inputformpengajuan.php'>
			<div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>No. Registrasi</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='noreg1'>
					</div>
				</div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>NIRM</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='nirm1'>
					</div>
				</div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>Nama Mahasiswa 1</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='namamhs1'>
					</div>
				</div>
			</div>
			<br><br>
			<div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>No. Registrasi</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='noreg2'>
					</div>
				</div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>NIRM</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='nirm2'>
					</div>
				</div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>Nama Mahasiswa 2</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='namamhs2'>
					</div>
				</div>
			</div>
			<br><br>
			<div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>No. Registrasi</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='noreg3'>
					</div>
				</div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>NIRM</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='nirm3'>
					</div>
				</div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>Nama Mahasiswa 3</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='namamhs3'>
					</div>
				</div>
			</div>
			<br><br>
			<div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>No. Registrasi</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='noreg4'>
					</div>
				</div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>NIRM</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='nirm4'>
					</div>
				</div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>Nama Mahasiswa 4</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='namamhs4'>
					</div>
				</div>
			</div>
			<br><br>
			<div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>No. Registrasi</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='noreg5'>
					</div>
				</div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>NIRM</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='nirm5'>
					</div>
				</div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>Nama Mahasiswa 5</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='inputEmail3' name='namamhs5'>
					</div>
				</div>
			</div>
			<div>
				<div class='row mb-3'>
					<label for='inputEmail3' class='col-sm-2 col-form-label'>Judul</label>
					<div class='col-sm-10'>
						<textarea class='form-control' placeholder='Masukkan judul PPKM anda...' id='floatingTextarea2' style='height: 100px' name='judulppkm'></textarea>
					</div>
				</div>
			</div>
			<br><br>
			<div align='center'>
				<button type='submit' class='btn btn-success'>SIMPAN</button>
				<button type='reset' class='btn btn-danger'>BATAL</button>
			</div>
		</form>
	</div>
	";
}
