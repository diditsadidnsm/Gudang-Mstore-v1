            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Master Barang <?php if ($this->uri->segment(3)=='ya'){ echo "Dijual"; }elseif($this->uri->segment(3)=='tidak'){ echo "Tidak Dijual"; } ?></h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>app/tambah_barang'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php
                  echo "<table id='example1' class='table table-bordered table-striped table-condensed'>
                    <thead>
                      <tr class='$conf[harga_grosir]' bgcolor='#e3e3e3'>
                        <th colspan='6'></th>
                        <th colspan='4'><center>Harga Jual</center></th>
                        <th colspan='2'></th>
                      </tr>
                      <tr bgcolor='#e3e3e3'>
                        <th style='width:20px'>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Ritel</th>
                        <th class='$conf[harga_grosir]'>Grosir 1</th>
                        <th class='$conf[harga_grosir]'>Grosir 2</th>
                        <th class='$conf[harga_grosir]'>Grosir 3</th>
                        <th>Harga Beli</th>
                        <th style='width:50px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>";

                    $no = 1;
                    foreach ($record->result_array() as $row){
                    $stok = $this->model_app->stok($row['id_barang'])->row_array();
                    $this->db->query("UPDATE mu_barang SET stok='$stok[stok]' where id_barang='$row[id_barang]'");
                    $harga1 = $this->model_app->view_one('mu_barang_harga',array('id_barang'=>$row['id_barang'], 'id_kategori_pelanggan'=>1, 'id_jenis_jual'=>'1'),'id_barang_harga')->row_array();
                    $harga2 = $this->model_app->view_one('mu_barang_harga',array('id_barang'=>$row['id_barang'], 'id_kategori_pelanggan'=>1, 'id_jenis_jual'=>'2'),'id_barang_harga')->row_array();
                    $harga3 = $this->model_app->view_one('mu_barang_harga',array('id_barang'=>$row['id_barang'], 'id_kategori_pelanggan'=>1, 'id_jenis_jual'=>'3'),'id_barang_harga')->row_array();
                    $harga4 = $this->model_app->view_one('mu_barang_harga',array('id_barang'=>$row['id_barang'], 'id_kategori_pelanggan'=>1, 'id_jenis_jual'=>'4'),'id_barang_harga')->row_array();
                    echo "<tr><td>$no</td>
                              <td><a href='#' class='detail-barang' data-id='$row[id_barang]' title='Detail Barang $row[kode_barang]'>$row[kode_barang]</a></td>
                              <td><a href='#' class='detail-barang' data-id='$row[id_barang]' title='Detail Barang $row[nama_barang]'>$row[nama_barang]</a></td>
                              <td>$row[nama_kategori]</td>
                              <td>".rupiah($stok['stok'])."</td>
                              <td>$row[kode_satuan]</td>
                              <td>".rupiah($harga1['harga'])."</td>
                              <td class='$conf[harga_grosir]'>".rupiah($harga2['harga'])."</td>
                              <td class='$conf[harga_grosir]'>".rupiah($harga3['harga'])."</td>
                              <td class='$conf[harga_grosir]'>".rupiah($harga4['harga'])."</td>
                              <td>".rupiah($row['harga_beli'])."</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."app/edit_barang/$row[id_barang]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."app/delete_barang/$row[id_barang]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>