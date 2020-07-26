<!DOCTYPE html>
<html>
<head>
<title><?php echo $title;?></title>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;

    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
    <center>
        <label><h2><b>Laporan Pengajuan Barang</b></h2></label>
    </center>
<table>
  <tr>
    <th>No</th>
    <th>Merk Barang</th>
    <th>Nama Barang</th>
    <th>Pemohon</th>
    <th>Tanggal Permintaan</th>
    <!--<th>Harga Barang</th>-->
    <th>Jumlah Permintaan</th>
    <th>Nilai Penghitungan</th>
    <th>Hasil</th>
  </tr>
  <?php
  $no=1;
  foreach ($laporan_permintaan as $row) { ?>
  <tr>
    <td><?php echo $no++;?></td>
    <td><?php echo $row->nama_merk;?></td>
    <td><?php echo $row->nama_barang;?></td>
    <td><?php echo $row->nama_pengguna;?></td>
    <td><?php echo $row->tgl_permintaan;?></td>
    <!--<td align="right"><?php echo number_format($row->harga_barang,2,",",".");?></td>-->
    <td><?php echo $row->jumlah_barang;?></td>
    <td><?php echo $row->nilai_akhir;?></td>
    <td><?php echo $row->hasil;?></td>

  </tr>
    <?php
        }

    ?>

</table>
<br>
<table border="1">
    <tr>
        <td align="center">
            ________________, <?php echo date("d-m-Y"); ?>
            <br><br><br><br><br>
            _____________________________________
        </td>
    </tr>
</table>

</body>
</html>
