<?php
	include "header2.php";
	error_reporting(0);
?>
<div id='list-report-error' class='report-div error'></div>
<div id='list-report-success' class='report-div success report-list' ></div>
<div class="flexigrid" style='width: 100%;' data-unique-hash="e82db74d7b5418ab6415555a35cc06a4">
	<div id="hidden-operations" class="hidden-operations"></div>
	<div id='ajax_list' class="ajax_list">
		<div class="bDiv" >
			<div class="pDiv">
				<div class="w3-container">
				  <h2>PROSES TOPSIS</h2>
				  <p>Berikut ini adalah proses penghitungan menggunakan TOPSIS</p>
				</div>
				<div class="w3-bar w3-black">
				  <button class="w3-bar-item w3-button" onclick="openCity('Kriteria')">Kriteria</button>
				  <button class="w3-bar-item w3-button" onclick="openCity('Alternatif')">Alternatif</button>
				  <button class="w3-bar-item w3-button" onclick="openCity('Nilai_Alternatif')">Nilai Alternatif</button>
				  <button class="w3-bar-item w3-button" onclick="openCity('Normalisasi')">Normalisasi</button>
				  <button class="w3-bar-item w3-button" onclick="openCity('Normalisasi_Terbobot')">Normalisasi Terbobot</button>
				  <button class="w3-bar-item w3-button" onclick="openCity('Matrix_Ideal')">Matrix Solusi Ideal</button>
				  <button class="w3-bar-item w3-button" onclick="openCity('Hasil')">Hasil Akhir</button>
				</div>


				<div id="Kriteria" class="w3-container city">
				  <h2>Kriteria Penilaian</h2>
				  <p>Kriteria yang digunakan sebagai acuan penilaian</p>
					  <div id='ajax_list' class="ajax_list">
						<div class="bDiv" >
							<table cellspacing="0" cellpadding="0" border="0" id="flex1">
								<thead>
									<tr class='hDiv'>
										<th width='20%'><div class="text-left">ID Kriteria</div></th>
										<th width='20%'><div class="text-left">Nama Kriteria</div></th>
										<th width='20%'><div class="text-left">Bobot</div></th>
									</tr>
								</thead>
								<tbody>
								<?php
									if(!empty($kriteria)){
										foreach($kriteria as $kriteria){
								?>
								<tr>
									<td width='20%' class=''>
										<div class='text-left'>C<?php echo $kriteria->id_kriteria ?></div>
									</td>
									<td width='20%' class=''>
										<div class='text-left'><?php echo $kriteria->nama_kriteria?></div>
									</td>
									<td width='20%' class=''>
										<div class='text-left'><?php echo $kriteria->bobot_kriteria?></div>
									</td>
								</tr>
								<?php
										}
									}else{
										echo "Belum Ada Data";
									}
								?>
								</tbody>
							</table>
						</div>
					</div>
					<button class="w3-bar-item w3-button" onclick="openCity('Alternatif')">Alternatif >></button>
				</div>
				<div id="Alternatif" class="w3-container city" style="display:none">
				  <h2>Alternatif</h2>
				  <p>Alternatif (Data barang yang diajukan)</p>
					  <div id='ajax_list' class="ajax_list">
						<div class="bDiv" >
							<table cellspacing="0" cellpadding="0" border="0" id="flex1">
								<thead>
									<tr class='hDiv'>
										<th width='20%'><div class="text-left">Nama Barang</div></th>
										<th width='20%'><div class="text-left">Harga</div></th>
										<th width='20%'><div class="text-left">Jumlah</div></th>
									</tr>
								</thead>
								<tbody>
								<?php
									if(!empty($permintaan)){
										foreach($permintaan as $permintaan){
								?>
								<tr>
									<td width='20%' class=''>
										<div class='text-left'><?php echo $permintaan->nama_barang?></div>
									</td>
									<td width='20%' class=''>
										<div class='text-left'><?php echo number_format($permintaan->harga_barang,0,',','.')?></div>
									</td>
									<td width='20%' class=''>
										<div class='text-left'><?php echo $permintaan->jumlah_barang?></div>
									</td>
								</tr>
								<?php
										}
									}else{
										echo "Belum Ada Data";
									}
								?>
								</tbody>
							</table>
						</div>
					</div>
					<button class="w3-bar-item w3-button" onclick="openCity('Kriteria')"><< Kriteria</button>
					<button class="w3-bar-item w3-button" onclick="openCity('Nilai_Alternatif')">Nilai Alternatif >></button>
				</div>
				<div id="Nilai_Alternatif" class="w3-container city" style="display:none">
				  <h2>Nilai Alternatif</h2>
				  <p>Nilai masing-masing data barang yang diajukan berdasarkan kriteria</p>
				  <div id='ajax_list' class="ajax_list">
						<div class="bDiv" >
							<table cellspacing="0" cellpadding="0" border="0" id="flex1">
								<thead>
									<tr class='hDiv'>
										<?php
											if(!empty($baris_kriteria)){
												foreach($baris_kriteria as $k){
										?>
										<th width='20%'><div class="text-left"><?php echo $k->nama_kriteria ?></div></th>
										<?php
												}
											}else{
												echo "Belum Ada Data Kriteria";
											}
										?>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php
											if(!empty($nilai)){
												$keys      = array_keys($nilai);
												$arraySize = count($nilai);
												$jumlahkriteria = count($baris_kriteria);
												for( $i=0; $i < $arraySize; $i++ ) {
													echo "<td>".$nilai[$keys[$i]]->nilai."</td>";
													if(($keys[$i]+1) % $jumlahkriteria == 0 ){
														echo "</tr><tr>";
													}
												}
											}else{
												echo "Belum Ada Nilai";
											}
										?>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
					<button class="w3-bar-item w3-button" onclick="openCity('Alternatif')"><< Alternatif</button>
					<button class="w3-bar-item w3-button" onclick="openCity('Normalisasi')">Normalisasi >></button>
				</div>

				<div id="Normalisasi" class="w3-container city" style="display:none">
				  <h2>Normalisasi</h2>
				  <p>Kuadrat masing-masing elemen matrik untuk mencari total nilai dari masing-masing kriteria</p>
				  <div id='ajax_list' class="ajax_list">
						<div class="bDiv" >
							<table cellspacing="0" cellpadding="0" border="0" id="flex1">
								<thead>
									<tr class='hDiv'>
										<?php
											if(!empty($baris_kriteria)){
												foreach($baris_kriteria as $k){
										?>
										<th width='20%'><div class="text-left"><?php echo $k->nama_kriteria ?></div></th>
										<?php
												}
											}else{
												echo "Belum Ada Data Kriteria";
											}
										?>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php
											if(!empty($nilai)){
												$keys      = array_keys($nilai);
												$arraySize = count($nilai);
												$jumlahkriteria = count($baris_kriteria);
												for( $i=0; $i < $arraySize; $i++ ) {
													echo "<td>".$nilai[$keys[$i]]->normalisasi."</td>";
													if(($keys[$i]+1) % $jumlahkriteria == 0 ){
														echo "</tr><tr>";
													}
												}
											}else{
												echo "Belum Ada Nilai";
											}
										?>
									</tr>
									<tr>
										<?php
											if(!empty($jumlah_normalisasi)){
												foreach($jumlah_normalisasi as $jum){
													echo "<td> Total : ".$jum->TOTAL."</td>";
												}
											}else{
												echo "Belum Ada Nilai";
											}
										?>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="clear"></div>
					<p>Setelah didapatkan total masing-masing kolom kriteria maka selanjutnya akan diproses normalisasi sebagai berikut : </p>
					<div id='ajax_list' class="ajax_list">
						<div class="bDiv" >
							<table cellspacing="0" cellpadding="0" border="0" id="flex1">
								<thead>
									<tr class='hDiv'>
										<?php
											if(!empty($baris_kriteria)){
												foreach($baris_kriteria as $k){
										?>
										<th width='20%'><div class="text-left"><?php echo $k->nama_kriteria ?></div></th>
										<?php
												}
											}else{
												echo "Belum Ada Data Kriteria";
											}
										?>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php
											if(!empty($nilai)){
												$keys      = array_keys($nilai);
												$arraySize = count($nilai);
												$jumlahkriteria = count($baris_kriteria);
												for( $i=0; $i < $arraySize; $i++ ) {
													echo "<td>".$nilai[$keys[$i]]->normalisasi_ternormalisasi."</td>";
													if(($keys[$i]+1) % $jumlahkriteria == 0 ){
														echo "</tr><tr>";
													}
												}
											}else{
												echo "Belum Ada Nilai";
											}
										?>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<button class="w3-bar-item w3-button" onclick="openCity('Nilai_Alternatif')"><< Nilai Alternatif</button>
					<button class="w3-bar-item w3-button" onclick="openCity('Normalisasi_Terbobot')">Normalisasi Terbobot >></button>
				</div>

				<div id="Normalisasi_Terbobot" class="w3-container city" style="display:none">
				  <h2>Normalisasi Terbobot</h2>
				  <p>Pembobotan bobot kriteria dengan nilai normalisasi</p>
				  <div id='ajax_list' class="ajax_list">
						<div class="bDiv" >
							<table cellspacing="0" cellpadding="0" border="0" id="flex1">
								<thead>
									<tr class='hDiv'>
										<?php
											if(!empty($baris_kriteria)){
												foreach($baris_kriteria as $k){
										?>
										<th width='20%'><div class="text-left"><?php echo $k->nama_kriteria ?></div></th>
										<?php
												}
											}else{
												echo "Belum Ada Data Kriteria";
											}
										?>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php
											if(!empty($nilai)){
												$keys      = array_keys($nilai);
												$arraySize = count($nilai);
												$jumlahkriteria = count($baris_kriteria);
												for( $i=0; $i < $arraySize; $i++ ) {
													echo "<td>".$nilai[$keys[$i]]->terbobot."</td>";
													if(($keys[$i]+1) % $jumlahkriteria == 0 ){
														echo "</tr><tr>";
													}
												}
											}else{
												echo "Belum Ada Nilai";
											}
										?>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
					<button class="w3-bar-item w3-button" onclick="openCity('Normalisasi')"><< Normalisasi</button>
					<button class="w3-bar-item w3-button" onclick="openCity('Matrix_Ideal')">Matrix Solusi Ideal >></button>
				</div>

				<div id="Matrix_Ideal" class="w3-container city" style="display:none">
				  <h2>Matrix Solusi Ideal</h2>
				  <p>Didapat dari normalisasi terbobot dengan kriteria</p>
				  <div id='ajax_list' class="ajax_list">
						<div class="bDiv" >
							<table cellspacing="0" cellpadding="0" border="0" id="flex1">
								<thead>
									<tr class='hDiv'>
										<th>Alternatif</th>
										<th width='20%'><div class="text-left">Positif</div></th>
										<th width='20%'><div class="text-left">Negatif</div></th>
									</tr>
								</thead>
								<tbody>
									<?php
										foreach($solusi as $s){
									?>
										<tr>
											<td><?php echo $s->nama_barang ?></td>
											<td><?php echo $s->positif ?></td>
											<td><?php echo $s->negatif ?></td>
										</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
						</div>
				</div>

				<div id="Hasil" class="w3-container city" style="display:none">
				  <h2>Hasil Akhir</h2>
				  <p>Total dan Perangkingan</p>

				  <div id='ajax_list' class="ajax_list">
						<div class="bDiv" >
							<table cellspacing="0" cellpadding="0" border="0" id="flex1">
								<thead>
									<tr class='hDiv'>
										<th width='20%'><div class="text-left">Nama Barang</div></th>
										<th width='15%'><div class="text-left">Harga</div></th>
										<th width='10%'><div class="text-left">Jumlah</div></th>
										<th width='10%'><div class="text-left">Nilai</div></th>
										<th width='15%'><div class="text-left">Hasil</div></th>
										<th width='10%'><div class="text-left">Rangking</div></th>
									</tr>
								</thead>
								<tbody>
								<?php
										$hasil_data = [];
										$rangking = 1;
										foreach($hasil as $h){
									?>
										<tr>
											<td><?php echo $h->nama_barang ?></td>
											<td><?php echo number_format($h->harga_barang,0,',','.')?></td>
											<td><?php echo $h->jumlah_barang ?></td>
											<td><?php echo $h->nilai_akhir ?></td>
											<td>
												<?php
													if($h->nilai_akhir >= 0.70){
										                $hasil = "Direkomendasikan";
										            }else{
										                $hasil = "Ditolak";
										            }
										            echo $hasil;
										            array_push($hasil_data, $hasil);
												?>
											</td>
											<td><?php echo $rangking; ?></td>
										</tr>
									<?php
										$rangking++;
										}

										$json_data = json_encode(['hasil_data' => $hasil_data]);
									?>
								</tbody>
							</table>
						</div>
					</div>

				  <div class='form-button-box'>
						<a href="<?php echo site_url('topsis/selesaiTopsis') ?>" class="btn btn-large"/>SELESAI DAN SIMPAN</a>
					</div>
				<div class='clear'></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	include "footer2.php";
?>
