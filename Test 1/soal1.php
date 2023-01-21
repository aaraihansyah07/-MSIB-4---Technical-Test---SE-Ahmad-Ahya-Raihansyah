<HTML>
<head>
</head>
<body>
  <h2>Rumus A000124 of Sloane’s OEIS</h2>
  <form method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
    Masukkan inputan (bilangan bulat positif) <input type='number' name='inputs'/>
    <input type='submit' name='submits'>
  </form>
  <?php
     if (isset($_POST['submits'])) {
	   $inputs = $_POST['inputs'];
     $inputan = (int)$inputs;
	   $jenis_inputan = is_int($inputan);
     if ($inputan<1) {
        echo "Inputan tidak boleh kurang dari 1";
     }
      else if ($jenis_inputan == 1) {
        for ($i=0; $i<$inputan; $i++) {
	       $hasil = ($i*$i+$i*1)/2+1;
         $sloane[] = $hasil;
      }
      $implod_sloane = implode("-", $sloane);
      echo $implod_sloane;
      }
    }
  ?>
</HTML>