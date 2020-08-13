            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Daftar Pembelian (PO)</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>app/tambah_pembelian'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php
                  echo "<table id='example1' class='table table-bordered table-striped table-condensed'>
                    <thead>
                      <tr bgcolor='#e3e3e3'>
                        <th colspan='2'></th>
                        <th colspan='3'><center>Tanggal</center></th>
                        <th colspan='5'></th>
                      </tr>
                      <tr bgcolor='#e3e3e3'>
                        <th style='width:20px'>No</th>
                        <th>No. PO</th>
                        <th width='80px'>Pembelian</th>
                        <th width='80px'>Kirim</th>
                        <th width='80px'>Terima</th>
                        <th>Supplier</th>
                        <th>Karyawan</th>
                        <th>Tipe Bayar</th>
                        <th>Jumlah Bayar</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>";

                    $no = 1;
                    foreach ($record->result_array() as $row){
                    $tgltrm = $this->db->query("SELECT GROUP_CONCAT(DATE_FORMAT(tanggal_terima, '%d/%m/%Y') SEPARATOR ', ') as tanggal  FROM `mu_pembelian_terima` where id_pembelian='".$row['id_pembelian']."'")->row_array();
                    echo "<tr><td>$no</td>
                              <td>$row[kode_pembelian]</td>
                              <td>".tgl_slash($row['tgl_pembelian'])."</td>
                              <td>".tgl_slash($row['tgl_kirim'])."</td>
                              <td>$tgltrm[tanggal]</td>
                              <td>$row[nama_supplier]</td>
                              <td>$row[nama_karyawan]</td>
                              <td>$row[nama_type_bayar]</td>
                              <td>".rupiah($row['tbayar'])."</td>
                              <td><center>
                                <a class='btn btn-primary btn-xs' title='Terima Pembelian (PO)' href='".base_url()."app/terima_pembelian/$row[id_pembelian]'><span class='fa fa-truck'></span></a>
                                <a class='btn btn-info btn-xs' target='_BLANK' title='Cetak / Print' href='".base_url()."app/print_pembelian/$row[id_pembelian]'><span class='glyphicon glyphicon-print'></span></a>
                                <a class='btn btn-warning btn-xs' title='Edit Data' href='".base_url()."app/edit_pembelian/$row[id_pembelian]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."app/delete_pembelian/$row[id_pembelian]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>