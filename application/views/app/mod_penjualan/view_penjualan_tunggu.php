            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Penjualan Tunggu</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Waktu Proses</th>
                        <th>Karyawan</th>
                        <th>Pelanggan</th>
                        <th>Keterangan</th>
                        <th style='width:50px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    echo "<tr><td>$no</td>
                              <td>$row[waktu_proses]</td>
                              <td>$row[nama_karyawan]</td>
                              <td>$row[nama_pelanggan]</td>
                              <td>$row[keterangan]</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Aktifkan Data' href='".base_url()."app/transaksi_penjualan/$row[id_transaksi]'><span class='glyphicon glyphicon-ok'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."app/transaksi_batal/$row[id_transaksi]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>