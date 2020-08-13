            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Master Kategori Pelanggan</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>app/tambah_kategori_pelanggan'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Kategori Pelanggan</th>
                        <th style='width:50px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    echo "<tr><td>$no</td>
                              <td>$row[nama_kategori_pelanggan]</td>
                              <td><center>";
                              if ($row['permanen']=='n'){
                                echo "<a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."app/edit_kategori_pelanggan/$row[id_kategori_pelanggan]'><span class='glyphicon glyphicon-edit'></span></a>
                                      <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."app/delete_kategori_pelanggan/$row[id_kategori_pelanggan]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>";
                              }else{
                                echo "<a class='btn btn-default btn-xs' href='#'><span class='glyphicon glyphicon-edit'></span></a>
                                      <a class='btn btn-default btn-xs' href='#'><span class='glyphicon glyphicon-remove'></span></a>";
                              }
                              echo "</center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>