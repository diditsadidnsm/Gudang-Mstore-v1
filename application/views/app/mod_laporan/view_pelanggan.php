            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Laporan Data Pelanggan</h3>
                 </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Nama pelanggan</th>
                        <th>Kategori</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Telpon</th>
                        <th>Hp</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    echo "<tr><td>$no</td>
                              <td>$row[nama_pelanggan]</td>
                              <td>$row[nama_kategori_pelanggan]</td>
                              <td>$row[alamat_pelanggan_1]</td>
                              <td>$row[name]</td>
                              <td>$row[telpon_pelanggan]</td>
                              <td>$row[hp_pelanggan]</td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>