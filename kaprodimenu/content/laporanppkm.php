<div class="container-fluid">
	<fieldset>
		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<!-- <form action="../php/prodi/printpdf.php" method="POST"> -->
			<button class="btn btn-primary" type="submit" onclick="printDiv();"><i class="fas fa-print"></i> Print</button>
			<!-- </form> -->
		</div>
		<div>
			<div align="center">
				<legend><span class="style2"><b>LAPORAN PENGAJUAN MAHASISWA PPKM</b></span></legend>
			</div>
			<table id="example" class="table table-striped table-bordered" style="width: 100%;">
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
						<th>Nama Dosen</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php

					include_once '../php/config.php';

					$sql = "SELECT * FROM tbpengajuankelompok";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						$nomor = 1;
						// output data of each row
						while ($row = $result->fetch_assoc()) {
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
							<td>$row[nama_dosen]</td>
							<td>
								$row[status]
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
					</tr>
				</tfoot>
			</table>
		</div>
	</fieldset>
	<div class="mt-5">
		<h3>Printing Document</h3>
		<?php
		include_once 'laporan.php';
		?>
	</div>
</div>