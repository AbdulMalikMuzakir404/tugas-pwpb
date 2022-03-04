<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>data2</title>
</head>
<body>
	<h1>DATA YANG TADI DIMASUKAN</h1>
	<?php

	$nama = $_GET['nama'];
	$email = $_GET['email'];

	$nama = filter_var($nama, FILTER_SANITIZE_STRING);
	$email = filter_var($email, FILTER_VALIDATE_EMAIL);

	echo $nama;
	echo "<br>";
	echo $email;

	?>
	<br>
	<br>
	<input type="submit" name="submit" value="back" onclick="self.history.back();">
</body>
</html>