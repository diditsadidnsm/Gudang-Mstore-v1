            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Batas Piutang</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Nama pelanggan</th>
                        <th>Kategori</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Piutang</th>
                        <th>Frek.</th>
                        <th>Saldo</th>
                        <th style='width:50px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    $bts = $this->db->query("SELECT * FROM mu_pelanggan_piutang where id_pelanggan='$row[id_pelanggan]'")->row_array();
                    echo "<tr><td>$no</td>
                              <td>$row[nama_pelanggan]</td>
                              <td>$row[nama_kategori_pelanggan]</td>
                              <td>$row[alamat_pelanggan_1]</td>
                              <td>$row[name]</td>
                              <td>".rupiah($bts['batas_piutang'])."</td>
                              <td>".rupiah($bts['batas_frekuensi'])."</td>
                              <td></td>
                              <td><center>
                                <a class='btn btn-info btn-xs' title='Edit Data' href='".base_url()."app/bataspiutang_pelanggan/$row[id_pelanggan]'><span class='glyphicon glyphicon-search'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>