<?php
	include "header2.php";
?>
<div id='list-report-error' class='report-div error'></div>
<div id='list-report-success' class='report-div success report-list' ></div>
<div class="flexigrid" style='width: 100%;' data-unique-hash="e82db74d7b5418ab6415555a35cc06a4">
	<div id="hidden-operations" class="hidden-operations"></div>
	<div class="mDiv">
		<div class="ftitle">
			&nbsp;
		</div>
		<div title="Minimize/Maximize" class="ptogtitle">
			<span></span>
		</div>
	</div>
	<div id='main-table-box' class="main-table-box">
		<h4><center>DATA PERMINTAAN BARANG YANG BELUM TERPROSES</center></h4>
		<div class='clear'></div>
		<div class='clear'></div>
	</div>

	<div id='ajax_list' class="ajax_list">
		<div class="bDiv" >
		<table cellspacing="0" cellpadding="0" border="0" id="flex1">
		<thead>
			<tr class='hDiv'>
				<th width='20%'>
					<div class="text-left field-sorting "
						rel='nama_pengguna'>
						Tanggal Permintaan
					</div>
				</th>
				<th width='20%'>
					<div class="text-left field-sorting "
						rel='username_pengguna'>
						Merk Barang
					</div>
				</th>
				<th width='20%'>
					<div class="text-left field-sorting "
						rel='password_pengguna'>
						Nama Barang
					</div>
				</th>
				<th width='20%'>
					<div class="text-left field-sorting "
						rel='level_pengguna'>
						Jumlah
					</div>
				</th>
				<th width='20%'>
					<div class="text-left field-sorting "
						rel='level_pengguna'>
						Harga Barang
					</div>
				</th>
				<th width='20%'>
					<div class="text-left field-sorting "
						rel='level_pengguna'>
						Ruangan
					</div>
				</th>
			</tr>
		</thead>
		<tbody>
		<?php
			foreach($permintaan as $permintaan){
		?>
		<tr>
			<td width='20%' class=''>
				<div class='text-left'><?php echo $permintaan->tgl_permintaan ?></div>
			</td>
			<td width='20%' class=''>
				<div class='text-left'><?php echo $permintaan->nama_merk ?></div>
			</td>
			<td width='20%' class=''>
				<div class='text-left'><?php echo $permintaan->nama_barang ?></div>
			</td>
			<td width='20%' class=''>
				<div class='text-right'><?php echo number_format($permintaan->jumlah_barang,0,',','.') ?></div>
			</td>
			<td width='20%' class=''>
				<div class='text-right'><?php echo number_format($permintaan->harga_barang,0,',','.') ?></div>
			</td>
			<td width='20%' class=''>
				<div class='text-left'><?php echo $permintaan->nama_pengguna ?></div>
			</td>
		</tr>
		<?php
			}
		?>
		</tbody>
		</table>
		<?php
			if(!empty($permintaan)){
		?>
				<div class="pDiv">
			<div class='form-button-box'>
				<a href="<?php echo site_url() ?>/topsis/proses" class="btn btn-large"/>PROSES TOPSIS</a>
			</div>
			<div class='clear'></div>
	</div>
	<?php
			}
		?>


	</div>
		</div>
</div>
<?php
	include "footer2.php";
?>
