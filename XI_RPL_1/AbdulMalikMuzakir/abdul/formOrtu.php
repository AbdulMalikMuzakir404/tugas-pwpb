<?php

// include database
require_once ("database.php");

// jika tombol dengan variable save ditekan maka jalankan code dibawah ini
if (isset($_POST['save'])) {

    // menghindari serang sql injection
    $nama_ortu      = $conn->real_escape_string($_POST['nama_ortu']);
    $pekerjaan_ortu = $conn->real_escape_string($_POST['pekerjaan_ortu']);
    $hp_ortu        = $conn->real_escape_string($_POST['hp_ortu']);
    $alamat_ortu    = $conn->real_escape_string($_POST['alamat_ortu']);

    // memfilter inputan sebelum dimasukan kedatabase
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $nama_ortu      = validate(filter_var($nama_ortu, FILTER_SANITIZE_STRING));
    $pekerjaan_ortu = validate(filter_var($pekerjaan_ortu, FILTER_SANITIZE_STRING));
    $hp_ortu        = validate(filter_var($hp_ortu, FILTER_SANITIZE_STRING));
    $alamat_ortu    = validate(filter_var($alamat_ortu, FILTER_SANITIZE_STRING));


    // memasukan semua data dari form kedatabae
    $sql1 = "INSERT INTO dataortu VALUES ('','$nama_ortu', '$pekerjaan_ortu', '$hp_ortu', '$alamat_ortu')";
    $save = mysqli_query($conn, $sql1);

    // kondisi jika semua data yang dimasukan benar maka tampilkan pesan berhasil dan sebaliknya
    if($save) {
        header("Location: formOrtu.php?success=Berhasil Menyimpan Data");
        exit();
    } else {
        header("Location: formOrtu.php?error=Data Yang Anda Masukan Error!");
        exit();
    }

}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Input Ortu</title>
  </head>
   <style type="text/css">
      .form{
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        margin: 20px;
        width: 500px;
        border: none;
        margin-left: 32%;
        border-radius: 10px;
      }
      a{
        text-decoration: none;
        color: #fff;
      }
      a:hover{
        color: #fff;
      }
    </style>
  <body>

    <!-- ======================================================================================================== -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>
      <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
      </symbol>
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
    </svg>
    <!-- ======================================================================================================== -->

    <!-- ======================================================================================================== -->
    <form class="form" action="" method="POST" autocomplete="off" style=" background: #fff; align-items: center; padding: 20px;">
    <h1 style="text-align: center;">INPUT ORTU</h1><br>

    <!-- pesan jika proses memasukan data ke database berhasil dan sebaliknya -->
    <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
          <div>
            <?php echo $_GET['error']; ?>
          </div>
        </div>
      <?php } ?>
      <?php if (isset($_GET['success'])) { ?>
        <div class="alert alert-success d-flex align-items-center" style="background-color: #00FF7F;" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
          <div>
            <?php echo $_GET['success']; ?>  
            </div>
          </div>
      <?php } ?>
      <!-- akhir pesan -->

      <!-- nama -->
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Nama</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_ortu" maxlength="50" placeholder="Nama" required>
    </div>
    <!-- akhir nama -->

    <!-- pekerjaan -->
    <label for="pekerjaan_ortu" class="form-label">Pekerjaan</label>
    <select class="form-select" aria-label="Default select example" name="pekerjaan_ortu" id="pekerjaan_ortu" required>
      <option value="PNS">PNS</option>
      <option value="TNI">TNI</option>
      <option value="POLRI">POLRI</option>
      <option value="LAINNYA">LAINNYA</option>
    </select>
    <!-- akhir pekerjaan -->

    <!-- hp -->
    <div class="mb-3">
      <label for="hp_ortu" class="form-label">Number Handphone</label>
      <input type="text" class="form-control" id="hp_ortu" name="hp_ortu" maxlength="13" placeholder="Number Handphone" required>
    </div>
    <!-- akhir hp -->

    <!-- alamat -->
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat_ortu" placeholder="Alamat" maxlength="50" rows="3" required></textarea>
    </div>
    <!-- akhir alamat -->

    <!-- button untuk mengsave semua inputan dari form -->
    <br><br><br>
    <div class="d-grid gap-2">
      <button class="btn btn-primary" name="save" type="submit">SAVE</button>
    </div>
    <!-- akhir button -->
  </form>
</div>
  <!-- ======================================================================================================== -->

  <!-- ======================================================================================================== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <!-- ======================================================================================================== -->

  </body>
</html>
