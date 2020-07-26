<?php 
	include "header2.php";
?>
<div id='list-report-error' class='report-div error'></div>
<div id='list-report-success' class='report-div success report-list' ></div>
<div class="flexigrid" style='width: 100%;' data-unique-hash="e82db74d7b5418ab6415555a35cc06a4">
	<div id='main-table-box'>
		<form action="<?php echo site_url() ?>/permintaan/insert" method="post" id="crudForm"  accept-charset="utf-8">
			<div class='form-div'>
			<?php
				foreach($detail_permintaan as $d){
			?>
				<div class='form-field-box even' id="nama_pengguna_field_box">
					<div class='form-display-as-box' id="nama_pengguna_display_as_box">
						Merk Barang
					</div>
					<div class='form-input-box' id="pabrik_merk_input_box">
						<div id="field-pabrik_merk" class="readonly_label"><?php echo $d->nama_merk ?></div>				
					</div>
					<div class='clear'></div>
				</div>
				<div class='form-field-box odd' id="nama_pengguna_field_box">
					<div class='form-display-as-box' id="nama_pengguna_display_as_box">
						Nama Barang
					</div>
					<div class='form-input-box' id="pabrik_merk_input_box">
						<div id="field-pabrik_merk" class="readonly_label"><?php echo $d->nama_barang ?></div>				
					</div>
					<div class='clear'></div>
				</div>
				<div class='form-field-box even' id="nama_pengguna_field_box">
					<div class='form-display-as-box' id="tgl_permintaan_display_as_box">
						Tanggal Permintaan
					</div>
					<div class='form-input-box' id="pabrik_merk_input_box">
						<div id="field-pabrik_merk" class="readonly_label"><?php echo $d->tgl_permintaan?></div>				
					</div>
					<div class='clear'></div>
				</div>
				<div class='form-field-box odd' id="nama_pengguna_field_box">
					<div class='form-display-as-box' id="tgl_permintaan_display_as_box">
						Jumlah Permintaan
					</div>
					<div class='form-input-box' id="pabrik_merk_input_box">
						<div id="field-pabrik_merk" class="readonly_label"><?php echo $d->jumlah_barang ?></div>				
					</div>
					<div class='clear'></div>
				</div>
				<div class='form-field-box even' id="nama_pengguna_field_box">
					<div class='form-display-as-box' id="tgl_permintaan_display_as_box">
						Perkiraan Harga
					</div>
					<div class='form-input-box' id="pabrik_merk_input_box">
						<div id="field-pabrik_merk" class="readonly_label"><?php echo number_format($d->harga_barang,2,",",".") ?></div>				
					</div>
					<div class='clear'></div>
				</div>
			</div>
			<div class='clear'></div>
		</div>
		<?php
			}
		?>
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