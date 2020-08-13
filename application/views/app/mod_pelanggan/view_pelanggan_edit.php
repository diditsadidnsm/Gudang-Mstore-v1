<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('app/edit_pelanggan',$attributes); 
          echo "<div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$row[id_pelanggan]'>
                    <tr><th width='150px' scope='row'>Kategori Pelanggan</th>    <td><select class='form-control' name='a' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($kategori_pelanggan as $r) {
                                                              if ($r['id_kategori_pelanggan']==$row['id_kategori_pelanggan']){
                                                                echo "<option value='$r[id_kategori_pelanggan]' selected>$r[nama_kategori_pelanggan]</option>";
                                                              }else{
                                                                echo "<option value='$r[id_kategori_pelanggan]'>$r[nama_kategori_pelanggan]</option>";
                                                              }
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Type Pelanggan</th>    <td><select class='form-control' name='b' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($type_pelanggan as $r) {
                                                              if ($r['id_type_pelanggan']==$row['id_type_pelanggan']){
                                                                echo "<option value='$r[id_type_pelanggan]' selected>$r[type_pelanggan]</option>";
                                                              }else{
                                                                echo "<option value='$r[id_type_pelanggan]'>$r[type_pelanggan]</option>";
                                                              }
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Nama Pelanggan</th>    <td><input type='text' class='form-control' name='c' value='$row[nama_pelanggan]' required></td></tr>
                    <tr><th scope='row'>Kontak Person</th>    <td><input type='text' class='form-control' name='d' value='$row[kontak_pelanggan]'></td></tr>
                    <tr><th scope='row'>Alamat 1</th>    <td><input type='text' class='form-control' name='e' value='$row[alamat_pelanggan_1]'></td></tr>
                    <tr><th scope='row'>Alamat 2</th>    <td><input type='text' class='form-control' name='f' value='$row[alamat_pelanggan_2]'></td></tr>
                    <tr><th scope='row'>Negara</th>    <td><select class='form-control' name='i' id='country' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($negara as $rows) {
                                                              if ($row['country_id']==$rows['country_id']){
                                                                echo "<option value='$rows[country_id]' selected>$rows[name]</option>";
                                                              }else{
                                                                echo "<option value='$rows[country_id]'>$rows[name]</option>";
                                                              }
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Propinsi</th>     <td><select class='form-control' name='h' id='state' required>
                                                                <option value=''>- Pilih -</option>";
                                                                foreach ($provinsi as $rows){
                                                                  if ($row['state_id']==$rows['state_id']){
                                                                    echo "<option value='$rows[state_id]' selected>$rows[name]</option>";
                                                                  }else{
                                                                    echo "<option value='$rows[state_id]'>$rows[name]</option>";
                                                                  }
                                                                }
                                                             echo "</select></td></tr>
                    <tr><th scope='row'>Kota</th>         <td><select class='form-control' name='g' id='city' required>
                                                                <option value=''>- Pilih -</option>";
                                                                foreach ($kota as $rows){
                                                                  if ($row['city_id']==$rows['city_id']){
                                                                    echo "<option value='$rows[city_id]' selected>$rows[name]</option>";
                                                                  }else{
                                                                    echo "<option value='$rows[city_id]'>$rows[name]</option>";
                                                                  }
                                                                }
                                                             echo "</select></td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='150px' scope='row'>Telepon</th>    <td><input type='number' class='form-control' name='j' value='$row[telpon_pelanggan]'></td></tr>
                    <tr><th scope='row'>Hp</th>    <td><input type='number' class='form-control' name='k' value='$row[hp_pelanggan]'></td></tr>
                    <tr><th scope='row'>Email</th>    <td><input type='email' class='form-control' name='l' value='$row[email_pelanggan]'></td></tr>
                    <tr><th scope='row'>Website</th>    <td><input type='url' class='form-control' name='m' value='$row[website_pelanggan]'></td></tr>
                    <tr><th scope='row'>Kode Pos</th>    <td><input type='number' class='form-control' name='n' value='$row[kode_pos_pelanggan]'></td></tr>
                    <tr><th scope='row'>Fax</th>    <td><input type='number' class='form-control' name='o' value='$row[fax_pelanggan]'></td></tr>
                    <tr><th scope='row'>Chat</th>    <td><input type='text' class='form-control' name='p' value='$row[chat_pelanggan]'></td></tr>
                    <tr><th scope='row'>Keterangan</th>    <td><textarea class='form-control' name='q'>$row[keterangan]</textarea></td></tr>

                  </tbody>
                  </table>
                </div>

              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></form>";