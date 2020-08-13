            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Perkiraan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Nama Perkiraan</th>
                        <th style='width:90px'></th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    $perkiraan = $this->db->query("SELECT id_pendapatan_main as id, nama_pendapatan_main as nama_perkiraan, 1 as status FROM `mu_pendapatan_main` UNION SELECT id_bebanbiaya_main as id, nama_bebanbiaya_main as nama_perkiraan, 2 as status FROM `mu_bebanbiaya_main`");
                    foreach ($perkiraan->result_array() as $row){
                    echo "<tr><td>$no</td>
                              <td><b>$row[nama_perkiraan]</b></td>
                          </tr>";
                          if ($row['status']=='1'){ $table = 'mu_pendapatan_sub'; $field0 = 'id_pendapatan_sub'; $field = 'nama_pendapatan_sub'; $id = 'id_pendapatan_main'; }else{ $table = 'mu_bebanbiaya_sub'; $field0 = 'id_bebanbiaya_sub'; $field = 'nama_bebanbiaya_sub'; $id = 'id_bebanbiaya_main'; }
                          $sub_perkiraan = $this->db->query("SELECT $field0 as id, $field as nama_sub FROM $table where $id='$row[id]'");
                          $i = 1;
                          foreach ($sub_perkiraan->result_array() as $ro){
                            echo "<tr><td></td>
                                <td>$i. $ro[nama_sub]</td>";
                                if ($row['status']=='3'){
                                  echo "<td><center>
                                    <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."app/edit_perkiraan/$ro[id]'><span class='glyphicon glyphicon-edit'></span></a>
                                    <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."app/delete_perkiraan/$ro[id]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                                  </center></td>";
                                }

                            echo "</tr>";
                            $i++;
                          }
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>