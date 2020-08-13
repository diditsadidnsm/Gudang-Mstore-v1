<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Konfigurasi data Penjualan $row[posisi_totalbayar_besar]</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('app/conf_penjualan',$attributes); 
              $posisi = array('atas','bawah');

          echo "<div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$row[id_conf_penjualan]'>
                    <tr><th width='290px' scope='row'>Terapkan Pajak</th><td>"; if ($row['terapkan_pajak']=='visible'){ echo "<input type='radio' name='a' value='visible' checked> Ya <input type='radio' name='a' value='hidden'> Tidak"; 
                                                                    }else{ echo "<input type='radio' name='a' value='visible'> Ya <input type='radio' name='a' value='hidden' checked> Tidak"; } echo "</td></tr>
                    
                    <tr><th scope='row'>Tampilkan Font 'Total Bayar' Lebih Besar</th>    <td>"; if ($row['font_totalbayar_besar']=='visible'){ echo "<input type='radio' name='b' value='visible' checked> Ya <input type='radio' name='b' value='hidden'> Tidak"; 
                                                                    }else{ echo "<input type='radio' name='b' value='visible'> Ya <input type='radio' name='b' value='hidden' checked> Tidak"; } echo "</td></tr>
                    
                        <tr><th scope='row'></th>    <td>Posisi : <select name='c'>";
                                                                      for ($i = 0; $i<=1; $i++){
                                                                        if ($posisi[$i]==$row['posisi_totalbayar_besar']){
                                                                          echo "<option value='".$posisi[$i]."' selected>".$posisi[$i]."</option>";
                                                                        }else{
                                                                          echo "<option value='".$posisi[$i]."'>".$posisi[$i]."</option>";
                                                                        }
                                                                      }
                                                                      echo "</select></td></tr>
                    <tr><th scope='row'>Tampilkan Font 'Jumlah Bayar' Lebih Besar</th>    <td>"; if ($row['font_jumlahbayar_besar']=='visible'){ echo "<input type='radio' name='d' value='visible' checked> Ya <input type='radio' name='d' value='hidden'> Tidak"; 
                                                                    }else{ echo "<input type='radio' name='d' value='visible'> Ya <input type='radio' name='d' value='hidden' checked> Tidak"; } echo "</td></tr>
                    
                    <tr><th scope='row'>Tipe Diskon</th>    <td><select style='padding:2px' name='e' required>";
                                                                  foreach ($tipe_diskon  as $r) {
                                                                    if ($row['tipe_diskon']==$r['tipe_diskon']){
                                                                      echo "<option value='$r[tipe_diskon]' selected> $r[keterangan]</option>";
                                                                    }else{
                                                                      echo "<option value='$r[tipe_diskon]'> $r[keterangan]</option>";
                                                                    }
                                                                  }
                                                              echo "</select></td></tr>

                    <tr><th scope='row'>Terapkan Perubahan Diskon</th>    <td>"; if ($row['terapkan_perubahan_diskon']=='visible'){ echo "<input type='radio' name='f' value='visible' checked> Ya <input type='radio' name='f' value='hidden'> Tidak"; 
                                                                    }else{ echo "<input type='radio' name='f' value='visible'> Ya <input type='radio' name='f' value='hidden' checked> Tidak"; } echo "</td></tr>

                    <tr><th scope='row'>Terapkan Perubahan Harga</th>    <td>"; if ($row['terapkan_perubahan_harga']=='visible'){ echo "<input type='radio' name='g' value='visible' checked> Ya <input type='radio' name='g' value='hidden'> Tidak"; 
                                                                    }else{ echo "<input type='radio' name='g' value='visible'> Ya <input type='radio' name='g' value='hidden' checked> Tidak"; } echo "</td></tr>

                    <tr><th scope='row'>Terapkan Batas Piutang</th>    <td>"; if ($row['terapkan_batas_piutang']=='visible'){ echo "<input type='radio' name='h' value='visible' checked> Ya <input type='radio' name='h' value='hidden'> Tidak"; 
                                                                    }else{ echo "<input type='radio' name='h' value='visible'> Ya <input type='radio' name='h' value='hidden' checked> Tidak"; } echo "</td></tr>

                    <tr><th scope='row'>Tanggal Jatuh Tempo Piutang</th>    <td><select style='padding:2px' name='i' required>";
                                                                  foreach ($jatuh_tempo  as $r) {
                                                                    if ($row['id_jatuh_tempo']==$r['id_jatuh_tempo']){
                                                                      echo "<option value='$r[id_jatuh_tempo]' selected> + $r[hari_jatuh_tempo] Hari</option>";
                                                                    }else{
                                                                      echo "<option value='$r[id_jatuh_tempo]'> + $r[hari_jatuh_tempo] Hari</option>";
                                                                    }
                                                                  }
                                                              echo "</select>
                    </td></tr>
                    <tr><th scope='row'>Menunjang Penjualan Tunggu</th>    <td>"; if ($row['menunjang_penjualan_tunggu']=='visible'){ echo "<input type='radio' name='j' value='visible' checked> Ya <input type='radio' name='j' value='hidden'> Tidak"; 
                                                                    }else{ echo "<input type='radio' name='j' value='visible'> Ya <input type='radio' name='j' value='hidden' checked> Tidak"; } echo "</td></tr>

                    <tr><th scope='row'>Sertakan Nama Penjual</th>    <td>"; if ($row['sertakan_nama_penjual']=='visible'){ echo "<input type='radio' name='k' value='visible' checked> Ya <input type='radio' name='k' value='hidden'> Tidak"; 
                                                                    }else{ echo "<input type='radio' name='k' value='visible'> Ya <input type='radio' name='k' value='hidden' checked> Tidak"; } echo "</td></tr>

                    <tr><th scope='row'>Sertakan Biaya Kirim</th>    <td>"; if ($row['sertakan_biaya_kirim']=='visible'){ echo "<input type='radio' name='l' value='visible' checked> Ya <input type='radio' name='l' value='hidden'> Tidak"; 
                                                                    }else{ echo "<input type='radio' name='l' value='visible'> Ya <input type='radio' name='l' value='hidden' checked> Tidak"; } echo "</td></tr>
                        <tr><th scope='row'></th>    <td>"; if ($row['diskon_agen_expadisi']=='visible'){ echo "<input type='checkbox' name='m' value='visible' checked>"; }else{ echo "<input type='checkbox' name='m' value='hidden'>"; } echo "Terapkan Diskon Biaya Kirim dari Agen Ekspedisi</td></tr>
                        <tr><th scope='row'></th>    <td>Tipe Diskon : <select style='padding:2px' name='n' required>";
                                                                            foreach ($tipe_diskon  as $r) {
                                                                              if ($row['tipe_diskon_ekspedisi']==$r['tipe_diskon']){
                                                                                echo "<option value='$r[tipe_diskon]' selected> $r[keterangan]</option>";
                                                                              }else{
                                                                                echo "<option value='$r[tipe_diskon]'> $r[keterangan]</option>";
                                                                              }
                                                                            }
                                                                        echo "</select></td></tr>
                        <tr><th scope='row'></th>    <td>"; if ($row['diskon_untuk_pelanggan']=='visible'){ echo "<input type='checkbox' name='o' value='visible' checked>"; }else{ echo "<input type='checkbox' name='o' value='hidden'>"; } echo "Terapkan Diskon Biaya Kirim untuk Pelanggan</td></tr>
                        <tr><th scope='row'></th>    <td>Tipe Diskon : <select style='padding:2px' name='p' required>";
                                                                            foreach ($tipe_diskon  as $r) {
                                                                              if ($row['tipe_diskon_pelanggan']==$r['tipe_diskon']){
                                                                                echo "<option value='$r[tipe_diskon]' selected> $r[keterangan]</option>";
                                                                              }else{
                                                                                echo "<option value='$r[tipe_diskon]'> $r[keterangan]</option>";
                                                                              }
                                                                            }
                                                                        echo "</select></td></tr>
                        <tr><th scope='row'></th>    <td>Satuan Kirim : <select style='padding:2px' name='q' required>";
                                                                      foreach ($satuan  as $r) {
                                                                        if ($row['kode_satuan']==$r['kode_satuan']){
                                                                          echo "<option value='$r[kode_satuan]' selected>$r[keterangan] ($r[kode_satuan])</option>";
                                                                        }else{
                                                                          echo "<option value='$r[kode_satuan]'>$r[keterangan] ($r[kode_satuan])</option>";
                                                                        }
                                                                      }
                                                                  echo "</select>
                        </td></tr>
                    <tr><th scope='row'>Keterangan Perbarang</th>    <td>"; if ($row['keterangan_perbarang']=='visible'){ echo "<input type='radio' name='r' value='visible' checked> Ya <input type='radio' name='r' value='hidden'> Tidak"; 
                                                                    }else{ echo "<input type='radio' name='r' value='visible'> Ya <input type='radio' name='r' value='hidden' checked> Tidak"; } echo "</td></tr>
                    
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    
                  </div>
            </div></form>";