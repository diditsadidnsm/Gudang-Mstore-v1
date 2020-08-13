            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Laporan Data Karyawan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped table-condensed">
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
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>