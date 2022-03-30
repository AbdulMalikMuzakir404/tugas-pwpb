<!-- ============================================================================================================ -->

<?php

require_once ("database.php");
$query = mysqli_query($conn,"SELECT * FROM datasekolah ORDER BY id DESC");

if (isset($_POST['edit'])) {

    // mengindari serang sql injection
    $nis    = $conn->real_escape_string($_POST['nis']);
    $nama   = $conn->real_escape_string($_POST['nama']);
    $alamat = $conn->real_escape_string($_POST['alamat']);
    $jk     = $conn->real_escape_string($_POST['jk']);
    $tgl    = $conn->real_escape_string($_POST['tgl']);
    $bln    = $conn->real_escape_string($_POST['bln']);
    $thn    = $conn->real_escape_string($_POST['thn']);

    // memfilter inputan sebelum dimasukan kedatabase
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $nis     = validate(filter_var($nis, FILTER_SANITIZE_STRING));
    $nama    = validate(filter_var($nama, FILTER_SANITIZE_STRING));
    $alamat  = validate(filter_var($alamat, FILTER_SANITIZE_STRING));
    $jk      = validate(filter_var($jk, FILTER_SANITIZE_STRING));
    $tgl     = validate(filter_var($tgl, FILTER_SANITIZE_STRING));
    $bln     = validate(filter_var($bln, FILTER_SANITIZE_STRING));
    $thn     = validate(filter_var($thn, FILTER_SANITIZE_STRING));

switch ($bln) {
  case '1':
    $bln1 = "Januari";
    break;
  case '2':
    $bln1 = "Februari";
    break;
  case '3':
    $bln1 = "Maret";
    break;
  case '4':
    $bln1 = "April";
    break;
  case '5':
    $bln1 = "Mei";
    break;
  case '6':
    $bln1 = "Juni";
    break;
  case '7':
    $bln1 ="Juli";
    break;
  case '8':
    $bln1 = "Agustus";
    break;
  case '9':
    $bln1 = "September";
    break;
  case '10':
    $bln1 = "Oktober";
    break;
  case '11':
    $bln1 = "November";
    break;
  default:
    $bln1 = "Desember";
    break;
}

$data = $tgl."/".$bln1."/".$thn;

$sql = "UPDATE datasekolah SET nama='$nama', alamat='$alamat', jk='$jk', ttl='$data' WHERE nis='$nis'";
$update = mysqli_query($conn, $sql);

 if($update) {
    header("Location: simpan?success=Berhasil Mengupdate Data");
    exit();
} else {
    header("Location: simpan.php?error=Data Yang Anda Masukan Error!");
    exit();
}

}


?>

<!-- ============================================================================================================ -->


