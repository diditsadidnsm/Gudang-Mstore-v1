            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Daftar Terima Pembelian (PO)</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php
                  echo "<table id='example1' class='table table-bordered table-striped table-condensed'>
                    <thead>
                      <tr bgcolor='#e3e3e3'>
                        <th colspan='2'></th>
                        <th colspan='2'><center>Tanggal</center></th>
                        <th colspan='5'></th>
                      </tr>
                      <tr bgcolor='#e3e3e3'>
                        <th style='width:20px'>No</th>
                        <th>No Terima PO</th>
                        <th width='80px'>Terima</th>
                        <th width='80px'>PO</th>
                        <th>No PO</th>
                        <th>Supplier</th>
                        <th>Pengirim</th>
                        <th>Penerima</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>";

                    $no = 1;
                    foreach ($record->result_array() as $row){
                    echo "<tr><td>$no</td>
                              <td>$row[no_pembelian_terima]</td>
                              <td>".tgl_slash($row['tanggal_terima'])."</td>
                              <td>".tgl_slash($row['tgl_pembelian'])."</td>
                              <td>$row[kode_pembelian]</td>
                              <td>$row[nama_supplier]</td>
                              <td>$row[pengirim_barang]</td>
                              <td>$row[nama_karyawan]</td>
                              <td><center>
                                <a class='btn btn-primary btn-xs' title='Return Pembelian (PO)' href='".base_url()."app/return_pembelian/$row[id_pembelian_terima]'><span class='fa fa-bus'></span></a>
                                <a class='btn btn-info btn-xs' target='_BLANK' title='Cetak / Print' href='".base_url()."app/print_pembelian_terima/$row[id_pembelian_terima]'><span class='glyphicon glyphicon-print'></span></a>
                                <a class='btn btn-warning btn-xs' title='Edit Data' href='".base_url()."app/edit_pembelian_terima/$row[id_pembelian_terima]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."app/delete_pembelian_terima/$row[id_pembelian_terima]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>