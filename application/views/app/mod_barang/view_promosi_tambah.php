<script>
  function katshow(){
    var option = document.getElementById("kategori-select").value;
    if(option == "barang"){
       document.getElementById("barang").className="visible";
       document.getElementById("kategori").className="hidden";
       document.getElementById("subkategori").className="hidden";
       document.getElementById("jml-barang").className="visible";
    }
    if(option == "kategori"){
       document.getElementById("barang").className="hidden";
       document.getElementById("kategori").className="visible";
       document.getElementById("subkategori").className="hidden";
       document.getElementById("jml-barang").className="hidden";
    }
    if(option == "subkategori"){
       document.getElementById("barang").className="hidden";
       document.getElementById("kategori").className="hidden";
       document.getElementById("subkategori").className="visible";
       document.getElementById("jml-barang").className="hidden";
    }
  }

  function show1(){
    var option = document.getElementById("gratis").value;
    if(option == "ya"){
       document.getElementById("barang-gratis").className="hidden";
    }
    if(option == "tidak"){
       document.getElementById("barang-gratis").className="visible";
    }
  }
</script>
<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambahkan Data</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('app/tambah_promosi',$attributes); 
          echo "<div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='150px' scope='row'>Tgl. Mulai</th>    <td><input type='text' id='datepicker' class='form-control' name='a' required></td></tr>
                    <tr><th scope='row'>Tgl. Selesai</th>    <td><input type='text' id='datepickerr' class='form-control' name='b' required></td></tr>
                    <tr><th scope='row'>Terapkan Pada</th>    <td><select name='c' id='kategori-select' onchange=\"katshow()\" class='form-control'>";
                                                                foreach ($promosi_terapkan as $rows){
                                                                    echo "<option value='$rows[kode_terapkan]'>$rows[keterangan]</option>";
                                                                }
                                                             echo "</select></td></tr>

                    <tr id='barang'><th scope='row'>Nama Barang</th>    <td><select name='d' class='combobox form-control'>
                                                                <option value=''> Cari Barang </option>";
                                                                foreach ($barang as $rows){
                                                                    echo "<option value='$rows[id_barang]'>$rows[nama_barang]</option>";
                                                                }
                                                             echo "</select></td></tr>

                    <tr id='kategori' class='hidden'><th scope='row'>Nama Kategori</th>    <td><select name='e' class='combobox form-control'>
                                                                <option value=''> Cari Kategori </option>";
                                                                foreach ($kategori as $rows){
                                                                    echo "<option value='$rows[id_kategori]'>$rows[nama_kategori]</option>";
                                                                }
                                                             echo "</select></td></tr>

                    <tr id='subkategori' class='hidden'><th scope='row'>Nama Subkategori</th>    <td><select name='f' class='combobox form-control'>
                                                                <option value=''> Cari Subkategori </option>";
                                                                foreach ($subkategori as $rows){
                                                                    echo "<option value='$rows[id_subkategori]'>$rows[nama_subkategori]</option>";
                                                                }
                                                             echo "</select></td></tr>

                    <tr id='jml-barang'><th scope='row'>Jumlah Barang</th>    <td>Beli <input type='text' class='form-control' name='g' style='display:inline-block; width:50px'>,
                                                                  Gratis <input type='text' class='form-control' name='h' style='display:inline-block; width:50px'>
                                                                  Barang Yang Sama
                                                                  <select class='form-control' name='i' id='gratis' onchange=\"show1()\" style='display:inline-block; width:100px'>
                                                                    <option value='ya'>Ya</option>
                                                                    <option value='tidak'>Tidak</option>
                                                                  </select>
                    </td></tr>
                    <tr id='barang-gratis' class='hidden'><th scope='row'>Nama Barang Gratis</th>    <td><select name='j' class='combobox form-control'>
                                                                <option value=''> Cari Barang </option>";
                                                                foreach ($barang as $rows){
                                                                    echo "<option value='$rows[id_barang]'>$rows[nama_barang]</option>";
                                                                }
                                                             echo "</select></td></tr>

                    <tr><th scope='row'>Tipe Diskon</th>    <td><select name='k' class='form-control'>
                                                                    <option value='persen'>Persen (%)</option>
                                                                    <option value='uang'>Nominal (uang)</option>
                                                                  </select></td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>";
                    $no = 1;
                    foreach ($kategori_pelanggan as $r) {
                      if ($no == 1){ $posisi = 'bottom'; }else{ $posisi = 'middle'; }
                      $id = $r['id_kategori_pelanggan'];
                      echo "<tr><th style='vertical-align:$posisi' scope='row'>$r[nama_kategori_pelanggan]</th>    <td>
                                  <table style='padding:0px; margin:0px -10px -10px -10px' class='table table-striped anu'>";
                                  if ($no == 1){
                                    echo "<thead>
                                      <tr bgcolor='#e3e3e3'>
                                        <th>Ritel</th>
                                        <th>Grosir 1</th>
                                        <th>Grosir 2</th>
                                        <th>Grosir 3</th>
                                      </tr>
                                    </thead>";
                                  }
                                    echo "<tbody>
                                    <input type='hidden' value='$r[id_kategori_pelanggan]' name='kat$no'>";
                                      echo "<tr>
                                              <td><input type='text' name='l[$id][$no]' style='width:80px; text-align:center'></td>
                                              <td><input type='text' name='m[$id][$no]' style='width:80px; text-align:center'></td>
                                              <td><input type='text' name='n[$id][$no]' style='width:80px; text-align:center'></td>
                                              <td><input type='text' name='o[$id][$no]' style='width:80px; text-align:center'></td>
                                              </tr>";
                                    echo "</tbody>
                                  </table>
                      </td></tr>";
                      $no++;
                      }                                             
                    echo "<tr><th scope='row'>Keterangan</th>    <td><textarea class='form-control' name='p'></textarea></td></tr>
                  </tbody>
                  </table>
                </div>

              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                  </div>
            </div></form>";
