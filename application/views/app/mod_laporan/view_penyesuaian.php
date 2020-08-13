            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Laporan Barang Penyesuaian</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php
                  echo "<table id='example2' class='table table-bordered table-striped table-condensed'>
                    <thead>
                      <tr bgcolor='#e3e3e3'>
                        <th colspan='6'></th>
                        <th colspan='2'><center>Jumlah</center></th>
                        <th colspan='1'></th>
                      </tr>
                      <tr bgcolor='#e3e3e3'>
                        <th style='width:20px'>No</th>
                        <th>Tanggal</th>
                        <th>Sebab / Alasan</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>(+)</th>
                        <th>(-)</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>";

                    $no = 1;
                    foreach ($record->result_array() as $row){
                    echo "<tr><td>$no</td>
                              <td>$row[tanggal_penyesuaian]</td>
                              <td>$row[nama_sebab_alasan]</td>
                              <td>$row[kode_barang]</td>
                              <td>$row[nama_barang]</td>
                              <td>$row[kode_satuan]</td>
                              <td>".rupiah($row['tambah'])."</td>
                              <td>".rupiah($row['kurang'])."</td>
                              <td>$row[keterangan]</td>
                          </tr>";
                          $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>