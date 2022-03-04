<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>combobox</title>
</head>
<body>
	<!-- tempat tanggal lahir TTL -->
    <div class="combobox">
      <!-- tanggal -->
      <label style="margin-bottom: 14px; margin-top: 14px;">Tanggal Lahir</label><br>
      <select name="tgl">
        <option selected="selected">Tanggal</option>
        <?php
        for($a=1; $a<=31; $a++){
          echo"<option value=$a> $a </option>";
        }
        ?>
      </select>

      <!-- bulan -->
      <select name="bln">
        <option selected="selected">Bulan</option>
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
      <option selected="selected">Tahun</option>
      <?php
      for($a=1950;$a<=$now;$a++){
        echo "<option value='$a'>$a</option>";
      }
      echo "</select>";
      ?>
    <!-- akhir tempat tanggal lahir TTL -->
</body>
</html>