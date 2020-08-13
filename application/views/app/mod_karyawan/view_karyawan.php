            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Master Karyawan</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>app/tambah_karyawan'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>NIK</th>
                        <th>Nama karyawan</th>
                        <th>Jabatan</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Telpon</th>
                        <th>Hp</th>
                        <th>Aktif</th>
                        <th style='width:50px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    echo "<tr><td>$no</td>
                              <td>$row[nik]</td>
                              <td>$row[nama_karyawan]</td>
                              <td>$row[nama_jabatan]</td>
                              <td>$row[alamat_karyawan_1]</td>
                              <td>$row[name]</td>
                              <td>$row[telepon_karyawan]</td>
                              <td>$row[hp_karyawan]</td>
                              <td style='text-transform:capitalize'>$row[aktif]</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."app/edit_karyawan/$row[id_karyawan]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."app/delete_karyawan/$row[id_karyawan]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>