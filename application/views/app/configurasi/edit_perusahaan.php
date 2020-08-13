<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Configurasi data Perusahaan</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('app/conf_perusahaan',$attributes); 
          echo "<div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$row[id_perusahaan]'>
                    <tr><th width='150px' scope='row'>Nama Perusahaan</th>    <td><input type='text' class='form-control' name='a' value='$row[nama_perusahaan]' required></td></tr>
                    <tr><th scope='row'>NPWP Perusahaan</th>    <td><input type='text' class='form-control' name='b' value='$row[npwp_perusahaan]' required></td></tr>
                    <tr><th scope='row'>Alamat Perusahaan</th>    <td><input type='text' class='form-control' name='c' value='$row[alamat_perusahaan]' required></td></tr>
                    <tr><th scope='row'>Negara</th>    <td><select class='form-control' name='f' id='country' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($negara as $rows) {
                                                              if ($row['country_id']==$rows['country_id']){
                                                                echo "<option value='$rows[country_id]' selected>$rows[name]</option>";
                                                              }else{
                                                                echo "<option value='$rows[country_id]'>$rows[name]</option>";
                                                              }
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Propinsi</th>     <td><select class='form-control' name='e' id='state' required>
                                                                <option value=''>- Pilih -</option>";
                                                                foreach ($provinsi as $rows){
                                                                  if ($row['state_id']==$rows['state_id']){
                                                                    echo "<option value='$rows[state_id]' selected>$rows[name]</option>";
                                                                  }else{
                                                                    echo "<option value='$rows[state_id]'>$rows[name]</option>";
                                                                  }
                                                                }
                                                             echo "</select></td></tr>
                    <tr><th scope='row'>Kota</th>         <td><select class='form-control' name='d' id='city' required>
                                                                <option value=''>- Pilih -</option>";
                                                                foreach ($kota as $rows){
                                                                  if ($row['city_id']==$rows['city_id']){
                                                                    echo "<option value='$rows[city_id]' selected>$rows[name]</option>";
                                                                  }else{
                                                                    echo "<option value='$rows[city_id]'>$rows[name]</option>";
                                                                  }
                                                                }
                                                             echo "</select></td></tr>
                    <tr><th scope='row'>Telepon</th>    <td><input type='text' class='form-control' name='g' value='$row[telepon]' required></td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='150px' scope='row'>Email</th>    <td><input type='text' class='form-control' name='h' value='$row[email]' required></td></tr>
                    <tr><th scope='row'>Fax</th>    <td><input type='text' class='form-control' name='i' value='$row[fax]' required></td></tr>
                    <tr><th scope='row'>Website</th>    <td><input type='text' class='form-control' name='j' value='$row[website]' required></td></tr>
                    <tr><th scope='row'>Kode Pos</th>    <td><input type='text' class='form-control' name='k' value='$row[kode_pos]' required></td></tr>
                    <tr><th scope='row'>Logo Perusahaan</th>    <td><img class='img-thumbnail' width='100px' src='".base_url()."asset/images/$row[logo]'>
                        <input type='file' class='form-control' name='l'></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    
                  </div>
            </div></form>";