            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Laporan Data Barang Promosi</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id='example2' class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr bgcolor='#e3e3e3'>
                        <th colspan='6'></th>
                        <th colspan='4'><center>Diskon</center></th>
                      </tr>
                      <tr bgcolor='#e3e3e3'>
                        <th style='width:20px'>No</th>
                        <th>Tgl. Mulai</th>
                        <th>Tgl. Selesai</th>
                        <th>Pada</th>
                        <th>Nama Gratis</th>
                        <th>Jml. Barang</th>
                        <th>Ritel</th>
                        <th>Grosir 1</th>
                        <th>Grosir 2</th>
                        <th>Grosir 3</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record->result_array() as $row){
                      if ($row['kode_terapkan'] == 'barang'){
                          $jmlbrg = "Beli $row[jml_beli], Bonus $row[jml_bonus]";
                      }else{
                          $jmlbrg = "-";
                      }

                      if ($row['jenis_diskon']=='persen'){
                          $diskon = '%';
                      }else{
                          $diskon = '';
                      }

                      if (!is_null($row['nama_kategori'])){
                        $jenis = $row['nama_kategori'];
                      }elseif(!is_null($row['nama_subkategori'])){
                        $jenis = $row['nama_subkategori'];
                      }elseif(!is_null($row['nama_barang'])){
                        $jenis = $row['nama_barang'];
                      }
                    echo "<tr><td>$no</td>
                              <td>".tgl_slash($row['tgl_mulai'])."</td>
                              <td>".tgl_slash($row['tgl_selesai'])."</td>
                              <td>$row[kode_terapkan]</td>
                              <td>$jenis</td>
                              <td>$jmlbrg</td>
                              <td>".rupiah($row['ecer'])." $diskon</td>
                              <td>".rupiah($row['grosir1'])." $diskon</td>
                              <td>".rupiah($row['grosir2'])." $diskon</td>
                              <td>".rupiah($row['grosir3'])." $diskon</td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>