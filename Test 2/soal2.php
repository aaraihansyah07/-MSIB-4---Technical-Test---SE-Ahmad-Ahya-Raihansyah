<HTML>
	<head>
	</head>
	<body>
		<form method='post'>
			Masukkan jumlah pemain <input type='number' name='jumlah_pemain'/>
			<input type='submit' name='submits'/>
		</form>
		<?php	
			error_reporting(0);			
			if (isset($_POST['submits'])) {
				$jumlah_pemain = $_POST['jumlah_pemain'];
				echo "<form method='post'>";
				for ($i=1; $i<=$jumlah_pemain; $i++) {
					echo "<input type='hidden' name='jumlah_pemain' value='$jumlah_pemain'/>";
					echo "&nbspSkor pemain ".$i."<input type='number' name='skor_pemain".$i."'/><br>";
				}
				echo "<input type='submit' name='submits2'>";
				echo "</form>";
			}
			if (isset($_POST['submits2'])) {
				$jumlah_pemain = $_POST['jumlah_pemain'];
				echo "Jumlah pemain : $jumlah_pemain<br>";
				for ($j=1; $j<=$jumlah_pemain; $j++) {
					$skor_pemain[] = $_POST['skor_pemain'. $j];
				}
				$skor_pemain_jml = count($skor_pemain);
				rsort($skor_pemain);
				echo "Skor pemain : ";
				for ($k = 0; $k<$skor_pemain_jml; $k++) {
					echo $skor_pemain[$k]. " ";
				}
				echo "<form method='post'>";
					echo "<input type='hidden' name='jumlah_pemain' value='$jumlah_pemain'/>";
					echo "<input type='hidden' name='skor_pemain_string' value='".implode(" ", $skor_pemain)."'/><hr>";
					echo "<br>Jumlah permainan yang dimainkan GITS &nbsp<input type='number' name='gits_main'/>";
					echo "&nbsp<input type='submit' name='submits3'/>";
				echo "</form>";
			}
			if (isset($_POST['submits3'])) {
				$jumlah_pemain = $_POST['jumlah_pemain'];
				$skor_pemain_string = $_POST['skor_pemain_string'];
				$gits_main = $_POST['gits_main'];
				echo "Jumlah pemain : $jumlah_pemain<br>";
				echo "Skor pemain : $skor_pemain_string<br><hr>"; 
				echo "Permainan yang dimainkan GITS sebanyak : $gits_main";

				echo "<form method='post'>";
				echo "<input type='hidden' name='gits_main' value='$gits_main'/>";
				echo "<input type='hidden' name='jumlah_pemain' value='$jumlah_pemain'/>";
				echo "<input type='hidden' name='skor_pemain_string' value='$skor_pemain_string'/>";
				for ($l=1; $l<=$gits_main; $l++) {
						echo "<br>Skor permainan GITS $l &nbsp<input type='number' name='skor_gits".$l."'/>";
				}
				echo "<br><input type='submit' name='submits4'/>";				
				echo "</form>";
			}
			if (isset($_POST['submits4'])) {
				$gits_main = $_POST['gits_main'];
				$jumlah_pemain = $_POST['jumlah_pemain'];
				$skor_pemain_string = $_POST['skor_pemain_string'];
				for ($m=1; $m<=$gits_main; $m++) {
					$skor_gits[] = $_POST['skor_gits'. $m];
				}
				echo "Jumlah pemain : $jumlah_pemain<br>";
				echo "Skor pemain : $skor_pemain_string<br><hr>"; 
				echo "Permainan yang dimainkan GITS sebanyak : $gits_main<br>";
				echo "Skor permainan yang dimainkan GITS : ";
				foreach ($skor_gits as $s_g) {
					echo "$s_g ";
				}
				echo "<br>";
				for ($n=0; $n<$gits_main; $n++) {
					$skor_campuran[$n] = "x ". $skor_pemain_string. " ". $skor_gits[$n];
					$skor_campuran[$n] = explode(" ", $skor_campuran[$n]);
					rsort($skor_campuran[$n]);
				}
				for ($u=0; $u<$gits_main; $u++) {
					$juara[$u] = array('x', 1);
				}


				$skor_campuran_count = count($skor_campuran[0]);
				echo "<hr>Perolehan juara yang didapat GITS : <br>";
				for ($t=0; $t<$gits_main; $t++) {
					for ($p=2; $p<$skor_campuran_count; $p++) {
						$q=$p+1;
						$r=$p-1;
						if ($skor_campuran[$t][$p] == $skor_campuran[$t][$r] AND $skor_campuran[$t][$p] == $skor_campuran[$t][$q]) {
							$juara[$t][$p] = $juara[$t][$r];
						}
						else if ($skor_campuran[$t][$p] == $skor_campuran[$t][$r] AND $skor_campuran[$t][$p] > $skor_campuran[$t][$q]) {
							$juara[$t][$p] = $juara[$t][$r];
						}
						else if ($skor_campuran[$t][$p] < $skor_campuran[$t][$r]) {
							$juara[$t][$p] = $juara[$t][$r]+1;
						}
						else if($skor_campuran[$t][$p] == $skor_campuran[$t][$r]) {
							$juara[$t][$p] = $juara[$t][$r];
						}
					}
					echo $juara[0][array_search($skor_gits[$t], $skor_campuran[$t])]. " ";
				}
			}
			error_reporting(E_ALL & ~E_NOTICE);
		?>
	</body>
</HTML>