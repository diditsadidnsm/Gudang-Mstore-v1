            <div class="col-xs-12">  
              <div class="box">
              <form target='_BLANK' action="<?php echo base_url(); ?>app/barcode_proses" method='POST'>
                <div class="box-header">
                  <h3 class="box-title">Data Label Barcode</h3>
                  <button type='submit' class='pull-right btn btn-primary btn-sm'>Proses Cetak Barcode</button>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php
                  echo "<table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr bgcolor='#e3e3e3'>
                        <th style='width:20px'>No</th>
                        <th width='80px'>Jml Cetak</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                      </tr>
                    </thead>
                    <tbody>";

                    $no = 1;
                    foreach ($record->result_array() as $row){
                    $stok = $this->model_app->stok($row['id_barang'])->row_array();
                    $harga1 = $this->model_app->view_one('mu_barang_harga',array('id_barang'=>$row['id_barang'], 'id_kategori_pelanggan'=>1, 'id_jenis_jual'=>'1'),'id_barang_harga')->row_array();
                    echo "<tr><td>$no</td>
                              <input type='hidden' name='a[$no]' value='$row[kode_barang]'>
                              <td><input type='number' name='b[$no]' value='0' style='width:100%; padding-left:5px'></td>
                              <td>$row[kode_barang]</td>
                              <td>$row[nama_barang]</td>
                              <td>$row[nama_kategori]</td>
                              <td>".rupiah($stok['stok'])."</td>
                              <td>$row[kode_satuan]</td>
                              <td>".rupiah($harga1['harga'])."</td>
                              <td>".rupiah($row['harga_beli'])."</td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>
            </form>
            </div>