<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>cari data</title>
  </head>
  <body>

    <?php require_once ("database.php") ?>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
  </body>
</html>
