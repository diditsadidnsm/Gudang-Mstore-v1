<?php
  session_start();
  session_destroy();
  echo "<script>window.alert('Sukses Keluar dari gudang multigroup.');
				window.location='index.php'</script>";
	die();
		

?>