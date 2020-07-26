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

		<div class="tDiv">
				<div class="tDiv2">
        	<a href='<?php base_url() ?>permintaan/add' title='Add Permintaan' class='add-anchor add_button'>
			<div class="fbutton">
				<div>
					<span class="add">Add Pengajuan</span>
				</div>
			</div>
            </a>
			<div class="btnseparator">
			</div>
		</div>

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
						Tanggal Pengajuan
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
						Hasil Pengajuan
					</div>
				</th>
				<th width='20%'>
					<div class="text-left field-sorting "
						rel='level_pengguna'>
						Ruangan
					</div>
				</th>
				<th align="left" abbr="tools" axis="col1" class="" width='20%'>
					<div class="text-right">
						Actions
					</div>
				</th>
			</tr>
		</thead>
		<tbody>
		<?php
			if(!EMPTY($permintaan)){
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
				<div class='text-right'><?php echo $permintaan->hasil ?></div>
			</td>
			<td width='20%' class=''>
				<div class='text-right'><?php echo $permintaan->level_pengguna ?></div>
			</td>
			<td align="left" width='20%'>
				<div class='tools'>
					<a href='<?php echo site_url() ?>/permintaan/delete/<?php echo $permintaan->id_permintaan ?>' title='Delete Permintaan' class="delete-row" onclick="return confirm('Apakah Anda Yakin ?')"><span class='delete-icon'></span>
                    </a>
                    <a href='<?php echo site_url() ?>/permintaan/read/3' title='View Permintaan' class="edit_button"><span class='read-icon'></span>
                    </a>

                    <div class='clear'></div>
				</div>
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
