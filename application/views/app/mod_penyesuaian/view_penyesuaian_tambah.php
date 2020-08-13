<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambahkan Data</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form','name'=>'students');
              echo form_open_multipart('app/tambah_penyesuaian',$attributes); 
              if ($this->session->id_penyesuaian != ''){
                $id_sebab_alasan = $row['id_sebab_alasan'];
                $tanggal = tgl_slash($row['tanggal_penyesuaian']);
                $keterangan = $row['keterangan'];
              }else{
                $id_sebab_alasan = '';
                $tanggal = '';
                $keterangan = '';
              }
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='150px' scope='row'>Tanggal</th>    <td><input type='text' id='datepicker' class='form-control' name='a' value='".$tanggal."' style='width:30%' required></td></tr>
                    <tr><th width='150px' scope='row'>Sebab Alasan</th>    <td><select name='b' class='form-control' required>
                                                                <option value=''>- Pilih -</option>";
                                                                foreach ($sebab_alasan as $rows){
                                                                  if ($id_sebab_alasan==$rows['id_sebab_alasan']){
                                                                    echo "<option value='$rows[id_sebab_alasan]' selected>$rows[nama_sebab_alasan] ($rows[keterangan])</option>";
                                                                  }else{
                                                                    echo "<option value='$rows[id_sebab_alasan]'>$rows[nama_sebab_alasan] ($rows[keterangan])</option>";
                                                                  }
                                                                }
                                                             echo "</select></td></tr>
                    <tr><th width='150px' scope='row'>Keterangan</th>    <td><textarea class='form-control' name='c' required>$keterangan</textarea></td></tr>
                  </tbody>
                  </table>
                
                  <table class='table table-bordered table-striped'>
                      <thead>
                        <tr bgcolor='#e3e3e3'>
                          <th colspan='5'></th>
                          <th colspan='2'><center>Perubahan</center></th>
                          <th colspan='2'></th>
                        </tr>
                        <tr bgcolor='#e3e3e3'>
                          <th width='20px'>No</th>
                          <th>Nama Barang</th>
                          <th width='80px'>Stok</th>
                          <th width='80px'>Satuan</th>
                          <th width='100px'><center>(+)</center></th>
                          <th width='100px'><center>(-)</center></th>
                          <th>Keterangan</th>
                          <th style='width:50px'>Action</th>
                        </tr>

                        <tr>
                          <td></td>
                          <td><select name='d' class='combobox form-control' onchange=\"changeValue(this.value)\" required autofocus>
                                                                <option value=''> Cari Barang </option>";
                                                                $jsArray = "var prdName = new Array();\n";    
                                                                foreach ($barang as $rows){
                                                                    $stok = $this->model_app->stok($rows['id_barang'])->row_array();
                                                                    echo "<option value='$rows[id_barang]'>$rows[kode_barang] - $rows[nama_barang]</option>";
                                                                    $jsArray .= "prdName['" . $rows['id_barang'] . "'] = {name:'" . addslashes($stok['stok']) . "',desc:'".addslashes($rows['kode_satuan'])."'};\n";
                                                                }
                                                             echo "</select></td>
                          <td><input class='form-control' type='text' name='e' id='stok' readonly='on'></td>
                          <td><input class='form-control' type='text' name='f' id='satuan' readonly='on'> </td>
                          <td><input class='form-control' type='number' name='g'/> </td>
                          <td><input class='form-control' type='number' name='h'/> </td>
                          <td><input class='form-control' type='text' name='i'/> </td>
                          <td><button type='submit' name='submit' class='btn btn-success'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span></button></td>
                        </tr>";

                        $no = 1;
                        $penyesuaian_detail = $this->db->query("SELECT * FROM mu_penyesuaian_detail a JOIN mu_barang b ON a.id_barang=b.id_barang where a.id_penyesuaian='".$this->session->id_penyesuaian."' ORDER BY a.id_penyesuaian_detail DESC");
                        foreach ($penyesuaian_detail->result_array() as $r){
                          echo "<tr>
                                <td>$no</td>
                                <td>$r[nama_barang]</td>
                                <td>$r[stok_history]</td>
                                <td>$r[kode_satuan]</td>
                                <td>$r[tambah]</td>
                                <td>$r[kurang]</td>
                                <td>$r[keterangan]</td>
                                <td align=center><a href='".base_url()."app/delete_penyesuaian_detail2/$r[id_penyesuaian_detail]/$r[tambah]/$r[kurang]/$r[id_barang]' class='text-danger'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>
                              </tr>";
                          $no++;
                        }
                      echo "</thead>
                      <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <a href='".base_url()."app/penyesuaian'><button type='button' class='btn btn-info'>Proses dan Selesai</button></a>
                  </div>
            </div></form>";
?>
<script type="text/javascript">    
<?php echo $jsArray; ?>  
  function changeValue(id){  
    document.getElementById('stok').value = prdName[id].name;  
    document.getElementById('satuan').value = prdName[id].desc;  
  };  
</script> 
