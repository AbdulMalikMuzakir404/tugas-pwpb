<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>form pertemuan pertama</title>
</head>
<body>
	<h1>DATA SEKOLAH</h1>
	<form action="" method="POST" autocomplete="off">
		<label>NIS :</label><br>
		<input type="text" name="nis" placeholder="NIS" required><br>
		<label>Nama :</label><br>
		<input type="text" name="nama" placeholder="Nama" required><br>
		<label>Alamat :</label><br>
		<textarea placeholder="Alamat" name="alamat" required></textarea><br>
		<label>Jenis Kelamin :</label><br>
		<input type="radio" name="jk" value="laki-laki"> laki-laki<br>
		<input type="radio" name="jk" value="perempuan"> perempuan<br>
		<input type="submit" name="save" value="SAVE">
	</form>
</body>
</html>