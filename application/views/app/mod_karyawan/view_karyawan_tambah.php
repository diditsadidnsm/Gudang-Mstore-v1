<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambahkan Data</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('app/tambah_karyawan',$attributes); 
          echo "<div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='150px' scope='row'>Username</th>    <td><input type='text' class='form-control' name='a' required></td></tr>
                    <tr><th scope='row'>Password</th>    <td><input type='password' class='form-control' name='b' required></td></tr>
                    <tr><th scope='row'>NIK</th>    <td><input type='text' class='form-control' name='c' required></td></tr>
                    <tr><th scope='row'>Nama Karyawan</th>    <td><input type='text' class='form-control' name='d' required></td></tr>
                    <tr><th scope='row'>Jenis Kelamin</th>    <td><select class='form-control' name='e' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($jenis_kelamin as $r) {
                                                                echo "<option value='$r[id_jenis_kelamin]'>$r[nama_jenis_kelamin]</option>";
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Tempat Lahir</th>    <td><input type='text' class='form-control' name='f'></td></tr>
                    <tr><th scope='row'>Tanggal Lahir</th>    <td><input type='text' class='form-control' name='g'></td></tr>
                    <tr><th scope='row'>Agama</th>    <td><select class='form-control' name='h' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($agama as $r) {
                                                                echo "<option value='$r[id_agama]'>$r[nama_agama]</option>";
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Status Pernikahan</th>    <td><select class='form-control' name='i' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($status_pernikahan  as $r) {
                                                                echo "<option value='$r[id_status_pernikahan]'>$r[nama_status_pernikahan]</option>";
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Alamat 1</th>    <td><input type='text' class='form-control' name='j'></td></tr>
                    <tr><th scope='row'>Alamat 2</th>    <td><input type='text' class='form-control' name='k'></td></tr>
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
                                                                <option value=''>- Pilih -</option>
                                                              </select></td></tr>
                    <tr><th scope='row'>Kota</th>         <td><select class='form-control' name='l' id='city' required>
                                                                <option value=''>- Pilih -</option>
                                                              </select></td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='150px' scope='row'>Telepon</th>    <td><input type='number' class='form-control' name='o'></td></tr>
                    <tr><th scope='row'>Hp</th>    <td><input type='number' class='form-control' name='p'></td></tr>
                    <tr><th scope='row'>Email</th>    <td><input type='email' class='form-control' name='q'></td></tr>
                    <tr><th scope='row'>Website</th>    <td><input type='url' class='form-control' name='r'></td></tr>
                    <tr><th scope='row'>Kode Pos</th>    <td><input type='number' class='form-control' name='s'></td></tr>
                    <tr><th scope='row'>Fax</th>    <td><input type='number' class='form-control' name='t'></td></tr>
                    <tr><th scope='row'>Chat</th>    <td><input type='text' class='form-control' name='u'></td></tr>
                    <tr><th scope='row'>Keterangan</th>    <td><textarea class='form-control' name='v'></textarea></td></tr>
                    <tr><th scope='row'>Jabatan</th>    <td><select class='form-control' name='x' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($jabatan  as $r) {
                                                                echo "<option value='$r[id_jabatan]'>$r[nama_jabatan]</option>";
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Departemen</th>    <td><select class='form-control' name='y' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($departemen  as $r) {
                                                                echo "<option value='$r[id_departemen]'>$r[nama_departemen]</option>";
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Tgl. Masuk</th>    <td><input type='text' class='form-control' name='z'></td></tr>
                    <tr><th scope='row'>Status Karyawan</th>    <td><select class='form-control' name='aa' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($status_karyawan  as $r) {
                                                                echo "<option value='$r[id_status_karyawan]'>$r[nama_status_karyawan]</option>";
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Aktif</th>    <td><input type='radio' name='bb' value='ya' checked> Ya <input type='radio' name='bb' value='tidak'> Tidak </td></tr>                       
                    <tr><th scope='row'>Foto</th>    <td><input type='file' class='form-control' name='w'></td></tr>
                  </tbody>
                  </table>
                </div>

              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></form>";
