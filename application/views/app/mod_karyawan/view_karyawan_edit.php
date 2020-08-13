<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('app/edit_karyawan',$attributes); 
          echo "<div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$row[id_karyawan]'>
                    <tr><th width='150px' scope='row'>Username</th>    <td><input type='text' class='form-control' name='a' value='$row[username]' required></td></tr>
                    <tr><th scope='row'>Password</th>    <td><input type='password' class='form-control' name='b'></td></tr>
                    <tr><th scope='row'>NIK</th>    <td><input type='text' class='form-control' name='c' value='$row[nik]' required></td></tr>
                    <tr><th scope='row'>Nama Karyawan</th>    <td><input type='text' class='form-control' name='d' value='$row[nama_karyawan]' required></td></tr>
                    <tr><th scope='row'>Jenis Kelamin</th>    <td><select class='form-control' name='e' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($jenis_kelamin as $r) {
                                                              if ($row['id_jenis_kelamin']==$r['id_jenis_kelamin']){
                                                                echo "<option value='$r[id_jenis_kelamin]' selected>$r[nama_jenis_kelamin]</option>";
                                                              }else{
                                                                echo "<option value='$r[id_jenis_kelamin]'>$r[nama_jenis_kelamin]</option>";
                                                              }
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Tempat Lahir</th>    <td><input type='text' class='form-control' name='f' value='$row[tempat_lahir]'></td></tr>
                    <tr><th scope='row'>Tanggal Lahir</th>    <td><input type='text' class='form-control' name='g' value='$row[tanggal_lahir]'></td></tr>
                    <tr><th scope='row'>Agama</th>    <td><select class='form-control' name='h' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($agama as $r) {
                                                              if ($row['id_agama']==$r['id_agama']){
                                                                echo "<option value='$r[id_agama]' selected>$r[nama_agama]</option>";
                                                              }else{
                                                                echo "<option value='$r[id_agama]'>$r[nama_agama]</option>";
                                                              }
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Status Pernikahan</th>    <td><select class='form-control' name='i' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($status_pernikahan  as $r) {
                                                              if ($row['id_status_pernikahan']==$r['id_status_pernikahan']){
                                                                echo "<option value='$r[id_status_pernikahan]' selected>$r[nama_status_pernikahan]</option>";
                                                              }else{
                                                                echo "<option value='$r[id_status_pernikahan]'>$r[nama_status_pernikahan]</option>";
                                                              }
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Alamat 1</th>    <td><input type='text' class='form-control' name='j' value='$row[alamat_karyawan_1]'></td></tr>
                    <tr><th scope='row'>Alamat 2</th>    <td><input type='text' class='form-control' name='k' value='$row[alamat_karyawan_2]'></td></tr>
                    <tr><th scope='row'>Negara</th>    <td><select class='form-control' name='n' id='country' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($negara as $rows) {
                                                              if ($row['country_id']==$rows['country_id']){
                                                                echo "<option value='$rows[country_id]' selected>$rows[name]</option>";
                                                              }else{
                                                                echo "<option value='$rows[country_id]'>$rows[name]</option>";
                                                              }
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Propinsi</th>     <td><select class='form-control' name='m' id='state' required>
                                                                <option value=''>- Pilih -</option>";
                                                                foreach ($provinsi as $rows){
                                                                  if ($row['state_id']==$rows['state_id']){
                                                                    echo "<option value='$rows[state_id]' selected>$rows[name]</option>";
                                                                  }else{
                                                                    echo "<option value='$rows[state_id]'>$rows[name]</option>";
                                                                  }
                                                                }
                                                             echo "</select></td></tr>
                    <tr><th scope='row'>Kota</th>         <td><select class='form-control' name='l' id='city' required>
                                                                <option value=''>- Pilih -</option>";
                                                                foreach ($kota as $rows){
                                                                  if ($row['city_id']==$rows['city_id']){
                                                                    echo "<option value='$rows[city_id]' selected>$rows[name]</option>";
                                                                  }else{
                                                                    echo "<option value='$rows[city_id]'>$rows[name]</option>";
                                                                  }
                                                                }
                                                             echo "</select></td></tr>
                    <tr><th scope='row'>Telepon</th>    <td><input type='number' class='form-control' name='o' value='$row[telepon_karyawan]'></td></tr>
                    <tr><th scope='row'>Hp</th>    <td><input type='number' class='form-control' name='p' value='$row[hp_karyawan]'></td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    
                    <tr><th width='150px' scope='row'>Email</th>    <td><input type='email' class='form-control' name='q' value='$row[email_karyawan]'></td></tr>
                    <tr><th scope='row'>Website</th>    <td><input type='url' class='form-control' name='r' value='$row[website_karyawan]'></td></tr>
                    <tr><th scope='row'>Kode Pos</th>    <td><input type='number' class='form-control' name='s' value='$row[kode_pos_karyawan]'></td></tr>
                    <tr><th scope='row'>Fax</th>    <td><input type='number' class='form-control' name='t' value='$row[fax_karyawan]'></td></tr>
                    <tr><th scope='row'>Chat</th>    <td><input type='text' class='form-control' name='u' value='$row[chat_karyawan]'></td></tr>
                    <tr><th scope='row'>Keterangan</th>    <td><textarea class='form-control' name='v'>$row[keterangan]</textarea></td></tr>
                    <tr><th scope='row'>Jabatan</th>    <td><select class='form-control' name='x' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($jabatan  as $r) {
                                                              if ($row['id_jabatan']==$r['id_jabatan']){
                                                                echo "<option value='$r[id_jabatan]' selected>$r[nama_jabatan]</option>";
                                                              }else{
                                                                echo "<option value='$r[id_jabatan]'>$r[nama_jabatan]</option>";
                                                              }
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Departemen</th>    <td><select class='form-control' name='y' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($departemen  as $r) {
                                                              if ($row['id_departemen']==$r['id_departemen']){
                                                                echo "<option value='$r[id_departemen]' selected>$r[nama_departemen]</option>";
                                                              }else{
                                                                echo "<option value='$r[id_departemen]'>$r[nama_departemen]</option>";
                                                              }
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Tgl. Masuk</th>    <td><input type='text' class='form-control' name='z' value='$row[tanggal_masuk]'></td></tr>
                    <tr><th scope='row'>Status Karyawan</th>    <td><select class='form-control' name='aa' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($status_karyawan  as $r) {
                                                              if ($row['id_status_karyawan']==$r['id_status_karyawan']){
                                                                echo "<option value='$r[id_status_karyawan]' selected>$r[nama_status_karyawan]</option>";
                                                              }else{
                                                                echo "<option value='$r[id_status_karyawan]'>$r[nama_status_karyawan]</option>";
                                                              }
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Aktif</th>    <td>"; if ($row['aktif']=='ya'){ echo "<input type='radio' name='bb' value='ya' checked> Ya <input type='radio' name='bb' value='tidak'> Tidak"; }else{ echo "<input type='radio' name='bb' value='ya'> Ya <input type='radio' name='bb' value='tidak' checked> Tidak"; } echo "</td></tr>                       
                    <tr><th scope='row'>Ganti Foto</th>    <td><img class='img-thumbnail' width='100px' src='".base_url()."asset/images/$row[foto_karyawan]'><input type='file' class='form-control' name='w' value='$row[id_karyawan]'></td></tr>
                  </tbody>
                  </table>
                </div>

              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></form>";