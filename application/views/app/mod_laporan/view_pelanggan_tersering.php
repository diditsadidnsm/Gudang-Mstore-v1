            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Laporan Penjualan Pelanggan Tersering</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Jumlah</th>
                        <th>Total Bayar</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record->result_array() as $row){
                    echo "<tr><td>$no</td>
                              <td>$row[nama_pelanggan]</td>
                              <td>$row[alamat_pelanggan_1]</td>
                              <td>$row[kota]</td>
                              <td>$row[trx]</td>
                              <td>".rupiah($row['total'])."</td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>