<!-- ============================================================================================================ -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>simpan</title>
  </head>
  <body>
    <!-- awal cari data sekolah -->
    <h1 align="center" style="margin-top: 30px;">CARI DATA SEKOLAH</h1>
    <div class="container-fluid" style="background-color: #fff; width: 300px; margin-top: 30px; padding-bottom: 20px;">

        <form class="d-flex" action="" method="POST" autocomplete="off">
            <input class="form-control me-2" maxlength="3" type="search" name="cari" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit" name="btnCari">Search</button>
        </form>

        <?php

        if(isset($_POST['btnCari'])) {
            $cari = filter_var($_POST['cari'], FILTER_SANITIZE_STRING);
        }

        ?>

    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Tangga Lahir</th>
            </tr>
        </thead>

        <?php 

        if(isset($_POST['btnCari'])) {
            $cari = $conn->real_escape_string($_POST['cari']);

            function validate($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $cari = validate(filter_var($cari, FILTER_SANITIZE_STRING));
            $data = mysqli_query($conn,"SELECT * FROM datasekolah WHERE id = $cari");
        } else {
            $data = mysqli_query($conn,"SELECT * FROM datasekolah");
        }
        $d = mysqli_fetch_array($data);

        ?>

        <tbody>
            <tr>
                <td><?php echo $d['id'] ?></td>
                <td><?php echo $d['nis'] ?></td>
                <td><?php echo $d['nama'] ?></td>
                <td><?php echo $d['alamat'] ?></td>
                <td><?php echo $d['jk'] ?></td>
                <td><?php echo $d['ttl'] ?></td>
            </tr>
        </tbody>
    </table>

    <!-- akhir cari data sekolah -->


    <!-- awal form data sekolah -->
    <h1 align="center" style="margin-top: 70px;">FORM DATA SEKOLAH</h1>

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

    <form action="" method="POST" autocomplete="off">
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                    <?php echo $_GET['error'] ?>        
                    </div>
                </div>
            <?php } ?>
            <?php if(isset($_GET['success'])) { ?>
                <div class="alert alert-success d-flex align-items-center" style="background-color: #00FF7F;" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        <?php echo $_GET['success']; ?>  
                    </div>
                </div>
            <?php } ?>
            <?php 

            if(isset($_POST['btnCari'])) {
                $cari = $conn->real_escape_string($_POST['cari']);
                $cari = filter_var($cari, FILTER_SANITIZE_STRING);
                $data = mysqli_query($conn,"SELECT * FROM datasekolah WHERE id = $cari");    
            } else {
                $data = mysqli_query($conn,"SELECT * FROM datasekolah");  
            }
            $d1 = mysqli_fetch_array($data);

            $data1 = mysqli_fetch_array($query);
            $data2 = $d1['ttl'];
            $data3 = explode("/", $data2);

            switch ($data3[1]) {
                case 'Januari':
                    $bln1 = "1";
                    break;
                  case 'Februari':
                    $bln1 = "2";
                    break;
                  case 'Maret':
                    $bln1 = "3";
                    break;
                  case 'April':
                    $bln1 = "4";
                    break;
                  case 'Mei':
                    $bln1 = "5";
                    break;
                  case 'Juni':
                    $bln1 = "6";
                    break;
                  case 'Juli':
                    $bln1 ="7";
                    break;
                  case 'Agustus':
                    $bln1 = "8";
                    break;
                  case 'September':
                    $bln1 = "9";
                    break;
                  case 'Oktober':
                    $bln1 = "10";
                    break;
                  case 'November':
                    $bln1 = "11";
                    break;
                  default:
                    $bln1 = "12";
                    break;
                }

        ?>

        <!-- nis -->
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NIS</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $d1['nis'] ?>" name="nis" maxlength="9" placeholder="NIS" required>
        </div>
        <!-- ==== -->

        <!-- nama -->
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $d1['nama'] ?>" name="nama" maxlength="30" placeholder="Nama" required>
        </div>
        <!-- ==== -->

        <!-- alamat -->
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" placeholder="Alamat" maxlength="40" rows="3" required><?php echo $d1['alamat'] ?></textarea>
        </div>
        <!-- ==== -->
        <!-- jenis kelamin -->
        <!-- laki-laki -->
        <label style="margin-bottom: 14px;">Jenis Jelamin</label>
        <div class="form-check">
          <input class="form-check-input" <?php echo ($d1['jk'] == "laki-laki" ? "checked" : "") ?> type="radio" name="jk" value="laki-laki" id="flexRadioDefault1" >
          <label class="form-check-label" for="flexRadioDefault1">laki-laki</label>
        </div>
        <!-- perempuan -->
        <div class="form-check">
          <input class="form-check-input" <?php echo ($d1['jk'] == "perempuan" ? "checked" : "") ?> type="radio" name="jk" value="perempuan" id="flexRadioDefault2">
          <label class="form-check-label" for="flexRadioDefault2">perempuan</label>
        </div>
        <!-- akhir jenis kelamin -->

        <!-- tempat tanggal lahir TTL -->
        <div class="combobox">
          <!-- tanggal -->
          <label style="margin-bottom: 14px; margin-top: 14px;">Tanggal Lahir</label><br>
          <select name="tgl">
            <option><?php echo $data3[0] ?></option>
            <?php
            for($a=1; $a<=31; $a++){
              echo"<option value=$a> $a </option>";
            }
            ?>
          </select>

          <!-- bulan -->
          <select name="bln">
            <option><?php echo $bln1 ?></option>
            <?php
            for($a=1; $a<=12; $a++){
              echo"<option value=$a> $a </option>";
            }
            ?>

          <!-- tahun -->
          </select>
          <?php
          $now=date('Y');
          echo "<select name='thn'>";
          ?>
          <option><?php echo $data3[2] ?></option>
          <?php
          for($a=1950;$a<=$now;$a++){
            echo "<option value='$a'>$a</option>";
          }
          echo "</select>";
          ?>
          <!-- akhir tempat tanggal lahir TTL -->
          
        <div class="d-grid gap-2 d-md-block" style="margin-left: 50%;">
            <button class="btn btn-primary" type="submit" name="edit">Edit Data</button>
        </div>
    </form>



    <h1 align="center" style="margin-top: 70px;">DATA SEKOLAH</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Tangga Lahir</th>
            </tr>
        </thead>
        <tbody>
            <?php if(mysqli_num_rows($query) > 0){ ?>
                <?php while($data = mysqli_fetch_array($query)) { ?>
                    <tr id = "<?php echo $data['id'] ?>">
                        <td><?php echo $data['id'] ?></td>
                        <td><?php echo $data['nis'] ?></td>
                        <td><?php echo $data['nama'] ?></td>
                        <td><?php echo $data['alamat'] ?></td>
                        <td><?php echo $data['jk'] ?></td>
                        <td><?php echo $data['ttl'] ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>

    <div class="d-grid gap-2 d-md-block" style="margin-left: 48%;">
        <button class="btn btn-primary" type="submit"><a href="nama-file.php" style="color: white; text-decoration: none;">Tambah Data</a></button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
  </body>
</html>
<!-- ============================================================================================================