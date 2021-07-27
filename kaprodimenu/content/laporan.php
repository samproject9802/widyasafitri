<div id="laporanppkm">
    <div align="center">
        <legend><span class="style2"><b>LAPORAN PENGAJUAN MAHASISWA PPKM</b></span></legend>
    </div>
    <table id="example" class="table table-striped table-bordered" style="width: 100%;">
        <thead>
            <tr>
                <th>No.</th>
                <th>ID Kelompok</th>
                <th>Bidang PPKM</th>
                <th>Judul PPKM</th>
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
							<td>$row[bidangppkm]</td>
							<td>$row[judul]</td>
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
					</tr>
					";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No.</th>
                <th>ID Kelompok</th>
                <th>Bidang PPKM</th>
                <th>Judul PPKM</th>
                <th>Status</th>
            </tr>
        </tfoot>
    </table>
</div>