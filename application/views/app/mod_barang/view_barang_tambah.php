<style type="text/css">
  .anu tbody td {
    padding:3px !important;
    border:1px solid #e3e3e3;
  }
</style>
<script>
function Satuanid(data) {
  document.getElementById("sat1").innerHTML = data.value;
  document.getElementById("sat2").innerHTML = data.value;
  document.getElementById("sat3").innerHTML = data.value;
  document.getElementById("sat4").innerHTML = data.value;
  document.getElementById("sat5").innerHTML = data.value;
  document.getElementById("sat6").value = data.value;
  document.getElementById("sat7").value = data.value;
  document.getElementById("sat8").value = data.value;
  document.getElementById("sat9").value = data.value;
  document.getElementById("sat10").value = data.value;
}

function Satuanid1(data) {
  document.getElementById("sat2").innerHTML = data.value;
  document.getElementById("sat4").innerHTML = data.value;
}
</script>
<?php 
$kode = $this->db->query("SELECT id_barang FROM mu_barang ORDER BY id_barang DESC LIMIT 1")->row();
$ppn = $this->db->query("SELECT * FROM mu_conf_penjualan ORDER BY id_conf_penjualan DESC LIMIT 1")->row_array();
$kode_barang = "BRG-".sprintf("%06s", $kode->id_barang+1);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambahkan Data</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('app/tambah_barang',$attributes); 
          echo "<div class='col-md-5'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='150px' scope='row'>Kode Barang</th>    <td><input style='width:35%; display:inline-block' type='text' id='barang' value='$kode_barang' class='form-control input-sm' name='a'> 
                                                                              <label generated='true' class='error' id='message'></label></td></tr>
                    <tr><th scope='row'>Nama Barang</th>    <td><input type='text' class='form-control input-sm' name='b' required></td></tr>
                    <tr><th scope='row'>Merek/Brand</th>    <td><input type='text' class='form-control input-sm' name='c' ></td></tr>
                    <tr><th scope='row'>Model/Type</th>    <td><input type='text' class='form-control input-sm' name='d' ></td></tr>
                    <tr><th scope='row'>Berat Bruto</th>    <td><input type='text' class='form-control input-sm' name='e' ></td></tr>
                    <tr><th scope='row'>Ukuran/Volume</th>    <td><input type='text' class='form-control input-sm' name='f'></td></tr>
                    <tr><th scope='row'>Warna</th>    <td><input type='text' class='form-control input-sm' name='g'></td></tr>
                    <tr><th scope='row'>Kategori</th>    <td><select class='form-control input-sm' name='h' id='kategori' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($kategori as $r) {
                                                                echo "<option value='$r[id_kategori]'>$r[nama_kategori]</option>";
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Subkategori</th>    <td><select class='form-control input-sm' name='i' id='subkategori'>
                                                                  <option value=''>- Pilih -</option>
                                                                </select></td></tr>

                    <tr><th scope='row'>Nomor Rak</th>    <td><select class='form-control input-sm' name='j'>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($rak  as $r) {
                                                                echo "<option value='$r[id_rak]'>$r[nama_rak]</option>";
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Harga Beli</th>    <td><input type='text' id='harga_beli' class='form-control input-sm hargabeli' name='k'></td></tr>
                    <tr><th scope='row'>Jumlah Minimal</th>    <td><input type='text' class='form-control input-sm' name='l'></td></tr>
                    <tr><th scope='row'>Jumlah Maksimal</th>    <td><input type='text' class='form-control input-sm' name='m'></td></tr>
                    <tr><th scope='row'>Keterangan</th>    <td><textarea class='form-control input-sm' name='n' style='height:40px'></textarea></td></tr>
                    <tr><th scope='row'>Barang Jual</th>    <td><input type='radio' name='p' value='ya' checked> Ya <input type='radio' name='p' value='tidak'> Tidak</td></tr>
                    <tr class='$conf[sertakan_gambar]'><th scope='row'>Gambar</th>    <td><input type='file' class='form-control input-sm' name='o'></td></tr>
                    <tr class='$ppn[terapkan_pajak]'><th scope='row'>Pajak (PPN)</th>    <td><input type='number' class='form-control input-sm' name='ppn' style='display:inline-block; width:50%' value='10'> %</td></tr>

                    <tr><th scope='row'>Jumlah Stok</th>    <td><input type='text' class='form-control input-sm' name='q' value='0'  style='display:inline-block; width:50px; text-align:center; color:red' readonly=on> 
                            <select style='padding:2px; display:inline-block; width:120px;' class='form-control input-sm' onchange=\"Satuanid(this)\" name='r'>";
                                foreach ($satuan  as $r) {
                                  if ($conf['kode_satuan']==$r['kode_satuan']){
                                    echo "<option value='$r[kode_satuan]' selected>$r[keterangan] ($r[kode_satuan])</option>";
                                  }else{
                                    echo "<option value='$r[kode_satuan]'>$r[keterangan] ($r[kode_satuan])</option>";
                                  }
                                }
                            echo "</select></td></tr>

                    <tr class='$conf[konversi_satuan_beli]'><th scope='row'>Konversi Satuan</th>    <td>Satuan Beli : 
                            <select style='padding:2px; display:inline-block; width:120px;' class='form-control input-sm' onchange=\"Satuanid1(this)\" name='s'>";
                                foreach ($satuan  as $r) {
                                    if ($conf['kode_satuan']==$r['kode_satuan']){
                                      echo "<option value='$r[kode_satuan]' selected>$r[keterangan] ($r[kode_satuan])</option>";
                                    }else{
                                      echo "<option value='$r[kode_satuan]'>$r[keterangan] ($r[kode_satuan])</option>";
                                    }
                                }
                            echo "</select></td></tr>
                    <tr class='$conf[konversi_satuan_beli]'><th scope='row'></th>    <td>Satuan Jual : <span id='sat1'>$conf[kode_satuan]</span></td></tr>
                    <tr class='$conf[konversi_satuan_beli]'><th scope='row'></th>    <td>
                            <table class='table table-striped anu  table-condensed'>
                              <thead>
                                <tr bgcolor='#e3e3e3'>
                                  <th>Konversi</th>
                                  <th>Beli</th>
                                  <th>Jual</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Satuan</td>
                                  <td>1 <span id='sat2'>$conf[kode_satuan]</span></td>
                                  <td>= <input type='text' class='form-control input-sm' name='a1' style='width:100px; display:inline-block;'> <span id='sat3'>$conf[kode_satuan]</span></td>
                                </tr>
                                <tr>
                                  <td>Harga</td>
                                  <td>1 <span id='sat4'>$conf[kode_satuan]</span> <input type='text' class='form-control input-sm' name='a1' style='width:100px; display:inline-block;'></td>
                                  <td>= /<span id='sat5'>$conf[kode_satuan]</span></td>
                                </tr>
                              </tbody>
                            </table>
                    </td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-7'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>";
                    $no = 0;
                    foreach ($kategori_pelanggan as $r) {
                      $id = $r['id_kategori_pelanggan'];
                      $permanen = $r['permanen'];
                      if ($r['permanen']=='y'){
                        $visible = 'visible';
                      }else{
                        $visible = $conf['harga_kategori_pelanggan'];
                      }
                      echo "<tr class='$visible'><th scope='row'>$r[nama_kategori_pelanggan]</th>    <td>
                                  <table class='table table-striped anu table-condensed'>
                                    <thead>
                                      <tr bgcolor='#e3e3e3'>
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
                                      if ($i == 0){ $title = 'Ritel'; $hgrosir = 'visible'; }else{ $title = 'Grosir '.$i; $hgrosir = $conf['harga_grosir']; } ?>

                                        <script type="text/javascript">
                                          $(document).ready(function(){
                                            $('#harga_jual<?php echo "$id$i"; ?>').maskMoney({prefix:'', thousands:',', precision:0});
                                          });

                                          $(document).ready(function(){
                                            $(".input<?php echo "$id$i"; ?>").keyup(function(){
                                                var val1a = $(".harga<?php echo "$id$i"; ?>").val();
                                                var val2a = $(".hargabeli").val();
                                                var val1 = +val1a.replace(/,/g, "");
                                                var val2 = +val2a.replace(/,/g, "");
                                                if (val2!=''){ $("#persen_untung<?php echo "$id$i"; ?>").val(Math.round((val1-val2)/val2*100)); }
                                            });
                                          });

                                          $(document).ready(function(){
                                            $("#persen_untung<?php echo "$id$i"; ?>").keyup(function(){
                                                var vale1a = $(".harga<?php echo "$id$i"; ?>").val();
                                                var vale2a = $(".hargabeli").val();
                                                var vale3a = $("#persen_untung<?php echo "$id$i"; ?>").val();

                                                var vale1 = +vale1a.replace(/,/g, "");
                                                var vale2 = +vale2a.replace(/,/g, "");
                                                var vale3 = +vale3a.replace(/,/g, "");
                                                if (vale2!=''){ $(".input<?php echo "$id$i"; ?>").val(Math.round((vale3/100*vale2)+vale2)); }
                                            });
                                          });

                                          function SatuanAll<?php echo "$i"; ?>(data) {
                                            <?php foreach ($kategori_pel as $rt) { ?>
                                              document.getElementById("<?php echo "$rt[id_kategori_pelanggan]$i"; ?>").value = data.value;
                                            <?php } ?>
                                          }
                                        </script> <?php

                                      echo "<tr class='$hgrosir'>
                                              <th scope='row'>$title</th>
                                              <td><input type='text' id='harga_jual$id$i' class='form-control input-sm input$id$i harga$id$i' name='aa[$id][$i]' style='width:80px; padding-left:5px'></td>
                                              <td><input type='text' id='persen_untung$id$i' class='form-control input-sm' name='bb[$id][$i]' style='width:50px; text-align:center'></td>
                                              <td><input type='text' name='cc[$id][$i]' class='form-control input-sm' style='width:80px; text-align:center'></td>";
                                              if ($i == 0){ 
                                                echo "<td align=center><input type='text' class='form-control input-sm' name='dd[$id][$i]' value='1' style='width:50px; text-align:center; border:0px solid #fff' readonly=on></td>
                                                      <td><input type='text' class='form-control input-sm' id='sat".($id+5)."' name='ee[$id][$i]' value='$conf[kode_satuan]' style='width:50px; text-align:center; border:0px solid #fff' readonly=on></td>";
                                              }else{
                                                if ($permanen=='y'){
                                                    echo "<td align=center><input type='number' class='form-control input-sm' name='dd[$id][$i]' style='width:50px; text-align:center'></td>
                                                      <td><select style='padding:2px' class='form-control input-sm' onchange=\"SatuanAll$i(this)\" name='ee[$id][$i]'>
                                                              <option value='' selected></option>";
                                                              foreach ($satuan  as $r) {
                                                                  echo "<option value='$r[kode_satuan]'>$r[kode_satuan]</option>";
                                                              }
                                                      echo "</select></td>";
                                                }else{
                                                    echo "<td align=center><input type='number' class='form-control input-sm' name='dd[$id][$i]' style='width:50px; text-align:center'></td>
                                                          <td align=center><input type='text' class='form-control input-sm' name='ee[$id][$i]' id='$id$i' style='width:50px; text-align:center; border:0px solid #fff' readonly=on></td>";
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
                </div>

              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></form>";
