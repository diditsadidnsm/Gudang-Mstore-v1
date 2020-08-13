<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambahkan Data</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('app/tambah_provinsi',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='150px' scope='row'>Nama Negara</th>    <td><select class='form-control' name='a' required>
                                                                                  <option value=''>- Pilih -</option>";
                                                                                  foreach ($record as $rows) {
                                                                                    echo "<option value='$rows[country_id]'>$rows[name]</option>";
                                                                                  }
                                                                                echo "</select></td></tr>
                    <tr><th scope='row'>Nama Provinsi</th>    <td><input type='text' class='form-control' name='b' required></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></form>";
