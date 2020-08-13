<!DOCTYPE html>
<html>
<head>
  <title>Barcode Print</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/bootstrap/css/bootstrap.min.css">
</head>
<body onload="window.print()">
    <?php
      $jml_data = count($this->input->post('a'));
      $row = $this->model_app->view_one_address('mu_conf_perusahaan',array('id_perusahaan' => 1),'id_perusahaan')->row_array();
			for ($i=1; $i <= $jml_data; $i++){
          for ($b=1; $b <= $this->input->post('b')[$i]; $b++){ 
            $rows = $this->model_app->view_one('mu_barang',array('kode_barang' => $this->input->post('a')[$i]),'id_barang')->row_array();
              	echo "<div class='space col-xs-2'>  
          							<center>
          							$rows[nama_barang]</center>
          							<img style='width:100%' src='".base_url()."app/set_barcode/".$this->input->post('a')[$i]."'>
          						</div>";
          }
			}
    ?>
</body>
</html>
