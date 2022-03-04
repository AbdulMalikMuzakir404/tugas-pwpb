<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>data</title>
</head>
<body>
	<h1>DATA YANG ANDA MASUKAN TADI...</h1>
	<?php

	$nama = $_GET['nama'];
	$email = $_GET['email'];

	function validate($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }

    $nama    = validate(filter_var($nama, FILTER_SANITIZE_STRING));
	$email   = validate(filter_var($email, FILTER_VALIDATE_EMAIL));

	echo "Nama : ";
	echo $nama;
	echo "<br>";
	echo "Email :";
	echo $email;

	?>
	<br>
	<br>
	<input type="submit" name="submit" value="back" onclick="self.history.back();">
</body>
</html>