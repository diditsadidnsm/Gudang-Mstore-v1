<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambahkan Data</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('app/tambah_agen_ekspedisi',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='150px' scope='row'>Nama Ekspedisi</th>    <td><input type='text' class='form-control' name='a' required></td></tr>
                    <tr><th scope='row'>Alamat</th>    <td><input type='text' class='form-control' name='b' required></td></tr>
                    <tr><th scope='row'>Negara</th>    <td><select class='form-control' name='h' id='country' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($negara as $rows) {
                                                              if ($row['country_id']==$rows['country_id']){
                                                                echo "<option value='$rows[country_id]' selected>$rows[name]</option>";
                                                              }else{
                                                                echo "<option value='$rows[country_id]'>$rows[name]</option>";
                                                              }
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Propinsi</th>     <td><select class='form-control' name='i' id='state' required>
                                                                <option value=''>- Pilih -</option>
                                                              </select></td></tr>
                    <tr><th scope='row'>Kota</th>         <td><select class='form-control' name='c' id='city' required>
                                                                <option value=''>- Pilih -</option>
                                                              </select></td></tr>
                    <tr><th scope='row'>Telepon</th>    <td><input type='number' class='form-control' name='d'></td></tr>
                    <tr><th scope='row'>Email</th>    <td><input type='email' class='form-control' name='e'></td></tr>
                    <tr><th scope='row'>Fax</th>    <td><input type='text' class='form-control' name='f'></td></tr>
                    <tr><th scope='row'>Chat</th>    <td><input type='text' class='form-control' name='g'></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></form>";
