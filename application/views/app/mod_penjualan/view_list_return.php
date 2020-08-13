            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data List Return</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Tanggal</th>
                        <th>Karyawan</th>
                        <th>Pelanggan</th>
                        <th>Type Bayar</th>
                        <th>Jumlah Bayar</th>
                        <th>Keterangan</th>
                        <th style='width:50px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record->result_array() as $row){
                    echo "<tr><td>$no</td>
                              <td>$row[waktu_return]</td>
                              <td>$row[nama_karyawan]</td>
                              <td>$row[nama_pelanggan]</td>
                              <td>$row[nama_type_bayar]</td>
                              <td>$row[bayar_return]</td>
                              <td>$row[ket_return]</td>
                              <td><center>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."app/transaksi_return_hapus/$row[id_transaksi_return]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini, karena dengan menghapus data ini maka akan berpengaruh terhadap data keuangan, stok dan lainnya?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>