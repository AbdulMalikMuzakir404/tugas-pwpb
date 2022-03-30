<?php
session_start();
require_once ("db-conn.php");
$query1 = mysqli_query($conn,"SELECT * FROM barang");
$query2 = mysqli_query($conn,"SELECT * FROM buyer");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SIMPAN</title>
</head>
<body>
	<h1 align="center">DATA BARANG</h1>
	<table border="1" cellspacing="0" cellpadding="5" align="center" width="800">
	<tr align="center" bgcolor="#DEB887">
		<td width="50">Kode Barang</td>
		<td width="200">Nama Barang</td>
	    <td width="400">Harga</td>
	</tr>
	<?php if(mysqli_num_rows($query1) > 0){ ?>
    <?php
    $no = 1;
    while($data = mysqli_fetch_array($query1)) { ?>
	<tr>
		<td><?php echo $data['kodebarang']?></td>
		<td><?php echo $data['namabarang']?></td>
		<td><?php echo $data['hargasatuan']?></td>
	</tr>
	<?php $no++; } ?>
<?php } ?>
</table>

<h1 align="center">DATA BUYER</h1>
	<table border="1" cellspacing="0" cellpadding="5" align="center" width="800">
	<tr align="center" bgcolor="#DEB887">
		<td width="50">Kode Buyer</td>
		<td width="200">Nama Buyer</td>
	    <td width="400">Alamat</td>
	</tr>
	<?php if(mysqli_num_rows($query2) > 0){ ?>
    <?php
    $no = 1;
    while($data = mysqli_fetch_array($query2)) { ?>
	<tr>
		<td><?php echo $data['kodebuyer']?></td>
		<td><?php echo $data['namabuyer']?></td>
		<td><?php echo $data['alamat']?></td>
	</tr>
	<?php $no++; } ?>
<?php } ?>
</table>
<a href="index.php" style="text-decoration: none; margin-left: 95vh; font-size: 20px;">Kembali</a>
</body>
</html>