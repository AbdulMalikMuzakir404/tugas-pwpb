<?php

require_once ("db-conn.php");

if (isset($_POST['simpanbuyer'])) {

  $namabuyer = $conn->real_escape_string($_POST['namabuyer']);
  $alamat    = $conn->real_escape_string($_POST['alamat']);

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $namabuyer = validate(filter_var($namabuyer, FILTER_SANITIZE_STRING));
    $alamat      = validate(filter_var($alamat, FILTER_SANITIZE_STRING));

    $sql   = "INSERT INTO buyer VALUES (NULL, '$namabuyer', '$alamat')";
    $saved = mysqli_query($conn, $sql);

    if ($saved) {
      header("Location: buyer.php?success=Data Berhasil Dimasukan");
        exit();
    } else {
      header("Location: buyer.php?error=Data Yang Anda Masukan Error!");
        exit();
    }

}


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>BUYER</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<style type="text/css">
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  text-decoration: none;
  font-family: 'Poppins', sans-serif;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #f7f7f7;
  padding: 0 10px;
}
.wrapper{
  background: #fff;
  max-width: 430px;
  width: 100%;
  border-radius: 20px;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
}

.form{
  padding: 25px 30px;
}
.error {
   background: #F2DEDE;
   color: #A94442;
   padding: 10px;
   text-align: center;
   width: 100%;
   border-radius: 5px;
   margin: 20px auto;
   box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.success {
   text-align: center;
   background: #F0E68C;
   color: #A94442;
   padding: 10px;
   width: 100%;
   border-radius: 5px;
   margin: 20px auto;
   box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.form header{
  font-size: 25px;
  font-weight: 600;
  text-align: center;
  margin-bottom: 25px;
  margin-top: 20px;
}
.form form{
  margin: 20px 0;
}
.form form .name-details{
  display: flex;
}
.form .name-details .field:first-child{
  margin-right: 10px;
}
.form .name-details .field:last-child{
  margin-left: 10px;
}
.form form .field{
  display: flex;
  margin-bottom: 10px;
  flex-direction: column;
  position: relative;
}
.form form .field label{
  margin-bottom: 8px;
}
.form form .input input{
  height: 40px;
  width: 100%;
  font-size: 16px;
  padding: 0 10px;
  border-radius: 6px;
  border: none;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
}
.form form .field input{
  outline: none;
}
.form form .image input{
  font-size: 17px;
}
.form form .button input{
  height: 45px;
  border: none;
  color: #fff;
  font-size: 17px;
  background: #ff7f50;
  border-radius: 5px;
  cursor: pointer;
  margin-top: 13px;
  transition: 1s;
}
.form form .button input:hover{
  color: #ff7f50;
  background: #fff;
  transition: 1s;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
}
.form form .button a{
  height: 45px;
  border: none;
  color: #fff;
  font-size: 17px;
  background: #ff7f50;
  border-radius: 5px;
  cursor: pointer;
  margin-top: 13px;
  transition: 1s;
  text-align: center;
  text-decoration: none;
  padding-top: 10px;
}
.form form .button a:hover{
  color: #ff7f50;
  background: #fff;
  transition: 1s;
  text-align: center;
  text-decoration: none;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
}


}
</style>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>PWPB</header>
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      <?php if (isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
      <?php } ?>
      <form action="" method="POST" autocomplete="off">
        <div class="field input">
          <label>Nama Buyer</label>
          <input type="text" name="namabuyer" placeholder="Nama Buyer" required>
        </div>
        <div class="field input">
          <label>Alamat</label>
          <input type="text" name="alamat" placeholder="Alamat" required>
        </div>
        <div class="field button">
          <input type="submit" name="simpanbuyer" value="Simpan">
          <a href="simpan.php">Lihat Data</a>
        </div>
      </form>
    </section>
  </div>
</body>
</html>