<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Beban Biaya</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('app/edit_bebanbiaya',$attributes); 
          echo "<table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$row[id_bebanbiaya_list]'>
                    <tr><th width='150px' scope='row'>Beban Biaya</th>    <td><select class='form-control' name='a' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($beban_biaya as $rows) {
                                                                echo "<option value='$rows[id_bebanbiaya_main]' style='color:#000; font-weight:bold' disabled>$rows[nama_bebanbiaya_main]</option>";
                                                                $beban_biaya_sub = $this->db->query("SELECT * FROM mu_bebanbiaya_sub where id_bebanbiaya_main='$rows[id_bebanbiaya_main]'");
                                                                foreach ($beban_biaya_sub->result_array() as $rows) {
                                                                  if ($row['id_bebanbiaya_sub']==$rows['id_bebanbiaya_sub']){
                                                                    echo "<option value='$rows[id_bebanbiaya_sub]' selected>$rows[nama_bebanbiaya_sub]</option>";
                                                                  }else{
                                                                    echo "<option value='$rows[id_bebanbiaya_sub]'>$rows[nama_bebanbiaya_sub]</option>";
                                                                  }
                                                                }
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Tanggal</th>    <td><input id='datepicker' type='text' class='form-control' name='b' value='".tgl_slash($row['tanggal'])."' required></td></tr>
                    <tr><th scope='row'>Jumlah Uang</th>    <td><input type='number' class='form-control' name='c' value='$row[jumlah_uang]' required></td></tr>
                    <tr><th scope='row'>Keterangan</th>    <td><textarea class='form-control' style='height:100px' name='d' required>$row[keterangan]</textarea></td></tr>
                  </tbody>
                </table>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></form>";