            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Laporan Data List Penjualan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>No. Faktur</th>
                        <th>Tanggal</th>
                        <th>Karyawan</th>
                        <th>Pelanggan</th>
                        <th>Type Bayar</th>
                        <th>Jumlah Bayar</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record->result_array() as $row){
                    echo "<tr><td>$no</td>
                              <td>$row[kode_transaksi]</td>
                              <td>$row[waktu_proses]</td>
                              <td>$row[nama_karyawan]</td>
                              <td>$row[nama_pelanggan]</td>
                              <td>$row[nama_type_bayar]</td>
                              <td>".rupiah($row['jumlah_bayar'])."</td>
                              <td>$row[keterangan]</td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>