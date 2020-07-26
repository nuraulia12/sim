<?php
	include 'header2.php';
	foreach($id_terakhir as $id){
?>
	<div id='list-report-error' class='report-div error'></div>
		<div id='list-report-success' class='report-div success report-list' ></div>
			<div class="flexigrid" style='width: 100%;' data-unique-hash="e82db74d7b5418ab6415555a35cc06a4">
				<div id='main-table-box'>
				<form action="<?php echo site_url() ?>/permintaan/simpan_jawaban" method="post" id="crudForm"  accept-charset="utf-8">
					<input id='field-tgl_permintaan' name='id_permintaan' type='hidden' value='<?php echo $id->id_permintaan ?>' maxlength='10' class='form-control'/>			</div>
					<h4>Jawablah pertanyaan-pertanyaan dibawah ini untuk memproses pengajuan barang !</h4>
					<?php
						$no=1;
						foreach($pertanyaan as $pertanyaan){
					?>
						<div>
							<?php  echo $pertanyaan->pertanyaan_kriteria?>
							<input type='radio' name='nilai<?php echo $pertanyaan->id_kriteria ?>' value='5' checked/> <?php echo $pertanyaan->jawaban1 ?></p>
							<input type='radio' name='nilai<?php echo $pertanyaan->id_kriteria ?>' value='4' /> <?php echo $pertanyaan->jawaban2 ?></p>
							<input type='radio' name='nilai<?php echo $pertanyaan->id_kriteria ?>' value='3' /> <?php echo $pertanyaan->jawaban3 ?></p>
							<input type='radio' name='nilai<?php echo $pertanyaan->id_kriteria ?>' value='2' /> <?php echo $pertanyaan->jawaban4 ?></p>
							<input type='radio' name='nilai<?php echo $pertanyaan->id_kriteria ?>' value='1' /> <?php echo $pertanyaan->jawaban5 ?></p>
						</div>
					<?php
						$no++;
						}
					?>
					<div class="pDiv">
					<div class='form-button-box'>
						<input id="form-button-save" type='submit' value='Save'  class="btn btn-large"/>
					</div>
					<div class='clear'></div>
					</form>
				</div>
			</div>
<?php
	}
?>