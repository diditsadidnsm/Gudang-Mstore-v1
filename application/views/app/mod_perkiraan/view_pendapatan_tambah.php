<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambahkan Pendapatan</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('app/tambah_pendapatan',$attributes); 
          echo "<table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='150px' scope='row'>Beban Biaya</th>    <td><select class='form-control' name='a' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($pendapatan as $rows) {
                                                                echo "<option value='$rows[id_pendapatan_main]' style='color:#000; font-weight:bold' disabled>$rows[nama_pendapatan_main]</option>";
                                                                $pendapatan_sub = $this->db->query("SELECT * FROM mu_pendapatan_sub where id_pendapatan_main='$rows[id_pendapatan_main]'");
                                                                foreach ($pendapatan_sub->result_array() as $rows) {
                                                                  echo "<option value='$rows[id_pendapatan_sub]'>$rows[nama_pendapatan_sub]</option>";
                                                                }
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Tanggal</th>    <td><input id='datepicker' type='text' class='form-control' name='b' required></td></tr>
                    <tr><th scope='row'>Jumlah Uang</th>    <td><input type='number' class='form-control' name='c' required></td></tr>
                    <tr><th scope='row'>Keterangan</th>    <td><textarea class='form-control' style='height:100px' name='d' required></textarea></td></tr>
                  </tbody>
                  </table>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></form>";
