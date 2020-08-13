<?php 
$stok = $this->model_app->stok($row['id_barang'])->row_array();
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('',$attributes); 
          echo "<div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$row[id_barang]'>
                    <tr><th width='150px' scope='row'>Kode Barang</th>    <td>$row[kode_barang]</td></tr>
                    <tr><th scope='row'>Nama Barang</th>   <td>$row[nama_barang]</td></tr>
                    <tr><th scope='row'>Merek/Brand</th>   <td>$row[merek_brand]</td></tr>
                    <tr><th scope='row'>Model/Type</th>    <td>$row[model_type]</td></tr>
                    <tr><th scope='row'>Berat Bruto</th>   <td>$row[berat_bruto]</td></tr>
                    <tr><th scope='row'>Ukuran/Volume</th> <td>$row[ukuran_volume]</td></tr>
                    <tr><th scope='row'>Warna</th>         <td>$row[warna]</td></tr>
                    <tr><th scope='row'>Jumlah Stok</th>    <td>$stok[stok] $row[kode_satuan]</td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='150px' scope='row'>Kategori</th>      <td>$row[nama_kategori]</td></tr>
                    <tr><th scope='row'>Subkategori</th>   <td>$row[nama_subkategori]</td></tr>
                    <tr><th scope='row'>Nomor Rak</th>      <td>$row[nama_rak]</td></tr>
                    <tr><th scope='row'>Harga Beli</th>     <td>".rupiah($row['harga_beli'])."</td></tr>
                    <tr><th scope='row'>Jumlah Minimal</th> <td>$row[jml_minimal]</td></tr>
                    <tr><th scope='row'>Jumlah Maksimal</th><td>$row[jml_maksimal]</td></tr>
                    <tr><th scope='row'>Keterangan</th>     <td>$row[keterangan_barang]</td></tr>
                    <tr><th scope='row'>Barang Jual</th>    <td>$row[status_jual]</td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>";
                    $no = 0;
                    foreach ($kategori_pelanggan as $r) {
                      $id = $r['id_kategori_pelanggan'];
                      $harga1 = $this->model_app->view_one('mu_barang_harga',array('id_barang'=>$row['id_barang'], 'id_kategori_pelanggan'=>$id, 'id_jenis_jual'=>'1'),'id_barang_harga')->row_array();
                      $harga2 = $this->model_app->view_one('mu_barang_harga',array('id_barang'=>$row['id_barang'], 'id_kategori_pelanggan'=>$id, 'id_jenis_jual'=>'2'),'id_barang_harga')->row_array();
                      $harga3 = $this->model_app->view_one('mu_barang_harga',array('id_barang'=>$row['id_barang'], 'id_kategori_pelanggan'=>$id, 'id_jenis_jual'=>'3'),'id_barang_harga')->row_array();
                      $harga4 = $this->model_app->view_one('mu_barang_harga',array('id_barang'=>$row['id_barang'], 'id_kategori_pelanggan'=>$id, 'id_jenis_jual'=>'4'),'id_barang_harga')->row_array();
                      $permanen = $r['permanen'];
                      if ($r['permanen']=='y'){
                        $visible = 'visible';
                      }else{
                        $visible = $conf['harga_kategori_pelanggan'];
                      }
                      echo "<tr class='$visible'><th style='color:blue' width='150px' scope='row'>$r[nama_kategori_pelanggan] </th>    <td>
                                  <table class='table table-striped anu table-condensed table-bordered'>
                                    <thead>
                                      <tr class='alert alert-info'>
                                        <th colspan='2'>Harga Jual</th>
                                        <th>(%)</th>
                                        <th>Diskon (Rp)</th>
                                        <th>Jumlah</th>
                                        <th width='50px'>Satuan</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <input type='hidden' value='$r[id_kategori_pelanggan]' name='kat[$id]'>";
                                    $satuaa = 10;
                                    for ($i = 0; $i <= 3; $i++){
                                      if ($i == 0){ $title = 'Ritel'; $hgrosir = 'visible'; }else{ $title = 'Grosir '.$i; $hgrosir = $conf['harga_grosir']; }
                                      if ($i == 0){
                                          $harga = $harga1['harga'];
                                          $persen_beli = $harga1['persen_beli'];
                                          $diskon = $harga1['diskon'];
                                          $jumlah = $harga1['jumlah'];
                                          $satuan = $harga1['satuan'];
                                      }elseif ($i == 1){
                                          $harga = $harga2['harga'];
                                          $persen_beli = $harga2['persen_beli'];
                                          $diskon = $harga2['diskon'];
                                          $jumlah = $harga2['jumlah'];
                                          $satuan = $harga2['satuan'];
                                      }elseif ($i == 2){
                                          $harga = $harga3['harga'];
                                          $persen_beli = $harga3['persen_beli'];
                                          $diskon = $harga3['diskon'];
                                          $jumlah = $harga3['jumlah'];
                                          $satuan = $harga3['satuan'];
                                      }elseif ($i == 3){
                                          $harga = $harga4['harga'];
                                          $persen_beli = $harga4['persen_beli'];
                                          $diskon = $harga4['diskon'];
                                          $jumlah = $harga4['jumlah'];
                                          $satuan = $harga4['satuan'];
                                      }

                                      echo "<tr class='$hgrosir'>
                                              <td>$title</td>
                                              <td>".rupiah($harga)."</td>
                                              <td>".round($persen_beli)."</td>
                                              <td>$diskon</td>";
                                              if ($i == 0){ 
                                                echo "<td align=center>$jumlah</td>
                                                      <td align=center>$satuan</td>";
                                              }else{
                                                if ($permanen=='y'){
                                                    echo "<td align=center>$jumlah</td>
                                                          <td align=center>$satuan</td>";
                                                }else{
                                                    echo "<td align=center>$jumlah</td>
                                                          <td align=center>$satuan</td>";
                                                }
                                              }

                                            echo "</tr>";
                                       $satuaa++;
                                    }
                                    echo "</tbody>
                                  </table>
                      </td></tr>";
                      $no++;
                     }

                  echo "</tbody>
                  </table>
                </form>";
