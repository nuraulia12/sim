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
.container {
  width: 85%;
  margin: auto;
}
</style>

<script>
	window.print();
</script>

</head>
<body>

  <div class="container">
    <center>
            <label><h2><b>Laporan Barang</b></h2></label>
        </center>
    <table class="border">
      <tr>
        <th>No</th>
	<th>Tanggal</th>
        <th>Nama Barang</th>
	<th>Stok</th>
        <th>Merk Barang</th>
        <th>Gambar</th>
      </tr>
      <?php 
      $no=1; 
      foreach ($barang as $row) { ?>
      <tr>
        <td><?php echo $no++;?></td>
	<td><?php echo $row->tanggal_barang_masuk;?></td>
        <td><?php echo $row->nama_barang;?></td>
	<td><?php echo $row->jumlah;?></td>	
        <td><?php echo $row->nama_merk ?></td>
        <td style="width:30%;text-align:center;"><img width="20%" src=<?php echo base_url()?>assets/uploads/files/<?php echo $row->foto?>></td>
      </tr>
        <?php 
            } 
        
        ?>
        
    </table>
    <br>
    <table border="0">
        <tr>
            <td align="center">
                ________________, <?php echo date("d-m-Y"); ?>
                <br><br><br><br><br>
                _____________________________________
            </td>
        </tr>
    </table>
  </div>

</body>
</html>
