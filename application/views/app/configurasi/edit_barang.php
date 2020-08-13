<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Konfigurasi data Barang</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('app/conf_barang',$attributes); 
          echo "<div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$row[id_conf_barang]'>
                    <tr><th width='250px' scope='row'>Kode Barang</th>    <td>"; if ($row['kode_barang']=='default'){ echo "<input type='radio' name='a' value='default' checked> Default <input type='radio' name='a' value='angka'> Angka"; 
                                                                                 }else{ echo "<input type='radio' name='a' value='default'> Default <input type='radio' name='a' value='angka' checked> Angka"; } echo "</td></tr>
                    
                    <tr><th scope='row'>Harga Grosir</th>    <td>"; if ($row['harga_grosir']=='visible'){ echo "<input type='radio' name='b' value='visible' checked> Ya <input type='radio' name='b' value='hidden'> Tidak"; 
                                                                    }else{ echo "<input type='radio' name='b' value='visible'> Ya <input type='radio' name='b' value='hidden' checked> Tidak"; } echo "</td></tr>
                    
                    <tr><th scope='row'>Grosir Berdasarkan</th>    <td>"; if ($row['grosir_berdasarkan']=='multi_satuan'){ echo "<input type='radio' name='c' value='multi_satuan' checked> Multi_satuan <input type='radio' name='c' value='jumlah_minimal'> Jumlah_minimal"; 
                                                                    }else{ echo "<input type='radio' name='c' value='multi_satuan'> Multi_satuan <input type='radio' name='c' value='jumlah_minimal' checked> Jumlah_minimal"; } echo "</td></tr>

                    <tr><th scope='row'>Terapkan Harga Kategori Pelanggan</th>    <td>"; if ($row['harga_kategori_pelanggan']=='visible'){ echo "<input type='radio' name='d' value='visible' checked> Ya <input type='radio' name='d' value='hidden'> Tidak"; 
                                                                    }else{ echo "<input type='radio' name='d' value='visible'> Ya <input type='radio' name='d' value='hidden' checked> Tidak"; } echo "</td></tr>
                  
                    <tr><th scope='row'>Standar Satuan</th>    <td><select style='padding:2px' name='e' required>";
                                                                  foreach ($satuan  as $r) {
                                                                    if ($row['kode_satuan']==$r['kode_satuan']){
                                                                      echo "<option value='$r[kode_satuan]' selected>$r[keterangan] ($r[kode_satuan])</option>";
                                                                    }else{
                                                                      echo "<option value='$r[kode_satuan]'>$r[keterangan] ($r[kode_satuan])</option>";
                                                                    }
                                                                  }
                                                              echo "</select>
                    </td></tr>
                    <tr><th scope='row'>Konversi Satuan</th>    <td>"; if ($row['konversi_satuan_beli']=='visible'){ echo "<input type='radio' name='f' value='visible' checked> Ya <input type='radio' name='f' value='hidden'> Tidak"; 
                                                                    }else{ echo "<input type='radio' name='f' value='visible'> Ya <input type='radio' name='f' value='hidden' checked> Tidak"; } echo "</td></tr>
                    
                    <tr><th scope='row'>Sertakan Gambar</th>    <td>"; if ($row['sertakan_gambar']=='visible'){ echo "<input type='radio' name='g' value='visible' checked> Ya <input type='radio' name='g' value='hidden'> Tidak"; 
                                                                    }else{ echo "<input type='radio' name='g' value='visible'> Ya <input type='radio' name='g' value='hidden' checked> Tidak"; } echo "</td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    
                  </div>
            </div></form>";