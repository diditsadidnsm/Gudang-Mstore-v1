            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Laporan Data List Penjualan Per-barang</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>No. Faktur</th>
                        <th>Tanggal</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jml</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Diskon</th>
                        <th>Pajak</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record->result_array() as $row){
                    echo "<tr><td>$no</td>
                              <td>$row[kode_transaksi]</td>
                              <td>$row[waktu_proses]</td>
                              <td>$row[kode_barang]</td>
                              <td>$row[nama_barang]</td>
                              <td>$row[jumlah_jual]</td>
                              <td>$row[kode_satuan]</td>
                              <td>".rupiah($row['harga_jual'])."</td>
                              <td>".rupiah($row['diskon_jual'])."</td>
                              <td>".rupiah($row['ppn'])."</td>
                              <td>".rupiah($row['total'])."</td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>