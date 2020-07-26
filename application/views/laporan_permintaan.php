<?php
	include "header2.php";
?>
<div id='list-report-error' class='report-div error'></div>
<div id='list-report-success' class='report-div success report-list' ></div>
<div class="flexigrid" style='width: 100%;' data-unique-hash="e82db74d7b5418ab6415555a35cc06a4">
	<div id="hidden-operations" class="hidden-operations"></div>
	<div class="mDiv">
		<div class="ftitle">
			<h4>Laporan Pengajuan Barang</h4>
		</div>
		<div title="Minimize/Maximize" class="ptogtitle">
			<span></span>
		</div>
	</div>
	<div id='main-table-box'>
		<form action="<?php echo site_url() ?>/laporan/view_laporan_permintaan" method="post" id="crudForm"  accept-charset="utf-8">
			<div class='form-div'>
				<div class='form-field-box odd' id="nama_pengguna_field_box">
					<div class='form-display-as-box' id="nama_pengguna_display_as_box">
						Status Pengajuan Barang
					</div>
					<div class='form-input-box' id="nama_pengguna_input_box">
						<select id='field-nama-barang' name='filter' class='chosen-select' data-placeholder='Select Barang'>
							<option value=''  ></option>
							<option value='Belum Ada Hasil'>Belum Ada Hasil</option>
							<option value='Direkomendasikan'>Direkomendasikan</option>
							<option value='Ditolak'>Ditolak</option>
						</select>
					</div>
					<div class='clear'></div>
				</div>
				<div class='form-field-box even' id="nama_pengguna_field_box">
					<div class='form-display-as-box' id="tgl_permintaan_display_as_box">
						Tanggal Awal Laporan
					</div>
					<div class='form-input-box' id="tgl_permintaan_input_box">
					<input id='field-tgl_permintaan' name='tanggal_awal' type='date' value='' maxlength='10' class='form-control' />(dd/mm/yyyy)				</div>
					<div class='clear'></div>
				</div>
				<div class='form-field-box odd' id="nama_pengguna_field_box">
					<div class='form-display-as-box' id="tgl_permintaan_display_as_box">
						Tanggal Akhir Laporan
					</div>
					<div class='form-input-box' id="tgl_permintaan_input_box">
					<input id='field-tgl_permintaan' name='tanggal_akhir' type='date' value='' maxlength='10' class='form-control' />(dd/mm/yyyy)				</div>
					<div class='clear'></div>
				</div>

			</div>
			<div class="pDiv">
			<div class='form-button-box'>
				<input id="view" type='submit' value='Tampilkan Laporan'  name="button_submit" class="btn btn-large"/>
				<input id="print" type='submit' value='Tampilkan dan Cetak Laporan'  name="button_submit" class="btn btn-large"/>
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
<?php
	include "footer2.php";
?>
