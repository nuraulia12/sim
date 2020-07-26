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
        <label><h2><b>Laporan Permintaan Barang Dari Sub Unit</b></h2></label>
    </center>
<table>
  <tr>
    <th>No</th>
    <th>Nama Barang Yang Diminta</th>
    <th>Permintaan</th>
    <th>Tanggal Permintaan</th>
    <th>Jumlah Permintaan</th>
    <th>Proses</th>
  </tr>
  <?php
  $no=1;
  foreach ($laporan_request as $row) { ?>
  <tr>
    <td><?php echo $no++;?></td>
    <td><?php echo $row->nama_barang;?></td>
    <td><?php echo $row->nama_pengguna;?></td>
    <td><?php echo $row->tanggal_permintaan;?></td>
    <td><?php echo $row->jumlah;?></td>
    <td><?php echo $row->proses;?></td>

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
