<?php
	include "header2.php";
?>
<div id='list-report-error' class='report-div error'></div>
<div id='list-report-success' class='report-div success report-list' ></div>
<div class="flexigrid" style='width: 100%;' data-unique-hash="e82db74d7b5418ab6415555a35cc06a4">
	<div id='main-table-box'>
		<form action="<?php echo site_url() ?>/permintaan/insert" method="post" id="crudForm"  accept-charset="utf-8">
			<div class='form-div'>
				<div class='form-field-box odd' id="nama_pengguna_field_box">
					<div class='form-display-as-box' id="nama_pengguna_display_as_box">
						Nama Barang
					</div>
					<div class='form-input-box' id="nama_pengguna_input_box">
						<select id='field-nama-barang' name='nama_barang' class='chosen-select' data-placeholder='Select Barang' required>
							<option value=''  ></option>
							<?php
								foreach($barang as $barang){
							?>
							<option value='<?php echo $barang->id_barang ?>'>
								<?php echo $barang->nama_barang." (Stok : ".$barang->jumlah." )" ?>
							</option>
							<?php
								}
							?>
						</select>
					</div>
					<div class='clear'></div>
				</div>
				<div class='form-field-box even' id="nama_pengguna_field_box">
					<div class='form-display-as-box' id="tgl_permintaan_display_as_box">
						Tanggal Pengajuan
					</div>
					<div class='form-input-box' id="tgl_permintaan_input_box">
					<input id='field-tgl_permintaan' name='tgl_permintaan' type='date' value='' maxlength='10' class='form-control' required/>(dd/mm/yyyy)				</div>
					<div class='clear'></div>
				</div>
				<div class='form-field-box odd' id="nama_pengguna_field_box">
					<div class='form-display-as-box' id="tgl_permintaan_display_as_box">
						Jumlah Barang
					</div>
					<div class='form-input-box' id="tgl_permintaan_input_box">
					<input id='field-tgl_permintaan' name='jumlah_barang' type='text' value='' maxlength='10' class='form-control' required/>			</div>
					<div class='clear'></div>
				</div>
				<div class='form-field-box odd' id="nama_pengguna_field_box">
					<div class='form-display-as-box' id="tgl_permintaan_display_as_box">
						Perkiraan Harga
					</div>
					<div class='form-input-box' id="tgl_permintaan_input_box">
					<input id='field-tgl_permintaan' name='harga_barang' type='text' value='' maxlength='10' class='form-control' required/>			</div>
					<div class='clear'></div>
				</div>
				<div class='form-field-box odd' id="nama_pengguna_field_box">

				</div>
			</div>
			<div class="pDiv">
			<div class='form-button-box'>
				<input id="form-button-save" type='submit' value='Save'  class="btn btn-large"/>
			</div>
			<div class='clear'></div>
		</div>
		</form>
	</div>
	<div id='ajax_list' class="ajax_list">
		<div class="bDiv" >

		</div>

	</div>
	</div>
</div>
<div class='clear'></div>
<h4>Data Persediaan Barang</h4>
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
		<div class='clear'></div>
	</div>

	<div id='ajax_list' class="ajax_list">
		<div class="bDiv" >
		<table cellspacing="0" cellpadding="0" border="0" id="flex1">
		<thead>
			<tr class='hDiv'>
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
			</tr>
		</thead>
		<tbody>
		<?php
			if(!EMPTY($barang2)){
				foreach($barang2 as $b){
		?>
		<tr>
			<td width='20%' class=''>
				<div class='text-left'><?php echo $b->nama_merk ?></div>
			</td>
			<td width='20%' class=''>
				<div class='text-left'><?php echo $b->nama_barang ?></div>
			</td>
			<td width='20%' class=''>
				<div class='text-right'><?php echo number_format($b->jumlah,0,',','.') ?></div>
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
		</div>
</div>

<?php
	include "footer2.php";
?>
