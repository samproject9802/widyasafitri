<?php
include_once '../php/config.php';

?>
<div class="container-fluid">
	<fieldset>
		<legend> <span class="style2"><b>TAMPIL DATA PENGAJUAN MAHASISWA PPKM</b></span></legend>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>No.</th>
					<th>ID Kelompok</th>
					<th>No Registrasi 1</th>
					<th>NIRM Mahasiswa 1</th>
					<th>Nama Mahasiswa 1</th>
					<th>No Registrasi 2</th>
					<th>NIRM Mahasiswa 2</th>
					<th>Nama Mahasiswa 2</th>
					<th>No Registrasi 3</th>
					<th>NIRM Mahasiswa 3</th>
					<th>Nama Mahasiswa 3</th>
					<th>No Registrasi 4</th>
					<th>NIRM Mahasiswa 4</th>
					<th>Nama Mahasiswa 4</th>
					<th>No Registrasi 5</th>
					<th>NIRM Mahasiswa 5</th>
					<th>Nama Mahasiswa 5</th>
					<th>Bidang PPKM</th>
					<th>Judul PPKM</th>
					<th>Dosen Pembimbing</th>
					<th>Status</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php

				$sql = "SELECT * FROM tbpengajuankelompok";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					$nomor = 1;
					// output data of each row
					while ($row = $result->fetch_assoc()) {
						if ($row['status'] == null || $row['status'] == "Belum Divalidasi") {
							$status = "
                            <center>
                                <div class='btn-group' role='group' aria-label='Basic example'>
                                    <button class='btn btn-success' onclick='checkingData($row[id_kelompok]);' role='button'>Validasi</button>
                                </div>
                            </center>
                            ";
							if ($row['nama_dosen'] == null) {
								$namadosen = "
								<div class='form-floating mb-3'>
								<select class='form-select' aria-label='Default select example' id='namadosen$row[id_kelompok]'>
								<option value='Saiful Nur Arif, SE, S.Kom., M.Kom.'>Saiful Nur Arif, SE, S.Kom., M.Kom.</option>
								<option value='Dr. Ahmad Calam, S.Ag., MA'>Dr. Ahmad Calam, S.Ag., MA</option>
								<option value='Purwadi, S.Kom., M.Kom.'>Purwadi, S.Kom., M.Kom.</option>
								<option value='Puji Sari Ramadhan, S.Kom., M.Kom.'>Puji Sari Ramadhan, S.Kom., M.Kom.</option>
								<option value='Muhammad Dahria, SE, S.Kom., M.Kom.'>Muhammad Dahria, SE, S.Kom., M.Kom.</option>
								<option value='Drs. Sobirin, SH, M.Si.'>Drs. Sobirin, SH, M.Si.</option>
								<option value='Ahmad Fitri Boy, S.Kom., M.Kom.'>Ahmad Fitri Boy, S.Kom., M.Kom.</option>
								<option value='Elfitriani, S.Pd., M.Si.'>Elfitriani, S.Pd., M.Si.</option>
								<option value='Ishak, S.Kom., M.Kom.'>Ishak, S.Kom., M.Kom.</option>
								<option value='Jaka Prayuda, S.Kom., M.Kom.'>Jaka Prayuda, S.Kom., M.Kom.</option>
								<option value='Saniman, ST, M.Kom.'>Saniman, ST, M.Kom.</option>
								<option value='Trinanda Syahputra, S.Kom., M.Kom.'>Trinanda Syahputra, S.Kom., M.Kom.</option>
								<option value='Zulfian Azmi, ST, M.Kom.'>Zulfian Azmi, ST, M.Kom.</option>
								<option value='Khairi Ibnutama, S.Kom., M.Kom.'>Khairi Ibnutama, S.Kom., M.Kom</option>
								<option value='Nur Yanti Lumban Gaol, S.Kom., M.Kom'>Nur Yanti Lumban Gaol, S.Kom., M.Kom</option>
								<option value='Beni Andika, ST, S.Kom., M.Kom.'>Beni Andika, ST, S.Kom., M.Kom.</option>
								<option value='Zaimah Panjaitan, S.Kom., M.Kom.'>Zaimah Panjaitan, S.Kom., M.Kom</option>
								<option value='M. Syaifuddin, S.Kom., M.Kom.'>M. Syaifuddin, S.Kom., M.Kom.</option>
								<option value='Dedi Setiawan, S.Kom., M.Kom.'>Dedi Setiawan, S.Kom., M.Kom.</option>
								<option value='Hafizah, S.Kom., M.Kom.'>Hafizah, S.Kom., M.Kom.</option>
								</select>
								</div>
								";
							} else {
								$namadosen = $row['nama_dosen'];
							}
						} else {
							$status = "Sudah Divalidasi";
							if ($row['nama_dosen'] == null) {
								$namadosen = "
								<div class='form-floating mb-3'>
								<select class='form-select' aria-label='Default select example' id='namadosen$row[id_kelompok]'>
								<option value='Saiful Nur Arif, SE, S.Kom., M.Kom.'>Saiful Nur Arif, SE, S.Kom., M.Kom.</option>
								<option value='Dr. Ahmad Calam, S.Ag., MA'>Dr. Ahmad Calam, S.Ag., MA</option>
								<option value='Purwadi, S.Kom., M.Kom.'>Purwadi, S.Kom., M.Kom.</option>
								<option value='Puji Sari Ramadhan, S.Kom., M.Kom.'>Puji Sari Ramadhan, S.Kom., M.Kom.</option>
								<option value='Muhammad Dahria, SE, S.Kom., M.Kom.'>Muhammad Dahria, SE, S.Kom., M.Kom.</option>
								<option value='Drs. Sobirin, SH, M.Si.'>Drs. Sobirin, SH, M.Si.</option>
								<option value='Ahmad Fitri Boy, S.Kom., M.Kom.'>Ahmad Fitri Boy, S.Kom., M.Kom.</option>
								<option value='Elfitriani, S.Pd., M.Si.'>Elfitriani, S.Pd., M.Si.</option>
								<option value='Ishak, S.Kom., M.Kom.'>Ishak, S.Kom., M.Kom.</option>
								<option value='Jaka Prayuda, S.Kom., M.Kom.'>Jaka Prayuda, S.Kom., M.Kom.</option>
								<option value='Saniman, ST, M.Kom.'>Saniman, ST, M.Kom.</option>
								<option value='Trinanda Syahputra, S.Kom., M.Kom.'>Trinanda Syahputra, S.Kom., M.Kom.</option>
								<option value='Zulfian Azmi, ST, M.Kom.'>Zulfian Azmi, ST, M.Kom.</option>
								<option value='Khairi Ibnutama, S.Kom., M.Kom.'>Khairi Ibnutama, S.Kom., M.Kom</option>
								<option value='Nur Yanti Lumban Gaol, S.Kom., M.Kom'>Nur Yanti Lumban Gaol, S.Kom., M.Kom</option>
								<option value='Beni Andika, ST, S.Kom., M.Kom.'>Beni Andika, ST, S.Kom., M.Kom.</option>
								<option value='Zaimah Panjaitan, S.Kom., M.Kom.'>Zaimah Panjaitan, S.Kom., M.Kom</option>
								<option value='M. Syaifuddin, S.Kom., M.Kom.'>M. Syaifuddin, S.Kom., M.Kom.</option>
								<option value='Dedi Setiawan, S.Kom., M.Kom.'>Dedi Setiawan, S.Kom., M.Kom.</option>
								<option value='Hafizah, S.Kom., M.Kom.'>Hafizah, S.Kom., M.Kom.</option>
								</select>
								</div>
								";
							} else {
								$namadosen = $row['nama_dosen'];
							}
						}

						echo "
						<tr>
							<td>$nomor</td>
							<td>$row[id_kelompok]</td>
							<td>$row[noreg1]</td>
							<td>$row[nirm1]</td>
							<td>$row[nama1]</td>
							<td>$row[noreg2]</td>
							<td>$row[nirm2]</td>
							<td>$row[nama2]</td>
							<td>$row[noreg3]</td>
							<td>$row[nirm3]</td>
							<td>$row[nama3]</td>
							<td>$row[noreg4]</td>
							<td>$row[nirm4]</td>
							<td>$row[nama4]</td>
							<td>$row[noreg5]</td>
							<td>$row[nirm5]</td>
							<td>$row[nama5]</td>
							<td>$row[bidangppkm]</td>
							<td>$row[judul]</td>
							<td>$namadosen</td>
							<td>
								$status
							</td>
							<td>
								<div class='btn-group' role='group' aria-label='Basic example'>
									<button type='button' class='btn btn-warning' onclick='editData($row[id_kelompok]);'><i class='fas fa-edit'></i> Edit</button>
									<button type='button' class='btn btn-danger' onclick='hapusData($row[id_kelompok]);'><i class='fas fa-trash-alt'></i> Hapus</button>
								</div>
							</td>
						</tr>
						";
						$nomor++;
					}
				} else {
					echo "
					<tr>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
						<td>
							<div align='center'>
								<p>Empty</p>
							</div>
						</td>
					</tr>
					";
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th>No.</th>
					<th>ID Kelompok</th>
					<th>No Registrasi 1</th>
					<th>NIRM Mahasiswa 1</th>
					<th>Nama Mahasiswa 1</th>
					<th>No Registrasi 2</th>
					<th>NIRM Mahasiswa 2</th>
					<th>Nama Mahasiswa 2</th>
					<th>No Registrasi 3</th>
					<th>NIRM Mahasiswa 3</th>
					<th>Nama Mahasiswa 3</th>
					<th>No Registrasi 4</th>
					<th>NIRM Mahasiswa 4</th>
					<th>Nama Mahasiswa 4</th>
					<th>No Registrasi 5</th>
					<th>NIRM Mahasiswa 5</th>
					<th>Nama Mahasiswa 5</th>
					<th>Bidang PPKM</th>
					<th>Judul PPKM</th>
					<th>Nama Dosen</th>
					<th>Status</th>
					<th></th>
				</tr>
			</tfoot>
		</table>
	</fieldset>
</div>

<div class="modal fade" id="editDataMahasiswa" tabindex="-1" aria-labelledby="editDataMahasiswaLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Data Mahasiswa</h5>
			</div>
			<div class="modal-body">
				<form class="p-3">
					<div class="mb-3 row">
						<label for="idKelompok" class="col-5 col-form-label">ID Kelompok</label>
						<div class="col-7">
							<input type="text" readonly class="form-control-plaintext" id="idKelompok" value="">
						</div>
					</div>
					<hr class="dropdown-divider">
					<div class="mb-3 row">
						<label for="noreg1" class="col-5 col-form-label">No Registrasi 1</label>
						<div class="col-7">
							<input type="text" readonly class="form-control-plaintext" id="noreg1" value="">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="nirm1" class="col-5 col-form-label">NIRM 1</label>
						<div class="col-7">
							<input type="text" readonly class="form-control-plaintext" id="nirm1" value="">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="nama1" class="col-5 col-form-label">Nama Mahasiswa 1</label>
						<div class="col-7">
							<input type="text" readonly class="form-control-plaintext" id="nama1" value="">
						</div>
					</div>
					<hr class="dropdown-divider">
					<div class="mb-3 row">
						<label for="noreg2" class="col-5 col-form-label">No Registrasi 2</label>
						<div class="col-7">
							<input type="text" readonly class="form-control-plaintext" id="noreg2" value="">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="nirm2" class="col-5 col-form-label">NIRM 2</label>
						<div class="col-7">
							<input type="text" readonly class="form-control-plaintext" id="nirm2" value="">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="nama2" class="col-5 col-form-label">Nama Mahasiswa 2</label>
						<div class="col-7">
							<input type="text" readonly class="form-control-plaintext" id="nama2" value="">
						</div>
					</div>
					<hr class="dropdown-divider">
					<div class="mb-3 row">
						<label for="noreg3" class="col-5 col-form-label">No Registrasi 3</label>
						<div class="col-7">
							<input type="text" readonly class="form-control-plaintext" id="noreg3" value="">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="nirm3" class="col-5 col-form-label">NIRM 3</label>
						<div class="col-7">
							<input type="text" readonly class="form-control-plaintext" id="nirm3" value="">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="nama3" class="col-5 col-form-label">Nama Mahasiswa 3</label>
						<div class="col-7">
							<input type="text" readonly class="form-control-plaintext" id="nama3" value="">
						</div>
					</div>
					<hr class="dropdown-divider">
					<div class="mb-3 row">
						<label for="noreg4" class="col-5 col-form-label">No Registrasi 4</label>
						<div class="col-7">
							<input type="text" readonly class="form-control-plaintext" id="noreg4" value="">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="nirm4" class="col-5 col-form-label">NIRM 4</label>
						<div class="col-7">
							<input type="text" readonly class="form-control-plaintext" id="nirm4" value="">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="nama4" class="col-5 col-form-label">Nama Mahasiswa 4</label>
						<div class="col-7">
							<input type="text" readonly class="form-control-plaintext" id="nama4" value="">
						</div>
					</div>
					<hr class="dropdown-divider">
					<div class="mb-3 row">
						<label for="noreg5" class="col-5 col-form-label">No Registrasi 5</label>
						<div class="col-7">
							<input type="text" readonly class="form-control-plaintext" id="noreg5" value="">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="nirm5" class="col-5 col-form-label">NIRM 5</label>
						<div class="col-7">
							<input type="text" readonly class="form-control-plaintext" id="nirm5" value="">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="nama5" class="col-5 col-form-label">Nama Mahasiswa 5</label>
						<div class="col-7">
							<input type="text" readonly class="form-control-plaintext" id="nama5" value="">
						</div>
					</div>
					<hr class="dropdown-divider">
					<div class="mb-3 row">
						<label for="bidangppkm" class="col-5 col-form-label">Bidang PPKM</label>
						<div class="col-7">
							<select class="form-select" aria-label="Default select example" id="bidangppkm">
								<option selected id="valuebidangppkm"></option>
								<option disabled>------------------------------</option>
								<option value="PKM-AI">PKM-AI</option>
								<option value="PKM-GF">PKM-GF</option>
								<option value="PKM-GT">PKM-GT</option>
								<option value="PKM-KC">PKM-KC</option>
								<option value="PKM-K">PKM-K</option>
								<option value="PKM-P">PKM-P</option>
								<option value="PKM-PT">PKM-PT</option>
								<option value="PKM-PM">PKM-PM</option>
							</select>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="judul" class="col-5 col-form-label">Judul PPKM</label>
						<div class="col-7">
							<textarea class="form-control" id="judul"></textarea>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="nama_dosen" class="col-5 col-form-label">Dosen Pembimbing</label>
						<div class="col-7">
							<select class="form-select" aria-label="Default select example" id="nama_dosen">
								<option selected id="valuenama_dosen"></option>
								<option disabled>------------------------------</option>
								<option value="Saiful Nur Arif, SE, S.Kom., M.Kom.">Saiful Nur Arif, SE, S.Kom., M.Kom.</option>
								<option value="Dr. Ahmad Calam, S.Ag., MA">Dr. Ahmad Calam, S.Ag., MA</option>
								<option value="Purwadi, S.Kom., M.Kom.">Purwadi, S.Kom., M.Kom.</option>
								<option value="Puji Sari Ramadhan, S.Kom., M.Kom.">Puji Sari Ramadhan, S.Kom., M.Kom.</option>
								<option value="Muhammad Dahria, SE, S.Kom., M.Kom.">Muhammad Dahria, SE, S.Kom., M.Kom.</option>
								<option value="Drs. Sobirin, SH, M.Si.">Drs. Sobirin, SH, M.Si.</option>
								<option value="Ahmad Fitri Boy, S.Kom., M.Kom.">Ahmad Fitri Boy, S.Kom., M.Kom.</option>
								<option value="Elfitriani, S.Pd., M.Si.">Elfitriani, S.Pd., M.Si.</option>
								<option value="Ishak, S.Kom., M.Kom.">Ishak, S.Kom., M.Kom.</option>
								<option value="Jaka Prayuda, S.Kom., M.Kom.">Jaka Prayuda, S.Kom., M.Kom.</option>
								<option value="Saniman, ST, M.Kom.">Saniman, ST, M.Kom.</option>
								<option value="Trinanda Syahputra, S.Kom., M.Kom.">Trinanda Syahputra, S.Kom., M.Kom.</option>
								<option value="Zulfian Azmi, ST, M.Kom.">Zulfian Azmi, ST, M.Kom.</option>
								<option value="Khairi Ibnutama, S.Kom., M.Kom.">Khairi Ibnutama, S.Kom., M.Kom</option>
								<option value="Nur Yanti Lumban Gaol, S.Kom., M.Kom">Nur Yanti Lumban Gaol, S.Kom., M.Kom</option>
								<option value="Beni Andika, ST, S.Kom., M.Kom.">Beni Andika, ST, S.Kom., M.Kom.</option>
								<option value="Zaimah Panjaitan, S.Kom., M.Kom.">Zaimah Panjaitan, S.Kom., M.Kom</option>
								<option value="M. Syaifuddin, S.Kom., M.Kom.">M. Syaifuddin, S.Kom., M.Kom.</option>
								<option value="Dedi Setiawan, S.Kom., M.Kom.">Dedi Setiawan, S.Kom., M.Kom.</option>
								<option value="Hafizah, S.Kom., M.Kom.">Hafizah, S.Kom., M.Kom.</option>
							</select>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="status" class="col-5 col-form-label">Status</label>
						<div class="col-7">
							<select class="form-select" aria-label="Default select example" id="status">
								<option selected id="statusvalue"></option>
								<option disabled>------------------------------</option>
								<option value="Belum Divalidasi">Belum Divalidasi</option>
								<option value="Valid">Valid</option>
							</select>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" onclick="closeModal('editDataMahasiswa');">Cancel</button>
				<button type="button" class="btn btn-primary" id="btnSaveChanges">Save changes</button>
			</div>
		</div>
	</div>
</div>